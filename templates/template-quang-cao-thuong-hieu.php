<?php
/**
 * Template Name: Trang quảng cáo thương hiệu
 */

get_header(); ?>

<style>
.page-template-template-quang-cao-thuong-hieu-php *, .page-template-template-quang-cao-thuong-hieu-php *::before, .page-template-template-quang-cao-thuong-hieu-php *::after{box-sizing:border-box;margin:0;padding:0}

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

/* ══ HERO ══ */
.hero{height:100vh;min-height:700px;position:relative;overflow:hidden;display:flex;align-items:flex-end;background:var(--ink)}
.hero__collage{position:absolute;inset:0;display:grid;grid-template-columns:1.8fr 1fr 1fr;grid-template-rows:1fr 1fr;gap:2px}
.hero__cell{overflow:hidden}
.hero__cell img{width:100%;height:100%;object-fit:cover;filter:brightness(.38) saturate(.7);transition:filter .5s}
.hero__cell:hover img{filter:brightness(.28)}
.hero__cell--main{grid-row:span 2}
.hero__fog{position:absolute;inset:0;z-index:1;background:linear-gradient(180deg,rgba(17,24,39,.6) 0%,transparent 30%,rgba(17,24,39,.45) 55%,rgba(17,24,39,.97) 100%),linear-gradient(90deg,rgba(17,24,39,.4) 0%,transparent 60%)}
.hero__grid{position:absolute;inset:0;z-index:1;background-image:linear-gradient(rgba(255,255,255,.02) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.02) 1px,transparent 1px);background-size:52px 52px;pointer-events:none}
.hero__bar{position:absolute;bottom:0;left:0;right:0;height:3px;z-index:3;background:linear-gradient(90deg,var(--o),var(--odk) 45%,rgba(240,90,37,.2))}

