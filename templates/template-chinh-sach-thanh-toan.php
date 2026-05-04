<?php
/**
 * Template Name: Trang chính sách thanh toán
 */

get_header(); ?>
<style>
:root{
  --navy:#1c2857;--navy2:#162248;--navy3:#0f1835;
  --o:#f05a25;--odk:#c8451a;--olt:#fff3ee;--green:#16a34a;--green-lt:#f0fdf4;
  --w:#fff;--ink:#111827;--mid:#374151;--muted:#6b7280;
  --light:#f9fafb;--bdr:#e5e7eb;
  --ff:var(--font-body);
}
html{scroll-behavior:smooth}
.policy-page-content{font-family:var(--ff);background:var(--light);color:var(--ink);-webkit-font-smoothing:antialiased;font-size:15px;line-height:1.75}
.policy-page-content a{color:var(--o);text-decoration:none;transition:color .2s}
.policy-page-content a:hover{color:var(--odk)}

.policy-hero{background:linear-gradient(135deg,var(--navy3),var(--navy2));padding:64px 0 56px;position:relative;overflow:hidden}
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
.green-box{background:var(--green-lt);border:1px solid rgba(22,163,74,.2);border-left:3px solid var(--green);border-radius:8px;padding:16px 18px;margin:16px 0}
.green-box p{font-size:13.5px;color:var(--mid);line-height:1.75}
.green-box strong{color:var(--green);font-weight:700}

