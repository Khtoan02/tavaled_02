<?php
/**
 * View Component: Post Card (Dành cho Tin tức, Dự án)
 * Variables expected: $post (WP_Post object)
 */
// Lấy ảnh Fallback được cấu hình, nếu không có thì mặc định lấy hình hộp
$fallback_img = \App\Helpers\ThemeHelper::getOption('fallback_image');
if (empty($fallback_img)) {
    $fallback_img = 'https://placehold.co/800x450/fff8f6/f05a25?text=Updating...'; // Tỷ lệ 16:9
}

$thumbnail_url = has_post_thumbnail($post->ID) ? get_the_post_thumbnail_url($post->ID, 'medium_large') : $fallback_img;
$title = get_the_title($post->ID);
$permalink = get_permalink($post->ID);
$date = get_the_date('d/m/Y', $post->ID);
$excerpt = get_the_excerpt($post->ID);
?>
<div class="post-card">
    <a href="<?php echo esc_url($permalink); ?>" class="post-card-img">
        <img src="<?php echo esc_url($thumbnail_url); ?>" alt="<?php echo esc_attr($title); ?>" onerror="this.onerror=null;this.src='<?php echo esc_url($fallback_img); ?>';">
    </a>
    <div class="post-card-body">
        <div class="post-card-meta">
            <span class="post-date"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> <?php echo esc_html($date); ?></span>
        </div>
        <h3 class="post-card-title">
            <a href="<?php echo esc_url($permalink); ?>"><?php echo esc_html($title); ?></a>
        </h3>
        <p class="post-card-excerpt"><?php echo wp_trim_words($excerpt, 15, '...'); ?></p>
        <a href="<?php echo esc_url($permalink); ?>" class="post-read-more">Đọc tiếp <span class="arrow">→</span></a>
    </div>
</div>
