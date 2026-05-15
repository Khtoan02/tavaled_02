<?php
require_once('../../../wp-load.php');

$posts = get_posts([
    'post_type' => 'tava_product',
    'posts_per_page' => -1,
    'post_status' => 'any'
]);

echo "Total tava_product: " . count($posts) . "\n";

if (count($posts) > 0) {
    $first_id = $posts[0]->ID;
    echo "First product ID: $first_id\n";
    $terms = wp_get_post_terms($first_id, 'product_cat');
    echo "Terms in product_cat for first product: " . count($terms) . "\n";
    foreach ($terms as $t) echo "- " . $t->name . " (slug: " . $t->slug . ")\n";
    
    $terms_old = wp_get_post_terms($first_id, 'product_industry');
    echo "Terms in product_industry for first product: " . count($terms_old) . "\n";
    foreach ($terms_old as $t) echo "- " . $t->name . " (slug: " . $t->slug . ")\n";
}

$cats = get_terms(['taxonomy' => 'product_cat', 'hide_empty' => false]);
echo "All terms in product_cat: " . count($cats) . "\n";
foreach ($cats as $t) echo "- " . $t->name . " (slug: " . $t->slug . ")\n";

