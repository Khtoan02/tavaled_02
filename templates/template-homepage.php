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
        <div class="tava-container">
            <!-- SECTION: MÀN HÌNH LED (scroll-mt-24 để cuộn không bị lấp bởi header) -->
            <div id="product-led" class="w-full scroll-mt-24">
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
                class="w-full pt-16 lg:pt-24 mt-8 lg:mt-12 scroll-mt-24">
                <!-- Sub-section header: Âm Thanh -->
                <div class="tava-heading tava-heading--dark">
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
                class="w-full pt-16 lg:pt-24 mt-8 lg:mt-12 scroll-mt-24">
                <!-- Sub-section header: Ánh Sáng -->
                <div class="tava-heading tava-heading--dark">
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
        <div class="tava-container">
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

    <!-- ================= BRAND PROFILE CLUSTER (VỀ TAVALED + THỐNG KÊ + ĐỐI TÁC) ================= -->
    <section class="home-brand-block animate-brand-block" id="about">
        <!-- ── EARTH BACKGROUND SVG (ON THE RIGHT) ── -->
        <div class="home-brand-block__earth" aria-hidden="true">
            <img src="<?php echo esc_url(TAVALED_URI); ?>/assets/images/earth.svg" alt="Earth Globe Map">
        </div>
        
        <div class="tava-container relative z-10">
            <!-- Part 1: Về TavaLED -->
            <div class="home-who__grid reveal-up">
                <div>
                    <div class="tava-heading tava-heading--light mb-6">
                        <span class="tava-heading__ghost" aria-hidden="true">TavaLED</span>
                        <div class="tava-heading__left">
                            <div class="tava-heading__eyebrow">Câu Chuyện & Tầm Nhìn</div>
                            <h2 class="tava-heading__title">Về <em>TavaLED</em></h2>
                        </div>
                    </div>
                    <div class="home-who__slogan mb-6">
                        Kiến tạo kiệt tác <br>từ <span class="text-brand-orange italic font-light">Ánh sáng</span> &amp; <br><span class="text-white/55">Không gian.</span>
                    </div>
                </div>
                <div class="home-who__pillars">
                    <div class="home-who__pillar">
                        <div class="home-who__pillar-icon">
                            <i class="ph-fill ph-eye"></i>
                        </div>
                        <div>
                            <h3 class="home-who__pillar-title">Tầm Nhìn Chiến Lược</h3>
                            <p class="home-who__pillar-desc">Trở thành biểu tượng uy tín hàng đầu khu vực trong việc định hình công nghệ trải nghiệm không gian Nghe - Nhìn tích hợp, dẫn dắt xu hướng ứng dụng màn hình LED thông minh và kiến trúc ánh sáng nghệ thuật.</p>
                        </div>
                    </div>
                    <div class="home-who__pillar">
                        <div class="home-who__pillar-icon">
                            <i class="ph-fill ph-rocket-launch"></i>
                        </div>
                        <div>
                            <h3 class="home-who__pillar-title">Sứ Mệnh Tiên Phong</h3>
                            <p class="home-who__pillar-desc">Đồng hành cùng đối tác chuyển hóa không gian vật lý thông thường thành những trải nghiệm nghe nhìn nghệ thuật sống động và đẳng cấp, mang lại hiệu quả khai thác thương mại tối ưu cho chủ đầu tư.</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Giá trị cốt lõi (Core Values) Grid - 4 điểm chính hãng từ Hero Bar -->
            <div class="home-core-values-section reveal-up">
                <h3 class="text-center font-serif text-2xl text-white mb-10 uppercase tracking-widest font-black">Giá trị cốt lõi</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div class="home-core-value-card">
                        <h4 class="text-white font-bold text-lg mb-3 flex items-center gap-2.5"><i class="ph-fill ph-ear text-brand-orange text-xl"></i> Lắng nghe</h4>
                        <p class="text-white/60 text-sm leading-relaxed">Luôn tiếp nhận nhu cầu thực tiễn và bài toán ngân sách thực tế của khách hàng để đưa ra các phương án phù hợp nhất.</p>
                    </div>
                    <div class="home-core-value-card">
                        <h4 class="text-white font-bold text-lg mb-3 flex items-center gap-2.5"><i class="ph-fill ph-magnifying-glass text-brand-orange text-xl"></i> Thấu hiểu</h4>
                        <p class="text-white/60 text-sm leading-relaxed">Tiến hành khảo sát tỉ mỉ, đo đạc trực quan từng không gian lắp đặt để đưa ra các thông số kỹ thuật tối ưu nhất.</p>
                    </div>
                    <div class="home-core-value-card">
                        <h4 class="text-white font-bold text-lg mb-3 flex items-center gap-2.5"><i class="ph-fill ph-briefcase-metal text-brand-orange text-xl"></i> Giải pháp trọn vẹn</h4>
                        <p class="text-white/60 text-sm leading-relaxed">Đảm nhận từ đầu tới cuối quy trình từ tư vấn thiết kế mô phỏng 3D, thi công lắp đặt và đồng hành vận hành hậu mãi.</p>
                    </div>
                    <div class="home-core-value-card">
                        <h4 class="text-white font-bold text-lg mb-3 flex items-center gap-2.5"><i class="ph-fill ph-shield-check text-brand-orange text-xl"></i> Thiết bị chính hãng</h4>
                        <p class="text-white/60 text-sm leading-relaxed">Cam kết thiết bị nhập khẩu chính hãng đầy đủ giấy tờ CO/CQ và áp dụng bảo hành điện tử chính quy 24-36 tháng.</p>
                    </div>
                </div>
            </div>

            <!-- Part 3: Logo đối tác (Partners) -->
            <div class="home-partners-cluster reveal-up">
                <div class="tava-heading tava-heading--light mb-6">
                    <span class="tava-heading__ghost" aria-hidden="true">PARTNERS</span>
                    <div class="tava-heading__left">
                        <div class="tava-heading__eyebrow">Thương Hiệu Đồng Hành</div>
                        <h2 class="tava-heading__title">Đối Tác <em>Đồng Hành</em></h2>
                    </div>
                </div>
                
                <div class="home-partners__grid">
                    <div class="home-partner-cell">
                        <span class="home-partner-cell__logo">🖥️</span>
                        <span class="home-partner-cell__name">Absen</span>
                        <span class="home-partner-cell__desc">LED Display</span>
                    </div>
                    <div class="home-partner-cell">
                        <span class="home-partner-cell__logo">📺</span>
                        <span class="home-partner-cell__name">Novastar</span>
                        <span class="home-partner-cell__desc">LED Controller</span>
                    </div>
                    <div class="home-partner-cell">
                        <span class="home-partner-cell__logo">🖥️</span>
                        <span class="home-partner-cell__name">Leyard</span>
                        <span class="home-partner-cell__desc">LED Display</span>
                    </div>
                    <div class="home-partner-cell">
                        <span class="home-partner-cell__logo">🔊</span>
                        <span class="home-partner-cell__name">JBL</span>
                        <span class="home-partner-cell__desc">Pro Audio</span>
                    </div>
                    <div class="home-partner-cell">
                        <span class="home-partner-cell__logo">🎛️</span>
                        <span class="home-partner-cell__name">Yamaha</span>
                        <span class="home-partner-cell__desc">Console Mixer</span>
                    </div>
                    <div class="home-partner-cell">
                        <span class="home-partner-cell__logo">🎤</span>
                        <span class="home-partner-cell__name">Shure</span>
                        <span class="home-partner-cell__desc">Microphones</span>
                    </div>
                    <div class="home-partner-cell">
                        <span class="home-partner-cell__logo">💡</span>
                        <span class="home-partner-cell__name">Robe</span>
                        <span class="home-partner-cell__desc">Stage Lights</span>
                    </div>
                    <div class="home-partner-cell">
                        <span class="home-partner-cell__logo">🌟</span>
                        <span class="home-partner-cell__name">Martin</span>
                        <span class="home-partner-cell__desc">Stage Lights</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= SECTION 7: LĨNH VỰC / GIẢI PHÁP (SEGMENT) ================= -->
    <section id="solutions" class="home-sec home-sec--light reveal-up">
        <div class="tava-container">
            <div class="tava-heading tava-heading--dark mb-12">
                <span class="tava-heading__ghost" aria-hidden="true">LĨNH VỰC</span>
                <div class="tava-heading__left">
                    <div class="tava-heading__eyebrow">Giải Pháp Toàn Diện</div>
                    <h2 class="tava-heading__title">Lĩnh Vực <em>Phục Vụ</em></h2>
                </div>
            </div>
            
            <div class="home-segments__grid">
                <a href="<?php echo home_url('/giao-duc'); ?>" class="home-segment-card">
                    <img src="https://tavaled.vn/wp-content/uploads/2026/03/0010_TavaLED_Hinh_Anh.jpg" alt="Giáo Dục & Tương Tác" class="home-segment-card__img" loading="lazy">
                    <div class="home-segment-card__overlay"></div>
                    <div class="home-segment-card__content">
                        <div class="home-segment-card__eyebrow">Interactive Classroom</div>
                        <h3 class="home-segment-card__title">Giáo Dục & Tương Tác</h3>
                        <p class="home-segment-card__desc">Hệ thống lớp học tương tác thông minh, màn hình LED hiển thị và âm thanh cho giảng đường đại học, hội trường học đường.</p>
                    </div>
                </a>
                <a href="<?php echo home_url('/hoi-hop-doanh-nghiep'); ?>" class="home-segment-card">
                    <img src="https://tavaled.vn/wp-content/uploads/2026/03/0011_TavaLED_Hinh_Anh.jpg" alt="Hội Họp Doanh Nghiệp" class="home-segment-card__img" loading="lazy">
                    <div class="home-segment-card__overlay"></div>
                    <div class="home-segment-card__content">
                        <div class="home-segment-card__eyebrow">Corporate Meeting</div>
                        <h3 class="home-segment-card__title">Hội Họp Doanh Nghiệp</h3>
                        <p class="home-segment-card__desc">Hệ thống họp trực tuyến hội nghị truyền hình, màn hình LED phòng họp không dây cao cấp và âm thanh hội thảo đồng bộ.</p>
                    </div>
                </a>
                <a href="<?php echo home_url('/su-kien-san-khau'); ?>" class="home-segment-card">
                    <img src="https://tavaled.vn/wp-content/uploads/2026/03/0012_TavaLED_Hinh_Anh.jpg" alt="Sự Kiện & Sân Khấu" class="home-segment-card__img" loading="lazy">
                    <div class="home-segment-card__overlay"></div>
                    <div class="home-segment-card__content">
                        <div class="home-segment-card__eyebrow">Pro Stage & Concert</div>
                        <h3 class="home-segment-card__title">Sự Kiện & Sân Khấu</h3>
                        <p class="home-segment-card__desc">Hệ thống trình diễn sân khấu lớn, màn hình LED Rental độ nét cao, âm thanh Line Array công suất khủng và ánh sáng kỹ xảo.</p>
                    </div>
                </a>
                <a href="<?php echo home_url('/quang-cao-thuong-hieu'); ?>" class="home-segment-card">
                    <img src="https://tavaled.vn/wp-content/uploads/2026/03/0013_TavaLED_Hinh_Anh.jpg" alt="Quảng Cáo Thương Hiệu" class="home-segment-card__img" loading="lazy">
                    <div class="home-segment-card__overlay"></div>
                    <div class="home-segment-card__content">
                        <div class="home-segment-card__eyebrow">Digital Out-of-Home</div>
                        <h3 class="home-segment-card__title">Quảng Cáo Thương Hiệu</h3>
                        <p class="home-segment-card__desc">Màn hình LED quảng cáo ngoài trời (DOOH), màn hình LED ghép tinh tế cho TTTM, showroom bán lẻ cao cấp, tòa nhà.</p>
                    </div>
                </a>
                <a href="<?php echo home_url('/fnb-giai-tri'); ?>" class="home-segment-card">
                    <img src="https://tavaled.vn/wp-content/uploads/2026/03/0014_TavaLED_Hinh_Anh.jpg" alt="F&B & Giải Trí Đêm" class="home-segment-card__img" loading="lazy">
                    <div class="home-segment-card__overlay"></div>
                    <div class="home-segment-card__content">
                        <div class="home-segment-card__eyebrow">Nightlife & Restaurant</div>
                        <h3 class="home-segment-card__title">F&B & Giải Trí Đêm</h3>
                        <p class="home-segment-card__desc">Kiến tạo bầu không khí sống động cho nhà hàng, quán bar, vũ trường với màn hình LED sáng tạo, âm thanh nhạc mạnh và hệ thống ánh sáng lập trình.</p>
                    </div>
                </a>
                <a href="<?php echo home_url('/giai-tri-tai-nha'); ?>" class="home-segment-card">
                    <img src="https://tavaled.vn/wp-content/uploads/2026/03/0015_TavaLED_Hinh_Anh.jpg" alt="Giải Trí Tại Gia" class="home-segment-card__img" loading="lazy">
                    <div class="home-segment-card__overlay"></div>
                    <div class="home-segment-card__content">
                        <div class="home-segment-card__eyebrow">Home Entertainment</div>
                        <h3 class="home-segment-card__title">Giải Trí Tại Gia</h3>
                        <p class="home-segment-card__desc">Rạp chiếu phim gia đình cao cấp, phòng nghe nhạc Hi-End chuyên nghiệp và phòng hát giải trí tích hợp thông minh.</p>
                    </div>
                </a>
            </div>
        </div>
    </section>

    <!-- ================= SECTION 6: QUY TRÌNH 5 BƯỚC (HOW) ================= -->
    <section id="process" class="home-sec home-sec--light reveal-up">
        <div class="tava-container">
            <div class="tava-heading tava-heading--dark mb-12">
                <span class="tava-heading__ghost" aria-hidden="true">QUY TRÌNH</span>
                <div class="tava-heading__left">
                    <div class="tava-heading__eyebrow">Phương Thức Làm Việc</div>
                    <h2 class="tava-heading__title">Quy Trình <em>5 Bước Chuẩn</em></h2>
                </div>
            </div>
            
            <div class="home-process__grid">
                <div class="home-process__step">
                    <div class="home-process__badge">01</div>
                    <h3 class="home-process__title">Khảo Sát Hiện Trường</h3>
                    <p class="home-process__desc">Đội ngũ kỹ sư trực tiếp đo đạc kích thước, kiểm tra kết cấu chịu lực, góc nhìn thực tế và đo đạc các thông số âm học, quang học môi trường hoàn toàn miễn phí.</p>
                </div>
                <div class="home-process__step">
                    <div class="home-process__badge">02</div>
                    <h3 class="home-process__title">Thiết Kế & Demo 3D</h3>
                    <p class="home-process__desc">Dựng bản vẽ kỹ thuật chi tiết cùng mô phỏng 3D Visual trực quan giúp khách hàng dễ hình dung, lập bảng báo giá phân rã chi tiết để tối ưu hóa chi phí.</p>
                </div>
                <div class="home-process__step">
                    <div class="home-process__badge">03</div>
                    <h3 class="home-process__title">Kiểm Định & Chuẩn Bị</h3>
                    <p class="home-process__desc">Tập kết vật tư chính hãng 100% (đầy đủ chứng chỉ CO/CQ). Tiến hành chạy thử liên tục 72 giờ tại kho để đảm bảo thiết bị hoạt động hoàn hảo trước khi giao.</p>
                </div>
                <div class="home-process__step">
                    <div class="home-process__badge">04</div>
                    <h3 class="home-process__title">Thi Công Kỷ Luật</h3>
                    <p class="home-process__desc">Kỹ sư cơ khí và điện tử lắp dựng hệ thống khung gia cố, đấu nối dây tín hiệu an toàn và tiến hành căn chỉnh pixel, cân bằng âm thanh theo tiêu chuẩn kỹ thuật nghiêm ngặt.</p>
                </div>
                <div class="home-process__step">
                    <div class="home-process__badge">05</div>
                    <h3 class="home-process__title">Bàn Giao & Bảo Hành</h3>
                    <p class="home-process__desc">Đo đạc kiểm tra chất lượng lần cuối, hướng dẫn vận hành cho kỹ thuật viên của chủ đầu tư, bàn giao nghiệm thu và kích hoạt chính sách bảo hành 24-36 tháng.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= SECTION 8: ĐÁNH GIÁ KHÁCH HÀNG (SOCIAL PROOF) ================= -->
    <section id="reviews" class="home-sec home-sec--light reveal-up">
        <div class="tava-container">
            <div class="tava-heading tava-heading--dark mb-12">
                <span class="tava-heading__ghost" aria-hidden="true">REVIEWS</span>
                <div class="tava-heading__left">
                    <div class="tava-heading__eyebrow">Khách Hàng Nói Gì</div>
                    <h2 class="tava-heading__title">Ý Kiến <em>Khách Hàng</em></h2>
                </div>
            </div>
            
            <div class="home-testimonials__grid">
                <div class="home-testimonial-card">
                    <p class="home-testimonial-card__text">Màn hình LED và hệ thống ánh sáng của TavaLED giúp doanh thu của chúng tôi tăng 35% nhờ không gian trải nghiệm vô cùng độc đáo và thu hút.</p>
                    <div class="home-testimonial-card__author">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=100" alt="Nguyễn Văn Hùng" class="home-testimonial-card__avatar" loading="lazy">
                        <div>
                            <h4 class="home-testimonial-card__name">Ông Nguyễn Văn Hùng</h4>
                            <p class="home-testimonial-card__role">Giám đốc vận hành chuỗi L'Amour</p>
                        </div>
                    </div>
                </div>
                <div class="home-testimonial-card">
                    <p class="home-testimonial-card__text">Quy trình làm việc chuyên nghiệp, thi công lắp đặt nhanh gọn đáp ứng đúng tiến độ khai giảng. Dịch vụ bảo hành hỗ trợ kỹ thuật rất hỏa tốc.</p>
                    <div class="home-testimonial-card__author">
                        <img src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=100" alt="Lê Thị Mai" class="home-testimonial-card__avatar" loading="lazy">
                        <div>
                            <h4 class="home-testimonial-card__name">Bà Lê Thị Mai</h4>
                            <p class="home-testimonial-card__role">Phó Hiệu trưởng Trường THPT Star</p>
                        </div>
                    </div>
                </div>
                <div class="home-testimonial-card">
                    <p class="home-testimonial-card__text">Hệ thống âm thanh ánh sáng sân khấu hoạt động cực kỳ bền bỉ dưới cường độ sử dụng lớn tại vũ trường. Kỹ thuật viên rất có năng lực.</p>
                    <div class="home-testimonial-card__author">
                        <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=100" alt="Trần Minh Tuấn" class="home-testimonial-card__avatar" loading="lazy">
                        <div>
                            <h4 class="home-testimonial-card__name">Ông Trần Minh Tuấn</h4>
                            <p class="home-testimonial-card__role">Trưởng BQL dự án Club K-Light</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ================= SECTION 10: BLOG (EDITORIAL STYLE) ================= -->
    <section id="editorial" class="py-32 bg-[#1c2857]">
        <div class="tava-container">
            <?php get_template_part('template-parts/blog-sections'); ?>
        </div>
    </section>

    <!-- ================= SECTION 11: FAQ (EDITORIAL SPLIT-SCREEN) ================= -->
    <section id="faq" class="py-32 bg-[#1c2857] relative overflow-hidden">
        <!-- Glow background -->
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-brand-orange/10 filter blur-[120px] rounded-full pointer-events-none"></div>

        <div class="tava-container relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-24 items-start">

                <!-- Left Column: Sticky Intro -->
                <div class="lg:col-span-5 reveal-up lg:sticky lg:top-32">
                    <div class="tava-heading tava-heading--light mb-6">
                        <span class="tava-heading__ghost" aria-hidden="true">FAQ</span>
                        <div class="tava-heading__left">
                            <div class="tava-heading__eyebrow">Hỗ Trợ 24/7</div>
                            <h2 class="tava-heading__title">Giải Đáp <em>Mọi Thắc Mắc</em></h2>
                        </div>
                    </div>

                    <p class="text-white/80 text-base leading-relaxed mb-8">TavaLLS luôn sẵn sàng đồng hành cùng bạn. Dưới đây là những câu hỏi thường gặp nhất, giúp bạn hiểu rõ quá trình tư vấn và triển khai các dự án Nghe - Nhìn quy mô lớn.</p>

                    <!-- Tech Image Support Card -->
                    <div class="relative overflow-hidden mb-8 aspect-video rounded-2xl border border-white/15 group shadow-2xl bg-white/5 backdrop-blur-xl">
                        <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=600" alt="Đội ngũ hỗ trợ kỹ thuật khách hàng Tava" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700">
                        <div class="absolute inset-0 bg-gradient-to-t from-[#1c2857]/90 via-[#1c2857]/20 to-transparent"></div>
                        <div class="absolute bottom-4 left-4 right-4 bg-[#1c2857]/80 backdrop-blur-md p-4 rounded-xl border border-white/10 flex items-center justify-between">
                            <span class="text-white font-bold tracking-wider uppercase text-xs">Trung Tâm Kỹ Thuật 24/7</span>
                            <span class="w-8 h-8 rounded-full bg-brand-orange text-white flex items-center justify-center text-xs shadow-md"><i class="ph-bold ph-headset"></i></span>
                        </div>
                    </div>

                    <?php $phone = \App\Helpers\ThemeHelper::getOption('tavaled_phone') ?: '0934 29 8181'; ?>
                    <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone)); ?>" class="btn-outline interactive w-full flex items-center justify-center gap-3 py-4 text-xs md:text-sm font-extrabold tracking-widest uppercase rounded-xl">
                        <i class="ph-fill ph-phone-call text-brand-orange text-lg"></i> Trò chuyện trực tiếp cùng chuyên gia
                    </a>
                </div>

                <!-- Right Column: Minimalist Orange Accordion -->
                <div class="lg:col-span-7 space-y-4 reveal-up delay-1 mt-8 lg:mt-0">

                    <div class="faq-item rounded-2xl bg-[#f05a25] text-white transition-all duration-300 hover:bg-[#ff642e] hover:shadow-xl overflow-hidden group shadow-lg">
                        <button class="faq-btn w-full text-left p-5 md:p-6 flex justify-between items-center focus:outline-none interactive">
                            <span class="flex items-center gap-4 md:gap-5 pr-4">
                                <span class="font-mono text-lg md:text-xl text-white font-black">01</span>
                                <span class="font-medium text-base md:text-lg font-bold text-white transition-colors">TavaLLS có nhận thi công dự án tại các tỉnh thành xa không?</span>
                            </span>
                            <span class="faq-icon w-9 h-9 md:w-10 md:h-10 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0 transition-all duration-300">
                                <i class="ph-bold ph-plus text-white text-base"></i>
                            </span>
                        </button>
                        <div class="faq-answer">
                            <div class="faq-answer-inner">
                                <div class="px-5 md:px-6 pb-6 text-white/95 text-sm md:text-base leading-relaxed border-t border-white/20 pt-4">
                                    Có. TavaLLS sở hữu hệ thống vận chuyển Logistics mạnh mẽ cùng đội ngũ kỹ thuật tinh nhuệ. Chúng tôi thi công và bảo hành trọn gói trên 64 tỉnh thành với tiến độ cam kết nhanh nhất.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="faq-item rounded-2xl bg-[#f05a25] text-white transition-all duration-300 hover:bg-[#ff642e] hover:shadow-xl overflow-hidden group shadow-lg">
                        <button class="faq-btn w-full text-left p-5 md:p-6 flex justify-between items-center focus:outline-none interactive">
                            <span class="flex items-center gap-4 md:gap-5 pr-4">
                                <span class="font-mono text-lg md:text-xl text-white font-black">02</span>
                                <span class="font-medium text-base md:text-lg font-bold text-white transition-colors">Chính sách bảo hành và hỗ trợ kỹ thuật như thế nào?</span>
                            </span>
                            <span class="faq-icon w-9 h-9 md:w-10 md:h-10 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0 transition-all duration-300">
                                <i class="ph-bold ph-plus text-white text-base"></i>
                            </span>
                        </button>
                        <div class="faq-answer">
                            <div class="faq-answer-inner">
                                <div class="px-5 md:px-6 pb-6 text-white/95 text-sm md:text-base leading-relaxed border-t border-white/20 pt-4">
                                    Thiết bị do TavaLLS phân phối cam kết chính hãng 100%. Thời gian bảo hành từ 12 đến 36 tháng. Đội ngũ hỗ trợ kỹ thuật trực tuyến 24/7, xử lý sự cố tận nơi trong 4 giờ ở Hà Nội, TP.HCM và tối đa 24 giờ tại các tỉnh khác.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="faq-item rounded-2xl bg-[#f05a25] text-white transition-all duration-300 hover:bg-[#ff642e] hover:shadow-xl overflow-hidden group shadow-lg">
                        <button class="faq-btn w-full text-left p-5 md:p-6 flex justify-between items-center focus:outline-none interactive">
                            <span class="flex items-center gap-4 md:gap-5 pr-4">
                                <span class="font-mono text-lg md:text-xl text-white font-black">03</span>
                                <span class="font-medium text-base md:text-lg font-bold text-white transition-colors">Quy trình tư vấn thiết kế cho dự án mới ra sao?</span>
                            </span>
                            <span class="faq-icon w-9 h-9 md:w-10 md:h-10 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0 transition-all duration-300">
                                <i class="ph-bold ph-plus text-white text-base"></i>
                            </span>
                        </button>
                        <div class="faq-answer">
                            <div class="faq-answer-inner">
                                <div class="px-5 md:px-6 pb-6 text-white/95 text-sm md:text-base leading-relaxed border-t border-white/20 pt-4">
                                    Quy trình gồm 5 bước chuẩn: 1. Khảo sát thực tế → 2. Thiết kế bản vẽ 3D Visual & báo giá → 3. Ký kết hợp đồng → 4. Thi công lắp đặt → 5. Bàn giao nghiệm thu và hướng dẫn vận hành.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="faq-item rounded-2xl bg-[#f05a25] text-white transition-all duration-300 hover:bg-[#ff642e] hover:shadow-xl overflow-hidden group shadow-lg">
                        <button class="faq-btn w-full text-left p-5 md:p-6 flex justify-between items-center focus:outline-none interactive">
                            <span class="flex items-center gap-4 md:gap-5 pr-4">
                                <span class="font-mono text-lg md:text-xl text-white font-black">04</span>
                                <span class="font-medium text-base md:text-lg font-bold text-white transition-colors">Chi phí đầu tư dự kiến cho màn hình trình chiếu cỡ lớn là bao nhiêu?</span>
                            </span>
                            <span class="faq-icon w-9 h-9 md:w-10 md:h-10 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0 transition-all duration-300">
                                <i class="ph-bold ph-plus text-white text-base"></i>
                            </span>
                        </button>
                        <div class="faq-answer">
                            <div class="faq-answer-inner">
                                <div class="px-5 md:px-6 pb-6 text-white/95 text-sm md:text-base leading-relaxed border-t border-white/20 pt-4">
                                    Chi phí phụ thuộc vào độ phân giải, tổng diện tích và môi trường lắp đặt (trong nhà hay ngoài trời). Kỹ sư TavaLLS sẽ khảo sát và lập báo giá chi tiết tối ưu nhất cho ngân sách của bạn.
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="faq-item rounded-2xl bg-[#f05a25] text-white transition-all duration-300 hover:bg-[#ff642e] hover:shadow-xl overflow-hidden group shadow-lg">
                        <button class="faq-btn w-full text-left p-5 md:p-6 flex justify-between items-center focus:outline-none interactive">
                            <span class="flex items-center gap-4 md:gap-5 pr-4">
                                <span class="font-mono text-lg md:text-xl text-white font-black">05</span>
                                <span class="font-medium text-base md:text-lg font-bold text-white transition-colors">TavaLLS có cung cấp dịch vụ cho thuê thiết bị sự kiện không?</span>
                            </span>
                            <span class="faq-icon w-9 h-9 md:w-10 md:h-10 bg-white/20 rounded-full flex items-center justify-center flex-shrink-0 transition-all duration-300">
                                <i class="ph-bold ph-plus text-white text-base"></i>
                            </span>
                        </button>
                        <div class="faq-answer">
                            <div class="faq-answer-inner">
                                <div class="px-5 md:px-6 pb-6 text-white/95 text-sm md:text-base leading-relaxed border-t border-white/20 pt-4">
                                    Chắc chắn rồi! TavaLLS sở hữu kho thiết bị Rental khổng lồ sẵn sàng phục vụ đại nhạc hội, triển lãm, lễ ra mắt với thời gian thuê linh hoạt và đội ngũ vận hành chuyên nghiệp đi kèm.
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- ================= SECTION 12: FORM BÁO GIÁ + CTA ================= -->
    <section class="home-sec home-sec--navy" id="contact">
        <div class="tava-container relative z-10 reveal-up">
            <div class="home-cta-wrap">
                <div>
                    <h2 class="font-serif font-black text-4xl md:text-6xl text-white mb-6 tracking-tight">
                        Khởi đầu dự án<br>của bạn <em class="text-brand-orange italic font-light">— ngay hôm nay</em>
                    </h2>
                    <p class="text-white/60 text-lg mb-8 leading-relaxed max-w-lg">
                        Liên hệ với chuyên gia của TavaLED để nhận bản vẽ giải pháp mô phỏng 3D và báo giá chi tiết hoàn toàn miễn phí.
                    </p>
                    <div class="space-y-4">
                        <div class="flex items-center gap-3">
                            <span class="w-10 h-10 rounded-full bg-brand-orange/20 text-brand-orange flex items-center justify-center"><i class="ph-fill ph-phone text-lg"></i></span>
                            <div>
                                <div class="text-xs text-white/40">Hotline tư vấn 24/7</div>
                                <a href="tel:0934298181" class="text-white font-bold hover:text-brand-orange transition-colors">0934 29 8181</a>
                            </div>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="w-10 h-10 rounded-full bg-brand-orange/20 text-brand-orange flex items-center justify-center"><i class="ph-fill ph-envelope-simple text-lg"></i></span>
                            <div>
                                <div class="text-xs text-white/40">Email tiếp nhận dự án</div>
                                <a href="mailto:tuyen.tavaco@gmail.com" class="text-white font-bold hover:text-brand-orange transition-colors">tuyen.tavaco@gmail.com</a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Quote form -->
                <div class="home-quote-form" id="quoteFormContainer">
                    <form id="homeQuoteForm" method="post" action="">
                        <h3 class="home-quote-form__title">Yêu Cầu Báo Giá Nhanh</h3>
                        <p class="home-quote-form__desc">Nhận phương án sơ bộ &amp; dự toán chi tiết trong 2 giờ.</p>
                        
                        <div class="home-quote-form__group">
                            <label class="home-quote-form__label" for="quote_name">Họ và tên</label>
                            <input class="home-quote-form__input" type="text" id="quote_name" name="fullname" placeholder="Nguyễn Văn A" required>
                        </div>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="home-quote-form__group">
                                <label class="home-quote-form__label" for="quote_phone">Số điện thoại</label>
                                <input class="home-quote-form__input" type="tel" id="quote_phone" name="phone" placeholder="0901234567" required>
                            </div>
                            <div class="home-quote-form__group">
                                <label class="home-quote-form__label" for="quote_service">Dịch vụ quan tâm</label>
                                <select class="home-quote-form__select" id="quote_service" name="service" required>
                                    <option value="led">Màn hình LED</option>
                                    <option value="audio">Hệ thống âm thanh</option>
                                    <option value="lighting">Hệ thống ánh sáng</option>
                                    <option value="all">Trọn gói LED, Âm thanh &amp; Ánh sáng</option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="home-quote-form__group">
                            <label class="home-quote-form__label" for="quote_message">Nhu cầu cụ thể</label>
                            <textarea class="home-quote-form__textarea" id="quote_message" name="message" placeholder="Ví dụ: Màn hình LED hội trường 30m2..." required></textarea>
                        </div>
                        
                        <button class="home-quote-form__submit" type="submit" id="submitQuoteBtn">
                            <span>Gửi yêu cầu báo giá</span>
                            <i class="ph-bold ph-paper-plane-tilt"></i>
                        </button>
                    </form>
                    
                    <div class="home-quote-form__success" id="quoteFormSuccess">
                        <div class="home-quote-form__success-icon">
                            <i class="ph-fill ph-check-circle"></i>
                        </div>
                        <h3 class="home-quote-form__success-title">Gửi thành công!</h3>
                        <p class="home-quote-form__success-desc">
                            Cảm ơn bạn đã quan tâm. Đội ngũ chuyên gia kỹ thuật của TavaLED đã tiếp nhận thông tin và sẽ liên hệ lại với bạn trong vòng 2 giờ làm việc để tư vấn giải pháp.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

</main>




<?php get_footer(); ?>
