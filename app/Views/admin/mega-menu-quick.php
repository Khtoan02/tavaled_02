<div class="wrap">
    <h1>Cấu hình Mega Menu (Fix cứng)</h1>
    <p class="description">Giao diện này giúp bạn quản lý trực tiếp các menu hiển thị mặc định (Giải pháp trọn gói, Về chúng tôi) mà không cần dùng hệ thống điều hướng của bảng Menu cũ nữa. Kéo thả biểu tượng ☰ để thay đổi thứ tự và nhấn nút <b>Lưu Tất Cả</b>.</p>
    
    <div style="margin-bottom: 20px; display: flex; align-items: center; gap: 10px; margin-top: 15px;">
        <button type="button" class="button button-primary button-large" id="save_mega_menus" style="background:#f05a25;border-color:#f05a25;color:#fff;">Lưu Tất Cả Thay Đổi</button>
        <span id="save_gallery_status" style="font-weight:bold; color:green; transition: opacity 0.3s;"></span>
    </div>


    <!-- GIẢI PHÁP TRỌN GÓI -->
    <h2 style="margin-top: 50px; border-bottom: 2px solid #ccc; padding-bottom: 10px; display: flex; justify-content: space-between;">
        <span>Mega: Giải pháp trọn gói (Có hình ảnh)</span>
        <button type="button" class="button button-secondary" id="add_sol_row" style="font-size: 13px;">+ Thêm dòng mới</button>
    </h2>
    <table class="wp-list-table widefat fixed striped table-view-list">
        <thead>
            <tr>
                <th style="width: 50px; text-align: center;">Kéo</th>
                <th style="width: 120px;">Hình ảnh</th>
                <th style="width: 25%;">Tên Menu</th>
                <th style="width: 25%;">Đường dẫn (Slug)</th>
                <th style="width: 100px; text-align: center;">HOT</th>
                <th style="width: 80px; text-align: center;">Xóa</th>
            </tr>
        </thead>
        <tbody id="sol_tbody">
            <?php if(is_array($data) && !empty($data['solutions'])) foreach ($data['solutions'] as $idx => $item): ?>
            <tr class="sol-row">
                <td style="cursor: move; font-size: 20px; color: #999; text-align: center; vertical-align: middle;">☰</td>
                <td style="vertical-align: middle;">
                    <img src="<?php echo esc_url($item['image']); ?>" class="preview-img" style="width:100px; height:60px; object-fit:cover; border-radius: 4px; display: block; background: #eee; margin-bottom: 5px;" onerror="this.src='https://placehold.co/100x60/eee/999?text=None'" />
                    <input type="hidden" class="meta-image" value="<?php echo esc_attr($item['image']); ?>" />
                    <button type="button" class="button button-small upload-btn">Chọn ảnh</button>
                </td>
                <td style="vertical-align: middle;">
                    <input type="text" class="meta-title regular-text" style="width:100%; font-weight: bold;" value="<?php echo esc_attr($item['title']); ?>" />
                </td>
                <td style="vertical-align: middle;">
                    <input type="text" class="meta-slug regular-text" style="width:100%;" value="<?php echo esc_attr($item['slug']); ?>" />
                </td>
                <td style="text-align: center; vertical-align: middle;">
                    <input type="checkbox" class="meta-hot" value="1" <?php checked($item['is_hot'], '1'); ?> />
                </td>
                <td style="text-align: center; vertical-align: middle;">
                    <button type="button" class="button remove-row-btn" style="color:#d63638; border-color:#d63638;">Xóa</button>
                </td>
            </tr>
            <?php endforeach; ?>
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
    $('#sol_tbody').sortable({ handle: 'td:first-child', cursor: 'move', axis: 'y' });

    // Remove row
    $(document).on('click', '.remove-row-btn', function(){
        $(this).closest('tr').fadeOut(300, function() { $(this).remove(); });
    });

    // Add Solution
    $('#add_sol_row').click(function(e){
        e.preventDefault();
        var html = '<tr class="sol-row">' +
            '<td style="cursor: move; font-size: 20px; color: #999; text-align: center; vertical-align: middle;">☰</td>' +
            '<td style="vertical-align: middle;">' +
                '<img src="" class="preview-img" style="width:100px; height:60px; object-fit:cover; border-radius: 4px; display: block; background: #eee; margin-bottom: 5px;" onerror="this.src=\'https://placehold.co/100x60/eee/999?text=None\'" />' +
                '<input type="hidden" class="meta-image" value="" />' +
                '<button type="button" class="button button-small upload-btn">Chọn ảnh</button>' +
            '</td>' +
            '<td style="vertical-align: middle;"><input type="text" class="meta-title regular-text" style="width:100%; font-weight: bold;" value="Giải pháp mới" /></td>' +
            '<td style="vertical-align: middle;"><input type="text" class="meta-slug regular-text" style="width:100%;" value="/" /></td>' +
            '<td style="text-align: center; vertical-align: middle;"><input type="checkbox" class="meta-hot" value="1" /></td>' +
            '<td style="text-align: center; vertical-align: middle;"><button type="button" class="button remove-row-btn" style="color:#d63638; border-color:#d63638;">Xóa</button></td>' +
        '</tr>';
        $('#sol_tbody').append(html);
    });

    // Media uploader
    var frame;
    $(document).on('click', '.upload-btn', function(e){
        e.preventDefault();
        var $btn = $(this);
        var $input = $btn.siblings('.meta-image');
        var $preview = $btn.siblings('.preview-img');

        if(frame) { frame.open(); frame.tavaledTarget = $input; frame.tavaledPreview = $preview; return; }

        frame = wp.media({ title: 'Chọn hình ảnh đại diện Menu', button: { text: 'Sử dụng ảnh này' }, multiple: false });
        frame.tavaledTarget = $input;
        frame.tavaledPreview = $preview;

        frame.on('select', function() {
            var attachment = frame.state().get('selection').first().toJSON();
            frame.tavaledTarget.val(attachment.url);
            frame.tavaledPreview.attr('src', attachment.url);
        });

        frame.open();
    });

    // Save ALL
    $('#save_mega_menus').click(function(e){
        e.preventDefault();
        var $btn = $(this);
        var originalText = $btn.text();
        $btn.text('Đang lưu...').prop('disabled', true);
        var $status = $('#save_gallery_status');
        $status.fadeTo(0, 0).text('');

        var solArr = [];
        $('#sol_tbody tr.sol-row').each(function(){
            solArr.push({
                title: $(this).find('.meta-title').val(),
                slug: $(this).find('.meta-slug').val(),
                image: $(this).find('.meta-image').val(),
                is_hot: $(this).find('.meta-hot').is(':checked') ? '1' : '0'
            });
        });

        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'tavaled_save_hardcoded_mega_menu',
                solutions: solArr
            },
            success: function(response) {
                if(response.success) {
                    $status.text('✓ ' + response.data).fadeTo(300, 1);
                    setTimeout(function(){ $status.fadeTo(300, 0); }, 3000);
                } else {
                    alert('Lỗi: ' + response.data);
                }
            },
            error: function(){ alert('Lỗi kết nối'); },
            complete: function(){ $btn.text(originalText).prop('disabled', false); }
        });
    });
});
</script>
