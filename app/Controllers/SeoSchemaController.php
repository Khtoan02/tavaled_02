<?php
namespace App\Controllers;

class SeoSchemaController {
    public function register() {
        add_action('wp_head', [$this, 'render_schema'], 5);
    }

    public function render_schema() {
        // Chỉ xuất Schema nếu không dùng Rank Math hoặc Yoast (vì các plugin này đã có sẵn)
        if (class_exists('RankMath') || defined('WPSEO_VERSION')) {
            return;
        }

        $schemas = [];

        // 1. WebSite / Organization Schema (luôn xuất hiện)
        $company_name = \App\Helpers\ThemeHelper::getOption('company_name', get_bloginfo('name'));
        $logo = \App\Helpers\ThemeHelper::getOption('logo', '');
        
        $schemas[] = [
            '@context' => 'https://schema.org',
            '@type' => 'Organization',
            'name' => $company_name,
            'url' => home_url('/'),
            'logo' => $logo,
        ];

        $schemas[] = [
            '@context' => 'https://schema.org',
            '@type' => 'WebSite',
            'name' => get_bloginfo('name'),
            'url' => home_url('/'),
            'potentialAction' => [
                '@type' => 'SearchAction',
                'target' => home_url('/?s={search_term_string}'),
                'query-input' => 'required name=search_term_string'
            ]
        ];

        // 2. Schema cho Bài viết (Post / Article)
        if (is_single() && get_post_type() === 'post') {
            global $post;
            $author_id = $post->post_author;
            $img = has_post_thumbnail() ? get_the_post_thumbnail_url($post->ID, 'full') : $logo;

            $schemas[] = [
                '@context' => 'https://schema.org',
                '@type' => 'Article',
                'headline' => get_the_title(),
                'image' => [ $img ],
                'datePublished' => get_the_date('c'),
                'dateModified' => get_the_modified_date('c'),
                'author' => [
                    '@type' => 'Person',
                    'name' => get_the_author_meta('display_name', $author_id)
                ],
                'publisher' => [
                    '@type' => 'Organization',
                    'name' => $company_name,
                    'logo' => [
                        '@type' => 'ImageObject',
                        'url' => $logo
                    ]
                ]
            ];
        }

        // 3. Schema cho Sản phẩm (Product)
        if (is_single() && get_post_type() === 'tava_product') {
            global $post;
            $img = has_post_thumbnail() ? get_the_post_thumbnail_url($post->ID, 'full') : $logo;
            
            $schemas[] = [
                '@context' => 'https://schema.org',
                '@type' => 'Product',
                'name' => get_the_title(),
                'image' => [ $img ],
                'description' => wp_strip_all_tags(get_the_excerpt() ?: $post->post_content),
                'brand' => [
                    '@type' => 'Brand',
                    'name' => $company_name
                ],
                'offers' => [
                    '@type' => 'Offer',
                    'url' => get_permalink(),
                    'priceCurrency' => 'VND',
                    'price' => '0',
                    'availability' => 'https://schema.org/InStock',
                    'seller' => [
                        '@type' => 'Organization',
                        'name' => $company_name
                    ]
                ]
            ];
        }

        // 4. Schema cho Trang Tĩnh (WebPage)
        if (is_page()) {
            $schemas[] = [
                '@context' => 'https://schema.org',
                '@type' => 'WebPage',
                'name' => get_the_title(),
                'url' => get_permalink()
            ];
        }

        // In ra mã JSON-LD
        if (!empty($schemas)) {
            echo "\n<!-- TAVA SEO SCHEMA MARKUP -->\n";
            echo "<script type=\"application/ld+json\">\n";
            echo json_encode($schemas, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT);
            echo "\n</script>\n<!-- /TAVA SEO SCHEMA MARKUP -->\n";
        }
    }
}
