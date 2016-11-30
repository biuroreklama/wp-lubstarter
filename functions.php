<?php
add_action( 'after_setup_theme', 'register_my_menu' );
function register_my_menu() {
  register_nav_menu( 'primary', __( 'Primary Menu', 'lubstarter' ) );
    register_nav_menu( 'primary_bottom', __( 'Primary Bottom Menu', 'lubstarter' ) );
}
require_once('wp_bootstrap_navwalker.php');
add_theme_support( 'post-thumbnails' );

function lubstarter_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Logo', 'lubstarter' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'lubstarter' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
  register_sidebar( array(
		'name'          => __( 'Blog-sidebar', 'lubstarter' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'lubstarter' ),
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
}
add_action( 'widgets_init', 'lubstarter_widgets_init' );

add_filter( 'get_the_archive_title', function ($title) {

    if ( is_category() ) {

            $title = single_cat_title( '', false );

        } elseif ( is_tag() ) {

            $title = single_tag_title( '', false );

        } elseif ( is_author() ) {

            $title = '<span class="vcard">' . get_the_author() . '</span>' ;

        }

    return $title;

});


function lubstarter_content_image_sizes_attr( $sizes, $size ) {
	$width = $size[0];
	840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';
	if ( 'page' === get_post_type() ) {
		840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	} else {
		840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
		600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
	}
	return $sizes;
}
add_filter( 'wp_calculate_image_sizes', 'lubstarter_content_image_sizes_attr', 10 , 2 );

function lubstarter_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		! is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'lubstarter_post_thumbnail_sizes_attr', 10 , 3 );


function lubstarter_prefix_setup() {

	add_theme_support( 'custom-logo', array(
		'height'      => 100,
		'width'       => 400,
		'flex-width' => true,
    'flex-height' => true,
    	'header-text' => array( 'site-title', 'site-description' ),
	) );

}
add_action( 'after_setup_theme', 'lubstarter_prefix_setup' );
function lubstarter_prefix_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}

if ( ! function_exists('lubstarter_cpt_slider') ) {
// Register Custom Post Type
function lubstarter_cpt_slider() {
	$labels = array(
		'name'                => _x( 'Slajdy', 'Post Type General Name', 'lubstarter' ),
		'singular_name'       => _x( 'Slajd', 'Post Type Singular Name', 'lubstarter' ),
		'menu_name'           => __( 'SG Slider', 'lubstarter' ),
		'name_admin_bar'      => __( 'SG Slider', 'lubstarter' ),
		'parent_item_colon'   => __( 'Parent Item:', 'lubstarter' ),
		'all_items'           => __( 'Wszystkie slajdy', 'lubstarter' ),
		'add_new_item'        => __( 'Dodaj nowy slajd', 'lubstarter' ),
		'add_new'             => __( 'Dodaj nowy', 'lubstarter' ),
		'new_item'            => __( 'Nowy element', 'lubstarter' ),
		'edit_item'           => __( 'Edit Item', 'lubstarter' ),
		'update_item'         => __( 'Update Item', 'lubstarter' ),
		'view_item'           => __( 'View Item', 'lubstarter' ),
		'search_items'        => __( 'Search Item', 'lubstarter' ),
		'not_found'           => __( 'Nie znaleziono', 'lubstarter' ),
		'not_found_in_trash'  => __( 'Nie znaleziono w koszu', 'lubstarter' ),
	);

	$args = array(
		'label'               => __( 'slider', 'lubstarter' ),
		'description'         => __( 'Custom Post Types Slider', 'lubstarter' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'thumbnail', 'editor', 'excerpt' ),
		'taxonomies'          => array( ),
		'hierarchical'        => false,
		'public'              => false, // not show frontend as post
		'show_ui'             => true,
		'show_in_menu'        => true,
		'menu_position'       => 5,
		'menu_icon'           => 'dashicons-slides',
		'show_in_admin_bar'   => true,
		'show_in_nav_menus'   => true,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'slider', $args );
}
// Hook into the 'init' action
add_action( 'init', 'lubstarter_cpt_slider', 0 );
}

