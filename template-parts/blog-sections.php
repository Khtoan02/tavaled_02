<?php 
// Blog Sections Template Part
// Hàm helper để render fallback thumbnail
if (!function_exists('render_blog_thumbnail')) {
    function render_blog_thumbnail($size = 'full', $fallback_img = 'https://tavaled.vn/wp-content/uploads/2026/03/0020_TavaLED_Hinh_Anh.jpg', $category_name = 'Blog', $location = '') {
        if (has_post_thumbnail()) {
            the_post_thumbnail($size);
        } else {
            echo '<img src="' . esc_url($fallback_img) . '" alt="' . esc_attr(get_the_title()) . '">';
        }
        echo '<span class="cat">' . esc_html($category_name) . '</span>';
        if ($location) echo '<span class="loc-tag">' . esc_html($location) . '</span>';
    }
}
?>


<!-- ================= 01 — DỰ ÁN ================= -->
<?php
$q_duan = new WP_Query([
    'category_name' => 'du-an', 
    'posts_per_page' => 10,
    'orderby' => 'date',
    'order' => 'DESC'
]);
if ($q_duan->have_posts()) :
?>
<div class="reveal-up">
    <div class="tava-heading tava-heading--light <?php echo is_front_page() ? '' : 'border-t border-white/10 pt-16 mt-8'; ?>">
        <span class="tava-heading__ghost">Dự Án</span>
        <div class="tava-heading__left">
            <div class="tava-heading__eyebrow">Công trình tiêu biểu</div>
            <h2 class="tava-heading__title">Bài Viết <em>Dự Án</em></h2>
        </div>
        <a href="<?php echo get_category_link(get_category_by_slug('du-an')->term_id); ?>" class="tava-heading__link relative z-20">
            <span class="tava-heading__link-text">Xem tất cả dự án</span><span class="tava-heading__link-icon"><i class="ph-bold ph-arrow-right"></i></span>
        </a>
    </div>

    <!-- Hero row: 1 large + 2 stacked -->
    <div class="project-hero">
        <?php 
        $count = 0;
        while ($q_duan->have_posts() && $count < 3) : $q_duan->the_post(); $count++; 
            if ($count === 1) : 
        ?>
        <div class="card card-feat relative group">
            <a href="<?php the_permalink(); ?>" class="absolute inset-0 z-10" aria-label="<?php the_title_attribute(); ?>"></a>
            <div class="card__thumb" style="height:380px">
 <?php render_blog_thumbnail('large', 'https://tavaled.vn/wp-content/uploads/2026/03/0021_TavaLED_Hinh_Anh.jpg', 'Dự án'); ?>
            </div>
            <div class="card__body">
                <div class="card__meta"><span><?php echo get_the_date('F Y'); ?></span></div>
                <h3 class="card__title text-4xl lg:text-5xl xl:text-[54px] leading-[1.05] font-black mb-6 group-hover:text-brand-orange transition-colors"><?php the_title(); ?></h3>
                <div class="card__desc"><?php echo wp_trim_words(get_the_excerpt(), 40, '...'); ?></div>
                <div class="card__foot relative z-20">
                    <span class="read-more cursor-pointer">Xem dự án</span>
                </div>
            </div>
        </div>
        <?php if ($q_duan->post_count > 1) : ?><div class="project-hero__right"><?php endif; ?>
        <?php else : ?>
        <div class="card relative group">
            <a href="<?php the_permalink(); ?>" class="absolute inset-0 z-10" aria-label="<?php the_title_attribute(); ?>"></a>
            <div class="card__thumb" style="height:178px">
 <?php render_blog_thumbnail('medium', 'https://tavaled.vn/wp-content/uploads/2026/03/0022_TavaLED_Hinh_Anh.jpg', 'Dự án'); ?>
            </div>
            <div class="card__body">
                <div class="card__meta"><span><?php echo get_the_date('F Y'); ?></span></div>
                <h3 class="card__title" style="font-size:1.1rem;"><?php the_title(); ?></h3>
                <div class="card__foot relative z-20"><span class="read-more cursor-pointer">Xem</span></div>
            </div>
        </div>
        <?php endif; 
        endwhile; 
        if ($count > 1) : ?></div><?php endif; ?>
    </div>

    <!-- Row 2: 4 cards -->
    <?php if ($q_duan->have_posts() && $q_duan->current_post + 1 < $q_duan->post_count) : ?>
    <div class="project-row">
        <?php while ($q_duan->have_posts() && $count < 7) : $q_duan->the_post(); $count++; ?>
        <div class="card relative group">
            <a href="<?php the_permalink(); ?>" class="absolute inset-0 z-10" aria-label="<?php the_title_attribute(); ?>"></a>
            <div class="card__thumb" style="height:150px">
 <?php render_blog_thumbnail('medium', 'https://tavaled.vn/wp-content/uploads/2026/03/0023_TavaLED_Hinh_Anh.jpg', 'Dự án'); ?>
            </div>
            <div class="card__body">
                <div class="card__meta"><span><?php echo get_the_date('F Y'); ?></span></div>
                <h3 class="card__title" style="font-size:1rem;"><?php the_title(); ?></h3>
                <div class="card__foot relative z-20"><span class="read-more cursor-pointer">Xem</span></div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
    <?php endif; ?>

    <!-- Row 3: 3 cards -->
    <?php if ($q_duan->have_posts() && $q_duan->current_post + 1 < $q_duan->post_count) : ?>
    <div class="project-row3">
        <?php while ($q_duan->have_posts() && $count < 10) : $q_duan->the_post(); $count++; ?>
        <div class="card relative group">
            <a href="<?php the_permalink(); ?>" class="absolute inset-0 z-10" aria-label="<?php the_title_attribute(); ?>"></a>
            <div class="card__thumb" style="height:165px">
 <?php render_blog_thumbnail('medium', 'https://tavaled.vn/wp-content/uploads/2026/03/0024_TavaLED_Hinh_Anh.jpg', 'Dự án'); ?>
            </div>
            <div class="card__body">
                <div class="card__meta"><span><?php echo get_the_date('F Y'); ?></span></div>
                <h3 class="card__title" style="font-size:1rem;"><?php the_title(); ?></h3>
                <div class="card__foot relative z-20"><span class="read-more cursor-pointer">Xem</span></div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
    <?php endif; ?>
