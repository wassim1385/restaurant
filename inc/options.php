<?php
    function leregal_options(){
        add_menu_page('Le regal', 'Le regal Options', 'administrator', 'leregal_options', 'leregal_adjustments', 'dashicons-admin-generic', 20);
        add_submenu_page('leregal_options', 'Reservations', 'Reservations', 'administrator', 'leregal_reservations', 'leregal_reservations');
        add_submenu_page('leregal_options', 'Feedback', 'Feedback', 'administrator', 'leregal_feedback', 'leregal_feedback');
    }
    function lergal_settings(){
        //Google maps group
        register_setting('leregal_options_gmaps', 'leregal_gmaps_latitude');
        register_setting('leregal_options_gmaps', 'leregal_gmaps_longitude');
        register_setting('leregal_options_gmaps', 'leregal_gmaps_zoom');
        //Information group
        register_setting('leregal_options_info', 'leregal_gmaps_address');
        register_setting('leregal_options_info', 'leregal_gmaps_mobile');
        //Feedback group
        register_setting('leregal_feedback_info', 'leregal_feedback');
    }
    add_action('init', 'lergal_settings');
    function leregal_adjustments(){ ?>
        <div class="wrap">
            <h1>Le regal adjusments</h1>
            <form action="options.php" method="post">
                <?php
                    settings_fields('leregal_options_gmaps');
                    do_settings_sections('leregal_options_gmaps');
                ?>
                <h2>Google maps</h2>
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row">Latitude:</th>
                        <td>
                            <input type="text" name="leregal_gmaps_latitude" value="<?php echo esc_attr(get_option('leregal_gmaps_latitude')); ?>">
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Longitude:</th>
                        <td>
                            <input type="text" name="leregal_gmaps_longitude" value="<?php echo esc_attr(get_option('leregal_gmaps_longitude')); ?>">
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Zoom:</th>
                        <td>
                            <input type="number" min="12" max="21" name="leregal_gmaps_zoom" value="<?php echo esc_attr(get_option('leregal_gmaps_zoom')); ?>">
                        </td>
                    </tr>
                </table>
                <?php
                    settings_fields('leregal_options_info');
                    do_settings_sections('leregal_options_info');
                ?>
                <h2>Autres Options</h2>
                <table class="form-table">
                    <tr valign="top">
                        <th scope="row">Saisir l'addresse de votre restaurant:</th>
                        <td>
                            <input type="text" name="leregal_gmaps_address" value="<?php echo esc_attr(get_option('leregal_gmaps_address')); ?>">
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row">Saisir le numéro mobile de votre restaurant:</th>
                        <td>
                            <input type="text" name="leregal_gmaps_mobile" value="<?php echo esc_attr(get_option('leregal_gmaps_mobile')); ?>">
                        </td>
                    </tr>
                </table>
                <?php
                    settings_fields('leregal_feedback_info');
                    do_settings_sections('leregal_feedback_info');
                ?>
                <table class="form-table">
                    <h2>Changer le titre de la page feedback:</h2>
                    <tr valign="top">
                        <th scope="row">Saisir le numéro mobile de votre restaurant:</th>
                        <td>
                            <input type="text" name="leregal_feedback" value="<?php echo esc_attr(get_option('leregal_feedback')); ?>">
                        </td>
                    </tr>
                </table>
                <?php submit_button(); ?>
            </form>
        </div>
    <?php }
    function leregal_reservations(){ ?>
        <div class="wrap">
            <h1>Liste des réservations</h1>
            <table class="wp-list-table widefat striped">
                <thead>
                    <tr>
                    <th class="manage-column">Numéro</th>
                        <th class="manage-column">Nom du client</th>
                        <th class="manage-column">Date de réservation</th>
                        <th class="manage-column">Email</th>
                        <th class="manage-column">Téléphone</th>
                        <th class="manage-column">Message</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        global $wpdb;
                        $table = $wpdb->prefix .'reservation';
                        $reservations = $wpdb->get_results("SELECT * from $table", ARRAY_A);
                        $i = 1;
                        foreach($reservations as $reservation): ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $reservation['name']; ?></td>
                                <td><?php echo $reservation['date']; ?></td>
                                <td><?php echo $reservation['email']; ?></td>
                                <td><?php echo $reservation['phone']; ?></td>
                                <td><?php echo $reservation['message']; ?></td>
                            </tr>
                        <?php $i++; endforeach ; ?>
                </tbody>
            </table>
        </div>
    <?php }
    function leregal_feedback(){
        echo'erferferf';
    }

add_action('admin_menu' , 'leregal_options');
?>