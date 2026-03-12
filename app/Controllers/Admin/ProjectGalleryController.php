<?php
namespace App\Controllers\Admin;

class ProjectGalleryController {
    public function register() {
        add_action('admin_menu', [$this, 'addMenuPage']);
        add_action('wp_ajax_tavaled_save_project_gallery', [$this, 'saveGalleryAjax']);
    }

    public function addMenuPage() {
        add_menu_page(
            'Quản lý Dự án Trang chủ',
            'Dự án Trang chủ',
            'manage_options',
            'tavaled-project-gallery',
            [$this, 'renderView'],
            'dashicons-format-gallery',
            21
        );
    }

    public function renderView() {
        wp_enqueue_media();
        view('admin/project-gallery');
    }

    public function saveGalleryAjax() {
        if (!current_user_can('manage_options')) {
            wp_send_json_error('Permission denied');
        }

        $image_ids = isset($_POST['image_ids']) ? sanitize_text_field($_POST['image_ids']) : '';
        update_option('tavaled_home_projects', $image_ids);

        if (isset($_POST['metadata']) && is_array($_POST['metadata'])) {
            foreach ($_POST['metadata'] as $id => $data) {
                $id = intval($id);
                if ($id > 0) {
                    if (isset($data['post_title'])) {
                        wp_update_post([
                            'ID' => $id,
                            'post_title' => sanitize_text_field($data['post_title'])
                        ]);
                    }
                    if (isset($data['project_name'])) {
                        update_post_meta($id, '_tavaled_project_name', sanitize_text_field($data['project_name']));
                    }
                    if (isset($data['project_desc'])) {
                        update_post_meta($id, '_tavaled_project_desc', sanitize_textarea_field($data['project_desc']));
                    }
                    if (isset($data['project_solution'])) {
                        update_post_meta($id, '_tavaled_project_solution', sanitize_text_field($data['project_solution']));
                    }
                }
            }
        }

        wp_send_json_success('Đã lưu thành công');
    }
}
