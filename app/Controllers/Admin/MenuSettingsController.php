<?php
namespace App\Controllers\Admin;

class MenuSettingsController {
    public function register() {
        // Register custom fields for menu items
        add_action('wp_nav_menu_item_custom_fields', [$this, 'add_custom_fields'], 10, 4);
        add_action('wp_update_nav_menu_item', [$this, 'update_custom_fields'], 10, 2);
    }

    public function add_custom_fields($item_id, $item, $depth, $args) {
        $image_url = get_post_meta($item_id, '_menu_item_image_url', true);
        $is_hot = get_post_meta($item_id, '_menu_item_is_hot', true);
        $icon_class = get_post_meta($item_id, '_menu_item_icon_class', true);
        $subtitle = get_post_meta($item_id, '_menu_item_subtitle', true);
        ?>
        <p class="field-image-url description description-wide">
            <label for="edit-menu-item-image-url-<?php echo $item_id; ?>">
                Hình ảnh hiển thị (Chỉ dùng cho Mega Menu Giải Pháp)<br />
                <input type="text" id="edit-menu-item-image-url-<?php echo $item_id; ?>" class="widefat code edit-menu-item-custom" name="menu-item-image-url[<?php echo $item_id; ?>]" value="<?php echo esc_attr($image_url); ?>" />
            </label>
        </p>
        <p class="field-is-hot description description-wide">
            <label for="edit-menu-item-is-hot-<?php echo $item_id; ?>">
                <input type="checkbox" id="edit-menu-item-is-hot-<?php echo $item_id; ?>" name="menu-item-is-hot[<?php echo $item_id; ?>]" value="1" <?php checked($is_hot, 1); ?> />
                Đánh dấu "HOT"
            </label>
        </p>
        <p class="field-icon-class description description-wide">
            <label for="edit-menu-item-icon-class-<?php echo $item_id; ?>">
                Class Icon (VD: ph-fill ph-monitor-play text-brand-orange)<br />
                <input type="text" id="edit-menu-item-icon-class-<?php echo $item_id; ?>" class="widefat code edit-menu-item-custom" name="menu-item-icon-class[<?php echo $item_id; ?>]" value="<?php echo esc_attr($icon_class); ?>" />
            </label>
        </p>
        <p class="field-subtitle description description-wide">
            <label for="edit-menu-item-subtitle-<?php echo $item_id; ?>">
                Mô tả ngắn (Chỉ dùng cho Về chúng tôi)<br />
                <input type="text" id="edit-menu-item-subtitle-<?php echo $item_id; ?>" class="widefat code edit-menu-item-custom" name="menu-item-subtitle[<?php echo $item_id; ?>]" value="<?php echo esc_attr($subtitle); ?>" />
            </label>
        </p>
        <?php
    }

    public function update_custom_fields($menu_id, $menu_item_db_id) {
        if (isset($_POST['menu-item-image-url'][$menu_item_db_id])) {
            update_post_meta($menu_item_db_id, '_menu_item_image_url', sanitize_text_field($_POST['menu-item-image-url'][$menu_item_db_id]));
        } else {
            delete_post_meta($menu_item_db_id, '_menu_item_image_url');
        }

        if (isset($_POST['menu-item-is-hot'][$menu_item_db_id])) {
            update_post_meta($menu_item_db_id, '_menu_item_is_hot', 1);
        } else {
            update_post_meta($menu_item_db_id, '_menu_item_is_hot', 0);
        }

        if (isset($_POST['menu-item-icon-class'][$menu_item_db_id])) {
            update_post_meta($menu_item_db_id, '_menu_item_icon_class', sanitize_text_field($_POST['menu-item-icon-class'][$menu_item_db_id]));
        } else {
            delete_post_meta($menu_item_db_id, '_menu_item_icon_class');
        }

        if (isset($_POST['menu-item-subtitle'][$menu_item_db_id])) {
            update_post_meta($menu_item_db_id, '_menu_item_subtitle', sanitize_text_field($_POST['menu-item-subtitle'][$menu_item_db_id]));
        } else {
            delete_post_meta($menu_item_db_id, '_menu_item_subtitle');
        }
    }
}
