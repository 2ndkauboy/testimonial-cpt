<?php
/**
 * UKU - DRK-Landesverband Brandenburg e.V. Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package uku-drk
 */

/**
 * Enqueue scripts and styles.
 */
function uku_drk_theme_enqueue_styles() {
	$main_css_file = '/style.css';
	$modified      = gmdate( 'YmdHi', filemtime( get_stylesheet_directory() . $main_css_file ) );

	wp_enqueue_style(
		'uku-style',
		get_template_directory_uri() . '/style.css',
		null,
		'1.8.1'
	);

	wp_enqueue_style(
		'uku-tgzpm-style',
		get_stylesheet_directory_uri() . $main_css_file,
		array( 'uku-style' ),
		$modified
	);
}
add_action( 'wp_enqueue_scripts', 'uku_drk_theme_enqueue_styles' );
