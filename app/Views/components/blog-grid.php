<?php
/**
 * Component: Blog Grid Section (blog-grid)
 * ─────────────────────────────────────────────────────────────────────────────
 * Component tự chứa toàn bộ: heading + WP_Query + grid layout + blog-card.
 * Chỉ cần truyền vào một mảng $args['section'] là đủ.
 *
 * Cách gọi:
 *
 *   get_template_part('app/Views/components/blog-grid', null, [
 *       'section' => [
 *           // ── BẮT BUỘC ──
 *           'category'       => 'du-an',                // Slug category WordPress
 *           'layout'         => 'hero',                 // Xem LAYOUT OPTIONS bên dưới
 *
 *           // ── HEADING ──
 *           'title'          => 'Bài Viết <em>Dự Án</em>',  // HTML (chỉ tag <em> được phép)
 *           'eyebrow'        => 'Công trình tiêu biểu',      // Dòng chữ nhỏ phía trên title
 *           'ghost_text'     => 'Dự Án',                     // Chữ mờ watermark
 *           'view_all_text'  => 'Xem tất cả dự án',          // Text nút "xem thêm"
 *           'view_all_url'   => '',  // URL nút — để trống sẽ tự động lấy từ category slug
 *
 *           // ── CARD CONFIG ──
 *           'category_label' => 'Dự Án',              // Badge hiện trên góc ảnh mỗi card
 *           'fallback_img'   => 'https://...',         // Ảnh dự phòng
 *           'cta_text'       => 'Xem dự án',           // Chữ nút CTA trong mỗi card
 *           'excerpt_words'  => 40,                    // Số từ excerpt (chỉ card BIG)
 *
 *           // ── QUERY ──
 *           'posts_per_page' => 10,                    // Số bài lấy từ DB
 *
 *           // ── DISPLAY ──
 *           'is_first'       => true,  // true = không có border-top (section đầu tiên)
 *       ]
 *   ]);
 *
 * ─────────────────────────────────────────────────────────────────────────────
 * LAYOUT OPTIONS:
 *   'hero'     → 1 BIG + 2 SM phải | row 4 cột | row 3 cột  (dùng cho Dự Án nhiều bài)
 *   'featured' → 1 BIG trái span 2 rows + 2×2 SM phải        (dùng cho Kinh Nghiệm, Tin Tức)
 *   'service'  → 1 BIG trái + 2 MD dọc phải                  (dùng cho Dịch Vụ ít bài)
 *   'equal'    → Lưới 3 cột đều                              (generic, dùng cho trang blog)
 * ─────────────────────────────────────────────────────────────────────────────
 */

$section = $args['section'] ?? [];
if (empty($section)) return;

// ── Config với defaults ───────────────────────────────────────────────────
$category      = $section['category']       ?? '';
$layout        = $section['layout']         ?? 'featured';
$posts_per_page = (int)($section['posts_per_page'] ?? 6);
$title         = $section['title']          ?? '';
$eyebrow       = $section['eyebrow']        ?? '';
$ghost_text    = $section['ghost_text']     ?? '';
$view_all_url  = $section['view_all_url']   ?? '';
$view_all_text = $section['view_all_text']  ?? 'Xem tất cả';
$cat_label     = $section['category_label'] ?? '';
$fallback_img  = $section['fallback_img']   ?? 'https://tavaled.vn/wp-content/uploads/2026/03/0020_TavaLED_Hinh_Anh.jpg';
$cta_text      = $section['cta_text']       ?? 'Đọc thêm';
$excerpt_words = (int)($section['excerpt_words'] ?? 25);
$is_first      = (bool)($section['is_first'] ?? false);

if (!$category) return;

// ── WP_Query ──────────────────────────────────────────────────────────────
$q = new WP_Query([
    'category_name'  => $category,
    'posts_per_page' => $posts_per_page,
    'orderby'        => 'date',
    'order'          => 'DESC',
]);

if (!$q->have_posts()) {
    wp_reset_postdata();
    return;
}

$posts = $q->posts;

// Auto-generate view_all_url từ category slug nếu chưa có
if (!$view_all_url && $category) {
    $cat = get_category_by_slug($category);
    $view_all_url = $cat ? get_category_link($cat->term_id) : '#';
}

// ── Helper: render 1 card ─────────────────────────────────────────────────
$render_card = function($post_obj, $variant = 'sm', $override_cta = '') use ($cat_label, $fallback_img, $cta_text, $excerpt_words) {
    get_template_part('app/Views/components/blog-card', null, [
        'post'           => $post_obj,
        'variant'        => $variant,
        'category_label' => $cat_label,
        'fallback_img'   => $fallback_img,
        'cta_text'       => $override_cta ?: $cta_text,
        'excerpt_words'  => $excerpt_words,
    ]);
};
?>

