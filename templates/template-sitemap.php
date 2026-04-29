<?php
/**
 * Template Name: Sơ đồ trang web (Sitemap HTML)
 */
get_header(); 
?>

<div class="sitemap-wrapper" style="background-color: var(--bg, #f7f4f2); min-height: 80vh; padding: 80px 0;">
    <div class="container mx-auto px-6 lg:px-12 max-w-[1240px]">
        <div class="page-header" style="margin-bottom: 40px; text-align: center;">
            <h1 style="font-family: var(--font-heading, 'Mona Sans'); font-size: 3rem; font-weight: 700; color: var(--ink, #111827); margin-bottom: 16px;">Sơ đồ trang web</h1>
            <p style="color: var(--muted, #6b7280); font-size: 1.1rem;">Khám phá toàn bộ cấu trúc và nội dung trên website</p>
        </div>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(280px, 1fr)); gap: 30px;">
            
            <!-- Pages -->
            <div style="background: #fff; padding: 30px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.03); border: 1px solid var(--border-lt, #f0e8e2);">
                <h2 style="font-family: var(--font-heading, 'Mona Sans'); font-size: 1.4rem; font-weight: 700; color: var(--orange, #f05a25); margin-bottom: 20px; border-bottom: 2px solid var(--orange-xlt, #fff4f0); padding-bottom: 10px;">Trang tĩnh</h2>
                <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 12px;">
                    <?php
                    $pages = get_pages();
                    foreach ($pages as $page) {
                        echo '<li><a href="' . get_page_link($page->ID) . '" style="color: var(--ink, #111827); text-decoration: none; font-weight: 500; font-size: 14px; transition: color 0.2s;" onmouseover="this.style.color=\'var(--orange, #f05a25)\'" onmouseout="this.style.color=\'var(--ink, #111827)\'">→ ' . esc_html($page->post_title) . '</a></li>';
                    }
                    ?>
                </ul>
            </div>

            <!-- Categories -->
            <div style="background: #fff; padding: 30px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.03); border: 1px solid var(--border-lt, #f0e8e2);">
                <h2 style="font-family: var(--font-heading, 'Mona Sans'); font-size: 1.4rem; font-weight: 700; color: var(--orange, #f05a25); margin-bottom: 20px; border-bottom: 2px solid var(--orange-xlt, #fff4f0); padding-bottom: 10px;">Danh mục bài viết</h2>
                <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 12px;">
                    <?php
                    $cats = get_categories();
                    if (!empty($cats)) {
                        foreach ($cats as $cat) {
                            echo '<li><a href="' . get_category_link($cat->term_id) . '" style="color: var(--ink, #111827); text-decoration: none; font-weight: 500; font-size: 14px; transition: color 0.2s;" onmouseover="this.style.color=\'var(--orange, #f05a25)\'" onmouseout="this.style.color=\'var(--ink, #111827)\'">→ ' . esc_html($cat->name) . ' (' . $cat->count . ')</a></li>';
                        }
                    } else {
                        echo '<li style="font-size:14px; color:var(--muted)">Chưa có danh mục nào.</li>';
                    }
                    ?>
                </ul>
            </div>

            <!-- Products -->
            <div style="background: #fff; padding: 30px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.03); border: 1px solid var(--border-lt, #f0e8e2);">
                <h2 style="font-family: var(--font-heading, 'Mona Sans'); font-size: 1.4rem; font-weight: 700; color: var(--orange, #f05a25); margin-bottom: 20px; border-bottom: 2px solid var(--orange-xlt, #fff4f0); padding-bottom: 10px;">Sản phẩm nổi bật</h2>
                <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 12px;">
                    <?php
                    $products = new WP_Query(array(
                        'post_type' => 'tava_product',
                        'posts_per_page' => 15,
                        'post_status' => 'publish'
                    ));
                    if ($products->have_posts()) {
                        while ($products->have_posts()) {
                            $products->the_post();
                            echo '<li><a href="' . get_permalink() . '" style="color: var(--ink, #111827); text-decoration: none; font-weight: 500; font-size: 14px; transition: color 0.2s;" onmouseover="this.style.color=\'var(--orange, #f05a25)\'" onmouseout="this.style.color=\'var(--ink, #111827)\'">→ ' . esc_html(get_the_title()) . '</a></li>';
                        }
                        wp_reset_postdata();
                    } else {
                        echo '<li style="font-size:14px; color:var(--muted)">Đang cập nhật sản phẩm...</li>';
                    }
                    ?>
                </ul>
            </div>

            <!-- Latest Posts -->
            <div style="background: #fff; padding: 30px; border-radius: 12px; box-shadow: 0 4px 20px rgba(0,0,0,0.03); border: 1px solid var(--border-lt, #f0e8e2);">
                <h2 style="font-family: var(--font-heading, 'Mona Sans'); font-size: 1.4rem; font-weight: 700; color: var(--orange, #f05a25); margin-bottom: 20px; border-bottom: 2px solid var(--orange-xlt, #fff4f0); padding-bottom: 10px;">Bài viết mới nhất</h2>
                <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 12px;">
                    <?php
                    $recent_posts = wp_get_recent_posts(array(
                        'numberposts' => 15,
                        'post_status' => 'publish'
                    ));
                    if (!empty($recent_posts)) {
                        foreach($recent_posts as $post) {
                            echo '<li><a href="' . get_permalink($post['ID']) . '" style="color: var(--ink, #111827); text-decoration: none; font-weight: 500; font-size: 14px; transition: color 0.2s;" onmouseover="this.style.color=\'var(--orange, #f05a25)\'" onmouseout="this.style.color=\'var(--ink, #111827)\'">→ ' . esc_html($post['post_title']) . '</a></li>';
                        }
                    } else {
                        echo '<li style="font-size:14px; color:var(--muted)">Chưa có bài viết nào.</li>';
                    }
                    ?>
                </ul>
            </div>
            
        </div>
    </div>
</div>

<?php get_footer(); ?>
