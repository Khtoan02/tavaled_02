<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Phosphor Icons: async — tải song song, không block render, thực thi ngay khi sẵn sàng -->
    <script src="https://unpkg.com/@phosphor-icons/web" async></script>
    <?php wp_head(); ?>
</head>
<body <?php body_class('text-brand-dark font-sans text-[15px] leading-relaxed'); ?>>
<?php wp_body_open(); ?>

<!-- ĐÓNG ĐINH LAYOUT: Wrapper đảm bảo 100% không bị tràn viền (Horizontal Scroll) trên MỌI điện thoại -->
<div class="site-wrapper w-full relative min-h-screen flex flex-col" style="overflow-x: clip; /* clip thay cho hidden để giữ thuộc tính position sticky cho sidebar */">

    <!-- OVERLAY BACKDROP TỐI (Dành cho Mega Menu) -->
    <div id="mega-backdrop" class="fixed inset-0 bg-[#0f1530]/80 backdrop-blur-md z-30 opacity-0 pointer-events-none transition-all duration-500 ease-[cubic-bezier(0.16,1,0.3,1)]"></div>

    <!-- STICKY WRAPPER: Bọc cả top bar + header để giữ chiều cao cố định khi cuộn -->
    <div class="sticky top-0 z-40 w-full">

    <!-- TOP BAR -->
    <div class="bg-[#1d2857] text-gray-200 text-sm py-2 hidden lg:block">
        <div class="w-full max-w-[1240px] xl:max-w-[1600px] mx-auto px-4 lg:px-[5%] flex flex-wrap justify-center md:justify-between items-center gap-y-2">
            <div class="flex items-center gap-4 md:gap-6">
                <?php 
                $phone = \App\Helpers\ThemeHelper::getOption('tavaled_phone') ?: '0909 123 456';
                $email = \App\Helpers\ThemeHelper::getOption('tavaled_email') ?: 'info@tavalls.com';
                ?>
                <span class="flex items-center gap-1.5 font-medium hover:text-white transition-colors cursor-pointer"><i class="ph-fill ph-phone-call text-brand-orange text-lg"></i> Hotline: <?php echo esc_html($phone); ?></span>
                <span class="flex items-center gap-1.5 font-medium hover:text-white transition-colors cursor-pointer"><i class="ph-fill ph-envelope-simple text-brand-orange text-lg"></i> <?php echo esc_html($email); ?></span>
            </div>
            <div class="flex items-center gap-5">
                <button onclick="toggleSearch()" class="font-medium hover:text-white transition-colors flex items-center gap-1.5"><i class="ph-bold ph-magnifying-glass text-lg"></i> Tìm kiếm</button>
                <a href="#" class="font-medium hover:text-white transition-colors flex items-center gap-1.5 relative mr-2">
                    <i class="ph-bold ph-receipt text-lg"></i> Báo giá
                    <span class="absolute -top-1.5 -right-3.5 bg-brand-orange text-white text-[9px] font-black w-4 h-4 rounded-none flex items-center justify-center">3</span>
                </a>
                <div class="w-px h-4 bg-gray-600 mx-1"></div>
                <a href="#" class="font-medium hover:text-white transition-colors">Tra cứu bảo hành</a>
                <a href="#" class="font-medium hover:text-white transition-colors">Chính sách</a>
                <div class="flex items-center gap-3 border-l border-gray-600 pl-5 ml-1">
                    <button class="font-bold text-brand-orange tracking-widest hover:text-brand-orange transition-colors">VN</button>
                    <button class="font-medium hover:text-white tracking-widest transition-colors">EN</button>
                    <button class="font-medium hover:text-white tracking-widest transition-colors">FR</button>
                </div>
            </div>
        </div>
    </div>

    <!-- MAIN HEADER -->
    <header id="mainHeader" class="w-full bg-white border-b border-gray-100 shadow-sm">
        <div class="w-full max-w-[1600px] mx-auto px-4 lg:px-[5%] relative">
            <div class="flex justify-between items-center h-24 gap-4 xl:gap-8">
                
                <!-- LOGO -->
                <div class="flex items-center shrink-0">
                    <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-2 group">
                        <?php 
                            $logo = \App\Helpers\ThemeHelper::getOption('logo');
                            if ($logo): 
                        ?>
                            <img src="<?php echo esc_url($logo); ?>" alt="<?php bloginfo('name'); ?>" class="h-12 w-auto transition-transform group-hover:scale-105 duration-300">
                        <?php else: ?>
                            <div class="w-12 h-12 bg-brand-orange rounded-none flex justify-center items-center text-white shadow-md shadow-brand-orange/30 transition-transform group-hover:scale-105 duration-300">
                                <i class="ph-bold ph-aperture text-3xl"></i>
                            </div>
                            <span class="text-2xl lg:text-3xl font-black tracking-tight text-gray-900 group-hover:text-brand-orange transition-colors"><?php echo esc_html(\App\Helpers\ThemeHelper::getOption('company_name', get_bloginfo('name'))); ?></span>
                        <?php endif; ?>
                    </a>
                </div>

                <!-- DESKTOP MENU -->
                <nav class="hidden lg:flex h-full items-center justify-center gap-6 xl:gap-8 font-bold text-[15px] text-gray-800 tracking-[0.05em] uppercase whitespace-nowrap">
                    <!-- Mega Menu Item: Về TavaLLS -->
                    <div class="group h-full flex items-center cursor-pointer hover-trigger static text-[16px]">
                        <a href="/ve-chung-toi" class="hover:text-brand-orange py-8 flex items-center gap-1.5 transition-colors group-hover:text-brand-orange relative group/link text-gray-800">
                            Về chúng tôi
                            <i class="ph-bold ph-caret-down text-[12px] mt-0.5 text-gray-400 group-hover:text-brand-orange transition-transform duration-300 group-hover:rotate-180"></i>
                            <span class="absolute bottom-[28px] left-0 w-[calc(100%-16px)] h-0.5 bg-brand-orange scale-x-0 group-hover/link:scale-x-100 transition-transform origin-left group-hover:scale-x-100"></span>
                        </a>

                        <!-- Mega Menu Dropdown -->
                        <div class="mega-menu absolute left-0 right-0 mx-auto w-full max-w-[1240px] top-[95px] bg-white border border-gray-100 shadow-[0_30px_60px_-15px_rgba(29,40,87,0.25)] rounded-b-3xl overflow-hidden cursor-default z-50 transform opacity-0 translate-y-4 pointer-events-none group-hover:opacity-100 group-hover:translate-y-0 group-hover:pointer-events-auto transition-all duration-300">
                            <div class="p-8 xl:p-10 flex gap-12 bg-white relative">
                                
                                <!-- Left side: Menu Links -->
                                <div class="w-2/3">
                                    <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-6 ml-3">Khám phá tổ chức</h3>
                                    <ul class="grid grid-cols-3 gap-4">
                                        <li>
                                            <a href="/ve-chung-toi" class="flex flex-col items-center p-5 rounded-2xl bg-white border border-transparent hover:border-orange-200 hover:bg-orange-50/50 hover:shadow-md hover:-translate-y-1 transition-all duration-300 group/item text-center">
                                                <div class="w-14 h-14 mb-4 bg-blue-50 text-[#1d2857] rounded-full flex items-center justify-center group-hover/item:bg-orange-100 group-hover/item:text-orange-600 transition-all duration-300">
                                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                                </div>
                                                <span class="font-semibold text-gray-700 group-hover/item:text-orange-600">Về TavaLLS</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/tieu-chi-phat-trien" class="flex flex-col items-center p-5 rounded-2xl bg-white border border-transparent hover:border-orange-200 hover:bg-orange-50/50 hover:shadow-md hover:-translate-y-1 transition-all duration-300 group/item text-center">
                                                <div class="w-14 h-14 mb-4 bg-blue-50 text-[#1d2857] rounded-full flex items-center justify-center group-hover/item:bg-orange-100 group-hover/item:text-orange-600 transition-all duration-300">
                                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                                                </div>
                                                <span class="font-semibold text-gray-700 group-hover/item:text-orange-600">Tiêu chí</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/tuyen-dung" class="flex flex-col items-center p-5 rounded-2xl bg-white border border-transparent hover:border-orange-200 hover:bg-orange-50/50 hover:shadow-md hover:-translate-y-1 transition-all duration-300 group/item text-center">
                                                <div class="w-14 h-14 mb-4 bg-blue-50 text-[#1d2857] rounded-full flex items-center justify-center group-hover/item:bg-orange-100 group-hover/item:text-orange-600 transition-all duration-300">
                                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2 2v2m4 6h.01M5 20h14a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                                                </div>
                                                <span class="font-semibold text-gray-700 group-hover/item:text-orange-600">Tuyển dụng</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/chuyen-gia" class="flex flex-col items-center p-5 rounded-2xl bg-white border border-transparent hover:border-orange-200 hover:bg-orange-50/50 hover:shadow-md hover:-translate-y-1 transition-all duration-300 group/item text-center">
                                                <div class="w-14 h-14 mb-4 bg-blue-50 text-[#1d2857] rounded-full flex items-center justify-center group-hover/item:bg-orange-100 group-hover/item:text-orange-600 transition-all duration-300">
                                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                                                </div>
                                                <span class="font-semibold text-gray-700 group-hover/item:text-orange-600">Chuyên gia</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/minh-bach-nang-luc" class="flex flex-col items-center p-5 rounded-2xl bg-white border border-transparent hover:border-orange-200 hover:bg-orange-50/50 hover:shadow-md hover:-translate-y-1 transition-all duration-300 group/item text-center">
                                                <div class="w-14 h-14 mb-4 bg-blue-50 text-[#1d2857] rounded-full flex items-center justify-center group-hover/item:bg-orange-100 group-hover/item:text-orange-600 transition-all duration-300">
                                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                                </div>
                                                <span class="font-semibold text-gray-700 group-hover/item:text-orange-600">Minh bạch <br> năng lực</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="/blog" class="flex flex-col items-center p-5 rounded-2xl bg-white border border-transparent hover:border-orange-200 hover:bg-orange-50/50 hover:shadow-md hover:-translate-y-1 transition-all duration-300 group/item text-center">
                                                <div class="w-14 h-14 mb-4 bg-blue-50 text-[#1d2857] rounded-full flex items-center justify-center group-hover/item:bg-orange-100 group-hover/item:text-orange-600 transition-all duration-300">
                                                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"></path></svg>
                                                </div>
                                                <span class="font-semibold text-gray-700 group-hover/item:text-orange-600">Tin tức</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <!-- Right side: Banner -->
                                <div class="w-1/3 flex items-center justify-center pl-8 border-l border-gray-100">
                                    <a href="/ve-chung-toi" class="group/banner cursor-pointer relative block overflow-hidden rounded-3xl shadow-md w-full h-full min-h-[320px]">
                                        <!-- Ảnh Banner -->
                                        <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=600&auto=format&fit=crop" alt="Về TavaLLS Banner" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover/banner:scale-110">
                                        
                                        <!-- Gradient Overlay -->
                                        <div class="absolute inset-0 bg-gradient-to-t from-[#1d2857]/90 via-[#1d2857]/20 to-transparent opacity-80 transition-opacity duration-300 group-hover/banner:opacity-100"></div>
                                        
                                        <!-- Nội dung Text đè lên Banner -->
                                        <div class="absolute bottom-0 left-0 p-8 w-full transform translate-y-3 group-hover/banner:translate-y-0 transition-transform duration-300">
                                            <h4 class="text-white text-2xl font-bold mb-2">Câu chuyện TavaLLS</h4>
                                            <p class="text-brand-orange text-sm font-medium flex items-center gap-2 opacity-0 group-hover/banner:opacity-100 transition-opacity duration-300 delay-75">
                                                Khám phá ngay <svg class="w-4 h-4 transition-transform group-hover/banner:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path></svg>
                                            </p>
                                        </div>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                    
                    <!-- MEGA MENU SẢN PHẨM -->
                    <div class="group h-full flex items-center cursor-pointer hover-trigger static text-[16px]">
                        <?php 
                            $prod_url = home_url('/tat-ca-san-pham');

                            // Cấu hình ngành hàng chính → sub-categories động từ database
                            $mega_cat_map = [
                                'mega-led'   => ['db_name' => 'Màn hình LED', 'url_slug' => 'led',       'default_title' => 'Màn hình LED',      'default_desc' => 'Giải pháp hiển thị chuyên nghiệp độ phân giải siêu cao cho sự kiện, hội trường và phòng họp cấp cao.'],
                                'mega-audio' => ['db_name' => 'Âm thanh',     'url_slug' => 'am-thanh',  'default_title' => 'Hệ thống Âm thanh', 'default_desc' => 'Trải nghiệm âm thanh uy lực, phát thanh trung thực phủ sóng hoàn hảo mọi không gian sự kiện đặc trưng.'],
                                'mega-light' => ['db_name' => 'Ánh sáng',     'url_slug' => 'anh-sang',  'default_title' => 'Hệ thống Ánh sáng', 'default_desc' => 'Kiến tạo không gian nghệ thuật với các loại đèn và công nghệ chiếu sáng rực rỡ chuyên dụng cho sân khấu.'],
                            ];

                            // Lấy sub-categories động từ database cho từng ngành hàng
                            $mega_subcats = [];
                            foreach ($mega_cat_map as $panel_id => $cat_def) {
                                $product_ids = get_posts([
                                    'post_type'      => 'tava_product',
                                    'posts_per_page' => -1,
                                    'fields'         => 'ids',
                                    'tax_query'      => [[
                                        'taxonomy' => 'product_cat',
                                        'field'    => 'name',
                                        'terms'    => $cat_def['db_name'],
                                    ]],
                                ]);
                                $terms = !empty($product_ids) ? get_terms([
                                    'taxonomy'   => 'product_subcat',
                                    'hide_empty' => true,
                                    'object_ids' => $product_ids,
                                    'orderby'    => 'count',
                                    'order'      => 'DESC',
                                ]) : [];
                                $mega_subcats[$panel_id] = is_array($terms) ? $terms : [];
                            }

                            // Ghi đè default_desc bằng description của term nếu admin đã điền
                            foreach ($mega_cat_map as $panel_id => $cat_def) {
                                $term = get_term_by('name', $cat_def['db_name'], 'product_cat');
                                if ($term && !empty($term->description)) {
                                    $mega_cat_map[$panel_id]['default_desc'] = $term->description;
                                }
                            }
                        ?>
                        <a href="<?php echo esc_url($prod_url); ?>" class="hover:text-brand-orange py-8 flex items-center gap-1.5 transition-colors group-hover:text-brand-orange relative group/link">
                            Sản phẩm <i class="ph-bold ph-caret-down text-[12px] mt-0.5"></i>
                            <span class="absolute bottom-[28px] left-0 w-[calc(100%-16px)] h-0.5 bg-brand-orange scale-x-0 group-hover/link:scale-x-100 transition-transform origin-left group-hover:scale-x-100"></span>
                        </a>
                        
                        <!-- Mega Menu Dropdown -->
                        <div class="mega-menu absolute top-[95px] left-0 right-0 mx-auto w-full max-w-[1240px] bg-white border border-gray-100 shadow-[0_30px_60px_-15px_rgba(29,40,87,0.25)] rounded-none overflow-hidden cursor-default z-50">
                            <div class="flex h-full">
                                
                                <!-- Danh mục -->
                                <div class="w-[300px] xl:w-[320px] shrink-0 bg-gray-50/50 p-8 border-r border-gray-100 flex flex-col">
                                    <h3 class="text-[11px] font-black text-gray-400 uppercase tracking-[0.2em] mb-6">Hệ sinh thái</h3>
                                    <ul class="space-y-3 mb-6">
                                        <li>
                                            <button onclick="window.location.href='<?php echo esc_url($prod_url . '?cat=led'); ?>'" class="mega-tab-btn w-full text-left px-5 py-4 rounded-none flex items-center justify-between transition-all bg-white text-[#1d2857] shadow-lg border border-gray-100 cursor-pointer" data-target="mega-led">
                                                <span class="flex items-center gap-3 text-lg font-bold hover:text-brand-orange transition-colors"><i class="ph-fill ph-monitor-play text-2xl text-brand-orange"></i> Màn hình LED</span>
                                                <i class="ph-bold ph-caret-right text-brand-orange"></i>
                                            </button>
                                        </li>
                                        <li>
                                            <button onclick="window.location.href='<?php echo esc_url($prod_url . '?cat=am-thanh'); ?>'" class="mega-tab-btn w-full text-left px-5 py-4 rounded-none flex items-center justify-between transition-all text-gray-500 hover:bg-white hover:text-[#1d2857] font-bold hover:shadow-lg border border-transparent hover:border-gray-100 cursor-pointer" data-target="mega-audio">
                                                <span class="flex items-center gap-3 text-lg hover:text-brand-orange transition-colors"><i class="ph-fill ph-speaker-hifi text-2xl text-gray-400"></i> Âm thanh</span>
                                                <i class="ph-bold ph-caret-right text-gray-300"></i>
                                            </button>
                                        </li>
                                        <li>
                                            <button onclick="window.location.href='<?php echo esc_url($prod_url . '?cat=anh-sang'); ?>'" class="mega-tab-btn w-full text-left px-5 py-4 rounded-none flex items-center justify-between transition-all text-gray-500 hover:bg-white hover:text-[#1d2857] font-bold hover:shadow-lg border border-transparent hover:border-gray-100 cursor-pointer" data-target="mega-light">
                                                <span class="flex items-center gap-3 text-lg hover:text-brand-orange transition-colors"><i class="ph-fill ph-lightbulb text-2xl text-gray-400"></i> Ánh sáng</span>
                                                <i class="ph-bold ph-caret-right text-gray-300"></i>
                                            </button>
                                        </li>
                                    </ul>

                                    <!-- Banner Khuyến Cáo / Doanh nghiệp -->
                                    <div class="mt-auto flex-1 flex flex-col justify-end">
                                        <div class="relative w-full rounded-none overflow-hidden group/banner shadow-sm cursor-pointer block ring-1 ring-gray-100">
                                            <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?q=80&w=600&auto=format&fit=crop" alt="Về <?php echo esc_attr(\App\Helpers\ThemeHelper::getOption('company_name', get_bloginfo('name'))); ?>" class="w-full h-[150px] object-cover transition-transform duration-700 group-hover/banner:scale-110">
                                            <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-gray-900/20 to-transparent"></div>
                                            <div class="absolute bottom-4 left-4 right-4 z-10">
                                                <span class="flex items-center gap-1.5 text-white font-black text-sm mb-1 uppercase tracking-wider">
                                                    Về chúng tôi <i class="ph-bold ph-arrow-right text-xs transition-transform group-hover/banner:translate-x-1"></i>
                                                </span>
                                                <span class="text-gray-300 text-xs font-medium line-clamp-2 leading-relaxed">Hồ sơ năng lực và các công trình dự án tiêu biểu.</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-6 pt-6 border-t border-gray-200/60">
                                        <a href="#" class="w-full flex justify-center items-center gap-2 py-3.5 bg-[#1d2857] text-white rounded-none font-bold hover:bg-brand-orange transition-all shadow-lg shadow-navy-900/10 text-sm tracking-widest uppercase">
                                            <i class="ph-bold ph-download-simple text-lg"></i> Tải Catalog <?php echo date('Y'); ?>
                                        </a>
                                    </div>
                                </div>

                                <!-- Nội dung theo Tab -->
                                <div class="flex-1 p-8 xl:p-10 relative min-h-[480px] bg-white overflow-hidden">
                                    
                                    <!-- TAB 1: LED -->
                                    <div id="mega-led" class="mega-tab-content block animate-fade-in-tab h-full flex flex-col" data-default-title="<?php echo esc_attr($mega_cat_map['mega-led']['default_title']); ?>" data-default-desc="<?php echo esc_attr($mega_cat_map['mega-led']['default_desc']); ?>">
                                        
                                        <div class="flex justify-between items-center mb-2">
                                            <h3 id="mega-led-title" class="text-[28px] xl:text-3xl font-black text-[#1d2857] tracking-tight italic uppercase">Màn hình LED</h3>
                                            <a href="<?php echo esc_url($prod_url . '?cat=led'); ?>" class="text-brand-orange text-[14px] font-black uppercase tracking-wider hover:text-[#1d2857] transition-colors flex items-center gap-1 group/link">Xem tất cả <i class="ph-bold ph-arrow-right transition-transform group-hover/link:translate-x-1"></i></a>
                                        </div>
                                        <p id="mega-led-desc" class="text-[14px] text-gray-500 font-medium mb-4 leading-relaxed max-w-2xl">Giải pháp hiển thị chuyên nghiệp độ phân giải siêu cao cho sự kiện, hội trường và phòng họp cấp cao.</p>
                                        
                                        <div class="flex flex-wrap gap-2 mb-6">
                                            <?php foreach ($mega_subcats['mega-led'] as $i => $subcat):
                                                $sub_desc = !empty($subcat->description) ? $subcat->description : ('Xem các sản phẩm ' . $subcat->name . ' chất lượng cao từ Tavaled.');
                                                $is_first = ($i === 0);
                                            ?>
                                            <a href="<?php echo esc_url($prod_url . '?cat=led&subcat=' . urlencode($subcat->name)); ?>"
                                               class="mega-subcat-pill <?php echo $is_first ? 'px-4 py-1.5 bg-orange-50 text-brand-orange font-bold border-orange-200/50 hover:bg-brand-orange hover:text-white' : 'px-3.5 py-1.5 bg-gray-50 text-gray-600 font-semibold border-gray-200 hover:bg-orange-50 hover:text-brand-orange hover:border-orange-200/50'; ?> rounded-none text-[13px] border transition-colors"
                                               data-panel="mega-led"
                                               data-sub-title="<?php echo esc_attr($subcat->name); ?>"
                                               data-sub-desc="<?php echo esc_attr($sub_desc); ?>">
                                                <?php echo esc_html($subcat->name); ?>
                                            </a>
                                            <?php endforeach; ?>
                                            <?php if (empty($mega_subcats['mega-led'])): ?>
                                            <span class="text-gray-400 text-sm italic">Chưa có danh mục con.</span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="relative slider-container flex-1 mt-2">
                                            <button class="slider-prev absolute -left-4 top-[40%] -translate-y-1/2 w-10 h-10 bg-white border border-gray-200 rounded-none shadow-lg text-gray-500 hover:text-brand-orange hover:border-brand-orange flex items-center justify-center z-10 transition-all focus:outline-none"><i class="ph-bold ph-caret-left text-xl"></i></button>
                                            <button class="slider-next absolute -right-4 top-[40%] -translate-y-1/2 w-10 h-10 bg-white border border-gray-200 rounded-none shadow-lg text-gray-500 hover:text-brand-orange hover:border-brand-orange flex items-center justify-center z-10 transition-all focus:outline-none"><i class="ph-bold ph-caret-right text-xl"></i></button>
                                            <div class="overflow-hidden w-full h-full p-2 group/slider">
                                                <div class="flex gap-6 slider-track transition-transform duration-500 ease-[cubic-bezier(0.25,1,0.5,1)]">
                                                    <?php
                                                    $query_led = new WP_Query(array(
                                                        'post_type' => 'tava_product',
                                                        'posts_per_page' => -1,
                                                        'tax_query' => array(
                                                            array(
                                                                'taxonomy' => 'product_cat',
                                                                'field' => 'name',
                                                                'terms' => 'Màn hình LED'
                                                            )
                                                        )
                                                    ));
                                                    if ($query_led->have_posts()) :
                                                        while ($query_led->have_posts()) : $query_led->the_post();
                                                            $_sc = wp_get_post_terms(get_the_ID(), 'product_subcat', ['fields' => 'names']);
                                                            $_sc_attr = esc_attr(wp_json_encode(is_array($_sc) ? array_values($_sc) : []));
                                                    ?>
                                                    <div class="mega-slide-item w-[260px] shrink-0 transform will-change-transform" data-subcats="<?php echo $_sc_attr; ?>">
                                                        <?php get_template_part('app/Views/components/product-card'); ?>
                                                    </div>
                                                    <?php
                                                        endwhile; wp_reset_postdata();
                                                    endif;
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- TAB 2: Âm thanh -->
                                    <div id="mega-audio" class="mega-tab-content hidden animate-fade-in-tab h-full flex flex-col" data-default-title="<?php echo esc_attr($mega_cat_map['mega-audio']['default_title']); ?>" data-default-desc="<?php echo esc_attr($mega_cat_map['mega-audio']['default_desc']); ?>">
                                        
                                        <div class="flex justify-between items-center mb-2">
                                            <h3 id="mega-audio-title" class="text-[28px] xl:text-3xl font-black text-[#1d2857] tracking-tight italic uppercase">Hệ thống Âm thanh</h3>
                                            <a href="<?php echo esc_url($prod_url . '?cat=am-thanh'); ?>" class="text-brand-orange text-[14px] font-black uppercase tracking-wider hover:text-[#1d2857] transition-colors flex items-center gap-1 group/link">Xem tất cả <i class="ph-bold ph-arrow-right transition-transform group-hover/link:translate-x-1"></i></a>
                                        </div>
                                        <p id="mega-audio-desc" class="text-[14px] text-gray-500 font-medium mb-4 leading-relaxed max-w-2xl">Trải nghiệm âm thanh uy lực, phát thanh trung thực phủ sóng hoàn hảo mọi không gian sự kiện đặc trưng.</p>
                                        
                                        <div class="flex flex-wrap gap-2 mb-6">
                                            <?php foreach ($mega_subcats['mega-audio'] as $i => $subcat):
                                                $sub_desc = !empty($subcat->description) ? $subcat->description : ('Xem các sản phẩm ' . $subcat->name . ' chất lượng cao từ Tavaled.');
                                                $is_first = ($i === 0);
                                            ?>
                                            <a href="<?php echo esc_url($prod_url . '?cat=am-thanh&subcat=' . urlencode($subcat->name)); ?>"
                                               class="mega-subcat-pill <?php echo $is_first ? 'px-4 py-1.5 bg-orange-50 text-brand-orange font-bold border-orange-200/50 hover:bg-brand-orange hover:text-white' : 'px-3.5 py-1.5 bg-gray-50 text-gray-600 font-semibold border-gray-200 hover:bg-orange-50 hover:text-brand-orange hover:border-orange-200/50'; ?> rounded-none text-[13px] border transition-colors"
                                               data-panel="mega-audio"
                                               data-sub-title="<?php echo esc_attr($subcat->name); ?>"
                                               data-sub-desc="<?php echo esc_attr($sub_desc); ?>">
                                                <?php echo esc_html($subcat->name); ?>
                                            </a>
                                            <?php endforeach; ?>
                                            <?php if (empty($mega_subcats['mega-audio'])): ?>
                                            <span class="text-gray-400 text-sm italic">Chưa có danh mục con.</span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="relative slider-container flex-1 mt-2">
                                            <button class="slider-prev absolute -left-4 top-[40%] -translate-y-1/2 w-10 h-10 bg-white border border-gray-200 rounded-none shadow-lg text-gray-500 hover:text-brand-orange hover:border-brand-orange flex items-center justify-center z-10 transition-all focus:outline-none"><i class="ph-bold ph-caret-left text-xl"></i></button>
                                            <button class="slider-next absolute -right-4 top-[40%] -translate-y-1/2 w-10 h-10 bg-white border border-gray-200 rounded-none shadow-lg text-gray-500 hover:text-brand-orange hover:border-brand-orange flex items-center justify-center z-10 transition-all focus:outline-none"><i class="ph-bold ph-caret-right text-xl"></i></button>
                                            <div class="overflow-hidden w-full h-full p-2 group/slider">
                                                <div class="flex gap-6 slider-track transition-transform duration-500 ease-[cubic-bezier(0.25,1,0.5,1)]">
                                                    <?php
                                                    $query_audio = new WP_Query(array(
                                                        'post_type' => 'tava_product',
                                                        'posts_per_page' => -1,
                                                        'tax_query' => array(
                                                            array(
                                                                'taxonomy' => 'product_cat',
                                                                'field' => 'name',
                                                                'terms' => 'Âm thanh'
                                                            )
                                                        )
                                                    ));
                                                    if ($query_audio->have_posts()) :
                                                        while ($query_audio->have_posts()) : $query_audio->the_post();
                                                            $_sc = wp_get_post_terms(get_the_ID(), 'product_subcat', ['fields' => 'names']);
                                                            $_sc_attr = esc_attr(wp_json_encode(is_array($_sc) ? array_values($_sc) : []));
                                                    ?>
                                                    <div class="mega-slide-item w-[260px] shrink-0 transform will-change-transform" data-subcats="<?php echo $_sc_attr; ?>">
                                                        <?php get_template_part('app/Views/components/product-card'); ?>
                                                    </div>
                                                    <?php
                                                        endwhile; wp_reset_postdata();
                                                    endif;
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- TAB 3: Ánh sáng -->
                                    <div id="mega-light" class="mega-tab-content hidden animate-fade-in-tab h-full flex flex-col" data-default-title="<?php echo esc_attr($mega_cat_map['mega-light']['default_title']); ?>" data-default-desc="<?php echo esc_attr($mega_cat_map['mega-light']['default_desc']); ?>">
                                        
                                        <div class="flex justify-between items-center mb-2">
                                            <h3 id="mega-light-title" class="text-[28px] xl:text-3xl font-black text-[#1d2857] tracking-tight italic uppercase">Hệ thống Ánh sáng</h3>
                                            <a href="<?php echo esc_url($prod_url . '?cat=anh-sang'); ?>" class="text-brand-orange text-[14px] font-black uppercase tracking-wider hover:text-[#1d2857] transition-colors flex items-center gap-1 group/link">Xem tất cả <i class="ph-bold ph-arrow-right transition-transform group-hover/link:translate-x-1"></i></a>
                                        </div>
                                        <p id="mega-light-desc" class="text-[14px] text-gray-500 font-medium mb-4 leading-relaxed max-w-2xl">Kiến tạo không gian nghệ thuật với các loại đèn và công nghệ chiếu sáng rực rỡ chuyên dụng cho sân khấu.</p>
                                        
                                        <div class="flex flex-wrap gap-2 mb-6">
                                            <?php foreach ($mega_subcats['mega-light'] as $i => $subcat):
                                                $sub_desc = !empty($subcat->description) ? $subcat->description : ('Xem các sản phẩm ' . $subcat->name . ' chất lượng cao từ Tavaled.');
                                                $is_first = ($i === 0);
                                            ?>
                                            <a href="<?php echo esc_url($prod_url . '?cat=anh-sang&subcat=' . urlencode($subcat->name)); ?>"
                                               class="mega-subcat-pill <?php echo $is_first ? 'px-4 py-1.5 bg-orange-50 text-brand-orange font-bold border-orange-200/50 hover:bg-brand-orange hover:text-white' : 'px-3.5 py-1.5 bg-gray-50 text-gray-600 font-semibold border-gray-200 hover:bg-orange-50 hover:text-brand-orange hover:border-orange-200/50'; ?> rounded-none text-[13px] border transition-colors"
                                               data-panel="mega-light"
                                               data-sub-title="<?php echo esc_attr($subcat->name); ?>"
                                               data-sub-desc="<?php echo esc_attr($sub_desc); ?>">
                                                <?php echo esc_html($subcat->name); ?>
                                            </a>
                                            <?php endforeach; ?>
                                            <?php if (empty($mega_subcats['mega-light'])): ?>
                                            <span class="text-gray-400 text-sm italic">Chưa có danh mục con.</span>
                                            <?php endif; ?>
                                        </div>
                                        <div class="relative slider-container flex-1 mt-2">
                                            <button class="slider-prev absolute -left-4 top-[40%] -translate-y-1/2 w-10 h-10 bg-white border border-gray-200 rounded-none shadow-lg text-gray-500 hover:text-brand-orange hover:border-brand-orange flex items-center justify-center z-10 transition-all focus:outline-none"><i class="ph-bold ph-caret-left text-xl"></i></button>
                                            <button class="slider-next absolute -right-4 top-[40%] -translate-y-1/2 w-10 h-10 bg-white border border-gray-200 rounded-none shadow-lg text-gray-500 hover:text-brand-orange hover:border-brand-orange flex items-center justify-center z-10 transition-all focus:outline-none"><i class="ph-bold ph-caret-right text-xl"></i></button>
                                            <div class="overflow-hidden w-full h-full p-2 group/slider">
                                                <div class="flex gap-6 slider-track transition-transform duration-500 ease-[cubic-bezier(0.25,1,0.5,1)]">
                                                    <?php
                                                    $query_light = new WP_Query(array(
                                                        'post_type' => 'tava_product',
                                                        'posts_per_page' => -1,
                                                        'tax_query' => array(
                                                            array(
                                                                'taxonomy' => 'product_cat',
                                                                'field' => 'name',
                                                                'terms' => 'Ánh sáng'
                                                            )
                                                        )
                                                    ));
                                                    if ($query_light->have_posts()) :
                                                        while ($query_light->have_posts()) : $query_light->the_post();
                                                            $_sc = wp_get_post_terms(get_the_ID(), 'product_subcat', ['fields' => 'names']);
                                                            $_sc_attr = esc_attr(wp_json_encode(is_array($_sc) ? array_values($_sc) : []));
                                                    ?>
                                                    <div class="mega-slide-item w-[260px] shrink-0 transform will-change-transform" data-subcats="<?php echo $_sc_attr; ?>">
                                                        <?php get_template_part('app/Views/components/product-card'); ?>
                                                    </div>
                                                    <?php
                                                        endwhile; wp_reset_postdata();
                                                    endif;
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Giải pháp trọn gói -->
                    <div class="group h-full flex items-center cursor-pointer hover-trigger static text-[16px]">
                        <a href="/giai-phap" class="hover:text-brand-orange py-8 flex items-center gap-1.5 transition-colors group-hover:text-brand-orange relative group/link text-gray-800">
                            Giải pháp trọn gói <i class="ph-bold ph-caret-down text-[12px] mt-0.5 text-gray-400 group-hover:text-brand-orange transition-transform duration-300 group-hover:rotate-180"></i>
                            <span class="absolute bottom-[28px] left-0 w-[calc(100%-16px)] h-0.5 bg-brand-orange scale-x-0 group-hover/link:scale-x-100 transition-transform origin-left group-hover:scale-x-100"></span>
                        </a>

                        <!-- Mega Menu Dropdown -->
                        <div class="mega-menu absolute left-0 right-0 mx-auto w-full max-w-[1240px] top-[95px] bg-white border border-gray-100 shadow-[0_30px_60px_-15px_rgba(29,40,87,0.25)] rounded-b-3xl overflow-hidden cursor-default z-50 transform opacity-0 translate-y-4 pointer-events-none group-hover:opacity-100 group-hover:translate-y-0 group-hover:pointer-events-auto transition-all duration-300">
                            <div class="p-8 xl:p-10 flex flex-col w-full bg-white relative">
                                
                                <!-- Tiêu đề & Nút Xem tất cả -->
                                <div class="flex justify-between items-center mb-6 border-b border-gray-100 pb-4">
                                    <h3 class="text-xs font-bold text-gray-400 uppercase tracking-widest">Các Lĩnh Vực Cốt Lõi</h3>
                                    <a href="/giai-phap" class="flex items-center gap-1.5 text-brand-orange hover:text-[#1d2857] font-black text-sm transition-all hover:translate-x-1 uppercase tracking-widest">
                                        <span>Xem tất cả</span>
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="text-current inline-block pb-0.5">
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M7.99922 1.19922C4.24962 1.19922 1.19922 4.24962 1.19922 7.99922C1.19922 11.7488 4.24962 14.7992 7.99922 14.7992C11.7488 14.7992 14.7992 11.7488 14.7992 7.99922C14.7992 4.24962 11.7488 1.19922 7.99922 1.19922ZM8 16C3.5888 16 0 12.4112 0 8C0 3.5888 3.5888 0 8 0C12.4112 0 16 3.5888 16 8C16 12.4112 12.4112 16 8 16Z" fill="currentColor"></path>
                                            <path fill-rule="evenodd" clip-rule="evenodd" d="M6.84559 11.3745C6.69199 11.3745 6.53759 11.3161 6.42079 11.1977C6.18719 10.9625 6.18799 10.5833 6.42239 10.3497L8.78399 7.99769L6.42239 5.64649C6.18799 5.41289 6.18719 5.03289 6.42079 4.79769C6.65439 4.56169 7.03359 4.56329 7.26879 4.79609L10.0576 7.57289C10.1704 7.68569 10.2336 7.83849 10.2336 7.99769C10.2336 8.15769 10.1704 8.31049 10.0576 8.42329L7.26879 11.1993C7.15199 11.3161 6.99839 11.3745 6.84559 11.3745Z" fill="currentColor"></path>
                                        </svg>
                                    </a>
                                </div>

                                <!-- Lưới 3 Cột x 2 Hàng (2x3 Layout) -->
                                <div class="grid grid-cols-3 gap-x-8 gap-y-8">
                                    
                                    <!-- Item 1 -->
                                    <div class="group/combo">
                                        <a href="/giao-duc" class="block rounded-xl overflow-hidden bg-gray-50 mb-4 shadow-sm hover:shadow-md transition-shadow relative">
                                            <img src="https://images.unsplash.com/photo-1577896851231-70ef18d87a5a?q=80&w=600&auto=format&fit=crop" alt="Giáo Dục & Tương Tác" class="w-full aspect-video object-cover group-hover/combo:scale-105 transition-transform duration-500">
                                            <div class="absolute inset-0 bg-[#1d2857]/0 group-hover/combo:bg-[#1d2857]/10 transition-colors duration-300"></div>
                                        </a>
                                        <a href="/giao-duc" class="block text-center font-bold text-[#1d2857] hover:text-brand-orange transition-colors uppercase text-[13px] tracking-wide">
                                            Giáo Dục & Tương Tác
                                        </a>
                                    </div>

                                    <!-- Item 2 -->
                                    <div class="group/combo">
                                        <a href="/hoi-hop-doanh-nghiep" class="block rounded-xl overflow-hidden bg-gray-50 mb-4 shadow-sm hover:shadow-md transition-shadow relative">
                                            <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=600&auto=format&fit=crop" alt="Hội Họp Doanh Nghiệp" class="w-full aspect-video object-cover group-hover/combo:scale-105 transition-transform duration-500">
                                            <div class="absolute inset-0 bg-[#1d2857]/0 group-hover/combo:bg-[#1d2857]/10 transition-colors duration-300"></div>
                                        </a>
                                        <a href="/hoi-hop-doanh-nghiep" class="block text-center font-bold text-[#1d2857] hover:text-brand-orange transition-colors uppercase text-[13px] tracking-wide">
                                            Hội Họp Doanh Nghiệp
                                        </a>
                                    </div>

                                    <!-- Item 3 -->
                                    <div class="group/combo">
                                        <a href="/su-kien-san-khau" class="block rounded-xl overflow-hidden bg-gray-50 mb-4 shadow-sm hover:shadow-md transition-shadow relative">
                                            <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?q=80&w=600&auto=format&fit=crop" alt="Sự Kiện & Sân Khấu" class="w-full aspect-video object-cover group-hover/combo:scale-105 transition-transform duration-500">
                                            <div class="absolute inset-0 bg-[#1d2857]/0 group-hover/combo:bg-[#1d2857]/10 transition-colors duration-300"></div>
                                        </a>
                                        <a href="/su-kien-san-khau" class="block text-center font-bold text-[#1d2857] hover:text-brand-orange transition-colors uppercase text-[13px] tracking-wide">
                                            Sự Kiện & Sân Khấu
                                        </a>
                                    </div>

                                    <!-- Item 4 -->
                                    <div class="group/combo">
                                        <a href="/quang-cao-thuong-hieu" class="block rounded-xl overflow-hidden bg-gray-50 mb-4 shadow-sm hover:shadow-md transition-shadow relative">
                                            <img src="https://images.unsplash.com/photo-1555099962-4199c345e5dd?q=80&w=600&auto=format&fit=crop" alt="Quảng Cáo Thương Hiệu" class="w-full aspect-video object-cover group-hover/combo:scale-105 transition-transform duration-500">
                                            <div class="absolute inset-0 bg-[#1d2857]/0 group-hover/combo:bg-[#1d2857]/10 transition-colors duration-300"></div>
                                        </a>
                                        <a href="/quang-cao-thuong-hieu" class="block text-center font-bold text-[#1d2857] hover:text-brand-orange transition-colors uppercase text-[13px] tracking-wide">
                                            Quảng Cáo Thương Hiệu
                                        </a>
                                    </div>

                                    <!-- Item 5 -->
                                    <div class="group/combo">
                                        <a href="/fnb-giai-tri" class="block rounded-xl overflow-hidden bg-gray-50 mb-4 shadow-sm hover:shadow-md transition-shadow relative">
                                            <img src="https://images.unsplash.com/photo-1514525253161-7a46d19cd819?q=80&w=600&auto=format&fit=crop" alt="F&B & Giải Trí Đêm" class="w-full aspect-video object-cover group-hover/combo:scale-105 transition-transform duration-500">
                                            <div class="absolute inset-0 bg-[#1d2857]/0 group-hover/combo:bg-[#1d2857]/10 transition-colors duration-300"></div>
                                        </a>
                                        <a href="/fnb-giai-tri" class="block text-center font-bold text-[#1d2857] hover:text-brand-orange transition-colors uppercase text-[13px] tracking-wide">
                                            F&B & Giải Trí Đêm
                                        </a>
                                    </div>

                                    <!-- Item 6 w Hot flag -->
                                    <div class="group/combo">
                                        <a href="/giai-tri-tai-nha" class="block rounded-xl overflow-hidden bg-gray-50 mb-4 shadow-sm hover:shadow-md transition-shadow relative">
                                            <span class="absolute top-2 left-2 bg-brand-orange text-white text-[10px] font-bold px-2.5 py-1 rounded-sm z-10 uppercase tracking-widest shadow-sm">Hot</span>
                                            <img src="https://images.unsplash.com/photo-1593784991095-a205069470b6?q=80&w=600&auto=format&fit=crop" alt="Giải Trí Tại Gia" class="w-full aspect-video object-cover group-hover/combo:scale-105 transition-transform duration-500">
                                            <div class="absolute inset-0 bg-[#1d2857]/0 group-hover/combo:bg-[#1d2857]/10 transition-colors duration-300"></div>
                                        </a>
                                        <a href="/giai-tri-tai-nha" class="block text-center font-bold text-brand-orange hover:text-orange-600 transition-colors uppercase text-[13px] tracking-wide">
                                            Giải Trí Tại Gia
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <a href="/du-an" class="hover:text-brand-orange transition-colors py-8 relative group/link">
                        Dự án tiêu biểu
                        <span class="absolute bottom-[28px] left-0 w-max h-0.5 bg-brand-orange scale-x-0 group-hover/link:scale-x-100 transition-transform origin-left"></span>
                    </a>
                    <a href="/lien-he" class="hover:text-brand-orange transition-colors py-8 relative group/link">
                        Liên hệ
                        <span class="absolute bottom-[28px] left-0 w-max h-0.5 bg-brand-orange scale-x-0 group-hover/link:scale-x-100 transition-transform origin-left"></span>
                    </a>
                </nav>

                <!-- RIGHT ICONS -->
                <div class="flex items-center gap-2 md:gap-4 shrink-0 justify-end">
                    
                    <!-- HOTLINE BLOCK -->
                    <?php
                        $hotline_cskh = \App\Helpers\ThemeHelper::getOption('phone_cskh', '086 847 4488');
                        $hotline_kd   = \App\Helpers\ThemeHelper::getOption('phone_kd',   '034 232 4488');
                        $hotline_cskh_tel = preg_replace('/[^0-9+]/', '', $hotline_cskh);
                        $hotline_kd_tel   = preg_replace('/[^0-9+]/', '', $hotline_kd);
                    ?>
                    <div class="flex items-center border-r border-gray-100 pr-3 md:pr-4">

                        <!-- MOBILE & TABLET STACKED VIEW (Hidden on Desktop) -->
                        <a href="tel:<?php echo esc_attr($hotline_cskh_tel); ?>" class="flex lg:hidden items-center gap-2.5 group hover:text-brand-orange">
                            <div class="w-8 h-8 md:w-9 md:h-9 rounded-none bg-[#f05a25] text-white flex items-center justify-center shrink-0 shadow-md shadow-red-500/20 group-hover:-translate-y-1 transition-transform">
                                <i class="ph-bold ph-phone-call text-[16px] md:text-[18px]"></i>
                            </div>
                            <div class="flex flex-col justify-center">
                                <span class="font-bold text-gray-900 text-[13px] md:text-[14px] leading-tight"><?php echo esc_html($hotline_cskh); ?></span>
                                <span class="font-bold text-brand-orange text-[13px] md:text-[14px] leading-tight mt-0.5"><?php echo esc_html($hotline_kd); ?></span>
                            </div>
                        </a>

                        <!-- DESKTOP SIDE-BY-SIDE VIEW (Hidden on Mobile/Tablet) -->
                        <div class="hidden lg:flex items-center gap-6">
                            <!-- Hotline CSKH -->
                            <a href="tel:<?php echo esc_attr($hotline_cskh_tel); ?>" class="flex items-center gap-2.5 group">
                                <div class="w-10 h-10 rounded-none bg-[#f05a25] text-white flex items-center justify-center shrink-0 shadow-md shadow-red-500/20">
                                    <i class="ph-bold ph-phone text-[22px]"></i>
                                </div>
                                <div class="flex flex-col whitespace-nowrap">
                                    <span class="font-bold text-gray-900 text-[17px] xl:text-[18px] leading-tight group-hover:text-brand-orange transition-colors"><?php echo esc_html($hotline_cskh); ?></span>
                                    <span class="text-[12px] xl:text-[13px] text-gray-500 font-medium leading-tight mt-0.5">CSKH</span>
                                </div>
                            </a>
                            <!-- Hotline Kinh doanh -->
                            <a href="tel:<?php echo esc_attr($hotline_kd_tel); ?>" class="flex items-center gap-2.5 border-l border-gray-100 pl-6 group">
                                <div class="w-10 h-10 rounded-none bg-[#f05a25] text-white flex items-center justify-center shrink-0 shadow-md shadow-red-500/20">
                                    <i class="ph-bold ph-phone text-[22px]"></i>
                                </div>
                                <div class="flex flex-col whitespace-nowrap">
                                    <span class="font-bold text-gray-900 text-[17px] xl:text-[18px] leading-tight group-hover:text-brand-orange transition-colors"><?php echo esc_html($hotline_kd); ?></span>
                                    <span class="text-[12px] xl:text-[13px] text-gray-500 font-medium leading-tight mt-0.5">Kinh doanh</span>
                                </div>
                            </a>
                        </div>

                    </div>

                    <!-- Mobile Menu Trigger -->
                    <button id="mobileMenuBtn" class="lg:hidden text-gray-700 hover:text-brand-orange p-1.5 md:p-2 bg-gray-50 rounded-none shrink-0 transition-colors">
                        <i class="ph-bold ph-list text-2xl md:text-3xl"></i>
                    </button>
                </div>

            </div>
        </div>
    </header>
    </div><!-- /.sticky wrapper -->

    <!-- MOBILE DRAWER -->
    <div id="mobileMenu" class="fixed inset-0 z-50 bg-[#0f1530]/80 backdrop-blur-md opacity-0 pointer-events-none transition-all duration-500 ease-[cubic-bezier(0.16,1,0.3,1)]">
        <div class="absolute top-0 right-0 w-[85%] max-w-sm h-full bg-white shadow-2xl transform translate-x-full transition-transform duration-500 ease-[cubic-bezier(0.16,1,0.3,1)] flex flex-col" id="mobileMenuPanel">
            <div class="flex justify-between items-center p-5 border-b border-gray-100">
                <span class="text-xl font-bold tracking-tight text-gray-900"><?php echo esc_html(\App\Helpers\ThemeHelper::getOption('company_name', get_bloginfo('name'))); ?></span>
                <button id="closeMobileMenuBtn" class="text-gray-500 hover:text-brand-orange p-2.5 rounded-none bg-gray-50 min-w-[44px] min-h-[44px] flex items-center justify-center">
                    <i class="ph ph-x text-xl"></i>
                </button>
            </div>
            <div class="flex-1 overflow-y-auto mobile-menu-scroll p-4 space-y-1.5 flex flex-col gap-1">
                <a href="<?php echo esc_url(home_url('/')); ?>" class="block py-2 text-[16px] font-medium text-gray-800 border-b border-gray-50 hover:text-brand-orange transition-colors">Trang chủ</a>
                <a href="/ve-chung-toi" class="block py-2 text-[16px] font-medium text-gray-800 border-b border-gray-50 hover:text-brand-orange transition-colors">Về <?php echo esc_html(\App\Helpers\ThemeHelper::getOption('company_name', 'TavaLLS')); ?></a>
                
                <div class="border-b border-gray-50">
                    <button class="w-full flex justify-between items-center py-2 text-[16px] font-medium text-gray-800" onclick="toggleAccordion('mobileProducts')">
                        <span class="text-brand-orange">Hệ sinh thái thiết bị</span>
                        <i class="ph ph-caret-down text-sm transition-transform duration-200" id="icon-mobileProducts"></i>
                    </button>
                    <div id="mobileProducts" class="max-h-0 opacity-0 overflow-hidden transition-all duration-500 ease-[cubic-bezier(0.16,1,0.3,1)] pl-4 pb-0 space-y-4">
                        <div>
                            <div class="font-bold text-gray-800 mb-2 flex items-center justify-between group" onclick="window.location.href='<?php echo esc_url($prod_url . '?cat=led'); ?>'">
                                <span class="flex items-center gap-2 hover:text-brand-orange transition-colors cursor-pointer"><i class="ph ph-monitor-play text-brand-orange"></i> Màn hình LED</span>
                                <i class="ph ph-caret-down text-xs cursor-pointer p-2" onclick="event.stopPropagation(); toggleAccordion('subLed');" id="icon-subLed"></i>
                            </div>
                            <ul id="subLed" class="max-h-0 opacity-0 overflow-hidden transition-all duration-500 ease-[cubic-bezier(0.16,1,0.3,1)] space-y-2 text-gray-600 border-l-2 border-orange-100 pl-3">
                                <li><a href="<?php echo esc_url($prod_url . '?cat=led&subcat=' . urlencode('LED trong nhà')); ?>" class="block hover:text-brand-orange transition-colors">Trong nhà (Indoor)</a></li>
                                <li><a href="<?php echo esc_url($prod_url . '?cat=led&subcat=' . urlencode('LED ngoài trời')); ?>" class="block hover:text-brand-orange transition-colors">Ngoài trời (Outdoor)</a></li>
                                <li><a href="<?php echo esc_url($prod_url . '?cat=led&subcat=' . urlencode('LED sân khấu (Rental)')); ?>" class="block hover:text-brand-orange transition-colors">Màn hình sân khấu (Rental)</a></li>
                                <li><a href="<?php echo esc_url($prod_url . '?cat=led&subcat=' . urlencode('LED trong suốt')); ?>" class="block hover:text-brand-orange transition-colors">Trong suốt</a></li>
                            </ul>
                        </div>
                        <div>
                            <div class="font-bold text-gray-800 mb-2 flex items-center justify-between group" onclick="window.location.href='<?php echo esc_url($prod_url . '?cat=am-thanh'); ?>'">
                                <span class="flex items-center gap-2 hover:text-brand-orange transition-colors cursor-pointer"><i class="ph ph-speaker-hifi text-brand-orange"></i> Âm thanh</span>
                                <i class="ph ph-caret-down text-xs cursor-pointer p-2" onclick="event.stopPropagation(); toggleAccordion('subAudio');" id="icon-subAudio"></i>
                            </div>
                            <ul id="subAudio" class="max-h-0 opacity-0 overflow-hidden transition-all duration-500 ease-[cubic-bezier(0.16,1,0.3,1)] space-y-2 text-gray-600 border-l-2 border-orange-100 pl-3">
                                <li><a href="<?php echo esc_url($prod_url . '?cat=am-thanh&subcat=' . urlencode('Loa')); ?>" class="block hover:text-brand-orange transition-colors">Các loại Loa</a></li>
                                <li><a href="<?php echo esc_url($prod_url . '?cat=am-thanh&subcat=' . urlencode('Loa siêu trầm (Sub)')); ?>" class="block hover:text-brand-orange transition-colors">Loa Subwoofer</a></li>
                                <li><a href="<?php echo esc_url($prod_url . '?cat=am-thanh&subcat=' . urlencode('Mixer')); ?>" class="block hover:text-brand-orange transition-colors">Mixer Digital</a></li>
                                <li><a href="<?php echo esc_url($prod_url . '?cat=am-thanh&subcat=' . urlencode('Micro')); ?>" class="block hover:text-brand-orange transition-colors">Microphones</a></li>
                            </ul>
                        </div>
                        <div>
                            <div class="font-bold text-gray-800 mb-2 flex items-center justify-between group" onclick="window.location.href='<?php echo esc_url($prod_url . '?cat=anh-sang'); ?>'">
                                <span class="flex items-center gap-2 hover:text-brand-orange transition-colors cursor-pointer"><i class="ph ph-lightbulb text-brand-orange"></i> Ánh sáng</span>
                                <i class="ph ph-caret-down text-xs cursor-pointer p-2" onclick="event.stopPropagation(); toggleAccordion('subLight');" id="icon-subLight"></i>
                            </div>
                            <ul id="subLight" class="max-h-0 opacity-0 overflow-hidden transition-all duration-500 ease-[cubic-bezier(0.16,1,0.3,1)] space-y-2 text-gray-600 border-l-2 border-orange-100 pl-3">
                                <li><a href="<?php echo esc_url($prod_url . '?cat=anh-sang&subcat=' . urlencode('Moving Head')); ?>" class="block hover:text-brand-orange transition-colors">Đèn Moving Head</a></li>
                                <li><a href="<?php echo esc_url($prod_url . '?cat=anh-sang&subcat=' . urlencode('Laser')); ?>" class="block hover:text-brand-orange transition-colors">Đèn Laser Sân Khấu</a></li>
                                <li><a href="<?php echo esc_url($prod_url . '?cat=anh-sang&subcat=' . urlencode('Par LED')); ?>" class="block hover:text-brand-orange transition-colors">Đèn Par LED</a></li>
                                <li><a href="<?php echo esc_url($prod_url . '?cat=anh-sang&subcat=' . urlencode('DMX')); ?>" class="block hover:text-brand-orange transition-colors">Bàn điều khiển Ánh sáng</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Giải Pháp Trọn Gói Mobile Menu -->
                <div class="border-b border-gray-50">
                    <button class="w-full flex justify-between items-center py-2 text-[16px] font-medium text-gray-800" onclick="toggleAccordion('mobileSolutions')">
                        <span class="hover:text-brand-orange transition-colors">Giải pháp trọn gói</span>
                        <i class="ph ph-caret-down text-sm transition-transform duration-200" id="icon-mobileSolutions"></i>
                    </button>
                    <ul id="mobileSolutions" class="max-h-0 opacity-0 overflow-hidden transition-all duration-500 ease-[cubic-bezier(0.16,1,0.3,1)] space-y-3 text-gray-600 border-l-2 border-orange-100 pl-3">
                        <li class="pt-2"><a href="/giao-duc" class="block w-full text-[15px] hover:text-brand-orange transition-colors"><i class="ph-fill ph-graduation-cap text-brand-orange mr-1"></i> Giáo Dục & Tương Tác</a></li>
                        <li><a href="/hoi-hop-doanh-nghiep" class="block w-full text-[15px] hover:text-brand-orange transition-colors"><i class="ph-fill ph-presentation-chart text-blue-500 mr-1"></i> Hội Họp & Doanh Nghiệp</a></li>
                        <li><a href="/su-kien-san-khau" class="block w-full text-[15px] hover:text-brand-orange transition-colors"><i class="ph-fill ph-microphone-stage text-purple-500 mr-1"></i> Sự Kiện & Sân Khấu</a></li>
                        <li><a href="/quang-cao-thuong-hieu" class="block w-full text-[15px] hover:text-brand-orange transition-colors"><i class="ph-fill ph-storefront text-pink-500 mr-1"></i> Quảng Cáo & Thương Hiệu</a></li>
                        <li><a href="/fnb-giai-tri" class="block w-full text-[15px] hover:text-brand-orange transition-colors"><i class="ph-fill ph-martini text-red-500 mr-1"></i> F&B & Giải Trí Đêm</a></li>
                        <li class="pb-2"><a href="/giai-tri-tai-nha" class="block w-full text-[15px] hover:text-brand-orange transition-colors"><i class="ph-fill ph-house-line text-teal-500 mr-1"></i> Giải Trí Tại Gia</a></li>
                    </ul>
                </div>
                
                <a href="/du-an" class="block py-2 text-[16px] font-medium text-gray-800 border-b border-gray-50 hover:text-brand-orange transition-colors">Dự án tiêu biểu</a>
                <a href="/lien-he" class="block py-2 text-[16px] font-medium text-gray-800 border-b border-gray-50 hover:text-brand-orange transition-colors">Liên hệ</a>
                
                <!-- MOBILE MENU: TOPBAR EXTRAS -->
                <div class="border-b border-gray-50">
                    <button class="w-full flex justify-between items-center py-2 text-[16px] font-medium text-gray-800" onclick="toggleAccordion('mobileExtras')">
                        <span class="text-brand-orange">Tiện ích trực tuyến</span>
                        <i class="ph ph-caret-down text-sm transition-transform duration-200" id="icon-mobileExtras"></i>
                    </button>
                    <div id="mobileExtras" class="max-h-0 opacity-0 overflow-hidden transition-all duration-500 ease-[cubic-bezier(0.16,1,0.3,1)] pl-4 pb-0 space-y-3">
                        <ul class="space-y-3 text-gray-600 border-l-2 border-orange-100 pl-3">
                            <li class="flex items-center gap-2"><i class="ph ph-magnifying-glass text-brand-orange"></i> <a href="#" onclick="toggleSearch(); closeMobileMenu();" class="block flex-1">Tìm kiếm thiết bị</a></li>
                            <li class="flex items-center gap-2"><i class="ph ph-receipt text-brand-orange"></i> <a href="#" class="block flex-1">Gửi yêu cầu Báo giá</a></li>
                            <li class="flex items-center gap-2"><i class="ph ph-wrench text-brand-orange"></i> <a href="#" class="block flex-1">Tra cứu bảo hành</a></li>
                            <li class="flex items-center gap-2"><i class="ph ph-file-text text-brand-orange"></i> <a href="#" class="block flex-1">Chính sách & Hỗ trợ</a></li>
                            <li class="flex items-center gap-2 pt-2 border-t border-gray-100">
                                <span class="text-sm font-semibold mr-2">Ngôn ngữ:</span>
                                <button class="font-bold text-brand-orange">VN</button>
                                <span class="text-gray-300">|</span>
                                <button class="hover:text-brand-orange transition-colors">EN</button>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="p-5 border-t border-gray-100 bg-gray-50">
                <button class="w-full btn-brand py-3 rounded-none font-bold hover:bg-orange-600 transition-colors text-white" style="background-color: var(--primary-color);">Liên hệ chuyên gia</button>
            </div>
        </div>
    </div>

    <!-- SEARCH POP-UP -->
    <div id="searchPopup" class="fixed inset-0 z-50 bg-white/95 backdrop-blur-md flex items-start justify-center pt-20 lg:pt-32 opacity-0 pointer-events-none transition-all duration-500 ease-[cubic-bezier(0.16,1,0.3,1)] [&.active]:opacity-100 [&.active]:pointer-events-auto">
        <div class="container mx-auto px-4 max-w-4xl relative search-content w-full">
            <button onclick="toggleSearch()" class="absolute -top-10 right-4 lg:right-0 text-gray-500 hover:text-brand-orange transition-colors">
                <i class="ph ph-x-circle text-4xl"></i>
            </button>
            
            <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" class="relative w-full">
                <input type="text" name="s" value="<?php echo get_search_query(); ?>" placeholder="Nhập tên sản phẩm, mã thiết bị (SKU)..." 
                       class="w-full text-xl md:text-3xl text-gray-900 border-b-2 border-gray-300 py-4 pr-12 bg-transparent focus:outline-none focus:border-brand-orange transition-colors placeholder-gray-400">
                <button type="submit" class="absolute right-2 top-1/2 -translate-y-1/2 text-brand-orange bg-transparent border-none">
                    <i class="ph ph-magnifying-glass text-3xl"></i>
                </button>
            </form>

            <div class="mt-8">
                <h4 class="text-sm font-semibold text-gray-500 uppercase tracking-wider mb-4">Gợi ý tìm kiếm phổ biến</h4>
                <div class="flex flex-wrap gap-2">
                    <a href="#" class="px-4 py-2 bg-gray-100 hover:bg-orange-50 hover:text-brand-orange rounded-none text-sm text-gray-700 transition-colors">Màn hình LED P2.5 Indoor</a>
                    <a href="#" class="px-4 py-2 bg-gray-100 hover:bg-orange-50 hover:text-brand-orange rounded-none text-sm text-gray-700 transition-colors">Loa Line Array JBL</a>
                </div>
            </div>
        </div>
    </div>
