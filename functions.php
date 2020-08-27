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
		'uku-drk-style',
		get_stylesheet_directory_uri() . $main_css_file,
		array( 'uku-style' ),
		$modified
	);
}
add_action( 'wp_enqueue_scripts', 'uku_drk_theme_enqueue_styles' );

/**
 * Overwrite some parent theme settings.
 */
function uku_drk_after_setup_theme() {
	add_theme_support( 'custom-logo' );
}
add_action( 'after_setup_theme', 'uku_drk_after_setup_theme', 11 );

/**
 * Dequeue parent theme Google Fonts.
 */
function uku_drk_denqueue_scripts() {
	wp_dequeue_style( 'uku-fonts' );
}
add_action( 'wp_enqueue_scripts', 'uku_drk_denqueue_scripts', 11 );
add_action( 'enqueue_block_editor_assets', 'uku_drk_denqueue_scripts', 11 );

/**
 * Disable some parent theme functions and hooks.
 */
function uku_drk_disable_customize_css() {
	remove_action( 'wp_head', 'uku_customize_css' );
}
add_action( 'init', 'uku_drk_disable_customize_css', 11 );

/**
 * Disable some parent theme customizer settings.
 */
function uku_drk_customize_deregister() {
	global $wp_customize;

	$wp_customize->remove_setting( 'uku_link_color' );
	$wp_customize->remove_setting( 'uku_linkhover_color' );
	$wp_customize->remove_setting( 'uku_footer_bg_color' );
	$wp_customize->remove_setting( 'uku_footer_text_color' );
	$wp_customize->remove_setting( 'uku_offcanvas_bg_color' );
	$wp_customize->remove_setting( 'uku_offcanvas_text_color' );
	$wp_customize->remove_setting( 'uku_frontsection_bg_color' );
	$wp_customize->remove_setting( 'uku_subscribe_bg_color' );
	$wp_customize->remove_setting( 'uku_aboutsection_bg_color' );
	$wp_customize->remove_setting( 'uku_shopcats_bg_color' );
}
add_action( 'customize_register', 'uku_drk_customize_deregister', 11 );
