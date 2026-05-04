<?php
/**
 * Template Name: Trang chính sách bảo mật
 */

get_header(); ?>
<style>
:root{
  --navy:#1c2857;--navy2:#162248;--navy3:#0f1835;
  --o:#f05a25;--odk:#c8451a;--olt:#fff3ee;
  --w:#fff;--ink:#111827;--mid:#374151;--muted:#6b7280;
  --light:#f9fafb;--bdr:#e5e7eb;
  --ff:var(--font-body);
}
html{scroll-behavior:smooth}
.policy-page-content{font-family:var(--ff);background:var(--light);color:var(--ink);-webkit-font-smoothing:antialiased;font-size:15px;line-height:1.75}
.policy-page-content a{color:var(--o);text-decoration:none;transition:color .2s}
.policy-page-content a:hover{color:var(--odk)}

.policy-hero{background:var(--navy3);padding:64px 0 56px;position:relative;overflow:hidden}
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
.toc-header{padding:16px 20px;background:var(--navy3);font-size:10px;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:rgba(255,255,255,.6);display:flex;align-items:center;gap:8px}
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

@media(max-width:900px){.policy-layout{grid-template-columns:1fr}.toc{position:relative;top:0}}
@media(max-width:600px){.hero-inner,.policy-layout{padding-left:20px;padding-right:20px}.section-block{padding:28px 22px}.contact-box{grid-template-columns:1fr}}
</style>

<div class="policy-page-content">


<div class="policy-hero">
  <div class="hero-inner">
    <div class="hero-badge">🔐 Bảo mật tuyệt đối</div>
    <h1 class="hero-title">Chính sách <em>Bảo mật</em></h1>
    <div class="hero-meta">
      <div class="hero-meta-item"><svg viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="18" rx="2"/><line x1="16" y1="2" x2="16" y2="6"/><line x1="8" y1="2" x2="8" y2="6"/><line x1="3" y1="10" x2="21" y2="10"/></svg><span>Hiệu lực từ: <strong>01/01/2025</strong></span></div>
      <div class="hero-meta-item"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg><span>Cập nhật: <strong>01/03/2025</strong></span></div>
      <div class="hero-meta-item"><svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg><span>Phiên bản: <strong>v2.1</strong></span></div>
    </div>
  </div>
</div>