<div class="tava-blog-section reveal-up">

    <?php /* ── Section Heading ─────────────────────────────── */ ?>
    <div class="tava-heading tava-heading--light <?php echo (!$is_first) ? 'border-t border-white/10 pt-16 mt-8' : ''; ?>">
        <?php if ($ghost_text): ?>
        <span class="tava-heading__ghost" aria-hidden="true"><?php echo esc_html($ghost_text); ?></span>
        <?php endif; ?>
        <div class="tava-heading__left">
            <?php if ($eyebrow): ?>
            <div class="tava-heading__eyebrow"><?php echo esc_html($eyebrow); ?></div>
            <?php endif; ?>
            <?php if ($title): ?>
            <h2 class="tava-heading__title"><?php echo wp_kses($title, ['em' => []]); ?></h2>
            <?php endif; ?>
        </div>
        <?php if ($view_all_url): ?>
        <a href="<?php echo esc_url($view_all_url); ?>" class="tava-heading__link relative z-20">
            <span class="tava-heading__link-text"><?php echo esc_html($view_all_text); ?></span>
            <span class="tava-heading__link-icon"><i class="ph-bold ph-arrow-right"></i></span>
        </a>
        <?php endif; ?>
    </div>

    <?php /* ── Grid Layout ──────────────────────────────────── */ ?>
    <?php switch ($layout):

        // ════════════════════════════════════════════════════
        // HERO: 1 BIG + 2 SM phải | 4 col row | 3 col row
        // Phù hợp với section có nhiều bài (8-10 posts)
        // ════════════════════════════════════════════════════
        case 'hero':
            $big   = array_slice($posts, 0, 1); // Post 0: hero
            $right = array_slice($posts, 1, 2); // Posts 1-2: bên phải
            $row4  = array_slice($posts, 3, 4); // Posts 3-6: hàng 4 cột
            $row3  = array_slice($posts, 7, 3); // Posts 7-9: hàng 3 cột
        ?>
        <?php if ($big): ?>
        <div class="tava-blog-grid--hero">
            <?php $render_card($big[0], 'big'); ?>
            <?php if ($right): ?>
            <div class="tava-blog-grid--hero__right">
                <?php foreach ($right as $p): $render_card($p, 'sm-row'); endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <?php if ($row4): ?>
        <div class="tava-blog-grid--row4">
            <?php foreach ($row4 as $p): $render_card($p, 'row'); endforeach; ?>
        </div>
        <?php endif; ?>

        <?php if ($row3): ?>
        <div class="tava-blog-grid--row3">
            <?php foreach ($row3 as $p): $render_card($p, 'row'); endforeach; ?>
        </div>
        <?php endif; ?>
        <?php break;

        // ════════════════════════════════════════════════════
        // FEATURED: 1 BIG trái span 2 rows + 2×2 SM phải
        // Phù hợp với section 5 posts (1 nổi bật + 4 nhỏ)
        // ════════════════════════════════════════════════════
        case 'featured': ?>
        <div class="tava-blog-grid--featured">
            <?php foreach ($posts as $i => $p): ?>
            <?php $render_card($p, ($i === 0) ? 'big' : 'sm'); ?>
            <?php endforeach; ?>
        </div>
        <?php break;

        // ════════════════════════════════════════════════════
        // SERVICE: 1 BIG trái + stack MD bên phải
        // Phù hợp với section ít bài (2-3 posts)
        // ════════════════════════════════════════════════════
        case 'service':
            $big   = $posts[0] ?? null;
            $right = array_slice($posts, 1);
        ?>
        <div class="tava-blog-grid--service">
            <?php if ($big): $render_card($big, 'big'); endif; ?>
            <?php if ($right): ?>
            <div class="tava-blog-grid--service__right">
                <?php foreach ($right as $p): $render_card($p, 'md'); endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
        <?php break;

        // ════════════════════════════════════════════════════
        // EQUAL: Lưới 3 cột đều (generic - dùng cho blog page)
        // ════════════════════════════════════════════════════
        case 'equal':
        default: ?>
        <div class="tava-blog-grid--equal">
            <?php foreach ($posts as $p): $render_card($p, 'md'); endforeach; ?>
        </div>
        <?php break;

    endswitch; ?>

</div>
<?php wp_reset_postdata(); ?>
