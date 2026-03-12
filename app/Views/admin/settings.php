<div class="wrap">
    <h1>Cấu hình Website Doanh Nghiệp</h1>
    
    <?php settings_errors(); ?>

    <form method="post" action="options.php">
        <?php settings_fields('tavaled_settings_group'); ?>
        <?php do_settings_sections('tavaled_settings_group'); ?>

        <table class="form-table">
            <tr valign="top">
                <th scope="row">Tên doanh nghiệp</th>
                <td>
                    <input type="text" name="tavaled_company_name" value="<?php echo esc_attr(get_option('tavaled_company_name')); ?>" class="regular-text" />
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Logo (URL)</th>
                <td>
                    <input type="text" id="tavaled_logo" name="tavaled_logo" value="<?php echo esc_attr(get_option('tavaled_logo')); ?>" class="regular-text" />
                    <button type="button" class="button" id="upload_logo_btn">Tải ảnh lên</button>
                    <div style="margin-top: 10px;">
                        <img id="logo_preview" src="<?php echo esc_url(get_option('tavaled_logo')); ?>" style="max-height: 80px; <?php echo empty(get_option('tavaled_logo')) ? 'display: none;' : ''; ?>" />
                    </div>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Ảnh Mặc định (Fallback)</th>
                <td>
                    <input type="text" id="tavaled_fallback_image" name="tavaled_fallback_image" value="<?php echo esc_attr(get_option('tavaled_fallback_image')); ?>" class="regular-text" />
                    <button type="button" class="button" id="upload_fallback_btn">Tải ảnh lên</button>
                    <p class="description">Hình ảnh này sẽ được hiển thị khi Sản phẩm/Bài viết bị thiếu hoặc lỗi ảnh đại diện (Thumbnail).</p>
                    <div style="margin-top: 10px;">
                        <img id="fallback_preview" src="<?php echo esc_url(get_option('tavaled_fallback_image')); ?>" style="max-height: 80px; <?php echo empty(get_option('tavaled_fallback_image')) ? 'display: none;' : ''; ?>" />
                    </div>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Slogan (Khẩu hiệu)</th>
                <td>
                    <input type="text" name="tavaled_slogan" value="<?php echo esc_attr(get_option('tavaled_slogan')); ?>" class="regular-text" />
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Số điện thoại liên hệ</th>
                <td>
                    <input type="text" name="tavaled_phone" value="<?php echo esc_attr(get_option('tavaled_phone')); ?>" class="regular-text" />
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Email liên hệ</th>
                <td>
                    <input type="email" name="tavaled_email" value="<?php echo esc_attr(get_option('tavaled_email')); ?>" class="regular-text" />
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">SĐT Kinh Doanh</th>
                <td>
                    <input type="text" name="tavaled_phone_kd" value="<?php echo esc_attr(get_option('tavaled_phone_kd')); ?>" class="regular-text" />
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">SĐT CSKH</th>
                <td>
                    <input type="text" name="tavaled_phone_cskh" value="<?php echo esc_attr(get_option('tavaled_phone_cskh')); ?>" class="regular-text" />
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Số Zalo</th>
                <td>
                    <input type="text" name="tavaled_zalo" value="<?php echo esc_attr(get_option('tavaled_zalo')); ?>" class="regular-text" />
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Địa chỉ trụ sở</th>
                <td>
                    <textarea name="tavaled_address" rows="3" class="large-text"><?php echo esc_textarea(get_option('tavaled_address')); ?></textarea>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Văn phòng đại diện</th>
                <td>
                    <textarea name="tavaled_office" rows="3" class="large-text"><?php echo esc_textarea(get_option('tavaled_office')); ?></textarea>
                    <p class="description">Thông tin các văn phòng đại diện (nếu có).</p>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Địa chỉ Showroom</th>
                <td>
                    <textarea name="tavaled_showroom" rows="3" class="large-text"><?php echo esc_textarea(get_option('tavaled_showroom')); ?></textarea>
                    <p class="description">Danh sách các showroom hiển thị ở trang liên hệ hoặc chân trang.</p>
                </td>
            </tr>
        </table>
        
        <?php submit_button('Lưu thiết lập'); ?>
    </form>
</div>

<script>
jQuery(document).ready(function($){
    // Upload Logo
    var mediaUploaderLogo;
    $('#upload_logo_btn').click(function(e) {
        e.preventDefault();
        if (mediaUploaderLogo) {
            mediaUploaderLogo.open();
            return;
        }
        mediaUploaderLogo = wp.media.frames.file_frame = wp.media({
            title: 'Chọn Logo Doanh Nghiệp',
            button: { text: 'Sử dụng ảnh này' },
            multiple: false
        });
        mediaUploaderLogo.on('select', function() {
            var attachment = mediaUploaderLogo.state().get('selection').first().toJSON();
            $('#tavaled_logo').val(attachment.url);
            $('#logo_preview').attr('src', attachment.url).show();
        });
        mediaUploaderLogo.open();
    });

    // Upload Fallback Image
    var mediaUploaderFallback;
    $('#upload_fallback_btn').click(function(e) {
        e.preventDefault();
        if (mediaUploaderFallback) {
            mediaUploaderFallback.open();
            return;
        }
        mediaUploaderFallback = wp.media.frames.file_frame = wp.media({
            title: 'Chọn Ảnh Mặc Định (Fallback)',
            button: { text: 'Sử dụng ảnh này' },
            multiple: false
        });
        mediaUploaderFallback.on('select', function() {
            var attachment = mediaUploaderFallback.state().get('selection').first().toJSON();
            $('#tavaled_fallback_image').val(attachment.url);
            $('#fallback_preview').attr('src', attachment.url).show();
        });
        mediaUploaderFallback.open();
    });



    // Note: The Project Gallery has been moved to a separate Admin page.
});
</script>
