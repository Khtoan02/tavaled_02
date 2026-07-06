<?php
namespace App\Controllers;

class ProductSetupController {

    public function register() {
        add_action('init', [$this, 'registerCustomPostType'], 0);
        add_action('init', [$this, 'registerTaxonomies'], 0);

        if (is_admin()) {
            add_filter('manage_tava_product_posts_columns', [$this, 'setCustomColumns']);
            add_action('manage_tava_product_posts_custom_column', [$this, 'renderCustomColumns'], 10, 2);
            add_filter('manage_edit-tava_product_sortable_columns', [$this, 'setSortableColumns']);
        }
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

    public function setCustomColumns($columns) {
        $new_columns = [];
        $new_columns['cb'] = $columns['cb'];
        $new_columns['thumbnail'] = 'Ảnh';
        $new_columns['title'] = $columns['title'];
        $new_columns['model'] = 'Mã Model';
        $new_columns['taxonomy-product_cat'] = 'Danh mục';
        $new_columns['taxonomy-product_brand'] = 'Nhãn hàng';
        $new_columns['menu_order'] = 'Thứ tự';
        $new_columns['date'] = $columns['date'];
        return $new_columns;
    }

    public function renderCustomColumns($column, $post_id) {
        switch ($column) {
            case 'thumbnail':
                $product_img = get_post_meta($post_id, '_product_img', true);
                $thumbnail_url = has_post_thumbnail($post_id) ? get_the_post_thumbnail_url($post_id, [50, 50]) : (!empty($product_img) ? $product_img : '');
                if ($thumbnail_url) {
                    echo '<img src="' . esc_url($thumbnail_url) . '" style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px; border: 1px solid #ddd;" />';
                } else {
                    echo '<span style="color: #999; font-size: 11px;">Không có</span>';
                }
                break;
            case 'model':
                $model = get_post_meta($post_id, '_product_model', true);
                echo esc_html($model ?: '—');
                break;
            case 'menu_order':
                $post = get_post($post_id);
                echo intval($post->menu_order);
                break;
        }
    }

    public function setSortableColumns($columns) {
        $columns['model'] = 'model';
        $columns['menu_order'] = 'menu_order';
        return $columns;
    }
}
