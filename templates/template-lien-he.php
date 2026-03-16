<?php
/**
 * Template Name: Trang liên hệ
 */

get_header(); ?>

<style>
.page-template-template-lien-he-php *, .page-template-template-lien-he-php *::before, .page-template-template-lien-he-php *::after { box-sizing: border-box; margin: 0; padding: 0; }


:root {
  --navy:  #1c2857;
  --navy2: #162248;
  --navy3: #0f1835;
  --o:     #f05a25;
  --odk:   #c8451a;
  --olt:   #fff3ee;
  --w:     #ffffff;
  --ink:   #111827;
  --mid:   #4b5563;
  --muted: #9ca3af;
  --light: #f9fafb;
  --bdr:   #e5e7eb;
  --ff:    'Mona Sans', 'Mona-Sans', sans-serif;
}

html { scroll-behavior: smooth; }
body {
  font-family: var(--ff);
  background: var(--w);
  color: var(--ink);
  overflow-x: hidden;
  -webkit-font-smoothing: antialiased;
  cursor: none;
}

/* ── CURSOR ── */
#cur-dot, #cur-ring {
  position: fixed; border-radius: 50%;
  pointer-events: none; z-index: 9999;
  transform: translate(-50%, -50%);
}
#cur-dot  { width: 7px; height: 7px; background: var(--o); }
#cur-ring {
  width: 36px; height: 36px;
  border: 1.5px solid rgba(240,90,37,.4);
  transition: width .3s, height .3s, border-color .3s;
}
body:has(a:hover) #cur-ring,
body:has(button:hover) #cur-ring { width: 50px; height: 50px; border-color: var(--o); }

/* ══════════════════════════════
   HERO
══════════════════════════════ */
.hero {
  height: 92vh; min-height: 600px;
  position: relative; overflow: hidden;
  background: var(--navy3);
  display: flex; align-items: flex-end;
}

.hero__collage {
  position: absolute; inset: 0;
  display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 2px;
}
.hero__collage-cell { overflow: hidden; }
.hero__collage-cell img {
  width: 100%; height: 100%; object-fit: cover; display: block;
  filter: brightness(.28) saturate(.4) hue-rotate(185deg);
  animation: zoom 14s ease-in-out infinite alternate;
}
.hero__collage-cell:nth-child(2) img { animation-delay: -5s; }
.hero__collage-cell:nth-child(3) img { animation-delay: -10s; }
@keyframes zoom { from { transform: scale(1.1); } to { transform: scale(1.02); } }

.hero__fog {
  position: absolute; inset: 0; z-index: 1;
  background:
    linear-gradient(180deg, rgba(15,24,53,.5) 0%, transparent 30%, rgba(15,24,53,.5) 58%, rgba(15,24,53,.97) 100%),
    linear-gradient(90deg, rgba(15,24,53,.2) 0%, transparent 50%, rgba(15,24,53,.2) 100%);
}
.hero__texture {
  position: absolute; inset: 0; z-index: 1; pointer-events: none;
  background-image:
    linear-gradient(rgba(255,255,255,.02) 1px, transparent 1px),
    linear-gradient(90deg, rgba(255,255,255,.02) 1px, transparent 1px);
  background-size: 60px 60px;
}
.hero__bottom-bar {
  position: absolute; bottom: 0; left: 0; right: 0; height: 3px; z-index: 3;
  background: linear-gradient(90deg, var(--o), var(--odk) 50%, rgba(240,90,37,.2));
}

.hero__body {
  position: relative; z-index: 2;
  width: 100%; padding: 0 52px 72px;
  display: grid; grid-template-columns: 1fr 1fr;
  align-items: flex-end; gap: 64px;
}

.hero__pretitle {
  display: inline-flex; align-items: center; gap: 10px;
  font-size: 10px; font-weight: 700; letter-spacing: .24em; text-transform: uppercase;
  color: var(--o); margin-bottom: 16px;
  opacity: 0; animation: fadeUp .5s .15s ease forwards;
}
.hero__pretitle::before { content: ''; display: block; width: 28px; height: 1.5px; background: var(--o); }

.hero__h1 {
  font-family: var(--ff);
  font-weight: 800;
  font-size: clamp(3.2rem, 6vw, 6.2rem);
  line-height: .93; letter-spacing: -.05em;
  color: var(--w);
  opacity: 0; animation: fadeUp .8s .3s cubic-bezier(.16,1,.3,1) forwards;
}
.hero__h1 em {
  display: block; font-style: italic; font-weight: 300;
  color: var(--o); font-size: .76em; letter-spacing: -.02em; margin-top: 6px;
}

.hero__right {
  display: flex; flex-direction: column; gap: 8px;
  opacity: 0; animation: fadeUp .7s .5s ease forwards;
}

.hero__tagline {
  font-size: 14px; font-weight: 300; color: rgba(255,255,255,.45);
  line-height: 1.85; max-width: 360px; margin-bottom: 18px;
}
.hero__tagline strong { font-weight: 600; color: rgba(255,255,255,.82); }

.city-shortcut {
  display: flex; align-items: center; gap: 14px;
  padding: 12px 15px;
  background: rgba(255,255,255,.05); border: 1px solid rgba(255,255,255,.09);
  border-radius: 8px; text-decoration: none;
  transition: background .2s, border-color .2s, padding-left .2s;
}
.city-shortcut:hover {
  background: rgba(240,90,37,.1); border-color: rgba(240,90,37,.3); padding-left: 20px;
}
.cs-tag {
  font-size: 8.5px; font-weight: 800; letter-spacing: .12em; text-transform: uppercase;
  padding: 3px 8px; border-radius: 3px; background: var(--o); color: var(--w); flex-shrink: 0;
}
.cs-city { font-size: 13px; font-weight: 700; color: var(--w); }
.cs-addr { font-size: 11px; color: rgba(255,255,255,.36); margin-top: 1px; }
.cs-arrow {
  margin-left: auto; flex-shrink: 0;
  width: 16px; height: 16px;
  stroke: rgba(255,255,255,.2); fill: none; stroke-width: 2;
  transition: stroke .2s, transform .2s;
}
.city-shortcut:hover .cs-arrow { stroke: var(--o); transform: translateX(4px); }

/* ══════════════════════════════
   QUICK BAR
══════════════════════════════ */
.qbar {
  background: var(--navy);
  display: grid; grid-template-columns: repeat(4, 1fr);
  border-bottom: 3px solid var(--o);
}
.qbar__item {
  display: flex; align-items: center; gap: 14px;
  padding: 24px 26px; text-decoration: none;
  border-right: 1px solid rgba(255,255,255,.07);
  position: relative; overflow: hidden;
  transition: background .22s;
}
.qbar__item:last-child { border-right: none; }
.qbar__item::before {
  content: ''; position: absolute; inset: 0;
  background: rgba(240,90,37,.07); opacity: 0; transition: opacity .25s;
}
.qbar__item:hover::before { opacity: 1; }

.qbar__ico {
  width: 42px; height: 42px; border-radius: 10px; flex-shrink: 0;
  background: rgba(240,90,37,.13); border: 1px solid rgba(240,90,37,.22);
  display: flex; align-items: center; justify-content: center;
  position: relative; z-index: 1;
  transition: background .2s, border-color .2s;
}
.qbar__item:hover .qbar__ico { background: rgba(240,90,37,.24); border-color: rgba(240,90,37,.48); }
.qbar__ico svg { width: 17px; height: 17px; stroke: var(--o); fill: none; stroke-width: 2; }