</div>
<?php 
endif; 
wp_reset_postdata(); 
?>

<!-- ================= 02 — CHIA SẺ KINH NGHIỆM ================= -->
<?php
$q_kinhnghiem = new WP_Query([
    'category_name' => 'chia-se-kinh-nghiem', 
    'posts_per_page' => 5,
    'orderby' => 'date',
    'order' => 'DESC'
]);
if ($q_kinhnghiem->have_posts()) :
?>
<div class="reveal-up">
    <div class="tava-heading tava-heading--light border-t border-white/10 pt-16 mt-8">
        <span class="tava-heading__ghost">Kinh Nghiệm</span>
        <div class="tava-heading__left">
            <div class="tava-heading__eyebrow">Góc nhìn chuyên môn</div>
            <h2 class="tava-heading__title">Chia Sẻ <em>Kinh Nghiệm</em></h2>
        </div>
        <a href="<?php echo get_category_link(get_category_by_slug('chia-se-kinh-nghiem')->term_id); ?>" class="tava-heading__link relative z-20">
            <span class="tava-heading__link-text">Xem tất cả</span><span class="tava-heading__link-icon"><i class="ph-bold ph-arrow-right"></i></span>
        </a>
    </div>

    <div class="featured-grid">
        <?php 
        $count = 0;
        while ($q_kinhnghiem->have_posts()) : $q_kinhnghiem->the_post(); $count++; 
            if ($count === 1) :
        ?>
        <div class="card card-big relative group">
            <a href="<?php the_permalink(); ?>" class="absolute inset-0 z-10" aria-label="<?php the_title_attribute(); ?>"></a>
            <div class="card__thumb">
 <?php render_blog_thumbnail('large', 'https://tavaled.vn/wp-content/uploads/2026/03/0025_TavaLED_Hinh_Anh.jpg', 'Kinh Nghiệm'); ?>
            </div>
            <div class="card__body">
                <div class="card__meta"><span><?php echo get_the_date(); ?></span></div>
                <h3 class="card__title text-4xl lg:text-5xl xl:text-[54px] leading-[1.05] font-black mb-6 group-hover:text-brand-orange transition-colors"><?php the_title(); ?></h3>
                <div class="card__desc"><?php echo wp_trim_words(get_the_excerpt(), 45, '...'); ?></div>
                <div class="card__foot relative z-20">
                    <span class="read-more cursor-pointer">Đọc ngay</span>
                </div>
            </div>
        </div>
        <?php else : ?>
        <div class="card card-sm relative group">
            <a href="<?php the_permalink(); ?>" class="absolute inset-0 z-10" aria-label="<?php the_title_attribute(); ?>"></a>
            <div class="card__thumb">
 <?php render_blog_thumbnail('medium', 'https://tavaled.vn/wp-content/uploads/2026/03/0026_TavaLED_Hinh_Anh.jpg', 'Kinh Nghiệm'); ?>
            </div>
            <div class="card__body">
                <div class="card__meta"><span><?php echo get_the_date('j F'); ?></span></div>
                <h3 class="card__title" style="font-size:1.05rem;"><?php the_title(); ?></h3>
                <div class="card__foot relative z-20"><span class="read-more cursor-pointer">Đọc</span></div>
            </div>
        </div>
        <?php 
            endif;
        endwhile; 
        ?>
    </div>
