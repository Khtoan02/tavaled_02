<footer id="colophon" class="bg-tavalls-gradient border-t border-brand-orange/30 pt-16 pb-8 font-sans relative overflow-hidden text-slate-300" style="background: linear-gradient(135deg, #1c2857 0%, #2a3a6b 50%, #1c2857 100%) !important; color: #cbd5e1 !important;">
        
        <!-- Hiệu ứng lưới tech chìm phía sau nền (Grid Mesh) -->
        <div class="absolute inset-0 opacity-[0.03]" style="background-image: linear-gradient(#f05a25 1px, transparent 1px), linear-gradient(90deg, #f05a25 1px, transparent 1px); background-size: 40px 40px; pointer-events: none;"></div>

        <div class="container mx-auto px-4 lg:px-8 max-w-[1600px] relative z-10">
            
            <!-- 1. BRAND HEADER -->
            <div class="border-b border-slate-700 pb-8 mb-10 flex flex-col md:flex-row md:items-end gap-4 justify-between">
                <div>
                    <h2 class="text-4xl font-bold text-white tracking-tight mb-2 uppercase"><?php echo esc_html(\App\Helpers\ThemeHelper::getOption('company_name', get_bloginfo('name'))); ?><sup class="text-sm text-brand-orange ml-1">®</sup></h2>
                    <span class="text-brand-orange font-mono text-sm tracking-widest uppercase">Visual & Audio Technology</span>
                </div>
                <div class="max-w-md text-sm leading-relaxed text-slate-400 text-left md:text-right border-l-2 md:border-l-0 md:border-r-2 border-brand-orange pl-3 md:pl-0 md:pr-3">
                    <?php echo esc_html(\App\Helpers\ThemeHelper::getOption('slogan', 'Chuyên gia cung cấp và thi công giải pháp Màn hình LED, Âm thanh & Ánh sáng chuyên nghiệp hàng đầu tại Việt Nam.')); ?>
                </div>
            </div>

            <!-- 2. SITEMAP MEGA MENU (Đã tối ưu UI Mobile & Tablet dạng Accordion) -->
            <div class="grid grid-cols-1 lg:grid-cols-5 gap-2 lg:gap-12 mb-12">
                
                <!-- Cột 1: LED Trong nhà & Ghép -->
                <div>
                    <div class="border-b border-slate-700/50 lg:border-none pb-3 lg:pb-0 mb-3 lg:mb-10">
                        <h4 class="footer-heading flex justify-between items-center cursor-pointer lg:cursor-default text-white font-bold uppercase text-sm tracking-wider mb-1 lg:mb-5 border-l-2 border-brand-orange pl-3">
                            <span>Màn hình LED trong nhà</span>
                            <svg class="w-5 h-5 lg:hidden transform transition-transform duration-300 chevron-icon text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </h4>
                        <div class="footer-content hidden lg:block pt-3 lg:pt-0">
                            <ul class="space-y-2.5 text-sm text-slate-400 pl-4 lg:pl-0">
                                <li><a href="#" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Màn hình LED P0.9 trong nhà</a></li>
                                <li><a href="#" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Màn hình LED P1.25 trong nhà</a></li>
                                <li><a href="#" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Màn hình LED P1.53 trong nhà</a></li>
                                <li><a href="#" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Màn hình LED P1.8 trong nhà</a></li>
                                <li><a href="#" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Màn hình LED P2 trong nhà</a></li>
                                <li><a href="#" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Màn hình LED P2.5 trong nhà</a></li>
                                <li><a href="#" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Màn hình LED P3 trong nhà</a></li>
                                <li><a href="#" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Màn hình LED P3.0 trong nhà</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="border-b border-slate-700/50 lg:border-none pb-3 lg:pb-0 mb-3 lg:mb-10">
                        <h4 class="footer-heading flex justify-between items-center cursor-pointer lg:cursor-default text-white font-bold uppercase text-sm tracking-wider mb-1 lg:mb-5 border-l-2 border-brand-orange pl-3">
                            <span>Màn hình ghép</span>
                            <svg class="w-5 h-5 lg:hidden transform transition-transform duration-300 chevron-icon text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </h4>
                        <div class="footer-content hidden lg:block pt-3 lg:pt-0">
                            <ul class="space-y-2.5 text-sm text-slate-400 pl-4 lg:pl-0">
                                <li><a href="#" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Màn hình ghép BOE</a></li>
                                <li><a href="#" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Màn hình ghép Orion</a></li>
                                <li><a href="#" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Màn hình ghép Vestel</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Cột 2: LED Ngoài trời & Ứng dụng -->
                <div>
                    <div class="border-b border-slate-700/50 lg:border-none pb-3 lg:pb-0 mb-3 lg:mb-10">
                        <h4 class="footer-heading flex justify-between items-center cursor-pointer lg:cursor-default text-white font-bold uppercase text-sm tracking-wider mb-1 lg:mb-5 border-l-2 border-brand-orange pl-3">
                            <span>Màn hình LED ngoài trời</span>
                            <svg class="w-5 h-5 lg:hidden transform transition-transform duration-300 chevron-icon text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </h4>
                        <div class="footer-content hidden lg:block pt-3 lg:pt-0">
                            <ul class="space-y-2.5 text-sm text-slate-400 pl-4 lg:pl-0">
                                <li><a href="#" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Màn hình LED P2.5 ngoài trời</a></li>
                                <li><a href="#" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Màn hình LED P3 ngoài trời</a></li>
                                <li><a href="#" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Màn hình LED P4 ngoài trời</a></li>
                                <li><a href="#" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Màn hình LED P5 ngoài trời</a></li>
                                <li><a href="#" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Màn hình LED P10 ngoài trời</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="border-b border-slate-700/50 lg:border-none pb-3 lg:pb-0 mb-3 lg:mb-10">
                        <h4 class="footer-heading flex justify-between items-center cursor-pointer lg:cursor-default text-white font-bold uppercase text-sm tracking-wider mb-1 lg:mb-5 border-l-2 border-brand-orange pl-3">
                            <span>Giải pháp trọn gói</span>
                            <svg class="w-5 h-5 lg:hidden transform transition-transform duration-300 chevron-icon text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </h4>
                        <div class="footer-content hidden lg:block pt-3 lg:pt-0">
                            <ul class="space-y-2.5 text-sm text-slate-400 pl-4 lg:pl-0">
                                <li><a href="/giao-duc" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Giáo dục & Tương tác</a></li>
                                <li><a href="/hoi-hop-doanh-nghiep" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Hội họp doanh nghiệp</a></li>
                                <li><a href="/su-kien-san-khau" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Sự kiện & Sân khấu</a></li>
                                <li><a href="/quang-cao-thuong-hieu" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Quảng cáo thương hiệu</a></li>
                                <li><a href="/fnb-giai-tri" class="block hover:text-brand-orange hover:translate-x-1 transition-all">F&B & Giải trí đêm</a></li>
                                <li><a href="/giai-tri-tai-nha" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Giải trí tại gia</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Cột 3: Âm thanh 1 -->
                <div>
                    <div class="border-b border-slate-700/50 lg:border-none pb-3 lg:pb-0 mb-3 lg:mb-8">
                        <h4 class="footer-heading flex justify-between items-center cursor-pointer lg:cursor-default text-white font-bold uppercase text-sm tracking-wider mb-1 lg:mb-5 border-l-2 border-brand-orange pl-3">
                            <span>Bàn trộn âm thanh</span>
                            <svg class="w-5 h-5 lg:hidden transform transition-transform duration-300 chevron-icon text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </h4>
                        <div class="footer-content hidden lg:block pt-3 lg:pt-0">
                            <ul class="space-y-2.5 text-sm text-slate-400 pl-4 lg:pl-0">
                                <li><a href="#" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Mixer Analog</a></li>
                                <li><a href="#" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Mixer Digital (Kỹ thuật số)</a></li>
                                <li><a href="#" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Mixer liền công suất</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="border-b border-slate-700/50 lg:border-none pb-3 lg:pb-0 mb-3 lg:mb-8">
                        <h4 class="footer-heading flex justify-between items-center cursor-pointer lg:cursor-default text-white font-bold uppercase text-sm tracking-wider mb-1 lg:mb-5 border-l-2 border-brand-orange pl-3">
                            <span>Loa chuyên nghiệp</span>
                            <svg class="w-5 h-5 lg:hidden transform transition-transform duration-300 chevron-icon text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </h4>
                        <div class="footer-content hidden lg:block pt-3 lg:pt-0">
                            <ul class="space-y-2.5 text-sm text-slate-400 pl-4 lg:pl-0">
                                <li><a href="#" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Loa Full (Toàn dải)</a></li>
                                <li><a href="#" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Loa Sub (Siêu trầm)</a></li>
                                <li><a href="#" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Loa Array (Treo sân khấu)</a></li>
                                <li><a href="#" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Loa Monitor (Kiểm âm)</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="border-b border-slate-700/50 lg:border-none pb-3 lg:pb-0 mb-3 lg:mb-8">
                        <h4 class="footer-heading flex justify-between items-center cursor-pointer lg:cursor-default text-white font-bold uppercase text-sm tracking-wider mb-1 lg:mb-5 border-l-2 border-brand-orange pl-3">
                            <span>Thiết bị khuếch đại</span>
                            <svg class="w-5 h-5 lg:hidden transform transition-transform duration-300 chevron-icon text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </h4>
                        <div class="footer-content hidden lg:block pt-3 lg:pt-0">
                            <ul class="space-y-2.5 text-sm text-slate-400 pl-4 lg:pl-0">
                                <li><a href="#" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Cục đẩy công suất 2 kênh</a></li>
                                <li><a href="#" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Cục đẩy công suất 4 kênh</a></li>
                                <li><a href="#" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Amply Karaoke / Nghe nhạc</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Cột 4: Âm thanh 2 -->
                <div>
                    <div class="border-b border-slate-700/50 lg:border-none pb-3 lg:pb-0 mb-3 lg:mb-8">
                        <h4 class="footer-heading flex justify-between items-center cursor-pointer lg:cursor-default text-white font-bold uppercase text-sm tracking-wider mb-1 lg:mb-5 border-l-2 border-brand-orange pl-3">
                            <span>Bộ xử lý tín hiệu</span>
                            <svg class="w-5 h-5 lg:hidden transform transition-transform duration-300 chevron-icon text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </h4>
                        <div class="footer-content hidden lg:block pt-3 lg:pt-0">
                            <ul class="space-y-2.5 text-sm text-slate-400 pl-4 lg:pl-0">
                                <li><a href="#" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Vang số / Vang cơ (DSP)</a></li>
                                <li><a href="#" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Crossover (Phân tần)</a></li>
                                <li><a href="#" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Equalizer (Lọc xì)</a></li>
                                <li><a href="#" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Compressor (Nén âm)</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="border-b border-slate-700/50 lg:border-none pb-3 lg:pb-0 mb-3 lg:mb-8">
                        <h4 class="footer-heading flex justify-between items-center cursor-pointer lg:cursor-default text-white font-bold uppercase text-sm tracking-wider mb-1 lg:mb-5 border-l-2 border-brand-orange pl-3">
                            <span>Microphone</span>
                            <svg class="w-5 h-5 lg:hidden transform transition-transform duration-300 chevron-icon text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </h4>
                        <div class="footer-content hidden lg:block pt-3 lg:pt-0">
                            <ul class="space-y-2.5 text-sm text-slate-400 pl-4 lg:pl-0">
                                <li><a href="#" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Micro không dây</a></li>
                                <li><a href="#" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Micro có dây</a></li>
                                <li><a href="#" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Micro cổ ngỗng (Hội thảo)</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="border-b border-slate-700/50 lg:border-none pb-3 lg:pb-0 mb-3 lg:mb-8">
                        <h4 class="footer-heading flex justify-between items-center cursor-pointer lg:cursor-default text-white font-bold uppercase text-sm tracking-wider mb-1 lg:mb-5 border-l-2 border-brand-orange pl-3">
                            <span>Phụ kiện & Nguồn</span>
                            <svg class="w-5 h-5 lg:hidden transform transition-transform duration-300 chevron-icon text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </h4>
                        <div class="footer-content hidden lg:block pt-3 lg:pt-0">
                            <ul class="space-y-2.5 text-sm text-slate-400 pl-4 lg:pl-0">
                                <li><a href="#" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Bộ quản lý nguồn điện</a></li>
                                <li><a href="#" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Dây cáp, Jack cắm (Neutrik...)</a></li>
                                <li><a href="#" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Tủ máy thiết bị (Tủ Rack)</a></li>
                                <li><a href="#" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Chân loa, giá treo</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Cột 5: Dự án & Chính sách -->
                <div>
                    <!-- Về TavaLED -->
                    <div class="border-b border-slate-700/50 lg:border-none pb-3 lg:pb-0 mb-3 lg:mb-10">
                        <h4 class="footer-heading flex justify-between items-center cursor-pointer lg:cursor-default text-white font-bold uppercase text-sm tracking-wider mb-1 lg:mb-5 border-l-2 border-brand-orange pl-3">
                            <span>Về TavaLED</span>
                            <svg class="w-5 h-5 lg:hidden transform transition-transform duration-300 chevron-icon text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </h4>
                        <div class="footer-content hidden lg:block pt-3 lg:pt-0">
                            <ul class="space-y-2.5 text-sm text-slate-400 pl-4 lg:pl-0">
                                <li><a href="/ve-chung-toi" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Câu chuyện thương hiệu</a></li>
                                <li><a href="/tieu-chi-phat-trien" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Tiêu chí phát triển</a></li>
                                <li><a href="/minh-bach-nang-luc" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Hồ sơ năng lực</a></li>
                                <li><a href="/chuyen-gia" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Chuyên gia TavaLED</a></li>
                                <li><a href="/tuyen-dung" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Cơ hội nghề nghiệp</a></li>
                                <li><a href="/du-an" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Công trình dự án</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Chính sách -->
                    <div class="border-b border-slate-700/50 lg:border-none pb-3 lg:pb-0 mb-3 lg:mb-10 lg:mt-6">
                        <h4 class="footer-heading flex justify-between items-center cursor-pointer lg:cursor-default text-white font-bold uppercase text-sm tracking-wider mb-1 lg:mb-5 border-l-2 border-brand-orange pl-3">
                            <span>Chính sách & Quy định</span>
                            <svg class="w-5 h-5 lg:hidden transform transition-transform duration-300 chevron-icon text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </h4>
                        <div class="footer-content hidden lg:block pt-3 lg:pt-0">
                            <ul class="space-y-2.5 text-sm text-slate-400 pl-4 lg:pl-0">
                                <li><a href="<?php echo home_url('/chinh-sach-bao-hanh'); ?>" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Chính sách bảo hành</a></li>
                                <li><a href="<?php echo home_url('/dieu-khoan-su-dung'); ?>" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Điều khoản sử dụng</a></li>
                                <li><a href="<?php echo home_url('/chinh-sach-bao-mat'); ?>" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Chính sách bảo mật</a></li>
                                <li><a href="<?php echo home_url('/chinh-sach-thanh-toan'); ?>" class="block hover:text-brand-orange hover:translate-x-1 transition-all">Chính sách thanh toán</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Phân cách giữa Sitemap và Thông tin liên hệ -->
            <div class="w-full h-px bg-slate-700/50 mb-12"></div>

            <!-- 3. COMPANY INFO GRID (Liên hệ - Văn phòng - Bản đồ) -->
            <div class="grid grid-cols-1 md:grid-cols-12 gap-8 lg:gap-12 mb-12">
                
                <!-- CỘT 1: LIÊN HỆ (Chiếm 3/12 chiều rộng) -->
                <div class="md:col-span-5 lg:col-span-3">
                    <h3 class="text-white font-bold text-lg uppercase tracking-wider mb-6 flex items-center gap-2">
                        <span class="w-2 h-2 bg-brand-orange block"></span> Liên hệ nhanh
                    </h3>
                    <div class="mb-8 space-y-4">
                        <p>
                            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', \App\Helpers\ThemeHelper::getOption('phone_kd', '0936 543 389'))); ?>" class="text-slate-300 hover:text-brand-orange text-[17px] transition-colors flex items-center gap-3 group">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-brand-orange group-hover:scale-110 transition-transform"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                <span class="font-bold tracking-widest"><?php echo esc_html(\App\Helpers\ThemeHelper::getOption('phone_kd', '0936 543 389')); ?></span>
                            </a>
                        </p>
                        <p>
                            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', \App\Helpers\ThemeHelper::getOption('phone_cskh', '0936 543 389'))); ?>" class="text-slate-300 hover:text-brand-orange text-[17px] transition-colors flex items-center gap-3 group">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-brand-orange group-hover:scale-110 transition-transform"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg>
                                <span class="font-bold tracking-widest"><?php echo esc_html(\App\Helpers\ThemeHelper::getOption('phone_cskh', '0936 543 389')); ?></span>
                            </a>
                        </p>
                        <p>
                            <a href="mailto:<?php echo esc_attr(\App\Helpers\ThemeHelper::getOption('email', 'tuyen.tavaco@gmail.com')); ?>" class="text-slate-300 hover:text-brand-orange text-[17px] transition-colors flex items-center gap-3 group">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" class="text-brand-orange group-hover:scale-110 transition-transform"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                <span class="font-medium tracking-wide"><?php echo esc_html(\App\Helpers\ThemeHelper::getOption('email', 'tuyen.tavaco@gmail.com')); ?></span>
                            </a>
                        </p>
                    </div>
                    
                    <!-- Chứng nhận DMCA & Hàng giả -->
                    <div class="flex items-center gap-4">
                        <a href="https://www.dmca.com/Protection/Status.aspx?ID=b0b7c935-c097-42d6-993d-fc94ddf78bf2" title="DMCA.com Protection Status" class="hover:opacity-80 transition-opacity" target="_blank">
                            <img src="https://images.dmca.com/Badges/DMCA_badge_grn_60w.png?ID=b0b7c935-c097-42d6-993d-fc94ddf78bf2" alt="DMCA.com Protection Status" class="h-[28px] w-auto">
                        </a>
                        <a href="#" class="hover:opacity-80 transition-opacity" title="Cam kết 100% Chính hãng">
                            <img src="https://tdclassic.vn/wp-content/uploads/2025/10/Noi-khong-voi-hang-gia.png" alt="Nói không với hàng giả" class="h-[32px] w-auto">
                        </a>
                    </div>
                </div>

                <!-- CỘT 2: HỆ THỐNG VĂN PHÒNG (Chiếm 5/12 chiều rộng, có nhiều không gian hơn cho text dài) -->
                <div class="md:col-span-7 lg:col-span-5">
                    <h3 class="text-white font-bold text-lg uppercase tracking-wider mb-6 flex items-center gap-2">
                        <span class="w-2 h-2 bg-brand-orange block"></span> Hệ thống văn phòng
                    </h3>
                    <div class="space-y-4">
                        
                        <!-- Hải Phòng -->
                        <div class="bg-white/5 border border-slate-700 p-5 hover:border-brand-orange hover:bg-brand-navyLight transition-all duration-300 group cursor-default relative overflow-hidden">
                            <div class="absolute left-0 top-0 w-1 h-0 bg-brand-orange group-hover:h-full transition-all duration-300"></div>
                            <div class="text-white text-sm font-bold flex items-center gap-2 mb-2 group-hover:text-brand-orange transition-colors uppercase tracking-wider">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 21h18M5 21V7l8-4 8 4v14M8 21v-2a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                Trụ Sở & Showroom Hải Phòng
                            </div>
                            <div class="text-xs text-slate-400 leading-relaxed pl-6">
                                <?php echo nl2br(esc_html(\App\Helpers\ThemeHelper::getOption('showroom', 'Lô BT36-06 KĐT thương mại & nhà ở công nhân Tràng Duệ, Phường An Dương, TP Hải Phòng'))); ?>
                            </div>
                        </div>

                        <!-- Hà Nội -->
                        <div class="bg-white/5 border border-slate-700 p-5 hover:border-brand-orange hover:bg-brand-navyLight transition-all duration-300 group cursor-default relative overflow-hidden">
                            <div class="absolute left-0 top-0 w-1 h-0 bg-brand-orange group-hover:h-full transition-all duration-300"></div>
                            <div class="text-white text-sm font-bold flex items-center gap-2 mb-2 group-hover:text-brand-orange transition-colors uppercase tracking-wider">
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="20" height="14" x="2" y="3" rx="2"></rect><line x1="8" x2="16" y1="21" y2="21"></line><line x1="12" x2="12" y1="17" y2="21"></line></svg>
                                Văn Phòng Hà Nội
                            </div>
                            <div class="text-xs text-slate-400 leading-relaxed pl-6">
                                <?php echo nl2br(esc_html(\App\Helpers\ThemeHelper::getOption('office', 'Lô 5 - TT7 - Khu đấu giá Tứ Hiệp, Thanh Trì, Hà Nội'))); ?>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- CỘT 3: MAP (Chiếm 4/12 chiều rộng) -->
                <div class="md:col-span-12 lg:col-span-4 mt-4 lg:mt-0">
                    <h3 class="text-white font-bold text-lg uppercase tracking-wider mb-6 flex items-center gap-2">
                        <span class="w-2 h-2 bg-brand-orange block"></span> Bản đồ chỉ đường
                    </h3>
                    
                    <!-- Wrapper Map hiển thị chuẩn màu thật, có góc cạnh tech -->
                    <!-- Sửa nền map cho tiệp với màu xanh than -->
                    <div class="w-full h-[220px] bg-slate-800 border border-slate-700 shadow-lg p-1 tech-border">
                        <iframe class="w-full h-full" 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3727.999177617507!2d106.70327410000002!3d20.8720834!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x314a7adc297467ef%3A0x2d9f6796b87197c!2zMjIgTmfDtCBRdXnhu4FuLCBU4buVIGTDom4gcGjhu5Egc-G7kSA1LCBOZ8O0IFF1eeG7gW4sIEjhuqNpIFBow7JuZw!5e0!3m2!1svi!2s!4v1754320853116!5m2!1svi!2s" 
                                style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                </div>

            </div>

            <!-- 3. BOTTOM INFO -->
            <div class="border-t border-slate-700 pt-8 flex flex-col md:flex-row justify-between items-center gap-6">
                
                <div class="text-center md:text-left">
                    <p class="text-white font-bold text-sm mb-1 tracking-widest uppercase">© <?php echo date('Y'); ?> CÔNG TY CỔ PHẦN CÔNG NGHỆ TAVA VIỆT NAM</p>
                    <p class="text-xs text-slate-500 font-mono tracking-wide">Mã số thuế: 0201879542 | Cấp ngày: 07/06/2018 | Nơi cấp: Sở Kế hoạch và Đầu tư TP. Hải Phòng</p>
                </div>
                
                <!-- Icon Mạng Xã Hội -->
                <div class="flex gap-4">
                    <!-- Icon Zalo (thường đường dẫn là zalo.me/SĐT) -->
                    <a href="https://zalo.me/<?php echo esc_attr(preg_replace('/[^0-9]/', '', \App\Helpers\ThemeHelper::getOption('zalo', '0936 543 389'))); ?>" target="_blank" class="w-10 h-10 bg-white/5 border border-slate-700 flex items-center justify-center text-slate-400 hover:text-white hover:bg-brand-orange hover:border-brand-orange transition-all duration-300" title="Zalo">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                    </a>
                    <a href="#" class="w-10 h-10 bg-white/5 border border-slate-700 flex items-center justify-center text-slate-400 hover:text-white hover:bg-brand-orange hover:border-brand-orange transition-all duration-300" title="Facebook">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.469h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                    </a>
                    <a href="#" class="w-10 h-10 bg-white/5 border border-slate-700 flex items-center justify-center text-slate-400 hover:text-white hover:bg-brand-orange hover:border-brand-orange transition-all duration-300" title="Youtube">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
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
</div><!-- /.site-wrapper -->

<?php wp_footer(); ?>
</body>
</html>
