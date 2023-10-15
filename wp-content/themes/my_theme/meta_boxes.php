<?php
/**
 * Registering meta boxes
 *
 * All the definitions of meta boxes are listed below with comments.
 * Please read them CAREFULLY.
 *
 * You also should read the changelog to know what has been changed before updating.
 *
 * For more information, please visit:
 * @link http://metabox.io/docs/registering-meta-boxes/
 */
add_filter( 'rwmb_meta_boxes', 'make_meta_boxes' );
/**
 * Register meta boxes
 *
 * Remember to change "your_prefix" to actual prefix in your project
 *
 * @param array $meta_boxes List of meta boxes
 *
 * @return array
 */
function make_meta_boxes( $meta_boxes ) {
	/**
	 * prefix of meta keys (optional)
	 * Use underscore (_) at the beginning to make keys hidden
	 * Alt.: You also can make prefix empty to disable it
	 */
	// Better has an underscore as last sign
	$prefix       = 'meta_select_post_';
	$meta_boxes[] = array(
		'title'  => 'Выбор страниц для дополнительного оборудования и похожих аттракционов:',
		'fields' => array(
			// POST
			array(
				'name'        => 'Дополнительное оборудование',
				'id'          => "{$prefix}posts",
				'type'        => 'post',
				'clone'       => 'true',
				// Post type
				'post_type'   => 'post',
				// Field type, either 'select' or 'select_advanced' (default)
				'field_type'  => 'select_advanced',
				'placeholder' => 'Выберите страницу',
				// Query arguments (optional). No settings means get all published posts
				'query_args'  => array(
					'post_status'    => 'publish',
					'posts_per_page' => - 1,
				)
			),
			array(
				'name'        => 'Похожие аттракционы',
				'id'          => "{$prefix}dopattrakcion",
				'type'        => 'post',
				'clone'       => 'true',
				// Post type
				'post_type'   => 'post',
				// Field type, either 'select' or 'select_advanced' (default)
				'field_type'  => 'select_advanced',
				'placeholder' => 'Выберите страницу',
				// Query arguments (optional). No settings means get all published posts
				'query_args'  => array(
					'post_status'    => 'publish',
					'posts_per_page' => - 1,
				)
			),
		)
	);

	return $meta_boxes;
}
