<?php

/**
	* Theme Functions and Set-up
	*
	* @package Brazil Financial
	* @author Sean Creagh
*/



define( 'THEME_DIR', get_template_directory() );
define( 'THEME_URI', get_template_directory_uri() );

define( 'THEME_NAME', 'brazil-financial' );
define( 'THEME_VERSION', '1.0' );

define( 'LIBS_DIR', THEME_DIR . '/functions' );
define( 'LIBS_URI', THEME_DIR . '/functions' );



/* --- Load Theme Functions --- */
require_once( LIBS_DIR . '/theme-head.php' );
require_once( LIBS_DIR . '/theme-widgets.php' );
require_once( LIBS_DIR . '/theme-identity.php' );
require_once( LIBS_DIR . '/theme-breadcrumbs.php' );



/* --- Theme Set-up --- */
function brazil_financial_setup() {

	/*--- Enable Custom Logos Support ---*/
	add_theme_support( 'custom-logo', array (
		'height' => 42,
		'width' => 85,
		'flex-height' => true,
		'flex-width' => true,
		'header-text' => array( 'site-title', 'site-description' )
	));

	/* --- Enables Use of wp_nav_menu(); --- */
	register_nav_menus( array (
		'primary' => __( 'Primary Menu | Main Navigation', 'brazil-financial' )
	));

	/* --- Enable Post Thumbnails Support --- */
	add_theme_support( 'post-thumbnails' );

}

add_action( 'after_setup_theme', 'brazil_financial_setup' );

/* --- Enable Excerpt Support --- */
function excerpt_support() {

	add_post_type_support( 'page', 'excerpt' );

}

add_action( 'init', 'excerpt_support' );

function excerpt_length( $length ) {

	return 60;

}

add_filter( 'excerpt_length', 'excerpt_length', 999 );

function excerpt_read_more( $more ) {

	return '<div><a class="button" href="' . get_permalink( get_the_ID() ) . '">' . __('Read More', '') . '</a></div>';

}

add_filter( 'excerpt_more', 'excerpt_read_more' );



function searchform( $form ) {

	$form = '<form role="search" method="get" class="search-form" action="' . esc_url( home_url( '/' ) ) . '">

			<input type="search" class="search-field remove-spacing" placeholder="Search your Queries" value="' . get_search_query() . '" name="s" />
			<button type="submit" class="search-submit" value="' . esc_attr_x( '', 'submit-button' ) . '"><i class="icon-search"></i>

		</form>';
	
	return $form;

}

add_filter( 'get_search_form', 'searchform', 10 );

?>