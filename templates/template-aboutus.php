<?php
/**
 * Template Name: Trang về chúng tôi
 */

get_header(); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;900&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Space+Grotesk:wght@400;700&display=swap" rel="stylesheet">
    
    <style>
        /* BASE & SCROLL */
        body { font-family: 'Inter', sans-serif; background-color: #fffcfb; margin: 0; overflow-x: hidden; color: #1e293b; }
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #0a0f1a; }
        ::-webkit-scrollbar-thumb { background: #f05a25; }

        /* SẮC LẠNH - KHÔNG BO GÓC */
        *, *::before, *::after { border-radius: 0 !important; }

        /* HIỆU ỨNG TEXT NGHỆ THUẬT (WATERMARK) */
        .text-stroke-light { color: transparent; -webkit-text-stroke: 1px rgba(0, 0, 0, 0.05); }
        .text-stroke-dark { color: transparent; -webkit-text-stroke: 1px rgba(255, 255, 255, 0.05); }
        .text-stroke-orange { color: transparent; -webkit-text-stroke: 1px rgba(240, 90, 37, 0.15); }

        /* GRADIENT & KÍNH MỜ (TECH VIBE) */
        .glass-dark { background: rgba(10, 15, 26, 0.7); backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.05); }
        .glass-light { background: rgba(255, 255, 255, 0.8); backdrop-filter: blur(20px); border: 1px solid rgba(0,0,0,0.05); }
        .bg-mesh-dark { background: radial-gradient(at 0% 0%, rgba(240,90,37,0.15) 0px, transparent 50%), radial-gradient(at 100% 100%, rgba(30,41,59,0.5) 0px, transparent 50%), #0a0f1a; }
        .text-gradient { background: linear-gradient(to right, #f05a25, #ff8c69); -webkit-background-clip: text; -webkit-text-fill-color: transparent; }

        /* SCROLL REVEAL (MƯỢT MÀ) */
        .reveal-up { opacity: 0; transform: translateY(50px) scale(0.98); transition: all 1.2s cubic-bezier(0.16, 1, 0.3, 1); }
        .reveal-up.active { opacity: 1; transform: translateY(0) scale(1); }
        .reveal-delay-1 { transition-delay: 0.15s; }
        .reveal-delay-2 { transition-delay: 0.3s; }

        /* ĐƯỜNG DẪN CHUYỆN (THE SPINE) */
        .spine-line { position: absolute; left: 50px; top: 0; bottom: 0; width: 1px; background: linear-gradient(to bottom, transparent, rgba(240,90,37,0.5), rgba(240,90,37,0.8), transparent); z-index: 0; pointer-events: none; }
        @media (max-width: 768px) { .spine-line { left: 20px; } }

        /* MASONRY & MAP */
        .masonry-grid { display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); grid-auto-rows: 200px; grid-auto-flow: dense; gap: 16px; }
        .masonry-large { grid-column: span 2; grid-row: span 2; }
        .masonry-tall { grid-row: span 2; }
        .masonry-wide { grid-column: span 2; }
        @media (min-width: 768px) { .masonry-grid { grid-template-columns: repeat(4, 1fr); } }

        /* MỚI: MASSIVE GALLERY GRID TỪ TRANG CHỦ */
        .gallery-wrap { position: relative; overflow: hidden; max-height: 120vh; transition: max-height 1s cubic-bezier(0.16, 1, 0.3, 1); }
        .gallery-wrap.expanded { max-height: 10000px; }
        .gallery-grid { column-count: 2; column-gap: 2px; margin-bottom: 0px; }
        @media (min-width: 768px) { .gallery-grid { column-count: 3; } }
        @media (min-width: 1024px) { .gallery-grid { column-count: 4; } }
        @media (min-width: 1280px) { .gallery-grid { column-count: 5; } }
        .g-item { break-inside: avoid; margin-bottom: 2px; overflow: hidden; position: relative; }
        .g-item img { width: 100%; height: auto; object-fit: cover; display: block; transition: transform 0.8s ease; }
        .g-item:hover img { transform: scale(1.03); }
        .gallery-overlay { position: absolute; bottom: 0; left: 0; width: 100%; height: 400px; background: linear-gradient(to bottom, transparent, #020617 80%, #020617 100%); display: flex; align-items: flex-end; justify-content: center; padding-bottom: 40px; z-index: 10; transition: opacity 0.5s ease; pointer-events: none; }
        .gallery-wrap.expanded .gallery-overlay { opacity: 0; }
        .gallery-overlay-btn { pointer-events: auto; background: transparent; border: 1px solid rgba(255,255,255,0.3); color: white; padding: 12px 24px; cursor: pointer; border-radius: 0; transition: 0.3s; }
        .gallery-overlay-btn:hover { background: #f05a25; border-color: #f05a25; }


        .network-section { position: relative; }
        /* Cập nhật CSS cho network-node để di chuyển Parallax mượt mà hơn */
        .network-node { position: absolute; z-index: 20; cursor: pointer; transition: z-index 0s; }
        .network-node:hover { z-index: 100 !important; }
        .network-logo { background-color: #ffffff; background-image: radial-gradient(circle, rgba(240, 90, 37, 0.08) 1.5px, transparent 1.5px); background-size: 14px 14px; display: flex; align-items: center; justify-content: center; box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05); border: 1px solid #f3f4f6; transition: all 0.4s ease; position: relative; z-index: 2; border-radius: 12px; }
        .network-logo img { object-fit: contain; position: relative; z-index: 2; }
        .logo-lg { padding: 18px 24px; border-width: 2px; }
        .logo-lg img { height: 135px; width: auto; max-width: 380px; }
        .logo-md { padding: 12px 18px; }
        .logo-md img { height: 96px; width: auto; max-width: 300px; }
        .logo-sm { padding: 8px 14px; }
        .logo-sm img { height: 66px; width: auto; max-width: 200px; }
        .network-node:hover .network-logo { border-color: #f05a25; box-shadow: 0 0 30px rgba(240, 90, 37, 0.4); }
        .network-node:hover .logo-lg { transform: scale(1.15); }
        .network-node:hover .logo-md { transform: scale(1.25); }
        .network-node:hover .logo-sm { transform: scale(1.5); }
        
        .network-center-node { position: absolute; z-index: 25; }
        .network-center-logo { padding: 16px 24px; background-color: #ffffff; background-image: radial-gradient(circle, rgba(240, 90, 37, 0.08) 1.5px, transparent 1.5px); background-size: 14px 14px; border-radius: 12px; display: flex; align-items: center; justify-content: center; box-shadow: 0 0 40px rgba(240, 90, 37, 0.3); border: 3px solid #f05a25; position: relative; }
        .network-center-logo img { height: 60px; width: auto; max-width: 180px; object-fit: contain; position: relative; z-index: 2; }
        
        .network-story { position: absolute; width: 320px; background: rgba(255,255,255,0.98); border: 1px solid rgba(240, 90, 37, 0.3); opacity: 0; visibility: hidden; transition: all 0.3s cubic-bezier(0.16, 1, 0.3, 1); pointer-events: none; z-index: 101; box-shadow: 0 30px 60px rgba(0,0,0,0.15); }
        .story-bottom { top: calc(100% + 15px); left: 50%; transform: translate(-50%, 15px); }
        .story-top { bottom: calc(100% + 15px); left: 50%; transform: translate(-50%, -15px); }
        .story-left { right: calc(100% + 15px); top: 50%; transform: translate(-15px, -50%); }
        .story-right { left: calc(100% + 15px); top: 50%; transform: translate(15px, -50%); }
        .network-node:hover .story-bottom { opacity: 1; visibility: visible; transform: translate(-50%, 0); }
        .network-node:hover .story-top { opacity: 1; visibility: visible; transform: translate(-50%, 0); }
        .network-node:hover .story-left { opacity: 1; visibility: visible; transform: translate(0, -50%); }
        .network-node:hover .story-right { opacity: 1; visibility: visible; transform: translate(0, -50%); }
        .story-cover { padding: 24px 20px 16px; position: relative; background: linear-gradient(135deg, #0a0f1a, #111827); border-bottom: 2px solid #f05a25; }
        .story-cover-title { color: white; font-family: 'Space Grotesk', sans-serif; font-size: 1.25rem; font-weight: bold; line-height: 1.3; letter-spacing: -0.02em; }
        .story-content { padding: 16px 20px 20px; }
        .story-content p { color: #475569; font-size: 0.875rem; line-height: 1.6; border-left: 2px solid #f05a25; padding-left: 12px; font-style: italic; margin: 0; }
    </style>
</head>
<body class="relative">

    <main>
        
        <!-- 1. THE HOOK: Lời mở đầu -->
        <section class="relative pt-32 pb-40 overflow-hidden flex items-center bg-brand-light">
            <div class="absolute top-1/4 left-0 w-full overflow-hidden pointer-events-none z-0">
                <h1 class="text-[12vw] leading-none font-black text-stroke-light whitespace-nowrap opacity-60 transform -translate-x-10">TAVALLS VISION</h1>
            </div>
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[80vw] h-[80vw] max-w-[800px] max-h-[800px] bg-brand-orange/10 filter blur-[100px] rounded-full pointer-events-none"></div>

            <div class="container mx-auto px-4 lg:px-16 max-w-7xl relative z-10 grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
                <div class="lg:col-span-7 reveal-up">
                    <div class="flex items-center gap-4 mb-6">
                        <div class="w-12 h-[2px] bg-brand-orange"></div>
                        <p class="font-mono text-brand-orange font-bold tracking-[0.2em] uppercase text-sm">Chương I: Kỷ Nguyên Số</p>
                    </div>
                    <h2 class="font-serif text-5xl md:text-7xl text-gray-900 leading-[1.1] mb-8">
                        Kiến tạo kiệt tác <br>từ <span class="text-gradient italic">Ánh sáng</span> & <br><span class="text-gray-400">Không gian.</span>
                    </h2>
                    <p class="text-lg md:text-xl text-gray-600 font-light leading-relaxed max-w-2xl border-l-4 border-gray-200 pl-6">
                        Tại TavaLLS, chúng tôi không đơn thuần cung cấp phần cứng vô tri. Chúng tôi mang đến "nhịp đập", đánh thức mọi giác quan và hiện thực hóa những tầm nhìn nghệ thuật khắt khe nhất.
                    </p>
                </div>
                <div class="lg:col-span-5 relative reveal-up reveal-delay-1">
                    <div class="aspect-[4/5] bg-gray-900 relative overflow-hidden group">
                        <!-- Hình ảnh hiển thị chuẩn nhất, bỏ opacity -->
                        <img src="https://images.unsplash.com/photo-1540039155732-d674d0e8c04c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="" class="w-full h-full object-cover group-hover:scale-105 transition-all duration-1000">
                        <div class="absolute bottom-0 left-0 w-full p-8 bg-gradient-to-t from-brand-dark to-transparent">
                            <i class="ph-fill ph-play-circle text-5xl text-brand-orange mb-4 hover:scale-110 transition-transform cursor-pointer"></i>
                            <p class="text-white font-mono text-sm tracking-widest uppercase">Trải Nghiệm Visual 2026</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 2 & 3. THE CONFLICT & RESOLUTION (Bối cảnh & Ma trận SWOT) -->
        <section class="relative bg-mesh-dark pt-40 pb-32 -mt-20 z-20">
            <div class="spine-line"></div>
            
            <div class="absolute top-10 right-0 overflow-hidden pointer-events-none opacity-20">
                <h2 class="text-[15vw] font-black text-stroke-dark uppercase whitespace-nowrap">MATRIX</h2>
            </div>

            <div class="container mx-auto px-4 lg:px-16 max-w-7xl relative z-10">
                
                <!-- Bối cảnh -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 mb-32 border-b border-white/10 pb-24">
                    <div class="reveal-up">
                        <h3 class="font-mono text-brand-orange uppercase tracking-widest text-sm mb-4">Chương II: Bài Toán Thời Đại</h3>
                        <h4 class="font-serif text-4xl md:text-5xl text-white mb-8 leading-tight">Thách Thức Của <br>Sự Phai Mờ</h4>
                        <p class="text-gray-400 mb-8 leading-relaxed text-lg">Trong kỷ nguyên mà thị giác định hình thương hiệu, một không gian nhạt nhòa là dấu chấm hết cho mọi nỗ lực. Cơn khát về một giải pháp hiển thị đột phá, tối ưu vận hành đang bức thiết hơn bao giờ hết.</p>
                        
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="glass-dark p-6 border-l-2 border-gray-600 hover:border-brand-orange transition-colors">
                                <h5 class="text-white font-bold mb-2">Thương Mại</h5>
                                <p class="text-sm text-gray-400">Làm sao để điểm bán trở thành "thỏi nam châm" thị giác?</p>
                            </div>
                            <div class="glass-dark p-6 border-l-2 border-brand-orange">
                                <h5 class="text-white font-bold mb-2">Giải Trí</h5>
                                <p class="text-sm text-gray-400">Làm sao để mỗi giây phút bùng nổ đều được khắc sâu?</p>
                            </div>
                        </div>
                    </div>
                    <div class="relative reveal-up reveal-delay-1 h-full min-h-[400px]">
                        <!-- Ảnh bối cảnh vẫn để filter nhẹ để hòa vào nền tối -->
                        <img src="https://images.unsplash.com/photo-1514525253161-7a46d19cd819?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="" class="absolute inset-0 w-full h-full object-cover filter grayscale opacity-40">
                        <div class="absolute inset-0 bg-gradient-to-r from-[#0a0f1a] to-transparent"></div>
                    </div>
                </div>

                <!-- Ma Trận SWOT -->
                <div class="reveal-up">
                    <div class="flex flex-col md:flex-row md:items-end justify-between mb-12">
                        <div>
                            <h3 class="font-mono text-brand-orange uppercase tracking-widest text-sm mb-4">Chương III: Tuyên Ngôn Vị Thế</h3>
                            <h4 class="font-serif text-4xl md:text-5xl text-white leading-tight">Giải Mã Vị Thế <br><span class="text-brand-orange italic">Ma Trận Chiến Lược</span></h4>
                        </div>
                        <p class="text-gray-500 max-w-sm mt-6 md:mt-0 text-sm">Để dẫn dắt cuộc cách mạng, chúng tôi nhìn sâu vào cốt lõi và vươn tầm mắt ra vĩ mô.</p>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-[1px] bg-gray-800 p-[1px]">
                        <!-- S -->
                        <div class="bg-[#0a0f1a] p-8 relative overflow-hidden group hover:bg-[#111827] transition-colors h-full">
                            <div class="absolute -right-4 -top-8 text-[8rem] font-black text-stroke-dark group-hover:text-stroke-orange transition-colors">S</div>
                            <h5 class="font-bold text-xl text-white mb-6 relative z-10 border-b border-white/10 pb-4"><span class="text-brand-orange mr-2">S.</span> Lợi Thế Độc Tôn</h5>
                            <ul class="space-y-4 text-sm text-gray-400 relative z-10 leading-relaxed list-disc pl-4 marker:text-brand-orange">
                                <li>Chuỗi cung ứng khép kín, giá gốc từ nhà máy.</li>
                                <li>Phản ứng hỏa tốc 24/7 với mọi sự cố.</li>
                                <li>Sẵn kho số lượng lớn, bất chấp quy mô dự án.</li>
                            </ul>
                        </div>
                        <!-- W -->
                        <div class="bg-[#0a0f1a] p-8 relative overflow-hidden group hover:bg-[#111827] transition-colors h-full">
                            <div class="absolute -right-4 -top-8 text-[8rem] font-black text-stroke-dark transition-colors">W</div>
                            <h5 class="font-bold text-xl text-white mb-6 relative z-10 border-b border-white/10 pb-4"><span class="text-gray-500 mr-2">W.</span> Bước Đệm Hoàn Thiện</h5>
                            <ul class="space-y-4 text-sm text-gray-400 relative z-10 leading-relaxed list-disc pl-4 marker:text-gray-600">
                                <li>Chiến lược bành trướng thương hiệu đa vùng miền.</li>
                                <li>Khai phóng toàn diện sức mạnh truyền thông số kỷ nguyên 4.0.</li>
                            </ul>
                        </div>
                        <!-- O -->
                        <div class="bg-[#0a0f1a] p-8 relative overflow-hidden group hover:bg-[#111827] transition-colors h-full">
                            <div class="absolute -right-4 -top-8 text-[8rem] font-black text-stroke-dark transition-colors">O</div>
                            <h5 class="font-bold text-xl text-white mb-6 relative z-10 border-b border-white/10 pb-4"><span class="text-brand-orange mr-2">O.</span> Đón Đầu Vĩ Mô</h5>
                            <ul class="space-y-4 text-sm text-gray-400 relative z-10 leading-relaxed list-disc pl-4 marker:text-brand-orange">
                                <li>Sự bùng nổ của ngành công nghiệp giải trí đêm (Nightlife).</li>
                                <li>Xu hướng LED Transparent và Flexible lên ngôi.</li>
                            </ul>
                        </div>
                        <!-- T -->
                        <div class="bg-[#0a0f1a] p-8 relative overflow-hidden group hover:bg-[#111827] transition-colors h-full">
                            <div class="absolute -right-4 -top-8 text-[8rem] font-black text-stroke-dark transition-colors">T</div>
                            <h5 class="font-bold text-xl text-white mb-6 relative z-10 border-b border-white/10 pb-4"><span class="text-gray-500 mr-2">T.</span> Bản Lĩnh Tiên Phong</h5>
                            <ul class="space-y-4 text-sm text-gray-400 relative z-10 leading-relaxed list-disc pl-4 marker:text-gray-600">
                                <li>Đè bẹp cuộc chiến giá ảo bằng giá trị thực.</li>
                                <li>Làm chủ tốc độ đào thải công nghệ khắc nghiệt nhất.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 4 & 5. THE COMPASS (Tầm nhìn, Sứ mệnh & Mã Gen) -->
        <section class="py-32 relative bg-white overflow-hidden">
            <div class="absolute top-0 right-0 w-[800px] h-[800px] bg-brand-light rounded-full filter blur-[100px] -translate-y-1/2 translate-x-1/4 pointer-events-none"></div>
            
            <div class="container mx-auto px-4 lg:px-16 max-w-7xl relative z-10">
                
                <div class="reveal-up mb-32 max-w-5xl">
                    <h3 class="font-mono text-brand-orange uppercase tracking-widest text-sm mb-6">Chương IV: Định Vị Tương Lai</h3>
                    <h4 class="font-serif text-4xl md:text-6xl text-gray-900 leading-[1.2]">
                        TavaLLS không đơn thuần chạy theo xu hướng, chúng tôi khát khao <span class="text-brand-orange italic">kiến tạo chuẩn mực</span> cho ngành công nghiệp Nghe - Nhìn.
                    </h4>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-32">
                    <div class="bg-brand-light p-10 relative reveal-up border border-gray-100 hover:shadow-xl transition-shadow">
                        <div class="text-[6rem] font-black text-gray-100 absolute top-0 right-4 leading-none">1</div>
                        <h5 class="font-bold text-xl mb-4 relative z-10 mt-8 text-gray-900">Cam Kết Khách Hàng</h5>
                        <p class="text-gray-600 text-sm leading-relaxed relative z-10">Trao tay giá trị sinh lời tuyệt đối. Thiết bị đẳng cấp, chi phí tối ưu và một lời hứa bảo hành không khoan nhượng.</p>
                    </div>
                    <div class="bg-brand-orange p-10 relative reveal-up reveal-delay-1 text-white md:mt-12 shadow-2xl hover:bg-orange-600 transition-colors">
                        <div class="text-[6rem] font-black text-white/10 absolute top-0 right-4 leading-none">2</div>
                        <h5 class="font-bold text-xl mb-4 relative z-10 mt-8 text-white">Nuôi Dưỡng Tinh Hoa</h5>
                        <p class="text-white/90 text-sm leading-relaxed relative z-10">Con người là vũ khí tối thượng. Kiến tạo sân chơi của đam mê, nơi mọi kỹ sư đều trở thành những nghệ sĩ không gian thực thụ.</p>
                    </div>
                    <div class="bg-brand-dark p-10 relative reveal-up reveal-delay-2 text-white md:mt-24 hover:bg-gray-900 transition-colors">
                        <div class="text-[6rem] font-black text-white/5 absolute top-0 right-4 leading-none">3</div>
                        <h5 class="font-bold text-xl mb-4 relative z-10 mt-8 text-brand-orange">Nâng Tầm Ngành Nghề</h5>
                        <p class="text-gray-400 text-sm leading-relaxed relative z-10">Xóa bỏ lối mòn. Cập nhật và chuyển giao những công nghệ hiển thị tinh túy nhất từ toàn cầu về Việt Nam.</p>
                    </div>
                </div>

                <div class="reveal-up border-t border-gray-200 pt-20">
                    <div class="flex flex-col md:flex-row justify-between mb-16">
                        <div>
                            <h3 class="font-mono text-brand-orange uppercase tracking-widest text-sm mb-2">Chương V: ADN Thương Hiệu</h3>
                            <h4 class="font-serif text-3xl md:text-4xl text-gray-900">Mã Gen TavaLLS</h4>
                        </div>
                        <p class="max-w-md text-gray-500 mt-4 md:mt-0 text-sm md:text-base leading-relaxed">Sáu giá trị cốt lõi đúc kết từ hàng ngàn dự án, quy định cách chúng tôi hành động và khẳng định uy tín trên thương trường.</p>
                    </div>
                    
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-x-12 gap-y-12">
                        <div class="border-l-2 border-gray-200 pl-6 hover:border-brand-orange transition-colors group">
                            <h5 class="font-bold text-gray-900 mb-2 flex items-center gap-3"><i class="ph-fill ph-crown text-2xl text-brand-orange group-hover:scale-110 transition-transform"></i> Chất Lượng Đỉnh Cao</h5>
                            <p class="text-sm text-gray-600">Sản phẩm nguyên bản, thông số chuẩn xác, bền bỉ vách đá.</p>
                        </div>
                        <div class="border-l-2 border-brand-orange pl-6 group">
                            <h5 class="font-bold text-gray-900 mb-2 flex items-center gap-3"><i class="ph-fill ph-scales text-2xl text-brand-orange group-hover:scale-110 transition-transform"></i> Uy Tín Trọng Tâm</h5>
                            <p class="text-sm text-gray-600">Nói được làm được, đúng hẹn, đúng chất lượng cam kết.</p>
                        </div>
                        <div class="border-l-2 border-gray-200 pl-6 hover:border-brand-orange transition-colors group">
                            <h5 class="font-bold text-gray-900 mb-2 flex items-center gap-3"><i class="ph-fill ph-lightbulb-filament text-2xl text-brand-orange group-hover:scale-110 transition-transform"></i> Giải Pháp Sắc Bén</h5>
                            <p class="text-sm text-gray-600">Bài toán nào cũng có lời giải tối ưu nhất về công năng và chi phí.</p>
                        </div>
                        <div class="border-l-2 border-gray-200 pl-6 hover:border-brand-orange transition-colors group">
                            <h5 class="font-bold text-gray-900 mb-2 flex items-center gap-3"><i class="ph-fill ph-users-three text-2xl text-brand-orange group-hover:scale-110 transition-transform"></i> Lực Lượng Ưu Tú</h5>
                            <p class="text-sm text-gray-600">Kỷ luật thép trên công trường, nhạy bén trong từng đấu nối.</p>
                        </div>
                        <div class="border-l-2 border-gray-200 pl-6 hover:border-brand-orange transition-colors group">
                            <h5 class="font-bold text-gray-900 mb-2 flex items-center gap-3"><i class="ph-fill ph-hand-heart text-2xl text-brand-orange group-hover:scale-110 transition-transform"></i> Hậu Mãi Phụng Sự</h5>
                            <p class="text-sm text-gray-600">Không bao giờ bỏ rơi công trình. Đồng hành 24/7 xuyên lễ Tết.</p>
                        </div>
                        <div class="border-l-2 border-gray-200 pl-6 hover:border-brand-orange transition-colors group">
                            <h5 class="font-bold text-gray-900 mb-2 flex items-center gap-3"><i class="ph-fill ph-coins text-2xl text-brand-orange group-hover:scale-110 transition-transform"></i> Báo Giá Phá Băng</h5>
                            <p class="text-sm text-gray-600">Nắm trọn chuỗi phân phối để mang lại mức giá vô đối.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 6. THE ARSENAL (Năng lực vĩ mô) -->
        <section class="py-32 bg-[#05080f] text-white relative">
            <div class="spine-line" style="background: linear-gradient(to bottom, rgba(240,90,37,0.8), rgba(255,255,255,0.1));"></div>
            <div class="absolute inset-0 opacity-[0.02]" style="background-image: linear-gradient(#f05a25 1px, transparent 1px), linear-gradient(90deg, #f05a25 1px, transparent 1px); background-size: 30px 30px;"></div>

            <div class="container mx-auto px-4 lg:px-16 max-w-7xl relative z-10">
                <div class="text-center mb-20 reveal-up">
                    <h3 class="font-mono text-brand-orange uppercase tracking-widest text-sm mb-4">Chương VI: Tiềm Lực Lõi</h3>
                    <h4 class="font-serif text-4xl md:text-5xl text-white mb-6">Quy Mô Khổng Lồ <br><span class="italic text-gray-500">Sẵn Sàng Bứt Phá</span></h4>
                    <p class="text-gray-400 max-w-2xl mx-auto">Không chỉ là lời nói, TavaLLS chứng minh năng lực bằng khối tài sản phần cứng và hệ thống vận hành đạt chuẩn quốc tế.</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 reveal-up reveal-delay-1">
                    <!-- Box 1 -->
                    <div class="glass-dark p-10 border-t-2 border-brand-orange hover:bg-[#0a0f1a] transition-colors group">
                        <div class="flex justify-between items-start mb-12">
                            <i class="ph-light ph-warehouse text-6xl text-brand-orange"></i>
                            <span class="font-mono text-5xl font-black text-white/10 group-hover:text-brand-orange/20 transition-colors">01</span>
                        </div>
                        <h5 class="text-2xl font-bold mb-4">Mạng Lưới Tổng Kho Vĩ Mô</h5>
                        <p class="text-gray-400 leading-relaxed mb-6">Sở hữu quỹ đất kho bãi khổng lồ trải dài từ Bắc chí Nam. Chúng tôi dự trữ lượng lớn mọi cấu hình Module LED, Card phát, Nguồn... cho phép thi công tức thì hàng loạt siêu dự án mà không cần chờ đợi nhập khẩu.</p>
                        <div class="text-brand-orange font-mono uppercase tracking-widest text-sm font-bold">> 5000 m2 Không Gian Lưu Trữ</div>
                    </div>
                    <!-- Box 2 -->
                    <div class="glass-dark p-10 border-t-2 border-gray-700 hover:border-brand-orange hover:bg-[#0a0f1a] transition-colors group">
                        <div class="flex justify-between items-start mb-12">
                            <i class="ph-light ph-rocket-launch text-6xl text-white"></i>
                            <span class="font-mono text-5xl font-black text-white/10 group-hover:text-brand-orange/20 transition-colors">02</span>
                        </div>
                        <h5 class="text-2xl font-bold mb-4">Tốc Độ Triển Khai Thần Tốc</h5>
                        <p class="text-gray-400 leading-relaxed mb-6">Hệ thống Logistics và quy trình điều phối nhân sự tự động hóa giúp TavaLLS rút ngắn tối đa thời gian từ lúc chốt bản vẽ đến khi sân khấu bừng sáng, bất chấp mọi điều kiện địa lý phức tạp nhất.</p>
                        <div class="text-white font-mono uppercase tracking-widest text-sm font-bold">> Phủ Sóng 64 Tỉnh Thành</div>
                    </div>
                    <!-- Box 3 -->
                    <div class="glass-dark p-10 border-t-2 border-gray-700 hover:border-brand-orange hover:bg-[#0a0f1a] transition-colors group">
                        <div class="flex justify-between items-start mb-12">
                            <i class="ph-light ph-circuitry text-6xl text-white"></i>
                            <span class="font-mono text-5xl font-black text-white/10 group-hover:text-brand-orange/20 transition-colors">03</span>
                        </div>
                        <h5 class="text-2xl font-bold mb-4">Nắm Giữ Công Nghệ Độc Quyền</h5>
                        <p class="text-gray-400 leading-relaxed mb-6">Không ngừng nghiên cứu (R&D). TavaLLS làm chủ kỹ thuật thi công các dòng LED khó nhằn nhất hiện nay như: Màn hình LED cong vô cực, LED Trong suốt (Transparent) nghệ thuật, và LED Flexible uốn dẻo.</p>
                        <div class="text-white font-mono uppercase tracking-widest text-sm font-bold">> Công Nghệ Hiển Thị Tương Lai</div>
                    </div>
                    <!-- Box 4 -->
                    <div class="glass-dark p-10 border-t-2 border-gray-700 hover:border-brand-orange hover:bg-[#0a0f1a] transition-colors group relative overflow-hidden">
                        <div class="absolute right-0 bottom-0 opacity-10 grayscale group-hover:grayscale-0 group-hover:opacity-30 transition-all duration-700 pointer-events-none">
                            <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80" alt="" class="w-64 h-64 object-cover object-left-top">
                        </div>
                        <div class="relative z-10">
                            <div class="flex justify-between items-start mb-12">
                                <i class="ph-light ph-users-three text-6xl text-white"></i>
                                <span class="font-mono text-5xl font-black text-white/10 group-hover:text-brand-orange/20 transition-colors">04</span>
                            </div>
                            <h5 class="text-2xl font-bold mb-4">Biệt Đội Kỹ Thuật Tinh Nhuệ</h5>
                            <p class="text-gray-400 leading-relaxed mb-6">Hàng trăm kỹ sư, kỹ thuật viên được đào tạo bài bản, am hiểu sâu sắc hệ thống điện và cơ khí sân khấu. Sẵn sàng xử lý "bệnh" thiết bị chỉ trong nháy mắt.</p>
                            <div class="text-white font-mono uppercase tracking-widest text-sm font-bold">> Trực Chiến 24/7/365</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 7. THE JOURNEY (Timeline) -->
        <section class="py-24 bg-[#0a0f1a] border-b border-gray-800">
            <div class="spine-line"></div>
            <div class="container mx-auto px-4 lg:px-16 max-w-5xl relative z-10 reveal-up">
                
                <div class="relative max-w-4xl mx-auto">
                    <!-- Trục dọc trung tâm -->
                    <div class="absolute left-[15px] md:left-1/2 top-0 bottom-0 w-[1px] bg-gray-800 -translate-x-1/2"></div>
                    
                    <div class="relative flex flex-col md:flex-row items-center justify-between w-full mb-16 group">
                        <div class="absolute left-[15px] md:left-1/2 w-4 h-4 bg-brand-dark border border-brand-orange -translate-x-1/2 z-10 group-hover:bg-brand-orange transition-colors rotate-45"></div>
                        <div class="w-full md:w-5/12 pl-12 md:pl-0 md:text-right pr-0 md:pr-12">
                            <h4 class="text-4xl font-serif text-white mb-2">2018</h4>
                            <h5 class="text-brand-orange font-bold text-sm mb-3 uppercase tracking-widest">Khởi Nguyên Nguồn Sáng</h5>
                            <p class="text-gray-400 text-sm leading-relaxed">Ra đời tại Hải Phòng. Đặt viên gạch đầu tiên bằng việc nghiên cứu sâu thị trường và nhập khẩu các module LED chất lượng cao nhất thời bấy giờ.</p>
                        </div>
                        <div class="hidden md:block w-5/12"></div>
                    </div>

                    <div class="relative flex flex-col md:flex-row items-center justify-between w-full mb-16 group">
                        <div class="absolute left-[15px] md:left-1/2 w-4 h-4 bg-brand-dark border border-gray-600 -translate-x-1/2 z-10 group-hover:bg-brand-orange group-hover:border-brand-orange transition-colors rotate-45"></div>
                        <div class="hidden md:block w-5/12"></div>
                        <div class="w-full md:w-5/12 pl-12 md:pl-12">
                            <h4 class="text-4xl font-serif text-white mb-2">19-20</h4>
                            <h5 class="text-gray-300 font-bold text-sm mb-3 uppercase tracking-widest group-hover:text-brand-orange transition-colors">Xây Nền Tảng Uy Tín</h5>
                            <p class="text-gray-400 text-sm leading-relaxed">Thi công loạt dự án trọng điểm, nhanh chóng chiếm lĩnh thị phần và xác lập niềm tin tuyệt đối tại thị trường duyên hải Bắc Bộ.</p>
                        </div>
                    </div>

                    <div class="relative flex flex-col md:flex-row items-center justify-between w-full mb-16 group">
                        <div class="absolute left-[15px] md:left-1/2 w-4 h-4 bg-brand-dark border border-gray-600 -translate-x-1/2 z-10 group-hover:bg-brand-orange group-hover:border-brand-orange transition-colors rotate-45"></div>
                        <div class="w-full md:w-5/12 pl-12 md:pl-0 md:text-right pr-0 md:pr-12">
                            <h4 class="text-4xl font-serif text-white mb-2">21-22</h4>
                            <h5 class="text-gray-300 font-bold text-sm mb-3 uppercase tracking-widest group-hover:text-brand-orange transition-colors">Vượt Sóng Mở Rộng</h5>
                            <p class="text-gray-400 text-sm leading-relaxed">Bước chân ra khỏi ranh giới miền Bắc. Đưa thiết bị đổ bộ miền Trung và Nam, đồng thời ra mắt chính sách hỗ trợ bảo hành chuẩn quốc gia.</p>
                        </div>
                        <div class="hidden md:block w-5/12"></div>
                    </div>

                    <div class="relative flex flex-col md:flex-row items-center justify-between w-full group">
                        <div class="absolute left-[15px] md:left-1/2 w-6 h-6 bg-brand-orange shadow-[0_0_30px_rgba(240,90,37,0.6)] -translate-x-1/2 z-10 rotate-45"></div>
                        <div class="hidden md:block w-5/12"></div>
                        <div class="w-full md:w-5/12 pl-12 md:pl-12">
                            <h4 class="text-4xl font-serif text-brand-orange mb-2">Trở Đi</h4>
                            <h5 class="text-white font-bold text-sm mb-3 uppercase tracking-widest">Thống Lĩnh Công Nghệ</h5>
                            <p class="text-gray-400 text-sm leading-relaxed">Phủ sóng 64 tỉnh thành. Trở thành cái tên bảo chứng cho sự thành công của các siêu tổ hợp giải trí và đài truyền hình lớn nhất Việt Nam.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 8. MASONRY GRID (Kiệt tác Không Gian - Ảnh nguyên bản chuẩn nhất) -->
        <section class="py-32 bg-brand-light relative">
            <div class="absolute top-0 left-0 w-full h-[500px] bg-gradient-to-b from-[#0a0f1a] to-transparent opacity-10 pointer-events-none"></div>
            
            <div class="container mx-auto px-6 lg:px-12 text-center mb-10 reveal-up">
                <h3 class="font-mono text-brand-orange uppercase tracking-widest text-sm mb-4">Chương VII: Minh Chứng</h3>
                <h4 class="font-serif text-4xl md:text-5xl text-gray-900 mb-4">Kiệt Tác Không Gian</h4>
                <p class="text-gray-500">Mãn nhãn với những dự án thực tế được thổi hồn bởi công nghệ TavaLLS.</p>
            </div>

            <div class="w-full relative gallery-wrap bg-[#020617]" id="homeGalleryWrap">
                <!-- GRID 1: Bức tường ảnh tĩnh (Masonry Grid đảm bảo luôn khít dòng) -->
                <div class="gallery-grid reveal-up delay-1" id="homeGalleryGrid">
                    <?php
                    $project_ids_str = get_option('tavaled_home_projects');
                    $project_ids = !empty($project_ids_str) ? explode(',', $project_ids_str) : [];
                    
                    if (!empty($project_ids)) {
                        foreach ($project_ids as $id) {
                            $img_src = wp_get_attachment_image_url($id, 'full');
                            if (!$img_src) continue;
                    ?>
                    <div class="g-item">
                        <img src="<?php echo esc_url($img_src); ?>" alt="">
                    </div>
                    <?php 
                        }
                    } else {
                    ?>
                        <div class="g-item"><img src="https://images.unsplash.com/photo-1540039155732-d674d0e8c04c?w=1000&q=80" alt="EDM"></div>
                        <div class="g-item"><img src="https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?w=600&q=80" alt="Club"></div>
                        <div class="g-item"><img src="https://images.unsplash.com/photo-1506157786151-b8491531f063?w=600&q=80" alt="Laser"></div>
                        <div class="g-item"><img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?w=1000&q=80" alt="Concert"></div>
                        <div class="g-item"><img src="https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=600&q=80" alt="Stage"></div>
                    <?php } ?>
                </div>

                <!-- OVERLAY VỚI HIỆU ỨNG GRADIENT & NÚT SHOW MORE -->
                <div class="gallery-overlay" id="homeGalleryOverlay">
                    <button class="gallery-overlay-btn interactive" id="btnShowMoreGallery">
                        Chiêm ngưỡng trọn vẹn các dự án <i class="ph-bold ph-caret-down"></i>
                    </button>
                </div>
            </div>
        </section>

        <!-- 9. NETWORK MAP 3D PARALLAX (Hiệu ứng chuyển động chuột siêu mượt) -->
        <section class="network-section py-32 bg-white border-t border-gray-100 relative">
            <div class="absolute top-0 left-0 w-full h-[300px] bg-gradient-to-b from-brand-light to-white pointer-events-none"></div>
            
            <div class="container mx-auto px-4 lg:px-8 max-w-7xl relative z-10 flex flex-col items-center text-center mb-16 reveal-up">
                <h3 class="font-mono text-brand-orange uppercase tracking-widest text-sm mb-4">Chương VIII: Niềm Tin Rộng Khắp</h3>
                <h4 class="font-serif text-4xl md:text-6xl text-gray-900 mb-6">Hệ Sinh Thái 39+ Đối Tác</h4>
                <p class="text-gray-600 max-w-2xl text-base leading-relaxed">
                    Từ tâm điểm kỹ thuật tinh hoa, TavaLLS vươn xa kết nối cùng đài truyền hình, chuỗi rạp chiếu phim và các tổ hợp giải trí hàng đầu. <strong class="text-brand-orange">Hãy rê chuột vào bản đồ</strong> để trải nghiệm không gian mạng lưới đa chiều.
                </p>
            </div>

            <!-- Khung Map Hoàn Toàn Trải Rộng (Freedom) -->
            <div class="w-full relative reveal-up reveal-delay-1 pb-20">
                <div id="networkCanvas" class="w-full h-[800px] md:h-[900px] relative pointer-events-auto mx-auto max-w-[1400px]">
                    <!-- SVG Lưới nối tâm -->
                    <svg id="networkLines" class="absolute inset-0 w-full h-full pointer-events-none" preserveAspectRatio="none">
                        <defs>
                            <linearGradient id="lineGradLg" x1="50%" y1="50%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#f05a25" stop-opacity="0.8" />
                                <stop offset="100%" stop-color="#f05a25" stop-opacity="0.1" />
                            </linearGradient>
                            <linearGradient id="lineGradMd" x1="50%" y1="50%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#f05a25" stop-opacity="0.3" />
                                <stop offset="100%" stop-color="#f05a25" stop-opacity="0.05" />
                            </linearGradient>
                            <linearGradient id="lineGradSm" x1="50%" y1="50%" x2="100%" y2="100%">
                                <stop offset="0%" stop-color="#9ca3af" stop-opacity="0.3" />
                                <stop offset="100%" stop-color="#9ca3af" stop-opacity="0.0" />
                            </linearGradient>
                        </defs>
                    </svg>

                    <!-- Center Node -->
                    <div class="network-center-node" style="left: 50%; top: 50%;">
                        <div class="network-center-logo">
                            <?php 
                            $site_logo = \App\Helpers\ThemeHelper::getOption('logo');
                            if ($site_logo) : 
                            ?>
                                <img src="<?php echo esc_url($site_logo); ?>" alt="TavaLLS Logo" />
                            <?php else: ?>
                                <span class="text-2xl font-bold tracking-tight text-gray-900">Tava<span class="text-brand-orange">LLS</span></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <!-- Nodes Container -->
                    <div id="partnerNodesContainer"></div>
                </div>
            </div>
        </section>

        <!-- 10. THƯ NGỎ CEO (Chuẩn màu ảnh thật 100%) -->
        <section class="py-32 bg-[#05080f] text-white relative overflow-hidden">
            <div class="absolute -top-40 -right-40 w-[600px] h-[600px] bg-brand-orange/10 filter blur-[120px] pointer-events-none"></div>
            
            <div class="container mx-auto px-4 lg:px-12 max-w-7xl relative z-10 reveal-up">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-24 items-center">
                    
                    <div class="lg:col-span-5">
                        <div class="relative w-full aspect-[3/4] bg-gray-900 border border-gray-700 overflow-hidden group">
                            <!-- Ảnh CEO chuẩn màu 100%, không grayscale, không opacity -->
                            <img src="https://images.unsplash.com/photo-1556761175-5973dc0f32e7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="" class="w-full h-full object-cover group-hover:scale-105 transition-all duration-700">
                            <div class="absolute inset-4 border border-white/20 pointer-events-none"></div>
                        </div>
                        <div class="mt-6 border-l-4 border-brand-orange pl-4">
                            <h4 class="font-bold text-2xl tracking-wide uppercase">Hồ Văn Tuyền</h4>
                            <p class="text-gray-400 font-mono text-xs tracking-widest uppercase mt-1">Tổng Giám Đốc</p>
                        </div>
                    </div>

                    <div class="lg:col-span-7">
                        <h3 class="font-mono text-brand-orange uppercase tracking-widest text-sm mb-4">Chương Cuối: Lời Hứa</h3>
                        <i class="ph-fill ph-quotes text-6xl text-white/10 mb-6 block"></i>
                        <h4 class="font-serif text-4xl md:text-5xl text-white mb-10 leading-tight">Đồng Hành Kiến Tạo <br>Những Tầm Nhìn Lớn</h4>
                        
                        <div class="space-y-6 text-gray-300 leading-relaxed text-base md:text-lg font-light text-justify">
                            <p>Thay mặt <strong>TAVA VIETNAM TECHNOLOGY JSC</strong>, tôi xin gửi lời cảm ơn chân thành nhất đến Quý đối tác, khách hàng. Sự tin tưởng của quý vị trong suốt chặng đường qua là tài sản vô giá và là động lực để chúng tôi vươn mình mạnh mẽ.</p>
                            
                            <p>Trong cuốn E-Catalogue này, chúng tôi không chỉ trưng bày thiết bị, mà còn gửi gắm những giải pháp tâm huyết nhất. Tại TavaLLS, chúng tôi thấu hiểu từng trăn trở của khách hàng và cam kết biến mọi không gian trở thành điểm nhấn hoàn hảo bằng công nghệ hiển thị đỉnh cao.</p>
                            
                            <p>Rất mong tiếp tục được sát cánh và phục vụ quý vị trong những đại dự án sắp tới.</p>
                        </div>
                        
                        <div class="mt-12 pt-12 border-t border-gray-800 flex items-center justify-between">
                            <span class="font-serif italic text-5xl text-white opacity-80">Tuyền</span>
                            <button class="bg-brand-orange hover:bg-white text-white hover:text-brand-orange px-8 py-4 font-bold text-sm uppercase tracking-wider inline-flex items-center gap-2 transition-colors">
                                Hợp Tác Ngay <i class="ph-bold ph-arrow-right"></i>
                            </button>
                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>

    <!-- FOOTER -->
    <footer class="bg-[#0a0f1a] text-gray-600 py-10 text-center font-mono text-xs uppercase tracking-widest border-t border-white/5">
        <div class="container mx-auto">
            <p>&copy; 2026 TAVA VIETNAM TECHNOLOGY JSC. ALL RIGHTS RESERVED.</p>
        </div>
    </footer>

    <!-- SCRIPT TỔNG HỢP -->
    <script>
        <?php
        $partner_ids_str = get_option('tavaled_partners_list');
        $partner_ids = !empty($partner_ids_str) ? explode(',', $partner_ids_str) : [];
        $partners_arr = [];
        
        if (!empty($partner_ids)) {
            // 1. Tự động tính toán số cột (Cols) và số hàng (Rows) dựa trên lượng đối tác (Scale động)
            $total_partners = count($partner_ids);
            
            // Thêm một khoảng đệm 20% dung lượng trống và cộng thêm khoảng chừa logo TT
            $required_spots = $total_partners + floor($total_partners * 0.2) + 6; 
            
            // Phân bổ trên tỷ lệ khung màn hình ~ 4:3 (Ngang rộng hơn)
            $rows = max(5, ceil(sqrt($required_spots / 1.33))); 
            $cols = max(6, ceil($rows * 1.33));
            
            // 2. Xác định Tâm của lưới để chừa chỗ cho Logo TavaLLS
            $center_r = floor($rows / 2);
            $center_c = floor($cols / 2);

            $grid_spots = [];
            for ($r = 0; $r < $rows; $r++) {
                for ($c = 0; $c < $cols; $c++) {
                    // Phóng to bán kính né Logo trung tâm (né 2 cột giữa, 2 hàng giữa)
                    if ($r >= $center_r - 1 && $r <= $center_r && $c >= $center_c - 1 && $c <= $center_c) continue;
                    $grid_spots[] = [$c, $r];
                }
            }
            // Trộn mảng để lúc nào các icon cũng phân bố nhẫu nhiên rộng khắp
            shuffle($grid_spots);

            $total_spots = count($grid_spots);
            $spot_index = 0;
            
            // Tính toán khoảng cách % an toàn giữa mỗi nút (Spacing)
            $stepX = 84 / max(1, $cols - 1); // Trải dài từ 8% đến 92%
            $stepY = 84 / max(1, $rows - 1);

            foreach($partner_ids as $id) {
                $post = get_post($id);
                if (!$post) continue;
                $url = wp_get_attachment_image_url($id, 'medium');
                $title = $post->post_title;
                $desc = get_post_meta($id, '_tavaled_partner_desc', true) ?: 'Đối tác chiến lược của TavaLLS';
                $level = get_post_meta($id, '_tavaled_partner_level', true) ?: 'sm';
                
                if ($spot_index < $total_spots) {
                    $c = $grid_spots[$spot_index][0];
                    $r = $grid_spots[$spot_index][1];
                    
                    // Thêm rung lắc ngẫu nhiên nhưng kiểm soát không quá 1 nửa khoảng cách bước (tránh chồng chéo)
                    $maxOffsetX = ($stepX * 0.4);
                    $maxOffsetY = ($stepY * 0.4);
                    
                    $offsetX = (rand(-100, 100) / 100) * $maxOffsetX;
                    $offsetY = (rand(-100, 100) / 100) * $maxOffsetY;
                    
                    $x = 8 + ($c * $stepX) + $offsetX;
                    $y = 8 + ($r * $stepY) + $offsetY;
                    $spot_index++;
                } else {
                    // Trường hợp cực an toàn nếu vẫn dư (Không bao giờ xảy ra nhờ công thức dynamic kia)
                    $x = rand(80, 920) / 10;
                    $y = rand(80, 920) / 10;
                    // Tránh tâm điểm
                    if ($x >= 40 && $x <= 60 && $y >= 40 && $y <= 60) {
                        $x = (rand(0, 1) == 0) ? rand(50, 250) / 10 : rand(750, 950) / 10;
                    }
                    $spot_index++;
                }
                
                // Tính toán vị trí tooltip thông minh để không bao giờ bị cắt ngoài container
                if ($y < 25) {
                    $tooltipPos = 'bottom';
                } elseif ($y > 75) {
                    $tooltipPos = 'top';
                } elseif ($x < 25) {
                    $tooltipPos = 'right';
                } elseif ($x > 75) {
                    $tooltipPos = 'left';
                } else {
                    $tooltipPos = ($spot_index % 2 == 0) ? 'bottom' : 'top';
                }
                
                $partners_arr[] = [
                    'name' => $title,
                    'size' => $level,
                    'pos'  => [$x, $y],
                    'tooltipPos' => $tooltipPos,
                    'logo' => $url,
                    'desc' => $desc
                ];
            }
        }
        
        if (empty($partners_arr)) {
            // Demo data if none
            $partners_arr = [
                ["name" => "VTV", "size" => "lg", "pos" => [22, 22], "tooltipPos" => "bottom", "logo" => "https://upload.wikimedia.org/wikipedia/commons/thumb/c/ce/VTV_logo_2013.svg/1024px-VTV_logo_2013.svg.png", "desc" => "Đài Truyền Hình VTV"],
                ["name" => "GEM Center", "size" => "lg", "pos" => [75, 25], "tooltipPos" => "bottom", "logo" => "https://via.placeholder.com/150", "desc" => "Trung tâm Sự kiện GEM"]
            ];
        }
        ?>
        const partnersData = <?php echo json_encode($partners_arr); ?>;

        document.addEventListener('DOMContentLoaded', () => {
            // Header Sticky
            const header = document.getElementById('mainHeader');
            window.addEventListener('scroll', () => {
                if (window.scrollY > 10) { header.classList.add('header-sticky'); header.classList.remove('py-1'); } 
                else { header.classList.remove('header-sticky'); header.classList.add('py-1'); }
            });

            // --- 1. RENDER & PARALLAX NETWORK MAP ---
            const container = document.getElementById('partnerNodesContainer');
            const svgLines = document.getElementById('networkLines');
            const canvas = document.getElementById('networkCanvas');
            const centerX = 50, centerY = 50; 
            const defaultCoverImg = "https://images.unsplash.com/photo-1540039155732-d674d0e8c04c?ixlib=rb-4.0.3&auto=format&fit=crop&w=400&q=80";

            partnersData.forEach((partner, index) => {
                const nodeDiv = document.createElement('div');
                nodeDiv.className = `network-node`;
                
                // Gán tốc độ Parallax dựa trên kích thước (nhỏ bay nhanh, lớn bay chậm)
                let speedMultiplier = 0.05;
                if (partner.size === 'lg') speedMultiplier = 0.015;
                else if (partner.size === 'md') speedMultiplier = 0.03;
                
                nodeDiv.dataset.speed = speedMultiplier;
                nodeDiv.style.left = `${partner.pos[0]}%`;
                nodeDiv.style.top = `${partner.pos[1]}%`;

                const isImageLogo = partner.logo && partner.logo.startsWith('http');
                const logoContent = isImageLogo ? `<img src="${partner.logo}" alt="">` : `<span class="font-bold text-sm" style="padding: 10px;">${partner.name}</span>`;

                nodeDiv.innerHTML = `
                    <div class="network-logo logo-${partner.size}">${logoContent}</div>
                    <div class="network-story story-${partner.tooltipPos}">
                        <div class="story-cover">
                            <h4 class="story-cover-title">${partner.name}</h4>
                        </div>
                        <div class="story-content">
                            <p>${partner.desc || ""}</p>
                        </div>
                    </div>
                `;
                container.appendChild(nodeDiv);

                // SVG Lines
                let lineGradId, strokeWidth, strokeDash;
                if (partner.size === 'lg') { lineGradId = 'url(#lineGradLg)'; strokeWidth = 2.5; strokeDash = '6,4'; } 
                else if (partner.size === 'md') { lineGradId = 'url(#lineGradMd)'; strokeWidth = 1.5; strokeDash = '4,4'; } 
                else { lineGradId = 'url(#lineGradSm)'; strokeWidth = 1; strokeDash = '2,4'; }
                
                const line = document.createElementNS('http://www.w3.org/2000/svg', 'line');
                line.setAttribute('id', `line-${index}`);
                line.dataset.baseX = partner.pos[0]; // Lưu tọa độ % gốc
                line.dataset.baseY = partner.pos[1];
                line.setAttribute('x1', `${centerX}%`); 
                line.setAttribute('y1', `${centerY}%`);
                line.setAttribute('x2', `${partner.pos[0]}%`); 
                line.setAttribute('y2', `${partner.pos[1]}%`);
                line.setAttribute('stroke', lineGradId); 
                line.setAttribute('stroke-width', strokeWidth);
                line.setAttribute('stroke-dasharray', strokeDash);
                svgLines.appendChild(line);
            });

            // PARALLAX LOGIC (Di chuột)
            let targetMouseX = 0, targetMouseY = 0;
            let currentMouseX = 0, currentMouseY = 0;

            canvas.addEventListener('mousemove', (e) => {
                const rect = canvas.getBoundingClientRect();
                targetMouseX = e.clientX - rect.left - rect.width / 2;
                targetMouseY = e.clientY - rect.top - rect.height / 2;
            });

            canvas.addEventListener('mouseleave', () => {
                targetMouseX = 0; targetMouseY = 0;
            });

            function animateParallax() {
                // Gia tốc mượt mà (Easing)
                currentMouseX += (targetMouseX - currentMouseX) * 0.08;
                currentMouseY += (targetMouseY - currentMouseY) * 0.08;

                const cw = canvas.offsetWidth;
                const ch = canvas.offsetHeight;

                if(cw > 0 && ch > 0) {
                    const nodes = document.querySelectorAll('.network-node');
                    nodes.forEach((node, i) => {
                        const speed = parseFloat(node.dataset.speed);
                        const dx = currentMouseX * speed;
                        const dy = currentMouseY * speed;
                        
                        // Di chuyển Node
                        node.style.transform = `translate(calc(-50% + ${dx}px), calc(-50% + ${dy}px))`;
                        
                        // Di chuyển điểm chạm của Line SVG bám sát theo Node
                        const line = document.getElementById(`line-${i}`);
                        if(line) {
                            const baseX = parseFloat(line.dataset.baseX);
                            const baseY = parseFloat(line.dataset.baseY);
                            const dxPercent = (dx / cw) * 100;
                            const dyPercent = (dy / ch) * 100;
                            line.setAttribute('x2', `${baseX + dxPercent}%`);
                            line.setAttribute('y2', `${baseY + dyPercent}%`);
                        }
                    });

                    // Trung tâm (Center Node) cũng nhúc nhích ngược hướng tạo độ sâu
                    const centerNode = document.querySelector('.network-center-node');
                    if(centerNode) {
                        const cdx = -currentMouseX * 0.01;
                        const cdy = -currentMouseY * 0.01;
                        centerNode.style.transform = `translate(calc(-50% + ${cdx}px), calc(-50% + ${cdy}px))`;
                        
                        const cdxPercent = (cdx / cw) * 100;
                        const cdyPercent = (cdy / ch) * 100;
                        document.querySelectorAll('#networkLines line').forEach(line => {
                            line.setAttribute('x1', `${50 + cdxPercent}%`);
                            line.setAttribute('y1', `${50 + cdyPercent}%`);
                        });
                    }
                }
                requestAnimationFrame(animateParallax);
            }
            animateParallax(); // Khởi động vòng lặp Parallax
            
            // --- 2. SCROLL REVEAL OBSERVER ---
            const revealElements = document.querySelectorAll('.reveal-up');
            const revealObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => { if (entry.isIntersecting) { entry.target.classList.add('active'); } });
            }, { threshold: 0.1, rootMargin: "0px 0px -50px 0px" });
            
            revealElements.forEach(el => revealObserver.observe(el));
            setTimeout(() => {
                revealElements.forEach(el => { if(el.getBoundingClientRect().top < window.innerHeight) el.classList.add('active'); });
            }, 100);

            // LOGIC SHOW MORE GALLERY TỪ TRANG CHỦ
            const btnShowMore = document.getElementById('btnShowMoreGallery');
            const galleryWrap = document.getElementById('homeGalleryWrap');
            if(btnShowMore && galleryWrap) {
                btnShowMore.addEventListener('click', function() {
                    if(!galleryWrap.classList.contains('expanded')){
                        galleryWrap.classList.add('expanded');
                        btnShowMore.innerHTML = 'Thu gọn <i class="ph-bold ph-caret-up"></i>';
                    } else {
                        galleryWrap.classList.remove('expanded');
                        btnShowMore.innerHTML = 'Chiêm ngưỡng trọn vẹn các dự án <i class="ph-bold ph-caret-down"></i>';
                    }
                });
            }
        });
    </script>
    <?php wp_footer(); ?>
</body>
</html>