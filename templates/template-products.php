<?php
/**
 * Template Name: Trang Sản Phẩm (Tất Cả)
 */
get_header(); ?>

<style>
/* ══════════════════
   RESET & VARIABLES FOR PRODUCT PAGE
══════════════════ */
.products-wrapper {
  --orange:    #f05a25;
  --orange-dk: #c8451a;
  --orange-lt: #fde8df;
  --orange-xlt:#fff4f0;
  --bg:        #f7f4f2;
  --white:     #ffffff;
  --ink:       #111827;
  --mid:       #374151;
  --muted:     #6b7280;
  --light:     #9ca3af;
  --border:    #e8ddd6;
  --border-lt: #f0e8e2;
  --sidebar-w: 256px;
  
  font-family:var(--font-body);
  background:var(--bg);
  color:var(--ink);
  font-size:14px;
  line-height:1.6;
  -webkit-font-smoothing:antialiased;
}


.page-template-template-products-php .products-wrapper * {
  box-sizing: border-box;
}


/* ══════════════════
   CATEGORY MEGA TABS
══════════════════ */
.cat-tabs{
  background:var(--white);
  border-bottom:1px solid var(--border);
  position:sticky;top:60px;z-index:200; /* Adjusted top for theme header */
}
.cat-tabs__inner{
  max-width:1440px;margin:0 auto;
  padding:0 24px;
  display:flex;align-items:center;gap:0;
  overflow-x:auto;scrollbar-width:none;
}
.cat-tabs__inner::-webkit-scrollbar{display:none;}
.cat-tab{
  display:flex;align-items:center;gap:8px;
  padding:0 20px;height:48px;
  font-size:13px;font-weight:600;
  color:var(--muted);
  border:none;background:none;cursor:pointer;
  border-bottom:3px solid transparent;
  white-space:nowrap;
  transition:color .2s,border-color .2s;
  position:relative;
}
.cat-tab:hover{color:var(--ink);}
.cat-tab.active{color:var(--orange);border-bottom-color:var(--orange);}
.cat-tab__icon{
  width:24px;height:24px;border-radius:6px;
  display:flex;align-items:center;justify-content:center;
  font-size:14px;
  background:var(--bg);
  transition:background .2s;
}
.cat-tab.active .cat-tab__icon{background:var(--orange-xlt);}
.cat-tab__count{
  font-size:10px;font-weight:700;
  background:var(--bg);color:var(--muted);
  padding:1px 6px;border-radius:10px;
  transition:background .2s,color .2s;
}
.cat-tab.active .cat-tab__count{background:var(--orange-xlt);color:var(--orange);}

/* ══════════════════
   PAGE LAYOUT
══════════════════ */
.page-body{
  max-width:1440px;margin:0 auto;
  padding:20px 24px 80px;
  display:grid;
  grid-template-columns:var(--sidebar-w) 1fr;
  gap:20px;
  align-items:start;
}

/* ══════════════════
   SIDEBAR
══════════════════ */
.products-wrapper .sidebar{
  position:sticky;
  top:calc(60px + 48px + 20px);
  display:flex;flex-direction:column;gap:6px;
  max-height:calc(100vh - 160px);
  overflow-y:auto;
  scrollbar-width:thin;
  scrollbar-color:var(--border) transparent;
}
.products-wrapper .sidebar::-webkit-scrollbar{width:4px;}
.products-wrapper .sidebar::-webkit-scrollbar-thumb{background:var(--border);border-radius:4px;}

/* Brand filter */
.sidebar-section{
  background:var(--white);
  border:1px solid var(--border);
  border-radius:10px;
  overflow:hidden;
}
.sidebar-section__head{
  padding:12px 14px;
  display:flex;align-items:center;justify-content:space-between;
  cursor:pointer;
  user-select:none;
}
.sidebar-section__title{
  font-size:11.5px;font-weight:700;
  letter-spacing:.1em;text-transform:uppercase;
  color:var(--ink);
  display:flex;align-items:center;gap:8px;
}
.sidebar-section__title::before{
  content:'';display:inline-block;
  width:3px;height:14px;
  background:var(--orange);border-radius:2px;
}
.sidebar-section__arrow{
  width:16px;height:16px;
  stroke:var(--muted);fill:none;stroke-width:2;
  transition:transform .25s;
}
.sidebar-section.open .sidebar-section__arrow{transform:rotate(180deg);}
.sidebar-section__body{
  padding:4px 0 8px;
  border-top:1px solid var(--border-lt);
  display:none;
}
.sidebar-section.open .sidebar-section__body{display:block;}

/* Sub-category list */
.sub-list{list-style:none;}
.sub-item{
  display:flex;align-items:center;gap:0;
}
.sub-item label{
  display:flex;align-items:center;gap:9px;
  padding:7px 14px;width:100%;
  font-size:13px;color:var(--mid);
  cursor:pointer;
  transition:color .15s,background .15s;
  border-radius:0;
  margin:0;
}
.sub-item label:hover{color:var(--orange);background:var(--orange-xlt);}
.sub-item input[type=checkbox]{
  width:15px;height:15px;flex-shrink:0;
  accent-color:var(--orange);cursor:pointer;
  margin:0;
}
.sub-item__count{
  margin-left:auto;
  font-size:10.5px;color:var(--light);font-weight:600;
}

/* Brand logos */
.brand-grid{
  display:flex;flex-direction:column;
  gap:8px;padding:8px 10px;
}
.brand-btn{
  display:flex;align-items:center;justify-content:space-between;
  padding:10px 14px;
  background:var(--bg);
  border:1.5px solid var(--border);
  border-radius:6px;cursor:pointer;
  font-size:13px;font-weight:700;
  color:var(--muted);
  transition:all .2s;
  text-align:left;
}
.brand-btn::after{
  content:'+';
  font-size:16px;font-weight:400;color:var(--light);
}
.brand-btn.active::after{content:'✓';color:var(--orange);font-weight:700;}
.brand-btn:hover{border-color:var(--orange);color:var(--orange);background:var(--orange-xlt);}
.brand-btn.active{border-color:var(--orange);color:var(--orange);background:var(--orange-xlt);}

/* Spec pill grid */
.spec-pill-grid{
  display:grid;grid-template-columns:1fr 1fr 1fr;
  gap:6px;padding:8px 10px;
}
.spec-pill-btn{
  display:flex;flex-direction:column;align-items:center;justify-content:center;
  padding:7px 4px 6px;
  background:var(--bg);
  border:1.5px solid var(--border);
  border-radius:7px;cursor:pointer;
  transition:border-color .2s,background .2s,color .2s;
  min-height:44px;gap:2px;
}
.spec-pill-btn:hover{border-color:var(--orange);background:var(--orange-xlt);}
.spec-pill-btn.active{border-color:var(--orange);background:var(--orange-xlt);}
.spec-pill-btn__val{
  font-size:13px;font-weight:700;
  color:var(--ink);line-height:1;
  transition:color .2s;
}
.spec-pill-btn.active .spec-pill-btn__val,
.spec-pill-btn:hover .spec-pill-btn__val{color:var(--orange);}
.spec-pill-btn__count{
  font-size:9.5px;color:var(--light);font-weight:600;
  transition:color .2s;
}
.spec-pill-btn.active .spec-pill-btn__count,
.spec-pill-btn:hover .spec-pill-btn__count{color:var(--orange);opacity:.7;}

/* ══════════════════
   MAIN CONTENT
══════════════════ */
.main-content{min-width:0;}

