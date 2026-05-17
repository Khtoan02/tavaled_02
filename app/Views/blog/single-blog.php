<?php view('layouts/header', ['title' => get_the_title()]); ?>
<?php
/* ─── Post meta ─── */
$post_id       = get_the_ID();
$thumb         = get_the_post_thumbnail_url($post_id, 'full') ?: 'https://images.unsplash.com/photo-1518770660439-4636190af475?w=1600&q=80';
$categories    = get_the_category();
$cat_name      = !empty($categories) ? esc_html($categories[0]->name) : 'Tin tức';
$cat_link      = !empty($categories) ? esc_url(get_category_link($categories[0]->term_id)) : '#';
$read_time     = max(1, ceil(str_word_count(strip_tags(get_the_content())) / 200));
$tags          = get_the_tags();
?>

<!-- Progress bar -->
<div id="sb-bar" class="fixed top-0 left-0 h-[3px] w-0 bg-brand-orange z-[9999]"></div>

<!-- ═══════════════════════════════════════════════
     HERO – background = featured image
════════════════════════════════════════════════ -->
<section class="relative w-full overflow-hidden" style="height:480px">
  <!-- BG Image -->
  <div class="absolute inset-0 bg-cover bg-center bg-no-repeat" style="background-image:url('<?php echo esc_url($thumb); ?>')"></div>
  <!-- Overlay gradient -->
  <div class="absolute inset-0 bg-gradient-to-t from-gray-950/90 via-gray-900/55 to-gray-900/30"></div>

  <!-- Hero content → aligned to site container -->
  <div class="relative h-full w-full max-w-[1600px] mx-auto px-4 lg:px-8 flex flex-col justify-end pb-10">
    <!-- Breadcrumb -->
    <nav class="flex items-center gap-2 text-[11px] font-bold uppercase tracking-widest text-white/50 mb-4">
      <a href="<?php echo esc_url(home_url('/')); ?>" class="hover:text-white transition-colors">Trang chủ</a>
      <span>/</span>
      <a href="<?php echo $cat_link; ?>" class="text-brand-orange hover:text-white transition-colors"><?php echo $cat_name; ?></a>
    </nav>

    <span class="inline-block mb-3 px-3 py-1 rounded-full text-[11px] font-bold uppercase tracking-widest text-white bg-brand-orange/80 w-fit"><?php echo $cat_name; ?></span>

    <h1 class="text-2xl md:text-4xl font-extrabold text-white leading-snug max-w-[800px] mb-5 tracking-tight drop-shadow">
      <?php the_title(); ?>
    </h1>

    <!-- Meta bar -->
    <div class="flex flex-wrap items-center gap-4 text-sm text-white/70">
      <?php echo get_avatar(get_the_author_meta('ID'), 36, '', '', ['class' => 'w-8 h-8 rounded-full border-2 border-white/30 object-cover']); ?>
      <span class="font-semibold text-white/90">Biên tập viên TAVA</span>
      <span class="w-1 h-1 rounded-full bg-white/30"></span>
      <time><?php echo get_the_date('d/m/Y'); ?></time>
      <span class="w-1 h-1 rounded-full bg-white/30"></span>
      <span class="text-brand-orange font-semibold"><?php echo $read_time; ?> phút đọc</span>
    </div>
  </div>
</section>

<!-- ═══════════════════════════════════════════════
     MAIN LAYOUT (container khớp header = 1600px)
