<?php

if ( ! function_exists( 'roam_mikado_get_blog_holder_params' ) ) {
	/**
	 * Function that generates params for holders on blog templates
	 */
	function roam_mikado_get_blog_holder_params( $params ) {
		$params_list = array();
		
		$params_list['holder'] = 'mkdf-container';
		$params_list['inner']  = 'mkdf-container-inner clearfix';
		
		return $params_list;
	}
	
	add_filter( 'roam_mikado_blog_holder_params', 'roam_mikado_get_blog_holder_params' );
}

if ( ! function_exists( 'roam_mikado_get_blog_holder_classes' ) ) {
	/**
	 * Function that generates blog holder classes for blog page
	 */
	function roam_mikado_get_blog_holder_classes( $classes ) {
		$sidebar_classes   = array();
		$sidebar_classes[] = 'mkdf-grid-large-gutter';
		
		return implode( ' ', $sidebar_classes );
	}
	
	add_filter( 'roam_mikado_blog_holder_classes', 'roam_mikado_get_blog_holder_classes' );
}

if ( ! function_exists( 'roam_mikado_blog_part_params' ) ) {
	function roam_mikado_blog_part_params( $params ) {
		
		$part_params              = array();
		$part_params['title_tag'] = 'h3';
		$part_params['link_tag']  = 'h5';
		$part_params['quote_tag'] = 'h5';
		
		return array_merge( $params, $part_params );
	}
	
	add_filter( 'roam_mikado_blog_part_params', 'roam_mikado_blog_part_params' );
}