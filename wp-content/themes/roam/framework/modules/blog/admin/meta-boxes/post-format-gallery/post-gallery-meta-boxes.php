<?php

if ( ! function_exists( 'roam_mikado_map_post_gallery_meta' ) ) {
	
	function roam_mikado_map_post_gallery_meta() {
		$gallery_post_format_meta_box = roam_mikado_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Gallery Post Format', 'roam' ),
				'name'  => 'post_format_gallery_meta'
			)
		);
		
		roam_mikado_add_multiple_images_field(
			array(
				'name'        => 'mkdf_post_gallery_images_meta',
				'label'       => esc_html__( 'Gallery Images', 'roam' ),
				'description' => esc_html__( 'Choose your gallery images', 'roam' ),
				'parent'      => $gallery_post_format_meta_box,
			)
		);
	}
	
	add_action( 'roam_mikado_meta_boxes_map', 'roam_mikado_map_post_gallery_meta', 21 );
}
