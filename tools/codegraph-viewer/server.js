const http = require('http');
const fs = require('fs');
const path = require('path');
const { DatabaseSync } = require('node:sqlite');

const PORT = process.env.PORT || 8686;
const THEME_DIR = path.resolve(__dirname, '../../');
const DB_PATH = path.join(THEME_DIR, '.code-graph', 'index.db');

console.log(`[CodeGraph] Loading database from: ${DB_PATH}`);

function getDb() {
    if (!fs.existsSync(DB_PATH)) {
        throw new Error(`Database not found at ${DB_PATH}. Run 'npx @sdsrs/code-graph incremental-index' first.`);
    }
    return new DatabaseSync(DB_PATH);
}

function getCategory(filePath, type) {
    if (!filePath) return { name: 'Root / Other', color: '#64748b' };
    const norm = filePath.replace(/\\/g, '/');
    if (norm.startsWith('app/Controllers/Admin')) return { name: 'Admin Controllers', color: '#818cf8' };
    if (norm.startsWith('app/Controllers')) return { name: 'App Controllers', color: '#c084fc' };
    if (norm.startsWith('app/Models')) return { name: 'App Models', color: '#38bdf8' };
    if (norm.startsWith('app/Views')) return { name: 'App Views', color: '#f472b6' };
    if (norm.startsWith('app/Helpers')) return { name: 'App Helpers', color: '#fbbf24' };
    if (norm.startsWith('templates')) return { name: 'Templates', color: '#10b981' };
    if (norm.startsWith('template-parts')) return { name: 'Template Parts', color: '#34d399' };
    if (norm.startsWith('assets/js')) return { name: 'JS Assets', color: '#facc15' };
    if (norm.startsWith('assets/css')) return { name: 'CSS Assets', color: '#f43f5e' };
    if (norm.endsWith('.py')) return { name: 'Python Utilities', color: '#4ade80' };
    if (norm.endsWith('.php')) return { name: 'Core PHP', color: '#a78bfa' };
    return { name: 'Other', color: '#94a3b8' };
}

function fetchGraphData() {
    const db = getDb();
    const nodesRaw = db.prepare(`
        SELECT n.id, n.file_id, n.type, n.name, n.qualified_name, n.start_line, n.end_line, 
               n.signature, n.doc_comment, f.path as file_path, f.language
        FROM nodes n
        JOIN files f ON n.file_id = f.id
    `).all();

    const edgesRaw = db.prepare(`SELECT id, source_id, target_id, relation, confidence FROM edges`).all();

    // Calculate degree (in/out)
    const degreeMap = {};
    edgesRaw.forEach(e => {
        degreeMap[e.source_id] = (degreeMap[e.source_id] || 0) + 1;
        degreeMap[e.target_id] = (degreeMap[e.target_id] || 0) + 1;
    });

    const symbolNodes = nodesRaw.map(n => {
        const cat = getCategory(n.file_path, n.type);
        const displayName = (n.name === '<module>') 
            ? path.basename(n.file_path)
            : (n.qualified_name || n.name);

        return {
            id: `node-${n.id}`,
            dbId: n.id,
            name: displayName,
            rawName: n.name,
            type: n.type,
            filePath: n.file_path,
            language: n.language,
            startLine: n.start_line,
            endLine: n.end_line,
            signature: n.signature,
            docComment: n.doc_comment,
            category: cat.name,
            color: cat.color,
            degree: degreeMap[n.id] || 0,
            val: Math.max(3, Math.min(18, (degreeMap[n.id] || 1) * 3))
        };
    });

    const nodeLookup = new Set(symbolNodes.map(n => n.id));

    const symbolLinks = edgesRaw.map(e => ({
        id: `edge-${e.id}`,
        source: `node-${e.source_id}`,
        target: `node-${e.target_id}`,
        relation: e.relation,
        confidence: e.confidence
    })).filter(l => nodeLookup.has(l.source) && nodeLookup.has(l.target));

    // File level aggregation
    const fileMap = {};
    symbolNodes.forEach(n => {
        if (!fileMap[n.filePath]) {
            const cat = getCategory(n.filePath, 'module');
            fileMap[n.filePath] = {
                id: `file-${n.filePath}`,
                filePath: n.filePath,
                name: path.basename(n.filePath),
                language: n.language,
                category: cat.name,
                color: cat.color,
                symbolCount: 0,
                symbols: [],
                val: 6
            };
        }
        fileMap[n.filePath].symbolCount++;
        fileMap[n.filePath].symbols.push(n.name);
    });

    const fileNodes = Object.values(fileMap);
    const fileLinkMap = {};

    symbolLinks.forEach(l => {
        const srcNode = symbolNodes.find(n => n.id === l.source);
        const tgtNode = symbolNodes.find(n => n.id === l.target);
        if (srcNode && tgtNode && srcNode.filePath !== tgtNode.filePath) {
            const linkKey = `${srcNode.filePath}->${tgtNode.filePath}`;
            if (!fileLinkMap[linkKey]) {
                fileLinkMap[linkKey] = {
                    id: `file-link-${linkKey}`,
                    source: `file-${srcNode.filePath}`,
                    target: `file-${tgtNode.filePath}`,
                    weight: 0,
                    relations: new Set()
                };
            }
            fileLinkMap[linkKey].weight++;
            fileLinkMap[linkKey].relations.add(l.relation);
        }
    });

    const fileLinks = Object.values(fileLinkMap).map(fl => ({
        id: fl.id,
        source: fl.source,
        target: fl.target,
        weight: fl.weight,
        relation: Array.from(fl.relations).join(', ')
    }));

    return {
        symbols: { nodes: symbolNodes, links: symbolLinks },
        files: { nodes: fileNodes, links: fileLinks },
        stats: {
            totalNodes: symbolNodes.length,
            totalLinks: symbolLinks.length,
            totalFiles: fileNodes.length,
            categories: Array.from(new Set(symbolNodes.map(n => n.category)))
        }
    };
}

