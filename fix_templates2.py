import os

files = [
    '/Applications/ServBay/www/toan.host/wp-content/themes/tavaled_02/templates/template-products.php',
    '/Applications/ServBay/www/toan.host/wp-content/themes/tavaled_02/archive-tava_product.php',
    '/Applications/ServBay/www/toan.host/wp-content/themes/tavaled_02/taxonomy-product_cat.php'
]

old_php_logic = """<?php
$php_cat_key = 'led';
if (is_tax('product_cat')) {
    $term = get_queried_object();
    if ($term) {
        if ($term->slug === 'am-thanh' || $term->slug === 'thiet-bi-am-thanh') $php_cat_key = 'am-thanh';
        elseif ($term->slug === 'anh-sang' || $term->slug === 'thiet-bi-anh-sang') $php_cat_key = 'anh-sang';
    }
} elseif (isset($_GET['cat'])) {
    if ($_GET['cat'] === 'am-thanh') $php_cat_key = 'am-thanh';
    elseif ($_GET['cat'] === 'anh-sang') $php_cat_key = 'anh-sang';
}
?>
<script>"""

new_js_init = """<script>"""

old_js_init2 = """  const params = new URLSearchParams(window.location.search);
  let loadedCat = '<?php echo esc_js($php_cat_key); ?>';"""

new_js_init2 = """  const params = new URLSearchParams(window.location.search);
  let loadedCat = 'led';
  const path = window.location.pathname.toLowerCase();
  
  if (path.includes('/am-thanh')) loadedCat = 'am-thanh';
  else if (path.includes('/anh-sang')) loadedCat = 'anh-sang';
  else if (path.includes('/man-hinh-led') || path.includes('/led')) loadedCat = 'led';
  
  // URL parameter override for backward compatibility
  const catParam = params.get('cat');
  if (catParam && DATA[catParam]) loadedCat = catParam;"""

for file_path in files:
    if not os.path.exists(file_path):
        continue
    with open(file_path, 'r') as f:
        content = f.read()

    # If the old PHP logic exists, remove it
    if old_php_logic in content:
        content = content.replace(old_php_logic, new_js_init)
    
    # Replace the JS logic
    if old_js_init2 in content:
        content = content.replace(old_js_init2, new_js_init2)
    # Also handle the original JS logic if it hasn't been replaced
    old_js_init_original = """  const params = new URLSearchParams(window.location.search);
  let loadedCat = 'led';
  const catParam = params.get('cat');
  if (catParam && DATA[catParam]) {
      loadedCat = catParam;
  }"""
    if old_js_init_original in content:
        content = content.replace(old_js_init_original, new_js_init2)

    with open(file_path, 'w') as f:
        f.write(content)
