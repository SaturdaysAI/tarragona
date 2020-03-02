<?php

if ( ! function_exists( 'roam_mikado_set_header_minimal_type_global_option' ) ) {
	/**
	 * This function set header type value for global header option map
	 */
	function roam_mikado_set_header_minimal_type_global_option( $header_types ) {
		$header_types['header-minimal'] = array(
			'image' => MIKADO_FRAMEWORK_HEADER_TYPES_ROOT . '/header-minimal/assets/img/header-minimal.png',
			'label' => esc_html__( 'Minimal', 'roam' )
		);
		
		return $header_types;
	}
	
	add_filter( 'roam_mikado_header_type_global_option', 'roam_mikado_set_header_minimal_type_global_option' );
}

if ( ! function_exists( 'roam_mikado_set_header_minimal_type_meta_boxes_option' ) ) {
	/**
	 * This function set header type value for header meta boxes map
	 */
	function roam_mikado_set_header_minimal_type_meta_boxes_option( $header_type_options ) {
		$header_type_options['header-minimal'] = esc_html__( 'Minimal', 'roam' );
		
		return $header_type_options;
	}
	
	add_filter( 'roam_mikado_header_type_meta_boxes', 'roam_mikado_set_header_minimal_type_meta_boxes_option' );
}

if ( ! function_exists( 'roam_mikado_set_show_dep_options_for_header_minimal' ) ) {
	/**
	 * This function set show container values when this header type is selected for header type global option
	 */
	function roam_mikado_set_show_dep_options_for_header_minimal( $show_dep_options ) {
		$show_containers   = array();
		$show_containers[] = '#mkdf_header_behaviour';
		$show_containers[] = '#mkdf_menu_area_container';
		$show_containers[] = '#mkdf_menu_area_in_grid_field_container';
		$show_containers[] = '#mkdf_panel_fullscreen_menu';
		$show_containers[] = '#mkdf_panel_sticky_header';
		$show_containers[] = '#mkdf_panel_fixed_header';
		
		$show_containers = apply_filters( 'roam_mikado_show_dep_options_for_header_minimal', $show_containers );
		
		$show_dep_options['header-minimal'] = implode( ',', $show_containers );
		
		return $show_dep_options;
	}
	
	add_filter( 'roam_mikado_header_type_show_global_option', 'roam_mikado_set_show_dep_options_for_header_minimal' );
}

if ( ! function_exists( 'roam_mikado_set_hide_dep_options_for_header_minimal' ) ) {
	/**
	 * This function set hide container values when this header type is selected for header type global option
	 */
	function roam_mikado_set_hide_dep_options_for_header_minimal( $hide_dep_options ) {
		$hide_containers   = array();
		$hide_containers[] = '#mkdf_panel_main_menu';
		$hide_containers[] = '#mkdf_logo_area_container';
		$hide_containers[] = '#mkdf_tabbed_menu_area_container';
		
		$hide_containers = apply_filters( 'roam_mikado_hide_dep_options_for_header_minimal', $hide_containers );
		
		$hide_dep_options['header-minimal'] = implode( ',', $hide_containers );
		
		return $hide_dep_options;
	}
	
	add_filter( 'roam_mikado_header_type_hide_global_option', 'roam_mikado_set_hide_dep_options_for_header_minimal' );
}

if ( ! function_exists( 'roam_mikado_set_show_dep_options_for_header_minimal_meta_boxes' ) ) {
	/**
	 * This function set show container values when this header type is selected for header type meta boxes map
	 */
	function roam_mikado_set_show_dep_options_for_header_minimal_meta_boxes( $show_dep_options ) {
		$show_containers   = array();
		$show_containers[] = '#mkdf_menu_area_container';
		$show_containers[] = '#mkdf_menu_area_grid_field_container';
		
		$show_containers = apply_filters( 'roam_mikado_show_dep_options_for_header_minimal_meta_boxes', $show_containers );
		
		$show_dep_options['header-minimal'] = implode( ',', $show_containers );
		
		return $show_dep_options;
	}
	
	add_filter( 'roam_mikado_header_type_show_meta_boxes', 'roam_mikado_set_show_dep_options_for_header_minimal_meta_boxes' );
}

if ( ! function_exists( 'roam_mikado_set_hide_dep_options_for_header_minimal_meta_boxes' ) ) {
	/**
	 * This function set hide container values when this header type is selected for header type meta boxes map
	 */
	function roam_mikado_set_hide_dep_options_for_header_minimal_meta_boxes( $hide_dep_options ) {
		$hide_containers   = array();
		$hide_containers[] = '#mkdf_logo_area_container';
		$hide_containers[] = '#mkdf_header_tabbed_meta_container';
		
		$hide_containers = apply_filters( 'roam_mikado_hide_dep_options_for_header_minimal_meta_boxes', $hide_containers );
		
		$hide_dep_options['header-minimal'] = implode( ',', $hide_containers );
		
		return $hide_dep_options;
	}
	
	add_filter( 'roam_mikado_header_type_hide_meta_boxes', 'roam_mikado_set_hide_dep_options_for_header_minimal_meta_boxes' );
}

if ( ! function_exists( 'roam_mikado_set_hide_dep_options_header_minimal' ) ) {
	/**
	 * This function is used to hide all containers/panels for admin options when this header type is selected
	 */
	function roam_mikado_set_hide_dep_options_header_minimal( $hide_dep_options ) {
		$hide_dep_options[] = 'header-minimal';
		
		return $hide_dep_options;
	}
	
	// header global panel options
	add_filter( 'roam_mikado_header_logo_area_hide_global_option', 'roam_mikado_set_hide_dep_options_header_minimal' );
	
	// header global panel meta boxes
	add_filter( 'roam_mikado_header_logo_area_hide_meta_boxes', 'roam_mikado_set_hide_dep_options_header_minimal' );
	
	// header types options
	add_filter( 'roam_mikado_header_standard_hide_global_option', 'roam_mikado_set_hide_dep_options_header_minimal' );
	add_filter( 'roam_mikado_header_vertical_hide_global_option', 'roam_mikado_set_hide_dep_options_header_minimal' );
	add_filter( 'roam_mikado_header_vertical_menu_hide_global_option', 'roam_mikado_set_hide_dep_options_header_minimal' );
	add_filter( 'roam_mikado_get_hide_dep_for_tabbed_options', 'roam_mikado_set_hide_dep_options_header_minimal' );
	
	// header types panel meta boxes
	add_filter( 'roam_mikado_header_centered_hide_meta_boxes', 'roam_mikado_set_hide_dep_options_header_minimal' );
	add_filter( 'roam_mikado_header_standard_hide_meta_boxes', 'roam_mikado_set_hide_dep_options_header_minimal' );
	add_filter( 'roam_mikado_header_vertical_hide_meta_boxes', 'roam_mikado_set_hide_dep_options_header_minimal' );
}