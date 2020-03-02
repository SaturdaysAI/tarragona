<?php

if ( ! function_exists( 'roam_mikado_get_hide_dep_for_header_standard_options' ) ) {
	function roam_mikado_get_hide_dep_for_header_standard_options() {
		$hide_dep_options = apply_filters( 'roam_mikado_header_standard_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'roam_mikado_header_standard_map' ) ) {
	function roam_mikado_header_standard_map( $parent ) {
		$hide_dep_options = roam_mikado_get_hide_dep_for_header_standard_options();
		
		roam_mikado_add_admin_field(
			array(
				'parent'          => $parent,
				'type'            => 'select',
				'name'            => 'set_menu_area_position',
				'default_value'   => 'right',
				'label'           => esc_html__( 'Choose Menu Area Position', 'roam' ),
				'description'     => esc_html__( 'Select menu area position in your header', 'roam' ),
				'options'         => array(
					'right'  => esc_html__( 'Right', 'roam' ),
					'left'   => esc_html__( 'Left', 'roam' ),
					'center' => esc_html__( 'Center', 'roam' )
				),
				'hidden_property' => 'header_type',
				'hidden_values'   => $hide_dep_options
			)
		);
	}
	
	add_action( 'roam_mikado_additional_header_menu_area_options_map', 'roam_mikado_header_standard_map' );
}