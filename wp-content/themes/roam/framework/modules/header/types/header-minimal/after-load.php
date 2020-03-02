<?php

if ( ! function_exists( 'roam_mikado_header_minimal_full_screen_menu_body_class' ) ) {
	/**
	 * Function that adds body classes for different full screen menu types
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function roam_mikado_header_minimal_full_screen_menu_body_class( $classes ) {
		$classes[] = 'mkdf-' . roam_mikado_options()->getOptionValue( 'fullscreen_menu_animation_style' );
		
		return $classes;
	}
	
	if ( roam_mikado_check_is_header_type_enabled( 'header-minimal', roam_mikado_get_page_id() ) ) {
		add_filter( 'body_class', 'roam_mikado_header_minimal_full_screen_menu_body_class' );
	}
}

if ( ! function_exists( 'roam_mikado_get_header_minimal_full_screen_menu' ) ) {
	/**
	 * Loads fullscreen menu HTML template
	 */
	function roam_mikado_get_header_minimal_full_screen_menu() {
		$parameters = array(
			'fullscreen_menu_in_grid' => roam_mikado_options()->getOptionValue( 'fullscreen_in_grid' ) === 'yes' ? true : false
		);
		
		roam_mikado_get_module_template_part( 'templates/full-screen-menu', 'header/types/header-minimal', '', $parameters );
	}
	
	if ( roam_mikado_check_is_header_type_enabled( 'header-minimal', roam_mikado_get_page_id() ) ) {
		add_action( 'roam_mikado_after_header_area', 'roam_mikado_get_header_minimal_full_screen_menu', 10 );
	}
}