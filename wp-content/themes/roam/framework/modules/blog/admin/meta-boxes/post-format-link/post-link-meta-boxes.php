<?php

if ( ! function_exists( 'roam_mikado_map_post_link_meta' ) ) {
	function roam_mikado_map_post_link_meta() {
		$link_post_format_meta_box = roam_mikado_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Link Post Format', 'roam' ),
				'name'  => 'post_format_link_meta'
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_link_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Link', 'roam' ),
				'description' => esc_html__( 'Enter link', 'roam' ),
				'parent'      => $link_post_format_meta_box,
			
			)
		);
	}
	
	add_action( 'roam_mikado_meta_boxes_map', 'roam_mikado_map_post_link_meta', 24 );
}