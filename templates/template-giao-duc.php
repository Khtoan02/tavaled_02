<?php
/**
 * Template Name: Trang giáo dục
 */

get_header(); ?>


<style>
.page-template-template-giao-duc-php *, .page-template-template-giao-duc-php *::before, .page-template-template-giao-duc-php *::after { box-sizing: border-box; margin: 0; padding: 0; }


:root {
  --navy:   #1c2857;
  --navy2:  #162248;
  --navy3:  #0f1835;
  --navy4:  #253370;
  --o:      #f05a25;
  --odk:    #c8451a;
  --olt:    #fff0eb;
  --w:      #ffffff;
  --ink:    #111827;
  --mid:    #374151;
  --muted:  #6b7280;
  --light:  #f3f4f6;
  --border: #e5e7eb;
}

html { scroll-behavior: smooth; }
body {
  font-family: 'Mona Sans', sans-serif;
  background: var(--w);
  color: var(--ink);
  overflow-x: hidden;
  -webkit-font-smoothing: antialiased;
}

/* ─── NAV ─── */
.nav {
  position:fixed; top:0; left:0; right:0; z-index:700;
  height:66px; padding:0 48px;
  display:flex; align-items:center; justify-content:space-between;
  transition:background .4s, box-shadow .4s;
}
.nav.solid {
  background:rgba(255,255,255,.97);
  backdrop-filter:blur(20px);
  box-shadow:0 1px 0 var(--border);
}
.nav__back {
  display:flex; align-items:center; gap:8px;
  font-size:12.5px; font-weight:500; color:var(--muted);
  text-decoration:none;
  transition:color .2s;
}
.nav__back:hover { color:var(--navy); }
.nav__back svg { width:16px; height:16px; stroke:currentColor; fill:none; stroke-width:2; }
.nav__logo {
  font-family:'Cormorant Garamond',serif;
  font-weight:700; font-size:1.6rem;
  color:var(--w); text-decoration:none; letter-spacing:-.02em;
  display:flex; align-items:baseline; gap:2px;
  transition:color .4s;
}
.nav.solid .nav__logo { color:var(--navy); }
.nav__logo-dot { width:6px; height:6px; border-radius:50%; background:var(--o); align-self:flex-end; margin-bottom:3px; }
.nav__cta {
  display:inline-flex; align-items:center; gap:7px;
  padding:9px 22px; background:var(--o); color:var(--w);
  font-size:12.5px; font-weight:700; letter-spacing:.04em; text-transform:uppercase;
  border-radius:8px; text-decoration:none;
  box-shadow:0 2px 20px rgba(240,90,37,.35);
  transition:background .2s, transform .15s;
}
.nav__cta:hover { background:var(--odk); transform:translateY(-1px); }

/* ══════════════════════════════════════
   ACT 1 — HERO: "Bảng đen & ánh sáng"
══════════════════════════════════════ */
.hero {
  height:100vh; min-height:680px;
  position:relative; overflow:hidden;
  display:flex; align-items:flex-end;
  background:var(--navy3);
}

/* Split background: left dark navy / right image */
.hero__left-bg {
  position:absolute; left:0; top:0; bottom:0; width:52%;
  background:linear-gradient(135deg, var(--navy3) 0%, var(--navy) 100%);
  z-index:1;
}
.hero__left-bg::after {
  content:'';
  position:absolute; right:-1px; top:0; bottom:0; width:120px;
  background:inherit;
  clip-path:polygon(0 0, 100% 0, 100% 100%, 30% 100%);
}

.hero__right-img {
  position:absolute; right:0; top:0; bottom:0; width:55%;
  z-index:0;
}
.hero__right-img img {
  width:100%; height:100%; object-fit:cover;
  
}
.hero__right-img::after {
  content:'';
  position:absolute; inset:0;
  background:linear-gradient(90deg, var(--navy3) 0%, transparent 40%);
}

/* Grid texture on left */
.hero__grid {
  position:absolute; left:0; top:0; width:52%; bottom:0; z-index:2;
  background-image:
    linear-gradient(rgba(255,255,255,.03) 1px, transparent 1px),
    linear-gradient(90deg, rgba(255,255,255,.03) 1px, transparent 1px);
  background-size:48px 48px;
  pointer-events:none;
}

/* Orange accent line */
.hero__line {
  position:absolute; left:0; top:0; bottom:0; width:4px; z-index:4;
  background:linear-gradient(180deg, transparent, var(--o) 30%, var(--odk) 70%, transparent);
}

.hero__body {
  position:relative; z-index:5;
  padding:0 60px 80px;
  max-width:660px;
}

.hero__breadcrumb {
  display:flex; align-items:center; gap:8px;
  font-size:11px; font-weight:600; letter-spacing:.18em; text-transform:uppercase;
  color:rgba(255,255,255,.35); margin-bottom:28px;
  opacity:0; animation:fadeUp .6s .2s ease forwards;
}
.hero__breadcrumb span { color:var(--o); }

.hero__pretitle {
  display:inline-flex; align-items:center; gap:10px;
  font-size:10px; font-weight:700; letter-spacing:.22em; text-transform:uppercase;
  color:var(--o); margin-bottom:18px;
  padding:5px 14px; border:1px solid rgba(240,90,37,.35);
  border-radius:3px; background:rgba(240,90,37,.08);
  opacity:0; animation:fadeUp .6s .35s ease forwards;
}

.hero__title {
  font-family:'Cormorant Garamond',serif;
  font-weight:700;
  font-size:clamp(3rem,5.5vw,5.2rem);
  line-height:.97; letter-spacing:-.04em;
  color:var(--w); margin-bottom:24px;
  opacity:0; animation:fadeUp .8s .5s cubic-bezier(.16,1,.3,1) forwards;
}
.hero__title em { font-style:italic; color:var(--o); display:block; }
.hero__title .line2 {
  color:rgba(255,255,255,.35);
  font-weight:300; font-style:italic;
  font-size:.65em; letter-spacing:.01em;
  display:block; margin-top:8px;
}

.hero__desc {
  font-size:15px; font-weight:300; color:rgba(255,255,255,.55);
  line-height:1.85; max-width:420px; margin-bottom:36px;
  opacity:0; animation:fadeUp .7s .65s ease forwards;
}

.hero__actions {
  display:flex; gap:14px; align-items:center;
  opacity:0; animation:fadeUp .6s .8s ease forwards;
}
.btn-light {
  display:inline-flex; align-items:center; gap:9px;
  padding:14px 30px; background:var(--w); color:var(--navy);
  font-size:12.5px; font-weight:700; letter-spacing:.06em; text-transform:uppercase;
  border-radius:8px; text-decoration:none;
  box-shadow:0 4px 28px rgba(0,0,0,.2);
  transition:transform .2s, box-shadow .2s;
}
.btn-light:hover { transform:translateY(-2px); box-shadow:0 8px 36px rgba(0,0,0,.3); }
.btn-light svg { width:14px; height:14px; stroke:currentColor; fill:none; stroke-width:2; }
.btn-text {
  font-size:12.5px; font-weight:500; color:rgba(255,255,255,.55);
  text-decoration:none; display:flex; align-items:center; gap:7px;
  transition:color .2s;
}
.btn-text:hover { color:var(--w); }

/* Hero floating stat cards */
.hero__floats {
  position:absolute; right:60px; top:50%; transform:translateY(-50%);
  z-index:5; display:flex; flex-direction:column; gap:12px;
  opacity:0; animation:fadeIn .8s 1s ease forwards;
}
.float-card {
  background:rgba(255,255,255,.08);
  backdrop-filter:blur(16px);
  border:1px solid rgba(255,255,255,.14);
  border-radius:12px; padding:14px 20px;
  min-width:160px;
}
.float-card__num {
  font-family:'Cormorant Garamond',serif;
  font-size:2rem; font-weight:700; line-height:1;
  color:var(--w); letter-spacing:-.04em;
}
.float-card__num span { color:var(--o); }
.float-card__label { font-size:10.5px; color:rgba(255,255,255,.45); margin-top:4px; letter-spacing:.06em; }

/* Scroll hint */
.hero__scroll {
  position:absolute; bottom:32px; left:50%; transform:translateX(-50%);
  z-index:5; display:flex; flex-direction:column; align-items:center; gap:7px;
  opacity:0; animation:fadeIn .6s 1.3s ease forwards;
}
.hero__scroll-bar {
  width:1.5px; height:50px;
  background:linear-gradient(transparent, rgba(255,255,255,.3));
  position:relative; overflow:hidden;
}
.hero__scroll-bar::after {
  content:''; position:absolute; top:-100%; left:0; right:0;
  height:100%; background:var(--o);
  animation:scanDown 2s ease-in-out infinite;
}
@keyframes scanDown { 0%{top:-100%} 100%{top:100%} }
.hero__scroll span {
  font-size:8.5px; font-weight:700; letter-spacing:.22em; text-transform:uppercase;
  color:rgba(255,255,255,.3);
}

