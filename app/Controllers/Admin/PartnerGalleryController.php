<?php
namespace App\Controllers\Admin;

class PartnerGalleryController {
    public function register() {
        add_action('admin_menu', [$this, 'addMenuPage']);
        add_action('wp_ajax_tavaled_save_partner_gallery', [$this, 'saveGalleryAjax']);
    }

    public function addMenuPage() {
        add_menu_page(
            'Quản lý Đối Tác',
            'Đối tác',
            'manage_options',
            'tavaled-partner-gallery',
            [$this, 'renderView'],
            'dashicons-groups',
            22
        );
    }

    public function renderView() {
        wp_enqueue_media();
        view('admin/partner-gallery');
    }

    public function saveGalleryAjax() {
        if (!current_user_can('manage_options')) {
            wp_send_json_error('Permission denied');
        }

        $partner_ids = isset($_POST['partner_ids']) ? sanitize_text_field($_POST['partner_ids']) : '';
        update_option('tavaled_partners_list', $partner_ids);

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
                    if (isset($data['partner_level'])) {
                        update_post_meta($id, '_tavaled_partner_level', sanitize_text_field($data['partner_level']));
                    }
                    if (isset($data['partner_desc'])) {
                        update_post_meta($id, '_tavaled_partner_desc', sanitize_text_field($data['partner_desc']));
                    }
                }
            }
        }

        wp_send_json_success('Đã lưu thành công');
    }
}
