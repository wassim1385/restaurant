<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Make this IOS compatible -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-icon" content="Restaurant le régal">
    <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/apple-touch-icon.jpg">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="site-header">
        <div class="container">
            <div class="logo">
                <a href="<?php echo esc_url(home_url()); ?>">
                    <img src="<?php echo get_template_directory_uri() . '/img/logo.svg'; ?> ">
                </a>
            </div><!--. logo -->
            <div class="header-info">
                <div class="social-menu">
                    <?php
                        $args = array(
                            'menu' => 'Social menu', /* Must use this 'menu' when you have more than 1 menu per page */
                            'theme-location' => 'social-menu',
                            'container' => 'nav',
                            'container_class' => 'socials',
                            'container_id' => 'socials',
                            'link_before' => '<span class="sr-text">',
                            'link_after' => '</span>'
                        );
                        wp_nav_menu($args);
                    ?>
                </div><!-- .social-menu -->
                <div class="address clear"><!-- clear class also exists in the style.css in the line 125 so I can delete it from here, just I keep it here for education purpose -->
                    <p><?php echo esc_html(get_option('leregal_gmaps_address')); ?></p>
                    <p>Numéro Tél: <?php echo esc_html(get_option('leregal_gmaps_mobile')); ?></p>
                </div><!-- .address -->
            </div><!-- .header-info -->
        </div><!-- .container -->
    </header>
    <div class="main-menu container">
        <div class="mobile-menu">
            <span class="mobile"><i class="fa fa-bars"></i>Menu</span>
        </div>
        <div class="navigation">
            <?php
                $args = array(
                    'menu' => 'Main menu', /* Must use this 'menu' when you have more than 1 menu per page */
                    'theme-location' => 'main-menu',
                    'container' => 'nav',
                    'container_class' => 'site-nav'
                );
                wp_nav_menu($args);
            ?>
        </div>
    </div>
    
