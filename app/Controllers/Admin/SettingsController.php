<?php
namespace App\Controllers\Admin;

class SettingsController {
    public function register() {
        add_action('admin_menu', [$this, 'addMenuPage']);
        add_action('admin_init', [$this, 'registerSettings']);
    }

    public function addMenuPage() {
        add_menu_page(
            'Thông tin doanh nghiệp',
            'Cấu hình Website',
            'manage_options',
            'tavaled-settings',
            [$this, 'renderView'],
            'dashicons-store', // Biểu tượng icon menu
            20
        );
    }

    public function registerSettings() {
        // Đăng ký các trường thông tin (options)
        $fields = [
            'tavaled_company_name',
            'tavaled_logo',
            'tavaled_fallback_image', /* Ảnh mặc định mới */
            'tavaled_phone',
            'tavaled_phone_kd',
            'tavaled_phone_cskh',
            'tavaled_zalo',
            'tavaled_email',
            'tavaled_slogan',
            'tavaled_address',
            'tavaled_office',
            'tavaled_showroom'
        ];

        foreach ($fields as $field) {
            register_setting('tavaled_settings_group', $field);
        }
    }

    public function renderView() {
        // Cần tải thư viện media để dùng nút "Tải ảnh lên" cho Logo
        wp_enqueue_media();
        
        // Gọi view hiển thị giao diện Admin
        view('admin/settings');
    }
}
