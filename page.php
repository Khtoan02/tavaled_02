<?php
/**
 * The template for displaying all single pages (Default Template)
 */
get_header(); ?>

<style>
/* CSS cơ bản cho trang mặc định */
.page-default-wrap {
    padding-top: 140px;
    padding-bottom: 80px;
    min-height: 60vh;
    background: #fff8f6;
    color: #1d2857;
    font-family: var(--font-body), sans-serif;
}
.page-default-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 5%;
}
.page-default-title {
    font-family: var(--font-heading), sans-serif;
    font-size: 3.2rem;
    font-weight: 800;
    line-height: 1.2;
    margin-bottom: 40px;
    color: #1d2857;
    border-bottom: 2px solid #f5e8e2;
    padding-bottom: 20px;
}
.page-default-content {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #374151;
}
.page-default-content h2, 
.page-default-content h3, 
.page-default-content h4 {
    font-family: var(--font-heading), sans-serif;
    color: #1d2857;
    margin-top: 2em;
    margin-bottom: 1em;
    font-weight: 700;
}
.page-default-content p {
    margin-bottom: 1.5em;
}
.page-default-content img {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin: 1em 0;
}
.page-default-content a {
    color: #f05a25;
    text-decoration: underline;
}
.page-default-content a:hover {
    color: #c8451a;
}
@media (max-width: 768px) {
    .page-default-wrap { padding-top: 100px; }
    .page-default-title { font-size: 2.2rem; }
}
</style>

<main class="page-default-wrap">
    <div class="page-default-container">
        <?php while (have_posts()) : the_post(); ?>
            
            <h1 class="page-default-title"><?php the_title(); ?></h1>
            
            <div class="page-default-content">
                <?php the_content(); ?>
            </div>
            
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>
