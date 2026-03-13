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

    private function insertTermIfNotExists($name, $taxonomy) {
        if (empty($name)) return null;
        $term = get_term_by('name', $name, $taxonomy);
        if (!$term) {
            $term_info = wp_insert_term($name, $taxonomy);
            return is_wp_error($term_info) ? null : $term_info['term_id'];
        }
        return $term->term_id;
    }

    private function generateDemo() {
        $data = [
            [
                'cat' => 'Màn hình LED',
                'img' => 'https://tavaled.vn/wp-content/uploads/2023/01/P2.5-indoor.png',
                'products' => [
                    ['title' => 'Màn hình LED BOE P2.5 Indoor Pro', 'model' => 'P2.5-ID', 'tag' => 'Bán chạy', 'subcat' => 'LED Trong nhà', 'brand' => 'BOE', 'spec' => 'P2.5'],
                    ['title' => 'Màn hình LED Absen P3.0 Outdoor', 'model' => 'P3.0-OD', 'tag' => 'Mới', 'subcat' => 'LED Ngoài trời', 'brand' => 'Absen', 'spec' => 'P3'],
                    ['title' => 'Màn hình LED Leyard P1.53 High-End', 'model' => 'P1.53-CB', 'tag' => 'Premium', 'subcat' => 'LED Trong nhà', 'brand' => 'Leyard', 'spec' => 'P1.53'],
                    ['title' => 'Màn hình LED BOE P4 Outdoor Stage', 'model' => 'P4-OD', 'tag' => 'Cho thuê', 'subcat' => 'LED Ngoài trời', 'brand' => 'BOE', 'spec' => 'P4'],
                    ['title' => 'Màn hình LED Absen P2 Indoor', 'model' => 'P2-ID', 'tag' => 'Hot', 'subcat' => 'LED Trong nhà', 'brand' => 'Absen', 'spec' => 'P2'],
                    ['title' => 'Màn hình LED Leyard P5 Outdoor', 'model' => 'P5-OD', 'tag' => 'Mới', 'subcat' => 'LED Ngoài trời', 'brand' => 'Leyard', 'spec' => 'P5'],
                ]
            ],
            [
                'cat' => 'Âm thanh',
                'img' => 'https://tavaled.vn/wp-content/uploads/2025/11/16-TD-Classic-.jpg',
                'products' => [
                    ['title' => 'Loa JBL Line Array VTX V25', 'model' => 'VTX-V25', 'tag' => 'Công suất lớn', 'subcat' => 'Loa Line Array', 'brand' => 'JBL', 'spec' => 'Trên 1000W'],
                    ['title' => 'Mixer Yamaha CL5 Professional', 'model' => 'CL5-YH', 'tag' => 'Sân khấu', 'subcat' => 'Mixer', 'brand' => 'Yamaha', 'spec' => 'Digital'],
                    ['title' => 'Bộ Micro Shure ULX-D', 'model' => 'ULXD-SR', 'tag' => 'Sóng ổn định', 'subcat' => 'Micro', 'brand' => 'Shure', 'spec' => 'Không dây'],
                    ['title' => 'Loa FBT Subwoofer 18 inch', 'model' => 'SUB-18P', 'tag' => 'Bass sâu', 'subcat' => 'Loa Sub', 'brand' => 'FBT', 'spec' => '500W-1000W'],
                    ['title' => 'Loa JBL Full Range 15 inch', 'model' => 'SRX815', 'tag' => 'Mới', 'subcat' => 'Loa Full', 'brand' => 'JBL', 'spec' => '500W-1000W'],
                    ['title' => 'Cục đẩy công suất Crown XTi', 'model' => 'XTi-4002', 'tag' => 'Premium', 'subcat' => 'Cục đẩy', 'brand' => 'Crown', 'spec' => 'Từ 1000W'],
                ]
            ],
            [
                'cat' => 'Ánh sáng',
                'img' => 'https://tavaled.vn/wp-content/uploads/2025/12/TavaLED-2-400x400.png',
                'products' => [
                    ['title' => 'Moving Head Beam Chauvet 230W', 'model' => 'BM-230', 'tag' => 'Sân khấu', 'subcat' => 'Moving Head', 'brand' => 'Chauvet', 'spec' => '230W'],
                    ['title' => 'Đèn Par LED Martin 54x3W RGBW', 'model' => 'PL-543', 'tag' => 'Nền màu', 'subcat' => 'Par LED', 'brand' => 'Martin', 'spec' => 'Màu RGBW'],
                    ['title' => 'Máy khói 1500W High Output', 'model' => 'SMK-1500', 'tag' => 'Hiệu ứng', 'subcat' => 'Khói', 'brand' => 'Khác', 'spec' => '1500W'],
                    ['title' => 'Bàn khiển MA2 Command Wing', 'model' => 'MA2-CW', 'tag' => 'Chuyên nghiệp', 'subcat' => 'Bàn điều khiển', 'brand' => 'MA Lighting', 'spec' => 'Digital'],
                    ['title' => 'Đèn Laser 3W RGB Animation', 'model' => 'LS-3W', 'tag' => 'Hot', 'subcat' => 'Laser', 'brand' => 'Khác', 'spec' => '3W'],
                    ['title' => 'Đèn Blinder 4 bóng 400W', 'model' => 'BL-400', 'tag' => 'Mới', 'subcat' => 'Đèn Blinder', 'brand' => 'Khác', 'spec' => '400W'],
                ]
            ]
        ];

        foreach ($data as $cat_data) {
            $cat_id = $this->insertTermIfNotExists($cat_data['cat'], 'product_cat');

            foreach ($cat_data['products'] as $p) {
                // Kiểm tra xem sản phẩm đã có chưa để tránh tạo trùng khi ấn nhiều lần (tùy chọn)
                
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

                if ($post_id && !is_wp_error($post_id)) {
                    if ($cat_id) {
                        wp_set_object_terms($post_id, [$cat_id], 'product_cat');
                    }
                    if (!empty($p['subcat'])) {
                        $subcat_id = $this->insertTermIfNotExists($p['subcat'], 'product_subcat');
                        if ($subcat_id) wp_set_object_terms($post_id, [$subcat_id], 'product_subcat');
                    }
                    if (!empty($p['brand'])) {
                        $brand_id = $this->insertTermIfNotExists($p['brand'], 'product_brand');
                        if ($brand_id) wp_set_object_terms($post_id, [$brand_id], 'product_brand');
                    }
                    if (!empty($p['spec'])) {
                        $spec_id = $this->insertTermIfNotExists($p['spec'], 'product_spec');
                        if ($spec_id) wp_set_object_terms($post_id, [$spec_id], 'product_spec');
                    }
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
