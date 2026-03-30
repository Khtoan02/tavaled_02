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
        // Tăng giới hạn thời gian thực thi để tránh timeout khi tạo 200 sản phẩm
        set_time_limit(300);

        $led_brands = ['BOE', 'Absen', 'Leyard', 'Unilumin', 'LianTronics', 'NovaStar', 'Colorlight'];
        $led_subcats = ['LED Trong nhà', 'LED Ngoài trời', 'LED Trong suốt', 'LED Cong', 'Màn hình ghép LCD'];
        
        $audio_brands = ['JBL', 'Yamaha', 'Shure', 'FBT', 'Crown', 'Bose', 'Sennheiser'];
        $audio_subcats = ['Loa Line Array', 'Mixer', 'Micro', 'Loa Sub', 'Loa Full', 'Cục đẩy', 'Vang số'];
        
        $light_brands = ['Chauvet', 'Martin', 'MA Lighting', 'Claypaky', 'Robe', 'Khác'];
        $light_subcats = ['Moving Head', 'Par LED', 'Khói', 'Bàn điều khiển', 'Laser', 'Đèn Blinder', 'Đèn Follow'];
        
        $badges = ['Bán chạy', 'Mới', 'Premium', 'Cho thuê', 'Hot', 'Sale', 'Khuyên dùng', ''];

        $data = [
            'Màn hình LED' => [
                'img' => 'https://tavaled.vn/wp-content/uploads/2023/01/P2.5-indoor.png',
                'products' => []
            ],
            'Thiết bị âm thanh' => [
                'img' => 'https://tavaled.vn/wp-content/uploads/2025/11/16-TD-Classic-.jpg',
                'products' => []
            ],
            'Thiết bị ánh sáng' => [
                'img' => 'https://tavaled.vn/wp-content/uploads/2025/12/TavaLED-2-400x400.png',
                'products' => []
            ]
        ];

        // Tạo 75 sản phẩm LED
        $pitch_values = [1.2, 1.53, 1.86, 2.0, 2.5, 3.0, 3.91, 4.0, 4.81, 5.0, 6.0, 8.0, 10.0];
        for ($i = 1; $i <= 75; $i++) {
            $pitch = $pitch_values[array_rand($pitch_values)];
            $brand = $led_brands[array_rand($led_brands)];
            $subcat = $led_subcats[array_rand($led_subcats)];
            $badge = $badges[array_rand($badges)];
            $title = "Màn hình {$subcat} {$brand} P{$pitch}";
            if ($i % 5 === 0) $title .= " Cao Cấp";
            
            $data['Màn hình LED']['products'][] = [
                'title' => "{$title} - Demo {$i}",
                'model' => "{$brand}-P{$pitch}-" . rand(100, 999),
                'badge' => $badge,
                'subcat' => $subcat,
                'brand' => $brand,
                'spec' => "P{$pitch}"
            ];
        }

        // Tạo 65 sản phẩm Âm thanh
        for ($i = 1; $i <= 65; $i++) {
            $brand = $audio_brands[array_rand($audio_brands)];
            $subcat = $audio_subcats[array_rand($audio_subcats)];
            $badge = $badges[array_rand($badges)];
            $power = rand(5, 50) * 100 . "W";
            if (in_array($subcat, ['Micro', 'Mixer', 'Vang số'])) {
                $power = "Digital";
            }
            
            $data['Thiết bị âm thanh']['products'][] = [
                'title' => "{$subcat} {$brand} V-Series - Demo {$i}",
                'model' => strtoupper(substr($brand, 0, 2)) . rand(1000, 9000),
                'badge' => $badge,
                'subcat' => $subcat,
                'brand' => $brand,
                'spec' => $power
            ];
        }

        // Tạo 65 sản phẩm Ánh sáng
        for ($i = 1; $i <= 65; $i++) {
            $brand = $light_brands[array_rand($light_brands)];
            $subcat = $light_subcats[array_rand($light_subcats)];
            $badge = $badges[array_rand($badges)];
            $w = rand(20, 300) * 10 . "W";
            if ($subcat === 'Bàn điều khiển') {
                $w = "Digital";
            }
            
            $data['Thiết bị ánh sáng']['products'][] = [
                'title' => "Đèn {$subcat} {$brand} Studio - Demo {$i}",
                'model' => strtoupper(substr($subcat, 0, 2)) . "-" . rand(100, 999),
                'badge' => $badge,
                'subcat' => $subcat,
                'brand' => $brand,
                'spec' => $w
            ];
        }

        foreach ($data as $cat_name => $cat_data) {
            $cat_id = $this->insertTermIfNotExists($cat_name, 'product_cat');

            foreach ($cat_data['products'] as $p) {
                // Tạo post
                $post_id = wp_insert_post([
                    'post_title'   => $p['title'],
                    'post_status'  => 'publish',
                    'post_type'    => 'tava_product',
                    'meta_input'   => [
                        '_product_model' => $p['model'],
                        '_product_img'   => $cat_data['img'],
                        '_is_demo'       => '1'
                    ]
                ]);

                if ($post_id && !is_wp_error($post_id)) {
                    if ($cat_id) wp_set_object_terms($post_id, [$cat_id], 'product_cat');
                    
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
                    if (!empty($p['badge'])) {
                        $badge_id = $this->insertTermIfNotExists($p['badge'], 'product_badge');
                        if ($badge_id) wp_set_object_terms($post_id, [$badge_id], 'product_badge');
                    }
                }
            }
        }
    }

    private function deleteDemo() {
        // Tăng giới hạn thời gian thực thi
        set_time_limit(300);

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