.qbar__txt { position: relative; z-index: 1; min-width: 0; }
.qbar__type {
  font-size: 9px; font-weight: 700; letter-spacing: .2em; text-transform: uppercase;
  color: rgba(255,255,255,.3); margin-bottom: 3px;
}
.qbar__val {
  font-size: 14px; font-weight: 600; color: var(--w);
  overflow: hidden; text-overflow: ellipsis; white-space: nowrap;
  transition: color .2s;
}
.qbar__item:hover .qbar__val { color: var(--o); }
.qbar__note { font-size: 10px; color: rgba(255,255,255,.26); margin-top: 2px; }

/* ══════════════════════════════
   OFFICES
══════════════════════════════ */
.offices { padding: 80px 0 0; background: var(--w); }

.sec-intro {
  padding: 0 52px;
  display: flex; align-items: flex-end; justify-content: space-between;
  gap: 32px; margin-bottom: 44px; flex-wrap: wrap;
}
.eyebrow {
  display: inline-flex; align-items: center; gap: 8px;
  font-size: 9.5px; font-weight: 700; letter-spacing: .22em; text-transform: uppercase;
  color: var(--o); margin-bottom: 10px;
}
.eyebrow::before { content: ''; display: block; width: 22px; height: 2px; background: var(--o); border-radius: 2px; }
.sec-h {
  font-family: var(--ff);
  font-weight: 800; font-size: clamp(1.9rem, 3.2vw, 2.8rem);
  line-height: 1.06; letter-spacing: -.04em; color: var(--navy);
}
.sec-h em { font-style: italic; font-weight: 300; color: var(--o); }
.sec-note { font-size: 13.5px; color: var(--muted); max-width: 300px; line-height: 1.75; }

/* City tabs */
.city-tabs {
  padding: 0 52px;
  display: flex; gap: 8px; margin-bottom: 0;
}
.city-tab {
  display: flex; align-items: center; gap: 9px;
  padding: 10px 20px;
  background: var(--light); border: 2px solid var(--bdr);
  border-radius: 9px; font-family: var(--ff); font-size: 13px; font-weight: 600;
  color: var(--muted); cursor: pointer;
  transition: all .24s cubic-bezier(.16,1,.3,1);
}
.city-tab:hover { border-color: var(--navy); color: var(--navy); background: var(--w); }
.city-tab.active {
  background: var(--navy); border-color: var(--navy); color: var(--w);
  box-shadow: 0 5px 20px rgba(28,40,87,.2);
}
.city-tab__n {
  width: 20px; height: 20px; border-radius: 50%;
  font-size: 9px; font-weight: 800;
  display: flex; align-items: center; justify-content: center;
  background: rgba(255,255,255,.15);
}
.city-tab:not(.active) .city-tab__n { background: var(--bdr); color: var(--muted); }

/* Panels */
.office-panels { overflow: hidden; }
.office-panel {
  display: none;
  grid-template-columns: 1fr 1fr;
}
.office-panel.active { display: grid; }

/* Map */
.o-map {
  position: relative; min-height: 600px; overflow: hidden;
  background: var(--navy3);
}
.o-map img {
  width: 100%; height: 100%; object-fit: cover; display: block;
  filter: brightness(.5) saturate(.5) hue-rotate(185deg);
  transition: transform 8s ease;
}
.office-panel.active .o-map img { transform: scale(1.04); }
.o-map__fog {
  position: absolute; inset: 0;
  background: linear-gradient(130deg, rgba(15,24,53,.6) 0%, rgba(28,40,87,.2) 100%);
}

/* Map pin */
.o-pin {
  position: absolute; top: 50%; left: 50%;
  transform: translate(-50%, -50%); z-index: 2;
}
.o-pin__ring {
  width: 58px; height: 58px; border-radius: 50%;
  background: rgba(240,90,37,.18); border: 2px solid rgba(240,90,37,.38);
  display: flex; align-items: center; justify-content: center;
  animation: ripple 2.6s ease-in-out infinite;
}
@keyframes ripple {
  0%,100% { box-shadow: 0 0 0 0 rgba(240,90,37,.4), 0 0 0 10px rgba(240,90,37,.08); }
  50%      { box-shadow: 0 0 0 14px rgba(240,90,37,.06), 0 0 0 28px rgba(240,90,37,0); }
}
.o-pin__dot {
  width: 28px; height: 28px; border-radius: 50%; background: var(--o);
  display: flex; align-items: center; justify-content: center;
  box-shadow: 0 4px 14px rgba(240,90,37,.55);
}
.o-pin__dot svg { width: 13px; height: 13px; stroke: #fff; fill: none; stroke-width: 2.5; }

/* City label */
.o-city-label {
  position: absolute; bottom: 0; left: 0; right: 0; z-index: 2;
  padding: 48px 36px 26px;
  background: linear-gradient(transparent, rgba(15,24,53,.92));
}
.o-city-label__name {
  font-family: var(--ff);
  font-size: clamp(2.6rem, 4.5vw, 4rem);
  font-weight: 800; font-style: italic;
  letter-spacing: -.06em; color: var(--w); line-height: .92;
}
.o-city-label__sub {
  font-size: 10px; font-weight: 700; letter-spacing: .2em; text-transform: uppercase;
  color: rgba(255,255,255,.38); margin-top: 8px;
}

.o-gmap {
  position: absolute; top: 20px; right: 20px; z-index: 3;
  display: inline-flex; align-items: center; gap: 6px;
  padding: 8px 14px;
  background: rgba(255,255,255,.09); backdrop-filter: blur(10px);
  border: 1px solid rgba(255,255,255,.15); border-radius: 7px;
  font-size: 11.5px; font-weight: 600; color: var(--w); text-decoration: none;
  transition: background .2s, border-color .2s;
}
.o-gmap:hover { background: rgba(240,90,37,.2); border-color: rgba(240,90,37,.4); }
.o-gmap svg { width: 12px; height: 12px; stroke: currentColor; fill: none; stroke-width: 2; }

/* Info panel */
.o-info {
  padding: 44px 48px 44px 44px;
  background: var(--w); border-top: 4px solid var(--o);
  display: flex; flex-direction: column;
}

.o-badge {
  display: inline-flex; align-items: center; gap: 6px;
  font-size: 9px; font-weight: 700; letter-spacing: .2em; text-transform: uppercase;
  color: var(--o); padding: 3px 10px;
  background: var(--olt); border: 1px solid rgba(240,90,37,.22);
  border-radius: 4px; align-self: flex-start; margin-bottom: 16px;
}
.o-name {
  font-family: var(--ff);
  font-weight: 800; font-size: clamp(1.4rem, 2.2vw, 1.9rem);
  letter-spacing: -.04em; color: var(--navy); line-height: 1.1; margin-bottom: 4px;
}
.o-role { font-size: 12.5px; color: var(--muted); font-style: italic; margin-bottom: 28px; }

/* Info rows */
.info-rows { display: flex; flex-direction: column; }
.info-row {
  display: flex; align-items: flex-start; gap: 14px;
  padding: 14px 0; border-bottom: 1px solid var(--bdr);
  transition: padding-left .18s;
}
.info-row:last-child { border-bottom: none; }
.info-row:hover { padding-left: 5px; }
.info-row__ico {
  width: 36px; height: 36px; border-radius: 9px; flex-shrink: 0;
  background: var(--light); border: 1.5px solid var(--bdr);
  display: flex; align-items: center; justify-content: center;
  transition: background .18s, border-color .18s;
}
.info-row:hover .info-row__ico { background: var(--olt); border-color: rgba(240,90,37,.26); }
.info-row__ico svg { width: 15px; height: 15px; stroke: var(--navy); fill: none; stroke-width: 2; transition: stroke .18s; }
.info-row:hover .info-row__ico svg { stroke: var(--o); }
.info-row__lbl {
  font-size: 9px; font-weight: 700; letter-spacing: .18em; text-transform: uppercase;
  color: var(--muted); margin-bottom: 4px;
}
.info-row__val {
  font-size: 13.5px; font-weight: 500; color: var(--navy); line-height: 1.55;
  text-decoration: none; transition: color .18s;
}
a.info-row__val:hover { color: var(--o); }
.info-row__note { font-size: 11px; color: var(--muted); margin-top: 2px; }

/* Hours */
.hours-grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 7px; margin-top: 8px; }
.h-item {
  background: var(--light); border: 1.5px solid var(--bdr);
  border-radius: 7px; padding: 8px 10px; text-align: center;
}
.h-item--active { background: var(--navy); border-color: var(--navy); }
.h-day { font-size: 9px; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; color: var(--muted); margin-bottom: 2px; }
.h-item--active .h-day { color: rgba(255,255,255,.42); }
.h-time { font-size: 11.5px; font-weight: 600; color: var(--navy); }
.h-item--active .h-time { color: var(--w); }

