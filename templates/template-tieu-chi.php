<?php
/**
 * Template Name: Trang tiêu chí
 */

get_header(); ?>

<style>
.page-template-template-tieu-chi-php *, .page-template-template-tieu-chi-php *::before, .page-template-template-tieu-chi-php *::after{box-sizing:border-box;margin:0;padding:0}

:root{
  --navy:#1c2857;--navy2:#162248;--navy3:#0f1835;
  --o:#f05a25;--odk:#c8451a;--olt:#fff3ee;
  --w:#fff;--ink:#111827;--mid:#374151;--muted:#6b7280;
  --light:#f9fafb;--bdr:#e5e7eb;
  --ff:'Mona Sans','Mona-Sans',sans-serif;
}
html{scroll-behavior:smooth}
body{font-family:var(--ff);background:var(--w);color:var(--ink);-webkit-font-smoothing:antialiased;overflow-x:hidden;cursor:none}

/* ── CURSOR ── */
#cur-d,#cur-r{position:fixed;border-radius:50%;pointer-events:none;z-index:9999;transform:translate(-50%,-50%)}
#cur-d{width:7px;height:7px;background:var(--o)}
#cur-r{width:36px;height:36px;border:1.5px solid rgba(240,90,37,.4);transition:width .3s,height .3s,border-color .3s}
body:has(a:hover) #cur-r,body:has(button:hover) #cur-r{width:50px;height:50px;border-color:var(--o)}

/* ── HERO ── */
.hero{
  min-height:88vh;background:var(--navy3);
  position:relative;overflow:hidden;
  display:flex;align-items:center;
}
.hero__bg{position:absolute;inset:0;display:grid;grid-template-columns:1fr 1fr 1fr 1fr;gap:2px}
.hero__bg-cell{overflow:hidden}
.hero__bg-cell img{width:100%;height:100%;object-fit:cover;filter:brightness(.2) saturate(.3) hue-rotate(185deg);animation:bgz 16s ease-in-out infinite alternate}
.hero__bg-cell:nth-child(2) img{animation-delay:-5s}
.hero__bg-cell:nth-child(3) img{animation-delay:-10s}
.hero__bg-cell:nth-child(4) img{animation-delay:-14s}
@keyframes bgz{from{transform:scale(1.1)}to{transform:scale(1.02)}}
.hero__fog{position:absolute;inset:0;z-index:1;background:linear-gradient(180deg,rgba(15,24,53,.65) 0%,transparent 35%,rgba(15,24,53,.6) 62%,rgba(15,24,53,.98) 100%),linear-gradient(90deg,rgba(15,24,53,.5) 0%,transparent 55%)}
.hero__grid{position:absolute;inset:0;z-index:1;background-image:linear-gradient(rgba(255,255,255,.02) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.02) 1px,transparent 1px);background-size:56px 56px;pointer-events:none}
.hero__bar{position:absolute;bottom:0;left:0;right:0;height:3px;z-index:3;background:linear-gradient(90deg,var(--o),var(--odk) 45%,rgba(240,90,37,.2))}

.hero__inner{position:relative;z-index:2;padding:80px 56px;max-width:1320px;margin:0 auto;width:100%;display:grid;grid-template-columns:1fr 1fr;gap:80px;align-items:center}

