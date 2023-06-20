<?php
/*
* Template Name: Page Contact
*/
get_header();
    while(have_posts()):
        the_post(); ?>
        <div class="hero" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>);">
            <div class="hero-content">
                <div class="hero-text">
                    <h1 class="text-center"><?php the_title(); ?></h1>
                </div>
            </div>
        </div>
        <div class="main-content container reservation">
            <main class="content-text">
                <?php get_template_part('templates/reservation', 'form'); ?>
            </main>
        </div>
<?php endwhile;
get_footer();

?>