<?php
namespace App\Controllers;

class SitemapController {
    public function register() {
        add_filter('query_vars', [$this, 'add_query_vars']);
        add_action('init', [$this, 'add_rewrite_rules']);
        add_action('template_redirect', [$this, 'render_sitemap']);
    }

    public function add_query_vars($vars) {
        $vars[] = 'custom_sitemap';
        return $vars;
    }

    public function add_rewrite_rules() {
        add_rewrite_rule('^post_sitemap\.xml$', 'index.php?custom_sitemap=post', 'top');
        add_rewrite_rule('^products_sitemap\.xml$', 'index.php?custom_sitemap=products', 'top');
        add_rewrite_rule('^page_sitemap\.xml$', 'index.php?custom_sitemap=page', 'top');
        add_rewrite_rule('^category_sitemap\.xml$', 'index.php?custom_sitemap=category', 'top');
        add_rewrite_rule('^sitemap\.xml$', 'index.php?custom_sitemap=index', 'top');
    }

    public function render_sitemap() {
        $sitemap_type = get_query_var('custom_sitemap');
        if (!$sitemap_type) {
            return;
        }

        header('Content-Type: text/xml; charset=utf-8');
        echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        
        if ($sitemap_type === 'index') {
            $this->render_index_sitemap();
        } else {
            $this->render_urlset($sitemap_type);
        }
        
        exit;
    }

    private function render_index_sitemap() {
        echo '<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        $sitemaps = ['post_sitemap.xml', 'products_sitemap.xml', 'page_sitemap.xml', 'category_sitemap.xml'];
        $base_url = trailingslashit(home_url());
        foreach ($sitemaps as $sitemap) {
            echo '<sitemap>' . "\n";
            echo '<loc>' . esc_url($base_url . $sitemap) . '</loc>' . "\n";
            echo '<lastmod>' . gmdate('c') . '</lastmod>' . "\n";
            echo '</sitemap>' . "\n";
        }
        echo '</sitemapindex>' . "\n";
    }

    private function render_urlset($type) {
        echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";
        
        if ($type === 'post') {
            $this->query_and_render_posts('post', 0.8);
        } elseif ($type === 'products') {
            $this->query_and_render_posts('tava_product', 0.9);
        } elseif ($type === 'page') {
            $this->query_and_render_posts('page', 0.7);
        } elseif ($type === 'category') {
            $this->query_and_render_terms('category', 0.6);
        }
        
        echo '</urlset>' . "\n";
    }

    private function query_and_render_posts($post_type, $priority = 0.8) {
        $args = [
            'post_type' => $post_type,
            'post_status' => 'publish',
            'posts_per_page' => 1000,
            'ignore_sticky_posts' => true
        ];
        $query = new \WP_Query($args);
        
        if ($query->have_posts()) {
            while ($query->have_posts()) {
                $query->the_post();
                $url = get_permalink();
                $modified = get_the_modified_date('c');
                echo '<url>' . "\n";
                echo '<loc>' . esc_url($url) . '</loc>' . "\n";
                if ($modified) echo '<lastmod>' . $modified . '</lastmod>' . "\n";
                echo '<changefreq>weekly</changefreq>' . "\n";
                echo '<priority>' . $priority . '</priority>' . "\n";
                echo '</url>' . "\n";
            }
            wp_reset_postdata();
        }
    }
    
    private function query_and_render_terms($taxonomy, $priority = 0.6) {
        $terms = get_terms([
            'taxonomy' => $taxonomy,
            'hide_empty' => false,
        ]);
        if (!is_wp_error($terms) && !empty($terms)) {
            foreach ($terms as $term) {
                $url = get_term_link($term);
                if (is_wp_error($url)) continue;
                echo '<url>' . "\n";
                echo '<loc>' . esc_url($url) . '</loc>' . "\n";
                echo '<changefreq>weekly</changefreq>' . "\n";
                echo '<priority>' . $priority . '</priority>' . "\n";
                echo '</url>' . "\n";
            }
        }
    }
}