/* Page header */
.page-header{margin-bottom:32px;display:flex;justify-content:space-between;align-items:flex-end}
.page-header__left{display:flex;flex-direction:column;gap:4px}
.page-header__eyebrow{font-size:12px;font-weight:700;color:var(--orange);text-transform:uppercase;letter-spacing:0.1em}
.page-header__cat-switch{display:flex;gap:12px;margin:8px 0;border-bottom:1px solid var(--border-lt);padding-bottom:12px;}
.cat-switch-btn{font-family:inherit;font-size:14px;font-weight:700;color:var(--muted);border:none;background:transparent;cursor:pointer;padding:6px 16px;border-radius:4px;transition:0.2s;position:relative;text-transform:uppercase;letter-spacing:0.05em}
.cat-switch-btn.active{color:var(--orange);background:var(--orange-xlt)}
.cat-switch-btn.active::after{content:'';position:absolute;bottom:-13px;left:0;right:0;height:2px;background:var(--orange)}
.cat-switch-btn:hover:not(.active){color:var(--ink);background:var(--bg)}
.page-header__title{
  font-family:var(--font-heading);font-size:48px;font-weight:600;color:var(--ink);line-height:1;
  letter-spacing:-.02em;color:var(--ink);
  margin:0;
}
.page-header__title em{font-style:italic;color:var(--orange);}
.page-header__count{
  font-size:12px;color:var(--muted);margin-top:2px;
}

.page-header__right{display:flex;align-items:center;gap:10px;}

/* Sort select */
.sort-select{
  padding:7px 28px 7px 12px;
  border:1.5px solid var(--border);
  border-radius:7px;
  font-family:var(--font-body),sans-serif;
  font-size:12.5px;font-weight:500;
  color:var(--mid);background:var(--bg);
  cursor:pointer;outline:none;
  appearance:none;
  background-image:url("data:image/svg+xml,%3Csvg width='10' height='6' viewBox='0 0 10 6' fill='none' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1 1l4 4 4-4' stroke='%236b7280' stroke-width='1.5' stroke-linecap='round'/%3E%3C/svg%3E");
  background-repeat:no-repeat;
  background-position:right 10px center;
  transition:border-color .2s;
  margin:0;
}
.sort-select:focus{border-color:var(--orange);}

/* View toggle */
.view-toggle{display:flex;border:1.5px solid var(--border);border-radius:7px;overflow:hidden;}
.view-btn{
  width:34px;height:34px;
  display:flex;align-items:center;justify-content:center;
  background:var(--bg);border:none;cursor:pointer;
  transition:background .2s;
  padding:0;
}
.view-btn.active{background:var(--orange-xlt);}
.view-btn svg{width:14px;height:14px;stroke:var(--muted);fill:none;stroke-width:1.8;}
.view-btn.active svg{stroke:var(--orange);}

/* Active filters */
.active-filters{
  display:flex;flex-wrap:wrap;gap:6px;
  margin-bottom:14px;
}
.active-filter{
  display:inline-flex;align-items:center;gap:5px;
  background:var(--orange-xlt);
  border:1px solid var(--orange-lt);
  color:var(--orange);
  font-size:11.5px;font-weight:600;
  padding:4px 10px;border-radius:20px;
  cursor:pointer;
  transition:background .2s;
}
.active-}
.active-filter__x{font-size:13px;line-height:1;opacity:.7;}
.clear-all{
  display:inline-flex;align-items:center;gap:4px;
  background:none;border:1.5px solid var(--border);
  color:var(--muted);
  font-size:11.5px;font-weight:600;font-family:var(--font-body),sans-serif;
  padding:4px 10px;border-radius:20px;
  cursor:pointer;
  transition:border-color .2s,color .2s;
}
.clear-all:hover{border-color:var(--orange);color:var(--orange);}

/* Sub-category pills */
.sub-pills{
  display:flex;gap:8px;
  margin-bottom:14px;
  overflow-x:auto;scrollbar-width:none;
  padding-bottom:2px;
}
.sub-pills::-webkit-scrollbar{display:none;}
.sub-pill{
  display:inline-flex;align-items:center;gap:6px;
  padding:6px 14px;
  background:var(--white);
  border:1.5px solid var(--border);
  border-radius:20px;
  font-size:12.5px;font-weight:600;
  color:var(--mid);
  white-space:nowrap;cursor:pointer;
  transition:border-color .2s,color .2s,background .2s;
  flex-shrink:0;
}
.sub-pill:hover{border-color:var(--orange);color:var(--orange);}
.sub-pill.active{
  border-color:var(--orange);
  color:var(--orange);
  background:var(--orange-xlt);
}
.sub-pill__count{
  font-size:10px;font-weight:700;
  color:var(--light);
  background:var(--bg);
  padding:1px 6px;border-radius:8px;
}
.sub-pill.active .sub-pill__count{
  background:rgba(240,90,37,.12);color:var(--orange);
}

/* ══════════════════
   PRODUCT GRID
══════════════════ */
.prod-grid{
  display:grid;
  grid-template-columns:repeat(4,1fr);
  gap:12px;
}
.prod-grid.view-list{
  grid-template-columns:1fr;
  gap:8px;
}

/* Card */
.pcard{
  background:var(--white);
  border:1px solid var(--border-lt);
  border-radius:10px;overflow:hidden;
  display:flex;flex-direction:column;
  cursor:pointer;text-decoration:none;
  transition:transform .4s cubic-bezier(.16,1,.3,1),box-shadow .35s,border-color .2s;
}
.pcard:hover{
  transform:translateY(-4px);
  box-shadow:0 16px 48px -8px rgba(240,90,37,.12),0 4px 16px rgba(17,24,39,.06);
  border-color:rgba(240,90,37,.2);
}

.pcard__thumb{
  position:relative;overflow:hidden;
  background:var(--bg);flex-shrink:0;
  aspect-ratio:4/3;
}
.pcard__thumb img{
  width:100%;height:100%;object-fit:cover;object-position:center;
  display:block;
  transition:transform .6s cubic-bezier(.16,1,.3,1),filter .35s;
}
.pcard:hover .pcard__thumb img{transform:scale(1.07);}

