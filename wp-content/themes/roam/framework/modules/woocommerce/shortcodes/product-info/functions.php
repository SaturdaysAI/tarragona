<?php

if ( ! function_exists( 'roam_mikado_add_product_info_shortcode' ) ) {
	function roam_mikado_add_product_info_shortcode( $shortcodes_class_name ) {
		$shortcodes = array(
			'MikadoCore\CPT\Shortcodes\ProductInfo\ProductInfo',
		);
		
		$shortcodes_class_name = array_merge( $shortcodes_class_name, $shortcodes );
		
		return $shortcodes_class_name;
	}
	
	if ( roam_mikado_core_plugin_installed() ) {
		add_filter( 'mkdf_core_filter_add_vc_shortcode', 'roam_mikado_add_product_info_shortcode' );
	}
}

if ( ! function_exists( 'roam_mikado_add_product_info_into_shortcodes_list' ) ) {
	function roam_mikado_add_product_info_into_shortcodes_list( $woocommerce_shortcodes ) {
		$woocommerce_shortcodes[] = 'mkdf_product_info';
		
		return $woocommerce_shortcodes;
	}
	
	add_filter( 'roam_mikado_woocommerce_shortcodes_list', 'roam_mikado_add_product_info_into_shortcodes_list' );
}