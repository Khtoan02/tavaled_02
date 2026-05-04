import os

file_path = '/Applications/ServBay/www/toan.host/wp-content/themes/tavaled_02/templates/template-products.php'
with open(file_path, 'r') as f:
    content = f.read()

# I will replace the $cat_definitions block with a dynamic builder.
# The block starts at: $cat_definitions = [
# and ends at: $dynamic_data = [];

# Let's find the indices
start_str = "$cat_definitions = ["
end_str = "$dynamic_data = [];"

start_idx = content.find(start_str)
end_idx = content.find(end_str)

if start_idx != -1 and end_idx != -1:
    new_php = """
// 1. Hardcoded configs for the BIG 3 (to preserve their custom logic and SEO text)
$cat_definitions = [
  'led' => [
    'db_name'    => 'Màn hình LED',
    'old_names'  => [],
    'cat_slugs'  => ['man-hinh-led'], 
    'title'     => 'Màn hình <em>LED</em>', 'eyebrow' => 'LED Display',
    'seo_title'   => 'Giải pháp Màn hình LED Chuyên nghiệp',
    'seo_content' => '<p>TavaLLS cung cấp các giải pháp hiển thị Màn hình LED đa dạng từ trong nhà (Indoor) đến ngoài trời (Outdoor). Với công nghệ pixel pitch siêu nhỏ, màn hình LED mang lại chất lượng hình ảnh sắc nét, màu sắc chân thực và độ bền vượt trội. Chúng tôi nhận tư vấn, thiết kế và thi công trọn gói cho hội trường, phòng họp, trung tâm thương mại và các dự án quy mô lớn.</p>',
    'pills'     => ['Tất cả','LED trong nhà','LED ngoài trời','Sân khấu','Trong suốt'],
    'specTitle' => 'Pixel Pitch',
    'specs'     => [
      ['label'=>'P1.5', 'cats'=>['LED trong nhà']], ['label'=>'P2', 'cats'=>['LED trong nhà']],
      ['label'=>'P2.5', 'cats'=>['LED trong nhà']], ['label'=>'P3', 'cats'=>['LED trong nhà','LED ngoài trời','LED sân khấu (Rental)']],
      ['label'=>'P4', 'cats'=>['LED trong nhà','LED ngoài trời','LED sân khấu (Rental)']], ['label'=>'P5', 'cats'=>['LED ngoài trời','LED sân khấu (Rental)']],
      ['label'=>'P6', 'cats'=>['LED ngoài trời']], ['label'=>'P8', 'cats'=>['LED ngoài trời']], ['label'=>'P10', 'cats'=>['LED ngoài trời']],
    ]
  ],
  'am-thanh' => [
    'db_name'    => 'Thiết bị âm thanh',
    'old_names'  => ['Âm thanh'],
    'cat_slugs'  => ['thiet-bi-am-thanh', 'am-thanh'], 
    'title' => 'Thiết bị <em>Âm Thanh</em>', 'eyebrow' => 'Audio Equipment',
    'seo_title'   => 'Hệ thống Âm thanh Sự kiện đỉnh cao',
    'seo_content' => '<p>Từ hệ thống loa Line Array công suất lớn cho sân khấu ngoài trời đến các dàn âm thanh hội thảo chuyên dụng, TavaLLS phân phối thiết bị âm thanh chính hãng chất lượng cao. Chúng tôi cung cấp giải pháp toàn diện đáp ứng mọi quy mô sự kiện với chất âm trong trẻo, trung thực và uy lực nhất.</p>',
    'pills'     => ['Tất cả','Loa','Amply','Micro','Sub','Đẩy công suất','Vang số','Mixer','Crossover'],
    'specTitle' => 'Công suất',
    'specs'     => [
      ['label'=>'Dưới 200W','count'=>18], ['label'=>'200W – 500W','count'=>24], ['label'=>'500W – 1000W','count'=>20], ['label'=>'Trên 1000W','count'=>16]
    ]
  ],
  'anh-sang' => [
    'db_name'    => 'Thiết bị ánh sáng',
    'old_names'  => ['Ánh sáng'],
    'cat_slugs'  => ['thiet-bi-anh-sang', 'anh-sang'],
    'title' => 'Thiết bị <em>Ánh Sáng</em>', 'eyebrow' => 'Lighting Equipment',
    'seo_title'   => 'Hệ thống Ánh sáng Nghệ thuật',
    'seo_content' => '<p>Đánh thức mọi giác quan với hệ thống ánh sáng kỹ thuật số từ TavaLLS. Chúng tôi chuyên lắp đặt đèn Moving Head, đèn Par LED, Laser và hệ thống điều khiển thông minh. Giải pháp ánh sáng của chúng tôi không chỉ đáp ứng công năng chiếu sáng mà còn tạo ra những hiệu ứng thị giác mãn nhãn, nâng tầm trải nghiệm cho mọi không gian.</p>',
    'pills'     => ['Tất cả','Moving Head','Par LED','Laser','Fog/Khói','Strobo','Follow Spot','LED Bar','DMX'],
    'specTitle' => 'Công suất đèn',
    'specs'     => [
      ['label'=>'Dưới 200W','count'=>20], ['label'=>'200W – 400W','count'=>28], ['label'=>'400W – 700W','count'=>18], ['label'=>'Trên 700W','count'=>8]
    ]
  ]
];

// 2. Fetch all actual terms from DB and inject any new ones!
$all_terms = get_terms(['taxonomy' => 'product_cat', 'hide_empty' => false, 'parent' => 0]);
$existing_slugs = ['man-hinh-led', 'am-thanh', 'anh-sang'];

if (!is_wp_error($all_terms) && !empty($all_terms)) {
    foreach ($all_terms as $term) {
        if (!in_array($term->slug, $existing_slugs)) {
            // It's a new dynamic category!
            $cat_definitions[$term->slug] = [
                'db_name' => $term->name,
                'old_names' => [],
                'cat_slugs' => [$term->slug],
                'title' => $term->name,
                'eyebrow' => 'Products',
                'seo_title' => $term->name,
                'seo_content' => wpautop($term->description),
                'pills' => ['Tất cả'], // Will be populated dynamically by products
                'specTitle' => 'Thông số',
                'specs' => [] // Generic checkbox list
            ];
        }
    }
}

$dynamic_data = [];
"""
    
    new_content = content[:start_idx] + new_php + content[end_idx + len(end_str):]
    
    # Also update the PHP logic that renders the Tab buttons in HTML
    # We need to make the <div class="page-header__cat-switch"> dynamic!
    html_start = '<div class="page-header__cat-switch">'
    html_end = '</div>'
    h_idx = new_content.find(html_start)
    h_e_idx = new_content.find(html_end, h_idx)
    
    if h_idx != -1 and h_e_idx != -1:
        dynamic_tabs = """<div class="page-header__cat-switch" id="dynamic-cat-switch">
            <?php foreach ($cat_definitions as $key => $def): ?>
                <button class="cat-switch-btn" onclick="switchCat('<?php echo esc_js($key); ?>')"><?php echo esc_html(strip_tags($def['title'])); ?></button>
            <?php endforeach; ?>
          </div>"""
        new_content = new_content[:h_idx] + dynamic_tabs + new_content[h_e_idx + len(html_end):]

    # Also update JS switchCat logic to be dynamic
    js_switch_old = """function switchCat(catKey) {
  let newPath = '/san-pham/';
  if (catKey === 'led') newPath = '/man-hinh-led/';
  else if (catKey === 'am-thanh') newPath = '/am-thanh/';
  else if (catKey === 'anh-sang') newPath = '/anh-sang/';
  window.location.href = newPath;
}"""
    js_switch_new = """function switchCat(catKey) {
  let newPath = '/san-pham/';
  if (catKey === 'led') newPath = '/man-hinh-led/';
  else newPath = '/' + catKey + '/';
  window.location.href = newPath;
}"""
    new_content = new_content.replace(js_switch_old, js_switch_new)

    # Update JS loadedCat detection
    js_load_old = """  let loadedCat = 'led';
  const path = window.location.pathname.toLowerCase();
  
  if (path.includes('/am-thanh')) loadedCat = 'am-thanh';
  else if (path.includes('/anh-sang')) loadedCat = 'anh-sang';
  else if (path.includes('/man-hinh-led') || path.includes('/led')) loadedCat = 'led';"""
    js_load_new = """  let loadedCat = 'led';
  const pathParts = window.location.pathname.toLowerCase().split('/').filter(Boolean);
  const lastSegment = pathParts[pathParts.length - 1] || '';
  
  if (lastSegment === 'man-hinh-led') loadedCat = 'led';
  else if (DATA[lastSegment]) loadedCat = lastSegment;
  else {
     // Fallback fuzzy match
     for (let key in DATA) {
         if (lastSegment.includes(key)) { loadedCat = key; break; }
     }
  }"""
    new_content = new_content.replace(js_load_old, js_load_new)

    with open(file_path, 'w') as f:
        f.write(new_content)

