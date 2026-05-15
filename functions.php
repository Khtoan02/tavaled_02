<?php
/**
 * Theme Functions
 */

if (!defined('ABSPATH')) {
    exit;
}

// Define Constants
define('TAVALED_DIR', get_template_directory());
define('TAVALED_URI', get_template_directory_uri());

// Autoloader for MVC
spl_autoload_register(function ($class) {
    // Only handle our theme namespace "App\"
    $prefix = 'App\\';
    $base_dir = TAVALED_DIR . '/app/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

// Setup Theme
function tavaled_theme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus([
        'primary' => __('Primary Menu', 'tavaled02'),
        'mega_about' => __('Mega: Về chúng tôi', 'tavaled02'),
        'mega_solutions' => __('Mega: Giải pháp trọn gói', 'tavaled02'),
    ]);
}
add_action('after_setup_theme', 'tavaled_theme_setup');

// Enqueue styles and scripts
function tavaled_enqueue_scripts()
{
    // Preconnect removed as we use system fonts

    // Sử dụng bộ font hệ thống mặc định của WordPress (System Fonts)
    // Không tải font bên ngoài để đảm bảo nét chữ Việt hoá hiển thị hoàn toàn tự nhiên trên thiết bị

    // Tailwind compiled CSS
    wp_enqueue_style('tavaled-tailwind', TAVALED_URI . '/assets/css/tailwind-output.css', [], time());

    wp_enqueue_style('tavaled-style', get_stylesheet_uri(), [], time());
    wp_enqueue_style('tavaled-main-css', TAVALED_URI . '/assets/css/main.css', [], time());
    wp_enqueue_script('tavaled-main-js', TAVALED_URI . '/assets/js/main.js', ['jquery'], time(), true);

    if (is_front_page() || is_page_template('templates/template-homepage.php') || is_page_template('templates/template-products.php') || is_post_type_archive('tava_product') || is_tax('product_cat') || is_tax('product_industry')) {
        wp_enqueue_style('tavaled-homepage-css', TAVALED_URI . '/assets/css/homepage.css', [], time());
        wp_enqueue_script('tavaled-homepage-js', TAVALED_URI . '/assets/js/homepage.js', ['jquery'], time(), true);
    }
}
add_action('wp_enqueue_scripts', 'tavaled_enqueue_scripts');

/**
 * Global helper to render views
 */
function view($view_name, $data = [])
{
    extract($data);
    $view_file = TAVALED_DIR . '/app/Views/' . $view_name . '.php';
    if (file_exists($view_file)) {
        include $view_file;
    } else {
        echo "View {$view_name} not found!";
    }
}

/**
 * Initialize Admin Settings
 */
if (is_admin()) {
    $settings = new \App\Controllers\Admin\SettingsController();
    $settings->register();

    // Đăng ký Page Templates từ folder /templates
    $templates = new \App\Controllers\TemplateController();
    $templates->register();

    $media_admin = new \App\Controllers\Admin\MediaController();
    $media_admin->register();

    $project_gallery_admin = new \App\Controllers\Admin\ProjectGalleryController();
    $project_gallery_admin->register();

    $partner_gallery_admin = new \App\Controllers\Admin\PartnerGalleryController();
    $partner_gallery_admin->register();

    $demo_data_admin = new \App\Controllers\Admin\DemoDataController();
    $demo_data_admin->register();

    $page_setup_admin = new \App\Controllers\Admin\PageSetupController();
    $page_setup_admin->register();

    $menu_settings_admin = new \App\Controllers\Admin\MenuSettingsController();
    $menu_settings_admin->register();

    $menu_mega_img_admin = new \App\Controllers\Admin\MegaMenuManagerController();
    $menu_mega_img_admin->register();

    $product_import_admin = new \App\Controllers\Admin\ProductImportController();
    $product_import_admin->register();
}

// Gọi đăng ký Custom Post Type 'sản phẩm' (sẽ chạy hook 'init')
$product_setup = new \App\Controllers\ProductSetupController();
$product_setup->register();

// Tự động vô hiệu hoá custom Sitemap & Schema nếu user cài RankMath / Yoast SEO
// Để tránh xung đột (Conflict) và nhường quyền cho Plugin chuyên dụng xử lý
if (!class_exists('RankMath') && !defined('WPSEO_VERSION')) {
    // Đăng ký Custom XML Sitemaps nội bộ
    $sitemap_setup = new \App\Controllers\SitemapController();
    $sitemap_setup->register();

    // Đăng ký Cấu trúc chuẩn Google Schema JSON-LD
    $seo_schema_setup = new \App\Controllers\SeoSchemaController();
    $seo_schema_setup->register();
}

/**
 * Xoá bộ nhớ đệm (Cache) của Rank Math để ép nhận diện và làm mới Sitemap Index
 */
delete_transient('rank_math_accessible_post_types');
delete_transient('rank_math_accessible_taxonomies');
global $wpdb;
$wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_rank_math_sitemap_%'");
$wpdb->query("DELETE FROM {$wpdb->options} WHERE option_name LIKE '_transient_timeout_rank_math_sitemap_%'");

/**
 * Tự động bật cấu hình Sitemap của Rank Math cho tava_product và product_cat
 */
if (class_exists('RankMath')) {
    $rm_sitemap_opts = get_option('rank-math-options-sitemap');
    $needs_update = false;

    if (is_array($rm_sitemap_opts)) {
        if (empty($rm_sitemap_opts['pt_tava_product_sitemap']) || $rm_sitemap_opts['pt_tava_product_sitemap'] !== 'on') {
            $rm_sitemap_opts['pt_tava_product_sitemap'] = 'on';
            $needs_update = true;
        }
        if (empty($rm_sitemap_opts['tax_product_cat_sitemap']) || $rm_sitemap_opts['tax_product_cat_sitemap'] !== 'on') {
            $rm_sitemap_opts['tax_product_cat_sitemap'] = 'on';
            $needs_update = true;
        }
        if (empty($rm_sitemap_opts['tax_product_industry_sitemap']) || $rm_sitemap_opts['tax_product_industry_sitemap'] !== 'on') {
            $rm_sitemap_opts['tax_product_industry_sitemap'] = 'on';
            $needs_update = true;
        }
        if ($needs_update) {
            update_option('rank-math-options-sitemap', $rm_sitemap_opts);
        }
    }
}

/**
 * Xoá bỏ tiền tố (base slug) cho taxonomy product_cat và product_subcat
 * Biến URL từ /danh-muc/man-hinh-led thành /man-hinh-led
 */
add_filter('term_link', function ($url, $term, $taxonomy) {
    if ($taxonomy === 'product_cat') {
        return home_url('/' . $term->slug . '/');
    }
    return $url;
}, 10, 3);

add_filter('generate_rewrite_rules', function ($wp_rewrite) {
    $rules = [];
    $terms = get_terms([
        'taxonomy' => ['product_cat'],
        'hide_empty' => false,
    ]);

    if (!is_wp_error($terms) && !empty($terms)) {
        foreach ($terms as $term) {
            // Quy tắc cho trang danh mục
            $rules['^' . $term->slug . '/?$'] = 'index.php?' . $term->taxonomy . '=' . $term->slug;
            $rules['^' . $term->slug . '/page/?([0-9]{1,})/?$'] = 'index.php?' . $term->taxonomy . '=' . $term->slug . '&paged=$matches[1]';

            // Quy tắc cho trang chi tiết sản phẩm nằm trong danh mục (chỉ áp dụng cho Ngành hàng hoặc Danh mục cấp 1 để URL không quá sâu)
            // Ví dụ: /man-hinh-led/ten-san-pham/
            if ($term->taxonomy === 'product_cat') {
                $rules['^' . $term->slug . '/([^/]+)/?$'] = 'index.php?post_type=tava_product&name=$matches[1]';
            }
        }
    }
    $wp_rewrite->rules = $rules + $wp_rewrite->rules;
});

// Tự động Flush Rewrite Rules khi người dùng thêm/sửa/xoá Danh mục để tránh lỗi 404
add_action('created_product_cat', 'flush_rewrite_rules');
add_action('edited_product_cat', 'flush_rewrite_rules');
add_action('delete_product_cat', 'flush_rewrite_rules');

/**
 * Replace /san-pham/ tag with the actual term slug in product URLs
 * Converts /san-pham/ten-sp/ to /man-hinh-led/ten-sp/
 */
add_filter('post_type_link', function ($post_link, $post) {
    if (is_object($post) && $post->post_type == 'tava_product') {
        $cat_terms = wp_get_object_terms($post->ID, 'product_cat');
        if (!is_wp_error($cat_terms) && !empty($cat_terms) && is_object($cat_terms[0])) {
            return str_replace('/san-pham/', '/' . $cat_terms[0]->slug . '/', $post_link);
        }
    }
    return $post_link;
}, 10, 2);


/**
 * Add Favicon from Theme Settings
 */
function tavaled_add_favicon()
{
    $logo = \App\Helpers\ThemeHelper::getOption('logo');
    if ($logo) {
        echo '<link rel="icon" href="' . esc_url($logo) . '" sizes="32x32" />' . "\n";
        echo '<link rel="apple-touch-icon" href="' . esc_url($logo) . '" />' . "\n";
    }
}
add_action('wp_head', 'tavaled_add_favicon');

/**
 * Add Floating Contacts to Footer
 */
function tavaled_floating_contacts()
{
    $main_phone = \App\Helpers\ThemeHelper::getOption('phone', '0934 29 8181');
    $cskh_val = \App\Helpers\ThemeHelper::getOption('phone_cskh', '');
    $cskh_data = json_decode($cskh_val, true);
    if (!is_array($cskh_data)) {
        $cskh_data = [];
        $phones = array_filter(array_map('trim', explode("\n", str_replace(',', "\n", $cskh_val))));
        foreach ($phones as $p) {
            $cskh_data[] = ['name' => 'CSKH', 'role' => '', 'phone' => $p, 'email' => ''];
        }
    }
    $first_cskh = !empty($cskh_data) ? $cskh_data[0]['phone'] : null;

    if (!$main_phone && !$first_cskh)
        return;
    ?>
    <div class="floating-contact-wrapper fixed bottom-6 right-6 z-50 flex flex-col items-end gap-3">
        <?php if ($main_phone): ?>
            <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $main_phone)); ?>"
                class="floating-btn phone-kd-btn group relative flex items-center justify-center w-14 h-14 bg-red-600 text-white rounded-full shadow-lg hover:bg-red-700 hover:scale-110 transition duration-300">
                <span class="absolute inline-flex h-full w-full rounded-full bg-red-500 opacity-75 animate-ping"
                    style="animation-duration: 1.5s;"></span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 relative z-10" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
                <span
                    class="absolute right-full mr-4 bg-white text-gray-800 text-sm font-semibold px-3 py-1 rounded-lg opacity-0 group-hover:opacity-100 transition duration-300 whitespace-nowrap shadow-md pointer-events-none">Hotline:
                    <?php echo esc_html($main_phone); ?></span>
            </a>
        <?php endif; ?>

        <?php if (!empty($cskh_data)): ?>
            <style>
                .tav-float-wrap:hover .tav-float-dropdown {
                    opacity: 1 !important;
                    visibility: visible !important;
                    transform: translateX(0) !important;
                }
            </style>
            <div class="relative tav-float-wrap flex items-center">
                <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $first_cskh)); ?>"
                    class="floating-btn phone-cskh-btn relative flex items-center justify-center w-14 h-14 bg-orange-500 text-white rounded-full shadow-lg hover:bg-orange-600 hover:scale-110 transition duration-300">
                    <span class="absolute inline-flex h-full w-full rounded-full bg-orange-400 opacity-75 animate-ping"
                        style="animation-duration: 1.5s; animation-delay: 0.5s;"></span>
                    <i class="ph-fill ph-headset text-2xl relative z-10"></i>
                </a>

                <!-- Dropdown cho nút Floating -->
                <div class="tav-float-dropdown absolute right-full bottom-0 mr-4 rounded-2xl opacity-0 invisible transition-all duration-300 z-50 overflow-hidden transform translate-x-4 w-[350px]"
                    style="background: rgba(255,255,255,0.82); backdrop-filter: blur(20px); -webkit-backdrop-filter: blur(20px); border: 1px solid rgba(255,255,255,0.6); box-shadow: 0 20px 60px -15px rgba(0,0,0,0.25);">
                    <div class="px-5 py-3.5 flex items-center gap-2.5" style="border-bottom: 1px solid rgba(0,0,0,0.06);">
                        <div class="w-8 h-8 rounded-lg flex items-center justify-center" style="background: rgba(240,90,37,0.12);">
                            <i class="ph-fill ph-headset text-brand-orange text-base"></i>
                        </div>
                        <span class="font-bold text-gray-800 text-[14px]">KD &amp; CSKH</span>
                    </div>
                    <ul class="max-h-[480px] overflow-y-auto p-3 space-y-2" style="scrollbar-width: thin;">
                        <?php foreach ($cskh_data as $cskh_item):
                            $c_tel = preg_replace('/[^0-9+]/', '', $cskh_item['phone']);
                        ?>
                        <li class="rounded-xl overflow-hidden" style="background: rgba(255,255,255,0.6); border: 1px solid rgba(0,0,0,0.05); transition: all 0.2s;" onmouseenter="this.style.background='rgba(255,255,255,0.95)';this.style.borderColor='rgba(240,90,37,0.25)';this.style.boxShadow='0 4px 20px rgba(240,90,37,0.08)'" onmouseleave="this.style.background='rgba(255,255,255,0.6)';this.style.borderColor='rgba(0,0,0,0.05)';this.style.boxShadow='none'">
                            <div class="p-3.5">
                                <div class="flex items-center gap-3">
                                    <?php if (!empty($cskh_item['avatar'])): ?>
                                        <img src="<?php echo esc_url($cskh_item['avatar']); ?>" alt="<?php echo esc_attr($cskh_item['name']); ?>" class="w-11 h-11 rounded-full object-cover shrink-0 ring-2 ring-white shadow-md">
                                    <?php else: ?>
                                        <div class="w-11 h-11 rounded-full flex items-center justify-center shrink-0 shadow-md text-white" style="background: linear-gradient(135deg, #fdba74, #f97316);">
                                            <i class="ph-fill ph-user text-xl"></i>
                                        </div>
                                    <?php endif; ?>
                                    <div class="flex-1 min-w-0">
                                        <div class="font-bold text-gray-900 text-[14px] leading-tight truncate"><?php echo esc_html($cskh_item['name'] ?: 'Nhân viên'); ?></div>
                                        <?php if (!empty($cskh_item['role'])): ?>
                                            <div class="text-[10px] font-semibold text-brand-orange uppercase tracking-wider mt-0.5 truncate"><?php echo esc_html($cskh_item['role']); ?></div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="mt-3 pt-2.5 flex items-center gap-2" style="border-top: 1px dashed rgba(0,0,0,0.07);">
                                    <a href="tel:<?php echo esc_attr($c_tel); ?>" class="flex-1 flex items-center justify-center gap-1.5 h-[34px] text-gray-600 text-[12px] font-bold rounded-lg transition-all hover:bg-brand-orange hover:text-white hover:border-brand-orange" style="background: rgba(0,0,0,0.03); border: 1px solid rgba(0,0,0,0.06);">
                                        <i class="ph-fill ph-phone-call text-[13px]"></i> Gọi điện
                                    </a>
                                    <a href="https://zalo.me/<?php echo esc_attr($c_tel); ?>" target="_blank" class="flex-1 flex items-center justify-center gap-1.5 h-[34px] text-[#0068ff] text-[12px] font-bold rounded-lg transition-all hover:bg-[#0068ff] hover:text-white hover:border-[#0068ff]" style="background: rgba(0,104,255,0.05); border: 1px solid rgba(0,104,255,0.1);">
                                        ZALO
                                    </a>
                                    <?php if (!empty($cskh_item['email'])): ?>
                                    <a href="mailto:<?php echo esc_attr($cskh_item['email']); ?>" class="flex items-center justify-center w-[34px] h-[34px] text-gray-400 rounded-lg transition-all hover:bg-gray-700 hover:text-white hover:border-gray-700" style="background: rgba(0,0,0,0.03); border: 1px solid rgba(0,0,0,0.06);" title="<?php echo esc_attr($cskh_item['email']); ?>">
                                        <i class="ph-fill ph-envelope-simple text-[14px]"></i>
                                    </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>

        <?php if ($main_phone): ?>
            <a href="https://zalo.me/<?php echo esc_attr(preg_replace('/[^0-9]/', '', $main_phone)); ?>" target="_blank"
                class="floating-btn zalo-btn group relative flex items-center justify-center w-14 h-14 bg-white rounded-full shadow-lg hover:bg-gray-50 hover:scale-110 transition duration-300">
                <span class="absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75 animate-ping"
                    style="animation-duration: 1.5s; animation-delay: 1s;"></span>
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/91/Icon_of_Zalo.svg/1280px-Icon_of_Zalo.svg.png"
                    alt="Zalo" class="w-10 h-10 relative z-10" style="object-fit: contain;">
                <span
                    class="absolute right-full mr-4 bg-white text-gray-800 text-sm font-semibold px-3 py-1 rounded-lg opacity-0 group-hover:opacity-100 transition duration-300 whitespace-nowrap shadow-md pointer-events-none">Zalo:
                    <?php echo esc_html($main_phone); ?></span>
            </a>
        <?php endif; ?>
    </div>
    <?php
}
add_action('wp_footer', 'tavaled_floating_contacts', 100);