.pcard__badge{
  position:absolute;top:9px;left:9px;
  font-size:8.5px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;
  padding:3px 8px;border-radius:4px;z-index:2;
}
.pcard__badge--new{background:var(--orange);color:#fff;}
.pcard__badge--hot{background:var(--ink);color:#fff;}
.pcard__badge--sale{background:#16a34a;color:#fff;}

.pcard__brand{
  position:absolute;bottom:9px;right:9px;
  background:rgba(255,255,255,.82);backdrop-filter:blur(8px);
  border:1px solid rgba(255,255,255,.5);
  font-size:9px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;
  padding:3px 8px;border-radius:4px;
  color:var(--mid);z-index:2;
}

.pcard__body{padding:12px 14px 14px;flex:1;display:flex;flex-direction:column;}
.pcard__cat{font-size:10px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:var(--orange);opacity:.7;margin-bottom:4px;}
.pcard__name{
  font-family:var(--font-heading);
  font-weight:700;font-size:.98rem;
  line-height:1.28;color:var(--ink);
  margin-bottom:6px;flex:1;
  transition:color .2s;
  letter-spacing:-.01em;
}
.pcard:hover .pcard__name{color:var(--orange);}
.pcard__model{font-size:10.5px;color:var(--muted);margin-bottom:10px;}

.pcard__foot{
  display:flex;align-items:center;justify-content:space-between;
  padding-top:10px;border-top:1px solid var(--border-lt);
  margin-top:auto;
}
.pcard__cta{
  font-size:10.5px;font-weight:700;color:var(--orange);
  letter-spacing:.06em;text-transform:uppercase;
  display:flex;align-items:center;gap:3px;
  transition:gap .2s;
}
.pcard__cta::after{content:'→';font-size:11px;}
.pcard:hover .pcard__cta{gap:7px;}
.pcard__tag{
  font-size:9.5px;font-weight:600;
  color:var(--muted);background:var(--bg);
  padding:2px 7px;border-radius:4px;
  border:1px solid var(--border-lt);
}

/* List view */
.view-list .pcard{flex-direction:row;height:100px;}
.view-list .pcard__thumb{width:120px;aspect-ratio:unset;flex-shrink:0;}
.view-list .pcard__thumb img{height:100%;}
.view-list .pcard__body{padding:10px 14px;flex-direction:row;align-items:center;gap:16px;}
.view-list .pcard__name{font-size:.9rem;margin-bottom:0;flex:1;}
.view-list .pcard__model{display:none;}
.view-list .pcard__cat{display:none;}
.view-list .pcard__foot{border:none;padding:0;flex-direction:column;align-items:flex-end;gap:6px;width:auto;flex-shrink:0;}

/* Load more */
.load-more{
  grid-column:1/-1;
  display:flex;justify-content:center;
  padding:20px 0 0;
}
.load-more-btn{
  display:inline-flex;align-items:center;gap:8px;
  padding:11px 28px;
  background:var(--white);
  border:1.5px solid var(--border);
  border-radius:8px;
  font-size:13px;font-weight:600;font-family:var(--font-body),sans-serif;
  color:var(--mid);cursor:pointer;
  transition:border-color .2s,color .2s,background .2s;
}
.load-more-btn:hover{border-color:var(--orange);color:var(--orange);background:var(--orange-xlt);}

/* ══════════════════
   MOBILE FILTER DRAWER
══════════════════ */
.mobile-filter-btn{
  display:none;
  align-items:center;gap:8px;
  padding:9px 16px;
  background:var(--white);
  border:1.5px solid var(--border);
  border-radius:8px;
  font-size:13px;font-weight:600;
  color:var(--mid);cursor:pointer;
}
.mobile-filter-btn svg{width:15px;height:15px;stroke:currentColor;fill:none;stroke-width:2;}
.mobile-filter-badge{
  background:var(--orange);color:#fff;
  font-size:9px;font-weight:700;
  width:16px;height:16px;border-radius:50%;
  display:flex;align-items:center;justify-content:center;
}

.drawer-overlay{
  display:none;position:fixed;inset:0;background:rgba(17,24,39,.45);z-index:9000;
  backdrop-filter:blur(2px);
}
.drawer-overlay.open{display:block;}
.filter-drawer{
  position:fixed;left:0;top:0;bottom:0;width:min(320px,90vw);
  background:var(--white);z-index:9001;
  transform:translateX(-100%);transition:transform .35s cubic-bezier(.16,1,.3,1);
  overflow-y:auto;
  display:flex;flex-direction:column;
}
.filter-drawer.open{transform:translateX(0);}
.drawer-head{
  display:flex;align-items:center;justify-content:space-between;
  padding:16px 18px;border-bottom:1px solid var(--border);
  flex-shrink:0;
  position:sticky;top:0;background:var(--white);z-index:1;
}
.drawer-head__title{font-weight:700;font-size:15px;color:var(--ink);}
.drawer-close{
  width:32px;height:32px;border:none;background:var(--bg);border-radius:7px;
  cursor:pointer;display:flex;align-items:center;justify-content:center;
}
.drawer-close svg{width:16px;height:16px;stroke:var(--mid);fill:none;stroke-width:2;}
.drawer-body{padding:12px;flex:1;}
.drawer-apply{
  padding:14px 18px;border-top:1px solid var(--border);flex-shrink:0;
  position:sticky;bottom:0;background:var(--white);z-index:1;
}
.drawer-apply-btn{
  width:100%;padding:12px;
  background:var(--orange);color:#fff;
  font-size:14px;font-weight:700;font-family:var(--font-body),sans-serif;
  border:none;border-radius:8px;cursor:pointer;
  transition:background .2s;
}
.drawer-apply-btn:hover{background:var(--orange-dk);}

/* ANIMATIONS */
@keyframes fadeUp{
  from{opacity:0;transform:translateY(14px);}
  to{opacity:1;transform:translateY(0);}
}
.pcard{opacity:0;animation:fadeUp .55s cubic-bezier(.16,1,.3,1) forwards;}

/* ══════════════════
   RESPONSIVE
══════════════════ */
@media(max-width:1200px){
  .prod-grid{grid-template-columns:repeat(3,1fr);}
}
@media(max-width:960px){
  .page-body{grid-template-columns:1fr;gap:12px;}
  .products-wrapper .sidebar{display:none;}
  .mobile-filter-btn{display:flex;}
  .prod-grid{grid-template-columns:repeat(3,1fr);}
}
@media(max-width:640px){
  .prod-grid{grid-template-columns:repeat(2,1fr);gap:8px;}
  .page-body{padding:12px 10px 60px;}
  .pcard__body{padding:8px 10px 10px;}
  .pcard__name{font-size:.85rem;margin-bottom:4px;line-height:1.2;}
  .pcard__model{font-size:9.5px;margin-bottom:6px;}
  .pcard__foot{padding-top:6px;}
  .pcard__cta{font-size:9.5px;}
  .pcard__tag{font-size:8.5px;padding:2px 5px;}
  .page-header{flex-direction:column;align-items:flex-start;gap:12px;margin-bottom:20px;}
  .cat-switch-btn{padding:6px 10px;font-size:12px;}
  .page-header__cat-switch{flex-wrap:wrap; gap:8px;}
  .products-wrapper { max-width: 100vw; overflow-x: hidden; }
}
/* ══════════════════
   SEO CONTENT TYPOGRAPHY
══════════════════ */
.desc-content h2 { font-family: var(--font-heading); font-weight: 800; font-size: 1.6rem; color: var(--ink); margin: 36px 0 16px; position: relative; padding-left: 18px; letter-spacing: -0.01em; }
.desc-content h2::before { content: ''; position: absolute; left: 0; top: 4px; bottom: 4px; width: 4px; background: var(--orange); border-radius: 4px; }
.desc-content h3 { font-family: var(--font-heading); font-weight: 700; font-size: 1.35rem; color: var(--ink); margin: 28px 0 12px; position: relative; padding-left: 14px; }
.desc-content h3::before { content: ''; position: absolute; left: 0; top: 4px; bottom: 4px; width: 3px; background: var(--orange); border-radius: 3px; opacity: 0.8; }
.desc-content h4 { font-family: var(--font-heading); font-weight: 700; font-size: 1.15rem; color: var(--ink); margin: 24px 0 10px; }
.desc-content h5 { font-family: var(--font-heading); font-weight: 600; font-size: 1.05rem; color: var(--ink); margin: 20px 0 8px; }
.desc-content p { font-size: 14.5px; color: var(--mid); line-height: 1.8; margin-bottom: 18px; }
.desc-content ul { list-style: none; margin-bottom: 18px; padding:0;}
.desc-content ul li { padding: 8px 0 8px 24px; position: relative; font-size: 14px; color: var(--mid); line-height: 1.65; border-bottom: 1px solid var(--border-lt); }
.desc-content ul li:last-child { border-bottom: none; }
.desc-content ul li::before { content: ''; position: absolute; left: 0; top: 16px; width: 8px; height: 8px; border-radius: 50%; background: var(--orange); opacity: .65; }
</style>

<div class="products-wrapper">
  <!-- ══ PAGE BODY ══ -->
  <div class="page-body">

    <!-- ── SIDEBAR ── -->
    <aside class="sidebar" id="sidebarMain">

      <!-- Brand filter -->
      <div class="sidebar-section open" id="sec-brand">
        <div class="sidebar-section__head" onclick="toggleSection('sec-brand')">
          <span class="sidebar-section__title">Nhãn hàng</span>
          <svg class="sidebar-section__arrow" viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="sidebar-section__body">
          <div class="brand-grid" id="brand-grid"></div>
        </div>
      </div>

      <!-- Sub-category filter -->
      <div class="sidebar-section open" id="sec-subcat">
        <div class="sidebar-section__head" onclick="toggleSection('sec-subcat')">
          <span class="sidebar-section__title">Danh mục</span>
          <svg class="sidebar-section__arrow" viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="sidebar-section__body">
          <ul class="sub-list" id="subcat-list"></ul>
        </div>
      </div>

      <!-- Specs filter -->
      <div class="sidebar-section open" id="sec-spec">
        <div class="sidebar-section__head" onclick="toggleSection('sec-spec')">
          <span class="sidebar-section__title" id="spec-title">Thông số kỹ thuật</span>
          <svg class="sidebar-section__arrow" viewBox="0 0 24 24"><polyline points="6 9 12 15 18 9"/></svg>
        </div>
        <div class="sidebar-section__body">
          <ul class="sub-list" id="spec-list"></ul>
        </div>
      </div>

    </aside>

    <!-- ── MAIN CONTENT ── -->
    <main class="main-content">

      <!-- Page header -->
      <div class="page-header">
        <div class="page-header__left">
          <div class="page-header__eyebrow" id="header-eyebrow">Sản phẩm</div>
          <div class="page-header__cat-switch">
            <button class="cat-switch-btn active" onclick="switchCat('led')">Màn hình LED</button>
            <button class="cat-switch-btn" onclick="switchCat('am-thanh')">Thiết bị âm thanh</button>
            <button class="cat-switch-btn" onclick="switchCat('anh-sang')">Thiết bị ánh sáng</button>
          </div>
          <h1 class="page-header__title" id="header-title">Màn hình <em>LED</em></h1>
          <div class="page-header__count" id="header-count">Hiển thị 48 sản phẩm</div>
        </div>
        <div class="page-header__right">
          <button class="mobile-filter-btn" onclick="openDrawer()">
            <svg viewBox="0 0 24 24"><line x1="4" y1="6" x2="20" y2="6"/><line x1="8" y1="12" x2="20" y2="12"/><line x1="12" y1="18" x2="20" y2="18"/></svg>
            Lọc
            <span class="mobile-filter-badge">2</span>
          </button>
          
          <select class="sort-select" onchange="handleSort(this)" style="display:none;">
             <option>Mặc định</option>
          </select>
          <div class="view-toggle">
            <button class="view-btn active" id="btn-grid" onclick="setView('grid')" title="Lưới">
              <svg viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7"/><rect x="14" y="3" width="7" height="7"/><rect x="3" y="14" width="7" height="7"/><rect x="14" y="14" width="7" height="7"/></svg>
            </button>
            <button class="view-btn" id="btn-list" onclick="setView('list')" title="Danh sách">
              <svg viewBox="0 0 24 24"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>
            </button>
          </div>
        </div>
      </div>

      <!-- Active filters -->
      <div class="active-filters" id="active-filters" style="display:none"></div>

      <!-- Sub-category pills -->
      <div class="sub-pills" id="sub-pills"></div>

      <!-- Product grid -->
      <div class="prod-grid" id="prod-grid"></div>

    </main>
  </div><!-- /page-body -->

  <!-- ══ MOBILE FILTER DRAWER ══ -->
  <div class="drawer-overlay" id="drawerOverlay" onclick="closeDrawer()"></div>
  <div class="filter-drawer" id="filterDrawer">
    <div class="drawer-head">
      <span class="drawer-head__title">Bộ lọc</span>
      <button class="drawer-close" onclick="closeDrawer()">
        <svg viewBox="0 0 24 24"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
      </button>
    </div>
    <div class="drawer-body" id="drawerBody">
      <!-- cloned from sidebar by JS -->
    </div>
    <div class="drawer-apply">
      <button class="drawer-apply-btn" onclick="closeDrawer()">Xem kết quả</button>
    </div>
  </div>
</div>

<!-- ================= DYNAMIC SEO SECTION ================= -->
<section id="category-seo" class="py-20 bg-white border-t border-gray-100">
    <div class="container mx-auto px-6 lg:px-12 max-w-[1600px]">
        <div style="display: flex; flex-wrap: wrap; gap: 50px;">
            <!-- Left: SEO Article -->
            <div style="flex: 1; min-width: 0;">
                <h2 id="seo-title" style="font-family: var(--font-heading); font-weight: 800; font-size: clamp(1.6rem, 3vw, 2.2rem); color: var(--ink); margin: 0 0 24px; line-height: 1.2; letter-spacing: -0.02em;"></h2>
                
                <div class="prod-desc-wrapper" style="position: relative;">
                    <div id="seo-content-wrapper" style="max-height: 480px; overflow: hidden; position: relative; transition: max-height 0.4s ease;">
                        <div id="seo-content" class="desc-content text-gray-600 pr-4 lg:pr-10"></div>
                        <div class="prod-desc-gradient" style="position: absolute; bottom: 0; left: 0; right: 0; height: 120px; background: linear-gradient(to bottom, rgba(255,255,255,0), rgba(255,255,255,1)); pointer-events: none; transition: opacity 0.3s ease;"></div>
                    </div>
                    
                    <button class="prod-desc-btn" onclick="toggleSeoDesc(this)" style="display: inline-flex; align-items: center; justify-content: center; gap: 6px; margin: 24px 0 0; background: var(--white); border: 1px solid var(--border-lt); border-radius: 6px; color: var(--ink); font-weight: 600; font-size: 13px; cursor: pointer; letter-spacing: 0.02em; padding: 10px 24px; transition: all 0.2s; box-shadow: 0 2px 8px rgba(17,24,39,0.02);" onmouseover="this.style.borderColor='var(--orange)';this.style.color='var(--orange)';" onmouseout="this.style.borderColor='var(--border-lt)';this.style.color='var(--ink)';">Đọc toàn bộ nội dung <svg style="width:16px;height:16px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg></button>
                </div>
            </div>

            <!-- Right: Widget Sidebar -->
            <div style="width: 100%; max-width: 340px; flex-shrink: 0; padding-left: 30px; border-left: 1px solid var(--border-lt);">
                <!-- DỰ ÁN NỔI BẬT -->
                <h3 style="margin-top:0; margin-bottom: 24px; border-bottom: 2px solid var(--orange); padding-bottom: 12px; font-size: 15px; font-weight: 800; text-transform: uppercase; color: var(--ink); letter-spacing: 0.05em;">Dự án nổi bật</h3>
                <div style="display: flex; flex-direction: column; gap: 18px; margin-bottom: 40px;">
                    <?php
                    $duan_query = new WP_Query([
                        'post_type' => 'post',
                        'category_name' => 'du-an',
                        'posts_per_page' => 4,
                        'orderby' => 'date',
                        'order' => 'DESC'
                    ]);
                    if ($duan_query->have_posts()) {
                        while ($duan_query->have_posts()) {
                            $duan_query->the_post();
                            $news_img = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'medium') : 'https://placehold.co/400x400/fff8f6/f05a25?text=Du+An';
                            ?>
                            <a href="<?php echo get_permalink(); ?>" style="display: flex; gap: 14px; align-items: flex-start; text-decoration: none;" onmouseover="this.querySelector('h4').style.color='var(--orange)'" onmouseout="this.querySelector('h4').style.color='var(--ink)'">
                                <div style="width: 80px; height: 80px; border-radius: 8px; overflow: hidden; flex-shrink: 0; border: 1px solid var(--border-lt); aspect-ratio: 1/1;">
                                    <img style="width: 100%; height: 100%; object-fit: cover;" src="<?php echo esc_url($news_img); ?>" alt="<?php the_title_attribute(); ?>">
                                </div>
                                <div style="flex: 1;">
                                    <h4 style="margin: 0 0 6px; font-size: 13px; line-height: 1.45; font-weight: 700; color: var(--ink); text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; transition: color 0.2s;"><?php echo get_the_title(); ?></h4>
                                    <div style="font-size: 11px; color: var(--muted); font-weight: 500; font-family: monospace;"><?php echo get_the_date('d/m/Y'); ?></div>
                                </div>
                            </a>
                            <?php
                        }
                        wp_reset_postdata();
                    }
                    ?>
                </div>

                <!-- TIN TỨC & KIẾN THỨC -->
                <h3 style="margin-top:0; margin-bottom: 24px; border-bottom: 2px solid var(--orange); padding-bottom: 12px; font-size: 15px; font-weight: 800; text-transform: uppercase; color: var(--ink); letter-spacing: 0.05em;">Tin tức & Kiến thức</h3>
                <div style="display: flex; flex-direction: column; gap: 18px;">
                    <?php
                    $du_an_cat_id = get_cat_ID('du-an');
                    $tin_query = new WP_Query([
                        'post_type' => 'post',
                        'category__not_in' => $du_an_cat_id ? [$du_an_cat_id] : [],
                        'posts_per_page' => 4,
                        'orderby' => 'date',
                        'order' => 'DESC'
                    ]);
                    if ($tin_query->have_posts()) {
                        while ($tin_query->have_posts()) {
                            $tin_query->the_post();
                            $news_img = has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'medium') : 'https://placehold.co/400x400/fff8f6/f05a25?text=Press';
                            ?>
                            <a href="<?php echo get_permalink(); ?>" style="display: flex; gap: 14px; align-items: flex-start; text-decoration: none;" onmouseover="this.querySelector('h4').style.color='var(--orange)'" onmouseout="this.querySelector('h4').style.color='var(--ink)'">
                                <div style="width: 80px; height: 80px; border-radius: 8px; overflow: hidden; flex-shrink: 0; border: 1px solid var(--border-lt); aspect-ratio: 1/1;">
                                    <img style="width: 100%; height: 100%; object-fit: cover;" src="<?php echo esc_url($news_img); ?>" alt="<?php the_title_attribute(); ?>">
                                </div>
                                <div style="flex: 1;">
                                    <h4 style="margin: 0 0 6px; font-size: 13px; line-height: 1.45; font-weight: 700; color: var(--ink); text-overflow: ellipsis; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; transition: color 0.2s;"><?php echo get_the_title(); ?></h4>
                                    <div style="font-size: 11px; color: var(--muted); font-weight: 500; font-family: monospace;"><?php echo get_the_date('d/m/Y'); ?></div>
                                </div>
                            </a>
                            <?php
                        }
                        wp_reset_postdata();
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ================= SECTION: THƯ VIỆN DỰ ÁN ================= -->
<section id="projects" class="py-24 md:py-32 bg-brand-navy reveal-up">
    <div class="container mx-auto px-6 lg:px-12 max-w-[1600px]">
        <div class="main-tava-heading main-tava-heading--light">
            <div class="main-tava-heading__eyebrow">Visual Portfolio</div>
            <h3 class="main-tava-heading__title">Dấu Ấn <em>TavaLLS</em></h3>
            <p class="main-tava-heading__desc">Không gì chứng minh năng lực tốt hơn những dự án thực tế. Chúng tôi định nghĩa lại không gian bằng ánh sáng và âm thanh đỉnh cao.</p>
        </div>
    </div>

    <div class="w-full relative gallery-wrap bg-[#1c2857]" id="homeGalleryWrap">
        <div class="gallery-grid reveal-up delay-1" id="homeGalleryGrid">
            <?php
            $project_ids_str = get_option('tavaled_home_projects');
            $project_ids = !empty($project_ids_str) ? explode(',', $project_ids_str) : [];
            
            if (!empty($project_ids)) {
                foreach ($project_ids as $id) {
                    $img_src = wp_get_attachment_image_url($id, 'full');
                    if (!$img_src) continue;
            ?>
            <div class="g-item">
                <img src="<?php echo esc_url($img_src); ?>" alt="" loading="lazy">
            </div>
            <?php 
                }
            } else {
            ?>
 <div class="g-item"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0024_TavaLED_Hinh_Anh.jpg" alt="EDM"></div>
 <div class="g-item"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0025_TavaLED_Hinh_Anh.jpg" alt="Club"></div>
 <div class="g-item"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0026_TavaLED_Hinh_Anh.jpg" alt="Laser"></div>
 <div class="g-item"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0027_TavaLED_Hinh_Anh.jpg" alt="Concert"></div>
 <div class="g-item"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0028_TavaLED_Hinh_Anh.jpg" alt="Stage"></div>
            <?php } ?>
        </div>
        <div class="gallery-overlay" id="homeGalleryOverlay">
            <button class="btn-outline gallery-overlay-btn interactive" id="btnShowMoreGallery">
                Chiêm ngưỡng trọn vẹn các dự án <i class="ph-bold ph-caret-down"></i>
            </button>
        </div>
    </div>
</section>

<!-- ================= SECTION: CTA ================= -->
<section class="relative py-40 overflow-hidden bg-[#1c2857] flex items-center justify-center border-t border-brand-orange">
 <img src="https://tavaled.vn/wp-content/uploads/2026/03/0029_TavaLED_Hinh_Anh.jpg" alt="Background" class="absolute inset-0 w-full h-full object-cover" loading="lazy">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_70%_80%_at_50%_50%,rgba(240,90,37,0.15)_0%,rgba(2,6,23,0.9)_70%)]"></div>
    
    <div class="container mx-auto px-4 relative z-10 text-center reveal-up">
        <h2 class="font-serif font-black text-5xl md:text-7xl text-white mb-6 tracking-tight">
            Bắt đầu dự án của bạn<br><em class="text-brand-orange italic font-light">— ngay hôm nay</em>
        </h2>
        <p class="text-white/60 text-lg max-w-2xl mx-auto mb-10">Liên hệ với chuyên gia của TavaLLS để nhận bản vẽ giải pháp 3D và báo giá chi tiết hoàn toàn miễn phí.</p>
        
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="tel:0936 543 389" class="btn-primary interactive">Gọi Hotline 0936 543 389</a>
            <a href="mailto:tuyen.tavaco@gmail.com" class="btn-outline interactive">Liên hệ tư vấn</a>
        </div>
    </div>
