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

require 'post-types/testimonial.php';
require 'taxonomies/testimonial-type.php';
