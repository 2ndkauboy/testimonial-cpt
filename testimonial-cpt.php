<?php
/**
 * Testimonial Post Type
 *
 * @package           testimonial-cpt
 * @author            Bernhard Kau
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Testimonial Post Type
 * Plugin URI:        https://github.com/2ndkauboy/testimonial-cpt/
 * Description:       Register a post type to manage testimonials.
 * Version:           1.0.0
 * Requires at least: 5.5
 * Requires PHP:      7.2
 * Author:            Bernhard Kau
 * Author URI:        https://kau-boys.de
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       testimonial-cpt
 * Domain Path:       /languages
 */

/**
 * Load the translation file for the plugin.
 */
function testimonial_cpt_load_textdomain() {
	load_plugin_textdomain(
		'testimonial-cpt',
		false,
		dirname( plugin_basename( __FILE__ ) ) . '/languages'
	);
}
add_action( 'plugins_loaded', 'testimonial_cpt_load_textdomain' );

/**
 * Filter the allowed block types for the post type.
 *
 * @param bool|array $allowed_block_types Array of block type slugs.
 * @param WP_Post    $post                The post resource data.
 *
 * @return string[]
 */
function testimonial_cpt_allowed_blocks( $allowed_block_types, $post ) {
	if ( 'testimonial' === $post->post_type ) {
		return array(
			'core/paragraph',
			'core/list',
			'core/quote',
			'core/image',
			'core/video',
		);
	}

	return $allowed_block_types;
}
add_action( 'allowed_block_types', 'testimonial_cpt_allowed_blocks', 10, 2 );

require 'post-types/testimonial.php';
require 'taxonomies/testimonial-type.php';
