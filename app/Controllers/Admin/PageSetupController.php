<?php
namespace App\Controllers\Admin;

class PageSetupController {
    
    public function register() {
        add_action('admin_menu', [$this, 'addMenu']);
        add_action('admin_init', [$this, 'handleActions']);
    }

    public function addMenu() {
        add_submenu_page(
            'edit.php?post_type=page',
            'Cài đặt Trang mẫu',
            'Cài đặt Trang mẫu',
            'manage_options',
            'tava-page-setup',
            [$this, 'renderView']
        );
    }

    public function handleActions() {
        if (!isset($_GET['page']) || $_GET['page'] !== 'tava-page-setup') return;
        if (!current_user_can('manage_options')) return;

        if (isset($_POST['tava_setup_action']) && $_POST['tava_setup_action'] === 'generate') {
            check_admin_referer('tava_page_setup_action');
            $this->generatePages();
            wp_redirect(admin_url('edit.php?post_type=page&page=tava-page-setup&status=success'));
            exit;
        }
    }

    private function generatePages() {
        $pages = [
            [
                'title'    => 'Trang chủ',
                'slug'     => 'trang-chu',
                'template' => 'templates/template-homepage.php'
            ],
            [
                'title'    => 'Về chúng tôi',
                'slug'     => 've-chung-toi',
                'template' => 'templates/template-aboutus.php'
            ],
            [
                'title'    => 'Giải trí tại nhà',
                'slug'     => 'giai-tri-tai-nha',
                'template' => 'templates/template-giai-tri-tai-nha.php'
            ],
            [
                'title'    => 'F&B Giải trí',
                'slug'     => 'fnb-giai-tri',
                'template' => 'templates/template-f&b.php'
            ],
            [
                'title'    => 'Quảng cáo thương hiệu',
                'slug'     => 'quang-cao-thuong-hieu',
                'template' => 'templates/template-quang-cao-thuong-hieu.php'
            ],
            [
                'title'    => 'Giáo dục & Tương Tác',
                'slug'     => 'giao-duc',
                'template' => 'templates/template-giao-duc.php'
            ],
            [
                'title'    => 'Sự kiện và sân khấu',
                'slug'     => 'su-kien-san-khau',
                'template' => 'templates/template-su-kien-san-khau.php'
            ],
            [
                'title'    => 'Hội họp doanh nghiệp',
                'slug'     => 'hoi-hop-doanh-nghiep',
                'template' => 'templates/template-hoi-hop-doanh-nghiep.php'
            ],
            [
                'title'    => 'Minh bạch năng lực',
                'slug'     => 'minh-bach-nang-luc',
                'template' => 'templates/template-nang-luc.php'
            ],
            [
                'title'    => 'Chuyên gia',
                'slug'     => 'chuyen-gia',
                'template' => 'templates/template-chuyen-gia.php'
            ],
            [
                'title'    => 'Tuyển dụng',
                'slug'     => 'tuyen-dung',
                'template' => 'templates/template-tuyen-dung.php'
            ],
            [
                'title'    => 'Tiêu chí',
                'slug'     => 'tieu-chi-phat-trien',
                'template' => 'templates/template-tieu-chi.php'
            ],
            [
                'title'    => 'Liên hệ',
                'slug'     => 'lien-he',
                'template' => 'templates/template-lien-he.php'
            ],
            [
                'title'    => 'Chính sách thanh toán & Hợp đồng',
                'slug'     => 'chinh-sach-thanh-toan',
                'template' => 'templates/template-chinh-sach-thanh-toan.php'
            ],
            [
                'title'    => 'Chính sách bảo hành & Bảo trì',
                'slug'     => 'chinh-sach-bao-hanh',
                'template' => 'templates/template-chinh-sach-bao-hanh.php'
            ],
            [
                'title'    => 'Điều khoản sử dụng',
                'slug'     => 'dieu-khoan-su-dung',
                'template' => 'templates/template-dieu-khoan-su-dung.php'
            ],
            [
                'title'    => 'Chính sách bảo mật',
                'slug'     => 'chinh-sach-bao-mat',
                'template' => 'templates/template-chinh-sach-bao-mat.php'
            ],
            [
                'title'    => 'Tất cả sản phẩm',
                'slug'     => 'tat-ca-san-pham',
                'template' => 'templates/template-products.php'
            ],
            [
                'title'    => 'Blog',
                'slug'     => 'blog',
                'template' => 'templates/template-blogpage.php'
            ],
            [
                'title'    => 'Dự án tiêu biểu',
                'slug'     => 'du-an-tieu-bieu',
                'template' => 'templates/template-du-an.php'
            ]
        ];

        foreach ($pages as $page_data) {
            // Check if page exists by slug
            $existing_page = get_page_by_path($page_data['slug']);
            
            if (!$existing_page) {
                $page_id = wp_insert_post([
                    'post_title'   => $page_data['title'],
                    'post_name'    => $page_data['slug'],
                    'post_status'  => 'publish',
                    'post_type'    => 'page',
                ]);

                if ($page_id && !is_wp_error($page_id)) {
                    update_post_meta($page_id, '_wp_page_template', $page_data['template']);
                    
                    // Specific logic for homepage and blog
                    if ($page_data['slug'] === 'trang-chu') {
                        update_option('show_on_front', 'page');
                        update_option('page_on_front', $page_id);
                    }
                    if ($page_data['slug'] === 'blog') {
                        update_option('page_for_posts', $page_id);
                    }
                }
            } else {
                // If it exists, ensure the template is set correctly
                update_post_meta($existing_page->ID, '_wp_page_template', $page_data['template']);
                
                if ($page_data['slug'] === 'trang-chu') {
                    update_option('show_on_front', 'page');
                    update_option('page_on_front', $existing_page->ID);
                }
                if ($page_data['slug'] === 'blog') {
                    update_option('page_for_posts', $existing_page->ID);
                }
            }
        }
    }

