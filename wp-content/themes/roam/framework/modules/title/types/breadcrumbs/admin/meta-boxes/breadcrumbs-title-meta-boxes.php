<?php

if ( ! function_exists( 'roam_mikado_breadcrumbs_title_type_options_meta_boxes' ) ) {
	function roam_mikado_breadcrumbs_title_type_options_meta_boxes( $show_title_area_meta_container ) {
		
		roam_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_breadcrumbs_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Breadcrumbs Color', 'roam' ),
				'description' => esc_html__( 'Choose a color for breadcrumbs text', 'roam' ),
				'parent'      => $show_title_area_meta_container
			)
		);
	}
	
	add_action( 'roam_mikado_additional_title_area_meta_boxes', 'roam_mikado_breadcrumbs_title_type_options_meta_boxes' );
}