<div class="policy-layout">
  <nav class="toc rv" aria-label="Mục lục">
    <div class="toc-header"><svg viewBox="0 0 24 24"><line x1="8" y1="6" x2="21" y2="6"/><line x1="8" y1="12" x2="21" y2="12"/><line x1="8" y1="18" x2="21" y2="18"/><line x1="3" y1="6" x2="3.01" y2="6"/><line x1="3" y1="12" x2="3.01" y2="12"/><line x1="3" y1="18" x2="3.01" y2="18"/></svg>Mục lục</div>
    <ul class="toc-list">
      <li class="toc-item"><a href="#s1">1. Mục đích thu thập</a></li>
      <li class="toc-item"><a href="#s2">2. Phạm vi thu thập</a></li>
      <li class="toc-item"><a href="#s3">3. Thời gian lưu trữ</a></li>
      <li class="toc-item"><a href="#s4">4. Đối tượng tiếp cận</a></li>
      <li class="toc-item"><a href="#s5">5. Đơn vị thu thập dữ liệu</a></li>
      <li class="toc-item"><a href="#s6">6. Quyền của chủ thể dữ liệu</a></li>
      <li class="toc-item"><a href="#s7">7. Cam kết bảo mật</a></li>
      <li class="toc-item"><a href="#s8">8. Giải quyết khiếu nại</a></li>
      <li class="toc-divider"></li>
      <li class="toc-item"><a href="#contact">Liên hệ bảo mật</a></li>
    </ul>
  </nav>

  <main class="policy-content rv d1">
    <div class="section-block" id="s1">
      <div class="sec-num">1</div>
      <h2 class="sec-title">Mục đích thu thập thông tin</h2>
      <p class="sec-text">TavaLED thu thập thông tin của khách hàng nhằm các mục đích chính đáng sau đây:</p>
      <ul class="policy-list">
        <li>Cung cấp báo giá, tư vấn giải pháp màn hình LED và thiết bị âm thanh theo yêu cầu.</li>
        <li>Ký kết và thực hiện các điều khoản trong hợp đồng kinh tế.</li>
        <li>Hỗ trợ kỹ thuật, bảo hành, bảo trì định kỳ cho các thiết bị đã cung cấp.</li>
        <li>Gửi thông báo về các cập nhật công nghệ mới hoặc chương trình ưu đãi đặc biệt dành cho khách hàng cũ.</li>
        <li>Nâng cao chất lượng trải nghiệm người dùng trên website www.tavaled.vn.</li>
      </ul>
    </div>

    <div class="section-block" id="s2">
      <div class="sec-num">2</div>
      <h2 class="sec-title">Phạm vi thu thập thông tin</h2>
      <p class="sec-text">Các loại dữ liệu chúng tôi có thể thu thập bao gồm:</p>
      <ul class="policy-list">
        <li><strong>Thông tin định danh:</strong> Họ tên, tên công ty/tổ chức, mã số thuế (đối với doanh nghiệp).</li>
        <li><strong>Thông tin liên hệ:</strong> Số điện thoại, địa chỉ email, địa chỉ lắp đặt thiết bị.</li>
        <li><strong>Dữ liệu kỹ thuật:</strong> Địa chỉ IP, loại trình duyệt, thời gian truy cập (thu thập tự động qua cookie để tối ưu website).</li>
      </ul>
      <div class="info-box"><p>TavaLED cam kết không thu thập các thông tin nhạy cảm của cá nhân như niềm tin tôn giáo, quan điểm chính trị, hoặc dữ liệu sức khỏe cá nhân.</p></div>
    </div>

    <div class="section-block" id="s3">
      <div class="sec-num">3</div>
      <h2 class="sec-title">Thời gian lưu trữ thông tin</h2>
      <p class="sec-text">Thông tin khách hàng được lưu trữ trong thời gian cần thiết để thực hiện mục đích đã nêu hoặc theo quy định của pháp luật:</p>
      <ul class="policy-list">
        <li>Thông tin tư vấn: Lưu trữ 02 năm kể từ lần liên hệ cuối cùng.</li>
        <li>Thông tin hợp đồng & bảo hành: Lưu trữ tối thiểu 10 năm theo quy định của Luật Kế toán và để phục vụ công tác bảo trì dài hạn.</li>
        <li>Dữ liệu cookie website: Lưu trữ tối đa 12 tháng hoặc cho đến khi người dùng xóa bộ nhớ trình duyệt.</li>
      </ul>
    </div>

    <div class="section-block" id="s4">
      <div class="sec-num">4</div>
      <h2 class="sec-title">Những ai được tiếp cận thông tin</h2>
      <p class="sec-text">TavaLED cam kết bảo mật tuyệt đối. Thông tin chỉ được tiếp cận bởi:</p>
      <ul class="policy-list">
        <li>Nhân viên nội bộ thuộc bộ phận Kinh doanh, Kỹ thuật và Kế toán của TavaLED.</li>
        <li>Đơn vị vận chuyển (chỉ cung cấp tên, SĐT và địa chỉ giao hàng).</li>
        <li>Cơ quan nhà nước có thẩm quyền khi có yêu cầu bằng văn bản chính thức theo quy định pháp luật.</li>
      </ul>
      <div class="info-box"><p><strong>Tuyệt đối không:</strong> Chúng tôi cam kết không bán, chia sẻ hoặc cho thuê thông tin khách hàng cho bất kỳ bên thứ ba nào vì mục đích quảng cáo.</p></div>
    </div>

    <div class="section-block" id="s5">
      <div class="sec-num">5</div>
      <h2 class="sec-title">Địa chỉ đơn vị thu thập và quản lý thông tin</h2>
      <p class="sec-text">Dữ liệu của bạn được quản lý bởi:</p>
      <div style="background:var(--light);border:1px solid var(--bdr);border-radius:10px;padding:24px">
        <p style="margin-bottom:8px"><strong>CÔNG TY CỔ PHẦN CÔNG NGHỆ TAVA VIỆT NAM</strong></p>
        <p style="font-size:14px;color:var(--mid);margin-bottom:4px">📍 Trụ sở: Lô BT36-06 KĐT Tràng Duệ, An Dương, Hải Phòng</p>
        <p style="font-size:14px;color:var(--mid);margin-bottom:4px">📞 Điện thoại: 0936 543 389</p>
        <p style="font-size:14px;color:var(--mid)">✉ Email: tuyen.tavaco@gmail.com</p>
      </div>
    </div>

    <div class="section-block" id="s6">
      <div class="sec-num">6</div>
      <h2 class="sec-title">Công cụ để Người dùng tiếp cận và chỉnh sửa dữ liệu</h2>
      <p class="sec-text">Theo Nghị định 13/2023/NĐ-CP, bạn có các quyền sau đối với dữ liệu cá nhân của mình:</p>
      <ul class="policy-list">
        <li>Yêu cầu kiểm tra, cập nhật hoặc điều chỉnh thông tin cá nhân.</li>
        <li>Yêu cầu tạm dừng hoặc hạn chế xử lý dữ liệu.</li>
        <li>Yêu cầu xóa dữ liệu (trừ trường hợp pháp luật quy định phải lưu trữ).</li>
      </ul>
      <p class="sec-text">Để thực hiện các quyền này, vui lòng gửi email về <strong>tuyen.tavaco@gmail.com</strong> hoặc gọi hotline <strong>0936 543 389</strong>. Chúng tôi sẽ phản hồi và xử lý trong vòng 72 giờ làm việc.</p>
    </div>

    <div class="section-block" id="s7">
      <div class="sec-num">7</div>
      <h2 class="sec-title">Cam kết bảo mật dữ liệu khách hàng</h2>
      <p class="sec-text">Chúng tôi áp dụng các biện pháp kỹ thuật và tổ chức nghiêm ngặt:</p>
      <ul class="policy-list">
        <li>Sử dụng giao thức HTTPS/SSL bảo mật dữ liệu truyền tải trên website.</li>
        <li>Hệ thống lưu trữ dữ liệu được bảo vệ bởi tường lửa và các lớp mã hóa hiện đại.</li>
        <li>Chỉ những nhân viên được phân quyền mới có thể tiếp cận dữ liệu khách hàng.</li>
      </ul>
    </div>

    <div class="section-block" id="s8">
      <div class="sec-num">8</div>
      <h2 class="sec-title">Cơ chế tiếp nhận và giải quyết khiếu nại</h2>
      <p class="sec-text">Trong trường hợp khách hàng phát hiện thông tin cá nhân bị sử dụng sai mục đích hoặc phạm vi đã thông báo:</p>
      <ul class="policy-list">
        <li><strong>Bước 1:</strong> Khách hàng gửi khiếu nại qua email hoặc hotline phía trên.</li>
        <li><strong>Bước 2:</strong> TavaLED tiến hành xác minh và làm việc trực tiếp với khách hàng trong vòng 03 ngày làm việc.</li>
        <li><strong>Bước 3:</strong> Đưa ra biện pháp khắc phục (xin lỗi, điều chỉnh dữ liệu, bồi thường nếu có thiệt hại thực tế).</li>
      </ul>
    </div>

    <div class="section-block" id="contact">
      <div class="sec-num" style="background:var(--navy2)">🛡️</div>
      <h2 class="sec-title">Liên hệ về Bảo mật</h2>
      <div class="contact-box">
        <div class="contact-item"><div class="contact-item__ico"><svg viewBox="0 0 24 24"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg></div><div><div class="contact-item__lbl">Phòng An ninh dữ liệu</div><div class="contact-item__val">Công ty Tava Việt Nam</div></div></div>
        <div class="contact-item"><div class="contact-item__ico"><svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></div><div><div class="contact-item__lbl">Email hỗ trợ</div><div class="contact-item__val"><a href="mailto:tuyen.tavaco@gmail.com">tuyen.tavaco@gmail.com</a></div></div></div>
      </div>
    </div>

    <div class="last-updated">
      <span>© 2025 <strong>Công ty Cổ phần Công nghệ Tava Việt Nam</strong>.</span>
      <span class="version-tag">Phiên bản 2.1 · 01/03/2025</span>
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