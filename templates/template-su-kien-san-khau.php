<?php
/**
 * Template Name: Trang sự kiện sân khấu
 */

get_header(); ?>

<style>
.page-template-template-su-kien-san-khau-php *, .page-template-template-su-kien-san-khau-php *::before, .page-template-template-su-kien-san-khau-php *::after{box-sizing:border-box;margin:0;padding:0}

:root{
  --navy:#1c2857;--navy2:#162248;--navy3:#0f1835;
  --o:#f05a25;--odk:#c8451a;--olt:#fff3ee;
  --w:#fff;--ink:#111827;--mid:#374151;--muted:#6b7280;
  --light:#f9fafb;--bdr:#e5e7eb;
  --ff:'Mona Sans','Mona-Sans',sans-serif;
}
html{scroll-behavior:smooth}
body{font-family:var(--ff);background:var(--ink);color:var(--w);-webkit-font-smoothing:antialiased;overflow-x:hidden;cursor:none}
#cd,#cr{position:fixed;border-radius:50%;pointer-events:none;z-index:9999;transform:translate(-50%,-50%)}
#cd{width:7px;height:7px;background:var(--o)}
#cr{width:36px;height:36px;border:1.5px solid rgba(240,90,37,.4);transition:width .3s,height .3s,border-color .3s}
body:has(a:hover) #cr,body:has(button:hover) #cr{width:50px;height:50px;border-color:var(--o)}

/* ══ HERO — CINEMATIC ══ */
.hero{height:100vh;min-height:700px;position:relative;overflow:hidden;display:flex;align-items:flex-end;background:var(--navy3)}
.hero__bg{position:absolute;inset:0}
.hero__bg img{width:100%;height:100%;object-fit:cover;}
.hero__fog{position:absolute;inset:0;z-index:1;background:linear-gradient(180deg,rgba(15,24,53,.5) 0%,transparent 25%,rgba(15,24,53,.3) 55%,rgba(15,24,53,.97) 100%)}
.hero__grid{position:absolute;inset:0;z-index:1;background-image:linear-gradient(rgba(255,255,255,.02) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.02) 1px,transparent 1px);background-size:52px 52px;pointer-events:none}
.hero__bar{position:absolute;bottom:0;left:0;right:0;height:4px;z-index:3;background:linear-gradient(90deg,var(--o),var(--odk) 40%,rgba(240,90,37,.2))}

