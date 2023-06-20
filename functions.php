<?php

//Import database file
require get_template_directory() . '/inc/database.php';
require get_template_directory() . '/inc/reservations.php';
require get_template_directory() . '/inc/options.php';
// Adds stylesheets & JS files
function leregal_styles() {
    //Normalize css
    wp_enqueue_style( 'normalize', get_template_directory_uri() . '/css/normalize.css', array(), '8.0.1');
    //Fontawesome
    wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7.0');
    //Google fonts
    wp_enqueue_style( 'googlefonts', get_template_directory_uri() . '/fonts/stylesheet.css', array(), '1.0.0');
    wp_enqueue_style( 'fluid-box-css', get_template_directory_uri() . '/css/fluidbox.min.css', array(), '1.0.0');
    //Main stylesheet
    wp_enqueue_style( 'main style', get_stylesheet_uri(), array('normalize'), '1.0.0');
    //Load JS files
    wp_enqueue_script('jquery');
	wp_enqueue_script( 'fluid-box-js', get_template_directory_uri() . '/js/jquery.fluidbox.min.js', array('jquery'), '1.0.0', true );
	wp_enqueue_script( 'googlemaps', 'https://maps.googleapis.com/maps/api/js?&callback=initMap' , array(), '', true );
    wp_enqueue_script( 'scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '1.0.0', true );
	wp_localize_script(
		'scripts',
		'options',
		array(
			'latitude' => esc_html(get_option('leregal_gmaps_latitude')),
			'longitude' => esc_html(get_option('leregal_gmaps_longitude')),
			'zoom' => esc_html(get_option('leregal_gmaps_zoom'))
		)
	);
}
//HOOK
add_action( 'wp_enqueue_scripts', 'leregal_styles'); //This hook 'wp_enqueue_scripts' needs wp_head() function in header.php file to work

//Create the menus
function leregal_menus() {
    register_nav_menus( array(
        'main-menu' => ('Main menu'),
        'social-menu' => ('Social menu')
    ));
}
//HOOK
add_action( 'init', 'leregal_menus');

//Add Thumbnail
function leregal_setup(){
    add_theme_support('post-thumbnails');
    add_image_size('boxes', 437, 291, true);
    add_image_size('specilaties', 500, 410, true);
    add_image_size('specialty-portrait', 435, 530, true);
	//Change default size of thubmnails 'by default size from wordpress'
	update_option('thumbnail_size_w', 253);
	update_option('thumbnail_size_h', 164);
    // SEO titles
    add_theme_support('title-tag');
}
add_action( 'after_setup_theme', 'leregal_setup');

//Post type for the specialties
function leregal_specialty_post_type() {

	$labels = array(
		'name'                  => _x( 'Specialties', 'Post Type General Name', 'leregal' ),
		'singular_name'         => _x( 'Specilaty', 'Post Type Singular Name', 'leregal' ),
		'menu_name'             => __( 'Specialties', 'leregal' ),
		'name_admin_bar'        => __( 'Specialties', 'leregal' ),
		'archives'              => __( 'Archive', 'leregal' ),
		'attributes'            => __( 'Attributes', 'leregal' ),
		'parent_item_colon'     => __( 'Parent Specilaty', 'leregal' ),
		'all_items'             => __( 'All Specialties', 'leregal' ),
		'add_new_item'          => __( 'Add Specilaty', 'leregal' ),
		'add_new'               => __( 'Add Specilaty', 'leregal' ),
		'new_item'              => __( 'New Specilaty', 'leregal' ),
		'edit_item'             => __( 'Edit Specilaty', 'leregal' ),
		'update_item'           => __( 'Update Specilaty', 'leregal' ),
		'view_item'             => __( 'View Specilaty', 'leregal' ),
		'view_items'            => __( 'View Specilaty', 'leregal' ),
		'search_items'          => __( 'Search Specilaty', 'leregal' ),
		'not_found'             => __( 'Not found', 'leregal' ),
		'not_found_in_trash'    => __( 'Not found in trash', 'leregal' ),
		'featured_image'        => __( 'Featured Image', 'leregal' ),
		'set_featured_image'    => __( 'Save Featured Image', 'leregal' ),
		'remove_featured_image' => __( 'Remove Featured Image', 'leregal' ),
		'use_featured_image'    => __( 'Use as Featured Image', 'leregal' ),
		'insert_into_item'      => __( 'Insert in Specilaty', 'leregal' ),
		'uploaded_to_this_item' => __( 'Add in Specilaty', 'leregal' ),
		'items_list'            => __( 'Specilaties List', 'leregal' ),
		'items_list_navigation' => __( 'Navigate to Specilaties', 'leregal' ),
		'filter_items_list'     => __( 'Filter Specilaties', 'leregal' ),
	);
	$args = array(
		'label'                 => __( 'Specialty', 'leregal' ),
		'description'           => __( 'Specilaties for leregal Website', 'leregal' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
        'menu_position'         => 6,
        'menu_icon'             => 'dashicons-food',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
        'taxonomies'          => array( 'category' )
	);
	register_post_type( 'specialties', $args );

}
add_action( 'init', 'leregal_specialty_post_type', 0 );

//Widgets Zone
function leregal_widgets(){
	register_sidebar(array(
		'name' => 'Blog Sidebar',
		'id' => 'blog_sidebar',
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>'
	));
}
add_action( 'widgets_init', 'leregal_widgets')

?>
