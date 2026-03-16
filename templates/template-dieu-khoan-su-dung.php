<?php
/**
 * Template Name: Trang điều khoản sử dụng
 */

get_header(); ?>
<style>

:root{
  --navy:#1c2857;--navy2:#162248;--navy3:#0f1835;
  --o:#f05a25;--odk:#c8451a;--olt:#fff3ee;
  --w:#fff;--ink:#111827;--mid:#374151;--muted:#6b7280;
  --light:#f9fafb;--bdr:#e5e7eb;
  --ff:'Mona Sans','Mona-Sans',sans-serif;
}
html{scroll-behavior:smooth}
.policy-page-content{font-family:var(--ff);background:var(--light);color:var(--ink);-webkit-font-smoothing:antialiased;font-size:15px;line-height:1.75}
.policy-page-content a{color:var(--o);text-decoration:none;transition:color .2s}
.policy-page-content a:hover{color:var(--odk)}

.policy-hero{background:var(--navy2);padding:64px 0 56px;position:relative;overflow:hidden}
.policy-hero::before{content:'';position:absolute;inset:0;background-image:linear-gradient(rgba(255,255,255,.022) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.022) 1px,transparent 1px);background-size:52px 52px}
.policy-hero::after{content:'';position:absolute;bottom:0;left:0;right:0;height:3px;background:linear-gradient(90deg,var(--o),var(--odk) 50%,rgba(240,90,37,.2))}
.hero-inner{max-width:1160px;margin:0 auto;padding:0 40px;position:relative;z-index:1}
.hero-badge{display:inline-flex;align-items:center;gap:8px;font-size:9.5px;font-weight:700;letter-spacing:.22em;text-transform:uppercase;color:var(--o);padding:4px 12px;background:rgba(240,90,37,.12);border:1px solid rgba(240,90,37,.3);border-radius:4px;margin-bottom:16px}
.hero-title{font-family:var(--ff);font-weight:800;font-size:clamp(2rem,4vw,3.2rem);letter-spacing:-.05em;color:#fff;line-height:1.04;margin-bottom:14px}
.hero-title em{font-style:italic;font-weight:300;color:var(--o)}
.hero-meta{display:flex;align-items:center;gap:20px;flex-wrap:wrap;margin-top:20px}
.hero-meta-item{display:flex;align-items:center;gap:7px;font-size:12px;color:rgba(255,255,255,.45);font-weight:500}
.hero-meta-item svg{width:14px;height:14px;stroke:currentColor;fill:none;stroke-width:2;opacity:.6}
.hero-meta-item strong{color:rgba(255,255,255,.75)}

.policy-layout{max-width:1160px;margin:0 auto;padding:48px 40px 80px;display:grid;grid-template-columns:240px 1fr;gap:40px;align-items:start}

.toc{position:sticky;top:120px;background:var(--w);border-radius:12px;border:1px solid var(--bdr);overflow:hidden}
.toc-header{padding:16px 20px;background:var(--navy2);font-size:10px;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:rgba(255,255,255,.6);display:flex;align-items:center;gap:8px}
.toc-header svg{width:14px;height:14px;stroke:var(--o);fill:none;stroke-width:2}
.toc-list{list-style:none;padding:8px 0}
.toc-item a{display:block;padding:8px 20px !important;font-size:12.5px !important;font-weight:500 !important;color:var(--muted) !important;text-decoration:none !important;border-left:2px solid transparent !important;transition:color .18s,border-color .18s,background .18s,padding-left .18s !important}
.toc-item a:hover{color:var(--navy) !important;background:var(--light) !important;padding-left:26px !important}
.toc-item a.active{color:var(--o) !important;border-left-color:var(--o) !important;background:var(--olt) !important;font-weight:600 !important}
.toc-divider{height:1px;background:var(--bdr);margin:6px 20px}

.policy-content{background:var(--w);border-radius:12px;border:1px solid var(--bdr);overflow:hidden}
.section-block{padding:40px 44px;border-bottom:1px solid var(--bdr)}
.section-block:last-child{border-bottom:none}
.sec-num{display:inline-flex;align-items:center;justify-content:center;width:28px;height:28px;border-radius:7px;background:var(--o);color:#fff;font-size:11px;font-weight:800;margin-bottom:12px}
.sec-title{font-family:var(--ff);font-weight:800;font-size:1.15rem;letter-spacing:-.03em;color:var(--navy);margin-bottom:14px}
.sec-text{font-size:14.5px;color:var(--mid);line-height:1.82;margin-bottom:12px}
.sec-text:last-child{margin-bottom:0}
.sec-text strong{font-weight:700;color:var(--ink)}
.policy-list{list-style:none;display:flex;flex-direction:column;gap:8px;margin:12px 0}
.policy-list li{display:flex;align-items:flex-start;gap:10px;font-size:14px;color:var(--mid);line-height:1.7}
.policy-list li::before{content:'';display:block;width:6px;height:6px;border-radius:50%;background:var(--o);flex-shrink:0;margin-top:8px}
.info-box{background:var(--olt);border:1px solid rgba(240,90,37,.2);border-left:3px solid var(--o);border-radius:8px;padding:16px 18px;margin:16px 0}
.info-box p{font-size:13.5px;color:var(--mid);line-height:1.75}
.info-box strong{color:var(--navy);font-weight:700}
.warn-box{background:#fff8f0;border:1px solid rgba(240,90,37,.25);border-left:3px solid var(--odk);border-radius:8px;padding:16px 18px;margin:16px 0}
.warn-box p{font-size:13.5px;color:var(--mid);line-height:1.75}
.warn-box strong{color:var(--odk);font-weight:700}

/* Two-col grid for rights/obligations */
.two-col{display:grid;grid-template-columns:1fr 1fr;gap:16px;margin:16px 0}
.col-card{background:var(--light);border:1.5px solid var(--bdr);border-radius:9px;padding:18px}
.col-card.navy{background:var(--navy);border-color:var(--navy)}
.col-card__title{font-size:11px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--muted);margin-bottom:10px}
.col-card.navy .col-card__title{color:rgba(255,255,255,.4)}
.col-card ul{list-style:none;display:flex;flex-direction:column;gap:7px}
.col-card ul li{font-size:13px;color:var(--mid);display:flex;align-items:flex-start;gap:8px;line-height:1.6}
.col-card.navy ul li{color:rgba(255,255,255,.65)}
.col-card ul li::before{content:'';width:5px;height:5px;border-radius:50%;background:var(--o);flex-shrink:0;margin-top:7px}

.contact-box{background:var(--navy);border-radius:10px;padding:24px;display:grid;grid-template-columns:1fr 1fr;gap:16px;margin-top:20px}
.contact-item{display:flex;align-items:flex-start;gap:12px}
.contact-item__ico{width:36px;height:36px;border-radius:8px;flex-shrink:0;background:rgba(240,90,37,.15);border:1px solid rgba(240,90,37,.25);display:flex;align-items:center;justify-content:center}
.contact-item__ico svg{width:15px;height:15px;stroke:var(--o);fill:none;stroke-width:2}
.contact-item__lbl{font-size:9.5px;font-weight:700;letter-spacing:.15em;text-transform:uppercase;color:rgba(255,255,255,.35);margin-bottom:3px}
.contact-item__val{font-size:13.5px;font-weight:600;color:#fff}
.contact-item__val a{color:var(--o);text-decoration:none}

.last-updated{background:var(--light);border-top:1px solid var(--bdr);padding:18px 44px;display:flex;align-items:center;justify-content:space-between;font-size:12px;color:var(--muted);flex-wrap:wrap;gap:8px}
.last-updated strong{color:var(--navy)}
.version-tag{font-size:10px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;padding:3px 10px;background:var(--navy);color:rgba(255,255,255,.7);border-radius:4px}

.rv{opacity:0;transform:translateY(20px);transition:opacity .65s cubic-bezier(.16,1,.3,1),transform .65s cubic-bezier(.16,1,.3,1)}
.rv.in{opacity:1;transform:translateY(0)}
.d1{transition-delay:.07s}.d2{transition-delay:.14s}

@media(max-width:900px){.policy-layout{grid-template-columns:1fr}.toc{position:relative;top:0}}
@media(max-width:600px){.hero-inner,.policy-layout{padding-left:20px;padding-right:20px}.section-block{padding:28px 22px}.contact-box{grid-template-columns:1fr}}
</style>

<div class="policy-page-content">

<div class="policy-hero">
  <div class="hero-inner">
    <div class="hero-badge">📄 Điều khoản pháp lý</div>
    <h1 class="hero-title">Điều khoản <em>Sử dụng</em></h1>
    <div class="hero-meta">
      <div class="hero-meta-item"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg><span>Hiệu lực từ: <strong>01/01/2025</strong></span></div>
      <div class="hero-meta-item"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg><span>Cập nhật: <strong>01/03/2025</strong></span></div>
      <div class="hero-meta-item"><svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg><span>Phiên bản: <strong>v1.4</strong></span></div>
    </div>
  </div>
</div>

<div class="policy-layout">
  <nav class="toc rv" aria-label="Mục lục">
    <div class="toc-header"><svg viewBox="0 0 24 24"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>Mục lục</div>
    <ul class="toc-list">
      <li class="toc-item"><a href="#s1">1. Phạm vi áp dụng</a></li>
      <li class="toc-item"><a href="#s2">2. Điều kiện sử dụng</a></li>
      <li class="toc-item"><a href="#s3">3. Quyền & Nghĩa vụ TavaLED</a></li>
      <li class="toc-item"><a href="#s4">4. Quyền & Nghĩa vụ Người dùng</a></li>
      <li class="toc-item"><a href="#s5">5. Nội dung cấm</a></li>
      <li class="toc-item"><a href="#s6">6. Sở hữu trí tuệ</a></li>
      <li class="toc-item"><a href="#s7">7. Giới hạn trách nhiệm</a></li>
      <li class="toc-item"><a href="#s8">8. Giải quyết tranh chấp</a></li>
      <li class="toc-item"><a href="#s9">9. Luật áp dụng</a></li>
      <li class="toc-item"><a href="#s10">10. Thay đổi điều khoản</a></li>
      <li class="toc-divider"></li>
      <li class="toc-item"><a href="#contact">Liên hệ</a></li>
    </ul>
  </nav>

  <main class="policy-content rv d1">
    <div class="section-block" id="s1">
      <div class="sec-num">1</div>
      <h2 class="sec-title">Phạm vi áp dụng</h2>
      <p class="sec-text">Điều khoản Sử dụng này điều chỉnh mối quan hệ giữa <strong>Công ty TNHH TavaLED</strong> ("TavaLED", "chúng tôi") và <strong>bạn</strong> ("Người dùng", "Khách hàng") khi sử dụng website <strong>www.tavaled.vn</strong> và các dịch vụ liên quan.</p>
      <p class="sec-text">Bằng cách truy cập website, gửi yêu cầu tư vấn, hoặc ký kết hợp đồng với TavaLED, bạn đồng ý bị ràng buộc bởi các điều khoản này. Nếu không đồng ý, vui lòng không sử dụng dịch vụ của chúng tôi.</p>
      <div class="info-box"><p>Đối với khách hàng doanh nghiệp, điều khoản hợp đồng ký kết giữa hai bên sẽ ưu tiên áp dụng so với điều khoản chung này trong trường hợp có mâu thuẫn.</p></div>
    </div>

    <div class="section-block" id="s2">
      <div class="sec-num">2</div>
      <h2 class="sec-title">Điều kiện sử dụng dịch vụ</h2>
      <p class="sec-text">Để sử dụng dịch vụ của TavaLED, bạn phải đáp ứng các điều kiện sau:</p>
      <ul class="policy-list">
        <li>Đủ năng lực hành vi dân sự theo quy định pháp luật Việt Nam (từ 18 tuổi trở lên, hoặc có sự đồng ý của người giám hộ)</li>
        <li>Cung cấp thông tin chính xác, đầy đủ khi yêu cầu tư vấn hoặc báo giá</li>
        <li>Có thẩm quyền đại diện nếu đăng ký nhân danh tổ chức, doanh nghiệp</li>
        <li>Tuân thủ pháp luật Việt Nam và các quy định tại điều khoản này</li>
      </ul>
    </div>

    <div class="section-block" id="s3">
      <div class="sec-num">3</div>
      <h2 class="sec-title">Quyền và Nghĩa vụ của TavaLED</h2>
      <div class="two-col">
        <div class="col-card">
          <div class="col-card__title">✅ Quyền của TavaLED</div>
          <ul><li>Từ chối cung cấp dịch vụ không phù hợp với năng lực kỹ thuật</li><li>Điều chỉnh báo giá khi có thay đổi về yêu cầu dự án</li><li>Đình chỉ dịch vụ khi Khách hàng vi phạm điều khoản</li><li>Cập nhật, sửa đổi nội dung website và điều khoản</li></ul>
        </div>
        <div class="col-card navy">
          <div class="col-card__title">📌 Nghĩa vụ của TavaLED</div>
          <ul><li>Cung cấp thông tin sản phẩm, dịch vụ trung thực, chính xác</li><li>Thực hiện đúng cam kết trong hợp đồng đã ký kết</li><li>Bảo mật thông tin khách hàng theo Chính sách Bảo mật</li><li>Hỗ trợ kỹ thuật và bảo hành theo quy định</li></ul>
        </div>
      </div>
    </div>

    <div class="section-block" id="s4">
      <div class="sec-num">4</div>
      <h2 class="sec-title">Quyền và Nghĩa vụ của Người dùng</h2>
      <div class="two-col">
        <div class="col-card">
          <div class="col-card__title">✅ Quyền của Người dùng</div>
          <ul><li>Nhận thông tin tư vấn miễn phí, không ràng buộc</li><li>Yêu cầu chỉnh sửa hoặc hủy yêu cầu trước khi ký hợp đồng</li><li>Khiếu nại về chất lượng dịch vụ theo quy trình quy định</li><li>Truy cập, chỉnh sửa và xóa dữ liệu cá nhân của mình</li></ul>
        </div>
        <div class="col-card navy">
          <div class="col-card__title">📌 Nghĩa vụ của Người dùng</div>
          <ul><li>Cung cấp thông tin chính xác, không gian lận</li><li>Thanh toán đúng hạn theo hợp đồng đã ký</li><li>Phối hợp với đội kỹ thuật trong quá trình thi công</li><li>Sử dụng thiết bị đúng mục đích và hướng dẫn</li></ul>
        </div>
      </div>
    </div>

    <div class="section-block" id="s5">
      <div class="sec-num">5</div>
      <h2 class="sec-title">Nội dung và Hành vi bị cấm</h2>
      <p class="sec-text">Khi sử dụng website và dịch vụ TavaLED, bạn <strong>không được phép</strong>:</p>
      <ul class="policy-list">
        <li>Sử dụng thông tin, hình ảnh, nội dung từ website cho mục đích thương mại mà không được phép bằng văn bản</li>
        <li>Sao chép, phân phối, tái bản tài liệu kỹ thuật, catalog sản phẩm độc quyền của TavaLED</li>
        <li>Cố ý gây trục trặc, tấn công hệ thống (DDoS, SQL injection, XSS, v.v.)</li>
        <li>Cung cấp thông tin giả mạo khi yêu cầu dịch vụ hoặc ký hợp đồng</li>
        <li>Sử dụng dịch vụ tư vấn miễn phí để thu thập thông tin cạnh tranh</li>
        <li>Đăng tải đánh giá sai sự thật, gây tổn hại đến uy tín TavaLED</li>
      </ul>
      <div class="warn-box"><p><strong>Hậu quả vi phạm:</strong> TavaLED có quyền đình chỉ dịch vụ ngay lập tức, yêu cầu bồi thường thiệt hại theo quy định pháp luật, và chuyển hồ sơ sang cơ quan có thẩm quyền nếu cần thiết.</p></div>
    </div>

    <div class="section-block" id="s6">
      <div class="sec-num">6</div>
      <h2 class="sec-title">Sở hữu trí tuệ</h2>
      <p class="sec-text">Toàn bộ nội dung trên website bao gồm logo, hình ảnh, văn bản, thiết kế, phần mềm, tài liệu kỹ thuật là <strong>tài sản trí tuệ của TavaLED</strong> hoặc được cấp phép hợp lệ.</p>
      <ul class="policy-list">
        <li>Được phép: Xem, tải xuống để sử dụng cá nhân phi thương mại; Chia sẻ link bài viết kèm nguồn trích dẫn</li>
        <li>Không được phép: Sao chép tài liệu kỹ thuật, catalog, bảng giá để phân phối; Sử dụng logo TavaLED mà không có ủy quyền</li>
        <li>Phần mềm điều khiển và firmware thiết bị: Được cấp phép sử dụng, không được reverse-engineer</li>
      </ul>
    </div>

    <div class="section-block" id="s7">
      <div class="sec-num">7</div>
      <h2 class="sec-title">Giới hạn Trách nhiệm</h2>
      <p class="sec-text">TavaLED không chịu trách nhiệm trong các trường hợp sau:</p>
      <ul class="policy-list">
        <li>Thiệt hại phát sinh từ việc sử dụng sai mục đích hoặc lắp đặt không theo hướng dẫn kỹ thuật</li>
        <li>Sự cố do thiên tai, mất điện, sét đánh, điện áp bất ổn ngoài phạm vi bảo hành</li>
        <li>Nội dung trang web bên thứ ba được liên kết từ website TavaLED</li>
        <li>Gián đoạn dịch vụ website do bảo trì, nâng cấp hệ thống có thông báo trước</li>
        <li>Thiệt hại gián tiếp hoặc mất lợi nhuận kinh doanh ngoài giá trị hợp đồng đã ký</li>
      </ul>
      <div class="info-box"><p><strong>Giới hạn bồi thường:</strong> Trong mọi trường hợp, tổng trách nhiệm pháp lý của TavaLED không vượt quá giá trị hợp đồng thực tế đã thực hiện, trừ trường hợp có quy định khác trong hợp đồng ký kết.</p></div>
    </div>

    <div class="section-block" id="s8">
      <div class="sec-num">8</div>
      <h2 class="sec-title">Giải quyết Tranh chấp</h2>
      <p class="sec-text">Mọi tranh chấp phát sinh được giải quyết theo các bước sau:</p>
      <ul class="policy-list">
        <li><strong>Bước 1 — Thương lượng:</strong> Hai bên thương lượng trong vòng 30 ngày kể từ ngày phát sinh tranh chấp</li>
        <li><strong>Bước 2 — Hòa giải:</strong> Nếu thương lượng không thành, tiến hành hòa giải với sự tham gia của bên thứ ba</li>
        <li><strong>Bước 3 — Tòa án:</strong> Tranh chấp không giải quyết được sẽ được đưa ra Tòa án nhân dân có thẩm quyền tại Hà Nội</li>
      </ul>
      <p class="sec-text">Trong thời gian giải quyết tranh chấp, hai bên tiếp tục thực hiện các nghĩa vụ không liên quan đến nội dung tranh chấp.</p>
    </div>

    <div class="section-block" id="s9">
      <div class="sec-num">9</div>
      <h2 class="sec-title">Luật áp dụng</h2>
      <p class="sec-text">Điều khoản này được điều chỉnh bởi <strong>pháp luật nước Cộng hòa Xã hội Chủ nghĩa Việt Nam</strong>, bao gồm nhưng không giới hạn:</p>
      <ul class="policy-list">
        <li>Bộ luật Dân sự 2015</li>
        <li>Luật Thương mại 2005</li>
        <li>Luật Bảo vệ Quyền lợi Người tiêu dùng 2023</li>
        <li>Nghị định 13/2023/NĐ-CP về Bảo vệ Dữ liệu Cá nhân</li>
        <li>Luật Giao dịch Điện tử 2023</li>
      </ul>
    </div>

    <div class="section-block" id="s10">
      <div class="sec-num">10</div>
      <h2 class="sec-title">Thay đổi Điều khoản</h2>
      <p class="sec-text">TavaLED có quyền sửa đổi điều khoản này bất kỳ lúc nào. Với thay đổi quan trọng ảnh hưởng đến quyền lợi người dùng, chúng tôi sẽ thông báo trước <strong>ít nhất 30 ngày</strong> qua email và banner trên website. Tiếp tục sử dụng dịch vụ sau ngày hiệu lực đồng nghĩa với việc chấp nhận điều khoản mới.</p>
    </div>

    <div class="section-block" id="contact">
      <div class="sec-num" style="background:var(--navy)">✉</div>
      <h2 class="sec-title">Liên hệ về Điều khoản</h2>
      <p class="sec-text">Nếu có câu hỏi về điều khoản sử dụng, vui lòng liên hệ:</p>
      <div class="contact-box">
        <div class="contact-item"><div class="contact-item__ico"><svg viewBox="0 0 24 24"><path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg></div><div><div class="contact-item__lbl">Trụ sở chính</div><div class="contact-item__val">Công ty TNHH TavaLED<br>48 Hoàng Cầu, Đống Đa, Hà Nội</div></div></div>
        <div class="contact-item"><div class="contact-item__ico"><svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></div><div><div class="contact-item__lbl">Email pháp lý</div><div class="contact-item__val"><a href="mailto:legal@tavaled.vn">legal@tavaled.vn</a></div></div></div>
        <div class="contact-item"><div class="contact-item__ico"><svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 014.7 12.5a19.79 19.79 0 01-3.07-8.67A2 2 0 013.59 2h3a2 2 0 012 1.72 12 12 0 00.7 2.81 2 2 0 01-.45 2.11L7.91 9.91a16 16 0 006.1 6.1l.96-.96a2 2 0 012.11-.45 12 12 0 002.81.7A2 2 0 0122 16.92z"/></svg></div><div><div class="contact-item__lbl">Hotline</div><div class="contact-item__val"><a href="tel:19001234">1900 1234</a></div></div></div>
        <div class="contact-item"><div class="contact-item__ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div><div><div class="contact-item__lbl">Giờ tiếp nhận</div><div class="contact-item__val">T2–T6: 08:00–17:30</div></div></div>
      </div>
    </div>

    <div class="last-updated">
      <span>© 2025 <strong>Công ty TNHH TavaLED</strong>. Mọi quyền được bảo lưu.</span>
      <span class="version-tag">Phiên bản 1.4 · 01/03/2025</span>
    </div>
  </main>
</div>

<script>
const obs=new IntersectionObserver(e=>{e.forEach(x=>{if(x.isIntersecting){x.target.classList.add('in');obs.unobserve(x.target);}})},{threshold:.08});
document.querySelectorAll('.rv').forEach(el=>obs.observe(el));
const sections=document.querySelectorAll('.section-block[id]');
const tocLinks=document.querySelectorAll('.toc-item a');
window.addEventListener('scroll',()=>{
  let cur='';sections.forEach(s=>{if(window.scrollY>=s.offsetTop-120)cur=s.id});
  tocLinks.forEach(a=>a.classList.toggle('active',a.getAttribute('href')==='#'+cur));
},{passive:true});
</script>
</div>
<?php get_footer(); ?>