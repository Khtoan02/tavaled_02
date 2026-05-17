<?php
namespace App\Controllers;

class SingleController {
    public function index() {
        if (have_posts()) {
            the_post();

            /* ── Bài viết liên quan (cùng category) ── */
            $categories     = get_the_category();
            $related_posts  = [];
            if ($categories) {
                $cat_ids = wp_list_pluck($categories, 'term_id');
                $rq = new \WP_Query([
                    'category__in'        => $cat_ids,
                    'post__not_in'        => [get_the_ID()],
                    'posts_per_page'      => 3,
                    'ignore_sticky_posts' => 1,
                    'orderby'             => 'date',
                    'order'               => 'DESC',
                ]);
                while ($rq->have_posts()) {
                    $rq->the_post();
                    $related_posts[] = get_post();
                }
                wp_reset_postdata();
            }

            /* ── Bài viết theo từng danh mục (3 bài / cat) ── */
            $posts_by_cat = [];
            $all_cats = get_categories(['hide_empty' => true, 'number' => 10, 'orderby' => 'count', 'order' => 'DESC']);
            foreach ($all_cats as $cat) {
                $cq = new \WP_Query([
                    'cat'                 => $cat->term_id,
                    'post__not_in'        => [get_the_ID()],
                    'posts_per_page'      => 3,
                    'ignore_sticky_posts' => 1,
                    'orderby'             => 'date',
                    'order'               => 'DESC',
                ]);
                if ($cq->have_posts()) {
                    $items = [];
                    while ($cq->have_posts()) {
                        $cq->the_post();
                        $items[] = get_post();
                    }
                    wp_reset_postdata();
                    if (!empty($items)) {
                        $posts_by_cat[] = [
                            'cat'   => $cat,
                            'posts' => $items,
                        ];
                    }
                }
            }

            /* ── Sản phẩm theo từng danh mục (2 sp / cat) ── */
            $products_by_cat = [];
            $prod_cats = get_terms(['taxonomy' => 'product_cat', 'hide_empty' => true, 'number' => 8]);
            if (!is_wp_error($prod_cats)) {
                foreach ($prod_cats as $pcat) {
                    $pq = new \WP_Query([
                        'post_type'           => 'tava_product',
                        'posts_per_page'      => 2,
                        'ignore_sticky_posts' => 1,
                        'orderby'             => 'date',
                        'order'               => 'DESC',
                        'tax_query'           => [[
                            'taxonomy' => 'product_cat',
                            'field'    => 'term_id',
                            'terms'    => $pcat->term_id,
                        ]],
                    ]);
                    if ($pq->have_posts()) {
                        $pitems = [];
                        while ($pq->have_posts()) {
                            $pq->the_post();
                            $pitems[] = get_post();
                        }
                        wp_reset_postdata();
                        if (!empty($pitems)) {
                            $products_by_cat[] = [
                                'cat'      => $pcat,
                                'products' => $pitems,
                            ];
                        }
                    }
                }
            }

            view('blog/single-blog', [
                'title'            => get_the_title(),
                'related_posts'    => $related_posts,
                'posts_by_cat'     => $posts_by_cat,
                'products_by_cat'  => $products_by_cat,
            ]);
        } else {
            view('404');
        }
    }
}
