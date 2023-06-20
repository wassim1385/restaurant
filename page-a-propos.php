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
                <?php the_content(); ?>
            </main>
        </div>
        <div class="box-info container clear">
            <div class="box">
                <?php
                    $image_id = get_field('image_1');
                    $image = wp_get_attachment_image_src( $image_id, 'boxes');
                ?>
                <img src="<?php echo $image[0]; ?>">
                <div class="content-box">
                    <?php the_field('description_1'); ?>
                </div>
            </div>
            <div class="box">
                <?php
                    $image_id = get_field('image_2');
                    $image = wp_get_attachment_image_src( $image_id, 'boxes');
                ?>
                <img src="<?php echo $image[0]; ?>">
                <div class="content-box">
                    <?php the_field('description_2'); ?>
                </div>
            </div>
            <div class="box">
                <?php
                    $image_id = get_field('image_3');
                    $image = wp_get_attachment_image_src( $image_id, 'boxes');
                ?>
                <img src="<?php echo $image[0]; ?>">
                <div class="content-box">
                    <?php the_field('description_3'); ?>
                </div>
            </div>
        </div>
<?php endwhile;
get_footer();
?>