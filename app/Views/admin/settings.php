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
                <th scope="row">Hotline</th>
                <td>
                    <input type="text" name="tavaled_phone" value="<?php echo esc_attr(get_option('tavaled_phone')); ?>" class="regular-text" />
                    <p class="description">Số điện thoại Hotline chính.</p>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Email liên hệ</th>
                <td>
                    <input type="email" name="tavaled_email" value="<?php echo esc_attr(get_option('tavaled_email')); ?>" class="regular-text" />
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Danh sách CSKH</th>
                <td>
                    <?php
                    $cskh_val = get_option('tavaled_phone_cskh', '');
                    $cskh_data = json_decode($cskh_val, true);
                    // Tương thích ngược
                    if (!is_array($cskh_data)) {
                        $cskh_data = [];
                        $phones = array_filter(array_map('trim', explode("\n", str_replace(',', "\n", $cskh_val))));
                        foreach($phones as $p) {
                            $cskh_data[] = ['name' => 'CSKH', 'role' => '', 'phone' => $p, 'email' => '', 'avatar' => ''];
                        }
                    }
                    $cskh_json_escaped = esc_attr(json_encode($cskh_data));
                    ?>
                    <input type="hidden" name="tavaled_phone_cskh" id="tavaled_phone_cskh" value="<?php echo $cskh_json_escaped; ?>">
                    <style>
                        #cskh_table .cskh-avatar-cell { width: 80px; text-align: center; }
                        #cskh_table .cskh-avatar-preview { width: 48px; height: 48px; border-radius: 50%; object-fit: cover; border: 2px solid #ddd; cursor: pointer; background: #f0f0f1; display: block; margin: 0 auto 4px; }
                        #cskh_table .cskh-avatar-preview:hover { border-color: #f05a25; }
                        #cskh_table .cskh-avatar-btn { font-size: 11px; cursor: pointer; color: #2271b1; background: none; border: none; padding: 0; text-decoration: underline; }
                        #cskh_table .cskh-avatar-btn:hover { color: #f05a25; }
                        #cskh_table .cskh-avatar-placeholder { width: 48px; height: 48px; border-radius: 50%; background: #f0f0f1; border: 2px dashed #ccc; display: flex; align-items: center; justify-content: center; margin: 0 auto 4px; cursor: pointer; color: #999; font-size: 20px; }
                        #cskh_table .cskh-avatar-placeholder:hover { border-color: #f05a25; color: #f05a25; }
                    </style>
                    <table class="wp-list-table widefat fixed striped" id="cskh_table" style="max-width: 1000px; margin-bottom: 10px;">
                        <thead>
                            <tr>
                                <th class="cskh-avatar-cell">Avatar</th>
                                <th>Tên nhân sự</th>
                                <th>Chức vụ / Vị trí</th>
                                <th>Số điện thoại (Zalo)</th>
                                <th>Email</th>
                                <th style="width: 60px;">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Rows rendered via JS -->
                        </tbody>
                    </table>
                    <button type="button" class="button" id="add_cskh_btn">Thêm nhân sự</button>
                    <p class="description">Quản lý danh sách nhân sự chăm sóc khách hàng. Click vào ô Avatar để chọn ảnh từ Thư viện Media. Dữ liệu này sẽ hiển thị ở Header, Footer và nút chức năng nổi (Floating buttons).</p>
                </td>
            </tr>

            <tr valign="top">
                <th scope="row">Địa chỉ</th>
                <td>
                    <textarea name="tavaled_address" rows="3" class="large-text"><?php echo esc_textarea(get_option('tavaled_address')); ?></textarea>
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

    // CSKH Repeater
    var cskhData = [];
    try {
        var rawData = $('#tavaled_phone_cskh').val();
        if(rawData) cskhData = JSON.parse(rawData);
    } catch(e) {}

    function renderCskhTable() {
        var html = '';
        if(cskhData.length === 0) {
            html = '<tr><td colspan="6">Chưa có nhân sự nào.</td></tr>';
        } else {
            cskhData.forEach(function(item, index) {
                var avatarHtml = '';
                if(item.avatar) {
                    avatarHtml = '<img src="'+item.avatar+'" class="cskh-avatar-preview" data-index="'+index+'" title="Click để đổi ảnh">';
                    avatarHtml += '<button type="button" class="cskh-avatar-btn cskh-remove-avatar" data-index="'+index+'">✕ Xóa ảnh</button>';
                } else {
                    avatarHtml = '<div class="cskh-avatar-placeholder cskh-choose-avatar" data-index="'+index+'" title="Chọn Avatar">+</div>';
                    avatarHtml += '<button type="button" class="cskh-avatar-btn cskh-choose-avatar" data-index="'+index+'">Chọn ảnh</button>';
                }
                html += '<tr>';
                html += '<td class="cskh-avatar-cell">'+avatarHtml+'</td>';
                html += '<td><input type="text" class="cskh-input regular-text" data-field="name" data-index="'+index+'" value="'+(item.name||'')+'" style="width:100%"></td>';
                html += '<td><input type="text" class="cskh-input regular-text" data-field="role" data-index="'+index+'" value="'+(item.role||'')+'" style="width:100%"></td>';
                html += '<td><input type="text" class="cskh-input regular-text" data-field="phone" data-index="'+index+'" value="'+(item.phone||'')+'" style="width:100%"></td>';
                html += '<td><input type="text" class="cskh-input regular-text" data-field="email" data-index="'+index+'" value="'+(item.email||'')+'" style="width:100%"></td>';
                html += '<td><button type="button" class="button remove-cskh" data-index="'+index+'">Xóa</button></td>';
                html += '</tr>';
            });
        }
        $('#cskh_table tbody').html(html);
        $('#tavaled_phone_cskh').val(JSON.stringify(cskhData));
    }

    renderCskhTable();

    $('#add_cskh_btn').click(function(){
        cskhData.push({name: '', role: '', phone: '', email: '', avatar: ''});
        renderCskhTable();
    });

    $(document).on('click', '.remove-cskh', function(){
        var index = $(this).data('index');
        cskhData.splice(index, 1);
        renderCskhTable();
    });

    $(document).on('change keyup', '.cskh-input', function(){
        var index = $(this).data('index');
        var field = $(this).data('field');
        cskhData[index][field] = $(this).val();
        $('#tavaled_phone_cskh').val(JSON.stringify(cskhData));
    });

    // Avatar: Chọn ảnh từ Media Library
    $(document).on('click', '.cskh-choose-avatar, .cskh-avatar-preview', function(e){
        e.preventDefault();
        var index = $(this).data('index');
        var mediaUploader = wp.media({
            title: 'Chọn Avatar cho nhân sự',
            button: { text: 'Sử dụng ảnh này' },
            multiple: false,
            library: { type: 'image' }
        });
        mediaUploader.on('select', function(){
            var attachment = mediaUploader.state().get('selection').first().toJSON();
            // Ưu tiên ảnh nhỏ (thumbnail hoặc medium)
            var avatarUrl = (attachment.sizes && attachment.sizes.thumbnail) ? attachment.sizes.thumbnail.url : attachment.url;
            cskhData[index].avatar = avatarUrl;
            renderCskhTable();
        });
        mediaUploader.open();
    });

    // Avatar: Xóa ảnh
    $(document).on('click', '.cskh-remove-avatar', function(e){
        e.preventDefault();
        var index = $(this).data('index');
        cskhData[index].avatar = '';
        renderCskhTable();
    });





    // Note: The Project Gallery has been moved to a separate Admin page.
});
</script>
