<?php
/**
 * Template Name: Trang tuyển dụng
 */

get_header(); ?>

<style>
.page-template-template-tuyen-dung-php *, .page-template-template-tuyen-dung-php *::before, .page-template-template-tuyen-dung-php *::after{box-sizing:border-box;margin:0;padding:0}

:root{
  --navy:#1c2857;--navy2:#162248;--navy3:#0f1835;
  --o:#f05a25;--odk:#c8451a;--olt:#fff3ee;
  --w:#fff;--ink:#111827;--mid:#374151;--muted:#6b7280;
  --light:#f9fafb;--bdr:#e5e7eb;
  --ff:'Mona Sans','Mona-Sans',sans-serif;
}
html{scroll-behavior:smooth}
body{font-family:var(--ff);background:var(--w);color:var(--ink);-webkit-font-smoothing:antialiased;overflow-x:hidden;cursor:none}

#cur-d,#cur-r{position:fixed;border-radius:50%;pointer-events:none;z-index:9999;transform:translate(-50%,-50%)}
#cur-d{width:7px;height:7px;background:var(--o)}
#cur-r{width:36px;height:36px;border:1.5px solid rgba(240,90,37,.4);transition:width .3s,height .3s,border-color .3s}
body:has(a:hover) #cur-r,body:has(button:hover) #cur-r{width:50px;height:50px;border-color:var(--o)}

/* ── HERO ── */
.hero{min-height:85vh;background:var(--navy);position:relative;overflow:hidden;display:flex;align-items:flex-end}
.hero__imgs{position:absolute;inset:0;display:grid;grid-template-columns:1.4fr 1fr 1fr;gap:2px}
.hero__img{overflow:hidden}
.hero__img img{width:100%;height:100%;object-fit:cover;animation:zz 14s ease-in-out infinite alternate}
.hero__img:nth-child(2) img{animation-delay:-5s}
.hero__img:nth-child(3) img{animation-delay:-9s}
@keyframes zz{from{transform:scale(1.1)}to{transform:scale(1.02)}}
.hero__fog{position:absolute;inset:0;z-index:1;background:linear-gradient(180deg,rgba(15,24,53,.6) 0%,transparent 32%,rgba(15,24,53,.55) 58%,rgba(15,24,53,.97) 100%),linear-gradient(90deg,rgba(15,24,53,.4) 0%,transparent 60%)}
.hero__grid{position:absolute;inset:0;z-index:1;background-image:linear-gradient(rgba(255,255,255,.02) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.02) 1px,transparent 1px);background-size:52px 52px;pointer-events:none}
.hero__bar{position:absolute;bottom:0;left:0;right:0;height:3px;z-index:3;background:linear-gradient(90deg,var(--o),var(--odk) 45%,rgba(240,90,37,.2))}

.hero__body{position:relative;z-index:2;padding:0 56px 72px;max-width:1320px;margin:0 auto;width:100%;display:grid;grid-template-columns:1fr 1fr;gap:72px;align-items:flex-end}

