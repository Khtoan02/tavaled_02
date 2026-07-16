<?php
/**
 * Blog Sections Template Part
 * ─────────────────────────────────────────────────────────────────────────────
 * File này định nghĩa CẤU HÌNH cho từng section blog.
 * Để THÊM/SỬA/XOÁ section: chỉ cần chỉnh mảng $sections bên dưới.
 *
 * Mỗi section là một mảng config, được truyền vào component blog-grid.php.
 * Xem hướng dẫn đầy đủ tại: app/Views/components/blog-grid.php
 *
 * LAYOUT OPTIONS:
 *   'hero'     → 1 BIG + 2 SM phải, rồi 4-col row, rồi 3-col row (nhiều bài)
 *   'featured' → 1 BIG trái + 2×2 SM phải (khoảng 5 bài)
 *   'service'  → 1 BIG trái + stacked MD phải (2-3 bài)
 *   'equal'    → Lưới 3 cột đều (generic)
 * ─────────────────────────────────────────────────────────────────────────────
 */

$global_theme = $args['theme'] ?? 'dark';
$sections = [

    // ── 01: DỰ ÁN ───────────────────────────────────────────────────────────
    [
        'category' => 'du-an',
        'layout' => 'hero',
        'posts_per_page' => 10,
        'title' => 'Bài Viết <em>Dự Án</em>',
        'eyebrow' => 'Công trình tiêu biểu',
        'ghost_text' => 'Dự Án',
        'view_all_text' => 'Xem tất cả dự án',
        'category_label' => 'Dự Án',
        'fallback_img' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=600',
        'cta_text' => 'Xem dự án',
        'excerpt_words' => 40,
        'is_first' => false,
        'theme' => $global_theme,
    ],

    // ── 02: CHIA SẺ KINH NGHIỆM ─────────────────────────────────────────────
    [
        'category' => 'chia-se-kinh-nghiem',
        'layout' => 'featured',
        'posts_per_page' => 5,
        'title' => 'Chia Sẻ <em>Kinh Nghiệm</em>',
        'eyebrow' => 'Góc nhìn chuyên môn',
        'ghost_text' => 'Kinh Nghiệm',
        'view_all_text' => 'Xem tất cả',
        'category_label' => 'Kinh Nghiệm',
        'fallback_img' => 'https://images.unsplash.com/photo-1470225620780-dba8ba36b745?w=600',
        'cta_text' => 'Đọc ngay',
        'excerpt_words' => 40,
        'is_first' => false,
        'theme' => $global_theme,
    ],

    // ── 03: DỊCH VỤ ─────────────────────────────────────────────────────────
    [
        'category' => 'dich-vu',
        'layout' => 'featured',
        'posts_per_page' => 3,
        'title' => 'Cung Cấp <em>Dịch Vụ</em>',
        'eyebrow' => 'Giải pháp chuyên nghiệp',
        'ghost_text' => 'Dịch Vụ',
        'view_all_text' => 'Xem tất cả',
        'category_label' => 'Dịch Vụ',
        'fallback_img' => 'https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?w=600',
        'cta_text' => 'Chi tiết',
        'excerpt_words' => 40,
        'is_first' => false,
        'theme' => $global_theme,
    ],

    // ── 04: TIN TỨC ─────────────────────────────────────────────────────────
    [
        'category' => 'tin-tuc',
        'layout' => 'featured',
        'posts_per_page' => 5,
        'title' => 'Tin <em>Tức</em> & Cập <em>Nhật</em>',
        'eyebrow' => 'Cập nhật mới nhất',
        'ghost_text' => 'Tin Tức',
        'view_all_text' => 'Xem tất cả',
        'category_label' => 'Tin Tức',
        'fallback_img' => 'https://images.unsplash.com/photo-1451187580459-43490279c0fa?w=600',
        'cta_text' => 'Đọc chi tiết',
        'excerpt_words' => 40,
        'is_first' => false,
        'theme' => $global_theme,
    ],

    // ── THÊM SECTION MỚI: Sao chép block trên và chỉnh config ───────────────
    // [
    //     'category'       => 'slug-category-moi',
    //     'layout'         => 'equal',
    //     'posts_per_page' => 6,
    //     'title'          => 'Tiêu Đề <em>Section</em>',
    //     'eyebrow'        => 'Eyebrow text',
    //     'ghost_text'     => 'Ghost',
    //     'view_all_text'  => 'Xem tất cả',
    //     'category_label' => 'Category',
    //     'fallback_img'   => 'https://...',
    //     'cta_text'       => 'Đọc thêm',
    //     'excerpt_words'  => 30,
    //     'is_first'       => false,
    // ],

];

// ── Render tất cả sections ────────────────────────────────────────────────
foreach ($sections as $section) {
    get_template_part('app/Views/components/blog-grid', null, ['section' => $section]);
}
