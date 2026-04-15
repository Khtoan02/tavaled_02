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

// 3. LOGIC XỬ LÝ LAYOUT — Tất cả variant đều DỌNG (flex-col)
// Lý do: row variant trong grid 4-col chỉ có ~25% viewport → ngang quá hẹp

// Bố cục Flexbox: luôn dọng để đảm bảo grid layout
$card_direction = 'flex-col';
$img_width      = 'w-full';
$content_width  = 'w-full mt-4';

// Tùy chỉnh Font chữ & Excerpt theo Variant — TẤT CẢ đều có mô tả
$show_excerpt = true;
switch ( $variant ) {
    case 'big':
        $title_size    = 'text-2xl md:text-[28px] leading-[1.3]';
        $excerpt_clamp = 'line-clamp-3';
        $excerpt_words = 35;
        break;
    case 'md':
        $title_size    = 'text-lg md:text-xl leading-snug';
        $excerpt_clamp = 'line-clamp-2';
        $excerpt_words = 20;
        break;
    case 'row':
        $title_size    = 'text-sm md:text-base leading-snug';
        $excerpt_clamp = 'line-clamp-2';
        $excerpt_words = 15;
        break;
    case 'sm':
    default:
        $title_size    = 'text-sm md:text-base leading-snug';
        $excerpt_clamp = 'line-clamp-2';
        $excerpt_words = 12;
        break;
}
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

/* Base: Khung Kính Trắng */
.tava-3d-glass {
    position: relative;
    height: 100%;
    display: flex;
    flex-direction: column;
    gap: 14px;
    padding: 20px;
    border-radius: 28px;
    background: linear-gradient(135deg, rgba(255, 255, 255, 0.15) 0%, rgba(255, 255, 255, 0.05) 100%);
    backdrop-filter: blur(24px);
    -webkit-backdrop-filter: blur(24px);
    border: 1px solid rgba(255, 255, 255, 0.25);
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
    transform-style: preserve-3d;
    transition: transform 0.6s cubic-bezier(0.23, 1, 0.32, 1), box-shadow 0.6s ease;
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
    box-shadow: 0 15px 35px rgba(0, 0, 0, 0.25);
    border: 1px solid rgba(255, 255, 255, 0.15);
    background: #0f172a;
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
    color: rgba(255, 255, 255, 0.75);
    font-size: 15px; line-height: 1.6;
    display: -webkit-box; -webkit-box-orient: vertical; overflow: hidden;
    margin-bottom: 20px;
}

/* Thanh Footer chứa các nút */
.tava-3d-footer {
    margin-top: auto; padding-top: 16px;
    border-top: 1px solid rgba(255, 255, 255, 0.15);
    display: flex; justify-content: space-between; align-items: center;
    pointer-events: auto; /* Bật lại pointer-events cho khu vực chứa nút chức năng */
}

/* ==========================================================================
   HOVER EFFECTS (Hiệu ứng 3D siêu mượt khi lia chuột)
   ========================================================================== */
@media (hover: hover) and (pointer: fine) {
    .tava-3d-wrapper:hover .tava-3d-glass {
        transform: rotateX(6deg) rotateY(-4deg);
        box-shadow: -20px 30px 50px rgba(0, 0, 0, 0.2);
        border-color: rgba(255, 255, 255, 0.4);
        background: linear-gradient(135deg, rgba(255, 255, 255, 0.2) 0%, rgba(255, 255, 255, 0.08) 100%);
    }
    .tava-3d-wrapper:hover .tava-3d-img-box {
        transform: translateZ(70px) scale(1.02);
        box-shadow: -15px 25px 40px rgba(0, 0, 0, 0.35);
    }
    .tava-3d-wrapper:hover .tava-3d-img-box img {
        transform: scale(1.05); /* Zoom ảnh nhẹ */
    }
    .tava-btn-interactive:hover {
        transform: translateZ(120px) scale(1.1); /* Nút nảy lên khi hover */
        background-color: #ffffff;
        color: #0f172a;
    }
}
</style>
<?php endif; // end: chỉ in CSS 1 lần ?>

<div class="tava-3d-wrapper group">
    <article class="tava-3d-glass <?php echo esc_attr($card_direction); ?>">
        
        <a href="<?php echo esc_url($permalink); ?>" class="tava-global-overlay" aria-label="<?php echo esc_attr($title); ?>"></a>

        <div class="tava-3d-img-box <?php echo esc_attr($img_width); ?>">
            <?php if ( has_post_thumbnail( $post_id ) ) : 
                echo get_the_post_thumbnail( $post_id, ($variant === 'big') ? 'large' : 'medium', ['class' => 'w-full h-full object-cover'] );
            else : ?>
                <img src="<?php echo esc_url($fallback_img); ?>" alt="<?php echo esc_attr($title); ?>" loading="lazy">
            <?php endif; ?>
            
            <div class="tava-tech-node">
                <svg viewBox="0 0 24 24"><path d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
            </div>
        </div>

        <div class="tava-3d-content <?php echo esc_attr($content_width); ?>">
            
            <span class="inline-block w-max px-3 py-1.5 bg-white/10 backdrop-blur-md border border-white/30 rounded-full text-[10px] font-extrabold text-white uppercase tracking-widest mb-4 shadow-sm">
                <?php echo esc_html($category_label); ?>
            </span>
            
            <h3 class="font-bold text-white mb-3 <?php echo esc_attr($title_size); ?> group-hover:text-blue-100 transition-colors duration-300">
                <?php echo esc_html($title); ?>
            </h3>

            <?php if ( $show_excerpt && $excerpt ) : ?>
                <p class="tava-3d-excerpt <?php echo esc_attr($excerpt_clamp); ?>">
                    <?php echo esc_html( wp_trim_words( $excerpt, $excerpt_words, '...' ) ); ?>
                </p>
            <?php endif; ?>

            <div class="tava-3d-footer">
                
                <div class="flex items-center gap-3">
                    <button class="tava-btn-interactive w-9 h-9 rounded-full bg-white/10 border border-white/30 flex items-center justify-center text-white transition-all duration-300 shadow-md" aria-label="Yêu thích">
                        <svg width="15" height="15" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/></svg>
                    </button>
                    <span class="text-[12px] font-semibold text-white/60 tracking-wider"><?php echo esc_html($date); ?></span>
                </div>
                
                <span class="flex items-center gap-1.5 text-[12px] md:text-[13px] font-bold text-white uppercase tracking-widest group-hover:translate-x-1 transition-transform duration-300">
                    <?php echo esc_html($cta_text); ?>
                    <svg width="16" height="16" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" viewBox="0 0 24 24"><path d="m9 5 7 7-7 7"></path></svg>
                </span>

            </div>
        </div>

    </article>
</div>