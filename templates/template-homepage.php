<?php
/**
 * Template Name: Trang chủ
 */
get_header(); ?>

<style>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- TỐI ƯU SEO -->
    <title>TavaLLS | Màn hình LED · Âm thanh · Ánh sáng chuyên nghiệp</title>
    <meta name="description" content="TavaLLS — Giải pháp toàn diện Màn hình LED, Âm thanh và Ánh sáng chuyên nghiệp. 500+ dự án, 10 năm kinh nghiệm, phủ sóng 64 tỉnh thành.">
    <meta name="keywords" content="Màn hình LED, Âm thanh sân khấu, Ánh sáng sự kiện, TavaLLS, thi công màn hình LED, loa Line Array, đèn Moving Head">
    <meta property="og:title" content="TavaLLS — LED · Âm thanh · Ánh sáng">
    <meta property="og:description" content="500+ dự án. 10 năm. Một đối tác — trọn vẹn giải pháp hiển thị và âm thanh.">
    <meta property="og:type" content="website">

    <!-- Cài đặt Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: { 
                            orange: '#f05a25', 
                            orangedark: '#c8451a',
                            navy: '#1c2857',
                            navy2: '#1e293b',
                            navy3: '#1c2857',
                            light: '#f8fafc'
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        serif: ['Playfair Display', 'serif'],
                        mono: ['Space Grotesk', 'monospace'],
                    }
                }
            }
        }
    </script>
    
    <!-- Fonts & Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400;1,600&family=Space+Grotesk:wght@400;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/@phosphor-icons/web"></script>

    <style>
        /* BASE & RESET */
        *, *::before, *::after { border-radius: 0 !important; }
        body { font-family: 'Inter', sans-serif; background: #1c2857; color: #ffffff; overflow-x: hidden; cursor: none; }
        html { scroll-behavior: smooth; }
        ::-webkit-scrollbar { width: 6px; }
        ::-webkit-scrollbar-track { background: #1c2857; }
        ::-webkit-scrollbar-thumb { background: #f05a25; }

        /* CUSTOM CURSOR */
        @media (pointer: fine) {
            .cursor { position: fixed; top: 0; left: 0; z-index: 9999; pointer-events: none; }
            .cursor__dot { width: 6px; height: 6px; border-radius: 50% !important; background: #f05a25; position: absolute; transform: translate(-50%, -50%); transition: transform 0.1s; }
            .cursor__ring { width: 36px; height: 36px; border-radius: 50% !important; border: 1.5px solid rgba(240,90,37,0.5); position: absolute; transform: translate(-50%, -50%); transition: transform 0.15s cubic-bezier(0.16, 1, 0.3, 1), width 0.3s, height 0.3s, border-color 0.3s; }
            body:has(a:hover) .cursor__ring, body:has(button:hover) .cursor__ring, body:has(.interactive:hover) .cursor__ring { width: 60px; height: 60px; border-color: #f05a25; background: rgba(240,90,37,0.05); }
        }
        @media (pointer: coarse) { .cursor { display: none; } body { cursor: auto; } }

        /* SCROLL REVEAL ANIMATIONS */
        .reveal-up { opacity: 0; transform: translateY(40px); transition: all 1s cubic-bezier(0.16, 1, 0.3, 1); }
        .reveal-up.active { opacity: 1; transform: translateY(0); }
        .delay-1 { transition-delay: 0.15s; }
        .delay-2 { transition-delay: 0.3s; }

        /* HERO VIDEO OVERLAY */
        .hero-video-wrap { position: absolute; inset: 0; z-index: 0; overflow: hidden; background: #1c2857; pointer-events: none; }
        .hero-video-wrap iframe { 
            position: absolute; top: 50%; left: 50%; 
            width: 100vw; height: 56.25vw; /* Tỷ lệ 16:9 */
            min-height: 100vh; min-width: 177.77vh; 
            transform: translate(-50%, -50%); 
            pointer-events: none; filter: brightness(0.5) saturate(1.2); border: none;
        }
        .hero-overlay { position: absolute; inset: 0; background: linear-gradient(to bottom, rgba(28,40,87,0.3) 0%, rgba(28,40,87,0.8) 60%, #1c2857 100%); }
        .text-stroke-light { color: transparent; -webkit-text-stroke: 1px rgba(255, 255, 255, 0.15); }

        /* SOLUTIONS LIST */
        .sol-list-item { border-bottom: 1px solid rgba(255,255,255,0.1); padding: 3rem 0; transition: all 0.4s; }
        .sol-list-item:hover { background: rgba(255,255,255,0.02); padding-left: 2rem; padding-right: 2rem; border-color: #f05a25; }
        
        /* MASSIVE GALLERY GRID */
        .gallery-wrap {
            position: relative;
            overflow: hidden;
            max-height: 120vh; /* Giới hạn độ cao khoảng 1.2 màn hình */
            transition: max-height 1s cubic-bezier(0.16, 1, 0.3, 1);
        }
        .gallery-wrap.expanded {
            max-height: 10000px; /* Số lớn để mở rộng toàn bộ lưới ảnh */
        }
        .gallery-grid {
            column-count: 2;
            column-gap: 2px;
            margin-bottom: 0px;
        }
        @media (min-width: 768px) { .gallery-grid { column-count: 3; } }
        @media (min-width: 1024px) { .gallery-grid { column-count: 4; } }
        @media (min-width: 1280px) { .gallery-grid { column-count: 5; } }

        .g-item {
            break-inside: avoid;
            margin-bottom: 2px;
            overflow: hidden;
            position: relative;
        }
        .g-item img { width: 100%; height: auto; object-fit: cover; display: block; transition: transform 0.8s ease; }
        .g-item:hover img { transform: scale(1.03); }

        .gallery-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 400px;
            background: linear-gradient(to bottom, transparent, #1c2857 80%, #1c2857 100%);
            display: flex;
            align-items: flex-end;
            justify-content: center;
            padding-bottom: 40px;
            z-index: 10;
            transition: opacity 0.5s ease;
            pointer-events: none;
        }
        .gallery-wrap.expanded .gallery-overlay {
            opacity: 0;
        }
        .gallery-overlay-btn {
            pointer-events: auto; /* Để nút bấm được ngay cả khi overlay bị tắt click */
        }

        /* MƯỢT MÀ FAQ ACCORDION (NEW) */
        .faq-answer { display: grid; grid-template-rows: 0fr; transition: grid-template-rows 0.4s ease-in-out; }
        .faq-answer.open { grid-template-rows: 1fr; }
        .faq-answer-inner { overflow: hidden; }

        /* BUTTONS */
        .btn-primary { display: inline-flex; align-items: center; justify-content: center; gap: 10px; padding: 14px 32px; background: #f05a25; color: #ffffff; font-size: 13px; font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase; transition: all 0.3s; box-shadow: 0 4px 20px rgba(240,90,37,0.3); }
        .btn-primary:hover { background: #c8451a; transform: translateY(-2px); box-shadow: 0 8px 30px rgba(240,90,37,0.5); }
        .btn-outline { display: inline-flex; align-items: center; justify-content: center; gap: 10px; padding: 13px 32px; border: 1px solid rgba(255,255,255,0.2); color: rgba(255,255,255,0.8); font-size: 13px; font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase; transition: all 0.3s; }
        .btn-outline:hover { border-color: #f05a25; color: #ffffff; background: rgba(240,90,37,0.1); }

        /* ══════════════════════════════════
           CARD BASE & SEC HEAD (FROM BLOG PAGE)
           ══════════════════════════════════ */
        @import url('https://fonts.googleapis.com/css2?family=League+Spartan:wght@300;500;700;900&family=Cormorant+Garamond:ital,wght@1,700&display=swap');
        
        .card { background: #fff; border-radius: 0px; overflow: hidden; border: 1px solid #f1f1f1; transition: all 0.5s cubic-bezier(0.25, 1, 0.5, 1); display: flex; flex-direction: column; }
        .card:hover { transform: translateY(-8px); box-shadow: 0 20px 40px -15px rgba(29, 40, 87, 0.15); border-color: #f05a25; }
        .card__thumb { position:relative; overflow:hidden; flex-shrink:0; }
        .card__thumb img { width:100%; height:100%; object-fit:cover; display:block; transition: transform .7s cubic-bezier(.16,1,.3,1), filter .4s; filter: saturate(.82) brightness(.98); }
        .card:hover .card__thumb img { transform:scale(1.07); filter:saturate(1) brightness(1.01); }
        .cat { position: absolute; top: 11px; left: 11px; background: rgba(255,255,255,0.78); backdrop-filter: blur(10px); color: #1d2857; font-size: 9px; letter-spacing: 0.14em; font-weight: 600; text-transform: uppercase; padding: 3px 9px; border-radius: 0px; border: 1px solid rgba(255,255,255,0.55); z-index: 2; }
        .card__body { padding: 18px 20px 20px; flex:1; display:flex; flex-direction:column; background: #fff; }
        .card__meta { display:flex; align-items:center; gap:6px; font-size:11px; color:#6b7280; margin-bottom:8px; flex-wrap:wrap; }
        .meta-dot { width:3px; height:3px; background:#9ca3af; flex-shrink:0; }
        .card__title { font-family: "League Spartan", sans-serif !important; font-weight: 700; text-transform: uppercase; line-height: 1.35; color: #1d2857; margin-bottom: 9px; flex: 1; transition: color 0.2s; }
        .card:hover .card__title { color: #f05a25; }
        .card__desc { font-family: "League Spartan", sans-serif !important; font-weight: 500; font-size: 13px; color: #616161; line-height: 1.6; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; margin-bottom: 14px; }
        .card__foot { display:flex; align-items:center; justify-content:space-between; padding-top: 12px; border-top: 1px solid #f5e8e2; margin-top: auto; }
        .stats { display:flex; align-items:center; gap:12px; font-size:11px; color:#6b7280; }
        .stat { display:flex; align-items:center; gap:4px; }
        .stat svg { width:12px; height:12px; stroke:#9ca3af; fill:none; stroke-width:1.8; }
        .read-more { display:inline-flex; align-items:center; gap:5px; font-size:11px; font-weight:800; color: #1d2857; text-decoration:none; letter-spacing:0.07em; text-transform:uppercase; transition: all .2s; }
        .read-more::after { content:'→'; font-size:12px; }
        .read-more:hover { gap: 9px; color: #f05a25; }
        .grid-3 { display:grid; grid-template-columns:repeat(3,1fr); gap:16px; }
        .card-md .card__thumb { height:178px; }
        .card-md .card__title { font-size:.95rem; }
        .card-md .card__desc { -webkit-line-clamp:2; }
        @media (max-width:1024px) { .grid-3 { grid-template-columns:1fr 1fr; } }
        @media (max-width:640px) { .grid-3 { grid-template-columns:1fr; gap: 20px; } .card__desc { display:block !important; font-size:13px; margin-top:10px; line-height:1.5; opacity:0.75; } }


        /* Thêm các Grid Layout và Quotes từ Blog */
        .project-hero { display: grid; grid-template-columns: 1.8fr 1fr; grid-template-rows: auto; gap: 16px; margin-bottom: 16px; }
        .project-hero .card-feat .card__thumb { height: 380px; }
        .project-hero .card-feat .card__title { font-size: 1.3rem; }
        .project-hero .card-feat .card__desc { -webkit-line-clamp: 4; }
        .project-hero__right { display: flex; flex-direction: column; gap: 16px; }
        .project-hero__right .card .card__thumb { height: 178px; }
        .project-hero__right .card .card__title { font-size: .9rem; }
        .project-row { display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 16px; }
        .project-row .card .card__thumb { height: 150px; }
        .project-row .card .card__title { font-size: .86rem; -webkit-line-clamp:2; display:-webkit-box; -webkit-box-orient:vertical; overflow:hidden; }
        .project-row .card .card__desc { display:none; }
        .project-row .card .card__foot { border-top:none; padding-top:6px; }
        .project-row3 { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; }
        .project-row3 .card .card__thumb { height: 165px; }
        .project-row3 .card .card__title { font-size: .88rem; }
        .project-row3 .card .card__desc { display:none; }
        .project-row3 .card .card__foot { border-top:none; padding-top:6px; }
        .loc-tag { position: absolute; bottom: 10px; left: 10px; background: rgba(17,24,39,0.72); backdrop-filter: blur(6px); color: rgba(255,255,255,.9); font-size: 9.5px; font-weight: 600; letter-spacing: 0.1em; text-transform: uppercase; padding: 3px 9px; border-radius: 0px; z-index: 2; }

        .featured-grid { display: grid; grid-template-columns: 1.65fr 1fr 1fr; grid-template-rows: 1fr 1fr; gap: 16px; }
        .card-big { grid-column:1; grid-row:1/3; }
        .card-big .card__thumb { height: 300px; }
        .card-big .card__title { font-size: 1.35rem; }
        .card-big .card__desc { -webkit-line-clamp: 4; }
        .card-sm .card__thumb { height: 140px; }
        .card-sm .card__title { font-size:.9rem; -webkit-line-clamp:2; display:-webkit-box; -webkit-box-orient:vertical; overflow:hidden; }
        .card-sm .card__desc { display:none; }
        .card-sm .card__foot { border-top:none; padding-top:6px; }

        .sk-grid { display:grid; grid-template-columns:1.2fr 1fr; gap:16px; }
        .sk-grid .card-big .card__thumb { height: 268px; }
        .sk-right { display:flex; flex-direction:column; gap:10px; }


        .qs__attr { display: flex; align-items: center; gap: 16px; }
        .qs__dash { width: 48px; height: 2px; background: #f05a25; border-radius: 0; }
        .qs__author { font-family: "League Spartan", sans-serif !important; font-size: 12px; font-weight: 800; letter-spacing: 0.2em; text-transform: uppercase; color: #f05a25; }

        .read-pill { position: absolute; bottom: 10px; right: 10px; background: rgba(255,248,246,0.88); backdrop-filter: blur(6px); color: #f05a25; font-size: 10px; font-weight: 600; padding: 3px 10px; border-radius: 0px; border: 1px solid rgba(240,90,37,.15); z-index: 2; }

        @media (max-width:1024px) {
          .project-hero { grid-template-columns:1fr 1fr; }
          .project-hero .card-feat { grid-column:1/3; }
          .project-row { grid-template-columns:1fr 1fr; }
          .featured-grid { grid-template-columns:1fr 1fr; }
          .card-big { grid-column:1/3; grid-row:auto; }
          .sk-grid { grid-template-columns:1fr; }
        }

        @media (max-width:640px) {
          .project-hero { grid-template-columns:1fr; gap: 20px; }
          .project-hero .card-feat { grid-column:1; }
          .project-row, .project-row3 { grid-template-columns:1fr; gap: 20px; }
          .featured-grid { grid-template-columns:1fr; gap: 20px; }
          .card-big { grid-column:1; }
        }

        /* HEADER SEC OVERRIDE HEADER BLOGPAGE TO KEEP DARK TONE */
        .sec-head--light .sec-head__title, .sec-head--light .sec-head__title em { color: #ffffff !important; }
        .sec-head--light .sec-head__ghost { color: #ffffff !important; opacity:0.03 !important; }
        .sec-head--light .sec-head__more { color: #ffffff; border-color: rgba(255,255,255,0.2); }
        /* HEADER SEC */
        .sec-head { display: flex; align-items: flex-end; justify-content: space-between; padding: 56px 0 26px; position: relative; }
        .sec-head--light .sec-head__title, .sec-head--light .sec-head__title em { color: #ffffff !important; }
        .sec-head--light .sec-head__ghost { color: #ffffff !important; opacity:0.03 !important; }
        .sec-head--light .sec-head__more { color: #ffffff; border-color: rgba(255,255,255,0.2); }
        .sec-head__ghost { position: absolute; left: -4px; bottom: 18px; font-family: 'Cormorant Garamond', serif; font-size: 8.5rem; font-weight: 700; font-style: italic; line-height: 1; color: #f05a25; opacity: 0.055; pointer-events: none; user-select: none; letter-spacing: -0.03em; white-space: nowrap; }
        .sec-head__main { position: relative; z-index: 1; }
        .sec-head__eyebrow { font-size: 10.5px; font-weight: 600; letter-spacing: 0.2em; text-transform: uppercase; color: #f05a25; opacity: 0.8; margin-bottom: 6px; display: flex; align-items: center; gap: 8px; }
        .sec-head__eyebrow::before { content: ''; display: inline-block; width: 22px; height: 1.5px; background: #f05a25; }
        .sec-head__title { font-family: "League Spartan", sans-serif !important; font-weight: 900 !important; text-transform: uppercase; letter-spacing: -0.02em; font-size: 2.8rem; line-height: 1.1; color: #1d2857; }
        .sec-head__title em { font-family: "League Spartan", sans-serif !important; color: #f05a25; font-style: normal; text-transform: uppercase; }
        .sec-head__more { display: inline-flex; align-items: center; gap: 7px; font-size: 11.5px; font-weight: 600; color: rgba(255,255,255,0.6); text-decoration: none; letter-spacing: 0.08em; text-transform: uppercase; border-bottom: 1.5px solid rgba(255,255,255,0.2); padding-bottom: 6px; transition: color .2s, border-color .2s, gap .2s; white-space: nowrap; align-self: flex-end; }
        .sec-head__more::after { content: '→'; font-size: 13px; }
        .sec-head__more:hover { color: #f05a25; border-color: #f05a25; gap: 11px; }
        @media (max-width:640px) { .sec-head { margin-bottom: 32px; } .sec-head__title { font-size:1.75rem; } .sec-head__ghost { font-size: 70px; top: -15px; left: -10px; } }

        </style>
</head>
<body class="relative bg-brand-navy3">

    <!-- CUSTOM CURSOR -->
    <div class="cursor" id="cursor">
        <div class="cursor__ring" id="cursorRing"></div>
        <div class="cursor__dot" id="cursorDot"></div>
    </div>


    <main>
        
        <!-- ================= SECTION 1: HERO VIDEO BACKGROUND ================= -->
        <section class="relative h-screen min-h-[700px] flex items-center justify-center overflow-hidden bg-brand-navy3">
            
            <div class="hero-video-wrap">
                <img src="https://ledkimlong.com/wp-content/uploads/2023/10/384277662_6540973292664442_2689789734785120511_n.jpg" 
                     alt="TavaLLS Vision Background" 
                     class="absolute w-full h-full object-cover" 
                     style="filter: brightness(0.5) saturate(1.2);">
            </div>
            
            <div class="hero-overlay"></div>

            <div class="absolute top-1/3 left-0 w-full overflow-hidden pointer-events-none z-0 flex justify-center">
                <h1 class="text-[12vw] leading-none font-black text-stroke-light whitespace-nowrap opacity-50 select-none">TAVALLS VISION</h1>
            </div>

            <div class="relative z-10 px-6 lg:px-20 max-w-5xl mt-20 text-center reveal-up">
                <p class="font-mono text-brand-orange font-bold tracking-[0.25em] uppercase text-xs md:text-sm mb-6 flex items-center justify-center gap-4">
                    <span class="w-8 h-[1px] bg-brand-orange"></span> Giải Pháp Hình Ảnh & Âm Thanh Toàn Diện <span class="w-8 h-[1px] bg-brand-orange"></span>
                </p>
                
                <h2 class="font-serif text-5xl md:text-7xl lg:text-[6.5rem] leading-[1.05] text-white tracking-tight mb-8">
                    Đánh Thức Mọi <br>
                    <span class="italic font-light text-brand-orange">Giác Quan.</span>
                </h2>
                
                <p class="text-white/70 font-light text-base md:text-lg max-w-2xl mx-auto leading-relaxed mb-10">
                    Hơn một thập kỷ tiên phong, TavaLLS tự hào là nhà cung cấp và thi công trọn gói hệ thống Màn hình LED, Âm thanh & Ánh sáng chuyên nghiệp cho hàng trăm đại dự án trên toàn quốc.
                </p>
                
                <div class="flex flex-wrap items-center justify-center gap-6">
                    <a href="#solutions" class="btn-primary interactive">
                        Khám phá giải pháp <i class="ph-bold ph-arrow-down-right text-lg"></i>
                    </a>
                </div>
            </div>

            <div class="absolute bottom-10 left-1/2 -translate-x-1/2 z-10 animate-bounce">
                <a href="#solutions" class="text-white/50 hover:text-brand-orange interactive transition-colors"><i class="ph ph-caret-double-down text-3xl"></i></a>
            </div>
        </section>

        <!-- ================= SECTION 2: GIẢI PHÁP ================= -->
        <section id="solutions" class="py-32 bg-brand-navy3 border-b border-white/10 relative scroll-mt-20">
            <div class="container mx-auto px-6 lg:px-12 max-w-[1400px]">
                
                <div class="mb-16 reveal-up">
                    <h2 class="font-mono text-brand-orange uppercase tracking-widest text-sm mb-2">Hệ Sinh Thái</h2>
                    <h3 class="font-serif text-4xl md:text-5xl text-white">Giải Pháp Cung Cấp</h3>
                </div>

                <div class="flex flex-col">
                    <!-- LED -->
                    <div class="sol-list-item interactive reveal-up flex flex-col md:flex-row gap-8 items-center group">
                        <div class="w-full md:w-1/3 flex items-center gap-6">
                            <span class="font-mono text-5xl font-black text-white/10 group-hover:text-brand-orange transition-colors">01</span>
                            <h4 class="font-serif text-3xl md:text-4xl text-white">Màn Hình<br><em class="text-brand-orange">LED</em></h4>
                        </div>
                        <div class="w-full md:w-2/3 flex flex-col md:flex-row gap-8 items-start md:items-center justify-between">
                            <p class="text-white/60 text-sm leading-relaxed max-w-md">Lắp đặt màn hình LED Indoor/Outdoor, LED Cong, LED Transparent. Hình ảnh sắc nét 4K/8K, độ bền cực cao, chịu mọi điều kiện thời tiết.</p>
                            <!-- Link cuộn mượt xuống Section LED -->
                            <a href="#product-led" class="inline-flex items-center gap-2 text-white text-xs font-bold uppercase tracking-widest border border-white/20 px-6 py-3 hover:bg-brand-orange hover:border-brand-orange transition-colors whitespace-nowrap">Chi tiết <i class="ph-bold ph-arrow-down"></i></a>
                        </div>
                    </div>

                    <!-- Audio -->
                    <div class="sol-list-item interactive reveal-up delay-1 flex flex-col md:flex-row gap-8 items-center group">
                        <div class="w-full md:w-1/3 flex items-center gap-6">
                            <span class="font-mono text-5xl font-black text-white/10 group-hover:text-brand-orange transition-colors">02</span>
                            <h4 class="font-serif text-3xl md:text-4xl text-white">Hệ Thống<br><em class="text-brand-orange">Âm Thanh</em></h4>
                        </div>
                        <div class="w-full md:w-2/3 flex flex-col md:flex-row gap-8 items-start md:items-center justify-between">
                            <p class="text-white/60 text-sm leading-relaxed max-w-md">Phân phối và setup dàn loa Line Array ngoài trời, hệ thống Subwoofer mạnh mẽ cho Club/Lounge, cùng các thiết bị Digital Mixer chuyên nghiệp.</p>
                            <!-- Link cuộn mượt xuống Section Audio -->
                            <a href="#product-audio" class="inline-flex items-center gap-2 text-white text-xs font-bold uppercase tracking-widest border border-white/20 px-6 py-3 hover:bg-brand-orange hover:border-brand-orange transition-colors whitespace-nowrap">Chi tiết <i class="ph-bold ph-arrow-down"></i></a>
                        </div>
                    </div>

                    <!-- Lighting -->
                    <div class="sol-list-item interactive reveal-up delay-2 flex flex-col md:flex-row gap-8 items-center group">
                        <div class="w-full md:w-1/3 flex items-center gap-6">
                            <span class="font-mono text-5xl font-black text-white/10 group-hover:text-brand-orange transition-colors">03</span>
                            <h4 class="font-serif text-3xl md:text-4xl text-white">Hệ Thống<br><em class="text-brand-orange">Ánh Sáng</em></h4>
                        </div>
                        <div class="w-full md:w-2/3 flex flex-col md:flex-row gap-8 items-start md:items-center justify-between">
                            <p class="text-white/60 text-sm leading-relaxed max-w-md">Thiết kế ánh sáng nghệ thuật với các dòng đèn Moving Head, Par LED, Laser Mapping và hệ thống Kinetic chuyển động 3D ảo diệu.</p>
                            <!-- Link cuộn mượt xuống Section Light -->
                            <a href="#product-light" class="inline-flex items-center gap-2 text-white text-xs font-bold uppercase tracking-widest border border-white/20 px-6 py-3 hover:bg-brand-orange hover:border-brand-orange transition-colors whitespace-nowrap">Chi tiết <i class="ph-bold ph-arrow-down"></i></a>
                        </div>
                    </div>
                </div>

            </div>
        </section>

        <!-- ================= SECTION 3: SẢN PHẨM ================= -->
        <section id="products" class="py-24 bg-[#f8fafc]">
            <div class="container mx-auto px-6 lg:px-12 max-w-[1400px] mb-8 reveal-up text-center">
                <h2 class="font-mono text-brand-orange uppercase tracking-widest text-sm mb-2">Catalogue Toàn Diện</h2>
                <h3 class="font-serif text-4xl md:text-5xl text-brand-navy font-bold">Thiết Bị Cốt Lõi</h3>
                <p class="text-gray-500 mt-4 max-w-2xl mx-auto">TavaLLS tự hào là nhà phân phối chiến lược của các thương hiệu phần cứng hiển thị và âm thanh ánh sáng hàng đầu thế giới.</p>
            </div>

            <!-- SECTION: MÀN HÌNH LED (scroll-mt-24 để cuộn không bị lấp bởi header) -->
            <div id="product-led" class="container mx-auto px-6 lg:px-12 max-w-[1400px] pt-8 pb-24 scroll-mt-24">
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6 pb-6 border-b border-gray-200">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <span class="w-8 h-[2px] bg-brand-orange"></span>
                            <span class="text-brand-orange font-bold uppercase tracking-widest text-xs">Hiển Thị Đỉnh Cao</span>
                        </div>
                        <h3 class="font-serif text-4xl md:text-5xl font-bold text-brand-navy">Màn Hình LED & Xử Lý</h3>
                    </div>
                    <a href="<?php echo home_url('/tat-ca-san-pham/'); ?>" class="inline-flex items-center gap-2 group text-brand-navy text-sm font-bold uppercase tracking-widest transition-colors mb-2">
                        <span class="border-b-2 border-transparent group-hover:border-brand-orange transition-colors pb-1">Xem tất cả kho LED</span>
                        <span class="w-8 h-8 rounded-full bg-white border border-gray-200 flex items-center justify-center group-hover:bg-brand-orange group-hover:border-brand-orange group-hover:text-white transition-all"><i class="ph-bold ph-arrow-right"></i></span>
                    </a>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 reveal-up">
                    <?php
                    $query_led = new WP_Query([
                        'post_type' => 'tava_product',
                        'posts_per_page' => 4,
                        'tax_query' => [
                            [
                                'taxonomy' => 'product_cat',
                                'field' => 'name',
                                'terms' => 'Màn hình LED'
                            ]
                        ]
                    ]);
                    if ($query_led->have_posts()) :
                        while ($query_led->have_posts()) : $query_led->the_post();
                            get_template_part('app/Views/components/product-card');
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<p class="text-gray-500 col-span-full">Đang cập nhật sản phẩm.</p>';
                    endif;
                    ?>
                </div>
            </div>

            <!-- SECTION: ÂM THANH -->
            <div id="product-audio" class="container mx-auto px-6 lg:px-12 max-w-[1400px] mt-24 pt-16 lg:mt-32 lg:pt-24 pb-24 scroll-mt-24">
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6 pb-6 border-b border-gray-200">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <span class="w-8 h-[2px] bg-brand-orange"></span>
                            <span class="text-brand-orange font-bold uppercase tracking-widest text-xs">Âm Thanh Sân Khấu</span>
                        </div>
                        <h3 class="font-serif text-4xl md:text-5xl font-bold text-brand-navy">Hệ Thống Âm Thanh</h3>
                    </div>
                    <a href="<?php echo home_url('/tat-ca-san-pham/'); ?>" class="inline-flex items-center gap-2 group text-brand-navy text-sm font-bold uppercase tracking-widest transition-colors mb-2">
                        <span class="border-b-2 border-transparent group-hover:border-brand-orange transition-colors pb-1">Kho thiết bị âm thanh</span>
                        <span class="w-8 h-8 rounded-full bg-white border border-gray-200 flex items-center justify-center group-hover:bg-brand-orange group-hover:border-brand-orange group-hover:text-white transition-all"><i class="ph-bold ph-arrow-right"></i></span>
                    </a>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 reveal-up">
                    <?php
                    $query_audio = new WP_Query([
                        'post_type' => 'tava_product',
                        'posts_per_page' => 4,
                        'tax_query' => [
                            [
                                'taxonomy' => 'product_cat',
                                'field' => 'name',
                                'terms' => 'Âm thanh'
                            ]
                        ]
                    ]);
                    if ($query_audio->have_posts()) :
                        while ($query_audio->have_posts()) : $query_audio->the_post();
                            get_template_part('app/Views/components/product-card');
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<p class="text-gray-500 col-span-full">Đang cập nhật sản phẩm.</p>';
                    endif;
                    ?>
                </div>
            </div>

            <!-- SECTION: ÁNH SÁNG -->
            <div id="product-light" class="container mx-auto px-6 lg:px-12 max-w-[1400px] mt-24 pt-16 lg:mt-32 lg:pt-24 pb-24 scroll-mt-24">
                <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6 pb-6 border-b border-gray-200">
                    <div>
                        <div class="flex items-center gap-3 mb-3">
                            <span class="w-8 h-[2px] bg-brand-orange"></span>
                            <span class="text-brand-orange font-bold uppercase tracking-widest text-xs">Hiệu Ứng Nghệ Thuật</span>
                        </div>
                        <h3 class="font-serif text-4xl md:text-5xl font-bold text-brand-navy">Hệ Thống Ánh Sáng</h3>
                    </div>
                    <a href="<?php echo home_url('/tat-ca-san-pham/'); ?>" class="inline-flex items-center gap-2 group text-brand-navy text-sm font-bold uppercase tracking-widest transition-colors mb-2">
                        <span class="border-b-2 border-transparent group-hover:border-brand-orange transition-colors pb-1">Kho thiết bị ánh sáng</span>
                        <span class="w-8 h-8 rounded-full bg-white border border-gray-200 flex items-center justify-center group-hover:bg-brand-orange group-hover:border-brand-orange group-hover:text-white transition-all"><i class="ph-bold ph-arrow-right"></i></span>
                    </a>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 reveal-up">
                    <?php
                    $query_light = new WP_Query([
                        'post_type' => 'tava_product',
                        'posts_per_page' => 4,
                        'tax_query' => [
                            [
                                'taxonomy' => 'product_cat',
                                'field' => 'name',
                                'terms' => 'Ánh sáng'
                            ]
                        ]
                    ]);
                    if ($query_light->have_posts()) :
                        while ($query_light->have_posts()) : $query_light->the_post();
                            get_template_part('app/Views/components/product-card');
                        endwhile;
                        wp_reset_postdata();
                    else :
                        echo '<p class="text-gray-500 col-span-full">Đang cập nhật sản phẩm.</p>';
                    endif;
                    ?>
                </div>
            </div>
            
        </section>

        <!-- ================= SECTION 4: THƯ VIỆN DỰ ÁN (FULL WIDTH - ĐỒ SỘ NHẤT) ================= -->
        <section id="projects" class="pt-32 pb-0 bg-brand-navy3 overflow-hidden">
            <div class="container mx-auto px-6 lg:px-12 text-center mb-10 reveal-up">
                <h2 class="font-mono text-brand-orange uppercase tracking-widest text-sm mb-4">Visual Portfolio</h2>
                <h3 class="font-serif text-4xl md:text-6xl text-white mb-6">Dấu Ấn Hàng Trăm<br>Dự Án Quy Mô</h3>
                <p class="text-white/60 max-w-2xl mx-auto">Không gì chứng minh năng lực tốt hơn những công trình thực tế. Dưới đây là một phần nhỏ trong số hơn 500+ dự án mà TavaLLS đã kiến tạo trên khắp Việt Nam.</p>
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
                        <img src="<?php echo esc_url($img_src); ?>" alt="">
                    </div>
                    <?php 
                        }
                    } else {
                        // Demo content nếu admin chưa setup
                    ?>
                        <div class="g-item">
                            <img src="https://images.unsplash.com/photo-1540039155732-d674d0e8c04c?w=1000&q=80" alt="EDM">
                        </div>
                        <div class="g-item">
                            <img src="https://images.unsplash.com/photo-1516450360452-9312f5e86fc7?w=600&q=80" alt="Club">
                        </div>
                        <div class="g-item">
                            <img src="https://images.unsplash.com/photo-1506157786151-b8491531f063?w=600&q=80" alt="Laser">
                        </div>
                        <div class="g-item">
                            <img src="https://images.unsplash.com/photo-1492684223066-81342ee5ff30?w=1000&q=80" alt="Concert">
                        </div>
                        <div class="g-item">
                            <img src="https://images.unsplash.com/photo-1514525253161-7a46d19cd819?w=600&q=80" alt="Stage">
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
            
            <div class="container mx-auto px-6 lg:px-16 max-w-[1400px]">

                <!-- ════════════════════════════════════════
                     01 — DỰ ÁN TIN TỨC
                ════════════════════════════════════════ -->
                <div class="reveal-up">
                  <div class="sec-head sec-head--light">
                    <span class="sec-head__ghost">Dự Án</span>
                    <div class="sec-head__main">
                      <div class="sec-head__eyebrow">Công trình tiêu biểu</div>
                      <h2 class="sec-head__title">Bài Viết <em>Dự Án</em></h2>
                    </div>
                    <a href="#" class="sec-head__more">Xem tất cả dự án</a>
                  </div>

                  <!-- Hero row: 1 large + 2 stacked -->
                  <div class="project-hero">
                    <div class="card card-feat">
                      <div class="card__thumb" style="height:380px">
                        <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=900&q=80" alt="">
                        <span class="cat">Trong nhà · P2</span>
                        <span class="loc-tag">📍 Hà Nội</span>
                      </div>
                      <div class="card__body">
                        <div class="card__meta"><span>Tháng 5, 2025</span><span class="meta-dot"></span><span>Học viện</span><span class="meta-dot"></span><span>Màn hình P2 · 6m²</span></div>
                        <h3 class="card__title" style="font-size:1.3rem">Lắp đặt màn hình LED P2 tại Học Viện Kỹ Thuật Mật Mã</h3>
                        <p class="card__desc">Hệ thống màn hình LED P2 độ phân giải cao được thi công trong hội trường chính của Học Viện Kỹ Thuật Mật Mã, đáp ứng yêu cầu hiển thị sắc nét cho các hội nghị và sự kiện chuyên ngành.</p>
                        <div class="card__foot">
                          <div class="stats">
                            <span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>2.4k</span>
                            <span class="stat"><svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>148</span>
                          </div>
                          <a href="#" class="read-more">Xem dự án</a>
                        </div>
                      </div>
                    </div>

                    <div class="project-hero__right">
                      <div class="card">
                        <div class="card__thumb" style="height:178px">
                          <img src="https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=600&q=80" alt="">
                          <span class="cat">Trong nhà · P2</span>
                          <span class="loc-tag">📍 TP.HCM</span>
                        </div>
                        <div class="card__body">
                          <div class="card__meta"><span>Tháng 4, 2025</span><span class="meta-dot"></span><span>Doanh nghiệp</span></div>
                          <h3 class="card__title" style="font-size:.92rem">Lắp đặt LED P2 tại Công Ty TNHH MTV Cao Su 75</h3>
                          <div class="card__foot"><div class="stats"><span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>1.3k</span></div><a href="#" class="read-more">Xem</a></div>
                        </div>
                      </div>
                      <div class="card">
                        <div class="card__thumb" style="height:178px">
                          <img src="https://images.unsplash.com/photo-1567521464027-f127ff144326?w=600&q=80" alt="">
                          <span class="cat">Ngoài trời · P1.8</span>
                          <span class="loc-tag">📍 Hà Nội</span>
                        </div>
                        <div class="card__body">
                          <div class="card__meta"><span>Tháng 3, 2025</span><span class="meta-dot"></span><span>Xây dựng</span></div>
                          <h3 class="card__title" style="font-size:.92rem">Lắp đặt LED P1.8 tại Công ty Cổ Phần XD & TM Mai 299</h3>
                          <div class="card__foot"><div class="stats"><span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>904</span></div><a href="#" class="read-more">Xem</a></div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- Row 2: 4 cards -->
                  <div class="project-row">
                    <div class="card">
                      <div class="card__thumb" style="height:150px">
                        <img src="https://images.unsplash.com/photo-1519389950473-47ba0277781c?w=500&q=80" alt="">
                        <span class="cat">P1.5 · Trong nhà</span>
                        <span class="loc-tag">📍 Côn Đảo</span>
                      </div>
                      <div class="card__body">
                        <div class="card__meta"><span>Tháng 2, 2025</span></div>
                        <h3 class="card__title">Lắp đặt LED P1.5 trong nhà tại Côn Đảo</h3>
                        <div class="card__foot"><div class="stats"><span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>721</span></div><a href="#" class="read-more">Xem</a></div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card__thumb" style="height:150px">
                        <img src="https://images.unsplash.com/photo-1578662996442-48f60103fc96?w=500&q=80" alt="">
                        <span class="cat">P3 · Ngoài trời</span>
                        <span class="loc-tag">📍 Đà Nẵng</span>
                      </div>
                      <div class="card__body">
                        <div class="card__meta"><span>Tháng 1, 2025</span></div>
                        <h3 class="card__title">Màn hình LED P3 ngoài trời tại trung tâm thương mại Đà Nẵng</h3>
                        <div class="card__foot"><div class="stats"><span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>886</span></div><a href="#" class="read-more">Xem</a></div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card__thumb" style="height:150px">
                        <img src="https://images.unsplash.com/photo-1509391366360-2e959784a276?w=500&q=80" alt="">
                        <span class="cat">P4 · Sân vận động</span>
                        <span class="loc-tag">📍 Cần Thơ</span>
                      </div>
                      <div class="card__body">
                        <div class="card__meta"><span>Tháng 12, 2024</span></div>
                        <h3 class="card__title">Thi công màn hình LED sân vận động Cần Thơ diện tích 40m²</h3>
                        <div class="card__foot"><div class="stats"><span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>1.1k</span></div><a href="#" class="read-more">Xem</a></div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card__thumb" style="height:150px">
                        <img src="https://images.unsplash.com/photo-1486325212027-8081e485255e?w=500&q=80" alt="">
                        <span class="cat">P5 · Billboard</span>
                        <span class="loc-tag">📍 Hải Phòng</span>
                      </div>
                      <div class="card__body">
                        <div class="card__meta"><span>Tháng 11, 2024</span></div>
                        <h3 class="card__title">Billboard LED P5 ngoài trời tại Hải Phòng cho thương hiệu quốc tế</h3>
                        <div class="card__foot"><div class="stats"><span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>932</span></div><a href="#" class="read-more">Xem</a></div>
                      </div>
                    </div>
                  </div>

                  <!-- Row 3: 3 cards -->
                  <div class="project-row3">
                    <div class="card">
                      <div class="card__thumb" style="height:165px">
                        <img src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=500&q=80" alt="">
                        <span class="cat">P2.5 · Hội trường</span>
                        <span class="loc-tag">📍 Hà Nội</span>
                      </div>
                      <div class="card__body">
                        <div class="card__meta"><span>Tháng 10, 2024</span></div>
                        <h3 class="card__title">LED P2.5 phòng họp Bộ Tài Chính — diện tích 12m²</h3>
                        <div class="card__foot"><div class="stats"><span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>685</span></div><a href="#" class="read-more">Xem</a></div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card__thumb" style="height:165px">
                        <img src="https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=500&q=80" alt="">
                        <span class="cat">P6 · Quảng cáo</span>
                        <span class="loc-tag">📍 TP.HCM</span>
                      </div>
                      <div class="card__body">
                        <div class="card__meta"><span>Tháng 9, 2024</span></div>
                        <h3 class="card__title">Cụm màn hình LED quảng cáo P6 tại Vincom Đồng Khởi</h3>
                        <div class="card__foot"><div class="stats"><span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>812</span></div><a href="#" class="read-more">Xem</a></div>
                      </div>
                    </div>
                    <div class="card">
                      <div class="card__thumb" style="height:165px">
                        <img src="https://images.unsplash.com/photo-1541888946425-d81bb19240f5?w=500&q=80" alt="">
                        <span class="cat">P4 · Thi đấu</span>
                        <span class="loc-tag">📍 Huế</span>
                      </div>
                      <div class="card__body">
                        <div class="card__meta"><span>Tháng 8, 2024</span></div>
                        <h3 class="card__title">Màn hình scoreboard LED sân vận động Tự Do — TP Huế</h3>
                        <div class="card__foot"><div class="stats"><span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>743</span></div><a href="#" class="read-more">Xem</a></div>
                      </div>
                    </div>
                  </div>
                </div>


                
                <!-- ════════════════════════════════════════
                     02 — CHIA SẺ KINH NGHIỆM
                ════════════════════════════════════════ -->
                <div class="reveal-up">
                  <div class="sec-head sec-head--light border-t border-white/10 pt-16 mt-8">
                    <span class="sec-head__ghost">Kinh Nghiệm</span>
                    <div class="sec-head__main">
                      <div class="sec-head__eyebrow">Góc nhìn chuyên môn</div>
                      <h2 class="sec-head__title">Chia Sẻ <em>Kinh Nghiệm</em></h2>
                    </div>
                    <a href="#" class="sec-head__more">Xem tất cả</a>
                  </div>

                  <div class="featured-grid">
                    <div class="card card-big">
                      <div class="card__thumb">
                        <img src="https://images.unsplash.com/photo-1518770660439-4636190af475?w=800&q=80" alt="">
                        <span class="cat">Nổi Bật</span>
                        <span class="read-pill">8 phút đọc</span>
                      </div>
                      <div class="card__body">
                        <div class="card__meta"><span>12 tháng 6, 2025</span><span class="meta-dot"></span><span>Kỹ thuật</span></div>
                        <h3 class="card__title">So sánh màn hình LED và LCD: Cuộc chiến công nghệ hiển thị đỉnh cao trong kỷ nguyên số</h3>
                        <p class="card__desc">Khi các toà nhà thương mại, sân vận động và trung tâm thương mại đều đang chuyển sang màn hình LED, câu hỏi lớn vẫn còn đó: LED hay LCD? Bài phân tích toàn diện từ độ sáng, tuổi thọ đến chi phí vận hành thực tế.</p>
                        <div class="card__foot">
                          <div class="stats">
                            <span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>3.4k</span>
                            <span class="stat"><svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>84</span>
                          </div>
                          <a href="#" class="read-more">Đọc ngay</a>
                        </div>
                      </div>
                    </div>
                    <div class="card card-sm">
                      <div class="card__thumb"><img src="https://images.unsplash.com/photo-1498049794561-7780e7231661?w=500&q=80" alt=""><span class="cat">Kỹ thuật</span></div>
                      <div class="card__body">
                        <div class="card__meta"><span>8 tháng 6</span><span class="meta-dot"></span><span>6 phút</span></div>
                        <h3 class="card__title">Màn hình LED COB là gì? Giải mã công nghệ mới nhất hiện nay</h3>
                        <div class="card__foot"><div class="stats"><span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>1.2k</span></div><a href="#" class="read-more">Đọc</a></div>
                      </div>
                    </div>
                    <div class="card card-sm">
                      <div class="card__thumb"><img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=500&q=80" alt=""><span class="cat">Tư vấn</span></div>
                      <div class="card__body">
                        <div class="card__meta"><span>5 tháng 6</span><span class="meta-dot"></span><span>5 phút</span></div>
                        <h3 class="card__title">Độ tương phản màn hình LED: Bí quyết tạo hình ảnh sống động</h3>
                        <div class="card__foot"><div class="stats"><span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>987</span></div><a href="#" class="read-more">Đọc</a></div>
                      </div>
                    </div>
                    <div class="card card-sm">
                      <div class="card__thumb"><img src="https://images.unsplash.com/photo-1488229297570-58520851e868?w=500&q=80" alt=""><span class="cat">Báo giá</span></div>
                      <div class="card__body">
                        <div class="card__meta"><span>28 tháng 5</span><span class="meta-dot"></span><span>7 phút</span></div>
                        <h3 class="card__title">Báo giá màn hình LED quảng cáo 250 inch – Tất cả loại 2025</h3>
                        <div class="card__foot"><div class="stats"><span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>2.1k</span></div><a href="#" class="read-more">Đọc</a></div>
                      </div>
                    </div>
                    <div class="card card-sm">
                      <div class="card__thumb"><img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=500&q=80" alt=""><span class="cat">Kinh nghiệm</span></div>
                      <div class="card__body">
                        <div class="card__meta"><span>20 tháng 5</span><span class="meta-dot"></span><span>9 phút</span></div>
                        <h3 class="card__title">Tần số quét màn hình LED: Cách chọn đúng cho từng ứng dụng</h3>
                        <div class="card__foot"><div class="stats"><span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>1.4k</span></div><a href="#" class="read-more">Đọc</a></div>
                      </div>
                    </div>
                  </div>
                </div>




                <!-- ════════════════════════════════════════
                     03 — SỰ KIỆN NỔI BẬT
                ════════════════════════════════════════ -->
                <div class="reveal-up">
                  <div class="sec-head sec-head--light border-t border-white/10 pt-16 mt-8">
                    <span class="sec-head__ghost">Sự Kiện</span>
                    <div class="sec-head__main">
                      <div class="sec-head__eyebrow">Hoạt động & Đối tác</div>
                      <h2 class="sec-head__title">Sự Kiện <em>Nổi Bật</em></h2>
                    </div>
                    <a href="#" class="sec-head__more">Xem tất cả</a>
                  </div>

                  <div class="sk-grid">
                    <div class="card card-big">
                      <div class="card__thumb">
                        <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?w=900&q=80" alt="">
                        <span class="cat">Hợp tác chiến lược</span>
                      </div>
                      <div class="card__body">
                        <div class="card__meta"><span>15 tháng 4, 2025</span><span class="meta-dot"></span><span>Sự kiện doanh nghiệp</span></div>
                        <h3 class="card__title">TavaLLS và Colorlight tăng cường hợp tác — Nâng cao chất lượng màn hình LED tại Việt Nam</h3>
                        <p class="card__desc">Lễ ký kết hợp tác chiến lược giữa TavaLLS và tập đoàn Colorlight mở ra kỷ nguyên mới cho ngành hiển thị LED tại Việt Nam, với cam kết cung cấp giải pháp đẳng cấp quốc tế.</p>
                        <div class="card__foot">
                          <div class="stats">
                            <span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>3.1k</span>
                            <span class="stat"><svg viewBox="0 0 24 24"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/></svg>67</span>
                          </div>
                          <a href="#" class="read-more">Chi tiết</a>
                        </div>
                      </div>
                    </div>

                    <div class="sk-right">
                      <div class="card card-md">
                        <div class="card__thumb" style="height:155px">
                          <img src="https://images.unsplash.com/photo-1511578314322-379afb476865?w=600&q=80" alt="">
                          <span class="cat">Thăm quan</span>
                        </div>
                        <div class="card__body">
                          <div class="card__meta"><span>8 tháng 3, 2025</span><span class="meta-dot"></span><span>Đối tác quốc tế</span></div>
                          <h3 class="card__title">QiangliLED đến thăm TavaLLS: Nâng tầm quan hệ đối tác chiến lược dài hạn</h3>
                          <div class="card__foot"><div class="stats"><span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>1.4k</span></div><a href="#" class="read-more">Xem</a></div>
                        </div>
                      </div>
                      <div class="card card-md">
                        <div class="card__thumb" style="height:155px">
                          <img src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=600&q=80" alt="">
                          <span class="cat">Team Building</span>
                        </div>
                        <div class="card__body">
                          <div class="card__meta"><span>12 tháng 2, 2025</span><span class="meta-dot"></span><span>Nội bộ</span></div>
                          <h3 class="card__title">Team Building Hà Giang 2024 — Kỷ Niệm 5 Năm Thành Lập TavaLLS</h3>
                          <div class="card__foot"><div class="stats"><span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>2.2k</span></div><a href="#" class="read-more">Xem</a></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>




                <!-- ════════════════════════════════════════
                     04 — TIN TỨC
                ════════════════════════════════════════ -->
                <div class="reveal-up">
                  <div class="sec-head sec-head--light border-t border-white/10 pt-16 mt-8">
                    <span class="sec-head__ghost">Tin Tức</span>
                    <div class="sec-head__main">
                      <div class="sec-head__eyebrow">Cập nhật mới nhất</div>
                      <h2 class="sec-head__title">Tin <em>Tức</em> & Cập <em>Nhật</em></h2>
                    </div>
                    <a href="#" class="sec-head__more">Xem tất cả</a>
                  </div>

                  <div class="grid-3">
                    <div class="card card-md">
                      <div class="card__thumb">
                        <img src="https://images.unsplash.com/photo-1504711434969-e33886168f5c?w=600&q=80" alt="">
                        <span class="cat">Thị trường</span>
                      </div>
                      <div class="card__body">
                        <div class="card__meta"><span>3 tháng 6</span><span class="meta-dot"></span><span>Xu hướng 2025</span></div>
                        <h3 class="card__title">Thi công màn hình LED 120 inch ngoài trời: Xu hướng bùng nổ năm 2025</h3>
                        <p class="card__desc">Ngành quảng cáo ngoài trời đang chứng kiến làn sóng chuyển đổi mạnh mẽ sang màn hình LED cỡ lớn trên toàn quốc.</p>
                        <div class="card__foot"><div class="stats"><span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>2.3k</span></div><a href="#" class="read-more">Đọc</a></div>
                      </div>
                    </div>
                    <div class="card card-md">
                      <div class="card__thumb">
                        <img src="https://images.unsplash.com/photo-1478860409698-8707f313ee8b?w=600&q=80" alt="">
                        <span class="cat">Công nghệ</span>
                      </div>
                      <div class="card__body">
                        <div class="card__meta"><span>28 tháng 5</span><span class="meta-dot"></span><span>Kỹ thuật</span></div>
                        <h3 class="card__title">Tuổi thọ màn hình LED: Bí mật kéo dài vòng đời thiết bị của bạn</h3>
                        <p class="card__desc">Với bảo trì đúng cách, màn hình LED có thể hoạt động ổn định lên tới 100.000 giờ liên tục.</p>
                        <div class="card__foot"><div class="stats"><span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>1.7k</span></div><a href="#" class="read-more">Đọc</a></div>
                      </div>
                    </div>
                    <div class="card card-md">
                      <div class="card__thumb">
                        <img src="https://images.unsplash.com/photo-1611532736597-de2d4265fba3?w=600&q=80" alt="">
                        <span class="cat">Ngành LED</span>
                      </div>
                      <div class="card__body">
                        <div class="card__meta"><span>20 tháng 5</span><span class="meta-dot"></span><span>Phân tích</span></div>
                        <h3 class="card__title">Thị trường LED Việt Nam 2025: Tăng trưởng 35% so với năm trước</h3>
                        <p class="card__desc">Báo cáo mới nhất cho thấy nhu cầu màn hình LED tại Việt Nam đang bùng nổ trong lĩnh vực giáo dục và thương mại.</p>
                        <div class="card__foot"><div class="stats"><span class="stat"><svg viewBox="0 0 24 24"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/><circle cx="12" cy="12" r="3"/></svg>1.9k</span></div><a href="#" class="read-more">Đọc</a></div>
                      </div>
                    </div>
                  </div>
                </div>



            </div>
        </section>

        <!-- ================= SECTION 6: FAQ (EDITORIAL SPLIT-SCREEN) ================= -->
        <section class="py-32 bg-[#0a0f1a] border-t border-white/5 relative overflow-hidden">
            <!-- Glow background -->
            <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-brand-orange/5 filter blur-[120px] rounded-full pointer-events-none"></div>
            
            <div class="container mx-auto px-6 lg:px-12 max-w-[1400px] relative z-10">
                <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-24 items-start">
                    
                    <!-- Left Column: Sticky Intro -->
                    <div class="lg:col-span-5 reveal-up lg:sticky lg:top-32">
                        <div class="flex items-center gap-3 text-brand-orange font-bold text-[10px] tracking-[0.2em] uppercase mb-4">
                            <span class="w-8 h-0.5 bg-brand-orange"></span> Hỗ trợ 24/7
                        </div>
                        <h2 class="font-serif text-4xl md:text-5xl text-white mb-6 leading-tight">Giải Đáp<br>Mọi Thắc Mắc</h2>
                        <p class="text-white/50 text-base leading-relaxed mb-8">TavaLLS luôn sẵn sàng đồng hành cùng bạn. Dưới đây là những câu hỏi thường gặp nhất trong quá trình tư vấn và triển khai các dự án công nghệ Nghe - Nhìn quy mô lớn.</p>

                        <!-- Tech Image Support -->
                        <div class="relative overflow-hidden mb-8 aspect-video border border-white/10 group interactive">
                            <img src="https://images.unsplash.com/photo-1581091226825-a6a2a5aee158?w=800&q=80" alt="Hỗ trợ kỹ thuật" class="w-full h-full object-cover filter brightness-[0.6] group-hover:brightness-90 group-hover:scale-105 transition-all duration-700">
                            <div class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-[#1c2857] to-transparent p-6">
                                <p class="text-white font-bold tracking-wide uppercase text-sm">Trung Tâm Hỗ Trợ Kỹ Thuật</p>
                            </div>
                        </div>

                        <a href="tel:0934298181" class="btn-outline interactive w-full">Trò chuyện trực tiếp cùng chuyên gia</a>
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
            <img src="https://images.unsplash.com/photo-1497366216548-37526070297c?w=1600&q=80" alt="Background" class="absolute inset-0 w-full h-full object-cover filter brightness-[0.2] saturate-50">
            <div class="absolute inset-0 bg-[radial-gradient(ellipse_70%_80%_at_50%_50%,rgba(240,90,37,0.15)_0%,rgba(2,6,23,0.9)_70%)]"></div>
            
            <div class="container mx-auto px-4 relative z-10 text-center reveal-up">
                <h2 class="font-serif text-5xl md:text-7xl font-bold text-white mb-6 tracking-tight">
                    Bắt đầu dự án của bạn<br><em class="text-brand-orange italic font-light">— ngay hôm nay</em>
                </h2>
                <p class="text-white/60 text-lg max-w-2xl mx-auto mb-10">Liên hệ với chuyên gia của TavaLLS để nhận bản vẽ giải pháp 3D và báo giá chi tiết hoàn toàn miễn phí.</p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="tel:0934298181" class="btn-primary interactive">
                        Gọi Hotline 0934 298 181
                    </a>
                    <a href="mailto:tuyen.tavaco@gmail.com" class="btn-outline interactive">
                        Liên hệ tư vấn
                    </a>
                </div>
            </div>
        </section>

    </main>


    <!-- SCRIPT -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Toggle Gallery Expand
            const btnShowMore = document.getElementById('btnShowMoreGallery');
            const galleryWrap = document.getElementById('homeGalleryWrap');
            if(btnShowMore && galleryWrap) {
                // Kiểm tra nếu nội dung thấp hơn max-height thì ẩn luôn nút show more
                // setTimeout để load ảnh xong sẽ đo chiều cao chuẩn hơn
                setTimeout(() => {
                    const gridHeight = document.getElementById('homeGalleryGrid').scrollHeight;
                    const wrapHeight = galleryWrap.clientHeight;
                    // Nếu nội dung ít, không vượt qua độ cao tối đa (hoặc vừa tràn một xíu)
                    if (gridHeight <= wrapHeight + 50) {
                        galleryWrap.classList.add('expanded');
                    }
                }, 1000);

                btnShowMore.addEventListener('click', () => {
                    galleryWrap.classList.add('expanded');
                });
            }

            // Custom Cursor Logic
            if(window.matchMedia("(pointer: fine)").matches) {
                const cursorDot = document.getElementById('cursorDot');
                const cursorRing = document.getElementById('cursorRing');
                let mx = 0, my = 0, rx = 0, ry = 0;
                window.addEventListener('mousemove', e => { mx = e.clientX; my = e.clientY; });
                const animCursor = () => {
                    rx += (mx - rx) * 0.14;
                    ry += (my - ry) * 0.14;
                    cursorDot.style.left = mx + 'px'; cursorDot.style.top = my + 'px';
                    cursorRing.style.left = rx + 'px'; cursorRing.style.top = ry + 'px';
                    requestAnimationFrame(animCursor);
                };
                animCursor();
            }

            // Header Sticky được xử lý tập trung tại main.js

            // Scroll Reveal Animation
            const revealElements = document.querySelectorAll('.reveal-up');
            const revealObserver = new IntersectionObserver((entries) => {
                entries.forEach(entry => { if (entry.isIntersecting) { entry.target.classList.add('active'); revealObserver.unobserve(entry.target); } });
            }, { threshold: 0.1, rootMargin: "0px 0px -50px 0px" });
            revealElements.forEach(el => revealObserver.observe(el));

            // FAQ Accordion (Smooth Grid Transition)
            const faqBtns = document.querySelectorAll('.faq-btn');
            faqBtns.forEach(btn => {
                btn.addEventListener('click', () => {
                    const answer = btn.nextElementSibling;
                    const icon = btn.querySelector('.faq-icon i');
                    const iconContainer = btn.querySelector('.faq-icon');
                    const num = btn.querySelector('.font-mono');
                    const text = btn.querySelector('.font-medium');
                    const isOpen = answer.classList.contains('open');
                    
                    // Đóng tất cả các tab khác
                    document.querySelectorAll('.faq-answer').forEach(a => a.classList.remove('open'));
                    document.querySelectorAll('.faq-icon i').forEach(i => { i.classList.remove('ph-minus'); i.classList.add('ph-plus'); });
                    document.querySelectorAll('.faq-icon').forEach(ic => { ic.classList.remove('border-brand-orange', 'bg-brand-orange/10'); ic.classList.add('border-white/20'); });
                    document.querySelectorAll('.faq-btn .font-mono').forEach(n => n.classList.remove('text-brand-orange'));
                    document.querySelectorAll('.faq-btn .font-medium').forEach(t => t.classList.remove('text-brand-orange'));

                    // Mở tab hiện tại nếu nó đang đóng
                    if(!isOpen) {
                        answer.classList.add('open');
                        icon.classList.remove('ph-plus');
                        icon.classList.add('ph-minus');
                        iconContainer.classList.remove('border-white/20');
                        iconContainer.classList.add('border-brand-orange', 'bg-brand-orange/10');
                        num.classList.add('text-brand-orange');
                        text.classList.add('text-brand-orange');
                    }
                });
            });
            // Tự động mở tab FAQ đầu tiên
            if(faqBtns.length > 0) faqBtns[0].click();
        });
    </script>

<?php get_footer(); ?>
</body>