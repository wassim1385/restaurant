<?php
get_header(); ?>

    <?php
        /* puisque c'est la page blog donc l'affichage du thumbnail n'est comme les autres pages */
        $blog_page = get_option('page_for_posts');
        $image = get_post_thumbnail_id($blog_page);
        $image = wp_get_attachment_image_src($image, 'full');
    ?>
    <div class="hero" style="background-image:url(<?php echo $image[0]; ?>);">
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="text-center"><?php echo get_the_title($blog_page); ?></h1>
            </div>
        </div>
    </div>
    <div class="main-content container">
        <div class="container-grid">
            <main class="content-text columns2-3">
                <?php 
                    while(have_posts()): the_post(); ?>
                    <article class="entry">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_post_thumbnail('specilaties'); ?>
                        </a>
                        <header class="entry-header clear">
                            <div class="date">
                                <time>
                                    <?php echo the_time('d'); ?>
                                    <span><?php echo the_time('M'); ?></span>
                                </time>
                            </div>
                            <div class="entry-title">
                                <?php the_title('<h2>', '</h2>'); ?>
                                <p class="author">
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <?php the_author(); ?>
                                </p>
                            </div>
                        </header>
                        <div class="entry-content">
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>" class="button primary">Voir plus</a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </main>
            <?php get_sidebar(); ?>
        </div>
    </div>

<?php get_footer();

?>