.hero__body{position:relative;z-index:2;padding:0 56px 88px;max-width:1320px;margin:0 auto;width:100%}
.hero__tag{display:inline-flex;align-items:center;gap:9px;font-size:9.5px;font-weight:700;letter-spacing:.24em;text-transform:uppercase;color:var(--o);padding:4px 12px;background:rgba(240,90,37,.1);border:1px solid rgba(240,90,37,.28);border-radius:4px;margin-bottom:20px;opacity:0;animation:su .5s .1s ease forwards}
.hero__h1{font-family:var(--ff);font-weight:800;font-size:clamp(3.5rem,7vw,7.5rem);letter-spacing:-.07em;color:#fff;line-height:.88;margin-bottom:24px;opacity:0;animation:su .9s .25s cubic-bezier(.16,1,.3,1) forwards}
.hero__h1 em{font-style:italic;font-weight:300;color:var(--o);display:block;font-size:.7em}
.hero__sub{font-size:15px;font-weight:300;color:rgba(255,255,255,.5);line-height:1.85;max-width:480px;margin-bottom:36px;opacity:0;animation:su .65s .45s ease forwards}
.hero__acts{display:flex;gap:12px;flex-wrap:wrap;opacity:0;animation:su .6s .62s ease forwards}
.btn-p{display:inline-flex;align-items:center;gap:8px;padding:14px 28px;background:var(--o);color:#fff;font-family:var(--ff);font-size:12.5px;font-weight:700;letter-spacing:.05em;text-transform:uppercase;border-radius:8px;text-decoration:none;box-shadow:0 4px 28px rgba(240,90,37,.4);transition:background .18s,transform .15s}
.btn-p:hover{background:var(--odk);transform:translateY(-2px)}
.btn-p svg{width:13px;height:13px;stroke:currentColor;fill:none;stroke-width:2}
.btn-g{display:inline-flex;align-items:center;gap:8px;padding:13px 22px;background:transparent;border:1.5px solid rgba(255,255,255,.25);color:rgba(255,255,255,.8);font-family:var(--ff);font-size:12.5px;font-weight:600;text-transform:uppercase;letter-spacing:.04em;border-radius:8px;text-decoration:none;transition:border-color .2s,color .2s,background .2s}
.btn-g:hover{border-color:rgba(255,255,255,.55);color:#fff;background:rgba(255,255,255,.06)}

/* Hero right stats */
.hero__floats{position:absolute;right:56px;bottom:88px;z-index:3;display:flex;flex-direction:column;gap:10px;opacity:0;animation:su .7s .8s ease forwards}
.hfloat{background:rgba(255,255,255,.07);backdrop-filter:blur(12px);border:1px solid rgba(255,255,255,.12);border-radius:10px;padding:14px 18px;min-width:140px}
.hfloat__val{font-family:var(--ff);font-size:1.9rem;font-weight:800;letter-spacing:-.06em;color:#fff;line-height:1}
.hfloat__val span{color:var(--o)}
.hfloat__l{font-size:10px;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:rgba(255,255,255,.4);margin-top:4px}

/* ══ SCROLL TICKER ══ */
.ticker{background:var(--o);padding:12px 0;overflow:hidden}
.ticker__track{display:flex;gap:0;animation:tick 20s linear infinite;white-space:nowrap;width:max-content}
.ticker__track:hover{animation-play-state:paused}
@keyframes tick{to{transform:translateX(-50%)}}
.ticker__item{display:inline-flex;align-items:center;gap:16px;padding:0 32px;font-size:11.5px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:rgba(255,255,255,.9)}
.ticker__dot{width:4px;height:4px;border-radius:50%;background:rgba(255,255,255,.5);flex-shrink:0}

/* ══ SHARED ══ */
.section{padding:88px 0}
.inner{max-width:1320px;margin:0 auto;padding:0 56px}
.ey{display:inline-flex;align-items:center;gap:8px;font-size:9.5px;font-weight:700;letter-spacing:.22em;text-transform:uppercase;color:var(--o);margin-bottom:12px}
.ey::before{content:'';display:block;width:22px;height:2px;background:var(--o);border-radius:2px}
.sh{font-family:var(--ff);font-weight:800;font-size:clamp(1.9rem,3.5vw,3rem);letter-spacing:-.05em;color:#fff;line-height:1.04;margin-bottom:12px}
.sh em{font-style:italic;font-weight:300;color:var(--o)}
.sh--dark{color:var(--navy)}
.sd{font-size:14.5px;color:rgba(255,255,255,.45);line-height:1.8;max-width:500px}
.sd--dark{color:var(--muted)}
.sec-head{display:flex;align-items:flex-end;justify-content:space-between;gap:32px;margin-bottom:52px;flex-wrap:wrap}

/* ══ ACT 2 — EVENT TYPES IMAGE MOSAIC ══ */
.event-mosaic{display:grid;grid-template-columns:repeat(8,1fr);grid-auto-rows:220px;gap:3px}
.em{position:relative;overflow:hidden;cursor:default}
.em img{width:100%;height:100%;object-fit:cover;transition:filter .5s,transform .7s cubic-bezier(.16,1,.3,1)}
.em:hover img{transform:scale(1.06)}
.em__over{position:absolute;inset:0;background:linear-gradient(180deg,transparent 30%,rgba(15,24,53,.92) 100%)}
.em__body{position:absolute;bottom:0;left:0;right:0;padding:22px 18px 16px}
.em__tag{font-size:9px;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:var(--o);margin-bottom:5px}
.em__title{font-family:var(--ff);font-weight:800;font-size:1.05rem;color:#fff;line-height:1.2;letter-spacing:-.03em}
.em__num{position:absolute;top:14px;right:14px;font-family:var(--ff);font-size:3rem;font-weight:800;color:rgba(255,255,255,.05);letter-spacing:-.1em;line-height:1}
.c2{grid-column:span 2}.c3{grid-column:span 3}.c4{grid-column:span 4}.c5{grid-column:span 5}.r2{grid-row:span 2}

/* ══ ACT 3 — STORY QUOTE ══ */
.story{background:var(--navy2);padding:100px 0;position:relative;overflow:hidden}
.story::before{content:'';position:absolute;inset:0;background-image:linear-gradient(rgba(255,255,255,.022) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.022) 1px,transparent 1px);background-size:52px 52px}
.story__inner{max-width:1320px;margin:0 auto;padding:0 56px;display:flex;justify-content:center;position:relative;z-index:1}
.story__nums{display:flex;flex-direction:column;gap:14px;max-width:800px;width:100%}
.story__num{display:flex;align-items:center;gap:20px;padding:20px 22px;background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.09);border-radius:10px;transition:background .2s,border-color .2s}
.story__num:hover{background:rgba(240,90,37,.1);border-color:rgba(240,90,37,.25)}
.story__num-ico{width:46px;height:46px;border-radius:11px;background:rgba(240,90,37,.14);border:1px solid rgba(240,90,37,.24);display:flex;align-items:center;justify-content:center;font-size:20px;flex-shrink:0}
.story__num-val{font-family:var(--ff);font-size:1.9rem;font-weight:800;color:#fff;letter-spacing:-.05em;line-height:1}
.story__num-val span{color:var(--o)}
.story__num-label{font-size:12px;color:rgba(255,255,255,.4);margin-top:3px;line-height:1.5}

/* ══ ACT 4 — 3 PILLARS (LED / AUDIO / LIGHT) ══ */
.pillars{display:grid;grid-template-columns:repeat(3,1fr);gap:4px}
.pillar{position:relative;overflow:hidden;min-height:480px;cursor:default}
.pillar img{width:100%;height:100%;object-fit:cover;transition:filter .5s,transform .7s cubic-bezier(.16,1,.3,1)}
.pillar:hover img{transform:scale(1.05)}
.pillar__over{position:absolute;inset:0;background:linear-gradient(180deg,transparent 20%,rgba(15,24,53,.96) 100%)}
.pillar__left-line{position:absolute;left:0;top:0;bottom:0;width:3px;background:linear-gradient(180deg,transparent,var(--o) 30%,var(--odk) 70%,transparent);opacity:0;transition:opacity .3s}
.pillar:hover .pillar__left-line{opacity:1}
.pillar__body{position:absolute;bottom:0;left:0;right:0;padding:32px 28px 26px}
.pillar__num{font-family:var(--ff);font-size:5rem;font-weight:800;letter-spacing:-.1em;color:rgba(240,90,37,.15);line-height:1;margin-bottom:4px}
.pillar__ico{font-size:28px;margin-bottom:12px}
.pillar__title{font-family:var(--ff);font-weight:800;font-size:1.4rem;letter-spacing:-.04em;color:#fff;margin-bottom:10px}
.pillar__desc{font-size:13.5px;color:rgba(255,255,255,.5);line-height:1.7;margin-bottom:16px}
.pillar__tags{display:flex;flex-wrap:wrap;gap:6px}
.ptag{font-size:9.5px;font-weight:600;padding:3px 9px;border-radius:3px;background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1);color:rgba(255,255,255,.65)}

/* ══ ACT 5 — PROCESS ══ */
.process-timeline{display:grid;grid-template-columns:repeat(5,1fr);gap:0;position:relative;margin-top:52px}
.process-timeline::before{content:'';position:absolute;top:32px;left:10%;right:10%;height:2px;background:linear-gradient(90deg,var(--o),rgba(240,90,37,.15))}
.pt-step{text-align:center;padding:0 16px;position:relative;z-index:1}
.pt-step__dot{width:64px;height:64px;border-radius:50%;background:var(--navy2);border:2px solid rgba(255,255,255,.1);display:flex;align-items:center;justify-content:center;margin:0 auto 18px;font-size:18px;transition:border-color .25s,background .25s}
.pt-step:hover .pt-step__dot{border-color:var(--o);background:rgba(240,90,37,.12)}
.pt-step__title{font-size:13px;font-weight:700;color:#fff;margin-bottom:5px}
.pt-step__desc{font-size:11.5px;color:rgba(255,255,255,.4);line-height:1.6}
.pt-step__time{display:inline-block;font-size:9.5px;font-weight:700;letter-spacing:.08em;color:var(--o);background:rgba(240,90,37,.12);padding:2px 8px;border-radius:3px;margin-top:7px}

/* ══ ACT 6 — PHOTO GALLERY ══ */
.gallery-strip{overflow:hidden;background:var(--navy3)}
.gallery-track{display:flex;gap:3px;animation:galleryScroll 35s linear infinite;width:max-content}
.gallery-strip:hover .gallery-track{animation-play-state:paused}
@keyframes galleryScroll{to{transform:translateX(-50%)}}
.gallery-item{flex-shrink:0;width:320px;height:200px;overflow:hidden;position:relative}
.gallery-item img{width:100%;height:100%;object-fit:cover;transition:filter .4s}
.gallery-item:hover img{}
.gallery-item__label{position:absolute;bottom:0;left:0;right:0;padding:20px 14px 10px;background:linear-gradient(transparent,rgba(15,24,53,.7));font-size:11px;font-weight:600;color:rgba(255,255,255,.7)}

/* ══ CASES ══ */
.cases-dark{display:grid;grid-template-columns:1.5fr 1fr 1fr;gap:4px;border-radius:12px;overflow:hidden}
.cased{position:relative;overflow:hidden;min-height:400px;background:var(--navy3);text-decoration:none;display:block}
.cased img{width:100%;height:100%;object-fit:cover;transition:filter .5s,transform .7s cubic-bezier(.16,1,.3,1)}
.cased:hover img{transform:scale(1.05)}
.cased__over{position:absolute;inset:0;background:linear-gradient(180deg,rgba(28,40,87,.15) 0%,rgba(15,24,53,.94) 100%)}
.cased__body{position:absolute;bottom:0;left:0;right:0;padding:26px 22px 20px}
.cased__tag{font-size:9px;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:var(--o);margin-bottom:7px;display:flex;align-items:center;gap:6px}
.cased__tag::before{content:'';display:block;width:14px;height:1.5px;background:var(--o)}
.cased__name{font-family:var(--ff);font-weight:800;color:#fff;line-height:1.2;letter-spacing:-.03em;margin-bottom:8px}
.cased--main .cased__name{font-size:1.4rem}
.cased:not(.cased--main) .cased__name{font-size:1.05rem}
.cased__specs{display:flex;flex-wrap:wrap;gap:6px}
.spec{font-size:9.5px;font-weight:600;padding:3px 8px;border-radius:3px;background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.12);color:rgba(255,255,255,.65)}

/* ══ CTA ══ */
.cta{position:relative;overflow:hidden;min-height:480px;display:flex;align-items:center}
.cta__bg{position:absolute;inset:0}
.cta__bg img{width:100%;height:100%;object-fit:cover;}
.cta__fog{position:absolute;inset:0;background:radial-gradient(ellipse 80% 80% at 50% 50%,rgba(240,90,37,.2) 0%,rgba(15,24,53,.85) 70%)}
.cta__bar{position:absolute;left:0;top:0;bottom:0;width:4px;background:linear-gradient(180deg,transparent,var(--o) 30%,var(--odk) 70%,transparent)}
.cta__inner{position:relative;z-index:2;max-width:1320px;margin:0 auto;padding:72px 56px;text-align:center}
.cta__h{font-family:var(--ff);font-weight:800;font-size:clamp(2.2rem,5vw,4.5rem);letter-spacing:-.07em;color:#fff;line-height:.95;margin-bottom:20px}
.cta__h em{font-style:italic;font-weight:300;color:var(--o)}
.cta__sub{font-size:15px;color:rgba(255,255,255,.5);line-height:1.8;max-width:500px;margin:0 auto 36px}
.cta-btns{display:flex;gap:14px;justify-content:center;flex-wrap:wrap}
.btn-cta-w{display:inline-flex;align-items:center;gap:8px;padding:14px 32px;background:#fff;color:var(--navy);font-family:var(--ff);font-size:13px;font-weight:700;letter-spacing:.04em;text-transform:uppercase;border-radius:8px;text-decoration:none;box-shadow:0 4px 24px rgba(0,0,0,.2);transition:transform .15s,box-shadow .2s}
.btn-cta-w:hover{transform:translateY(-2px);box-shadow:0 8px 32px rgba(0,0,0,.28)}
.btn-cta-g{display:inline-flex;align-items:center;gap:8px;padding:13px 24px;background:transparent;border:1.5px solid rgba(255,255,255,.3);color:rgba(255,255,255,.8);font-family:var(--ff);font-size:13px;font-weight:600;text-transform:uppercase;letter-spacing:.04em;border-radius:8px;text-decoration:none;transition:border-color .2s,color .2s}
.btn-cta-g:hover{border-color:rgba(255,255,255,.6);color:#fff}
.btn-cta-g svg{width:13px;height:13px;stroke:currentColor;fill:none;stroke-width:2}

@keyframes su{from{opacity:0;transform:translateY(18px)}to{opacity:1;transform:translateY(0)}}
.rv{opacity:0;transform:translateY(22px);transition:opacity .7s cubic-bezier(.16,1,.3,1),transform .7s cubic-bezier(.16,1,.3,1)}
.rv.in{opacity:1;transform:translateY(0)}
.d1{transition-delay:.08s}.d2{transition-delay:.16s}.d3{transition-delay:.24s}

@media(max-width:1100px){.event-mosaic{grid-template-columns:repeat(4,1fr)}.em.c5{grid-column:span 4}.em.c4{grid-column:span 4}.em.c3{grid-column:span 2}.em.c2{grid-column:span 2}.pillars{grid-template-columns:1fr 1fr}.story__inner{grid-template-columns:1fr;gap:40px}.process-timeline{grid-template-columns:repeat(3,1fr)}.process-timeline::before{display:none}.cases-dark{grid-template-columns:1fr 1fr}.cased--main{grid-column:span 2}}
@media(max-width:768px){.hero__body,.inner,.story__inner,.cta__inner{padding-left:20px;padding-right:20px}.hero__floats{display:none}.event-mosaic{grid-template-columns:1fr 1fr}.em{grid-column:span 1!important;grid-row:span 1!important}.pillars{grid-template-columns:1fr}.process-timeline{grid-template-columns:1fr 1fr}.cases-dark{grid-template-columns:1fr}.cased--main{grid-column:span 1}.sec-head{flex-direction:column;gap:16px;margin-bottom:32px}}
</style>
<div id="cd"></div><div id="cr"></div>

<!-- ══ HERO ══ -->
<section class="hero">
 <div class="hero__bg" aria-hidden="true"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0053_TavaLED_Hinh_Anh.jpg" alt="Sự kiện sân khấu TavaLED" loading="eager"></div>
  <div class="hero__fog" aria-hidden="true"></div>
  <div class="hero__grid" aria-hidden="true"></div>
  <div class="hero__bar" aria-hidden="true"></div>
  <div class="hero__body">
    <div>
      <div class="hero__tag">🎭 Sự kiện & Sân khấu</div>
      <h1 class="hero__h1">Khoảnh khắc<br><em>không thể quên</em></h1>
      <p class="hero__sub">Mỗi sự kiện chỉ xảy ra một lần. TavaLED đảm bảo ánh sáng đúng chỗ, âm thanh đúng lúc, màn hình đúng khoảnh khắc — không có chỗ cho sai lầm.</p>
      <div class="hero__acts">
        <a href="#cta" class="btn-p"><svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 014.7 12.5a19.79 19.79 0 01-3.07-8.67A2 2 0 013.59 2h3a2 2 0 012 1.72 12 12 0 00.7 2.81 2 2 0 01-.45 2.11L7.91 9.91a16 16 0 006.1 6.1l.96-.96a2 2 0 012.11-.45 12 12 0 002.81.7A2 2 0 0122 16.92z"/></svg>Tư vấn sự kiện</a>
        <a href="#pillars" class="btn-g">Khám phá giải pháp →</a>
      </div>
    </div>
  </div>
  <div class="hero__floats">
    <div class="hfloat"><div class="hfloat__val"><span class="cnt" data-to="200">0</span><span>+</span></div><div class="hfloat__l">Sự kiện / năm</div></div>
    <div class="hfloat"><div class="hfloat__val"><span class="cnt" data-to="50000">0</span></div><div class="hfloat__l">Khán giả lớn nhất</div></div>
    <div class="hfloat"><div class="hfloat__val">24/7</div><div class="hfloat__l">Hỗ trợ kỹ thuật</div></div>
  </div>
</section>

<!-- ══ TICKER ══ -->
<div class="ticker" aria-hidden="true">
  <div class="ticker__track" id="tickerTrack">
    <span class="ticker__item">Concert & Live Show<span class="ticker__dot"></span></span>
    <span class="ticker__item">Hội nghị Doanh nghiệp<span class="ticker__dot"></span></span>
    <span class="ticker__item">Lễ Khai trương<span class="ticker__dot"></span></span>
    <span class="ticker__item">Festival Âm nhạc<span class="ticker__dot"></span></span>
    <span class="ticker__item">Đám cưới & Tiệc<span class="ticker__dot"></span></span>
    <span class="ticker__item">Gala Dinner<span class="ticker__dot"></span></span>
    <span class="ticker__item">Lễ hội Văn hóa<span class="ticker__dot"></span></span>
    <span class="ticker__item">Team Building<span class="ticker__dot"></span></span>
    <span class="ticker__item">Concert & Live Show<span class="ticker__dot"></span></span>
    <span class="ticker__item">Hội nghị Doanh nghiệp<span class="ticker__dot"></span></span>
    <span class="ticker__item">Lễ Khai trương<span class="ticker__dot"></span></span>
    <span class="ticker__item">Festival Âm nhạc<span class="ticker__dot"></span></span>
    <span class="ticker__item">Đám cưới & Tiệc<span class="ticker__dot"></span></span>
    <span class="ticker__item">Gala Dinner<span class="ticker__dot"></span></span>
    <span class="ticker__item">Lễ hội Văn hóa<span class="ticker__dot"></span></span>
    <span class="ticker__item">Team Building<span class="ticker__dot"></span></span>
  </div>
</div>

<!-- ══ ACT 2 — EVENT TYPES ══ -->
<section class="section" style="background:var(--navy3);padding:72px 0 0">
  <div class="inner rv">
    <div class="sec-head"><div><div class="ey">Loại hình sự kiện</div><h2 class="sh">TavaLED phục vụ <em>mọi quy mô</em></h2></div><p class="sd">Từ tiệc cưới 200 khách đến concert 50.000 người — một quy trình, một tiêu chuẩn.</p></div>
  </div>
  <div class="event-mosaic rv d1">
 <div class="em c3 r2"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0054_TavaLED_Hinh_Anh.jpg" alt="Concert" loading="lazy"><div class="em__over"></div><div class="em__num">01</div><div class="em__body"><div class="em__tag">Concert & Live Show</div><div class="em__title">Sân khấu âm nhạc — từ 500 đến 50.000 người</div></div></div>
 <div class="em c2"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0055_TavaLED_Hinh_Anh.jpg" alt="Hội nghị" loading="lazy"><div class="em__over"></div><div class="em__num">02</div><div class="em__body"><div class="em__tag">Hội nghị</div><div class="em__title">Corporate Conference & Summit</div></div></div>
 <div class="em c3"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0056_TavaLED_Hinh_Anh.jpg" alt="Festival" loading="lazy"><div class="em__over"></div><div class="em__num">03</div><div class="em__body"><div class="em__tag">Festival</div><div class="em__title">Lễ hội & Sự kiện ngoài trời</div></div></div>
 <div class="em c2"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0057_TavaLED_Hinh_Anh.jpg" alt="Khai trương" loading="lazy"><div class="em__over"></div><div class="em__num">04</div><div class="em__body"><div class="em__tag">Khai trương</div><div class="em__title">Grand Opening & Gala</div></div></div>
 <div class="em c3"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0058_TavaLED_Hinh_Anh.jpg" alt="Tiệc cưới" loading="lazy"><div class="em__over"></div><div class="em__num">05</div><div class="em__body"><div class="em__tag">Tiệc cưới</div><div class="em__title">Wedding & Private Events</div></div></div>
 <div class="em c5"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0059_TavaLED_Hinh_Anh.jpg" alt="Sân vận động" loading="lazy"><div class="em__over"></div><div class="em__num">06</div><div class="em__body"><div class="em__tag">Sports & Stadium</div><div class="em__title">Sân vận động & Thể thao — LED scoreboard, LED ribbon board, PA system</div></div></div>
  </div>
</section>
<!-- ══ ACT 3 — STATS ══ -->
<section class="story">
  <div class="story__inner">
    <div class="story__nums rv d2">
      <div class="story__num"><div class="story__num-ico">🎵</div><div><div class="story__num-val"><span class="cnt" data-to="200">0</span><span>+</span></div><div class="story__num-label">Sự kiện mỗi năm trên toàn quốc</div></div></div>
      <div class="story__num"><div class="story__num-ico">💡</div><div><div class="story__num-val"><span class="cnt" data-to="50000">0</span></div><div class="story__num-label">Người — sự kiện lớn nhất đã phục vụ</div></div></div>
      <div class="story__num"><div class="story__num-ico">⚡</div><div><div class="story__num-val">0<span> sự cố</span></div><div class="story__num-label">Kỹ thuật trong 3 năm vận hành sự kiện live</div></div></div>
    </div>
  </div>
</section>

<!-- ══ ACT 4 — 3 PILLARS ══ -->
<section id="pillars" style="background:var(--navy3);padding:88px 0 0">
  <div class="inner rv">
    <div class="sec-head"><div><div class="ey">Ba trụ cột kỹ thuật</div><h2 class="sh">Một sự kiện —<br><em>ba hệ thống hoàn hảo</em></h2></div></div>
  </div>
  <div class="pillars rv d1">
    <div class="pillar">
 <img src="https://tavaled.vn/wp-content/uploads/2026/03/0060_TavaLED_Hinh_Anh.jpg" alt="LED sân khấu" loading="lazy">
      <div class="pillar__over"></div>
      <div class="pillar__left-line"></div>
      <div class="pillar__body">
        <div class="pillar__num">01</div>
        <div class="pillar__ico">📺</div>
        <div class="pillar__title">Màn hình LED Sân khấu</div>
        <div class="pillar__desc">LED Rental P3–P5 dễ lắp ráp nhanh. Main screen, IMAG screen, LED backdrop. Độ sáng 5.000 nit hoạt động tốt dưới nắng.</div>
        <div class="pillar__tags"><span class="ptag">Novastar Controller</span><span class="ptag">P3 Rental</span><span class="ptag">IMAG Setup</span><span class="ptag">4K Output</span></div>
      </div>
    </div>
    <div class="pillar">
 <img src="https://tavaled.vn/wp-content/uploads/2026/03/0061_TavaLED_Hinh_Anh.jpg" alt="Âm thanh sự kiện" loading="lazy">
      <div class="pillar__over"></div>
      <div class="pillar__left-line"></div>
      <div class="pillar__body">
        <div class="pillar__num">02</div>
        <div class="pillar__ico">🔊</div>
        <div class="pillar__title">Hệ thống Âm thanh</div>
        <div class="pillar__desc">JBL VTX Line Array cho concert lớn. Yamaha CL Series cho hội nghị. Sub 18" đủ công suất. Coverage đều 360° không điểm chết.</div>
        <div class="pillar__tags"><span class="ptag">JBL VTX</span><span class="ptag">Line Array</span><span class="ptag">Yamaha CL5</span><span class="ptag">80kW System</span></div>
      </div>
    </div>
    <div class="pillar">
 <img src="https://tavaled.vn/wp-content/uploads/2026/03/0062_TavaLED_Hinh_Anh.jpg" alt="Ánh sáng sự kiện" loading="lazy">
      <div class="pillar__over"></div>
      <div class="pillar__left-line"></div>
      <div class="pillar__body">
        <div class="pillar__num">03</div>
        <div class="pillar__ico">💡</div>
        <div class="pillar__title">Hệ thống Ánh sáng</div>
        <div class="pillar__desc">Robe BMFL WashBeam, Martin MAC Quantum, GLP X4 Bar. Lập trình show phức tạp trên GrandMA2/3. Laser + Fog + Haze effect.</div>
        <div class="pillar__tags"><span class="ptag">Robe BMFL</span><span class="ptag">GrandMA3</span><span class="ptag">Laser Effect</span><span class="ptag">WYSIWYG</span></div>
      </div>
    </div>
  </div>
</section>

<!-- ══ ACT 5 — PROCESS ══ -->
<section class="section" style="background:var(--navy2)">
  <div class="inner">
    <div class="sec-head rv"><div><div class="ey">Quy trình sự kiện</div><h2 class="sh">Từ brief đến <em>show time</em></h2></div><p class="sd">Đội kỹ thuật TavaLED bắt đầu chuẩn bị trước sự kiện ít nhất 48 giờ. Không có "cắm cúm" trước giờ G.</p></div>
    <div class="process-timeline rv d1">
      <div class="pt-step"><div class="pt-step__dot">📋</div><div class="pt-step__title">Technical Rider</div><div class="pt-step__desc">Nhận brief, thiết kế kỹ thuật, dự toán chi tiết</div><div class="pt-step__time">T-14 ngày</div></div>
      <div class="pt-step"><div class="pt-step__dot">🏗️</div><div class="pt-step__title">Load In</div><div class="pt-step__desc">Vận chuyển, lắp dựng sân khấu và hệ thống</div><div class="pt-step__time">T-2 ngày</div></div>
      <div class="pt-step"><div class="pt-step__dot">🎛️</div><div class="pt-step__title">Sound Check</div><div class="pt-step__desc">Cân chỉnh âm thanh, ánh sáng, kiểm tra LED</div><div class="pt-step__time">T-1 ngày</div></div>
      <div class="pt-step"><div class="pt-step__dot">🎉</div><div class="pt-step__title">Show Time</div><div class="pt-step__desc">Vận hành live, kỹ thuật viên trực 100%</div><div class="pt-step__time">Ngày H</div></div>
      <div class="pt-step"><div class="pt-step__dot">📦</div><div class="pt-step__title">Load Out</div><div class="pt-step__desc">Tháo dỡ, trả mặt bằng, biên bản hoàn thành</div><div class="pt-step__time">Sau sự kiện</div></div>
    </div>
  </div>
</section>

<!-- ══ GALLERY STRIP ══ -->
<div class="gallery-strip" aria-hidden="true">
  <div class="gallery-track">
 <div class="gallery-item"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0063_TavaLED_Hinh_Anh.jpg" alt=""><div class="gallery-item__label">Concert · Hà Nội</div></div>
 <div class="gallery-item"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0064_TavaLED_Hinh_Anh.jpg" alt=""><div class="gallery-item__label">Festival Ánh sáng · Đà Nẵng</div></div>
 <div class="gallery-item"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0001_TavaLED_Hinh_Anh.jpg" alt=""><div class="gallery-item__label">Hội nghị Quốc tế · HCM</div></div>
 <div class="gallery-item"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0002_TavaLED_Hinh_Anh.jpg" alt=""><div class="gallery-item__label">Gala Dinner · Hà Nội</div></div>
 <div class="gallery-item"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0003_TavaLED_Hinh_Anh.jpg" alt=""><div class="gallery-item__label">Sân khấu Ngoài trời · Cần Thơ</div></div>
 <div class="gallery-item"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0004_TavaLED_Hinh_Anh.jpg" alt=""><div class="gallery-item__label">Khai trương · Hải Phòng</div></div>
    <!-- duplicate -->
 <div class="gallery-item"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0005_TavaLED_Hinh_Anh.jpg" alt=""><div class="gallery-item__label">Concert · Hà Nội</div></div>
 <div class="gallery-item"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0006_TavaLED_Hinh_Anh.jpg" alt=""><div class="gallery-item__label">Festival Ánh sáng · Đà Nẵng</div></div>
 <div class="gallery-item"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0007_TavaLED_Hinh_Anh.jpg" alt=""><div class="gallery-item__label">Hội nghị Quốc tế · HCM</div></div>
 <div class="gallery-item"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0008_TavaLED_Hinh_Anh.jpg" alt=""><div class="gallery-item__label">Gala Dinner · Hà Nội</div></div>
 <div class="gallery-item"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0009_TavaLED_Hinh_Anh.jpg" alt=""><div class="gallery-item__label">Sân khấu Ngoài trời · Cần Thơ</div></div>
 <div class="gallery-item"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0010_TavaLED_Hinh_Anh.jpg" alt=""><div class="gallery-item__label">Khai trương · Hải Phòng</div></div>
  </div>
</div>

<!-- ══ CASES ══ -->
<section class="section" style="background:var(--navy3)">
  <div class="inner">
    <div class="sec-head rv"><div><div class="ey">Sự kiện tiêu biểu</div><h2 class="sh">Những <em>khoảnh khắc</em> đáng nhớ</h2></div><a href="/du-an" style="font-size:12.5px;font-weight:600;color:rgba(255,255,255,.5);text-decoration:none;border-bottom:1px solid rgba(255,255,255,.2);padding-bottom:2px">Xem tất cả →</a></div>
    <div class="cases-dark rv d1">
 <a href="#" class="cased cased--main"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0011_TavaLED_Hinh_Anh.jpg" alt="" loading="lazy"><div class="cased__over"></div><div class="cased__body"><div class="cased__tag">Hà Nội · Tháng 10/2024</div><div class="cased__name">Concert 20.000 khán giả tại Mỹ Đình — LED P4 Rental 300m² + JBL VTX A12 + Robe BMFL</div><div class="cased__specs"><span class="spec">300m² LED</span><span class="spec">80kW Audio</span><span class="spec">120 Moving Head</span><span class="spec">3 ngày setup</span></div></div></a>
 <a href="#" class="cased"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0012_TavaLED_Hinh_Anh.jpg" alt="" loading="lazy"><div class="cased__over"></div><div class="cased__body"><div class="cased__tag">Đà Nẵng · 2024</div><div class="cased__name">Festival Ánh sáng Quốc tế Đà Nẵng</div><div class="cased__specs"><span class="spec">LED P5 Outdoor</span><span class="spec">Stage Lighting</span></div></div></a>
 <a href="#" class="cased"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0013_TavaLED_Hinh_Anh.jpg" alt="" loading="lazy"><div class="cased__over"></div><div class="cased__body"><div class="cased__tag">TP.HCM · 2024</div><div class="cased__name">Hội nghị APAC Summit — 3.000 đại biểu</div><div class="cased__specs"><span class="spec">LED P2.5</span><span class="spec">Yamaha CL5</span></div></div></a>
    </div>
  </div>
</section>

<!-- ══ CTA ══ -->
<div class="cta" id="cta">
 <div class="cta__bg"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0014_TavaLED_Hinh_Anh.jpg" alt="" loading="lazy"></div>
  <div class="cta__fog"></div>
  <div class="cta__bar"></div>
  <div class="cta__inner">
    <h2 class="cta__h">Sự kiện của bạn<br><em>xứng đáng được nhớ mãi</em></h2>
    <p class="cta__sub">Tư vấn kỹ thuật miễn phí, báo giá trong 24 giờ. Đội TavaLED đã phục vụ 200+ sự kiện lớn nhỏ mỗi năm.</p>
    <div class="cta-btns">
      <a href="tel:0936 543 389" class="btn-cta-w">📞 0936 543 389</a>
      <a href="mailto:tuyen.tavaco@gmail.com?subject=Tư vấn sự kiện sân khấu" class="btn-cta-g"><svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>Gửi yêu cầu tư vấn</a>
    </div>
  </div>
</div>

<script>
const cd=document.getElementById('cd'),cr=document.getElementById('cr');let mx=0,my=0,rx=0,ry=0;
window.addEventListener('mousemove',e=>{mx=e.clientX;my=e.clientY},{passive:true});
(function t(){rx+=(mx-rx)*.13;ry+=(my-ry)*.13;cd.style.cssText=`left:${mx}px;top:${my}px`;cr.style.cssText=`left:${rx}px;top:${ry}px`;requestAnimationFrame(t)})();
const obs=new IntersectionObserver(e=>{e.forEach(x=>{if(x.isIntersecting){x.target.classList.add('in');obs.unobserve(x.target)}})},{threshold:.08,rootMargin:'0px 0px -30px 0px'});
document.querySelectorAll('.rv').forEach(el=>obs.observe(el));
function countUp(el,to){let n=0;const s=to/(1600/16);const ti=setInterval(()=>{n=Math.min(n+s,to);el.textContent=to>=1000?Math.floor(n).toLocaleString('vi'):Math.floor(n);if(n>=to)clearInterval(ti)},16)}
const co=new IntersectionObserver(e=>{e.forEach(x=>{if(x.isIntersecting){x.target.querySelectorAll('.cnt').forEach(el=>countUp(el,+el.dataset.to));co.unobserve(x.target)}})},{threshold:.35});
document.querySelectorAll('.hero,.story').forEach(el=>co.observe(el));
</script>


<?php get_footer(); ?>