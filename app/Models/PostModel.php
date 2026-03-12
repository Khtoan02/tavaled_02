<?php
namespace App\Models;

class PostModel {
    /**
     * Get latest posts
     * @param int $limit
     * @return \WP_Query
     */
    public function getLatestPosts($limit = 10) {
        $args = [
            'post_type' => 'post',
            'posts_per_page' => $limit,
            'post_status' => 'publish',
        ];

        return new \WP_Query($args);
    }
}
