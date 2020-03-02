<?php

if ( ! function_exists( 'roam_mikado_register_button_widget' ) ) {
	/**
	 * Function that register button widget
	 */
	function roam_mikado_register_button_widget( $widgets ) {
		$widgets[] = 'RoamMikadoButtonWidget';
		
		return $widgets;
	}
	
	add_filter( 'roam_mikado_register_widgets', 'roam_mikado_register_button_widget' );
}