/**
 * Custom Order for tava_product to push menu_order=0 to the end
 */
function tavaled_custom_product_order($orderby, $query)
{
    if ($query->get('post_type') === 'tava_product' && !is_admin()) {
        $orderbacks = $query->get('orderby');
        if (is_array($orderbacks) && isset($orderbacks['menu_order'])) {
            global $wpdb;
            return "{$wpdb->posts}.menu_order = 0, {$wpdb->posts}.menu_order ASC, {$wpdb->posts}.post_date DESC";
        }
    }
    return $orderby;
}
add_filter('posts_orderby', 'tavaled_custom_product_order', 10, 2);

/**
 * Reverse sort order for tava_product in Admin (Product Management)
 */
function tavaled_reverse_admin_product_order($query)
{
    if (is_admin() && $query->is_main_query() && $query->get('post_type') === 'tava_product') {
        $order = $query->get('order') ?: 'DESC';
        $new_order = (strtoupper($order) === 'ASC') ? 'DESC' : 'ASC';

        $query->set('orderby', 'date');
        $query->set('order', $new_order);
    }
}
add_action('pre_get_posts', 'tavaled_reverse_admin_product_order');

/**
 * Add Category and Tag support to Pages
 * This allows Pages to be mixed with Posts in category-based queries (like the Projects template).
 */
