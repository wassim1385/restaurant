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
            <main class="content-text">
                <div class="entry-info">
                    <div class="date">
                        <time>
                            <?php echo the_time('d'); ?>
                            <span><?php echo the_time('M'); ?></span>
                        </time>
                    </div>
                    <p class="author">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <?php the_author(); ?>
                    </p>
                </div>
                <?php the_content(); ?>
            </main>
        </div>
<?php endwhile;
get_footer();

?>