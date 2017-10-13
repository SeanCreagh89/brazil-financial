<?php

/**
	* Theme Widgets and Sidebars
	*
	* @package Brazil Financial
	* @author Sean Creagh
*/



function theme_widgets() {

	/* --- Header Widgets --- */
	for ($i = 1; $i <= 3; $i++) {

		register_sidebar(array(
			'name' => __('Header', 'theme-widgets') . ' | ' . $i,
			'id' => 'header-widget-' . $i,
			'description' => __('Appears at the top of the site', 'brazil-financial'),
			'before_title' => '<h1>',
			'after_title' => '</h1>'
		));

	}

	register_sidebar(array(
		'name' => __('Header | Search', 'theme-widgets'),
		'id' => 'header-widget-s',
		'description' => __('Intended for use with Search widget', 'brazil-financial'),
		'before_title' => '<h1>',
		'after_title' => '</h1>'
	));

	register_sidebar(array(
		'name' => __('Header | Breadcrumbs', 'theme-widgets'),
		'id' => 'header-widget-b',
		'description' => __('Appears right of breadcrumbs', 'brazil-financial'),
		'before_title' => '<h1>',
		'after_title' => '</h1>'
	));



	/* --- Footer Widgets  --- */
	for ($i = 1; $i <= 4; $i++) {

		register_sidebar(array(
			'name' => __('Footer', 'theme-widgets') . ' | ' . $i,
			'id' => 'footer-widget-' . $i,
			'description' => __('Appears in the footer section of the site.', 'brazil-financial'),
			'before_title' => '<h1>',
			'after_title' => '</h1>'
		));

	}

	register_sidebar(array(
		'name' => __('Footer | Footnote', 'theme-widgets'),
		'id' => 'footer-widget-fn',
		'description' => __('Appears in the footnote section of the site', 'brazil-financial'),
		'before_title' => '<h1>',
		'after_title' => '</h1>'
	));

}

add_action( 'widgets_init', 'theme_widgets' );

?>