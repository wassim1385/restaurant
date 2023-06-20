<?php
get_header();
    while(have_posts()):
        the_post(); ?>
        <div class="hero" style="background-image:url(<?php echo get_the_post_thumbnail_url(); ?>);">
            <div class="hero-content text-center">
                <div class="hero-text">
                    <h1 class="text-center"><?php echo esc_html(get_option('blogdescription')); ?></h1>
                    <?php the_content(); ?>
                    <?php $url = get_page_by_title('à propos'); ?>
                    <a class="button primary" href="<?php echo get_permalink($url->ID); ?>">Plus d'info</a>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
        <div class="main-content container">
            <main class="container-grid clear">
                <h2 class="text-center"><?php the_field('title_specilaties'); ?></h2>
                <?php
                    $args = array(
                        'posts_per_page' => 3,
                        'post_type' => 'specialties',
                        'category_name' => 'suite',
                        'orderby' => 'rand'
                    );
                    $specilaties = new WP_Query($args);
                    while($specilaties->have_posts()): $specilaties->the_post(); ?>
                    <div class="specialty columns1-3">
                        <div class="specialty-content">
                            <?php the_post_thumbnail('specialty-portrait'); ?>
                            <div class="specialty-info">
                                <?php the_title('<h3>', '</h3>'); ?>
                                <?php the_content('<p>', '</p>'); ?>
                                <p class="price"><?php the_field('prix'); ?><span> DT</span></p>
                                <a class="button primary" href="<?php the_permalink(); ?>">Voir PLus</a>
                            </div>
                            
                        </div>
                    </div>
                    
                <?php endwhile; wp_reset_postdata(); ?>
            </main>
        </div>
        <section class="ingredients">
            <div class="container">
                <div class="container-grid">
                    <?php
                        while(have_posts()): the_post(); ?>
                        <div class="columns2-4">
                            <div class="ingredients-description">
                                <h3><?php the_field('title_ingredients'); ?></h3>
                                <?php the_field('text_ingredients'); ?>
                                <?php $url = get_page_by_title('à propos'); ?>
                                <a class="button primary" href="<?php echo get_permalink($url->ID); ?>">Voir plus</a>
                            </div>
                        </div>
                        <div class="columns2-4">
                            <div class="ingredients-image">
                                <img src="<?php the_field('ingredients_image'); ?>" alt="Ingrédients frais">
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </section>
        <section class="container clear gallery-section">
            <h2 class="text-center">Gallerie</h2>
            <?php
                $url = get_page_by_title('Gallerie');
                echo get_post_gallery($url->ID);
            ?>
        </section>
        <section class="location-reservation">
            <div class="containr">
                <div class="container-grid">
                    <div class="columns2-4">
                        <div id="map">
                            
                        </div>
                    </div>
                    <div class="columns2-4">
                    <?php get_template_part('templates/reservation', 'form'); ?>
                    </div>
                </div>
            </div>
        </section>
<?php get_footer(); ?>