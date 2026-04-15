<?php
/**
 * Template Name: 🧪 Blog Card Preview (Test)
 * Description: Trang preview tất cả variants của Blog Card Component + danh sách bài viết đang có
 *
 * CÁCH DÙNG:
 * 1. Vào WP Admin → Pages → Add New
 * 2. Đặt tên: "Blog Card Preview" (hoặc bất kỳ)
 * 3. Chọn Template: "🧪 Blog Card Preview (Test)"
 * 4. Publish → Xem trang
 *
 * XOÁ SAU KHI TEST XONG: File này chỉ dùng nội bộ, không publish ra ngoài
 */

get_header();

// ── Query tất cả post types bài viết đang có ─────────────────────────────
$all_posts = get_posts([
    'post_type'      => 'post',
    'post_status'    => 'publish',
    'numberposts'    => 20,
    'orderby'        => 'date',
    'order'          => 'DESC',
]);

$fallback = 'https://tavaled.vn/wp-content/uploads/2026/03/0020_TavaLED_Hinh_Anh.jpg';

// Chia posts để demo
$post_big   = $all_posts[0] ?? null;
$post_sm1   = $all_posts[1] ?? null;
$post_sm2   = $all_posts[2] ?? null;
$post_md1   = $all_posts[3] ?? null;
$post_md2   = $all_posts[4] ?? null;
$post_row   = array_slice($all_posts, 0, 4);
$posts_feat = array_slice($all_posts, 0, 5);
$posts_eq   = array_slice($all_posts, 0, 6);
?>

