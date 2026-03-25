<?php
namespace App\Controllers\Admin;

class ProductImportController {
    public function register() {
        add_action('admin_menu', [$this, 'add_menu_page']);
        add_action('admin_post_tavaled_import_products', [$this, 'handle_import']);
    }

    public function add_menu_page() {
        add_submenu_page(
            'edit.php?post_type=tava_product', // Parent slug
            'Nhập Sản Phẩm Hàng Loạt', // Page title
            'Nhập sản phẩm', // Menu title
            'manage_options', // Capability
            'tavaled-import-products', // Menu slug
            [$this, 'render_page'] // Callback
        );
    }

    public function render_page() {
        if (!current_user_can('manage_options')) {
            wp_die('Bạn không có quyền truy cập trang này.');
        }

        $success_msg = isset($_GET['import_count']) ? intval($_GET['import_count']) . ' sản phẩm đã được nhập/cập nhật thành công!' : '';
        $error_msg = isset($_GET['import_error']) ? sanitize_text_field($_GET['import_error']) : '';
        ?>
        <div class="wrap" style="max-width: 900px;">
            <h1 class="wp-heading-inline">Nhập Hàng Loạt Sản Phẩm</h1>
            <hr class="wp-header-end">
            
            <?php if ($success_msg) : ?>
                <div class="notice notice-success is-dismissible"><p><strong><?php echo esc_html($success_msg); ?></strong></p></div>
            <?php endif; ?>
            <?php if ($error_msg) : ?>
                <div class="notice notice-error is-dismissible"><p><strong><?php echo esc_html($error_msg); ?></strong></p></div>
            <?php endif; ?>

            <div class="card" style="max-width: 100%; margin-top: 20px;">
                <h2 class="title">Bảng Mẫu (Yêu cầu đúng tên cột)</h2>
                <div style="background: #f9f9f9; padding: 15px; border-radius: 6px; border: 1px solid #ddd; margin-bottom: 20px;">
                    <p style="font-family: monospace; word-break: break-all; color: #d03000; font-size: 14px; margin-top: 0;">nganh_hang, danh_muc_con, ten_san_pham, anh_dai_dien, thu_vien_anh, ma_model, thuong_hieu, mo_ta_ngan, mo_ta_chuyen_sau, thong_so_ky_thuat, thong_tin_lap_dat, faq</p>
                    <hr>
                    <ul style="list-style: disc; margin-left: 20px; color: #555;">
                        <li><strong>nganh_hang:</strong> Danh mục chính (VD: Màn hình LED).</li>
                        <li><strong>danh_muc_con:</strong> (Nhiều danh mục cách nhau <code>|</code>).</li>
                        <li><strong>ten_san_pham:</strong> Tên hiển thị (Nếu trùng sẽ Cập nhật bài cũ).</li>
                        <li><strong>anh_dai_dien:</strong> URL ảnh chính.</li>
                        <li><strong>thu_vien_anh:</strong> URL các ảnh khác, cách nhau bởi <code>|</code>.</li>
                        <li><strong>ma_model:</strong> Mã model (VD: TVC-P3).</li>
                        <li><strong>mo_ta_ngan:</strong> Meta SEO / Đoạn tóm tắt.</li>
                        <li><strong>mo_ta_chuyen_sau, thong_so_ky_thuat, thong_tin_lap_dat, faq:</strong> Chấp nhận mã HTML.</li>
                    </ul>
                </div>

                <form method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="tavaled_import_products">
                    <?php wp_nonce_field('tavaled_import_products_action', 'tavaled_import_products_nonce'); ?>
                    
                    <h2 style="border-bottom: 1px solid #eee; padding-bottom: 10px; margin-top: 30px;">Cách 1: Dán trực tiếp từ Excel / Sheets</h2>
                    <p>Bạn chỉ cần quét chọn các ô trong Excel/Google Sheets rồi Copy, sau đó dán (Paste) thẳng vào khung bên dưới. Hệ thống sẽ tự phân tích tự động (rất khuyên dùng).</p>
                    <table class="form-table">
                        <tbody>
                            <tr>
                                <td>
                                    <textarea name="pasted_data" id="pasted_data" rows="10" style="width: 100%; font-family: monospace;" placeholder="Dán dữ liệu (Paste) từ Excel hoặc Google Sheets vào đây..."></textarea>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <h2 style="border-bottom: 1px solid #eee; padding-bottom: 10px; margin-top: 30px;">Cách 2: Tải file lên</h2>
                    <p>Hệ thống hỗ trợ đọc file <strong>CSV</strong> (ngăn cách bằng dấu phẩy). Tránh tải file .xlsx trực tiếp, hãy xuất ra đuôi .csv trên Excel để đảm bảo không bị lỗi mã hóa.</p>
                    <table class="form-table">
                        <tbody>
                            <tr>
                                <td>
                                    <input type="file" name="import_file" id="import_file" accept=".csv">
                                    <p class="description">Chỉ hỗ trợ file đuôi .csv (Mã hóa UTF-8)</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <p class="submit" style="margin-top: 30px;">
                        <button type="submit" class="button button-primary button-large">Tiến hành Nhập Sản Phẩm</button>
                    </p>
                </form>
            </div>
        </div>
        <?php
    }