════════════════════════════════════════════════ -->
<div class="w-full max-w-[1600px] mx-auto px-4 lg:px-8 py-10 flex flex-col lg:flex-row gap-8 xl:gap-12 items-start bg-[#F7F8FA]">

  <!-- ══════════════════════
       LEFT: ARTICLE BODY
  ══════════════════════ -->
  <main class="w-full min-w-0 flex-1">

    <!-- Article card -->
    <div class="bg-white rounded-2xl border border-gray-100 shadow-[0_2px_16px_rgba(0,0,0,0.04)] p-6 md:p-10">
      <div class="sb-prose">
        <?php the_content(); ?>
      </div>

      <!-- Tags -->
      <?php if ($tags) : ?>
      <div class="mt-10 pt-6 border-t border-gray-100 flex flex-wrap gap-2">
        <?php foreach ($tags as $tag) : ?>
          <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>"
             class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-gray-50 text-gray-500 border border-gray-200 hover:bg-brand-orange hover:text-white hover:border-brand-orange transition-all">
            #<?php echo esc_html($tag->name); ?>
          </a>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>

      <!-- Author mini -->
      <div class="mt-10 pt-6 border-t border-gray-100 flex items-center gap-4">
        <?php echo get_avatar(get_the_author_meta('ID'), 52, '', '', ['class' => 'w-12 h-12 rounded-full object-cover border-2 border-gray-100 flex-shrink-0']); ?>
        <div>
          <p class="text-[11px] font-bold uppercase tracking-widest text-brand-orange mb-0.5">Tác giả</p>
          <p class="font-bold text-gray-900 text-sm">Biên tập viên TAVA</p>
          <p class="text-xs text-gray-400 mt-0.5">Chuyên gia công nghệ hiển thị LED</p>
        </div>
        <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>"
           class="ml-auto hidden sm:inline-flex items-center gap-1.5 text-xs font-bold text-brand-orange hover:text-brand-orangedark transition-colors">
          Xem tất cả bài
          <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
        </a>
      </div>
    </div>

    <!-- ── Bài viết liên quan + CTA (cuối bài) ── -->
    <?php if (!empty($related_posts)) : ?>
    <section class="mt-10">
      <h2 class="flex items-center gap-2.5 text-lg font-extrabold text-gray-900 mb-5">
        <span class="w-1 h-5 rounded-full bg-brand-orange flex-shrink-0"></span>
        Bài viết liên quan
      </h2>
      <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
        <?php foreach ($related_posts as $rp) :
          $rth = get_the_post_thumbnail_url($rp->ID, 'medium') ?: 'https://images.unsplash.com/photo-1518770660439-4636190af475?w=600&q=70';
          $rcats = get_the_category($rp->ID);
          $rcat  = !empty($rcats) ? esc_html($rcats[0]->name) : '';
        ?>
        <a href="<?php echo get_permalink($rp->ID); ?>"
           class="group bg-white rounded-xl border border-gray-100 shadow-[0_1px_8px_rgba(0,0,0,0.04)] overflow-hidden hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 flex flex-col">
          <div class="overflow-hidden bg-gray-100">
            <img src="<?php echo esc_url($rth); ?>"
                 alt="<?php echo esc_attr($rp->post_title); ?>"
                 class="w-full aspect-[16/9] object-cover group-hover:scale-105 transition-transform duration-500">
          </div>
          <div class="p-4 flex flex-col flex-1">
            <?php if ($rcat) : ?><span class="text-[10px] font-bold uppercase tracking-widest text-brand-orange mb-1.5"><?php echo $rcat; ?></span><?php endif; ?>
            <h3 class="text-sm font-bold text-gray-900 line-clamp-2 leading-snug group-hover:text-brand-orange transition-colors"><?php echo esc_html($rp->post_title); ?></h3>
            <p class="mt-auto pt-3 text-[11px] text-gray-400"><?php echo get_the_date('d/m/Y', $rp->ID); ?></p>
          </div>
        </a>
        <?php endforeach; ?>
      </div>
    </section>
    <?php endif; ?>

    <!-- ── CTA banner cuối bài (CSKH dynamic) ── -->
    <?php
    $cta_cskh_val = \App\Helpers\ThemeHelper::getOption('phone_cskh', '');
    $cta_cskh_data = json_decode($cta_cskh_val, true);
    if (!is_array($cta_cskh_data) || empty($cta_cskh_data)) {
        $cta_cskh_data = [];
        $cta_phones = array_filter(array_map('trim', explode("\n", str_replace(',', "\n", $cta_cskh_val))));
        foreach ($cta_phones as $cp) {
            $cta_cskh_data[] = ['name' => 'CSKH', 'role' => 'KD & Hỗ trợ', 'phone' => $cp, 'email' => ''];
        }
    }
    if (empty($cta_cskh_data)) {
        $cta_cskh_data = [['name' => 'Hotline', 'role' => 'KD & Hỗ trợ', 'phone' => '0934 29 8181', 'email' => '']];
    }
    $cta_first = $cta_cskh_data[0];
    $cta_first_tel = preg_replace('/[^0-9+]/', '', $cta_first['phone']);
    ?>
    <div class="mt-10 rounded-2xl bg-gradient-to-br from-brand-dark to-brand-navy relative p-8 md:p-10 flex flex-col md:flex-row items-center gap-6 md:gap-10 shadow-lg" style="isolation:isolate">
      <div class="absolute -top-16 -right-16 w-56 h-56 rounded-full bg-brand-orange/25 blur-3xl pointer-events-none"></div>
      <div class="flex-1 text-center md:text-left relative">
        <p class="text-[11px] font-bold uppercase tracking-widest text-brand-orange mb-2">Tư vấn miễn phí</p>
        <h3 class="text-xl md:text-2xl font-extrabold text-white leading-snug mb-2">Cần tư vấn giải pháp màn hình LED?</h3>
        <p class="text-white/60 text-sm">Chuyên gia TavaLED hỗ trợ 24/7 — báo giá miễn phí, nhanh chóng.</p>
      </div>
      <div class="flex flex-col sm:flex-row gap-3 relative" style="overflow:visible">
        <!-- CSKH Hover Dropdown Button -->
        <div class="relative group/cta">
          <a href="tel:<?php echo esc_attr($cta_first_tel); ?>"
             class="inline-flex items-center justify-center gap-2 bg-brand-orange hover:bg-brand-orangedark text-white font-bold px-6 py-3.5 rounded-xl transition-colors shadow-lg shadow-brand-orange/30 whitespace-nowrap">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
            <?php echo esc_html($cta_first['phone']); ?>
            <?php if (count($cta_cskh_data) > 1): ?>
            <svg class="w-4 h-4 opacity-70 group-hover/cta:rotate-180 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
            <?php endif; ?>
          </a>
          <?php if (count($cta_cskh_data) > 0): ?>
          <!-- Dropdown list: xuất hiện phía TRÊN nút -->
          <div class="absolute bottom-full left-0 mb-3 min-w-[240px] bg-white rounded-2xl shadow-2xl border border-gray-100 overflow-hidden
                      opacity-0 invisible -translate-y-2 group-hover/cta:opacity-100 group-hover/cta:visible group-hover/cta:translate-y-0
                      transition-all duration-200" style="z-index:9999">
            <div class="px-4 py-3 border-b border-gray-50">
              <p class="text-[10px] font-bold uppercase tracking-widest text-gray-400">Đội ngũ CSKH</p>
            </div>
            <ul>
              <?php foreach ($cta_cskh_data as $ci):
                $ci_tel = preg_replace('/[^0-9+]/', '', $ci['phone']);
              ?>
              <li class="border-b border-gray-50 last:border-0">
                <a href="tel:<?php echo esc_attr($ci_tel); ?>"
                   class="flex items-center gap-3 px-4 py-3 hover:bg-gray-50 transition-colors group/item">
                  <div class="w-8 h-8 rounded-lg bg-brand-orange/10 flex items-center justify-center flex-shrink-0">
                    <svg class="w-4 h-4 text-brand-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                  </div>
                  <div class="min-w-0">
                    <p class="font-bold text-gray-900 text-[13px] leading-tight"><?php echo esc_html($ci['name'] ?: 'Nhân viên'); ?><?php if (!empty($ci['role'])) echo ' <span class="font-normal text-gray-400">— ' . esc_html($ci['role']) . '</span>'; ?></p>
                    <p class="text-brand-orange font-bold text-[13px]"><?php echo esc_html($ci['phone']); ?></p>
                  </div>
                </a>
              </li>
              <?php endforeach; ?>
            </ul>
            <div class="px-4 py-3 bg-gray-50 border-t border-gray-100">
              <a href="https://zalo.me/<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $cta_first['phone'])); ?>" target="_blank"
                 class="flex items-center justify-center gap-2 text-[#0068ff] text-[13px] font-bold hover:underline">
                <svg class="w-4 h-4" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.03 2 11c0 2.7 1.23 5.12 3.19 6.79L4.5 21l3.37-1.49A10.1 10.1 0 0012 20c5.52 0 10-4.03 10-9S17.52 2 12 2z"/></svg>
                Nhắn Zalo ngay
              </a>
            </div>
          </div>
          <?php endif; ?>
        </div>
        <a href="/lien-he"
           class="inline-flex items-center justify-center gap-2 bg-white/10 hover:bg-white/20 text-white font-bold px-7 py-3.5 rounded-xl transition-colors border border-white/20 whitespace-nowrap">
          Gửi yêu cầu
        </a>
      </div>
    </div>

  </main>

  <!-- ══════════════════════
       RIGHT: STICKY SIDEBAR
  ══════════════════════ -->
  <aside id="sb-sidebar" class="w-full lg:w-[300px] xl:w-[320px] flex-shrink-0 self-start lg:sticky space-y-5" style="top:180px">

    <!-- TABLE OF CONTENTS -->
    <div id="sb-toc-widget" class="bg-white rounded-2xl border border-gray-100 shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-5 hidden md:block">
      <h3 class="flex items-center gap-2 text-xs font-extrabold uppercase tracking-widest text-gray-800 mb-4">
        <span class="w-[3px] h-4 rounded-full bg-brand-orange flex-shrink-0"></span>
        Mục lục bài viết
      </h3>
      <nav id="sb-toc" class="text-[13px] text-gray-500 max-h-[340px] overflow-y-auto pr-1 space-y-0.5 sb-scroll">
        <p class="text-gray-400 text-xs italic">Đang tải...</p>
      </nav>
    </div>



    <!-- PRODUCTS BY CATEGORY (2 / cat) -->
    <?php if (!empty($products_by_cat)) :
      foreach ($products_by_cat as $pgroup) :
        $pcat  = $pgroup['cat'];
        $prods = $pgroup['products'];
    ?>
    <div class="bg-white rounded-2xl border border-gray-100 shadow-[0_2px_12px_rgba(0,0,0,0.04)] p-5">
      <h3 class="flex items-center gap-2 text-xs font-extrabold uppercase tracking-widest text-gray-800 mb-4">
        <span class="w-[3px] h-4 rounded-full bg-brand-orange flex-shrink-0"></span>
        <?php echo esc_html($pcat->name); ?>
      </h3>
      <ul class="space-y-3">
        <?php foreach ($prods as $prod) :
          $pth = get_the_post_thumbnail_url($prod->ID, 'thumbnail') ?: 'https://images.unsplash.com/photo-1518770660439-4636190af475?w=200&q=60';
          $plink = get_permalink($prod->ID);
        ?>
        <li>
          <a href="<?php echo esc_url($plink); ?>"
             class="group flex items-start gap-3 rounded-lg p-1.5 -mx-1.5 hover:bg-gray-50 transition-colors">
            <div class="w-14 h-12 flex-shrink-0 rounded-lg overflow-hidden bg-gray-100 border border-gray-100">
              <img src="<?php echo esc_url($pth); ?>"
                   alt="<?php echo esc_attr($prod->post_title); ?>"
                   class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
            </div>
            <div class="min-w-0 flex-1">
              <p class="text-[12.5px] font-semibold text-gray-800 line-clamp-2 leading-snug group-hover:text-brand-orange transition-colors"><?php echo esc_html($prod->post_title); ?></p>
              <span class="mt-1 inline-block text-[10px] font-bold uppercase tracking-wide text-brand-orange/70">Sản phẩm</span>
            </div>
          </a>
        </li>
        <?php endforeach; ?>
      </ul>
      <a href="<?php echo esc_url(get_term_link($pcat)); ?>"
         class="mt-3 flex items-center justify-center gap-1 text-[11px] font-bold text-brand-orange hover:text-brand-orangedark transition-colors pt-3 border-t border-gray-50">
        Xem tất cả
        <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
      </a>
    </div>
    <?php endforeach; endif; ?>

  </aside>
