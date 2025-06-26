<?php get_header(); ?>

<div class="page-content">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('page-article'); ?>>
                <header class="page-header">
                    <h1 class="page-title"><?php the_title(); ?></h1>
                    
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="page-featured-image">
                            <?php the_post_thumbnail('ngyro-featured'); ?>
                        </div>
                    <?php endif; ?>
                </header>

                <div class="page-content-area">
                    <div class="content-main">
                        <?php the_content(); ?>
                        
                        <?php
                        wp_link_pages(array(
                            'before' => '<div class="page-links">' . __('Страницы:', 'ngyro'),
                            'after'  => '</div>',
                        ));
                        ?>
                    </div>
                    
                    <?php if (is_active_sidebar('sidebar-1')) : ?>
                        <aside class="page-sidebar">
                            <?php dynamic_sidebar('sidebar-1'); ?>
                        </aside>
                    <?php endif; ?>
                </div>

                <?php if (comments_open() || get_comments_number()) : ?>
                    <div class="page-comments">
                        <?php comments_template(); ?>
                    </div>
                <?php endif; ?>
            </article>
        <?php endwhile; ?>
    </div>
</div>

<style>
.page-content {
    padding: 120px 0 80px;
    min-height: 60vh;
}

.page-article {
    max-width: 1000px;
    margin: 0 auto;
}

.page-header {
    text-align: center;
    margin-bottom: 50px;
}

.page-title {
    font-size: 2.5rem;
    color: var(--primary-color);
    margin-bottom: 20px;
}

.page-featured-image {
    margin-top: 30px;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.2);
}

.page-featured-image img {
    width: 100%;
    height: auto;
}

.page-content-area {
    display: grid;
    grid-template-columns: 1fr 300px;
    gap: 50px;
    align-items: start;
}

.content-main {
    line-height: 1.8;
}

.content-main h2,
.content-main h3,
.content-main h4 {
    color: var(--primary-color);
    margin: 30px 0 15px;
}

.content-main p {
    margin-bottom: 20px;
}

.content-main ul,
.content-main ol {
    margin-bottom: 20px;
    padding-left: 30px;
}

.content-main li {
    margin-bottom: 8px;
}

.page-sidebar {
    background-color: var(--light-gray);
    padding: 30px;
    border-radius: 10px;
}

.page-links {
    text-align: center;
    margin-top: 30px;
}

.page-links a {
    display: inline-block;
    padding: 10px 15px;
    margin: 0 5px;
    background-color: var(--secondary-color);
    color: var(--white);
    text-decoration: none;
    border-radius: 5px;
}

.page-comments {
    margin-top: 50px;
    padding-top: 50px;
    border-top: 2px solid var(--light-gray);
}

@media (max-width: 768px) {
    .page-content-area {
        grid-template-columns: 1fr;
    }
    
    .page-title {
        font-size: 2rem;
    }
}
</style>

<?php get_footer(); ?> 