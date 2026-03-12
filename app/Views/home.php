<?php view('layouts/header', ['title' => $title]); ?>

<main class="site-main">
    <div class="container">
        <h1><?php echo esc_html($title); ?></h1>

        <?php if ($posts->have_posts()) : ?>
            <div class="posts-grid">
                <?php while ($posts->have_posts()) : $posts->the_post(); ?>
                    <?php view('components/post-card', ['post' => $posts->post]); ?>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
        <?php else : ?>
            <p>Không có bài viết nào.</p>
        <?php endif; ?>
    </div>
</main>

<?php view('layouts/footer'); ?>