/* Payment phases */
.phases{display:flex;flex-direction:column;gap:0;margin:20px 0;position:relative}
.phases::before{content:'';position:absolute;left:19px;top:20px;bottom:20px;width:2px;background:var(--bdr)}
.phase{display:flex;align-items:flex-start;gap:16px;padding:16px 0}
.phase__step{width:40px;height:40px;border-radius:50%;flex-shrink:0;display:flex;align-items:center;justify-content:center;font-size:12px;font-weight:800;position:relative;z-index:1}
.phase__step--done{background:var(--green);color:#fff}
.phase__step--active{background:var(--o);color:#fff;box-shadow:0 0 0 4px rgba(240,90,37,.15)}
.phase__step--pending{background:var(--light);border:2px solid var(--bdr);color:var(--muted)}
.phase__body{padding-top:8px}
.phase__pct{display:inline-block;font-size:10px;font-weight:800;letter-spacing:.08em;color:var(--o);background:var(--olt);padding:2px 8px;border-radius:3px;margin-bottom:4px}
.phase__title{font-size:14.5px;font-weight:700;color:var(--navy);margin-bottom:3px}
.phase__desc{font-size:13px;color:var(--muted);line-height:1.65}

/* Payment methods */
.methods-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:12px;margin:16px 0}
.method-card{background:var(--light);border:1.5px solid var(--bdr);border-radius:9px;padding:16px;text-align:center;transition:border-color .2s}
.method-card:hover{border-color:rgba(28,40,87,.25)}
.method-ico{font-size:24px;margin-bottom:8px}
.method-name{font-size:13px;font-weight:700;color:var(--navy);margin-bottom:3px}
.method-detail{font-size:11.5px;color:var(--muted);line-height:1.55}

/* Contract process */
.contract-steps{display:grid;grid-template-columns:repeat(4,1fr);gap:8px;margin:20px 0}
.cs-item{text-align:center;padding:16px 10px;background:var(--light);border:1.5px solid var(--bdr);border-radius:9px;transition:border-color .2s}
.cs-item:hover{border-color:var(--navy)}
.cs-num{width:32px;height:32px;border-radius:50%;background:var(--navy);color:#fff;font-size:12px;font-weight:800;display:flex;align-items:center;justify-content:center;margin:0 auto 8px}
.cs-title{font-size:12px;font-weight:700;color:var(--navy);margin-bottom:3px}
.cs-desc{font-size:11px;color:var(--muted);line-height:1.5}

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

@media(max-width:900px){.policy-layout{grid-template-columns:1fr}.toc{position:relative;top:0}.methods-grid,.contract-steps{grid-template-columns:repeat(2,1fr)}}
@media(max-width:600px){.hero-inner,.policy-layout{padding-left:20px;padding-right:20px}.section-block{padding:28px 22px}.contact-box{grid-template-columns:1fr}.methods-grid{grid-template-columns:1fr}}
</style>

<div class="policy-page-content">


<div class="policy-hero">
  <div class="hero-inner">
    <div class="hero-badge">💳 Chính sách thương mại</div>
    <h1 class="hero-title">Thanh toán &amp; <em>Hợp đồng</em></h1>
    <div class="hero-meta">
      <div class="hero-meta-item"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg><span>Hiệu lực từ: <strong>01/01/2025</strong></span></div>
      <div class="hero-meta-item"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg><span>Cập nhật: <strong>01/03/2025</strong></span></div>
      <div class="hero-meta-item"><svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg><span>Phiên bản: <strong>v2.0</strong></span></div>
    </div>
  </div>
</div>

<div class="policy-layout">
  <nav class="toc rv" aria-label="Mục lục">
    <div class="toc-header"><svg viewBox="0 0 24 24"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>Mục lục</div>
    <ul class="toc-list">
      <li class="toc-item"><a href="#s1">1. Quy trình hợp đồng</a></li>
      <li class="toc-item"><a href="#s2">2. Điều khoản thanh toán</a></li>
      <li class="toc-item"><a href="#s3">3. Phương thức thanh toán</a></li>
      <li class="toc-item"><a href="#s4">4. Hóa đơn & Chứng từ</a></li>
      <li class="toc-item"><a href="#s5">5. Chính sách hủy hợp đồng</a></li>
      <li class="toc-item"><a href="#s6">6. Điều chỉnh hợp đồng</a></li>
      <li class="toc-item"><a href="#s7">7. Ngân sách nhà nước</a></li>
      <li class="toc-item"><a href="#s8">8. Xử lý tranh chấp thanh toán</a></li>
      <li class="toc-divider"></li>
      <li class="toc-item"><a href="#contact">Liên hệ tài chính</a></li>
    </ul>
  </nav>

  <main class="policy-content rv d1">

    <div class="section-block" id="s1">
      <div class="sec-num">1</div>
      <h2 class="sec-title">Quy trình ký kết Hợp đồng</h2>
      <p class="sec-text">TavaLED áp dụng quy trình hợp đồng minh bạch, có checklist từng bước để đảm bảo quyền lợi cả hai bên:</p>
      <div class="contract-steps">
        <div class="cs-item"><div class="cs-num">1</div><div class="cs-title">Khảo sát & Báo giá</div><div class="cs-desc">Khảo sát thực địa miễn phí, báo giá chi tiết trong 48h</div></div>
        <div class="cs-item"><div class="cs-num">2</div><div class="cs-title">Xác nhận đề xuất</div><div class="cs-desc">Khách hàng xác nhận phương án kỹ thuật và thương mại</div></div>
        <div class="cs-item"><div class="cs-num">3</div><div class="cs-title">Ký kết hợp đồng</div><div class="cs-desc">Hợp đồng song ngữ, đóng dấu đỏ hai bên</div></div>
        <div class="cs-item"><div class="cs-num">4</div><div class="cs-title">Đặt cọc & Triển khai</div><div class="cs-desc">Thanh toán đợt 1, bắt đầu mua vật tư và thi công</div></div>
      </div>
      <div class="green-box"><p><strong>Cam kết:</strong> TavaLED không triển khai thi công khi chưa có hợp đồng ký kết chính thức. Mọi thỏa thuận qua lời nói hoặc email đều phải được ghi nhận vào biên bản phụ lục hợp đồng.</p></div>
    </div>

    <div class="section-block" id="s2">
      <div class="sec-num">2</div>
      <h2 class="sec-title">Điều khoản Thanh toán theo giai đoạn</h2>
      <p class="sec-text">TavaLED áp dụng chính sách thanh toán theo tiến độ dự án, đảm bảo rủi ro được phân bổ công bằng:</p>
      <div class="phases">
        <div class="phase">
          <div class="phase__step phase__step--active">1</div>
          <div class="phase__body"><div class="phase__pct">30% — Đặt cọc</div><div class="phase__title">Sau khi ký hợp đồng</div><div class="phase__desc">Thanh toán trong vòng 3 ngày làm việc sau ký hợp đồng. TavaLED tiến hành đặt hàng vật tư, lên lịch thi công.</div></div>
        </div>
        <div class="phase">
          <div class="phase__step phase__step--active">2</div>
          <div class="phase__body"><div class="phase__pct">40% — Khi vật tư về kho</div><div class="phase__title">Trước khi bắt đầu lắp đặt</div><div class="phase__desc">Thanh toán khi toàn bộ vật tư đã về kho và sẵn sàng lắp đặt. TavaLED gửi ảnh/video xác nhận tình trạng hàng hóa.</div></div>
        </div>
        <div class="phase">
          <div class="phase__step phase__step--pending">3</div>
          <div class="phase__body"><div class="phase__pct">20% — Khi nghiệm thu</div><div class="phase__title">Sau khi hoàn thành lắp đặt</div><div class="phase__desc">Thanh toán sau khi hai bên cùng kiểm tra, nghiệm thu và ký biên bản nghiệm thu bàn giao.</div></div>
        </div>
        <div class="phase">
          <div class="phase__step phase__step--pending">4</div>
          <div class="phase__body"><div class="phase__pct">10% — Sau 30 ngày vận hành</div><div class="phase__title">Thanh toán cuối cùng</div><div class="phase__desc">Thanh toán sau 30 ngày vận hành ổn định. Đây là đợt bảo đảm chất lượng cuối cùng trước khi kết thúc hợp đồng.</div></div>
        </div>
      </div>
      <div class="info-box"><p><strong>Linh hoạt:</strong> Tỷ lệ thanh toán có thể điều chỉnh theo thỏa thuận với dự án đặc thù (dự án nhỏ dưới 50 triệu có thể áp dụng 50% — 50%, dự án chính phủ áp dụng quy trình đặc biệt tại Mục 7).</p></div>
    </div>

    <div class="section-block" id="s3">
      <div class="sec-num">3</div>
      <h2 class="sec-title">Phương thức Thanh toán</h2>
      <div class="methods-grid">
        <div class="method-card"><div class="method-ico">🏦</div><div class="method-name">Chuyển khoản ngân hàng</div><div class="method-detail">Phương thức ưu tiên. Hỗ trợ tất cả ngân hàng tại Việt Nam</div></div>
        <div class="method-card"><div class="method-ico">💳</div><div class="method-name">Thanh toán trực tuyến</div><div class="method-detail">VNPAY, MoMo, ZaloPay cho dự án dưới 100 triệu</div></div>
        <div class="method-card"><div class="method-ico">📋</div><div class="method-name">Ủy nhiệm chi</div><div class="method-detail">Dành cho cơ quan nhà nước, trường học, bệnh viện</div></div>
      </div>
      <p class="sec-text"><strong>Thông tin tài khoản nhận tiền:</strong></p>
      <div style="background:var(--light);border:1.5px solid var(--bdr);border-radius:9px;padding:20px;margin-top:12px">
        <div style="display:grid;grid-template-columns:1fr 1fr;gap:12px">
          <div><div style="font-size:9.5px;font-weight:700;letter-spacing:.16em;text-transform:uppercase;color:var(--muted);margin-bottom:4px">Tên tài khoản</div><div style="font-size:14px;font-weight:700;color:var(--navy)">CÔNG TY TNHH TAVALED</div></div>
          <div><div style="font-size:9.5px;font-weight:700;letter-spacing:.16em;text-transform:uppercase;color:var(--muted);margin-bottom:4px">Ngân hàng</div><div style="font-size:14px;font-weight:700;color:var(--navy)">Vietcombank — Chi nhánh Đống Đa</div></div>
          <div><div style="font-size:9.5px;font-weight:700;letter-spacing:.16em;text-transform:uppercase;color:var(--muted);margin-bottom:4px">Số tài khoản VND</div><div style="font-size:14px;font-weight:700;color:var(--o)">1234 5678 9012 345</div></div>
          <div><div style="font-size:9.5px;font-weight:700;letter-spacing:.16em;text-transform:uppercase;color:var(--muted);margin-bottom:4px">Nội dung chuyển khoản</div><div style="font-size:13px;color:var(--mid)">[Số HĐ] + [Tên công ty] + [Đợt thanh toán]</div></div>
        </div>
      </div>
    </div>

    <div class="section-block" id="s4">
      <div class="sec-num">4</div>
      <h2 class="sec-title">Hóa đơn và Chứng từ</h2>
      <ul class="policy-list">
        <li>TavaLED xuất <strong>hóa đơn điện tử (HĐĐT)</strong> theo Nghị định 123/2020/NĐ-CP cho mỗi đợt thanh toán</li>
        <li>Hóa đơn được gửi qua email trong vòng <strong>24 giờ</strong> sau khi xác nhận thanh toán thành công</li>
        <li>Hóa đơn đầy đủ: số HĐ, ngày xuất, mã số thuế hai bên, mô tả hàng hóa/dịch vụ, thuế VAT 10%</li>
        <li>Khách hàng có <strong>7 ngày</strong> để yêu cầu điều chỉnh hóa đơn kể từ ngày nhận</li>
        <li>Hồ sơ hợp đồng, biên bản nghiệm thu được lưu trữ 10 năm và cung cấp khi có yêu cầu</li>
      </ul>
      <div class="info-box"><p><strong>Thuế VAT:</strong> Giá báo giá là giá <strong>chưa bao gồm VAT</strong> trừ khi có ghi chú khác. VAT 10% sẽ được cộng vào tổng giá trị hóa đơn theo quy định.</p></div>
    </div>

    <div class="section-block" id="s5">
      <div class="sec-num">5</div>
      <h2 class="sec-title">Chính sách Hủy Hợp đồng</h2>
      <p class="sec-text">Trường hợp khách hàng có nhu cầu hủy hợp đồng sau khi đã ký kết:</p>
      <ul class="policy-list">
        <li><strong>Hủy trước khi nhập vật tư (trong 7 ngày):</strong> Hoàn lại 100% tiền đặt cọc</li>
        <li><strong>Hủy sau khi đã nhập vật tư:</strong> Khấu trừ chi phí vật tư đã mua + 5% phí xử lý hành chính</li>
        <li><strong>Hủy khi đang thi công:</strong> Khách hàng chịu chi phí vật tư, nhân công đã phát sinh + 10% phí hủy</li>
        <li><strong>Hủy do lỗi của TavaLED:</strong> Hoàn lại 100% tiền đã thanh toán + bồi thường thiệt hại trực tiếp</li>
      </ul>
      <div class="info-box"><p>Yêu cầu hủy hợp đồng phải được gửi bằng văn bản (email hoặc công văn) đến <a href="mailto:projects@tavaled.vn">projects@tavaled.vn</a>. Thời gian xử lý hoàn tiền: <strong>15 ngày làm việc</strong> kể từ khi hai bên ký biên bản thanh lý hợp đồng.</p></div>
    </div>

    <div class="section-block" id="s6">
      <div class="sec-num">6</div>
      <h2 class="sec-title">Điều chỉnh Hợp đồng (Change Order)</h2>
      <p class="sec-text">Trong quá trình thực hiện dự án, nếu có phát sinh ngoài phạm vi hợp đồng ban đầu:</p>
      <ul class="policy-list">
        <li>Mọi thay đổi yêu cầu phải được ghi nhận vào <strong>Phụ lục Hợp đồng</strong> có chữ ký xác nhận của cả hai bên trước khi thực hiện</li>
        <li>TavaLED sẽ cung cấp báo giá cho hạng mục phát sinh trong vòng <strong>24 giờ</strong></li>
        <li>Thay đổi nhỏ (dưới 5% giá trị hợp đồng) có thể xác nhận qua email với điều kiện ghi rõ nội dung và chi phí</li>
        <li>Không có phụ lục ký kết, TavaLED có quyền từ chối thực hiện hạng mục phát sinh</li>
      </ul>
    </div>

    <div class="section-block" id="s7">
      <div class="sec-num">7</div>
      <h2 class="sec-title">Quy trình đặc biệt — Ngân sách Nhà nước</h2>
      <p class="sec-text">TavaLED có kinh nghiệm làm việc với đơn vị sử dụng ngân sách nhà nước (trường học, bệnh viện, cơ quan hành chính) và hỗ trợ đầy đủ hồ sơ:</p>
      <ul class="policy-list">
        <li><strong>Hồ sơ đấu thầu:</strong> Cung cấp hồ sơ năng lực, tài liệu kỹ thuật, catalog, chứng nhận theo yêu cầu của từng gói thầu</li>
        <li><strong>Báo giá 3 bên:</strong> Hỗ trợ lấy 3 báo giá theo quy trình chỉ định thầu (nếu cần)</li>
        <li><strong>Thanh toán theo kho bạc:</strong> Chấp nhận thanh toán qua kho bạc nhà nước với thời hạn lên đến <strong>90 ngày</strong> sau nghiệm thu</li>
        <li><strong>Hóa đơn đặc biệt:</strong> Xuất hóa đơn theo đúng yêu cầu của đơn vị kế toán nhà nước</li>
      </ul>
      <div class="green-box"><p><strong>Ưu tiên:</strong> TavaLED có đội ngũ chuyên biệt hỗ trợ hồ sơ cho cơ quan nhà nước. Liên hệ <a href="mailto:projects@tavaled.vn">projects@tavaled.vn</a> để được tư vấn riêng.</p></div>
    </div>

    <div class="section-block" id="s8">
      <div class="sec-num">8</div>
      <h2 class="sec-title">Xử lý Tranh chấp Thanh toán</h2>
      <p class="sec-text">Khi có tranh chấp liên quan đến thanh toán:</p>
      <ul class="policy-list">
        <li>Gửi yêu cầu giải quyết bằng văn bản đến <a href="mailto:finance@tavaled.vn">finance@tavaled.vn</a></li>
        <li>TavaLED phản hồi trong vòng <strong>5 ngày làm việc</strong> với đề xuất giải quyết</li>
        <li>Hai bên thương lượng trong <strong>30 ngày</strong> để đi đến thỏa thuận</li>
        <li>Nếu không đạt được thỏa thuận, đưa ra Tòa án nhân dân thành phố Hà Nội xét xử</li>
      </ul>
      <p class="sec-text">Trong thời gian tranh chấp, TavaLED sẽ không thực hiện thêm bất kỳ hạng mục mới nào cho đến khi tranh chấp được giải quyết.</p>
    </div>

    <div class="section-block" id="contact">
      <div class="sec-num" style="background:var(--navy)">💳</div>
      <h2 class="sec-title">Liên hệ Phòng Tài chính — Hợp đồng</h2>
      <div class="contact-box">
        <div class="contact-item"><div class="contact-item__ico"><svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></div><div><div class="contact-item__lbl">Email hợp đồng</div><div class="contact-item__val"><a href="mailto:projects@tavaled.vn">projects@tavaled.vn</a></div></div></div>
        <div class="contact-item"><div class="contact-item__ico"><svg viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6"/></svg></div><div><div class="contact-item__lbl">Email thanh toán</div><div class="contact-item__val"><a href="mailto:finance@tavaled.vn">finance@tavaled.vn</a></div></div></div>
        <div class="contact-item"><div class="contact-item__ico"><svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 014.7 12.5a19.79 19.79 0 01-3.07-8.67A2 2 0 013.59 2h3a2 2 0 012 1.72 12 12 0 00.7 2.81 2 2 0 01-.45 2.11L7.91 9.91a16 16 0 006.1 6.1l.96-.96a2 2 0 012.11-.45 12 12 0 002.81.7A2 2 0 0122 16.92z"/></svg></div><div><div class="contact-item__lbl">Hotline hợp đồng</div><div class="contact-item__val"><a href="tel:0936 543 389">0936 543 389</a> — Phím 3</div></div></div>
        <div class="contact-item"><div class="contact-item__ico"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg></div><div><div class="contact-item__lbl">Giờ làm việc</div><div class="contact-item__val">T2–T6: 08:00–17:30</div></div></div>
      </div>
    </div>

    <div class="last-updated">
      <span>© 2025 <strong>Công ty TNHH TavaLED</strong>. Mọi quyền được bảo lưu.</span>
      <span class="version-tag">Phiên bản 2.0 · 01/03/2025</span>
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