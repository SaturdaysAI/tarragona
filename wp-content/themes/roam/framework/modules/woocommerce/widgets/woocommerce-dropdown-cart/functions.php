<?php

if ( ! function_exists( 'roam_mikado_register_woocommerce_dropdown_cart_widget' ) ) {
	/**
	 * Function that register image gallery widget
	 */
	function roam_mikado_register_woocommerce_dropdown_cart_widget( $widgets ) {
		$widgets[] = 'RoamMikadoWoocommerceDropdownCart';
		
		return $widgets;
	}
	
	add_filter( 'roam_mikado_register_widgets', 'roam_mikado_register_woocommerce_dropdown_cart_widget' );
}