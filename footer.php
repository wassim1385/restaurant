    <footer class="text-center">
        <?php
            $args = array(
                'menu' => 'Main menu',
                'theme-location' => 'main-menu',
                'container' => 'nav',
                'after' => '<span class="seperator"> | </span>'
            );
            wp_nav_menu($args);
        ?>
        <div class="location">
            <p><?php echo esc_html(get_option('leregal_gmaps_address')); ?></p>
            <p>Numéro Tél: <?php echo esc_html(get_option('leregal_gmaps_mobile')); ?></p>
        </div>
        <p class="copyright">All Rights Reserved <?php echo date('Y'); ?></p>
    </footer>
    <?php wp_footer(); ?>
</body>
</html>