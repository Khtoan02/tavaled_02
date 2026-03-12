<div class="wrap">
    <h1>Quản lý Thư viện Dự án Trang chủ</h1>
    <p class="description">Chọn hàng loạt hình ảnh sau đó chỉnh sửa trực tiếp thông tin dự án ở bảng bên dưới và nhấn <b>Lưu Tất Cả</b>. Bạn có thể kéo thả để sắp xếp thứ tự hiển thị ngoài trang chủ.</p>
    
    <div style="margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
        <button type="button" class="button button-primary" id="add_gallery_images">Thêm hình ảnh từ Media</button>
        <button type="button" class="button button-primary" id="save_gallery_images" style="background:#00a32a;border-color:#008a20;color:#fff;">Lưu Tất Cả</button>
        <span id="save_gallery_status" style="font-weight:bold; color:green; transition: opacity 0.3s;"></span>
    </div>

    <table class="wp-list-table widefat fixed striped table-view-list" id="project_gallery_table">
        <thead>
            <tr>
                <th style="width: 50px; text-align: center;">Kéo</th>
                <th style="width: 100px;">Hình ảnh</th>
                <th style="width: 20%;">Tên Hình Ảnh (File)</th>
                <th style="width: 20%;">Tên Dự Án (Hiển thị to)</th>
                <th style="width: 25%;">Mô Tả Dự Án</th>
                <th style="width: 20%;">Giải Pháp</th>
                <th style="width: 60px; text-align: center;">Xóa</th>
            </tr>
        </thead>
        <tbody id="project_gallery_tbody">
            <?php
            $ids = get_option('tavaled_home_projects');
            if (!empty($ids)) {
                $id_array = explode(',', $ids);
                foreach ($id_array as $id) {
                    $post = get_post($id);
                    if (!$post) continue;
                    
                    $url = wp_get_attachment_image_url($id, 'thumbnail');
                    $project_name = get_post_meta($id, '_tavaled_project_name', true);
                    $project_desc = get_post_meta($id, '_tavaled_project_desc', true);
                    $project_solution = get_post_meta($id, '_tavaled_project_solution', true);
                    
                    $solutions = [
                        '' => '-- Không phân loại --',
                        'GIÁO DỤC & TƯƠNG TÁC' => 'GIÁO DỤC & TƯƠNG TÁC',
                        'HỘI HỌP & DOANH NGHIỆP' => 'HỘI HỌP & DOANH NGHIỆP',
                        'SỰ KIỆN & SÂN KHẤU' => 'SỰ KIỆN & SÂN KHẤU',
                        'QUẢNG CÁO & THƯƠNG HIỆU' => 'QUẢNG CÁO & THƯƠNG HIỆU',
                        'F&B & GIẢI TRÍ ĐÊM' => 'F&B & GIẢI TRÍ ĐÊM',
                        'GIẢI TRÍ TẠI GIA' => 'GIẢI TRÍ TẠI GIA',
                    ];
                    ?>
                    <tr data-id="<?php echo esc_attr($id); ?>" class="gallery-row">
                        <td style="cursor: move; font-size: 20px; color: #999; text-align: center; vertical-align: middle;">☰</td>
                        <td style="vertical-align: middle;"><img src="<?php echo esc_url($url); ?>" style="width:80px; height:80px; object-fit:cover; border-radius: 4px;" /></td>
                        <td style="vertical-align: middle;"><input type="text" class="meta-post-title regular-text" style="width:100%;" value="<?php echo esc_attr($post->post_title); ?>" /></td>
                        <td style="vertical-align: middle;"><input type="text" class="meta-project-name regular-text" style="width:100%;" value="<?php echo esc_attr($project_name); ?>" placeholder="VD: Sân khấu Gala" /></td>
                        <td style="vertical-align: middle;"><textarea class="meta-project-desc large-text" rows="3" style="width:100%;"><?php echo esc_textarea($project_desc); ?></textarea></td>
                        <td style="vertical-align: middle;">
                            <select class="meta-project-solution" style="width:100%;">
                                <?php foreach($solutions as $val => $label): ?>
                                    <option value="<?php echo esc_attr($val); ?>" <?php selected($project_solution, $val); ?>><?php echo esc_html($label); ?></option>
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
    $('#project_gallery_tbody').sortable({
        handle: 'td:first-child',
        cursor: 'move',
        axis: 'y'
    });

    var frame;
    $('#add_gallery_images').click(function(e){
        e.preventDefault();
        if (frame) {
            frame.open();
            return;
        }
        frame = wp.media({
            title: 'Hàng Loạt Hình Ảnh Dự Án',
            button: { text: 'Thêm vào bảng' },
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
                if ($('#project_gallery_tbody tr[data-id="'+id+'"]').length === 0) {
                    var html = '<tr data-id="'+id+'" class="gallery-row">' +
                        '<td style="cursor: move; font-size: 20px; color: #999; text-align: center; vertical-align: middle;">☰</td>' +
                        '<td style="vertical-align: middle;"><img src="'+url+'" style="width:80px; height:80px; object-fit:cover; border-radius: 4px;" /></td>' +
                        '<td style="vertical-align: middle;"><input type="text" class="meta-post-title regular-text" style="width:100%;" value="'+title+'" /></td>' +
                        '<td style="vertical-align: middle;"><input type="text" class="meta-project-name regular-text" style="width:100%;" value="" placeholder="VD: Sân khấu Gala" /></td>' +
                        '<td style="vertical-align: middle;"><textarea class="meta-project-desc large-text" rows="3" style="width:100%;"></textarea></td>' +
                        '<td style="vertical-align: middle;">' +
                            '<select class="meta-project-solution" style="width:100%;">' +
                                '<option value="">-- Không phân loại --</option>' +
                                '<option value="GIÁO DỤC & TƯƠNG TÁC">GIÁO DỤC & TƯƠNG TÁC</option>' +
                                '<option value="HỘI HỌP & DOANH NGHIỆP">HỘI HỌP & DOANH NGHIỆP</option>' +
                                '<option value="SỰ KIỆN & SÂN KHẤU">SỰ KIỆN & SÂN KHẤU</option>' +
                                '<option value="QUẢNG CÁO & THƯƠNG HIỆU">QUẢNG CÁO & THƯƠNG HIỆU</option>' +
                                '<option value="F&B & GIẢI TRÍ ĐÊM">F&B & GIẢI TRÍ ĐÊM</option>' +
                                '<option value="GIẢI TRÍ TẠI GIA">GIẢI TRÍ TẠI GIA</option>' +
                            '</select>' +
                        '</td>' +
                        '<td style="text-align: center; vertical-align: middle;"><button type="button" class="button remove-row-btn" style="color:#d63638; border-color:#d63638;">Xóa</button></td>' +
                    '</tr>';
                    $('#project_gallery_tbody').append(html);
                }
            });
        });
        frame.open();
    });

    $(document).on('click', '.remove-row-btn', function(){
        $(this).closest('tr').fadeOut(300, function() { $(this).remove(); });
    });

    $('#save_gallery_images').click(function(e){
        e.preventDefault();
        var $btn = $(this);
        var originalText = $btn.text();
        $btn.text('Đang lưu...').prop('disabled', true);
        
        var $status = $('#save_gallery_status');
        $status.fadeTo(0, 0).text('');

        var ids = [];
        var metadata = {};

        $('#project_gallery_tbody tr.gallery-row').each(function(){
            var id = $(this).data('id');
            ids.push(id);
            metadata[id] = {
                post_title: $(this).find('.meta-post-title').val(),
                project_name: $(this).find('.meta-project-name').val(),
                project_desc: $(this).find('.meta-project-desc').val(),
                project_solution: $(this).find('.meta-project-solution').val()
            };
        });

        $.ajax({
            url: ajaxurl,
            type: 'POST',
            data: {
                action: 'tavaled_save_project_gallery',
                image_ids: ids.join(','),
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
                alert('Có lỗi xảy ra khi lưu bảng.');
            },
            complete: function() {
                $btn.text(originalText).prop('disabled', false);
            }
        });
    });
});
</script>
