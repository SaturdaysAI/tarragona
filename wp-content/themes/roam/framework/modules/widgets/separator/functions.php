<?php

if ( ! function_exists( 'roam_mikado_register_separator_widget' ) ) {
	/**
	 * Function that register separator widget
	 */
	function roam_mikado_register_separator_widget( $widgets ) {
		$widgets[] = 'RoamMikadoSeparatorWidget';
		
		return $widgets;
	}
	
	add_filter( 'roam_mikado_register_widgets', 'roam_mikado_register_separator_widget' );
}