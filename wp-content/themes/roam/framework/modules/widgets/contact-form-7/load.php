<?php

if ( roam_mikado_contact_form_7_installed() ) {
	include_once MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/widgets/contact-form-7/contact-form-7.php';
	
	add_filter( 'roam_mikado_register_widgets', 'roam_mikado_register_cf7_widget' );
}

if ( ! function_exists( 'roam_mikado_register_cf7_widget' ) ) {
	/**
	 * Function that register cf7 widget
	 */
	function roam_mikado_register_cf7_widget( $widgets ) {
		$widgets[] = 'RoamMikadoContactForm7Widget';
		
		return $widgets;
	}
}