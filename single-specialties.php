<?php
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
        <div class="main-content container">
            <main class="content-text text-center">
                <p class="ingredients">Ingrédients:</p>
                <?php the_content(); ?>
                <p class="price">Prix: <span><?php the_field('prix'); ?> DT</span></p>
            </main>
        </div>
<?php endwhile;
get_footer();

?>