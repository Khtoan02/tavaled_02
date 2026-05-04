import os
import re

file_path = '/Applications/ServBay/www/toan.host/wp-content/themes/tavaled_02/app/Controllers/ProductSetupController.php'

with open(file_path, 'r') as f:
    content = f.read()

# Rename product_cat labels
content = content.replace("'name'              => 'Ngành hàng (Lớn)'", "'name'              => 'Phân loại sản phẩm'")
content = content.replace("'singular_name'     => 'Ngành hàng'", "'singular_name'     => 'Phân loại sản phẩm'")
content = content.replace("'search_items'      => 'Tìm Ngành hàng'", "'search_items'      => 'Tìm Phân loại'")
content = content.replace("'all_items'         => 'Tất cả Ngành hàng'", "'all_items'         => 'Tất cả Phân loại'")
content = content.replace("'parent_item'       => 'Ngành hàng cha'", "'parent_item'       => 'Phân loại cha'")
content = content.replace("'parent_item_colon' => 'Ngành hàng cha:'", "'parent_item_colon' => 'Phân loại cha:'")
content = content.replace("'edit_item'         => 'Sửa Ngành hàng'", "'edit_item'         => 'Sửa Phân loại'")
content = content.replace("'add_new_item'      => 'Thêm Ngành hàng mới'", "'add_new_item'      => 'Thêm Phân loại mới'")
content = content.replace("'new_item_name'     => 'Tên Ngành hàng mới'", "'new_item_name'     => 'Tên Phân loại mới'")
content = content.replace("'menu_name'         => 'Ngành hàng'", "'menu_name'         => 'Phân loại SP'")
content = content.replace("'rewrite'           => ['slug' => 'danh-muc', 'with_front' => false]", "'rewrite'           => ['slug' => 'phan-loai', 'with_front' => false]")

# Add product_industry taxonomy before product_cat
industry_tax = """        // 0. NGÀNH HÀNG (Industry - Top Level)
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

"""

if 'register_taxonomy(\'product_industry\'' not in content:
    content = content.replace("// 1. NGÀNH HÀNG (Category)", industry_tax + "        // 1. PHÂN LOẠI SẢN PHẨM (Category)")

with open(file_path, 'w') as f:
    f.write(content)
