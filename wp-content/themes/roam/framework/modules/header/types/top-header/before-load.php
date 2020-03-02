<?php

if ( ! function_exists( 'roam_mikado_set_show_dep_options_for_top_header' ) ) {
	/**
	 * This function is used to show this header type specific containers/panels for admin options when another header type is selected
	 */
	function roam_mikado_set_show_dep_options_for_top_header( $show_dep_options ) {
		$show_dep_options[] = '#mkdf_top_header_container';
		
		return $show_dep_options;
	}
	
	// show top header container for global options
	add_filter( 'roam_mikado_show_dep_options_for_header_box', 'roam_mikado_set_show_dep_options_for_top_header' );
	add_filter( 'roam_mikado_show_dep_options_for_header_centered', 'roam_mikado_set_show_dep_options_for_top_header' );
	add_filter( 'roam_mikado_show_dep_options_for_header_divided', 'roam_mikado_set_show_dep_options_for_top_header' );
	add_filter( 'roam_mikado_show_dep_options_for_header_minimal', 'roam_mikado_set_show_dep_options_for_top_header' );
	add_filter( 'roam_mikado_show_dep_options_for_header_standard', 'roam_mikado_set_show_dep_options_for_top_header' );
	add_filter( 'roam_mikado_show_dep_options_for_header_standard_extended', 'roam_mikado_set_show_dep_options_for_top_header' );
	add_filter( 'roam_mikado_show_dep_options_for_header_tabbed', 'roam_mikado_set_show_dep_options_for_top_header' );
	
	// show top header container for meta boxes
	add_filter( 'roam_mikado_show_dep_options_for_header_box_meta_boxes', 'roam_mikado_set_show_dep_options_for_top_header' );
	add_filter( 'roam_mikado_show_dep_options_for_header_centered_meta_boxes', 'roam_mikado_set_show_dep_options_for_top_header' );
	add_filter( 'roam_mikado_show_dep_options_for_header_divided_meta_boxes', 'roam_mikado_set_show_dep_options_for_top_header' );
	add_filter( 'roam_mikado_show_dep_options_for_header_minimal_meta_boxes', 'roam_mikado_set_show_dep_options_for_top_header' );
	add_filter( 'roam_mikado_show_dep_options_for_header_standard_meta_boxes', 'roam_mikado_set_show_dep_options_for_top_header' );
	add_filter( 'roam_mikado_show_dep_options_for_header_standard_extended_meta_boxes', 'roam_mikado_set_show_dep_options_for_top_header' );
	add_filter( 'roam_mikado_show_dep_options_for_header_tabbed_meta_boxes', 'roam_mikado_set_show_dep_options_for_top_header' );
}

if ( ! function_exists( 'roam_mikado_set_hide_dep_options_for_top_header' ) ) {
	/**
	 * This function is used to hide this header type specific containers/panels for admin options when another header type is selected
	 */
	function roam_mikado_set_hide_dep_options_for_top_header( $hide_dep_options ) {
		$hide_dep_options[] = '#mkdf_top_header_container';
		
		return $hide_dep_options;
	}
	
	// hide top header container for global options
	add_filter( 'roam_mikado_hide_dep_options_for_header_top_menu', 'roam_mikado_set_hide_dep_options_for_top_header' );
	add_filter( 'roam_mikado_hide_dep_options_for_header_vertical', 'roam_mikado_set_hide_dep_options_for_top_header' );
	add_filter( 'roam_mikado_hide_dep_options_for_header_vertical_closed', 'roam_mikado_set_hide_dep_options_for_top_header' );
	add_filter( 'roam_mikado_hide_dep_options_for_header_vertical_compact', 'roam_mikado_set_hide_dep_options_for_top_header' );
	
	// hide top header container for meta boxes
	add_filter( 'roam_mikado_hide_dep_options_for_header_top_menu_meta_boxes', 'roam_mikado_set_hide_dep_options_for_top_header' );
	add_filter( 'roam_mikado_hide_dep_options_for_header_vertical_meta_boxes', 'roam_mikado_set_hide_dep_options_for_top_header' );
	add_filter( 'roam_mikado_hide_dep_options_for_header_vertical_closed_meta_boxes', 'roam_mikado_set_hide_dep_options_for_top_header' );
	add_filter( 'roam_mikado_hide_dep_options_for_header_vertical_compact_meta_boxes', 'roam_mikado_set_hide_dep_options_for_top_header' );
}