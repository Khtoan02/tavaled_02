<?php
/**
 * Template Name: Trang chủ
 */
get_header(); ?>
<main>
    <!-- ================= SECTION 1: HERO CINEMATIC CANVAS ================= -->
    <section class="hero-v2" id="hero" aria-label="Giới thiệu Tava">
        <!-- Background particle canvas -->
        <canvas class="hero-v2__bg-canvas" id="bgCanvas" aria-hidden="true"></canvas>
        <div class="hero-v2__depth" aria-hidden="true"></div>

        <!-- ── EARTH BACKGROUND SVG ── -->
        <div class="hero-v2__earth" aria-hidden="true">
            <img src="<?php echo esc_url(TAVALED_URI); ?>/assets/images/earth.svg" alt="Earth Globe Map">
        </div>

        <!-- ── FULL-BLEED BACKGROUND IMAGE SLIDER ── -->
        <div class="hero-v2__right">
            <div class="hero-slider" id="heroSlider" role="region" aria-roledescription="carousel" aria-label="Dự án tiêu biểu của TavaLLS">
                <?php
                $hero_ids_str = get_option('tavaled_home_hero_slides');
                $hero_ids = !empty($hero_ids_str) ? explode(',', $hero_ids_str) : [];
                $hero_slides = [];

                if (!empty($hero_ids)) {
                    foreach ($hero_ids as $id) {
                        $img_src = wp_get_attachment_image_url($id, 'full');
                        if (!$img_src) continue;
                        $alt = get_post_meta($id, '_wp_attachment_image_alt', true) ?: get_the_title($id);
                        $hero_slides[] = [
                            'src' => $img_src,
                            'alt' => $alt,
                        ];
                    }
                }

                if (empty($hero_slides)) {
                    $hero_slides = [
                        ['src' => 'https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?w=1920', 'alt' => 'Màn hình LED thi công TavaLLS'],
                        ['src' => 'https://images.unsplash.com/photo-1431540015161-0bf868a2d407?w=1920', 'alt' => 'Màn hình LED hội trường TavaLLS'],
                        ['src' => 'https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=1920', 'alt' => 'Thi công màn hình LED ngoài trời'],
                        ['src' => 'https://images.unsplash.com/photo-1598488035139-bdbb2231ce04?w=1920', 'alt' => 'Hệ thống âm thanh ánh sáng hội trường'],
                    ];
                }

                foreach ($hero_slides as $index => $slide) {
                    $is_first = $index === 0;
                    ?>
                    <div class="hero-slide<?php echo $is_first ? ' hero-slide--active' : ''; ?>"
                        role="group"
                        aria-roledescription="slide"
                        aria-label="<?php echo esc_attr(($index + 1) . ' / ' . count($hero_slides)); ?>"
                        aria-hidden="<?php echo $is_first ? 'false' : 'true'; ?>">
                        <img src="<?php echo esc_url($slide['src']); ?>"
                            alt="<?php echo esc_attr($slide['alt']); ?>"
                            <?php echo $is_first ? 'loading="eager" fetchpriority="high"' : 'loading="lazy"'; ?>>
                    </div>
                    <?php
                }
                ?>

                <!-- Dot navigation -->
                <div class="hero-slider__dots" id="heroSliderDots">
                    <?php
                    $count = count($hero_slides);
                    for ($i = 0; $i < $count; $i++) {
                        $active_class = ($i === 0) ? ' hero-slider__dot--active' : '';
                        $aria_current = ($i === 0) ? ' aria-current="true"' : '';
                        echo '<button type="button" class="hero-slider__dot' . $active_class . '" aria-label="Xem slide ' . ($i + 1) . '"' . $aria_current . '></button>';
                    }
                    ?>
                </div>
            </div>
        </div>

        <!-- ── CINEMATIC OVERLAY GRADIENT ── -->
        <div class="hero-v2__overlay" aria-hidden="true"></div>

        <!-- ── HERO CONTENT WRAPPER (Flexbox Flow - No Overlap) ── -->
        <div class="hero-v2__content-wrap">
            <!-- ── HERO MAIN CONTENT ── -->
            <div class="hero-v2__main">
                <!-- Eyebrow Tagline Badge -->
                <div class="hero-v2__eyebrow">
                    <span class="hero-v2__eyebrow-dot"></span>
                    CÔNG NGHỆ TRẢI NGHIỆM KHÔNG GIAN TOÀN DIỆN
                </div>

                <!-- Headline H1 -->
                <h1 class="hero-v2__h1">
                    <span class="h1-main">
                        <strong class="hero-v2__brand">TavaLED</strong>
                        <span class="hero-v2__dash" aria-hidden="true">—</span>
                        <span class="hero-v2__ecosystem">Hệ sinh thái</span>
                    </span>
                    <span class="h1-accent">Màn hình LED trọn gói</span>
                    <span class="h1-detail">Âm thanh &amp; Ánh sáng</span>
                </h1>

                <!-- Subheadline / Giới thiệu Doanh nghiệp & Triết lý hoạt động (TLDR Box) -->
                <div class="hero-v2__tldr-box">
                    <p>
                        <strong>TavaLED</strong> kết nối công nghệ hiển thị, kiến trúc ánh sáng và hệ thống âm thanh thành một trải nghiệm đồng bộ — từ khảo sát, thiết kế đến thi công và vận hành.
                    </p>
                </div>

                <!-- Call to Action Buttons -->
                <div class="hero-v2__ctas">
                    <a href="tel:0934298181" class="hero-v2-btn hero-v2-btn--primary interactive">
                        <span>Tư vấn dự án miễn phí</span>
                        <svg viewBox="0 0 14 14" fill="none" stroke="currentColor" stroke-width="2" class="w-3.5 h-3.5 ml-2">
                            <path d="M2 12L12 2M12 2H6M12 2v6" />
                        </svg>
                    </a>
                    <a href="#projects" class="hero-v2-btn hero-v2-btn--ghost interactive">
                        <i class="ph-fill ph-play-circle text-lg mr-2"></i>
                        <span>Xem dự án thực tế</span>
                    </a>
                </div>
            </div>

            <!-- ── FLOATING CORE VALUES & CAPABILITY BAR ── -->
            <div class="hero-v2__bar">
                <div class="hero-v2__bar-item">
                    <div class="bar-badge">L</div>
                    <div class="bar-info">
                        <strong class="bar-title">Lắng nghe</strong>
                        <span class="bar-desc">Nhu cầu &amp; ngân sách thực tế</span>
                    </div>
                </div>
                <div class="hero-v2__bar-item">
                    <div class="bar-badge">L</div>
                    <div class="bar-info">
                        <strong class="bar-title">Thấu hiểu</strong>
                        <span class="bar-desc">Khảo sát kỹ từng không gian</span>
                    </div>
                </div>
                <div class="hero-v2__bar-item">
                    <div class="bar-badge bar-badge--orange">S</div>
                    <div class="bar-info">
                        <strong class="bar-title">Giải pháp trọn vẹn</strong>
                        <span class="bar-desc">Thiết kế, thi công, vận hành</span>
                    </div>
                </div>
                <div class="hero-v2__bar-item bar-item--highlight">
                    <div class="bar-badge bar-badge--gold">
                        <i class="ph-fill ph-shield-check text-lg"></i>
                    </div>
                    <div class="bar-info">
                        <strong class="bar-title">Thiết bị chính hãng</strong>
                        <span class="bar-desc">CO/CQ • Bảo hành 24–36 tháng</span>
                    </div>
                </div>
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
            <!-- SECTION: MÀN HÌNH LED (scroll-mt-24 để cuộn không bị lấp bởi header) -->
            <div id="product-led" class="w-full pt-8 pb-24 scroll-mt-24">
                <!-- Sub-section header: LED -->
                <div class="tava-heading tava-heading--dark">
                    <span class="tava-heading__ghost" aria-hidden="true">Màn Hình LED</span>
                    <div class="tava-heading__left">
                        <div class="tava-heading__eyebrow">Hiển Thị Đỉnh Cao</div>
                        <h2 class="tava-heading__title">Hệ Thống <em>Màn Hình LED</em></h2>
                    </div>
                    <a href="<?php echo home_url('/tat-ca-san-pham/'); ?>" class="tava-heading__link relative z-20">
                        <span class="tava-heading__link-text">Xem kho thiết bị trình chiếu</span>
                        <span class="tava-heading__link-icon"><i class="ph-bold ph-arrow-right"></i></span>
                    </a>
                </div>
                <div class="prod-slider-wrap">
                    <div class="prod-grid reveal-up" id="grid-led">
                        <?php
                        $query_led = new WP_Query([
                            'post_type' => 'tava_product',
                            'posts_per_page' => -1, // fetch all rồi sort
                            'orderby' => ['menu_order' => 'ASC', 'date' => 'DESC'],
                            'tax_query' => [
                                [
                                    'taxonomy' => 'product_cat',
                                    'field' => 'slug',
                                    'terms' => ['man-hinh-led'],
                                    'operator' => 'IN',
                                ]
                            ]
                        ]);
                        // Ưu tiên SP có hình thật lên đầu
                        $led_posts = $query_led->posts;
                        usort($led_posts, function ($a, $b) {
                            $a_img = get_post_meta($a->ID, '_product_img', true) ?: get_the_post_thumbnail_url($a->ID, 'medium');
                            $b_img = get_post_meta($b->ID, '_product_img', true) ?: get_the_post_thumbnail_url($b->ID, 'medium');
                            return ($b_img ? 1 : 0) - ($a_img ? 1 : 0);
                        });
                        $led_posts = array_slice($led_posts, 0, 4);
                        if (!empty($led_posts)):
                            foreach ($led_posts as $post):
                                setup_postdata($post);
                                get_template_part('app/Views/components/product-card');
                            endforeach;
                            wp_reset_postdata();
                        else:
                            echo '<p class="text-gray-500 col-span-full">Đang cập nhật sản phẩm.</p>';
                        endif;
                        ?>
                    </div>
                    <div class="prod-dots" id="dots-led"></div>
                </div>
            </div>

            <!-- SECTION: ÂM THANH -->
            <div id="product-audio"
                class="w-full mt-24 pt-16 lg:mt-32 lg:pt-24 pb-24 scroll-mt-24">
                <!-- Sub-section header: Âm Thanh -->
                <div class="tava-heading tava-heading--dark border-t border-slate-200 pt-16 mt-8">
                    <span class="tava-heading__ghost" aria-hidden="true">Âm Thanh</span>
                    <div class="tava-heading__left">
                        <div class="tava-heading__eyebrow">Âm Thanh Sân Khấu</div>
                        <h2 class="tava-heading__title">Hệ Thống <em>Âm Thanh</em></h2>
                    </div>
                    <a href="<?php echo home_url('/tat-ca-san-pham/'); ?>" class="tava-heading__link relative z-20">
                        <span class="tava-heading__link-text">Kho thiết bị âm thanh</span>
                        <span class="tava-heading__link-icon"><i class="ph-bold ph-arrow-right"></i></span>
                    </a>
                </div>
                <div class="prod-slider-wrap">
                    <div class="prod-grid reveal-up" id="grid-audio">
                        <?php
                        $query_audio = new WP_Query([
                            'post_type' => 'tava_product',
                            'posts_per_page' => -1,
                            'orderby' => ['menu_order' => 'ASC', 'date' => 'DESC'],
                            'tax_query' => [
                                [
                                    'taxonomy' => 'product_cat',
                                    'field' => 'slug',
                                    'terms' => ['thiet-bi-am-thanh', 'am-thanh'],
                                    'operator' => 'IN',
                                ]
                            ]
                        ]);
                        $audio_posts = $query_audio->posts;
                        usort($audio_posts, function ($a, $b) {
                            $a_img = get_post_meta($a->ID, '_product_img', true) ?: get_the_post_thumbnail_url($a->ID, 'medium');
                            $b_img = get_post_meta($b->ID, '_product_img', true) ?: get_the_post_thumbnail_url($b->ID, 'medium');
                            return ($b_img ? 1 : 0) - ($a_img ? 1 : 0);
                        });
                        $audio_posts = array_slice($audio_posts, 0, 4);
                        if (!empty($audio_posts)):
                            foreach ($audio_posts as $post):
                                setup_postdata($post);
                                get_template_part('app/Views/components/product-card');
                            endforeach;
                            wp_reset_postdata();
                        else:
                            echo '<p class="text-gray-500 col-span-full">Đang cập nhật sản phẩm.</p>';
                        endif;
                        ?>
                    </div>
                    <div class="prod-dots" id="dots-audio"></div>
                </div>
            </div>

            <!-- SECTION: ÁNH SÁNG -->
            <div id="product-light"
                class="w-full mt-24 pt-16 lg:mt-32 lg:pt-24 pb-24 scroll-mt-24">
                <!-- Sub-section header: Ánh Sáng -->
                <div class="tava-heading tava-heading--dark border-t border-slate-200 pt-16 mt-8">
                    <span class="tava-heading__ghost" aria-hidden="true">Ánh Sáng</span>
                    <div class="tava-heading__left">
                        <div class="tava-heading__eyebrow">Hiệu Ứng Nghệ Thuật</div>
                        <h2 class="tava-heading__title">Hệ Thống <em>Ánh Sáng</em></h2>
                    </div>
                    <a href="<?php echo home_url('/tat-ca-san-pham/'); ?>" class="tava-heading__link relative z-20">
                        <span class="tava-heading__link-text">Kho thiết bị ánh sáng</span>
                        <span class="tava-heading__link-icon"><i class="ph-bold ph-arrow-right"></i></span>
                    </a>
                </div>
                <div class="prod-slider-wrap">
                    <div class="prod-grid reveal-up" id="grid-light">
                        <?php
                        $query_light = new WP_Query([
                            'post_type' => 'tava_product',
                            'posts_per_page' => -1,
                            'orderby' => ['menu_order' => 'ASC', 'date' => 'DESC'],
                            'tax_query' => [
                                [
                                    'taxonomy' => 'product_cat',
                                    'field' => 'slug',
                                    'terms' => ['thiet-bi-anh-sang', 'anh-sang'],
                                    'operator' => 'IN',
                                ]
                            ]
                        ]);
                        $light_posts = $query_light->posts;
                        usort($light_posts, function ($a, $b) {
                            $a_img = get_post_meta($a->ID, '_product_img', true) ?: get_the_post_thumbnail_url($a->ID, 'medium');
                            $b_img = get_post_meta($b->ID, '_product_img', true) ?: get_the_post_thumbnail_url($b->ID, 'medium');
                            return ($b_img ? 1 : 0) - ($a_img ? 1 : 0);
                        });
                        $light_posts = array_slice($light_posts, 0, 4);
                        if (!empty($light_posts)):
                            foreach ($light_posts as $post):
                                setup_postdata($post);
                                get_template_part('app/Views/components/product-card');
                            endforeach;
                            wp_reset_postdata();
                        else:
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
                <h3 class="main-tava-heading__title">Dấu Ấn <em>Tava</em></h3>
                <p class="main-tava-heading__desc">Không gì chứng minh năng lực tốt hơn những dự án thực tế. Chúng tôi
                    định nghĩa lại không gian bằng ánh sáng và âm thanh đỉnh cao.</p>
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
                        $img_src = wp_get_attachment_image_url($id, 'medium');

                        // Lấy thông tin từ bộ quản lý gallery custom thay vì title/caption mặc định
                        $title = get_post_meta($id, '_tavaled_project_name', true) ?: get_the_title($id);
                        $caption = get_post_meta($id, '_tavaled_project_desc', true) ?: wp_get_attachment_caption($id);
                        $solution = get_post_meta($id, '_tavaled_project_solution', true);

                        // Nếu không có ảnh thì bỏ qua
                        if (!$img_src)
                            continue;

                        // Tính tỷ lệ khung hình để căn phẳng chân ở cuối
                        $width = 800;
                        $height = 600;
                        $img_meta = wp_get_attachment_metadata($id);
                        if (!empty($img_meta) && isset($img_meta['width'], $img_meta['height'])) {
                            $width = intval($img_meta['width']);
                            $height = intval($img_meta['height']);
                        }
                        $aspect_ratio = $height > 0 ? ($width / $height) : 1.5;
                        ?>
                        <div class="g-item" style="--aspect: <?php echo $aspect_ratio; ?>;">
                            <img src="<?php echo esc_url($img_src); ?>" alt="<?php echo esc_attr($title ?: 'Dự án trình chiếu Tava'); ?>" loading="lazy">
                        </div>
                    <?php
                    }
                } else {
                    // Demo content nếu admin chưa setup
                    ?>
                    <div class="g-item" style="--aspect: 1.6;">
                        <img src="https://images.unsplash.com/photo-1506157786151-b8491531f063?w=600" alt="Âm thanh ánh sáng lễ hội âm nhạc EDM">
                    </div>
                    <div class="g-item" style="--aspect: 1.2;">
                        <img src="https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?w=600" alt="Trình chiếu màn hình lớn quán bar vũ trường club">
                    </div>
                    <div class="g-item" style="--aspect: 1.5;">
                        <img src="https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=600" alt="Hiệu ứng ánh sáng laser sân khấu chuyên nghiệp">
                    </div>
                    <div class="g-item" style="--aspect: 1.8;">
                        <img src="https://images.unsplash.com/photo-1459749411175-04bf5292ceea?w=600" alt="Không gian sự kiện đại nhạc hội trực tiếp">
                    </div>
                    <div class="g-item" style="--aspect: 1.4;">
                        <img src="https://images.unsplash.com/photo-1460723237483-7a6dc9d0b212?w=600" alt="Hệ thống trình chiếu sân khấu nghệ thuật">
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

        <div class="container mx-auto px-6 lg:px-12 max-w-[1600px]">

            <?php get_template_part('template-parts/blog-sections'); ?>

        </div>
    </section>

    <!-- ================= SECTION 6: FAQ (EDITORIAL SPLIT-SCREEN) ================= -->
    <section class="py-32 bg-[#0a0f1a] border-t border-white/5 relative overflow-hidden">
        <!-- Glow background -->
        <div
            class="absolute top-0 right-0 w-[500px] h-[500px] bg-brand-orange/5 filter blur-[120px] rounded-full pointer-events-none">
        </div>

        <div class="container mx-auto px-6 lg:px-12 max-w-[1600px] relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-24 items-start">

                <!-- Left Column: Sticky Intro -->
                <div class="lg:col-span-5 reveal-up lg:sticky lg:top-32">
                    <div
                        class="flex items-center gap-3 text-brand-orange font-bold text-[10px] tracking-[0.2em] uppercase mb-4">
                        <span class="w-8 h-0.5 bg-brand-orange"></span> Hỗ trợ 24/7
                    </div>
                    <h2 class="font-serif font-black text-4xl md:text-5xl text-white mb-6 leading-tight">Giải Đáp<br>Mọi
                        Thắc Mắc</h2>
                    <p class="text-white/50 text-base leading-relaxed mb-8">TavaLLS luôn sẵn sàng đồng hành cùng bạn.
                        Dưới đây là những câu hỏi thường gặp nhất. Chúng giúp bạn hiểu rõ quá trình tư vấn và triển khai các dự án Nghe - Nhìn quy mô lớn.</p>

                    <!-- Tech Image Support -->
                    <div class="relative overflow-hidden mb-8 aspect-video border border-white/10 group interactive">
                        <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=600"
                            alt="Đội ngũ hỗ trợ kỹ thuật khách hàng Tava"
                            class="w-full h-full object-cover group-hover:scale-105 transition-all duration-700">
                        <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-[#1c2857] to-transparent p-6">
                            <p class="text-white font-bold tracking-wide uppercase text-sm">Trung Tâm Hỗ Trợ Kỹ Thuật
                            </p>
                        </div>
                    </div>

                    <a href="tel:0934 29 8181" class="btn-outline interactive w-full">Trò chuyện trực tiếp cùng chuyên
                        gia</a>
                </div>

                <!-- Right Column: Premium Accordion -->
                <div class="lg:col-span-7 space-y-4 reveal-up delay-1 mt-8 lg:mt-0">

                    <div class="faq-item border-b border-white/10 bg-[#1c2857] group">
                        <button
                            class="faq-btn w-full text-left py-8 flex justify-between items-center focus:outline-none interactive">
                            <span class="flex items-center gap-6 pr-4">
                                <span
                                    class="font-mono text-xl text-white/20 font-bold group-hover:text-brand-orange transition-colors">01</span>
                                <span
                                    class="text-lg font-medium text-white group-hover:text-brand-orange transition-colors">TavaLLS
                                    có nhận thi công dự án tại các tỉnh thành xa không?</span>
                            </span>
                            <span class="faq-icon w-10 h-10 border border-white/20 rounded-full flex items-center justify-center flex-shrink-0 transition-all duration-300 group-hover:border-brand-orange group-hover:bg-brand-orange/10">
                                <i
                                    class="ph-bold ph-plus text-white group-hover:text-brand-orange transition-colors"></i>
                            </span>
                        </button>
                        <div class="faq-answer">
                            <div class="faq-answer-inner">
                                <div class="pb-8 text-white/60 text-base leading-relaxed pl-14 pr-4">
                                    Có. TavaLLS sở hữu hệ thống vận chuyển Logistics mạnh mẽ. Đội ngũ kỹ thuật của chúng tôi tinh nhuệ và tận tâm. Chúng tôi thi công và bảo hành trọn gói trên 64 tỉnh thành. Tiến độ cam kết nhanh nhất.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="faq-item border-b border-white/10 bg-[#1c2857] group">
                        <button
                            class="faq-btn w-full text-left py-8 flex justify-between items-center focus:outline-none interactive">
                            <span class="flex items-center gap-6 pr-4">
                                <span
                                    class="font-mono text-xl text-white/20 font-bold group-hover:text-brand-orange transition-colors">02</span>
                                <span
                                    class="text-lg font-medium text-white group-hover:text-brand-orange transition-colors">Chính
                                    sách bảo hành và hỗ trợ kỹ thuật như thế nào?</span>
                            </span>
                            <span class="faq-icon w-10 h-10 border border-white/20 rounded-full flex items-center justify-center flex-shrink-0 transition-all duration-300 group-hover:border-brand-orange group-hover:bg-brand-orange/10">
                                <i
                                    class="ph-bold ph-plus text-white group-hover:text-brand-orange transition-colors"></i>
                            </span>
                        </button>
                        <div class="faq-answer">
                            <div class="faq-answer-inner">
                                <div class="pb-8 text-white/60 text-base leading-relaxed pl-14 pr-4">
                                    Thiết bị do TavaLLS phân phối cam kết chính hãng 100%. Thời gian bảo hành từ 12 đến 36 tháng. Đội ngũ hỗ trợ kỹ thuật trực tuyến hoạt động 24/7. Chúng tôi xử lý sự cố tận nơi trong 4 giờ ở Hà Nội, TP.HCM. Tại các tỉnh khác, thời gian xử lý tối đa là 24 giờ.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="faq-item border-b border-white/10 bg-[#1c2857] group">
                        <button
                            class="faq-btn w-full text-left py-8 flex justify-between items-center focus:outline-none interactive">
                            <span class="flex items-center gap-6 pr-4">
                                <span
                                    class="font-mono text-xl text-white/20 font-bold group-hover:text-brand-orange transition-colors">03</span>
                                <span
                                    class="text-lg font-medium text-white group-hover:text-brand-orange transition-colors">Quy
                                    trình tư vấn thiết kế cho dự án mới ra sao?</span>
                            </span>
                            <span class="faq-icon w-10 h-10 border border-white/20 rounded-full flex items-center justify-center flex-shrink-0 transition-all duration-300 group-hover:border-brand-orange group-hover:bg-brand-orange/10">
                                <i
                                    class="ph-bold ph-plus text-white group-hover:text-brand-orange transition-colors"></i>
                            </span>
                        </button>
                        <div class="faq-answer">
                            <div class="faq-answer-inner">
                                <div class="pb-8 text-white/60 text-base leading-relaxed pl-14 pr-4">
                                    Quy trình gồm 5 bước chuẩn. Bước 1: Khảo sát thực tế, lắng nghe ý tưởng. Bước 2: Thiết kế bản vẽ 3D Visual, báo giá chi tiết. Bước 3: Ký kết hợp đồng. Bước 4: Tiến hành thi công lắp đặt. Bước 5: Bàn giao nghiệm thu, hướng dẫn vận hành kỹ lưỡng.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="faq-item border-b border-white/10 bg-[#1c2857] group">
                        <button
                            class="faq-btn w-full text-left py-8 flex justify-between items-center focus:outline-none interactive">
                            <span class="flex items-center gap-6 pr-4">
                                <span
                                    class="font-mono text-xl text-white/20 font-bold group-hover:text-brand-orange transition-colors">04</span>
                                <span
                                    class="text-lg font-medium text-white group-hover:text-brand-orange transition-colors">Chi
                                    phí đầu tư dự kiến cho màn hình trình chiếu cỡ lớn là bao nhiêu?</span>
                            </span>
                            <span class="faq-icon w-10 h-10 border border-white/20 rounded-full flex items-center justify-center flex-shrink-0 transition-all duration-300 group-hover:border-brand-orange group-hover:bg-brand-orange/10">
                                <i
                                    class="ph-bold ph-plus text-white group-hover:text-brand-orange transition-colors"></i>
                            </span>
                        </button>
                        <div class="faq-answer">
                            <div class="faq-answer-inner">
                                <div class="pb-8 text-white/60 text-base leading-relaxed pl-14 pr-4">
                                    Chi phí đầu tư màn hình phụ thuộc vào 3 yếu tố chính. Đó là độ phân giải, tổng diện tích lắp đặt và vị trí lắp trong nhà hay ngoài trời. Để nhận báo giá chính xác nhất, chuyên gia của chúng tôi sẽ khảo sát thực tế. Chúng tôi sẽ đề xuất nhiều phương án phù hợp ngân sách của bạn.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="faq-item border-b border-white/10 bg-[#1c2857] group">
                        <button
                            class="faq-btn w-full text-left py-8 flex justify-between items-center focus:outline-none interactive">
                            <span class="flex items-center gap-6 pr-4">
                                <span
                                    class="font-mono text-xl text-white/20 font-bold group-hover:text-brand-orange transition-colors">05</span>
                                <span
                                    class="text-lg font-medium text-white group-hover:text-brand-orange transition-colors">TavaLLS
                                    có cung cấp dịch vụ cho thuê thiết bị sự kiện không?</span>
                            </span>
                            <span class="faq-icon w-10 h-10 border border-white/20 rounded-full flex items-center justify-center flex-shrink-0 transition-all duration-300 group-hover:border-brand-orange group-hover:bg-brand-orange/10">
                                <i
                                    class="ph-bold ph-plus text-white group-hover:text-brand-orange transition-colors"></i>
                            </span>
                        </button>
                        <div class="faq-answer">
                            <div class="faq-answer-inner">
                                <div class="pb-8 text-white/60 text-base leading-relaxed pl-14 pr-4">
                                    Chắc chắn rồi. Bên cạnh thi công trọn gói, TavaLLS sở hữu kho thiết bị Rental khổng lồ. Thiết bị luôn sẵn sàng phục vụ đại nhạc hội, triển lãm, lễ ra mắt. Thời gian thuê linh hoạt cùng đội vận hành chuyên nghiệp đi kèm.
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- ================= SECTION 7: CTA ================= -->
    <section
        class="relative py-40 overflow-hidden bg-[#1c2857] flex items-center justify-center border-t border-brand-orange">
        <img src="https://images.unsplash.com/photo-1501386761578-eac5c94b800a?w=600" alt="Không gian sự kiện ánh sáng Tava"
            class="absolute inset-0 w-full h-full object-cover" loading="lazy">
        <div
            class="absolute inset-0 bg-[radial-gradient(ellipse_70%_80%_at_50%_50%,rgba(240,90,37,0.15)_0%,rgba(2,6,23,0.9)_70%)]">
        </div>

        <div class="container mx-auto px-6 lg:px-12 max-w-[1600px] relative z-10 text-center reveal-up">
            <h2 class="font-serif font-black text-5xl md:text-7xl text-white mb-6 tracking-tight">
                Bắt đầu dự án của bạn<br><em class="text-brand-orange italic font-light">— ngay hôm nay</em>
            </h2>
            <p class="text-white/60 text-lg max-w-2xl mx-auto mb-10">Liên hệ với chuyên gia của TavaLLS để nhận bản vẽ
                giải pháp 3D và báo giá chi tiết hoàn toàn miễn phí.</p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="tel:0934 29 8181" class="btn-primary interactive">
                    Gọi Hotline 0934 29 8181
                </a>
                <a href="mailto:tuyen.tavaco@gmail.com" class="btn-outline interactive">
                    Liên hệ tư vấn
                </a>
            </div>
        </div>
    </section>

</main>




<?php get_footer(); ?>
