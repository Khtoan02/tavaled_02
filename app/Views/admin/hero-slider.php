<div class="wrap">
    <h1>Quản lý Slide Hero Trang chủ</h1>
    <p class="description">Chọn các hình ảnh slide cho phần Hero ở trang chủ, kéo thả để sắp xếp thứ tự và nhấn <b>Lưu Thiết Lập</b>.</p>
    
    <div style="margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
        <button type="button" class="button button-primary" id="add_slider_images">Thêm hình ảnh slide</button>
        <button type="button" class="button button-primary" id="save_slider_images" style="background:#00a32a;border-color:#008a20;color:#fff;">Lưu Thiết Lập</button>
        <span id="save_slider_status" style="font-weight:bold; color:green; transition: opacity 0.3s;"></span>
    </div>

    <table class="wp-list-table widefat fixed striped table-view-list" id="hero_slider_table">
        <thead>
            <tr>
                <th style="width: 50px; text-align: center;">Kéo</th>
                <th style="width: 100px;">Hình ảnh</th>
                <th>Tên file / Alt Text</th>
                <th style="width: 100px; text-align: center;">Xóa</th>
            </tr>
        </thead>
        <tbody id="hero_slider_tbody">
            <?php
            $ids = get_option('tavaled_home_hero_slides');
            if (!empty($ids)) {
                $id_array = explode(',', $ids);
                foreach ($id_array as $id) {
                    $url = wp_get_attachment_image_url($id, 'thumbnail');
                    if (!$url) continue;
                    $alt = get_post_meta($id, '_wp_attachment_image_alt', true) ?: get_the_title($id);
                    ?>
                    <tr data-id="<?php echo esc_attr($id); ?>" class="slider-row">
                        <td style="cursor: move; font-size: 20px; color: #999; text-align: center; vertical-align: middle;">\u2630</td>
                        <td style="vertical-align: middle;"><img src="<?php echo esc_url($url); ?>" style="width:80px; height:80px; object-fit:cover; border-radius: 4px;" /></td>
                        <td style="vertical-align: middle; font-weight: 600;"><?php echo esc_html($alt); ?></td>
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
    // Kích hoạt kéo thả sắp xếp dòng
    $('#hero_slider_tbody').sortable({
        handle: 'td:first-child',
        cursor: 'move',
        axis: 'y'
    });

    var frame;
    $('#add_slider_images').click(function(e){
        e.preventDefault();
        if (frame) {
            frame.open();
            return;
        }
        frame = wp.media({
            title: 'Chọn hình ảnh Slide Hero',
            button: { text: 'Thêm vào slide' },
            multiple: true
        });

        frame.on('select', function() {
            var selection = frame.state().get('selection');
            selection.map(function(attachment) {
                attachment = attachment.toJSON();
                var id = attachment.id;
                var url = attachment.sizes && attachment.sizes.thumbnail ? attachment.sizes.thumbnail.url : attachment.url;
                var alt = attachment.alt || attachment.title || 'Slide';
                
                if ($('#hero_slider_tbody tr[data-id="'+id+'"]').length === 0) {
                    var html = '<tr data-id="'+id+'" class="slider-row">' +
                        '<td style="cursor: move; font-size: 20px; color: #999; text-align: center; vertical-align: middle;">\u2630</td>' +
                        '<td style="vertical-align: middle;"><img src="'+url+'" style="width:80px; height:80px; object-fit:cover; border-radius: 4px;" /></td>' +
                        '<td style="vertical-align: middle; font-weight: 600;">'+alt+'</td>' +
                        '<td style="text-align: center; vertical-align: middle;"><button type="button" class="button remove-row-btn" style="color:#d63638; border-color:#d63638;">Xóa</button></td>' +
                    '</tr>';
                    $('#hero_slider_tbody').append(html);
                }
            });
        });
        frame.open();
    });

    $(document).on('click', '.remove-row-btn', function(){
        $(this).closest('tr').fadeOut(300, function() { $(this).remove(); });
    });

    $('#save_slider_images').click(function(e){
        e.preventDefault();
        var $btn = $(this);
        var originalText = $btn.text();
        $btn.text('Đang lưu...').prop('disabled', true);
        
        var $status = $('#save_slider_status');
        $status.fadeTo(0, 0).text('');

        var ids = [];
        $('#hero_slider_tbody tr.slider-row').each(function(){
            var id = $(this).data('id');
            ids.push(id);
        });

        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'tavaled_save_hero_slider',
                image_ids: ids.join(',')
            },
            success: function(response) {
                if(response.success) {
                    $status.text('✓ Lưu thành công!').fadeTo(300, 1);
                    setTimeout(function(){ $status.fadeTo(300, 0); }, 3000);
                } else {
                    alert('Lỗi: ' + response.data);
                }
            },
            error: function() {
                alert('Có lỗi xảy ra khi lưu thiết lập.');
            },
            complete: function() {
                $btn.text(originalText).prop('disabled', false);
            }
        });
    });
});
</script>