function fetchNodeDetails(dbId) {
    const db = getDb();
    const node = db.prepare(`
        SELECT n.*, f.path as file_path, f.language
        FROM nodes n
        JOIN files f ON n.file_id = f.id
        WHERE n.id = ?
    `).get(dbId);

    if (!node) return null;

    const incoming = db.prepare(`
        SELECT e.id as edge_id, e.relation, n.id as node_id, n.name, n.type, f.path as file_path
        FROM edges e
        JOIN nodes n ON e.source_id = n.id
        JOIN files f ON n.file_id = f.id
        WHERE e.target_id = ?
    `).all(dbId);

    const outgoing = db.prepare(`
        SELECT e.id as edge_id, e.relation, n.id as node_id, n.name, n.type, f.path as file_path
        FROM edges e
        JOIN nodes n ON e.target_id = n.id
        JOIN files f ON n.file_id = f.id
        WHERE e.source_id = ?
    `).all(dbId);

    const fileSymbols = db.prepare(`
        SELECT id, name, type, start_line, end_line
        FROM nodes
        WHERE file_id = ? AND id != ?
    `).all(node.file_id, dbId);

    return {
        ...node,
        incoming: incoming.map(i => ({ ...i, id: `node-${i.node_id}` })),
        outgoing: outgoing.map(o => ({ ...o, id: `node-${o.node_id}` })),
        fileSymbols: fileSymbols.map(s => ({ ...s, id: `node-${s.id}` }))
    };
}

const server = http.createServer((req, res) => {
    const url = new URL(req.url, `http://${req.headers.host}`);

    if (url.pathname === '/api/graph') {
        try {
            const data = fetchGraphData();
            res.writeHead(200, { 'Content-Type': 'application/json', 'Access-Control-Allow-Origin': '*' });
            res.end(JSON.stringify(data));
        } catch (err) {
            res.writeHead(500, { 'Content-Type': 'application/json' });
            res.end(JSON.stringify({ error: err.message }));
        }
        return;
    }

    if (url.pathname.startsWith('/api/node/')) {
        const dbId = url.pathname.replace('/api/node/', '');
        try {
            const details = fetchNodeDetails(parseInt(dbId, 10));
            if (!details) {
                res.writeHead(404, { 'Content-Type': 'application/json' });
                res.end(JSON.stringify({ error: 'Node not found' }));
            } else {
                res.writeHead(200, { 'Content-Type': 'application/json', 'Access-Control-Allow-Origin': '*' });
                res.end(JSON.stringify(details));
            }
        } catch (err) {
            res.writeHead(500, { 'Content-Type': 'application/json' });
            res.end(JSON.stringify({ error: err.message }));
        }
        return;
    }

    // Serve HTML
    const htmlPath = path.join(__dirname, 'public', 'index.html');
    if (fs.existsSync(htmlPath)) {
        res.writeHead(200, { 'Content-Type': 'text/html; charset=utf-8' });
        fs.createReadStream(htmlPath).pipe(res);
    } else {
        res.writeHead(404, { 'Content-Type': 'text/plain' });
        res.end('index.html not found');
    }
});

server.listen(PORT, '0.0.0.0', () => {
    console.log(`\n==================================================`);
    console.log(`🚀 CodeGraph Visualizer Server active at:`);
    console.log(`👉 http://localhost:${PORT}`);
    console.log(`==================================================\n`);
});