</section>

<script>
<?php
$cat_definitions = [
  'led' => [
    'db_name' => 'Màn hình LED',
    'title' => 'Màn hình <em>LED</em>', 'eyebrow' => 'LED Display',
    'seo_title' => 'Giải pháp Màn hình LED Chuyên nghiệp',
    'seo_content' => '<p>TavaLLS cung cấp các giải pháp hiển thị Màn hình LED đa dạng từ trong nhà (Indoor) đến ngoài trời (Outdoor). Với công nghệ pixel pitch siêu nhỏ, màn hình LED mang lại chất lượng hình ảnh sắc nét, màu sắc chân thực và độ bền vượt trội. Chúng tôi nhận tư vấn, thiết kế và thi công trọn gói cho hội trường, phòng họp, trung tâm thương mại và các dự án quy mô lớn.</p>',
    'pills' => ['Tất cả','LED trong nhà','LED ngoài trời','Sân khấu','Trong suốt'],
    'specTitle' => 'Pixel Pitch',
    'specs' => [
      ['label'=>'P1.5', 'cats'=>['LED trong nhà']], ['label'=>'P2', 'cats'=>['LED trong nhà']],
      ['label'=>'P2.5', 'cats'=>['LED trong nhà']], ['label'=>'P3', 'cats'=>['LED trong nhà','LED ngoài trời','LED sân khấu (Rental)']],
      ['label'=>'P4', 'cats'=>['LED trong nhà','LED ngoài trời','LED sân khấu (Rental)']], ['label'=>'P5', 'cats'=>['LED ngoài trời','LED sân khấu (Rental)']],
      ['label'=>'P6', 'cats'=>['LED ngoài trời']], ['label'=>'P8', 'cats'=>['LED ngoài trời']], ['label'=>'P10', 'cats'=>['LED ngoài trời']],
    ]
  ],
  'am-thanh' => [
    'db_name' => 'Thiết bị âm thanh',
    'title' => 'Thiết bị <em>Âm Thanh</em>', 'eyebrow' => 'Audio Equipment',
    'seo_title' => 'Hệ thống Âm thanh Sự kiện đỉnh cao',
    'seo_content' => '<p>Từ hệ thống loa Line Array công suất lớn cho sân khấu ngoài trời đến các dàn âm thanh hội thảo chuyên dụng, TavaLLS phân phối thiết bị âm thanh chính hãng chất lượng cao. Chúng tôi cung cấp giải pháp toàn diện đáp ứng mọi quy mô sự kiện với chất âm trong trẻo, trung thực và uy lực nhất.</p>',
    'pills' => ['Tất cả','Loa','Amply','Micro','Sub','Đẩy công suất','Vang số','Mixer','Crossover'],
    'specTitle' => 'Công suất',
    'specs' => [
      ['label'=>'Dưới 200W','count'=>18], ['label'=>'200W – 500W','count'=>24], ['label'=>'500W – 1000W','count'=>20], ['label'=>'Trên 1000W','count'=>16]
    ]
  ],
  'anh-sang' => [
    'db_name' => 'Thiết bị ánh sáng',
    'title' => 'Thiết bị <em>Ánh Sáng</em>', 'eyebrow' => 'Lighting Equipment',
    'seo_title' => 'Hệ thống Ánh sáng Nghệ thuật',
    'seo_content' => '<p>Đánh thức mọi giác quan với hệ thống ánh sáng kỹ thuật số từ TavaLLS. Chúng tôi chuyên lắp đặt đèn Moving Head, đèn Par LED, Laser và hệ thống điều khiển thông minh. Giải pháp ánh sáng của chúng tôi không chỉ đáp ứng công năng chiếu sáng mà còn tạo ra những hiệu ứng thị giác mãn nhãn, nâng tầm trải nghiệm cho mọi không gian.</p>',
    'pills' => ['Tất cả','Moving Head','Par LED','Laser','Fog/Khói','Strobo','Follow Spot','LED Bar','DMX'],
    'specTitle' => 'Công suất đèn',
    'specs' => [
      ['label'=>'Dưới 200W','count'=>20], ['label'=>'200W – 400W','count'=>28], ['label'=>'400W – 700W','count'=>18], ['label'=>'Trên 700W','count'=>8]
    ]
  ]
];

