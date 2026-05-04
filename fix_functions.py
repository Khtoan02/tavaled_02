import re

file_path = '/Applications/ServBay/www/toan.host/wp-content/themes/tavaled_02/functions.php'

with open(file_path, 'r') as f:
    content = f.read()

# Replace product_cat with product_industry in the term_link filter
content = content.replace("['product_cat', 'product_subcat']", "['product_industry', 'product_cat', 'product_subcat']")

# Update the Rank Math config to include product_industry
rm_old = """        if (empty($rm_sitemap_opts['tax_product_cat_sitemap']) || $rm_sitemap_opts['tax_product_cat_sitemap'] !== 'on') {
            $rm_sitemap_opts['tax_product_cat_sitemap'] = 'on';
            $needs_update = true;
        }"""
rm_new = """        if (empty($rm_sitemap_opts['tax_product_cat_sitemap']) || $rm_sitemap_opts['tax_product_cat_sitemap'] !== 'on') {
            $rm_sitemap_opts['tax_product_cat_sitemap'] = 'on';
            $needs_update = true;
        }
        if (empty($rm_sitemap_opts['tax_product_industry_sitemap']) || $rm_sitemap_opts['tax_product_industry_sitemap'] !== 'on') {
            $rm_sitemap_opts['tax_product_industry_sitemap'] = 'on';
            $needs_update = true;
        }"""
if 'tax_product_industry_sitemap' not in content:
    content = content.replace(rm_old, rm_new)

# Make sure CSS/JS enqueue covers product_industry
enqueue_old = "is_tax('product_cat')"
enqueue_new = "is_tax('product_cat') || is_tax('product_industry')"
if enqueue_new not in content:
    content = content.replace(enqueue_old, enqueue_new)

with open(file_path, 'w') as f:
    f.write(content)
