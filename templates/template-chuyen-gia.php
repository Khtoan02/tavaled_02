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
  --ff:'Mona Sans','Mona-Sans',sans-serif;
}
html{scroll-behavior:smooth}
body{font-family:var(--ff);background:var(--w);color:var(--ink);-webkit-font-smoothing:antialiased;overflow-x:hidden;cursor:none}
#cd,#cr{position:fixed;border-radius:50%;pointer-events:none;z-index:9999;transform:translate(-50%,-50%)}
#cd{width:7px;height:7px;background:var(--o)}
#cr{width:36px;height:36px;border:1.5px solid rgba(240,90,37,.4);transition:width .3s,height .3s,border-color .3s}
body:has(a:hover) #cr,body:has(button:hover) #cr{width:50px;height:50px;border-color:var(--o)}

/* ── HERO ── */
.hero{min-height:72vh;background:var(--navy3);position:relative;overflow:hidden;display:flex;align-items:flex-end}
.hero__strip{position:absolute;inset:0;display:grid;grid-template-columns:repeat(5,1fr);gap:2px}
.hero__strip-cell{overflow:hidden}
.hero__strip-cell img{width:100%;height:100%;object-fit:cover;object-position:top;filter:brightness(.22) saturate(.3) hue-rotate(185deg);animation:hz 14s ease-in-out infinite alternate}
.hero__strip-cell:nth-child(2) img{animation-delay:-3s}
.hero__strip-cell:nth-child(3) img{animation-delay:-6s}
.hero__strip-cell:nth-child(4) img{animation-delay:-9s}
.hero__strip-cell:nth-child(5) img{animation-delay:-12s}
@keyframes hz{from{transform:scale(1.1)}to{transform:scale(1.02)}}
.hero__fog{position:absolute;inset:0;z-index:1;background:linear-gradient(180deg,rgba(15,24,53,.7) 0%,transparent 28%,rgba(15,24,53,.5) 55%,rgba(15,24,53,.97) 100%)}
.hero__grid{position:absolute;inset:0;z-index:1;background-image:linear-gradient(rgba(255,255,255,.02) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.02) 1px,transparent 1px);background-size:52px 52px;pointer-events:none}
.hero__bar{position:absolute;bottom:0;left:0;right:0;height:3px;z-index:3;background:linear-gradient(90deg,var(--o),var(--odk) 45%,rgba(240,90,37,.2))}
.hero__body{position:relative;z-index:2;padding:0 56px 72px;max-width:1320px;margin:0 auto;width:100%}
.hero__tag{display:inline-flex;align-items:center;gap:9px;font-size:9.5px;font-weight:700;letter-spacing:.24em;text-transform:uppercase;color:var(--o);padding:4px 12px;background:rgba(240,90,37,.1);border:1px solid rgba(240,90,37,.28);border-radius:4px;margin-bottom:20px;opacity:0;animation:su .5s .1s ease forwards}
.hero__h1{font-family:var(--ff);font-weight:800;font-size:clamp(2.8rem,5.5vw,5.5rem);letter-spacing:-.06em;color:#fff;line-height:.92;margin-bottom:18px;opacity:0;animation:su .8s .25s cubic-bezier(.16,1,.3,1) forwards}
.hero__h1 em{font-style:italic;font-weight:300;color:var(--o)}
.hero__desc{font-size:15px;font-weight:300;color:rgba(255,255,255,.5);line-height:1.85;max-width:580px;opacity:0;animation:su .6s .42s ease forwards}

/* ── STATS STRIP ── */
.stats-strip{background:var(--navy);display:grid;grid-template-columns:repeat(4,1fr);border-bottom:3px solid var(--o)}
.stat-item{padding:28px 24px;text-align:center;border-right:1px solid rgba(255,255,255,.07);transition:background .2s}
.stat-item:hover{background:rgba(240,90,37,.07)}
.stat-item:last-child{border-right:none}
.stat-item__val{font-family:var(--ff);font-size:2.4rem;font-weight:800;letter-spacing:-.06em;color:#fff;line-height:1}
.stat-item__val span{color:var(--o)}
.stat-item__label{font-size:11px;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:rgba(255,255,255,.38);margin-top:6px}

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

/* ── LEADERSHIP ── */
.leaders{display:grid;grid-template-columns:repeat(3,1fr);gap:4px}
.leader{position:relative;overflow:hidden;background:var(--navy3);cursor:default}
.leader__img{width:100%;height:480px;object-fit:cover;object-position:top;filter:brightness(.55) saturate(.65) hue-rotate(5deg);transition:filter .5s,transform .7s cubic-bezier(.16,1,.3,1)}
.leader:hover .leader__img{filter:brightness(.42) saturate(.8);transform:scale(1.04)}
.leader__over{position:absolute;inset:0;background:linear-gradient(180deg,transparent 25%,rgba(15,24,53,.94) 100%)}
.leader__body{position:absolute;bottom:0;left:0;right:0;padding:28px 28px 24px}
.leader__role{font-size:9.5px;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:var(--o);margin-bottom:6px}
.leader__name{font-family:var(--ff);font-weight:800;font-size:1.35rem;letter-spacing:-.04em;color:#fff;margin-bottom:6px}
.leader__spec{font-size:12.5px;color:rgba(255,255,255,.5);line-height:1.55;margin-bottom:14px}
.leader__certs{display:flex;flex-wrap:wrap;gap:6px}
.cert-pill{font-size:9px;font-weight:700;letter-spacing:.1em;text-transform:uppercase;padding:3px 8px;border-radius:3px;background:rgba(240,90,37,.18);border:1px solid rgba(240,90,37,.3);color:rgba(255,255,255,.75)}
.leader__exp{position:absolute;top:20px;right:20px;text-align:right}
.exp-val{font-family:var(--ff);font-size:2rem;font-weight:800;color:#fff;letter-spacing:-.06em;line-height:1}
.exp-val span{color:var(--o)}
.exp-label{font-size:9px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:rgba(255,255,255,.35)}

/* ── TEAM GRID ── */
.team-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:18px}
.team-card{background:var(--light);border:2px solid var(--bdr);border-radius:12px;overflow:hidden;transition:border-color .22s,transform .3s cubic-bezier(.16,1,.3,1),box-shadow .26s;cursor:default}
.team-card:hover{border-color:rgba(28,40,87,.2);transform:translateY(-5px);box-shadow:0 18px 48px rgba(28,40,87,.09)}
.team-card__photo{height:220px;overflow:hidden;position:relative}
.team-card__photo img{width:100%;height:100%;object-fit:cover;object-position:top;filter:saturate(.8);transition:transform .6s cubic-bezier(.16,1,.3,1),filter .35s}
.team-card:hover .team-card__photo img{transform:scale(1.06);filter:saturate(1)}
.team-card__photo-overlay{position:absolute;inset:0;background:linear-gradient(180deg,transparent 50%,rgba(28,40,87,.6) 100%)}
.team-card__dept{position:absolute;bottom:12px;left:12px;font-size:9px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;padding:3px 9px;border-radius:3px;background:rgba(28,40,87,.75);color:rgba(255,255,255,.8);backdrop-filter:blur(6px)}
.team-card__body{padding:16px 18px 18px}
.team-card__name{font-family:var(--ff);font-weight:800;font-size:.98rem;letter-spacing:-.03em;color:var(--navy);margin-bottom:3px}
.team-card__role{font-size:12px;color:var(--muted);margin-bottom:12px}
.team-card__tags{display:flex;flex-wrap:wrap;gap:5px}
.team-tag{font-size:9.5px;font-weight:600;padding:2px 8px;border-radius:4px;background:var(--w);border:1px solid var(--bdr);color:var(--muted)}

/* ── EXPERTISE DOMAINS ── */
.domains{display:grid;grid-template-columns:repeat(2,1fr);gap:4px;margin-top:0}
.domain{background:var(--navy);padding:36px;position:relative;overflow:hidden;cursor:default}
.domain--light{background:var(--light);border:1.5px solid var(--bdr)}
.domain__bg-num{position:absolute;right:20px;top:10px;font-family:var(--ff);font-size:7rem;font-weight:800;color:rgba(255,255,255,.04);letter-spacing:-.1em;line-height:1;pointer-events:none}
.domain--light .domain__bg-num{color:rgba(28,40,87,.05)}
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

@media(max-width:1100px){.leaders{grid-template-columns:1fr 1fr}.team-grid{grid-template-columns:repeat(2,1fr)}.certs-grid{grid-template-columns:repeat(2,1fr)}.domains{grid-template-columns:1fr}.expert-cta__inner{grid-template-columns:1fr;gap:40px}}
@media(max-width:768px){.hero__body,.inner,.expert-cta__inner{padding-left:20px;padding-right:20px}.leaders{grid-template-columns:1fr}.stats-strip{grid-template-columns:repeat(2,1fr)}.team-grid{grid-template-columns:1fr 1fr}.sec-head{flex-direction:column;gap:16px;margin-bottom:32px}}
</style>
<div id="cd"></div>
<div id="cr"></div>

<!-- HERO -->
<section class="hero">
  <div class="hero__strip" aria-hidden="true">
    <div class="hero__strip-cell"><img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=400&q=80" alt=""></div>
    <div class="hero__strip-cell"><img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=400&q=80" alt=""></div>
    <div class="hero__strip-cell"><img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=400&q=80" alt=""></div>
    <div class="hero__strip-cell"><img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?w=400&q=80" alt=""></div>
    <div class="hero__strip-cell"><img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?w=400&q=80" alt=""></div>
  </div>
  <div class="hero__fog" aria-hidden="true"></div>
  <div class="hero__grid" aria-hidden="true"></div>
  <div class="hero__bar" aria-hidden="true"></div>
  <div class="hero__body">
    <div class="hero__tag">Đội ngũ chuyên gia</div>
    <h1 class="hero__h1">Con người tạo nên<br><em>sự khác biệt</em></h1>
    <p class="hero__desc">Mỗi dự án TavaLED đứng sau là một đội ngũ chuyên gia được đào tạo bài bản, có chứng nhận quốc tế và kinh nghiệm thực chiến từ hàng trăm công trình.</p>
  </div>
</section>

<!-- STATS STRIP -->
<div class="stats-strip rv">
  <div class="stat-item"><div class="stat-item__val"><span class="cnt" data-to="45">0</span><span>+</span></div><div class="stat-item__label">Chuyên gia & Kỹ thuật viên</div></div>
  <div class="stat-item"><div class="stat-item__val"><span class="cnt" data-to="12">0</span><span>+</span></div><div class="stat-item__label">Năm kinh nghiệm TB</div></div>
  <div class="stat-item"><div class="stat-item__val"><span class="cnt" data-to="28">0</span><span>+</span></div><div class="stat-item__label">Chứng nhận quốc tế</div></div>
  <div class="stat-item"><div class="stat-item__val"><span class="cnt" data-to="3">0</span><span></span></div><div class="stat-item__label">Văn phòng toàn quốc</div></div>
</div>

<!-- LEADERSHIP -->
<section class="section" style="background:var(--navy3);padding-top:72px;padding-bottom:0">
  <div class="inner rv">
    <div class="sec-head">
      <div>
        <div class="ey" style="color:rgba(240,90,37,.8)">Ban lãnh đạo kỹ thuật</div>
        <h2 class="sh sh--w">Những người <em>dẫn đầu</em></h2>
      </div>
    </div>
  </div>
  <div class="leaders rv d1">
    <div class="leader">
      <img class="leader__img" src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=600&q=85" alt="Giám đốc kỹ thuật">
      <div class="leader__over"></div>
      <div class="leader__exp"><div class="exp-val">15<span>+</span></div><div class="exp-label">Năm kinh nghiệm</div></div>
      <div class="leader__body">
        <div class="leader__role">Giám đốc Kỹ thuật</div>
        <div class="leader__name">Nguyễn Minh Tuấn</div>
        <div class="leader__spec">Chuyên gia LED & Display Technology. Cựu kỹ sư tại Samsung Display Việt Nam. Tốt nghiệp Đại học Bách Khoa Hà Nội.</div>
        <div class="leader__certs">
          <span class="cert-pill">CTS — InfoComm</span>
          <span class="cert-pill">Novastar Certified</span>
          <span class="cert-pill">Absen Expert</span>
        </div>
      </div>
    </div>
    <div class="leader">
      <img class="leader__img" src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=600&q=85" alt="Giám đốc âm thanh">
      <div class="leader__over"></div>
      <div class="leader__exp"><div class="exp-val">12<span>+</span></div><div class="exp-label">Năm kinh nghiệm</div></div>
      <div class="leader__body">
        <div class="leader__role">Trưởng bộ phận Âm thanh</div>
        <div class="leader__name">Trần Thị Lan Anh</div>
        <div class="leader__spec">Chuyên gia hệ thống Line Array và DSP. 200+ dự án sự kiện lớn tại Việt Nam. Chứng nhận từ JBL & Yamaha.</div>
        <div class="leader__certs">
          <span class="cert-pill">JBL Certified</span>
          <span class="cert-pill">Yamaha Pro Audio</span>
          <span class="cert-pill">BSS Audiencia</span>
        </div>
      </div>
    </div>
    <div class="leader">
      <img class="leader__img" src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=600&q=85" alt="Trưởng bộ phận ánh sáng">
      <div class="leader__over"></div>
      <div class="leader__exp"><div class="exp-val">10<span>+</span></div><div class="exp-label">Năm kinh nghiệm</div></div>
      <div class="leader__body">
        <div class="leader__role">Trưởng bộ phận Ánh sáng</div>
        <div class="leader__name">Phạm Đức Hùng</div>
        <div class="leader__spec">Lighting Designer chuyên nghiệp. Thiết kế ánh sáng cho 100+ sự kiện concert, lễ hội. Đào tạo tại ESTA (Mỹ).</div>
        <div class="leader__certs">
          <span class="cert-pill">ESTA Certified</span>
          <span class="cert-pill">Robe Lighting</span>
          <span class="cert-pill">MA Lighting</span>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- TEAM GRID -->
<section class="section" style="background:var(--light)">
  <div class="inner">
    <div class="sec-head rv">
      <div>
        <div class="ey">Đội ngũ kỹ thuật</div>
        <h2 class="sh">42 chuyên gia <em>thực chiến</em></h2>
      </div>
      <p class="sd">Mỗi thành viên được đào tạo chuyên sâu, có chứng nhận từ nhà sản xuất và kinh nghiệm tối thiểu 3 năm tại TavaLED.</p>
    </div>
    <div class="team-grid rv d1">
      <div class="team-card">
        <div class="team-card__photo">
          <img src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=400&q=80" alt="">
          <div class="team-card__photo-overlay"></div>
          <div class="team-card__dept">LED Technical</div>
        </div>
        <div class="team-card__body">
          <div class="team-card__name">Lê Văn Sơn</div>
          <div class="team-card__role">Kỹ thuật viên LED Senior · 8 năm</div>
          <div class="team-card__tags"><span class="team-tag">P1.5–P4 Indoor</span><span class="team-tag">COB LED</span></div>
        </div>
      </div>
      <div class="team-card">
        <div class="team-card__photo">
          <img src="https://images.unsplash.com/photo-1551836022-d5d88e9218df?w=400&q=80" alt="">
          <div class="team-card__photo-overlay"></div>
          <div class="team-card__dept">Audio Specialist</div>
        </div>
        <div class="team-card__body">
          <div class="team-card__name">Nguyễn Thu Hà</div>
          <div class="team-card__role">Kỹ sư Âm thanh Senior · 7 năm</div>
          <div class="team-card__tags"><span class="team-tag">Line Array</span><span class="team-tag">System Design</span></div>
        </div>
      </div>
      <div class="team-card">
        <div class="team-card__photo">
          <img src="https://images.unsplash.com/photo-1560250097-0b93528c311a?w=400&q=80" alt="">
          <div class="team-card__photo-overlay"></div>
          <div class="team-card__dept">Lighting Design</div>
        </div>
        <div class="team-card__body">
          <div class="team-card__name">Hoàng Quốc Việt</div>
          <div class="team-card__role">Lighting Designer · 6 năm</div>
          <div class="team-card__tags"><span class="team-tag">Moving Head</span><span class="team-tag">DMX Control</span></div>
        </div>
      </div>
      <div class="team-card">
        <div class="team-card__photo">
          <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?w=400&q=80" alt="">
          <div class="team-card__photo-overlay"></div>
          <div class="team-card__dept">Project Management</div>
        </div>
        <div class="team-card__body">
          <div class="team-card__name">Vũ Thị Minh</div>
          <div class="team-card__role">Project Manager · 5 năm</div>
          <div class="team-card__tags"><span class="team-tag">PMP Certified</span><span class="team-tag">AV Integration</span></div>
        </div>
      </div>
    </div>
    <div style="text-align:center;margin-top:28px">
      <p style="font-size:13px;color:var(--muted)">+ 38 kỹ thuật viên khác tại Hà Nội, TP.HCM và Đà Nẵng</p>
    </div>
  </div>
</section>

<!-- EXPERTISE DOMAINS -->
<section class="section section--white" style="padding-top:0">
  <div class="inner rv" style="margin-bottom:0">
    <div class="sec-head" style="padding-top:88px">
      <div>
        <div class="ey">Lĩnh vực chuyên môn</div>
        <h2 class="sh">4 năng lực <em>cốt lõi</em></h2>
      </div>
    </div>
  </div>
  <div style="max-width:1320px;margin:0 auto;padding:0 56px">
    <div class="domains rv d1">
      <div class="domain">
        <div class="domain__bg-num">01</div>
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
        <div class="domain__bg-num">02</div>
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
        <div class="domain__bg-num">03</div>
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
        <div class="domain__bg-num">04</div>
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

<!-- CERTIFICATIONS -->
<section class="section" style="background:var(--light)">
  <div class="inner">
    <div class="sec-head rv">
      <div>
        <div class="ey">Chứng nhận quốc tế</div>
        <h2 class="sh">28+ chứng chỉ <em>chuyên nghiệp</em></h2>
      </div>
    </div>
    <div class="certs-grid rv d1">
      <div class="cert-card"><div class="cert-card__logo">🏆</div><div class="cert-card__name">CTS</div><div class="cert-card__org">InfoComm International</div><div class="cert-card__holders">3 nhân viên</div></div>
      <div class="cert-card"><div class="cert-card__logo">📡</div><div class="cert-card__name">Novastar Certified</div><div class="cert-card__org">Novastar Tech</div><div class="cert-card__holders">8 nhân viên</div></div>
      <div class="cert-card"><div class="cert-card__logo">🔊</div><div class="cert-card__name">JBL Professional</div><div class="cert-card__org">Harman / Samsung</div><div class="cert-card__holders">6 nhân viên</div></div>
      <div class="cert-card"><div class="cert-card__logo">🎛️</div><div class="cert-card__name">Yamaha Pro Audio</div><div class="cert-card__org">Yamaha Corporation</div><div class="cert-card__holders">4 nhân viên</div></div>
      <div class="cert-card"><div class="cert-card__logo">💡</div><div class="cert-card__name">Robe Lighting</div><div class="cert-card__org">Robe Lighting s.r.o.</div><div class="cert-card__holders">3 nhân viên</div></div>
      <div class="cert-card"><div class="cert-card__logo">🎚️</div><div class="cert-card__name">MA Lighting</div><div class="cert-card__org">MA Lighting Technology</div><div class="cert-card__holders">3 nhân viên</div></div>
      <div class="cert-card"><div class="cert-card__logo">📋</div><div class="cert-card__name">PMP</div><div class="cert-card__org">Project Management Institute</div><div class="cert-card__holders">2 nhân viên</div></div>
      <div class="cert-card"><div class="cert-card__logo">⚡</div><div class="cert-card__name">Absen Expert</div><div class="cert-card__org">Absen Optoelectronic</div><div class="cert-card__holders">5 nhân viên</div></div>
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
      <a href="tel:19001234" class="consult-opt">
        <div class="consult-opt__ico"><svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2 19.79 19.79 0 01-8.63-3.07A19.5 19.5 0 014.7 12.5a19.79 19.79 0 01-3.07-8.67A2 2 0 013.59 2h3a2 2 0 012 1.72 12 12 0 00.7 2.81 2 2 0 01-.45 2.11L7.91 9.91a16 16 0 006.1 6.1l.96-.96a2 2 0 012.11-.45 12 12 0 002.81.7A2 2 0 0122 16.92z"/></svg></div>
        <div><div class="consult-opt__title">Gọi điện tư vấn ngay</div><div class="consult-opt__sub">1900 1234 · Phản hồi trong 30 phút</div></div>
        <svg class="consult-opt__arr" viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
      </a>
      <a href="mailto:info@tavaled.vn?subject=Yêu cầu tư vấn dự án" class="consult-opt">
        <div class="consult-opt__ico"><svg viewBox="0 0 24 24"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/><polyline points="22,6 12,13 2,6"/></svg></div>
        <div><div class="consult-opt__title">Gửi yêu cầu tư vấn</div><div class="consult-opt__sub">info@tavaled.vn · Phản hồi trong 2 giờ</div></div>
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
function countUp(el,to){let n=0;const s=to/100;const t=setInterval(()=>{n=Math.min(n+s,to);el.textContent=Math.floor(n);if(n>=to)clearInterval(t)},16)}
const co=new IntersectionObserver(e=>{e.forEach(x=>{if(x.isIntersecting){x.target.querySelectorAll('.cnt').forEach(el=>countUp(el,+el.dataset.to));co.unobserve(x.target)}})},{threshold:.4});
document.querySelectorAll('.stats-strip').forEach(el=>co.observe(el));
</script>


<?php get_footer(); ?>