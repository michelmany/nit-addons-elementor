<?php

namespace NIT_Addons_Elementor\Classes;

class NIT_Posts_Helper {

	/**
	 * Get All Posts by Post Type.
	 *
	 * @since 1.0.0
	 * @param string $post_type Post type.
	 */
	public static function get_all_posts_by_type( $post_type ) {

		$post_list = get_posts(
			array(
				'post_type'      => $post_type,
				'orderby'        => 'date',
				'order'          => 'DESC',
				'posts_per_page' => -1,
			)
		);

		$posts = array();

		if ( ! empty( $post_list ) && ! is_wp_error( $post_list ) ) {
			foreach ( $post_list as $post ) {
				$posts[ $post->ID ] = $post->post_title;
			}
		}

		return $posts;
	}
}