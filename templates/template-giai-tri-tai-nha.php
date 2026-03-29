<?php
/**
 * Template Name: Trang giải trí tại nhà
 */

get_header(); ?>

<style>
:root{
  --navy:#1c2857;--navy2:#162248;--navy3:#0f1835;
  --o:#f05a25;--odk:#c8451a;--olt:#fff3ee;
  --deep:#0c0c14;--deep2:#080810;
  --w:#fff;--ink:#111827;--mid:#374151;--muted:#6b7280;
  --light:#f9fafb;--bdr:#e5e7eb;
  --ff:'Mona Sans','Mona-Sans',sans-serif;
}
.page-template-giai-tri-tai-nha { font-family:var(--ff);background:var(--deep);color:var(--w);-webkit-font-smoothing:antialiased;overflow-x:hidden; }
#cd,#cr{position:fixed;border-radius:50%;pointer-events:none;z-index:9999;transform:translate(-50%,-50%)}
#cd{width:7px;height:7px;background:var(--o)}
#cr{width:36px;height:36px;border:1.5px solid rgba(240,90,37,.4);transition:width .3s,height .3s,border-color .3s}
body:has(a:hover) #cr,body:has(button:hover) #cr{width:50px;height:50px;border-color:var(--o)}

/* ══ HERO — LUXURY INTIMATE ══ */
.hero{height:100vh;min-height:700px;position:relative;overflow:hidden;display:flex;align-items:center;background:var(--deep2)}
/* ... (remaining styles compressed for brevity or kept) ... */

.hero__bg{position:absolute;inset:0}
.hero__bg img{width:100%;height:100%;object-fit:cover;}
.hero__fog{position:absolute;inset:0;z-index:1;background:linear-gradient(90deg,rgba(12,12,20,.8) 0%,rgba(12,12,20,.4) 40%,transparent 100%)}
.hero__stars{position:absolute;inset:0;z-index:1;background-image:radial-gradient(1.5px 1.5px at 20% 30%,rgba(255,255,255,.3),transparent),radial-gradient(1px 1px at 50% 15%,rgba(255,255,255,.2),transparent),radial-gradient(1.5px 1.5px at 80% 60%,rgba(255,255,255,.25),transparent),radial-gradient(1px 1px at 35% 75%,rgba(255,255,255,.2),transparent),radial-gradient(1.5px 1.5px at 65% 85%,rgba(255,255,255,.15),transparent);pointer-events:none}
.hero__bar{position:absolute;bottom:0;left:0;right:0;height:3px;z-index:3;background:linear-gradient(90deg,var(--o),var(--odk) 45%,rgba(240,90,37,.2))}

