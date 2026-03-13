<div class="wrap">
    <h1>Cài đặt Dữ liệu Demo</h1>
    <p>Công cụ này giúp bạn nhanh chóng tạo hoặc xóa các sản phẩm ví dụ để kiểm tra giao diện website.</p>

    <?php if (isset($_GET['status'])): ?>
        <div class="updated notice is-dismissible">
            <p>
                <?php 
                if ($_GET['status'] === 'generated') echo 'Đã tạo thành công các sản phẩm ví dụ!';
                if ($_GET['status'] === 'deleted') echo 'Đã xóa tất cả sản phẩm ví dụ!';
                ?>
            </p>
        </div>
    <?php endif; ?>

    <div class="card" style="max-width: 600px; padding: 20px; margin-top: 20px;">
        <h2>Tạo sản phẩm mẫu</h2>
        <p>Hệ thống sẽ tự động tạo các sản phẩm cho 3 ngành hàng: <strong>Màn hình LED</strong>, <strong>Âm thanh</strong>, và <strong>Ánh sáng</strong>.</p>
        <p>Hình ảnh sẽ được lấy từ các link bạn đã cung cấp.</p>
        
        <form method="post">
            <?php wp_nonce_field('tava_demo_data_action'); ?>
            <input type="hidden" name="tava_demo_action" value="generate">
            <?php submit_button('Tạo sản phẩm ví dụ', 'primary', 'submit', false); ?>
        </form>
    </div>

    <div class="card" style="max-width: 600px; padding: 20px; margin-top: 20px; border-left: 4px solid #d63638;">
        <h2 style="color: #d63638;">Xóa dữ liệu mẫu</h2>
        <p>Lưu ý: Hành động này sẽ xóa <strong>tất cả</strong> các sản phẩm được đánh dấu là "demo". Các sản phẩm bạn tự tạo thủ công sẽ không bị ảnh hưởng.</p>
        
        <form method="post" onsubmit="return confirm('Bạn có chắc chắn muốn xóa tất cả sản phẩm ví dụ không?');">
            <?php wp_nonce_field('tava_demo_data_action'); ?>
            <input type="hidden" name="tava_demo_action" value="delete">
            <?php submit_button('Xóa sạch sản phẩm ví dụ', 'delete', 'submit', false, ['style' => 'background: #d63638; border-color: #d63638; color: #fff;']); ?>
        </form>
    </div>
</div>