.hero__left{}
.hero__tag{display:inline-flex;align-items:center;gap:9px;font-size:9.5px;font-weight:700;letter-spacing:.24em;text-transform:uppercase;color:var(--o);padding:4px 12px;background:rgba(240,90,37,.1);border:1px solid rgba(240,90,37,.28);border-radius:4px;margin-bottom:20px;opacity:0;animation:su .5s .1s ease forwards}
.hero__h1{font-family:var(--ff);font-weight:800;font-size:clamp(2.8rem,5.5vw,5.5rem);letter-spacing:-.06em;color:#fff;line-height:.92;margin-bottom:24px;opacity:0;animation:su .8s .25s cubic-bezier(.16,1,.3,1) forwards}
.hero__h1 em{font-style:italic;font-weight:300;color:var(--o);display:block}
.hero__desc{font-size:15px;font-weight:300;color:rgba(255,255,255,.5);line-height:1.85;max-width:420px;opacity:0;animation:su .6s .45s ease forwards}

/* Score summary right */
.hero__score{opacity:0;animation:su .7s .6s ease forwards}
.score-headline{font-family:var(--ff);font-size:clamp(5rem,10vw,9rem);font-weight:800;letter-spacing:-.08em;color:#fff;line-height:.85}
.score-headline span{color:var(--o)}
.score-label{font-size:11px;font-weight:600;letter-spacing:.16em;text-transform:uppercase;color:rgba(255,255,255,.4);margin-top:10px;margin-bottom:28px}
.score-pills{display:flex;flex-direction:column;gap:8px}
.score-pill{display:flex;align-items:center;gap:12px;padding:10px 14px;background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.09);border-radius:7px}
.score-pill__num{font-family:var(--ff);font-size:1.4rem;font-weight:800;color:var(--o);letter-spacing:-.04em;min-width:48px}
.score-pill__label{font-size:12px;color:rgba(255,255,255,.55)}

/* ── INTRO STATEMENT ── */
.statement{background:var(--o);padding:48px 0;position:relative;overflow:hidden}
.statement::before{content:'';position:absolute;inset:0;background:linear-gradient(135deg,var(--o),var(--odk))}
.statement::after{content:'';position:absolute;top:-80px;right:-80px;width:300px;height:300px;border-radius:50%;background:rgba(255,255,255,.08)}
.statement__inner{max-width:1320px;margin:0 auto;padding:0 56px;position:relative;z-index:1;display:grid;grid-template-columns:1fr 2fr;gap:56px;align-items:center}
.statement__label{font-size:9.5px;font-weight:700;letter-spacing:.22em;text-transform:uppercase;color:rgba(255,255,255,.6);margin-bottom:8px}
.statement__title{font-family:var(--ff);font-weight:800;font-size:clamp(1.5rem,2.8vw,2.4rem);letter-spacing:-.05em;color:#fff;line-height:1.04}
.statement__text{font-size:15px;color:rgba(255,255,255,.8);line-height:1.85;font-weight:300}
.statement__text strong{font-weight:700;color:#fff}

/* ── SECTION SHARED ── */
.section{padding:88px 0}
.section--light{background:var(--light)}
.section--white{background:var(--w)}
.section--dark{background:var(--navy3)}
.inner{max-width:1320px;margin:0 auto;padding:0 56px}
.sec-eyebrow{display:inline-flex;align-items:center;gap:8px;font-size:9.5px;font-weight:700;letter-spacing:.22em;text-transform:uppercase;color:var(--o);margin-bottom:12px}
.sec-eyebrow::before{content:'';display:block;width:22px;height:2px;background:var(--o);border-radius:2px}
.sec-h{font-family:var(--ff);font-weight:800;font-size:clamp(1.9rem,3.5vw,3rem);letter-spacing:-.05em;color:var(--navy);line-height:1.04;margin-bottom:14px}
.sec-h em{font-style:italic;font-weight:300;color:var(--o)}
.sec-h--white{color:#fff}
.sec-desc{font-size:14.5px;color:var(--muted);line-height:1.8;max-width:520px}
.sec-head{display:flex;align-items:flex-end;justify-content:space-between;gap:32px;margin-bottom:56px;flex-wrap:wrap}

/* ── CRITERIA GRID — 3 pillars ── */
.pillars{display:grid;grid-template-columns:repeat(3,1fr);gap:4px}
.pillar{background:var(--navy);overflow:hidden;position:relative;cursor:default}
.pillar__img{width:100%;height:280px;object-fit:cover;filter:brightness(.3) saturate(.4) hue-rotate(185deg);transition:filter .5s}
.pillar:hover .pillar__img{filter:brightness(.25) saturate(.5) hue-rotate(185deg)}
.pillar__overlay{position:absolute;inset:0;background:linear-gradient(180deg,transparent 30%,rgba(15,24,53,.95) 100%)}
.pillar__body{position:absolute;bottom:0;left:0;right:0;padding:28px 28px 24px}
.pillar__num{font-family:var(--ff);font-size:3.5rem;font-weight:800;letter-spacing:-.08em;color:rgba(240,90,37,.2);line-height:1;margin-bottom:4px}
.pillar__title{font-family:var(--ff);font-weight:800;font-size:1.2rem;letter-spacing:-.03em;color:#fff;margin-bottom:8px}
.pillar__desc{font-size:13px;color:rgba(255,255,255,.55);line-height:1.65}

/* ── CHECKLIST SECTIONS ── */
.criteria-layout{display:grid;grid-template-columns:1fr 1fr;gap:6px;margin-top:4px}
.criteria-panel{background:var(--w);border:1.5px solid var(--bdr);padding:36px;border-radius:0}
.criteria-panel--dark{background:var(--navy);border-color:var(--navy)}
.criteria-panel__label{font-size:9px;font-weight:700;letter-spacing:.2em;text-transform:uppercase;color:var(--muted);margin-bottom:20px;display:flex;align-items:center;gap:8px}
.criteria-panel--dark .criteria-panel__label{color:rgba(255,255,255,.35)}
.criteria-panel__label::before{content:'';display:block;width:16px;height:2px;background:var(--o);border-radius:2px}
.criteria-panel__title{font-family:var(--ff);font-weight:800;font-size:1.4rem;letter-spacing:-.04em;color:var(--navy);margin-bottom:22px}
.criteria-panel--dark .criteria-panel__title{color:#fff}
.criteria-list{list-style:none;display:flex;flex-direction:column;gap:12px}
.criteria-item{display:flex;align-items:flex-start;gap:14px;padding:12px 0;border-bottom:1px solid var(--bdr)}
.criteria-panel--dark .criteria-item{border-color:rgba(255,255,255,.07)}
.criteria-item:last-child{border-bottom:none}
.criteria-check{width:22px;height:22px;border-radius:6px;background:rgba(240,90,37,.12);border:1px solid rgba(240,90,37,.28);display:flex;align-items:center;justify-content:center;flex-shrink:0;margin-top:1px}
.criteria-check svg{width:11px;height:11px;stroke:var(--o);fill:none;stroke-width:2.5}
.criteria-item__title{font-size:13.5px;font-weight:700;color:var(--ink);margin-bottom:2px}
.criteria-panel--dark .criteria-item__title{color:#fff}
.criteria-item__desc{font-size:12.5px;color:var(--muted);line-height:1.6}
.criteria-panel--dark .criteria-item__desc{color:rgba(255,255,255,.45)}

/* ── SCORE CARDS ── */
.score-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:4px}
.sc{background:var(--w);border:1.5px solid var(--bdr);padding:28px 24px;text-align:center;transition:border-color .2s,transform .3s;cursor:default}
.sc:hover{border-color:var(--o);transform:translateY(-4px)}
.sc__val{font-family:var(--ff);font-size:2.8rem;font-weight:800;letter-spacing:-.06em;color:var(--navy);line-height:1}
.sc__val span{color:var(--o)}
.sc__bar{height:3px;background:var(--bdr);border-radius:2px;margin:12px auto;max-width:80px;overflow:hidden;position:relative}
.sc__bar-fill{position:absolute;left:0;top:0;bottom:0;background:var(--o);border-radius:2px;transform:scaleX(0);transform-origin:left;transition:transform 1.2s cubic-bezier(.16,1,.3,1)}
.sc.counted .sc__bar-fill{transform:scaleX(1)}
.sc__label{font-size:11.5px;font-weight:600;color:var(--muted);letter-spacing:.04em}

/* ── PARTNER CRITERIA ── */
.partner-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;margin-top:0}
.pcard{background:var(--w);border:2px solid var(--bdr);border-radius:12px;padding:28px;transition:border-color .22s,transform .3s cubic-bezier(.16,1,.3,1),box-shadow .26s;cursor:default}
.pcard:hover{border-color:rgba(28,40,87,.2);transform:translateY(-5px);box-shadow:0 18px 50px rgba(28,40,87,.08)}
.pcard__ico{font-size:28px;margin-bottom:16px}
.pcard__title{font-family:var(--ff);font-weight:800;font-size:1rem;letter-spacing:-.03em;color:var(--navy);margin-bottom:8px}
.pcard__desc{font-size:13px;color:var(--muted);line-height:1.7}
.pcard__tags{display:flex;flex-wrap:wrap;gap:6px;margin-top:14px}
.pcard__tag{font-size:10.5px;font-weight:600;padding:3px 9px;border-radius:4px;background:var(--light);border:1px solid var(--bdr);color:var(--muted)}

/* ── PROCESS TIMELINE ── */
.timeline{display:grid;grid-template-columns:repeat(5,1fr);gap:0;position:relative;margin-top:48px}
.timeline::before{content:'';position:absolute;top:28px;left:10%;right:10%;height:2px;background:linear-gradient(90deg,var(--o),rgba(240,90,37,.2));z-index:0}
.tl-step{text-align:center;padding:0 12px;position:relative;z-index:1}
.tl-step__dot{width:56px;height:56px;border-radius:50%;background:var(--navy);border:3px solid var(--bdr);display:flex;align-items:center;justify-content:center;margin:0 auto 16px;font-size:16px;transition:border-color .25s,background .25s;cursor:default}
.tl-step:hover .tl-step__dot{border-color:var(--o);background:rgba(240,90,37,.1)}
.tl-step__title{font-size:12.5px;font-weight:700;color:var(--navy);margin-bottom:4px}
.tl-step__desc{font-size:11.5px;color:var(--muted);line-height:1.55}

/* ── COMMITMENT STRIP ── */
.commit-strip{display:grid;grid-template-columns:repeat(4,1fr);background:var(--navy);border-top:3px solid var(--o)}
.commit-item{padding:32px 28px;border-right:1px solid rgba(255,255,255,.07);text-align:center;transition:background .2s}
.commit-item:hover{background:rgba(240,90,37,.07)}
.commit-item:last-child{border-right:none}
.commit-item__ico{font-size:24px;margin-bottom:10px}
.commit-item__title{font-size:14px;font-weight:700;color:#fff;margin-bottom:4px}
.commit-item__desc{font-size:12px;color:rgba(255,255,255,.45);line-height:1.55}

/* ── CTA ── */
.cta{background:var(--o);padding:56px 0;position:relative;overflow:hidden}
.cta::before{content:'';position:absolute;inset:0;background:linear-gradient(135deg,var(--o),var(--odk))}
.cta::after{content:'';position:absolute;top:-100px;right:-100px;width:400px;height:400px;border-radius:50%;background:rgba(255,255,255,.07);pointer-events:none}
.cta__inner{max-width:1320px;margin:0 auto;padding:0 56px;position:relative;z-index:1;display:flex;align-items:center;justify-content:space-between;gap:32px;flex-wrap:wrap}
.cta__h{font-family:var(--ff);font-weight:800;font-size:clamp(1.6rem,3vw,2.6rem);letter-spacing:-.05em;color:#fff;line-height:1.05}
.cta__h em{font-style:italic;font-weight:300}
.cta__sub{font-size:14px;color:rgba(255,255,255,.75);margin-top:6px}
.cta-btns{display:flex;gap:12px;flex-wrap:wrap}
.btn-w{display:inline-flex;align-items:center;gap:8px;padding:13px 28px;background:#fff;color:var(--navy);font-family:var(--ff);font-size:12.5px;font-weight:700;letter-spacing:.04em;text-transform:uppercase;border-radius:8px;text-decoration:none;box-shadow:0 4px 20px rgba(0,0,0,.15);transition:transform .15s,box-shadow .2s}
.btn-w:hover{transform:translateY(-2px);box-shadow:0 8px 32px rgba(0,0,0,.2)}
.btn-g{display:inline-flex;align-items:center;gap:8px;padding:12px 22px;background:transparent;border:1.5px solid rgba(255,255,255,.3);color:rgba(255,255,255,.85);font-family:var(--ff);font-size:12.5px;font-weight:600;text-transform:uppercase;letter-spacing:.04em;border-radius:8px;text-decoration:none;transition:border-color .2s,color .2s,background .2s}
.btn-g:hover{border-color:rgba(255,255,255,.6);color:#fff;background:rgba(255,255,255,.08)}
.btn-g svg{width:13px;height:13px;stroke:currentColor;fill:none;stroke-width:2}

/* ── ANIMATIONS ── */
@keyframes su{from{opacity:0;transform:translateY(18px)}to{opacity:1;transform:translateY(0)}}
.rv{opacity:0;transform:translateY(22px);transition:opacity .7s cubic-bezier(.16,1,.3,1),transform .7s cubic-bezier(.16,1,.3,1)}
.rv.in{opacity:1;transform:translateY(0)}
.d1{transition-delay:.08s}.d2{transition-delay:.16s}.d3{transition-delay:.24s}.d4{transition-delay:.32s}

/* ── RESPONSIVE ── */
@media(max-width:1100px){.hero__inner{grid-template-columns:1fr;gap:40px}.score-grid{grid-template-columns:repeat(2,1fr)}.timeline{grid-template-columns:repeat(3,1fr)}.timeline::before{display:none}.partner-grid{grid-template-columns:1fr 1fr}.commit-strip{grid-template-columns:repeat(2,1fr)}.pillars{grid-template-columns:1fr}}
@media(max-width:768px){.hero__inner,.inner,.statement__inner,.cta__inner{padding-left:20px;padding-right:20px}.sec-head{flex-direction:column;gap:16px;margin-bottom:32px}.criteria-layout{grid-template-columns:1fr}.partner-grid{grid-template-columns:1fr}.score-grid{grid-template-columns:1fr 1fr}.commit-strip{grid-template-columns:1fr}.timeline{grid-template-columns:1fr 1fr}.statement__inner{grid-template-columns:1fr;gap:20px}}
</style>


<div id="cur-d"></div>
<div id="cur-r"></div>

<!-- ══ HERO ══ -->
<section class="hero">
  <div class="hero__bg" aria-hidden="true">
    <div class="hero__bg-cell"><img src="https://images.unsplash.com/photo-1518770660439-4636190af475?w=600&q=80" alt=""></div>
    <div class="hero__bg-cell"><img src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=600&q=80" alt=""></div>
    <div class="hero__bg-cell"><img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=600&q=80" alt=""></div>
    <div class="hero__bg-cell"><img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=600&q=80" alt=""></div>
  </div>
  <div class="hero__fog" aria-hidden="true"></div>
  <div class="hero__grid" aria-hidden="true"></div>
  <div class="hero__bar" aria-hidden="true"></div>
  <div class="hero__inner">
    <div class="hero__left">
      <div class="hero__tag">Tiêu chí TavaLED</div>
      <h1 class="hero__h1">Chuẩn mực<br><em>không thỏa hiệp</em></h1>
      <p class="hero__desc">Mỗi sản phẩm, mỗi đối tác, mỗi lần thi công — TavaLED áp dụng bộ tiêu chí kiểm định nghiêm ngặt để đảm bảo khách hàng luôn nhận được điều tốt nhất.</p>
    </div>
    <div class="hero__score">
      <div class="score-headline">47<span>+</span></div>
      <div class="score-label">Tiêu chí kiểm định</div>
      <div class="score-pills">
        <div class="score-pill"><div class="score-pill__num">18</div><div class="score-pill__label">Tiêu chí chọn lọc sản phẩm</div></div>
        <div class="score-pill"><div class="score-pill__num">15</div><div class="score-pill__label">Tiêu chí đánh giá đối tác</div></div>
        <div class="score-pill"><div class="score-pill__num">14</div><div class="score-pill__label">Tiêu chí kiểm soát thi công</div></div>
      </div>
    </div>
  </div>
</section>

<!-- ══ STATEMENT ══ -->
<div class="statement">
  <div class="statement__inner">
    <div>
      <div class="statement__label">Triết lý</div>
      <div class="statement__title">Tại sao<br>cần tiêu chí?</div>
    </div>
    <p class="statement__text">Ngành LED tại Việt Nam có hàng nghìn sản phẩm, nhưng <strong>không phải tất cả đều xứng đáng</strong> được lắp đặt tại công trình của bạn. TavaLED xây dựng bộ tiêu chí như một <strong>bộ lọc kép</strong> — để chúng tôi chỉ đưa đến những gì thực sự đúng, và để bạn có thể <strong>kiểm chứng độc lập</strong> những gì chúng tôi cam kết.</p>
  </div>
</div>

<!-- ══ THREE PILLARS ══ -->
<section class="section section--dark">
  <div class="inner">
    <div class="sec-head rv">
      <div>
        <div class="sec-eyebrow">Ba trụ cột</div>
        <h2 class="sec-h sec-h--white">Tiêu chí <em>xuyên suốt</em></h2>
      </div>
    </div>
  </div>
  <div class="pillars rv d1">
    <div class="pillar">
      <img class="pillar__img" src="https://images.unsplash.com/photo-1518770660439-4636190af475?w=800&q=85" alt="Chất lượng sản phẩm">
      <div class="pillar__overlay"></div>
      <div class="pillar__body">
        <div class="pillar__num">01</div>
        <div class="pillar__title">Chất lượng Sản phẩm</div>
        <div class="pillar__desc">Chỉ phân phối thiết bị vượt qua 18 điểm kiểm định — từ pixel pitch thực tế, độ sáng đo được, đến chứng nhận EMC/RoHS/CE.</div>
      </div>
    </div>
    <div class="pillar">
      <img class="pillar__img" src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=800&q=85" alt="Năng lực đối tác">
      <div class="pillar__overlay"></div>
      <div class="pillar__body">
        <div class="pillar__num">02</div>
        <div class="pillar__title">Năng lực Đối tác</div>
        <div class="pillar__desc">Nhà sản xuất phải có nhà máy thực, hồ sơ bảo hành có thể kiểm chứng, chính sách hậu mãi tối thiểu 5 năm từ ngày ngừng sản xuất.</div>
      </div>
    </div>
    <div class="pillar">
      <img class="pillar__img" src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=800&q=85" alt="Chuẩn thi công">
      <div class="pillar__overlay"></div>
      <div class="pillar__body">
        <div class="pillar__num">03</div>
        <div class="pillar__title">Chuẩn Thi công</div>
        <div class="pillar__desc">Mọi công trình đều có checklist 14 điểm nghiệm thu. Không ký biên bản nếu còn bất kỳ hạng mục nào chưa đạt chuẩn.</div>
      </div>
    </div>
  </div>
</section>

<!-- ══ CRITERIA DETAIL ══ -->
<section class="section section--light">
  <div class="inner">
    <div class="sec-head rv">
      <div>
        <div class="sec-eyebrow">Tiêu chí sản phẩm</div>
        <h2 class="sec-h">18 điểm <em>kiểm định</em></h2>
      </div>
      <p class="sec-desc">Mỗi dòng sản phẩm mới đều trải qua chu trình kiểm tra 18 điểm trước khi được đưa vào danh mục phân phối của TavaLED.</p>
    </div>
  </div>
  <div style="max-width:1320px;margin:0 auto;padding:0 56px">
    <div class="criteria-layout rv d1">
      <div class="criteria-panel">
        <div class="criteria-panel__label">Kỹ thuật quang học</div>
        <div class="criteria-panel__title">Thông số hiển thị</div>
        <ul class="criteria-list">
          <li class="criteria-item"><div class="criteria-check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div><div><div class="criteria-item__title">Pixel Pitch thực tế ≤ thông số công bố ±0.1mm</div><div class="criteria-item__desc">Đo kiểm bằng thiết bị chuyên dụng, không chấp nhận sai lệch vượt mức</div></div></li>
          <li class="criteria-item"><div class="criteria-check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div><div><div class="criteria-item__title">Độ sáng tối thiểu theo môi trường lắp đặt</div><div class="criteria-item__desc">Indoor ≥800 nit | Outdoor ≥5.000 nit | Studio ≥1.500 nit</div></div></li>
          <li class="criteria-item"><div class="criteria-check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div><div><div class="criteria-item__title">Tỷ lệ tương phản ≥ 3.000:1</div><div class="criteria-item__desc">Đảm bảo màu đen thực, hình ảnh sắc nét trong mọi điều kiện ánh sáng</div></div></li>
          <li class="criteria-item"><div class="criteria-check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div><div><div class="criteria-item__title">Góc nhìn ≥ 140° (ngang) và ≥ 120° (dọc)</div><div class="criteria-item__desc">Đảm bảo hình ảnh đồng đều cho người xem từ mọi vị trí</div></div></li>
          <li class="criteria-item"><div class="criteria-check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div><div><div class="criteria-item__title">Refresh rate ≥ 3.840 Hz — không giật khi quay phim</div><div class="criteria-item__desc">Quan trọng với studio, sự kiện được ghi hình phát sóng</div></div></li>
          <li class="criteria-item"><div class="criteria-check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div><div><div class="criteria-item__title">Tỷ lệ pixel lỗi ≤ 0.02% khi xuất xưởng</div><div class="criteria-item__desc">Kiểm tra 100% panel trước khi nhập kho TavaLED</div></div></li>
        </ul>
      </div>
      <div class="criteria-panel criteria-panel--dark">
        <div class="criteria-panel__label">Độ bền & An toàn</div>
        <div class="criteria-panel__title">Chứng nhận & Tuổi thọ</div>
        <ul class="criteria-list">
          <li class="criteria-item"><div class="criteria-check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div><div><div class="criteria-item__title">Chứng nhận CE/FCC/RoHS bắt buộc</div><div class="criteria-item__desc">Có giấy chứng nhận gốc, có thể truy xuất nguồn gốc trực tuyến</div></div></li>
          <li class="criteria-item"><div class="criteria-check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div><div><div class="criteria-item__title">Chuẩn IP65 cho thiết bị ngoài trời</div><div class="criteria-item__desc">Chống bụi hoàn toàn, chịu tia nước từ mọi hướng</div></div></li>
          <li class="criteria-item"><div class="criteria-check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div><div><div class="criteria-item__title">Tuổi thọ LED ≥ 100.000 giờ (L50)</div><div class="criteria-item__desc">Dữ liệu từ báo cáo TM-21 của nhà sản xuất LED chip</div></div></li>
          <li class="criteria-item"><div class="criteria-check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div><div><div class="criteria-item__title">Nguồn điện dự phòng N+1 cho dự án quan trọng</div><div class="criteria-item__desc">Bộ nguồn dự phòng tự động kích hoạt khi nguồn chính lỗi</div></div></li>
          <li class="criteria-item"><div class="criteria-check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div><div><div class="criteria-item__title">Nhiệt độ vận hành -20°C đến +60°C</div><div class="criteria-item__desc">Đảm bảo hoạt động ổn định trong điều kiện khí hậu Việt Nam</div></div></li>
          <li class="criteria-item"><div class="criteria-check"><svg viewBox="0 0 24 24"><polyline points="20 6 9 17 4 12"/></svg></div><div><div class="criteria-item__title">Cam kết linh kiện tương thích ≥ 7 năm</div><div class="criteria-item__desc">Nhà sản xuất cam kết bằng văn bản duy trì linh kiện sau ngừng sản xuất</div></div></li>
        </ul>
      </div>
    </div>
  </div>
</section>

<!-- ══ SCORE CARDS ── -->
<section class="section section--white">
  <div class="inner">
    <div class="sec-head rv">
      <div>
        <div class="sec-eyebrow">Kết quả kiểm định</div>
        <h2 class="sec-h">Con số <em>minh chứng</em></h2>
      </div>
    </div>
    <div class="score-grid rv d1">
      <div class="sc" data-pct="94"><div class="sc__val"><span class="cnt" data-to="94">0</span><span>%</span></div><div class="sc__bar"><div class="sc__bar-fill" style="width:94%"></div></div><div class="sc__label">Sản phẩm vượt qua kiểm định lần đầu</div></div>
      <div class="sc" data-pct="100"><div class="sc__val"><span class="cnt" data-to="100">0</span><span>%</span></div><div class="sc__bar"><div class="sc__bar-fill" style="width:100%"></div></div><div class="sc__label">Dự án có biên bản nghiệm thu 14 điểm</div></div>
      <div class="sc" data-pct="98"><div class="sc__val"><span class="cnt" data-to="98">0</span><span>%</span></div><div class="sc__bar"><div class="sc__bar-fill" style="width:98%"></div></div><div class="sc__label">Khách hàng hài lòng sau bàn giao</div></div>
      <div class="sc"><div class="sc__val"><span class="cnt" data-to="7">0</span><span>+</span></div><div class="sc__bar"><div class="sc__bar-fill" style="width:70%"></div></div><div class="sc__label">Năm cam kết linh kiện thay thế</div></div>
    </div>
  </div>
</section>

<!-- ══ PARTNER CRITERIA ══ -->
<section class="section section--light">
  <div class="inner">
    <div class="sec-head rv">
      <div>
        <div class="sec-eyebrow">Tiêu chí đối tác</div>
        <h2 class="sec-h">15 điểm <em>đánh giá</em> nhà sản xuất</h2>
      </div>
    </div>
    <div class="partner-grid rv d1">
      <div class="pcard">
        <div class="pcard__ico">🏭</div>
        <div class="pcard__title">Nhà máy sản xuất thực tế</div>
        <div class="pcard__desc">TavaLED yêu cầu visit nhà máy hoặc kiểm tra qua bên thứ ba. Không hợp tác với đơn vị chỉ là thương mại thuần túy.</div>
        <div class="pcard__tags"><span class="pcard__tag">Factory Audit</span><span class="pcard__tag">ISO 9001</span></div>
      </div>
      <div class="pcard">
        <div class="pcard__ico">📋</div>
        <div class="pcard__title">Hồ sơ chứng nhận đầy đủ</div>
        <div class="pcard__desc">CE, FCC, RoHS, ETL và các chứng nhận thị trường mục tiêu. Có thể truy xuất số chứng nhận online để xác minh.</div>
        <div class="pcard__tags"><span class="pcard__tag">CE/FCC</span><span class="pcard__tag">RoHS</span><span class="pcard__tag">ETL</span></div>
      </div>
      <div class="pcard">
        <div class="pcard__ico">🔧</div>
        <div class="pcard__title">Chính sách hậu mãi dài hạn</div>
        <div class="pcard__desc">Cam kết linh kiện tối thiểu 7 năm. Có trung tâm bảo hành tại Việt Nam hoặc thời gian xử lý RMA dưới 15 ngày làm việc.</div>
        <div class="pcard__tags"><span class="pcard__tag">7-year parts</span><span class="pcard__tag">RMA &lt;15 ngày</span></div>
      </div>
      <div class="pcard">
        <div class="pcard__ico">🌐</div>
        <div class="pcard__title">Hiện diện toàn cầu có kiểm chứng</div>
        <div class="pcard__desc">Đã triển khai tại ít nhất 10 quốc gia, có tham chiếu dự án thực tế từ khách hàng ngoài Trung Quốc.</div>
        <div class="pcard__tags"><span class="pcard__tag">10+ quốc gia</span><span class="pcard__tag">Reference projects</span></div>
      </div>
      <div class="pcard">
        <div class="pcard__ico">💡</div>
        <div class="pcard__title">R&D và Đổi mới liên tục</div>
        <div class="pcard__desc">Có bộ phận R&D riêng, ra ít nhất 2 dòng sản phẩm mới mỗi năm. Tham gia triển lãm quốc tế (ISE, InfoComm, LED Expo).</div>
        <div class="pcard__tags"><span class="pcard__tag">R&D Team</span><span class="pcard__tag">ISE/InfoComm</span></div>
      </div>
      <div class="pcard">
        <div class="pcard__ico">🤝</div>
        <div class="pcard__title">Cam kết hợp tác minh bạch</div>
        <div class="pcard__desc">Cung cấp thông số kỹ thuật đầy đủ, không ẩn thông tin. Cho phép kiểm định độc lập bởi bên thứ ba khi khách hàng yêu cầu.</div>
        <div class="pcard__tags"><span class="pcard__tag">Open specs</span><span class="pcard__tag">3rd party test</span></div>
      </div>
    </div>
  </div>
</section>

<!-- ══ INSTALLATION PROCESS ── -->
<section class="section section--white">
  <div class="inner">
    <div class="sec-head rv">
      <div>
        <div class="sec-eyebrow">Tiêu chí thi công</div>
        <h2 class="sec-h">14 bước <em>nghiệm thu</em></h2>
      </div>
      <p class="sec-desc">Không một dự án nào được bàn giao khi còn thiếu bất kỳ điểm nghiệm thu nào trong checklist 14 bước của TavaLED.</p>
    </div>
    <div class="timeline rv d1">
      <div class="tl-step"><div class="tl-step__dot">📐</div><div class="tl-step__title">Khảo sát thực địa</div><div class="tl-step__desc">Đo đạc, kiểm tra điện, kết cấu tường</div></div>
      <div class="tl-step"><div class="tl-step__dot">📦</div><div class="tl-step__title">Nhập kiểm vật tư</div><div class="tl-step__desc">100% panel kiểm tra trước lắp đặt</div></div>
      <div class="tl-step"><div class="tl-step__dot">🔧</div><div class="tl-step__title">Thi công đúng chuẩn</div><div class="tl-step__desc">Kỹ thuật viên được chứng nhận</div></div>
      <div class="tl-step"><div class="tl-step__dot">🎨</div><div class="tl-step__title">Hiệu chỉnh màu sắc</div><div class="tl-step__desc">Calibration với thiết bị đo chuyên nghiệp</div></div>
      <div class="tl-step"><div class="tl-step__dot">✅</div><div class="tl-step__title">Nghiệm thu 14 điểm</div><div class="tl-step__desc">Ký biên bản, bàn giao hướng dẫn vận hành</div></div>
    </div>
  </div>
</section>

<!-- ══ COMMITMENT STRIP ══ -->
<div class="commit-strip rv">
  <div class="commit-item"><div class="commit-item__ico">🔍</div><div class="commit-item__title">Kiểm định độc lập</div><div class="commit-item__desc">Cho phép kiểm tra bởi bên thứ ba bất kỳ lúc nào</div></div>
  <div class="commit-item"><div class="commit-item__ico">📄</div><div class="commit-item__title">Minh bạch hồ sơ</div><div class="commit-item__desc">Cung cấp đầy đủ chứng nhận, spec sheet gốc</div></div>
  <div class="commit-item"><div class="commit-item__ico">⚡</div><div class="commit-item__title">Cam kết SLA</div><div class="commit-item__desc">Vi phạm tiêu chí — gia hạn bảo hành miễn phí</div></div>
  <div class="commit-item"><div class="commit-item__ico">♻️</div><div class="commit-item__title">Cải tiến liên tục</div><div class="commit-item__desc">Bộ tiêu chí được rà soát và cập nhật 6 tháng/lần</div></div>
</div>

<!-- ══ CTA ══ -->
<div class="cta">
  <div class="cta__inner">
    <div>
      <h2 class="cta__h">Muốn xem bộ tiêu chí<br>đầy đủ <em>47 điểm</em>?</h2>
      <p class="cta__sub">Chúng tôi công khai toàn bộ checklist kiểm định — không có gì phải giấu.</p>
    </div>
    <div class="cta-btns">
      <a href="mailto:info@tavaled.vn" class="btn-w">Yêu cầu bộ tiêu chí đầy đủ</a>
      <a href="/minh-bach-nang-luc" class="btn-g">
        Xem Minh bạch Năng lực
        <svg viewBox="0 0 24 24"><line x1="5" y1="12" x2="19" y2="12"/><polyline points="12 5 19 12 12 19"/></svg>
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
function countUp(el,to,dur=1600){let n=0;const s=to/(dur/16);const t=setInterval(()=>{n=Math.min(n+s,to);el.textContent=Math.floor(n);if(n>=to)clearInterval(t)},16)}
const co=new IntersectionObserver(e=>{e.forEach(x=>{if(x.isIntersecting){x.target.querySelectorAll('.cnt').forEach(el=>countUp(el,+el.dataset.to));x.target.querySelectorAll('.sc').forEach(el=>el.classList.add('counted'));co.unobserve(x.target)}})},{threshold:.3});
document.querySelectorAll('.score-grid').forEach(el=>co.observe(el));
</script>


<?php get_footer(); ?>