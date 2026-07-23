<?php
/**
 * View Component: Product Card — Master 3D Glassmorphism Design
 * Synchronized 100% with blog-card design aesthetics & hover behavior.
 * Variables expected: $post (WP_Post object)
 */
global $post;

// ── 1. Image Logic & Fallbacks ──────────────────────────────
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
$thumb_str = (string)$thumbnail_url;
if (empty($thumb_str) || strpos($thumb_str, 'Chưa') !== false || strpos($thumb_str, 'dữ') !== false || strpos($thumb_str, 'liệu') !== false || (substr($thumb_str, 0, 4) !== 'http' && substr($thumb_str, 0, 1) !== '/')) {
    $is_broken_url = true;
}

$meta_str = (string)$product_img_meta;
$is_meta_valid = !empty($meta_str) && strpos($meta_str, 'Chưa') === false && strpos($meta_str, 'dữ') === false && strpos($meta_str, 'liệu') === false && (substr($meta_str, 0, 4) === 'http' || substr($meta_str, 0, 1) === '/');

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
    $categories = wp_get_post_terms($post->ID, 'product_cat', ['fields' => 'slugs']);
    if (in_array('am-thanh', $categories)) {
        $thumbnail_url = 'https://images.unsplash.com/photo-1470225620780-dba8ba36b745?w=600';
    } elseif (in_array('anh-sang', $categories)) {
        $thumbnail_url = 'https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?w=600';
    } else {
        $thumbnail_url = 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=600';
    }
}

$title     = get_the_title($post->ID);
$permalink = get_permalink($post->ID);

// ── 2. Taxonomy & Meta ──────────────────────────────────────
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
    foreach($terms_cat as $t) {
        $cat_slugs[] = $t->slug;
        if ($t->parent == 0) {
            $cat_name = $t->name;
        } else {
            $subcat_name = $t->name;
        }
    }
    if (!$cat_name) $cat_name = $terms_cat[0]->name;
}

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

$display_cat_name = $cat_name ?: 'Sản phẩm';
if ($display_cat_name === 'Màn hình LED') {
    $display_cat_name = 'Màn hình hiển thị';
}

$meta_parts = array_filter([$model, $subcat_name]);
$meta_text  = implode(' · ', $meta_parts);
if (empty($meta_text)) $meta_text = $display_cat_name;
?>

<?php if (!defined('TAVA_PRODUCT_CARD_CSS_PRINTED')) : define('TAVA_PRODUCT_CARD_CSS_PRINTED', true); ?>
<style id="tava-product-card-css">
/* ==========================================================================
   CSS 3D WHITE GLASSMORPHISM PRODUCT CARD (Synchronized with Blog Card)
   ========================================================================== */
.tava-pcard-wrapper {
    perspective: 1400px;
    width: 100%;
    height: 100%;
}

.tava-pcard-glass {
    position: relative;
    height: 100%;
    display: flex;
    flex-direction: column;
    gap: 14px;
    padding: 18px;
    border-radius: 24px;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(255, 255, 255, 0.85) 100%);
    border: 1px solid rgba(226, 232, 240, 0.9);
    box-shadow: 0 10px 30px rgba(29, 40, 87, 0.05);
    backdrop-filter: blur(20px);
    -webkit-backdrop-filter: blur(20px);
    transform-style: preserve-3d;
    transition: transform 0.6s cubic-bezier(0.23, 1, 0.32, 1), box-shadow 0.6s ease, border-color 0.6s ease, background 0.6s ease;
}

.tava-pcard-global-overlay {
    position: absolute;
    inset: 0;
    border-radius: 24px;
    z-index: 20;
    transform: translateZ(90px);
    cursor: pointer;
}

/* ── Image Box with 1:1 Aspect Ratio (Square Frame) ── */
.tava-pcard-img-box {
    position: relative;
    aspect-ratio: 1 / 1;
    border-radius: 16px;
    overflow: hidden;
    background: #f8fafc;
    border: 1px solid rgba(226, 232, 240, 0.8);
    box-shadow: 0 10px 25px rgba(29, 40, 87, 0.08);
    transform: translateZ(40px);
    transition: transform 0.6s cubic-bezier(0.23, 1, 0.32, 1), box-shadow 0.6s ease;
}

.tava-pcard-img-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
    transition: transform 0.8s cubic-bezier(0.16, 1, 0.3, 1);
}

