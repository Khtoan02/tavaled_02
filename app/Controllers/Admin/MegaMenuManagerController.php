<?php
namespace App\Controllers\Admin;

class MegaMenuManagerController {
    public function register() {
        add_action('admin_menu', [$this, 'addMenuPage']);
        add_action('wp_ajax_tavaled_save_hardcoded_mega_menu', [$this, 'saveData']);
    }

    public function addMenuPage() {
        add_menu_page(
            'Hình ảnh Mega Menu',
            'Sửa Mega Menu',
            'manage_options',
            'tavaled-mega-menu',
            [$this, 'renderView'],
            'dashicons-images-alt2',
            22
        );
    }

    public function renderView() {
        wp_enqueue_media();
        
        $data = get_option('tavaled_hardcoded_mega_menu');
        if (empty($data)) {
            // Khởi tạo dữ liệu mặc định y hệt hardcode hiện tại
            $data = [
                'solutions' => [
                    ['title' => 'Giáo Dục & Tương Tác', 'slug' => '/giao-duc', 'image' => 'https://images.unsplash.com/photo-1524178232363-1fb2b07ceb58?q=80&w=600&auto=format&fit=crop', 'is_hot' => '0'],
                    ['title' => 'Hội Họp Doanh Nghiệp', 'slug' => '/hoi-hop-doanh-nghiep', 'image' => 'https://images.unsplash.com/photo-1497366216548-37526070297c?q=80&w=600&auto=format&fit=crop', 'is_hot' => '0'],
                    ['title' => 'Sự Kiện & Sân Khấu', 'slug' => '/su-kien-san-khau', 'image' => 'https://images.unsplash.com/photo-1492684223066-81342ee5ff30?q=80&w=600&auto=format&fit=crop', 'is_hot' => '0'],
                    ['title' => 'Quảng Cáo Thương Hiệu', 'slug' => '/quang-cao-thuong-hieu', 'image' => 'https://images.unsplash.com/photo-1555099962-4199c345e5dd?q=80&w=600&auto=format&fit=crop', 'is_hot' => '0'],
                    ['title' => 'F&B & Giải Trí Đêm', 'slug' => '/fnb-giai-tri', 'image' => 'https://images.unsplash.com/photo-1514525253161-7a46d19cd819?q=80&w=600&auto=format&fit=crop', 'is_hot' => '0'],
                    ['title' => 'Giải Trí Tại Gia', 'slug' => '/giai-tri-tai-nha', 'image' => 'https://images.unsplash.com/photo-1593784991095-a205069470b6?q=80&w=600&auto=format&fit=crop', 'is_hot' => '1']
                ]
            ];
            update_option('tavaled_hardcoded_mega_menu', $data);
        }
        
        view('admin/mega-menu-quick', ['data' => $data]);
    }

    public function saveData() {
        if (!current_user_can('manage_options')) {
            wp_send_json_error('Permission denied');
        }

        $solutions = isset($_POST['solutions']) && is_array($_POST['solutions']) ? wp_unslash($_POST['solutions']) : [];

        $clean_solutions = [];
        foreach ($solutions as $item) {
            $clean_solutions[] = [
                'title'  => sanitize_text_field($item['title'] ?? ''),
                'slug'   => sanitize_text_field($item['slug'] ?? ''),
                'image'  => esc_url_raw($item['image'] ?? ''),
                'is_hot' => isset($item['is_hot']) && $item['is_hot'] == '1' ? '1' : '0'
            ];
        }

        $dataToSave = [
            'solutions' => $clean_solutions
        ];

        update_option('tavaled_hardcoded_mega_menu', $dataToSave);
        wp_send_json_success('Đã lưu thành công');
    }
}
