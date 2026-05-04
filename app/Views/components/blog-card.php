<?php
/**
 * Component: Blog Card (tava-blog-card) - BẢN MASTER TỐI THƯỢNG
 * Tính năng: 3D White Frosted Glass, Adaptive Layout (big, md, sm, row), Full-Card Clickable
 * Tỉ lệ ảnh: 16:9 Tuyệt đối trên mọi màn hình
 * ─────────────────────────────────────────────────────────────────────────────
 */

// 1. KIỂM TRA DỮ LIỆU ĐẦU VÀO (An toàn tuyệt đối)
$post = $args['post'] ?? null;
if ( ! $post ) {
    if (WP_DEBUG) echo '<div class="p-4 bg-red-900/50 text-white rounded-xl border border-red-500 text-sm">Component Lỗi: Thiếu tham số $post.</div>';
    return;
}

// 2. KHỞI TẠO BIẾN & LẤY DỮ LIỆU WORDPRESS
$variant        = $args['variant']        ?? 'sm';
$category_label = $args['category_label'] ?? '';
$fallback_img   = $args['fallback_img']   ?? 'https://tavaled.vn/wp-content/uploads/2026/03/0020_TavaLED_Hinh_Anh.jpg';
$cta_text       = $args['cta_text']       ?? 'Đọc chi tiết';
$date_format    = $args['date_format']    ?? 'd/m/Y';
$theme          = $args['theme']          ?? 'dark';

$post_id   = $post->ID;
$title     = get_the_title( $post_id );
$permalink = get_permalink( $post_id );
$date      = get_the_date( $date_format, $post_id );
$excerpt   = get_the_excerpt( $post_id );

// Tự động lấy danh mục nếu không truyền tay
if ( empty( $category_label ) ) {
    $categories = get_the_category( $post_id );
    $category_label = !empty($categories) ? $categories[0]->name : 'Tin Tức';
}

// 3. LAYOUT LOGIC
// BIG: cột (ảnh trên, text dưới) — giữ nguyên
// SM-ROW: nằm ngang (ảnh trái | text phải) — dùng cho hero right column
// SM/MD/ROW/default: cột thảng
$extra_card_class = ( $variant === 'sm-row' ) ? 'tava-card-sm-row' : '';

// Tuy chỉnh Font chữ & Excerpt theo Variant
$show_excerpt = true;
switch ( $variant ) {
    case 'big':
        $title_size    = 'text-xl leading-snug';
        $excerpt_clamp = 3;
        $excerpt_words = 30;
        break;
    case 'sm-row':
        $title_size    = 'text-sm leading-snug';
        $excerpt_clamp = 2;
        $excerpt_words = 12;
        break;
    case 'md':
        $title_size    = 'text-base leading-snug';
        $excerpt_clamp = 2;
        $excerpt_words = 18;
        break;
    case 'row':
    case 'sm':
    default:
        $title_size    = 'text-sm leading-snug';
        $excerpt_clamp = 2;
        $excerpt_words = 12;
        break;
}

// 4. Các biến class Tailwind đã bị xoá do JIT compiler không nhận diện được file PHP khi không chạy build.
// Thay vào đó, chúng ta sẽ dùng CSS thuần trong block <style> bên dưới.
?>

<?php
// ── In CSS một lần duy nhất per-page (tránh duplicate khi render nhiều card) ──
static $tava_card_css_printed = false;
if ( ! $tava_card_css_printed ) :
    $tava_card_css_printed = true;
?>
<style id="tava-blog-card-css">
/* ==========================================================================
   CSS 3D WHITE GLASSMORPHISM ĐỘC QUYỀN TAVALED
   ========================================================================== */
.tava-3d-wrapper {
    perspective: 1400px; /* Góc nhìn 3D sâu hơn */
    width: 100%;
    height: 100%;
}

/* Base: Khung Kính Trắng — dọc (flex-col) mặc định */
.tava-3d-glass {
    position: relative;
    height: 100%;
    display: flex;
    flex-direction: column;
    gap: 14px;
    padding: 20px;
    border-radius: 28px;
    backdrop-filter: blur(24px);
    -webkit-backdrop-filter: blur(24px);
    transform-style: preserve-3d;
    transition: transform 0.6s cubic-bezier(0.23, 1, 0.32, 1), box-shadow 0.6s ease, border-color 0.6s ease, background 0.6s ease;
}

