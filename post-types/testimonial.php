<?php
/**
 * Registers the `testimonial` post type.
 *
 * @package testimonial-cpt
 */

/**
 * Init action to register the post type.
 */
function testimonial_init() {
	register_post_type(
		'testimonial',
		array(
			'labels'                => array(
				'name'                  => __( 'Testimonials', 'testimonial-cpt' ),
				'singular_name'         => __( 'Testimonial', 'testimonial-cpt' ),
				'all_items'             => __( 'All Testimonials', 'testimonial-cpt' ),
				'archives'              => __( 'Testimonial Archives', 'testimonial-cpt' ),
				'attributes'            => __( 'Testimonial Attributes', 'testimonial-cpt' ),
				'insert_into_item'      => __( 'Insert into testimonial', 'testimonial-cpt' ),
				'uploaded_to_this_item' => __( 'Uploaded to this testimonial', 'testimonial-cpt' ),
				'featured_image'        => _x( 'Featured Image', 'testimonial', 'testimonial-cpt' ),
				'set_featured_image'    => _x( 'Set featured image', 'testimonial', 'testimonial-cpt' ),
				'remove_featured_image' => _x( 'Remove featured image', 'testimonial', 'testimonial-cpt' ),
				'use_featured_image'    => _x( 'Use as featured image', 'testimonial', 'testimonial-cpt' ),
				'filter_items_list'     => __( 'Filter testimonials list', 'testimonial-cpt' ),
				'items_list_navigation' => __( 'Testimonials list navigation', 'testimonial-cpt' ),
				'items_list'            => __( 'Testimonials list', 'testimonial-cpt' ),
				'new_item'              => __( 'New Testimonial', 'testimonial-cpt' ),
				'add_new'               => __( 'Add New', 'testimonial-cpt' ),
				'add_new_item'          => __( 'Add New Testimonial', 'testimonial-cpt' ),
				'edit_item'             => __( 'Edit Testimonial', 'testimonial-cpt' ),
				'view_item'             => __( 'View Testimonial', 'testimonial-cpt' ),
				'view_items'            => __( 'View Testimonials', 'testimonial-cpt' ),
				'search_items'          => __( 'Search testimonials', 'testimonial-cpt' ),
				'not_found'             => __( 'No testimonials found', 'testimonial-cpt' ),
				'not_found_in_trash'    => __( 'No testimonials found in trash', 'testimonial-cpt' ),
				'parent_item_colon'     => __( 'Parent Testimonial:', 'testimonial-cpt' ),
				'menu_name'             => __( 'Testimonials', 'testimonial-cpt' ),
			),
			'public'                => true,
			'hierarchical'          => false,
			'show_ui'               => true,
			'show_in_nav_menus'     => true,
			'supports'              => array( 'title', 'editor' ),
			'has_archive'           => true,
			'rewrite'               => true,
			'query_var'             => true,
			'menu_position'         => null,
			'menu_icon'             => 'dashicons-admin-post',
			'show_in_rest'          => true,
			'rest_base'             => 'testimonial',
			'rest_controller_class' => 'WP_REST_Posts_Controller',
		)
	);

}
add_action( 'init', 'testimonial_init' );

/**
 * Sets the post updated messages for the `testimonial` post type.
 *
 * @param  array $messages Post updated messages.
 * @return array Messages for the `testimonial` post type.
 */
function testimonial_updated_messages( $messages ) {
	global $post;

	$permalink = get_permalink( $post );

	$messages['testimonial'] = array(
		0  => '', // Unused. Messages start at index 1.
		/* translators: %s: post permalink */
		1  => sprintf( __( 'Testimonial updated. <a target="_blank" href="%s">View testimonial</a>', 'testimonial-cpt' ), esc_url( $permalink ) ),
		2  => __( 'Custom field updated.', 'testimonial-cpt' ),
		3  => __( 'Custom field deleted.', 'testimonial-cpt' ),
		4  => __( 'Testimonial updated.', 'testimonial-cpt' ),
		/* translators: %s: date and time of the revision */
		5  => isset( $_GET['revision'] ) ? sprintf( __( 'Testimonial restored to revision from %s', 'testimonial-cpt' ), wp_post_revision_title( (int) $_GET['revision'], false ) ) : false, // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		/* translators: %s: post permalink */
		6  => sprintf( __( 'Testimonial published. <a href="%s">View testimonial</a>', 'testimonial-cpt' ), esc_url( $permalink ) ),
		7  => __( 'Testimonial saved.', 'testimonial-cpt' ),
		/* translators: %s: post permalink */
		8  => sprintf( __( 'Testimonial submitted. <a target="_blank" href="%s">Preview testimonial</a>', 'testimonial-cpt' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
		/* translators: 1: Publish box date format, see https://secure.php.net/date 2: Post permalink */
		9  => sprintf( __( 'Testimonial scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview testimonial</a>', 'testimonial-cpt' ), date_i18n( __( 'M j, Y @ G:i', 'testimonial-cpt' ), strtotime( $post->post_date ) ), esc_url( $permalink ) ),
		/* translators: %s: post permalink */
		10 => sprintf( __( 'Testimonial draft updated. <a target="_blank" href="%s">Preview testimonial</a>', 'testimonial-cpt' ), esc_url( add_query_arg( 'preview', 'true', $permalink ) ) ),
	);

	return $messages;
}
add_filter( 'post_updated_messages', 'testimonial_updated_messages' );

/**
 * Sets the bulk post updated messages for the `testimonial` post type.
 *
 * @param  array $bulk_messages Arrays of messages, each keyed by the corresponding post type. Messages are
 *                              keyed with 'updated', 'locked', 'deleted', 'trashed', and 'untrashed'.
 * @param  int[] $bulk_counts   Array of item counts for each message, used to build internationalized strings.
 * @return array Bulk messages for the `testimonial` post type.
 */
function testimonial_bulk_updated_messages( $bulk_messages, $bulk_counts ) {
	$bulk_messages['testimonial'] = array(
		/* translators: %s: Number of testimonials. */
		'updated'   => _n( '%s testimonial updated.', '%s testimonials updated.', $bulk_counts['updated'], 'testimonial-cpt' ),
		'locked'    => ( 1 === $bulk_counts['locked'] ) ? __( '1 testimonial not updated, somebody is editing it.', 'testimonial-cpt' ) :
						/* translators: %s: Number of testimonials. */
						_n( '%s testimonial not updated, somebody is editing it.', '%s testimonials not updated, somebody is editing them.', $bulk_counts['locked'], 'testimonial-cpt' ),
		/* translators: %s: Number of testimonials. */
		'deleted'   => _n( '%s testimonial permanently deleted.', '%s testimonials permanently deleted.', $bulk_counts['deleted'], 'testimonial-cpt' ),
		/* translators: %s: Number of testimonials. */
		'trashed'   => _n( '%s testimonial moved to the Trash.', '%s testimonials moved to the Trash.', $bulk_counts['trashed'], 'testimonial-cpt' ),
		/* translators: %s: Number of testimonials. */
		'untrashed' => _n( '%s testimonial restored from the Trash.', '%s testimonials restored from the Trash.', $bulk_counts['untrashed'], 'testimonial-cpt' ),
	);

	return $bulk_messages;
}
add_filter( 'bulk_post_updated_messages', 'testimonial_bulk_updated_messages', 10, 2 );