    public function handle_import() {
        if (!current_user_can('manage_options') || 
            !isset($_POST['tavaled_import_products_nonce']) || 
            !wp_verify_nonce($_POST['tavaled_import_products_nonce'], 'tavaled_import_products_action')) {
            wp_die('Yêu cầu không hợp lệ.');
        }

        $stream = null;
        $delim = ",";

        // 1. Kiểm tra nếu có dữ liệu dán vào từ Excel (Paste)
        if (!empty($_POST['pasted_data'])) {
            $pasted = wp_unslash($_POST['pasted_data']);
            $stream = fopen('php://memory', 'r+');
            fwrite($stream, $pasted);
            rewind($stream);
            
            // Excel paste usually separates columns with Tabs
            $delim = "\t";
            $first_line = fgets($stream);
            // Fallback to comma if no tab is found but comma exists
            if (strpos($first_line, "\t") === false && strpos($first_line, ",") !== false) {
                $delim = ",";
            }
            rewind($stream);
        } 
        // 2. Kiểm tra nếu có file upload
        elseif (!empty($_FILES['import_file']['tmp_name'])) {
            $file = $_FILES['import_file']['tmp_name'];
            $stream = fopen($file, "r");
            
            $first_line = fgets($stream);
            if (strpos($first_line, ";") !== false && substr_count($first_line, ";") > substr_count($first_line, ",")) {
                $delim = ";";
            }
            rewind($stream);
        } 
        else {
            wp_redirect(admin_url('edit.php?post_type=tava_product&page=tavaled-import-products&import_error=' . urlencode('Vui lòng dán dữ liệu hoặc chọn tệp CSV.')));
            exit;
        }

        if ($stream !== FALSE) {
            $header = fgetcsv($stream, 100000, $delim);
            if (!$header || count($header) < 2) {
                fclose($stream);
                wp_redirect(admin_url('edit.php?post_type=tava_product&page=tavaled-import-products&import_error=' . urlencode('Dữ liệu không đúng định dạng (thiếu cột).')));
                exit;
            }
            
            // Clean up header
            $header = array_map(function($val) {
                // Remove UTF-8 BOM if present
                $val = preg_replace('/\x{FEFF}/u', '', $val);
                return strtolower(trim($val));
            }, $header);

            $count = 0;
            while (($data = fgetcsv($stream, 100000, $delim)) !== FALSE) {
                // Ignore empty rows
                if (count($header) !== count($data)) continue;

                $row = array_combine($header, $data);
                if (empty($row['ten_san_pham'])) {
                    continue;
                }

                $title = sanitize_text_field($row['ten_san_pham']);
                
                // Cập nhật nếu trùng
                $existing_post = get_page_by_title($title, OBJECT, 'tava_product');
                
                $post_content = isset($row['mo_ta_chuyen_sau']) ? wp_kses_post($row['mo_ta_chuyen_sau']) : '';
                
                $post_data = [
                    'post_title'   => $title,
                    'post_type'    => 'tava_product',
                    'post_status'  => 'publish',
                    'post_content' => $post_content,
                ];

                if ($existing_post) {
                    $post_data['ID'] = $existing_post->ID;
                    $post_id = wp_update_post($post_data);
                } else {
                    $post_id = wp_insert_post($post_data);
                }

                if (!is_wp_error($post_id) && $post_id > 0) {
                    // Update Meta
                    if (isset($row['ma_model'])) {
                        update_post_meta($post_id, '_product_model', sanitize_text_field($row['ma_model']));
                    }
                    if (isset($row['anh_dai_dien'])) {
                        update_post_meta($post_id, '_product_img', esc_url_raw($row['anh_dai_dien']));
                    }
                    if (isset($row['thu_vien_anh'])) {
                        update_post_meta($post_id, '_product_gallery', sanitize_text_field($row['thu_vien_anh']));
                    }
                    
                    if (isset($row['mo_ta_ngan'])) {
                        update_post_meta($post_id, '_product_overview', wp_kses_post($row['mo_ta_ngan']));
                        update_post_meta($post_id, '_yoast_wpseo_metadesc', wp_strip_all_tags($row['mo_ta_ngan']));
                    }
                    
                    if (isset($row['thong_so_ky_thuat'])) {
                        update_post_meta($post_id, '_product_specs', wp_kses_post($row['thong_so_ky_thuat']));
                    }
                    if (isset($row['thong_tin_lap_dat'])) {
                        update_post_meta($post_id, '_product_install_info', wp_kses_post($row['thong_tin_lap_dat']));
                    }
                    if (isset($row['faq'])) {
                        update_post_meta($post_id, '_product_faq', wp_kses_post($row['faq']));
                    }

                    // Handle Taxonomies
                    $this->assign_category($post_id, 'product_cat', $row['nganh_hang'] ?? '');
                    $this->assign_multiple_terms($post_id, 'product_subcat', $row['danh_muc_con'] ?? '');
                    $this->assign_category($post_id, 'product_brand', $row['thuong_hieu'] ?? '');

                    $count++;
                }
            }
            fclose($stream);

            wp_redirect(admin_url('edit.php?post_type=tava_product&page=tavaled-import-products&import_count=' . $count));
            exit;
        } else {
            wp_redirect(admin_url('edit.php?post_type=tava_product&page=tavaled-import-products&import_error=' . urlencode('Lỗi đọc dữ liệu.')));
            exit;
        }
    }

    private function assign_category($post_id, $taxonomy, $term_name) {
        $term_name = sanitize_text_field(trim($term_name));
        if (empty($term_name)) return;
        
        $term = term_exists($term_name, $taxonomy);
        if (!$term) {
            $term = wp_insert_term($term_name, $taxonomy);
        }
        
        if (!is_wp_error($term)) {
            $term_id = is_array($term) ? $term['term_id'] : $term;
            wp_set_object_terms($post_id, intval($term_id), $taxonomy, false);
        }
    }

    private function assign_multiple_terms($post_id, $taxonomy, $terms_string) {
        $terms = explode('|', $terms_string);
        $term_ids = [];
        foreach ($terms as $t) {
            $t = sanitize_text_field(trim($t));
            if (empty($t)) continue;
            
            $term = term_exists($t, $taxonomy);
            if (!$term) {
                $term = wp_insert_term($t, $taxonomy);
            }
            if (!is_wp_error($term)) {
                $term_ids[] = intval(is_array($term) ? $term['term_id'] : $term);
            }
        }
        if (!empty($term_ids)) {
            wp_set_object_terms($post_id, $term_ids, $taxonomy, false);
        }
    }
}
