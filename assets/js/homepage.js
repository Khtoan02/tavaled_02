/* ════════════════════════════════════════════════════════
   HERO V2 — Canvas Animations
   ════════════════════════════════════════════════════════ */

/* ── BACKGROUND CANVAS: LED particle field ── */
(function () {
    var c = document.getElementById('bgCanvas');
    if (!c) return;
    var hero = c.parentElement;

    function resize() {
        c.width  = hero.offsetWidth;
        c.height = hero.offsetHeight;
    }
    resize();
    window.addEventListener('resize', resize);

    var ctx = c.getContext('2d');
    var STEP = 32;
    var dots = [];
    var COLORS = [
        'rgba(255,95,0,',
        'rgba(255,140,60,',
        'rgba(200,60,0,',
        'rgba(255,180,80,',
    ];

    function buildDots() {
        dots = [];
        var cols = Math.floor(c.width / STEP);
        var rows = Math.floor(c.height / STEP);
        for (var i = 0; i < cols; i++) {
            for (var j = 0; j < rows; j++) {
                if (Math.random() > 0.72) {
                    dots.push({
                        x: i * STEP + 16,
                        y: j * STEP + 16,
                        r: Math.random() * 1.5 + 0.5,
                        speed: Math.random() * 0.004 + 0.001,
                        phase: Math.random() * Math.PI * 2,
                        color: COLORS[Math.floor(Math.random() * COLORS.length)],
                    });
                }
            }
        }
    }
    buildDots();
    window.addEventListener('resize', buildDots);

    var t = 0;
    function drawBg() {
        ctx.clearRect(0, 0, c.width, c.height);
        t += 1;
        dots.forEach(function(d) {
            var alpha = (Math.sin(d.phase + t * d.speed * 60) + 1) / 2 * 0.35 + 0.02;
            ctx.beginPath();
            ctx.arc(d.x, d.y, d.r, 0, Math.PI * 2);
            ctx.fillStyle = d.color + alpha + ')';
            ctx.fill();
        });
        requestAnimationFrame(drawBg);
    }
    drawBg();
})();

/* ── HERO IMAGE SLIDER ── */
(function () {
    var slides   = document.querySelectorAll('.hero-slide');
    var dots     = document.querySelectorAll('.hero-slider__dot');
    var slider   = document.getElementById('heroSlider');
    if (!slides.length) return;

    var current  = 0;
    var total    = slides.length;
    var interval = null;
    var DELAY    = 4500; // ms between slides

    function goTo(idx) {
        slides[current].classList.remove('hero-slide--active');
        if (dots[current]) dots[current].classList.remove('hero-slider__dot--active');
        current = ((idx % total) + total) % total;
        slides[current].classList.add('hero-slide--active');
        if (dots[current]) dots[current].classList.add('hero-slider__dot--active');
    }

    function next() { goTo(current + 1); }

    function startAuto() {
        if (interval) clearInterval(interval);
        interval = setInterval(next, DELAY);
    }

    function stopAuto() {
        clearInterval(interval);
        interval = null;
    }

    // Dot click
    dots.forEach(function (dot, i) {
        dot.addEventListener('click', function () {
            stopAuto();
            goTo(i);
            startAuto();
        });
    });

    // Pause on hover
    if (slider) {
        slider.addEventListener('mouseenter', stopAuto);
        slider.addEventListener('mouseleave', startAuto);
    }

    // Keyboard: left/right arrows
    document.addEventListener('keydown', function (e) {
        if (!document.getElementById('heroSlider')) return;
        if (e.key === 'ArrowLeft')  { stopAuto(); goTo(current - 1); startAuto(); }
        if (e.key === 'ArrowRight') { stopAuto(); goTo(current + 1); startAuto(); }
    });

    startAuto();
})();

document.addEventListener('DOMContentLoaded', () => {


    // Product Slider Dots — mobile only
    function initSliderDots(gridId, dotsId, itemsPerView) {
        var grid = document.getElementById(gridId);
        var dotsWrap = document.getElementById(dotsId);
        if (!grid || !dotsWrap) return;

        var items = grid.children;
        var total = items.length;
        if (total === 0) return;

        var groups = Math.ceil(total / itemsPerView);
        dotsWrap.innerHTML = '';
        for (var i = 0; i < groups; i++) {
            var dot = document.createElement('button');
            dot.className = 'prod-dot' + (i === 0 ? ' active' : '');
            dot.setAttribute('aria-label', 'Trang ' + (i + 1));
            (function(idx) {
                dot.addEventListener('click', function() {
                    var itemW = items[0] ? items[0].offsetWidth : 0;
                    var gap = 12;
                    grid.scrollTo({ left: idx * (itemW + gap) * itemsPerView, behavior: 'smooth' });
                });
            })(i);
            dotsWrap.appendChild(dot);
        }

        grid.addEventListener('scroll', function() {
            var itemW = items[0] ? items[0].offsetWidth + 12 : 1;
            var activeIdx = Math.round(grid.scrollLeft / (itemW * itemsPerView));
            var dots = dotsWrap.querySelectorAll('.prod-dot');
            dots.forEach(function(d, i) {
                d.classList.toggle('active', i === activeIdx);
            });
        }, { passive: true });
    }

    if (window.innerWidth < 640) {
        initSliderDots('grid-led',   'dots-led',   2);
        initSliderDots('grid-audio', 'dots-audio', 2);
        initSliderDots('grid-light', 'dots-light', 2);
    }

    // Toggle Gallery Expand
    const btnShowMore = document.getElementById('btnShowMoreGallery');
    const galleryWrap = document.getElementById('homeGalleryWrap');
    if(btnShowMore && galleryWrap) {
        setTimeout(() => {
            const gridHeight = document.getElementById('homeGalleryGrid').scrollHeight;
            const wrapHeight = galleryWrap.clientHeight;
            if (gridHeight <= wrapHeight + 50) {
                galleryWrap.classList.add('expanded');
            }
        }, 1000);

        btnShowMore.addEventListener('click', () => {
            galleryWrap.classList.add('expanded');
        });
    }

    // Scroll Reveal Animation
    const revealElements = document.querySelectorAll('.reveal-up');
    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => { 
            if (entry.isIntersecting) { 
                entry.target.classList.add('active'); 
                revealObserver.unobserve(entry.target); 
            } 
        });
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
            
            // Close all
            document.querySelectorAll('.faq-answer').forEach(a => a.classList.remove('open'));
            document.querySelectorAll('.faq-icon i').forEach(i => { i.classList.remove('ph-minus'); i.classList.add('ph-plus'); });
            document.querySelectorAll('.faq-icon').forEach(ic => { ic.classList.remove('border-brand-orange', 'bg-brand-orange/10'); ic.classList.add('border-white/20'); });
            document.querySelectorAll('.faq-btn .font-mono').forEach(n => n.classList.remove('text-brand-orange'));
            document.querySelectorAll('.faq-btn .font-medium').forEach(t => t.classList.remove('text-brand-orange'));

            // Open target if not already open
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
    if(faqBtns.length > 0) faqBtns[0].click();
});