/* CTA buttons */
.o-cta { display: flex; gap: 10px; margin-top: auto; padding-top: 24px; flex-wrap: wrap; }
.btn-orange {
  display: inline-flex; align-items: center; gap: 7px;
  padding: 11px 22px; background: var(--o); color: var(--w);
  font-family: var(--ff); font-size: 12px; font-weight: 700; letter-spacing: .05em; text-transform: uppercase;
  border-radius: 8px; text-decoration: none;
  box-shadow: 0 3px 16px rgba(240,90,37,.26);
  transition: background .18s, transform .15s;
}
.btn-orange:hover { background: var(--odk); transform: translateY(-2px); }
.btn-orange svg { width: 13px; height: 13px; stroke: currentColor; fill: none; stroke-width: 2; }
.btn-outline {
  display: inline-flex; align-items: center; gap: 7px;
  padding: 10px 18px;
  background: transparent; border: 1.5px solid var(--bdr);
  border-radius: 8px; font-family: var(--ff); font-size: 12px; font-weight: 600; color: var(--mid);
  text-decoration: none; transition: border-color .18s, color .18s, background .18s;
}
.btn-outline:hover { border-color: var(--navy); color: var(--navy); background: var(--light); }
.btn-outline svg { width: 13px; height: 13px; stroke: currentColor; fill: none; stroke-width: 2; }

/* ══════════════════════════════
   CHANNELS
══════════════════════════════ */
.channels { padding: 80px 0; background: var(--light); border-top: 1px solid var(--bdr); }
.channels__inner { padding: 0 52px; }
.channels__head { margin-bottom: 44px; }
.channels__grid { display: grid; grid-template-columns: repeat(3,1fr); gap: 16px; }

.ch-card {
  background: var(--w); border-radius: 12px; border: 2px solid var(--bdr);
  padding: 26px 24px; text-decoration: none; display: flex; flex-direction: column;
  position: relative; overflow: hidden;
  transition: border-color .22s, transform .3s cubic-bezier(.16,1,.3,1), box-shadow .26s;
}
.ch-card::after {
  content: ''; position: absolute; bottom: 0; left: 0; right: 0; height: 3px;
  background: var(--o); transform: scaleX(0); transform-origin: left;
  transition: transform .3s cubic-bezier(.16,1,.3,1);
}
.ch-card:hover { border-color: rgba(28,40,87,.16); transform: translateY(-5px); box-shadow: 0 18px 50px rgba(28,40,87,.08); }
.ch-card:hover::after { transform: scaleX(1); }

