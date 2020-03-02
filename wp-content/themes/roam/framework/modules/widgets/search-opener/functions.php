<?php

if ( ! function_exists( 'roam_mikado_register_search_opener_widget' ) ) {
	/**
	 * Function that register search opener widget
	 */
	function roam_mikado_register_search_opener_widget( $widgets ) {
		$widgets[] = 'RoamMikadoSearchOpener';
		
		return $widgets;
	}
	
	add_filter( 'roam_mikado_register_widgets', 'roam_mikado_register_search_opener_widget' );
}