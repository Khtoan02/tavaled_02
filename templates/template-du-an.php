<?php
/**
 * Template Name: Trang Dự Án
 */

get_header(); ?>

<style>
.page-template-template-du-an-php *, .page-template-template-du-an-php *::before, .page-template-template-du-an-php *::after{box-sizing:border-box;margin:0;padding:0}


:root {
  --orange:     #f05a25;
  --orange-dk:  #c8451a;
  --navy:       #1d2857;
  --bg:         #fff8f6;
  --white:      #ffffff;
  --muted:      #6b7280;
  --light:      #9ca3af;
  --border:     #eeddd6;
  --border-lt:  #f5e8e2;
}

body {
  font-family: var(--font-body) !important;
  background: var(--bg);
  color: var(--navy);
  font-size: 15px;
  line-height: 1.6;
}

/* Nâng cấp độ đậm cho tất cả thẻ P và mô tả để dễ đọc với Spartan */
p, .card__desc {
  font-weight: 500;
}

/* ══════════════════════════════════
   TOPBAR
══════════════════════════════════ */
.topbar { display: none !important; }
/* ══════════════════════════════════
   GLOBAL OVERRIDES FOR TEMPLATE
   ══════════════════════════════════ */
.sec-head { padding-top: 80px; }

/* Font chuẩn Website: League Spartan cho Tiêu đề và nội dung chính */
/* Font chuẩn Website: League Spartan cho Tiêu đề lớn và Brand */
.sec-head__title, .topbar__brand-t {
  font-family: var(--font-heading) !important;
  font-weight: 900 !important;
  text-transform: uppercase;
  letter-spacing: -0.02em;
}

/* Font nghệ thuật: Cormorant Garamond cho các yếu tố trang trí (Ghost text) & Trích dẫn */
.sec-head__ghost, .qe__bg-letter, .qe__text, .qc__mark, 
.qc__text, .qm__oq, .qm__text, .qs__mark, .qs__text, .qc__ghost-num {
  font-family: var(--font-heading) !important;
}

.sec-head__title { 
  color: var(--navy); 
  font-size: 3.2rem !important; 
  display: flex;
  align-items: baseline;
  gap: 0.25em;
}

.sec-head__title em { 
  font-family: var(--font-heading) !important;
  color: var(--orange); 
  font-style: normal; /* Đưa về font chuẩn, không dùng Italic Serif nữa */
  text-transform: uppercase;
}
.sec-head__ghost { 
  font-family: var(--font-heading) !important;
  color: var(--navy); 
  opacity: 0.04; 
}

/* ══════════════════════════════════
   WRAP & MAIN
══════════════════════════════════ */
main { padding-top: 120px; } /* Tạo khoảng trống an toàn với Header */
.wrap { max-width: 1600px; margin: 0 auto; padding: 0 5%; }

/* ══════════════════════════════════
   SECTION HEADER
══════════════════════════════════ */
.sec-head {
  display: flex;
  align-items: flex-end;
  justify-content: space-between;
  padding: 56px 0 26px;
  position: relative;
}

.sec-head__ghost {
  position: absolute;
  left: -4px; bottom: 18px;
  font-family: var(--font-heading);
  font-size: 8.5rem;
  font-weight: 700;
  font-style: italic;
  line-height: 1;
  color: var(--orange);
  opacity: 0.055;
  pointer-events: none;
  user-select: none;
  letter-spacing: -0.03em;
  white-space: nowrap;
}

.sec-head__main { position: relative; z-index: 1; }

.sec-head__eyebrow {
  font-size: 10.5px;
  font-weight: 600;
  letter-spacing: 0.2em;
  text-transform: uppercase;
  color: var(--orange);
  opacity: 0.8;
  margin-bottom: 6px;
  display: flex;
  align-items: center;
  gap: 8px;
}
.sec-head__eyebrow::before {
  content: '';
  display: inline-block;
  width: 22px; height: 1.5px;
  background: var(--orange);
  border-radius: 0;
}

.sec-head__title {
  font-size: 2.8rem;
  line-height: 1.1;
  color: var(--navy);
}

.sec-head__title em {
  /* Artistic font preserved */
}