.ch-ico { width: 50px; height: 50px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 22px; margin-bottom: 18px; }
.ico-a { background: #fff0eb; } .ico-b { background: #eff6ff; } .ico-c { background: #ecfdf5; }
.ico-d { background: #fefce8; } .ico-e { background: #f5f3ff; } .ico-f { background: #fdf2f8; }

.ch-type { font-size: 9px; font-weight: 700; letter-spacing: .2em; text-transform: uppercase; color: var(--muted); margin-bottom: 5px; }
.ch-name { font-family: var(--ff); font-size: 1.1rem; font-weight: 800; letter-spacing: -.03em; color: var(--navy); margin-bottom: 4px; }
.ch-val  { font-size: 13px; font-weight: 500; color: var(--o); margin-bottom: 10px; }
.ch-note { font-size: 12px; color: var(--muted); line-height: 1.68; margin-top: auto; }

/* ══════════════════════════════
   SOCIAL
══════════════════════════════ */
.social { padding: 64px 0; background: var(--w); border-top: 1px solid var(--bdr); }
.social__inner { padding: 0 52px; }
.social__head { margin-bottom: 36px; }
.social__grid { display: grid; grid-template-columns: repeat(4,1fr); gap: 14px; }

.soc-card {
  display: flex; align-items: center; gap: 14px;
  padding: 17px 19px; border-radius: 10px;
  border: 1.5px solid var(--bdr); text-decoration: none; background: var(--w);
  transition: transform .26s cubic-bezier(.16,1,.3,1), box-shadow .24s, border-color .2s;
}
.soc-card:hover { transform: translateY(-3px); box-shadow: 0 12px 32px rgba(28,40,87,.07); }
.soc-card--fb:hover { border-color: #1877f2; }
.soc-card--yt:hover { border-color: #ff0000; }
.soc-card--tt:hover { border-color: #333; }
.soc-card--zl:hover { border-color: #0068ff; }

.soc-card__ico {
  width: 40px; height: 40px; border-radius: 10px; flex-shrink: 0;
  display: flex; align-items: center; justify-content: center;
}
.soc-card--fb .soc-card__ico { background: #1877f2; }
.soc-card--yt .soc-card__ico { background: #ff0000; }
.soc-card--tt .soc-card__ico { background: #111; }
.soc-card--zl .soc-card__ico { background: #0068ff; }
.soc-card__ico svg { width: 18px; height: 18px; stroke: #fff; fill: none; stroke-width: 2; }

.soc-card__name   { font-size: 13px; font-weight: 700; color: var(--navy); margin-bottom: 1px; }
.soc-card__handle { font-size: 11.5px; color: var(--muted); }
.soc-card__arrow {
  margin-left: auto; flex-shrink: 0;
  width: 14px; height: 14px; stroke: var(--muted); fill: none; stroke-width: 2;
  transition: stroke .2s, transform .2s;
}
.soc-card:hover .soc-card__arrow { stroke: var(--navy); transform: translate(2px,-2px); }

/* ══════════════════════════════
   FAQ
══════════════════════════════ */
.faq { padding: 64px 0 80px; background: var(--light); border-top: 1px solid var(--bdr); }
.faq__layout {
  padding: 0 52px;
  display: grid; grid-template-columns: 1fr 1.6fr; gap: 64px; align-items: start;
}
.faq__img {
  width: 100%; height: 240px; object-fit: cover;
  border-radius: 10px; margin-top: 24px;
  filter: brightness(.85) saturate(.8);
  box-shadow: 0 16px 48px rgba(28,40,87,.1);
}
.faq__link {
  display: inline-flex; align-items: center; gap: 8px;
  margin-top: 20px;
  font-size: 12.5px; font-weight: 700; color: var(--o); text-decoration: none;
  border-bottom: 1.5px solid rgba(240,90,37,.3); padding-bottom: 3px;
  transition: border-color .2s;
}
.faq__link:hover { border-color: var(--o); }

.faq-list { display: flex; flex-direction: column; gap: 2px; margin-top: 8px; }
.faq-item {
  background: var(--w); overflow: hidden;
  border-bottom: 1px solid var(--bdr);
}
.faq-q {
  display: flex; align-items: center; justify-content: space-between; gap: 14px;
  padding: 15px 16px; cursor: pointer;
  font-size: 13.5px; font-weight: 500; color: var(--ink);
  transition: color .18s, background .18s; user-select: none;
}
.faq-q:hover { background: var(--olt); color: var(--navy); }
.faq-item.open .faq-q { background: var(--olt); color: var(--o); }
.faq-ico {
  width: 24px; height: 24px; border-radius: 50%; flex-shrink: 0;
  border: 1.5px solid var(--bdr);
  display: flex; align-items: center; justify-content: center;
  transition: border-color .2s, transform .3s, background .2s;
}
.faq-item.open .faq-ico { border-color: var(--o); background: var(--o); transform: rotate(45deg); }
.faq-ico svg { width: 10px; height: 10px; stroke: var(--mid); fill: none; stroke-width: 2.5; }
.faq-item.open .faq-ico svg { stroke: var(--w); }
.faq-a { max-height: 0; overflow: hidden; transition: max-height .38s cubic-bezier(.16,1,.3,1); }
.faq-item.open .faq-a { max-height: 200px; }
.faq-a__in { padding: 2px 16px 16px; font-size: 13px; color: var(--muted); line-height: 1.8; }

/* ══════════════════════════════
   CTA STRIP
══════════════════════════════ */
.cta-strip {
  background: var(--navy); padding: 52px 0;
  position: relative; overflow: hidden;
}
.cta-strip::before {
  content: ''; position: absolute; inset: 0;
  background-image:
    linear-gradient(rgba(255,255,255,.018) 1px, transparent 1px),
    linear-gradient(90deg, rgba(255,255,255,.018) 1px, transparent 1px);
  background-size: 52px 52px;
}
.cta-strip::after {
  content: ''; position: absolute; top: -80px; right: -80px;
  width: 350px; height: 350px; border-radius: 50%;
  background: radial-gradient(circle, rgba(240,90,37,.14) 0%, transparent 70%);
  pointer-events: none;
}
.cta-strip__inner {
  padding: 0 52px; position: relative; z-index: 1;
  display: flex; align-items: center; justify-content: space-between;
  gap: 24px; flex-wrap: wrap;
}
.cta-strip__label {
  font-size: 9.5px; font-weight: 700; letter-spacing: .22em; text-transform: uppercase;
  color: rgba(240,90,37,.7); margin-bottom: 8px;
}
.cta-strip__h {
  font-family: var(--ff); font-weight: 800;
  font-size: clamp(1.6rem, 2.8vw, 2.4rem);
  letter-spacing: -.04em; color: var(--w); line-height: 1.06;
}
.cta-strip__h em { font-style: italic; font-weight: 300; color: var(--o); }
.cta-btns { display: flex; gap: 10px; flex-wrap: wrap; }
.btn-white {
  display: inline-flex; align-items: center; gap: 8px;
  padding: 12px 28px; background: var(--w); color: var(--navy);
  font-family: var(--ff); font-size: 12.5px; font-weight: 700; letter-spacing: .04em; text-transform: uppercase;
  border-radius: 8px; text-decoration: none;
  box-shadow: 0 3px 18px rgba(0,0,0,.18);
  transition: transform .15s, box-shadow .2s;
}
.btn-white:hover { transform: translateY(-2px); box-shadow: 0 7px 26px rgba(0,0,0,.26); }
.btn-ghost {
  display: inline-flex; align-items: center; gap: 8px;
  padding: 11px 20px; background: transparent;
  border: 1.5px solid rgba(255,255,255,.26); color: rgba(255,255,255,.76);
  font-family: var(--ff); font-size: 12.5px; font-weight: 600; letter-spacing: .04em; text-transform: uppercase;
  border-radius: 8px; text-decoration: none;
  transition: border-color .2s, color .2s, background .2s;
}
.btn-ghost:hover { border-color: rgba(255,255,255,.56); color: var(--w); background: rgba(255,255,255,.06); }
.btn-ghost svg { width: 13px; height: 13px; stroke: currentColor; fill: none; stroke-width: 2; }

/* ══════════════════════════════
   ANIMATIONS
══════════════════════════════ */
@keyframes fadeUp { from{opacity:0;transform:translateY(18px)} to{opacity:1;transform:translateY(0)} }

.rv {
  opacity: 0; transform: translateY(24px);
  transition: opacity .7s cubic-bezier(.16,1,.3,1), transform .7s cubic-bezier(.16,1,.3,1);
}
.rv.in { opacity: 1; transform: translateY(0); }
.d1{transition-delay:.08s} .d2{transition-delay:.16s} .d3{transition-delay:.24s} .d4{transition-delay:.32s}

/* ══════════════════════════════
   RESPONSIVE
══════════════════════════════ */
@media(max-width:1100px){
  .hero__body { grid-template-columns: 1fr; gap: 36px; }
  .office-panel.active { grid-template-columns: 1fr; }
  .o-map { min-height: 320px; }
  .channels__grid { grid-template-columns: repeat(2,1fr); }
  .social__grid { grid-template-columns: repeat(2,1fr); }
  .faq__layout { grid-template-columns: 1fr; gap: 40px; }
  .qbar { grid-template-columns: repeat(2,1fr); }
}
@media(max-width:768px){
  .hero__body, .sec-intro, .city-tabs, .channels__inner,
  .social__inner, .faq__layout, .cta-strip__inner { padding-left: 20px; padding-right: 20px; }
  .hero__collage { grid-template-columns: 1fr 1fr; }
  .hero__collage-cell:last-child { display: none; }
  .channels__grid { grid-template-columns: 1fr; }
  .social__grid { grid-template-columns: 1fr 1fr; }
  .o-info { padding: 26px 22px; }
  .qbar { grid-template-columns: 1fr 1fr; }
}
@media(max-width:480px){
  .qbar { grid-template-columns: 1fr; }
  .social__grid { grid-template-columns: 1fr; }
  .cta-strip__inner { flex-direction: column; align-items: flex-start; }
  .hours-grid { grid-template-columns: repeat(2,1fr); }
}
</style>
<div id="cur-dot"></div>
<div id="cur-ring"></div>

<!-- ══ HERO ══ -->
<section class="hero" aria-label="Liên hệ TavaLED">
  <div class="hero__collage" aria-hidden="true">
    <div class="hero__collage-cell"><img src="https://images.unsplash.com/photo-1486325212027-8081e485255e?w=900&q=85" alt="Hà Nội" loading="eager"></div>
    <div class="hero__collage-cell"><img src="https://images.unsplash.com/photo-1583417319070-4a69db38a482?w=900&q=85" alt="TP.HCM" loading="eager"></div>
    <div class="hero__collage-cell"><img src="https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=900&q=85" alt="Đà Nẵng" loading="eager"></div>
  </div>
  <div class="hero__fog"    aria-hidden="true"></div>
  <div class="hero__texture" aria-hidden="true"></div>
  <div class="hero__bottom-bar" aria-hidden="true"></div>

  <div class="hero__body">
    <div>
      <div class="hero__pretitle">Kết nối với chúng tôi</div>
      <h1 class="hero__h1">Liên hệ<br><em>TavaLED</em></h1>
    </div>
    <div class="hero__right">
      <p class="hero__tagline">Ba văn phòng trải dài từ Bắc vào Nam.<br>Phản hồi trong <strong>2 giờ làm việc.</strong></p>
      <a href="#offices" class="city-shortcut" onclick="switchCity('hanoi');return false;">
        <span class="cs-tag">HN</span>
        <div><div class="cs-city">Hà Nội</div><div class="cs-addr">Văn phòng miền Bắc · 48 Hoàng Cầu</div></div>
        <svg class="cs-arrow" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
      </a>
      <a href="#offices" class="city-shortcut" onclick="switchCity('hochiminh');return false;">
        <span class="cs-tag">HCM</span>
        <div><div class="cs-city">TP. Hồ Chí Minh</div><div class="cs-addr">Văn phòng miền Nam · 128 Nguyễn Đình Chiểu</div></div>
        <svg class="cs-arrow" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
      </a>
      <a href="#offices" class="city-shortcut" onclick="switchCity('danang');return false;">
        <span class="cs-tag">ĐN</span>
        <div><div class="cs-city">Đà Nẵng</div><div class="cs-addr">Văn phòng miền Trung · 36 Trần Phú</div></div>
        <svg class="cs-arrow" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
      </a>
    </div>
  </div>
</section>

<!-- ══ QUICK BAR ══ -->
<div class="qbar" role="complementary">
  <a href="tel:19001234" class="qbar__item">
    <div class="qbar__ico"><svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 014.7 12.5a19.79 19.79 0 01-3.07-8.67A2 2 0 013.59 2h3a2 2 0 012 1.72 12 12 0 00.7 2.81 2 2 0 01-.45 2.11L7.91 9.91a16 16 0 006.1 6.1l.96-.96a2 2 0 012.11-.45 12 12 0 002.81.7A2 2 0 0122 16.92z"/></svg></div>
    <div class="qbar__txt"><div class="qbar__type">Hotline 24/7</div><div class="qbar__val">1900 1234</div><div class="qbar__note">Miễn phí cước gọi</div></div>
  </a>
  <a href="mailto:info@tavaled.vn" class="qbar__item">
    <div class="qbar__ico"><svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></div>
    <div class="qbar__txt"><div class="qbar__type">Email tư vấn</div><div class="qbar__val">info@tavaled.vn</div><div class="qbar__note">Phản hồi trong 2 giờ</div></div>
  </a>
  <a href="https://zalo.me/tavalled" target="_blank" rel="noopener" class="qbar__item">
    <div class="qbar__ico"><svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg></div>
    <div class="qbar__txt"><div class="qbar__type">Zalo OA</div><div class="qbar__val">TavaLED Official</div><div class="qbar__note">Chat trực tiếp tức thì</div></div>
  </a>
  <a href="mailto:support@tavaled.vn" class="qbar__item">
    <div class="qbar__ico"><svg viewBox="0 0 24 24"><path d="M14.7 6.3a1 1 0 000 1.4l1.6 1.6a1 1 0 001.4 0l3.77-3.77a6 6 0 01-7.94 7.94l-6.91 6.91a2.12 2.12 0 01-3-3l6.91-6.91a6 6 0 017.94-7.94l-3.76 3.76z"/></svg></div>
    <div class="qbar__txt"><div class="qbar__type">Hỗ trợ kỹ thuật</div><div class="qbar__val">support@tavaled.vn</div><div class="qbar__note">Bảo hành &amp; sự cố</div></div>
  </a>
</div>

<!-- ══ OFFICES ══ -->
<section class="offices" id="offices" aria-labelledby="off-heading">
  <div class="sec-intro rv">
    <div>
      <div class="eyebrow">Văn phòng đại diện</div>
      <h2 class="sec-h" id="off-heading">Ba văn phòng —<br><em>một tiêu chuẩn</em></h2>
    </div>
    <p class="sec-note">Đội kỹ thuật TavaLED có mặt tại bất kỳ tỉnh thành nào trong vòng 24 giờ.</p>
  </div>

  <div class="city-tabs rv d1" role="tablist">
    <button class="city-tab active" id="tab-hn"  role="tab" onclick="switchCity('hanoi')"><span class="city-tab__n">1</span>Hà Nội</button>
    <button class="city-tab"        id="tab-hcm" role="tab" onclick="switchCity('hochiminh')"><span class="city-tab__n">2</span>TP. Hồ Chí Minh</button>
    <button class="city-tab"        id="tab-dn"  role="tab" onclick="switchCity('danang')"><span class="city-tab__n">3</span>Đà Nẵng</button>
  </div>

  <div class="office-panels">

    <!-- HÀ NỘI -->
    <div class="office-panel active" id="panel-hanoi">
      <div class="o-map">
        <img src="https://images.unsplash.com/photo-1486325212027-8081e485255e?w=1000&q=85" alt="Hà Nội">
        <div class="o-map__fog"></div>
        <div class="o-pin" aria-hidden="true"><div class="o-pin__ring"><div class="o-pin__dot"><svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg></div></div></div>
        <div class="o-city-label"><div class="o-city-label__name">Hà Nội</div><div class="o-city-label__sub">Văn phòng miền Bắc · Trụ sở chính</div></div>
        <a href="https://maps.google.com?q=48+Hoang+Cau+Ha+Noi" target="_blank" rel="noopener" class="o-gmap"><svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>Google Maps</a>
      </div>
      <div class="o-info">
        <div class="o-badge">🏢 Trụ sở chính</div>
        <div class="o-name">Văn phòng Hà Nội</div>
        <div class="o-role">Phụ trách thị trường miền Bắc — 28 tỉnh thành</div>
        <div class="info-rows">
          <div class="info-row"><div class="info-row__ico"><svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg></div><div><div class="info-row__lbl">Địa chỉ</div><div class="info-row__val">Số 48 Hoàng Cầu, Phường Ô Chợ Dừa<br>Quận Đống Đa, Hà Nội</div><div class="info-row__note">Tòa nhà TavaLED Tower, tầng 6–8</div></div></div>
          <div class="info-row"><div class="info-row__ico"><svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 014.7 12.5a19.79 19.79 0 01-3.07-8.67A2 2 0 013.59 2h3a2 2 0 012 1.72 12 12 0 00.7 2.81 2 2 0 01-.45 2.11L7.91 9.91a16 16 0 006.1 6.1l.96-.96a2 2 0 012.11-.45 12 12 0 002.81.7A2 2 0 0122 16.92z"/></svg></div><div><div class="info-row__lbl">Điện thoại</div><a href="tel:02412345678" class="info-row__val">(024) 1234 5678</a><div class="info-row__note">Hotline 24/7: <a href="tel:19001234" style="color:var(--o);font-weight:700;text-decoration:none">1900 1234</a></div></div></div>
          <div class="info-row"><div class="info-row__ico"><svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></div><div><div class="info-row__lbl">Email</div><a href="mailto:hanoi@tavaled.vn" class="info-row__val">hanoi@tavaled.vn</a></div></div>
          <div class="info-row"><div class="info-row__ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div><div><div class="info-row__lbl">Giờ làm việc</div><div class="hours-grid"><div class="h-item h-item--active"><div class="h-day">T2–T6</div><div class="h-time">08:00–17:30</div></div><div class="h-item"><div class="h-day">Thứ 7</div><div class="h-time">08:00–12:00</div></div><div class="h-item"><div class="h-day">Chủ nhật</div><div class="h-time">Nghỉ</div></div></div></div></div>
          <div class="info-row"><div class="info-row__ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 010 20M12 2a15.3 15.3 0 000 20"/></svg></div><div><div class="info-row__lbl">Phủ sóng</div><div class="info-row__val">Miền Bắc — 28 tỉnh thành</div><div class="info-row__note">Hà Nội, Hải Phòng, Quảng Ninh và các tỉnh phía Bắc</div></div></div>
        </div>
        <div class="o-cta">
          <a href="tel:02412345678" class="btn-orange"><svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 014.7 12.5a19.79 19.79 0 01-3.07-8.67A2 2 0 013.59 2h3a2 2 0 012 1.72 12 12 0 00.7 2.81 2 2 0 01-.45 2.11L7.91 9.91a16 16 0 006.1 6.1l.96-.96a2 2 0 012.11-.45 12 12 0 002.81.7A2 2 0 0122 16.92z"/></svg>Gọi VP Hà Nội</a>
          <a href="https://maps.google.com?q=48+Hoang+Cau+Ha+Noi" target="_blank" rel="noopener" class="btn-outline"><svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>Chỉ đường</a>
        </div>
      </div>
    </div>

    <!-- TP.HCM -->
    <div class="office-panel" id="panel-hochiminh">
      <div class="o-map">
        <img src="https://images.unsplash.com/photo-1583417319070-4a69db38a482?w=1000&q=85" alt="TP.HCM">
        <div class="o-map__fog"></div>
        <div class="o-pin" aria-hidden="true"><div class="o-pin__ring"><div class="o-pin__dot"><svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg></div></div></div>
        <div class="o-city-label"><div class="o-city-label__name">TP. Hồ Chí Minh</div><div class="o-city-label__sub">Văn phòng miền Nam</div></div>
        <a href="https://maps.google.com?q=128+Nguyen+Dinh+Chieu+Q3+HCM" target="_blank" rel="noopener" class="o-gmap"><svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>Google Maps</a>
      </div>
      <div class="o-info">
        <div class="o-badge">🌆 Văn phòng miền Nam</div>
        <div class="o-name">Văn phòng TP. Hồ Chí Minh</div>
        <div class="o-role">Phụ trách thị trường miền Nam — 19 tỉnh thành</div>
        <div class="info-rows">
          <div class="info-row"><div class="info-row__ico"><svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg></div><div><div class="info-row__lbl">Địa chỉ</div><div class="info-row__val">Số 128 Nguyễn Đình Chiểu, Phường 6<br>Quận 3, TP. Hồ Chí Minh</div><div class="info-row__note">Tầng 4, Tòa nhà Hoàng Anh</div></div></div>
          <div class="info-row"><div class="info-row__ico"><svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 014.7 12.5a19.79 19.79 0 01-3.07-8.67A2 2 0 013.59 2h3a2 2 0 012 1.72 12 12 0 00.7 2.81 2 2 0 01-.45 2.11L7.91 9.91a16 16 0 006.1 6.1l.96-.96a2 2 0 012.11-.45 12 12 0 002.81.7A2 2 0 0122 16.92z"/></svg></div><div><div class="info-row__lbl">Điện thoại</div><a href="tel:02812345678" class="info-row__val">(028) 1234 5678</a><div class="info-row__note">Hotline 24/7: <a href="tel:19001234" style="color:var(--o);font-weight:700;text-decoration:none">1900 1234</a></div></div></div>
          <div class="info-row"><div class="info-row__ico"><svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></div><div><div class="info-row__lbl">Email</div><a href="mailto:hcm@tavaled.vn" class="info-row__val">hcm@tavaled.vn</a></div></div>
          <div class="info-row"><div class="info-row__ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div><div><div class="info-row__lbl">Giờ làm việc</div><div class="hours-grid"><div class="h-item h-item--active"><div class="h-day">T2–T6</div><div class="h-time">08:00–17:30</div></div><div class="h-item"><div class="h-day">Thứ 7</div><div class="h-time">08:00–12:00</div></div><div class="h-item"><div class="h-day">Chủ nhật</div><div class="h-time">Nghỉ</div></div></div></div></div>
          <div class="info-row"><div class="info-row__ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 010 20M12 2a15.3 15.3 0 000 20"/></svg></div><div><div class="info-row__lbl">Phủ sóng</div><div class="info-row__val">Miền Nam — 19 tỉnh thành</div><div class="info-row__note">TP.HCM, Bình Dương, Đồng Nai, Long An và các tỉnh ĐBSCL</div></div></div>
        </div>
        <div class="o-cta">
          <a href="tel:02812345678" class="btn-orange"><svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 014.7 12.5a19.79 19.79 0 01-3.07-8.67A2 2 0 013.59 2h3a2 2 0 012 1.72 12 12 0 00.7 2.81 2 2 0 01-.45 2.11L7.91 9.91a16 16 0 006.1 6.1l.96-.96a2 2 0 012.11-.45 12 12 0 002.81.7A2 2 0 0122 16.92z"/></svg>Gọi VP TP.HCM</a>
          <a href="https://maps.google.com?q=128+Nguyen+Dinh+Chieu+Q3+HCM" target="_blank" rel="noopener" class="btn-outline"><svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>Chỉ đường</a>
        </div>
      </div>
    </div>

    <!-- ĐÀ NẴNG -->
    <div class="office-panel" id="panel-danang">
      <div class="o-map">
        <img src="https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?w=1000&q=85" alt="Đà Nẵng">
        <div class="o-map__fog"></div>
        <div class="o-pin" aria-hidden="true"><div class="o-pin__ring"><div class="o-pin__dot"><svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg></div></div></div>
        <div class="o-city-label"><div class="o-city-label__name">Đà Nẵng</div><div class="o-city-label__sub">Văn phòng miền Trung</div></div>
        <a href="https://maps.google.com?q=36+Tran+Phu+Hai+Chau+Da+Nang" target="_blank" rel="noopener" class="o-gmap"><svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>Google Maps</a>
      </div>
      <div class="o-info">
        <div class="o-badge">🌊 Văn phòng miền Trung</div>
        <div class="o-name">Văn phòng Đà Nẵng</div>
        <div class="o-role">Phụ trách thị trường miền Trung — 16 tỉnh thành</div>
        <div class="info-rows">
          <div class="info-row"><div class="info-row__ico"><svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg></div><div><div class="info-row__lbl">Địa chỉ</div><div class="info-row__val">Số 36 Trần Phú, Phường Thạch Thang<br>Quận Hải Châu, Đà Nẵng</div><div class="info-row__note">Tầng 2, Sông Hàn Tower</div></div></div>
          <div class="info-row"><div class="info-row__ico"><svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 014.7 12.5a19.79 19.79 0 01-3.07-8.67A2 2 0 013.59 2h3a2 2 0 012 1.72 12 12 0 00.7 2.81 2 2 0 01-.45 2.11L7.91 9.91a16 16 0 006.1 6.1l.96-.96a2 2 0 012.11-.45 12 12 0 002.81.7A2 2 0 0122 16.92z"/></svg></div><div><div class="info-row__lbl">Điện thoại</div><a href="tel:02361234567" class="info-row__val">(0236) 1234 567</a><div class="info-row__note">Hotline 24/7: <a href="tel:19001234" style="color:var(--o);font-weight:700;text-decoration:none">1900 1234</a></div></div></div>
          <div class="info-row"><div class="info-row__ico"><svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></div><div><div class="info-row__lbl">Email</div><a href="mailto:danang@tavaled.vn" class="info-row__val">danang@tavaled.vn</a></div></div>
          <div class="info-row"><div class="info-row__ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div><div><div class="info-row__lbl">Giờ làm việc</div><div class="hours-grid"><div class="h-item h-item--active"><div class="h-day">T2–T6</div><div class="h-time">08:00–17:30</div></div><div class="h-item"><div class="h-day">Thứ 7</div><div class="h-time">08:00–12:00</div></div><div class="h-item"><div class="h-day">Chủ nhật</div><div class="h-time">Nghỉ</div></div></div></div></div>
          <div class="info-row"><div class="info-row__ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><line x1="2" y1="12" x2="22" y2="12"/><path d="M12 2a15.3 15.3 0 010 20M12 2a15.3 15.3 0 000 20"/></svg></div><div><div class="info-row__lbl">Phủ sóng</div><div class="info-row__val">Miền Trung — 16 tỉnh thành</div><div class="info-row__note">Đà Nẵng, Huế, Quảng Nam, Quảng Ngãi, Bình Định và các tỉnh BTB</div></div></div>
        </div>
        <div class="o-cta">
          <a href="tel:02361234567" class="btn-orange"><svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 014.7 12.5a19.79 19.79 0 01-3.07-8.67A2 2 0 013.59 2h3a2 2 0 012 1.72 12 12 0 00.7 2.81 2 2 0 01-.45 2.11L7.91 9.91a16 16 0 006.1 6.1l.96-.96a2 2 0 012.11-.45 12 12 0 002.81.7A2 2 0 0122 16.92z"/></svg>Gọi VP Đà Nẵng</a>
          <a href="https://maps.google.com?q=36+Tran+Phu+Hai+Chau+Da+Nang" target="_blank" rel="noopener" class="btn-outline"><svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>Chỉ đường</a>
        </div>
      </div>
    </div>

  </div>
</section>

<!-- ══ CHANNELS ══ -->
<section class="channels" aria-labelledby="ch-heading">
  <div class="channels__inner">
    <div class="channels__head rv">
      <div class="eyebrow">Kênh liên hệ</div>
      <h2 class="sec-h" id="ch-heading">Chọn cách <em>phù hợp</em> với bạn</h2>
    </div>
    <div class="channels__grid">
      <a href="tel:19001234"             class="ch-card rv d1"><div class="ch-ico ico-a">📞</div><div class="ch-type">Hotline 24/7</div><div class="ch-name">Gọi trực tiếp</div><div class="ch-val">1900 1234</div><div class="ch-note">Hỗ trợ 24/7, miễn phí cước. Tư vấn nhanh hoặc sự cố kỹ thuật khẩn cấp.</div></a>
      <a href="mailto:info@tavaled.vn"   class="ch-card rv d2"><div class="ch-ico ico-b">✉️</div><div class="ch-type">Email</div><div class="ch-name">Gửi email tư vấn</div><div class="ch-val">info@tavaled.vn</div><div class="ch-note">Tư vấn dự án, yêu cầu báo giá, hồ sơ kỹ thuật. Phản hồi trong 2 giờ làm việc.</div></a>
      <a href="https://zalo.me/tavalled" target="_blank" rel="noopener" class="ch-card rv d3"><div class="ch-ico ico-c">💬</div><div class="ch-type">Zalo OA</div><div class="ch-name">Chat qua Zalo</div><div class="ch-val">TavaLED Official</div><div class="ch-note">Nhắn tin, gửi ảnh hiện trường, video. Theo dõi tiến độ dự án trực tiếp.</div></a>
      <a href="mailto:support@tavaled.vn" class="ch-card rv d1"><div class="ch-ico ico-d">🛠️</div><div class="ch-type">Hỗ trợ kỹ thuật</div><div class="ch-name">Bảo hành &amp; Sự cố</div><div class="ch-val">support@tavaled.vn</div><div class="ch-note">Dành cho khách hàng hiện hữu. Báo lỗi thiết bị, yêu cầu bảo trì định kỳ.</div></a>
      <a href="mailto:projects@tavaled.vn" class="ch-card rv d2"><div class="ch-ico ico-e">📋</div><div class="ch-type">Dự án &amp; Đấu thầu</div><div class="ch-name">Hợp tác dự án</div><div class="ch-val">projects@tavaled.vn</div><div class="ch-note">Nhà thầu, tư vấn thiết kế, ban quản lý dự án muốn hợp tác hoặc đấu thầu.</div></a>
      <a href="mailto:hr@tavaled.vn"      class="ch-card rv d3"><div class="ch-ico ico-f">👥</div><div class="ch-type">Tuyển dụng</div><div class="ch-name">Gia nhập TavaLED</div><div class="ch-val">hr@tavaled.vn</div><div class="ch-note">Kỹ thuật viên LED, Kỹ sư âm thanh, Kinh doanh dự án. Gửi CV trực tiếp.</div></a>
    </div>
  </div>
</section>

<!-- ══ SOCIAL ══ -->
<section class="social" aria-labelledby="soc-heading">
  <div class="social__inner">
    <div class="social__head rv">
      <div class="eyebrow">Mạng xã hội</div>
      <h2 class="sec-h" id="soc-heading">Theo dõi <em>TavaLED</em></h2>
    </div>
    <div class="social__grid">
      <a href="https://www.facebook.com/tavalls.official" target="_blank" rel="noopener" class="soc-card soc-card--fb rv d1">
        <div class="soc-card__ico"><svg viewBox="0 0 24 24"><path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"/></svg></div>
        <div><div class="soc-card__name">Facebook</div><div class="soc-card__handle">tavalls.official</div></div>
        <svg class="soc-card__arrow" viewBox="0 0 24 24"><line x1="7" y1="17" x2="17" y2="7"/><polyline points="7 7 17 7 17 17"/></svg>
      </a>
      <a href="https://www.youtube.com/@tavalls.official" target="_blank" rel="noopener" class="soc-card soc-card--yt rv d2">
        <div class="soc-card__ico"><svg viewBox="0 0 24 24"><path d="M22.54 6.42a2.78 2.78 0 00-1.95-1.96C18.88 4 12 4 12 4s-6.88 0-8.59.46a2.78 2.78 0 00-1.95 1.96A29 29 0 001 12a29 29 0 00.46 5.58 2.78 2.78 0 001.95 1.95C5.12 20 12 20 12 20s6.88 0 8.59-.47a2.78 2.78 0 001.95-1.95A29 29 0 0023 12a29 29 0 00-.46-5.58z"/><polygon points="9.75 15.02 15.5 12 9.75 8.98 9.75 15.02"/></svg></div>
        <div><div class="soc-card__name">YouTube</div><div class="soc-card__handle">@tavalls.official</div></div>
        <svg class="soc-card__arrow" viewBox="0 0 24 24"><line x1="7" y1="17" x2="17" y2="7"/><polyline points="7 7 17 7 17 17"/></svg>
      </a>
      <a href="https://www.tiktok.com/@tavalls.official" target="_blank" rel="noopener" class="soc-card soc-card--tt rv d3">
        <div class="soc-card__ico"><svg viewBox="0 0 24 24"><path d="M9 12a4 4 0 104 4V4a5 5 0 005 5"/></svg></div>
        <div><div class="soc-card__name">TikTok</div><div class="soc-card__handle">@tavalls.official</div></div>
        <svg class="soc-card__arrow" viewBox="0 0 24 24"><line x1="7" y1="17" x2="17" y2="7"/><polyline points="7 7 17 7 17 17"/></svg>
      </a>
      <a href="https://zalo.me/tavalled" target="_blank" rel="noopener" class="soc-card soc-card--zl rv d4">
        <div class="soc-card__ico"><svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg></div>
        <div><div class="soc-card__name">Zalo</div><div class="soc-card__handle">TavaLED Official OA</div></div>
        <svg class="soc-card__arrow" viewBox="0 0 24 24"><line x1="7" y1="17" x2="17" y2="7"/><polyline points="7 7 17 7 17 17"/></svg>
      </a>
    </div>
  </div>
</section>

<!-- ══ FAQ ══ -->
<section class="faq" aria-labelledby="faq-heading">
  <div class="faq__layout">
    <div class="rv">
      <div class="eyebrow">FAQ</div>
      <h2 class="sec-h" id="faq-heading">Trước khi<br><em>liên hệ</em></h2>
      <img class="faq__img" src="https://images.unsplash.com/photo-1518770660439-4636190af475?w=600&q=80" alt="Đội ngũ TavaLED" loading="lazy">
      <a href="https://www.tavaled.vn" class="faq__link" target="_blank" rel="noopener">Xem thêm tại tavaled.vn →</a>
    </div>
    <div class="faq-list rv d2" id="faqList"></div>
  </div>
</section>

<!-- ══ CTA STRIP ══ -->
<div class="cta-strip">
  <div class="cta-strip__inner">
    <div>
      <div class="cta-strip__label">Sẵn sàng hợp tác?</div>
      <h2 class="cta-strip__h">Gọi ngay — báo giá<br><em>trong 2 giờ</em></h2>
    </div>
    <div class="cta-btns">
      <a href="tel:19001234" class="btn-white">📞 1900 1234</a>
      <a href="mailto:info@tavaled.vn" class="btn-ghost">
        <svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        info@tavaled.vn
      </a>
    </div>
  </div>
</div>

<script>
/* Cursor */
const cd=document.getElementById('cur-dot'),cr=document.getElementById('cur-ring');
let mx=0,my=0,rx=0,ry=0;
window.addEventListener('mousemove',e=>{mx=e.clientX;my=e.clientY;},{passive:true});
(function tick(){
  rx+=(mx-rx)*.13; ry+=(my-ry)*.13;
  cd.style.left=mx+'px'; cd.style.top=my+'px';
  cr.style.left=rx+'px'; cr.style.top=ry+'px';
  requestAnimationFrame(tick);
})();

/* Scroll reveal */
const obs=new IntersectionObserver(entries=>{
  entries.forEach(e=>{if(e.isIntersecting){e.target.classList.add('in');obs.unobserve(e.target);}});
},{threshold:.1,rootMargin:'0px 0px -36px 0px'});
document.querySelectorAll('.rv').forEach(el=>obs.observe(el));

/* City switch */
const TAB_MAP={hanoi:'tab-hn',hochiminh:'tab-hcm',danang:'tab-dn'};
function switchCity(city){
  document.querySelectorAll('.city-tab').forEach(t=>t.classList.remove('active'));
  document.getElementById(TAB_MAP[city]).classList.add('active');

  const cur=document.querySelector('.office-panel.active');
  const nxt=document.getElementById('panel-'+city);
  if(!nxt||cur===nxt)return;

  cur.style.transition='opacity .2s,transform .2s';
  cur.style.opacity='0'; cur.style.transform='translateX(-16px)';
  setTimeout(()=>{
    cur.classList.remove('active'); cur.style.cssText='';
    nxt.classList.add('active');
    nxt.style.opacity='0'; nxt.style.transform='translateX(16px)';
    nxt.offsetHeight;
    nxt.style.transition='opacity .42s cubic-bezier(.16,1,.3,1),transform .42s cubic-bezier(.16,1,.3,1)';
    nxt.style.opacity='1'; nxt.style.transform='translateX(0)';
    setTimeout(()=>{ nxt.style.cssText=''; },440);
  },210);

  document.getElementById('offices').scrollIntoView({behavior:'smooth',block:'start'});
}

/* FAQ */
const FAQS=[
  {q:'Tôi ở tỉnh xa, TavaLED có hỗ trợ không?',    a:'Có. TavaLED phủ sóng 63/63 tỉnh thành. Đội kỹ thuật di chuyển từ văn phòng gần nhất. Tỉnh xa trên 200km có đối tác kỹ thuật địa phương được TavaLED đào tạo và chứng nhận.'},
  {q:'Thời gian phản hồi sau khi liên hệ là bao lâu?', a:'Email và Zalo: phản hồi trong 2 giờ làm việc. Hotline 1900 1234: ngay lập tức, 24/7. Báo giá chi tiết: hoàn thành trong 24–48 giờ tùy quy mô dự án.'},
  {q:'Có thể gặp trực tiếp để tư vấn không?',       a:'Hoàn toàn có thể. Đặt lịch tại văn phòng Hà Nội, TP.HCM hoặc Đà Nẵng, hoặc đội ngũ TavaLED sẽ đến khảo sát tại công trình của bạn — hoàn toàn miễn phí.'},
  {q:'Thiết bị bảo hành bị sự cố liên hệ kênh nào?', a:'Gửi email support@tavaled.vn hoặc gọi 1900 1234 chọn phím 2. Cung cấp mã hợp đồng hoặc số serial thiết bị để được xử lý nhanh nhất.'},
  {q:'TavaLED có nhận hợp tác đại lý không?',        a:'Có. TavaLED đang mở rộng mạng lưới đại lý tại các tỉnh chưa có văn phòng. Email projects@tavaled.vn tiêu đề "Đề xuất hợp tác đại lý" để nhận thông tin chính sách.'},
];
document.getElementById('faqList').innerHTML=FAQS.map((f,i)=>`
  <div class="faq-item" id="fq${i}">
    <div class="faq-q" onclick="toggleFaq(${i})">
      <span>${f.q}</span>
      <div class="faq-ico"><svg viewBox="0 0 24 24"><line x1="12" y1="5" x2="12" y2="19"/><line x1="5" y1="12" x2="19" y2="12"/></svg></div>
    </div>
    <div class="faq-a"><div class="faq-a__in">${f.a}</div></div>
  </div>`).join('');

function toggleFaq(i){
  const it=document.getElementById('fq'+i);
  const was=it.classList.contains('open');
  document.querySelectorAll('.faq-item').forEach(el=>el.classList.remove('open'));
  if(!was)it.classList.add('open');
}
document.getElementById('fq0').classList.add('open');
</script>



<?php get_footer(); ?>