</div>
<?php 
endif; 
wp_reset_postdata(); 
?>

<!-- ================= 03 — DỊCH VỤ ================= -->
<?php
$q_dichvu = new WP_Query([
    'category_name' => 'dich-vu', 
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order' => 'DESC'
]);
if ($q_dichvu->have_posts()) :
?>
<div class="reveal-up">
    <div class="tava-heading tava-heading--light border-t border-white/10 pt-16 mt-8">
        <span class="tava-heading__ghost">Dịch Vụ</span>
        <div class="tava-heading__left">
            <div class="tava-heading__eyebrow">Giải pháp chuyên nghiệp</div>
            <h2 class="tava-heading__title">Cung Cấp <em>Dịch Vụ</em></h2>
        </div>
        <a href="<?php echo get_category_link(get_category_by_slug('dich-vu')->term_id); ?>" class="tava-heading__link relative z-20">
            <span class="tava-heading__link-text">Xem tất cả</span><span class="tava-heading__link-icon"><i class="ph-bold ph-arrow-right"></i></span>
        </a>
    </div>

    <div class="sk-grid">
        <?php 
        $count = 0;
        while ($q_dichvu->have_posts() && $count < 3) : $q_dichvu->the_post(); $count++; 
            if ($count === 1) :
        ?>
        <div class="card card-big relative group">
            <a href="<?php the_permalink(); ?>" class="absolute inset-0 z-10" aria-label="<?php the_title_attribute(); ?>"></a>
            <div class="card__thumb">
 <?php render_blog_thumbnail('large', 'https://tavaled.vn/wp-content/uploads/2026/03/0027_TavaLED_Hinh_Anh.jpg', 'Dịch vụ'); ?>
            </div>
            <div class="card__body">
                <div class="card__meta"><span><?php echo get_the_date(); ?></span></div>
                <h3 class="card__title text-4xl lg:text-5xl xl:text-[54px] leading-[1.05] font-black mb-6 group-hover:text-brand-orange transition-colors"><?php the_title(); ?></h3>
                <div class="card__desc"><?php echo wp_trim_words(get_the_excerpt(), 45, '...'); ?></div>
                <div class="card__foot relative z-20">
                    <span class="read-more cursor-pointer">Chi tiết</span>
                </div>
            </div>
        </div>
        <?php if ($q_dichvu->post_count > 1) : ?><div class="sk-right"><?php endif; ?>
        <?php else : ?>
        <div class="card card-md relative group">
            <a href="<?php the_permalink(); ?>" class="absolute inset-0 z-10" aria-label="<?php the_title_attribute(); ?>"></a>
            <div class="card__thumb" style="height:155px">
 <?php render_blog_thumbnail('medium', 'https://tavaled.vn/wp-content/uploads/2026/03/0028_TavaLED_Hinh_Anh.jpg', 'Dịch vụ'); ?>
            </div>
            <div class="card__body">
                <div class="card__meta"><span><?php echo get_the_date('j F, Y'); ?></span></div>
                <h3 class="card__title" style="font-size:1.1rem;"><?php the_title(); ?></h3>
                <div class="card__foot relative z-20"><span class="read-more cursor-pointer">Xem</span></div>
            </div>
        </div>
        <?php 
            endif;
        endwhile; 
        if ($count > 1) : ?></div><?php endif; ?>
    </div>