$dynamic_data = [];

foreach ($cat_definitions as $cat_slug => $def) {
    $dynamic_data[$cat_slug] = $def;
    $dynamic_data[$cat_slug]['products'] = [];
    $dynamic_data[$cat_slug]['brands'] = [];
    $dynamic_data[$cat_slug]['subcats'] = [];
    
    // Fetch products
    $args = [
        'post_type' => 'tava_product',
        'posts_per_page' => -1,
        'orderby' => ['menu_order' => 'ASC', 'date' => 'DESC'],
        'tax_query' => [
            [
                'taxonomy' => 'product_cat',
                'field' => 'name',
                'terms' => $def['db_name']
            ]
        ]
    ];
    $query = new WP_Query($args);
    
    $brands_raw = [];
    $subcats_raw = [];
    $total_count = $query->found_posts;
    $dynamic_data[$cat_slug]['count'] = $total_count;

    if ($query->have_posts()) {
        while ($query->have_posts()) {
            $query->the_post();
            $post_id = get_the_ID();
            
            $model = get_post_meta($post_id, '_product_model', true);
            $tag = get_post_meta($post_id, '_product_tag', true);
            $img = get_post_meta($post_id, '_product_img', true);
            if (!$img) $img = get_the_post_thumbnail_url($post_id, 'medium');
 if (!$img) $img = 'https://tavaled.vn/wp-content/uploads/2026/03/0030_TavaLED_Hinh_Anh.jpg'; // fallback

            $terms_sub = wp_get_post_terms($post_id, 'product_subcat');
            $subcat_name = !empty($terms_sub) ? $terms_sub[0]->name : '';
            if ($subcat_name) {
                if (!isset($subcats_raw[$subcat_name])) $subcats_raw[$subcat_name] = 0;
                $subcats_raw[$subcat_name]++;
            }

            $terms_brand = wp_get_post_terms($post_id, 'product_brand');
            $brand_name = !empty($terms_brand) ? $terms_brand[0]->name : '';
            if ($brand_name) $brands_raw[$brand_name] = true;

            $terms_badge = wp_get_post_terms($post_id, 'product_badge');
            $badge_name = !empty($terms_badge) ? $terms_badge[0]->name : '';

            ob_start();
            $GLOBALS['post'] = get_post($post_id);
            setup_postdata($GLOBALS['post']);
            get_template_part('app/Views/components/product-card');
            $html_content = ob_get_clean();

            $dynamic_data[$cat_slug]['products'][] = [
                'name' => get_the_title(),
                'model' => $model,
                'cat' => $subcat_name,
                'badge' => $badge_name,
                'brand' => $brand_name,
                'tag' => $tag,
                'img' => $img,
                'html' => $html_content
            ];
        }
        wp_reset_postdata();
    }

    $dynamic_data[$cat_slug]['brands'] = array_keys($brands_raw);
    
    $built_subcats = [
        ['label' => 'Tất cả', 'count' => $total_count, 'active' => true]
    ];
    foreach ($subcats_raw as $sc_name => $sc_count) {
        $built_subcats[] = ['label' => $sc_name, 'count' => $sc_count];
    }
    $dynamic_data[$cat_slug]['subcats'] = $built_subcats;
}
?>
const DATA = <?php echo json_encode($dynamic_data, JSON_UNESCAPED_UNICODE); ?>;

