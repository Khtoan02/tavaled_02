<?php
/**
 * View Component: Product Card — Premium Design
 * Variables expected: $post (WP_Post object)
 */
global $post;

// ── Ảnh sản phẩm ─────────────────────────────────────────
$fallback_img = \App\Helpers\ThemeHelper::getOption('fallback_image');
if (empty($fallback_img)) {
    $fallback_img = 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?auto=format&fit=crop&w=600&q=80';
}
$product_img_meta = get_post_meta($post->ID, '_product_img', true);

$thumbnail_id = 0;
$thumbnail_url = '';
if (has_post_thumbnail($post->ID)) {
    $thumbnail_id = get_post_thumbnail_id($post->ID);
    $thumbnail_url = get_the_post_thumbnail_url($post->ID, 'medium');
}

// Kiểm tra xem URL ảnh hiện tại có bị lỗi / rỗng không
$is_broken_url = false;
if (empty($thumbnail_url) || strpos($thumbnail_url, 'Chưa') !== false || strpos($thumbnail_url, 'dữ') !== false || strpos($thumbnail_url, 'liệu') !== false || (substr($thumbnail_url, 0, 4) !== 'http' && substr($thumbnail_url, 0, 1) !== '/')) {
    $is_broken_url = true;
}

$is_meta_valid = !empty($product_img_meta) && strpos($product_img_meta, 'Chưa') === false && strpos($product_img_meta, 'dữ') === false && strpos($product_img_meta, 'liệu') === false && (substr($product_img_meta, 0, 4) === 'http' || substr($product_img_meta, 0, 1) === '/');

if ($is_broken_url && $is_meta_valid) {
    $meta_attach_id = attachment_url_to_postid($product_img_meta);
    if ($meta_attach_id) {
        $thumbnail_id = $meta_attach_id;
        $thumbnail_url = wp_get_attachment_image_url($meta_attach_id, 'medium');
    } else {
        $thumbnail_url = $product_img_meta;
    }
    $is_broken_url = false;
}

if ($is_broken_url) {
    // Tìm ảnh Unsplash chất lượng cao theo danh mục sản phẩm để hiển thị đẹp mắt
    $categories = wp_get_post_terms($post->ID, 'product_cat', ['fields' => 'slugs']);
    if (in_array('am-thanh', $categories)) {
        $thumbnail_url = 'https://images.unsplash.com/photo-1470225620780-dba8ba36b745?w=600';
    } elseif (in_array('anh-sang', $categories)) {
        $thumbnail_url = 'https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?w=600';
    } else {
        // Màn hình LED / default
        $thumbnail_url = 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=600';
    }
}

$title     = get_the_title($post->ID);
$permalink = get_permalink($post->ID);

// ── Taxonomy & Meta ──────────────────────────────────────
$model      = get_post_meta($post->ID, '_product_model', true);
if (empty($model) || strpos($model, 'Chưa') !== false || strpos($model, 'dữ') !== false || strpos($model, 'liệu') !== false) {
    $model = '#' . $post->ID;
}
$short_desc = get_post_meta($post->ID, '_product_short_desc', true);

$terms_brand = wp_get_post_terms($post->ID, 'product_brand');
$brand_name  = (!is_wp_error($terms_brand) && !empty($terms_brand)) ? $terms_brand[0]->name : '';

$terms_cat   = wp_get_post_terms($post->ID, 'product_cat');
$cat_name    = '';
$subcat_name = '';
$cat_slugs   = [];
if (!is_wp_error($terms_cat) && !empty($terms_cat)) {
    // Find parent and child
    foreach($terms_cat as $t) {
        $cat_slugs[] = $t->slug;
        if ($t->parent == 0) {
            $cat_name = $t->name;
        } else {
            $subcat_name = $t->name;
        }
    }
    // Fallbacks
    if (!$cat_name) $cat_name = $terms_cat[0]->name;
}

// Đảm bảo alt_text luôn mô tả chi tiết và hoàn toàn duy nhất trên trang chủ để tối ưu SEO/A11y
global $tava_product_card_counter;
if (!isset($tava_product_card_counter)) {
    $tava_product_card_counter = 0;
}
$tava_product_card_counter++;