/* ==================== DARK THEME ==================== */
.tava-theme-dark {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.15) 0%, rgba(255, 255, 255, 0.05) 100%);
    border: 1px solid rgba(255, 255, 255, 0.25);
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
}
.tava-theme-dark .tava-3d-img-box {
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
    border: 1px solid rgba(255, 255, 255, 0.15);
    background: #0f172a;
}
.tava-theme-dark .tava-3d-footer { border-top: 1px solid rgba(255, 255, 255, 0.15); }
.tava-theme-dark .tava-card-badge { background: rgba(255,255,255,0.1); border: 1px solid rgba(255,255,255,0.3); color: #fff; }
.tava-theme-dark .tava-card-title { color: #fff; }
.tava-theme-dark .tava-card-excerpt { color: rgba(255,255,255,0.75); }
.tava-theme-dark .tava-card-btn { background: rgba(255,255,255,0.1); border-color: rgba(255,255,255,0.3); color: #fff; }
.tava-theme-dark .tava-card-date { color: rgba(255,255,255,0.6); }
.tava-theme-dark .tava-card-cta { color: #fff; }

.tava-3d-wrapper:hover .tava-theme-dark .tava-card-title { color: #dbeafe; /* blue-100 */ }


/* ==================== LIGHT THEME ==================== */
.tava-theme-light {
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.7) 0%, rgba(255, 255, 255, 0.4) 100%);
    border: 1px solid rgba(255, 255, 255, 0.8);
    box-shadow: 0 10px 40px rgba(29, 40, 87, 0.05);
}
.tava-theme-light .tava-3d-img-box {
    box-shadow: 0 15px 35px rgba(29, 40, 87, 0.1);
    border: 1px solid rgba(255, 255, 255, 0.9);
    background: #f1f5f9;
}
.tava-theme-light .tava-3d-footer { border-top: 1px solid rgba(29, 40, 87, 0.08); }
.tava-theme-light .tava-card-badge { background: rgba(15,23,42,0.05); border: 1px solid rgba(15,23,42,0.1); color: #1d2857; }
.tava-theme-light .tava-card-title { color: #1d2857; }
.tava-theme-light .tava-card-excerpt { color: #4b5563; }
.tava-theme-light .tava-card-btn { background: #ffffff; border-color: #e2e8f0; color: #1d2857; }
.tava-theme-light .tava-card-date { color: #64748b; }
.tava-theme-light .tava-card-cta { color: #f05a25; }

.tava-3d-wrapper:hover .tava-theme-light .tava-card-title { color: #f05a25; }

/* SM-ROW variant: nằm ngang trên desktop (ảnh trái | text phải) */
@media (min-width: 768px) {
    .tava-3d-glass.tava-card-sm-row {
        flex-direction: row;
        align-items: stretch;
        gap: 14px;
        padding: 14px;
    }
    .tava-3d-glass.tava-card-sm-row .tava-3d-img-box {
        width: 44%;
        flex-shrink: 0;
        aspect-ratio: unset;
        height: auto;
        min-height: 130px;
    }
    .tava-3d-glass.tava-card-sm-row .tava-3d-content {
        flex: 1;
        min-width: 0;
        display: flex;
        flex-direction: column;
    }
    /* Ẩnh BIG vẫn giữ 16:9 đủ rộng */
    .tava-3d-glass:not(.tava-card-sm-row) .tava-3d-img-box {
        aspect-ratio: 16 / 9;
    }
}

/* LỚP 1: GLOBAL LINK (Phủ kín thẻ để bắt Click - Quan trọng nhất) */
.tava-global-overlay {
    position: absolute;
    inset: 0;
    border-radius: 28px;
    z-index: 20;
    transform: translateZ(100px); /* Nổi lên cao nhất để che toàn bộ ảnh và text */
    cursor: pointer;
}

/* LỚP 2: NÚT TƯƠNG TÁC (Đâm xuyên qua Global Link) */
.tava-btn-interactive {
    position: relative;
    z-index: 30; 
    transform: translateZ(110px); /* Nổi cao hơn cả Global Link */
}

/* LỚP 3: Hình Ảnh Sự Kiện */
.tava-3d-img-box {
    position: relative;
    aspect-ratio: 16 / 9;
    border-radius: 18px;
    overflow: hidden;
    transform: translateZ(40px); /* Ảnh nổi nhẹ so với mặt kính */
    transition: transform 0.6s cubic-bezier(0.23, 1, 0.32, 1), box-shadow 0.6s ease;
}
.tava-3d-img-box img {
    width: 100%; height: 100%; object-fit: cover;
    transition: transform 0.8s ease;
}

/* Vòng tròn công nghệ trang trí */
.tava-tech-node {
    position: absolute; top: 12px; right: 12px;
    width: 28px; height: 28px; background: #ffffff; border-radius: 50%;
    display: grid; place-content: center;
    box-shadow: 0 4px 15px rgba(0,0,0,0.3);
}
.tava-tech-node svg { width: 14px; fill: #0f172a; }

/* LỚP 4: Nội Dung Văn Bản */
.tava-3d-content {
    transform: translateZ(30px);
    display: flex; flex-direction: column; flex-grow: 1;
    transform-style: preserve-3d;
    pointer-events: none; /* Tránh cản trở thao tác click của Global Link */
}
.tava-3d-excerpt {
    font-size: 15px; line-height: 1.6;
    display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden;
    margin-bottom: 20px;
}

/* Thanh Footer chứa các nút */
.tava-3d-footer {
    margin-top: auto; padding-top: 16px;
    display: flex; justify-content: space-between; align-items: center;
    pointer-events: auto; /* Bật lại pointer-events cho khu vực chứa nút chức năng */
}

/* ==========================================================================
   HOVER EFFECTS (Hiệu ứng 3D siêu mượt khi lia chuột)
   ========================================================================== */
@media (hover: hover) and (pointer: fine) {
    /* COMMON HOVER */
    .tava-3d-wrapper:hover .tava-3d-glass { transform: rotateX(6deg) rotateY(-4deg); }
    .tava-3d-wrapper:hover .tava-3d-img-box { transform: translateZ(70px) scale(1.02); }
    .tava-3d-wrapper:hover .tava-3d-img-box img { transform: scale(1.05); }
    .tava-btn-interactive:hover { transform: translateZ(120px) scale(1.1); }

    /* DARK HOVER */
    .tava-3d-wrapper:hover .tava-theme-dark {
        box-shadow: -20px 30px 50px rgba(0, 0, 0, 0.2);
        border-color: rgba(255, 255, 255, 0.4);
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0.08) 100%);
    }
    .tava-3d-wrapper:hover .tava-theme-dark .tava-3d-img-box {
        box-shadow: -15px 25px 40px rgba(0, 0, 0, 0.35);
    }
    .tava-3d-wrapper:hover .tava-theme-dark .tava-btn-interactive {
        background-color: #ffffff;
        color: #0f172a;
    }

    /* LIGHT HOVER */
    .tava-3d-wrapper:hover .tava-theme-light {
        box-shadow: -20px 30px 50px rgba(29, 40, 87, 0.08);
        border-color: rgba(240, 90, 37, 0.4); /* var(--orange) opacity */
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(255, 255, 255, 0.85) 100%);
    }
    .tava-3d-wrapper:hover .tava-theme-light .tava-3d-img-box {
        box-shadow: -15px 25px 40px rgba(29, 40, 87, 0.15);
    }
    .tava-3d-wrapper:hover .tava-theme-light .tava-btn-interactive {
        background-color: #f05a25; /* var(--orange) */
        border-color: #f05a25;
        color: #ffffff;
    }
}
</style>
<?php endif; // end: chỉ in CSS 1 lần ?>

<div class="tava-3d-wrapper group">
    <article class="tava-3d-glass <?php echo esc_attr('tava-theme-' . $theme . ' ' . $extra_card_class); ?>">
        
        <a href="<?php echo esc_url($permalink); ?>" class="tava-global-overlay" aria-label="<?php echo esc_attr($title); ?>"></a>

        <div class="tava-3d-img-box">
            <?php if ( has_post_thumbnail( $post_id ) ) : 
                echo get_the_post_thumbnail( $post_id, ($variant === 'big') ? 'large' : 'medium', ['class' => 'w-full h-full object-cover'] );
            else : ?>
                <img src="<?php echo esc_url($fallback_img); ?>" alt="<?php echo esc_attr($title); ?>" loading="lazy">
            <?php endif; ?>
            
            <div class="tava-tech-node">
                <svg viewBox="0 0 24 24"><path d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            </div>
        </div>

        <div class="tava-3d-content">
            
            <span class="tava-card-badge inline-block w-max px-3 py-1.5 rounded-full text-[10px] font-extrabold uppercase tracking-widest mb-4 shadow-sm backdrop-blur-md">
                <?php echo esc_html($category_label); ?>
            </span>
            
            <h3 class="tava-card-title font-bold mb-3 <?php echo esc_attr($title_size); ?> transition-colors duration-300">
                <?php echo esc_html($title); ?>
            </h3>

            <?php if ( $show_excerpt && $excerpt ) : ?>
                <p class="tava-3d-excerpt tava-card-excerpt" style="-webkit-line-clamp:<?php echo (int)$excerpt_clamp; ?>">
                    <?php echo esc_html( wp_trim_words( $excerpt, $excerpt_words, '...' ) ); ?>
                </p>
            <?php endif; ?>


            <div class="tava-3d-footer">
                
                <div class="flex items-center gap-3">
                    <button class="tava-card-btn tava-btn-interactive w-9 h-9 rounded-full border flex items-center justify-center transition-all duration-300 shadow-sm" aria-label="Yêu thích">
                        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    </button>
                    <span class="tava-card-date text-[12px] font-semibold tracking-wider"><?php echo esc_html($date); ?></span>
                </div>
                
                <span class="tava-card-cta flex items-center gap-1.5 text-[12px] md:text-[13px] font-bold uppercase tracking-widest group-hover:translate-x-1 transition-transform duration-300">
                    <?php echo esc_html($cta_text); ?>
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="m9 5 7 7-7 7"></path></svg>
                </span>

            </div>
        </div>

    </article>
</div>