    public function renderView() {
        ?>
        <div class="wrap">
            <h1>Cài đặt Trang mẫu hệ thống</h1>
            <p>Sử dụng công cụ này để tự động tạo toàn bộ các trang chính của website với đúng Slug và Template đã định sẵn.</p>
            
            <?php if (isset($_GET['status']) && $_GET['status'] === 'success') : ?>
                <div class="notice notice-success is-dismissible">
                    <p>Đã khởi tạo/cập nhật toàn bộ các trang thành công!</p>
                </div>
            <?php endif; ?>

            <div class="card" style="max-width: 600px; padding: 20px;">
                <h2>Danh sách trang sẽ tạo:</h2>
                <ul style="columns: 2;">
                    <li>✓ Trang chủ (/)</li>
                    <li>✓ Về chúng tôi (/ve-chung-toi)</li>
                    <li>✓ Giải trí tại nhà</li>
                    <li>✓ F&B Giải trí</li>
                    <li>✓ Quảng cáo thương hiệu</li>
                    <li>✓ Giáo dục & Tương tác</li>
                    <li>✓ Sự kiện & Sân khấu</li>
                    <li>✓ Hội họp doanh nghiệp</li>
                    <li>✓ Minh bạch năng lực</li>
                    <li>✓ Chuyên gia</li>
                    <li>✓ Tuyển dụng</li>
                    <li>✓ Tiêu chí</li>
                    <li>✓ Liên hệ</li>
                    <li>✓ Chính sách thanh toán</li>
                    <li>✓ Chính sách bảo hành</li>
                    <li>✓ Điều khoản sử dụng</li>
                    <li>✓ Chính sách bảo mật</li>
                    <li>✓ Tất cả sản phẩm</li>
                    <li>✓ Blog</li>
                    <li>✓ Dự án tiêu biểu (/du-an-tieu-bieu)</li>
                </ul>

                <form method="post">
                    <?php wp_nonce_field('tava_page_setup_action'); ?>
                    <input type="hidden" name="tava_setup_action" value="generate">
                    <p class="submit">
                        <button type="submit" class="button button-primary button-large" onclick="return confirm('Hệ thống sẽ tạo/cập nhật 20 trang. Bạn có chắc chắn?')">Kích hoạt tạo toàn bộ trang</button>
                    </p>
                </form>
            </div>

            <div style="margin-top: 20px;">
                <h3>Lưu ý:</h3>
                <ul class="ul-disc">
                    <li>Nếu trang đã tồn tại (khớp Slug), hệ thống sẽ chỉ cập nhật lại Template tương ứng.</li>
                    <li>Trang chủ sẽ được tự động cấu hình trong <strong>Cài đặt > Đọc</strong>.</li>
                </ul>
            </div>
        </div>
        <?php
    }
}
