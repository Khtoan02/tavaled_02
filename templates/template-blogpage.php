<?php
/**
 * Template Name: Trang bài viết
 */

get_header(); ?>
<style>
*,*::before,*::after{box-sizing:border-box;margin:0;padding:0}

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
  font-family: "League Spartan", sans-serif !important;
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
  font-family: "League Spartan", sans-serif !important;
  font-weight: 900 !important;
  text-transform: uppercase;
  letter-spacing: -0.02em;
}

/* Font nghệ thuật: Cormorant Garamond cho các yếu tố trang trí (Ghost text) & Trích dẫn */
.sec-head__ghost, .qe__bg-letter, .qe__text, .qc__mark, 
.qc__text, .qm__oq, .qm__text, .qs__mark, .qs__text, .qc__ghost-num {
  font-family: 'Cormorant Garamond', serif !important;
}

.sec-head__title { 
  color: var(--navy); 
  font-size: 3.2rem !important; 
  display: flex;
  align-items: baseline;
  gap: 0.25em;
}

.sec-head__title em { 
  font-family: "League Spartan", sans-serif !important;
  color: var(--orange); 
  font-style: normal; /* Đưa về font chuẩn, không dùng Italic Serif nữa */
  text-transform: uppercase;
}
.sec-head__ghost { 
  font-family: 'Cormorant Garamond', serif !important;
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
  font-family: 'Cormorant Garamond', serif;
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
  filter: saturate(.82) brightness(.98);
}
.card:hover .card__thumb img { transform:scale(1.07); filter:saturate(1) brightness(1.01); }

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
  font-family: "League Spartan", sans-serif !important;
  font-weight: 700; /* Bold chuẩn cho Card */
  text-transform: uppercase;
  line-height: 1.35;
  color: var(--navy);
  margin-bottom: 9px; flex: 1;
  transition: color 0.2s;
}
.card:hover .card__title { color: var(--orange); }

.card__desc {
  font-family: "League Spartan", sans-serif !important;
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
  font-family: 'Cormorant Garamond', serif !important;
  font-size: 26rem; font-weight: 700; font-style: italic;
  line-height: 0.8; top: -40px; left: -20px;
  color: rgba(255,255,255,0.06);
  pointer-events: none; user-select: none;
  letter-spacing: -0.05em;
  z-index: 0;
}

.qe__text {
  font-family: 'Cormorant Garamond', serif !important;
  font-style: italic; font-size: 1.2rem; line-height: 1.6;
  color: #ffffff; position: relative; z-index: 2;
}
.qe__author {
  margin-top: 14px; font-size: 11px; font-weight: 800;
  font-family: "League Spartan", sans-serif !important;
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
  font-family: 'Cormorant Garamond', serif !important;
  font-size: 12rem; font-weight: 700; font-style: italic;
  color: var(--orange); opacity: 0.25; line-height: 1;
  margin-right: 48px; margin-top: -32px;
  flex-shrink: 0; user-select: none;
  position: relative; z-index: 2;
}
.qc__body { flex: 1; position: relative; z-index: 2; }
.qc__text {
  font-family: 'Cormorant Garamond', serif !important;
  font-style: italic; font-size: 1.85rem;
  line-height: 1.5; color: #ffffff;
  letter-spacing: -0.01em;
}
.qc__foot {
  display: flex; align-items: center; gap: 16px; margin-top: 32px;
}
.qc__dash { width: 48px; height: 2px; background: var(--orange); border-radius: 0; }
.qc__author {
  font-family: "League Spartan", sans-serif !important;
  font-size: 13px; font-weight: 800;
  letter-spacing: 0.25em; text-transform: uppercase; color: var(--orange);
}
/* Ký tự nghệ thuật phía sau cho Cinematic */
.qc__ghost-char {
  position: absolute; right: 40px; bottom: -80px;
  font-family: 'Cormorant Garamond', serif; font-size: 32rem; font-weight: 700;
  color: #ffffff; opacity: 0.06; font-style: italic;
  user-select: none; pointer-events: none; z-index: 0;
  letter-spacing: -0.1em;
}
.qc__ghost-num {
  position: absolute; right: 52px; top: 50%; transform: translateY(-50%);
  font-family: 'Cormorant Garamond', serif; font-size: 9rem; font-weight: 700;
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
  font-family: 'Cormorant Garamond', serif !important;
  font-size: 5rem; line-height: .7; font-style: italic;
  color: #ffffff; opacity: 0.4;
  display: block; margin-bottom: 20px;
}

