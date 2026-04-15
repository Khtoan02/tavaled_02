<?php
/**
 * Template Name: Trang chủ
 */
get_header(); ?>
    <main>

        <!-- ================= SECTION 1: HERO VIDEO BACKGROUND ================= -->
        <section class="hero-v2" id="hero" aria-label="Hero TavaLED">
            <!-- Background particle canvas -->
            <canvas class="hero-v2__bg-canvas" id="bgCanvas" aria-hidden="true"></canvas>
            <div class="hero-v2__depth" aria-hidden="true"></div>

            <!-- ── LEFT CONTENT (30%) ── -->
            <div class="hero-v2__left">

                <!-- Eyebrow tagline -->
                <div class="hero-v2__eyebrow" aria-hidden="true">
                    <span class="hero-v2__eyebrow-dot"></span>
                    Giải Pháp Hình Ảnh & Âm Thanh Toàn Diện
                </div>

                <h1 class="hero-v2__h1">
                    <span class="h1-line1">TAVALED:</span>
                    <span class="h1-line2">THI CÔNG TRỌN GÓI</span>
                    <span class="h1-line3">Màn Hình LED, Âm Thanh &amp; Ánh Sáng</span>
                </h1>

                <h2 class="hero-v2__desc">
                    Cung cấp giải pháp thiết bị sân khấu, sự kiện và không gian thương mại.
                    Tư vấn thiết kế và lắp đặt chuyên nghiệp, phủ sóng toàn quốc.
                </h2>

                <div class="hero-v2__ctas">
                    <a href="#products" class="hero-v2-btn hero-v2-btn--primary interactive">
                        Nhận báo giá miễn phí
                        <svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true"><path d="M2 12L12 2M12 2H6M12 2v6"/></svg>
                    </a>
                    <a href="#projects" class="hero-v2-btn hero-v2-btn--ghost interactive">
                        Xem dự án thực tế
                    </a>
                </div>
            </div>

            <!-- ── RIGHT: FULL-HEIGHT IMAGE SLIDER (70%) ── -->
            <div class="hero-v2__right" aria-hidden="true">

                <!-- Image slider -->
                <div class="hero-slider" id="heroSlider">
                    <div class="hero-slide hero-slide--active">
                        <img src="https://tavaled.vn/wp-content/uploads/2026/04/A_professional_wide-angle_202604110034.jpg" alt="Sân khấu sự kiện LED TavaLED" loading="eager">
                    </div>
                    <div class="hero-slide">
                        <img src="https://tavaled.vn/wp-content/uploads/2026/04/A_professional_wide-angle_202604110035-TavaLED.jpg" alt="Màn hình LED hội trường TavaLED" loading="lazy">
                    </div>
                    <div class="hero-slide">
                        <img src="https://tavaled.vn/wp-content/uploads/2026/04/A_professional_wide-angle_202604110035.jpg" alt="Hệ thống LED âm thanh ánh sáng" loading="lazy">
                    </div>
                    <div class="hero-slide">
                        <img src="https://tavaled.vn/wp-content/uploads/2026/04/Mot_buc_anh_202604110046-1-TavaLED.jpg" alt="Thi công màn hình LED chuyên nghiệp" loading="lazy">
                    </div>
                    <div class="hero-slide">
                        <img src="https://tavaled.vn/wp-content/uploads/2026/04/Mot_buc_anh_202604110046-TavaLED.jpg" alt="LED sân khấu ca nhạc TavaLED" loading="lazy">
                    </div>
                    <div class="hero-slide">
                        <img src="https://tavaled.vn/wp-content/uploads/2026/04/Mot_buc_anh_202604110047-1-TavaLED.jpg" alt="Lắp đặt màn hình LED toàn quốc" loading="lazy">
                    </div>
                    <div class="hero-slide">
                        <img src="https://tavaled.vn/wp-content/uploads/2026/04/Mot_buc_anh_202604110047-TavaLED.jpg" alt="Giải pháp LED âm thanh ánh sáng TavaLED" loading="lazy">
                    </div>
                    <div class="hero-slide">
                        <img src="https://tavaled.vn/wp-content/uploads/2026/04/Man-hinh-LED-la-thiet-bi-hien-thi-khong-vien-kich-thuoc-lon-TavaLED.jpg" alt="Màn hình LED chuyên nghiệp TavaLED" loading="lazy">
                    </div>
                    <div class="hero-slide">
                        <img src="https://tdclassic.vn/wp-content/uploads/2026/01/tdclassic_cover-scaled.webp" alt="Hệ thống âm thanh ánh sáng sân khấu" loading="lazy">
                    </div>

                    <!-- Dot navigation -->
                    <div class="hero-slider__dots" id="heroSliderDots">
                    <button class="hero-slider__dot hero-slider__dot--active" aria-label="Ảnh 1"></button>
                    <button class="hero-slider__dot" aria-label="Ảnh 2"></button>
                    <button class="hero-slider__dot" aria-label="Ảnh 3"></button>
                    <button class="hero-slider__dot" aria-label="Ảnh 4"></button>
                    <button class="hero-slider__dot" aria-label="Ảnh 5"></button>
                    <button class="hero-slider__dot" aria-label="Ảnh 6"></button>
                    <button class="hero-slider__dot" aria-label="Ảnh 7"></button>
                    <button class="hero-slider__dot" aria-label="Ảnh 8"></button>
                    <button class="hero-slider__dot" aria-label="Ảnh 9"></button>
                    </div>
                </div>

                <!-- Floating badges -->
                <div class="spec-tag spec-tag--1">
                    <div class="spec-tag__icon-row">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>
                        <div class="spec-tag__label">Độ phân giải cao</div>
                    </div>
                    <div class="spec-tag__val">P<em>2.5</em> – P<em>10</em></div>
                </div>
                <div class="spec-tag spec-tag--2">
                    <div class="spec-tag__icon-row">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M11 5L6 9H2v6h4l5 4V5z"/><path d="M15.54 8.46a5 5 0 0 1 0 7.07"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14"/></svg>
                        <div class="spec-tag__label">Âm thanh</div>
                    </div>
                    <div class="spec-tag__val">Chuẩn <em>Quốc tế</em></div>
                </div>
                <div class="spec-tag spec-tag--3">
                    <div class="spec-tag__icon-row">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                        <div class="spec-tag__label">Bảo hành chính hãng</div>
                    </div>
                    <div class="spec-tag__val"><em>3</em> năm</div>
                </div>
            </div>

            <!-- Scroll indicator -->
            <div class="hero-v2__scroll" aria-hidden="true">
                <div class="scroll-line"></div>
                <span>Cuộn xuống</span>
            </div>
        </section>

        <!-- ================= SECTION 3: SẢN PHẨM ================= -->
        <section id="products" class="py-24 bg-[#f8fafc]">
            <div class="container mx-auto px-6 lg:px-12 max-w-[1600px]">
                <div class="main-tava-heading reveal-up">
                    <div class="main-tava-heading__eyebrow">Catalogue Toàn Diện</div>
                    <h3 class="main-tava-heading__title">Thiết Bị Cốt Lõi</h3>
                    <p class="main-tava-heading__desc">TavaLLS tự hào là nhà phân phối chiến lược của các thương hiệu phần cứng hiển thị và âm thanh ánh sáng hàng đầu thế giới.</p>
                </div>

            <!-- SECTION: MÀN HÌNH LED (scroll-mt-24 để cuộn không bị lấp bởi header) -->
            <div id="product-led" class="container mx-auto px-6 lg:px-12 max-w-[1600px] pt-8 pb-24 scroll-mt-24">
                <!-- Sub-section header: LED -->
                <div class="tava-heading">
                    <div class="tava-heading__left">
                        <div class="tava-heading__eyebrow">Hiển Thị Đỉnh Cao</div>
                        <h3 class="tava-heading__title">Màn Hình LED &amp; Xử Lý</h3>
                    </div>
                    <a href="<?php echo home_url('/tat-ca-san-pham/'); ?>" class="tava-heading__link">
                        <span class="tava-heading__link-text">Xem toàn bộ kho LED</span>
                        <span class="tava-heading__link-icon"><i class="ph-bold ph-arrow-right"></i></span>
                    </a>
                </div>
                <div class="prod-slider-wrap">
                    <div class="prod-grid reveal-up" id="grid-led">
                    <?php
                    $query_led = new WP_Query([
                        'post_type'      => 'tava_product',
                        'posts_per_page' => -1, // fetch all rồi sort
                        'orderby'        => ['menu_order' => 'ASC', 'date' => 'DESC'],
                        'tax_query'      => [[
                            'taxonomy' => 'product_cat',
                            'field'    => 'slug',
                            'terms'    => ['man-hinh-led'],
                            'operator' => 'IN',
                        ]]
                    ]);
                    // Ưu tiên SP có hình thật lên đầu
                    $led_posts = $query_led->posts;
                    usort($led_posts, function($a, $b) {
                        $a_img = get_post_meta($a->ID, '_product_img', true) ?: get_the_post_thumbnail_url($a->ID, 'medium');
                        $b_img = get_post_meta($b->ID, '_product_img', true) ?: get_the_post_thumbnail_url($b->ID, 'medium');
                        return ($b_img ? 1 : 0) - ($a_img ? 1 : 0);
                    });
                    $led_posts = array_slice($led_posts, 0, 4);
                    if (!empty($led_posts)) :
                        foreach ($led_posts as $post) :
                            setup_postdata($post);
                            get_template_part('app/Views/components/product-card');
                        endforeach;
                        wp_reset_postdata();
                    else :
                        echo '<p class="text-gray-500 col-span-full">Đang cập nhật sản phẩm.</p>';
                    endif;
                    ?>
                    </div>
                    <div class="prod-dots" id="dots-led"></div>
                </div>
            </div>

            <!-- SECTION: ÂM THANH -->
            <div id="product-audio" class="container mx-auto px-6 lg:px-12 max-w-[1600px] mt-24 pt-16 lg:mt-32 lg:pt-24 pb-24 scroll-mt-24">
                <!-- Sub-section header: Âm Thanh -->
                <div class="tava-heading">
                    <div class="tava-heading__left">
                        <div class="tava-heading__eyebrow">Âm Thanh Sân Khấu</div>
                        <h3 class="tava-heading__title">Hệ Thống Âm Thanh</h3>
                    </div>
                    <a href="<?php echo home_url('/tat-ca-san-pham/'); ?>" class="tava-heading__link">
                        <span class="tava-heading__link-text">Kho thiết bị âm thanh</span>
                        <span class="tava-heading__link-icon"><i class="ph-bold ph-arrow-right"></i></span>
                    </a>
                </div>
                <div class="prod-slider-wrap">
                    <div class="prod-grid reveal-up" id="grid-audio">
                    <?php
                    $query_audio = new WP_Query([
                        'post_type'      => 'tava_product',
                        'posts_per_page' => -1,
                        'orderby'        => ['menu_order' => 'ASC', 'date' => 'DESC'],
                        'tax_query'      => [[
                            'taxonomy' => 'product_cat',
                            'field'    => 'slug',
                            'terms'    => ['thiet-bi-am-thanh', 'am-thanh'],
                            'operator' => 'IN',
                        ]]
                    ]);
                    $audio_posts = $query_audio->posts;
                    usort($audio_posts, function($a, $b) {
                        $a_img = get_post_meta($a->ID, '_product_img', true) ?: get_the_post_thumbnail_url($a->ID, 'medium');
                        $b_img = get_post_meta($b->ID, '_product_img', true) ?: get_the_post_thumbnail_url($b->ID, 'medium');
                        return ($b_img ? 1 : 0) - ($a_img ? 1 : 0);
                    });
                    $audio_posts = array_slice($audio_posts, 0, 4);
                    if (!empty($audio_posts)) :
                        foreach ($audio_posts as $post) :
                            setup_postdata($post);
                            get_template_part('app/Views/components/product-card');
                        endforeach;
                        wp_reset_postdata();
                    else :
                        echo '<p class="text-gray-500 col-span-full">Đang cập nhật sản phẩm.</p>';
                    endif;
                    ?>
                    </div>
                    <div class="prod-dots" id="dots-audio"></div>
                </div>
            </div>

            <!-- SECTION: ÁNH SÁNG -->
            <div id="product-light" class="container mx-auto px-6 lg:px-12 max-w-[1600px] mt-24 pt-16 lg:mt-32 lg:pt-24 pb-24 scroll-mt-24">
                <!-- Sub-section header: Ánh Sáng -->
                <div class="tava-heading">
                    <div class="tava-heading__left">
                        <div class="tava-heading__eyebrow">Hiệu Ứng Nghệ Thuật</div>
                        <h3 class="tava-heading__title">Hệ Thống Ánh Sáng</h3>
                    </div>
                    <a href="<?php echo home_url('/tat-ca-san-pham/'); ?>" class="tava-heading__link">
                        <span class="tava-heading__link-text">Kho thiết bị ánh sáng</span>
                        <span class="tava-heading__link-icon"><i class="ph-bold ph-arrow-right"></i></span>
                    </a>
                </div>
                <div class="prod-slider-wrap">
                    <div class="prod-grid reveal-up" id="grid-light">
                    <?php
                    $query_light = new WP_Query([
                        'post_type'      => 'tava_product',
                        'posts_per_page' => -1,
                        'orderby'        => ['menu_order' => 'ASC', 'date' => 'DESC'],
                        'tax_query'      => [[
                            'taxonomy' => 'product_cat',
                            'field'    => 'slug',
                            'terms'    => ['thiet-bi-anh-sang', 'anh-sang'],
                            'operator' => 'IN',
                        ]]
                    ]);
                    $light_posts = $query_light->posts;
                    usort($light_posts, function($a, $b) {
                        $a_img = get_post_meta($a->ID, '_product_img', true) ?: get_the_post_thumbnail_url($a->ID, 'medium');
                        $b_img = get_post_meta($b->ID, '_product_img', true) ?: get_the_post_thumbnail_url($b->ID, 'medium');
                        return ($b_img ? 1 : 0) - ($a_img ? 1 : 0);
                    });
                    $light_posts = array_slice($light_posts, 0, 4);
                    if (!empty($light_posts)) :
                        foreach ($light_posts as $post) :
                            setup_postdata($post);
                            get_template_part('app/Views/components/product-card');
                        endforeach;
                        wp_reset_postdata();
                    else :
                        echo '<p class="text-gray-500 col-span-full">Đang cập nhật sản phẩm.</p>';
                    endif;
                    ?>
                    </div>
                    <div class="prod-dots" id="dots-light"></div>
                </div>

        
            </div>
            
        </section>

        <!-- ================= SECTION 4: THƯ VIỆN DỰ ÁN (FULL WIDTH - ĐỒ SỘ NHẤT) ================= -->
        <section id="projects" class="py-24 md:py-32 bg-brand-navy reveal-up">
            <div class="container mx-auto px-6 lg:px-12 max-w-[1600px]">
                <div class="main-tava-heading main-tava-heading--light">
                    <div class="main-tava-heading__eyebrow">Visual Portfolio</div>
                    <h3 class="main-tava-heading__title">Dấu Ấn <em>TavaLLS</em></h3>
                    <p class="main-tava-heading__desc">Không gì chứng minh năng lực tốt hơn những dự án thực tế. Chúng tôi định nghĩa lại không gian bằng ánh sáng và âm thanh đỉnh cao.</p>
                </div>
            </div>

            <div class="w-full relative gallery-wrap bg-[#1c2857]" id="homeGalleryWrap">
                <!-- GRID 1: Bức tường ảnh tĩnh (Masonry Grid đảm bảo luôn khít dòng) -->
                <div class="gallery-grid reveal-up delay-1" id="homeGalleryGrid">
                    <?php
                    $project_ids_str = get_option('tavaled_home_projects');
                    $project_ids = !empty($project_ids_str) ? explode(',', $project_ids_str) : [];
                    
                    if (!empty($project_ids)) {
                        foreach ($project_ids as $id) {
                            $img_src = wp_get_attachment_image_url($id, 'full');
                            
                            // Lấy thông tin từ bộ quản lý gallery custom thay vì title/caption mặc định
                            $title   = get_post_meta($id, '_tavaled_project_name', true) ?: get_the_title($id); 
                            $caption = get_post_meta($id, '_tavaled_project_desc', true) ?: wp_get_attachment_caption($id); 
                            $solution = get_post_meta($id, '_tavaled_project_solution', true);

                            // Nếu không có ảnh thì bỏ qua
                            if (!$img_src) continue;
                    ?>
                    <div class="g-item">
                        <img src="<?php echo esc_url($img_src); ?>" alt="" loading="lazy">
                    </div>
                    <?php 
                        }
                    } else {
                        // Demo content nếu admin chưa setup
                    ?>
                        <div class="g-item">
 <img src="https://tavaled.vn/wp-content/uploads/2026/03/0031_TavaLED_Hinh_Anh.jpg" alt="EDM">
                        </div>
                        <div class="g-item">
 <img src="https://tavaled.vn/wp-content/uploads/2026/03/0032_TavaLED_Hinh_Anh.jpg" alt="Club">
                        </div>
                        <div class="g-item">
 <img src="https://tavaled.vn/wp-content/uploads/2026/03/0033_TavaLED_Hinh_Anh.jpg" alt="Laser">
                        </div>
                        <div class="g-item">
 <img src="https://tavaled.vn/wp-content/uploads/2026/03/0034_TavaLED_Hinh_Anh.jpg" alt="Concert">
                        </div>
                        <div class="g-item">
 <img src="https://tavaled.vn/wp-content/uploads/2026/03/0035_TavaLED_Hinh_Anh.jpg" alt="Stage">
                        </div>
                    <?php } ?>
                </div>

                <!-- OVERLAY VỚI HIỆU ỨNG GRADIENT & NÚT SHOW MORE -->
                <div class="gallery-overlay" id="homeGalleryOverlay">
                    <button class="btn-outline gallery-overlay-btn interactive" id="btnShowMoreGallery">
                        Chiêm ngưỡng trọn vẹn các dự án <i class="ph-bold ph-caret-down"></i>
                    </button>
                </div>
            </div>

           
        </section>

        <!-- ================= SECTION 5: BLOG (EDITORIAL STYLE) ================= -->
        <section id="editorial" class="py-32 bg-[#1c2857] border-t border-white/5">
            
            <div class="container mx-auto px-6 lg:px-16 max-w-[1600px]">

                <?php get_template_part('template-parts/blog-sections'); ?>

            </div>
        </section>

        <!-- ================= SECTION 6: FAQ (EDITORIAL SPLIT-SCREEN) ================= -->
        <section class="py-32 bg-[#0a0f1a] border-t border-white/5 relative overflow-hidden">
            <!-- Glow background -->
            <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-brand-orange/5 filter blur-[120px] rounded-full pointer-events-none"></div>
            
            <div class="container mx-auto px-6 lg:px-12 max-w-[1600px] relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-24 items-start">
                    
                    <!-- Left Column: Sticky Intro -->
                    <div class="lg:col-span-5 reveal-up lg:sticky lg:top-32">
                        <div class="flex items-center gap-3 text-brand-orange font-bold text-[10px] tracking-[0.2em] uppercase mb-4">
                            <span class="w-8 h-0.5 bg-brand-orange"></span> Hỗ trợ 24/7
                        </div>
                        <h2 class="font-serif font-black text-4xl md:text-5xl text-white mb-6 leading-tight">Giải Đáp<br>Mọi Thắc Mắc</h2>
                        <p class="text-white/50 text-base leading-relaxed mb-8">TavaLLS luôn sẵn sàng đồng hành cùng bạn. Dưới đây là những câu hỏi thường gặp nhất trong quá trình tư vấn và triển khai các dự án công nghệ Nghe - Nhìn quy mô lớn.</p>

                        <!-- Tech Image Support -->
                        <div class="relative overflow-hidden mb-8 aspect-video border border-white/10 group interactive">
 <img src="https://tavaled.vn/wp-content/uploads/2026/03/0036_TavaLED_Hinh_Anh.jpg" alt="Hỗ trợ kỹ thuật" class="w-full h-full object-cover group-hover:scale-105 transition-all duration-700">
                            <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-[#1c2857] to-transparent p-6">
                                <p class="text-white font-bold tracking-wide uppercase text-sm">Trung Tâm Hỗ Trợ Kỹ Thuật</p>
                            </div>
                        </div>

                        <a href="tel:0936 543 389" class="btn-outline interactive w-full">Trò chuyện trực tiếp cùng chuyên gia</a>
                    </div>

                    <!-- Right Column: Premium Accordion -->
                    <div class="lg:col-span-7 space-y-4 reveal-up delay-1 mt-8 lg:mt-0">
                        
                        <div class="faq-item border-b border-white/10 bg-[#1c2857] group">
                            <button class="faq-btn w-full text-left py-8 flex justify-between items-center focus:outline-none interactive">
                                <div class="flex items-center gap-6 pr-4">
                                    <span class="font-mono text-xl text-white/20 font-bold group-hover:text-brand-orange transition-colors">01</span>
                                    <span class="text-lg font-medium text-white group-hover:text-brand-orange transition-colors">TavaLLS có nhận thi công dự án tại các tỉnh thành xa không?</span>
                                </div>
                                <div class="faq-icon w-10 h-10 border border-white/20 rounded-full flex items-center justify-center flex-shrink-0 transition-all duration-300 group-hover:border-brand-orange group-hover:bg-brand-orange/10"><i class="ph-bold ph-plus text-white group-hover:text-brand-orange transition-colors"></i></div>
                            </button>
                            <div class="faq-answer">
                                <div class="faq-answer-inner">
                                    <div class="pb-8 text-white/60 text-base leading-relaxed pl-14 pr-4">
                                        Có. TavaLLS tự hào với hệ thống Logistics mạnh mẽ và đội ngũ kỹ thuật tinh nhuệ, chúng tôi nhận tư vấn, thi công, lắp đặt và bảo hành các dự án Màn hình LED, Âm thanh, Ánh sáng trên toàn bộ 64 tỉnh thành tại Việt Nam với tiến độ cực kỳ nhanh chóng.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="faq-item border-b border-white/10 bg-[#1c2857] group">
                            <button class="faq-btn w-full text-left py-8 flex justify-between items-center focus:outline-none interactive">
                                <div class="flex items-center gap-6 pr-4">
                                    <span class="font-mono text-xl text-white/20 font-bold group-hover:text-brand-orange transition-colors">02</span>
                                    <span class="text-lg font-medium text-white group-hover:text-brand-orange transition-colors">Chính sách bảo hành và hỗ trợ kỹ thuật như thế nào?</span>
                                </div>
                                <div class="faq-icon w-10 h-10 border border-white/20 rounded-full flex items-center justify-center flex-shrink-0 transition-all duration-300 group-hover:border-brand-orange group-hover:bg-brand-orange/10"><i class="ph-bold ph-plus text-white group-hover:text-brand-orange transition-colors"></i></div>
                            </button>
                            <div class="faq-answer">
                                <div class="faq-answer-inner">
                                    <div class="pb-8 text-white/60 text-base leading-relaxed pl-14 pr-4">
                                        Toàn bộ thiết bị do TavaLLS phân phối đều là hàng chính hãng 100%, bảo hành từ 12 đến 36 tháng tùy theo quy định của nhà sản xuất. Hỗ trợ kỹ thuật trực tuyến 24/7. Chúng tôi cam kết có mặt xử lý sự cố tận nơi trong 4 giờ (tại HN/HCM) và tối đa 24 giờ (tại các tỉnh khác).
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="faq-item border-b border-white/10 bg-[#1c2857] group">
                            <button class="faq-btn w-full text-left py-8 flex justify-between items-center focus:outline-none interactive">
                                <div class="flex items-center gap-6 pr-4">
                                    <span class="font-mono text-xl text-white/20 font-bold group-hover:text-brand-orange transition-colors">03</span>
                                    <span class="text-lg font-medium text-white group-hover:text-brand-orange transition-colors">Quy trình tư vấn thiết kế cho dự án mới ra sao?</span>
                                </div>
                                <div class="faq-icon w-10 h-10 border border-white/20 rounded-full flex items-center justify-center flex-shrink-0 transition-all duration-300 group-hover:border-brand-orange group-hover:bg-brand-orange/10"><i class="ph-bold ph-plus text-white group-hover:text-brand-orange transition-colors"></i></div>
                            </button>
                            <div class="faq-answer">
                                <div class="faq-answer-inner">
                                    <div class="pb-8 text-white/60 text-base leading-relaxed pl-14 pr-4">
                                        Quy trình chuẩn gồm 5 bước: (1) Khảo sát thực tế & Lắng nghe ý tưởng -> (2) Lên bản vẽ thiết kế 3D Visual & Báo giá chi tiết -> (3) Ký kết hợp đồng -> (4) Tiến hành thi công lắp đặt -> (5) Bàn giao nghiệm thu, hướng dẫn vận hành kỹ lưỡng cho nhân sự của khách hàng.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="faq-item border-b border-white/10 bg-[#1c2857] group">
                            <button class="faq-btn w-full text-left py-8 flex justify-between items-center focus:outline-none interactive">
                                <div class="flex items-center gap-6 pr-4">
                                    <span class="font-mono text-xl text-white/20 font-bold group-hover:text-brand-orange transition-colors">04</span>
                                    <span class="text-lg font-medium text-white group-hover:text-brand-orange transition-colors">Chi phí đầu tư dự kiến cho Màn hình LED là bao nhiêu?</span>
                                </div>
                                <div class="faq-icon w-10 h-10 border border-white/20 rounded-full flex items-center justify-center flex-shrink-0 transition-all duration-300 group-hover:border-brand-orange group-hover:bg-brand-orange/10"><i class="ph-bold ph-plus text-white group-hover:text-brand-orange transition-colors"></i></div>
                            </button>
                            <div class="faq-answer">
                                <div class="faq-answer-inner">
                                    <div class="pb-8 text-white/60 text-base leading-relaxed pl-14 pr-4">
                                        Chi phí đầu tư Màn hình LED phụ thuộc vào 3 yếu tố chính: Độ phân giải (Pixel Pitch - P2, P3, P4...), Tổng diện tích lắp đặt, và Vị trí (Trong nhà hay Ngoài trời). Để có một bảng báo giá chính xác và tối ưu nhất, chuyên gia của chúng tôi sẽ khảo sát thực tế và đưa ra nhiều Options cấu hình phù hợp với ngân sách của bạn.
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="faq-item border-b border-white/10 bg-[#1c2857] group">
                            <button class="faq-btn w-full text-left py-8 flex justify-between items-center focus:outline-none interactive">
                                <div class="flex items-center gap-6 pr-4">
                                    <span class="font-mono text-xl text-white/20 font-bold group-hover:text-brand-orange transition-colors">05</span>
                                    <span class="text-lg font-medium text-white group-hover:text-brand-orange transition-colors">TavaLLS có cung cấp dịch vụ cho thuê thiết bị sự kiện không?</span>
                                </div>
                                <div class="faq-icon w-10 h-10 border border-white/20 rounded-full flex items-center justify-center flex-shrink-0 transition-all duration-300 group-hover:border-brand-orange group-hover:bg-brand-orange/10"><i class="ph-bold ph-plus text-white group-hover:text-brand-orange transition-colors"></i></div>
                            </button>
                            <div class="faq-answer">
                                <div class="faq-answer-inner">
                                    <div class="pb-8 text-white/60 text-base leading-relaxed pl-14 pr-4">
                                        Chắc chắn rồi. Bên cạnh việc phân phối và thi công trọn gói vĩnh viễn, TavaLLS sở hữu kho thiết bị Rental khổng lồ (Cabin LED nhôm đúc, Loa Line Array, Đèn Moving Head) luôn sẵn sàng phục vụ cho các đại nhạc hội, triển lãm, lễ ra mắt sản phẩm với thời gian thuê linh hoạt và đội ngũ vận hành chuyên nghiệp đi kèm.
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <!-- ================= SECTION 7: CTA ================= -->
        <section class="relative py-40 overflow-hidden bg-[#1c2857] flex items-center justify-center border-t border-brand-orange">
 <img src="https://tavaled.vn/wp-content/uploads/2026/03/0037_TavaLED_Hinh_Anh.jpg" alt="Background" class="absolute inset-0 w-full h-full object-cover" loading="lazy">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_70%_80%_at_50%_50%,rgba(240,90,37,0.15)_0%,rgba(2,6,23,0.9)_70%)]"></div>
            
            <div class="container mx-auto px-4 relative z-10 text-center reveal-up">
                <h2 class="font-serif font-black text-5xl md:text-7xl text-white mb-6 tracking-tight">
                    Bắt đầu dự án của bạn<br><em class="text-brand-orange italic font-light">— ngay hôm nay</em>
                </h2>
                <p class="text-white/60 text-lg max-w-2xl mx-auto mb-10">Liên hệ với chuyên gia của TavaLLS để nhận bản vẽ giải pháp 3D và báo giá chi tiết hoàn toàn miễn phí.</p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="tel:0936 543 389" class="btn-primary interactive">
                        Gọi Hotline 0936 543 389
                    </a>
                    <a href="mailto:tuyen.tavaco@gmail.com" class="btn-outline interactive">
                        Liên hệ tư vấn
                    </a>
                </div>
            </div>
        </section>

    </main>


    

<?php get_footer(); ?>