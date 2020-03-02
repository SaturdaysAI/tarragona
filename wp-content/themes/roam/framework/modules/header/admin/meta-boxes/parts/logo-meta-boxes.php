<?php

if ( ! function_exists( 'roam_mikado_logo_meta_box_map' ) ) {
	function roam_mikado_logo_meta_box_map() {
		
		$logo_meta_box = roam_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'roam_mikado_set_scope_for_meta_boxes', array( 'page', 'post' ) ),
				'title' => esc_html__( 'Logo', 'roam' ),
				'name'  => 'logo_meta'
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Default', 'roam' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'roam' ),
				'parent'      => $logo_meta_box
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_dark_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Dark', 'roam' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'roam' ),
				'parent'      => $logo_meta_box
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_light_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Light', 'roam' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'roam' ),
				'parent'      => $logo_meta_box
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_sticky_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Sticky', 'roam' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'roam' ),
				'parent'      => $logo_meta_box
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_logo_image_mobile_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Logo Image - Mobile', 'roam' ),
				'description' => esc_html__( 'Choose a default logo image to display ', 'roam' ),
				'parent'      => $logo_meta_box
			)
		);
	}
	
	add_action( 'roam_mikado_meta_boxes_map', 'roam_mikado_logo_meta_box_map', 47 );
}