</div>
<?php 
endif; 
wp_reset_postdata(); 
?>

<!-- ================= 04 — TIN TỨC ================= -->
<?php
$q_tintuc = new WP_Query([
    'category_name' => 'tin-tuc', 
    'posts_per_page' => 3,
    'orderby' => 'date',
    'order' => 'DESC'
]);
if ($q_tintuc->have_posts()) :
?>
<div class="reveal-up">
    <div class="tava-heading tava-heading--light border-t border-white/10 pt-16 mt-8">
        <span class="tava-heading__ghost">Tin Tức</span>
        <div class="tava-heading__left">
            <div class="tava-heading__eyebrow">Cập nhật mới nhất</div>
            <h2 class="tava-heading__title">Tin <em>Tức</em> & Cập <em>Nhật</em></h2>
        </div>
        <a href="<?php echo get_category_link(get_category_by_slug('tin-tuc')->term_id); ?>" class="tava-heading__link relative z-20">
            <span class="tava-heading__link-text">Xem tất cả</span><span class="tava-heading__link-icon"><i class="ph-bold ph-arrow-right"></i></span>
        </a>
    </div>

    <!-- Tin tức đang hiển thị dạng lưới 3 bài đều nhau. Ta biến bài đầu thành big card để có thẻ lớn nhất như yêu cầu -->
    <div class="featured-grid">
        <?php 
        $count = 0;
        while ($q_tintuc->have_posts()) : $q_tintuc->the_post(); $count++; 
            if ($count === 1) :
        ?>
        <div class="card card-big relative group">
            <a href="<?php the_permalink(); ?>" class="absolute inset-0 z-10" aria-label="<?php the_title_attribute(); ?>"></a>
            <div class="card__thumb">
 <?php render_blog_thumbnail('large', 'https://tavaled.vn/wp-content/uploads/2026/03/0029_TavaLED_Hinh_Anh.jpg', 'Tin Tức'); ?>
            </div>
            <div class="card__body">
                <div class="card__meta"><span><?php echo get_the_date('j F'); ?></span></div>
                <h3 class="card__title text-4xl lg:text-5xl xl:text-[54px] leading-[1.05] font-black mb-6 group-hover:text-brand-orange transition-colors"><?php the_title(); ?></h3>
                <div class="card__desc"><?php echo wp_trim_words(get_the_excerpt(), 45, '...'); ?></div>
                <div class="card__foot relative z-20"><span class="read-more cursor-pointer">Đọc chi tiết</span></div>
            </div>
        </div>
        <?php else : ?>
        <div class="card card-sm relative group">
            <a href="<?php the_permalink(); ?>" class="absolute inset-0 z-10" aria-label="<?php the_title_attribute(); ?>"></a>
            <div class="card__thumb">
 <?php render_blog_thumbnail('medium', 'https://tavaled.vn/wp-content/uploads/2026/03/0030_TavaLED_Hinh_Anh.jpg', 'Tin Tức'); ?>
            </div>
            <div class="card__body">
                <div class="card__meta"><span><?php echo get_the_date('j F'); ?></span></div>
                <h3 class="card__title" style="font-size:1.05rem;"><?php the_title(); ?></h3>
                <div class="card__foot relative z-20"><span class="read-more cursor-pointer">Đọc</span></div>
            </div>
        </div>
        <?php 
            endif;
        endwhile; 
        ?>
    </div>
</div>
<?php 
endif; 
wp_reset_postdata(); 
?>
