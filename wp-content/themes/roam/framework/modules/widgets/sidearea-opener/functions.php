<?php

if ( ! function_exists( 'roam_mikado_register_sidearea_opener_widget' ) ) {
	/**
	 * Function that register sidearea opener widget
	 */
	function roam_mikado_register_sidearea_opener_widget( $widgets ) {
		$widgets[] = 'RoamMikadoSideAreaOpener';
		
		return $widgets;
	}
	
	add_filter( 'roam_mikado_register_widgets', 'roam_mikado_register_sidearea_opener_widget' );
}