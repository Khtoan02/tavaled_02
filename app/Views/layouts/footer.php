<footer id="colophon"
    class="bg-tavalls-gradient border-t border-brand-orange/30 pt-16 pb-8 font-sans relative overflow-hidden text-slate-300"
    style="background: linear-gradient(135deg, #1c2857 0%, #2a3a6b 50%, #1c2857 100%) !important; color: #cbd5e1 !important;">

    <!-- Hiệu ứng lưới tech chìm phía sau nền (Grid Mesh) -->
    <div class="absolute inset-0 opacity-[0.03]"
        style="background-image: linear-gradient(#f05a25 1px, transparent 1px), linear-gradient(90deg, #f05a25 1px, transparent 1px); background-size: 40px 40px; pointer-events: none;">
    </div>

    <div class="container mx-auto px-4 lg:px-8 max-w-[1600px] relative z-10">

        <!-- 1. BRAND HEADER -->
        <div class="border-b border-slate-700 pb-8 mb-10 flex flex-col md:flex-row md:items-end gap-4 justify-between">
            <div>
                <h2 class="text-4xl font-bold text-white tracking-tight mb-2 uppercase">
                    <?php echo esc_html(\App\Helpers\ThemeHelper::getOption('company_name', get_bloginfo('name'))); ?><sup
                        class="text-sm text-brand-orange ml-1">®</sup>
                </h2>
                <span class="text-brand-orange font-mono text-sm tracking-widest uppercase">Visual & Audio
                    Technology</span>
            </div>
            <div
                class="max-w-md text-sm leading-relaxed text-slate-400 text-left md:text-right border-l-2 md:border-l-0 md:border-r-2 border-brand-orange pl-3 md:pl-0 md:pr-3">
                <?php echo esc_html(\App\Helpers\ThemeHelper::getOption('slogan', 'Chuyên gia cung cấp và thi công giải pháp Màn hình LED, Âm thanh & Ánh sáng chuyên nghiệp hàng đầu tại Việt Nam.')); ?>
            </div>
        </div>

        <!-- 2. SITEMAP MEGA MENU (Đã tối ưu UI Mobile & Tablet dạng Accordion) -->
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-2 lg:gap-12 mb-12">

            <!-- Cột 1: LED Trong nhà & Ghép -->
            <div>
                <div class="border-b border-slate-700/50 lg:border-none pb-3 lg:pb-0 mb-3 lg:mb-10">
                    <div role="heading" aria-level="4" class="footer-heading flex justify-between items-center cursor-pointer lg:cursor-default text-white font-bold uppercase text-sm tracking-wider mb-1 lg:mb-5 border-l-2 border-brand-orange pl-3">
                        <span>Màn hình LED trong nhà</span>
                        <svg class="w-5 h-5 lg:hidden transform transition-transform duration-300 chevron-icon text-slate-500"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </div>
                    <div class="footer-content hidden lg:block pt-3 lg:pt-0">
                        <ul class="space-y-2.5 text-sm text-slate-400 pl-4 lg:pl-0">
                            <li><a href="<?php echo home_url('/man-hinh-led'); ?>" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Màn
                                    hình LED P0.9 trong nhà</a></li>
                            <li><a href="<?php echo home_url('/man-hinh-led'); ?>" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Màn
                                    hình LED P1.25 trong nhà</a></li>
                            <li><a href="<?php echo home_url('/man-hinh-led'); ?>" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Màn
                                    hình LED P1.53 trong nhà</a></li>
                            <li><a href="<?php echo home_url('/man-hinh-led'); ?>" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Màn
                                    hình LED P1.8 trong nhà</a></li>
                            <li><a href="<?php echo home_url('/man-hinh-led'); ?>" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Màn
                                    hình LED P2 trong nhà</a></li>
                            <li><a href="<?php echo home_url('/man-hinh-led'); ?>" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Màn
                                    hình LED P2.5 trong nhà</a></li>
                            <li><a href="<?php echo home_url('/man-hinh-led'); ?>" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Màn
                                    hình LED P3 trong nhà</a></li>
                            <li><a href="<?php echo home_url('/man-hinh-led'); ?>" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Màn
                                    hình LED P3.0 trong nhà</a></li>
                        </ul>
                    </div>
                </div>
                <div class="border-b border-slate-700/50 lg:border-none pb-3 lg:pb-0 mb-3 lg:mb-10">
                    <div role="heading" aria-level="4" class="footer-heading flex justify-between items-center cursor-pointer lg:cursor-default text-white font-bold uppercase text-sm tracking-wider mb-1 lg:mb-5 border-l-2 border-brand-orange pl-3">
                        <span>Màn hình ghép</span>
                        <svg class="w-5 h-5 lg:hidden transform transition-transform duration-300 chevron-icon text-slate-500"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </div>
                    <div class="footer-content hidden lg:block pt-3 lg:pt-0">
                        <ul class="space-y-2.5 text-sm text-slate-400 pl-4 lg:pl-0">
                            <li><a href="<?php echo home_url('/man-hinh-led'); ?>" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Màn
                                    hình ghép BOE</a></li>
                            <li><a href="<?php echo home_url('/man-hinh-led'); ?>" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Màn
                                    hình ghép Orion</a></li>
                            <li><a href="<?php echo home_url('/man-hinh-led'); ?>" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Màn
                                    hình ghép Vestel</a></li>
                        </ul>
                    </div>
                </div>
            </div>
 
            <!-- Cột 2: LED Ngoài trời & Ứng dụng -->
            <div>
                <div class="border-b border-slate-700/50 lg:border-none pb-3 lg:pb-0 mb-3 lg:mb-10">
                    <div role="heading" aria-level="4" class="footer-heading flex justify-between items-center cursor-pointer lg:cursor-default text-white font-bold uppercase text-sm tracking-wider mb-1 lg:mb-5 border-l-2 border-brand-orange pl-3">
                        <span>Màn hình LED ngoài trời</span>
                        <svg class="w-5 h-5 lg:hidden transform transition-transform duration-300 chevron-icon text-slate-500"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </div>
                    <div class="footer-content hidden lg:block pt-3 lg:pt-0">
                        <ul class="space-y-2.5 text-sm text-slate-400 pl-4 lg:pl-0">
                            <li><a href="<?php echo home_url('/man-hinh-led'); ?>" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Màn
                                    hình LED P2.5 ngoài trời</a></li>
                            <li><a href="<?php echo home_url('/man-hinh-led'); ?>" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Màn
                                    hình LED P3 ngoài trời</a></li>
                            <li><a href="<?php echo home_url('/man-hinh-led'); ?>" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Màn
                                    hình LED P4 ngoài trời</a></li>
                            <li><a href="<?php echo home_url('/man-hinh-led'); ?>" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Màn
                                    hình LED P5 ngoài trời</a></li>
                            <li><a href="<?php echo home_url('/man-hinh-led'); ?>" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Màn
                                    hình LED P10 ngoài trời</a></li>
                        </ul>
                    </div>
                </div>
                <div class="border-b border-slate-700/50 lg:border-none pb-3 lg:pb-0 mb-3 lg:mb-10">
                    <div role="heading" aria-level="4" class="footer-heading flex justify-between items-center cursor-pointer lg:cursor-default text-white font-bold uppercase text-sm tracking-wider mb-1 lg:mb-5 border-l-2 border-brand-orange pl-3">
                        <span>Giải pháp trọn gói</span>
                        <svg class="w-5 h-5 lg:hidden transform transition-transform duration-300 chevron-icon text-slate-500"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </div>
                    <div class="footer-content hidden lg:block pt-3 lg:pt-0">
                        <ul class="space-y-2.5 text-sm text-slate-400 pl-4 lg:pl-0">
                            <li><a href="<?php echo home_url('/giao-duc'); ?>"
                                    class="block hover:text-brand-orange hover:translate-x-1 transition-all">Giáo dục &
                                    Tương tác</a></li>
                            <li><a href="<?php echo home_url('/hoi-hop-doanh-nghiep'); ?>"
                                    class="block hover:text-brand-orange hover:translate-x-1 transition-all">Hội họp
                                    doanh nghiệp</a></li>
                            <li><a href="<?php echo home_url('/su-kien-san-khau'); ?>"
                                    class="block hover:text-brand-orange hover:translate-x-1 transition-all">Sự kiện &
                                    Sân khấu</a></li>
                            <li><a href="<?php echo home_url('/quang-cao-thuong-hieu'); ?>"
                                    class="block hover:text-brand-orange hover:translate-x-1 transition-all">Quảng cáo
                                    thương hiệu</a></li>
                            <li><a href="<?php echo home_url('/fnb-giai-tri'); ?>"
                                    class="block hover:text-brand-orange hover:translate-x-1 transition-all">F&B & Giải
                                    trí đêm</a></li>
                            <li><a href="<?php echo home_url('/giai-tri-tai-nha'); ?>"
                                    class="block hover:text-brand-orange hover:translate-x-1 transition-all">Giải trí
                                    tại gia</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Cột 3: Âm thanh 1 -->
            <div>
                <div class="border-b border-slate-700/50 lg:border-none pb-3 lg:pb-0 mb-3 lg:mb-8">
                    <div role="heading" aria-level="4" class="footer-heading flex justify-between items-center cursor-pointer lg:cursor-default text-white font-bold uppercase text-sm tracking-wider mb-1 lg:mb-5 border-l-2 border-brand-orange pl-3">
                        <span>Bàn trộn âm thanh</span>
                        <svg class="w-5 h-5 lg:hidden transform transition-transform duration-300 chevron-icon text-slate-500"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </div>
                    <div class="footer-content hidden lg:block pt-3 lg:pt-0">
                        <ul class="space-y-2.5 text-sm text-slate-400 pl-4 lg:pl-0">
                            <li><a href="<?php echo home_url('/thiet-bi-am-thanh'); ?>"
                                    class="block hover:text-brand-orange hover:translate-x-1 transition-all">Mixer
                                    Analog</a></li>
                            <li><a href="<?php echo home_url('/thiet-bi-am-thanh'); ?>"
                                    class="block hover:text-brand-orange hover:translate-x-1 transition-all">Mixer
                                    Digital (Kỹ thuật số)</a></li>
                            <li><a href="<?php echo home_url('/thiet-bi-am-thanh'); ?>"
                                    class="block hover:text-brand-orange hover:translate-x-1 transition-all">Mixer liền
                                    công suất</a></li>
                        </ul>
                    </div>
                </div>
                <div class="border-b border-slate-700/50 lg:border-none pb-3 lg:pb-0 mb-3 lg:mb-8">
                    <div role="heading" aria-level="4" class="footer-heading flex justify-between items-center cursor-pointer lg:cursor-default text-white font-bold uppercase text-sm tracking-wider mb-1 lg:mb-5 border-l-2 border-brand-orange pl-3">
                        <span>Loa chuyên nghiệp</span>
                        <svg class="w-5 h-5 lg:hidden transform transition-transform duration-300 chevron-icon text-slate-500"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </div>
                    <div class="footer-content hidden lg:block pt-3 lg:pt-0">
                        <ul class="space-y-2.5 text-sm text-slate-400 pl-4 lg:pl-0">
                            <li><a href="<?php echo home_url('/thiet-bi-am-thanh'); ?>" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Loa
                                    Full (Toàn dải)</a></li>
                            <li><a href="<?php echo home_url('/thiet-bi-am-thanh'); ?>" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Loa
                                    Sub (Siêu trầm)</a></li>
                            <li><a href="<?php echo home_url('/thiet-bi-am-thanh'); ?>" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Loa
                                    Array (Treo sân khấu)</a></li>
                            <li><a href="<?php echo home_url('/thiet-bi-am-thanh'); ?>" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Loa
                                    Monitor (Kiểm âm)</a></li>
                        </ul>
                    </div>
                </div>
                <div class="border-b border-slate-700/50 lg:border-none pb-3 lg:pb-0 mb-3 lg:mb-8">
                    <div role="heading" aria-level="4" class="footer-heading flex justify-between items-center cursor-pointer lg:cursor-default text-white font-bold uppercase text-sm tracking-wider mb-1 lg:mb-5 border-l-2 border-brand-orange pl-3">
                        <span>Thiết bị khuếch đại</span>
                        <svg class="w-5 h-5 lg:hidden transform transition-transform duration-300 chevron-icon text-slate-500"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </div>
                    <div class="footer-content hidden lg:block pt-3 lg:pt-0">
                        <ul class="space-y-2.5 text-sm text-slate-400 pl-4 lg:pl-0">
                            <li><a href="<?php echo home_url('/thiet-bi-am-thanh'); ?>" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Cục
                                    đẩy công suất 2 kênh</a></li>
                            <li><a href="<?php echo home_url('/thiet-bi-am-thanh'); ?>" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Cục
                                    đẩy công suất 4 kênh</a></li>
                            <li><a href="<?php echo home_url('/thiet-bi-am-thanh'); ?>"
                                    class="block hover:text-brand-orange hover:translate-x-1 transition-all">Amply
                                    Karaoke / Nghe nhạc</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Cột 4: Âm thanh 2 -->
            <div>
                <div class="border-b border-slate-700/50 lg:border-none pb-3 lg:pb-0 mb-3 lg:mb-8">
                    <div role="heading" aria-level="4" class="footer-heading flex justify-between items-center cursor-pointer lg:cursor-default text-white font-bold uppercase text-sm tracking-wider mb-1 lg:mb-5 border-l-2 border-brand-orange pl-3">
                        <span>Bộ xử lý tín hiệu</span>
                        <svg class="w-5 h-5 lg:hidden transform transition-transform duration-300 chevron-icon text-slate-500"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </div>
                    <div class="footer-content hidden lg:block pt-3 lg:pt-0">
                        <ul class="space-y-2.5 text-sm text-slate-400 pl-4 lg:pl-0">
                            <li><a href="<?php echo home_url('/thiet-bi-am-thanh'); ?>"
                                    class="block hover:text-brand-orange hover:translate-x-1 transition-all">Vang số /
                                    Vang cơ (DSP)</a></li>
                            <li><a href="<?php echo home_url('/thiet-bi-am-thanh'); ?>"
                                    class="block hover:text-brand-orange hover:translate-x-1 transition-all">Crossover
                                    (Phân tần)</a></li>
                            <li><a href="<?php echo home_url('/thiet-bi-am-thanh'); ?>"
                                    class="block hover:text-brand-orange hover:translate-x-1 transition-all">Equalizer
                                    (Lọc xì)</a></li>
                            <li><a href="<?php echo home_url('/thiet-bi-am-thanh'); ?>"
                                    class="block hover:text-brand-orange hover:translate-x-1 transition-all">Compressor
                                    (Nén âm)</a></li>
                        </ul>
                    </div>
                </div>
                <div class="border-b border-slate-700/50 lg:border-none pb-3 lg:pb-0 mb-3 lg:mb-8">
                    <div role="heading" aria-level="4" class="footer-heading flex justify-between items-center cursor-pointer lg:cursor-default text-white font-bold uppercase text-sm tracking-wider mb-1 lg:mb-5 border-l-2 border-brand-orange pl-3">
                        <span>Microphone</span>
                        <svg class="w-5 h-5 lg:hidden transform transition-transform duration-300 chevron-icon text-slate-500"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </div>
                    <div class="footer-content hidden lg:block pt-3 lg:pt-0">
                        <ul class="space-y-2.5 text-sm text-slate-400 pl-4 lg:pl-0">
                            <li><a href="<?php echo home_url('/thiet-bi-am-thanh'); ?>"
                                    class="block hover:text-brand-orange hover:translate-x-1 transition-all">Micro không
                                    dây</a></li>
                            <li><a href="<?php echo home_url('/thiet-bi-am-thanh'); ?>"
                                    class="block hover:text-brand-orange hover:translate-x-1 transition-all">Micro có
                                    dây</a></li>
                            <li><a href="<?php echo home_url('/thiet-bi-am-thanh'); ?>"
                                    class="block hover:text-brand-orange hover:translate-x-1 transition-all">Micro cổ
                                    ngỗng (Hội thảo)</a></li>
                        </ul>
                    </div>
                </div>
                <div class="border-b border-slate-700/50 lg:border-none pb-3 lg:pb-0 mb-3 lg:mb-8">
                    <div role="heading" aria-level="4" class="footer-heading flex justify-between items-center cursor-pointer lg:cursor-default text-white font-bold uppercase text-sm tracking-wider mb-1 lg:mb-5 border-l-2 border-brand-orange pl-3">
                        <span>Phụ kiện & Nguồn</span>
                        <svg class="w-5 h-5 lg:hidden transform transition-transform duration-300 chevron-icon text-slate-500"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </div>
                    <div class="footer-content hidden lg:block pt-3 lg:pt-0">
                        <ul class="space-y-2.5 text-sm text-slate-400 pl-4 lg:pl-0">
                            <li><a href="<?php echo home_url('/thiet-bi-am-thanh'); ?>" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Bộ
                                    quản lý nguồn điện</a></li>
                            <li><a href="<?php echo home_url('/thiet-bi-am-thanh'); ?>" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Dây
                                    cáp, Jack cắm (Neutrik...)</a></li>
                            <li><a href="<?php echo home_url('/thiet-bi-am-thanh'); ?>" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Tủ
                                    máy thiết bị (Tủ Rack)</a></li>
                            <li><a href="<?php echo home_url('/thiet-bi-am-thanh'); ?>"
                                    class="block hover:text-brand-orange hover:translate-x-1 transition-all">Chân loa,
                                    giá treo</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Cột 5: Dự án & Chính sách -->
            <div>
                <!-- Về TavaLLS -->
                <div class="border-b border-slate-700/50 lg:border-none pb-3 lg:pb-0 mb-3 lg:mb-10">
                    <div role="heading" aria-level="4" class="footer-heading flex justify-between items-center cursor-pointer lg:cursor-default text-white font-bold uppercase text-sm tracking-wider mb-1 lg:mb-5 border-l-2 border-brand-orange pl-3">
                        <span>Về TavaLLS</span>
                        <svg class="w-5 h-5 lg:hidden transform transition-transform duration-300 chevron-icon text-slate-500"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </div>
                    <div class="footer-content hidden lg:block pt-3 lg:pt-0">
                        <ul class="space-y-2.5 text-sm text-slate-400 pl-4 lg:pl-0">
                            <li><a href="<?php echo home_url('/ve-chung-toi'); ?>"
                                    class="block hover:text-brand-orange hover:translate-x-1 transition-all">Câu chuyện
                                    thương hiệu</a></li>
                            <li><a href="<?php echo home_url('/tieu-chi-phat-trien'); ?>"
                                    class="block hover:text-brand-orange hover:translate-x-1 transition-all">Tiêu chí
                                    phát triển</a></li>
                            <li><a href="<?php echo home_url('/minh-bach-nang-luc'); ?>"
                                    class="block hover:text-brand-orange hover:translate-x-1 transition-all">Hồ sơ năng
                                    lực</a></li>
                            <li><a href="<?php echo home_url('/chuyen-gia'); ?>"
                                    class="block hover:text-brand-orange hover:translate-x-1 transition-all">Chuyên gia
                                    TavaLLS</a></li>
                            <li><a href="<?php echo home_url('/tuyen-dung'); ?>"
                                    class="block hover:text-brand-orange hover:translate-x-1 transition-all">Cơ hội nghề
                                    nghiệp</a></li>
                            <li><a href="<?php echo home_url('/du-an-tieu-bieu'); ?>"
                                    class="block hover:text-brand-orange hover:translate-x-1 transition-all">Công trình
                                    dự án</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Chính sách -->
                <div class="border-b border-slate-700/50 lg:border-none pb-3 lg:pb-0 mb-3 lg:mb-10 lg:mt-6">
                    <div role="heading" aria-level="4" class="footer-heading flex justify-between items-center cursor-pointer lg:cursor-default text-white font-bold uppercase text-sm tracking-wider mb-1 lg:mb-5 border-l-2 border-brand-orange pl-3">
                        <span>Chính sách & Quy định</span>
                        <svg class="w-5 h-5 lg:hidden transform transition-transform duration-300 chevron-icon text-slate-500"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                            </path>
                        </svg>
                    </div>
                    <div class="footer-content hidden lg:block pt-3 lg:pt-0">
                        <ul class="space-y-2.5 text-sm text-slate-400 pl-4 lg:pl-0">
                            <li><a href="<?php echo home_url('/chinh-sach-bao-hanh'); ?>"
                                    class="block hover:text-brand-orange hover:translate-x-1 transition-all">Chính sách
                                    bảo hành</a></li>
                            <li><a href="<?php echo home_url('/dieu-khoan-su-dung'); ?>"
                                    class="block hover:text-brand-orange hover:translate-x-1 transition-all">Điều khoản
                                    sử dụng</a></li>
                            <li><a href="<?php echo home_url('/chinh-sach-bao-mat'); ?>"
                                    class="block hover:text-brand-orange hover:translate-x-1 transition-all">Chính sách
                                    bảo mật</a></li>
                            <li><a href="<?php echo home_url('/chinh-sach-thanh-toan'); ?>"
                                    class="block hover:text-brand-orange hover:translate-x-1 transition-all">Chính sách
                                    thanh toán</a></li>
                            <li><a href="<?php echo home_url('/tieu-chi-phat-trien'); ?>"
                                    class="block hover:text-brand-orange hover:translate-x-1 transition-all">Chính sách kiểm duyệt thông tin</a></li>
                            <li><a href="<?php echo home_url('/minh-bach-nang-luc'); ?>"
                                    class="block hover:text-brand-orange hover:translate-x-1 transition-all">Chứng chỉ năng lực chuyên môn</a></li>
                        </ul>
                    </div>
                </div>

                <!-- Chứng nhận DMCA & Hàng giả -->
                <div class="mt-6 flex items-center gap-5">
                    <a href="https://www.dmca.com/Protection/Status.aspx?ID=b0b7c935-c097-42d6-993d-fc94ddf78bf2"
                        title="DMCA.com Protection Status" class="hover:opacity-80 transition-opacity shrink-0" target="_blank">
                        <img src="https://images.dmca.com/Badges/DMCA_badge_grn_60w.png?ID=b0b7c935-c097-42d6-993d-fc94ddf78bf2"
                            alt="DMCA.com Protection Status" style="height: 70px; width: auto;">
                    </a>
                    <a href="<?php echo home_url('/chinh-sach-bao-hanh'); ?>" class="hover:opacity-80 transition-opacity shrink-0" title="Cam kết 100% Chính hãng">
                        <img src="<?php echo esc_url(TAVALED_URI . '/assets/images/noi-khong-voi-hang-gia.png'); ?>"
                            alt="Nói không với hàng giả" style="height: 70px; width: auto;">
                    </a>
                </div>
            </div>

        </div>

        <!-- Phân cách giữa Sitemap và Thông tin liên hệ -->
        <div class="w-full h-px bg-slate-700/50 mb-12"></div>

        <!-- 3. LIÊN HỆ & BẢN ĐỒ — Unified Glass Panel -->
        <div class="mb-12 rounded-2xl overflow-hidden" style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.06); backdrop-filter: blur(12px); -webkit-backdrop-filter: blur(12px);">
            <div class="grid grid-cols-1 lg:grid-cols-5">

                <!-- LEFT: Thông tin liên hệ (3/5) -->
                <div class="lg:col-span-3 p-6 lg:p-8 flex flex-col justify-center">
                    <div role="heading" aria-level="3" class="text-white font-bold text-[15px] uppercase tracking-wider mb-6 flex items-center gap-2.5">
                        <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background: rgba(240,90,37,0.15); border: 1px solid rgba(240,90,37,0.25);">
                            <i class="ph-fill ph-buildings text-brand-orange text-sm"></i>
                        </div>
                        Trụ sở & Liên hệ
                    </div>

                    <!-- Info Items — clean inline style -->
                    <div class="space-y-5">
                        <!-- Địa chỉ -->
                        <div class="flex items-start gap-3">
                            <i class="ph-fill ph-map-pin text-brand-orange text-base mt-0.5 shrink-0"></i>
                            <div>
                                <span class="block text-[10px] text-slate-500 uppercase tracking-wider font-semibold mb-1">Địa chỉ</span>
                                <span class="text-slate-200 text-[14px] leading-relaxed"><?php echo esc_html(\App\Helpers\ThemeHelper::getOption('address', 'Lô BT36-06 KĐT thương mại & nhà ở công nhân Tràng Duệ, Phường An Dương, TP Hải Phòng')); ?></span>
                            </div>
                        </div>

                        <!-- Divider -->
                        <div class="w-full h-px" style="background: rgba(255,255,255,0.06);"></div>

                        <!-- Hotline + Email — inline row -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', (string)\App\Helpers\ThemeHelper::getOption('phone', '0934 29 8181'))); ?>"
                                class="flex items-center gap-3 group">
                                <i class="ph-fill ph-phone-call text-brand-orange text-base shrink-0"></i>
                                <div>
                                    <span class="block text-[10px] text-slate-500 uppercase tracking-wider font-semibold mb-0.5">Hotline</span>
                                    <span class="text-white font-bold text-[17px] tracking-wider group-hover:text-brand-orange transition-colors"><?php echo esc_html((string)\App\Helpers\ThemeHelper::getOption('phone', '0934 29 8181')); ?></span>
                                </div>
                            </a>
                            <a href="mailto:<?php echo esc_attr((string)\App\Helpers\ThemeHelper::getOption('email', 'tuyen.tavaco@gmail.com')); ?>"
                                class="flex items-center gap-3 group">
                                <i class="ph-fill ph-envelope-simple text-brand-orange text-base shrink-0"></i>
                                <div>
                                    <span class="block text-[10px] text-slate-500 uppercase tracking-wider font-semibold mb-0.5">Email</span>
                                    <span class="text-slate-200 font-medium text-[14px] tracking-wide group-hover:text-brand-orange transition-colors"><?php echo esc_html((string)\App\Helpers\ThemeHelper::getOption('email', 'tuyen.tavaco@gmail.com')); ?></span>
                                </div>
                            </a>
                        </div>

                        <!-- Divider -->
                        <div class="w-full h-px" style="background: rgba(255,255,255,0.06);"></div>

                        <!-- Giờ làm việc -->
                        <div class="flex items-center gap-3">
                            <i class="ph-fill ph-clock text-brand-orange text-base shrink-0"></i>
                            <div>
                                <span class="block text-[10px] text-slate-500 uppercase tracking-wider font-semibold mb-0.5">Giờ làm việc</span>
                                <span class="text-slate-300 text-[13px]">T2 – T7: 8:00 – 17:30 &nbsp;·&nbsp; CN: Nghỉ</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- RIGHT: Bản đồ (2/5) -->
                <div class="lg:col-span-2 min-h-[220px] lg:min-h-0 relative" style="border-left: 1px solid rgba(255,255,255,0.06);">
                    <iframe class="absolute inset-0 w-full h-full"
                        src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d1055.287260970714!2d106.57969878355183!3d20.85730643954791!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1778349477194!5m2!1svi!2s"
                        style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

            </div>
        </div>

        <?php
        $cskh_val = (string)\App\Helpers\ThemeHelper::getOption('phone_cskh', '');
        $cskh_data = json_decode($cskh_val, true);
        if (!is_array($cskh_data)) {
            $cskh_data = [];
            $phones = array_filter(array_map('trim', explode("\n", str_replace(',', "\n", $cskh_val))));
            foreach ($phones as $p) {
                $cskh_data[] = ['name' => 'CSKH', 'role' => '', 'phone' => $p, 'email' => ''];
            }
        }
        if (is_array($cskh_data) && !empty($cskh_data)):
            ?>
            <!-- CSKH RIBBON -->
            <div class="pt-10 pb-8" style="border-top: 1px solid rgba(255,255,255,0.06);">
                <!-- Tiêu đề premium -->
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-9 h-9 rounded-xl flex items-center justify-center" style="background: rgba(240,90,37,0.15); border: 1px solid rgba(240,90,37,0.25);">
                        <i class="ph-fill ph-headset text-brand-orange text-lg"></i>
                    </div>
                    <div>
                        <div role="heading" aria-level="3" class="text-white font-bold text-[15px] uppercase tracking-wider leading-tight">Hỗ trợ khách hàng & Kinh doanh</div>
                        <p class="text-slate-500 text-[11px] font-medium mt-0.5">Liên hệ trực tiếp đội ngũ tư vấn</p>
                    </div>
                    <span class="ml-auto text-[11px] text-slate-500 font-medium hidden sm:block"><?php echo count($cskh_data); ?> nhân sự</span>
                </div>
                <!-- Grid cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-3">
                    <?php foreach ($cskh_data as $cskh_item):
                        $cskh_clean = preg_replace('/[^0-9]/', '', (string)($cskh_item['phone'] ?? ''));
                    ?>
                    <div class="footer-cskh-card rounded-xl overflow-hidden group transition-all duration-300 hover:-translate-y-1" style="background: rgba(255,255,255,0.04); border: 1px solid rgba(255,255,255,0.06); backdrop-filter: blur(8px); -webkit-backdrop-filter: blur(8px);">
                        <div class="p-4">
                            <!-- Avatar + Info -->
                            <div class="flex items-center gap-3 mb-3.5">
                                <?php if (!empty($cskh_item['avatar'])): ?>
                                    <img src="<?php echo esc_url($cskh_item['avatar']); ?>" alt="<?php echo esc_attr($cskh_item['name']); ?> - Chuyên viên TavaLLS" class="w-12 h-12 rounded-full object-cover shrink-0 shadow-lg" style="ring: 2px solid rgba(255,255,255,0.1);">
                                <?php else: ?>
                                    <div class="w-12 h-12 rounded-full flex items-center justify-center shrink-0 shadow-lg" style="background: linear-gradient(135deg, rgba(251,146,60,0.4), rgba(249,115,22,0.6)); border: 1px solid rgba(251,146,60,0.3);">
                                        <i class="ph-fill ph-user text-xl text-white/80"></i>
                                    </div>
                                <?php endif; ?>
                                <div class="flex-1 min-w-0">
                                    <span class="text-white text-[14px] font-bold truncate block leading-tight"><?php echo esc_html($cskh_item['name'] ?: 'Nhân viên'); ?></span>
                                    <?php if (!empty($cskh_item['role'])): ?>
                                        <span class="text-[10px] uppercase font-semibold tracking-wider text-brand-orange truncate block mt-0.5"><?php echo esc_html($cskh_item['role']); ?></span>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <!-- SĐT + Email -->
                            <div class="space-y-2 pt-3" style="border-top: 1px dashed rgba(255,255,255,0.06);">
                                <a href="tel:<?php echo esc_attr($cskh_clean); ?>" class="text-slate-300 hover:text-white font-bold text-[13px] tracking-wide transition-colors flex items-center gap-2">
                                    <i class="ph-fill ph-phone-call text-brand-orange text-[14px]"></i>
                                    <?php echo esc_html($cskh_item['phone']); ?>
                                </a>
                                <?php if (!empty($cskh_item['email'])): ?>
                                    <a href="mailto:<?php echo esc_attr($cskh_item['email']); ?>" class="text-slate-300 hover:text-slate-300 text-[11px] transition-colors flex items-center gap-2 truncate">
                                        <i class="ph-fill ph-envelope-simple text-slate-600 text-[13px]"></i>
                                        <span class="truncate"><?php echo esc_html($cskh_item['email']); ?></span>
                                    </a>
                                <?php endif; ?>
                            </div>
                            <!-- Action Buttons -->
                            <div class="mt-3 pt-3 flex items-center gap-2" style="border-top: 1px solid rgba(255,255,255,0.04);">
                                <a href="tel:<?php echo esc_attr($cskh_clean); ?>" class="footer-cskh-call flex-1 flex items-center justify-center gap-1.5 h-[32px] text-slate-300 text-[11px] font-bold rounded-lg transition-all hover:text-white" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.08);">
                                    <i class="ph-fill ph-phone-call text-[12px]"></i> Gọi<span style="position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0, 0, 0, 0); white-space: nowrap; border: 0;"> <?php echo esc_html($cskh_item['name']); ?></span>
                                </a>
                                <a href="https://zalo.me/<?php echo esc_attr($cskh_clean); ?>" target="_blank" class="footer-cskh-zalo flex-1 flex items-center justify-center gap-1.5 h-[32px] text-[#4d9fff] text-[11px] font-bold rounded-lg transition-all" style="background: rgba(0,104,255,0.1); border: 1px solid rgba(0,104,255,0.2);">
                                    ZALO<span style="position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0, 0, 0, 0); white-space: nowrap; border: 0;"> <?php echo esc_html($cskh_item['name']); ?></span>
                                </a>
                                <?php if (!empty($cskh_item['email'])): ?>
                                <a href="mailto:<?php echo esc_attr($cskh_item['email']); ?>" class="footer-cskh-email flex items-center justify-center w-[32px] h-[32px] text-slate-500 rounded-lg transition-all" style="background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.08);" title="<?php echo esc_attr($cskh_item['email']); ?>">
                                    <i class="ph-fill ph-envelope-simple text-[13px]"></i>
                                </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        <?php endif; ?>

        <!-- 3. BOTTOM INFO -->
        <div class="border-t border-slate-700 pt-8 flex flex-col md:flex-row justify-between items-center gap-6">

            <div class="text-center md:text-left">
                <p class="text-white font-bold text-sm mb-1 tracking-widest uppercase">© <?php echo date('Y'); ?> CÔNG
                    TY CỔ PHẦN CÔNG NGHỆ TAVA VIỆT NAM</p>
                <p class="text-xs text-slate-500 font-mono tracking-wide">Mã số thuế: 0201879542 | Cấp ngày: 07/06/2018
                    | Nơi cấp: Sở Kế hoạch và Đầu tư TP. Hải Phòng</p>
            </div>

            <!-- Icon Mạng Xã Hội -->
            <div class="flex gap-4">
                <!-- Icon Zalo (thường đường dẫn là zalo.me/SĐT) -->
                <?php
                $main_phone = (string)\App\Helpers\ThemeHelper::getOption('phone', '0934 29 8181');
                $facebook_url = (string)(\App\Helpers\ThemeHelper::getOption('facebook_link') ?: 'https://www.facebook.com/tavalls.official');
                $youtube_url = (string)(\App\Helpers\ThemeHelper::getOption('youtube_link') ?: '#');
                ?>
                <a href="https://zalo.me/<?php echo esc_attr(preg_replace('/[^0-9]/', '', (string)$main_phone)); ?>"
                    target="_blank"
                    class="w-10 h-10 bg-white/5 border border-slate-700 flex items-center justify-center text-slate-400 hover:text-white hover:bg-[#0068ff] hover:border-[#0068ff] transition-all duration-300"
                    title="Zalo">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z">
                        </path>
                    </svg>
                </a>
                <a href="<?php echo esc_url($facebook_url); ?>"
                    target="_blank"
                    rel="noopener"
                    class="w-10 h-10 bg-white/5 border border-slate-700 flex items-center justify-center text-slate-400 hover:text-white hover:bg-brand-orange hover:border-brand-orange transition-all duration-300"
                    title="Facebook">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.469h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                    </svg>
                </a>
                <a href="<?php echo esc_url($youtube_url); ?>"
                    target="_blank"
                    rel="noopener"
                    class="w-10 h-10 bg-white/5 border border-slate-700 flex items-center justify-center text-slate-400 hover:text-white hover:bg-brand-orange hover:border-brand-orange transition-all duration-300"
                    title="Youtube">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                    </svg>
                </a>
            </div>

        </div>

    </div>
