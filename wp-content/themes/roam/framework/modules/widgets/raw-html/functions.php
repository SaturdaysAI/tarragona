<?php

if ( ! function_exists( 'roam_mikado_register_raw_html_widget' ) ) {
	/**
	 * Function that register raw html widget
	 */
	function roam_mikado_register_raw_html_widget( $widgets ) {
		$widgets[] = 'RoamMikadoRawHTMLWidget';
		
		return $widgets;
	}
	
	add_filter( 'roam_mikado_register_widgets', 'roam_mikado_register_raw_html_widget' );
}