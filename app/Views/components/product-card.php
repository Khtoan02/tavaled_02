<?php
/**
 * View Component: Product Card
 * Variables expected: $post (WP_Post object)
 */
global $post;
// Lấy ảnh Fallback được cấu hình, nếu không có thì mặc định lấy hình hộp
$fallback_img = \App\Helpers\ThemeHelper::getOption('fallback_image');
if (empty($fallback_img)) {
    $fallback_img = 'https://placehold.co/600x450/fff8f6/f05a25?text=Updating...'; // Màu nền và text ăn theo bộ mã màu CSS
}

$product_img_meta = get_post_meta($post->ID, '_product_img', true);
$thumbnail_url = has_post_thumbnail($post->ID) ? get_the_post_thumbnail_url($post->ID, 'medium_large') : (!empty($product_img_meta) ? $product_img_meta : $fallback_img);
$title = get_the_title($post->ID);
$permalink = get_permalink($post->ID);

// Lấy meta & taxonomy
$model = get_post_meta($post->ID, '_product_model', true);

$terms_sub = wp_get_post_terms($post->ID, 'product_subcat');
$subcat_name = !empty($terms_sub) ? $terms_sub[0]->name : 'Sản phẩm';

$terms_brand = wp_get_post_terms($post->ID, 'product_brand');
$brand_name = !empty($terms_brand) ? $terms_brand[0]->name : '';

$terms_badge = wp_get_post_terms($post->ID, 'product_badge');
$badge_slug = !empty($terms_badge) ? $terms_badge[0]->slug : '';
$badge_label = '';
if ($badge_slug === 'new') $badge_label = 'Mới';
elseif ($badge_slug === 'hot') $badge_label = 'Hot';
elseif ($badge_slug === 'sale') $badge_label = 'Sale';
elseif (!empty($badge_slug)) $badge_label = $terms_badge[0]->name;
?>
<div class="product-card group/pcard bg-white rounded-none overflow-hidden border border-gray-100 shadow-sm hover:shadow-xl transition-all duration-500 h-full flex flex-col min-w-0">
    <!-- Image Section -->
    <a href="<?php echo esc_url($permalink); ?>" class="relative block pt-[75%] overflow-hidden bg-gray-50/50">
        <img src="<?php echo esc_url($thumbnail_url); ?>" 
             alt="<?php echo esc_attr($title); ?>" 
             class="absolute inset-0 w-full h-full object-contain p-6 transition-transform duration-700 group-hover/pcard:scale-110"
             onerror="this.onerror=null;this.src='<?php echo esc_url($fallback_img); ?>';">
        

    </a>

    <!-- Body Section -->
    <div class="p-3 sm:p-5 flex flex-col flex-1">
        <h3 class="text-[13px] sm:text-[17px] font-bold text-[#1d2857] mb-1.5 sm:mb-2 line-clamp-2 leading-tight min-h-[32px] sm:min-h-[42px] hover:text-brand-orange transition-colors">
            <a href="<?php echo esc_url($permalink); ?>"><?php echo esc_html($title); ?></a>
        </h3>
        <div class="text-[9px] sm:text-[11px] font-bold text-gray-400 mb-2 sm:mb-4 tracking-widest uppercase"><?php echo esc_html($model ? $model . ' - ' : '') . esc_html($subcat_name); ?></div>
        
        <!-- Tech Specs Placeholder -->
        <div class="flex flex-wrap items-center gap-1.5 sm:gap-3 mb-3 sm:mb-4">
            <div class="flex items-center gap-1 text-[10px] sm:text-[12px] text-gray-400 font-medium whitespace-nowrap">
                <i class="ph ph-cpu"></i>
                <span>Smart Chip</span>
            </div>
            <div class="w-1 h-1 bg-gray-200 rounded-none hidden sm:block"></div>
            <div class="flex items-center gap-1 text-[10px] sm:text-[12px] text-gray-400 font-medium whitespace-nowrap">
                <i class="ph ph-shield-check"></i>
                <span>24T</span>
            </div>
        </div>

        <!-- Actions -->
        <div class="mt-auto pt-3 sm:pt-4 border-t border-gray-50 flex items-center justify-between gap-1.5 sm:gap-3">
            <a href="<?php echo esc_url($permalink); ?>" class="flex-1 flex items-center justify-center gap-1.5 sm:gap-2 bg-[#1d2857] hover:bg-brand-orange text-white py-1.5 sm:py-2.5 px-1 sm:px-2 rounded-none text-[10px] sm:text-[13px] font-bold transition-all shadow-md active:scale-95 group/btn min-w-0">
                <span class="truncate">Nhận báo giá</span>
                <i class="ph-bold ph-paper-plane-tilt transition-transform group-hover/btn:translate-x-1 group-hover/btn:-translate-y-1"></i>
            </a>
            <a href="<?php echo esc_url($permalink); ?>" class="w-7 h-7 sm:w-10 sm:h-10 flex items-center justify-center bg-gray-100 text-[#1d2857] rounded-none hover:bg-[#1d2857] hover:text-white transition-all flex-shrink-0">
                <i class="ph-bold ph-eye text-[14px] sm:text-lg"></i>
            </a>
        </div>
    </div>
</div>