.sec-head__more {
  display: inline-flex; align-items: center; gap: 7px;
  font-size: 11.5px; font-weight: 600;
  color: var(--muted); text-decoration: none;
  letter-spacing: 0.08em; text-transform: uppercase;
  border-bottom: 1.5px solid var(--border-lt);
  padding-bottom: 1px;
  transition: color .2s, border-color .2s, gap .2s;
  white-space: nowrap;
  align-self: flex-end;
  padding-bottom: 6px;
}
.sec-head__more::after { content: '→'; font-size: 13px; }
.sec-head__more:hover { color: var(--orange); border-color: var(--orange); gap: 11px; }

/* ══════════════════════════════════
   SECTION DIVIDER
══════════════════════════════════ */
.sec-div {
  height: 1px;
  background: linear-gradient(90deg, transparent, var(--border) 12%, var(--border) 88%, transparent);
}

/* ══════════════════════════════════
   CARD BASE
══════════════════════════════════ */
/* ══════════════════════════════════
   CARD BASE (RE-DESIGNED FOR BRAND)
   ══════════════════════════════════ */
.card {
  background: #fff;
  border-radius: 0px; /* Góc cạnh công nghệ */
  overflow: hidden;
  border: 1px solid #f1f1f1;
  transition: all 0.5s cubic-bezier(0.25, 1, 0.5, 1);
  display: flex; flex-direction: column;
}
.card:hover {
  transform: translateY(-8px);
  box-shadow: 0 20px 40px -15px rgba(29, 40, 87, 0.15);
  border-color: var(--orange);
}

.card__thumb { position:relative; overflow:hidden; flex-shrink:0; }
.card__thumb img {
  width:100%; height:100%; object-fit:cover; display:block;
  transition: transform .7s cubic-bezier(.16,1,.3,1), filter .4s;
  
}
.card:hover .card__thumb img { transform:scale(1.07);  }

/* Badge — whisper quiet */
.cat {
  position: absolute; top: 11px; left: 11px;
  background: rgba(255,255,255,0.78);
  backdrop-filter: blur(10px);
  color: var(--mid);
  font-size: 9px; letter-spacing: 0.14em;
  font-weight: 600; text-transform: uppercase;
  padding: 3px 9px; border-radius: 0px; /* Góc cạnh */
  border: 1px solid rgba(255,255,255,0.55);
  z-index: 2;
}

/* Read-time */
.read-pill {
  position: absolute; bottom: 10px; right: 10px;
  background: rgba(255,248,246,0.88);
  backdrop-filter: blur(6px);
  color: var(--orange);
  font-size: 10px; font-weight: 600;
  padding: 3px 10px; border-radius: 0px; /* Góc cạnh */
  border: 1px solid rgba(240,90,37,.15);
  z-index: 2;
}

.card__body { padding: 18px 20px 20px; flex:1; display:flex; flex-direction:column; }

.card__meta {
  display:flex; align-items:center; gap:6px;
  font-size:11px; color:var(--muted); margin-bottom:8px; flex-wrap:wrap;
}
.meta-dot { width:3px; height:3px; border-radius:0; background:var(--light); flex-shrink:0; }

.card__title {
  font-family: var(--font-heading) !important;
  font-weight: 700; /* Bold chuẩn cho Card */
  text-transform: uppercase;
  line-height: 1.35;
  color: var(--navy);
  margin-bottom: 9px; flex: 1;
  transition: color 0.2s;
}
.card:hover .card__title { color: var(--orange); }

.card__desc {
  font-family: var(--font-body) !important;
  font-weight: 300; /* Thin/Light cho nội dung mô tả */
  font-size: 13px;
  color: #616161; 
  line-height: 1.6;
  display: -webkit-box; -webkit-line-clamp: 3;
  -webkit-box-orient: vertical; overflow: hidden;
  margin-bottom: 14px;
}

.card__foot {
  display:flex; align-items:center; justify-content:space-between;
  padding-top: 12px; border-top: 1px solid var(--border-lt); margin-top: auto;
}

.stats { display:flex; align-items:center; gap:12px; font-size:11px; color:var(--muted); }
.stat { display:flex; align-items:center; gap:4px; }
.stat svg { width:12px; height:12px; stroke:var(--light); fill:none; stroke-width:1.8; }

.read-more {
  display:inline-flex; align-items:center; gap:5px;
  font-size:11px; font-weight:800; color: var(--navy);
  text-decoration:none; letter-spacing:0.07em; text-transform:uppercase;
  transition: all .2s;
}
.read-more::after { content:'→'; font-size:12px; }
.read-more:hover { gap: 9px; color: var(--orange); }