let currentCat = 'led';
let currentView = 'grid';

function renderAll(catKey) {
  const d = DATA[catKey];

  document.getElementById('header-eyebrow').textContent = d.eyebrow;
  document.getElementById('header-title').innerHTML = d.title;
  document.getElementById('header-count').textContent = `Hiển thị ${d.count} sản phẩm`;
  
  // Inject SEO Content
  document.getElementById('seo-title').innerHTML = d.seo_title || '';
  document.getElementById('seo-content').innerHTML = d.seo_content || '';

  const bg = document.getElementById('brand-grid');
  bg.innerHTML = d.brands.map(b =>
    `<button class="brand-btn" onclick="toggleBrand(this,'${b}')"><span>${b}</span></button>`
  ).join('');

  const sl = document.getElementById('subcat-list');
  sl.innerHTML = d.subcats.map((s,i) =>
    `<li class="sub-item">
      <label>
        <input type="checkbox" value="${s.label}" ${s.active?'checked':''} onchange="handleCheckboxExclusive(this, 'subcat-list'); applyFilters()">
        ${s.label}
      </label>
    </li>`
  ).join('');

  document.getElementById('spec-title').textContent = d.specTitle;
  const specList = document.getElementById('spec-list');
  if (d.specTitle === 'Pixel Pitch') {
    specList.outerHTML = `<div class="spec-pill-grid" id="spec-list">${
      d.specs.map(s =>
        `<button class="spec-pill-btn" data-val="${s.label}" data-cats='${JSON.stringify(s.cats)}' onclick="handleSpecPillExclusive(this); applyFilters()">
          <span class="spec-pill-btn__val">${s.label}</span>
        </button>`
      ).join('')
    }</div>`;
  } else {
    specList.outerHTML = `<ul class="sub-list" id="spec-list">${
      d.specs.map(s =>
        `<li class="sub-item">
          <label>
            <input type="checkbox" value="${s.label}" onchange="handleCheckboxExclusive(this, 'spec-list'); applyFilters()">
            ${s.label}
          </label>
        </li>`
      ).join('')
    }</ul>`;
  }

  const pills = document.getElementById('sub-pills');
  pills.innerHTML = d.pills.map((p,i) =>
    `<button class="sub-pill ${i===0?'active':''}" onclick="activePill(this)">
      ${p}
    </button>`
  ).join('');

  renderProducts(d.products);
  document.getElementById('drawerBody').innerHTML = document.getElementById('sidebarMain').innerHTML;
}