if (in_array('am-thanh', $cat_slugs)) {
    $alt_text = 'Thiết bị âm thanh chuyên nghiệp Tava - Mẫu #' . $tava_product_card_counter;
} elseif (in_array('anh-sang', $cat_slugs)) {
    $alt_text = 'Thiết bị ánh sáng chuyên nghiệp Tava - Mẫu #' . $tava_product_card_counter;
} else {
    $alt_text = 'Màn hình LED chuyên nghiệp Tava - Mẫu #' . $tava_product_card_counter;
}

// ── Badge ─────────────────────────────────────────────────
$badge_label = '';
$badge_color = '#f05a25';
// (Đã xóa taxonomy product_badge theo yêu cầu)

// ── Meta display: model + subcat ─────────────────────────
$meta_parts = array_filter([$model, $subcat_name]);
$meta_text  = implode(' · ', $meta_parts);
if (empty($meta_text)) $meta_text = $cat_name ?: 'Sản phẩm';
?>
<style>
.tava-product-card {
    transition: transform 0.4s cubic-bezier(0.16,1,0.3,1), box-shadow 0.4s ease !important;
}
.tava-product-card:hover {
    transform: translateY(-4px) !important;
    box-shadow: 0 16px 40px rgba(29,40,87,0.13) !important;
}
.tava-product-card-title-link {
    transition: color 0.2s ease;
}
.tava-product-card-title-link:hover {
    color: #f05a25 !important;
}
</style>
<div class="product-card group/pcard tava-product-card" style="
    position: relative;
    background: #fff;
    border: 1px solid #eef0f6;
    overflow: hidden;
    display: flex;
    flex-direction: column;
    height: 100%;
    min-width: 0;
    cursor: pointer;
">

    <!-- ── IMAGE ─────────────────────────────────── -->
    <a href="<?php echo esc_url($permalink); ?>" style="
        display: block;
        position: relative;
        overflow: hidden;
        background: #f5f7ff;
        aspect-ratio: 1/1;
        flex-shrink: 0;
    ">
        <img src="<?php echo esc_url($thumbnail_url); ?>"
             alt="<?php echo esc_attr($alt_text); ?>"
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
    </a>

    <!-- Brand (Đặt ngoài thẻ <a> để tránh trùng lặp anchor text SEO) -->
    <?php if ($brand_name): ?>
    <span style="
        position: absolute; top: 10px; right: 10px;
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

    <!-- ── BODY ──────────────────────────────────── -->
    <div style="
        padding: 14px 14px 16px;
        display: flex;
        flex-direction: column;
        flex: 1;
        gap: 6px;
    ">
        <!-- Category eyebrow -->
        <?php
        $display_cat_name = $cat_name ?: 'Sản phẩm';
        if ($display_cat_name === 'Màn hình LED') {
            $display_cat_name = 'Màn hình hiển thị';
        }
        ?>
        <div style="
            font-size: 9px;
            font-weight: 700;
            letter-spacing: 0.18em;
            text-transform: uppercase;
            color: #f05a25;
            opacity: 0.85;
        "><?php echo esc_html($display_cat_name); ?></div>

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
            <a href="<?php echo esc_url($permalink); ?>" class="tava-product-card-title-link" style="color:inherit;text-decoration:none;"
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
           class="product-card-cta-btn"
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
        >
            <span>Xem chi tiết<span style="position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0, 0, 0, 0); white-space: nowrap; border: 0;"> mã <?php echo esc_html($model ?: $post->ID); ?></span></span>
            <i class="ph-bold ph-arrow-right" style="font-size: 12px;"></i>
        </a>
    </div>
</div>

<?php if (!defined('TAVA_PRODUCT_CARD_CSS_PRINTED')) : define('TAVA_PRODUCT_CARD_CSS_PRINTED', true); ?>
<style>
/* Hover scale cho ảnh — không cần JS */
.product-card:hover { transform: translateY(-4px); box-shadow: 0 16px 40px rgba(29,40,87,0.13); }
.product-card:hover .pcard-img { transform: scale(1.06); }
.product-card-cta-btn:hover { background: #f05a25 !important; gap: 12px !important; }
</style>
<?php endif; ?>
