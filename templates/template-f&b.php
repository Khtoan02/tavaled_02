<?php
/**
 * Template Name: Trang F&B Giải trí
 */

get_header(); ?>


<style>
.page-template-template-f-b-php *, .page-template-template-f-b-php *::before, .page-template-template-f-b-php *::after{box-sizing:border-box;margin:0;padding:0}

:root{
  --navy:#1c2857;--navy2:#162248;--navy3:#0f1835;
  --o:#f05a25;--odk:#c8451a;--olt:#fff3ee;
  --warm:#1a0f0a;--warm2:#120b06;
  --w:#fff;--ink:#111827;--mid:#374151;--muted:#6b7280;
  --light:#f9fafb;--bdr:#e5e7eb;
  --ff:'Mona Sans','Mona-Sans',sans-serif;
}
html{scroll-behavior:smooth}
body{font-family:var(--ff);background:var(--warm);color:var(--w);-webkit-font-smoothing:antialiased;overflow-x:hidden;cursor:none}
#cd,#cr{position:fixed;border-radius:50%;pointer-events:none;z-index:9999;transform:translate(-50%,-50%)}
#cd{width:7px;height:7px;background:var(--o)}
#cr{width:36px;height:36px;border:1.5px solid rgba(240,90,37,.4);transition:width .3s,height .3s,border-color .3s}
body:has(a:hover) #cr,body:has(button:hover) #cr{width:50px;height:50px;border-color:var(--o)}

/* ══ HERO — WARM CINEMATIC ══ */
.hero{height:100vh;min-height:700px;position:relative;overflow:hidden;display:flex;align-items:flex-end;background:var(--warm2)}
.hero__bg{position:absolute;inset:0}
.hero__bg img{width:100%;height:100%;object-fit:cover;filter:brightness(.45) saturate(1.1)}
.hero__fog{position:absolute;inset:0;z-index:1;background:linear-gradient(180deg,rgba(26,15,10,.5) 0%,transparent 28%,rgba(26,15,10,.3) 55%,rgba(26,15,10,.96) 100%),linear-gradient(90deg,rgba(26,15,10,.4) 0%,transparent 65%)}
.hero__glow{position:absolute;bottom:0;left:0;right:0;height:60%;z-index:1;background:radial-gradient(ellipse 80% 60% at 30% 100%,rgba(240,90,37,.12) 0%,transparent 70%)}
.hero__bar{position:absolute;bottom:0;left:0;right:0;height:3px;z-index:3;background:linear-gradient(90deg,var(--o),var(--odk) 45%,rgba(240,90,37,.2))}