/* ══════════════════════════════════
   GRID SYSTEMS
══════════════════════════════════ */
.grid-3 { display:grid; grid-template-columns:repeat(3,1fr); gap:16px; }
.grid-2 { display:grid; grid-template-columns:repeat(2,1fr); gap:16px; }

/* ── Featured blog: big + 4 sm ── */
.featured-grid {
  display: grid;
  grid-template-columns: 1.65fr 1fr 1fr;
  grid-template-rows: 1fr 1fr;
  gap: 16px;
}
.card-big { grid-column:1; grid-row:1/3; }
.card-big .card__thumb { height: 300px; }
.card-big .card__title { font-size: 1.35rem; }
.card-big .card__desc { -webkit-line-clamp: 4; }

.card-sm .card__thumb { height: 140px; }
.card-sm .card__title { font-size:.9rem; -webkit-line-clamp:2; display:-webkit-box; -webkit-box-orient:vertical; overflow:hidden; }
.card-sm .card__desc { display:none; }
.card-sm .card__foot { border-top:none; padding-top:6px; }

.card-md .card__thumb { height:178px; }
.card-md .card__title { font-size:.95rem; }
.card-md .card__desc { -webkit-line-clamp:2; }

/* Horizontal card */
.card-h { flex-direction:row; align-items:stretch; }
.card-h .card__thumb { width:108px; flex-shrink:0; height:auto; }
.card-h .card__body { padding:12px 14px; }
.card-h .card__title { font-size:.85rem; -webkit-line-clamp:2; display:-webkit-box; -webkit-box-orient:vertical; overflow:hidden; }
.card-h .card__desc, .card-h .card__foot { display:none; }

/* Hướng dẫn layout */
.hd-grid { display:grid; grid-template-columns:1fr 1fr; gap:16px; }
.hd-list { display:flex; flex-direction:column; gap:10px; }

/* Sự kiện: big left + 2 stacked right */
.sk-grid { display:grid; grid-template-columns:1.2fr 1fr; gap:16px; }
.sk-grid .card-big .card__thumb { height: 268px; }
.sk-right { display:flex; flex-direction:column; gap:10px; }


/* ══════════════════════════════════════════════
   DỰ ÁN — special: masonry-inspired project grid
   Shows many projects in an editorial layout
══════════════════════════════════════════════ */
.project-hero {
  display: grid;
  grid-template-columns: 1.8fr 1fr;
  grid-template-rows: auto;
  gap: 16px;
  margin-bottom: 16px;
}

.project-hero .card-feat .card__thumb { height: 380px; }
.project-hero .card-feat .card__title { font-size: 1.3rem; }
.project-hero .card-feat .card__desc { -webkit-line-clamp: 4; }

.project-hero__right {
  display: flex;
  flex-direction: column;
  gap: 16px;
}
.project-hero__right .card .card__thumb { height: 178px; }
.project-hero__right .card .card__title { font-size: .9rem; }

/* Row 2: 4 equal */
.project-row {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 16px;
  margin-bottom: 16px;
}
.project-row .card .card__thumb { height: 150px; }
.project-row .card .card__title { font-size: .86rem; -webkit-line-clamp:2; display:-webkit-box; -webkit-box-orient:vertical; overflow:hidden; }
.project-row .card .card__desc { display:none; }
.project-row .card .card__foot { border-top:none; padding-top:6px; }

/* Row 3: 3 equal */
.project-row3 {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 16px;
}
.project-row3 .card .card__thumb { height: 165px; }
.project-row3 .card .card__title { font-size: .88rem; }
.project-row3 .card .card__desc { display:none; }
.project-row3 .card .card__foot { border-top:none; padding-top:6px; }

/* Location tag on project cards */
.loc-tag {
  position: absolute; bottom: 10px; left: 10px;
  background: rgba(17,24,39,0.72);
  backdrop-filter: blur(6px);
  color: rgba(255,255,255,.9);
  font-size: 9.5px; font-weight: 600;
  letter-spacing: 0.1em; text-transform: uppercase;
  padding: 3px 9px; border-radius: 0px;
  z-index: 2;
}


