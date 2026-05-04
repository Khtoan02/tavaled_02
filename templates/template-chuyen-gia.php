<?php
/**
 * Template Name: Trang chuyên gia
 */

get_header(); ?>

<style>
.page-template-template-chuyen-gia-php *, .page-template-template-chuyen-gia-php *::before, .page-template-template-chuyen-gia-php *::after{box-sizing:border-box;margin:0;padding:0}

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

/* ── HERO ── */
.hero{background:var(--navy3);position:relative;overflow:hidden;padding-top:140px}
.hero__strip{display:grid;grid-template-columns:repeat(5,1fr);gap:0;width:100%}
.hero__strip-cell{overflow:hidden;line-height:0}
.hero__strip-cell img{width:100%;aspect-ratio:1/1;height:auto;object-fit:cover;object-position:top}
.hero__grid{position:absolute;inset:0;z-index:1;background-image:linear-gradient(rgba(255,255,255,.02) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.02) 1px,transparent 1px);background-size:52px 52px;pointer-events:none}
.hero__body{position:relative;z-index:2;padding:0 56px 72px;max-width:900px;margin:0 auto;width:100%;display:flex;flex-direction:column;align-items:center;text-align:center}
.hero__tag{display:inline-flex;align-items:center;gap:9px;font-size:9.5px;font-weight:700;letter-spacing:.24em;text-transform:uppercase;color:var(--o);padding:4px 12px;background:rgba(240,90,37,.1);border:1px solid rgba(240,90,37,.28);border-radius:4px;margin-bottom:20px;opacity:0;animation:su .5s .1s ease forwards}
.hero__h1{font-family:var(--ff);font-weight:800;font-size:clamp(2.8rem,5.5vw,5.5rem);letter-spacing:-.06em;color:#fff;line-height:.92;margin-bottom:18px;opacity:0;animation:su .8s .25s cubic-bezier(.16,1,.3,1) forwards}
.hero__h1 em{font-style:italic;font-weight:300;color:var(--o)}
.hero__desc{font-size:15px;font-weight:300;color:rgba(255,255,255,.5);line-height:1.85;max-width:580px;opacity:0;animation:su .6s .42s ease forwards}



/* ── SHARED ── */
.section{padding:88px 0}
.inner{max-width:1320px;margin:0 auto;padding:0 56px}
.ey{display:inline-flex;align-items:center;gap:8px;font-size:9.5px;font-weight:700;letter-spacing:.22em;text-transform:uppercase;color:var(--o);margin-bottom:12px}
.ey::before{content:'';display:block;width:22px;height:2px;background:var(--o);border-radius:2px}
.sh{font-family:var(--ff);font-weight:800;font-size:clamp(1.9rem,3.5vw,3rem);letter-spacing:-.05em;color:var(--navy);line-height:1.04;margin-bottom:12px}
.sh em{font-style:italic;font-weight:300;color:var(--o)}
.sh--w{color:#fff}
.sd{font-size:14.5px;color:var(--muted);line-height:1.8;max-width:500px}
.sec-head{display:flex;align-items:flex-end;justify-content:space-between;gap:32px;margin-bottom:52px;flex-wrap:wrap}

/* ── STORY TEAM ── */
.story-team{display:flex;flex-direction:column;gap:120px;margin-top:64px}
.story-item{display:grid;grid-template-columns:1fr 1fr;gap:72px;align-items:center}
.story-item:nth-child(even){direction:rtl}
.story-item:nth-child(even) > *{direction:ltr}
.story-item__photo{position:relative}
.story-item__photo img{width:100%;aspect-ratio:1/1;object-fit:cover;border-radius:24px;box-shadow:0 32px 64px -16px rgba(0,0,0,0.5);transition:filter .5s, transform .7s cubic-bezier(.16,1,.3,1)}
.story-item:hover .story-item__photo img{transform:scale(1.03)}
.story-item__role{font-size:12px;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:var(--o);margin-bottom:16px;display:flex;align-items:center;gap:12px}
.story-item__role::before{content:'';display:block;width:32px;height:1px;background:var(--o)}
.story-item:nth-child(odd) .story-item__role::before{display:none}
.story-item:nth-child(odd) .story-item__role::after{content:'';display:block;width:32px;height:1px;background:var(--o)}
.story-item__name{font-family:var(--ff);font-weight:800;font-size:clamp(1.8rem, 6vw, 3.2rem);letter-spacing:-.04em;color:#fff;margin-bottom:24px;line-height:1.1}
.story-item__desc{font-size:16px;color:rgba(255,255,255,.65);line-height:1.8;max-width:540px}
@media(max-width:992px){
  .story-team{gap:80px}
  .story-item{grid-template-columns:1fr;gap:40px;text-align:center}
  .story-item:nth-child(even){direction:ltr}
  .story-item__role{justify-content:center}
  .story-item__role::before, .story-item__role::after{display:none !important}
  .story-item__desc{margin:0 auto}
}

/* ── EXPERTISE DOMAINS ── */
.domains{display:grid;grid-template-columns:repeat(2,1fr);gap:4px;margin-top:0}
.domain{background:var(--navy);padding:36px;position:relative;overflow:hidden;cursor:default}
.domain--light{background:var(--light);border:1.5px solid var(--bdr)}
.domain__icon{font-size:28px;margin-bottom:16px}
.domain__title{font-family:var(--ff);font-weight:800;font-size:1.2rem;letter-spacing:-.04em;color:#fff;margin-bottom:8px}
.domain--light .domain__title{color:var(--navy)}
.domain__desc{font-size:13.5px;color:rgba(255,255,255,.5);line-height:1.75;margin-bottom:18px}
.domain--light .domain__desc{color:var(--muted)}
.domain__experts{display:flex;flex-wrap:wrap;gap:7px}
.domain__expert-tag{font-size:11px;font-weight:600;padding:4px 12px;border-radius:5px;background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.1);color:rgba(255,255,255,.65);display:flex;align-items:center;gap:6px}
.domain--light .domain__expert-tag{background:var(--w);border-color:var(--bdr);color:var(--mid)}
.domain__expert-tag::before{content:'';width:5px;height:5px;border-radius:50%;background:var(--o);flex-shrink:0}

/* ── CERTIFICATIONS ── */
.certs-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:16px}
.cert-card{background:var(--w);border:2px solid var(--bdr);border-radius:11px;padding:22px 18px;text-align:center;transition:border-color .2s,transform .3s}
.cert-card:hover{border-color:rgba(28,40,87,.22);transform:translateY(-3px)}
.cert-card__logo{font-size:32px;margin-bottom:12px}
.cert-card__name{font-family:var(--ff);font-weight:800;font-size:.9rem;letter-spacing:-.02em;color:var(--navy);margin-bottom:4px}
.cert-card__org{font-size:11.5px;color:var(--muted);margin-bottom:10px}
.cert-card__holders{font-size:11px;font-weight:700;color:var(--o)}

/* ── CONTACT CTA ── */
.expert-cta{background:var(--navy3);position:relative;overflow:hidden}
.expert-cta::before{content:'';position:absolute;inset:0;background-image:linear-gradient(rgba(255,255,255,.02) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.02) 1px,transparent 1px);background-size:52px 52px}
.expert-cta::after{content:'';position:absolute;bottom:-100px;right:-100px;width:400px;height:400px;border-radius:50%;background:radial-gradient(circle,rgba(240,90,37,.14) 0%,transparent 70%);pointer-events:none}
.expert-cta__inner{max-width:1320px;margin:0 auto;padding:72px 56px;position:relative;z-index:1;display:grid;grid-template-columns:1fr 1fr;gap:64px;align-items:center}
.expert-cta__h{font-family:var(--ff);font-weight:800;font-size:clamp(2rem,3.5vw,3.2rem);letter-spacing:-.06em;color:#fff;line-height:1.02}
.expert-cta__h em{font-style:italic;font-weight:300;color:var(--o)}
.expert-cta__sub{font-size:14.5px;color:rgba(255,255,255,.45);line-height:1.82;margin-top:14px}
.consult-options{display:flex;flex-direction:column;gap:12px}
.consult-opt{display:flex;align-items:center;gap:16px;padding:18px 20px;background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.09);border-radius:10px;text-decoration:none;transition:background .2s,border-color .2s,padding-left .2s}
.consult-opt:hover{background:rgba(240,90,37,.12);border-color:rgba(240,90,37,.3);padding-left:26px}
.consult-opt__ico{width:42px;height:42px;border-radius:10px;flex-shrink:0;background:rgba(240,90,37,.15);border:1px solid rgba(240,90,37,.25);display:flex;align-items:center;justify-content:center}
.consult-opt__ico svg{width:18px;height:18px;stroke:var(--o);fill:none;stroke-width:2}
.consult-opt__title{font-size:13.5px;font-weight:700;color:#fff;margin-bottom:2px}
.consult-opt__sub{font-size:11.5px;color:rgba(255,255,255,.4)}
.consult-opt__arr{margin-left:auto;width:16px;height:16px;stroke:rgba(255,255,255,.25);fill:none;stroke-width:2;transition:stroke .2s,transform .2s;flex-shrink:0}
.consult-opt:hover .consult-opt__arr{stroke:var(--o);transform:translateX(4px)}

@keyframes su{from{opacity:0;transform:translateY(18px)}to{opacity:1;transform:translateY(0)}}
.rv{opacity:0;transform:translateY(22px);transition:opacity .7s cubic-bezier(.16,1,.3,1),transform .7s cubic-bezier(.16,1,.3,1)}
.rv.in{opacity:1;transform:translateY(0)}
.d1{transition-delay:.08s}.d2{transition-delay:.16s}.d3{transition-delay:.24s}.d4{transition-delay:.32s}

@media(max-width:1100px){
  .expert-cta__inner{grid-template-columns:1fr;gap:40px}
}
@media(max-width:768px){
  .hero__body,.inner,.expert-cta__inner{padding-left:20px;padding-right:20px}
  .sec-head{flex-direction:column;gap:16px;margin-bottom:32px;align-items:flex-start}
  .domains{grid-template-columns:1fr 1fr;gap:8px}
  .domain{padding:20px 16px;border-radius:12px}
  .domain__icon{font-size:24px;margin-bottom:12px}
  .domain__title{font-size:1.05rem}
  .domain__desc{font-size:12px;line-height:1.6;margin-bottom:12px}
  .domain__expert-tag{font-size:9.5px;padding:3px 8px}
}
</style>
<div id="cd"></div>
<div id="cr"></div>

<!-- HERO -->
<section class="hero">
  <div class="hero__grid" aria-hidden="true"></div>
  <div class="hero__body">
    <div class="hero__tag">Đội ngũ chuyên gia</div>
    <h1 class="hero__h1">Con người tạo nên<br><em>sự khác biệt</em></h1>
    <p class="hero__desc">Mỗi dự án TavaLED đứng sau là một đội ngũ chuyên gia được đào tạo bài bản, có chứng nhận quốc tế và kinh nghiệm thực chiến từ hàng trăm dự án thành công.</p>
  </div>
  <div class="hero__strip" aria-hidden="true">
    <div class="hero__strip-cell"><img src="https://tavaled.vn/wp-content/uploads/2026/03/1Nhan-su.jpg" alt="Tổng Giám Đốc" loading="lazy"></div>
    <div class="hero__strip-cell"><img src="https://tavaled.vn/wp-content/uploads/2026/03/4Nhan-su.jpg" alt="Phó TGĐ" loading="lazy"></div>
    <div class="hero__strip-cell"><img src="https://tavaled.vn/wp-content/uploads/2026/03/3Nhan-su.jpg" alt="Phó TGĐ Kinh doanh" loading="lazy"></div>
    <div class="hero__strip-cell"><img src="https://tavaled.vn/wp-content/uploads/2026/03/2Nhan-su.jpg" alt="Trưởng phòng Kỹ thuật" loading="lazy"></div>
    <div class="hero__strip-cell"><img src="https://tavaled.vn/wp-content/uploads/2026/03/5Nhan-su.jpg" alt="Trưởng phòng Marketing" loading="lazy"></div>
  </div>
</section>



<!-- EXPERTS STORYTELLING -->
<section class="section" style="background:var(--navy3);padding-top:72px;padding-bottom:120px">
  <div class="inner rv">
    <div class="sec-head" style="justify-content:center; text-align:center; flex-direction:column; align-items:center;">
      <div class="ey" style="color:rgba(240,90,37,.8)">Ban Lãnh Đạo & Quản Lý</div>
      <h2 class="sh sh--w">Đội ngũ <em>chuyên môn</em></h2>
      <p class="sd sd--w" style="text-align:center; max-width:640px; margin-top:16px;">Sự kết hợp giữa tầm nhìn hoạch định chiến lược, năng lực kỹ thuật chuyên sâu và triết lý lấy khách hàng làm trọng tâm để mang đến giải pháp hiển thị đỉnh cao.</p>
    </div>
  </div>
  <div class="inner">
    <div class="story-team">
      
      <div class="story-item rv d1">
        <div class="story-item__content">
          <div class="story-item__role">Tổng Giám Đốc</div>
          <div class="story-item__name">CV. Hồ Văn Tuyền</div>
          <div class="story-item__desc">Lãnh đạo và định hướng phát triển tổng thể, chuyên gia hàng đầu trong lĩnh vực phân phối thiết bị hiển thị hiện đại. Với hơn một thập kỷ tận tâm trong ngành, ông là người thổi hồn vào những chiến lược táo bạo nhất, biến TavaLED thành một trong những cái tên đáng tin cậy nhất thị trường.</div>
        </div>
        <div class="story-item__photo"><img src="https://tavaled.vn/wp-content/uploads/2026/03/1Nhan-su.jpg" alt="Tổng Giám Đốc" loading="lazy"></div>
      </div>

      <div class="story-item rv d1">
        <div class="story-item__content">
          <div class="story-item__role">Phó TGĐ phụ trách Kỹ thuật</div>
          <div class="story-item__name">Mr. Vũ Thanh Dương</div>
          <div class="story-item__desc">Trái tim của hệ thống vận hành, người trực tiếp quản lý và dẫn dắt đội ngũ thi công. Ông đảm nhiệm các tiêu chuẩn khắt khe nhất về chất lượng hình ảnh, độ ổn định và bảo mật kết nối cho những hệ thống hiển thị quy mô lớn. Đối với ông, không có chi tiết nào là quá nhỏ gọn.</div>
        </div>
        <div class="story-item__photo"><img src="https://tavaled.vn/wp-content/uploads/2026/03/4Nhan-su.jpg" alt="Phó TGĐ Kỹ thuật" loading="lazy"></div>
      </div>

      <div class="story-item rv d1">
        <div class="story-item__content">
          <div class="story-item__role">Phó TGĐ phụ trách Kinh doanh</div>
          <div class="story-item__name">Mr. Phạm Duy Thái</div>
          <div class="story-item__desc">Người kiến tạo hệ sinh thái giải pháp linh hoạt. Với kinh nghiệm tham gia vào những cuộc đối thoại chiến lược cùng các tập đoàn lớn, ông là chìa khóa mang lại thành công trên mỗi thương vụ B2B, giúp đối tác đạt được lợi nhuận kỳ vọng thông qua công nghệ hiển thị vượt trội.</div>
        </div>
        <div class="story-item__photo"><img src="https://tavaled.vn/wp-content/uploads/2026/03/3Nhan-su.jpg" alt="Phó TGĐ Kinh doanh" loading="lazy"></div>
      </div>

      <div class="story-item rv d1">
        <div class="story-item__content">
          <div class="story-item__role">Trưởng phòng Kỹ thuật</div>
          <div class="story-item__name">Mr. Trần Công Hùng</div>
          <div class="story-item__desc">Bảo chứng cho sự đúng hẹn và hoàn mỹ. Trưởng phòng kỹ thuật – người đứng sau hàng loạt các dự án lớn, luôn theo sát tiến độ, tối ưu hóa quy trình thi công và đảm bảo triển khai giải pháp màn hình LED với độ chính xác và độ an toàn kỹ thuật cao nhất trên từng điểm chạm.</div>
        </div>
        <div class="story-item__photo"><img src="https://tavaled.vn/wp-content/uploads/2026/03/2Nhan-su.jpg" alt="Trưởng phòng Kỹ thuật" loading="lazy"></div>
      </div>

      <div class="story-item rv d1">
        <div class="story-item__content">
          <div class="story-item__role">Trưởng phòng Marketing</div>
          <div class="story-item__name">Ms. Đỗ Thị Bích Vân</div>
          <div class="story-item__desc">Người viết nên câu chuyện thương hiệu. Bằng cách định vị đúng giá trị kinh doanh và lan tỏa hình ảnh giải pháp hiển thị tiên tiến, bà giúp đưa những câu chuyện thành công của TavaLED đến gần hơn với khách hàng doanh nghiệp trên toàn quốc.</div>
        </div>
        <div class="story-item__photo"><img src="https://tavaled.vn/wp-content/uploads/2026/03/5Nhan-su.jpg" alt="Trưởng phòng Marketing" loading="lazy"></div>
      </div>

    </div>
  </div>
</section>

<!-- EXPERTISE DOMAINS -->
<section class="section section--white" style="padding-top:0">
  <div class="inner rv" style="margin-bottom:0">
    <div class="sec-head" style="padding-top:88px">
      <div>
        <div class="ey">Lĩnh vực chuyên môn</div>
        <h2 class="sh">Năng lực <em>cốt lõi</em></h2>
      </div>
    </div>
  </div>
  <div style="max-width:1320px;margin:0 auto;padding:0 56px">
    <div class="domains rv d1">
      <div class="domain">
        <div class="domain__icon">📺</div>
        <div class="domain__title">LED & Display Technology</div>
        <div class="domain__desc">Chuyên sâu về pixel pitch, COB, SMD, Mini-LED. Thiết kế hệ thống điều khiển, hiệu chỉnh màu sắc và tối ưu nội dung hiển thị.</div>
        <div class="domain__experts">
          <span class="domain__expert-tag">Novastar System</span>
          <span class="domain__expert-tag">Absen COB</span>
          <span class="domain__expert-tag">Leyard TWA</span>
          <span class="domain__expert-tag">Video Processor</span>
          <span class="domain__expert-tag">LED Calibration</span>
        </div>
      </div>
      <div class="domain domain--light">
        <div class="domain__icon">🔊</div>
        <div class="domain__title">Pro Audio Engineering</div>
        <div class="domain__desc">Thiết kế âm học, lựa chọn và triển khai hệ thống Line Array, phân vùng âm thanh, tích hợp DSP và kiểm soát độ trễ.</div>
        <div class="domain__experts">
          <span class="domain__expert-tag">JBL Line Array</span>
          <span class="domain__expert-tag">Yamaha Console</span>
          <span class="domain__expert-tag">BSS Soundweb</span>
          <span class="domain__expert-tag">Shure Wireless</span>
          <span class="domain__expert-tag">EASE Acoustic</span>
        </div>
      </div>
      <div class="domain domain--light">
        <div class="domain__icon">💡</div>
        <div class="domain__title">Stage & Architectural Lighting</div>
        <div class="domain__desc">Thiết kế ánh sáng sân khấu, kiến trúc, cảnh quan. Lập trình show lighting phức tạp, vận hành live event.</div>
        <div class="domain__experts">
          <span class="domain__expert-tag">Robe BMFL</span>
          <span class="domain__expert-tag">MA Lighting GrandMA</span>
          <span class="domain__expert-tag">WYSIWYG Design</span>
          <span class="domain__expert-tag">Avolites Titan</span>
          <span class="domain__expert-tag">Vectorworks</span>
        </div>
      </div>
      <div class="domain">
        <div class="domain__icon">⚙️</div>
        <div class="domain__title">AV Systems Integration</div>
        <div class="domain__desc">Tích hợp toàn bộ hệ thống AV, quản lý nội dung, kết nối IoT và điều khiển trung tâm cho hội trường, tòa nhà thông minh.</div>
        <div class="domain__experts">
          <span class="domain__expert-tag">Crestron Control</span>
          <span class="domain__expert-tag">Extron Switcher</span>
          <span class="domain__expert-tag">AMX Control</span>
          <span class="domain__expert-tag">Dante Network</span>
          <span class="domain__expert-tag">NDI Video</span>
        </div>
      </div>
    </div>
  </div>
</section>



<!-- CONTACT CTA -->
<div class="expert-cta">
  <div class="expert-cta__inner">
    <div>
      <div class="ey" style="color:rgba(240,90,37,.7)">Tư vấn chuyên gia</div>
      <h2 class="expert-cta__h">Dự án của bạn xứng đáng<br>được <em>tư vấn đúng người</em></h2>
      <p class="expert-cta__sub">Chúng tôi kết nối bạn với chuyên gia phù hợp nhất dựa trên quy mô, loại hình và yêu cầu kỹ thuật của dự án.</p>
    </div>
    <div class="consult-options rv d1">
      <a href="tel:0936 543 389" class="consult-opt">
        <div class="consult-opt__ico"><svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 014.7 12.5a19.79 19.79 0 01-3.07-8.67A2 2 0 013.59 2h3a2 2 0 012 1.72 12 12 0 00.7 2.81 2 2 0 01-.45 2.11L7.91 9.91a16 16 0 006.1 6.1l.96-.96a2 2 0 012.11-.45 12 12 0 002.81.7A2 2 0 0122 16.92z"/></svg></div>
        <div><div class="consult-opt__title">Gọi điện tư vấn ngay</div><div class="consult-opt__sub">0936 543 389 · Phản hồi trong 30 phút</div></div>
        <svg class="consult-opt__arr" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
      </a>
      <a href="mailto:tuyen.tavaco@gmail.com?subject=Yêu cầu tư vấn dự án" class="consult-opt">
        <div class="consult-opt__ico"><svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></div>
        <div><div class="consult-opt__title">Gửi yêu cầu tư vấn</div><div class="consult-opt__sub">tuyen.tavaco@gmail.com · Phản hồi trong 2 giờ</div></div>
        <svg class="consult-opt__arr" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
      </a>
      <a href="https://www.tavaled.vn/lien-he" class="consult-opt">
        <div class="consult-opt__ico"><svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg></div>
        <div><div class="consult-opt__title">Đến gặp trực tiếp</div><div class="consult-opt__sub">HN · HCM · Đà Nẵng · Miễn phí</div></div>
        <svg class="consult-opt__arr" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
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
</script>


<?php get_footer(); ?>