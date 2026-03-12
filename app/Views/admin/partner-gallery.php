<div class="wrap">
    <h1>Quản lý Danh Sách Đối Tác</h1>
    <p class="description">Chọn hàng loạt biểu tượng đối tác từ thư viện, sau đó chỉnh sửa tên, mô tả và cấp độ hiển thị (Cấp 1: Lớn, Cấp 2: Vừa, Cấp 3: Nhỏ). Nhấn <b>Lưu Tất Cả</b> để áp dụng lên Map.</p>
    
    <div style="margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
        <button type="button" class="button button-primary" id="add_partner_images">Thêm biểu tượng từ Media</button>
        <button type="button" class="button button-primary" id="save_partner_images" style="background:#00a32a;border-color:#008a20;color:#fff;">Lưu Tất Cả</button>
        <span id="save_partner_status" style="font-weight:bold; color:green; transition: opacity 0.3s;"></span>
    </div>

    <table class="wp-list-table widefat fixed striped table-view-list" id="partner_gallery_table">
        <thead>
            <tr>
                <th style="width: 50px; text-align: center;">Kéo</th>
                <th style="width: 100px;">Biểu tượng</th>
                <th style="width: 25%;">Tên Đối Tác</th>
                <th style="width: 35%;">Mô Tả / Triết lý chung</th>
                <th style="width: 15%;">Cấp Độ (Kích Thước Mạng Lưới)</th>
                <th style="width: 60px; text-align: center;">Xóa</th>
            </tr>
        </thead>
        <tbody id="partner_gallery_tbody">
            <?php
            $ids = get_option('tavaled_partners_list');
            if (!empty($ids)) {
                $id_array = explode(',', $ids);
                foreach ($id_array as $id) {
                    $post = get_post($id);
                    if (!$post) continue;
                    
                    $url = wp_get_attachment_image_url($id, 'thumbnail');
                    $partner_desc = get_post_meta($id, '_tavaled_partner_desc', true);
                    $partner_level = get_post_meta($id, '_tavaled_partner_level', true);
                    
                    $levels = [
                        'lg' => '1. Lớn (Nổi bật nhất)',
                        'md' => '2. Vừa',
                        'sm' => '3. Nhỏ',
                    ];
                    if (!$partner_level) $partner_level = 'sm';
                    ?>
                    <tr data-id="<?php echo esc_attr($id); ?>" class="partner-row">
                        <td style="cursor: move; font-size: 20px; color: #999; text-align: center; vertical-align: middle;">☰</td>
                        <td style="vertical-align: middle;"><img src="<?php echo esc_url($url); ?>" style="width:60px; height:60px; object-fit:contain; border-radius: 4px; border: 1px solid #ccc;" /></td>
                        <td style="vertical-align: middle;"><input type="text" class="meta-post-title regular-text" style="width:100%;" value="<?php echo esc_attr($post->post_title); ?>" placeholder="VD: Đài Truyền Hình VTV" /></td>
                        <td style="vertical-align: middle;"><input type="text" class="meta-partner-desc regular-text" style="width:100%;" value="<?php echo esc_attr($partner_desc); ?>" placeholder="VD: Đối tác chiến lược phát sóng..." /></td>
                        <td style="vertical-align: middle;">
                            <select class="meta-partner-level" style="width:100%;">
                                <?php foreach($levels as $val => $label): ?>
                                    <option value="<?php echo esc_attr($val); ?>" <?php selected($partner_level, $val); ?>><?php echo esc_html($label); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                        <td style="text-align: center; vertical-align: middle;"><button type="button" class="button remove-row-btn" style="color:#d63638; border-color:#d63638;">Xóa</button></td>
                    </tr>
                    <?php
                }
            }
            ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
<style>
.ui-sortable-helper { display: table; background: #fff; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
</style>
<script>
jQuery(document).ready(function($){
    // Sortable
    $('#partner_gallery_tbody').sortable({
        handle: 'td:first-child',
        cursor: 'move',
        axis: 'y'
    });

    var frame;
    $('#add_partner_images').click(function(e){
        e.preventDefault();
        if (frame) {
            frame.open();
            return;
        }
        frame = wp.media({
            title: 'Hàng Loạt Biểu Tượng Đối Tác',
            button: { text: 'Thêm vào bảng đối tác' },
            multiple: true
        });

        frame.on('select', function() {
            var selection = frame.state().get('selection');
            selection.map(function(attachment) {
                attachment = attachment.toJSON();
                var id = attachment.id;
                var url = attachment.sizes && attachment.sizes.thumbnail ? attachment.sizes.thumbnail.url : attachment.url;
                var title = attachment.title || '';
                
                // Add row if not exists
                if ($('#partner_gallery_tbody tr[data-id="'+id+'"]').length === 0) {
                    var html = '<tr data-id="'+id+'" class="partner-row">' +
                        '<td style="cursor: move; font-size: 20px; color: #999; text-align: center; vertical-align: middle;">☰</td>' +
                        '<td style="vertical-align: middle;"><img src="'+url+'" style="width:60px; height:60px; object-fit:contain; border-radius: 4px; border: 1px solid #ccc;" /></td>' +
                        '<td style="vertical-align: middle;"><input type="text" class="meta-post-title regular-text" style="width:100%;" value="'+title+'" placeholder="VD: Đài Truyền Hình VTV" /></td>' +
                        '<td style="vertical-align: middle;"><input type="text" class="meta-partner-desc regular-text" style="width:100%;" value="" placeholder="VD: Đối tác chiến lược phát sóng..." /></td>' +
                        '<td style="vertical-align: middle;">' +
                            '<select class="meta-partner-level" style="width:100%;">' +
                                '<option value="lg">1. Lớn (Nổi bật nhất)</option>' +
                                '<option value="md">2. Vừa</option>' +
                                '<option value="sm" selected>3. Nhỏ</option>' +
                            '</select>' +
                        '</td>' +
                        '<td style="text-align: center; vertical-align: middle;"><button type="button" class="button remove-row-btn" style="color:#d63638; border-color:#d63638;">Xóa</button></td>' +
                    '</tr>';
                    $('#partner_gallery_tbody').append(html);
                }
            });
        });
        frame.open();
    });

    $(document).on('click', '.remove-row-btn', function(){
        $(this).closest('tr').fadeOut(300, function() { $(this).remove(); });
    });

    $('#save_partner_images').click(function(e){
        e.preventDefault();
        var $btn = $(this);
        var originalText = $btn.text();
        $btn.text('Đang lưu...').prop('disabled', true);
        
        var $status = $('#save_partner_status');
        $status.fadeTo(0, 0).text('');

        var ids = [];
        var metadata = {};

        $('#partner_gallery_tbody tr.partner-row').each(function(){
            var id = $(this).data('id');
            ids.push(id);
            metadata[id] = {
                post_title: $(this).find('.meta-post-title').val(),
                partner_desc: $(this).find('.meta-partner-desc').val(),
                partner_level: $(this).find('.meta-partner-level').val()
            };
        });

        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'tavaled_save_partner_gallery',
                partner_ids: ids.join(','),
                metadata: metadata
            },
            success: function(response) {
                if(response.success) {
                    $status.text('✓ Đã lưu thành công!').fadeTo(300, 1);
                    setTimeout(function(){ $status.fadeTo(300, 0); }, 3000);
                } else {
                    alert('Lỗi: ' + response.data);
                }
            },
            error: function() {
                alert('Có lỗi xảy ra khi lưu bảng đối tác.');
            },
            complete: function() {
                $btn.text(originalText).prop('disabled', false);
            }
        });
    });
});
</script>
