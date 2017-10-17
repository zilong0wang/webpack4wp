<?php
/**
 * Custom post types and taxonomies
 */

add_action( 'init', 'custom_post_types' );
function custom_post_types() {
	$custom_post_types = array(
		/* 'sample_post'   => array(
			'name'       => 'Sample Posts',
			'singular'   => 'Sample Post',
			'slug'       => 'sample_post',
			'supports'   => array( 'title', 'editor', 'thumbnail' ),
			'menu_icon' => 'dashicons-star-filled'
		), */
		// add more here
	);

	foreach ( $custom_post_types as $type_name => $type_attr ) {
		register_post_type( $type_name,
			array(
				'labels'      => array(
					'name'          => $type_attr['name'],
					'singular_name' => $type_attr['singular']
				),
				'public'      => true,
				'has_archive' => true,
				'supports'    => $type_attr['supports'],
				'rewrite'     => array( 'slug' => $type_attr['slug'] ),
				'menu_icon'   => $type_attr['menu_icon']
			)
		);
	}
}