.hero__body{position:relative;z-index:2;padding:0 56px;max-width:1320px;margin:0 auto;width:100%;display:flex;flex-direction:column;align-items:center;text-align:center;gap:30px}
.hero__tag{display:inline-flex;align-items:center;gap:9px;font-size:9.5px;font-weight:700;letter-spacing:.24em;text-transform:uppercase;color:var(--o);padding:4px 12px;background:rgba(240,90,37,.1);border:1px solid rgba(240,90,37,.28);border-radius:4px;opacity:0;animation:su .5s .1s ease forwards}
.hero__h1{font-family:var(--ff);font-weight:800;font-size:clamp(2.8rem,5.5vw,5.5rem);letter-spacing:-.07em;color:#fff;line-height:.9;opacity:0;animation:su .9s .25s cubic-bezier(.16,1,.3,1) forwards;margin:0}
.hero__h1 em{font-style:italic;font-weight:300;color:var(--o);display:block;font-size:.75em;margin-top:8px}
.hero__sub{font-size:15px;font-weight:300;color:rgba(255,255,255,.48);line-height:1.85;max-width:600px;margin:0;opacity:0;animation:su .65s .45s ease forwards}
.hero__acts{display:flex;gap:12px;flex-wrap:wrap;justify-content:center;opacity:0;animation:su .6s .62s ease forwards}
.btn-p{display:inline-flex;align-items:center;gap:8px;padding:13px 26px;background:var(--o);color:#fff;font-family:var(--ff);font-size:12.5px;font-weight:700;letter-spacing:.05em;text-transform:uppercase;border-radius:8px;text-decoration:none;box-shadow:0 4px 24px rgba(240,90,37,.4);transition:background .18s,transform .15s}
.btn-p:hover{background:var(--odk);transform:translateY(-2px)}
/* Right — luxury room preview */


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

/* ══ ACT 2 — SPACE OPTIONS ══ */
.space-split{display:grid;grid-template-columns:1fr 1fr;gap:4px}
.space-half{position:relative;overflow:hidden;min-height:580px;cursor:default}
.space-half img{width:100%;height:100%;object-fit:cover;transition:transform .7s cubic-bezier(.16,1,.3,1)}
.space-half:hover img{transform:scale(1.04)}
.space-half__fog{position:absolute;inset:0;background:linear-gradient(180deg,transparent 25%,rgba(12,12,20,.96) 100%)}
.space-half__left-bar{position:absolute;left:0;top:0;bottom:0;width:3px;background:linear-gradient(180deg,transparent,var(--o) 30%,var(--odk) 70%,transparent);opacity:0;transition:opacity .3s}
.space-half:hover .space-half__left-bar{opacity:1}
.space-half__body{position:absolute;bottom:0;left:0;right:0;padding:36px 32px 30px}
.space-half__num{font-family:var(--ff);font-size:5rem;font-weight:800;letter-spacing:-.1em;color:rgba(240,90,37,.12);line-height:1}
.space-half__ico{font-size:32px;margin-bottom:14px}
.space-half__title{font-family:var(--ff);font-weight:800;font-size:1.5rem;letter-spacing:-.05em;color:#fff;margin-bottom:10px}
.space-half__desc{font-size:14px;color:rgba(255,255,255,.48);line-height:1.75;margin-bottom:18px;max-width:360px}
.space-half__specs{display:flex;flex-wrap:wrap;gap:7px}
.shtag{font-size:10px;font-weight:600;padding:3px 10px;border-radius:4px;background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.1);color:rgba(255,255,255,.65)}

/* ══ ACT 3 — STORY ══ */
.story{padding:100px 0;background:var(--navy);position:relative;overflow:hidden}
.story::before{content:'';position:absolute;inset:0;background-image:linear-gradient(rgba(255,255,255,.022) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.022) 1px,transparent 1px);background-size:52px 52px}
.story::after{content:'';position:absolute;bottom:-150px;right:-150px;width:500px;height:500px;border-radius:50%;background:radial-gradient(circle,rgba(240,90,37,.1) 0%,transparent 70%);pointer-events:none}
.story__layout{display:flex;justify-content:center;position:relative;z-index:1}
.story__features{display:flex;flex-direction:column;gap:14px;max-width:800px;width:100%}
.story__feat{display:flex;align-items:flex-start;gap:16px;padding:18px 20px;background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.08);border-radius:10px;transition:background .2s,border-color .2s}
.story__feat:hover{background:rgba(240,90,37,.1);border-color:rgba(240,90,37,.25)}
.story__feat-ico{font-size:22px;flex-shrink:0;margin-top:2px}
.story__feat-title{font-size:13.5px;font-weight:700;color:#fff;margin-bottom:3px}
.story__feat-desc{font-size:12.5px;color:rgba(255,255,255,.44);line-height:1.6}


/* ══ PROCESS ══ */
.process-steps{display:grid;grid-template-columns:repeat(4,1fr);gap:0;position:relative;margin-top:52px}
.process-steps::before{content:'';position:absolute;top:32px;left:12%;right:12%;height:2px;background:linear-gradient(90deg,var(--o),rgba(240,90,37,.15))}
.ps{text-align:center;padding:0 16px;position:relative;z-index:1}
.ps__dot{width:64px;height:64px;border-radius:50%;background:rgba(255,255,255,.05);border:2px solid rgba(255,255,255,.1);display:flex;align-items:center;justify-content:center;margin:0 auto 18px;font-size:18px;transition:border-color .25s,background .25s}
.ps:hover .ps__dot{border-color:var(--o);background:rgba(240,90,37,.1)}
.ps__title{font-size:13px;font-weight:700;color:#fff;margin-bottom:5px}
.ps__desc{font-size:11.5px;color:rgba(255,255,255,.38);line-height:1.6}

/* ══ CTA ══ */
.cta{position:relative;overflow:hidden;padding:88px 0;background:var(--deep2)}
.cta::before{content:'';position:absolute;inset:0;background:radial-gradient(ellipse 80% 60% at 50% 50%,rgba(240,90,37,.12) 0%,transparent 70%)}
.cta__bar{position:absolute;bottom:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--o),var(--odk) 45%,rgba(240,90,37,.2))}
.cta__inner{position:relative;z-index:1;max-width:1320px;margin:0 auto;padding:0 56px;text-align:center}
.cta__h{font-family:var(--ff);font-weight:800;font-size:clamp(2.2rem,5vw,4.5rem);letter-spacing:-.07em;color:#fff;line-height:.95;margin-bottom:18px}
.cta__h em{font-style:italic;font-weight:300;color:var(--o)}
.cta__sub{font-size:15px;color:rgba(255,255,255,.45);line-height:1.8;max-width:480px;margin:0 auto 36px}
.cta-btns{display:flex;gap:14px;justify-content:center;flex-wrap:wrap}
.btn-cta-p{display:inline-flex;align-items:center;gap:8px;padding:14px 32px;background:var(--o);color:#fff;font-family:var(--ff);font-size:13px;font-weight:700;letter-spacing:.05em;text-transform:uppercase;border-radius:8px;text-decoration:none;box-shadow:0 4px 28px rgba(240,90,37,.4);transition:background .18s,transform .15s}
.btn-cta-p:hover{background:var(--odk);transform:translateY(-2px)}
.btn-cta-g{display:inline-flex;align-items:center;gap:8px;padding:13px 24px;background:transparent;border:1.5px solid rgba(255,255,255,.25);color:rgba(255,255,255,.78);font-family:var(--ff);font-size:13px;font-weight:600;text-transform:uppercase;letter-spacing:.04em;border-radius:8px;text-decoration:none;transition:border-color .2s,color .2s}
.btn-cta-g:hover{border-color:rgba(255,255,255,.55);color:#fff}
.btn-cta-g svg{width:13px;height:13px;stroke:currentColor;fill:none;stroke-width:2}
/* Trust badges */
.trust-row{display:flex;justify-content:center;gap:28px;flex-wrap:wrap;margin-top:32px;padding-top:28px;border-top:1px solid rgba(255,255,255,.06)}
.trust-item{display:flex;align-items:center;gap:8px;font-size:12px;color:rgba(255,255,255,.38)}
.trust-item::before{content:'✓';color:var(--o);font-weight:700}

@keyframes su{from{opacity:0;transform:translateY(18px)}to{opacity:1;transform:translateY(0)}}
.rv{opacity:0;transform:translateY(22px);transition:opacity .7s cubic-bezier(.16,1,.3,1),transform .7s cubic-bezier(.16,1,.3,1)}
.rv.in{opacity:1;transform:translateY(0)}
.d1{transition-delay:.08s}.d2{transition-delay:.16s}.d3{transition-delay:.24s}

@media(max-width:1100px){.hero__body,.story__layout{grid-template-columns:1fr;gap:48px}.space-split{grid-template-columns:1fr}.packages{grid-template-columns:1fr}.process-steps{grid-template-columns:repeat(2,1fr)}.process-steps::before{display:none}}
@media(max-width:768px){.hero__body,.inner,.story__layout,.cta__inner{padding-left:16px;padding-right:16px}.space-split{grid-template-columns:1fr;gap:4px}.space-half{min-height:300px!important}.space-half__body{padding:20px 20px 16px}.space-half__title{font-size:1.15rem!important}.hero{min-height:500px}.spec-callouts{grid-template-columns:1fr 1fr}.process-steps{grid-template-columns:1fr 1fr;gap:20px}.sec-head{flex-direction:column;align-items:flex-start;gap:12px;margin-bottom:28px}.sh{font-size:1.8rem}.section{padding:56px 0}.trust-row{gap:12px}}
</style>
</head>
<body>
<div id="cd"></div><div id="cr"></div>

<!-- HERO -->
<section class="hero">
  <div class="hero__bg" aria-hidden="true"><img src="https://tavaled.vn/wp-content/uploads/2026/03/giai-tri-tai-nha-scaled.jpg" alt="Giải trí tại nhà cao cấp" loading="eager"></div>
  <div class="hero__fog" aria-hidden="true"></div>
  <div class="hero__stars" aria-hidden="true"></div>
  <div class="hero__bar" aria-hidden="true"></div>
  <div class="hero__body">
    <div class="hero__tag">🏠 Giải trí Tại nhà</div>
    <h1 class="hero__h1">Không gian giải trí<br><em>đỉnh cao tại nhà</em></h1>
    <p class="hero__sub">Tận hưởng những khoảnh khắc tuyệt vời cùng gia đình và bạn bè trong một không gian sống động, đẳng cấp và mang đậm dấu ấn cá nhân.</p>
    <div class="hero__acts">
      <a href="#cta" class="btn-p">Liên hệ tư vấn</a>
    </div>
  </div>
</section>

<!-- SHOWCASE -->
<section style="background:var(--deep);padding-top:72px;padding-bottom:72px;" id="showcase">
  <div class="inner rv">
    <div class="sec-head"><div><div class="ey">Dự án thực tế</div><h2 class="sh sh--w">Không gian giải trí<br><em>Đẳng cấp</em></h2></div><p class="sd sd--w">Chúng tôi không cố gắng bán cho bạn một danh sách thiết bị. Thực tế chứng minh qua tính thẩm mỹ và trải nghiệm tuyệt vời trong những không gian mà chúng tôi đã thiết kế. Nếu bạn thích một không gian như thế này, hãy liên hệ với chúng tôi!</p></div>
  </div>
  <div class="space-split rv d1">
    <div class="space-half">
      <img src="https://tavaled.vn/wp-content/uploads/2026/03/giai-tri-tai-nha-4-scaled.jpg" alt="Phòng chiếu phim gia đình" loading="lazy">
      <div class="space-half__fog" style="background:linear-gradient(180deg,transparent 60%,rgba(12,12,20,.9) 100%)"></div>
      <div class="space-half__left-bar"></div>
      <div class="space-half__body">
        <div class="space-half__title" style="margin-bottom:0; font-size:1.4rem;">Phòng chiếu phim riêng tư</div>
      </div>
    </div>
    <div class="space-half">
      <img src="https://tavaled.vn/wp-content/uploads/2026/03/giai-tri-tai-nha-3-scaled.jpg" alt="Karaoke gia đình cao cấp" loading="lazy">
      <div class="space-half__fog" style="background:linear-gradient(180deg,transparent 60%,rgba(12,12,20,.9) 100%)"></div>
      <div class="space-half__left-bar"></div>
      <div class="space-half__body">
        <div class="space-half__title" style="margin-bottom:0; font-size:1.4rem;">Karaoke gia đình cao cấp</div>
      </div>
    </div>
    <div class="space-half" style="grid-column: 1 / -1; min-height: 480px; margin-top: 4px;">
      <img src="https://tavaled.vn/wp-content/uploads/2026/03/giai-tri-tai-nha-2-scaled.jpg" alt="Không gian đa năng chung" loading="lazy">
      <div class="space-half__fog" style="background:linear-gradient(180deg,transparent 60%,rgba(12,12,20,.9) 100%)"></div>
      <div class="space-half__left-bar"></div>
      <div class="space-half__body">
        <div class="space-half__title" style="margin-bottom:0; font-size:1.4rem;">Không gian giải trí đa năng</div>
      </div>
    </div>
  </div>
</section>


<!-- PROCESS -->
<section class="section" style="background:var(--navy2)">
  <div class="inner">
    <div class="sec-head rv"><div><div class="ey">Quy trình thiết kế</div><h2 class="sh sh--w">Từ ý tưởng đến<br><em>lần chiếu phim đầu tiên</em></h2></div></div>
    <div class="process-steps rv d1">
      <div class="ps"><div class="ps__dot">🏠</div><div class="ps__title">Khảo sát không gian</div><div class="ps__desc">Đo đạc phòng, đánh giá âm học, tư vấn vật liệu tường phù hợp</div></div>
      <div class="ps"><div class="ps__dot">🎨</div><div class="ps__title">Thiết kế 3D concept</div><div class="ps__desc">Phối cảnh 3D toàn phòng, vị trí từng thiết bị, màu ánh sáng</div></div>
      <div class="ps"><div class="ps__dot">🔧</div><div class="ps__title">Thi công & Lắp đặt</div><div class="ps__desc">Đi dây âm tường, lắp thiết bị, căn chỉnh âm học chuyên nghiệp</div></div>
      <div class="ps"><div class="ps__dot">🎬</div><div class="ps__title">Bàn giao & Hướng dẫn</div><div class="ps__desc">Demo toàn bộ tính năng, cài đặt app điều khiển, hướng dẫn sử dụng</div></div>
    </div>
  </div>
</section>

<!-- CTA -->
<div class="cta" id="cta">
  <div class="cta__bar"></div>
  <div class="cta__inner">
    <h2 class="cta__h">Thiết kế phòng<br><em>giải trí trong mơ</em></h2>
    <p class="cta__sub">Khảo sát và thiết kế concept 3D miễn phí. Chúng tôi đến tận nơi, không ràng buộc.</p>
    <div class="cta-btns">
      <a href="tel:0936 543 389" class="btn-cta-p">📞 0936 543 389</a>
      <a href="mailto:tuyen.tavaco@gmail.com?subject=Tư vấn Home Theater - Karaoke gia đình" class="btn-cta-g">
        <svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        Gửi yêu cầu tư vấn
      </a>
    </div>
    <div class="trust-row">
      <span class="trust-item">Khảo sát miễn phí</span>
      <span class="trust-item">Thiết kế 3D không tính phí</span>
      <span class="trust-item">Bảo hành 24 tháng tại nhà</span>
      <span class="trust-item">Hỗ trợ kỹ thuật 24/7</span>
    </div>
  </div>
</div>

<script>
const cd=document.getElementById('cd'),cr=document.getElementById('cr');let mx=0,my=0,rx=0,ry=0;
window.addEventListener('mousemove',e=>{mx=e.clientX;my=e.clientY},{passive:true});
(function t(){rx+=(mx-rx)*.13;ry+=(my-ry)*.13;cd.style.cssText=`left:${mx}px;top:${my}px`;cr.style.cssText=`left:${rx}px;top:${ry}px`;requestAnimationFrame(t)})();
const obs=new IntersectionObserver(e=>{e.forEach(x=>{if(x.isIntersecting){x.target.classList.add('in');obs.unobserve(x.target)}})},{threshold:.08,rootMargin:'0px 0px -30px 0px'});
document.querySelectorAll('.rv').forEach(el=>obs.observe(el));
</script>

<?php get_footer(); ?>