</div>

<!-- ─── LIGHTBOX ─── -->
<div id="sb-lightbox" class="fixed inset-0 z-[99999] bg-black/92 hidden items-center justify-center cursor-zoom-out p-4">
  <button id="sb-lbclose"
          class="absolute top-4 right-4 w-9 h-9 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-colors">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
  </button>
  <img id="sb-lbimg" src="" alt="" class="max-w-full max-h-[90vh] object-contain rounded-xl shadow-2xl">
</div>

<!-- ─── PROSE CSS ─── -->
<style>
/* Article typography — "content is king" */
.sb-prose{font-size:16.5px;line-height:1.8;color:#374151}
.sb-prose p{margin:0 0 1.35em}
.sb-prose h2{font-size:1.55rem;font-weight:800;color:#111827;margin:2.25em 0 .65em;padding-bottom:.5em;border-bottom:1px solid #f3f4f6;scroll-margin-top:155px}
.sb-prose h3{font-size:1.25rem;font-weight:700;color:#1f2937;margin:1.8em 0 .55em;scroll-margin-top:155px}
.sb-prose h4{font-size:1.05rem;font-weight:700;color:#374151;margin:1.4em 0 .45em;scroll-margin-top:155px}
.sb-prose a{color:#f05a25;font-weight:500;text-decoration:none;border-bottom:1.5px solid rgba(240,90,37,.2);transition:color .2s,border-color .2s}
.sb-prose a:hover{color:#c8451a;border-bottom-color:#c8451a}
.sb-prose strong{font-weight:700;color:#111827}
.sb-prose em{font-style:italic}
.sb-prose ul{list-style:none;margin:1em 0 1.35em;padding:0}
.sb-prose ul li{position:relative;padding-left:1.4em;margin-bottom:.4em}
.sb-prose ul li::before{content:'';position:absolute;left:0;top:.7em;width:6px;height:6px;border-radius:50%;background:#f05a25}
.sb-prose ol{list-style:decimal;margin:1em 0 1.35em;padding-left:1.5em}
.sb-prose ol li{margin-bottom:.4em}
.sb-prose blockquote{border-left:4px solid #f05a25;background:#fffbf9;padding:1.25em 1.5em;margin:1.75em 0;border-radius:0 10px 10px 0;font-style:italic;color:#374151}
.sb-prose code{font-family:Menlo,Monaco,monospace;font-size:.85em;background:#f3f4f6;padding:2px 6px;border-radius:4px;color:#c8451a}
.sb-prose pre{background:#1e293b;color:#e2e8f0;padding:1.5em;border-radius:12px;overflow-x:auto;margin:1.75em 0;font-size:.85em;line-height:1.65}
.sb-prose pre code{background:none;color:inherit;padding:0}
.sb-prose table{width:100%;border-collapse:collapse;margin:1.75em 0;font-size:.9em}
.sb-prose table th{background:#f9fafb;font-weight:700;text-align:left;padding:.65em 1em;border:1px solid #e5e7eb;color:#374151}
.sb-prose table td{padding:.65em 1em;border:1px solid #e5e7eb}
.sb-prose table tr:nth-child(even) td{background:#f9fafb}
.sb-prose hr{border:none;border-top:1px solid #e5e7eb;margin:2em 0}
/* IMAGES — natural size, max-height cap, zoom-in cursor */
.sb-prose img{
  display:block;
  width:100%;
  height:auto;
  max-height:520px;
  object-fit:cover;
  object-position:center top;
  border-radius:10px;
  margin:1.75em 0;
  cursor:zoom-in;
  box-shadow:0 2px 14px rgba(0,0,0,.06);
  transition:transform .3s ease,box-shadow .3s ease;
}
/* Small/inline images: don't stretch, show naturally */
.sb-prose img[width]{
  width:auto !important;
  max-width:100%;
  height:auto !important;
  max-height:520px;
  object-fit:contain;
}
.sb-prose img:hover{transform:scale(1.015);box-shadow:0 8px 28px rgba(0,0,0,.1)}
.sb-prose figure{margin:1.75em 0;background:#f9fafb;border-radius:10px;overflow:hidden}
.sb-prose figure img{margin:0;border-radius:0;box-shadow:none;max-height:560px}
.sb-prose figcaption{text-align:center;font-size:.78rem;color:#9ca3af;padding:.6em 1em .8em;font-style:italic}
/* Lightbox img: always show full image, no cropping */
#sb-lightbox img{object-fit:contain}
/* Sidebar scroll */
.sb-scroll::-webkit-scrollbar{width:3px}
.sb-scroll::-webkit-scrollbar-thumb{background:#e5e7eb;border-radius:3px}
/* TOC active */
.sb-toc-a.active{color:#f05a25!important;font-weight:700}
/* ── Mobile responsive typography (≤640px) ── */
@media(max-width:640px){
  .sb-prose{font-size:11px;line-height:1.75}
  .sb-prose h2{font-size:13px;margin:1.8em 0 .5em;padding-bottom:.4em}
  .sb-prose h3{font-size:12px;margin:1.5em 0 .4em}
  .sb-prose h4{font-size:11.5px;margin:1.2em 0 .35em}
  .sb-prose blockquote{font-size:11px;padding:1em 1.25em}
  .sb-prose ul li::before{top:.55em;width:5px;height:5px}
  .sb-prose img{margin:1.25em 0;border-radius:8px}
  .sb-prose table{font-size:10px}
  .sb-prose table th,.sb-prose table td{padding:.45em .6em}
}
</style>

<!-- ─── JS: progressbar, TOC, lightbox ─── -->
<script>
(function(){
  var ready = function(fn){ document.readyState==='loading' ? document.addEventListener('DOMContentLoaded',fn) : fn(); };
  ready(function(){

    /* 0. Sidebar sticky top — auto-detect header height */
    (function(){
      var sidebar = document.getElementById('sb-sidebar');
      if(!sidebar) return;
      function applyTop(){
        var hdr = document.querySelector('div.z-40') ||
                  document.querySelector('div.sticky.top-0') ||
                  document.querySelector('.sticky.top-0');
        var h = hdr ? hdr.offsetHeight : 170;
        sidebar.style.top = (h + 20) + 'px';
      }
      applyTop();
      window.addEventListener('resize', applyTop, {passive:true});
    })();

    /* 1. Reading progress bar */
    var bar = document.getElementById('sb-bar');
    window.addEventListener('scroll', function(){
      var s = document.documentElement.scrollTop,
          h = document.documentElement.scrollHeight - document.documentElement.clientHeight;
      if(bar) bar.style.width = (h>0 ? (s/h)*100 : 0)+'%';
    },{passive:true});

    /* 2. Auto Table of Contents */
    var prose  = document.querySelector('.sb-prose');
    var tocEl  = document.getElementById('sb-toc');
    var tocWid = document.getElementById('sb-toc-widget');
    if(prose && tocEl){
      var hh = prose.querySelectorAll('h2,h3');
      if(hh.length === 0){
        if(tocWid) tocWid.style.display = 'none';
      } else {
        var html = '<ul class="space-y-1">';
        hh.forEach(function(h, i){
          h.id = 'sb-h-' + i;
          var isH2 = h.tagName === 'H2';
          html += '<li style="padding-left:' + (isH2 ? '0' : '14px') + '">' +
            '<a href="#sb-h-' + i + '" data-id="sb-h-' + i + '"' +
            ' class="sb-toc-a block py-1 text-[12.5px] leading-snug rounded hover:text-brand-orange transition-colors ' +
            (isH2 ? 'font-semibold text-gray-700' : 'text-gray-400') + '">' +
            h.textContent + '</a></li>';
        });
        html += '</ul>';
        tocEl.innerHTML = html;

        /* Smooth scroll on TOC click */
        tocEl.querySelectorAll('.sb-toc-a').forEach(function(a){
          a.addEventListener('click', function(e){
            e.preventDefault();
            var target = document.getElementById(this.dataset.id);
            if(target){
              var offset = parseInt(document.getElementById('sb-sidebar').style.top || '160', 10) + 8;
              window.scrollTo({top: target.offsetTop - offset, behavior:'smooth'});
            }
          });
        });

        /* Active TOC highlight */
        var tocLinks = tocEl.querySelectorAll('.sb-toc-a');
        window.addEventListener('scroll', function(){
          var pos = window.scrollY + 180, cur = hh[0].id;
          hh.forEach(function(h){ if(h.offsetTop <= pos) cur = h.id; });
          tocLinks.forEach(function(a){ a.classList.toggle('active', a.dataset.id === cur); });
        },{passive:true});
      }
    }

    /* 3. Lightbox */
    var lb     = document.getElementById('sb-lightbox');
    var lbImg  = document.getElementById('sb-lbimg');
    var lbClose= document.getElementById('sb-lbclose');
    function openLB(src,alt){ lbImg.src=src; lbImg.alt=alt||''; lb.style.display='flex'; document.body.style.overflow='hidden'; }
    function closeLB(){ lb.style.display='none'; lbImg.src=''; document.body.style.overflow=''; }

    document.querySelectorAll('.sb-prose img').forEach(function(img){
      img.addEventListener('click', function(){ openLB(this.src, this.alt); });
    });
    if(lbClose) lbClose.addEventListener('click', closeLB);
    if(lb) lb.addEventListener('click', function(e){ if(e.target===lb) closeLB(); });
    document.addEventListener('keydown', function(e){ if(e.key==='Escape') closeLB(); });

  });
})();
</script>

<?php view('layouts/footer'); ?>