.hero__body{position:relative;z-index:2;padding:0 56px 88px;max-width:1320px;margin:0 auto;width:100%;display:grid;grid-template-columns:1fr 1fr;gap:72px;align-items:flex-end}
.hero__tag{display:inline-flex;align-items:center;gap:9px;font-size:9.5px;font-weight:700;letter-spacing:.24em;text-transform:uppercase;color:var(--o);padding:4px 12px;background:rgba(240,90,37,.1);border:1px solid rgba(240,90,37,.28);border-radius:4px;margin-bottom:20px;opacity:0;animation:su .5s .1s ease forwards}
.hero__h1{font-family:var(--ff);font-weight:800;font-size:clamp(3rem,6vw,6rem);letter-spacing:-.07em;color:#fff;line-height:.88;margin-bottom:22px;opacity:0;animation:su .9s .25s cubic-bezier(.16,1,.3,1) forwards}
.hero__h1 em{font-style:italic;font-weight:300;color:var(--o);display:block}
.hero__sub{font-size:15px;font-weight:300;color:rgba(255,255,255,.5);line-height:1.85;max-width:420px;margin-bottom:32px;opacity:0;animation:su .65s .45s ease forwards}
.hero__acts{display:flex;gap:12px;flex-wrap:wrap;opacity:0;animation:su .6s .62s ease forwards}
.btn-p{display:inline-flex;align-items:center;gap:8px;padding:13px 26px;background:var(--o);color:#fff;font-family:var(--ff);font-size:12.5px;font-weight:700;letter-spacing:.05em;text-transform:uppercase;border-radius:8px;text-decoration:none;box-shadow:0 4px 24px rgba(240,90,37,.4);transition:background .18s,transform .15s}
.btn-p:hover{background:var(--odk);transform:translateY(-2px)}
.btn-g{display:inline-flex;align-items:center;gap:8px;padding:12px 22px;background:transparent;border:1.5px solid rgba(255,255,255,.25);color:rgba(255,255,255,.78);font-family:var(--ff);font-size:12.5px;font-weight:600;text-transform:uppercase;letter-spacing:.04em;border-radius:8px;text-decoration:none;transition:border-color .2s,color .2s,background .2s}
.btn-g:hover{border-color:rgba(255,255,255,.55);color:#fff;background:rgba(255,255,255,.06)}
.hero__right{opacity:0;animation:su .7s .55s ease forwards}
.atmo-box{border-left:3px solid var(--o);padding:4px 0 4px 24px;margin-bottom:24px}
.atmo-box__text{font-family:var(--ff);font-size:clamp(1.3rem,2.5vw,2.1rem);font-weight:300;font-style:italic;color:#fff;line-height:1.3;letter-spacing:-.02em}
.atmo-box__text strong{font-weight:700;color:var(--o);font-style:normal}
.atmo-box__author{font-size:11px;letter-spacing:.14em;text-transform:uppercase;color:rgba(255,255,255,.3);margin-top:10px}
.atmo-stats{display:grid;grid-template-columns:1fr 1fr 1fr;gap:8px}
.as{background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.09);padding:14px 12px;text-align:center;border-radius:7px}
.as__val{font-family:var(--ff);font-size:1.7rem;font-weight:800;letter-spacing:-.06em;color:#fff;line-height:1}
.as__val span{color:var(--o)}
.as__l{font-size:9.5px;font-weight:600;letter-spacing:.1em;text-transform:uppercase;color:rgba(255,255,255,.35);margin-top:4px}

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

/* ══ SPACE TYPES — FULL BLEED ══ */
.spaces{display:grid;grid-template-columns:repeat(4,1fr);grid-auto-rows:320px;gap:3px}
.sp{position:relative;overflow:hidden;cursor:default}
.sp img{width:100%;height:100%;object-fit:cover;filter:brightness(.45) saturate(1.05);transition:filter .5s,transform .7s cubic-bezier(.16,1,.3,1)}
.sp:hover img{filter:brightness(.3) saturate(1.1);transform:scale(1.06)}
.sp__over{position:absolute;inset:0;background:linear-gradient(180deg,transparent 30%,rgba(26,15,10,.95) 100%)}
.sp__glow{position:absolute;inset:0;opacity:0;transition:opacity .4s}
.sp:hover .sp__glow{opacity:1}
.sp--rest .sp__glow{background:radial-gradient(ellipse 70% 50% at 50% 100%,rgba(240,90,37,.15) 0%,transparent 70%)}
.sp--bar .sp__glow{background:radial-gradient(ellipse 70% 50% at 50% 100%,rgba(120,40,150,.2) 0%,transparent 70%)}
.sp--kara .sp__glow{background:radial-gradient(ellipse 70% 50% at 50% 100%,rgba(240,90,37,.18) 0%,transparent 70%)}
.sp--club .sp__glow{background:radial-gradient(ellipse 70% 50% at 50% 100%,rgba(0,100,240,.15) 0%,transparent 70%)}
.sp__body{position:absolute;bottom:0;left:0;right:0;padding:24px 20px 20px}
.sp__ico{font-size:28px;margin-bottom:10px}
.sp__tag{font-size:9px;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:var(--o);margin-bottom:6px}
.sp__title{font-family:var(--ff);font-weight:800;font-size:1.1rem;color:#fff;line-height:1.2;letter-spacing:-.03em;margin-bottom:6px}
.sp__desc{font-size:12.5px;color:rgba(255,255,255,.5);line-height:1.6}
.sp--tall{grid-row:span 2}

/* ══ EXPERIENCE STORY ══ */
.exp-story{padding:100px 0;background:var(--warm2);position:relative;overflow:hidden}
.exp-story::before{content:'';position:absolute;inset:0;background-image:linear-gradient(rgba(255,255,255,.018) 1px,transparent 1px),linear-gradient(90deg,rgba(255,255,255,.018) 1px,transparent 1px);background-size:52px 52px}
.exp-story::after{content:'';position:absolute;bottom:-120px;left:50%;transform:translateX(-50%);width:600px;height:300px;border-radius:50%;background:radial-gradient(circle,rgba(240,90,37,.1) 0%,transparent 70%);pointer-events:none}
.exp-layout{display:grid;grid-template-columns:1fr 1fr;gap:80px;align-items:center;position:relative;z-index:1}
.exp-quote{border-left:4px solid var(--o);padding:4px 0 4px 28px}
.exp-quote__mark{font-family:var(--ff);font-size:7rem;color:rgba(240,90,37,.15);line-height:.75;font-weight:800}
.exp-quote__text{font-family:var(--ff);font-size:clamp(1.5rem,2.8vw,2.4rem);font-weight:300;font-style:italic;color:#fff;line-height:1.28;letter-spacing:-.02em}
.exp-quote__text strong{font-weight:700;color:var(--o);font-style:normal}
.exp-quote__author{font-size:11px;letter-spacing:.14em;text-transform:uppercase;color:rgba(255,255,255,.3);margin-top:16px}
.exp-benefits{display:flex;flex-direction:column;gap:14px}
.exp-benefit{display:flex;align-items:flex-start;gap:16px;padding:18px 20px;background:rgba(255,255,255,.05);border:1px solid rgba(255,255,255,.08);border-radius:10px;transition:background .2s,border-color .2s}
.exp-benefit:hover{background:rgba(240,90,37,.1);border-color:rgba(240,90,37,.25)}
.exp-benefit__ico{font-size:22px;flex-shrink:0;margin-top:2px}
.exp-benefit__title{font-size:14px;font-weight:700;color:#fff;margin-bottom:3px}
.exp-benefit__desc{font-size:12.5px;color:rgba(255,255,255,.45);line-height:1.6}

/* ══ PRODUCTS — WHITE SECTION ══ */
.prod-section{background:var(--w);padding:88px 0}
.prod-tabs{display:flex;gap:8px;flex-wrap:wrap;margin-bottom:32px}
.ptab{padding:9px 20px;border-radius:8px;border:1.5px solid var(--bdr);background:var(--light);font-family:var(--ff);font-size:12.5px;font-weight:600;color:var(--muted);cursor:pointer;transition:all .22s}
.ptab:hover{border-color:var(--navy);color:var(--navy)}
.ptab.active{background:var(--navy);border-color:var(--navy);color:#fff;box-shadow:0 4px 16px rgba(28,40,87,.18)}
.ptab-panel{display:none}.ptab-panel.active{display:block}
.prod-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:14px}
.pcard{background:var(--light);border:1.5px solid var(--bdr);border-radius:11px;overflow:hidden;text-decoration:none;display:flex;flex-direction:column;transition:border-color .2s,transform .3s cubic-bezier(.16,1,.3,1),box-shadow .26s}
.pcard:hover{border-color:rgba(28,40,87,.2);transform:translateY(-4px);box-shadow:0 16px 40px rgba(28,40,87,.09)}
.pcard__img{height:150px;overflow:hidden}
.pcard__img img{width:100%;height:100%;object-fit:cover;filter:saturate(.82);transition:transform .5s,filter .3s}
.pcard:hover .pcard__img img{transform:scale(1.06);filter:saturate(1)}
.pcard__body{padding:12px 14px 14px;flex:1;display:flex;flex-direction:column}
.pcard__cat{font-size:9px;font-weight:700;letter-spacing:.14em;text-transform:uppercase;color:var(--o);opacity:.75;margin-bottom:4px}
.pcard__name{font-family:var(--ff);font-weight:800;font-size:.92rem;letter-spacing:-.03em;color:var(--navy);line-height:1.25;transition:color .2s}
.pcard:hover .pcard__name{color:var(--o)}
.pcard__spec{font-size:10px;font-weight:600;color:var(--muted);margin-top:auto;padding-top:10px;border-top:1px solid var(--bdr)}

/* ══ GALLERY SCROLL ══ */
.gallery{overflow:hidden;background:var(--warm)}
.g-track{display:flex;gap:3px;animation:gscroll 32s linear infinite;width:max-content}
.gallery:hover .g-track{animation-play-state:paused}
@keyframes gscroll{to{transform:translateX(-50%)}}
.g-item{display:block;flex-shrink:0;width:280px;height:180px;overflow:hidden;position:relative}
.g-item img{width:100%;height:100%;object-fit:cover;filter:brightness(.6) saturate(1.1);transition:filter .4s,transform .4s}
.g-item:hover img{filter:brightness(.8) saturate(1.3);transform:scale(1.05)}
.g-item__label{position:absolute;bottom:0;left:0;right:0;padding:20px 12px 10px;background:linear-gradient(transparent,rgba(26,15,10,.75));font-size:12px;font-weight:600;color:rgba(255,255,255,.9);line-height:1.3}

/* ══ CASES ══ */
.cases{display:grid;grid-template-columns:1.4fr 1fr 1fr;gap:4px;border-radius:12px;overflow:hidden}
.case{position:relative;overflow:hidden;min-height:380px;background:var(--warm);text-decoration:none;display:block}
.case img{width:100%;height:100%;object-fit:cover;filter:brightness(.8) saturate(1.05);transition:filter .5s,transform .7s}
.case:hover img{filter:brightness(.7) saturate(1.1);transform:scale(1.05)}
.case__over{position:absolute;inset:0;background:linear-gradient(180deg,rgba(18,11,6,0) 30%,rgba(18,11,6,0.5) 60%,rgba(18,11,6,0.95) 100%)}
.case__body{position:absolute;bottom:0;left:0;right:0;padding:26px 22px 20px}
.case__tag{font-size:9px;font-weight:700;letter-spacing:.18em;text-transform:uppercase;color:var(--o);margin-bottom:7px;display:flex;align-items:center;gap:6px}
.case__tag::before{content:'';display:block;width:14px;height:1.5px;background:var(--o)}
.case__name{font-family:var(--ff);font-weight:800;color:#fff;line-height:1.2;letter-spacing:-.03em;margin-bottom:8px}
.case--main .case__name{font-size:1.35rem}
.case:not(.case--main) .case__name{font-size:1.05rem}
.case__specs{display:flex;flex-wrap:wrap;gap:6px}
.spec{font-size:9.5px;font-weight:600;padding:3px 8px;border-radius:3px;background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.12);color:rgba(255,255,255,.65)}

/* ══ CTA ══ */
.cta{background:var(--o);padding:64px 0;position:relative;overflow:hidden}
.cta::before{content:'';position:absolute;inset:0;background:linear-gradient(135deg,var(--o),var(--odk))}
.cta::after{content:'';position:absolute;top:-80px;right:-80px;width:350px;height:350px;border-radius:50%;background:rgba(255,255,255,.07);pointer-events:none}
.cta__inner{max-width:1320px;margin:0 auto;padding:0 56px;position:relative;z-index:1;display:flex;align-items:center;justify-content:space-between;gap:32px;flex-wrap:wrap}
.cta__h{font-family:var(--ff);font-weight:800;font-size:clamp(1.7rem,3vw,2.6rem);letter-spacing:-.05em;color:#fff;line-height:1.05}
.cta__h em{font-style:italic;font-weight:300}
.cta__sub{font-size:14px;color:rgba(255,255,255,.75);margin-top:6px}
.cta-btns{display:flex;gap:12px;flex-wrap:wrap}
.btn-w{display:inline-flex;align-items:center;gap:8px;padding:13px 28px;background:#fff;color:var(--navy);font-family:var(--ff);font-size:12.5px;font-weight:700;letter-spacing:.04em;text-transform:uppercase;border-radius:8px;text-decoration:none;box-shadow:0 4px 20px rgba(0,0,0,.15);transition:transform .15s,box-shadow .2s}
.btn-w:hover{transform:translateY(-2px);box-shadow:0 8px 28px rgba(0,0,0,.2)}
.btn-wg{display:inline-flex;align-items:center;gap:8px;padding:12px 22px;background:transparent;border:1.5px solid rgba(255,255,255,.3);color:rgba(255,255,255,.85);font-family:var(--ff);font-size:12.5px;font-weight:600;text-transform:uppercase;letter-spacing:.04em;border-radius:8px;text-decoration:none;transition:border-color .2s,color .2s}
.btn-wg:hover{border-color:rgba(255,255,255,.6);color:#fff}

@keyframes su{from{opacity:0;transform:translateY(18px)}to{opacity:1;transform:translateY(0)}}
.rv{opacity:0;transform:translateY(22px);transition:opacity .7s cubic-bezier(.16,1,.3,1),transform .7s cubic-bezier(.16,1,.3,1)}
.rv.in{opacity:1;transform:translateY(0)}
.d1{transition-delay:.08s}.d2{transition-delay:.16s}.d3{transition-delay:.24s}

@media(max-width:1100px){.hero__body,.exp-layout{grid-template-columns:1fr;gap:40px}.spaces{grid-template-columns:repeat(2,1fr)}.sp--tall{grid-row:span 1}.prod-grid{grid-template-columns:repeat(2,1fr)}.cases{grid-template-columns:1fr 1fr}.case--main{grid-column:span 2}}
@media(max-width:768px){.hero__body,.inner,.exp-layout,.cta__inner{padding-left:20px;padding-right:20px}.spaces{grid-template-columns:1fr 1fr}.prod-grid{grid-template-columns:1fr 1fr}.cases{grid-template-columns:1fr}.case--main{grid-column:span 1}.atmo-stats{grid-template-columns:1fr 1fr 1fr}.sec-head{flex-direction:column;gap:16px;margin-bottom:32px}}
</style>
</head>
<body>
<div id="cd"></div><div id="cr"></div>

<!-- HERO -->
<section class="hero">
  <div class="hero__bg" aria-hidden="true"><img src="https://images.unsplash.com/photo-1514362545857-3bc16c4c7d1b?w=1600&q=90" alt="Không gian F&B giải trí" loading="eager"></div>
  <div class="hero__fog" aria-hidden="true"></div>
  <div class="hero__glow" aria-hidden="true"></div>
  <div class="hero__bar" aria-hidden="true"></div>
  <div class="hero__body">
    <div>
      <div class="hero__tag">🍷 F&B & Giải trí</div>
      <h1 class="hero__h1">Không gian tạo<br><em>cảm xúc & ký ức</em></h1>
      <p class="hero__sub">Khách hàng không nhớ menu — họ nhớ bầu không khí. TavaLED thiết kế ánh sáng, âm thanh và visual đồng bộ để mỗi lần ghé thăm là một trải nghiệm riêng.</p>
      <div class="hero__acts">
        <a href="#cta" class="btn-p">Tư vấn không gian</a>
        <a href="#spaces" class="btn-g">Khám phá giải pháp →</a>
      </div>
    </div>
    <div class="hero__right">
      <div class="atmo-box">
        <div class="atmo-box__text">Ánh sáng đúng có thể tăng<br><strong>doanh thu 20–30%</strong> cho F&B</div>
        <div class="atmo-box__author">— Nghiên cứu Cornell Hospitality Quarterly</div>
      </div>
      <div class="atmo-stats">
        <div class="as"><div class="as__val"><span class="cnt" data-to="350">0</span><span>+</span></div><div class="as__l">Không gian</div></div>
        <div class="as"><div class="as__val">3<span>×</span></div><div class="as__l">Tăng check-in</div></div>
        <div class="as"><div class="as__val"><span class="cnt" data-to="98">0</span><span>%</span></div><div class="as__l">Hài lòng</div></div>
      </div>
    </div>
  </div>
</section>



<!-- EXPERIENCE STORY -->
<section class="exp-story">
  <div class="inner">
    <div class="exp-layout">

      <div class="exp-benefits rv d2">
        <div class="exp-benefit"><div class="exp-benefit__ico">📸</div><div><div class="exp-benefit__title">Tăng check-in mạng xã hội 3×</div><div class="exp-benefit__desc">Ánh sáng đúng góc giúp khách tự trở thành người quảng cáo miễn phí cho nhà hàng của bạn</div></div></div>
        <div class="exp-benefit"><div class="exp-benefit__ico">⏰</div><div><div class="exp-benefit__title">Tăng thời gian khách ở lại</div><div class="exp-benefit__desc">Không gian dễ chịu khiến khách ngồi lâu hơn — đồng nghĩa với bill cao hơn mỗi bàn</div></div></div>
        <div class="exp-benefit"><div class="exp-benefit__ico">🔄</div><div><div class="exp-benefit__title">Thay đổi mood theo giờ</div><div class="exp-benefit__desc">Buổi trưa sáng tươi, buổi tối ấm sâu — hệ thống điều khiển scene tự động theo lịch đặt sẵn</div></div></div>
        <div class="exp-benefit"><div class="exp-benefit__ico">🎵</div><div><div class="exp-benefit__title">Âm thanh đúng âm lượng đúng lúc</div><div class="exp-benefit__desc">Âm nhạc nền lúc đông, nhạc nhẹ lúc vắng — hệ thống tự điều chỉnh theo sensor khách</div></div></div>
      </div>
    </div>
  </div>
</section>


<!-- GALLERY -->
<div class="gallery">
  <div class="g-track">
    <?php
    $project_ids_str = get_option('tavaled_home_projects');
    $project_ids = !empty($project_ids_str) ? explode(',', $project_ids_str) : [];
    
    // Nếu chưa cấu hình, fallback một mảng rỗng để không in lỗi, hoặc fallback tĩnh
    if (empty($project_ids)) {
        $project_ids = [];
    }
    
    // Render 2 lần để tạo hiệu ứng Infinite Scroll Loop
    for ($i = 0; $i < 2; $i++) {
        if (!empty($project_ids)) {
            foreach ($project_ids as $id) {
                // Lấy Cấu hình thông qua attachment id
                $img_src = wp_get_attachment_image_url($id, 'large');
                $title   = get_post_meta($id, '_tavaled_project_name', true) ?: get_the_title($id); 
                $caption = get_post_meta($id, '_tavaled_project_desc', true) ?: wp_get_attachment_caption($id);
                if (!$img_src) continue;
                ?>
                <div class="g-item">
                  <img src="<?php echo esc_url($img_src); ?>" alt="<?php echo esc_attr($title); ?>" loading="lazy">
                  <div class="g-item__label">
                    <?php echo esc_html($title); ?>
                    <?php if ($caption): ?><br><?php echo esc_html($caption); ?><?php endif; ?>
                  </div>
                </div>
                <?php
            }
        } else {
            // Demo tĩnh nếu như admin vô tình xoá ảnh
            ?>
            <div class="g-item"><img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=600&q=80" alt="Demo"><div class="g-item__label">Lắp đặt màn hình LED<br>Học Viện Kỹ Thuật</div></div>
            <div class="g-item"><img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=600&q=80" alt="Demo"><div class="g-item__label">LED P2<br>Công Ty Cao Su 75</div></div>
            <div class="g-item"><img src="https://images.unsplash.com/photo-1567521464027-f127ff144326?w=600&q=80" alt="Demo"><div class="g-item__label">LED P1.8<br>Công ty Mai 299</div></div>
            <?php
        }
        if ($i === 0) echo '<!-- Duplicate for infinite scroll loop -->';
    }
    ?>
  </div>
</div>

<!-- CASES -->
<section class="section" style="background:var(--warm2)">
  <div class="inner">
    <div class="sec-head rv"><div><div class="ey">Dự án tiêu biểu</div><h2 class="sh sh--w">Không gian đã <em>được kể lại</em></h2></div><a href="/du-an" style="font-size:12.5px;font-weight:600;color:rgba(255,255,255,.5);text-decoration:none;border-bottom:1px solid rgba(255,255,255,.2);padding-bottom:2px">Xem tất cả →</a></div>
    <div class="cases rv d1">
      <a href="#" class="case case--main"><img src="https://tavaled.vn/wp-content/uploads/2026/03/Pandora.jpg" alt="" loading="lazy"><div class="case__over"></div><div class="case__body"><div class="case__tag">Dự án trọng điểm</div><div class="case__name">Pandora — Tổ hợp không gian hoành tráng hàng đầu</div><div class="case__specs"><span class="spec">Hệ thống ánh sáng </span><span class="spec">Âm thanh</span><span class="spec">Màn hình LED</span></div></div></a>
      <a href="#" class="case"><img src="https://thegioiclub.com/Uploads/files/01-2025/bnew/garden2-15.jpg" alt="" loading="lazy"><div class="case__over"></div><div class="case__body"><div class="case__tag">F&B Giải trí</div><div class="case__name">Nhà Hàng Bia Tây Âu</div><div class="case__specs"><span class="spec">Âm thanh sôi động</span><span class="spec">Ánh sáng</span></div></div></a>
      <a href="#" class="case"><img src="https://tavaled.vn/wp-content/uploads/2026/03/nha-hang-amakongNhan-su.jpg" alt="" loading="lazy"><div class="case__over"></div><div class="case__body"><div class="case__tag">Nhà hàng</div><div class="case__name">Nhà Hàng Amakong</div><div class="case__specs"><span class="spec">Chiếu sáng Decor</span><span class="spec">BGM Audio</span></div></div></a>
      <a href="#" class="case"><img src="https://tavaled.vn/wp-content/uploads/2026/03/nha-hang-de-79.jpg" alt="" loading="lazy"><div class="case__over"></div><div class="case__body"><div class="case__tag">Nhà hàng</div><div class="case__name">Nhà hàng Dê 79</div><div class="case__specs"><span class="spec">Chiếu sáng không gian</span></div></div></a>
      <a href="#" class="case"><img src="https://tavaled.vn/wp-content/uploads/2026/03/nha-hang-huu-hanh.jpg" alt="" loading="lazy"><div class="case__over"></div><div class="case__body"><div class="case__tag">Nhà hàng</div><div class="case__name">Nhà hàng Hữu Hạnh</div><div class="case__specs"><span class="spec">Hệ thống âm thanh</span></div></div></a>
      <a href="#" class="case"><img src="https://tavaled.vn/wp-content/uploads/2026/03/Nha-hang-Ngoi-Do-1.jpg" alt="" loading="lazy"><div class="case__over"></div><div class="case__body"><div class="case__tag">Nhà hàng</div><div class="case__name">Nhà hàng Ngói Đỏ</div><div class="case__specs"><span class="spec">Trực quan ánh sáng</span></div></div></a>
      <a href="#" class="case"><img src="https://tavaled.vn/wp-content/uploads/2026/03/Nha-hang-Phu-Quy-3.jpg" alt="" loading="lazy"><div class="case__over"></div><div class="case__body"><div class="case__tag">Nhà hàng</div><div class="case__name">Nhà Hàng Phú Quý</div><div class="case__specs"><span class="spec">Setup thiết bị giải trí</span></div></div></a>
    </div>
  </div>
</section>

<!-- CTA -->
<div class="cta" id="cta">
  <div class="cta__inner">
    <div><h2 class="cta__h">Không gian của bạn<br><em>xứng đáng được nhớ mãi</em></h2><p class="cta__sub">Tư vấn concept ánh sáng miễn phí. Đội thiết kế TavaLED đến khảo sát và mang đến bản concept 3D.</p></div>
    <div class="cta-btns"><a href="tel:19001234" class="btn-w">📞 1900 1234</a><a href="mailto:tuyen.tavaco@gmail.com?subject=Tư vấn không gian F&B" class="btn-wg">Gửi yêu cầu</a></div>
  </div>
</div>

<script>
const cd=document.getElementById('cd'),cr=document.getElementById('cr');let mx=0,my=0,rx=0,ry=0;
window.addEventListener('mousemove',e=>{mx=e.clientX;my=e.clientY},{passive:true});
(function t(){rx+=(mx-rx)*.13;ry+=(my-ry)*.13;cd.style.cssText=`left:${mx}px;top:${my}px`;cr.style.cssText=`left:${rx}px;top:${ry}px`;requestAnimationFrame(t)})();
const obs=new IntersectionObserver(e=>{e.forEach(x=>{if(x.isIntersecting){x.target.classList.add('in');obs.unobserve(x.target)}})},{threshold:.08,rootMargin:'0px 0px -30px 0px'});
document.querySelectorAll('.rv').forEach(el=>obs.observe(el));
function countUp(el,to){let n=0;const s=to/(1600/16);const ti=setInterval(()=>{n=Math.min(n+s,to);el.textContent=Math.floor(n);if(n>=to)clearInterval(ti)},16)}
const co=new IntersectionObserver(e=>{e.forEach(x=>{if(x.isIntersecting){x.target.querySelectorAll('.cnt').forEach(el=>countUp(el,+el.dataset.to));co.unobserve(x.target)}})},{threshold:.4});
document.querySelectorAll('.hero').forEach(el=>co.observe(el));
function switchTab(btn,id){document.querySelectorAll('.ptab').forEach(b=>b.classList.remove('active'));document.querySelectorAll('.ptab-panel').forEach(p=>p.classList.remove('active'));btn.classList.add('active');document.getElementById(id).classList.add('active')}
</script>
<?php get_footer(); ?>