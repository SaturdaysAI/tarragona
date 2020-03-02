<?php

if ( ! function_exists( 'roam_mikado_load_search' ) ) {
	function roam_mikado_load_search() {
		$search_type_meta = roam_mikado_options()->getOptionValue( 'search_type' );
		$search_type      = ! empty( $search_type_meta ) ? $search_type_meta : 'fullscreen';
		
		if ( roam_mikado_active_widget( false, false, 'mkdf_search_opener' ) ) {
			include_once MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/search/types/' . $search_type . '.php';
		}
	}
	
	add_action( 'init', 'roam_mikado_load_search' );
}

if ( ! function_exists( 'roam_mikado_get_holder_params_search' ) ) {
	/**
	 * Function which return holder class and holder inner class for blog pages
	 */
	function roam_mikado_get_holder_params_search() {
		$params_list = array();
		
		$layout = roam_mikado_options()->getOptionValue( 'search_page_layout' );
		if ( $layout == 'in-grid' ) {
			$params_list['holder'] = 'mkdf-container';
			$params_list['inner']  = 'mkdf-container-inner clearfix';
		} else {
			$params_list['holder'] = 'mkdf-full-width';
			$params_list['inner']  = 'mkdf-full-width-inner';
		}
		
		/**
		 * Available parameters for holder params
		 * -holder
		 * -inner
		 */
		return apply_filters( 'roam_mikado_search_holder_params', $params_list );
	}
}

if ( ! function_exists( 'roam_mikado_get_search_page' ) ) {
	function roam_mikado_get_search_page() {
		$sidebar_layout = roam_mikado_sidebar_layout();
		
		$params = array(
			'sidebar_layout' => $sidebar_layout
		);
		
		roam_mikado_get_module_template_part( 'templates/holder', 'search', '', $params );
	}
}

if ( ! function_exists( 'roam_mikado_get_search_page_layout' ) ) {
	/**
	 * Function which create query for blog lists
	 */
	function roam_mikado_get_search_page_layout() {
		global $wp_query;
		$path   = apply_filters( 'roam_mikado_search_page_path', 'templates/page' );
		$type   = apply_filters( 'roam_mikado_search_page_layout', 'default' );
		$module = apply_filters( 'roam_mikado_search_page_module', 'search' );
		$plugin = apply_filters( 'roam_mikado_search_page_plugin_override', false );
		
		if ( get_query_var( 'paged' ) ) {
			$paged = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$paged = get_query_var( 'page' );
		} else {
			$paged = 1;
		}
		
		$params = array(
			'type'          => $type,
			'query'         => $wp_query,
			'paged'         => $paged,
			'max_num_pages' => roam_mikado_get_max_number_of_pages(),
		);
		
		$params = apply_filters( 'roam_mikado_search_page_params', $params );
		
		roam_mikado_get_module_template_part( $path . '/' . $type, $module, '', $params, $plugin );
	}
}