</footer>

<!-- Script xử lý Accordion (Menu nếp gấp) cho Mobile & Tablet -->
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const headings = document.querySelectorAll('.footer-heading');

        headings.forEach(heading => {
            heading.addEventListener('click', () => {
                // Chỉ kích hoạt chức năng ẩn/hiện trên màn hình < 1024px (Mobile & Tablet)
                if (window.innerWidth >= 1024) return;

                const content = heading.nextElementSibling;
                const icon = heading.querySelector('.chevron-icon');

                // Thao tác Đóng/Mở
                if (content.classList.contains('hidden')) {
                    content.classList.remove('hidden');
                    icon.classList.add('rotate-180'); // Xoay mũi tên lên
                } else {
                    content.classList.add('hidden');
                    icon.classList.remove('rotate-180'); // Xoay mũi tên xuống
                }
            });
        });
    });
</script>

<!-- Social Share Floating Buttons Widget -->
<style>
.tava-share-widget {
    position: fixed;
    left: 24px;
    bottom: 32px;
    display: flex;
    flex-direction: column;
    gap: 12px;
    z-index: 9999;
}
.tava-share-btn {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
    box-shadow: 0 4px 16px rgba(0,0,0,0.18);
    transition: transform 0.25s cubic-bezier(0.175, 0.885, 0.32, 1.275);
}
.tava-share-btn:hover {
    transform: scale(1.18);
}
.tava-share-facebook { background: #1877f2; }
.tava-share-twitter { background: #000000; }
.tava-share-zalo { background: #0068ff; }

@media (max-width: 1024px) {
    .tava-share-widget {
        display: none; /* Ẩn trên mobile để tối ưu diện tích hiển thị */
    }
}

/* CSKH Card Hover Styles - Clean CSS replacements for inline event handlers */
.footer-cskh-card {
    transition: all 0.3s ease;
}
.footer-cskh-card:hover {
    background: rgba(255, 255, 255, 0.08) !important;
    border-color: rgba(240, 90, 37, 0.3) !important;
    box-shadow: 0 8px 30px rgba(240, 90, 37, 0.08) !important;
}
.footer-cskh-call {
    transition: all 0.2s ease;
}
.footer-cskh-call:hover {
    background: #f05a25 !important;
    border-color: #f05a25 !important;
    color: #fff !important;
}
.footer-cskh-zalo {
    transition: all 0.2s ease;
}
.footer-cskh-zalo:hover {
    background: #0068ff !important;
    border-color: #0068ff !important;
    color: #fff !important;
}
.footer-cskh-email {
    transition: all 0.2s ease;
}
.footer-cskh-email:hover {
    background: rgba(255, 255, 255, 0.15) !important;
    border-color: rgba(255, 255, 255, 0.2) !important;
    color: #fff !important;
}
</style>
<div class="tava-share-widget" aria-label="Chia sẻ mạng xã hội">
    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(home_url('/')); ?>" target="_blank" rel="noopener" class="tava-share-btn tava-share-facebook" aria-label="Chia sẻ Facebook">
        <i class="ph-fill ph-facebook-logo" style="font-size: 22px;"></i>
    </a>
    <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(home_url('/')); ?>&text=<?php echo urlencode('TavaLLS - Thi công trọn gói màn hình trình chiếu, âm thanh & ánh sáng'); ?>" target="_blank" rel="noopener" class="tava-share-btn tava-share-twitter" aria-label="Chia sẻ Twitter">
        <i class="ph-bold ph-twitter-logo" style="font-size: 20px;"></i>
    </a>
    <a href="https://zalo.me/<?php echo esc_attr(preg_replace('/[^0-9]/', '', (string)\App\Helpers\ThemeHelper::getOption('phone', '0934298181'))); ?>" target="_blank" rel="noopener" class="tava-share-btn tava-share-zalo" aria-label="Liên hệ Zalo">
        <i class="ph-fill ph-chat-circle-dots" style="font-size: 22px;"></i>
    </a>
</div>

</div><!-- /.site-wrapper -->

<?php wp_footer(); ?>
</body>

</html>