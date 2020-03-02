<?php

if ( ! function_exists( 'roam_mikado_register_social_icon_widget' ) ) {
	/**
	 * Function that register social icon widget
	 */
	function roam_mikado_register_social_icon_widget( $widgets ) {
		$widgets[] = 'RoamMikadoSocialIconWidget';
		
		return $widgets;
	}
	
	add_filter( 'roam_mikado_register_widgets', 'roam_mikado_register_social_icon_widget' );
}