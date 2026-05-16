<?php
namespace App\Controllers\Admin;

class ProductMetaBoxController {

    public function register() {
        add_action('add_meta_boxes', [$this, 'addMetaBoxes']);
        add_action('save_post', [$this, 'saveMetaBoxes']);
        add_action('admin_enqueue_scripts', [$this, 'enqueueScripts']);
    }

    public function enqueueScripts($hook) {
        global $post;
        if ($hook === 'post-new.php' || $hook === 'post.php') {
            if ($post && $post->post_type === 'tava_product') {
                wp_enqueue_media();
                wp_add_inline_style('wp-admin', '
                    .tava-meta-box-tabs { margin-bottom: 15px; border-bottom: 1px solid #ccd0d4; }
                    .tava-meta-box-tabs a { text-decoration: none; display: inline-block; padding: 10px 15px; border: 1px solid transparent; border-bottom: none; margin-bottom: -1px; background: #f1f1f1; color: #555; }
                    .tava-meta-box-tabs a.active { background: #fff; border-color: #ccd0d4; border-bottom-color: #fff; color: #2271b1; font-weight: bold; }
                    .tava-tab-content { display: none; padding: 15px 0; }
                    .tava-tab-content.active { display: block; }
                    .tava-form-group { margin-bottom: 20px; }
                    .tava-form-group label { display: block; font-weight: bold; margin-bottom: 8px; }
                    .tava-form-group input[type="text"], .tava-form-group textarea { width: 100%; max-width: 100%; }
                    .tava-gallery-preview { display: flex; flex-wrap: wrap; gap: 10px; margin-top: 10px; }
                    .tava-gallery-preview img { width: 80px; height: 80px; object-fit: cover; border: 1px solid #ddd; border-radius: 4px; }
                ');
            }
        }
    }

    public function addMetaBoxes() {
        add_meta_box(
            'tava_product_meta',
            'Cấu hình Chi tiết Sản phẩm (TavaLLS)',
            [$this, 'renderMetaBox'],
            'tava_product',
            'normal',
            'high'
        );
    }

    public function renderMetaBox($post) {
        // Tạo nonce để bảo mật
        wp_nonce_field('tava_save_product_meta', 'tava_product_meta_nonce');

        // Lấy dữ liệu hiện tại
        $model = get_post_meta($post->ID, '_product_model', true);
        $overview = get_post_meta($post->ID, '_product_overview', true) ?: get_post_meta($post->ID, 'tong_quan', true);
        $specs = get_post_meta($post->ID, '_product_specs', true) ?: get_post_meta($post->ID, 'thong_so_ky_thuat', true);
        $install_info = get_post_meta($post->ID, '_product_install_info', true) ?: get_post_meta($post->ID, 'thong_tin_lap_dat', true);
        $faq = get_post_meta($post->ID, '_product_faq', true);
        
        $gallery_raw = get_post_meta($post->ID, '_product_gallery', true);
        $gallery_str = is_array($gallery_raw) ? implode("\n", $gallery_raw) : str_replace('|', "\n", $gallery_raw);

        ?>
        <div class="tava-meta-box-tabs">
            <a href="#tab-basic" class="active">Cơ bản & Media</a>
            <a href="#tab-overview">Mô tả ngắn</a>
            <a href="#tab-specs">Thông số Kỹ thuật</a>
            <a href="#tab-install">Dự án & Lắp đặt</a>
            <a href="#tab-faq">Câu hỏi thường gặp</a>
        </div>

        <div id="tab-basic" class="tava-tab-content active">
            <div class="tava-form-group">
                <label for="_product_model">Mã Model Sản phẩm</label>
                <input type="text" name="_product_model" id="_product_model" value="<?php echo esc_attr($model); ?>" placeholder="VD: TVC-1024" />
                <p class="description">Để trống hệ thống sẽ tự động tạo mã ngẫu nhiên.</p>
            </div>
            
            <div class="tava-form-group">
                <label for="_product_gallery">Thư viện ảnh bổ sung (Nhập URL hoặc Chọn từ Thư viện)</label>
                <textarea name="_product_gallery" id="_product_gallery" rows="5" style="margin-bottom: 8px;"><?php echo esc_textarea($gallery_str); ?></textarea>
                <button type="button" class="button" id="tava_gallery_button">Tải lên / Chọn ảnh từ Media</button>
                <p class="description">Mỗi link ảnh nằm trên 1 dòng. Bạn có thể tự dán link hoặc bấm nút trên để chọn nhiều ảnh cùng lúc từ Media.</p>
            </div>
        </div>

        <div id="tab-overview" class="tava-tab-content">
            <div class="tava-form-group">
                <label>Nội dung Tổng quan / Mô tả ngắn</label>
                <?php wp_editor($overview, '_product_overview', ['textarea_rows' => 8, 'media_buttons' => true]); ?>
                <p class="description">Hiển thị ở cột bên phải, dưới tên sản phẩm.</p>
            </div>
        </div>

        <div id="tab-specs" class="tava-tab-content">
            <div class="tava-form-group">
                <label>Nội dung Thông số kỹ thuật</label>
                <?php wp_editor($specs, '_product_specs', ['textarea_rows' => 10, 'media_buttons' => true]); ?>
                <p class="description">Hiển thị ở Tab "Thông số kỹ thuật". Nên dùng chức năng tạo Bảng (Table).</p>
            </div>
        </div>

        <div id="tab-install" class="tava-tab-content">
            <div class="tava-form-group">
                <label>Nội dung Dự án tiêu biểu & Lắp đặt</label>
                <?php wp_editor($install_info, '_product_install_info', ['textarea_rows' => 10, 'media_buttons' => true]); ?>
                <p class="description">Hiển thị ở Tab "Thông tin dự án / Lắp đặt".</p>
            </div>
        </div>

        <div id="tab-faq" class="tava-tab-content">
            <div class="tava-form-group">
                <label>Câu hỏi thường gặp (FAQ)</label>
                <?php wp_editor($faq, '_product_faq', ['textarea_rows' => 10, 'media_buttons' => true]); ?>
                <p class="description">Hiển thị ở Tab "Câu hỏi thường gặp".</p>
            </div>
        </div>

        <script>
        jQuery(document).ready(function($) {
            $('.tava-meta-box-tabs a').on('click', function(e) {
                e.preventDefault();
                $('.tava-meta-box-tabs a').removeClass('active');
                $(this).addClass('active');
                $('.tava-tab-content').removeClass('active');
                $($(this).attr('href')).addClass('active');
            });

            // Khởi tạo WP Media Frame cho Gallery
            var mediaUploader;
            $('#tava_gallery_button').on('click', function(e) {
                e.preventDefault();
                if (mediaUploader) {
                    mediaUploader.open();
                    return;
                }
                mediaUploader = wp.media({
                    title: 'Chọn ảnh cho Thư viện Sản phẩm',
                    button: { text: 'Thêm vào Thư viện' },
                    multiple: true // Cho phép chọn nhiều ảnh
                });
                mediaUploader.on('select', function() {
                    var attachments = mediaUploader.state().get('selection').toJSON();
                    var currentText = $('#_product_gallery').val().trim();
                    var newUrls = attachments.map(function(att) { return att.url; });
                    
                    if (currentText !== '') {
                        $('#_product_gallery').val(currentText + '\n' + newUrls.join('\n'));
                    } else {
                        $('#_product_gallery').val(newUrls.join('\n'));
                    }
                });
                mediaUploader.open();
            });
        });
        </script>
        <?php
    }

    public function saveMetaBoxes($post_id) {
        // Kiểm tra nonce
        if (!isset($_POST['tava_product_meta_nonce']) || !wp_verify_nonce($_POST['tava_product_meta_nonce'], 'tava_save_product_meta')) {
            return;
        }

        // Tránh auto save
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return;
        }

        // Kiểm tra quyền
        if (!current_user_can('edit_post', $post_id)) {
            return;
        }

        // Lưu model
        if (isset($_POST['_product_model'])) {
            update_post_meta($post_id, '_product_model', sanitize_text_field($_POST['_product_model']));
        }

        // Lưu Gallery (chuyển dòng mới thành dấu |)
        if (isset($_POST['_product_gallery'])) {
            $urls = array_filter(array_map('trim', explode("\n", $_POST['_product_gallery'])));
            update_post_meta($post_id, '_product_gallery', implode('|', $urls));
        }

        // Lưu các trường Rich Text (cho phép HTML)
        $fields = [
            '_product_overview',
            '_product_specs',
            '_product_install_info',
            '_product_faq'
        ];

        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                // Sử dụng wp_kses_post để cho phép các tag HTML an toàn (như Bảng, In đậm, Ảnh)
                update_post_meta($post_id, $field, wp_kses_post($_POST[$field]));
            }
        }
    }
}
