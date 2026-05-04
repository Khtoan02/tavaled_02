<?php
/**
 * Template Name: Trang Phòng họp doanh nghiệp
 */

get_header(); ?>

<style>
.page-template-template-hoi-hop-doanh-nghiep-php *, .page-template-template-hoi-hop-doanh-nghiep-php *::before, .page-template-template-hoi-hop-doanh-nghiep-php *::after{box-sizing:border-box;margin:0;padding:0}

:root{
  --navy:#1c2857;--navy2:#162248;--navy3:#0f1835;
  --o:#f05a25;--odk:#c8451a;--olt:#fff3ee;
  --w:#fff;--ink:#111827;--mid:#374151;--muted:#6b7280;
  --light:#f9fafb;--bdr:#e5e7eb;
  --ff:var(--font-body);
}
html{scroll-behavior:smooth}
body{font-family:var(--ff);background:var(--w);color:var(--ink);-webkit-font-smoothing:antialiased;overflow-x:hidden;cursor:none}
#cd,#cr{position:fixed;border-radius:50%;pointer-events:none;z-index:9999;transform:translate(-50%,-50%)}
#cd{width:7px;height:7px;background:var(--o)}
#cr{width:36px;height:36px;border:1.5px solid rgba(240,90,37,.4);transition:width .3s,height .3s,border-color .3s}
body:has(a:hover) #cr,body:has(button:hover) #cr{width:50px;height:50px;border-color:var(--o)}

/* ══ HERO — STORYTELLING ══ */
.hero{min-height:100vh;background:var(--navy3);position:relative;overflow:hidden;display:flex;align-items:flex-end}
.hero__bg{position:absolute;inset:0}
.hero__bg img{width:100%;height:100%;object-fit:cover;}
.hero__fog{position:absolute;inset:0;z-index:1;
  background:linear-gradient(180deg,rgba(15,24,53,.65) 0%,transparent 30%,rgba(15,24,53,.4) 55%,rgba(15,24,53,.97) 100%),
             linear-gradient(90deg,rgba(15,24,53,.5) 0%,transparent 60%)}
.hero__grid{position:absolute;inset:0;z-index:1;background-image:linear-gradient(rgba(255,255,255,.02) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.02) 1px,transparent 1px);background-size:56px 56px;pointer-events:none}
.hero__bar{position:absolute;bottom:0;left:0;right:0;height:3px;z-index:3;background:linear-gradient(90deg,var(--o),var(--odk) 45%,rgba(240,90,37,.2))}

.hero__body{position:relative;z-index:2;padding:0 56px 80px;max-width:1320px;margin:0 auto;width:100%;display:grid;grid-template-columns:1fr 1fr;gap:72px;align-items:flex-end}