function tavaled_add_taxonomies_to_pages()
{
    register_taxonomy_for_object_type('category', 'page');
    register_taxonomy_for_object_type('post_tag', 'page');
}
add_action('init', 'tavaled_add_taxonomies_to_pages');

/**
 * Thêm trình soạn thảo (Rich Text Editor chuẩn như phần viết bài) cho mô tả danh mục product_cat
 */
add_action('admin_enqueue_scripts', function($hook) {
    if ($hook === 'edit-tags.php' || $hook === 'term.php') {
        $screen = get_current_screen();
        if ($screen && $screen->id === 'edit-product_cat') {
            wp_enqueue_media();
            wp_enqueue_editor();
        }
    }
});

// Ẩn textarea mặc định của WordPress để thay bằng wp_editor
add_action('admin_head', function() {
    $screen = get_current_screen();
    if ($screen && $screen->id === 'edit-product_cat') {
        echo '<style>.term-description-wrap { display:none !important; }</style>';
    }
});

// Giao diện Thêm mới (Add New)
add_action('product_cat_add_form_fields', function() {
    ?>
    <div class="form-field">
        <label for="cat_description">Mô tả chi tiết (Chuẩn SEO)</label>
        <?php
        wp_editor('', 'cat_description', array(
            'textarea_name' => 'description', // Giữ nguyên name để WP tự lưu
            'textarea_rows' => 10,
            'media_buttons' => true,
            'tinymce' => true,
            'quicktags' => true
        ));
        ?>
    </div>
    <script>
    jQuery(document).ready(function($) {
        // Cập nhật nội dung TinyMCE vào textarea trước khi submit AJAX
        $('#addtag').on('submit', function() {
            if (typeof tinyMCE !== 'undefined') {
                tinyMCE.triggerSave();
            }
        });

        // Xoá nội dung Editor sau khi Thêm mới thành công
        $(document).ajaxComplete(function(event, xhr, settings) {
            if (settings.data && settings.data.includes('action=add-tag') && settings.data.includes('taxonomy=product_cat')) {
                if (typeof tinyMCE !== 'undefined' && tinyMCE.get('cat_description')) {
                    tinyMCE.get('cat_description').setContent('');
                }
            }
        });
    });
    </script>
    <?php
});