<style>
/* ── Preview Page Styles ─────────────────────────── */
.preview-page {
    min-height: 100vh;
    background: #0f172a;
    padding: 40px 0 80px;
    font-family: var(--font-body, 'Fira Sans', sans-serif);
}
.preview-header {
    text-align: center;
    padding: 60px 24px 48px;
    border-bottom: 1px solid rgba(255,255,255,0.08);
    margin-bottom: 60px;
}
.preview-header h1 {
    font-size: 2rem;
    font-weight: 800;
    color: #fff;
    margin: 0 0 8px;
    font-family: var(--font-heading, 'Fira Sans', sans-serif);
}
.preview-header p { color: rgba(255,255,255,0.5); margin: 0; font-size: 14px; }
.preview-badge {
    display: inline-block;
    background: #f05a25;
    color: #fff;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    padding: 4px 14px;
    border-radius: 999px;
    margin-bottom: 20px;
}
.preview-wrap { max-width: 1400px; margin: 0 auto; padding: 0 40px; }
.preview-section { margin-bottom: 72px; }
.preview-section-title {
    display: flex;
    align-items: center;
    gap: 14px;
    margin-bottom: 28px;
    padding-bottom: 16px;
    border-bottom: 1px solid rgba(255,255,255,0.08);
}
.preview-section-title h2 {
    font-size: 1rem;
    font-weight: 700;
    color: #fff;
    margin: 0;
    font-family: var(--font-heading, sans-serif);
    text-transform: uppercase;
    letter-spacing: 0.1em;
}
.preview-tag {
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 0.15em;
    text-transform: uppercase;
    padding: 3px 10px;
    border-radius: 4px;
}
.preview-tag--variant { background: rgba(240,90,37,0.15); color: #f05a25; border: 1px solid rgba(240,90,37,0.3); }
.preview-tag--layout  { background: rgba(59,130,246,0.15); color: #60a5fa; border: 1px solid rgba(59,130,246,0.3); }
.preview-desc { color: rgba(255,255,255,0.4); font-size: 12px; margin-left: auto; }

/* Grids cho preview */
.preview-grid-2   { display: grid; grid-template-columns: 1fr 1fr; gap: 20px; }
.preview-grid-3   { display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px; }
.preview-grid-4   { display: grid; grid-template-columns: repeat(4, 1fr); gap: 20px; }

/* Post list table */
.post-list-table { width: 100%; border-collapse: collapse; font-size: 13px; }
.post-list-table th { text-align: left; padding: 10px 14px; background: rgba(255,255,255,0.05); color: rgba(255,255,255,0.5); font-weight: 600; font-size: 11px; letter-spacing: 0.1em; text-transform: uppercase; }
.post-list-table td { padding: 10px 14px; border-bottom: 1px solid rgba(255,255,255,0.05); color: rgba(255,255,255,0.75); vertical-align: middle; }
.post-list-table tr:hover td { background: rgba(255,255,255,0.02); }
.post-list-table td a { color: #60a5fa; text-decoration: none; }
.post-list-table td a:hover { text-decoration: underline; }
.has-thumb { display: inline-block; padding: 2px 8px; border-radius: 4px; font-size: 10px; font-weight: 700; }
.has-thumb--yes { background: rgba(34,197,94,0.15); color: #4ade80; }
.has-thumb--no  { background: rgba(239,68,68,0.15); color: #f87171; }
.cat-badge { display: inline-block; background: rgba(240,90,37,0.15); color: #fb923c; border: 1px solid rgba(240,90,37,0.2); padding: 2px 8px; border-radius: 4px; font-size: 10px; font-weight: 700; margin: 1px; }

@media (max-width: 768px) {
    .preview-grid-2 { grid-template-columns: 1fr; }
    .preview-grid-3 { grid-template-columns: 1fr; }
    .preview-grid-4 { grid-template-columns: repeat(2, 1fr); }
    .preview-wrap { padding: 0 16px; }
}
</style>

<div class="preview-page">

    <?php /* ── HEADER ────────────────────────────────────────── */ ?>
    <div class="preview-header">
        <div class="preview-badge">Component Preview</div>
        <h1>🧪 Blog Card Test Page</h1>
        <p>Xem trước tất cả variants & layouts của Blog Card Component với dữ liệu thật từ WordPress</p>
    </div>

    <div class="preview-wrap">

        <?php /* ══════════════════════════════════════════════════
               PHẦN 1: DANH SÁCH BÀI VIẾT ĐANG CÓ
               ══════════════════════════════════════════════════ */ ?>
        <div class="preview-section">
            <div class="preview-section-title">
                <h2>📋 Bài viết đang có trong Database</h2>
                <span class="preview-desc"><?php echo count($all_posts); ?> bài published</span>
            </div>

            <?php if (empty($all_posts)): ?>
            <div style="background: rgba(239,68,68,0.1); border: 1px solid rgba(239,68,68,0.3); border-radius: 12px; padding: 24px; text-align: center; color: #f87171;">
                <strong>Chưa có bài viết nào được publish.</strong><br>
                <span style="font-size:13px;opacity:0.7;">Vào WP Admin → Posts → Add New để tạo bài và quay lại trang này.</span>
            </div>
            <?php else: ?>
            <div style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.08); border-radius: 12px; overflow: hidden;">
                <table class="post-list-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tiêu đề</th>
                            <th>Danh mục</th>
                            <th>Ảnh đại diện</th>
                            <th>Ngày đăng</th>
                            <th>Link</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($all_posts as $p):
                        $cats = wp_get_post_categories($p->ID, ['fields' => 'names']);
                        $has_thumb = has_post_thumbnail($p->ID);
                    ?>
                        <tr>
                            <td style="color:rgba(255,255,255,0.3);font-size:11px;">#<?php echo $p->ID; ?></td>
                            <td style="font-weight:600;max-width:320px;"><?php echo esc_html($p->post_title); ?></td>
                            <td>
                                <?php if ($cats): ?>
                                    <?php foreach($cats as $cat): ?>
                                    <span class="cat-badge"><?php echo esc_html($cat); ?></span>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <span style="color:rgba(255,255,255,0.3);font-size:11px;">Uncategorized</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <span class="has-thumb has-thumb--<?php echo $has_thumb ? 'yes' : 'no'; ?>">
                                    <?php echo $has_thumb ? '✓ Có' : '✗ Không'; ?>
                                </span>
                            </td>
                            <td style="color:rgba(255,255,255,0.4);font-size:12px;"><?php echo date('d/m/Y', strtotime($p->post_date)); ?></td>
                            <td><a href="<?php echo get_permalink($p->ID); ?>" target="_blank">Xem →</a></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php endif; ?>
        </div>

        <?php if (empty($all_posts)): ?>
        <div style="text-align:center;padding:60px;color:rgba(255,255,255,0.3);">
            <p style="font-size:18px;">Tạo một vài bài viết trong WP Admin rồi reload trang này để xem component preview.</p>
        </div>
        <?php else: ?>

        <?php /* ══════════════════════════════════════════════════
               PHẦN 2: VARIANT BIG
               ══════════════════════════════════════════════════ */ ?>
        <?php if ($post_big): ?>
        <div class="preview-section">
            <div class="preview-section-title">
                <h2>Variant: BIG</h2>
                <span class="preview-tag preview-tag--variant">big</span>
                <span class="preview-desc">Ảnh lớn 300px · Có excerpt · Dùng cho bài nổi bật đầu section</span>
            </div>
            <div style="max-width: 600px;">
                <?php get_template_part('app/Views/components/blog-card', null, [
                    'post'           => $post_big,
                    'variant'        => 'big',
                    'cta_text'       => 'Xem dự án',
                    'excerpt_words'  => 35,
                    'fallback_img'   => $fallback,
                ]); ?>
            </div>
        </div>
        <?php endif; ?>

        <?php /* ══════════════════════════════════════════════════
               PHẦN 3: VARIANT SM, MD, ROW — 4 cột
               ══════════════════════════════════════════════════ */ ?>
        <div class="preview-section">
            <div class="preview-section-title">
                <h2>Variant: SM · MD · ROW</h2>
                <span class="preview-tag preview-tag--variant">sm</span>
                <span class="preview-tag preview-tag--variant">md</span>
                <span class="preview-tag preview-tag--variant">row</span>
                <span class="preview-desc">Các card kích thước nhỏ hơn trong lưới phụ</span>
            </div>

            <?php if (!empty($post_row)): ?>
            <div class="preview-grid-4">
                <?php foreach ($post_row as $i => $p):
                    $variants = ['sm', 'sm', 'md', 'row'];
                    $v = $variants[$i] ?? 'sm';
                ?>
                <div>
                    <div style="text-align:center;margin-bottom:8px;">
                        <span class="preview-tag preview-tag--variant"><?php echo $v; ?></span>
                    </div>
                    <?php get_template_part('app/Views/components/blog-card', null, [
                        'post'         => $p,
                        'variant'      => $v,
                        'fallback_img' => $fallback,
                        'cta_text'     => 'Đọc thêm',
                    ]); ?>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>

        <?php /* ══════════════════════════════════════════════════
               PHẦN 4: LAYOUT FEATURED
               ══════════════════════════════════════════════════ */ ?>
        <?php if (count($posts_feat) >= 1): ?>
        <div class="preview-section">
            <div class="preview-section-title">
                <h2>Layout: FEATURED</h2>
                <span class="preview-tag preview-tag--layout">featured</span>
                <span class="preview-desc">1 BIG trái span 2 rows · 2×2 SM phải · Dùng cho Kinh Nghiệm, Tin Tức</span>
            </div>
            <div class="tava-blog-grid--featured">
                <?php foreach ($posts_feat as $i => $p): ?>
                <?php get_template_part('app/Views/components/blog-card', null, [
                    'post'          => $p,
                    'variant'       => ($i === 0) ? 'big' : 'sm',
                    'fallback_img'  => $fallback,
                    'cta_text'      => 'Đọc ngay',
                    'excerpt_words' => 35,
                ]); ?>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

        <?php /* ══════════════════════════════════════════════════
               PHẦN 5: LAYOUT SERVICE
               ══════════════════════════════════════════════════ */ ?>
        <?php if (count($all_posts) >= 1): ?>
        <div class="preview-section">
            <div class="preview-section-title">
                <h2>Layout: SERVICE</h2>
                <span class="preview-tag preview-tag--layout">service</span>
                <span class="preview-desc">1 BIG trái · stacked MD phải · Dùng cho Dịch Vụ (2-3 bài)</span>
            </div>
            <div class="tava-blog-grid--service">
                <?php if ($post_big): ?>
                <?php get_template_part('app/Views/components/blog-card', null, [
                    'post'          => $post_big,
                    'variant'       => 'big',
                    'fallback_img'  => $fallback,
                    'cta_text'      => 'Chi tiết',
                    'excerpt_words' => 35,
                ]); ?>
                <?php endif; ?>
                <?php if ($post_sm1 || $post_sm2): ?>
                <div class="tava-blog-grid--service__right">
                    <?php foreach (array_filter([$post_sm1, $post_sm2]) as $p): ?>
                    <?php get_template_part('app/Views/components/blog-card', null, [
                        'post'         => $p,
                        'variant'      => 'md',
                        'fallback_img' => $fallback,
                        'cta_text'     => 'Xem thêm',
                    ]); ?>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>

        <?php /* ══════════════════════════════════════════════════
               PHẦN 6: LAYOUT EQUAL (3 cột)
               ══════════════════════════════════════════════════ */ ?>
        <?php if (!empty($posts_eq)): ?>
        <div class="preview-section">
            <div class="preview-section-title">
                <h2>Layout: EQUAL</h2>
                <span class="preview-tag preview-tag--layout">equal</span>
                <span class="preview-desc">Lưới 3 cột đều nhau · Generic · Dùng cho Blog page tổng hợp</span>
            </div>
            <div class="tava-blog-grid--equal">
                <?php foreach ($posts_eq as $p): ?>
                <?php get_template_part('app/Views/components/blog-card', null, [
                    'post'         => $p,
                    'variant'      => 'md',
                    'fallback_img' => $fallback,
                    'cta_text'     => 'Đọc thêm',
                ]); ?>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endif; ?>

        <?php /* ══════════════════════════════════════════════════
               PHẦN 7: LAYOUT HERO (full)
               ══════════════════════════════════════════════════ */ ?>
        <?php if (!empty($all_posts)): ?>
        <div class="preview-section">
            <div class="preview-section-title">
                <h2>Layout: HERO (đầy đủ)</h2>
                <span class="preview-tag preview-tag--layout">hero</span>
                <span class="preview-desc">1 BIG + 2 SM → row 4 cột → row 3 cột · Dùng cho Dự Án (nhiều bài)</span>
            </div>

            <?php $big_h = $all_posts[0] ?? null; $right_h = array_slice($all_posts, 1, 2); ?>
            <?php if ($big_h): ?>
            <div class="tava-blog-grid--hero" style="margin-bottom:16px;">
                <?php get_template_part('app/Views/components/blog-card', null, ['post'=>$big_h,'variant'=>'big','fallback_img'=>$fallback,'cta_text'=>'Xem dự án','excerpt_words'=>35]); ?>
                <?php if ($right_h): ?>
                <div class="tava-blog-grid--hero__right">
                    <?php foreach ($right_h as $p): get_template_part('app/Views/components/blog-card', null, ['post'=>$p,'variant'=>'sm','fallback_img'=>$fallback,'cta_text'=>'Xem']); endforeach; ?>
                </div>
                <?php endif; ?>
            </div>
            <?php endif; ?>

            <?php $row4_h = array_slice($all_posts, 3, 4); if ($row4_h): ?>
            <div class="tava-blog-grid--row4">
                <?php foreach ($row4_h as $p): get_template_part('app/Views/components/blog-card', null, ['post'=>$p,'variant'=>'row','fallback_img'=>$fallback,'cta_text'=>'Xem']); endforeach; ?>
            </div>
            <?php endif; ?>

            <?php $row3_h = array_slice($all_posts, 7, 3); if ($row3_h): ?>
            <div class="tava-blog-grid--row3" style="margin-top:16px;">
                <?php foreach ($row3_h as $p): get_template_part('app/Views/components/blog-card', null, ['post'=>$p,'variant'=>'row','fallback_img'=>$fallback,'cta_text'=>'Xem']); endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <?php endif; // end if have posts ?>

    </div><?php // end .preview-wrap ?>
</div><?php // end .preview-page ?>

<?php get_footer(); ?>
