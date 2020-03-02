<?php

if ( ! function_exists( 'roam_mikado_set_title_standard_type_for_options' ) ) {
	/**
	 * This function set standard title type value for title options map and meta boxes
	 */
	function roam_mikado_set_title_standard_type_for_options( $type ) {
		$type['standard'] = esc_html__( 'Standard', 'roam' );
		
		return $type;
	}
	
	add_filter( 'roam_mikado_title_type_global_option', 'roam_mikado_set_title_standard_type_for_options' );
	add_filter( 'roam_mikado_title_type_meta_boxes', 'roam_mikado_set_title_standard_type_for_options' );
}

if ( ! function_exists( 'roam_mikado_set_title_standard_type_as_default_options' ) ) {
	/**
	 * This function set default title type value for global title option map
	 */
	function roam_mikado_set_title_standard_type_as_default_options( $type ) {
		$type = 'standard';
		
		return $type;
	}
	
	add_filter( 'roam_mikado_default_title_type_global_option', 'roam_mikado_set_title_standard_type_as_default_options' );
}