/* ══════════════════════════════════════════════
   QUOTE — TYPE A: Editorial 3-panel dark
══════════════════════════════════════════════ */
.quote-editorial {
  margin: 64px 0;
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  height: 260px;
  border-radius: 0px;
  overflow: hidden;
  box-shadow: 0 40px 80px -20px rgba(29, 40, 87, 0.3);
}

.qe__panel {
  position: relative;
  padding: 36px 32px;
  display: flex;
  flex-direction: column;
  justify-content: flex-end;
  overflow: hidden;
}
.qe__panel--a { background: #1d2857; }
.qe__panel--b { background: var(--orange); }
.qe__panel--c { background: linear-gradient(135deg, #1d2857 0%, #2c3e8c 100%); }
.qe__panel--navy { background: linear-gradient(180deg, #1d2857 0%, #2c3e8c 100%); }

/* Ký tự nghệ thuật phía sau */
.qe__bg-letter {
  position: absolute;
  font-family: var(--font-heading) !important;
  font-size: 26rem; font-weight: 700; font-style: italic;
  line-height: 0.8; top: -40px; left: -20px;
  color: rgba(255,255,255,0.06);
  pointer-events: none; user-select: none;
  letter-spacing: -0.05em;
  z-index: 0;
}

.qe__text {
  font-family: var(--font-heading) !important;
  font-style: italic; font-size: 1.2rem; line-height: 1.6;
  color: #ffffff; position: relative; z-index: 2;
}
.qe__author {
  margin-top: 14px; font-size: 11px; font-weight: 800;
  font-family: var(--font-heading) !important;
  letter-spacing: 0.2em; text-transform: uppercase;
  color: rgba(255,255,255,0.8); position: relative; z-index: 2;
}
.qe__panel--b .qe__author { color: #ffffff; }
.qe__panel:not(:last-child) { border-right: 1px solid rgba(255,255,255,0.1); }


/* ══════════════════════════════════════════════
   QUOTE — TYPE B: Cinematic dark full-width
══════════════════════════════════════════════ */
.quote-cinematic {
  margin: 80px 0;
  position: relative;
  background: linear-gradient(135deg, #1d2857 0%, #2c3e8c 100%);
  border-radius: 0px;
  overflow: hidden;
  display: flex;
  align-items: center;
  padding: 80px 100px;
  box-shadow: 0 40px 100px -20px rgba(29,40,87,0.45);
  border: 1px solid rgba(255,255,255,0.1);
}
/* Hiệu ứng lưới công nghệ */
.quote-cinematic::before {
  content: '';
  position: absolute; inset: 0;
  background-image: 
    radial-gradient(circle at 2px 2px, rgba(255,255,255,0.03) 1px, transparent 0);
  background-size: 32px 32px;
  pointer-events: none;
  z-index: 1;
}
.quote-cinematic::after {
  content: '';
  position: absolute; left:0; top:0; bottom:0; width:8px;
  background: linear-gradient(180deg, var(--orange) 0%, #ff8c61 100%);
  box-shadow: 4px 0 20px rgba(240,90,37,0.4);
}
.qc__mark {
  font-family: var(--font-heading) !important;
  font-size: 12rem; font-weight: 700; font-style: italic;
  color: var(--orange); opacity: 0.25; line-height: 1;
  margin-right: 48px; margin-top: -32px;
  flex-shrink: 0; user-select: none;
  position: relative; z-index: 2;
}
.qc__body { flex: 1; position: relative; z-index: 2; }
.qc__text {
  font-family: var(--font-heading) !important;
  font-style: italic; font-size: 1.85rem;
  line-height: 1.5; color: #ffffff;
  letter-spacing: -0.01em;
}
.qc__foot {
  display: flex; align-items: center; gap: 16px; margin-top: 32px;
}
.qc__dash { width: 48px; height: 2px; background: var(--orange); border-radius: 0; }
.qc__author {
  font-family: var(--font-heading) !important;
  font-size: 13px; font-weight: 800;
  letter-spacing: 0.25em; text-transform: uppercase; color: var(--orange);
}
/* Ký tự nghệ thuật phía sau cho Cinematic */
.qc__ghost-char {
  position: absolute; right: 40px; bottom: -80px;
  font-family: var(--font-heading); font-size: 32rem; font-weight: 700;
  color: #ffffff; opacity: 0.06; font-style: italic;
  user-select: none; pointer-events: none; z-index: 0;
  letter-spacing: -0.1em;
}
.qc__ghost-num {
  position: absolute; right: 52px; top: 50%; transform: translateY(-50%);
  font-family: var(--font-heading); font-size: 9rem; font-weight: 700;
  color: rgba(255,255,255,.025); line-height: 1;
  user-select: none; pointer-events: none;
}


/* ══════════════════════════════════════════════
   QUOTE — TYPE C: Warm mosaic (light)
══════════════════════════════════════════════ */
.quote-mosaic {
  margin: 80px 0;
  display: grid;
  grid-template-columns: 2fr 1.1fr 1.1fr;
  border-radius: 0px; overflow: hidden;
  box-shadow: 0 50px 100px -30px rgba(29, 40, 87, 0.4);
  background: #1d2857;
  padding: 2px;
}
.qm__cell { padding: 60px 50px; position: relative; overflow: hidden; }
.qm__cell--main {
  background: linear-gradient(135deg, #1d2857 0%, #2c3e8c 100%);
}
.qm__cell--b {
  background: linear-gradient(180deg, #1d2857 0%, #151d3d 100%);
  border-left: 1px solid rgba(255,255,255,0.1);
}
.qm__cell--c { 
  background: linear-gradient(180deg, var(--orange) 0%, #ff8c61 100%);
}

.qm__oq {
  font-family: var(--font-heading) !important;
  font-size: 5rem; line-height: .7; font-style: italic;
  color: #ffffff; opacity: 0.4;
  display: block; margin-bottom: 20px;
}

.qm__text {
  font-family: var(--font-heading) !important;
  font-style: italic; font-size: 1.35rem;
  line-height: 1.6; color: #ffffff;
  position: relative; z-index: 2;
}
.qm__cell--c .qm__text { color: #ffffff; font-size: 1.1rem; }

.qm__author {
  margin-top: 24px; font-size: 11px; font-weight: 800;
  font-family: var(--font-heading) !important;
  letter-spacing: 0.18em; text-transform: uppercase; color: var(--orange);
  display: flex; align-items: center; gap: 10px;
}
.qm__author::before {
  content: ''; display: inline-block;
  width: 24px; height: 2px; background: var(--orange); flex-shrink:0;
}
.qm__cell--c .qm__author { color: #ffffff; }
.qm__cell--c .qm__author::before { background: #ffffff; }

.qm__cell--main::after {
  content: 'T'; position: absolute; right: -20px; bottom: -50px;
  font-family: var(--font-heading); font-size: 26rem; 
  color: #ffffff; opacity: 0.08;
  pointer-events: none; font-weight: 700; user-select: none; font-style: italic;
  z-index: 1;
}
.qm__cell--b::after {
  content: 'V'; position: absolute; left: -30px; top: -40px;
  font-family: var(--font-heading); font-size: 20rem;
  color: #ffffff; opacity: 0.07;
  pointer-events: none; font-weight: 700; user-select: none; font-style: italic;
  z-index: 1;
}
.qm__cell--c::after {
  content: 'L'; position: absolute; right: -20px; top: -30px;
  font-family: var(--font-heading); font-size: 18rem;
  color: #ffffff; opacity: 0.15;
  pointer-events: none; font-weight: 700; user-select: none; font-style: italic;
  z-index: 1;
}


/* ══════════════════════════════════════════════
   QUOTE — TYPE D: Solo dark with glow
══════════════════════════════════════════════ */
.quote-solo {
  margin: 80px 0;
  background: linear-gradient(135deg, #1d2857 0%, #2c3e8c 100%);
  border-radius: 0px; padding: 100px;
  position: relative; overflow: hidden;
  box-shadow: 0 60px 120px -30px rgba(29,40,87,0.5);
  display: flex; align-items: center; gap: 80px;
  border: 1px solid rgba(255,255,255,0.1);
}
.quote-solo::before {
  content: '';
  position: absolute; width:700px; height:700px; border-radius:0;
  background: radial-gradient(circle, rgba(29,40,87,0.4) 0%, transparent 70%);
  top:50%; left:0%; transform:translate(-50%, -50%);
  pointer-events:none;
}
/* Hiệu ứng tia sáng công nghệ */
.quote-solo::after {
  content: '';
  position: absolute; width: 100%; height: 100%;
  inset: 0;
  background: linear-gradient(45deg, transparent 48%, rgba(240,90,37,0.05) 50%, transparent 52%);
  background-size: 200% 200%;
  animation: shine 8s infinite linear;
  pointer-events: none;
}
@keyframes shine {
  from { background-position: -200% 0; }
  to { background-position: 200% 0; }
}
.qs__mark {
  font-family: var(--font-heading) !important;
  font-size: 12rem; font-weight: 700; font-style: italic;
  color: var(--orange); opacity: 0.25; line-height: 1;
  flex-shrink:0; user-select:none; position:relative; z-index:1;
}
.qs__text {
  font-family: var(--font-heading) !important;
  font-style: italic; font-size: 1.7rem;
  line-height: 1.6; color: #ffffff;
  letter-spacing: -0.01em;
  text-shadow: 0 4px 15px rgba(0,0,0,0.4);
}
.qs__author { 
  font-family: var(--font-heading) !important;
  font-size: 12px; font-weight: 800; letter-spacing: 0.2em; text-transform: uppercase; color: var(--orange); 
}


/* ══════════════════════════════════
   ANIMATIONS
══════════════════════════════════ */
@keyframes fadeUp {
  from { opacity: 0; transform: translateY(30px) scale(0.98);  }
  to   { opacity: 1; transform: translateY(0) scale(1);  }
}
.anim { opacity:0; animation: fadeUp .85s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
.d1{animation-delay:.05s} .d2{animation-delay:.12s} .d3{animation-delay:.18s}
.d4{animation-delay:.25s} .d5{animation-delay:.32s} .d6{animation-delay:.38s}
.d7{animation-delay:.45s}


/* ══════════════════════════════════
   FOOTER
══════════════════════════════════ */
.site-footer {
  background: var(--ink);
  padding: 36px 32px; text-align: center;
  margin-top: 64px;
}
.site-footer p { font-size:12.5px; color:rgba(255,255,255,.38); letter-spacing:.05em; }
.site-footer strong { color: var(--orange); }


/* ══════════════════════════════════
   RESPONSIVE
══════════════════════════════════ */
@media (max-width:1024px) {
  .project-hero { grid-template-columns:1fr 1fr; }
  .project-hero .card-feat { grid-column:1/3; }
  .project-row { grid-template-columns:1fr 1fr; }
  .featured-grid { grid-template-columns:1fr 1fr; }
  .card-big { grid-column:1/3; grid-row:auto; }
  .grid-3 { grid-template-columns:1fr 1fr; }
  .sk-grid, .hd-grid { grid-template-columns:1fr; }
  .quote-editorial { grid-template-columns:1fr; height:auto; }
  .qe__panel { min-height:155px; }
  .qe__panel:not(:last-child) { border-right:none; border-bottom:1px solid rgba(255,255,255,.07); }
  .quote-mosaic { grid-template-columns:1fr; }
  .qm__cell--main { border-right:none; border-bottom:1px solid var(--border); }
  .qm__cell--b { border-right:none; border-bottom:1px solid var(--border); }
  .quote-cinematic { padding:36px 32px; }
  .quote-solo { padding:40px 36px; gap:28px; }
}

@media (max-width:640px) {
  .topbar__nav { display:none; }
  .wrap { padding:0 16px; }
  .project-hero { grid-template-columns:1fr; gap: 16px; }
  .project-hero .card-feat { grid-column:1; }
  .project-row, .project-row3 { grid-template-columns: repeat(2, 1fr); gap: 12px; }
  .featured-grid { grid-template-columns:1fr; gap: 16px; }
  .card-big { grid-column:1; }
  .grid-3, .grid-2 { grid-template-columns: repeat(2, 1fr); gap: 12px; }
  .sec-head { margin-bottom: 24px; padding: 40px 0 16px; }
  .sec-head__title { font-size:1.5rem; }
  .sec-head__ghost { font-size: 50px; top: -10px; left: -5px; }
  
  .quote-cinematic { padding:36px 16px; gap: 16px; }
  .qc__text { font-size:.95rem; line-height:1.5; }
  .quote-solo { flex-direction:column; padding:32px 16px; gap:16px; text-align:center; }
  .qs__text { font-size:1.05rem; line-height:1.5; }
  
  /* Cải thiện thẻ Mobile, giãn dòng dễ đọc */
  .card__desc { display:none !important; }
  .card__info { padding: 12px 14px !important; }
  .card__body { padding: 12px 14px 14px; }
  .card__title { font-size: .85rem !important; margin-bottom: 6px; }
  .qc__ghost-char { font-size:100px; opacity:0.04; right: 5px; bottom: -10px; }
  
  /* Fix height for small mobile cards */
  .project-row .card .card__thumb, .project-row3 .card .card__thumb, .grid-3 .card .card__thumb { height: 110px; }
}
</style>


<main><div class="wrap">


<div class="sec-head">
    <div class="sec-head__main">
        <div class="sec-head__eyebrow anim">Công trình tiêu biểu</div>
        <h2 class="sec-head__title anim d1">Các <em>Dự Án</em> Đã Thực Hiện</h2>
    </div>
    <div class="sec-head__ghost">Dự Án</div>
</div>
<div class="sec-div anim d2"></div>

<div class="project-hero" style="margin-top: 40px;">
    <?php
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
    $args = [
        'post_type'      => ['post', 'page'],
        'category_name'  => 'du-an',
        'posts_per_page' => 12,
        'paged'          => $paged,
        'orderby'        => 'date',
        'order'          => 'DESC',
    ];
    $project_query = new WP_Query($args);

    if ($project_query->have_posts()) :
        $count = 0;
        while ($project_query->have_posts()) : $project_query->the_post();
            $count++;
            
            // Lấy thông tin bài viết
            $title = get_the_title();
            $link = get_permalink();
            $thumb = has_post_thumbnail() ? get_the_post_thumbnail_url(null, 'large') : 'https://tavaled.vn/wp-content/uploads/2026/03/0021_TavaLED_Hinh_Anh.jpg';
            $excerpt = wp_trim_words(get_the_excerpt(), 20, '...');
            $date = get_the_date('d/m/Y');
            
            // Phân biệt Post và Page
            $type_label = (get_post_type() === 'page') ? 'Trang Dự Án' : 'Bài Viết Dự Án';
            $post_obj = get_post();

            if ($count === 1) : ?>
                <!-- Hero Project -->
                <?php get_template_part('app/Views/components/blog-card', null, [
                    'post'           => $post_obj,
                    'variant'        => 'big',
                    'category_label' => $type_label,
                    'cta_text'       => 'Xem chi tiết dự án',
                    'excerpt_words'  => 30,
                    'theme'          => 'light',
                ]); ?>
                <div class="project-hero__right">
            <?php elseif ($count <= 3) : ?>
                <!-- Side Projects -->
                <?php get_template_part('app/Views/components/blog-card', null, [
                    'post'           => $post_obj,
                    'variant'        => 'sm-row',
                    'category_label' => $type_label,
                    'cta_text'       => 'Chi tiết',
                    'excerpt_words'  => 12,
                    'theme'          => 'light',
                ]); ?>
                <?php if ($count === 3) echo '</div></div><div class="grid-3" style="margin-top: 16px;">'; ?>
            <?php else : ?>
                <!-- Grid Projects -->
                <?php get_template_part('app/Views/components/blog-card', null, [
                    'post'           => $post_obj,
                    'variant'        => 'md',
                    'category_label' => $type_label,
                    'cta_text'       => 'Chi tiết',
                    'excerpt_words'  => 15,
                    'theme'          => 'light',
                ]); ?>
            <?php endif; ?>
        <?php endwhile; ?>
        
        <?php if ($count <= 3 && $count > 1) echo '</div>'; // Đóng thẻ nếu ít hơn 4 bài ?>
        <?php if ($count > 3) echo '</div>'; // Đóng thẻ grid-3 ?>

        <!-- Phân trang -->
        <div class="pagination flex justify-center gap-2 mt-12 mb-8">
            <?php
            echo paginate_links([
                'total' => $project_query->max_num_pages,
                'prev_text' => '&laquo; Trước',
                'next_text' => 'Sau &raquo;',
            ]);
            ?>
        </div>

        <?php wp_reset_postdata(); ?>
    <?php else : ?>
        <p class="text-center text-slate-500 mt-10">Hiện chưa có dự án nào được cập nhật.</p>
    <?php endif; ?>






</div></main>

<?php get_footer(); ?>
