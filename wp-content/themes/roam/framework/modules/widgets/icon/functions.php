<?php

if ( ! function_exists( 'roam_mikado_register_icon_widget' ) ) {
	/**
	 * Function that register icon widget
	 */
	function roam_mikado_register_icon_widget( $widgets ) {
		$widgets[] = 'RoamMikadoIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'roam_mikado_register_widgets', 'roam_mikado_register_icon_widget' );
}