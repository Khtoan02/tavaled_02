<?php
namespace App\Controllers\Admin;

class DemoDataController {
    
    public function register() {
        add_action('admin_menu', [$this, 'addSubmenu']);
        add_action('admin_init', [$this, 'handleActions']);
    }

    public function addSubmenu() {
        add_submenu_page(
            'edit.php?post_type=tava_product',
            'Dữ liệu Demo',
            'Dữ liệu Demo',
            'manage_options',
            'tava-demo-data',
            [$this, 'renderView']
        );
    }

    public function handleActions() {
        if (!isset($_GET['page']) || $_GET['page'] !== 'tava-demo-data') return;
        if (!current_user_can('manage_options')) return;

        if (isset($_POST['tava_demo_action'])) {
            check_admin_referer('tava_demo_data_action');

            if ($_POST['tava_demo_action'] === 'generate') {
                $this->generateDemo();
                wp_redirect(admin_url('edit.php?post_type=tava_product&page=tava-demo-data&status=generated'));
                exit;
            }

            if ($_POST['tava_demo_action'] === 'delete') {
                $this->deleteDemo();
                wp_redirect(admin_url('edit.php?post_type=tava_product&page=tava-demo-data&status=deleted'));
                exit;
            }
        }
    }

    private function generateDemo() {
        $data = [
            [
                'cat' => 'Màn hình LED',
                'img' => 'https://tavaled.vn/wp-content/uploads/2023/01/P2.5-indoor.png',
                'products' => [
                    ['title' => 'Màn hình LED P2.5 Indoor Pro', 'model' => 'P2.5-ID', 'tag' => 'Bán chạy'],
                    ['title' => 'Màn hình LED P3.0 Outdoor High Brightness', 'model' => 'P3.0-OD', 'tag' => 'Mới'],
                    ['title' => 'Màn hình LED P1.53 Cabinet High-End', 'model' => 'P1.53-CB', 'tag' => 'Premium'],
                    ['title' => 'Màn hình LED P3.91 Rental Stage', 'model' => 'P3.91-RT', 'tag' => 'Cho thuê'],
                ]
            ],
            [
                'cat' => 'Âm thanh',
                'img' => 'https://tavaled.vn/wp-content/uploads/2025/11/16-TD-Classic-.jpg',
                'products' => [
                    ['title' => 'Hệ thống Loa Line Array JBL VTX', 'model' => 'VTX-V25', 'tag' => 'Công suất lớn'],
                    ['title' => 'Mixer Digital Yamaha CL5 Professional', 'model' => 'CL5-YH', 'tag' => 'Sân khấu'],
                    ['title' => 'Bộ Micro không dây Shure ULX-D', 'model' => 'ULXD-SR', 'tag' => 'Sóng ổn định'],
                    ['title' => 'Loa Subwoofer 18 inch Passive', 'model' => 'SUB-18P', 'tag' => 'Bass sâu'],
                ]
            ],
            [
                'cat' => 'Ánh sáng',
                'img' => 'https://tavaled.vn/wp-content/uploads/2025/12/TavaLED-2-400x400.png',
                'products' => [
                    ['title' => 'Đèn Moving Head Beam 230W', 'model' => 'BM-230', 'tag' => 'Sân khấu'],
                    ['title' => 'Đèn Par LED 54x3W Full Color', 'model' => 'PL-543', 'tag' => 'Nền màu'],
                    ['title' => 'Máy khói 1500W High Output', 'model' => 'SMK-1500', 'tag' => 'Hiệu ứng'],
                    ['title' => 'Bàn điều khiển ánh sáng MA2 Command Wing', 'model' => 'MA2-CW', 'tag' => 'Chuyên nghiệp'],
                ]
            ]
        ];

        foreach ($data as $cat_data) {
            // Ensure cat exists
            $term = get_term_by('name', $cat_data['cat'], 'product_cat');
            if (!$term) {
                $term_info = wp_insert_term($cat_data['cat'], 'product_cat');
                $term_id = is_wp_error($term_info) ? 0 : $term_info['term_id'];
            } else {
                $term_id = $term->term_id;
            }

            foreach ($cat_data['products'] as $p) {
                $post_id = wp_insert_post([
                    'post_title'   => $p['title'],
                    'post_status'  => 'publish',
                    'post_type'    => 'tava_product',
                    'meta_input'   => [
                        '_product_model' => $p['model'],
                        '_product_tag'   => $p['tag'],
                        '_product_img'   => $cat_data['img'],
                        '_is_demo'       => '1'
                    ]
                ]);

                if ($post_id && !is_wp_error($post_id) && $term_id) {
                    wp_set_object_terms($post_id, [$term_id], 'product_cat');
                }
            }
        }
    }

    private function deleteDemo() {
        $posts = get_posts([
            'post_type'  => 'tava_product',
            'posts_per_page' => -1,
            'meta_key'   => '_is_demo',
            'meta_value' => '1',
            'fields'     => 'ids',
            'post_status' => 'any'
        ]);

        foreach ($posts as $id) {
            wp_delete_post($id, true);
        }
    }

    public function renderView() {
        \view('admin/demo-data');
    }
}
