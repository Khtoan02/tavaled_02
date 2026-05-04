<?php
/**
 * Template Name: Trang minh bạch năng lực
 */

get_header(); ?>

<style>
.page-template-template-nang-luc-php *, .page-template-template-nang-luc-php *::before, .page-template-template-nang-luc-php *::after{box-sizing:border-box;margin:0;padding:0}

:root{
  --navy:#1c2857;--navy2:#162248;--navy3:#0f1835;
  --o:#f05a25;--odk:#c8451a;--olt:#fff3ee;
  --green:#16a34a;--glt:#f0fdf4;
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

/* ── HERO ── */
.hero{background:var(--navy);padding:88px 0 72px;position:relative;overflow:hidden}
.hero::before{content:'';position:absolute;inset:0;background-image:linear-gradient(rgba(255,255,255,.022) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.022) 1px,transparent 1px);background-size:52px 52px}
.hero::after{content:'';position:absolute;top:0;right:0;bottom:0;width:50%;background:linear-gradient(90deg,transparent,rgba(240,90,37,.06));pointer-events:none}
.hero__bar{position:absolute;bottom:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--o),var(--odk) 45%,rgba(240,90,37,.2));z-index:2}
.inner{max-width:1320px;margin:0 auto;padding:0 56px;position:relative;z-index:1}
.hero__inner{display:grid;grid-template-columns:1fr 1fr;gap:72px;align-items:center}
.hero__tag{display:inline-flex;align-items:center;gap:9px;font-size:9.5px;font-weight:700;letter-spacing:.24em;text-transform:uppercase;color:var(--o);padding:4px 12px;background:rgba(240,90,37,.1);border:1px solid rgba(240,90,37,.28);border-radius:4px;margin-bottom:20px;opacity:0;animation:su .5s .1s ease forwards}
.hero__h1{font-family:var(--ff);font-weight:800;font-size:clamp(2.6rem,5vw,5rem);letter-spacing:-.06em;color:#fff;line-height:.93;margin-bottom:18px;opacity:0;animation:su .8s .25s cubic-bezier(.16,1,.3,1) forwards}
.hero__h1 em{font-style:italic;font-weight:300;color:var(--o)}
.hero__desc{font-size:14.5px;font-weight:300;color:rgba(255,255,255,.5);line-height:1.85;opacity:0;animation:su .6s .42s ease forwards}
/* verify badge */
.verify-badge{background:rgba(22,163,74,.12);border:1px solid rgba(22,163,74,.3);border-radius:8px;padding:14px 18px;margin-top:22px;display:flex;align-items:center;gap:12px;opacity:0;animation:su .5s .58s ease forwards}
.verify-badge__ico{font-size:20px}
.verify-badge__text{font-size:13px;color:rgba(255,255,255,.6);line-height:1.55}
.verify-badge__text strong{color:#4ade80}
/* big numbers right */
.hero__nums{display:grid;grid-template-columns:1fr 1fr;gap:2px;opacity:0;animation:su .7s .35s ease forwards}
.hnum{background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.08);padding:24px 22px;text-align:center;transition:background .2s}
.hnum:hover{background:rgba(240,90,37,.08)}
.hnum__val{font-family:var(--ff);font-size:2.6rem;font-weight:800;letter-spacing:-.07em;color:#fff;line-height:1}
.hnum__val span{color:var(--o)}
.hnum__label{font-size:11px;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:rgba(255,255,255,.35);margin-top:6px}

/* ── SECTION SHARED ── */
.section{padding:88px 0}
.ey{display:inline-flex;align-items:center;gap:8px;font-size:9.5px;font-weight:700;letter-spacing:.22em;text-transform:uppercase;color:var(--o);margin-bottom:12px}
.ey::before{content:'';display:block;width:22px;height:2px;background:var(--o);border-radius:2px}
.sh{font-family:var(--ff);font-weight:800;font-size:clamp(1.9rem,3.5vw,3rem);letter-spacing:-.05em;color:var(--navy);line-height:1.04;margin-bottom:12px}
.sh em{font-style:italic;font-weight:300;color:var(--o)}
.sh--w{color:#fff}
.sd{font-size:14.5px;color:var(--muted);line-height:1.8;max-width:500px}
.sec-head{display:flex;align-items:flex-end;justify-content:space-between;gap:32px;margin-bottom:52px;flex-wrap:wrap}

/* ── PROJECT PROOF ── */
.proof-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:4px}
.proof-card{background:var(--navy3);position:relative;overflow:hidden;min-height:300px}
.proof-card img{width:100%;height:100%;object-fit:cover;transition:filter .5s,transform .7s cubic-bezier(.16,1,.3,1)}
.proof-card:hover img{transform:scale(1.05)}
.proof-card__over{position:absolute;inset:0;background:linear-gradient(180deg,transparent 30%,rgba(15,24,53,.95) 100%)}
.proof-card__body{position:absolute;bottom:0;left:0;right:0;padding:24px 22px 20px}
.proof-card__num{font-family:var(--ff);font-size:2.4rem;font-weight:800;letter-spacing:-.07em;color:#fff;line-height:1}
.proof-card__num span{color:var(--o)}
.proof-card__label{font-size:11.5px;font-weight:600;color:rgba(255,255,255,.5);margin-top:4px;letter-spacing:.04em}
.proof-card__sub{font-size:12px;color:rgba(255,255,255,.3);margin-top:3px;line-height:1.5}

/* ── CAPABILITY TABLE ── */
.cap-layout{display:grid;grid-template-columns:1.4fr 1fr;gap:4px}
.cap-panel{background:var(--w);border:1.5px solid var(--bdr);padding:36px}
.cap-panel--dark{background:var(--navy);border-color:var(--navy)}
.cap-title{font-family:var(--ff);font-weight:800;font-size:1.1rem;letter-spacing:-.03em;color:var(--navy);margin-bottom:22px;display:flex;align-items:center;gap:10px}
.cap-panel--dark .cap-title{color:#fff}
.cap-title-dot{width:8px;height:8px;border-radius:50%;background:var(--o);flex-shrink:0}
.cap-table{width:100%;border-collapse:collapse;font-size:13.5px}
.cap-table tr{border-bottom:1px solid var(--bdr)}
.cap-panel--dark .cap-table tr{border-color:rgba(255,255,255,.07)}
.cap-table tr:last-child{border-bottom:none}
.cap-table td{padding:11px 0;vertical-align:top}
.cap-table td:first-child{color:var(--muted);font-weight:500;width:45%;padding-right:12px}
.cap-panel--dark .cap-table td:first-child{color:rgba(255,255,255,.38)}
.cap-table td:last-child{font-weight:700;color:var(--navy)}
.cap-panel--dark .cap-table td:last-child{color:#fff}
.cap-table td:last-child .hl{color:var(--o)}

/* ── PARTNER LOGOS ── */
.partners-wall{display:grid;grid-template-columns:repeat(6,1fr);gap:2px}
.partner-cell{background:var(--light);border:1.5px solid var(--bdr);padding:24px 16px;text-align:center;transition:background .2s,border-color .2s}
.partner-cell:hover{background:var(--olt);border-color:rgba(240,90,37,.25)}
.partner-cell__logo{font-size:24px;margin-bottom:8px}
.partner-cell__name{font-size:12px;font-weight:700;color:var(--navy);margin-bottom:3px}
.partner-cell__type{font-size:10.5px;color:var(--muted)}
.partner-cell--auth{border-top:3px solid var(--o)}
.auth-badge{display:inline-block;font-size:8.5px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;padding:2px 7px;border-radius:3px;background:var(--o);color:#fff;margin-top:6px}

/* ── PROJECT MAP ── */
.project-map{background:var(--navy3);padding:72px 0;position:relative;overflow:hidden}
.project-map::before{content:'';position:absolute;inset:0;background-image:linear-gradient(rgba(255,255,255,.02) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.02) 1px,transparent 1px);background-size:52px 52px}
.regions{display:grid;grid-template-columns:repeat(3,1fr);gap:4px;margin-top:52px}
.region{background:rgba(255,255,255,.04);border:1px solid rgba(255,255,255,.08);padding:28px;transition:background .2s,border-color .2s}
.region:hover{background:rgba(240,90,37,.08);border-color:rgba(240,90,37,.25)}
.region__flag{font-size:20px;margin-bottom:12px}
.region__name{font-size:10.5px;font-weight:700;letter-spacing:.16em;text-transform:uppercase;color:rgba(255,255,255,.4);margin-bottom:8px}
.region__num{font-family:var(--ff);font-size:2.8rem;font-weight:800;letter-spacing:-.07em;color:#fff;line-height:1;margin-bottom:6px}
.region__num span{color:var(--o)}
.region__provinces{font-size:12px;color:rgba(255,255,255,.35);line-height:1.65}

/* ── FINANCIAL CAPACITY ── */
.finance-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:4px}
.fin-card{background:var(--navy);padding:28px 22px;text-align:center;transition:background .2s}
.fin-card:hover{background:rgba(240,90,37,.08)}
.fin-card__ico{font-size:24px;margin-bottom:12px}
.fin-card__val{font-family:var(--ff);font-size:1.8rem;font-weight:800;letter-spacing:-.06em;color:#fff;line-height:1;margin-bottom:6px}
.fin-card__val span{color:var(--o)}
.fin-card__label{font-size:12px;font-weight:600;color:rgba(255,255,255,.45);margin-bottom:4px}
.fin-card__note{font-size:11px;color:rgba(255,255,255,.25);line-height:1.5}

/* ── VERIFICATION CTA ── */
.verify-cta{padding:72px 0;background:var(--light);border-top:1px solid var(--bdr)}
.verify-cta__inner{max-width:1320px;margin:0 auto;padding:0 56px;display:grid;grid-template-columns:1fr 1fr;gap:64px;align-items:center}
.verify-cta__h{font-family:var(--ff);font-weight:800;font-size:clamp(1.8rem,3vw,2.8rem);letter-spacing:-.05em;color:var(--navy);line-height:1.04}
.verify-cta__h em{font-style:italic;font-weight:300;color:var(--o)}
.verify-cta__sub{font-size:14px;color:var(--muted);line-height:1.8;margin-top:12px}
.verify-options{display:flex;flex-direction:column;gap:12px}
.verify-opt{display:flex;align-items:center;gap:16px;padding:18px 20px;background:var(--w);border:2px solid var(--bdr);border-radius:10px;text-decoration:none;transition:border-color .2s,background .2s,padding-left .2s}
.verify-opt:hover{border-color:rgba(28,40,87,.25);background:var(--w);padding-left:26px}
.verify-opt__ico{width:42px;height:42px;border-radius:10px;background:var(--olt);border:1px solid rgba(240,90,37,.2);display:flex;align-items:center;justify-content:center;flex-shrink:0;font-size:18px}
.verify-opt__title{font-size:13.5px;font-weight:700;color:var(--navy);margin-bottom:2px}
.verify-opt__sub{font-size:11.5px;color:var(--muted)}
.verify-opt__arr{margin-left:auto;width:16px;height:16px;stroke:var(--muted);fill:none;stroke-width:2;flex-shrink:0;transition:stroke .2s,transform .2s}
.verify-opt:hover .verify-opt__arr{stroke:var(--o);transform:translateX(4px)}

@keyframes su{from{opacity:0;transform:translateY(18px)}to{opacity:1;transform:translateY(0)}}
.rv{opacity:0;transform:translateY(22px);transition:opacity .7s cubic-bezier(.16,1,.3,1),transform .7s cubic-bezier(.16,1,.3,1)}
.rv.in{opacity:1;transform:translateY(0)}
.d1{transition-delay:.08s}.d2{transition-delay:.16s}.d3{transition-delay:.24s}.d4{transition-delay:.32s}

@media(max-width:1100px){.hero__inner{grid-template-columns:1fr}.hero__nums{max-width:480px}.proof-grid{grid-template-columns:1fr 1fr}.cap-layout{grid-template-columns:1fr}.partners-wall{grid-template-columns:repeat(3,1fr)}.regions{grid-template-columns:1fr}.finance-grid{grid-template-columns:repeat(2,1fr)}.verify-cta__inner{grid-template-columns:1fr;gap:40px}}
@media(max-width:768px){.inner,.verify-cta__inner{padding-left:20px;padding-right:20px}.proof-grid{grid-template-columns:1fr}.partners-wall{grid-template-columns:repeat(2,1fr)}.sec-head{flex-direction:column;gap:16px;margin-bottom:32px}.hero__nums{grid-template-columns:1fr 1fr}.finance-grid{grid-template-columns:1fr 1fr}}
</style>
<div id="cd"></div>
<div id="cr"></div>

<!-- HERO -->
<section class="hero">
  <div class="hero__bar"></div>
  <div class="inner">
    <div class="hero__inner">
      <div>
        <div class="hero__tag">Minh bạch năng lực</div>
        <h1 class="hero__h1">Không hứa suông —<br><em>chứng minh bằng số</em></h1>
        <p class="hero__desc">TavaLED công khai toàn bộ năng lực thực tế. Mỗi con số đều có nguồn gốc, mỗi tuyên bố đều có thể kiểm chứng độc lập. Không làm đẹp, không phóng đại.</p>
        <div class="verify-badge">
          <span class="verify-badge__ico">✅</span>
          <p class="verify-badge__text"><strong>Cam kết kiểm chứng độc lập:</strong> Bất kỳ thông tin nào trên trang này đều có thể được xác minh bởi bên thứ ba. Liên hệ chúng tôi để nhận tài liệu gốc.</p>
        </div>
      </div>
      <div class="hero__nums">
        <div class="hnum"><div class="hnum__val"><span class="cnt" data-to="500">0</span><span>+</span></div><div class="hnum__label">Dự án hoàn thành</div></div>
        <div class="hnum"><div class="hnum__val"><span class="cnt" data-to="10">0</span><span>+</span></div><div class="hnum__label">Năm hoạt động</div></div>
        <div class="hnum"><div class="hnum__val"><span class="cnt" data-to="45">0</span><span>+</span></div><div class="hnum__label">Nhân sự toàn thời gian</div></div>
        <div class="hnum"><div class="hnum__val"><span class="cnt" data-to="15">0</span><span>+</span></div><div class="hnum__label">Đối tác nhà sản xuất</div></div>
      </div>
    </div>
  </div>
</section>

<!-- PROJECT PROOF -->
<section class="section" style="background:var(--navy3);padding-bottom:0;padding-top:72px">
  <div class="inner rv">
    <div class="sec-head">
      <div>
        <div class="ey" style="color:rgba(240,90,37,.8)">Dự án thực tế</div>
        <h2 class="sh sh--w">500+ công trình —<br><em>có thể tra cứu</em></h2>
      </div>
      <p class="sd" style="color:rgba(255,255,255,.4)">Danh sách dự án có thể cung cấp theo yêu cầu. Khách hàng tham khảo có thể liên hệ trực tiếp với chủ đầu tư để xác minh.</p>
    </div>
  </div>
  <div class="proof-grid rv d1">
    <div class="proof-card">
 <img src="https://tavaled.vn/wp-content/uploads/2026/03/0010_TavaLED_Hinh_Anh.jpg" alt="">
      <div class="proof-card__over"></div>
      <div class="proof-card__body">
        <div class="proof-card__num"><span class="cnt" data-to="150">0</span><span>+</span></div>
        <div class="proof-card__label">Dự án Giáo dục</div>
        <div class="proof-card__sub">Trường học, đại học, hội trường học đường</div>
      </div>
    </div>
    <div class="proof-card">
 <img src="https://tavaled.vn/wp-content/uploads/2026/03/0011_TavaLED_Hinh_Anh.jpg" alt="">
      <div class="proof-card__over"></div>
      <div class="proof-card__body">
        <div class="proof-card__num"><span class="cnt" data-to="120">0</span><span>+</span></div>
        <div class="proof-card__label">Dự án Hội trường & Sự kiện</div>
        <div class="proof-card__sub">Trung tâm hội nghị, sân khấu, concert</div>
      </div>
    </div>
    <div class="proof-card">
 <img src="https://tavaled.vn/wp-content/uploads/2026/03/0012_TavaLED_Hinh_Anh.jpg" alt="">
      <div class="proof-card__over"></div>
      <div class="proof-card__body">
        <div class="proof-card__num"><span class="cnt" data-to="230">0</span><span>+</span></div>
        <div class="proof-card__label">Dự án Thương mại & Quảng cáo</div>
        <div class="proof-card__sub">Billboard, TTTM, showroom, khách sạn</div>
      </div>
    </div>
  </div>
</section>

<!-- CAPABILITY TABLE -->
<section class="section" style="background:var(--light)">
  <div class="inner">
    <div class="sec-head rv">
      <div>
        <div class="ey">Năng lực thực hiện</div>
        <h2 class="sh">Những gì <em>chúng tôi thực sự có thể làm</em></h2>
      </div>
    </div>
    <div class="cap-layout rv d1">
      <div class="cap-panel">
        <div class="cap-title"><span class="cap-title-dot"></span>Quy mô dự án có thể đảm nhận</div>
        <table class="cap-table">
          <tr><td>Giá trị dự án nhỏ nhất</td><td>Từ <span class="hl">20 triệu đồng</span></td></tr>
          <tr><td>Giá trị dự án lớn nhất đã thực hiện</td><td><span class="hl">18 tỷ đồng</span> — Hội trường QG</td></tr>
          <tr><td>Số dự án đồng thời tối đa</td><td><span class="hl">15 dự án</span> cùng lúc</td></tr>
          <tr><td>Thời gian triển khai tối thiểu</td><td>1 ngày (dự án nhỏ)</td></tr>
          <tr><td>Diện tích màn hình LED lớn nhất</td><td><span class="hl">450m²</span> — 1 công trình</td></tr>
          <tr><td>Công suất âm thanh hệ thống lớn nhất</td><td><span class="hl">80.000W</span> — 1 sự kiện</td></tr>
          <tr><td>Số người có thể phục vụ đồng thời</td><td>Sự kiện đến <span class="hl">50.000 người</span></td></tr>
        </table>
      </div>
      <div class="cap-panel cap-panel--dark">
        <div class="cap-title"><span class="cap-title-dot"></span>Năng lực vận hành</div>
        <table class="cap-table">
          <tr><td>Nhân sự kỹ thuật</td><td>45+ người</td></tr>
          <tr><td>Kho vật tư HN + HCM</td><td>2.400 m²</td></tr>
          <tr><td>Xe chuyên dụng</td><td>8 xe tải kỹ thuật</td></tr>
          <tr><td>Tỉnh thành phủ sóng</td><td>63/63 tỉnh</td></tr>
          <tr><td>Đối tác kỹ thuật địa phương</td><td>18 tỉnh</td></tr>
          <tr><td>Thời gian phản hồi sự cố</td><td>4h (HN/HCM)</td></tr>
          <tr><td>Thời gian bảo hành thiết bị</td><td>24 tháng</td></tr>
        </table>
      </div>
    </div>
  </div>
</section>

<!-- PARTNER LOGOS -->
<section class="section" style="background:var(--w);padding-top:0">
  <div class="inner rv" style="padding-top:88px">
    <div class="sec-head">
      <div>
        <div class="ey">Đối tác nhà sản xuất</div>
        <h2 class="sh">15 thương hiệu —<br><em>phân phối chính hãng</em></h2>
      </div>
      <p class="sd">Mỗi thương hiệu đều có hợp đồng phân phối chính thức. Khách hàng có thể yêu cầu xem hợp đồng đối tác để xác minh.</p>
    </div>
  </div>
  <div style="max-width:1320px;margin:0 auto;padding:0 56px">
    <div class="partners-wall rv d1">
      <div class="partner-cell partner-cell--auth"><div class="partner-cell__logo">🖥️</div><div class="partner-cell__name">Absen</div><div class="partner-cell__type">LED Indoor/COB</div><div><span class="auth-badge">Platinum Dealer</span></div></div>
      <div class="partner-cell partner-cell--auth"><div class="partner-cell__logo">📺</div><div class="partner-cell__name">Novastar</div><div class="partner-cell__type">LED Controller</div><div><span class="auth-badge">Authorized</span></div></div>
      <div class="partner-cell partner-cell--auth"><div class="partner-cell__logo">🖥️</div><div class="partner-cell__name">Leyard</div><div class="partner-cell__type">LED Display</div><div><span class="auth-badge">Authorized</span></div></div>
      <div class="partner-cell partner-cell--auth"><div class="partner-cell__logo">🔊</div><div class="partner-cell__name">JBL</div><div class="partner-cell__type">Pro Audio</div><div><span class="auth-badge">Authorized</span></div></div>
      <div class="partner-cell partner-cell--auth"><div class="partner-cell__logo">🎛️</div><div class="partner-cell__name">Yamaha</div><div class="partner-cell__type">Pro Audio Console</div><div><span class="auth-badge">Dealer</span></div></div>
      <div class="partner-cell partner-cell--auth"><div class="partner-cell__logo">🎤</div><div class="partner-cell__name">Shure</div><div class="partner-cell__type">Microphone</div><div><span class="auth-badge">Authorized</span></div></div>
      <div class="partner-cell"><div class="partner-cell__logo">💡</div><div class="partner-cell__name">Robe</div><div class="partner-cell__type">Moving Head Lighting</div></div>
      <div class="partner-cell"><div class="partner-cell__logo">🌟</div><div class="partner-cell__name">Martin</div><div class="partner-cell__type">Stage Lighting</div></div>
      <div class="partner-cell"><div class="partner-cell__logo">⚡</div><div class="partner-cell__name">Ayrton</div><div class="partner-cell__type">LED Fixture</div></div>
      <div class="partner-cell"><div class="partner-cell__logo">🔋</div><div class="partner-cell__name">QSC</div><div class="partner-cell__type">Power Amplifier</div></div>
      <div class="partner-cell"><div class="partner-cell__logo">📡</div><div class="partner-cell__name">Extron</div><div class="partner-cell__type">AV Switching</div></div>
      <div class="partner-cell"><div class="partner-cell__logo">🎚️</div><div class="partner-cell__name">BSS Audio</div><div class="partner-cell__type">DSP Processor</div></div>
    </div>
  </div>
</section>

<!-- PROJECT MAP -->
<section class="project-map">
  <div class="inner">
    <div class="sec-head rv">
      <div>
        <div class="ey" style="color:rgba(240,90,37,.8)">Phân bố địa lý</div>
        <h2 class="sh sh--w">63 tỉnh thành —<br><em>không vùng trắng</em></h2>
      </div>
    </div>
    <div class="regions rv d1">
      <div class="region">
        <div class="region__flag">🔴</div>
        <div class="region__name">Miền Bắc — Văn phòng Hà Nội</div>
        <div class="region__num"><span class="cnt" data-to="220">0</span><span>+</span></div>
        <div class="region__provinces">28 tỉnh thành — Hà Nội, Hải Phòng, Quảng Ninh, Hải Dương, Bắc Ninh, Hưng Yên và 22 tỉnh phía Bắc</div>
      </div>
      <div class="region">
        <div class="region__flag">🟡</div>
        <div class="region__name">Miền Trung — Văn phòng Đà Nẵng</div>
        <div class="region__num"><span class="cnt" data-to="95">0</span><span>+</span></div>
        <div class="region__provinces">16 tỉnh thành — Đà Nẵng, Huế, Quảng Nam, Quảng Ngãi, Bình Định, Phú Yên và 10 tỉnh Bắc–Trung Bộ</div>
      </div>
      <div class="region">
        <div class="region__flag">🟢</div>
        <div class="region__name">Miền Nam — Văn phòng TP.HCM</div>
        <div class="region__num"><span class="cnt" data-to="185">0</span><span>+</span></div>
        <div class="region__provinces">19 tỉnh thành — TP.HCM, Bình Dương, Đồng Nai, Long An, Vũng Tàu và 14 tỉnh đồng bằng Sông Cửu Long</div>
      </div>
    </div>
  </div>
</section>

<!-- FINANCIAL CAPACITY -->
<section class="section" style="background:var(--navy);padding:72px 0">
  <div class="inner rv">
    <div class="sec-head">
      <div>
        <div class="ey" style="color:rgba(240,90,37,.8)">Năng lực tài chính</div>
        <h2 class="sh sh--w">Đủ năng lực <em>cho mọi quy mô dự án</em></h2>
      </div>
    </div>
  </div>
  <div style="max-width:1320px;margin:0 auto">
    <div class="finance-grid rv d1">
      <div class="fin-card"><div class="fin-card__ico">🏦</div><div class="fin-card__val">50<span>+</span></div><div class="fin-card__label">Tỷ đồng vốn điều lệ</div><div class="fin-card__note">Thông tin đăng ký doanh nghiệp công khai tại ĐKKD</div></div>
      <div class="fin-card"><div class="fin-card__ico">📦</div><div class="fin-card__val">30<span>+</span></div><div class="fin-card__label">Tỷ đồng hàng tồn kho</div><div class="fin-card__note">Vật tư dự phòng sẵn sàng triển khai tại 2 kho HN & HCM</div></div>
      <div class="fin-card"><div class="fin-card__ico">🤝</div><div class="fin-card__val">18<span> tỷ</span></div><div class="fin-card__label">Dự án lớn nhất đã thực hiện</div><div class="fin-card__note">Hội trường Quốc gia, Hà Nội — 2023</div></div>
      <div class="fin-card"><div class="fin-card__ico">📈</div><div class="fin-card__val">+30<span>%</span></div><div class="fin-card__label">Tăng trưởng doanh thu/năm</div><div class="fin-card__note">Trung bình 3 năm gần nhất (2022–2024)</div></div>
    </div>
  </div>
</section>

<!-- VERIFICATION CTA -->
<div class="verify-cta">
  <div class="verify-cta__inner">
    <div class="rv">
      <div class="ey">Kiểm chứng độc lập</div>
      <h2 class="verify-cta__h">Hãy kiểm tra<br><em>trước khi tin</em></h2>
      <p class="verify-cta__sub">Chúng tôi khuyến khích bạn xác minh độc lập. Không có gì chúng tôi công bố mà chúng tôi không thể chứng minh bằng tài liệu gốc.</p>
    </div>
    <div class="verify-options rv d1">
      <a href="mailto:tuyen.tavaco@gmail.com?subject=Yêu cầu tài liệu năng lực" class="verify-opt">
        <div class="verify-opt__ico">📋</div>
        <div><div class="verify-opt__title">Nhận hồ sơ năng lực đầy đủ</div><div class="verify-opt__sub">Profile, chứng nhận, danh sách dự án tham chiếu</div></div>
        <svg class="verify-opt__arr" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
      </a>
      <a href="mailto:tuyen.tavaco@gmail.com?subject=Yêu cầu thăm kho và văn phòng" class="verify-opt">
        <div class="verify-opt__ico">🏭</div>
        <div><div class="verify-opt__title">Thăm kho & văn phòng</div><div class="verify-opt__sub">Kiểm tra thực địa kho hàng và đội ngũ của chúng tôi</div></div>
        <svg class="verify-opt__arr" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
      </a>
      <a href="mailto:tuyen.tavaco@gmail.com?subject=Yêu cầu liên hệ khách hàng tham chiếu" class="verify-opt">
        <div class="verify-opt__ico">📞</div>
        <div><div class="verify-opt__title">Liên hệ khách hàng tham chiếu</div><div class="verify-opt__sub">Nói chuyện trực tiếp với khách hàng đã dùng dịch vụ</div></div>
        <svg class="verify-opt__arr" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
      </a>
      <a href="https://dichvucong.gov.vn" target="_blank" rel="noopener" class="verify-opt">
        <div class="verify-opt__ico">🏛️</div>
        <div><div class="verify-opt__title">Tra cứu thông tin pháp nhân</div><div class="verify-opt__sub">Cổng dịch vụ công quốc gia — dichvucong.gov.vn</div></div>
        <svg class="verify-opt__arr" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
      </a>
    </div>
  </div>
</div>

<script>
const cd=document.getElementById('cd'),cr=document.getElementById('cr');
let mx=0,my=0,rx=0,ry=0;
window.addEventListener('mousemove',e=>{mx=e.clientX;my=e.clientY},{passive:true});
(function t(){rx+=(mx-rx)*.13;ry+=(my-ry)*.13;cd.style.cssText=`left:${mx}px;top:${my}px`;cr.style.cssText=`left:${rx}px;top:${ry}px`;requestAnimationFrame(t)})();
const obs=new IntersectionObserver(e=>{e.forEach(x=>{if(x.isIntersecting){x.target.classList.add('in');obs.unobserve(x.target)}})},{threshold:.08,rootMargin:'0px 0px -30px 0px'});
document.querySelectorAll('.rv').forEach(el=>obs.observe(el));
function countUp(el,to){let n=0;const s=to/(1600/16);const t=setInterval(()=>{n=Math.min(n+s,to);el.textContent=Math.floor(n);if(n>=to)clearInterval(t)},16)}
const co=new IntersectionObserver(e=>{e.forEach(x=>{if(x.isIntersecting){x.target.querySelectorAll('.cnt').forEach(el=>countUp(el,+el.dataset.to));co.unobserve(x.target)}})},{threshold:.3});
document.querySelectorAll('.hero,.proof-grid,.regions,.finance-grid').forEach(el=>co.observe(el));
</script>


<?php get_footer(); ?>