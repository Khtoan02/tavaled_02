<?php
namespace App\Controllers\Admin;

class HeroSliderController {
    public function register() {
        add_action('admin_menu', [$this, 'addMenuPage']);
        add_action('wp_ajax_tavaled_save_hero_slider', [$this, 'saveSliderAjax']);
    }

    public function addMenuPage() {
        add_submenu_page(
            'edit.php?post_type=tava_product', // Parent slug
            'Quản lý Slide Hero Trang chủ',   // Page title
            'Slide Hero Trang chủ',            // Menu title
            'manage_options',                  // Capability
            'tavaled-hero-slider',             // Menu slug
            [$this, 'renderView']              // Callback
        );
    }

    public function renderView() {
        wp_enqueue_media();
        view('admin/hero-slider');
    }

    public function saveSliderAjax() {
        if (!current_user_can('manage_options')) {
            wp_send_json_error('Permission denied');
        }

        $image_ids = isset($_POST['image_ids']) ? sanitize_text_field($_POST['image_ids']) : '';
        update_option('tavaled_home_hero_slides', $image_ids);

        wp_send_json_success('Đã lưu thành công');
    }
}