.hero__body{position:relative;z-index:2;padding:0 56px 80px;max-width:1320px;margin:0 auto;width:100%;display:grid;grid-template-columns:1fr 1fr;gap:72px;align-items:flex-end}
.hero__tag{display:inline-flex;align-items:center;gap:9px;font-size:9.5px;font-weight:700;letter-spacing:.24em;text-transform:uppercase;color:var(--o);padding:4px 12px;background:rgba(240,90,37,.1);border:1px solid rgba(240,90,37,.28);border-radius:4px;margin-bottom:20px;opacity:0;animation:su .5s .1s ease forwards}
.hero__h1{font-family:var(--ff);font-weight:800;font-size:clamp(3rem,6vw,6rem);letter-spacing:-.07em;color:#fff;line-height:.9;margin-bottom:22px;opacity:0;animation:su .9s .25s cubic-bezier(.16,1,.3,1) forwards}
.hero__h1 em{font-style:italic;font-weight:300;color:var(--o);display:block}
.hero__sub{font-size:15px;font-weight:300;color:rgba(255,255,255,.48);line-height:1.85;max-width:420px;margin-bottom:32px;opacity:0;animation:su .65s .45s ease forwards}
.hero__acts{display:flex;gap:12px;flex-wrap:wrap;opacity:0;animation:su .6s .62s ease forwards}
.btn-p{display:inline-flex;align-items:center;gap:8px;padding:13px 26px;background:var(--o);color:#fff;font-family:var(--ff);font-size:12.5px;font-weight:700;letter-spacing:.05em;text-transform:uppercase;border-radius:8px;text-decoration:none;box-shadow:0 4px 20px rgba(240,90,37,.35);transition:background .18s,transform .15s}
.btn-p:hover{background:var(--odk);transform:translateY(-2px)}
.btn-g{display:inline-flex;align-items:center;gap:8px;padding:12px 22px;background:transparent;border:1.5px solid rgba(255,255,255,.25);color:rgba(255,255,255,.78);font-family:var(--ff);font-size:12.5px;font-weight:600;text-transform:uppercase;letter-spacing:.04em;border-radius:8px;text-decoration:none;transition:border-color .2s,color .2s,background .2s}
.btn-g:hover{border-color:rgba(255,255,255,.55);color:#fff;background:rgba(255,255,255,.06)}
.hero__right{opacity:0;animation:su .7s .55s ease forwards}
.roi-box{background:var(--o);border-radius:12px;padding:28px 24px;margin-bottom:14px;position:relative;overflow:hidden}
.roi-box::before{content:'';position:absolute;top:-40px;right:-40px;width:160px;height:160px;border-radius:50%;background:rgba(255,255,255,.08)}
.roi-box__label{font-size:9.5px;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:rgba(255,255,255,.65);margin-bottom:8px;position:relative;z-index:1}
.roi-box__val{font-family:var(--ff);font-size:3.5rem;font-weight:800;letter-spacing:-.08em;color:#fff;line-height:1;position:relative;z-index:1}
.roi-box__sub{font-size:12.5px;color:rgba(255,255,255,.7);margin-top:6px;position:relative;z-index:1;line-height:1.6}
.hero-metrics{display:grid;grid-template-columns:1fr 1fr;gap:8px}
.hm{background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.09);padding:14px 16px;border-radius:8px}
.hm__val{font-family:var(--ff);font-size:1.8rem;font-weight:800;letter-spacing:-.06em;color:#fff;line-height:1}
.hm__val span{color:var(--o)}
.hm__l{font-size:10px;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:rgba(255,255,255,.35);margin-top:4px}

/* ══ SHARED ══ */
.section{padding:88px 0}
.inner{max-width:1320px;margin:0 auto;padding:0 56px}
.ey{display:inline-flex;align-items:center;gap:8px;font-size:9.5px;font-weight:700;letter-spacing:.22em;text-transform:uppercase;color:var(--o);margin-bottom:12px}
.ey::before{content:'';display:block;width:22px;height:2px;background:var(--o);border-radius:2px}
.sh{font-family:var(--ff);font-weight:800;font-size:clamp(1.9rem,3.5vw,3rem);letter-spacing:-.05em;line-height:1.04;margin-bottom:12px}
.sh--w{color:#fff}.sh--d{color:var(--navy)}
.sh em{font-style:italic;font-weight:300;color:var(--o)}
.sd{font-size:14.5px;line-height:1.8;max-width:500px}
.sd--w{color:rgba(255,255,255,.45)}.sd--d{color:var(--muted)}
.sec-head{display:flex;align-items:flex-end;justify-content:space-between;gap:32px;margin-bottom:52px;flex-wrap:wrap}

/* ══ USE CASES MOSAIC ══ */
.use-mosaic{display:grid;grid-template-columns:repeat(12,1fr);grid-auto-rows:260px;gap:4px}
.um{position:relative;overflow:hidden;cursor:default}
.um img{width:100%;height:100%;object-fit:cover;filter:brightness(.45) saturate(.7);transition:filter .5s,transform .7s cubic-bezier(.16,1,.3,1)}
.um:hover img{filter:brightness(.3) saturate(.9);transform:scale(1.06)}
.um__over{position:absolute;inset:0;background:linear-gradient(180deg,transparent 30%,rgba(17,24,39,.92) 100%)}
.um__body{position:absolute;bottom:0;left:0;right:0;padding:22px 20px 18px}
.um__tag{font-size:9px;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:var(--o);margin-bottom:5px}
.um__title{font-family:var(--ff);font-weight:800;font-size:1rem;color:#fff;line-height:1.2;letter-spacing:-.03em}
.um__spec{font-size:11px;color:rgba(255,255,255,.45);margin-top:4px}
.c3{grid-column:span 3}.c4{grid-column:span 4}.c5{grid-column:span 5}.c6{grid-column:span 6}.r2{grid-row:span 2}

/* ══ ROI STORY ══ */
.roi-story{background:var(--navy);padding:100px 0;position:relative;overflow:hidden}
.roi-story::before{content:'';position:absolute;inset:0;background-image:linear-gradient(rgba(255,255,255,.022) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.022) 1px,transparent 1px);background-size:52px 52px}
.roi-story::after{content:'';position:absolute;top:-100px;right:-100px;width:500px;height:500px;border-radius:50%;background:radial-gradient(circle,rgba(240,90,37,.12) 0%,transparent 70%);pointer-events:none}
.roi-layout{display:flex;justify-content:center;position:relative;z-index:1}
.roi-cards{display:grid;grid-template-columns:1fr 1fr;gap:12px}
.roi-card{background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.09);border-radius:10px;padding:22px 18px;transition:background .2s,border-color .2s}
.roi-card:hover{background:rgba(240,90,37,.1);border-color:rgba(240,90,37,.28)}
.roi-card__ico{font-size:24px;margin-bottom:12px}
.roi-card__val{font-family:var(--ff);font-size:2.2rem;font-weight:800;letter-spacing:-.07em;color:#fff;line-height:1;margin-bottom:5px}
.roi-card__val span{color:var(--o)}
.roi-card__label{font-size:12px;font-weight:600;color:rgba(255,255,255,.5);line-height:1.55}

/* ══ SOLUTIONS GRID ══ */
.sol-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px}
.sol-card{background:var(--light);border:2px solid var(--bdr);border-radius:12px;overflow:hidden;transition:border-color .22s,transform .3s cubic-bezier(.16,1,.3,1),box-shadow .26s}
.sol-card:hover{border-color:rgba(28,40,87,.2);transform:translateY(-5px);box-shadow:0 18px 48px rgba(28,40,87,.09)}
.sol-card__img{height:200px;overflow:hidden}
.sol-card__img img{width:100%;height:100%;object-fit:cover;filter:saturate(.82);transition:transform .6s cubic-bezier(.16,1,.3,1),filter .35s}
.sol-card:hover .sol-card__img img{transform:scale(1.06);filter:saturate(1)}
.sol-card__body{padding:20px 22px 22px}
.sol-card__tag{font-size:9px;font-weight:700;letter-spacing:.16em;text-transform:uppercase;color:var(--o);margin-bottom:7px}
.sol-card__title{font-family:var(--ff);font-weight:800;font-size:1.1rem;letter-spacing:-.04em;color:var(--navy);margin-bottom:8px;transition:color .2s;line-height:1.2}
.sol-card:hover .sol-card__title{color:var(--o)}
.sol-card__desc{font-size:13px;color:var(--muted);line-height:1.7;margin-bottom:14px}
.sol-card__specs{display:flex;flex-wrap:wrap;gap:6px}
.sspec{font-size:10px;font-weight:600;padding:2px 8px;border-radius:4px;background:var(--w);border:1px solid var(--bdr);color:var(--muted)}

/* ══ COMPARISON TABLE ══ */
.compare-wrap{overflow-x:auto;margin-top:0}
.compare-table{width:100%;border-collapse:collapse;font-size:13.5px;min-width:680px}
.compare-table thead tr{background:var(--navy)}
.compare-table th{padding:14px 18px;text-align:left;font-size:10.5px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;color:rgba(255,255,255,.6)}
.compare-table th:first-child{color:rgba(255,255,255,.4)}
.compare-table td{padding:13px 18px;border-bottom:1px solid var(--bdr);vertical-align:middle}
.compare-table tr:last-child td{border-bottom:none}
.compare-table tr:hover td{background:var(--olt)}
.compare-table .highlight-row td{background:rgba(240,90,37,.05);font-weight:600}
.compare-table .highlight-row td:first-child{color:var(--o);font-weight:700}
.check-yes{color:#16a34a;font-weight:700;font-size:15px}
.check-no{color:#dc2626;font-size:15px}

/* ══ CASES ══ */
.cases{display:grid;grid-template-columns:1.4fr 1fr 1fr;gap:4px;border-radius:12px;overflow:hidden}
.case{position:relative;overflow:hidden;min-height:380px;background:var(--navy3);text-decoration:none;display:block}
.case img{width:100%;height:100%;object-fit:cover;filter:brightness(.42) saturate(.65);transition:filter .5s,transform .7s}
.case:hover img{filter:brightness(.28) saturate(.85);transform:scale(1.05)}
.case__over{position:absolute;inset:0;background:linear-gradient(180deg,rgba(17,24,39,.2) 0%,rgba(17,24,39,.94) 100%)}
.case__body{position:absolute;bottom:0;left:0;right:0;padding:26px 22px 20px}
.case__tag{font-size:9px;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:var(--o);margin-bottom:7px;display:flex;align-items:center;gap:6px}
.case__tag::before{content:'';display:block;width:14px;height:1.5px;background:var(--o)}
.case__name{font-family:var(--ff);font-weight:800;color:#fff;line-height:1.2;letter-spacing:-.03em;margin-bottom:8px}
.case--main .case__name{font-size:1.35rem}
.case:not(.case--main) .case__name{font-size:1.05rem}
.case__specs{display:flex;flex-wrap:wrap;gap:6px}
.spec{font-size:9.5px;font-weight:600;padding:3px 8px;border-radius:3px;background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.12);color:rgba(255,255,255,.65)}

/* ══ CTA ══ */
.cta{background:var(--o);padding:64px 0;position:relative;overflow:hidden}
.cta::before{content:'';position:absolute;inset:0;background:linear-gradient(135deg,var(--o),var(--odk))}
.cta::after{content:'';position:absolute;top:-80px;right:-80px;width:350px;height:350px;border-radius:50%;background:rgba(255,255,255,.07);pointer-events:none}
.cta__inner{max-width:1320px;margin:0 auto;padding:0 56px;position:relative;z-index:1;display:flex;align-items:center;justify-content:space-between;gap:32px;flex-wrap:wrap}
.cta__h{font-family:var(--ff);font-weight:800;font-size:clamp(1.7rem,3vw,2.6rem);letter-spacing:-.05em;color:#fff;line-height:1.05}
.cta__h em{font-style:italic;font-weight:300}
.cta__sub{font-size:14px;color:rgba(255,255,255,.75);margin-top:6px}
.cta-btns{display:flex;gap:12px;flex-wrap:wrap}
.btn-w{display:inline-flex;align-items:center;gap:8px;padding:13px 28px;background:#fff;color:var(--navy);font-family:var(--ff);font-size:12.5px;font-weight:700;letter-spacing:.04em;text-transform:uppercase;border-radius:8px;text-decoration:none;box-shadow:0 4px 20px rgba(0,0,0,.15);transition:transform .15s,box-shadow .2s}
.btn-w:hover{transform:translateY(-2px);box-shadow:0 8px 28px rgba(0,0,0,.2)}
.btn-wg{display:inline-flex;align-items:center;gap:8px;padding:12px 22px;background:transparent;border:1.5px solid rgba(255,255,255,.3);color:rgba(255,255,255,.85);font-family:var(--ff);font-size:12.5px;font-weight:600;text-transform:uppercase;letter-spacing:.04em;border-radius:8px;text-decoration:none;transition:border-color .2s,color .2s}
.btn-wg:hover{border-color:rgba(255,255,255,.6);color:#fff}

@keyframes su{from{opacity:0;transform:translateY(18px)}to{opacity:1;transform:translateY(0)}}
.rv{opacity:0;transform:translateY(22px);transition:opacity .7s cubic-bezier(.16,1,.3,1),transform .7s cubic-bezier(.16,1,.3,1)}
.rv.in{opacity:1;transform:translateY(0)}
.d1{transition-delay:.08s}.d2{transition-delay:.16s}.d3{transition-delay:.24s}

@media(max-width:1100px){.hero__body,.roi-layout{grid-template-columns:1fr;gap:40px}.use-mosaic{grid-template-columns:repeat(6,1fr)}.um.c3{grid-column:span 3}.um.c4{grid-column:span 6}.um.c5{grid-column:span 6}.um.c6{grid-column:span 6}.roi-cards{grid-template-columns:1fr 1fr}.sol-grid{grid-template-columns:1fr 1fr}.cases{grid-template-columns:1fr 1fr}.case--main{grid-column:span 2}}
@media(max-width:768px){.hero__body,.inner,.roi-layout,.cta__inner{padding-left:20px;padding-right:20px}.use-mosaic{grid-template-columns:1fr 1fr}.um{grid-column:span 1!important;grid-row:span 1!important}.sol-grid{grid-template-columns:1fr}.cases{grid-template-columns:1fr}.case--main{grid-column:span 1}.sec-head{flex-direction:column;gap:16px;margin-bottom:32px}}
</style>
</head>
<body>
<div id="cd"></div><div id="cr"></div>

<!-- HERO -->
<section class="hero">
  <div class="hero__collage" aria-hidden="true">
    <div class="hero__cell hero__cell--main"><img src="https://images.unsplash.com/photo-1567521464027-f127ff144326?w=900&q=85" alt="Billboard LED ngoài trời" loading="eager"></div>
    <div class="hero__cell"><img src="https://images.unsplash.com/photo-1518770660439-4636190af475?w=600&q=85" alt="Digital Signage TTTM" loading="eager"></div>
    <div class="hero__cell"><img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=600&q=85" alt="Showroom LED" loading="eager"></div>
    <div class="hero__cell"><img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=600&q=85" alt="LED Lobby" loading="eager"></div>
    <div class="hero__cell"><img src="https://images.unsplash.com/photo-1488229297570-58520851e868?w=600&q=85" alt="LED quảng cáo" loading="eager"></div>
  </div>
  <div class="hero__fog" aria-hidden="true"></div>
  <div class="hero__grid" aria-hidden="true"></div>
  <div class="hero__bar" aria-hidden="true"></div>
  <div class="hero__body">
    <div>
      <div class="hero__tag">📡 Quảng cáo Thương hiệu</div>
      <h1 class="hero__h1">Thương hiệu của bạn<br><em>phải được nhìn thấy</em></h1>
      <p class="hero__sub">Từ billboard 200m² ngoài đại lộ đến màn hình 10m² trong sảnh khách sạn — TavaLED giúp thương hiệu hiện diện mạnh mẽ, 24 giờ, 365 ngày.</p>
      <div class="hero__acts">
        <a href="#cta" class="btn-p">Tư vấn giải pháp</a>
        <a href="#solutions" class="btn-g">Xem các hình thức →</a>
      </div>
    </div>
    <div class="hero__right">
      <div class="roi-box">
        <div class="roi-box__label">Chi phí tiếp cận / 1.000 người</div>
        <div class="roi-box__val">8× rẻ hơn</div>
        <div class="roi-box__sub">LED ngoài trời so với quảng cáo báo in truyền thống tại cùng vị trí địa lý</div>
      </div>
      <div class="hero-metrics">
        <div class="hm"><div class="hm__val"><span class="cnt" data-to="300">0</span><span>+</span></div><div class="hm__l">Màn hình quảng cáo</div></div>
        <div class="hm"><div class="hm__val">24/7</div><div class="hm__l">Hoạt động liên tục</div></div>
        <div class="hm"><div class="hm__val">IP65</div><div class="hm__l">Chống thời tiết</div></div>
        <div class="hm"><div class="hm__val"><span class="cnt" data-to="10">0</span><span>+</span></div><div class="hm__l">Nit độ sáng (×1000)</div></div>
      </div>
    </div>
  </div>
</section>

<!-- USE CASES MOSAIC -->
<section class="section" style="background:var(--ink);padding-top:72px;padding-bottom:0">
  <div class="inner rv">
    <div class="sec-head">
      <div><div class="ey">Hình thức ứng dụng</div><h2 class="sh sh--w">Hiện diện ở <em>mọi điểm chạm</em></h2></div>
      <p class="sd sd--w">LED quảng cáo không chỉ là billboard ngoài trời — từ sảnh khách sạn đến màn hình xe bus, mọi nơi đều là cơ hội.</p>
    </div>
  </div>
  <div class="use-mosaic rv d1">
    <div class="um c4 r2"><img src="https://images.unsplash.com/photo-1567521464027-f127ff144326?w=800&q=85" alt="Billboard" loading="lazy"><div class="um__over"></div><div class="um__body"><div class="um__tag">Billboard Ngoài trời</div><div class="um__title">Màn hình LED P5–P10 kích thước 30–200m²</div><div class="um__spec">Độ sáng 10.000 nit · IP65 · 24/7</div></div></div>
    <div class="um c4"><img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=700&q=85" alt="TTTM" loading="lazy"><div class="um__over"></div><div class="um__body"><div class="um__tag">Trung tâm thương mại</div><div class="um__title">LED P2–P3 Indoor cho TTTM, chuỗi bán lẻ</div></div></div>
    <div class="um c4"><img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=700&q=85" alt="Lobby" loading="lazy"><div class="um__over"></div><div class="um__body"><div class="um__tag">Sảnh & Lobby</div><div class="um__title">Màn hình LED P2 tạo ấn tượng đầu tiên</div></div></div>
    <div class="um c3"><img src="https://images.unsplash.com/photo-1518770660439-4636190af475?w=600&q=85" alt="Showroom" loading="lazy"><div class="um__over"></div><div class="um__body"><div class="um__tag">Showroom</div><div class="um__title">LED P1.5–P2 trưng bày sản phẩm</div></div></div>
    <div class="um c3"><img src="https://images.unsplash.com/photo-1488229297570-58520851e868?w=600&q=85" alt="Ngân hàng" loading="lazy"><div class="um__over"></div><div class="um__body"><div class="um__tag">Ngân hàng & Tài chính</div><div class="um__title">Ticker board, rate board LED</div></div></div>
    <div class="um c3"><img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=600&q=85" alt="Sân bay" loading="lazy"><div class="um__over"></div><div class="um__body"><div class="um__tag">Sân bay & Nhà ga</div><div class="um__title">LED P3–P4 wayfinding & quảng cáo</div></div></div>
    <div class="um c3"><img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=600&q=85" alt="Tòa nhà" loading="lazy"><div class="um__over"></div><div class="um__body"><div class="um__tag">Tòa nhà Văn phòng</div><div class="um__title">Màn hình công trình kiến trúc</div></div></div>
  </div>
</section>

<!-- ROI STORY -->
<section class="roi-story">
  <div class="inner">
    <div class="roi-layout">
      <div class="roi-cards rv d2">
        <div class="roi-card"><div class="roi-card__ico">👁️</div><div class="roi-card__val">2.5<span>M+</span></div><div class="roi-card__label">Lượt tiếp cận mỗi tháng — billboard tại vị trí trung tâm</div></div>
        <div class="roi-card"><div class="roi-card__ico">💰</div><div class="roi-card__val">8×</div><div class="roi-card__label">Tiết kiệm chi phí CPM so với quảng cáo truyền thống</div></div>
        <div class="roi-card"><div class="roi-card__ico">⚡</div><div class="roi-card__val">5<span>s</span></div><div class="roi-card__label">Thay đổi nội dung từ xa — không tốn chi phí in ấn</div></div>
        <div class="roi-card"><div class="roi-card__ico">📊</div><div class="roi-card__val">ROI<span>+</span></div><div class="roi-card__label">Hoàn vốn đầu tư trung bình trong 18–24 tháng</div></div>
      </div>
    </div>
  </div>
</section>

<!-- SOLUTIONS GRID -->
<section class="section" style="background:var(--light)" id="solutions">
  <div class="inner">
    <div class="sec-head rv"><div><div class="ey">Giải pháp theo nhu cầu</div><h2 class="sh sh--d">3 hướng triển khai <em>phổ biến nhất</em></h2></div></div>
    <div class="sol-grid rv d1">
      <div class="sol-card">
        <div class="sol-card__img"><img src="https://images.unsplash.com/photo-1567521464027-f127ff144326?w=600&q=85" alt="" loading="lazy"></div>
        <div class="sol-card__body">
          <div class="sol-card__tag">Outdoor Billboard</div>
          <div class="sol-card__title">Màn hình LED ngoài trời cố định</div>
          <div class="sol-card__desc">Cấu trúc thép chịu lực, IP65, chống gió cấp 10, độ sáng 10.000 nit. Phù hợp đại lộ, nút giao thông, khu thương mại.</div>
          <div class="sol-card__specs"><span class="sspec">P5–P10</span><span class="sspec">IP65</span><span class="sspec">10kW nit</span><span class="sspec">Cấu trúc thép</span></div>
        </div>
      </div>
      <div class="sol-card">
        <div class="sol-card__img"><img src="https://images.unsplash.com/photo-1518770660439-4636190af475?w=600&q=85" alt="" loading="lazy"></div>
        <div class="sol-card__body">
          <div class="sol-card__tag">Indoor Digital Signage</div>
          <div class="sol-card__title">Màn hình quảng cáo trong nhà</div>
          <div class="sol-card__desc">P2–P3 indoor sắc nét, hệ thống quản lý nội dung CMS cloud. Lên lịch phát, quản lý đa điểm từ một nơi.</div>
          <div class="sol-card__specs"><span class="sspec">P2–P3</span><span class="sspec">CMS Cloud</span><span class="sspec">Multi-screen</span><span class="sspec">Schedule</span></div>
        </div>
      </div>
      <div class="sol-card">
        <div class="sol-card__img"><img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=600&q=85" alt="" loading="lazy"></div>
        <div class="sol-card__body">
          <div class="sol-card__tag">Architectural LED</div>
          <div class="sol-card__title">LED kiến trúc công trình</div>
          <div class="sol-card__desc">LED tích hợp vào vỏ công trình, LED mesh linh hoạt cho mặt dựng kính. Biến tòa nhà thành biển quảng cáo sống.</div>
          <div class="sol-card__specs"><span class="sspec">LED Mesh</span><span class="sspec">Transparent</span><span class="sspec">Building-scale</span></div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- COMPARE TABLE -->
<section class="section" style="background:var(--w)">
  <div class="inner">
    <div class="sec-head rv"><div><div class="ey">So sánh hình thức quảng cáo</div><h2 class="sh sh--d">Tại sao <em>LED thắng</em>?</h2></div></div>
    <div class="compare-wrap rv d1">
      <table class="compare-table">
        <thead><tr><th>Tiêu chí</th><th>LED Billboard</th><th>Biển hộp đèn</th><th>Báo in</th><th>Banner vải</th></tr></thead>
        <tbody>
          <tr class="highlight-row"><td>TavaLED LED</td><td><span class="check-yes">✓</span></td><td>—</td><td>—</td><td>—</td></tr>
          <tr><td>Hoạt động 24/7</td><td><span class="check-yes">✓ Tự động</span></td><td><span class="check-yes">✓</span></td><td><span class="check-no">✗</span></td><td><span class="check-no">✗</span></td></tr>
          <tr><td>Thay đổi nội dung</td><td><span class="check-yes">✓ Ngay lập tức</span></td><td><span class="check-no">✗ In lại</span></td><td><span class="check-no">✗ In lại</span></td><td><span class="check-no">✗ In lại</span></td></tr>
          <tr><td>Chi phí vận hành / năm</td><td>Rất thấp</td><td>Trung bình</td><td>Cao</td><td>Trung bình</td></tr>
          <tr><td>Tuổi thọ</td><td>100,000 giờ</td><td>30,000 giờ</td><td>1 lần dùng</td><td>3–6 tháng</td></tr>
          <tr><td>Tác động môi trường</td><td><span class="check-yes">✓ Không rác in</span></td><td>Trung bình</td><td>Cao</td><td>Cao</td></tr>
          <tr><td>Độ nổi bật ban đêm</td><td><span class="check-yes">✓ Rất cao</span></td><td>Trung bình</td><td><span class="check-no">✗</span></td><td><span class="check-no">✗</span></td></tr>
        </tbody>
      </table>
    </div>
  </div>
</section>

<!-- CASES -->
<section class="section" style="background:var(--light)">
  <div class="inner">
    <div class="sec-head rv"><div><div class="ey">Dự án thực tế</div><h2 class="sh sh--d">Thương hiệu đã <em>tin tưởng</em></h2></div><a href="/du-an" style="font-size:12.5px;font-weight:600;color:var(--navy);text-decoration:none;border-bottom:1.5px solid var(--bdr);padding-bottom:3px">Xem tất cả →</a></div>
    <div class="cases rv d1">
      <a href="#" class="case case--main"><img src="https://images.unsplash.com/photo-1567521464027-f127ff144326?w=800&q=85" alt="" loading="lazy"><div class="case__over"></div><div class="case__body"><div class="case__tag">Hà Nội · 2024</div><div class="case__name">Vingroup — Chuỗi 48 billboard LED P6 tại 12 tỉnh thành</div><div class="case__specs"><span class="spec">P6 Outdoor</span><span class="spec">48 điểm</span><span class="spec">CMS tập trung</span><span class="spec">12 tỉnh</span></div></div></a>
      <a href="#" class="case"><img src="https://images.unsplash.com/photo-1518770660439-4636190af475?w=600&q=85" alt="" loading="lazy"><div class="case__over"></div><div class="case__body"><div class="case__tag">TP.HCM · 2024</div><div class="case__name">Aeon Mall — Digital Signage P2.5 toàn bộ TTTM</div><div class="case__specs"><span class="spec">P2.5 Indoor</span><span class="spec">120 màn hình</span></div></div></a>
      <a href="#" class="case"><img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=600&q=85" alt="" loading="lazy"><div class="case__over"></div><div class="case__body"><div class="case__tag">Đà Nẵng · 2023</div><div class="case__name">Sân bay Quốc tế Đà Nẵng — LED P3 terminal</div><div class="case__specs"><span class="spec">P3 Terminal</span><span class="spec">Wayfinding</span></div></div></a>
    </div>
  </div>
</section>

<!-- CTA -->
<div class="cta" id="cta">
  <div class="cta__inner">
    <div><h2 class="cta__h">Thương hiệu của bạn<br><em>xứng đáng được nhìn thấy</em></h2><p class="cta__sub">Tư vấn vị trí, kích thước, giải pháp phù hợp ngân sách. Báo giá trong 24 giờ.</p></div>
    <div class="cta-btns"><a href="tel:19001234" class="btn-w">📞 1900 1234</a><a href="mailto:info@tavaled.vn?subject=Tư vấn màn hình quảng cáo" class="btn-wg">Gửi yêu cầu tư vấn</a></div>
  </div>
</div>

<script>
const cd=document.getElementById('cd'),cr=document.getElementById('cr');let mx=0,my=0,rx=0,ry=0;
window.addEventListener('mousemove',e=>{mx=e.clientX;my=e.clientY},{passive:true});
(function t(){rx+=(mx-rx)*.13;ry+=(my-ry)*.13;cd.style.cssText=`left:${mx}px;top:${my}px`;cr.style.cssText=`left:${rx}px;top:${ry}px`;requestAnimationFrame(t)})();
const obs=new IntersectionObserver(e=>{e.forEach(x=>{if(x.isIntersecting){x.target.classList.add('in');obs.unobserve(x.target)}})},{threshold:.08,rootMargin:'0px 0px -30px 0px'});
document.querySelectorAll('.rv').forEach(el=>obs.observe(el));
function countUp(el,to){let n=0;const s=to/(1600/16);const ti=setInterval(()=>{n=Math.min(n+s,to);el.textContent=Math.floor(n);if(n>=to)clearInterval(ti)},16)}
const co=new IntersectionObserver(e=>{e.forEach(x=>{if(x.isIntersecting){x.target.querySelectorAll('.cnt').forEach(el=>countUp(el,+el.dataset.to));co.unobserve(x.target)}})},{threshold:.4});
document.querySelectorAll('.hero').forEach(el=>co.observe(el));
</script>

<?php get_footer(); ?>