import re

file_path = '/Applications/ServBay/www/toan.host/wp-content/themes/tavaled_02/templates/template-products.php'

with open(file_path, 'r') as f:
    content = f.read()

# 1. Update the dynamic generation to fetch product_industry instead of product_cat
content = content.replace("get_terms(['taxonomy' => 'product_cat', 'hide_empty' => false, 'parent' => 0])", "get_terms(['taxonomy' => 'product_industry', 'hide_empty' => false, 'parent' => 0])")

# 2. Update the WP_Query to filter by product_industry instead of product_cat
query_old = """        'tax_query'      => [
            [
                'taxonomy' => 'product_cat',
                'field'    => 'slug',
                'terms'    => $cat_slugs,
                'operator' => 'IN',
            ]
        ]"""
query_new = """        'tax_query'      => [
            [
                'taxonomy' => 'product_industry',
                'field'    => 'slug',
                'terms'    => $cat_slugs,
                'operator' => 'IN',
            ]
        ]"""
content = content.replace(query_old, query_new)

# 3. Update the inner filters (Subcats) to look at product_cat instead of product_subcat!
# Previously: $terms_sub = wp_get_post_terms($post_id, 'product_subcat');
subcat_old = "$terms_sub = wp_get_post_terms($post_id, 'product_subcat');"
subcat_new = "$terms_sub = wp_get_post_terms($post_id, 'product_cat');"
content = content.replace(subcat_old, subcat_new)

with open(file_path, 'w') as f:
    f.write(content)