/* ══════════════════════════════════════
   ACT 2 — THE PROBLEM: "Trước khi có TavaLLS"
══════════════════════════════════════ */
.problem {
  background:var(--light);
  padding:100px 0;
  position:relative; overflow:hidden;
}
.problem::before {
  content:'';
  position:absolute; top:0; left:0; right:0; height:4px;
  background:linear-gradient(90deg, var(--o), var(--navy));
}

.container { max-width:1240px; margin:0 auto; padding:0 48px; }

.prob__inner {
  display:grid; grid-template-columns:1fr 1fr;
  gap:80px; align-items:center;
}
.prob__visual {
  position:relative;
}
/* Chalkboard effect */
.chalkboard {
  width:100%; aspect-ratio:4/3;
  background:linear-gradient(135deg, #2d4a2d 0%, #1a331a 100%);
  border-radius:10px;
  border:12px solid #5c3d1e;
  box-shadow:
    inset 0 0 60px rgba(0,0,0,.4),
    0 20px 60px rgba(0,0,0,.2);
  position:relative; overflow:hidden;
  display:flex; align-items:center; justify-content:center;
}
.chalkboard::before {
  content:''; position:absolute; inset:0;
  background:
    repeating-linear-gradient(0deg, transparent, transparent 2px, rgba(255,255,255,.01) 2px, rgba(255,255,255,.01) 4px),
    repeating-linear-gradient(90deg, transparent, transparent 2px, rgba(255,255,255,.01) 2px, rgba(255,255,255,.01) 4px);
}
.chalk-text {
  font-family:'Cormorant Garamond',serif;
  color:rgba(255,255,255,.55); text-align:center;
  padding:24px;
}
.chalk-text .ct1 { font-size:1.1rem; font-weight:300; font-style:italic; display:block; margin-bottom:12px; }
.chalk-text .ct2 { font-size:2.8rem; font-weight:700; display:block; line-height:1; opacity:.4; }
.chalk-text .ct3 { font-size:.85rem; font-weight:300; display:block; margin-top:10px; opacity:.3; letter-spacing:.08em; }

/* Eraser marks */
.chalk-eraser {
  position:absolute; bottom:24px; right:24px;
  width:60px; height:20px; background:rgba(255,255,255,.06);
  border-radius:4px; transform:rotate(-12deg);
}

/* Arrow */
.prob__arrow {
  position:absolute; right:-40px; top:50%; transform:translateY(-50%);
  z-index:2;
}
.prob__arrow svg { width:80px; fill:none; stroke:var(--border); stroke-width:1; }

.prob__text {}
.eyebrow {
  display:inline-flex; align-items:center; gap:8px;
  font-size:10px; font-weight:700; letter-spacing:.22em; text-transform:uppercase;
  color:var(--o); margin-bottom:14px;
}
.eyebrow::before { content:''; display:block; width:24px; height:2px; background:var(--o); border-radius:2px; }

.h2 {
  font-family:'Cormorant Garamond',serif;
  font-weight:700; font-size:clamp(2rem,3.5vw,3rem);
  line-height:1.06; letter-spacing:-.03em; color:var(--navy);
  margin-bottom:20px;
}
.h2 em { font-style:italic; color:var(--o); }

.prob__list { list-style:none; display:flex; flex-direction:column; gap:14px; margin-top:28px; }
.prob__item {
  display:flex; align-items:flex-start; gap:14px;
  padding:14px 16px; background:var(--w);
  border-radius:10px; border:1px solid var(--border);
  transition:border-color .2s, box-shadow .2s;
}
.prob__item:hover { border-color:rgba(240,90,37,.25); box-shadow:0 4px 20px rgba(240,90,37,.06); }
.prob__icon {
  width:36px; height:36px; border-radius:9px; flex-shrink:0;
  background:var(--light); display:flex; align-items:center; justify-content:center;
  font-size:16px;
}
.prob__item-text { font-size:13.5px; color:var(--mid); line-height:1.6; }
.prob__item-text strong { color:var(--ink); font-weight:600; display:block; margin-bottom:2px; }

/* ══════════════════════════════════════
   ACT 3 — THE TURN: "Khoảnh khắc thay đổi"
══════════════════════════════════════ */
.turn {
  background:var(--navy); padding:0;
  position:relative; overflow:hidden;
  min-height:560px; display:flex; align-items:center;
}

.turn__bg {
  position:absolute; inset:0;
}
.turn__bg img {
  width:100%; height:100%; object-fit:cover;
  
}
.turn__bg::after {
  content:''; position:absolute; inset:0;
  background:
    linear-gradient(90deg, rgba(28,40,87,.95) 0%, rgba(28,40,87,.7) 50%, rgba(28,40,87,.4) 100%);
}

.turn__grid {
  position:absolute; inset:0;
  background-image:
    linear-gradient(rgba(255,255,255,.025) 1px, transparent 1px),
    linear-gradient(90deg, rgba(255,255,255,.025) 1px, transparent 1px);
  background-size:56px 56px;
}

.turn__inner {
  position:relative; z-index:2;
  max-width:1240px; margin:0 auto; padding:100px 48px;
  display:grid; grid-template-columns:1fr 1fr; gap:80px; align-items:center;
}

.turn__quote {
  border-left:4px solid var(--o);
  padding:8px 0 8px 32px;
}
.turn__quote-mark {
  font-family:'Cormorant Garamond',serif;
  font-size:8rem; line-height:.8; color:rgba(240,90,37,.2);
  margin-bottom:-20px; display:block; font-weight:700;
}
.turn__quote-text {
  font-family:'Cormorant Garamond',serif;
  font-size:clamp(1.8rem,3vw,2.6rem); font-weight:300; font-style:italic;
  line-height:1.3; color:var(--w); letter-spacing:-.02em;
}
.turn__quote-text strong { font-weight:700; color:var(--o); font-style:normal; }
.turn__quote-author {
  margin-top:20px; font-size:12px; letter-spacing:.12em; text-transform:uppercase;
  color:rgba(255,255,255,.35); font-style:normal;
}

.turn__stats { display:flex; flex-direction:column; gap:24px; }
.turn__stat {
  display:flex; align-items:center; gap:20px;
  padding:20px 24px;
  background:rgba(255,255,255,.06);
  border:1px solid rgba(255,255,255,.1);
  border-radius:12px;
  transition:background .3s, border-color .3s;
}
.turn__stat:hover { background:rgba(240,90,37,.1); border-color:rgba(240,90,37,.3); }
.turn__stat-icon {
  width:48px; height:48px; border-radius:12px; flex-shrink:0;
  background:rgba(240,90,37,.15); border:1px solid rgba(240,90,37,.25);
  display:flex; align-items:center; justify-content:center;
  font-size:20px;
}
.turn__stat-num {
  font-family:'Cormorant Garamond',serif;
  font-size:2.2rem; font-weight:700; color:var(--w); line-height:1;
  letter-spacing:-.04em;
}
.turn__stat-num span { color:var(--o); }
.turn__stat-label { font-size:12px; color:rgba(255,255,255,.45); margin-top:3px; line-height:1.5; }

/* ══════════════════════════════════════
   ACT 4 — SPACES: "Ba không gian, một hành trình"
══════════════════════════════════════ */
.spaces {
  padding:100px 0;
  background:var(--w);
}

.spaces__header { text-align:center; margin-bottom:64px; }
.spaces__desc {
  font-size:15px; color:var(--muted); max-width:520px;
  margin:12px auto 0; line-height:1.8;
}

/* Tabs */
.space-tabs {
  display:flex; justify-content:center; gap:8px;
  margin-bottom:48px; flex-wrap:wrap;
}
.space-tab {
  display:flex; align-items:center; gap:8px;
  padding:10px 22px;
  background:var(--light); border:1.5px solid var(--border);
  border-radius:8px; font-size:13px; font-weight:600;
  color:var(--muted); cursor:pointer;
  transition:all .2s;
}
.space-tab:hover { border-color:var(--navy); color:var(--navy); }
.space-tab.active {
  background:var(--navy); border-color:var(--navy);
  color:var(--w); box-shadow:0 4px 20px rgba(28,40,87,.25);
}
.space-tab__icon { font-size:16px; }

.space-panel { display:none; }
.space-panel.active { display:block; }

.space-content {
  display:grid; grid-template-columns:1.15fr 1fr; gap:6px;
  border-radius:14px; overflow:hidden;
  box-shadow:0 24px 80px rgba(28,40,87,.12);
}
.space-content__main {
  position:relative; min-height:520px; overflow:hidden;
}
.space-content__main img {
  width:100%; height:100%; object-fit:cover; display:block;
  transition:transform .8s cubic-bezier(.16,1,.3,1);
}
.space-panel.active .space-content__main img { transform:scale(1.03); }
.space-content__main:hover img { transform:scale(1.07); }
.space-content__main__overlay {
  position:absolute; inset:0;
  background:linear-gradient(180deg, transparent 40%, rgba(15,24,53,.88) 100%);
}
.space-content__main__body {
  position:absolute; bottom:0; left:0; right:0; padding:32px 32px 28px;
}
.space-tag {
  display:inline-flex; align-items:center; gap:7px;
  font-size:9.5px; font-weight:700; letter-spacing:.18em; text-transform:uppercase;
  color:var(--o); margin-bottom:12px;
  padding:4px 12px; border:1px solid rgba(240,90,37,.4);
  border-radius:3px; background:rgba(240,90,37,.1);
}
.space-title {
  font-family:'Cormorant Garamond',serif;
  font-size:2rem; font-weight:700; color:var(--w); line-height:1.1;
  letter-spacing:-.025em; margin-bottom:8px;
}
.space-sub { font-size:13.5px; color:rgba(255,255,255,.6); line-height:1.6; }

.space-content__side {
  display:flex; flex-direction:column; gap:6px;
}
.space-feat {
  flex:1; position:relative; overflow:hidden; min-height:170px;
  cursor:pointer;
}
.space-feat img {
  width:100%; height:100%; object-fit:cover;
  
  transition:transform .6s cubic-bezier(.16,1,.3,1), filter .4s;
}
.space-feat:hover img { transform:scale(1.07);  }
.space-feat__overlay {
  position:absolute; inset:0;
  background:linear-gradient(180deg, transparent 30%, rgba(15,24,53,.85) 100%);
}
.space-feat__body {
  position:absolute; bottom:0; left:0; right:0;
  padding:16px 18px 14px;
}
.space-feat__label {
  font-size:9px; font-weight:700; letter-spacing:.16em; text-transform:uppercase;
  color:var(--o); margin-bottom:4px;
}
.space-feat__name {
  font-family:'Cormorant Garamond',serif;
  font-size:.95rem; font-weight:700; color:var(--w); line-height:1.2;
}

/* Products for each space */
.space-products {
  margin-top:40px; padding-top:40px;
  border-top:1px solid var(--border);
}
.space-products__label {
  font-size:10px; font-weight:700; letter-spacing:.18em; text-transform:uppercase;
  color:var(--muted); margin-bottom:20px;
  display:flex; align-items:center; gap:10px;
}
.space-products__label::after { content:''; flex:1; height:1px; background:var(--border); }
.space-prods-grid {
  display:grid; grid-template-columns:repeat(4,1fr); gap:12px;
}
.space-prod {
  background:var(--light); border-radius:10px;
  border:1.5px solid var(--border);
  overflow:hidden; text-decoration:none;
  transition:border-color .2s, transform .3s, box-shadow .3s;
  display:flex; flex-direction:column;
}
.space-prod:hover {
  border-color:rgba(28,40,87,.3);
  transform:translateY(-4px);
  box-shadow:0 16px 40px rgba(28,40,87,.1);
}
.space-prod__thumb {
  height:120px; overflow:hidden; position:relative;
}
.space-prod__thumb img {
  width:100%; height:100%; object-fit:cover;
  
  transition:transform .5s, filter .3s;
}
.space-prod:hover .space-prod__thumb img { transform:scale(1.06);  }
.space-prod__body { padding:12px 14px 14px; }
.space-prod__cat { font-size:9px; font-weight:700; letter-spacing:.14em; text-transform:uppercase; color:var(--o); opacity:.75; margin-bottom:4px; }
.space-prod__name {
  font-family:'Cormorant Garamond',serif;
  font-size:.92rem; font-weight:700; color:var(--navy); line-height:1.25;
  transition:color .2s;
}
.space-prod:hover .space-prod__name { color:var(--o); }

/* ══════════════════════════════════════
   ACT 5 — PROOF: Dự án trường học thực tế
══════════════════════════════════════ */
.proof {
  padding:100px 0;
  background:var(--light);
}

.proof__header {
  display:flex; align-items:flex-end; justify-content:space-between;
  margin-bottom:48px; gap:24px; flex-wrap:wrap;
}

/* Case study cards */
.cases {
  display:grid; grid-template-columns:1.5fr 1fr 1fr;
  gap:4px; border-radius:14px; overflow:hidden;
}
.case {
  position:relative; overflow:hidden; min-height:440px;
  cursor:pointer; text-decoration:none; display:block;
  background:var(--navy);
}
.case img {
  width:100%; height:100%; object-fit:cover;
  
  transition:transform .8s cubic-bezier(.16,1,.3,1), filter .5s;
}
.case:hover img { transform:scale(1.06);  }
.case__overlay {
  position:absolute; inset:0;
  background:linear-gradient(180deg, rgba(28,40,87,.2) 0%, rgba(15,24,53,.9) 100%);
  transition:background .4s;
}
.case:hover .case__overlay {
  background:linear-gradient(180deg, rgba(28,40,87,.4) 0%, rgba(15,24,53,.95) 100%);
}
.case__body {
  position:absolute; bottom:0; left:0; right:0;
  padding:28px 24px 22px;
}
.case__tag {
  font-size:9px; font-weight:700; letter-spacing:.18em; text-transform:uppercase;
  color:var(--o); margin-bottom:8px;
  display:flex; align-items:center; gap:6px;
}
.case__tag::before { content:''; display:block; width:16px; height:1.5px; background:var(--o); }
.case__school {
  font-family:'Cormorant Garamond',serif;
  font-size:1.2rem; font-weight:700; color:var(--w); line-height:1.2;
  margin-bottom:8px;
}
.case--main .case__school { font-size:1.55rem; }
.case__detail {
  font-size:12px; color:rgba(255,255,255,.5); line-height:1.6;
}
.case__specs {
  display:flex; flex-wrap:wrap; gap:6px; margin-top:12px;
}
.spec-pill {
  padding:3px 10px;
  background:rgba(255,255,255,.08); border:1px solid rgba(255,255,255,.12);
  border-radius:20px; font-size:10px; font-weight:600;
  color:rgba(255,255,255,.6);
}

/* Metrics row */
.metrics {
  display:grid; grid-template-columns:repeat(4,1fr);
  gap:4px; margin-top:4px;
}
.metric {
  background:var(--w); padding:28px 24px; text-align:center;
  transition:background .2s;
}
.metric:hover { background:var(--olt); }
.metric:first-child { border-radius:0 0 0 14px; }
.metric:last-child { border-radius:0 0 14px 0; }
.metric__val {
  font-family:'Cormorant Garamond',serif;
  font-size:2.6rem; font-weight:700; color:var(--navy);
  line-height:1; letter-spacing:-.04em;
}
.metric__val span { color:var(--o); }
.metric__label { font-size:11.5px; color:var(--muted); margin-top:6px; line-height:1.5; }

/* ══════════════════════════════════════
   ACT 6 — WHY CHOOSE: Cam kết
══════════════════════════════════════ */
.why {
  padding:100px 0;
  background:var(--w);
  position:relative; overflow:hidden;
}
.why::before {
  content:''; position:absolute;
  top:-200px; right:-200px;
  width:600px; height:600px; border-radius:50%;
  background:radial-gradient(circle, rgba(240,90,37,.06) 0%, transparent 70%);
  pointer-events:none;
}

.why__inner {
  display:grid; grid-template-columns:1fr 1fr;
  gap:80px; align-items:start;
}

.why__visual {
  position:relative;
}
.why__img-stack {
  position:relative; height:560px;
}
.why__img-main {
  position:absolute; right:0; top:0;
  width:85%; height:460px; border-radius:12px; overflow:hidden;
  box-shadow:0 32px 80px rgba(28,40,87,.18);
}
.why__img-main img { width:100%; height:100%; object-fit:cover; }
.why__img-accent {
  position:absolute; left:0; bottom:0;
  width:55%; height:240px; border-radius:12px; overflow:hidden;
  border:5px solid var(--w);
  box-shadow:0 20px 60px rgba(28,40,87,.15);
  z-index:2;
}
.why__img-accent img { width:100%; height:100%; object-fit:cover; }
/* Orange badge floating */
.why__badge {
  position:absolute; right:0; bottom:60px; z-index:3;
  background:var(--o); color:var(--w);
  padding:16px 20px; border-radius:12px;
  box-shadow:0 12px 40px rgba(240,90,37,.4);
  text-align:center; min-width:130px;
}
.why__badge-num {
  font-family:'Cormorant Garamond',serif;
  font-size:2.4rem; font-weight:700; line-height:1; letter-spacing:-.04em;
}
.why__badge-label { font-size:10.5px; font-weight:600; letter-spacing:.08em; opacity:.8; margin-top:3px; }

.why__right {}
.why__features { display:flex; flex-direction:column; gap:0; margin-top:36px; }
.why__feat {
  display:flex; align-items:flex-start; gap:18px;
  padding:20px 0; border-bottom:1px solid var(--border);
  transition:padding .2s;
}
.why__feat:last-child { border-bottom:none; }
.why__feat:hover { padding-left:6px; }
.why__feat-icon {
  width:44px; height:44px; border-radius:12px; flex-shrink:0;
  background:var(--light); border:1.5px solid var(--border);
  display:flex; align-items:center; justify-content:center;
  font-size:20px;
  transition:background .2s, border-color .2s;
}
.why__feat:hover .why__feat-icon { background:var(--olt); border-color:rgba(240,90,37,.3); }
.why__feat-title { font-size:14.5px; font-weight:700; color:var(--navy); margin-bottom:4px; }
.why__feat-desc { font-size:13px; color:var(--muted); line-height:1.7; }

/* ══════════════════════════════════════
   ACT 7 — PROCESS: Quy trình
══════════════════════════════════════ */
.process {
  padding:100px 0;
  background:var(--navy3); position:relative; overflow:hidden;
}
.process::before {
  content:''; position:absolute; inset:0;
  background-image:
    linear-gradient(rgba(255,255,255,.022) 1px, transparent 1px),
    linear-gradient(90deg, rgba(255,255,255,.022) 1px, transparent 1px);
  background-size:52px 52px;
}
.process__header { text-align:center; margin-bottom:64px; }
.process__header .h2 { color:var(--w); }
.process__desc { font-size:15px; color:rgba(255,255,255,.45); max-width:480px; margin:10px auto 0; line-height:1.8; }

.steps {
  display:grid; grid-template-columns:repeat(5,1fr);
  gap:0; position:relative;
}
.steps::before {
  content:''; position:absolute;
  top:36px; left:10%; right:10%; height:1.5px;
  background:linear-gradient(90deg, var(--o), rgba(240,90,37,.2));
  z-index:0;
}
.step {
  text-align:center; padding:0 16px; position:relative; z-index:1;
}
.step__num {
  width:72px; height:72px; border-radius:50%;
  background:var(--navy2); border:2px solid rgba(255,255,255,.1);
  display:flex; align-items:center; justify-content:center;
  margin:0 auto 20px;
  font-family:'Cormorant Garamond',serif;
  font-size:1.8rem; font-weight:700; color:rgba(255,255,255,.3);
  transition:background .3s, border-color .3s, color .3s;
  position:relative;
}
.step:hover .step__num {
  background:var(--o); border-color:var(--o); color:var(--w);
}
.step__num--active {
  background:var(--o)!important; border-color:var(--o)!important; color:var(--w)!important;
  box-shadow:0 0 0 6px rgba(240,90,37,.15);
}
.step__icon { font-size:20px; margin-bottom:12px; }
.step__title { font-size:13.5px; font-weight:700; color:var(--w); margin-bottom:6px; }
.step__desc { font-size:12px; color:rgba(255,255,255,.4); line-height:1.65; }

/* ══════════════════════════════════════
   ACT 8 — TESTIMONIAL
══════════════════════════════════════ */
.testimonials {
  padding:100px 0;
  background:var(--w);
}
.testi__header { text-align:center; margin-bottom:56px; }

.testi-grid {
  display:grid; grid-template-columns:1fr 1fr 1fr;
  gap:20px;
}
.testi {
  background:var(--light);
  border:1.5px solid var(--border); border-radius:14px;
  padding:28px; transition:border-color .2s, box-shadow .2s, transform .3s;
}
.testi:hover {
  border-color:rgba(28,40,87,.2);
  box-shadow:0 20px 60px rgba(28,40,87,.08);
  transform:translateY(-4px);
}
.testi__stars { display:flex; gap:3px; margin-bottom:16px; }
.testi__star { color:var(--o); font-size:14px; }
.testi__quote-mark {
  font-family:'Cormorant Garamond',serif;
  font-size:4rem; color:rgba(28,40,87,.1); line-height:.7;
  margin-bottom:4px; display:block; font-weight:700;
}
.testi__text {
  font-size:14px; color:var(--mid); line-height:1.8;
  font-style:italic; margin-bottom:20px;
}
.testi__author {
  display:flex; align-items:center; gap:12px;
  padding-top:16px; border-top:1px solid var(--border);
}
.testi__avatar {
  width:42px; height:42px; border-radius:50%;
  background:linear-gradient(135deg, var(--navy), var(--navy4));
  display:flex; align-items:center; justify-content:center;
  font-family:'Cormorant Garamond',serif;
  font-weight:700; font-size:1.1rem; color:var(--w); flex-shrink:0;
}
.testi__name { font-size:13.5px; font-weight:700; color:var(--navy); }
.testi__role { font-size:11.5px; color:var(--muted); margin-top:2px; }

/* ══════════════════════════════════════
   ACT 9 — CTA: "Bắt đầu hành trình"
══════════════════════════════════════ */
.cta-edu {
  position:relative; overflow:hidden;
  background:var(--navy);
  padding:100px 0;
}
.cta-edu::before {
  content:''; position:absolute; inset:0;
  background-image:
    linear-gradient(rgba(255,255,255,.025) 1px, transparent 1px),
    linear-gradient(90deg, rgba(255,255,255,.025) 1px, transparent 1px);
  background-size:56px 56px;
}
.cta-edu::after {
  content:''; position:absolute;
  bottom:-150px; right:-150px;
  width:500px; height:500px; border-radius:50%;
  background:radial-gradient(circle, rgba(240,90,37,.18) 0%, transparent 70%);
  pointer-events:none;
}
.cta-edu__line {
  position:absolute; left:0; top:0; bottom:0; width:4px;
  background:linear-gradient(180deg, transparent, var(--o) 30%, var(--odk) 70%, transparent);
}
.cta-edu__inner {
  position:relative; z-index:2;
  max-width:1240px; margin:0 auto; padding:0 48px;
  display:grid; grid-template-columns:1fr 1fr; gap:80px; align-items:center;
}
.cta-edu__title {
  font-family:'Cormorant Garamond',serif;
  font-weight:700; font-size:clamp(2.2rem,4vw,3.6rem);
  line-height:1.05; letter-spacing:-.03em; color:var(--w);
}
.cta-edu__title em { font-style:italic; color:var(--o); }
.cta-edu__sub { font-size:14.5px; color:rgba(255,255,255,.5); line-height:1.8; margin-top:16px; }

.cta-edu__form {
  background:rgba(255,255,255,.06);
  border:1px solid rgba(255,255,255,.12);
  border-radius:16px; padding:32px;
}
.cta-edu__form-title {
  font-size:14px; font-weight:700; color:var(--w);
  margin-bottom:20px; display:flex; align-items:center; gap:8px;
}
.cta-edu__form-title::before {
  content:''; display:block; width:16px; height:2px; background:var(--o);
}
.form-row { display:flex; flex-direction:column; gap:12px; }
.form-input {
  width:100%; padding:12px 16px;
  background:rgba(255,255,255,.08); border:1.5px solid rgba(255,255,255,.12);
  border-radius:8px; font-size:13.5px; color:var(--w);
  font-family:'Mona Sans',sans-serif;
  outline:none; transition:border-color .2s, background .2s;
}
.form-input::placeholder { color:rgba(255,255,255,.3); }
.form-input:focus { border-color:rgba(240,90,37,.5); background:rgba(255,255,255,.1); }
.form-select {
  width:100%; padding:12px 16px;
  background:rgba(255,255,255,.08); border:1.5px solid rgba(255,255,255,.12);
  border-radius:8px; font-size:13.5px; color:rgba(255,255,255,.7);
  font-family:'Mona Sans',sans-serif;
  outline:none; cursor:pointer;
  transition:border-color .2s; appearance:none;
  background-image:url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='rgba(255,255,255,.3)' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
  background-repeat:no-repeat; background-position:right 16px center;
  background-size:12px;
}
.form-select:focus { border-color:rgba(240,90,37,.5); }
.form-submit {
  width:100%; padding:14px; background:var(--o); color:var(--w);
  font-size:13.5px; font-weight:700; letter-spacing:.06em; text-transform:uppercase;
  border:none; border-radius:8px; cursor:pointer; font-family:'Mona Sans',sans-serif;
  box-shadow:0 4px 24px rgba(240,90,37,.4);
  transition:background .2s, transform .15s, box-shadow .2s;
}
.form-submit:hover { background:var(--odk); transform:translateY(-1px); box-shadow:0 8px 32px rgba(240,90,37,.55); }
.form-note { font-size:11px; color:rgba(255,255,255,.3); text-align:center; margin-top:8px; }

/* ── FOOTER (mini) ── */
.footer-mini {
  background:var(--navy3); padding:32px 48px;
  display:flex; align-items:center; justify-content:space-between;
  border-top:1px solid rgba(255,255,255,.06);
  flex-wrap:wrap; gap:16px;
}
.footer-mini__brand {
  font-family:'Cormorant Garamond',serif; font-weight:700; font-size:1.4rem;
  color:var(--w); display:flex; align-items:baseline; gap:1px;
}
.footer-mini__dot { width:5px; height:5px; border-radius:50%; background:var(--o); align-self:flex-end; margin-bottom:2px; }
.footer-mini__links { display:flex; gap:24px; }
.footer-mini__links a { font-size:12.5px; color:rgba(255,255,255,.4); text-decoration:none; transition:color .2s; }
.footer-mini__links a:hover { color:var(--w); }
.footer-mini__copy { font-size:11.5px; color:rgba(255,255,255,.25); }

/* ── ANIMATIONS ── */
@keyframes fadeUp { from{opacity:0;transform:translateY(22px)} to{opacity:1;transform:translateY(0)} }
@keyframes fadeIn { from{opacity:0} to{opacity:1} }

.reveal {
  opacity:0; transform:translateY(28px);
  transition:opacity .8s cubic-bezier(.16,1,.3,1), transform .8s cubic-bezier(.16,1,.3,1);
}
.reveal.visible { opacity:1; transform:translateY(0); }
.reveal.d1{transition-delay:.1s}.reveal.d2{transition-delay:.18s}
.reveal.d3{transition-delay:.26s}.reveal.d4{transition-delay:.34s}
.reveal.d5{transition-delay:.42s}

/* ── RESPONSIVE ── */
@media(max-width:1100px){
  .prob__inner,.turn__inner,.why__inner,.cta-edu__inner{grid-template-columns:1fr;gap:48px;}
  .cases{grid-template-columns:1fr 1fr}
  .case--main{grid-column:span 2}
  .testi-grid{grid-template-columns:1fr 1fr}
  .steps{grid-template-columns:repeat(3,1fr);row-gap:36px}
  .steps::before{display:none}
  .space-content{grid-template-columns:1fr}
  .space-prods-grid{grid-template-columns:repeat(2,1fr)}
  .metrics{grid-template-columns:repeat(2,1fr)}
}
@media(max-width:768px){
  .hero__floats{display:none}
  .hero__body{padding:0 28px 64px}
  .container{padding:0 24px}
  .hero__left-bg{width:100%}
  .hero__right-img{opacity:.25}
  .space-tabs{justify-content:flex-start}
  .cases{grid-template-columns:1fr}
  .case--main{grid-column:span 1}
  .testi-grid{grid-template-columns:1fr}
  .steps{grid-template-columns:1fr 1fr}
  .cta-edu__inner{grid-template-columns:1fr;gap:40px}
  .footer-mini{flex-direction:column;align-items:flex-start;padding:24px}
  .why__img-stack{height:380px}
}
@media(max-width:480px){
  .prob__inner,.metrics{grid-template-columns:1fr}
  .space-prods-grid{grid-template-columns:repeat(2,1fr)}
  .steps{grid-template-columns:1fr}
}
</style>
</head>
<body>



<!-- ─── NAV ─── -->
<header class="nav" id="nav">
  <a href="/" class="nav__back">
    <svg viewBox="0 0 24 24"><line x1="19" y1="12" x2="5" y2="12"/><polyline points="12 19 5 12 12 5"/></svg>
    TavaLLS
  </a>
  <a href="/" class="nav__logo">TavaLLS<span class="nav__logo-dot"></span></a>
  <a href="#cta-edu" class="nav__cta">Tư vấn miễn phí</a>
</header>

<!-- ══════════════════
     ACT 1 — HERO
══════════════════ -->
<section class="hero" id="hero" aria-label="Giải pháp TavaLLS cho giáo dục">

  <div class="hero__left-bg"></div>
  <div class="hero__right-img">
 <img src="https://tavaled.vn/wp-content/uploads/2026/03/0038_TavaLED_Hinh_Anh.jpg" alt="Học sinh trong lớp học hiện đại với màn hình LED" loading="eager">
  </div>
  <div class="hero__grid" aria-hidden="true"></div>
  <div class="hero__line" aria-hidden="true"></div>

  <div class="hero__body">
    <div class="hero__breadcrumb">TavaLLS <span>/</span> Giải pháp <span>/</span> Giáo dục</div>
    <div class="hero__pretitle">🎓 Dành cho ngành Giáo dục</div>
    <h1 class="hero__title">
      Lớp học<br><em>của tương lai</em>
      <span class="line2">bắt đầu từ hôm nay</span>
    </h1>
    <p class="hero__desc">Khi ánh sáng đúng, âm thanh chuẩn — mỗi bài giảng trở thành một trải nghiệm khó quên. TavaLLS trang bị không gian học tập cho 150+ trường trên toàn quốc.</p>
    <div class="hero__actions">
      <a href="#cta-edu" class="btn-light">
        Nhận tư vấn miễn phí
        <svg viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
      </a>
      <a href="#spaces" class="btn-text">Xem không gian mẫu →</a>
    </div>
  </div>

  <div class="hero__floats" aria-label="Thành tích">
    <div class="float-card">
      <div class="float-card__num"><span class="cnt" data-to="150">0</span><span>+</span></div>
      <div class="float-card__label">Trường học tin dùng</div>
    </div>
    <div class="float-card">
      <div class="float-card__num"><span class="cnt" data-to="98">0</span><span>%</span></div>
      <div class="float-card__label">Hài lòng sau lắp đặt</div>
    </div>
    <div class="float-card">
      <div class="float-card__num"><span class="cnt" data-to="24">0</span><span>h</span></div>
      <div class="float-card__label">Bảo trì sự cố</div>
    </div>
  </div>

  <div class="hero__scroll" aria-hidden="true">
    <div class="hero__scroll-bar"></div>
    <span>Khám phá</span>
  </div>
</section>

<!-- ══════════════════
     ACT 2 — PROBLEM
══════════════════ -->
<section class="problem" aria-label="Vấn đề hiện tại">
  <div class="container">
    <div class="prob__inner">
      <div class="prob__visual reveal">
        <div class="chalkboard" role="img" aria-label="Hình ảnh bảng đen cũ">
          <div class="chalk-text">
            <span class="ct1">Bài học hôm nay...</span>
            <span class="ct2">ABC</span>
            <span class="ct3">— Học sinh đã chú ý chưa? —</span>
          </div>
          <div class="chalk-eraser"></div>
        </div>
      </div>
      <div class="prob__text reveal d2">
        <div class="eyebrow">Câu chuyện bắt đầu từ đây</div>
        <h2 class="h2">Lớp học truyền thống —<br><em>đang mất dần</em><br>học sinh</h2>
        <p style="font-size:14.5px;color:var(--muted);line-height:1.8;margin-top:12px;">Bảng đen mờ, máy chiếu vàng, loa rè — không phải lỗi của giáo viên. Đó là giới hạn của công nghệ cũ trong thế giới đã thay đổi.</p>
        <ul class="prob__list">
          <li class="prob__item">
            <div class="prob__icon">👁️</div>
            <div class="prob__item-text">
              <strong>Nhìn không rõ từ cuối lớp</strong>
              Học sinh 2/3 phía sau mất tập trung vì không đọc được bảng hoặc màn chiếu mờ nhạt.
            </div>
          </li>
          <li class="prob__item">
            <div class="prob__icon">🔊</div>
            <div class="prob__item-text">
              <strong>Âm thanh không đều</strong>
              Giọng giáo viên loãng hoặc rè ở hội trường, phòng học online thiếu microphone chuẩn.
            </div>
          </li>
          <li class="prob__item">
            <div class="prob__icon">💡</div>
            <div class="prob__item-text">
              <strong>Ánh sáng gây mỏi mắt</strong>
              Đèn huỳnh quang cũ tạo bóng tối và nhấp nháy, ảnh hưởng thị lực sau nhiều giờ học.
            </div>
          </li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ══════════════════
     ACT 3 — THE TURN
══════════════════ -->
<section class="turn" aria-label="Giải pháp TavaLLS">
  <div class="turn__bg">
 <img src="https://tavaled.vn/wp-content/uploads/2026/03/0039_TavaLED_Hinh_Anh.jpg" alt="Lớp học hiện đại với màn hình LED" loading="lazy">
  </div>
  <div class="turn__grid" aria-hidden="true"></div>
  <div class="turn__inner">

    <div class="turn__stats reveal d2">
      <div class="turn__stat">
        <div class="turn__stat-icon">📺</div>
        <div>
          <div class="turn__stat-num"><span class="cnt" data-to="120">0</span><span> phòng học</span></div>
          <div class="turn__stat-label">được trang bị màn hình LED P2–P3<br>chỉ trong năm 2024</div>
        </div>
      </div>
      <div class="turn__stat">
        <div class="turn__stat-icon">🔊</div>
        <div>
          <div class="turn__stat-num"><span class="cnt" data-to="85">0</span><span>%</span></div>
          <div class="turn__stat-label">giáo viên ghi nhận học sinh<br>tập trung tốt hơn rõ rệt</div>
        </div>
      </div>
      <div class="turn__stat">
        <div class="turn__stat-icon">⏱️</div>
        <div>
          <div class="turn__stat-num"><span>Chỉ </span><span class="cnt" data-to="3">0</span><span> ngày</span></div>
          <div class="turn__stat-label">thi công hoàn chỉnh một trường<br>không ảnh hưởng lịch học</div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ══════════════════
     ACT 4 — SPACES
══════════════════ -->
<section class="spaces" id="spaces" aria-labelledby="spaces-heading">
  <div class="container">
    <div class="spaces__header reveal">
      <div class="eyebrow" style="justify-content:center">Ba không gian — một hành trình</div>
      <h2 class="h2" id="spaces-heading" style="text-align:center">TavaLLS trang bị<br><em>trọn vẹn</em> ngôi trường</h2>
      <p class="spaces__desc">Từ phòng học, hội trường đến phòng lab thực hành — giải pháp tích hợp, thi công đồng bộ.</p>
    </div>

    <div class="space-tabs reveal d1">
      <button class="space-tab active" onclick="switchSpace(this,'sp-lophoc')">
        <span class="space-tab__icon">🏫</span> Lớp học
      </button>
      <button class="space-tab" onclick="switchSpace(this,'sp-hoitruong')">
        <span class="space-tab__icon">🎭</span> Hội trường
      </button>
      <button class="space-tab" onclick="switchSpace(this,'sp-thuvien')">
        <span class="space-tab__icon">📚</span> Thư viện & Phòng lab
      </button>
    </div>

    <!-- Lớp học -->
    <div class="space-panel active" id="sp-lophoc">
      <div class="space-content reveal">
        <div class="space-content__main">
 <img src="https://tavaled.vn/wp-content/uploads/2026/03/0040_TavaLED_Hinh_Anh.jpg" alt="Lớp học với màn hình LED" loading="lazy">
          <div class="space-content__main__overlay"></div>
          <div class="space-content__main__body">
            <div class="space-tag">Phòng học</div>
            <h3 class="space-title">Mỗi chữ — sắc nét<br>từ mọi góc nhìn</h3>
            <p class="space-sub">Màn hình LED P2–P2.5 lắp đặt thay thế bảng phấn. Độ sáng 1.200–1.800 nit, góc nhìn 160° — học sinh cuối phòng vẫn thấy rõ từng chi tiết.</p>
          </div>
        </div>
        <div class="space-content__side">
          <div class="space-feat">
 <img src="https://tavaled.vn/wp-content/uploads/2026/03/0041_TavaLED_Hinh_Anh.jpg" alt="Âm thanh phòng học" loading="lazy">
            <div class="space-feat__overlay"></div>
            <div class="space-feat__body">
              <div class="space-feat__label">Âm thanh</div>
              <div class="space-feat__name">Loa + Micro không dây cho giáo viên</div>
            </div>
          </div>
          <div class="space-feat">
 <img src="https://tavaled.vn/wp-content/uploads/2026/03/0042_TavaLED_Hinh_Anh.jpg" alt="Điều khiển thông minh" loading="lazy">
            <div class="space-feat__overlay"></div>
            <div class="space-feat__body">
              <div class="space-feat__label">Điều khiển</div>
              <div class="space-feat__name">Tích hợp remote & app điều khiển</div>
            </div>
          </div>
        </div>
      </div>
      <div class="space-products reveal">
        <div class="space-products__label">Sản phẩm gợi ý cho lớp học</div>
        <div class="space-prods-grid">
          <a href="#" class="space-prod">
 <div class="space-prod__thumb"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0043_TavaLED_Hinh_Anh.jpg" alt="LED P2 Indoor" loading="lazy"></div>
            <div class="space-prod__body"><div class="space-prod__cat">Màn hình LED</div><div class="space-prod__name">LED P2 Indoor 40"–120"</div></div>
          </a>
          <a href="#" class="space-prod">
 <div class="space-prod__thumb"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0044_TavaLED_Hinh_Anh.jpg" alt="Loa phòng học" loading="lazy"></div>
            <div class="space-prod__body"><div class="space-prod__cat">Âm thanh</div><div class="space-prod__name">JBL Control 25 Speaker Set</div></div>
          </a>
          <a href="#" class="space-prod">
 <div class="space-prod__thumb"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0045_TavaLED_Hinh_Anh.jpg" alt="Micro giáo viên" loading="lazy"></div>
            <div class="space-prod__body"><div class="space-prod__cat">Micro</div><div class="space-prod__name">Shure MXW Wireless Lavalier</div></div>
          </a>
          <a href="#" class="space-prod">
 <div class="space-prod__thumb"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0046_TavaLED_Hinh_Anh.jpg" alt="Đèn LED lớp học" loading="lazy"></div>
            <div class="space-prod__body"><div class="space-prod__cat">Ánh sáng</div><div class="space-prod__name">Panel LED Anti-glare 40W</div></div>
          </a>
        </div>
      </div>
    </div>

    <!-- Hội trường -->
    <div class="space-panel" id="sp-hoitruong">
      <div class="space-content">
        <div class="space-content__main">
 <img src="https://tavaled.vn/wp-content/uploads/2026/03/0047_TavaLED_Hinh_Anh.jpg" alt="Hội trường trường học" loading="lazy">
          <div class="space-content__main__overlay"></div>
          <div class="space-content__main__body">
            <div class="space-tag">Hội trường</div>
            <h3 class="space-title">Sân khấu xứng tầm<br>cho từng sự kiện</h3>
            <p class="space-sub">Màn hình LED P2.5–P4 kết hợp hệ thống âm thanh Line Array và ánh sáng sân khấu. Phục vụ khai giảng, văn nghệ, hội thảo từ 200–2.000 khán giả.</p>
          </div>
        </div>
        <div class="space-content__side">
          <div class="space-feat">
 <img src="https://tavaled.vn/wp-content/uploads/2026/03/0048_TavaLED_Hinh_Anh.jpg" alt="Ánh sáng hội trường" loading="lazy">
            <div class="space-feat__overlay"></div>
            <div class="space-feat__body">
              <div class="space-feat__label">Ánh sáng</div>
              <div class="space-feat__name">Moving Head + Par LED sân khấu</div>
            </div>
          </div>
          <div class="space-feat">
 <img src="https://tavaled.vn/wp-content/uploads/2026/03/0049_TavaLED_Hinh_Anh.jpg" alt="Màn hình LED sân khấu" loading="lazy">
            <div class="space-feat__overlay"></div>
            <div class="space-feat__body">
              <div class="space-feat__label">Màn hình</div>
              <div class="space-feat__name">LED P3 Full HD Stage Wall</div>
            </div>
          </div>
        </div>
      </div>
      <div class="space-products">
        <div class="space-products__label">Sản phẩm gợi ý cho hội trường</div>
        <div class="space-prods-grid">
 <a href="#" class="space-prod"><div class="space-prod__thumb"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0050_TavaLED_Hinh_Anh.jpg" alt="" loading="lazy"></div><div class="space-prod__body"><div class="space-prod__cat">Màn hình LED</div><div class="space-prod__name">LED P3 Stage Full Wall</div></div></a>
 <a href="#" class="space-prod"><div class="space-prod__thumb"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0051_TavaLED_Hinh_Anh.jpg" alt="" loading="lazy"></div><div class="space-prod__body"><div class="space-prod__cat">Line Array</div><div class="space-prod__name">JBL VTX A8 Line Array</div></div></a>
 <a href="#" class="space-prod"><div class="space-prod__thumb"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0052_TavaLED_Hinh_Anh.jpg" alt="" loading="lazy"></div><div class="space-prod__body"><div class="space-prod__cat">Moving Head</div><div class="space-prod__name">Robe Pointe 280W Hybrid</div></div></a>
 <a href="#" class="space-prod"><div class="space-prod__thumb"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0053_TavaLED_Hinh_Anh.jpg" alt="" loading="lazy"></div><div class="space-prod__body"><div class="space-prod__cat">Mixer</div><div class="space-prod__name">Yamaha QL5 Digital Console</div></div></a>
        </div>
      </div>
    </div>

    <!-- Thư viện -->
    <div class="space-panel" id="sp-thuvien">
      <div class="space-content">
        <div class="space-content__main">
 <img src="https://tavaled.vn/wp-content/uploads/2026/03/0054_TavaLED_Hinh_Anh.jpg" alt="Thư viện trường học hiện đại" loading="lazy">
          <div class="space-content__main__overlay"></div>
          <div class="space-content__main__body">
            <div class="space-tag">Thư viện & Phòng lab</div>
            <h3 class="space-title">Không gian học tập<br>tự chủ — sáng tạo</h3>
            <p class="space-sub">Màn hình ghép LCD, LED P2.5 phòng lab máy tính, hệ thống âm thanh nền nhẹ nhàng. Tạo môi trường học tự học và nghiên cứu hiệu quả.</p>
          </div>
        </div>
        <div class="space-content__side">
          <div class="space-feat">
 <img src="https://tavaled.vn/wp-content/uploads/2026/03/0055_TavaLED_Hinh_Anh.jpg" alt="Phòng lab" loading="lazy">
            <div class="space-feat__overlay"></div>
            <div class="space-feat__body">
              <div class="space-feat__label">Phòng lab IT</div>
              <div class="space-feat__name">LED P2 + Hệ thống quản lý màn hình</div>
            </div>
          </div>
          <div class="space-feat">
 <img src="https://tavaled.vn/wp-content/uploads/2026/03/0056_TavaLED_Hinh_Anh.jpg" alt="Digital signage" loading="lazy">
            <div class="space-feat__overlay"></div>
            <div class="space-feat__body">
              <div class="space-feat__label">Digital Signage</div>
              <div class="space-feat__name">Bảng thông báo điện tử hành lang</div>
            </div>
          </div>
        </div>
      </div>
      <div class="space-products">
        <div class="space-products__label">Sản phẩm gợi ý cho thư viện & phòng lab</div>
        <div class="space-prods-grid">
 <a href="#" class="space-prod"><div class="space-prod__thumb"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0057_TavaLED_Hinh_Anh.jpg" alt="" loading="lazy"></div><div class="space-prod__body"><div class="space-prod__cat">LED Ghép</div><div class="space-prod__name">Màn hình ghép LCD 4K 55"</div></div></a>
 <a href="#" class="space-prod"><div class="space-prod__thumb"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0058_TavaLED_Hinh_Anh.jpg" alt="" loading="lazy"></div><div class="space-prod__body"><div class="space-prod__cat">Signage</div><div class="space-prod__name">LED P2.5 Digital Board 65"</div></div></a>
 <a href="#" class="space-prod"><div class="space-prod__thumb"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0059_TavaLED_Hinh_Anh.jpg" alt="" loading="lazy"></div><div class="space-prod__body"><div class="space-prod__cat">Âm thanh nền</div><div class="space-prod__name">Ceiling Speaker Set 5.1</div></div></a>
 <a href="#" class="space-prod"><div class="space-prod__thumb"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0060_TavaLED_Hinh_Anh.jpg" alt="" loading="lazy"></div><div class="space-prod__body"><div class="space-prod__cat">Điều khiển</div><div class="space-prod__name">Control System Crestron</div></div></a>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ══════════════════
     ACT 5 — PROOF
══════════════════ -->
<section class="proof" aria-labelledby="proof-heading">
  <div class="container">
    <div class="proof__header reveal">
      <div>
        <div class="eyebrow">Dự án thực tế</div>
        <h2 class="h2" id="proof-heading">Trường học đã<br><em>tin tưởng</em> chúng tôi</h2>
      </div>
      <a href="/du-an" style="display:inline-flex;align-items:center;gap:7px;font-size:12.5px;font-weight:600;color:var(--navy);text-decoration:none;border-bottom:1.5px solid var(--border);padding-bottom:4px;transition:color .2s,border-color .2s" onmouseover="this.style.color='var(--o)';this.style.borderColor='var(--o)'" onmouseout="this.style.color='var(--navy)';this.style.borderColor='var(--border)'">Xem tất cả dự án →</a>
    </div>

    <div class="cases reveal">
      <a href="#" class="case case--main" aria-label="THPT Nguyễn Du Hà Nội">
 <img src="https://tavaled.vn/wp-content/uploads/2026/03/0061_TavaLED_Hinh_Anh.jpg" alt="THPT Nguyễn Du" loading="lazy">
        <div class="case__overlay"></div>
        <div class="case__body">
          <div class="case__tag">Hà Nội · 2024</div>
          <div class="case__school">Trường THPT Nguyễn Du<br>— Hội trường + 32 Phòng học</div>
          <div class="case__detail">LED P2 indoor 120m² · Âm thanh 800 chỗ · Ánh sáng sân khấu</div>
          <div class="case__specs">
            <span class="spec-pill">P2.0mm Indoor</span>
            <span class="spec-pill">JBL Line Array</span>
            <span class="spec-pill">Robe Moving Head</span>
            <span class="spec-pill">5 ngày thi công</span>
          </div>
        </div>
      </a>
      <a href="#" class="case" aria-label="Đại học Bách Khoa">
 <img src="https://tavaled.vn/wp-content/uploads/2026/03/0062_TavaLED_Hinh_Anh.jpg" alt="Đại học Bách Khoa" loading="lazy">
        <div class="case__overlay"></div>
        <div class="case__body">
          <div class="case__tag">TP.HCM · 2024</div>
          <div class="case__school">ĐH Bách Khoa TP.HCM — Hội trường A</div>
          <div class="case__detail">LED P2.5 · 1.200 chỗ ngồi · 3 ngày thi công</div>
          <div class="case__specs">
            <span class="spec-pill">P2.5mm</span><span class="spec-pill">Yamaha CL5</span>
          </div>
        </div>
      </a>
      <a href="#" class="case" aria-label="THCS Lê Hồng Phong">
 <img src="https://tavaled.vn/wp-content/uploads/2026/03/0063_TavaLED_Hinh_Anh.jpg" alt="THCS Lê Hồng Phong" loading="lazy">
        <div class="case__overlay"></div>
        <div class="case__body">
          <div class="case__tag">Đà Nẵng · 2023</div>
          <div class="case__school">THCS Lê Hồng Phong — 24 Phòng học</div>
          <div class="case__detail">LED P2 · Micro không dây · 2 ngày thi công</div>
          <div class="case__specs">
            <span class="spec-pill">P2.0mm</span><span class="spec-pill">Shure Wireless</span>
          </div>
        </div>
      </a>
    </div>

    <div class="metrics reveal d2">
      <div class="metric">
        <div class="metric__val"><span class="cnt" data-to="150">0</span><span>+</span></div>
        <div class="metric__label">Trường học<br>trên toàn quốc</div>
      </div>
      <div class="metric">
        <div class="metric__val"><span class="cnt" data-to="2800">0</span><span>+</span></div>
        <div class="metric__label">Phòng học<br>được nâng cấp</div>
      </div>
      <div class="metric">
        <div class="metric__val"><span class="cnt" data-to="3">0</span><span>–5</span></div>
        <div class="metric__label">Ngày thi công<br>hoàn chỉnh một trường</div>
      </div>
      <div class="metric">
        <div class="metric__val"><span class="cnt" data-to="24">0</span><span>h</span></div>
        <div class="metric__label">Hỗ trợ kỹ thuật<br>sau lắp đặt</div>
      </div>
    </div>
  </div>
</section>

<!-- ══════════════════
     ACT 6 — WHY
══════════════════ -->
<section class="why" aria-labelledby="why-heading">
  <div class="container">
    <div class="why__inner">
      <div class="why__visual reveal">
        <div class="why__img-stack">
          <div class="why__img-main">
 <img src="https://tavaled.vn/wp-content/uploads/2026/03/0064_TavaLED_Hinh_Anh.jpg" alt="Hội trường trường học" loading="lazy">
          </div>
          <div class="why__img-accent">
 <img src="https://tavaled.vn/wp-content/uploads/2026/03/0001_TavaLED_Hinh_Anh.jpg" alt="Lớp học LED" loading="lazy">
          </div>
          <div class="why__badge">
            <div class="why__badge-num">10<span style="color:rgba(255,255,255,.5);font-size:.5em">+</span></div>
            <div class="why__badge-label">Năm kinh nghiệm<br>ngành giáo dục</div>
          </div>
        </div>
      </div>
      <div class="why__right reveal d2">
        <div class="eyebrow">Tại sao chọn TavaLLS</div>
        <h2 class="h2" id="why-heading">Cam kết<br><em>vượt kỳ vọng</em></h2>
        <div class="why__features">
          <div class="why__feat">
            <div class="why__feat-icon">🎓</div>
            <div>
              <div class="why__feat-title">Hiểu đặc thù giáo dục</div>
              <div class="why__feat-desc">Thiết kế phù hợp với quy định ánh sáng trường học Bộ GD&ĐT. Không gây chói mắt, bảo vệ thị lực học sinh.</div>
            </div>
          </div>
          <div class="why__feat">
            <div class="why__feat-icon">⚡</div>
            <div>
              <div class="why__feat-title">Thi công không gián đoạn</div>
              <div class="why__feat-desc">Lên lịch thi công cuối tuần hoặc dịp hè. Cam kết hoàn thành đúng tiến độ, không ảnh hưởng lịch học.</div>
            </div>
          </div>
          <div class="why__feat">
            <div class="why__feat-icon">💰</div>
            <div>
              <div class="why__feat-title">Hỗ trợ ngân sách nhà trường</div>
              <div class="why__feat-desc">Báo giá chi tiết từng hạng mục. Hỗ trợ hồ sơ đấu thầu, thanh toán theo giai đoạn phù hợp dự toán ngân sách.</div>
            </div>
          </div>
          <div class="why__feat">
            <div class="why__feat-icon">🛡️</div>
            <div>
              <div class="why__feat-title">Bảo hành 24 tháng tận nơi</div>
              <div class="why__feat-desc">Đội kỹ thuật có mặt trong 24 giờ tại Hà Nội, TP.HCM, Đà Nẵng. Linh kiện chính hãng, thay thế miễn phí trong bảo hành.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- ══════════════════
     ACT 7 — PROCESS
══════════════════ -->
<section class="process" aria-labelledby="process-heading">
  <div class="container">
    <div class="process__header reveal">
      <div class="eyebrow" style="color:var(--o);justify-content:center">Quy trình làm việc</div>
      <h2 class="h2 reveal" id="process-heading" style="color:var(--w);text-align:center">Từ tư vấn đến<br><em style="color:var(--o)">bàn giao</em> — 5 bước</h2>
      <p class="process__desc">Quy trình minh bạch, có checklist từng bước. Nhà trường luôn nắm rõ tiến độ.</p>
    </div>
    <div class="steps reveal d1">
      <div class="step">
        <div class="step__num step__num--active">1</div>
        <div class="step__icon">📋</div>
        <div class="step__title">Khảo sát & Tư vấn</div>
        <div class="step__desc">Đo đạc thực địa, phân tích nhu cầu cụ thể từng không gian</div>
      </div>
      <div class="step">
        <div class="step__num">2</div>
        <div class="step__icon">✏️</div>
        <div class="step__title">Thiết kế & Báo giá</div>
        <div class="step__desc">Bản vẽ kỹ thuật, sơ đồ lắp đặt, báo giá chi tiết trong 48h</div>
      </div>
      <div class="step">
        <div class="step__num">3</div>
        <div class="step__icon">🏗️</div>
        <div class="step__title">Thi công</div>
        <div class="step__desc">Đội kỹ thuật chuyên nghiệp, không ảnh hưởng lịch học</div>
      </div>
      <div class="step">
        <div class="step__num">4</div>
        <div class="step__icon">✅</div>
        <div class="step__title">Nghiệm thu</div>
        <div class="step__desc">Kiểm tra từng thiết bị, bàn giao biên bản nghiệm thu đầy đủ</div>
      </div>
      <div class="step">
        <div class="step__num">5</div>
        <div class="step__icon">🛠️</div>
        <div class="step__title">Bảo trì 24/7</div>
        <div class="step__desc">Hỗ trợ từ xa, bảo trì định kỳ, hotline riêng cho trường học</div>
      </div>
    </div>
  </div>
</section>


<!-- ══════════════════
     ACT 9 — CTA
══════════════════ -->
<section class="cta-edu" id="cta-edu" aria-labelledby="cta-heading">
  <div class="cta-edu__line" aria-hidden="true"></div>
  <div class="cta-edu__inner">
    <div class="reveal">
      <div class="eyebrow" style="color:rgba(240,90,37,.8)">Bắt đầu hành trình</div>
      <h2 class="cta-edu__title" id="cta-heading">
        Trường bạn<br>xứng đáng có<br><em>tốt hơn</em>
      </h2>
      <p class="cta-edu__sub">Tư vấn miễn phí, không ràng buộc. Đội kỹ thuật TavaLLS sẽ khảo sát thực địa và gửi đề xuất chi tiết trong 48 giờ.</p>
      <div style="margin-top:28px;display:flex;gap:16px;flex-wrap:wrap;align-items:center">
        <div style="display:flex;align-items:center;gap:8px;font-size:13px;color:rgba(255,255,255,.5)">
          <span style="color:var(--o)">✓</span> Khảo sát thực địa miễn phí
        </div>
        <div style="display:flex;align-items:center;gap:8px;font-size:13px;color:rgba(255,255,255,.5)">
          <span style="color:var(--o)">✓</span> Báo giá trong 48 giờ
        </div>
        <div style="display:flex;align-items:center;gap:8px;font-size:13px;color:rgba(255,255,255,.5)">
          <span style="color:var(--o)">✓</span> Hỗ trợ hồ sơ đấu thầu
        </div>
      </div>
    </div>
    <div class="cta-edu__form reveal d2">
      <div class="cta-edu__form-title">Để lại thông tin — chúng tôi liên hệ ngay</div>
      <div class="form-row">
        <input class="form-input" type="text" placeholder="Tên trường / Đơn vị *" required>
        <input class="form-input" type="text" placeholder="Họ và tên người liên hệ *" required>
        <input class="form-input" type="tel" placeholder="Số điện thoại *" required>
        <select class="form-select">
          <option value="" disabled selected>Hạng mục quan tâm</option>
          <option>Lớp học (Màn hình LED)</option>
          <option>Hội trường (Màn hình + Âm thanh + Ánh sáng)</option>
          <option>Thư viện / Phòng lab</option>
          <option>Toàn trường (trọn gói)</option>
        </select>
        <button class="form-submit" type="button" onclick="handleSubmit(this)">
          Nhận tư vấn & Báo giá miễn phí →
        </button>
      </div>
      <p class="form-note">🔒 Thông tin của bạn được bảo mật hoàn toàn</p>
    </div>
  </div>
</section>

<!-- Footer mini -->
<footer class="footer-mini" role="contentinfo">
  <div class="footer-mini__brand">TavaLLS<span class="footer-mini__dot"></span></div>
  <div class="footer-mini__links">
    <a href="/">Trang chủ</a>
    <a href="/san-pham">Sản phẩm</a>
    <a href="/du-an">Dự án</a>
    <a href="/lien-he">Liên hệ</a>
  </div>
  <div class="footer-mini__copy">© 2025 TavaLLS · <strong style="color:var(--o)">1900 xxxx</strong></div>
</footer>

<script>

/* ─── Nav solid on scroll ─── */
const nav=document.getElementById('nav');
window.addEventListener('scroll',()=>{
  nav.classList.toggle('solid',window.scrollY>60);
},{passive:true});

/* ─── Scroll reveal ─── */
const ro=new IntersectionObserver(entries=>{
  entries.forEach(e=>{if(e.isIntersecting){e.target.classList.add('visible');ro.unobserve(e.target);}});
},{threshold:.1,rootMargin:'0px 0px -40px 0px'});
document.querySelectorAll('.reveal').forEach(el=>ro.observe(el));

/* ─── Counter animation ─── */
function countUp(el,to,dur=1600){
  let n=0; const s=to/(dur/16);
  const t=setInterval(()=>{
    n=Math.min(n+s,to); el.textContent=Math.floor(n);
    if(n>=to)clearInterval(t);
  },16);
}
const co=new IntersectionObserver(entries=>{
  entries.forEach(e=>{
    if(e.isIntersecting){
      e.target.querySelectorAll('.cnt').forEach(el=>countUp(el,+el.dataset.to));
      co.unobserve(e.target);
    }
  });
},{threshold:.3});
document.querySelectorAll('.hero,.turn__inner,.metrics').forEach(el=>co.observe(el));

/* ─── Space tabs ─── */
function switchSpace(btn,id){
  document.querySelectorAll('.space-tab').forEach(b=>b.classList.remove('active'));
  document.querySelectorAll('.space-panel').forEach(p=>p.classList.remove('active'));
  btn.classList.add('active');
  const panel=document.getElementById(id);
  panel.classList.add('active');
  // Re-trigger image scale animation
  const img=panel.querySelector('.space-content__main img');
  if(img){img.style.transform='scale(1)';setTimeout(()=>img.style.transform='scale(1.03)',50);}
}

/* ─── Step hover ─── */
document.querySelectorAll('.step').forEach(step=>{
  step.addEventListener('mouseenter',()=>{
    step.querySelector('.step__num').classList.add('step__num--active');
  });
  step.addEventListener('mouseleave',()=>{
    const nums=document.querySelectorAll('.step__num');
    nums.forEach(n=>n.classList.remove('step__num--active'));
    nums[0].classList.add('step__num--active');
  });
});

/* ─── Form submit ─── */
function handleSubmit(btn){
  btn.textContent='✓ Đã gửi — Chúng tôi sẽ liên hệ trong 24h!';
  btn.style.background='#16a34a';
  btn.disabled=true;
}

/* ─── Smooth anchor ─── */
document.querySelectorAll('a[href^="#"]').forEach(a=>{
  a.addEventListener('click',e=>{
    const t=document.querySelector(a.getAttribute('href'));
    if(t){e.preventDefault();t.scrollIntoView({behavior:'smooth'});}
  });
});
</script>

<?php get_footer(); ?>