<?php

if ( ! function_exists( 'roam_mikado_get_hide_dep_for_header_standard_meta_boxes' ) ) {
	function roam_mikado_get_hide_dep_for_header_standard_meta_boxes() {
		$hide_dep_options = apply_filters( 'roam_mikado_header_standard_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'roam_mikado_header_standard_meta_map' ) ) {
	function roam_mikado_header_standard_meta_map( $parent ) {
		$hide_dep_options = roam_mikado_get_hide_dep_for_header_standard_meta_boxes();
		
		roam_mikado_create_meta_box_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'mkdf_set_menu_area_position_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Menu Area Position', 'roam' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'roam' ),
				'options'         => array(
					''       => esc_html__( 'Default', 'roam' ),
					'left'   => esc_html__( 'Left', 'roam' ),
					'right'  => esc_html__( 'Right', 'roam' ),
					'center' => esc_html__( 'Center', 'roam' )
				),
				'hidden_property' => 'mkdf_header_type_meta',
				'hidden_values'   => $hide_dep_options
			)
		);
	}
	
	add_action( 'roam_mikado_additional_header_area_meta_boxes_map', 'roam_mikado_header_standard_meta_map' );
}