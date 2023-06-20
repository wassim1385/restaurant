<?php
/*
* Template Name: Page menu
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
        <div class="main-content container">
            <main class="content-text text-center">
                <?php the_content(); ?>
            </main>
        </div>
    <?php endwhile; ?>
        <div class="specialties container">
            <h3 class="">Entrées</h3>
            <div class="container-grid grid-menu">
                <?php
                    $args = array(
                        'post_type' => 'specialties',
                        'posts_per_page' => -1,
                        'order_by' => 'title',
                        'order' =>'ASC',
                        'category_name' => 'entrees'
                    );
                    $specilties = new WP_Query($args);
                    while($specilties->have_posts()): $specilties->the_post(); ?>
                        <div class="columns2-4 speciality-content">
                            <a href="<?php the_permalink(); ?>">
                                <div class="specilaty-img">
                                    <?php the_post_thumbnail('specilaties'); ?>
                                </div>
                                <h4><?php the_title(); ?><span><?php the_field('prix'); ?> DT</span></h4>
                                <?php the_content(); ?>
                            </a>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
            </div>
            <h3>Suites</h3>
            <div class="container-grid grid-menu">
                <?php
                    $args = array(
                        'post_type' => 'specialties',
                        'posts_per_page' => -1,
                        'order_by' => 'title',
                        'order' =>'ASC',
                        'category_name' => 'suite'
                    );
                    $specilties = new WP_Query($args);
                    while($specilties->have_posts()): $specilties->the_post(); ?>
                        <div class="columns2-4 speciality-content">
                            <a href="<?php the_permalink(); ?>">
                                <div class="specilaty-img">
                                    <?php the_post_thumbnail('specilaties'); ?>
                                </div>
                                <h4><?php the_title(); ?><span><?php the_field('prix'); ?> DT</span></h4>
                                <?php the_content(); ?>
                            </a>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
            </div>
            <h3>Desserts & Boissons</h3>
            <div class="container-grid grid-menu">
                <?php
                    $args = array(
                        'post_type' => 'specialties',
                        'posts_per_page' => -1,
                        'order_by' => 'title',
                        'order' =>'ASC',
                        'category_name' => 'dessert,boissons' /* show specialties with dessert or boissons category name  */
                    );
                    $specilties = new WP_Query($args);
                    while($specilties->have_posts()): $specilties->the_post(); ?>
                        <div class="columns2-4 speciality-content">
                            <a href="<?php the_permalink(); ?>">
                                <div class="specilaty-img">
                                    <?php the_post_thumbnail('specilaties'); ?>
                                </div>
                                <h4><?php the_title(); ?><span><?php the_field('prix'); ?> DT</span></h4>
                                <?php the_content(); ?>
                            </a>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
            </div>
        </div>

<?php get_footer(); ?>