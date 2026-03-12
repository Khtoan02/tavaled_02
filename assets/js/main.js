// Main Javascript file
document.addEventListener('DOMContentLoaded', () => {
    console.log('Tavaled 02 Theme JS loaded successfully.');

    // 1. Hiệu ứng Header khi cuộn: chỉ thêm shadow/backdrop, không thay đổi kích thước
    const header = document.getElementById('mainHeader');
    if (header) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 10) {
                header.classList.add('header-sticky');
            } else {
                header.classList.remove('header-sticky');
            }
        }, { passive: true });
    }

    // 2. Xử lý Mobile Menu (Mở/Đóng)
    const mobileMenu = document.getElementById('mobileMenu');
    const mobileMenuPanel = document.getElementById('mobileMenuPanel');
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const closeMobileMenuBtn = document.getElementById('closeMobileMenuBtn');

    // BUG FIX: Khai báo là window.closeMobileMenu để có thể gọi từ inline onclick
    window.closeMobileMenu = function() {
        if (!mobileMenu || !mobileMenuPanel) return;
        mobileMenu.classList.add('opacity-0', 'pointer-events-none');
        mobileMenuPanel.classList.add('translate-x-full');
        document.body.style.overflow = 'auto';
    }

    function openMobileMenu() {
        if (!mobileMenu || !mobileMenuPanel) return;
        mobileMenu.classList.remove('opacity-0', 'pointer-events-none');
        mobileMenuPanel.classList.remove('translate-x-full');
        document.body.style.overflow = 'hidden';
    }

    if (mobileMenuBtn) {
        mobileMenuBtn.addEventListener('click', openMobileMenu);
    }
    if (closeMobileMenuBtn) {
        closeMobileMenuBtn.addEventListener('click', window.closeMobileMenu);
    }
    if (mobileMenu) {
        mobileMenu.addEventListener('click', (e) => {
            if (e.target === mobileMenu) window.closeMobileMenu();
        });
    }

    // 3. Xử lý Toggle Tìm Kiếm Toàn Cục
    window.toggleSearch = function() {
        const searchPopup = document.getElementById('searchPopup');
        if (searchPopup) {
            if (searchPopup.classList.contains('active')) {
                searchPopup.classList.remove('active');
                document.body.style.overflow = 'auto';
            } else {
                searchPopup.classList.add('active');
                document.body.style.overflow = 'hidden';
                setTimeout(() => {
                    const input = searchPopup.querySelector('input');
                    if (input) input.focus();
                }, 100);
            }
        }
    }

    // Đóng popup bằng nút ESC
    document.addEventListener('keydown', (e) => {
        const searchPopup = document.getElementById('searchPopup');
        if (e.key === 'Escape' && searchPopup && searchPopup.classList.contains('active')) {
            window.toggleSearch();
        }
    });

    // 4. Xử lý Accordion (Menu sổ xuống) trên Mobile Toàn Cục
    window.toggleAccordion = function(id) {
        const content = document.getElementById(id);
        const icon = document.getElementById(`icon-${id}`);
        if (content && icon) {
            if (content.classList.contains('max-h-0')) {
                content.classList.remove('max-h-0', 'opacity-0');
                content.classList.add('max-h-[500px]', 'opacity-100', 'mt-2');
                icon.style.transform = 'rotate(180deg)';
            } else {
                content.classList.remove('max-h-[500px]', 'opacity-100', 'mt-2');
                content.classList.add('max-h-0', 'opacity-0');
                icon.style.transform = 'rotate(0deg)';
            }
        }
    }

    // Helper: reset một mega panel về trạng thái mặc định (tiêu đề, mô tả, slider, active pill)
    function resetMegaPanel(panelId) {
        const panel = document.getElementById(panelId);
        if (!panel) return;
        panel.querySelectorAll('.mega-subcat-pill').forEach(p => {
            p.style.backgroundColor = '';
            p.style.color = '';
            p.style.borderColor = '';
        });
        const titleEl = document.getElementById(panelId + '-title');
        const descEl  = document.getElementById(panelId + '-desc');
        if (titleEl) titleEl.textContent = panel.getAttribute('data-default-title') || '';
        if (descEl)  descEl.textContent  = panel.getAttribute('data-default-desc')  || '';
        const slider = panel.querySelector('.slider-container');
        if (slider && typeof slider.filterSlider === 'function') slider.filterSlider(null);
    }

    // 5. Xử lý Logic Tabs trong Mega Menu
    const megaTabs = document.querySelectorAll('.mega-tab-btn');
    const megaContents = document.querySelectorAll('.mega-tab-content');
    const megaBackdrop = document.getElementById('mega-backdrop');

    const megaTriggers = document.querySelectorAll('.hover-trigger');
    if (megaBackdrop && megaTriggers.length > 0) {
        megaTriggers.forEach(trigger => {
            trigger.addEventListener('mouseenter', () => {
                megaBackdrop.classList.remove('opacity-0', 'pointer-events-none');
                megaBackdrop.classList.add('opacity-100');
            });
            trigger.addEventListener('mouseleave', () => {
                megaBackdrop.classList.remove('opacity-100');
                megaBackdrop.classList.add('opacity-0', 'pointer-events-none');
                // Removed resetting of all panels when mouse leaves the mega menu
                // so state is kept as requested.
            });
        });
    }

    if (megaTabs.length > 0) {
        megaTabs.forEach(tab => {
            tab.addEventListener('mouseenter', () => {
                // Ignore if it's already active
                if (tab.classList.contains('bg-white') && tab.classList.contains('text-[#1d2857]')) return;

                // Reset tất cả panels trước khi switch tab chính
                ['mega-led', 'mega-audio', 'mega-light'].forEach(resetMegaPanel);

                megaTabs.forEach(t => {
                    t.classList.remove('bg-white', 'text-[#1d2857]', 'shadow-lg', 'border-gray-100');
                    t.classList.add('text-gray-500', 'border-transparent');
                });
                tab.classList.remove('text-gray-500', 'border-transparent');
                tab.classList.add('bg-white', 'text-[#1d2857]', 'shadow-lg', 'border-gray-100');

                megaContents.forEach(content => {
                    content.classList.remove('block');
                    content.classList.add('hidden');
                });

                const targetId = tab.getAttribute('data-target');
                const targetContent = document.getElementById(targetId);
                if (targetContent) {
                    targetContent.classList.remove('hidden');
                    targetContent.classList.add('block');
                    const slider = targetContent.querySelector('.slider-container');
                    if (slider && typeof slider.resetSlider === 'function') slider.resetSlider();
                }
            });
        });
    }

    // 6. Xử lý Sub-tab Pills: hover chọn pill → GIỮ trạng thái đến khi hover pill khác hoặc đóng menu
    document.querySelectorAll('.mega-subcat-pill').forEach(pill => {
        pill.addEventListener('mouseenter', () => {
            const panelId = pill.getAttribute('data-panel');
            const panel   = document.getElementById(panelId);
            if (!panel) return;

            // Bỏ active tất cả pills trong panel, set active pill hiện tại
            panel.querySelectorAll('.mega-subcat-pill').forEach(p => {
                p.style.backgroundColor = '';
                p.style.color = '';
                p.style.borderColor = '';
            });
            pill.style.backgroundColor = '#f05a25';
            pill.style.color           = 'white';
            pill.style.borderColor     = '#f05a25';

            // Cập nhật tiêu đề & mô tả
            const titleEl = document.getElementById(panelId + '-title');
            const descEl  = document.getElementById(panelId + '-desc');
            if (titleEl) titleEl.textContent = pill.getAttribute('data-sub-title');
            if (descEl)  descEl.textContent  = pill.getAttribute('data-sub-desc');

            // Lọc slider theo sub-category
            const slider = panel.querySelector('.slider-container');
            if (slider && typeof slider.filterSlider === 'function') {
                slider.filterSlider(pill.getAttribute('data-sub-title'));
            }
        });
        // Không có mouseleave — trạng thái GIỮ cho đến khi hover pill khác hoặc đóng menu
    });

    // 7. Xử lý Logic Slider trong Mega Menu (hỗ trợ lọc động theo sub-category)
    const sliders = document.querySelectorAll('.slider-container');
    if (sliders.length > 0) {
        sliders.forEach(slider => {
            const track    = slider.querySelector('.slider-track');
            const prevBtn  = slider.querySelector('.slider-prev');
            const nextBtn  = slider.querySelector('.slider-next');
            const allItems = slider.querySelectorAll('.mega-slide-item');

            let currentIndex = 0;

            function getVisibleItems() {
                return [...allItems].filter(item => item.style.display !== 'none');
            }

            function updateSlider() {
                const visible = getVisibleItems();
                const maxIdx  = Math.max(0, visible.length - 2);
                if (currentIndex > maxIdx) currentIndex = maxIdx;

                visible.forEach((item, i) => {
                    item.classList.toggle('is-blurred', i !== currentIndex && i !== currentIndex + 1);
                });

                if (prevBtn) {
                    prevBtn.classList.toggle('opacity-0', currentIndex === 0);
                    prevBtn.classList.toggle('pointer-events-none', currentIndex === 0);
                }
                if (nextBtn) {
                    const atEnd = currentIndex >= maxIdx || visible.length <= 2;
                    nextBtn.classList.toggle('opacity-0', atEnd);
                    nextBtn.classList.toggle('pointer-events-none', atEnd);
                }
            }

            function slideTo(index) {
                currentIndex = index;
                if (track) {
                    const visible = getVisibleItems();
                    const itemW   = visible.length > 0 ? visible[0].offsetWidth : 0;
                    track.style.transform = currentIndex > 0
                        ? `translateX(-${currentIndex * (itemW + 24)}px)`
                        : 'translateX(0px)';
                }
                updateSlider();
            }

            if (allItems.length > 0) updateSlider();

            if (nextBtn) {
                nextBtn.addEventListener('click', (e) => {
                    e.preventDefault(); e.stopPropagation();
                    const maxIdx = Math.max(0, getVisibleItems().length - 2);
                    if (currentIndex < maxIdx) slideTo(currentIndex + 1);
                });
            }
            if (prevBtn) {
                prevBtn.addEventListener('click', (e) => {
                    e.preventDefault(); e.stopPropagation();
                    if (currentIndex > 0) slideTo(currentIndex - 1);
                });
            }

            // Reset: hiện tất cả sản phẩm, về vị trí đầu
            slider.resetSlider = function() {
                allItems.forEach(item => {
                    item.style.display = '';
                    item.classList.remove('is-blurred');
                });
                slideTo(0);
            };

            // Filter: chỉ hiện sản phẩm thuộc subcatName, null = hiện tất cả
            slider.filterSlider = function(subcatName) {
                allItems.forEach(item => {
                    if (!subcatName) {
                        item.style.display = '';
                    } else {
                        let cats = [];
                        try { cats = JSON.parse(item.getAttribute('data-subcats') || '[]'); } catch (e) {}
                        item.style.display = cats.includes(subcatName) ? '' : 'none';
                        item.classList.remove('is-blurred');
                    }
                });
                slideTo(0);
            };
        });
    }
});