// Giao diện Chỉnh sửa (Edit)
add_action('product_cat_edit_form_fields', function($term) {
    ?>
    <tr class="form-field">
        <th scope="row"><label for="cat_description">Mô tả chi tiết (Chuẩn SEO)</label></th>
        <td>
            <?php
            wp_editor(htmlspecialchars_decode($term->description), 'cat_description', array(
                'textarea_name' => 'description',
                'textarea_rows' => 15,
                'media_buttons' => true,
                'tinymce' => true,
                'quicktags' => true
            ));
            ?>
            <script>
            jQuery(document).ready(function($) {
                // Tích hợp dữ liệu vào bộ phân tích của Rank Math thông qua Hook chuẩn
                if (typeof wp !== 'undefined' && wp.hooks) {
                    wp.hooks.addFilter('rank_math_content', 'tavaled_cat_seo', function(content) {
                        if (typeof tinyMCE !== 'undefined' && tinyMCE.get('cat_description')) {
                            // Ghi đè content bằng nội dung của TinyMCE
                            return tinyMCE.get('cat_description').getContent();
                        }
                        return content;
                    });
                }

                // Đồng thời vẫn đồng bộ nội dung về textarea gốc mỗi giây
                function syncToHiddenDesc() {
                    if (typeof tinyMCE !== 'undefined' && tinyMCE.get('cat_description')) {
                        var content = tinyMCE.get('cat_description').getContent();
                        var hiddenDesc = $('textarea#description.large-text');
                        if(hiddenDesc.length) {
                            hiddenDesc.val(content).trigger('input').trigger('change');
                        }
                    }
                }
                setInterval(syncToHiddenDesc, 1000);
            });
            </script>
        </td>
    </tr>
    <?php
});

// Cho phép lưu HTML/Rich Text vào term description
remove_filter('pre_term_description', 'wp_filter_kses');
remove_filter('term_description', 'wp_kses_data');
