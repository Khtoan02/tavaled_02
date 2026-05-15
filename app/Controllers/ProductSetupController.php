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
            'rewrite'            => ['slug' => 'san-pham', 'with_front' => false],
            'capability_type'    => 'post',
            'has_archive'        => 'san-pham', // Tạo trang lưu trữ tổng chuẩn SEO
            'hierarchical'       => false,
            'menu_position'      => 5,
            'menu_icon'          => 'dashicons-cart',
            'supports'           => ['title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'page-attributes'],
            'show_in_rest'       => true, // Kích hoạt REST API để RankMath/Gutenberg nhận diện tốt hơn
        ];

        register_post_type('tava_product', $args);
    }

    public function registerTaxonomies() {
        // 1. DANH MỤC SẢN PHẨM (Category - Gộp chung Ngành hàng, Phân loại, Danh mục con thành cấu trúc cha-con)
        register_taxonomy('product_cat', ['tava_product'], [
            'hierarchical'      => true,
            'labels'            => [
                'name'              => 'Danh mục sản phẩm',
                'singular_name'     => 'Danh mục sản phẩm',
                'search_items'      => 'Tìm Danh mục',
                'all_items'         => 'Tất cả Danh mục',
                'parent_item'       => 'Danh mục cha',
                'parent_item_colon' => 'Danh mục cha:',
                'edit_item'         => 'Sửa Danh mục',
                'update_item'       => 'Cập nhật',
                'add_new_item'      => 'Thêm Danh mục mới',
                'new_item_name'     => 'Tên Danh mục mới',
                'menu_name'         => 'Danh mục SP',
            ],
            'show_ui'           => true,
            'show_admin_column' => true,
            'query_var'         => true,
            'rewrite'           => ['slug' => 'danh-muc', 'with_front' => false],
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

    }
}
