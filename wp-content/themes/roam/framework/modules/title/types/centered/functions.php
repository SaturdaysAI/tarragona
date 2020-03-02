<?php

if ( ! function_exists( 'roam_mikado_set_title_centered_type_for_options' ) ) {
	/**
	 * This function set centered title type value for title options map and meta boxes
	 */
	function roam_mikado_set_title_centered_type_for_options( $type ) {
		$type['centered'] = esc_html__( 'Centered', 'roam' );
		
		return $type;
	}
	
	add_filter( 'roam_mikado_title_type_global_option', 'roam_mikado_set_title_centered_type_for_options' );
	add_filter( 'roam_mikado_title_type_meta_boxes', 'roam_mikado_set_title_centered_type_for_options' );
}