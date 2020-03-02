<?php

if ( ! function_exists( 'roam_mikado_search_body_class' ) ) {
	/**
	 * Function that adds body classes for different search types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function roam_mikado_search_body_class( $classes ) {
		$classes[] = 'mkdf-slide-from-header-bottom';
		
		return $classes;
	}
	
	add_filter( 'body_class', 'roam_mikado_search_body_class' );
}

if ( ! function_exists( 'roam_mikado_get_search' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function roam_mikado_get_search() {
		roam_mikado_load_search_template();
	}
	
	add_action( 'roam_mikado_before_page_header_html_close', 'roam_mikado_get_search' );
	add_action( 'roam_mikado_before_mobile_header_html_close', 'roam_mikado_get_search' );
}

if ( ! function_exists( 'roam_mikado_load_search_template' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function roam_mikado_load_search_template() {
		roam_mikado_get_module_template_part( 'templates/types/slide-from-header-bottom', 'search' );
	}
}