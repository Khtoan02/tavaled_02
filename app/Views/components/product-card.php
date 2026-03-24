<?php
/**
 * View Component: Product Card — Premium Design
 * Variables expected: $post (WP_Post object)
 */
global $post;

// ── Ảnh sản phẩm ─────────────────────────────────────────
$fallback_img = \App\Helpers\ThemeHelper::getOption('fallback_image');
if (empty($fallback_img)) {
    $fallback_img = 'https://placehold.co/600x400/f0f4ff/1d2857?text=TavaLLS';
}
$product_img_meta = get_post_meta($post->ID, '_product_img', true);

// Ưu tiên: featured image → meta field → fallback
if (has_post_thumbnail($post->ID)) {
    $thumbnail_url = get_the_post_thumbnail_url($post->ID, 'large');
} elseif (!empty($product_img_meta)) {
    $thumbnail_url = $product_img_meta;
} else {
    $thumbnail_url = $fallback_img;
}

$title     = get_the_title($post->ID);
$permalink = get_permalink($post->ID);

// ── Taxonomy & Meta ──────────────────────────────────────
$model      = get_post_meta($post->ID, '_product_model', true);
$short_desc = get_post_meta($post->ID, '_product_short_desc', true);

$terms_sub  = wp_get_post_terms($post->ID, 'product_subcat');
$subcat_name = !empty($terms_sub) ? $terms_sub[0]->name : '';

$terms_brand = wp_get_post_terms($post->ID, 'product_brand');
$brand_name  = !empty($terms_brand) ? $terms_brand[0]->name : '';

$terms_cat   = wp_get_post_terms($post->ID, 'product_cat');
$cat_name    = !empty($terms_cat) ? $terms_cat[0]->name : '';

// ── Badge ─────────────────────────────────────────────────
$terms_badge = wp_get_post_terms($post->ID, 'product_badge');
$badge_slug  = !empty($terms_badge) ? $terms_badge[0]->slug : '';
$badge_label = '';
$badge_color = '#f05a25';
if ($badge_slug === 'new')  { $badge_label = 'Mới';  $badge_color = '#10b981'; }
elseif ($badge_slug === 'hot')  { $badge_label = 'Hot';  $badge_color = '#ef4444'; }
elseif ($badge_slug === 'sale') { $badge_label = 'Sale'; $badge_color = '#f59e0b'; }
elseif (!empty($badge_slug))    { $badge_label = $terms_badge[0]->name; }

// ── Meta display: model + subcat ─────────────────────────
$meta_parts = array_filter([$model, $subcat_name]);
$meta_text  = implode(' · ', $meta_parts);
if (empty($meta_text)) $meta_text = $cat_name ?: 'Sản phẩm';
?>
<div class="product-card group/pcard" style="
    background: #fff;
    border: 1px solid #eef0f6;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    height: 100%;
    min-width: 0;
    transition: transform 0.4s cubic-bezier(0.16,1,0.3,1), box-shadow 0.4s ease;
    cursor: pointer;
" onmouseenter="this.style.transform='translateY(-4px)';this.style.boxShadow='0 16px 40px rgba(29,40,87,0.13)'"
   onmouseleave="this.style.transform='';this.style.boxShadow=''">

    <!-- ── IMAGE ─────────────────────────────────── -->
    <a href="<?php echo esc_url($permalink); ?>" style="
        display: block;
        position: relative;
        overflow: hidden;
        background: #f5f7ff;
        aspect-ratio: 4/3;
        flex-shrink: 0;
    ">
        <img src="<?php echo esc_url($thumbnail_url); ?>"
             alt="<?php echo esc_attr($title); ?>"
             onerror="this.onerror=null;this.src='<?php echo esc_url($fallback_img); ?>';"
             style="
                 width: 100%; height: 100%;
                 object-fit: cover;
                 display: block;
                 transition: transform 0.7s cubic-bezier(0.16,1,0.3,1);
             "
             class="pcard-img">

        <!-- Gradient overlay bottom -->
        <div style="
            position: absolute; inset: 0;
            background: linear-gradient(to top, rgba(29,40,87,0.35) 0%, transparent 55%);
            pointer-events: none;
        "></div>

        <!-- Badge -->
        <?php if ($badge_label): ?>
        <span style="
            position: absolute; top: 10px; left: 10px;
            background: <?php echo esc_attr($badge_color); ?>;
            color: #fff;
            font-size: 9px;
            font-weight: 800;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            padding: 3px 8px;
            z-index: 2;
        "><?php echo esc_html($badge_label); ?></span>
        <?php endif; ?>

        <!-- Brand -->
        <?php if ($brand_name): ?>
        <span style="
            position: absolute; bottom: 10px; right: 10px;
            background: rgba(255,255,255,0.9);
            backdrop-filter: blur(6px);
            color: #1d2857;
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            padding: 3px 8px;
            z-index: 2;
        "><?php echo esc_html($brand_name); ?></span>
        <?php endif; ?>
    </a>

    <!-- ── BODY ──────────────────────────────────── -->
    <div style="
        padding: 14px 14px 16px;
        display: flex;
        flex-direction: column;
        flex: 1;
        gap: 6px;
    ">
        <!-- Category eyebrow -->
        <div style="
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: #f05a25;
            opacity: 0.85;
        "><?php echo esc_html($cat_name ?: 'Sản phẩm'); ?></div>

        <!-- Title — VIẾT HOA -->
        <h3 style="
            font-size: clamp(12px, 3vw, 15px);
            font-weight: 800;
            color: #1d2857;
            text-transform: uppercase;
            letter-spacing: 0.02em;
            line-height: 1.35;
            margin: 0;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            transition: color 0.2s;
        ">
            <a href="<?php echo esc_url($permalink); ?>" style="color:inherit;text-decoration:none;"
               onmouseenter="this.style.color='#f05a25'"
               onmouseleave="this.style.color=''"
            ><?php echo esc_html($title); ?></a>
        </h3>

        <!-- Meta — viết thường -->
        <?php if ($meta_text): ?>
        <div style="
            font-size: 10px;
            font-weight: 500;
            color: #9ca3af;
            letter-spacing: 0.03em;
            line-height: 1.4;
            text-transform: none;
        "><?php echo esc_html($meta_text); ?></div>
        <?php endif; ?>

        <!-- Divider -->
        <div style="height: 1px; background: #f1f3f9; margin: 4px 0;"></div>

        <!-- CTA — Xem chi tiết -->
        <a href="<?php echo esc_url($permalink); ?>"
           style="
               display: flex;
               align-items: center;
               justify-content: center;
               gap: 7px;
               background: #1d2857;
               color: #fff;
               font-size: 10px;
               font-weight: 700;
               letter-spacing: 0.12em;
               text-transform: uppercase;
               padding: 9px 12px;
               text-decoration: none;
               transition: background 0.25s, gap 0.25s;
               margin-top: auto;
           "
           onmouseenter="this.style.background='#f05a25';this.style.gap='12px'"
           onmouseleave="this.style.background='#1d2857';this.style.gap='7px'"
        >
            <span>Xem chi tiết</span>
            <i class="ph-bold ph-arrow-right" style="font-size: 12px;"></i>
        </a>
    </div>
</div>

<style>
/* Hover scale cho ảnh — không cần JS */
.product-card:hover .pcard-img { transform: scale(1.06); }
</style>
