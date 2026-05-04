<?php
namespace App\Controllers;

class ProductSetupController {

    public function register() {
        add_action('init', [$this, 'registerCustomPostType'], 0);
        add_action('init', [$this, 'registerTaxonomies'], 0);
    }

    public function registerCustomPostType() {
        $labels = [
            'name'                  => 'Sản phẩm',
            'singular_name'         => 'Sản phẩm',
            'menu_name'             => 'Sản phẩm',
            'name_admin_bar'        => 'Sản phẩm',
            'add_new'               => 'Thêm mới',
            'add_new_item'          => 'Thêm sản phẩm mới',
            'new_item'              => 'Sản phẩm mới',
            'edit_item'             => 'Sửa sản phẩm',
            'view_item'             => 'Xem sản phẩm',
            'all_items'             => 'Tất cả sản phẩm',
            'search_items'          => 'Tìm kiếm sản phẩm',
            'parent_item_colon'     => 'Sản phẩm cha:',
            'not_found'             => 'Không tìm thấy sản phẩm nào.',
            'not_found_in_trash'    => 'Không có sản phẩm trong thùng rác.',
        ];

        $args = [
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => ['slug' => '%product_industry%', 'with_front' => false],
            'capability_type'    => 'post',
            'has_archive'        => 'san-pham', // Tạo trang lưu trữ tổng chuẩn SEO
            'hierarchical'       => false,
            'menu_position'      => 5,
            'menu_icon'          => 'dashicons-cart',
            'supports'           => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'page-attributes'],
            'show_in_rest'       => true, // Kích hoạt REST API để RankMath/Gutenberg nhận diện tốt hơn
        ];

        // Đăng ký tag để WordPress hiểu %product_industry%, chỉ match các term có thật để tránh lỗi 404 trang tĩnh
        $industries = get_terms([
            'taxonomy'   => 'product_industry',
            'hide_empty' => false,
        ]);
        
        $slugs = [];
        if (!is_wp_error($industries) && !empty($industries)) {
            $slugs = wp_list_pluck($industries, 'slug');
        }
        // Thêm fallback để regex không bị rỗng
        if (empty($slugs)) {
            $slugs = ['san-pham'];
        }
        
        $regex = '(' . implode('|', $slugs) . ')';
        add_rewrite_tag('%product_industry%', $regex);
        register_post_type('tava_product', $args);
    }

    public function registerTaxonomies() {
                // 0. NGÀNH HÀNG (Industry - Top Level)
        register_taxonomy('product_industry', ['tava_product'], [
            'hierarchical'      => true,
            'labels'            => [
                'name'              => 'Ngành hàng',
                'singular_name'     => 'Ngành hàng',
                'search_items'      => 'Tìm Ngành hàng',
                'all_items'         => 'Tất cả Ngành hàng',
                'parent_item'       => 'Ngành hàng cha',
                'parent_item_colon' => 'Ngành hàng cha:',
                'edit_item'         => 'Sửa Ngành hàng',
                'update_item'       => 'Cập nhật',
                'add_new_item'      => 'Thêm Ngành hàng mới',
                'new_item_name'     => 'Tên Ngành hàng mới',
                'menu_name'         => 'Ngành hàng',
            ],
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => ['slug' => 'nganh-hang', 'with_front' => false],
            'show_in_rest'      => true,
        ]);

        // 1. PHÂN LOẠI SẢN PHẨM (Category)
        register_taxonomy('product_cat', ['tava_product'], [
            'hierarchical'      => true,
            'labels'            => [
                'name'              => 'Phân loại sản phẩm',
                'singular_name'     => 'Phân loại sản phẩm',
                'search_items'      => 'Tìm Phân loại',
                'all_items'         => 'Tất cả Phân loại',
                'parent_item'       => 'Phân loại cha',
                'parent_item_colon' => 'Phân loại cha:',
                'edit_item'         => 'Sửa Phân loại',
                'update_item'       => 'Cập nhật',
                'add_new_item'      => 'Thêm Phân loại mới',
                'new_item_name'     => 'Tên Phân loại mới',
                'menu_name'         => 'Phân loại SP',
            ],
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => ['slug' => 'phan-loai', 'with_front' => false], // Trang danh mục riêng biệt
            'show_in_rest'      => true,
        ]);

        // 2. DANH MỤC CON (Sub-category)
        register_taxonomy('product_subcat', ['tava_product'], [
            'hierarchical'      => true,
            'labels'            => [
                'name'              => 'Danh mục con',
                'singular_name'     => 'Danh mục con',
                'search_items'      => 'Tìm Danh mục con',
                'all_items'         => 'Tất cả Danh mục con',
                'edit_item'         => 'Sửa Danh mục con',
                'update_item'       => 'Cập nhật',
                'add_new_item'      => 'Thêm Danh mục con mới',
                'new_item_name'     => 'Tên Danh mục con mới',
                'menu_name'         => 'Danh mục con',
            ],
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'show_in_rest'      => true,
        ]);

        // 3. NHÃN HÀNG (Brand)
        register_taxonomy('product_brand', ['tava_product'], [
            'hierarchical'      => false,
            'labels'            => [
                'name'              => 'Nhãn hàng',
                'singular_name'     => 'Nhãn hàng',
                'search_items'      => 'Tìm Nhãn hàng',
                'all_items'         => 'Tất cả Nhãn hàng',
                'edit_item'         => 'Sửa Nhãn hàng',
                'update_item'       => 'Cập nhật',
                'add_new_item'      => 'Thêm Nhãn hàng mới',
                'new_item_name'     => 'Tên Nhãn hàng mới',
                'menu_name'         => 'Nhãn hàng',
            ],
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
        ]);

        // 4. THÔNG SỐ (Spec)
        register_taxonomy('product_spec', ['tava_product'], [
            'hierarchical'      => false,
            'labels'            => [
                'name'              => 'Thông số kỹ thuật (P1.5, 500W...)',
                'singular_name'     => 'Thông số kỹ thuật',
                'search_items'      => 'Tìm Thông số',
                'all_items'         => 'Tất cả Thông số',
                'edit_item'         => 'Sửa Thông số',
                'update_item'       => 'Cập nhật',
                'add_new_item'      => 'Thêm Thông số mới',
                'new_item_name'     => 'Tên Thông số mới',
                'menu_name'         => 'Thông số (Pixel Pitch...)',
            ],
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
        ]);
        
        // 5. HUY HIỆU (Badge - Hot, New, Sale)
        register_taxonomy('product_badge', ['tava_product'], [
            'hierarchical'      => false,
            'labels'            => [
                'name'              => 'Huy hiệu (Badge)',
                'singular_name'     => 'Huy hiệu',
                'search_items'      => 'Tìm Huy hiệu',
                'all_items'         => 'Tất cả Huy hiệu',
                'edit_item'         => 'Sửa Huy hiệu',
                'update_item'       => 'Cập nhật',
                'add_new_item'      => 'Thêm Huy hiệu mới',
                'new_item_name'     => 'Tên Huy hiệu',
                'menu_name'         => 'Huy hiệu',
            ],
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
        ]);
    }
}