.hero__tag{display:inline-flex;align-items:center;gap:9px;font-size:9.5px;font-weight:700;letter-spacing:.24em;text-transform:uppercase;color:var(--o);padding:4px 12px;background:rgba(240,90,37,.1);border:1px solid rgba(240,90,37,.28);border-radius:4px;margin-bottom:20px;opacity:0;animation:su .5s .1s ease forwards}
.hero__h1{font-family:var(--ff);font-weight:800;font-size:clamp(3rem,5.5vw,5.5rem);letter-spacing:-.06em;color:#fff;line-height:.92;margin-bottom:22px;opacity:0;animation:su .85s .25s cubic-bezier(.16,1,.3,1) forwards}
.hero__h1 em{font-style:italic;font-weight:300;color:var(--o);display:block}
.hero__sub{font-size:15px;font-weight:300;color:rgba(255,255,255,.5);line-height:1.85;max-width:420px;margin-bottom:32px;opacity:0;animation:su .65s .45s ease forwards}
.hero__acts{display:flex;gap:12px;flex-wrap:wrap;opacity:0;animation:su .6s .6s ease forwards}
.btn-p{display:inline-flex;align-items:center;gap:8px;padding:13px 26px;background:var(--o);color:#fff;font-family:var(--ff);font-size:12.5px;font-weight:700;letter-spacing:.05em;text-transform:uppercase;border-radius:8px;text-decoration:none;box-shadow:0 4px 20px rgba(240,90,37,.3);transition:background .18s,transform .15s}
.btn-p:hover{background:var(--odk);transform:translateY(-2px)}
.btn-p svg{width:13px;height:13px;stroke:currentColor;fill:none;stroke-width:2}
.btn-g{display:inline-flex;align-items:center;gap:8px;padding:12px 22px;background:transparent;border:1.5px solid rgba(255,255,255,.25);color:rgba(255,255,255,.75);font-family:var(--ff);font-size:12.5px;font-weight:600;text-transform:uppercase;letter-spacing:.04em;border-radius:8px;text-decoration:none;transition:border-color .2s,color .2s,background .2s}
.btn-g:hover{border-color:rgba(255,255,255,.55);color:#fff;background:rgba(255,255,255,.06)}

/* Hero right — scene preview */
.hero__scene{opacity:0;animation:su .7s .55s ease forwards;display:flex;justify-content:center}
.scene-stats{display:grid;grid-template-columns:repeat(3,1fr);gap:8px;margin-top:4px}
.sstat{background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.09);padding:14px 12px;text-align:center;border-radius:7px}
.sstat__val{font-family:var(--ff);font-size:1.8rem;font-weight:800;letter-spacing:-.06em;color:#fff;line-height:1}
.sstat__val span{color:var(--o)}
.sstat__l{font-size:10px;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:rgba(255,255,255,.35);margin-top:4px}

/* ══ SHARED ══ */
.section{padding:88px 0}
.inner{max-width:1320px;margin:0 auto;padding:0 56px}
.ey{display:inline-flex;align-items:center;gap:8px;font-size:9.5px;font-weight:700;letter-spacing:.22em;text-transform:uppercase;color:var(--o);margin-bottom:12px}
.ey::before{content:'';display:block;width:22px;height:2px;background:var(--o);border-radius:2px}
.sh{font-family:var(--ff);font-weight:800;font-size:clamp(1.9rem,3.5vw,3rem);letter-spacing:-.05em;color:var(--navy);line-height:1.04;margin-bottom:12px}
.sh em{font-style:italic;font-weight:300;color:var(--o)}
.sh--w{color:#fff}
.sec-head{display:flex;align-items:flex-end;justify-content:space-between;gap:32px;margin-bottom:52px;flex-wrap:wrap}
.sd{font-size:14.5px;color:var(--muted);line-height:1.8;max-width:500px}

/* ══ ACT 2 — PROBLEM ══ */
.problem{background:var(--light);padding:100px 0}
.prob-layout{display:grid;grid-template-columns:1fr 1fr;gap:72px;align-items:center}
.prob-visual{position:relative}
/* Meeting room illustration CSS */
.meetroom{width:100%;aspect-ratio:16/9;background:linear-gradient(135deg,#1a2340,#0d1520);border-radius:10px;position:relative;overflow:hidden;border:1px solid rgba(255,255,255,.05)}
.meetroom::before{content:'';position:absolute;inset:0;background-image:repeating-linear-gradient(0deg,transparent,transparent 30px,rgba(255,255,255,.015) 30px,rgba(255,255,255,.015) 31px)}
/* Projector screen dim */
.mr-screen{position:absolute;top:12%;left:8%;right:8%;height:38%;background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.08);border-radius:4px;display:flex;align-items:center;justify-content:center}
.mr-screen-text{font-size:clamp(8px,1.2vw,11px);color:rgba(255,255,255,.15);font-weight:600;letter-spacing:.1em;text-transform:uppercase}
/* Table */
.mr-table{position:absolute;bottom:8%;left:12%;right:12%;height:22%;background:rgba(255,255,255,.05);border-radius:4px}
/* People silhouettes */
.mr-person{position:absolute;bottom:calc(8% + 22% + 2%);width:6%;aspect-ratio:1;border-radius:50%;background:rgba(255,255,255,.07)}
/* Problems overlay */
.problem-tag{position:absolute;background:rgba(220,38,38,.9);color:#fff;font-size:9px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;padding:4px 10px;border-radius:4px;white-space:nowrap}
.problem-tag::before{content:'⚠';margin-right:4px}
/* After arrow */
.prob-arrow{display:flex;justify-content:center;align-items:center;padding:16px 0;font-size:28px;opacity:.4}

.prob-text{}
.prob-list{list-style:none;display:flex;flex-direction:column;gap:14px;margin-top:24px}
.prob-item{display:flex;align-items:flex-start;gap:14px;padding:14px;background:var(--w);border:1.5px solid var(--bdr);border-radius:10px;transition:border-color .2s}
.prob-item:hover{border-color:rgba(240,90,37,.25)}
.prob-item__ico{width:36px;height:36px;border-radius:9px;background:var(--light);display:flex;align-items:center;justify-content:center;font-size:16px;flex-shrink:0}
.prob-item__title{font-size:13.5px;font-weight:700;color:var(--ink);margin-bottom:3px}
.prob-item__desc{font-size:12.5px;color:var(--muted);line-height:1.6}

/* ══ ACT 3 — SOLUTION REVEAL ══ */
.reveal-section{position:relative;overflow:hidden;min-height:600px;display:flex;align-items:center}
.reveal-section__bg{position:absolute;inset:0}
.reveal-section__bg img{width:100%;height:100%;object-fit:cover;}
.reveal-section__fog{position:absolute;inset:0;background:linear-gradient(90deg,rgba(15,24,53,.95) 0%,rgba(15,24,53,.6) 55%,rgba(15,24,53,.3) 100%)}
.reveal-section__grid{position:absolute;inset:0;background-image:linear-gradient(rgba(255,255,255,.02) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.02) 1px,transparent 1px);background-size:52px 52px}
.reveal-section__inner{position:relative;z-index:2;padding:88px 56px;max-width:1320px;margin:0 auto;width:100%;display:flex;justify-content:center}
.reveal-metrics{display:flex;flex-direction:column;gap:16px;max-width:800px;width:100%}
.reveal-metrics{display:flex;flex-direction:column;gap:16px}
.rmetric{display:flex;align-items:center;gap:18px;padding:18px 20px;background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1);border-radius:10px;transition:background .2s,border-color .2s}
.rmetric:hover{background:rgba(240,90,37,.1);border-color:rgba(240,90,37,.28)}
.rmetric__ico{width:46px;height:46px;border-radius:11px;background:rgba(240,90,37,.15);border:1px solid rgba(240,90,37,.25);display:flex;align-items:center;justify-content:center;font-size:20px;flex-shrink:0}
.rmetric__val{font-family:var(--ff);font-size:1.8rem;font-weight:800;color:#fff;letter-spacing:-.05em;line-height:1}
.rmetric__val span{color:var(--o)}
.rmetric__label{font-size:12px;color:rgba(255,255,255,.45);margin-top:3px;line-height:1.5}

/* ══ ACT 4 — SPACE TYPES (image heavy) ══ */
.spaces-wall{display:grid;grid-template-columns:repeat(12,1fr);grid-auto-rows:240px;gap:4px}
.sp{position:relative;overflow:hidden;cursor:default}
.sp img{width:100%;height:100%;object-fit:cover;transition:filter .5s,transform .7s cubic-bezier(.16,1,.3,1)}
.sp:hover img{transform:scale(1.06)}
.sp__over{position:absolute;inset:0;background:linear-gradient(180deg,transparent 35%,rgba(15,24,53,.9) 100%)}
.sp__body{position:absolute;bottom:0;left:0;right:0;padding:22px 20px 18px}
.sp__tag{font-size:9px;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:var(--o);margin-bottom:5px}
.sp__title{font-family:var(--ff);font-weight:800;font-size:1rem;letter-spacing:-.03em;color:#fff;line-height:1.2;margin-bottom:5px}
.sp__desc{font-size:12px;color:rgba(255,255,255,.5);line-height:1.55}
.c3{grid-column:span 3}.c4{grid-column:span 4}.c6{grid-column:span 6}.r2{grid-row:span 2}

/* ══ ACT 5 — PRODUCTS ══ */
.prod-tabs{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:32px}
.ptab{padding:9px 20px;border-radius:8px;border:1.5px solid var(--bdr);background:var(--light);font-family:var(--ff);font-size:12.5px;font-weight:600;color:var(--muted);cursor:pointer;transition:all .22s}
.ptab:hover{border-color:var(--navy);color:var(--navy)}
.ptab.active{background:var(--navy);border-color:var(--navy);color:#fff;box-shadow:0 4px 16px rgba(28,40,87,.18)}
.ptab-panel{display:none}.ptab-panel.active{display:block}
.prod-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:14px}
.pcard{background:var(--light);border:1.5px solid var(--bdr);border-radius:11px;overflow:hidden;text-decoration:none;display:flex;flex-direction:column;transition:border-color .2s,transform .3s cubic-bezier(.16,1,.3,1),box-shadow .26s}
.pcard:hover{border-color:rgba(28,40,87,.2);transform:translateY(-4px);box-shadow:0 16px 40px rgba(28,40,87,.09)}
.pcard__img{height:150px;overflow:hidden}
.pcard__img img{width:100%;height:100%;object-fit:cover;transition:transform .5s,filter .3s}
.pcard:hover .pcard__img img{transform:scale(1.06);}
.pcard__body{padding:12px 14px 14px;flex:1;display:flex;flex-direction:column}
.pcard__cat{font-size:9px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--o);opacity:.75;margin-bottom:4px}
.pcard__name{font-family:var(--ff);font-weight:800;font-size:.92rem;letter-spacing:-.03em;color:var(--navy);line-height:1.25;transition:color .2s}
.pcard:hover .pcard__name{color:var(--o)}
.pcard__foot{display:flex;align-items:center;justify-content:space-between;padding-top:10px;border-top:1px solid var(--bdr);margin-top:auto}
.pcard__spec{font-size:10px;font-weight:600;color:var(--muted);background:var(--w);padding:2px 7px;border-radius:4px;border:1px solid var(--bdr)}
.pcard__cta{font-size:10.5px;font-weight:700;color:var(--o);letter-spacing:.06em;text-transform:uppercase;display:flex;align-items:center;gap:3px;transition:gap .18s}
.pcard__cta::after{content:'→';font-size:11px}
.pcard:hover .pcard__cta{gap:7px}

/* ══ ACT 6 — CASES ══ */
.cases{display:grid;grid-template-columns:1.5fr 1fr 1fr;gap:4px;border-radius:12px;overflow:hidden}
.case{position:relative;overflow:hidden;min-height:400px;background:var(--navy3);text-decoration:none;display:block}
.case img{width:100%;height:100%;object-fit:cover;transition:filter .5s,transform .7s cubic-bezier(.16,1,.3,1)}
.case:hover img{transform:scale(1.05)}
.case__over{position:absolute;inset:0;background:linear-gradient(180deg,rgba(28,40,87,.2) 0%,rgba(15,24,53,.92) 100%)}
.case__body{position:absolute;bottom:0;left:0;right:0;padding:26px 22px 20px}
.case__tag{font-size:9px;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:var(--o);margin-bottom:7px;display:flex;align-items:center;gap:6px}
.case__tag::before{content:'';display:block;width:14px;height:1.5px;background:var(--o)}
.case__name{font-family:var(--ff);font-weight:800;font-size:1.05rem;color:#fff;line-height:1.2;margin-bottom:7px;letter-spacing:-.02em}
.case--main .case__name{font-size:1.4rem}
.case__specs{display:flex;flex-wrap:wrap;gap:6px;margin-top:10px}
.spec{font-size:9.5px;font-weight:600;padding:3px 8px;border-radius:3px;background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.12);color:rgba(255,255,255,.65)}

/* ══ CTA ══ */
.cta{background:var(--o);padding:64px 0;position:relative;overflow:hidden}
.cta::before{content:'';position:absolute;inset:0;background:linear-gradient(135deg,var(--o),var(--odk))}
.cta::after{content:'';position:absolute;top:-100px;right:-100px;width:400px;height:400px;border-radius:50%;background:rgba(255,255,255,.07);pointer-events:none}
.cta__inner{max-width:1320px;margin:0 auto;padding:0 56px;position:relative;z-index:1;display:flex;align-items:center;justify-content:space-between;gap:32px;flex-wrap:wrap}
.cta__h{font-family:var(--ff);font-weight:800;font-size:clamp(1.7rem,3vw,2.6rem);letter-spacing:-.05em;color:#fff;line-height:1.05}
.cta__h em{font-style:italic;font-weight:300}
.cta__sub{font-size:14px;color:rgba(255,255,255,.75);margin-top:6px}
.cta-btns{display:flex;gap:12px;flex-wrap:wrap}
.btn-w{display:inline-flex;align-items:center;gap:8px;padding:13px 28px;background:#fff;color:var(--navy);font-family:var(--ff);font-size:12.5px;font-weight:700;letter-spacing:.04em;text-transform:uppercase;border-radius:8px;text-decoration:none;box-shadow:0 4px 20px rgba(0,0,0,.15);transition:transform .15s,box-shadow .2s}
.btn-w:hover{transform:translateY(-2px);box-shadow:0 8px 28px rgba(0,0,0,.2)}
.btn-w svg{width:13px;height:13px;stroke:currentColor;fill:none;stroke-width:2}
.btn-wg{display:inline-flex;align-items:center;gap:8px;padding:12px 22px;background:transparent;border:1.5px solid rgba(255,255,255,.3);color:rgba(255,255,255,.85);font-family:var(--ff);font-size:12.5px;font-weight:600;text-transform:uppercase;letter-spacing:.04em;border-radius:8px;text-decoration:none;transition:border-color .2s,color .2s}
.btn-wg:hover{border-color:rgba(255,255,255,.6);color:#fff}

@keyframes su{from{opacity:0;transform:translateY(18px)}to{opacity:1;transform:translateY(0)}}
.rv{opacity:0;transform:translateY(22px);transition:opacity .7s cubic-bezier(.16,1,.3,1),transform .7s cubic-bezier(.16,1,.3,1)}
.rv.in{opacity:1;transform:translateY(0)}
.d1{transition-delay:.08s}.d2{transition-delay:.16s}.d3{transition-delay:.24s}

@media(max-width:1100px){.hero__body,.reveal-section__inner,.prob-layout{grid-template-columns:1fr;gap:40px}.spaces-wall{grid-template-columns:repeat(6,1fr)}.sp.c3{grid-column:span 3}.sp.c4{grid-column:span 6}.sp.c6{grid-column:span 6}.prod-grid{grid-template-columns:repeat(2,1fr)}.cases{grid-template-columns:1fr 1fr}.case--main{grid-column:span 2}}
@media(max-width:768px){.hero__body,.inner,.reveal-section__inner,.cta__inner{padding-left:20px;padding-right:20px}.spaces-wall{grid-template-columns:repeat(2,1fr)}.sp{grid-column:span 1!important;grid-row:span 1!important}.cases{grid-template-columns:1fr}.case--main{grid-column:span 1}.prod-grid{grid-template-columns:1fr 1fr}.sec-head{flex-direction:column;gap:16px;margin-bottom:32px}}
</style>
<div id="cd"></div><div id="cr"></div>

<!-- ══ ACT 1 — HERO ══ -->
<section class="hero">
 <div class="hero__bg" aria-hidden="true"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0005_TavaLED_Hinh_Anh.jpg" alt="Phòng họp doanh nghiệp hiện đại" loading="eager"></div>
  <div class="hero__fog" aria-hidden="true"></div>
  <div class="hero__grid" aria-hidden="true"></div>
  <div class="hero__bar" aria-hidden="true"></div>
  <div class="hero__body">
    <div>
      <div class="hero__tag">🏢 Hội họp Doanh nghiệp</div>
      <h1 class="hero__h1">Quyết định lớn<br><em>cần không gian xứng tầm</em></h1>
      <p class="hero__sub">Từ phòng họp 10 người đến hội trường 2.000 chỗ — TavaLED thiết kế giải pháp AV tích hợp giúp mỗi cuộc họp đạt hiệu quả tối đa.</p>
      <div class="hero__acts">
        <a href="#cta" class="btn-p"><svg viewBox="0 0 24 24"><path d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414A1 1 0 0119 9.414V19a2 2 0 01-2 2z"/></svg>Nhận báo giá</a>
        <a href="#spaces" class="btn-g">Xem không gian mẫu →</a>
      </div>
    </div>
      <div class="scene-stats">
        <div class="sstat"><div class="sstat__val"><span class="cnt" data-to="120">0</span><span>+</span></div><div class="sstat__l">Văn phòng</div></div>
        <div class="sstat"><div class="sstat__val"><span class="cnt" data-to="98">0</span><span>%</span></div><div class="sstat__l">Hài lòng</div></div>
        <div class="sstat"><div class="sstat__val"><span class="cnt" data-to="3">0</span><span> ngày</span></div><div class="sstat__l">Lắp đặt xong</div></div>
      </div>
    </div>
  </div>
</section>

<!-- ══ ACT 2 — VẤN ĐỀ ══ -->
<section class="problem">
  <div class="inner">
    <div class="prob-layout">
      <div class="prob-visual rv">
        <div class="meetroom" role="img" aria-label="Phòng họp thiếu chuyên nghiệp">
          <div class="mr-screen"><span class="mr-screen-text">Màn chiếu mờ — không ai nhìn rõ</span></div>
          <div style="position:absolute;left:8%;top:14%;"><span class="problem-tag" style="font-size:8px">Màn chiếu vàng</span></div>
          <div style="position:absolute;right:10%;top:30%;"><span class="problem-tag" style="font-size:8px">Âm thanh rè</span></div>
          <div style="position:absolute;left:20%;bottom:35%;"><span class="problem-tag" style="font-size:8px">Cáp lộn xộn</span></div>
          <div class="mr-table"></div>
          <div class="mr-person" style="left:15%;"></div>
          <div class="mr-person" style="left:28%;"></div>
          <div class="mr-person" style="left:41%;"></div>
          <div class="mr-person" style="left:54%;"></div>
          <div class="mr-person" style="left:67%;"></div>
          <div class="mr-person" style="left:80%;"></div>
        </div>
        <div class="prob-arrow">↓</div>
      </div>
      <div class="prob-text rv d2">
        <div class="ey">Câu chuyện quen thuộc</div>
        <h2 class="sh">Cuộc họp quan trọng —<br><em>thiết bị phá hỏng</em></h2>
        <p style="font-size:14.5px;color:var(--muted);line-height:1.8;margin-bottom:24px">Khách hàng đến thăm văn phòng, đối tác chờ bài thuyết trình, ban giám đốc ngồi sẵn — rồi máy chiếu không kết nối, loa rè, ánh sáng tối mờ.</p>
        <ul class="prob-list">
          <li class="prob-item"><div class="prob-item__ico">📺</div><div><div class="prob-item__title">Hình ảnh mờ nhạt, font chữ không đọc được</div><div class="prob-item__desc">Máy chiếu cũ ≤2.000 lumen không đủ cho phòng họp có ánh sáng tự nhiên</div></div></li>
          <li class="prob-item"><div class="prob-item__ico">🔊</div><div><div class="prob-item__title">Người ngồi cuối không nghe rõ</div><div class="prob-item__desc">Loa để bàn không phân phối âm thanh đều trong phòng họp lớn</div></div></li>
          <li class="prob-item"><div class="prob-item__ico">🔌</div><div><div class="prob-item__title">Kết nối lộn xộn — mỗi laptop một loại cáp</div><div class="prob-item__desc">Mất 5–10 phút kết nối trước mỗi cuộc họp, cáp nằm lộn xộn trên bàn</div></div></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ══ ACT 3 — KHOẢNH KHẮC CHUYỂN ══ -->
<section class="reveal-section">
 <div class="reveal-section__bg"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0006_TavaLED_Hinh_Anh.jpg" alt="" loading="lazy"></div>
  <div class="reveal-section__fog"></div>
  <div class="reveal-section__grid"></div>
  <div class="reveal-section__inner">
    <div class="reveal-metrics rv d2">
      <div class="rmetric"><div class="rmetric__ico">📺</div><div><div class="rmetric__val"><span class="cnt" data-to="120">0</span><span>+</span></div><div class="rmetric__label">Phòng họp đã được trang bị<br>màn hình LED P2–P2.5</div></div></div>
      <div class="rmetric"><div class="rmetric__ico">⚡</div><div><div class="rmetric__val"><span>Chỉ </span><span class="cnt" data-to="3">0</span><span> ngày</span></div><div class="rmetric__label">Lắp đặt hoàn chỉnh không ảnh hưởng<br>lịch làm việc</div></div></div>
      <div class="rmetric"><div class="rmetric__ico">🤝</div><div><div class="rmetric__val"><span class="cnt" data-to="94">0</span><span>%</span></div><div class="rmetric__label">Khách hàng giới thiệu TavaLED<br>cho đối tác khác</div></div></div>
    </div>
  </div>
</section>

<!-- ══ ACT 4 — KHÔNG GIAN MẪU ══ -->
<section class="section" style="background:var(--navy3);padding-bottom:0" id="spaces">
  <div class="inner rv"><div class="sec-head"><div><div class="ey" style="color:rgba(240,90,37,.8)">Các không gian</div><h2 class="sh sh--w">4 loại không gian —<br><em>1 tiêu chuẩn</em></h2></div></div></div>
  <div class="spaces-wall rv d1">
 <div class="sp c4 r2"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0007_TavaLED_Hinh_Anh.jpg" alt="Boardroom" loading="lazy"><div class="sp__over"></div><div class="sp__body"><div class="sp__tag">Boardroom</div><div class="sp__title">Phòng họp Ban lãnh đạo</div><div class="sp__desc">LED P2 · Bảng tương tác · Hội nghị từ xa 4K · Hệ thống điều khiển trung tâm</div></div></div>
 <div class="sp c4"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0008_TavaLED_Hinh_Anh.jpg" alt="Phòng họp lớn" loading="lazy"><div class="sp__over"></div><div class="sp__body"><div class="sp__tag">Meeting Room</div><div class="sp__title">Phòng họp 20–80 người</div><div class="sp__desc">LED P2.5 · Dual screen · Wireless presentation</div></div></div>
 <div class="sp c4"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0009_TavaLED_Hinh_Anh.jpg" alt="Phòng họp nhỏ" loading="lazy"><div class="sp__over"></div><div class="sp__body"><div class="sp__tag">Huddle Room</div><div class="sp__title">Phòng làm việc nhóm nhỏ</div><div class="sp__desc">LED P2 · Plug&Play · Zoom / Teams ready</div></div></div>
 <div class="sp c6"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0010_TavaLED_Hinh_Anh.jpg" alt="Hội trường doanh nghiệp" loading="lazy"><div class="sp__over"></div><div class="sp__body"><div class="sp__tag">Auditorium</div><div class="sp__title">Hội trường doanh nghiệp 200–2.000 chỗ</div><div class="sp__desc">LED P2.5–P3 · Line Array · Moving Head · Stage Management</div></div></div>
 <div class="sp c3"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0011_TavaLED_Hinh_Anh.jpg" alt="Reception" loading="lazy"><div class="sp__over"></div><div class="sp__body"><div class="sp__tag">Reception & Lobby</div><div class="sp__title">Sảnh tiếp khách & Digital Signage</div></div></div>
 <div class="sp c3"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0012_TavaLED_Hinh_Anh.jpg" alt="Training" loading="lazy"><div class="sp__over"></div><div class="sp__body"><div class="sp__tag">Training Room</div><div class="sp__title">Phòng đào tạo & Workshop</div></div></div>
  </div>
</section>

<!-- ══ ACT 5 — SẢN PHẨM ══ -->
<section class="section" style="background:var(--w)">
  <div class="inner">
    <div class="sec-head rv"><div><div class="ey">Sản phẩm gợi ý</div><h2 class="sh">Giải pháp <em>cho từng không gian</em></h2></div></div>
    <div class="prod-tabs rv d1">
      <button class="ptab active" onclick="switchTab(this,'pt-screen')">📺 Màn hình LED</button>
      <button class="ptab" onclick="switchTab(this,'pt-audio')">🔊 Âm thanh</button>
      <button class="ptab" onclick="switchTab(this,'pt-control')">⚙️ Điều khiển</button>
    </div>
    <div class="ptab-panel active" id="pt-screen">
      <div class="prod-grid rv d1">
 <a href="#" class="pcard"><div class="pcard__img"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0013_TavaLED_Hinh_Anh.jpg" alt="" loading="lazy"></div><div class="pcard__body"><div class="pcard__cat">Boardroom</div><div class="pcard__name">LED P2 Indoor 80"–200"</div><div class="pcard__foot"><span class="pcard__spec">P2.0mm</span><span class="pcard__cta">Xem</span></div></div></a>
 <a href="#" class="pcard"><div class="pcard__img"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0014_TavaLED_Hinh_Anh.jpg" alt="" loading="lazy"></div><div class="pcard__body"><div class="pcard__cat">Meeting Room</div><div class="pcard__name">LED P2.5 Meeting Series</div><div class="pcard__foot"><span class="pcard__spec">P2.5mm</span><span class="pcard__cta">Xem</span></div></div></a>
 <a href="#" class="pcard"><div class="pcard__img"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0015_TavaLED_Hinh_Anh.jpg" alt="" loading="lazy"></div><div class="pcard__body"><div class="pcard__cat">Hội trường</div><div class="pcard__name">LED P3 Auditorium Wall</div><div class="pcard__foot"><span class="pcard__spec">P3.0mm</span><span class="pcard__cta">Xem</span></div></div></a>
 <a href="#" class="pcard"><div class="pcard__img"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0016_TavaLED_Hinh_Anh.jpg" alt="" loading="lazy"></div><div class="pcard__body"><div class="pcard__cat">Signage</div><div class="pcard__name">LED P2.5 Digital Signage 55"</div><div class="pcard__foot"><span class="pcard__spec">Signage</span><span class="pcard__cta">Xem</span></div></div></a>
      </div>
    </div>
    <div class="ptab-panel" id="pt-audio">
      <div class="prod-grid">
 <a href="#" class="pcard"><div class="pcard__img"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0017_TavaLED_Hinh_Anh.jpg" alt="" loading="lazy"></div><div class="pcard__body"><div class="pcard__cat">Ceiling Speaker</div><div class="pcard__name">JBL Control 25AV Ceiling</div><div class="pcard__foot"><span class="pcard__spec">8Ω</span><span class="pcard__cta">Xem</span></div></div></a>
 <a href="#" class="pcard"><div class="pcard__img"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0018_TavaLED_Hinh_Anh.jpg" alt="" loading="lazy"></div><div class="pcard__body"><div class="pcard__cat">Conference Mic</div><div class="pcard__name">Shure MXA910 Ceiling Array</div><div class="pcard__foot"><span class="pcard__spec">Beamforming</span><span class="pcard__cta">Xem</span></div></div></a>
 <a href="#" class="pcard"><div class="pcard__img"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0019_TavaLED_Hinh_Anh.jpg" alt="" loading="lazy"></div><div class="pcard__body"><div class="pcard__cat">DSP Processor</div><div class="pcard__name">BSS Soundweb London</div><div class="pcard__foot"><span class="pcard__spec">64x64</span><span class="pcard__cta">Xem</span></div></div></a>
 <a href="#" class="pcard"><div class="pcard__img"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0020_TavaLED_Hinh_Anh.jpg" alt="" loading="lazy"></div><div class="pcard__body"><div class="pcard__cat">Amplifier</div><div class="pcard__name">QSC CX-Q Series Power Amp</div><div class="pcard__foot"><span class="pcard__spec">4CH</span><span class="pcard__cta">Xem</span></div></div></a>
      </div>
    </div>
    <div class="ptab-panel" id="pt-control">
      <div class="prod-grid">
 <a href="#" class="pcard"><div class="pcard__img"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0021_TavaLED_Hinh_Anh.jpg" alt="" loading="lazy"></div><div class="pcard__body"><div class="pcard__cat">Room Control</div><div class="pcard__name">Crestron DM-NVX Series</div><div class="pcard__foot"><span class="pcard__spec">4K60</span><span class="pcard__cta">Xem</span></div></div></a>
 <a href="#" class="pcard"><div class="pcard__img"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0022_TavaLED_Hinh_Anh.jpg" alt="" loading="lazy"></div><div class="pcard__body"><div class="pcard__cat">Touch Panel</div><div class="pcard__name">Crestron TSW-1070 Touch</div><div class="pcard__foot"><span class="pcard__spec">10.1" HD</span><span class="pcard__cta">Xem</span></div></div></a>
 <a href="#" class="pcard"><div class="pcard__img"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0023_TavaLED_Hinh_Anh.jpg" alt="" loading="lazy"></div><div class="pcard__body"><div class="pcard__cat">Wireless Presentation</div><div class="pcard__name">Extron ShareLink 752</div><div class="pcard__foot"><span class="pcard__spec">Wireless</span><span class="pcard__cta">Xem</span></div></div></a>
 <a href="#" class="pcard"><div class="pcard__img"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0024_TavaLED_Hinh_Anh.jpg" alt="" loading="lazy"></div><div class="pcard__body"><div class="pcard__cat">Video Conferencing</div><div class="pcard__name">Poly Studio X70 Teams/Zoom</div><div class="pcard__foot"><span class="pcard__spec">4K UHD</span><span class="pcard__cta">Xem</span></div></div></a>
      </div>
    </div>
  </div>
</section>

<!-- ══ ACT 6 — CASES ══ -->
<section class="section" style="background:var(--light)">
  <div class="inner">
    <div class="sec-head rv"><div><div class="ey">Dự án thực tế</div><h2 class="sh">Văn phòng đã <em>tin tưởng chúng tôi</em></h2></div><a href="/du-an" style="display:inline-flex;align-items:center;gap:7px;font-size:12.5px;font-weight:600;color:var(--navy);text-decoration:none;border-bottom:1.5px solid var(--bdr);padding-bottom:3px">Xem tất cả →</a></div>
    <div class="cases rv d1">
 <a href="#" class="case case--main"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0025_TavaLED_Hinh_Anh.jpg" alt="" loading="lazy"><div class="case__over"></div><div class="case__body"><div class="case__tag">Hà Nội · 2024</div><div class="case__name">Tòa nhà Văn phòng FLC — Boardroom + 24 phòng họp</div><div class="case__specs"><span class="spec">LED P2 Indoor</span><span class="spec">Crestron Control</span><span class="spec">Shure MXA910</span><span class="spec">3 ngày lắp đặt</span></div></div></a>
 <a href="#" class="case"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0026_TavaLED_Hinh_Anh.jpg" alt="" loading="lazy"><div class="case__over"></div><div class="case__body"><div class="case__tag">TP.HCM · 2024</div><div class="case__name">Ngân hàng Techcombank — Hội trường 500 chỗ</div><div class="case__specs"><span class="spec">P2.5mm</span><span class="spec">JBL Line Array</span></div></div></a>
 <a href="#" class="case"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0027_TavaLED_Hinh_Anh.jpg" alt="" loading="lazy"><div class="case__over"></div><div class="case__body"><div class="case__tag">Đà Nẵng · 2023</div><div class="case__name">Khu CNC Danang IT Park — 12 phòng họp</div><div class="case__specs"><span class="spec">P2.0mm</span><span class="spec">Extron</span></div></div></a>
    </div>
  </div>
</section>

<!-- ══ CTA ══ -->
<div class="cta" id="cta">
  <div class="cta__inner">
    <div><h2 class="cta__h">Khảo sát miễn phí —<br><em>báo giá trong 24 giờ</em></h2><p class="cta__sub">Đội kỹ thuật TavaLED đến tận văn phòng khảo sát và tư vấn giải pháp phù hợp ngân sách.</p></div>
    <div class="cta-btns">
      <a href="tel:0936 543 389" class="btn-w"><svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 014.7 12.5a19.79 19.79 0 01-3.07-8.67A2 2 0 013.59 2h3a2 2 0 012 1.72 12 12 0 00.7 2.81 2 2 0 01-.45 2.11L7.91 9.91a16 16 0 006.1 6.1l.96-.96a2 2 0 012.11-.45 12 12 0 002.81.7A2 2 0 0122 16.92z"/></svg>0936 543 389</a>
      <a href="mailto:tuyen.tavaco@gmail.com?subject=Tư vấn phòng họp doanh nghiệp" class="btn-wg">Gửi yêu cầu tư vấn</a>
    </div>
  </div>
</div>

<script>
const cd=document.getElementById('cd'),cr=document.getElementById('cr');let mx=0,my=0,rx=0,ry=0;
window.addEventListener('mousemove',e=>{mx=e.clientX;my=e.clientY},{passive:true});
(function t(){rx+=(mx-rx)*.13;ry+=(my-ry)*.13;cd.style.cssText=`left:${mx}px;top:${my}px`;cr.style.cssText=`left:${rx}px;top:${ry}px`;requestAnimationFrame(t)})();
const obs=new IntersectionObserver(e=>{e.forEach(x=>{if(x.isIntersecting){x.target.classList.add('in');obs.unobserve(x.target)}})},{threshold:.08,rootMargin:'0px 0px -30px 0px'});
document.querySelectorAll('.rv').forEach(el=>obs.observe(el));
function countUp(el,to){let n=0;const s=to/(1600/16);const ti=setInterval(()=>{n=Math.min(n+s,to);el.textContent=Math.floor(n);if(n>=to)clearInterval(ti)},16)}
const co=new IntersectionObserver(e=>{e.forEach(x=>{if(x.isIntersecting){x.target.querySelectorAll('.cnt').forEach(el=>countUp(el,+el.dataset.to));co.unobserve(x.target)}})},{threshold:.35});
document.querySelectorAll('.hero,.reveal-section').forEach(el=>co.observe(el));
function switchTab(btn,id){document.querySelectorAll('.ptab').forEach(b=>b.classList.remove('active'));document.querySelectorAll('.ptab-panel').forEach(p=>p.classList.remove('active'));btn.classList.add('active');document.getElementById(id).classList.add('active')}
</script>


<?php get_footer(); ?>