function renderProducts(products) {
  window.currentFilteredData = products;
  renderPage(1, false);
}

function renderPage(page, scroll = true) {
  currentPage = page;
  const products = window.currentFilteredData || DATA[currentCat].products;
  const itemsPerPage = window.innerWidth <= 768 ? 8 : 16;
  const totalPages = Math.ceil(products.length / itemsPerPage);
  
  if (page < 1) page = 1;
  if (page > totalPages && totalPages > 0) page = totalPages;
  
  const start = (page - 1) * itemsPerPage;
  const spliced = products.slice(start, start + itemsPerPage);
  
  const grid = document.getElementById('prod-grid');
  grid.className = `prod-grid${currentView === 'list' ? ' view-list' : ''}`;
  
  let html = spliced.map((p, i) => {
    return p.html.replace('<div class="product-card', `<div style="animation-delay:${(i%8)*0.04+0.04}s" class="product-card`);
  }).join('');
  
  if (totalPages > 1) {
    let pagHtml = `<div class="load-more" style="grid-column: 1 / -1; display: flex; justify-content: center; flex-wrap: wrap; gap: 6px; padding-top: 24px; margin-bottom: 24px;">`;
    
    if (page > 1) {
      pagHtml += `<button onclick="renderPage(${page - 1}, true)" class="w-9 h-9 flex items-center justify-center bg-white border border-gray-200 text-gray-500 hover:text-brand-orange hover:border-brand-orange transition-colors rounded-xl shadow-sm"><i class="ph-bold ph-caret-left"></i></button>`;
    }
    
    for (let i = 1; i <= totalPages; i++) {
        if (i === 1 || i === totalPages || (i >= page - 1 && i <= page + 1)) {
            if (i === page) {
                pagHtml += `<button class="w-9 h-9 flex items-center justify-center bg-brand-orange text-white font-bold rounded-xl shadow-sm">${i}</button>`;
            } else {
                pagHtml += `<button onclick="renderPage(${i}, true)" class="w-9 h-9 flex items-center justify-center bg-white border border-gray-200 text-gray-700 hover:text-brand-orange hover:border-brand-orange transition-colors font-semibold rounded-xl shadow-sm">${i}</button>`;
            }
        } else if (i === page - 2 || i === page + 2) {
            pagHtml += `<span class="text-gray-400 w-9 h-9 flex items-center justify-center">...</span>`;
        }
    }
    
    if (page < totalPages) {
      pagHtml += `<button onclick="renderPage(${page + 1}, true)" class="w-9 h-9 flex items-center justify-center bg-white border border-gray-200 text-gray-500 hover:text-brand-orange hover:border-brand-orange transition-colors rounded-xl shadow-sm"><i class="ph-bold ph-caret-right"></i></button>`;
    }
    pagHtml += `</div>`;
    html += pagHtml;
  }
  
  grid.innerHTML = html || '<div style="grid-column: 1 / -1; padding: 40px; text-align: center; color: #6b7280; font-weight: 500;">Không tìm thấy sản phẩm phù hợp.</div>';
  
  if (scroll) {
      const headerTitle = document.getElementById('header-title');
      if (headerTitle) {
          const rect = headerTitle.getBoundingClientRect();
          window.scrollTo({
              top: window.pageYOffset + rect.top - 120,
              behavior: 'smooth'
          });
      }
  }
}

function toggleSection(id) {
  const sec = document.getElementById(id);
  sec.classList.toggle('open');
}

function switchCat(catKey) {
  document.querySelectorAll('.cat-switch-btn').forEach(b => b.classList.remove('active'));
  const targetBtn = document.querySelector(`.cat-switch-btn[onclick*="'${catKey}'"]`);
  if (targetBtn) targetBtn.classList.add('active');

  // Push URL History without reload
  const url = new URL(window.location);
  url.searchParams.set('cat', catKey);
  url.searchParams.delete('subcat'); // Xoá subcat khi nhảy cat mới
  window.history.pushState({}, '', url);

  currentCat = catKey;
  renderAll(catKey);
}

function toggleBrand(btn, brand) {
  btn.classList.toggle('active');
  refreshActiveFilters();
  applyFilters();
}

function handleCheckboxExclusive(cb, listId) {
    const list = document.getElementById(listId);
    if (!list) return;
    const isAll = cb.value === 'Tất cả';
    const checkboxes = list.querySelectorAll('input[type="checkbox"]');
    
    if (isAll && cb.checked) {
        // Nếu chọn "Tất cả", bỏ chọn tất cả các lựa chọn khác
        checkboxes.forEach(c => {
            if (c !== cb) c.checked = false;
        });
    } else if (!isAll && cb.checked) {
        // Nếu chọn một lựa chọn khác, bỏ chọn "Tất cả"
        checkboxes.forEach(c => {
            if (c.value === 'Tất cả') c.checked = false;
        });
    }

    // Đồng bộ lại Pill ngang
    if (listId === 'subcat-list') {
        const checkedVal = list.querySelector('input[type="checkbox"]:checked')?.value || 'Tất cả';
        document.querySelectorAll('.sub-pill').forEach(p => {
            if (p.textContent.trim().toLowerCase() === checkedVal.toLowerCase()) {
                p.classList.add('active');
            } else {
                p.classList.remove('active');
            }
        });
        if (currentCat === 'led') filterPixelPitch(checkedVal);
    }
}

function handleSpecPillExclusive(btn) {
    btn.classList.toggle('active');
    const isAll = btn.getAttribute('data-val') === 'Tất cả';
    const list = btn.closest('.spec-pill-grid');
    if (!list) return;
    const btns = list.querySelectorAll('.spec-pill-btn');
    
    if (isAll && btn.classList.contains('active')) {
        btns.forEach(b => {
            if (b !== btn) b.classList.remove('active');
        });
    } else if (!isAll && btn.classList.contains('active')) {
        btns.forEach(b => {
            if (b.getAttribute('data-val') === 'Tất cả') b.classList.remove('active');
        });
    }
}

function activePill(btn) {
  document.querySelectorAll('.sub-pill').forEach(p => p.classList.remove('active'));
  btn.classList.add('active');
  
  const pillText = btn.textContent.trim();
  
  // Đồng bộ lại Checkbox dọc
  const list = document.getElementById('subcat-list');
  if (list) {
      const checkboxes = list.querySelectorAll('input[type="checkbox"]');
      checkboxes.forEach(cb => {
          if (pillText === 'Tất cả') {
              cb.checked = (cb.value === 'Tất cả');
          } else {
              cb.checked = (cb.value.toLowerCase() === pillText.toLowerCase());
          }
      });
  }
  
  if (currentCat === 'led') filterPixelPitch(pillText);
  applyFilters();
}

