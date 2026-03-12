<?php
namespace App\Controllers;

class SingleController {
    public function index() {
        if (have_posts()) {
            the_post(); // Setup post data
            
            // Get related posts by category
            $categories = get_the_category();
            $related_posts = [];
            
            if ($categories) {
                $category_ids = array();
                foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;
                
                $args = array(
                    'category__in' => $category_ids,
                    'post__not_in' => array(get_the_ID()),
                    'posts_per_page' => 3, // Lấy 3 bài liên quan
                    'ignore_sticky_posts' => 1
                );
                $related_query = new \WP_Query($args);
                
                if ($related_query->have_posts()) {
                    while ($related_query->have_posts()) {
                        $related_query->the_post();
                        $related_posts[] = get_post();
                    }
                    wp_reset_postdata();
                }
            }
            // Get recent posts
            $recent_posts = [];
            $recent_posts_query = new \WP_Query(array(
                'post_type' => 'post',
                'posts_per_page' => 4,
                'post__not_in' => array(get_the_ID()),
                'ignore_sticky_posts' => 1
            ));
            if ($recent_posts_query->have_posts()) {
                while ($recent_posts_query->have_posts()) {
                    $recent_posts_query->the_post();
                    $recent_posts[] = get_post();
                }
                wp_reset_postdata();
            }

            // Get recent products
            $recent_products = [];
            $recent_products_query = new \WP_Query(array(
                'post_type' => 'product',
                'posts_per_page' => 4,
                'ignore_sticky_posts' => 1
            ));
            if ($recent_products_query->have_posts()) {
                while ($recent_products_query->have_posts()) {
                    $recent_products_query->the_post();
                    $recent_products[] = get_post();
                }
                wp_reset_postdata();
            }
            
            view('single', [
                'title' => get_the_title(),
                'related_posts' => $related_posts,
                'recent_posts'  => $recent_posts,
                'recent_products' => $recent_products
            ]);
        } else {
            view('404');
        }
    }
}
