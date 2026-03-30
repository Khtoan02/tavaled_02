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
function tavaled_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus([
        'primary'        => __('Primary Menu', 'tavaled02'),
        'mega_about'     => __('Mega: Về chúng tôi', 'tavaled02'),
        'mega_solutions' => __('Mega: Giải pháp trọn gói', 'tavaled02'),
    ]);
}
add_action('after_setup_theme', 'tavaled_theme_setup');

// Enqueue styles and scripts
function tavaled_enqueue_scripts() {
    // Preconnect Google Fonts để DNS resolve sớm hơn
    wp_enqueue_style('tavaled-fonts-preconnect', 'https://fonts.gstatic.com', [], null);
    add_filter('style_loader_tag', function($html, $handle) {
        if ($handle === 'tavaled-fonts-preconnect') {
            return '<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>' . "\n"
                 . '<link rel="preconnect" href="https://fonts.googleapis.com">' . "\n";
        }
        return $html;
    }, 10, 2);

    // Google Fonts Inter and Mona Sans
    wp_enqueue_style('tavaled-fonts', 'https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Mona+Sans:ital,wght@0,200..900;1,200..900&display=swap', [], null);

    // Tailwind compiled CSS
    wp_enqueue_style('tavaled-tailwind', TAVALED_URI . '/assets/css/tailwind-output.css', [], time());

    wp_enqueue_style('tavaled-style', get_stylesheet_uri(), [], time());
    wp_enqueue_style('tavaled-main-css', TAVALED_URI . '/assets/css/main.css', [], time());
    wp_enqueue_script('tavaled-main-js', TAVALED_URI . '/assets/js/main.js', ['jquery'], time(), true);

    if (is_front_page() || is_page_template('templates/template-homepage.php') || is_page_template('templates/template-products.php')) {
        wp_enqueue_style('tavaled-homepage-css', TAVALED_URI . '/assets/css/homepage.css', [], time());
        wp_enqueue_script('tavaled-homepage-js', TAVALED_URI . '/assets/js/homepage.js', ['jquery'], time(), true);
    }
}
add_action('wp_enqueue_scripts', 'tavaled_enqueue_scripts');

/**
 * Global helper to render views
 */
function view($view_name, $data = []) {
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

/**
 * Add Favicon from Theme Settings
 */
function tavaled_add_favicon() {
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
function tavaled_floating_contacts() {
    $phone_kd = \App\Helpers\ThemeHelper::getOption('phone_kd', '0936 543 389');
    $phone_cskh = \App\Helpers\ThemeHelper::getOption('phone_cskh', '0936 543 389');
    $zalo = \App\Helpers\ThemeHelper::getOption('zalo', '0936543389');

    if (!$phone_kd && !$phone_cskh && !$zalo) return;
    ?>
    <div class="floating-contact-wrapper fixed bottom-6 right-6 z-50 flex flex-col items-end gap-3">
        <?php if ($phone_kd): ?>
        <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone_kd)); ?>" class="floating-btn phone-kd-btn group relative flex items-center justify-center w-14 h-14 bg-red-600 text-white rounded-full shadow-lg hover:bg-red-700 hover:scale-110 transition duration-300">
            <span class="absolute inline-flex h-full w-full rounded-full bg-red-500 opacity-75 animate-ping" style="animation-duration: 1.5s;"></span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>
            <span class="absolute right-full mr-4 bg-white text-gray-800 text-sm font-semibold px-3 py-1 rounded-lg opacity-0 group-hover:opacity-100 transition duration-300 whitespace-nowrap shadow-md pointer-events-none">Kinh doanh: <?php echo esc_html($phone_kd); ?></span>
        </a>
        <?php endif; ?>

        <?php if ($phone_cskh): ?>
        <a href="tel:<?php echo esc_attr(preg_replace('/[^0-9+]/', '', $phone_cskh)); ?>" class="floating-btn phone-cskh-btn group relative flex items-center justify-center w-14 h-14 bg-orange-500 text-white rounded-full shadow-lg hover:bg-orange-600 hover:scale-110 transition duration-300">
            <span class="absolute inline-flex h-full w-full rounded-full bg-orange-400 opacity-75 animate-ping" style="animation-duration: 1.5s; animation-delay: 0.5s;"></span>
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 relative z-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192l-3.536 3.536M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
            <span class="absolute right-full mr-4 bg-white text-gray-800 text-sm font-semibold px-3 py-1 rounded-lg opacity-0 group-hover:opacity-100 transition duration-300 whitespace-nowrap shadow-md pointer-events-none">CSKH: <?php echo esc_html($phone_cskh); ?></span>
        </a>
        <?php endif; ?>

        <?php if ($zalo): ?>
        <a href="https://zalo.me/<?php echo esc_attr(preg_replace('/[^0-9]/', '', $zalo)); ?>" target="_blank" class="floating-btn zalo-btn group relative flex items-center justify-center w-14 h-14 bg-white rounded-full shadow-lg hover:bg-gray-50 hover:scale-110 transition duration-300">
            <span class="absolute inline-flex h-full w-full rounded-full bg-blue-400 opacity-75 animate-ping" style="animation-duration: 1.5s; animation-delay: 1s;"></span>
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/91/Icon_of_Zalo.svg/1280px-Icon_of_Zalo.svg.png" alt="Zalo" class="w-10 h-10 relative z-10" style="object-fit: contain;">
            <span class="absolute right-full mr-4 bg-white text-gray-800 text-sm font-semibold px-3 py-1 rounded-lg opacity-0 group-hover:opacity-100 transition duration-300 whitespace-nowrap shadow-md pointer-events-none">Zalo: <?php echo esc_html($zalo); ?></span>
        </a>
        <?php endif; ?>
    </div>
    <?php
}
add_action('wp_footer', 'tavaled_floating_contacts', 100);

/**
 * Custom Order for tava_product to push menu_order=0 to the end
 */
function tavaled_custom_product_order($orderby, $query) {
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
function tavaled_reverse_admin_product_order($query) {
    if (is_admin() && $query->is_main_query() && $query->get('post_type') === 'tava_product') {
        $order = $query->get('order') ?: 'DESC';
        $new_order = (strtoupper($order) === 'ASC') ? 'DESC' : 'ASC';
        
        $query->set('orderby', 'date');
        $query->set('order', $new_order);
    }
}
add_action('pre_get_posts', 'tavaled_reverse_admin_product_order');

