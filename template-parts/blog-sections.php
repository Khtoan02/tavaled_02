<?php
// Blog Sections Template Part - Hiển thị 4 chuyên mục DỰ ÁN, KINH NGHIỆM, DỊCH VỤ, TIN TỨC.

// Hàm helper để render fallback thumbnail
if (!function_exists('render_blog_thumbnail')) {
    function render_blog_thumbnail($size = 'full', $fallback_img = 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=900&q=80', $category_name = 'Blog', $location = '') {
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
$q_duan = new WP_Query(['category_name' => 'du-an', 'posts_per_page' => 10]);
if ($q_duan->have_posts()) :
?>
<div class="reveal-up">
    <div class="tava-heading tava-heading--light <?php echo is_front_page() ? '' : 'border-t border-white/10 pt-16 mt-8'; ?>">
        <span class="tava-heading__ghost">Dự Án</span>
        <div class="tava-heading__left">
            <div class="tava-heading__eyebrow">Công trình tiêu biểu</div>
            <h2 class="tava-heading__title">Bài Viết <em>Dự Án</em></h2>
        </div>
        <a href="<?php echo get_category_link(get_category_by_slug('du-an')->term_id); ?>" class="tava-heading__link">
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
        <div class="card card-feat">
            <div class="card__thumb" style="height:380px">
                <?php render_blog_thumbnail('large', 'https://images.unsplash.com/photo-1497366216548-37526070297c?w=900&q=80', 'Dự án'); ?>
            </div>
            <div class="card__body">
                <div class="card__meta"><span><?php echo get_the_date('F Y'); ?></span></div>
                <h3 class="card__title" style="font-size:1.3rem"><?php the_title(); ?></h3>
                <div class="card__desc"><?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?></div>
                <div class="card__foot">
                    <a href="<?php the_permalink(); ?>" class="read-more">Xem dự án</a>
                </div>
            </div>
        </div>
        <?php if ($q_duan->post_count > 1) : ?><div class="project-hero__right"><?php endif; ?>
        <?php else : ?>
        <div class="card">
            <div class="card__thumb" style="height:178px">
                <?php render_blog_thumbnail('medium', 'https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=600&q=80', 'Dự án'); ?>
            </div>
            <div class="card__body">
                <div class="card__meta"><span><?php echo get_the_date('F Y'); ?></span></div>
                <h3 class="card__title" style="font-size:.92rem"><?php the_title(); ?></h3>
                <div class="card__foot"><a href="<?php the_permalink(); ?>" class="read-more">Xem</a></div>
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
        <div class="card">
            <div class="card__thumb" style="height:150px">
                <?php render_blog_thumbnail('medium', 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?w=500&q=80', 'Dự án'); ?>
            </div>
            <div class="card__body">
                <div class="card__meta"><span><?php echo get_the_date('F Y'); ?></span></div>
                <h3 class="card__title" style="font-size:.86rem;"><?php the_title(); ?></h3>
                <div class="card__foot"><a href="<?php the_permalink(); ?>" class="read-more">Xem</a></div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
    <?php endif; ?>

    <!-- Row 3: 3 cards -->
    <?php if ($q_duan->have_posts() && $q_duan->current_post + 1 < $q_duan->post_count) : ?>
    <div class="project-row3">
        <?php while ($q_duan->have_posts() && $count < 10) : $q_duan->the_post(); $count++; ?>
        <div class="card">
            <div class="card__thumb" style="height:165px">
                <?php render_blog_thumbnail('medium', 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=500&q=80', 'Dự án'); ?>
            </div>
            <div class="card__body">
                <div class="card__meta"><span><?php echo get_the_date('F Y'); ?></span></div>
                <h3 class="card__title" style="font-size:.88rem;"><?php the_title(); ?></h3>
                <div class="card__foot"><a href="<?php the_permalink(); ?>" class="read-more">Xem</a></div>
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
$q_kinhnghiem = new WP_Query(['category_name' => 'chia-se-kinh-nghiem', 'posts_per_page' => 5]);
if ($q_kinhnghiem->have_posts()) :
?>
<div class="reveal-up">
    <div class="tava-heading tava-heading--light border-t border-white/10 pt-16 mt-8">
        <span class="tava-heading__ghost">Kinh Nghiệm</span>
        <div class="tava-heading__left">
            <div class="tava-heading__eyebrow">Góc nhìn chuyên môn</div>
            <h2 class="tava-heading__title">Chia Sẻ <em>Kinh Nghiệm</em></h2>
        </div>
        <a href="<?php echo get_category_link(get_category_by_slug('chia-se-kinh-nghiem')->term_id); ?>" class="tava-heading__link">
            <span class="tava-heading__link-text">Xem tất cả</span><span class="tava-heading__link-icon"><i class="ph-bold ph-arrow-right"></i></span>
        </a>
    </div>

    <div class="featured-grid">
        <?php 
        $count = 0;
        while ($q_kinhnghiem->have_posts()) : $q_kinhnghiem->the_post(); $count++; 
            if ($count === 1) :
        ?>
        <div class="card card-big">
            <div class="card__thumb">
                <?php render_blog_thumbnail('large', 'https://images.unsplash.com/photo-1518770660439-4636190af475?w=800&q=80', 'Kinh Nghiệm'); ?>
            </div>
            <div class="card__body">
                <div class="card__meta"><span><?php echo get_the_date(); ?></span></div>
                <h3 class="card__title"><?php the_title(); ?></h3>
                <div class="card__desc"><?php echo wp_trim_words(get_the_excerpt(), 25, '...'); ?></div>
                <div class="card__foot">
                    <a href="<?php the_permalink(); ?>" class="read-more">Đọc ngay</a>
                </div>
            </div>
        </div>
        <?php else : ?>
        <div class="card card-sm">
            <div class="card__thumb">
                <?php render_blog_thumbnail('medium', 'https://images.unsplash.com/photo-1498049794561-7780e7231661?w=500&q=80', 'Kinh Nghiệm'); ?>
            </div>
            <div class="card__body">
                <div class="card__meta"><span><?php echo get_the_date('j F'); ?></span></div>
                <h3 class="card__title"><?php the_title(); ?></h3>
                <div class="card__foot"><a href="<?php the_permalink(); ?>" class="read-more">Đọc</a></div>
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
$q_dichvu = new WP_Query(['category_name' => 'dich-vu', 'posts_per_page' => 3]);
if ($q_dichvu->have_posts()) :
?>
<div class="reveal-up">
    <div class="tava-heading tava-heading--light border-t border-white/10 pt-16 mt-8">
        <span class="tava-heading__ghost">Dịch Vụ</span>
        <div class="tava-heading__left">
            <div class="tava-heading__eyebrow">Giải pháp chuyên nghiệp</div>
            <h2 class="tava-heading__title">Cung Cấp <em>Dịch Vụ</em></h2>
        </div>
        <a href="<?php echo get_category_link(get_category_by_slug('dich-vu')->term_id); ?>" class="tava-heading__link">
            <span class="tava-heading__link-text">Xem tất cả</span><span class="tava-heading__link-icon"><i class="ph-bold ph-arrow-right"></i></span>
        </a>
    </div>

    <div class="sk-grid">
        <?php 
        $count = 0;
        while ($q_dichvu->have_posts() && $count < 3) : $q_dichvu->the_post(); $count++; 
            if ($count === 1) :
        ?>
        <div class="card card-big">
            <div class="card__thumb">
                <?php render_blog_thumbnail('large', 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=900&q=80', 'Dịch vụ'); ?>
            </div>
            <div class="card__body">
                <div class="card__meta"><span><?php echo get_the_date(); ?></span></div>
                <h3 class="card__title"><?php the_title(); ?></h3>
                <div class="card__desc"><?php echo wp_trim_words(get_the_excerpt(), 25, '...'); ?></div>
                <div class="card__foot">
                    <a href="<?php the_permalink(); ?>" class="read-more">Chi tiết</a>
                </div>
            </div>
        </div>
        <?php if ($q_dichvu->post_count > 1) : ?><div class="sk-right"><?php endif; ?>
        <?php else : ?>
        <div class="card card-md">
            <div class="card__thumb" style="height:155px">
                <?php render_blog_thumbnail('medium', 'https://images.unsplash.com/photo-1511578314322-379afb476865?w=600&q=80', 'Dịch vụ'); ?>
            </div>
            <div class="card__body">
                <div class="card__meta"><span><?php echo get_the_date('j F, Y'); ?></span></div>
                <h3 class="card__title"><?php the_title(); ?></h3>
                <div class="card__foot"><a href="<?php the_permalink(); ?>" class="read-more">Xem</a></div>
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
$q_tintuc = new WP_Query(['category_name' => 'tin-tuc', 'posts_per_page' => 3]);
if ($q_tintuc->have_posts()) :
?>
<div class="reveal-up">
    <div class="tava-heading tava-heading--light border-t border-white/10 pt-16 mt-8">
        <span class="tava-heading__ghost">Tin Tức</span>
        <div class="tava-heading__left">
            <div class="tava-heading__eyebrow">Cập nhật mới nhất</div>
            <h2 class="tava-heading__title">Tin <em>Tức</em> & Cập <em>Nhật</em></h2>
        </div>
        <a href="<?php echo get_category_link(get_category_by_slug('tin-tuc')->term_id); ?>" class="tava-heading__link">
            <span class="tava-heading__link-text">Xem tất cả</span><span class="tava-heading__link-icon"><i class="ph-bold ph-arrow-right"></i></span>
        </a>
    </div>

    <div class="grid-3">
        <?php while ($q_tintuc->have_posts()) : $q_tintuc->the_post(); ?>
        <div class="card card-md">
            <div class="card__thumb">
                <?php render_blog_thumbnail('medium', 'https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=600&q=80', 'Tin Tức'); ?>
            </div>
            <div class="card__body">
                <div class="card__meta"><span><?php echo get_the_date('j F'); ?></span></div>
                <h3 class="card__title"><?php the_title(); ?></h3>
                <div class="card__desc"><?php echo wp_trim_words(get_the_excerpt(), 15, '...'); ?></div>
                <div class="card__foot"><a href="<?php the_permalink(); ?>" class="read-more">Đọc</a></div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
<?php 
endif; 
wp_reset_postdata(); 
?>
