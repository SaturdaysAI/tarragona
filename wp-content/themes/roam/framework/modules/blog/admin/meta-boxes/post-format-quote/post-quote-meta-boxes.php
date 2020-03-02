<?php

if ( ! function_exists( 'roam_mikado_map_post_quote_meta' ) ) {
	function roam_mikado_map_post_quote_meta() {
		$quote_post_format_meta_box = roam_mikado_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Quote Post Format', 'roam' ),
				'name'  => 'post_format_quote_meta'
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_quote_text_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Text', 'roam' ),
				'description' => esc_html__( 'Enter Quote text', 'roam' ),
				'parent'      => $quote_post_format_meta_box,
			
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_quote_author_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Quote Author', 'roam' ),
				'description' => esc_html__( 'Enter Quote author', 'roam' ),
				'parent'      => $quote_post_format_meta_box,
			)
		);
	}
	
	add_action( 'roam_mikado_meta_boxes_map', 'roam_mikado_map_post_quote_meta', 25 );
}