.qm__text {
  font-family: 'Cormorant Garamond', serif !important;
  font-style: italic; font-size: 1.35rem;
  line-height: 1.6; color: #ffffff;
  position: relative; z-index: 2;
}
.qm__cell--c .qm__text { color: #ffffff; font-size: 1.1rem; }

.qm__author {
  margin-top: 24px; font-size: 11px; font-weight: 800;
  font-family: "League Spartan", sans-serif !important;
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
  font-family: 'Cormorant Garamond', serif; font-size: 26rem; 
  color: #ffffff; opacity: 0.08;
  pointer-events: none; font-weight: 700; user-select: none; font-style: italic;
  z-index: 1;
}
.qm__cell--b::after {
  content: 'V'; position: absolute; left: -30px; top: -40px;
  font-family: 'Cormorant Garamond', serif; font-size: 20rem;
  color: #ffffff; opacity: 0.07;
  pointer-events: none; font-weight: 700; user-select: none; font-style: italic;
  z-index: 1;
}
.qm__cell--c::after {
  content: 'L'; position: absolute; right: -20px; top: -30px;
  font-family: 'Cormorant Garamond', serif; font-size: 18rem;
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
  font-family: 'Cormorant Garamond', serif !important;
  font-size: 12rem; font-weight: 700; font-style: italic;
  color: var(--orange); opacity: 0.25; line-height: 1;
  flex-shrink:0; user-select:none; position:relative; z-index:1;
}
.qs__text {
  font-family: 'Cormorant Garamond', serif !important;
  font-style: italic; font-size: 1.7rem;
  line-height: 1.6; color: #ffffff;
  letter-spacing: -0.01em;
  text-shadow: 0 4px 15px rgba(0,0,0,0.4);
}
.qs__author { 
  font-family: "League Spartan", sans-serif !important;
  font-size: 12px; font-weight: 800; letter-spacing: 0.2em; text-transform: uppercase; color: var(--orange); 
}


/* ══════════════════════════════════
   ANIMATIONS
══════════════════════════════════ */
@keyframes fadeUp {
  from { opacity: 0; transform: translateY(30px) scale(0.98); filter: blur(6px); }
  to   { opacity: 1; transform: translateY(0) scale(1); filter: blur(0); }
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
  .project-hero { grid-template-columns:1fr; gap: 20px; }
  .project-hero .card-feat { grid-column:1; }
  .project-row, .project-row3 { grid-template-columns:1fr; gap: 20px; }
  .featured-grid { grid-template-columns:1fr; gap: 20px; }
  .card-big { grid-column:1; }
  .grid-3, .grid-2 { grid-template-columns:1fr; gap: 20px; }
  .sec-head { margin-bottom: 32px; }
  .sec-head__title { font-size:1.75rem; }
  .sec-head__ghost { font-size: 70px; top: -15px; left: -10px; }
  
  .quote-cinematic { padding:36px 24px; gap: 24px; }
  .qc__text { font-size:1.05rem; line-height:1.6; }
  .quote-solo { flex-direction:column; padding:40px 24px; gap:20px; text-align:center; }
  .qs__text { font-size:1.15rem; line-height:1.6; }
  
  /* Cải thiện thẻ Mobile, giãn dòng dễ đọc */
  .card__desc { display:block !important; font-size:13px; margin-top:10px; line-height:1.5; opacity:0.75; }
  .card__info { padding: 18px 20px !important; }
  .qc__ghost-char { font-size:150px; opacity:0.04; right: 10px; bottom: -20px; }
}
</style>


<main><div class="wrap">


<!-- ════════════════════════════════════════
     01 — DỰ ÁN  (first, most prominent)
════════════════════════════════════════ -->
<div class="anim d1">
  <div class="sec-head">
    <span class="sec-head__ghost">Dự Án</span>
    <div class="sec-head__main">
      <div class="sec-head__eyebrow">Công trình tiêu biểu</div>
      <h2 class="sec-head__title">Dự <em>Án</em></h2>
    </div>
    <a href="#" class="sec-head__more">Xem tất cả dự án</a>
  </div>

  <!-- Hero row: 1 large + 2 stacked -->
  <div class="project-hero">
    <div class="card card-feat">
      <div class="card__thumb" style="height:380px">
        <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=900&q=80" alt="">
        <span class="cat">Trong nhà · P2</span>
        <span class="loc-tag">📍 Hà Nội</span>
      </div>
      <div class="card__body">
        <div class="card__meta"><span>Tháng 5, 2025</span><span class="meta-dot"></span><span>Học viện</span><span class="meta-dot"></span><span>Màn hình P2 · 6m²</span></div>
        <h3 class="card__title" style="font-size:1.3rem">Lắp đặt màn hình LED P2 tại Học Viện Kỹ Thuật Mật Mã</h3>
        <p class="card__desc">Hệ thống màn hình LED P2 độ phân giải cao được thi công trong hội trường chính của Học Viện Kỹ Thuật Mật Mã, đáp ứng yêu cầu hiển thị sắc nét cho các hội nghị và sự kiện chuyên ngành.</p>
        <div class="card__foot">
          <div class="stats">
            <span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>2.4k</span>
            <span class="stat"><svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>148</span>
          </div>
          <a href="#" class="read-more">Xem dự án</a>
        </div>
      </div>
    </div>

    <div class="project-hero__right">
      <div class="card">
        <div class="card__thumb" style="height:178px">
          <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=600&q=80" alt="">
          <span class="cat">Trong nhà · P2</span>
          <span class="loc-tag">📍 TP.HCM</span>
        </div>
        <div class="card__body">
          <div class="card__meta"><span>Tháng 4, 2025</span><span class="meta-dot"></span><span>Doanh nghiệp</span></div>
          <h3 class="card__title" style="font-size:.92rem">Lắp đặt LED P2 tại Công Ty TNHH MTV Cao Su 75</h3>
          <div class="card__foot"><div class="stats"><span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>1.3k</span></div><a href="#" class="read-more">Xem</a></div>
        </div>
      </div>
      <div class="card">
        <div class="card__thumb" style="height:178px">
          <img src="https://images.unsplash.com/photo-1567521464027-f127ff144326?w=600&q=80" alt="">
          <span class="cat">Ngoài trời · P1.8</span>
          <span class="loc-tag">📍 Hà Nội</span>
        </div>
        <div class="card__body">
          <div class="card__meta"><span>Tháng 3, 2025</span><span class="meta-dot"></span><span>Xây dựng</span></div>
          <h3 class="card__title" style="font-size:.92rem">Lắp đặt LED P1.8 tại Công ty Cổ Phần XD & TM Mai 299</h3>
          <div class="card__foot"><div class="stats"><span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>904</span></div><a href="#" class="read-more">Xem</a></div>
        </div>
      </div>
    </div>
  </div>

  <!-- Row 2: 4 cards -->
  <div class="project-row">
    <div class="card">
      <div class="card__thumb" style="height:150px">
        <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?w=500&q=80" alt="">
        <span class="cat">P1.5 · Trong nhà</span>
        <span class="loc-tag">📍 Côn Đảo</span>
      </div>
      <div class="card__body">
        <div class="card__meta"><span>Tháng 2, 2025</span></div>
        <h3 class="card__title">Lắp đặt LED P1.5 trong nhà tại Côn Đảo</h3>
        <div class="card__foot"><div class="stats"><span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>721</span></div><a href="#" class="read-more">Xem</a></div>
      </div>
    </div>
    <div class="card">
      <div class="card__thumb" style="height:150px">
        <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=500&q=80" alt="">
        <span class="cat">P3 · Ngoài trời</span>
        <span class="loc-tag">📍 Đà Nẵng</span>
      </div>
      <div class="card__body">
        <div class="card__meta"><span>Tháng 1, 2025</span></div>
        <h3 class="card__title">Màn hình LED P3 ngoài trời tại trung tâm thương mại Đà Nẵng</h3>
        <div class="card__foot"><div class="stats"><span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>886</span></div><a href="#" class="read-more">Xem</a></div>
      </div>
    </div>
    <div class="card">
      <div class="card__thumb" style="height:150px">
        <img src="https://images.unsplash.com/photo-1509391366360-2e959784a276?w=500&q=80" alt="">
        <span class="cat">P4 · Sân vận động</span>
        <span class="loc-tag">📍 Cần Thơ</span>
      </div>
      <div class="card__body">
        <div class="card__meta"><span>Tháng 12, 2024</span></div>
        <h3 class="card__title">Thi công màn hình LED sân vận động Cần Thơ diện tích 40m²</h3>
        <div class="card__foot"><div class="stats"><span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>1.1k</span></div><a href="#" class="read-more">Xem</a></div>
      </div>
    </div>
    <div class="card">
      <div class="card__thumb" style="height:150px">
        <img src="https://images.unsplash.com/photo-1486325212027-8081e485255e?w=500&q=80" alt="">
        <span class="cat">P5 · Billboard</span>
        <span class="loc-tag">📍 Hải Phòng</span>
      </div>
      <div class="card__body">
        <div class="card__meta"><span>Tháng 11, 2024</span></div>
        <h3 class="card__title">Billboard LED P5 ngoài trời tại Hải Phòng cho thương hiệu quốc tế</h3>
        <div class="card__foot"><div class="stats"><span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>932</span></div><a href="#" class="read-more">Xem</a></div>
      </div>
    </div>
  </div>

  <!-- Row 3: 3 cards -->
  <div class="project-row3">
    <div class="card">
      <div class="card__thumb" style="height:165px">
        <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=500&q=80" alt="">
        <span class="cat">P2.5 · Hội trường</span>
        <span class="loc-tag">📍 Hà Nội</span>
      </div>
      <div class="card__body">
        <div class="card__meta"><span>Tháng 10, 2024</span></div>
        <h3 class="card__title">LED P2.5 phòng họp Bộ Tài Chính — diện tích 12m²</h3>
        <div class="card__foot"><div class="stats"><span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>685</span></div><a href="#" class="read-more">Xem</a></div>
      </div>
    </div>
    <div class="card">
      <div class="card__thumb" style="height:165px">
        <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=500&q=80" alt="">
        <span class="cat">P6 · Quảng cáo</span>
        <span class="loc-tag">📍 TP.HCM</span>
      </div>
      <div class="card__body">
        <div class="card__meta"><span>Tháng 9, 2024</span></div>
        <h3 class="card__title">Cụm màn hình LED quảng cáo P6 tại Vincom Đồng Khởi</h3>
        <div class="card__foot"><div class="stats"><span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>812</span></div><a href="#" class="read-more">Xem</a></div>
      </div>
    </div>
    <div class="card">
      <div class="card__thumb" style="height:165px">
        <img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?w=500&q=80" alt="">
        <span class="cat">P4 · Thi đấu</span>
        <span class="loc-tag">📍 Huế</span>
      </div>
      <div class="card__body">
        <div class="card__meta"><span>Tháng 8, 2024</span></div>
        <h3 class="card__title">Màn hình scoreboard LED sân vận động Tự Do — TP Huế</h3>
        <div class="card__foot"><div class="stats"><span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>743</span></div><a href="#" class="read-more">Xem</a></div>
      </div>
    </div>
  </div>
</div><!-- /dự án -->


<!-- ══ QUOTE A — after Dự Án ══ -->
<div class="anim d2">
  <div class="quote-editorial">
    <div class="qe__panel qe__panel--a">
      <span class="qe__bg-letter">C</span>
      <div class="qe__rule"></div>
      <p class="qe__text">Mỗi công trình không phải là điểm cuối — đó là minh chứng sống cho sự tin tưởng của khách hàng trao gửi vào chúng tôi.</p>
      <span class="qe__author">— TavaLLS</span>
    </div>
    <div class="qe__panel qe__panel--b">
      <span class="qe__bg-letter">Q</span>
      <div class="qe__rule"></div>
      <p class="qe__text">Chất lượng không bao giờ là sự trùng hợp ngẫu nhiên — nó luôn là kết quả của nỗ lực thông minh và nhất quán.</p>
      <span class="qe__author">— John Ruskin</span>
    </div>
    <div class="qe__panel qe__panel--c">
      <span class="qe__bg-letter">A</span>
      <div class="qe__rule"></div>
      <p class="qe__text">Ánh sáng đẹp nhất không chiếu từ thiết bị — nó chiếu từ tâm huyết của người đứng sau mỗi dự án.</p>
      <span class="qe__author">— Khuyết danh</span>
    </div>
  </div>
</div>

<div class="sec-div"></div>


<!-- ════════════════════════════════════════
     02 — CHIA SẺ KINH NGHIỆM
════════════════════════════════════════ -->
<div class="anim d2">
  <div class="sec-head">
    <span class="sec-head__ghost">Kinh Nghiệm</span>
    <div class="sec-head__main">
      <div class="sec-head__eyebrow">Góc nhìn chuyên môn</div>
      <h2 class="sec-head__title">Chia Sẻ <em>Kinh Nghiệm</em></h2>
    </div>
    <a href="#" class="sec-head__more">Xem tất cả</a>
  </div>

  <div class="featured-grid">
    <div class="card card-big">
      <div class="card__thumb">
        <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?w=800&q=80" alt="">
        <span class="cat">Nổi Bật</span>
        <span class="read-pill">8 phút đọc</span>
      </div>
      <div class="card__body">
        <div class="card__meta"><span>12 tháng 6, 2025</span><span class="meta-dot"></span><span>Kỹ thuật</span></div>
        <h3 class="card__title">So sánh màn hình LED và LCD: Cuộc chiến công nghệ hiển thị đỉnh cao trong kỷ nguyên số</h3>
        <p class="card__desc">Khi các toà nhà thương mại, sân vận động và trung tâm thương mại đều đang chuyển sang màn hình LED, câu hỏi lớn vẫn còn đó: LED hay LCD? Bài phân tích toàn diện từ độ sáng, tuổi thọ đến chi phí vận hành thực tế.</p>
        <div class="card__foot">
          <div class="stats">
            <span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>3.4k</span>
            <span class="stat"><svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>84</span>
          </div>
          <a href="#" class="read-more">Đọc ngay</a>
        </div>
      </div>
    </div>
    <div class="card card-sm">
      <div class="card__thumb"><img src="https://images.unsplash.com/photo-1498049794561-7780e7231661?w=500&q=80" alt=""><span class="cat">Kỹ thuật</span></div>
      <div class="card__body">
        <div class="card__meta"><span>8 tháng 6</span><span class="meta-dot"></span><span>6 phút</span></div>
        <h3 class="card__title">Màn hình LED COB là gì? Giải mã công nghệ mới nhất hiện nay</h3>
        <div class="card__foot"><div class="stats"><span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>1.2k</span></div><a href="#" class="read-more">Đọc</a></div>
      </div>
    </div>
    <div class="card card-sm">
      <div class="card__thumb"><img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=500&q=80" alt=""><span class="cat">Tư vấn</span></div>
      <div class="card__body">
        <div class="card__meta"><span>5 tháng 6</span><span class="meta-dot"></span><span>5 phút</span></div>
        <h3 class="card__title">Độ tương phản màn hình LED: Bí quyết tạo hình ảnh sống động</h3>
        <div class="card__foot"><div class="stats"><span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>987</span></div><a href="#" class="read-more">Đọc</a></div>
      </div>
    </div>
    <div class="card card-sm">
      <div class="card__thumb"><img src="https://images.unsplash.com/photo-1488229297570-58520851e868?w=500&q=80" alt=""><span class="cat">Báo giá</span></div>
      <div class="card__body">
        <div class="card__meta"><span>28 tháng 5</span><span class="meta-dot"></span><span>7 phút</span></div>
        <h3 class="card__title">Báo giá màn hình LED quảng cáo 250 inch – Tất cả loại 2025</h3>
        <div class="card__foot"><div class="stats"><span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>2.1k</span></div><a href="#" class="read-more">Đọc</a></div>
      </div>
    </div>
    <div class="card card-sm">
      <div class="card__thumb"><img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=500&q=80" alt=""><span class="cat">Kinh nghiệm</span></div>
      <div class="card__body">
        <div class="card__meta"><span>20 tháng 5</span><span class="meta-dot"></span><span>9 phút</span></div>
        <h3 class="card__title">Tần số quét màn hình LED: Cách chọn đúng cho từng ứng dụng</h3>
        <div class="card__foot"><div class="stats"><span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>1.4k</span></div><a href="#" class="read-more">Đọc</a></div>
      </div>
    </div>
  </div>
</div>


<!-- ══ QUOTE B — Cinematic dark wide ══ -->
<div class="anim d3">
  <div class="quote-cinematic">
    <span class="qc__ghost-char">V</span>
    <span class="qc__ghost-num">03</span>
    <div class="qc__mark">"</div>
    <div class="qc__body">
      <p class="qc__text">Kiến thức chia sẻ là ánh sáng nhân lên — mỗi kinh nghiệm được truyền đi không chỉ giúp một người, mà lan toả cho cả một ngành.</p>
      <div class="qc__foot">
        <div class="qc__dash"></div>
        <span class="qc__author">TavaLLS · Triết lý chia sẻ</span>
      </div>
    </div>
  </div>
</div>

<div class="sec-div"></div>


<!-- ════════════════════════════════════════
     03 — SỰ KIỆN NỔI BẬT
════════════════════════════════════════ -->
<div class="anim d3">
  <div class="sec-head">
    <span class="sec-head__ghost">Sự Kiện</span>
    <div class="sec-head__main">
      <div class="sec-head__eyebrow">Hoạt động & Đối tác</div>
      <h2 class="sec-head__title">Sự Kiện <em>Nổi Bật</em></h2>
    </div>
    <a href="#" class="sec-head__more">Xem tất cả</a>
  </div>

  <div class="sk-grid">
    <div class="card card-big">
      <div class="card__thumb">
        <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=900&q=80" alt="">
        <span class="cat">Hợp tác chiến lược</span>
      </div>
      <div class="card__body">
        <div class="card__meta"><span>15 tháng 4, 2025</span><span class="meta-dot"></span><span>Sự kiện doanh nghiệp</span></div>
        <h3 class="card__title">TavaLLS và Colorlight tăng cường hợp tác — Nâng cao chất lượng màn hình LED tại Việt Nam</h3>
        <p class="card__desc">Lễ ký kết hợp tác chiến lược giữa TavaLLS và tập đoàn Colorlight mở ra kỷ nguyên mới cho ngành hiển thị LED tại Việt Nam, với cam kết cung cấp giải pháp đẳng cấp quốc tế.</p>
        <div class="card__foot">
          <div class="stats">
            <span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>3.1k</span>
            <span class="stat"><svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>67</span>
          </div>
          <a href="#" class="read-more">Chi tiết</a>
        </div>
      </div>
    </div>

    <div class="sk-right">
      <div class="card card-md">
        <div class="card__thumb" style="height:155px">
          <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?w=600&q=80" alt="">
          <span class="cat">Thăm quan</span>
        </div>
        <div class="card__body">
          <div class="card__meta"><span>8 tháng 3, 2025</span><span class="meta-dot"></span><span>Đối tác quốc tế</span></div>
          <h3 class="card__title">QiangliLED đến thăm TavaLLS: Nâng tầm quan hệ đối tác chiến lược dài hạn</h3>
          <div class="card__foot"><div class="stats"><span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>1.4k</span></div><a href="#" class="read-more">Xem</a></div>
        </div>
      </div>
      <div class="card card-md">
        <div class="card__thumb" style="height:155px">
          <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=600&q=80" alt="">
          <span class="cat">Team Building</span>
        </div>
        <div class="card__body">
          <div class="card__meta"><span>12 tháng 2, 2025</span><span class="meta-dot"></span><span>Nội bộ</span></div>
          <h3 class="card__title">Team Building Hà Giang 2024 — Kỷ Niệm 5 Năm Thành Lập TavaLLS</h3>
          <div class="card__foot"><div class="stats"><span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>2.2k</span></div><a href="#" class="read-more">Xem</a></div>
        </div>
      </div>
    </div>
  </div>
</div>


<!-- ══ QUOTE C — Warm mosaic ══ -->
<div class="anim d4">
  <div class="quote-mosaic">
    <div class="qm__cell qm__cell--main">
      <span class="qm__oq">"</span>
      <p class="qm__text">Những đối tác tốt nhất không chỉ mang lại sản phẩm tốt — họ mang lại tầm nhìn và sự tin tưởng lâu dài vượt ra ngoài từng hợp đồng.</p>
      <div class="qm__author">TavaLLS</div>
    </div>
    <div class="qm__cell qm__cell--b">
      <span class="qm__oq">"</span>
      <p class="qm__text">Mình không chỉ bán sản phẩm — mình xây dựng mối quan hệ bền vững theo thời gian.</p>
      <div class="qm__author">Khuyết danh</div>
    </div>
    <div class="qm__cell qm__cell--c">
      <span class="qm__oq">"</span>
      <p class="qm__text">Thành công của doanh nghiệp được đo bằng chất lượng của những mối quan hệ mà nó gây dựng.</p>
      <div class="qm__author">Henry Ford</div>
    </div>
  </div>
</div>

<div class="sec-div"></div>


<!-- ════════════════════════════════════════
     04 — TIN TỨC
════════════════════════════════════════ -->
<div class="anim d4">
  <div class="sec-head">
    <span class="sec-head__ghost">Tin Tức</span>
    <div class="sec-head__main">
      <div class="sec-head__eyebrow">Cập nhật mới nhất</div>
      <h2 class="sec-head__title">Tin <em>Tức</em></h2>
    </div>
    <a href="#" class="sec-head__more">Xem tất cả</a>
  </div>

  <div class="grid-3">
    <div class="card card-md">
      <div class="card__thumb">
        <img src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=600&q=80" alt="">
        <span class="cat">Thị trường</span>
      </div>
      <div class="card__body">
        <div class="card__meta"><span>3 tháng 6</span><span class="meta-dot"></span><span>Xu hướng 2025</span></div>
        <h3 class="card__title">Thi công màn hình LED 120 inch ngoài trời: Xu hướng bùng nổ năm 2025</h3>
        <p class="card__desc">Ngành quảng cáo ngoài trời đang chứng kiến làn sóng chuyển đổi mạnh mẽ sang màn hình LED cỡ lớn trên toàn quốc.</p>
        <div class="card__foot"><div class="stats"><span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>2.3k</span></div><a href="#" class="read-more">Đọc</a></div>
      </div>
    </div>
    <div class="card card-md">
      <div class="card__thumb">
        <img src="https://images.unsplash.com/photo-1478860409698-8707f313ee8b?w=600&q=80" alt="">
        <span class="cat">Công nghệ</span>
      </div>
      <div class="card__body">
        <div class="card__meta"><span>28 tháng 5</span><span class="meta-dot"></span><span>Kỹ thuật</span></div>
        <h3 class="card__title">Tuổi thọ màn hình LED: Bí mật kéo dài vòng đời thiết bị của bạn</h3>
        <p class="card__desc">Với bảo trì đúng cách, màn hình LED có thể hoạt động ổn định lên tới 100.000 giờ liên tục.</p>
        <div class="card__foot"><div class="stats"><span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>1.7k</span></div><a href="#" class="read-more">Đọc</a></div>
      </div>
    </div>
    <div class="card card-md">
      <div class="card__thumb">
        <img src="https://images.unsplash.com/photo-1611532736597-de2d4265fba3?w=600&q=80" alt="">
        <span class="cat">Ngành LED</span>
      </div>
      <div class="card__body">
        <div class="card__meta"><span>20 tháng 5</span><span class="meta-dot"></span><span>Phân tích</span></div>
        <h3 class="card__title">Thị trường LED Việt Nam 2025: Tăng trưởng 35% so với năm trước</h3>
        <p class="card__desc">Báo cáo mới nhất cho thấy nhu cầu màn hình LED tại Việt Nam đang bùng nổ trong lĩnh vực giáo dục và thương mại.</p>
        <div class="card__foot"><div class="stats"><span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>1.9k</span></div><a href="#" class="read-more">Đọc</a></div>
      </div>
    </div>
  </div>
</div>


<!-- ══ QUOTE D — closing solo dark ══ -->
<div class="anim d5">
  <div class="quote-solo">
    <span class="qc__ghost-char" style="left:auto; right:20px; top:auto; bottom:-40px; opacity:0.04;">A</span>
    <div class="qs__mark">"</div>
    <div class="qs__body">
      <p class="qs__text">Ánh sáng không chỉ chiếu sáng không gian — nó định hình cảm xúc, khắc sâu ký ức và kể câu chuyện của thương hiệu bạn.</p>
      <div class="qs__attr">
        <div class="qs__dash"></div>
        <span class="qs__author">TavaLLS · Sứ mệnh</span>
      </div>
    </div>
  </div>
</div>


</div></main>

<?php get_footer(); ?>
