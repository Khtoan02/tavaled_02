<?php
/**
 * Template Name: Trang chính sách bảo hành
 */

get_header(); ?>
<style>
:root{
  --navy:#1c2857;--navy2:#162248;--navy3:#0f1835;
  --o:#f05a25;--odk:#c8451a;--olt:#fff3ee;
  --green:#16a34a;--green-lt:#f0fdf4;--green-bdr:#bbf7d0;
  --red:#dc2626;--red-lt:#fef2f2;
  --w:#fff;--ink:#111827;--mid:#374151;--muted:#6b7280;
  --light:#f9fafb;--bdr:#e5e7eb;
  --ff:'Mona Sans','Mona-Sans',sans-serif;
}
html{scroll-behavior:smooth}
.policy-page-content{font-family:var(--ff);background:var(--light);color:var(--ink);-webkit-font-smoothing:antialiased;font-size:15px;line-height:1.75}
.policy-page-content a{color:var(--o);text-decoration:none;transition:color .2s}
.policy-page-content a:hover{color:var(--odk)}

.policy-hero{background:var(--navy);padding:64px 0 56px;position:relative;overflow:hidden}
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

/* Warranty highlights strip */
.warranty-strip{background:var(--o);padding:20px 0}
.ws-inner{max-width:1160px;margin:0 auto;padding:0 40px;display:grid;grid-template-columns:repeat(4,1fr);gap:0}
.ws-item{text-align:center;padding:0 20px;border-right:1px solid rgba(255,255,255,.2)}
.ws-item:last-child{border-right:none}
.ws-val{font-family:var(--ff);font-size:2rem;font-weight:800;letter-spacing:-.05em;color:#fff;line-height:1}
.ws-label{font-size:11px;font-weight:600;color:rgba(255,255,255,.75);margin-top:4px;letter-spacing:.04em}

.policy-layout{max-width:1160px;margin:0 auto;padding:48px 40px 80px;display:grid;grid-template-columns:240px 1fr;gap:40px;align-items:start}
.toc{position:sticky;top:120px;background:var(--w);border-radius:12px;border:1px solid var(--bdr);overflow:hidden}
.toc-header{padding:16px 20px;background:var(--navy);font-size:10px;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:rgba(255,255,255,.6);display:flex;align-items:center;gap:8px}
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
.green-box{background:var(--green-lt);border:1px solid var(--green-bdr);border-left:3px solid var(--green);border-radius:8px;padding:16px 18px;margin:16px 0}
.green-box p{font-size:13.5px;color:var(--mid);line-height:1.75}
.green-box strong{color:var(--green);font-weight:700}
.red-box{background:var(--red-lt);border:1px solid rgba(220,38,38,.2);border-left:3px solid var(--red);border-radius:8px;padding:16px 18px;margin:16px 0}
.red-box p{font-size:13.5px;color:var(--mid);line-height:1.75}
.red-box strong{color:var(--red);font-weight:700}

/* Warranty table */
.warranty-table{width:100%;border-collapse:collapse;margin:16px 0;font-size:13.5px}
.warranty-table th{background:var(--navy);color:#fff;padding:11px 14px;text-align:left;font-weight:700;font-size:11px;letter-spacing:.1em;text-transform:uppercase}
.warranty-table th:first-child{border-radius:0}
.warranty-table td{padding:11px 14px;border-bottom:1px solid var(--bdr);color:var(--mid)}
.warranty-table tr:last-child td{border-bottom:none}
.warranty-table tr:nth-child(even) td{background:var(--light)}
.warranty-table tr:hover td{background:var(--olt)}
.badge-ok{display:inline-flex;align-items:center;gap:4px;font-size:11px;font-weight:700;color:var(--green);background:var(--green-lt);padding:2px 8px;border-radius:4px}
.badge-no{display:inline-flex;align-items:center;gap:4px;font-size:11px;font-weight:700;color:var(--red);background:var(--red-lt);padding:2px 8px;border-radius:4px}

/* Support tiers */
.support-tiers{display:grid;grid-template-columns:repeat(3,1fr);gap:12px;margin:16px 0}
.tier-card{border-radius:10px;padding:20px;border:2px solid var(--bdr)}
.tier-card--standard{background:var(--light)}
.tier-card--priority{background:var(--navy);border-color:var(--navy)}
.tier-card--premium{background:linear-gradient(135deg,var(--o),var(--odk));border-color:var(--o)}
.tier-label{font-size:9px;font-weight:800;letter-spacing:.18em;text-transform:uppercase;margin-bottom:6px}
.tier-card--standard .tier-label{color:var(--muted)}
.tier-card--priority .tier-label{color:rgba(255,255,255,.5)}
.tier-card--premium .tier-label{color:rgba(255,255,255,.7)}
.tier-name{font-family:var(--ff);font-size:1rem;font-weight:800;letter-spacing:-.03em;margin-bottom:10px}
.tier-card--standard .tier-name{color:var(--navy)}
.tier-card--priority .tier-name,.tier-card--premium .tier-name{color:#fff}
.tier-list{list-style:none;display:flex;flex-direction:column;gap:6px}
.tier-list li{font-size:12.5px;display:flex;align-items:flex-start;gap:7px;line-height:1.5}
.tier-card--standard .tier-list li{color:var(--mid)}
.tier-card--priority .tier-list li,.tier-card--premium .tier-list li{color:rgba(255,255,255,.8)}
.tier-list li::before{content:'✓';font-weight:800;flex-shrink:0}
.tier-card--standard .tier-list li::before{color:var(--green)}
.tier-card--priority .tier-list li::before,.tier-card--premium .tier-list li::before{color:rgba(255,255,255,.9)}

/* Claim process */
.claim-steps{display:flex;flex-direction:column;gap:0;position:relative;margin:16px 0}
.claim-steps::before{content:'';position:absolute;left:19px;top:20px;bottom:20px;width:2px;background:var(--bdr)}
.claim-step{display:flex;gap:16px;padding:12px 0}
.claim-step__ico{width:40px;height:40px;border-radius:50%;background:var(--o);color:#fff;font-size:13px;font-weight:800;display:flex;align-items:center;justify-content:center;flex-shrink:0;position:relative;z-index:1}
.claim-step__body{padding-top:8px}
.claim-step__title{font-size:14px;font-weight:700;color:var(--navy);margin-bottom:3px}
.claim-step__desc{font-size:13px;color:var(--muted);line-height:1.6}
.claim-step__time{display:inline-block;font-size:10px;font-weight:700;letter-spacing:.08em;color:var(--o);background:var(--olt);padding:2px 8px;border-radius:3px;margin-top:4px}

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
.d1{transition-delay:.07s}

@media(max-width:900px){.policy-layout{grid-template-columns:1fr}.toc{position:relative;top:0}.support-tiers{grid-template-columns:1fr}.ws-inner{grid-template-columns:repeat(2,1fr);gap:16px}}
@media(max-width:600px){.hero-inner,.policy-layout{padding-left:20px;padding-right:20px}.section-block{padding:28px 22px}.contact-box{grid-template-columns:1fr}.ws-inner{grid-template-columns:1fr}}
</style>

<div class="policy-page-content">
<div class="policy-hero">
  <div class="hero-inner">
    <div class="hero-badge">🛡️ Cam kết chất lượng</div>
    <h1 class="hero-title">Bảo hành &amp; <em>Bảo trì</em></h1>
    <div class="hero-meta">
      <div class="hero-meta-item"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg><span>Hiệu lực từ: <strong>01/01/2025</strong></span></div>
      <div class="hero-meta-item"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg><span>Cập nhật: <strong>01/03/2025</strong></span></div>
      <div class="hero-meta-item"><svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg><span>Phiên bản: <strong>v3.0</strong></span></div>
    </div>
  </div>
</div>

<!-- Key numbers strip -->
<div class="warranty-strip">
  <div class="ws-inner">
    <div class="ws-item"><div class="ws-val">24</div><div class="ws-label">Tháng bảo hành</div></div>
    <div class="ws-item"><div class="ws-val">24/7</div><div class="ws-label">Hotline hỗ trợ</div></div>
    <div class="ws-item"><div class="ws-val">4h</div><div class="ws-label">Phản hồi sự cố — HN/HCM</div></div>
    <div class="ws-item"><div class="ws-val">24h</div><div class="ws-label">Có mặt toàn quốc</div></div>
  </div>
</div>

<div class="policy-layout">
  <nav class="toc rv" aria-label="Mục lục">
    <div class="toc-header"><svg viewBox="0 0 24 24"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>Mục lục</div>
    <ul class="toc-list">
      <li class="toc-item"><a href="#s1">1. Thời hạn bảo hành</a></li>
      <li class="toc-item"><a href="#s2">2. Phạm vi bảo hành</a></li>
      <li class="toc-item"><a href="#s3">3. Điều kiện không bảo hành</a></li>
      <li class="toc-item"><a href="#s4">4. Quy trình yêu cầu bảo hành</a></li>
      <li class="toc-item"><a href="#s5">5. Dịch vụ bảo trì định kỳ</a></li>
      <li class="toc-item"><a href="#s6">6. Gói hỗ trợ kỹ thuật</a></li>
      <li class="toc-item"><a href="#s7">7. Linh kiện thay thế</a></li>
      <li class="toc-item"><a href="#s8">8. Cam kết SLA</a></li>
      <li class="toc-divider"></li>
      <li class="toc-item"><a href="#contact">Hotline kỹ thuật</a></li>
    </ul>
  </nav>

  <main class="policy-content rv d1">

    <div class="section-block" id="s1">
      <div class="sec-num">1</div>
      <h2 class="sec-title">Thời hạn Bảo hành theo loại Thiết bị</h2>
      <p class="sec-text">TavaLED cung cấp chính sách bảo hành toàn diện cho tất cả thiết bị do chúng tôi cung cấp và lắp đặt:</p>
      <table class="warranty-table">
        <thead><tr><th>Loại thiết bị</th><th>Thời gian bảo hành</th><th>Bảo hành tại chỗ</th></tr></thead>
        <tbody>
          <tr><td><strong>Màn hình LED Indoor (P1.5–P3)</strong></td><td>24 tháng</td><td><span class="badge-ok">✓ Có</span></td></tr>
          <tr><td><strong>Màn hình LED Outdoor (P3–P10)</strong></td><td>24 tháng</td><td><span class="badge-ok">✓ Có</span></td></tr>
          <tr><td><strong>LED Rental / Sân khấu</strong></td><td>12 tháng</td><td><span class="badge-ok">✓ Có</span></td></tr>
          <tr><td><strong>Loa, Amply, Mixer (chính hãng)</strong></td><td>12–24 tháng</td><td><span class="badge-ok">✓ Có</span></td></tr>
          <tr><td><strong>Moving Head, Par LED</strong></td><td>12 tháng</td><td><span class="badge-ok">✓ Có</span></td></tr>
          <tr><td><strong>Bộ điều khiển, card xử lý tín hiệu</strong></td><td>24 tháng</td><td><span class="badge-ok">✓ Có</span></td></tr>
          <tr><td><strong>Dây cáp, phụ kiện lắp đặt</strong></td><td>12 tháng</td><td><span class="badge-no">– Gửi về</span></td></tr>
        </tbody>
      </table>
      <div class="info-box"><p>Thời hạn bảo hành tính từ ngày <strong>ký biên bản nghiệm thu bàn giao</strong>. TavaLED cung cấp thẻ bảo hành điện tử ghi rõ ngày bắt đầu, ngày hết hạn và danh sách thiết bị được bảo hành.</p></div>
    </div>

    <div class="section-block" id="s2">
      <div class="sec-num">2</div>
      <h2 class="sec-title">Phạm vi Bảo hành — Những gì được bảo hành</h2>
      <div class="green-box"><p><strong>✅ Bảo hành miễn phí hoàn toàn</strong> khi thiết bị gặp sự cố do lỗi sản xuất, lỗi linh kiện, hoặc lỗi thi công lắp đặt bởi đội ngũ TavaLED.</p></div>
      <ul class="policy-list">
        <li>Hỏng hóc linh kiện điện tử do lỗi sản xuất (module LED, bo mạch, nguồn điện)</li>
        <li>Lỗi phần mềm điều khiển, firmware do nhà sản xuất phát hành bản vá</li>
        <li>Sự cố kết nối do lỗi cáp, connector được lắp bởi TavaLED</li>
        <li>Hỏng hóc do lắp đặt không đúng kỹ thuật của đội TavaLED</li>
        <li>Pixel chết vượt quá ngưỡng cho phép (>0.5% pixel bị lỗi)</li>
        <li>Màu sắc, độ sáng sai lệch quá 15% so với thông số kỹ thuật trong hợp đồng</li>
      </ul>
      <p class="sec-text"><strong>Chi phí bảo hành bao gồm:</strong> Linh kiện thay thế, nhân công kỹ thuật viên, phí vận chuyển đến công trình (trong bán kính 50km tính từ văn phòng TavaLED gần nhất).</p>
    </div>

    <div class="section-block" id="s3">
      <div class="sec-num">3</div>
      <h2 class="sec-title">Điều kiện Không được Bảo hành</h2>
      <div class="red-box"><p><strong>⚠️ Lưu ý:</strong> Bảo hành bị từ chối trong các trường hợp sau. TavaLED sẽ tiến hành sửa chữa theo giá dịch vụ thông thường.</p></div>
      <ul class="policy-list">
        <li>Hư hại do <strong>tác động vật lý</strong>: va đập, rơi vỡ, nứt vỡ, biến dạng</li>
        <li>Hư hại do <strong>thiên tai, sự kiện bất khả kháng</strong>: sét đánh trực tiếp, lũ lụt, hỏa hoạn</li>
        <li>Điện áp bất ổn vượt ngưỡng: &gt;±10% so với điện áp định mức (cần lắp UPS/AVR)</li>
        <li>Tự ý sửa chữa, thay linh kiện không phải do TavaLED hoặc đơn vị được ủy quyền</li>
        <li>Tẩy xóa, làm hỏng nhãn bảo hành hoặc số serial thiết bị</li>
        <li>Sử dụng sai mục đích, vượt công suất định mức hoặc không theo hướng dẫn vận hành</li>
        <li>Hư hao thông thường do sử dụng lâu ngày (mòn cơ học, giảm độ sáng tự nhiên theo thời gian)</li>
      </ul>
    </div>

    <div class="section-block" id="s4">
      <div class="sec-num">4</div>
      <h2 class="sec-title">Quy trình Yêu cầu Bảo hành</h2>
      <div class="claim-steps">
        <div class="claim-step">
          <div class="claim-step__ico">1</div>
          <div class="claim-step__body"><div class="claim-step__title">Báo cáo sự cố</div><div class="claim-step__desc">Gọi hotline 1900 1234 (phím 2) hoặc email support@tavaled.vn. Mô tả sự cố, gửi ảnh/video minh chứng.</div><div class="claim-step__time">Trong vòng 1 giờ</div></div>
        </div>
        <div class="claim-step">
          <div class="claim-step__ico">2</div>
          <div class="claim-step__body"><div class="claim-step__title">Tiếp nhận & Phân loại</div><div class="claim-step__desc">Kỹ thuật viên TavaLED đánh giá mức độ, xác nhận thiết bị còn trong bảo hành và phân loại ưu tiên xử lý.</div><div class="claim-step__time">2–4 giờ làm việc</div></div>
        </div>
        <div class="claim-step">
          <div class="claim-step__ico">3</div>
          <div class="claim-step__body"><div class="claim-step__title">Hỗ trợ từ xa</div><div class="claim-step__desc">Kỹ thuật viên thử hỗ trợ qua điện thoại, TeamViewer hoặc hướng dẫn video. Nhiều sự cố được giải quyết ngay bước này.</div><div class="claim-step__time">Trong ngày</div></div>
        </div>
        <div class="claim-step">
          <div class="claim-step__ico">4</div>
          <div class="claim-step__body"><div class="claim-step__title">Cử kỹ thuật viên đến hiện trường</div><div class="claim-step__desc">Nếu không giải quyết từ xa được, kỹ thuật viên có mặt tại Hà Nội/HCM trong 4 giờ, tỉnh khác trong 24 giờ.</div><div class="claim-step__time">4–24 giờ</div></div>
        </div>
        <div class="claim-step">
          <div class="claim-step__ico">5</div>
          <div class="claim-step__body"><div class="claim-step__title">Sửa chữa & Nghiệm thu</div><div class="claim-step__desc">Thay linh kiện, sửa chữa. Khách hàng xác nhận thiết bị hoạt động bình thường và ký biên bản bảo hành.</div><div class="claim-step__time">Tùy mức độ sự cố</div></div>
        </div>
      </div>
    </div>

    <div class="section-block" id="s5">
      <div class="sec-num">5</div>
      <h2 class="sec-title">Dịch vụ Bảo trì Định kỳ</h2>
      <p class="sec-text">Ngoài bảo hành, TavaLED khuyến nghị thực hiện bảo trì định kỳ để đảm bảo thiết bị luôn hoạt động tối ưu và kéo dài tuổi thọ:</p>
      <ul class="policy-list">
        <li><strong>Bảo trì 6 tháng/lần (trong bảo hành — miễn phí):</strong> Vệ sinh bụi bẩn, kiểm tra kết nối, cập nhật firmware, hiệu chỉnh màu sắc độ sáng</li>
        <li><strong>Bảo trì hàng năm (sau bảo hành — có phí):</strong> Kiểm tra toàn bộ hệ thống, thay thế linh kiện có dấu hiệu xuống cấp, vệ sinh chuyên sâu</li>
        <li><strong>Bảo trì trước sự kiện lớn:</strong> Dịch vụ kiểm tra khẩn cấp trước khai giảng, hội nghị, concert theo yêu cầu</li>
      </ul>
      <div class="info-box"><p>Đăng ký <strong>Hợp đồng Bảo trì Dài hạn</strong> để được ưu tiên lịch bảo trì, giảm 20% phí bảo trì ngoài bảo hành và ưu tiên hỗ trợ khẩn cấp. Liên hệ <a href="mailto:support@tavaled.vn">support@tavaled.vn</a>.</p></div>
    </div>

    <div class="section-block" id="s6">
      <div class="sec-num">6</div>
      <h2 class="sec-title">Gói Hỗ trợ Kỹ thuật</h2>
      <div class="support-tiers">
        <div class="tier-card tier-card--standard">
          <div class="tier-label">Gói tiêu chuẩn</div>
          <div class="tier-name">Standard</div>
          <ul class="tier-list">
            <li>Bảo hành 24 tháng</li>
            <li>Hotline trong giờ hành chính</li>
            <li>Hỗ trợ từ xa</li>
            <li>Bảo trì 6 tháng/lần</li>
            <li>Kỹ thuật viên trong 24h</li>
          </ul>
        </div>
        <div class="tier-card tier-card--priority">
          <div class="tier-label">Gói ưu tiên</div>
          <div class="tier-name">Priority</div>
          <ul class="tier-list">
            <li>Tất cả của Standard</li>
            <li>Hotline 24/7 riêng</li>
            <li>Kỹ thuật viên trong 4h</li>
            <li>Thiết bị dự phòng cho sự kiện</li>
            <li>Báo cáo sức khỏe hệ thống hàng quý</li>
          </ul>
        </div>
        <div class="tier-card tier-card--premium">
          <div class="tier-label">Gói cao cấp</div>
          <div class="tier-name">Premium</div>
          <ul class="tier-list">
            <li>Tất cả của Priority</li>
            <li>Kỹ thuật viên chuyên trách</li>
            <li>Phản hồi trong 1 giờ</li>
            <li>Bảo trì không giới hạn</li>
            <li>Ưu tiên linh kiện thay thế</li>
          </ul>
        </div>
      </div>
    </div>

    <div class="section-block" id="s7">
      <div class="sec-num">7</div>
      <h2 class="sec-title">Linh kiện Thay thế</h2>
      <ul class="policy-list">
        <li><strong>Trong bảo hành:</strong> Linh kiện chính hãng, miễn phí hoàn toàn. TavaLED dự trữ linh kiện phổ biến tại kho Hà Nội và TP.HCM</li>
        <li><strong>Sau bảo hành:</strong> Cung cấp linh kiện chính hãng theo giá thị trường + phí nhân công lắp đặt</li>
        <li><strong>Linh kiện đặc biệt:</strong> Thời gian đặt hàng 5–15 ngày làm việc. TavaLED thông báo rõ trước khi tiến hành</li>
        <li><strong>Cam kết tồn kho linh kiện:</strong> Duy trì linh kiện tương thích ít nhất <strong>7 năm</strong> sau ngày lắp đặt</li>
      </ul>
    </div>

    <div class="section-block" id="s8">
      <div class="sec-num">8</div>
      <h2 class="sec-title">Cam kết Mức Dịch vụ (SLA)</h2>
      <table class="warranty-table">
        <thead><tr><th>Loại sự cố</th><th>Thời gian phản hồi</th><th>Thời gian xử lý</th></tr></thead>
        <tbody>
          <tr><td><strong>Sự cố nghiêm trọng</strong> — Toàn bộ hệ thống ngừng hoạt động</td><td>30 phút</td><td>4–8 giờ</td></tr>
          <tr><td><strong>Sự cố cao</strong> — &gt;30% màn hình bị lỗi</td><td>1 giờ</td><td>8–24 giờ</td></tr>
          <tr><td><strong>Sự cố trung bình</strong> — Một phần màn hình/thiết bị lỗi</td><td>2 giờ</td><td>1–3 ngày</td></tr>
          <tr><td><strong>Sự cố thấp</strong> — Lỗi nhỏ không ảnh hưởng vận hành</td><td>1 ngày</td><td>3–7 ngày</td></tr>
        </tbody>
      </table>
      <div class="green-box"><p><strong>Cam kết bồi thường:</strong> Nếu TavaLED không đáp ứng SLA đã cam kết do lỗi chủ quan của chúng tôi, khách hàng được gia hạn bảo hành thêm 1 tháng cho mỗi lần vi phạm SLA.</p></div>
    </div>

    <div class="section-block" id="contact">
      <div class="sec-num" style="background:var(--navy)">🛠</div>
      <h2 class="sec-title">Hotline & Liên hệ Kỹ thuật</h2>
      <p class="sec-text">Đội ngũ kỹ thuật TavaLED hoạt động <strong>24/7</strong>. Khi cần hỗ trợ, vui lòng cung cấp: <em>số hợp đồng, tên thiết bị, mô tả sự cố và ảnh/video</em> để được xử lý nhanh nhất.</p>
      <div class="contact-box">
        <div class="contact-item"><div class="contact-item__ico"><svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 014.7 12.5a19.79 19.79 0 01-3.07-8.67A2 2 0 013.59 2h3a2 2 0 012 1.72 12 12 0 00.7 2.81 2 2 0 01-.45 2.11L7.91 9.91a16 16 0 006.1 6.1l.96-.96a2 2 0 012.11-.45 12 12 0 002.81.7A2 2 0 0122 16.92z"/></svg></div><div><div class="contact-item__lbl">Hotline kỹ thuật 24/7</div><div class="contact-item__val"><a href="tel:19001234">1900 1234</a> — Phím 2</div></div></div>
        <div class="contact-item"><div class="contact-item__ico"><svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></div><div><div class="contact-item__lbl">Email hỗ trợ</div><div class="contact-item__val"><a href="mailto:support@tavaled.vn">support@tavaled.vn</a></div></div></div>
        <div class="contact-item"><div class="contact-item__ico"><svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 01-2 2H7l-4 4V5a2 2 0 012-2h14a2 2 0 012 2z"/></svg></div><div><div class="contact-item__lbl">Zalo kỹ thuật</div><div class="contact-item__val">TavaLED Support OA</div></div></div>
        <div class="contact-item"><div class="contact-item__ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div><div><div class="contact-item__lbl">Giờ hỗ trợ</div><div class="contact-item__val">Hotline: 24/7<br>Kỹ thuật viên: 24h/ngày</div></div></div>
      </div>
    </div>

    <div class="last-updated">
      <span>© 2025 <strong>Công ty TNHH TavaLED</strong>. Mọi quyền được bảo lưu.</span>
      <span class="version-tag">Phiên bản 3.0 · 01/03/2025</span>
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