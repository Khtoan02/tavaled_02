<?php
/**
 * Template Name: Du an truong sao mai
 */

get_header(); ?><!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dự Án Mầm Non Sao Việt</title>
    <!-- Script Tailwind này chỉ dùng để bạn xem trước, nếu theme WP của bạn đã có sẵn Tailwind CSS thì có thể bỏ dòng script này đi khi đưa vào template .php -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

<div class="bg-[#f8f9fa] font-sans text-[#17264a] selection:bg-[#f36428]/20">
      
  <!-- HERO SECTION - The Grand Stage -->
  <section class="relative pt-16 pb-20 lg:pt-24 lg:pb-32 overflow-hidden flex items-center justify-center min-h-[75vh] bg-[#17264a]">
    <!-- Soft glow matching brand orange -->
    <div class="absolute top-0 left-1/2 -translate-x-1/2 w-[800px] h-[600px] bg-[#f36428]/20 blur-[120px] rounded-full pointer-events-none"></div>
    
    <div class="absolute inset-0 z-0">
      <video 
        src="https://tavaled.vn/wp-content/uploads/2026/03/7674198545830.mp4" 
        autoplay 
        loop 
        muted 
        playsinline
        class="w-full h-full object-cover opacity-30 mix-blend-overlay"
      ></video>
      <div class="absolute inset-0 bg-gradient-to-b from-[#17264a]/80 via-[#17264a]/95 to-[#f8f9fa]"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
      <div class="inline-flex items-center gap-2 px-6 py-2.5 rounded-full bg-white/10 border border-white/20 text-white text-sm font-bold tracking-wide mb-8 backdrop-blur-md shadow-lg shadow-[#f36428]/10">
        <!-- SVG Award -->
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-[#f36428]"><circle cx="12" cy="8" r="6"/><path d="M15.477 12.89 17 22l-5-3-5 3 1.523-9.11"/></svg>
        DỰ ÁN GIÁO DỤC TRỌNG ĐIỂM 2024
      </div>
      <h1 class="text-4xl md:text-6xl lg:text-7xl font-black text-white tracking-tight mb-8 leading-tight">
        Kiến Tạo Sân Khấu <br class="hidden md:block" />
        <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#f36428] to-[#ff8c5a] drop-shadow-[0_2px_20px_rgba(243,100,40,0.4)]">
          Đẳng Cấp Quốc Tế
        </span>
      </h1>
      <p class="max-w-3xl mx-auto text-lg md:text-xl text-slate-300 mb-10 font-medium leading-relaxed">
        TavaLED tự hào là đối tác chiến lược triển khai "Hệ thống Nghe nhìn Toàn diện" cho Nhà hát Trường Mầm non Sao Việt. Một công trình phức hợp đòi hỏi tiêu chuẩn kỹ thuật, thẩm mỹ và an toàn ở mức cao nhất dành cho những mầm non tương lai.
      </p>
    </div>
  </section>

  <!-- PROJECT BRIEF - Clean & Trustworthy Education Cards -->
  <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 -mt-24 relative z-20 mb-28">
    <div class="bg-white rounded-[2rem] shadow-2xl shadow-[#17264a]/5 border border-slate-100 p-2 grid grid-cols-1 md:grid-cols-4 gap-2">
      
      <!-- Card 1 -->
      <div class="bg-[#f8f9fa] p-6 rounded-[1.5rem] hover:bg-white hover:shadow-lg transition-all duration-300 group border border-transparent hover:border-slate-100">
        <div class="flex items-center gap-3 text-slate-500 mb-3">
          <div class="p-2.5 rounded-xl bg-white shadow-sm text-[#f36428] group-hover:scale-110 transition-transform">
            <!-- SVG Building2 -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v6a2 2 0 0 0 2 2h2"/><path d="M18 9h2a2 2 0 0 1 2 2v9a2 2 0 0 1-2 2h-2"/><path d="M10 6h4"/><path d="M10 10h4"/><path d="M10 14h4"/><path d="M10 18h4"/></svg>
          </div>
          <span class="font-bold text-sm tracking-wide uppercase">Chủ đầu tư</span>
        </div>
        <p class="text-lg font-black text-[#17264a]">Hệ thống MN Sao Việt</p>
      </div>

      <!-- Card 2 -->
      <div class="bg-[#f8f9fa] p-6 rounded-[1.5rem] hover:bg-white hover:shadow-lg transition-all duration-300 group border border-transparent hover:border-slate-100">
        <div class="flex items-center gap-3 text-slate-500 mb-3">
          <div class="p-2.5 rounded-xl bg-white shadow-sm text-[#f36428] group-hover:scale-110 transition-transform">
            <!-- SVG MapPin -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
          </div>
          <span class="font-bold text-sm tracking-wide uppercase">Vị trí</span>
        </div>
        <p class="text-lg font-black text-[#17264a]">Thành phố Hải Phòng</p>
      </div>

      <!-- Card 3 -->
      <div class="bg-[#f8f9fa] p-6 rounded-[1.5rem] hover:bg-white hover:shadow-lg transition-all duration-300 group border border-transparent hover:border-slate-100">
        <div class="flex items-center gap-3 text-slate-500 mb-3">
          <div class="p-2.5 rounded-xl bg-white shadow-sm text-[#f36428] group-hover:scale-110 transition-transform">
            <!-- SVG MonitorPlay -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="m10 7 5 3-5 3Z"/><rect width="20" height="14" x="2" y="3" rx="2"/><path d="M12 17v4"/><path d="M8 21h8"/></svg>
          </div>
          <span class="font-bold text-sm tracking-wide uppercase">Quy mô</span>
        </div>
        <p class="text-lg font-black text-[#17264a]">Hệ thống Nghe Nhìn Toàn Diện</p>
      </div>

      <!-- Card 4 (Highlight) -->
      <div class="bg-[#f8f9fa] p-6 rounded-[1.5rem] hover:bg-white hover:shadow-lg transition-all duration-300 group border border-transparent hover:border-slate-100">
        <div class="flex items-center gap-3 text-slate-500 mb-3">
          <div class="p-2.5 rounded-xl bg-white shadow-sm text-[#f36428] group-hover:scale-110 transition-transform">
            <!-- SVG ShieldCheck -->
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-5 h-5"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2-1 4-2 8-2 2 1 6 2 8 2a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>
          </div>
          <span class="font-bold text-sm tracking-wide uppercase">Trạng thái</span>
        </div>
        <p class="text-lg font-black text-emerald-500">Hoàn thiện</p>
      </div>

    </div>
  </section>

  <!-- STORYTELLING TIMELINE - FULL WIDTH PREMIUM EDITORIAL -->
  <section class="w-full pt-10 pb-0 bg-white">
    <div class="text-center mb-16 md:mb-24 px-4 max-w-4xl mx-auto">
      <h2 class="text-4xl md:text-5xl font-black text-[#17264a] mb-6 tracking-tight">Hành Trình Chinh Phục Tầm Vóc Mới</h2>
      <p class="text-slate-600 text-lg md:text-xl font-medium leading-relaxed">
        Đây không chỉ là một dự án thi công đơn thuần, mà là sứ mệnh mang đến không gian đa năng hiện đại nhất. Nơi các em học sinh phát triển tài năng nghệ thuật và nhà trường tổ chức những sự kiện chuyên nghiệp.
      </p>
    </div>

    <div class="w-full flex flex-col">
      
      <!-- PHASE 1 - Khảo sát & Thiết kế -->
      <div class="flex flex-col lg:flex-row w-full min-h-[70vh] border-t border-slate-200">
        <!-- Image Side -->
        <div class="lg:w-1/2 w-full bg-slate-50 flex items-center justify-center p-8 md:p-16 relative group overflow-hidden border-b lg:border-b-0 lg:border-r border-slate-200">
           <div class="absolute inset-0 bg-[#f36428]/5 opacity-0 group-hover:opacity-100 transition-opacity duration-700 pointer-events-none"></div>
           <img 
              src="https://tavaled.vn/wp-content/uploads/2026/03/Gemini_Generated_Image_n9le64n9le64n9le-768x429.png" 
              alt="Bản vẽ thiết kế kỹ thuật" 
              class="w-full h-auto object-contain max-h-[80vh] drop-shadow-2xl group-hover:scale-105 transition-transform duration-1000"
            />
        </div>
        <!-- Text Side -->
        <div class="lg:w-1/2 w-full bg-white flex flex-col justify-center p-10 md:p-20 xl:p-32">
          <span class="inline-block px-4 py-2 rounded-full bg-[#17264a]/5 text-[#17264a] font-black tracking-widest text-xs lg:text-sm uppercase mb-6 border border-[#17264a]/10 w-fit">Bước 1: Khảo sát & Tầm nhìn</span>
          <h3 class="text-4xl lg:text-5xl font-black text-[#17264a] mb-8 leading-tight">Giải Bài Toán Khắt Khe Của Môi Trường Giáo Dục</h3>
          <p class="text-slate-600 leading-relaxed text-lg lg:text-xl font-medium mb-6">
            Để hiện thực hóa tầm nhìn của ban giám hiệu, yêu cầu đặt ra không đơn thuần là một bản vẽ kỹ thuật hoàn hảo, mà là một bài toán khắt khe về <strong class="text-[#f36428]">tâm lý và thể chất của trẻ nhỏ</strong>. Khác với các sân khấu thông thường, hệ thống nghe nhìn tại trường mầm non đòi hỏi sự tinh tế tột độ.
          </p>
          <p class="text-slate-600 leading-relaxed text-lg lg:text-xl font-medium">
            Màn hình LED phải được tinh chỉnh độ sáng và tần số quét để bảo vệ đôi mắt non nớt của các bé. Hệ thống âm thanh cần đạt độ trong trẻo tuyệt đối, lan tỏa êm ái mà không gây giật mình. Hơn hết, độ an toàn kết cấu và phòng chống cháy nổ được đặt lên mức cảnh giác cao nhất. Đội ngũ chuyên gia của TavaLED đã dành nhiều ngày đo đạc âm học, khảo sát quang học và tính toán chịu lực tỉ mỉ từng ngóc ngách, nhằm kiến tạo nên một hệ sinh thái hiện đại, bền bỉ và vô cùng nâng niu các thiên thần nhỏ.
          </p>
        </div>
      </div>

      <!-- PHASE 2 - Giải pháp Nghe nhìn Toàn diện (STICKY SCROLL) -->
      <div class="flex flex-col lg:flex-row-reverse w-full bg-[#17264a] text-white">
        <!-- Image Side - Scrollable Column -->
        <div class="lg:w-1/2 w-full flex flex-col">
           <div class="w-full h-[60vh] lg:h-screen relative overflow-hidden group border-b border-white/10">
             <img src="https://tavaled.vn/wp-content/uploads/2026/03/z7674198538335_9bbd1605a94339d615ea31ead2fe07c4-1536x1152.jpg" alt="Lắp đặt khung sắt màn hình" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000 opacity-90 group-hover:opacity-100" />
             <div class="absolute inset-0 bg-gradient-to-t from-[#17264a]/90 via-[#17264a]/20 to-transparent flex items-end p-8 md:p-12 pointer-events-none">
                <span class="text-white font-bold tracking-wide text-lg md:text-xl drop-shadow-md border-l-4 border-[#f36428] pl-4">Thi công kết cấu chịu lực cường độ cao</span>
             </div>
           </div>
           <div class="w-full h-[60vh] lg:h-screen relative overflow-hidden group border-b border-white/10">
             <img src="https://tavaled.vn/wp-content/uploads/2026/03/z7674198518094_1fa36bd6fe4e3971f4b20aae3ede2cdc-1536x1152.jpg" alt="Cận cảnh mối nối" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000 opacity-90 group-hover:opacity-100" />
             <div class="absolute inset-0 bg-gradient-to-t from-[#17264a]/90 via-[#17264a]/20 to-transparent flex items-end p-8 md:p-12 pointer-events-none">
                <span class="text-white font-bold tracking-wide text-lg md:text-xl drop-shadow-md border-l-4 border-[#f36428] pl-4">Cận cảnh các mối nối an toàn tuyệt đối</span>
             </div>
           </div>
           <div class="w-full h-[60vh] lg:h-screen relative overflow-hidden group">
             <img src="https://tavaled.vn/wp-content/uploads/2026/03/z7674198524240_9f61aeb9c9b73989083c52586bae03c3-scaled.jpg" alt="Hoàn thiện khung xương" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000 opacity-90 group-hover:opacity-100" />
             <div class="absolute inset-0 bg-gradient-to-t from-[#17264a]/90 via-[#17264a]/20 to-transparent flex items-end p-8 md:p-12 pointer-events-none">
                <span class="text-white font-bold tracking-wide text-lg md:text-xl drop-shadow-md border-l-4 border-[#f36428] pl-4">Hoàn thiện khung xương chuẩn bị lên đèn</span>
             </div>
           </div>
        </div>

        <!-- Text Side - Sticky Container -->
        <div class="lg:w-1/2 w-full relative border-r border-white/5">
          <div class="lg:sticky lg:top-0 lg:h-screen flex flex-col justify-center p-10 md:p-20 xl:p-32 overflow-y-auto custom-scrollbar">
            <span class="inline-block px-4 py-2 rounded-full bg-[#f36428]/10 text-[#f36428] font-black tracking-widest text-xs lg:text-sm uppercase mb-6 border border-[#f36428]/20 w-fit">Bước 2: Giải Pháp Đỉnh Cao</span>
            <h3 class="text-4xl lg:text-5xl font-black text-white mb-8 leading-tight">Trải Nghiệm Đa Giác Quan Hoàn Mỹ</h3>
            <p class="text-slate-300 leading-relaxed mb-12 text-lg lg:text-xl">
              Giải pháp mà TavaLED mang đến là sự kết hợp hài hòa của 3 trụ cột công nghệ chính, biến không gian nhà hát thành một sân khấu nghệ thuật thực thụ.
            </p>
            
            <div class="space-y-10">
              <div class="flex items-start gap-6">
                <div class="p-4 bg-white/5 rounded-2xl text-[#f36428] shrink-0 border border-white/10 mt-1">
                  <!-- SVG MonitorPlay -->
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8"><path d="m10 7 5 3-5 3Z"/><rect width="20" height="14" x="2" y="3" rx="2"/><path d="M12 17v4"/><path d="M8 21h8"/></svg>
                </div>
                <div>
                  <h4 class="text-white font-black text-2xl mb-3">Màn Hình LED Khổng Lồ 60m²</h4>
                  <p class="text-slate-400 text-base lg:text-lg leading-relaxed">Sử dụng công nghệ LED tiên tiến với mật độ điểm ảnh tối ưu. Sắc nét, chân thực, đóng vai trò là phông nền kỹ thuật số và công cụ trình chiếu sắc nét cho toàn bộ hội trường.</p>
                </div>
              </div>
              <div class="flex items-start gap-6">
                <div class="p-4 bg-[#f36428]/10 rounded-2xl text-[#f36428] shrink-0 border border-[#f36428]/30 shadow-[0_0_20px_rgba(243,100,40,0.1)] mt-1">
                  <!-- SVG Volume2 -->
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"/><path d="M15.54 8.46a5 5 0 0 1 0 7.07"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14"/></svg>
                </div>
                <div>
                  <h4 class="text-white font-black text-2xl mb-3">Âm Thanh Chuyên Nghiệp</h4>
                  <p class="text-slate-400 text-base lg:text-lg leading-relaxed">Hệ thống loa Line Array công suất lớn lan tỏa đều khắp khán phòng, kết hợp loa Monitor sân khấu và Digital Mixer mang lại khả năng xử lý âm thanh mạnh mẽ.</p>
                </div>
              </div>
              <div class="flex items-start gap-6">
                <div class="p-4 bg-white/5 rounded-2xl text-[#f36428] shrink-0 border border-white/10 mt-1">
                  <!-- SVG Lightbulb -->
                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="w-8 h-8"><path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.9 1.2 1.5 1.5 2.5"/><path d="M9 18h6"/><path d="M10 22h4"/></svg>
                </div>
                <div>
                  <h4 class="text-white font-black text-2xl mb-3">Ánh Sáng Nghệ Thuật</h4>
                  <p class="text-slate-400 text-base lg:text-lg leading-relaxed">Hệ thống Par LED wash sáng, Moving Head tạo luồng, cùng Laser, Follow Spot... tất cả được đồng bộ qua bàn DMX, tạo ra vô vàn kịch bản ánh sáng huyền ảo.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

  <!-- ============================================================ -->
  <!-- PHASE 2 — REDESIGN UX/UI                                    -->
  <!-- ============================================================ -->

  <!-- P2: TRANSITION BANNER -->
  <div class="w-full bg-white border-t-[6px] border-emerald-500 relative overflow-hidden">
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_rgba(16,185,129,0.07)_0%,_transparent_60%)] pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28">
      <div class="flex flex-col lg:flex-row items-center gap-12">
        <!-- Left: Badge + Heading -->
        <div class="flex-1 text-center lg:text-left">
          <span class="tava-reveal inline-flex items-center gap-2 px-5 py-2 rounded-full bg-emerald-50 text-emerald-700 font-black tracking-widest text-xs uppercase mb-6 border border-emerald-200">
            <span class="relative flex h-2 w-2"><span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span><span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-400"></span></span>
            Giai đoạn 2 · Bàn giao công trình
          </span>
          <h2 class="tava-reveal text-4xl md:text-5xl xl:text-6xl font-black text-[#17264a] tracking-tight mb-6 leading-[1.1]">
            Hoàn Thiện &amp; Bàn Giao<br/>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#f36428] to-[#ff8c5a]">Dự Án Mầm Non Sao Việt</span>
          </h2>
          <p class="tava-reveal text-slate-500 text-lg leading-relaxed max-w-2xl mx-auto lg:mx-0">
            Sau nhiều ngày thi công khẩn trương, TAVA LED đã chính thức bàn giao hệ thống nghe nhìn toàn diện — công trình đánh dấu bước tiến vượt bậc cho không gian giáo dục mầm non tiên tiến tại Hải Phòng.
          </p>
        </div>
        <!-- Right: Stats grid -->
        <div class="tava-reveal flex-shrink-0 w-full lg:w-auto">
          <div class="grid grid-cols-2 gap-4">
            <div class="bg-[#17264a] rounded-2xl p-6 text-center group hover:bg-[#f36428] transition-colors duration-300">
              <p class="text-4xl font-black text-[#f36428] group-hover:text-white transition-colors mb-1" data-count="60">0</p>
              <p class="text-white/70 text-xs font-bold tracking-wide uppercase group-hover:text-white/90 transition-colors">m² Màn hình LED</p>
            </div>
            <div class="bg-[#17264a] rounded-2xl p-6 text-center group hover:bg-[#f36428] transition-colors duration-300">
              <p class="text-4xl font-black text-[#f36428] group-hover:text-white transition-colors mb-1" data-count="3">0</p>
              <p class="text-white/70 text-xs font-bold tracking-wide uppercase group-hover:text-white/90 transition-colors">Hạng mục tích hợp</p>
            </div>
            <div class="bg-[#17264a] rounded-2xl p-6 text-center group hover:bg-[#f36428] transition-colors duration-300">
              <p class="text-4xl font-black text-[#f36428] group-hover:text-white transition-colors mb-1"><span data-count="24">0</span>T</p>
              <p class="text-white/70 text-xs font-bold tracking-wide uppercase group-hover:text-white/90 transition-colors">Bảo hành chính hãng</p>
            </div>
            <div class="bg-[#17264a] rounded-2xl p-6 text-center group hover:bg-[#f36428] transition-colors duration-300">
              <p class="text-4xl font-black text-[#f36428] group-hover:text-white transition-colors mb-1"><span data-count="100">0</span>%</p>
              <p class="text-white/70 text-xs font-bold tracking-wide uppercase group-hover:text-white/90 transition-colors">Hài lòng bàn giao</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- P2: VIDEO HERO (cinematic) -->
  <section class="w-full relative overflow-hidden bg-[#050c1a] group/video" id="p2-video" style="min-height:340px;">
    <video id="p2vid"
      src="https://tavaled.vn/wp-content/uploads/2026/04/Du-An-Truong-Mam-Non-Sao-Viet.mp4"
      autoplay loop muted playsinline
      class="w-full object-cover transition-opacity duration-500"
      style="max-height:520px; min-height:280px;"
    ></video>
    <!-- gradient overlays -->
    <div class="absolute inset-0 bg-gradient-to-r from-[#050c1a]/80 via-transparent to-[#050c1a]/30 pointer-events-none"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-[#050c1a] via-transparent to-transparent pointer-events-none"></div>
    <!-- Content overlay -->
    <div class="absolute inset-0 flex flex-col justify-end p-8 md:p-14 pointer-events-none">
      <div class="max-w-xl pointer-events-auto">
        <div class="inline-flex items-center gap-2 px-4 py-1.5 rounded-full bg-white/10 border border-white/20 backdrop-blur-md text-white font-bold text-xs tracking-wider mb-4">
          <span class="relative flex h-2 w-2"><span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span><span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-400"></span></span>
          Video thực tế — Sau bàn giao
        </div>
        <h3 class="text-2xl md:text-3xl font-black text-white leading-tight mb-3">Không gian sân khấu hoàn hảo<br/><span class="text-[#f36428]">dành cho Mầm non Sao Việt</span></h3>
        <p class="text-slate-300 text-sm md:text-base leading-relaxed">Hệ thống màn hình LED 60m², âm thanh chuyên nghiệp và ánh sáng nghệ thuật được tích hợp đồng bộ hoàn hảo.</p>
      </div>
    </div>
    <!-- Play/Pause button -->
    <button id="p2-playbtn" onclick="(function(){var v=document.getElementById('p2vid'),b=document.getElementById('p2-playbtn');if(v.paused){v.play();b.innerHTML='<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'18\' height=\'18\' fill=\'currentColor\' viewBox=\'0 0 24 24\'><rect x=\'6\' y=\'4\' width=\'4\' height=\'16\'/><rect x=\'14\' y=\'4\' width=\'4\' height=\'16\'/></svg>';}else{v.pause();b.innerHTML='<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'18\' height=\'18\' fill=\'currentColor\' viewBox=\'0 0 24 24\'><polygon points=\'5 3 19 12 5 21 5 3\'/></svg>';}})()" class="absolute bottom-8 right-8 w-12 h-12 rounded-full bg-white/10 hover:bg-white/20 border border-white/25 text-white backdrop-blur-md flex items-center justify-center transition-all duration-200 hover:scale-110 shadow-lg">
      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" viewBox="0 0 24 24"><rect x="6" y="4" width="4" height="16"/><rect x="14" y="4" width="4" height="16"/></svg>
    </button>
  </section>

  <!-- P2: GALLERY with Lightbox -->
  <section class="bg-[#0a1628] py-16 px-4" id="p2-gallery">
    <div class="max-w-7xl mx-auto">
      <div class="flex items-center justify-between mb-10">
        <div>
          <p class="text-[#f36428] text-xs font-black tracking-widest uppercase mb-2">Hình ảnh thực tế</p>
          <h3 class="text-2xl md:text-3xl font-black text-white">Công trình sau hoàn thiện</h3>
        </div>
        <button onclick="document.getElementById('tava-lb').classList.remove('hidden'); document.getElementById('tava-lb-img').src=document.getElementById('tava-lb-img').src||'https://tavaled.vn/wp-content/uploads/2026/04/Du-An-Truong-Mam-Non-Sao-Viet-He-Thong-Man-Hinh-LED-Am-Thanh-Anh-Sang.jpg'; document.getElementById('tava-lb-img').src='https://tavaled.vn/wp-content/uploads/2026/04/Du-An-Truong-Mam-Non-Sao-Viet-He-Thong-Man-Hinh-LED-Am-Thanh-Anh-Sang.jpg';" class="hidden md:flex items-center gap-2 text-slate-400 hover:text-white text-sm font-bold transition-colors">
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg>
          Xem toàn màn hình
        </button>
      </div>

      <!-- Gallery grid -->
      <div class="grid grid-cols-2 md:grid-cols-3 xl:grid-cols-4 gap-2.5" id="tava-gallery-grid">
        <?php
        $gallery = [
          ['https://tavaled.vn/wp-content/uploads/2026/04/Du-An-Truong-Mam-Non-Sao-Viet-He-Thong-Man-Hinh-LED-Am-Thanh-Anh-Sang-6.jpg', 'Hệ thống sân khấu hoàn thiện', 'xl:col-span-2 xl:row-span-2'],
          ['https://tavaled.vn/wp-content/uploads/2026/04/Du-An-Truong-Mam-Non-Sao-Viet-He-Thong-Man-Hinh-LED-Am-Thanh-Anh-Sang-5.jpg', 'Màn hình LED 60m² rực rỡ', ''],
          ['https://tavaled.vn/wp-content/uploads/2026/04/Du-An-Truong-Mam-Non-Sao-Viet-He-Thong-Man-Hinh-LED-Am-Thanh-Anh-Sang-4.jpg', 'Hệ thống ánh sáng sân khấu', ''],
          ['https://tavaled.vn/wp-content/uploads/2026/04/Du-An-Truong-Mam-Non-Sao-Viet-He-Thong-Man-Hinh-LED-Am-Thanh-Anh-Sang-3.jpg', 'Toàn cảnh hội trường', 'col-span-2'],
          ['https://tavaled.vn/wp-content/uploads/2026/04/Du-An-Truong-Mam-Non-Sao-Viet-He-Thong-Man-Hinh-LED-Am-Thanh-Anh-Sang-2.jpg', 'Chi tiết lắp đặt hoàn thiện', ''],
          ['https://tavaled.vn/wp-content/uploads/2026/04/Du-An-Truong-Mam-Non-Sao-Viet-He-Thong-Man-Hinh-LED-Am-Thanh-Anh-Sang-1.jpg', 'Hệ thống âm thanh chuyên nghiệp', ''],
          ['https://tavaled.vn/wp-content/uploads/2026/04/Du-An-Truong-Mam-Non-Sao-Viet-He-Thong-Man-Hinh-LED-Am-Thanh-Anh-Sang.jpg', 'Bàn giao dự án thành công', 'col-span-2 xl:col-span-2'],
        ];
        foreach ($gallery as $i => [$src, $cap, $extra]):
        ?>
        <div class="<?= $extra ?> overflow-hidden rounded-xl group relative cursor-pointer tava-gallery-item" style="aspect-ratio:4/3;" onclick="(function(s,c){var l=document.getElementById('tava-lb');l.classList.remove('hidden');document.getElementById('tava-lb-img').src=s;document.getElementById('tava-lb-cap').textContent=c;}('<?= $src ?>','<?= $cap ?>'))">
          <img src="<?= $src ?>" alt="<?= $cap ?>" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 ease-out" loading="lazy"/>
          <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/10 to-transparent opacity-0 group-hover:opacity-100 transition-all duration-400 flex flex-col justify-end p-4">
            <p class="text-white text-sm font-bold leading-tight translate-y-2 group-hover:translate-y-0 transition-transform duration-300"><?= $cap ?></p>
            <span class="text-[#f36428] text-xs font-bold tracking-wide mt-1 opacity-0 group-hover:opacity-100 transition-opacity delay-75 flex items-center gap-1">
              <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M15 3h6v6M9 21H3v-6M21 3l-7 7M3 21l7-7"/></svg>
              Phóng to
            </span>
          </div>
          <div class="absolute top-3 right-3 w-7 h-7 rounded-full bg-black/40 backdrop-blur-md border border-white/20 text-white text-xs font-black flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity">
            <?= $i + 1 ?>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- LIGHTBOX -->
  <div id="tava-lb" class="hidden fixed inset-0 z-[9999] bg-black/95 flex flex-col items-center justify-center p-4" onclick="if(event.target===this)this.classList.add('hidden')">
    <button onclick="document.getElementById('tava-lb').classList.add('hidden')" class="absolute top-5 right-5 w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 text-white flex items-center justify-center text-xl transition-colors z-10 border border-white/20">
      <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M18 6 6 18M6 6l12 12"/></svg>
    </button>
    <img id="tava-lb-img" src="" alt="" class="max-w-full max-h-[80vh] object-contain rounded-xl shadow-2xl" />
    <p id="tava-lb-cap" class="text-white/70 text-sm mt-4 text-center font-medium"></p>
  </div>

  <!-- P2: ARTICLE — 2-column layout with sticky sidebar TOC -->
  <section class="bg-[#f8f9fa] py-20 px-4">
    <div class="max-w-7xl mx-auto">
      <div class="flex flex-col xl:flex-row gap-10 xl:gap-16 items-start">

        <!-- SIDEBAR: sticky TOC -->
        <aside class="xl:w-72 flex-shrink-0 xl:sticky xl:top-24 order-2 xl:order-1">
          <div class="bg-white rounded-2xl border border-slate-100 shadow-sm p-6">
            <p class="text-xs font-black text-slate-400 uppercase tracking-widest mb-5">Nội dung bài viết</p>
            <nav class="space-y-1" id="tava-toc">
              <a href="#p2s1" class="tava-toc-link flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:bg-[#f36428]/5 hover:text-[#f36428] transition-all group">
                <span class="w-6 h-6 rounded-lg bg-slate-100 group-hover:bg-[#f36428] text-slate-500 group-hover:text-white text-xs font-black flex items-center justify-center transition-all flex-shrink-0">1</span>
                Tổng quan dự án
              </a>
              <a href="#p2s2" class="tava-toc-link flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:bg-[#f36428]/5 hover:text-[#f36428] transition-all group">
                <span class="w-6 h-6 rounded-lg bg-slate-100 group-hover:bg-[#f36428] text-slate-500 group-hover:text-white text-xs font-black flex items-center justify-center transition-all flex-shrink-0">2</span>
                3 Giải pháp toàn diện
              </a>
              <a href="#p2s3" class="tava-toc-link flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:bg-[#f36428]/5 hover:text-[#f36428] transition-all group">
                <span class="w-6 h-6 rounded-lg bg-slate-100 group-hover:bg-[#f36428] text-slate-500 group-hover:text-white text-xs font-black flex items-center justify-center transition-all flex-shrink-0">3</span>
                Vì sao chọn TAVA LED
              </a>
              <a href="#p2s4" class="tava-toc-link flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:bg-[#f36428]/5 hover:text-[#f36428] transition-all group">
                <span class="w-6 h-6 rounded-lg bg-slate-100 group-hover:bg-[#f36428] text-slate-500 group-hover:text-white text-xs font-black flex items-center justify-center transition-all flex-shrink-0">4</span>
                Quy trình bàn giao
              </a>
              <a href="#p2s5" class="tava-toc-link flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:bg-[#f36428]/5 hover:text-[#f36428] transition-all group">
                <span class="w-6 h-6 rounded-lg bg-slate-100 group-hover:bg-[#f36428] text-slate-500 group-hover:text-white text-xs font-black flex items-center justify-center transition-all flex-shrink-0">5</span>
                Phân tích công nghệ
              </a>
              <a href="#p2s6" class="tava-toc-link flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:bg-[#f36428]/5 hover:text-[#f36428] transition-all group">
                <span class="w-6 h-6 rounded-lg bg-slate-100 group-hover:bg-[#f36428] text-slate-500 group-hover:text-white text-xs font-black flex items-center justify-center transition-all flex-shrink-0">6</span>
                Lợi ích dài hạn
              </a>
              <a href="#p2s7" class="tava-toc-link flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:bg-[#f36428]/5 hover:text-[#f36428] transition-all group">
                <span class="w-6 h-6 rounded-lg bg-slate-100 group-hover:bg-[#f36428] text-slate-500 group-hover:text-white text-xs font-black flex items-center justify-center transition-all flex-shrink-0">7</span>
                Bảo trì &amp; Hậu mãi
              </a>
              <a href="#p2faq" class="tava-toc-link flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold text-slate-600 hover:bg-[#f36428]/5 hover:text-[#f36428] transition-all group">
                <span class="w-6 h-6 rounded-lg bg-slate-100 group-hover:bg-[#f36428] text-slate-500 group-hover:text-white flex items-center justify-center transition-all flex-shrink-0">
                  <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><circle cx="12" cy="12" r="10"/><path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3"/><path d="M12 17h.01"/></svg>
                </span>
                Câu hỏi thường gặp
              </a>
            </nav>
            <!-- CTA mini -->
            <div class="mt-6 pt-6 border-t border-slate-100">
              <a href="https://tavaled.vn/lien-he/" class="flex items-center justify-center gap-2 w-full px-4 py-3 bg-[#f36428] hover:bg-[#e5581d] text-white font-black text-sm rounded-xl transition-all duration-200 hover:scale-105 shadow-lg shadow-[#f36428]/20">
                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.57 3.38 2 2 0 0 1 3.55 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.66a16 16 0 0 0 6 6l.86-.86a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                Tư vấn miễn phí
              </a>
            </div>
          </div>
        </aside>

        <!-- MAIN CONTENT -->
        <div class="flex-1 min-w-0 order-1 xl:order-2 space-y-16">

          <!-- Intro callout -->
          <div class="tava-reveal bg-white rounded-2xl border-l-4 border-[#f36428] shadow-sm p-8">
            <p class="text-slate-700 text-lg leading-relaxed">Với tư cách là nhà cung cấp giải pháp toàn diện hàng đầu, chúng tôi hiểu rằng một hệ thống thiết bị sân khấu chất lượng không chỉ phục vụ sự kiện mà còn là công cụ hỗ trợ giáo dục trực quan tuyệt vời. Dự án tại Mầm non Sao Việt bao gồm hệ thống <strong class="text-[#17264a]">màn hình LED rộng gần 60m²</strong>, đi kèm giải pháp <strong class="text-[#17264a]">âm thanh</strong> và <strong class="text-[#17264a]">ánh sáng chuyên nghiệp</strong>, được thiết kế chuyên biệt để đáp ứng tối đa nhu cầu của nhà trường.</p>
          </div>

          <!-- SECTION 1 -->
          <div id="p2s1" class="tava-reveal scroll-mt-24">
            <div class="flex items-center gap-4 mb-8">
              <div class="flex-shrink-0 w-12 h-12 rounded-2xl bg-[#f36428] text-white font-black text-xl flex items-center justify-center shadow-lg shadow-[#f36428]/30">1</div>
              <div>
                <p class="text-xs font-black text-[#f36428] uppercase tracking-widest mb-0.5">Bối cảnh</p>
                <h3 class="text-2xl md:text-3xl font-black text-[#17264a]">Tổng quan dự án thi công tại Mầm non Sao Việt</h3>
              </div>
            </div>
            <p class="text-slate-600 text-base leading-relaxed mb-8">Việc triển khai một hệ thống thiết bị quy mô lớn trong môi trường giáo dục đòi hỏi sự tính toán kỹ lưỡng về độ an toàn, tính thẩm mỹ và hiệu năng sử dụng lâu dài. Dự án Mầm non Sao Việt là minh chứng rõ nét cho năng lực khảo sát và lên phương án thi công thực tế của TAVA LED.</p>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-5">
              <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm">
                <div class="flex items-center gap-3 mb-4">
                  <div class="w-9 h-9 rounded-xl bg-[#17264a]/5 flex items-center justify-center text-[#17264a]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 10c0 6-8 12-8 12s-8-6-8-12a8 8 0 0 1 16 0Z"/><circle cx="12" cy="10" r="3"/></svg>
                  </div>
                  <p class="font-black text-[#17264a] text-sm tracking-wide uppercase">Vị trí &amp; Quy mô</p>
                </div>
                <p class="text-slate-500 text-xs font-bold uppercase tracking-wide mb-3">Vincom Plaza Imperia Hải Phòng</p>
                <ul class="space-y-3 text-sm text-slate-600 leading-relaxed">
                  <li class="flex items-start gap-2.5"><span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-[#f36428] flex-shrink-0"></span><span><strong class="text-[#17264a]">Diện tích thi công:</strong> Sân khấu chính yêu cầu hệ thống hiển thị góc nhìn rộng để mọi vị trí hội trường đều quan sát rõ nét.</span></li>
                  <li class="flex items-start gap-2.5"><span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-[#f36428] flex-shrink-0"></span><span><strong class="text-[#17264a]">Điều kiện ánh sáng:</strong> Yêu cầu LED có Brightness và Contrast Ratio vượt trội trước ảnh hưởng của hệ thống đèn nội thất.</span></li>
                  <li class="flex items-start gap-2.5"><span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-[#f36428] flex-shrink-0"></span><span><strong class="text-[#17264a]">Tiêu chuẩn lắp đặt:</strong> Tải trọng kỹ lưỡng, an toàn tuyệt đối cho các bé và giáo viên.</span></li>
                </ul>
              </div>
              <div class="bg-white rounded-2xl p-6 border border-slate-100 shadow-sm">
                <div class="flex items-center gap-3 mb-4">
                  <div class="w-9 h-9 rounded-xl bg-[#17264a]/5 flex items-center justify-center text-[#17264a]">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 20h9"/><path d="M16.5 3.5a2.12 2.12 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg>
                  </div>
                  <p class="font-black text-[#17264a] text-sm tracking-wide uppercase">Nhu cầu nâng cấp</p>
                </div>
                <ul class="space-y-3 text-sm text-slate-600 leading-relaxed">
                  <li class="flex items-start gap-2.5"><span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-[#f36428] flex-shrink-0"></span><span>Thay phông bạt truyền thống bằng hệ thống hiển thị kỹ thuật số linh hoạt.</span></li>
                  <li class="flex items-start gap-2.5"><span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-[#f36428] flex-shrink-0"></span><span>Âm thanh trung thực, không gây chói tai, bảo vệ thính giác nhạy cảm của trẻ.</span></li>
                  <li class="flex items-start gap-2.5"><span class="mt-1.5 w-1.5 h-1.5 rounded-full bg-[#f36428] flex-shrink-0"></span><span>Ánh sáng lập trình kịch bản tự động, phục vụ khai giảng, văn nghệ, ngoại khóa.</span></li>
                </ul>
              </div>
            </div>
          </div>

          <!-- SECTION 2: Tabbed solutions -->
          <div id="p2s2" class="tava-reveal scroll-mt-24">
            <div class="flex items-center gap-4 mb-8">
              <div class="flex-shrink-0 w-12 h-12 rounded-2xl bg-[#f36428] text-white font-black text-xl flex items-center justify-center shadow-lg shadow-[#f36428]/30">2</div>
              <div>
                <p class="text-xs font-black text-[#f36428] uppercase tracking-widest mb-0.5">Giải pháp</p>
                <h3 class="text-2xl md:text-3xl font-black text-[#17264a]">3 Hạng mục giải pháp toàn diện từ TAVA LED</h3>
              </div>
            </div>
            <!-- Tab buttons -->
            <div class="flex flex-col sm:flex-row gap-2 mb-6 p-1.5 bg-white rounded-2xl border border-slate-100 shadow-sm" role="tablist">
              <button onclick="tavaTab(0)" id="tava-tab-0" class="tava-tab flex-1 flex items-center gap-3 px-5 py-4 rounded-xl font-bold text-sm transition-all duration-200 bg-[#17264a] text-white shadow-lg" role="tab">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m10 7 5 3-5 3Z"/><rect width="20" height="14" x="2" y="3" rx="2"/><path d="M12 17v4"/><path d="M8 21h8"/></svg>
                <span>Màn hình LED</span>
              </button>
              <button onclick="tavaTab(1)" id="tava-tab-1" class="tava-tab flex-1 flex items-center gap-3 px-5 py-4 rounded-xl font-bold text-sm text-slate-500 hover:bg-slate-50 transition-all duration-200" role="tab">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"/><path d="M15.54 8.46a5 5 0 0 1 0 7.07"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14"/></svg>
                <span>Âm thanh</span>
              </button>
              <button onclick="tavaTab(2)" id="tava-tab-2" class="tava-tab flex-1 flex items-center gap-3 px-5 py-4 rounded-xl font-bold text-sm text-slate-500 hover:bg-slate-50 transition-all duration-200" role="tab">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.9 1.2 1.5 1.5 2.5"/><path d="M9 18h6"/><path d="M10 22h4"/></svg>
                <span>Ánh sáng</span>
              </button>
            </div>
            <!-- Tab panels -->
            <div id="tava-panel-0" class="tava-panel bg-[#17264a] rounded-2xl overflow-hidden">
              <div class="p-8 md:p-10">
                <div class="flex items-start gap-5 mb-8">
                  <div class="w-14 h-14 rounded-2xl bg-[#f36428]/15 border border-[#f36428]/30 flex items-center justify-center text-[#f36428] flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="m10 7 5 3-5 3Z"/><rect width="20" height="14" x="2" y="3" rx="2"/><path d="M12 17v4"/><path d="M8 21h8"/></svg>
                  </div>
                  <div>
                    <h4 class="text-2xl font-black text-white mb-1">Gần 60m² Màn hình LED</h4>
                    <p class="text-[#f36428] text-sm font-bold">Hiển thị sắc nét — Đỉnh cao công nghệ</p>
                  </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
                  <div class="bg-white/5 border border-white/10 rounded-xl p-5 hover:bg-white/10 transition-colors">
                    <p class="text-[#f36428] font-black text-3xl mb-1">3840<span class="text-lg">Hz</span></p>
                    <p class="text-white font-bold text-sm mb-2">Tần số quét</p>
                    <p class="text-slate-400 text-xs leading-relaxed">Hình ảnh không sọc nhiễu khi quay phim chụp ảnh</p>
                  </div>
                  <div class="bg-white/5 border border-white/10 rounded-xl p-5 hover:bg-white/10 transition-colors">
                    <p class="text-[#f36428] font-black text-3xl mb-1">Wide</p>
                    <p class="text-white font-bold text-sm mb-2">Dải màu rộng</p>
                    <p class="text-slate-400 text-xs leading-relaxed">IC điều khiển cao cấp tái tạo màu sắc chân thực</p>
                  </div>
                  <div class="bg-white/5 border border-white/10 rounded-xl p-5 hover:bg-white/10 transition-colors">
                    <p class="text-[#f36428] font-black text-3xl mb-1">0dB</p>
                    <p class="text-white font-bold text-sm mb-2">Tản nhiệt thụ động</p>
                    <p class="text-slate-400 text-xs leading-relaxed">Fanless — Yên tĩnh tuyệt đối trong lớp học</p>
                  </div>
                </div>
                <div class="bg-[#f36428]/10 border border-[#f36428]/20 rounded-xl p-5">
                  <p class="text-[#f36428] text-xs font-black uppercase tracking-wide mb-2">Công nghệ bảo vệ mắt</p>
                  <p class="text-slate-300 text-sm leading-relaxed">Tinh chỉnh ánh sáng xanh, chống chói lóa — cực kỳ thân thiện với đôi mắt non nớt của trẻ nhỏ. Đây là ưu tiên số 1 trong thiết kế hệ thống tại Mầm non Sao Việt.</p>
                </div>
              </div>
            </div>
            <div id="tava-panel-1" class="tava-panel hidden bg-[#17264a] rounded-2xl overflow-hidden">
              <div class="p-8 md:p-10">
                <div class="flex items-start gap-5 mb-8">
                  <div class="w-14 h-14 rounded-2xl bg-[#f36428]/15 border border-[#f36428]/30 flex items-center justify-center text-[#f36428] flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"/><path d="M15.54 8.46a5 5 0 0 1 0 7.07"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14"/></svg>
                  </div>
                  <div>
                    <h4 class="text-2xl font-black text-white mb-1">Âm thanh Chuyên nghiệp</h4>
                    <p class="text-[#f36428] text-sm font-bold">Rõ ràng — Trung thực — Bảo vệ thính giác</p>
                  </div>
                </div>
                <div class="space-y-4">
                  <div class="flex items-start gap-4 bg-white/5 border border-white/10 rounded-xl p-5 hover:bg-white/10 transition-colors">
                    <div class="w-10 h-10 rounded-xl bg-[#f36428]/20 text-[#f36428] flex items-center justify-center flex-shrink-0 font-black text-sm">01</div>
                    <div><p class="text-white font-bold mb-1">Loa Array &amp; Loa Full</p><p class="text-slate-400 text-sm leading-relaxed">Góc phủ âm chuẩn xác, triệt tiêu hiện tượng dội âm, âm thanh lan tỏa đều khắp hội trường.</p></div>
                  </div>
                  <div class="flex items-start gap-4 bg-white/5 border border-white/10 rounded-xl p-5 hover:bg-white/10 transition-colors">
                    <div class="w-10 h-10 rounded-xl bg-[#f36428]/20 text-[#f36428] flex items-center justify-center flex-shrink-0 font-black text-sm">02</div>
                    <div><p class="text-white font-bold mb-1">Digital Mixer — Xóa hú rít triệt để</p><p class="text-slate-400 text-sm leading-relaxed">Xử lý tín hiệu tinh vi, giọng nói giáo viên và tiếng hát của các bé luôn trong trẻo, tự nhiên.</p></div>
                  </div>
                  <div class="flex items-start gap-4 bg-white/5 border border-white/10 rounded-xl p-5 hover:bg-white/10 transition-colors">
                    <div class="w-10 h-10 rounded-xl bg-[#f36428]/20 text-[#f36428] flex items-center justify-center flex-shrink-0 font-black text-sm">03</div>
                    <div><p class="text-white font-bold mb-1">Micro UHF chống nhiễu</p><p class="text-slate-400 text-sm leading-relaxed">Dải tần UHF ổn định, không rớt sóng dù hội trường có nhiều thiết bị phát sóng đồng thời.</p></div>
                  </div>
                </div>
              </div>
            </div>
            <div id="tava-panel-2" class="tava-panel hidden bg-[#17264a] rounded-2xl overflow-hidden">
              <div class="p-8 md:p-10">
                <div class="flex items-start gap-5 mb-8">
                  <div class="w-14 h-14 rounded-2xl bg-[#f36428]/15 border border-[#f36428]/30 flex items-center justify-center text-[#f36428] flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M15 14c.2-1 .7-1.7 1.5-2.5 1-.9 1.5-2.2 1.5-3.5A6 6 0 0 0 6 8c0 1 .2 2.2 1.5 3.5.7.9 1.2 1.5 1.5 2.5"/><path d="M9 18h6"/><path d="M10 22h4"/></svg>
                  </div>
                  <div>
                    <h4 class="text-2xl font-black text-white mb-1">Ánh sáng Nghệ thuật</h4>
                    <p class="text-[#f36428] text-sm font-bold">Đồng bộ DMX — Sinh động — Đa kịch bản</p>
                  </div>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                  <div class="bg-gradient-to-br from-amber-900/30 to-transparent border border-amber-500/20 rounded-xl p-5">
                    <div class="w-8 h-8 rounded-lg bg-amber-500/20 text-amber-400 flex items-center justify-center mb-3 text-sm font-black">Par</div>
                    <p class="text-white font-bold mb-1 text-sm">Đèn Par LED</p>
                    <p class="text-slate-400 text-xs leading-relaxed">Nhuộm màu phông nền đa sắc thái, phù hợp từng tiết mục văn nghệ hay bài giảng.</p>
                  </div>
                  <div class="bg-gradient-to-br from-blue-900/30 to-transparent border border-blue-500/20 rounded-xl p-5">
                    <div class="w-8 h-8 rounded-lg bg-blue-500/20 text-blue-400 flex items-center justify-center mb-3 text-sm font-black">MH</div>
                    <p class="text-white font-bold mb-1 text-sm">Moving Head</p>
                    <p class="text-slate-400 text-xs leading-relaxed">Hiệu ứng tia luồng (beam) mạnh mẽ cho sự kiện hoành tráng, chuyên nghiệp.</p>
                  </div>
                  <div class="bg-gradient-to-br from-orange-900/30 to-transparent border border-orange-500/20 rounded-xl p-5">
                    <div class="w-8 h-8 rounded-lg bg-orange-500/20 text-orange-400 flex items-center justify-center mb-3 text-sm font-black">Fr</div>
                    <p class="text-white font-bold mb-1 text-sm">Blinder &amp; Fresnel</p>
                    <p class="text-slate-400 text-xs leading-relaxed">Face light nhiệt độ màu chuẩn, khung hình camera luôn sáng đẹp tự nhiên.</p>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- SECTION 3: Why TAVA -->
          <div id="p2s3" class="tava-reveal scroll-mt-24">
            <div class="flex items-center gap-4 mb-8">
              <div class="flex-shrink-0 w-12 h-12 rounded-2xl bg-[#f36428] text-white font-black text-xl flex items-center justify-center shadow-lg shadow-[#f36428]/30">3</div>
              <div>
                <p class="text-xs font-black text-[#f36428] uppercase tracking-widest mb-0.5">Uy tín</p>
                <h3 class="text-2xl md:text-3xl font-black text-[#17264a]">Lý do TAVA LED được tin tưởng lựa chọn</h3>
              </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <?php
              $reasons = [
                [
                  '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2 2 7l10 5 10-5-10-5z"/><path d="m2 17 10 5 10-5"/><path d="m2 12 10 5 10-5"/></svg>',
                  'Kinh nghiệm dày dặn',
                  'Đối tác thi công của hàng trăm dự án quy mô lớn nhỏ trên toàn quốc, am hiểu sâu sắc mọi tiêu chuẩn khắt khe nhất.'
                ],
                [
                  '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2-1 4-2 8-2 2 1 6 2 8 2a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>',
                  'Thiết bị chính hãng, đầy đủ CO-CQ',
                  '100% vật tư từ module LED, bộ xử lý hình ảnh đến cáp tín hiệu đều có giấy tờ chứng nhận nguồn gốc và chất lượng rõ ràng.'
                ],
                [
                  '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 11l3 3L22 4"/><path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/></svg>',
                  'Quy trình thi công bài bản',
                  'Tuân thủ nghiêm ngặt các tiêu chuẩn an toàn điện, PCCC và kết cấu cơ khí, đặc biệt nhạy bén với môi trường có nhiều trẻ nhỏ.'
                ],
                [
                  '<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 12a9 9 0 1 0 9-9 9.75 9.75 0 0 0-6.74 2.74L3 8"/><path d="M3 3v5h5"/><path d="M12 7v5l4 2"/></svg>',
                  'Bảo hành &amp; bảo trì tận tâm',
                  'Cam kết đồng hành cùng nhà trường trong suốt vòng đời sản phẩm, hỗ trợ kỹ thuật 24/7 để đảm bảo hệ thống luôn hoạt động ở trạng thái tốt nhất.'
                ],
              ];
              foreach ($reasons as $i => [$icon, $title, $desc]):
              ?>
              <div class="group bg-white hover:bg-[#17264a] rounded-2xl p-6 border border-slate-100 shadow-sm hover:shadow-xl hover:shadow-[#17264a]/10 transition-all duration-300 cursor-default">
                <div class="flex items-center gap-4 mb-4">
                  <div class="w-11 h-11 rounded-xl bg-[#f36428]/10 group-hover:bg-[#f36428]/20 text-[#f36428] flex items-center justify-center transition-colors flex-shrink-0">
                    <?= $icon ?>
                  </div>
                  <p class="font-black text-[#17264a] group-hover:text-white transition-colors"><?= $title ?></p>
                </div>
                <p class="text-slate-500 group-hover:text-slate-300 text-sm leading-relaxed transition-colors"><?= $desc ?></p>
              </div>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- SECTION 4: Handover process -->
          <div id="p2s4" class="tava-reveal scroll-mt-24">
            <div class="flex items-center gap-4 mb-8">
              <div class="flex-shrink-0 w-12 h-12 rounded-2xl bg-[#f36428] text-white font-black text-xl flex items-center justify-center shadow-lg shadow-[#f36428]/30">4</div>
              <div>
                <p class="text-xs font-black text-[#f36428] uppercase tracking-widest mb-0.5">Nghiệm thu</p>
                <h3 class="text-2xl md:text-3xl font-black text-[#17264a]">Quy trình bàn giao công trình</h3>
              </div>
            </div>
            <p class="text-slate-600 text-base leading-relaxed mb-8">Quá trình nghiệm thu và bàn giao tại Mầm non Sao Việt diễn ra minh bạch, chi tiết với sự góp mặt của đại diện TAVA LED và ban lãnh đạo nhà trường.</p>
            <!-- Timeline -->
            <div class="relative">
              <div class="absolute left-6 top-0 bottom-0 w-px bg-gradient-to-b from-[#f36428] via-[#f36428]/50 to-transparent hidden md:block"></div>
              <div class="space-y-6">
                <?php foreach ([
                  ['Kiểm tra tải trọng an toàn', 'Rà soát toàn bộ khung chữ V, bản mã và các điểm hàn chịu lực của màn hình LED.'],
                  ['Đo đạc thông số kỹ thuật', 'Kiểm tra cường độ ánh sáng, mức áp suất âm thanh (SPL) tối đa, đảm bảo an toàn thính giác và thị giác cho học sinh.'],
                  ['Đào tạo vận hành (Training)', 'Chuyên viên TAVA LED hướng dẫn chi tiết đội ngũ cán bộ cách bật/tắt an toàn, sử dụng phần mềm điều khiển LED và thao tác với bàn mixer âm thanh.'],
                ] as $idx => [$step, $desc]): ?>
                <div class="flex gap-6 bg-white rounded-2xl border border-slate-100 p-6 shadow-sm hover:shadow-md transition-shadow">
                  <div class="flex-shrink-0 w-12 h-12 rounded-full bg-[#f36428] text-white font-black text-lg flex items-center justify-center shadow-lg shadow-[#f36428]/20 z-10"><?= $idx + 1 ?></div>
                  <div class="pt-1">
                    <p class="font-black text-[#17264a] mb-1"><?= $step ?></p>
                    <p class="text-slate-500 text-sm leading-relaxed"><?= $desc ?></p>
                  </div>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
            <div class="mt-8 bg-emerald-50 border border-emerald-100 rounded-2xl p-6 flex items-start gap-4">
              <svg class="text-emerald-500 mt-0.5 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2-1 4-2 8-2 2 1 6 2 8 2a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>
              <p class="text-emerald-800 text-sm leading-relaxed italic">Sự hài lòng tuyệt đối của ban giám hiệu nhà trường chính là phần thưởng lớn nhất cho những nỗ lực không biết mệt mỏi của đội ngũ thi công TAVA LED.</p>
            </div>
          </div>

          <!-- SECTION 5: Technology deep dive -->
          <div id="p2s5" class="tava-reveal scroll-mt-24">
            <div class="flex items-center gap-4 mb-8">
              <div class="flex-shrink-0 w-12 h-12 rounded-2xl bg-[#f36428] text-white font-black text-xl flex items-center justify-center shadow-lg shadow-[#f36428]/30">5</div>
              <div>
                <p class="text-xs font-black text-[#f36428] uppercase tracking-widest mb-0.5">Công nghệ</p>
                <h3 class="text-2xl md:text-3xl font-black text-[#17264a]">Phân tích chuyên sâu về công nghệ hiển thị</h3>
              </div>
            </div>
            <p class="text-slate-600 text-base leading-relaxed mb-8">Để đạt được chất lượng hình ảnh hoàn hảo, đội ngũ chuyên gia TAVA LED đã tiến hành đo đạc khoảng cách nhìn thực tế từ hàng ghế đầu tiên đến sân khấu, từ đó quyết định sử dụng dòng module LED Indoor với Pixel Pitch tối ưu nhất.</p>
            <div class="space-y-4">
              <?php foreach ([
                ['Cabinet hợp kim nhôm đúc', 'Die-casting Aluminum', 'Gia công CNC với độ chính xác đến từng milimet, các tấm module ghép nối liền mạch (seamless splicing) — không lộ viền đen hay khe hở vật lý khi trình chiếu.', 'CNC', '#e0f2fe', '#0ea5e9'],
                ['Tản nhiệt thụ động thông minh', 'Fanless Design 0dB', 'Thiết kế không quạt, tản nhiệt trực tiếp qua khung nhôm. Đảm bảo hoạt động tĩnh lặng tuyệt đối — phù hợp tuyệt đối với môi trường giáo dục.', '0dB', '#fef3c7', '#f59e0b'],
                ['Bộ xử lý hình ảnh cao cấp', 'Video Processor HDMI/SDI/DVI', 'Nhận và xử lý mượt mà đa dạng nguồn tín hiệu đầu vào từ máy tính, camera hay các thiết bị ngoại vi khác của nhà trường.', 'VP', '#f0fdf4', '#22c55e'],
              ] as [$title, $sub, $desc, $badge, $bg, $color]): ?>
              <div class="flex gap-5 bg-white rounded-2xl border border-slate-100 p-6 shadow-sm hover:shadow-md transition-shadow group">
                <div class="flex-shrink-0 w-14 h-14 rounded-2xl flex items-center justify-center font-black text-sm transition-transform group-hover:scale-110" style="background:<?= $bg ?>;color:<?= $color ?>;"><?= $badge ?></div>
                <div class="flex-1 min-w-0">
                  <div class="flex items-start justify-between gap-2 mb-1">
                    <p class="font-black text-[#17264a]"><?= $title ?></p>
                    <span class="flex-shrink-0 text-xs font-bold px-2.5 py-1 rounded-full" style="background:<?= $bg ?>;color:<?= $color ?>;"><?= $sub ?></span>
                  </div>
                  <p class="text-slate-500 text-sm leading-relaxed"><?= $desc ?></p>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- SECTION 6: Benefits horizontal scroll -->
          <div id="p2s6" class="tava-reveal scroll-mt-24">
            <div class="flex items-center gap-4 mb-8">
              <div class="flex-shrink-0 w-12 h-12 rounded-2xl bg-[#f36428] text-white font-black text-xl flex items-center justify-center shadow-lg shadow-[#f36428]/30">6</div>
              <div>
                <p class="text-xs font-black text-[#f36428] uppercase tracking-widest mb-0.5">Giá trị</p>
                <h3 class="text-2xl md:text-3xl font-black text-[#17264a]">Lợi ích dài hạn của giải pháp toàn diện</h3>
              </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
              <?php foreach ([
                ['📚', 'Nâng tầm giảng dạy', 'Hình ảnh trực quan, âm thanh sống động giúp các bài giảng, câu chuyện và video khám phá trở nên hấp dẫn, kích thích sự sáng tạo và tập trung của học sinh.', 'bg-blue-50 border-blue-100'],
                ['💰', 'Tối ưu chi phí sự kiện', 'Thay vì thuê mướn thiết bị sân khấu cho mỗi dịp lễ tết, khai giảng, bế giảng — nhà trường đã sở hữu hệ thống chuyên nghiệp sẵn sàng phục vụ 24/7.', 'bg-emerald-50 border-emerald-100'],
                ['🏆', 'Khẳng định đẳng cấp', 'Sân khấu hoành tráng ngay trong khuôn viên Vincom Plaza Imperia là điểm nhấn tạo ấn tượng mạnh, củng cố niềm tin của phụ huynh khi gửi gắm con em.', 'bg-amber-50 border-amber-100'],
              ] as [$emoji, $title, $desc, $cls]): ?>
              <div class="<?= $cls ?> rounded-2xl border p-7 flex flex-col gap-4 hover:shadow-lg transition-shadow">
                <span class="text-4xl"><?= $emoji ?></span>
                <div>
                  <p class="font-black text-[#17264a] text-lg mb-2"><?= $title ?></p>
                  <p class="text-slate-600 text-sm leading-relaxed"><?= $desc ?></p>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>

          <!-- SECTION 7: After-sale service -->
          <div id="p2s7" class="tava-reveal scroll-mt-24">
            <div class="flex items-center gap-4 mb-8">
              <div class="flex-shrink-0 w-12 h-12 rounded-2xl bg-[#f36428] text-white font-black text-xl flex items-center justify-center shadow-lg shadow-[#f36428]/30">7</div>
              <div>
                <p class="text-xs font-black text-[#f36428] uppercase tracking-widest mb-0.5">Hậu mãi</p>
                <h3 class="text-2xl md:text-3xl font-black text-[#17264a]">Bảo trì &amp; Hậu mãi chuẩn kỹ thuật số</h3>
              </div>
            </div>
            <p class="text-slate-600 text-base leading-relaxed mb-8">Thấu hiểu rằng sự ổn định của hệ thống là yếu tố sống còn đối với mọi hoạt động sự kiện, TAVA LED thiết lập quy trình hậu mãi vô cùng khắt khe dành riêng cho các dự án giáo dục trọng điểm.</p>
            <div class="bg-[#17264a] rounded-2xl p-8 md:p-10">
              <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <?php foreach ([
                  ['Kho linh kiện dự phòng', 'Spare Parts', 'Module LED, IC, nguồn cùng lô sản xuất — thay thế ngay lập tức, không sai lệch màu sắc.'],
                  ['Bảo trì định kỳ', 'Periodic Maintenance', 'Kiểm tra phần mềm, vệ sinh tản nhiệt và đo đạc lại thông số an toàn điện theo lịch.'],
                  ['Hỗ trợ từ xa', 'Remote Support 24/7', 'Can thiệp xử lý sự cố phần mềm điều khiển màn hình và mixer âm thanh qua mạng Internet.'],
                ] as [$title, $sub, $desc]): ?>
                <div class="text-center group">
                  <div class="w-16 h-16 rounded-2xl bg-[#f36428]/15 border border-[#f36428]/30 text-[#f36428] flex items-center justify-center mx-auto mb-4 group-hover:bg-[#f36428] group-hover:text-white transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/></svg>
                  </div>
                  <p class="text-white font-black mb-1"><?= $title ?></p>
                  <p class="text-[#f36428] text-xs font-bold mb-3"><?= $sub ?></p>
                  <p class="text-slate-400 text-sm leading-relaxed"><?= $desc ?></p>
                </div>
                <?php endforeach; ?>
              </div>
            </div>
          </div>

          <!-- FAQ -->
          <div id="p2faq" class="tava-reveal scroll-mt-24">
            <h3 class="text-2xl md:text-3xl font-black text-[#17264a] mb-8">Câu hỏi thường gặp</h3>
            <div class="space-y-3" id="tava-faq">
              <?php foreach ([
                ['An toàn mắt', 'Hệ thống màn hình LED có an toàn cho mắt của trẻ không?', 'Hoàn toàn an toàn. TAVA LED sử dụng dòng module có tần số quét cao (trên 3840Hz) và công nghệ tinh chỉnh giảm ánh sáng xanh, loại bỏ hiện tượng nhấp nháy, giúp bảo vệ tối đa thị giác của các bé.'],
                ['Thời gian', 'Thời gian thi công dự án mất bao lâu?', 'Nhờ sự phối hợp nhịp nhàng và quy trình chuẩn hóa, đội ngũ kỹ thuật TAVA LED đã hoàn thiện toàn bộ khối lượng công việc (khung kết cấu, ốp LED, âm thanh, ánh sáng) trong thời gian ngắn kỷ lục, không làm ảnh hưởng đến lịch sinh hoạt của trường.'],
                ['Bảo hành', 'TAVA LED có bảo hành hệ thống không?', 'Chắc chắn rồi. Toàn bộ thiết bị từ màn hình, âm thanh đến ánh sáng đều được TAVA LED bảo hành chính hãng lên đến 24 tháng, kèm dịch vụ bảo trì định kỳ và hỗ trợ kỹ thuật 24/7.'],
                ['Điện năng', 'Màn hình LED 60m² tiêu thụ điện năng như thế nào?', 'Giải pháp TAVA LED sử dụng công nghệ LED tiết kiệm điện thế hệ mới (Energy-saving IC). Dù sở hữu diện tích lên tới 60m², hệ thống vẫn tối ưu hóa chi phí vận hành hàng tháng mà không làm suy giảm chất lượng hiển thị.'],
              ] as $fi => [$tag, $q, $a]): ?>
              <div class="bg-white border border-slate-100 rounded-2xl overflow-hidden shadow-sm tava-faq-item" data-fi="<?= $fi ?>">
                <button onclick="tavaFaq(<?= $fi ?>)" class="w-full flex items-start gap-4 p-6 text-left hover:bg-slate-50/80 transition-colors">
                  <span class="flex-shrink-0 px-2.5 py-1 rounded-lg bg-[#f36428]/10 text-[#f36428] text-xs font-black mt-0.5"><?= $tag ?></span>
                  <span class="flex-1 font-bold text-[#17264a] text-base leading-snug"><?= $q ?></span>
                  <svg class="w-5 h-5 text-slate-400 flex-shrink-0 mt-0.5 tava-faq-arrow-<?= $fi ?> transition-transform duration-300" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5"/></svg>
                </button>
                <div class="tava-faq-ans-<?= $fi ?> hidden px-6 pb-6">
                  <div class="pl-4 border-l-2 border-[#f36428]/30">
                    <p class="text-slate-600 text-sm leading-relaxed"><?= $a ?></p>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
          </div>

        </div><!-- /main content -->
      </div><!-- /flex -->
    </div><!-- /max-w -->
  </section>

  <!-- CTA FINAL -->
  <section class="bg-gradient-to-br from-[#17264a] via-[#0f1933] to-[#17264a] py-24 px-4 text-center border-t-[6px] border-[#f36428] relative overflow-hidden">
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[400px] bg-[#f36428]/15 blur-[120px] rounded-full pointer-events-none"></div>
    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_bottom_left,_rgba(16,185,129,0.08)_0%,_transparent_50%)] pointer-events-none"></div>
    <div class="max-w-3xl mx-auto relative z-10">
      <span class="inline-flex items-center gap-2 px-5 py-2 rounded-full bg-emerald-500/10 border border-emerald-500/30 text-emerald-400 font-black text-xs tracking-widest uppercase mb-8">
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M20 13c0 5-3.5 7.5-7.66 8.95a1 1 0 0 1-.67-.01C7.5 20.5 4 18 4 13V6a1 1 0 0 1 1-1c2-1 4-2 8-2 2 1 6 2 8 2a1 1 0 0 1 1 1z"/><path d="m9 12 2 2 4-4"/></svg>
        Dự án đã bàn giao thành công
      </span>
      <h2 class="text-4xl md:text-5xl lg:text-6xl font-black text-white mb-6 tracking-tight leading-tight">Bạn Muốn Có Không Gian Sân Khấu <span class="text-transparent bg-clip-text bg-gradient-to-r from-[#f36428] to-[#ff8c5a]">Tương Tự?</span></h2>
      <p class="text-slate-300 text-lg md:text-xl leading-relaxed mb-10">Đừng ngần ngại liên hệ với TAVA LED ngay hôm nay để được kỹ sư trưởng tư vấn và khảo sát miễn phí.</p>
      <div class="flex flex-col sm:flex-row gap-4 justify-center">
        <a href="https://tavaled.vn/lien-he/" class="inline-flex items-center justify-center gap-3 px-10 py-5 bg-[#f36428] hover:bg-[#e5581d] text-white font-black text-lg rounded-full shadow-2xl shadow-[#f36428]/30 hover:shadow-[#f36428]/50 transition-all duration-300 hover:scale-105">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.57 3.38 2 2 0 0 1 3.55 1h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.66a16 16 0 0 0 6 6l.86-.86a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
          Liên hệ tư vấn miễn phí
        </a>
        <a href="#p2-gallery" class="inline-flex items-center justify-center gap-3 px-10 py-5 bg-white/10 hover:bg-white/20 text-white font-black text-lg rounded-full border border-white/20 backdrop-blur-md transition-all duration-300 hover:scale-105">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><rect width="18" height="18" x="3" y="3" rx="2" ry="2"/><circle cx="9" cy="9" r="2"/><path d="m21 15-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/></svg>
          Xem hình ảnh thực tế
        </a>
      </div>
    </div>
  </section>

  <!-- P2 SCRIPTS -->
  <style>
    .tava-reveal { opacity:0; transform:translateY(28px); transition:opacity .6s ease,transform .6s ease; }
    .tava-reveal.tava-visible { opacity:1; transform:none; }
    .tava-gallery-item { transition:transform .2s ease, box-shadow .2s ease; }
    .tava-gallery-item:hover { box-shadow:0 0 0 3px #f36428, 0 8px 32px rgba(243,100,40,.2); }
  </style>
  <script>
  // Scroll reveal
  (function(){
    var items=document.querySelectorAll('.tava-reveal');
    var obs=new IntersectionObserver(function(entries){entries.forEach(function(e){if(e.isIntersecting){e.target.classList.add('tava-visible');}});},{threshold:.12,rootMargin:'0px 0px -40px 0px'});
    items.forEach(function(el,i){el.style.transitionDelay=(i%4)*0.08+'s';obs.observe(el);});
  })();
  // Counter animation
  (function(){
    var obs=new IntersectionObserver(function(entries){
      entries.forEach(function(e){
        if(e.isIntersecting){
          e.target.querySelectorAll('[data-count]').forEach(function(el){
            var target=+el.getAttribute('data-count'),start=0,dur=1200,step=dur/60;
            var t=setInterval(function(){start+=target/60;if(start>=target){el.textContent=target;clearInterval(t);}else el.textContent=Math.floor(start);},step/1000*1000/60);
          });
          obs.unobserve(e.target);
        }
      });
    },{threshold:.5});
    var statsEl=document.querySelector('[data-count]');
    if(statsEl) obs.observe(statsEl.closest('.tava-reveal')||statsEl.parentElement.parentElement);
  })();
  // Tab switcher
  function tavaTab(idx){
    [0,1,2].forEach(function(i){
      var t=document.getElementById('tava-tab-'+i);
      var p=document.getElementById('tava-panel-'+i);
      if(i===idx){t.classList.add('bg-[#17264a]','text-white','shadow-lg');t.classList.remove('text-slate-500');p.classList.remove('hidden');}
      else{t.classList.remove('bg-[#17264a]','text-white','shadow-lg');t.classList.add('text-slate-500');p.classList.add('hidden');}
    });
  }
  // FAQ accordion
  function tavaFaq(idx){
    var ans=document.querySelector('.tava-faq-ans-'+idx);
    var arr=document.querySelector('.tava-faq-arrow-'+idx);
    var open=!ans.classList.contains('hidden');
    // close all
    [0,1,2,3].forEach(function(i){
      document.querySelector('.tava-faq-ans-'+i).classList.add('hidden');
      document.querySelector('.tava-faq-arrow-'+i).style.transform='rotate(0deg)';
    });
    if(!open){ans.classList.remove('hidden');arr.style.transform='rotate(180deg)';}
  }
  // TOC active highlight
  (function(){
    var sections=['p2s1','p2s2','p2s3','p2s4','p2s5','p2s6','p2s7','p2faq'];
    var links=document.querySelectorAll('.tava-toc-link');
    window.addEventListener('scroll',function(){
      var curr='';
      sections.forEach(function(id){var el=document.getElementById(id);if(el&&window.scrollY>=el.offsetTop-140)curr=id;});
      links.forEach(function(l){
        if(l.getAttribute('href')==='#'+curr){l.classList.add('bg-[#f36428]/10','text-[#f36428]');l.querySelector('span').classList.add('bg-[#f36428]','text-white');}
        else{l.classList.remove('bg-[#f36428]/10','text-[#f36428]');l.querySelector('span').classList.remove('bg-[#f36428]','text-white');}
      });
    },{passive:true});
  })();
  </script>

</div>

</body>
<?php get_footer(); ?>
</html>