function filterPixelPitch(subcatLabel) {
  const grid = document.getElementById('spec-list');
  if (!grid || !grid.classList.contains('spec-pill-grid')) return;
  const btns = grid.querySelectorAll('.spec-pill-btn');
  btns.forEach(btn => {
    const cats = JSON.parse(btn.dataset.cats || '[]');
    const show = subcatLabel === 'Tất cả' || cats.some(c => c.toLowerCase().includes(subcatLabel.toLowerCase()));
    btn.style.display = show ? '' : 'none';
    if (!show) btn.classList.remove('active');
  });
}

function setView(v) {
  currentView = v;
  const grid = document.getElementById('prod-grid');
  if (v === 'list') {
    grid.classList.add('view-list');
    document.getElementById('btn-grid').classList.remove('active');
    document.getElementById('btn-list').classList.add('active');
  } else {
    grid.classList.remove('view-list');
    document.getElementById('btn-grid').classList.add('active');
    document.getElementById('btn-list').classList.remove('active');
  }
}

function handleSort(sel) {
    const val = sel.value;
    let products = [...(window.currentFilteredData || DATA[currentCat].products)];
    
    if (val === 'Tên A–Z') {
        products.sort((a,b) => a.name.localeCompare(b.name));
    } else if (val === 'Tên Z–A') {
        products.sort((a,b) => b.name.localeCompare(a.name));
    } else if (val === 'Mới nhất') {
        products.sort((a,b) => (b.badge==='new'?1:0) - (a.badge==='new'?1:0));
    }
    renderProducts(products);
}

function applyFilters() {
  let filtered = [...DATA[currentCat].products];

  // 1. Tự động tìm Active Brands
  const activeBrands = Array.from(document.querySelectorAll('.brand-btn.active')).map(b => b.textContent.trim());
  if (activeBrands.length > 0) {
      filtered = filtered.filter(p => activeBrands.includes(p.brand));
  }

  // 2. Tự động tìm Subcats checked
  const cl = document.getElementById('subcat-list');
  if (cl) {
      const activeSubcats = Array.from(cl.querySelectorAll('input[type="checkbox"]:checked')).map(cb => cb.value);
      if (activeSubcats.length > 0 && !activeSubcats.includes('Tất cả')) {
          filtered = filtered.filter(p => activeSubcats.includes(p.cat));
      }
  }

  // 3. Tự động tìm Specs checked / active
  const specEl = document.getElementById('spec-list');
  if (specEl) {
      if (specEl.classList.contains('spec-pill-grid')) {
          const activeSpecs = Array.from(specEl.querySelectorAll('.spec-pill-btn.active')).map(b => b.getAttribute('data-val'));
          if (activeSpecs.length > 0) {
              filtered = filtered.filter(p => activeSpecs.includes(p.tag));
          }
      } else {
          const activeSpecs = Array.from(specEl.querySelectorAll('input[type="checkbox"]:checked')).map(cb => cb.value);
          if (activeSpecs.length > 0) {
              filtered = filtered.filter(p => activeSpecs.includes(p.tag));
          }
      }
  }

  // 4. Sub-pills (nằm ngay trên danh sách)
  const activePillBtn = document.querySelector('.sub-pill.active');
  if (activePillBtn) {
      let pillText = activePillBtn.textContent.split('\n')[0].trim(); // Get raw text ignoring span count below
      pillText = pillText.replace(/[\d]+$/, '').trim(); // Remove ending number (count)
      if (pillText !== 'Tất cả') {
          filtered = filtered.filter(p => 
             (p.cat && p.cat.toLowerCase().includes(pillText.toLowerCase())) ||
             (p.tag && p.tag.toLowerCase().includes(pillText.toLowerCase())) ||
             (p.name && p.name.toLowerCase().includes(pillText.toLowerCase()))
          );
      }
  }

  document.getElementById('header-count').textContent = `Hiển thị ${filtered.length} sản phẩm`;
  window.currentFilteredData = filtered; // save for sorting
  
  // Áp dụng Sort hiện tại trước khi render
  const sortSel = document.querySelector('.sort-select');
  if (sortSel && sortSel.value) handleSort(sortSel);
  else renderProducts(filtered);
}

function refreshActiveFilters() {
  const active = Array.from(document.querySelectorAll('.brand-btn.active')).map(b => b.textContent.trim());
  const af = document.getElementById('active-filters');
  if (active.length === 0) { af.style.display = 'none'; return; }
  af.style.display = 'flex';
  af.innerHTML = active.map(a =>
    `<span class="active-filter" onclick="removeFilter(this,'${a}')">${a} <span class="active-filter__x">×</span></span>`
  ).join('') + `<button class="clear-all" onclick="clearAll()">Xóa tất cả</button>`;
}

function removeFilter(el, brand) {
  document.querySelectorAll('.brand-btn').forEach(b => {
    if (b.textContent.trim() === brand) b.classList.remove('active');
  });
  refreshActiveFilters();
  applyFilters();
}

function clearAll() {
  document.querySelectorAll('.brand-btn').forEach(b => b.classList.remove('active'));
  refreshActiveFilters();
  applyFilters();
}

function openDrawer() {
  document.getElementById('filterDrawer').classList.add('open');
  document.getElementById('drawerOverlay').classList.add('open');
  document.body.style.overflow = 'hidden';
}

function closeDrawer() {
  document.getElementById('filterDrawer').classList.remove('open');
  document.getElementById('drawerOverlay').classList.remove('open');
  document.body.style.overflow = '';
}

function toggleSeoDesc(btn) {
    const content = document.getElementById('seo-content-wrapper');
    const gradient = content.querySelector('.prod-desc-gradient');
    const isExpanded = content.style.maxHeight === '8000px';
    
    if (isExpanded) {
        content.style.maxHeight = '480px';
        if(gradient) gradient.style.opacity = '1';
        btn.innerHTML = 'Đọc toàn bộ nội dung <svg style="width:16px;height:16px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M6 9l6 6 6-6"/></svg>';
    } else {
        content.style.maxHeight = '8000px';
        if(gradient) gradient.style.opacity = '0';
        btn.innerHTML = 'Thu gọn <svg style="width:16px;height:16px;" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2"><path d="M18 15l-6-6-6 6"/></svg>';
    }
}

document.addEventListener('DOMContentLoaded', () => {
  const params = new URLSearchParams(window.location.search);
  let loadedCat = 'led';
  const catParam = params.get('cat');
  if (catParam && DATA[catParam]) {
      loadedCat = catParam;
  }
  
  // Đồng bộ nút tab
  document.querySelectorAll('.cat-switch-btn').forEach(b => b.classList.remove('active'));
  const activeTab = document.querySelector(`.cat-switch-btn[onclick*="'${loadedCat}'"]`);
  if (activeTab) activeTab.classList.add('active');

  currentCat = loadedCat;
  renderAll(loadedCat);

  let subcatParam = params.get('subcat');
  if (subcatParam) {
      subcatParam = decodeURIComponent(subcatParam).toLowerCase().trim();
      const pills = document.querySelectorAll('.sub-pill');
      for (const p of pills) {
          if (p.textContent.trim().toLowerCase() === subcatParam) {
              p.click(); // giả lập để kích hoạt mọi filter list đồng nhất
              break;
          }
      }
  }
});
</script>
<?php get_footer(); ?>
