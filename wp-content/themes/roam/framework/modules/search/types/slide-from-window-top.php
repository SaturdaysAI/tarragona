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
		$classes[] = 'mkdf-search-slides-from-window-top';
		
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
	
	add_action( 'roam_mikado_before_page_header', 'roam_mikado_get_search' );
}

if ( ! function_exists( 'roam_mikado_load_search_template' ) ) {
	/**
	 * Loads search HTML based on search type option.
	 */
	function roam_mikado_load_search_template() {
		$search_icon_pack  = roam_mikado_options()->getOptionValue( 'search_icon_pack' );
		$search_in_grid    = roam_mikado_options()->getOptionValue( 'search_in_grid' ) == 'yes' ? true : false;
		$search_icon       = '';
		$search_icon_close = '';
		
		if ( ! empty( $search_icon_pack ) ) {
			$search_icon       .= roam_mikado_icon_collections()->getSearchIcon( $search_icon_pack, true );
			$search_icon_close .= roam_mikado_icon_collections()->getSearchClose( $search_icon_pack, true );
		}
		
		$parameters = array(
			'search_in_grid'    => $search_in_grid,
			'search_icon'       => $search_icon,
			'search_icon_close' => $search_icon_close
		);
		
		roam_mikado_get_module_template_part( 'templates/types/slide-from-window-top', 'search', '', $parameters );
	}
}