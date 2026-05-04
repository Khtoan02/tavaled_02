import os
import re

files = [
    '/Applications/ServBay/www/toan.host/wp-content/themes/tavaled_02/templates/template-products.php',
    '/Applications/ServBay/www/toan.host/wp-content/themes/tavaled_02/archive-tava_product.php',
    '/Applications/ServBay/www/toan.host/wp-content/themes/tavaled_02/taxonomy-product_cat.php'
]

for file_path in files:
    if not os.path.exists(file_path):
        continue
    with open(file_path, 'r') as f:
        content = f.read()

    # 1. Inject PHP variable detection before the <script> block
    php_inject = """<?php
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
    content = content.replace("<script>", php_inject, 1)

    # 2. Modify JS switchCat to do a real page reload
    old_switch_cat = """function switchCat(catKey) {
  document.querySelectorAll('.cat-switch-btn').forEach(b => b.classList.remove('active'));
  const targetBtn = document.querySelector(`.cat-switch-btn[onclick*="'${catKey}'"]`);
  if (targetBtn) targetBtn.classList.add('active');

  // Push URL History without reload
  const url = new URL(window.location);
  url.searchParams.set('cat', catKey);
  url.searchParams.delete('subcat'); // Xoá subcat khi nhảy cat mới
  window.history.pushState({}, '', url);

  currentCat = catKey;
  renderAll(catKey);
}"""

    new_switch_cat = """function switchCat(catKey) {
  let newPath = '/san-pham/';
  if (catKey === 'led') newPath = '/man-hinh-led/';
  else if (catKey === 'am-thanh') newPath = '/am-thanh/';
  else if (catKey === 'anh-sang') newPath = '/anh-sang/';
  window.location.href = newPath;
}"""
    content = content.replace(old_switch_cat, new_switch_cat)

    # 3. Modify JS initialization to use PHP variable
    old_js_init = """  const params = new URLSearchParams(window.location.search);
  let loadedCat = 'led';
  const catParam = params.get('cat');
  if (catParam && DATA[catParam]) {
      loadedCat = catParam;
  }"""
    new_js_init = """  const params = new URLSearchParams(window.location.search);
  let loadedCat = '<?php echo esc_js($php_cat_key); ?>';"""
    content = content.replace(old_js_init, new_js_init)

    with open(file_path, 'w') as f:
        f.write(content)
