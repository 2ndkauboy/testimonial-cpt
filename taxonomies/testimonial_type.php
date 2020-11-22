<?php

/**
 * Registers the `testimonial_type` taxonomy,
 * for use with 'taxonomy'.
 */
function testimonial_type_init() {
	register_taxonomy( 'testimonial_type', array( 'taxonomy' ), array(
		'hierarchical'      => false,
		'public'            => true,
		'show_in_nav_menus' => true,
		'show_ui'           => true,
		'show_admin_column' => false,
		'query_var'         => true,
		'rewrite'           => true,
		'capabilities'      => array(
			'manage_terms'  => 'edit_posts',
			'edit_terms'    => 'edit_posts',
			'delete_terms'  => 'edit_posts',
			'assign_terms'  => 'edit_posts',
		),
		'labels'            => array(
			'name'                       => __( 'Types', 'testimonial-cpt' ),
			'singular_name'              => _x( 'Type', 'taxonomy general name', 'testimonial-cpt' ),
			'search_items'               => __( 'Search Types', 'testimonial-cpt' ),
			'popular_items'              => __( 'Popular Types', 'testimonial-cpt' ),
			'all_items'                  => __( 'All Types', 'testimonial-cpt' ),
			'parent_item'                => __( 'Parent Type', 'testimonial-cpt' ),
			'parent_item_colon'          => __( 'Parent Type:', 'testimonial-cpt' ),
			'edit_item'                  => __( 'Edit Type', 'testimonial-cpt' ),
			'update_item'                => __( 'Update Type', 'testimonial-cpt' ),
			'view_item'                  => __( 'View Type', 'testimonial-cpt' ),
			'add_new_item'               => __( 'Add New Type', 'testimonial-cpt' ),
			'new_item_name'              => __( 'New Type', 'testimonial-cpt' ),
			'separate_items_with_commas' => __( 'Separate Types with commas', 'testimonial-cpt' ),
			'add_or_remove_items'        => __( 'Add or remove Types', 'testimonial-cpt' ),
			'choose_from_most_used'      => __( 'Choose from the most used Types', 'testimonial-cpt' ),
			'not_found'                  => __( 'No Types found.', 'testimonial-cpt' ),
			'no_terms'                   => __( 'No Types', 'testimonial-cpt' ),
			'menu_name'                  => __( 'Types', 'testimonial-cpt' ),
			'items_list_navigation'      => __( 'Types list navigation', 'testimonial-cpt' ),
			'items_list'                 => __( 'Types list', 'testimonial-cpt' ),
			'most_used'                  => _x( 'Most Used', 'testimonial_type', 'testimonial-cpt' ),
			'back_to_items'              => __( '&larr; Back to Types', 'testimonial-cpt' ),
		),
		'show_in_rest'      => true,
		'rest_base'         => 'testimonial_type',
		'rest_controller_class' => 'WP_REST_Terms_Controller',
	) );

}
add_action( 'init', 'testimonial_type_init' );

/**
 * Sets the post updated messages for the `testimonial_type` taxonomy.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `testimonial_type` taxonomy.
 */
function testimonial_type_updated_messages( $messages ) {

	$messages['testimonial_type'] = array(
		0 => '', // Unused. Messages start at index 1.
		1 => __( 'Type added.', 'testimonial-cpt' ),
		2 => __( 'Type deleted.', 'testimonial-cpt' ),
		3 => __( 'Type updated.', 'testimonial-cpt' ),
		4 => __( 'Type not added.', 'testimonial-cpt' ),
		5 => __( 'Type not updated.', 'testimonial-cpt' ),
		6 => __( 'Types deleted.', 'testimonial-cpt' ),
	);

	return $messages;
}
add_filter( 'term_updated_messages', 'testimonial_type_updated_messages' );