.tava-pcard-badge {
    position: absolute;
    top: 10px;
    left: 10px;
    background: rgba(29, 40, 87, 0.88);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    color: #ffffff;
    font-size: 9px;
    font-weight: 800;
    letter-spacing: 0.12em;
    text-transform: uppercase;
    padding: 4px 10px;
    border-radius: 999px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    z-index: 5;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.tava-pcard-brand {
    position: absolute;
    top: 10px;
    right: 10px;
    background: rgba(255, 255, 255, 0.92);
    backdrop-filter: blur(8px);
    -webkit-backdrop-filter: blur(8px);
    color: #1d2857;
    font-size: 9px;
    font-weight: 800;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    padding: 4px 10px;
    border-radius: 999px;
    border: 1px solid rgba(226, 232, 240, 0.9);
    z-index: 5;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
}

.tava-pcard-content {
    transform: translateZ(30px);
    display: flex;
    flex-direction: column;
    flex-grow: 1;
    gap: 6px;
    pointer-events: none;
}

.tava-pcard-eyebrow {
    font-size: 10px;
    font-weight: 800;
    letter-spacing: 0.16em;
    text-transform: uppercase;
    color: #f05a25;
}

.tava-pcard-title {
    font-family: var(--font-heading), sans-serif;
    font-weight: 800;
    font-size: clamp(13px, 1.15vw, 15px);
    color: #1d2857;
    line-height: 1.35;
    text-transform: uppercase;
    letter-spacing: 0.01em;
    margin: 0;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    transition: color 0.3s ease;
}

.tava-pcard-meta {
    font-size: 11px;
    font-weight: 600;
    color: #64748b;
    letter-spacing: 0.03em;
    line-height: 1.4;
}

.tava-pcard-footer {
    margin-top: auto;
    padding-top: 12px;
    border-top: 1px solid rgba(226, 232, 240, 0.8);
    display: flex;
    justify-content: space-between;
    align-items: center;
    pointer-events: auto;
}

.tava-pcard-cta {
    display: flex;
    align-items: center;
    gap: 6px;
    font-size: 11px;
    font-weight: 800;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: #1d2857;
    transition: color 0.3s ease, gap 0.3s ease;
}

.tava-pcard-cta-icon {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: #ffffff;
    border: 1px solid #e2e8f0;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 12px;
    color: #1d2857;
    transition: all 0.3s ease;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
}

/* ── HOVER EFFECTS ── */
@media (hover: hover) and (pointer: fine) {
    .tava-pcard-wrapper:hover .tava-pcard-glass {
        transform: rotateX(4deg) rotateY(-3deg);
        box-shadow: -15px 25px 45px rgba(29, 40, 87, 0.12);
        border-color: rgba(240, 90, 37, 0.35);
        background: linear-gradient(135deg, #ffffff 0%, rgba(255, 255, 255, 0.95) 100%);
    }
    .tava-pcard-wrapper:hover .tava-pcard-img-box {
        transform: translateZ(60px) scale(1.02);
        box-shadow: -10px 20px 35px rgba(29, 40, 87, 0.15);
    }
    .tava-pcard-wrapper:hover .tava-pcard-img-box img {
        transform: scale(1.08);
    }
    .tava-pcard-wrapper:hover .tava-pcard-title {
        color: #f05a25;
    }
    .tava-pcard-wrapper:hover .tava-pcard-cta {
        color: #f05a25;
        gap: 10px;
    }
    .tava-pcard-wrapper:hover .tava-pcard-cta-icon {
        background: #f05a25;
        border-color: #f05a25;
        color: #ffffff;
        transform: translateX(3px);
    }
}
</style>
<?php endif; ?>

<div class="tava-pcard-wrapper group">
    <article class="tava-pcard-glass">
        <!-- Global Overlay Link (Phủ kín thẻ để click) -->
        <a href="<?php echo esc_url($permalink); ?>" class="tava-pcard-global-overlay" aria-label="<?php echo esc_attr($title); ?>"></a>

        <!-- ── PRODUCT IMAGE CONTAINER ── -->
        <div class="tava-pcard-img-box">
            <img src="<?php echo esc_url($thumbnail_url); ?>"
                 alt="<?php echo esc_attr($alt_text); ?>"
                 onerror="this.onerror=null;this.src='<?php echo esc_url($fallback_img); ?>';"
                 loading="lazy">

            <?php if ($brand_name): ?>
            <span class="tava-pcard-brand"><?php echo esc_html($brand_name); ?></span>
            <?php endif; ?>
        </div>

        <!-- ── CONTENT ── -->
        <div class="tava-pcard-content">
            <div class="tava-pcard-eyebrow"><?php echo esc_html($subcat_name ?: $model); ?></div>

            <h3 class="tava-pcard-title">
                <?php echo esc_html($title); ?>
            </h3>

            <?php if ($meta_text): ?>
            <div class="tava-pcard-meta"><?php echo esc_html($meta_text); ?></div>
            <?php endif; ?>

            <div class="tava-pcard-footer">
                <span class="tava-pcard-cta">
                    <span>Xem chi tiết</span>
                    <span class="tava-pcard-cta-icon"><i class="ph-bold ph-arrow-right"></i></span>
                </span>
            </div>
        </div>
    </article>
</div>