.hero__tag{display:inline-flex;align-items:center;gap:9px;font-size:9.5px;font-weight:700;letter-spacing:.24em;text-transform:uppercase;color:var(--o);padding:4px 12px;background:rgba(240,90,37,.1);border:1px solid rgba(240,90,37,.28);border-radius:4px;margin-bottom:20px;opacity:0;animation:su .5s .1s ease forwards}
.hero__h1{font-family:var(--ff);font-weight:800;font-size:clamp(2.8rem,5.5vw,5.5rem);letter-spacing:-.06em;color:#fff;line-height:.92;margin-bottom:22px;opacity:0;animation:su .8s .25s cubic-bezier(.16,1,.3,1) forwards}
.hero__h1 em{font-style:italic;font-weight:300;color:var(--o);display:block}
.hero__desc{font-size:15px;font-weight:300;color:rgba(255,255,255,.5);line-height:1.85;max-width:400px;margin-bottom:32px;opacity:0;animation:su .6s .42s ease forwards}
.hero__actions{display:flex;gap:12px;flex-wrap:wrap;opacity:0;animation:su .6s .58s ease forwards}
.btn-o{display:inline-flex;align-items:center;gap:8px;padding:13px 26px;background:var(--o);color:#fff;font-family:var(--ff);font-size:12.5px;font-weight:700;letter-spacing:.05em;text-transform:uppercase;border-radius:8px;text-decoration:none;box-shadow:0 4px 20px rgba(240,90,37,.3);transition:background .18s,transform .15s}
.btn-o:hover{background:var(--odk);transform:translateY(-2px)}
.btn-o svg{width:13px;height:13px;stroke:currentColor;fill:none;stroke-width:2}
.btn-ghost{display:inline-flex;align-items:center;gap:8px;padding:12px 20px;background:transparent;border:1.5px solid rgba(255,255,255,.25);color:rgba(255,255,255,.75);font-family:var(--ff);font-size:12.5px;font-weight:600;text-transform:uppercase;letter-spacing:.04em;border-radius:8px;text-decoration:none;transition:border-color .2s,color .2s,background .2s}
.btn-ghost:hover{border-color:rgba(255,255,255,.55);color:#fff;background:rgba(255,255,255,.06)}

/* Right — open positions summary */
.hero__right{opacity:0;animation:su .7s .55s ease forwards}
.open-count{font-family:var(--ff);font-size:clamp(4rem,8vw,7rem);font-weight:800;letter-spacing:-.08em;color:#fff;line-height:.85}
.open-count span{color:var(--o)}
.open-label{font-size:11px;font-weight:600;letter-spacing:.18em;text-transform:uppercase;color:rgba(255,255,255,.38);margin-top:8px;margin-bottom:28px}
.dept-pills{display:flex;flex-direction:column;gap:7px}
.dept-pill{display:flex;align-items:center;justify-content:space-between;padding:9px 14px;background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.09);border-radius:7px;cursor:pointer;transition:background .18s,border-color .18s;text-decoration:none}
.dept-pill:hover{background:rgba(240,90,37,.12);border-color:rgba(240,90,37,.3)}
.dept-pill__name{font-size:12.5px;font-weight:600;color:rgba(255,255,255,.7)}
.dept-pill__count{font-size:11px;font-weight:700;color:var(--o);background:rgba(240,90,37,.15);padding:2px 8px;border-radius:10px}

/* ── WHY TAVALED ── */
.why{padding:88px 0;background:var(--light)}
.inner{max-width:1320px;margin:0 auto;padding:0 56px}
.sec-eyebrow{display:inline-flex;align-items:center;gap:8px;font-size:9.5px;font-weight:700;letter-spacing:.22em;text-transform:uppercase;color:var(--o);margin-bottom:12px}
.sec-eyebrow::before{content:'';display:block;width:22px;height:2px;background:var(--o);border-radius:2px}
.sec-h{font-family:var(--ff);font-weight:800;font-size:clamp(1.9rem,3.5vw,3rem);letter-spacing:-.05em;color:var(--navy);line-height:1.04;margin-bottom:14px}
.sec-h em{font-style:italic;font-weight:300;color:var(--o)}
.sec-h--w{color:#fff}
.sec-head{display:flex;align-items:flex-end;justify-content:space-between;gap:32px;margin-bottom:52px;flex-wrap:wrap}
.sec-desc{font-size:14.5px;color:var(--muted);line-height:1.8;max-width:440px}

.why-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px}
.why-card{background:var(--w);border:2px solid var(--bdr);border-radius:12px;padding:28px;transition:border-color .22s,transform .3s cubic-bezier(.16,1,.3,1),box-shadow .26s;position:relative;overflow:hidden}
.why-card::after{content:'';position:absolute;bottom:0;left:0;right:0;height:3px;background:var(--o);transform:scaleX(0);transform-origin:left;transition:transform .3s cubic-bezier(.16,1,.3,1)}
.why-card:hover{border-color:rgba(28,40,87,.18);transform:translateY(-5px);box-shadow:0 18px 50px rgba(28,40,87,.08)}
.why-card:hover::after{transform:scaleX(1)}
.why-card__ico{font-size:28px;margin-bottom:16px}
.why-card__title{font-family:var(--ff);font-weight:800;font-size:1.05rem;letter-spacing:-.03em;color:var(--navy);margin-bottom:8px}
.why-card__desc{font-size:13.5px;color:var(--muted);line-height:1.7}

/* ── CULTURE ── */
.culture{padding:0}
.culture-grid{display:grid;grid-template-columns:repeat(4,1fr);grid-auto-rows:280px;gap:4px}
.cult-cell{position:relative;overflow:hidden;cursor:default}
.cult-cell img{width:100%;height:100%;object-fit:cover;transition:filter .5s,transform .6s cubic-bezier(.16,1,.3,1)}
.cult-cell:hover img{transform:scale(1.06)}
.cult-cell__over{position:absolute;inset:0;background:linear-gradient(180deg,transparent 35%,rgba(15,24,53,.92) 100%)}
.cult-cell__body{position:absolute;bottom:0;left:0;right:0;padding:22px 20px 18px}
.cult-cell__tag{font-size:9px;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:var(--o);margin-bottom:5px}
.cult-cell__title{font-family:var(--ff);font-weight:800;font-size:1rem;letter-spacing:-.03em;color:#fff;line-height:1.2}
.cult-cell--wide{grid-column:span 2}

/* ── JOBS ── */
.jobs{padding:88px 0;background:var(--w)}
.jobs-filters{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:32px}
.filter-btn{padding:8px 18px;border-radius:7px;border:1.5px solid var(--bdr);background:var(--light);font-family:var(--ff);font-size:12.5px;font-weight:600;color:var(--muted);cursor:pointer;transition:all .2s}
.filter-btn:hover{border-color:var(--navy);color:var(--navy);background:var(--w)}
.filter-btn.active{background:var(--navy);border-color:var(--navy);color:#fff;box-shadow:0 4px 16px rgba(28,40,87,.18)}

.jobs-grid{display:flex;flex-direction:column;gap:10px}
.job-card{background:var(--light);border:2px solid var(--bdr);border-radius:11px;padding:24px 28px;display:flex;align-items:center;gap:24px;text-decoration:none;transition:border-color .22s,background .2s,transform .25s;cursor:pointer}
.job-card:hover{border-color:rgba(28,40,87,.25);background:var(--w);transform:translateX(4px)}
.job-card.hidden{display:none}

.job-card__dept-ico{width:48px;height:48px;border-radius:11px;flex-shrink:0;display:flex;align-items:center;justify-content:center;font-size:20px}
.dept-kt{background:#eff6ff}.dept-kd{background:#f0fdf4}.dept-da{background:var(--olt)}.dept-it{background:#f5f3ff}.dept-hr{background:#fdf2f8}

.job-card__info{flex:1;min-width:0}
.job-card__title{font-family:var(--ff);font-weight:800;font-size:1rem;letter-spacing:-.03em;color:var(--navy);margin-bottom:5px;transition:color .18s}
.job-card:hover .job-card__title{color:var(--o)}
.job-card__meta{display:flex;align-items:center;gap:14px;flex-wrap:wrap}
.job-meta-tag{display:inline-flex;align-items:center;gap:5px;font-size:11.5px;font-weight:500;color:var(--muted)}
.job-meta-tag svg{width:12px;height:12px;stroke:currentColor;fill:none;stroke-width:2;opacity:.6}
.job-card__dept-tag{flex-shrink:0;font-size:10px;font-weight:700;letter-spacing:.12em;text-transform:uppercase;padding:3px 10px;border-radius:4px;color:var(--navy2);background:rgba(28,40,87,.08)}
.job-card__arrow{width:18px;height:18px;stroke:var(--muted);fill:none;stroke-width:2;flex-shrink:0;transition:stroke .18s,transform .18s}
.job-card:hover .job-card__arrow{stroke:var(--o);transform:translateX(4px)}

.jobs-empty{display:none;text-align:center;padding:48px 0;color:var(--muted);font-size:14px}
.jobs-empty.show{display:block}

/* ── PROCESS ── */
.process{padding:88px 0;background:var(--navy3);position:relative;overflow:hidden}
.process::before{content:'';position:absolute;inset:0;background-image:linear-gradient(rgba(255,255,255,.02) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.02) 1px,transparent 1px);background-size:52px 52px}
.process::after{content:'';position:absolute;top:-100px;right:-100px;width:380px;height:380px;border-radius:50%;background:radial-gradient(circle,rgba(240,90,37,.15) 0%,transparent 70%)}
.steps-row{display:grid;grid-template-columns:repeat(4,1fr);gap:0;position:relative;z-index:1;margin-top:52px}
.steps-row::before{content:'';position:absolute;top:32px;left:12%;right:12%;height:2px;background:linear-gradient(90deg,var(--o),rgba(240,90,37,.15))}
.step{text-align:center;padding:0 20px;position:relative;z-index:1}
.step__dot{width:64px;height:64px;border-radius:50%;background:var(--navy2);border:2px solid rgba(255,255,255,.1);display:flex;align-items:center;justify-content:center;margin:0 auto 18px;font-size:18px;transition:border-color .25s,background .25s}
.step:hover .step__dot{border-color:var(--o);background:rgba(240,90,37,.12)}
.step__title{font-size:13.5px;font-weight:700;color:#fff;margin-bottom:6px}
.step__desc{font-size:12px;color:rgba(255,255,255,.42);line-height:1.6}
.step__time{display:inline-block;font-size:10px;font-weight:700;letter-spacing:.08em;color:var(--o);background:rgba(240,90,37,.12);padding:2px 8px;border-radius:3px;margin-top:8px}

/* ── CTA ── */
.cta{background:var(--o);padding:56px 0;position:relative;overflow:hidden}
.cta::before{content:'';position:absolute;inset:0;background:linear-gradient(135deg,var(--o),var(--odk))}
.cta__inner{max-width:1320px;margin:0 auto;padding:0 56px;position:relative;z-index:1;display:flex;align-items:center;justify-content:space-between;gap:32px;flex-wrap:wrap}
.cta__h{font-family:var(--ff);font-weight:800;font-size:clamp(1.6rem,3vw,2.5rem);letter-spacing:-.05em;color:#fff;line-height:1.05}
.cta__h em{font-style:italic;font-weight:300}
.cta__sub{font-size:14px;color:rgba(255,255,255,.75);margin-top:6px}
.btn-w{display:inline-flex;align-items:center;gap:8px;padding:13px 28px;background:#fff;color:var(--navy);font-family:var(--ff);font-size:12.5px;font-weight:700;letter-spacing:.04em;text-transform:uppercase;border-radius:8px;text-decoration:none;box-shadow:0 4px 20px rgba(0,0,0,.14);transition:transform .15s,box-shadow .2s}
.btn-w:hover{transform:translateY(-2px);box-shadow:0 8px 28px rgba(0,0,0,.2)}
.btn-w svg{width:13px;height:13px;stroke:currentColor;fill:none;stroke-width:2}

@keyframes su{from{opacity:0;transform:translateY(18px)}to{opacity:1;transform:translateY(0)}}
.rv{opacity:0;transform:translateY(22px);transition:opacity .7s cubic-bezier(.16,1,.3,1),transform .7s cubic-bezier(.16,1,.3,1)}
.rv.in{opacity:1;transform:translateY(0)}
.d1{transition-delay:.08s}.d2{transition-delay:.16s}.d3{transition-delay:.24s}

@media(max-width:1100px){.hero__body,.why-grid{grid-template-columns:1fr}.culture-grid{grid-template-columns:repeat(2,1fr)}.cult-cell--wide{grid-column:span 1}.steps-row{grid-template-columns:repeat(2,1fr)}.steps-row::before{display:none}}
@media(max-width:768px){.hero__body,.inner,.cta__inner{padding-left:20px;padding-right:20px}.why-grid{grid-template-columns:1fr}.culture-grid{grid-template-columns:1fr 1fr}.steps-row{grid-template-columns:1fr}.job-card{flex-wrap:wrap;gap:12px}}
</style>
<div id="cur-d"></div>
<div id="cur-r"></div>

<!-- ══ HERO ══ -->
<section class="hero">
  <div class="hero__imgs" aria-hidden="true">
 <div class="hero__img"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0002_TavaLED_Hinh_Anh.jpg" alt="Đội ngũ TavaLED"></div>
 <div class="hero__img"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0003_TavaLED_Hinh_Anh.jpg" alt="Làm việc nhóm"></div>
 <div class="hero__img"><img src="https://tavaled.vn/wp-content/uploads/2026/03/0004_TavaLED_Hinh_Anh.jpg" alt="Dự án thực tế"></div>
  </div>
  <div class="hero__fog" aria-hidden="true"></div>
  <div class="hero__grid" aria-hidden="true"></div>
  <div class="hero__bar" aria-hidden="true"></div>

  <div class="hero__body">
    <div>
      <div class="hero__tag">Gia nhập TavaLED</div>
      <h1 class="hero__h1">Xây dựng<br><em>tương lai cùng nhau</em></h1>
      <p class="hero__desc">Chúng tôi không tìm người làm thuê. Chúng tôi tìm người muốn xây dựng — những kỹ sư, chuyên gia yêu nghề sẵn sàng để lại dấu ấn thực sự.</p>
      <div class="hero__actions">
        <a href="#jobs" class="btn-o">
          <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="8"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
          Xem vị trí đang tuyển
        </a>
        <a href="mailto:hr@tavaled.vn" class="btn-ghost">Gửi CV tự do</a>
      </div>
    </div>
    <div class="hero__right">
      <div class="open-count"><span class="cnt" data-to="9">0</span></div>
      <div class="open-label">Vị trí đang mở</div>
      <div class="dept-pills">
        <a href="#jobs" class="dept-pill" onclick="filterJobs('ky-thuat');return false"><span class="dept-pill__name">⚡ Kỹ thuật & Thi công</span><span class="dept-pill__count">4</span></a>
        <a href="#jobs" class="dept-pill" onclick="filterJobs('kinh-doanh');return false"><span class="dept-pill__name">💼 Kinh doanh Dự án</span><span class="dept-pill__count">2</span></a>
        <a href="#jobs" class="dept-pill" onclick="filterJobs('du-an');return false"><span class="dept-pill__name">📋 Quản lý Dự án</span><span class="dept-pill__count">2</span></a>
        <a href="#jobs" class="dept-pill" onclick="filterJobs('it');return false"><span class="dept-pill__name">💻 IT & Marketing</span><span class="dept-pill__count">1</span></a>
      </div>
    </div>
  </div>
</section>

<!-- ══ WHY TAVALED ══ -->
<section class="why">
  <div class="inner">
    <div class="sec-head rv">
      <div>
        <div class="sec-eyebrow">Tại sao TavaLED</div>
        <h2 class="sec-h">Nhiều hơn một <em>công việc</em></h2>
      </div>
      <p class="sec-desc">TavaLED là nơi kỹ năng được trọng dụng, đóng góp được ghi nhận và sự phát triển cá nhân là chiến lược của công ty.</p>
    </div>
    <div class="why-grid">
      <div class="why-card rv d1"><div class="why-card__ico">🚀</div><div class="why-card__title">Dự án thực chiến từ ngày đầu</div><div class="why-card__desc">Không có giai đoạn "học việc" mờ nhạt. Bạn tham gia dự án thực ngay tuần đầu, được mentoring trực tiếp từ kỹ thuật viên cấp cao.</div></div>
      <div class="why-card rv d2"><div class="why-card__ico">📈</div><div class="why-card__title">Lộ trình phát triển rõ ràng</div><div class="why-card__desc">4 cấp độ kỹ thuật viên, lộ trình thăng tiến 12–18 tháng/bậc. Không có "trần thủy tinh" — năng lực là tiêu chí duy nhất.</div></div>
      <div class="why-card rv d3"><div class="why-card__ico">🌍</div><div class="why-card__title">Tiếp xúc công nghệ đỉnh thế giới</div><div class="why-card__desc">Làm việc trực tiếp với thiết bị từ Robe, JBL, Absen, Novastar. Cơ hội tham gia triển lãm quốc tế ISE, InfoComm hàng năm.</div></div>
      <div class="why-card rv d1"><div class="why-card__ico">💰</div><div class="why-card__title">Thu nhập xứng đáng với năng lực</div><div class="why-card__desc">Lương cạnh tranh + hoa hồng dự án + thưởng hiệu suất. Kỹ thuật viên cấp cao có thu nhập tổng 25–40 triệu/tháng.</div></div>
      <div class="why-card rv d2"><div class="why-card__ico">🏥</div><div class="why-card__title">Phúc lợi toàn diện</div><div class="why-card__desc">BHYT/BHXH đầy đủ, bảo hiểm tai nạn cá nhân, khám sức khỏe định kỳ, team building 2 lần/năm, quà sinh nhật.</div></div>
      <div class="why-card rv d3"><div class="why-card__ico">🎓</div><div class="why-card__title">Đào tạo không giới hạn</div><div class="why-card__desc">Ngân sách đào tạo cá nhân 5 triệu/năm. Hỗ trợ thi chứng chỉ quốc tế CTS, InfoComm. Thư viện tài liệu kỹ thuật nội bộ.</div></div>
    </div>
  </div>
</section>

<!-- ══ CULTURE PHOTOS ══ -->
<section class="culture" aria-label="Văn hóa TavaLED">
  <div class="culture-grid">
    <div class="cult-cell cult-cell--wide">
 <img src="https://tavaled.vn/wp-content/uploads/2026/03/0005_TavaLED_Hinh_Anh.jpg" alt="Đội ngũ TavaLED làm việc">
      <div class="cult-cell__over"></div>
      <div class="cult-cell__body"><div class="cult-cell__tag">Văn hóa làm việc</div><div class="cult-cell__title">Mỗi dự án là cơ hội học hỏi — không có lần nào giống lần nào</div></div>
    </div>
    <div class="cult-cell">
 <img src="https://tavaled.vn/wp-content/uploads/2026/03/0006_TavaLED_Hinh_Anh.jpg" alt="Họp nhóm">
      <div class="cult-cell__over"></div>
      <div class="cult-cell__body"><div class="cult-cell__tag">Teamwork</div><div class="cult-cell__title">Ý kiến của mọi người đều được lắng nghe</div></div>
    </div>
    <div class="cult-cell">
 <img src="https://tavaled.vn/wp-content/uploads/2026/03/0007_TavaLED_Hinh_Anh.jpg" alt="Hiện trường">
      <div class="cult-cell__over"></div>
      <div class="cult-cell__body"><div class="cult-cell__tag">Hiện trường</div><div class="cult-cell__title">Niềm tự hào khi màn hình sáng lên lần đầu</div></div>
    </div>
    <div class="cult-cell">
 <img src="https://tavaled.vn/wp-content/uploads/2026/03/0008_TavaLED_Hinh_Anh.jpg" alt="Đào tạo">
      <div class="cult-cell__over"></div>
      <div class="cult-cell__body"><div class="cult-cell__tag">Đào tạo</div><div class="cult-cell__title">Học từ dự án thực, không từ sách vở</div></div>
    </div>
    <div class="cult-cell">
 <img src="https://tavaled.vn/wp-content/uploads/2026/03/0009_TavaLED_Hinh_Anh.jpg" alt="Công nghệ">
      <div class="cult-cell__over"></div>
      <div class="cult-cell__body"><div class="cult-cell__tag">Công nghệ</div><div class="cult-cell__title">Luôn làm việc với thiết bị tốt nhất</div></div>
    </div>
  </div>
</section>

<!-- ══ JOB LISTINGS ══ -->
<section class="jobs" id="jobs">
  <div class="inner">
    <div class="sec-head rv">
      <div>
        <div class="sec-eyebrow">Vị trí đang tuyển</div>
        <h2 class="sec-h">Tìm <em>vị trí của bạn</em></h2>
      </div>
    </div>
    <div class="jobs-filters rv d1">
      <button class="filter-btn active" onclick="filterJobs('all',this)">Tất cả (9)</button>
      <button class="filter-btn" onclick="filterJobs('ky-thuat',this)">⚡ Kỹ thuật (4)</button>
      <button class="filter-btn" onclick="filterJobs('kinh-doanh',this)">💼 Kinh doanh (2)</button>
      <button class="filter-btn" onclick="filterJobs('du-an',this)">📋 Quản lý dự án (2)</button>
      <button class="filter-btn" onclick="filterJobs('it',this)">💻 IT & Marketing (1)</button>
    </div>
    <div class="jobs-grid rv d2" id="jobsList">

      <a href="mailto:hr@tavaled.vn?subject=Ứng tuyển: Kỹ thuật viên LED cấp cao" class="job-card" data-dept="ky-thuat">
        <div class="job-card__dept-ico dept-kt">⚡</div>
        <div class="job-card__info">
          <div class="job-card__title">Kỹ thuật viên LED — Cấp cao (Senior)</div>
          <div class="job-card__meta">
            <span class="job-meta-tag"><svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>Hà Nội</span>
            <span class="job-meta-tag"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>Full-time</span>
            <span class="job-meta-tag">💰 22–35 triệu/tháng</span>
          </div>
        </div>
        <span class="job-card__dept-tag">Kỹ thuật</span>
        <svg class="job-card__arrow" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
      </a>

      <a href="mailto:hr@tavaled.vn?subject=Ứng tuyển: Kỹ thuật viên Âm thanh" class="job-card" data-dept="ky-thuat">
        <div class="job-card__dept-ico dept-kt">🔊</div>
        <div class="job-card__info">
          <div class="job-card__title">Kỹ thuật viên Âm thanh Chuyên nghiệp</div>
          <div class="job-card__meta">
            <span class="job-meta-tag"><svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>TP. Hồ Chí Minh</span>
            <span class="job-meta-tag"><svg viewBox="0 0 24 24"><circle cx="12" cy="12" r="10"/><polyline points="12 6 12 12 16 14"/></svg>Full-time</span>
            <span class="job-meta-tag">💰 18–28 triệu/tháng</span>
          </div>
        </div>
        <span class="job-card__dept-tag">Kỹ thuật</span>
        <svg class="job-card__arrow" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
      </a>

      <a href="mailto:hr@tavaled.vn?subject=Ứng tuyển: Kỹ sư điều khiển ánh sáng" class="job-card" data-dept="ky-thuat">
        <div class="job-card__dept-ico dept-kt">💡</div>
        <div class="job-card__info">
          <div class="job-card__title">Kỹ sư Điều khiển Ánh sáng (Lighting Designer)</div>
          <div class="job-card__meta">
            <span class="job-meta-tag"><svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>Hà Nội / TP.HCM</span>
            <span class="job-meta-tag">💰 20–32 triệu/tháng</span>
          </div>
        </div>
        <span class="job-card__dept-tag">Kỹ thuật</span>
        <svg class="job-card__arrow" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
      </a>

      <a href="mailto:hr@tavaled.vn?subject=Ứng tuyển: Kỹ thuật viên lắp đặt" class="job-card" data-dept="ky-thuat">
        <div class="job-card__dept-ico dept-kt">🔧</div>
        <div class="job-card__info">
          <div class="job-card__title">Kỹ thuật viên Lắp đặt & Bảo trì LED</div>
          <div class="job-card__meta">
            <span class="job-meta-tag"><svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>Toàn quốc</span>
            <span class="job-meta-tag">💰 12–18 triệu/tháng</span>
          </div>
        </div>
        <span class="job-card__dept-tag">Kỹ thuật</span>
        <svg class="job-card__arrow" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
      </a>

      <a href="mailto:hr@tavaled.vn?subject=Ứng tuyển: Kinh doanh dự án" class="job-card" data-dept="kinh-doanh">
        <div class="job-card__dept-ico dept-kd">💼</div>
        <div class="job-card__info">
          <div class="job-card__title">Chuyên viên Kinh doanh Dự án B2B</div>
          <div class="job-card__meta">
            <span class="job-meta-tag"><svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>Hà Nội / TP.HCM</span>
            <span class="job-meta-tag">💰 15–25 triệu + hoa hồng</span>
          </div>
        </div>
        <span class="job-card__dept-tag">Kinh doanh</span>
        <svg class="job-card__arrow" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
      </a>

      <a href="mailto:hr@tavaled.vn?subject=Ứng tuyển: Trưởng nhóm kinh doanh" class="job-card" data-dept="kinh-doanh">
        <div class="job-card__dept-ico dept-kd">🏆</div>
        <div class="job-card__info">
          <div class="job-card__title">Trưởng nhóm Kinh doanh (Sales Manager)</div>
          <div class="job-card__meta">
            <span class="job-meta-tag"><svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>Hà Nội</span>
            <span class="job-meta-tag">💰 25–45 triệu + KPI</span>
          </div>
        </div>
        <span class="job-card__dept-tag">Kinh doanh</span>
        <svg class="job-card__arrow" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
      </a>

      <a href="mailto:hr@tavaled.vn?subject=Ứng tuyển: Quản lý dự án" class="job-card" data-dept="du-an">
        <div class="job-card__dept-ico dept-da">📋</div>
        <div class="job-card__info">
          <div class="job-card__title">Quản lý Dự án AV (Project Manager)</div>
          <div class="job-card__meta">
            <span class="job-meta-tag"><svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>Hà Nội / TP.HCM</span>
            <span class="job-meta-tag">💰 20–35 triệu/tháng</span>
          </div>
        </div>
        <span class="job-card__dept-tag">Dự án</span>
        <svg class="job-card__arrow" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
      </a>

      <a href="mailto:hr@tavaled.vn?subject=Ứng tuyển: Điều phối dự án" class="job-card" data-dept="du-an">
        <div class="job-card__dept-ico dept-da">📌</div>
        <div class="job-card__info">
          <div class="job-card__title">Điều phối Dự án & Logistics</div>
          <div class="job-card__meta">
            <span class="job-meta-tag"><svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>Hà Nội</span>
            <span class="job-meta-tag">💰 13–18 triệu/tháng</span>
          </div>
        </div>
        <span class="job-card__dept-tag">Dự án</span>
        <svg class="job-card__arrow" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
      </a>

      <a href="mailto:hr@tavaled.vn?subject=Ứng tuyển: Digital Marketing" class="job-card" data-dept="it">
        <div class="job-card__dept-ico dept-it">💻</div>
        <div class="job-card__info">
          <div class="job-card__title">Chuyên viên Digital Marketing & Content</div>
          <div class="job-card__meta">
            <span class="job-meta-tag"><svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg>Hà Nội</span>
            <span class="job-meta-tag">💰 14–20 triệu/tháng</span>
          </div>
        </div>
        <span class="job-card__dept-tag">Marketing</span>
        <svg class="job-card__arrow" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
      </a>

    </div>
    <div class="jobs-empty" id="jobsEmpty">Không có vị trí nào phù hợp — <a href="mailto:hr@tavaled.vn">gửi CV tự do</a> để chúng tôi liên hệ khi có nhu cầu.</div>
  </div>
</section>

<!-- ══ PROCESS ══ -->
<section class="process">
  <div class="inner">
    <div class="sec-head rv">
      <div>
        <div class="sec-eyebrow" style="color:rgba(240,90,37,.8)">Quy trình tuyển dụng</div>
        <h2 class="sec-h sec-h--w">Từ CV đến <em>ngày đầu tiên</em></h2>
      </div>
      <p class="sec-desc" style="color:rgba(255,255,255,.45)">Minh bạch, nhanh gọn, tôn trọng thời gian của bạn. Toàn bộ quy trình không quá 3 tuần.</p>
    </div>
  </div>
  <div class="inner">
    <div class="steps-row rv d1">
      <div class="step"><div class="step__dot">📄</div><div class="step__title">Nộp hồ sơ</div><div class="step__desc">CV + portfolio (nếu có). Phản hồi trong 3 ngày làm việc.</div><div class="step__time">Ngày 1–3</div></div>
      <div class="step"><div class="step__dot">📞</div><div class="step__title">Phỏng vấn sơ bộ</div><div class="step__desc">30 phút qua điện thoại/Zalo. Giới thiệu về TavaLED và vị trí.</div><div class="step__time">Ngày 4–7</div></div>
      <div class="step"><div class="step__dot">🛠️</div><div class="step__title">Phỏng vấn chuyên môn</div><div class="step__desc">Trực tiếp hoặc online, bài kiểm tra kỹ thuật thực tế.</div><div class="step__time">Ngày 8–14</div></div>
      <div class="step"><div class="step__dot">🎉</div><div class="step__title">Offer & Onboarding</div><div class="step__desc">Nhận offer, ký hợp đồng, chương trình hội nhập 2 tuần đầu.</div><div class="step__time">Ngày 15–21</div></div>
    </div>
  </div>
</section>

<!-- ══ CTA ══ -->
<div class="cta">
  <div class="cta__inner">
    <div>
      <h2 class="cta__h">Chưa thấy vị trí phù hợp?<br><em>Gửi CV tự do cho chúng tôi</em></h2>
      <p class="cta__sub">Chúng tôi luôn tìm kiếm tài năng — không chỉ khi có vị trí mở.</p>
    </div>
    <div style="display:flex;gap:12px;flex-wrap:wrap">
      <a href="mailto:hr@tavaled.vn" class="btn-w">
        <svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg>
        hr@tavaled.vn
      </a>
    </div>
  </div>
</div>

<script>
/* Cursor */
const cd=document.getElementById('cur-d'),cr=document.getElementById('cur-r');
let mx=0,my=0,rx=0,ry=0;
window.addEventListener('mousemove',e=>{mx=e.clientX;my=e.clientY},{passive:true});
(function t(){rx+=(mx-rx)*.13;ry+=(my-ry)*.13;cd.style.cssText=`left:${mx}px;top:${my}px`;cr.style.cssText=`left:${rx}px;top:${ry}px`;requestAnimationFrame(t)})();

/* Reveal */
const obs=new IntersectionObserver(e=>{e.forEach(x=>{if(x.isIntersecting){x.target.classList.add('in');obs.unobserve(x.target)}})},{threshold:.08,rootMargin:'0px 0px -32px 0px'});
document.querySelectorAll('.rv').forEach(el=>obs.observe(el));

/* Counter */
function countUp(el,to){let n=0;const s=to/(1600/16);const t=setInterval(()=>{n=Math.min(n+s,to);el.textContent=Math.floor(n);if(n>=to)clearInterval(t)},16)}
const co=new IntersectionObserver(e=>{e.forEach(x=>{if(x.isIntersecting){x.target.querySelectorAll('.cnt').forEach(el=>countUp(el,+el.dataset.to));co.unobserve(x.target)}})},{threshold:.5});
document.querySelectorAll('.hero__right').forEach(el=>co.observe(el));

/* Filter */
function filterJobs(dept,btn){
  // Update button states
  document.querySelectorAll('.filter-btn').forEach(b=>b.classList.remove('active'));
  if(btn) btn.classList.add('active');

  const cards=document.querySelectorAll('.job-card');
  let shown=0;
  cards.forEach(c=>{
    const show=dept==='all'||c.dataset.dept===dept;
    c.classList.toggle('hidden',!show);
    if(show)shown++;
  });
  document.getElementById('jobsEmpty').classList.toggle('show',shown===0);

  // Scroll to jobs
  document.getElementById('jobs').scrollIntoView({behavior:'smooth',block:'start'});
}
</script>


<?php get_footer(); ?>