<?php

if ( ! function_exists( 'roam_mikado_set_header_standard_type_global_option' ) ) {
	/**
	 * This function set header type value for global header option map
	 */
	function roam_mikado_set_header_standard_type_global_option( $header_types ) {
		$header_types['header-standard'] = array(
			'image' => MIKADO_FRAMEWORK_HEADER_TYPES_ROOT . '/header-standard/assets/img/header-standard.png',
			'label' => esc_html__( 'Standard', 'roam' )
		);
		
		return $header_types;
	}
	
	add_filter( 'roam_mikado_header_type_global_option', 'roam_mikado_set_header_standard_type_global_option' );
}

if ( ! function_exists( 'roam_mikado_set_header_standard_type_as_global_option' ) ) {
	/**
	 * This function set default header type value for global header option map
	 */
	function roam_mikado_set_header_standard_type_as_global_option( $header_type ) {
		$header_type = 'header-standard';
		
		return $header_type;
	}
	
	add_filter( 'roam_mikado_default_header_type_global_option', 'roam_mikado_set_header_standard_type_as_global_option' );
}

if ( ! function_exists( 'roam_mikado_set_header_standard_type_meta_boxes_option' ) ) {
	/**
	 * This function set header type value for header meta boxes map
	 */
	function roam_mikado_set_header_standard_type_meta_boxes_option( $header_type_options ) {
		$header_type_options['header-standard'] = esc_html__( 'Standard', 'roam' );
		
		return $header_type_options;
	}
	
	add_filter( 'roam_mikado_header_type_meta_boxes', 'roam_mikado_set_header_standard_type_meta_boxes_option' );
}

if ( ! function_exists( 'roam_mikado_set_show_dep_options_for_header_standard' ) ) {
	/**
	 * This function set show container values when this header type is selected for header type global option
	 */
	function roam_mikado_set_show_dep_options_for_header_standard( $show_dep_options ) {
		$show_containers   = array();
		$show_containers[] = '#mkdf_header_behaviour';
		$show_containers[] = '#mkdf_menu_area_container';
		$show_containers[] = '#mkdf_menu_area_in_grid_field_container';
		$show_containers[] = '#mkdf_panel_main_menu';
		$show_containers[] = '#mkdf_panel_sticky_header';
		$show_containers[] = '#mkdf_panel_fixed_header';
		
		$show_containers = apply_filters( 'roam_mikado_show_dep_options_for_header_standard', $show_containers );
		
		$show_dep_options['header-standard'] = implode( ',', $show_containers );
		
		return $show_dep_options;
	}
	
	add_filter( 'roam_mikado_header_type_show_global_option', 'roam_mikado_set_show_dep_options_for_header_standard' );
}

if ( ! function_exists( 'roam_mikado_set_hide_dep_options_for_header_standard' ) ) {
	/**
	 * This function set hide container values when this header type is selected for header type global option
	 */
	function roam_mikado_set_hide_dep_options_for_header_standard( $hide_dep_options ) {
		$hide_containers   = array();
		$hide_containers[] = '#mkdf_logo_area_container';
		$hide_containers[] = '#mkdf_panel_fullscreen_menu';
		$hide_containers[] = '#mkdf_tabbed_menu_area_container';
		
		$hide_containers = apply_filters( 'roam_mikado_hide_dep_options_for_header_standard', $hide_containers );
		
		$hide_dep_options['header-standard'] = implode( ',', $hide_containers );
		
		return $hide_dep_options;
	}
	
	add_filter( 'roam_mikado_header_type_hide_global_option', 'roam_mikado_set_hide_dep_options_for_header_standard' );
}

if ( ! function_exists( 'roam_mikado_set_show_dep_options_for_header_standard_meta_boxes' ) ) {
	/**
	 * This function set show container values when this header type is selected for header type meta boxes map
	 */
	function roam_mikado_set_show_dep_options_for_header_standard_meta_boxes( $show_dep_options ) {
		$show_containers   = array();
		$show_containers[] = '#mkdf_menu_area_container';
		$show_containers[] = '#mkdf_menu_area_grid_field_container';
		
		$show_containers = apply_filters( 'roam_mikado_show_dep_options_for_header_standard_meta_boxes', $show_containers );
		
		$show_dep_options['header-standard'] = implode( ',', $show_containers );
		
		return $show_dep_options;
	}
	
	add_filter( 'roam_mikado_header_type_show_meta_boxes', 'roam_mikado_set_show_dep_options_for_header_standard_meta_boxes' );
}

if ( ! function_exists( 'roam_mikado_set_hide_dep_options_for_header_standard_meta_boxes' ) ) {
	/**
	 * This function set hide container values when this header type is selected for header type meta boxes map
	 */
	function roam_mikado_set_hide_dep_options_for_header_standard_meta_boxes( $hide_dep_options ) {
		$hide_containers   = array();
		$hide_containers[] = '#mkdf_logo_area_container';
		$hide_containers[] = '#mkdf_header_tabbed_meta_container';
		
		$hide_containers = apply_filters( 'roam_mikado_hide_dep_options_for_header_standard_meta_boxes', $hide_containers );
		
		$hide_dep_options['header-standard'] = implode( ',', $hide_containers );
		
		return $hide_dep_options;
	}
	
	add_filter( 'roam_mikado_header_type_hide_meta_boxes', 'roam_mikado_set_hide_dep_options_for_header_standard_meta_boxes' );
}

if ( ! function_exists( 'roam_mikado_set_hide_dep_options_header_standard' ) ) {
	/**
	 * This function is used to hide all containers/panels for admin options when this header type is selected
	 */
	function roam_mikado_set_hide_dep_options_header_standard( $hide_dep_options ) {
		$hide_dep_options[] = 'header-standard';
		
		return $hide_dep_options;
	}
	
	// header global panel options
	add_filter( 'roam_mikado_header_logo_area_hide_global_option', 'roam_mikado_set_hide_dep_options_header_standard' );
	
	// header global panel meta boxes
	add_filter( 'roam_mikado_header_logo_area_hide_meta_boxes', 'roam_mikado_set_hide_dep_options_header_standard' );
	
	// header types options
	add_filter( 'roam_mikado_header_centered_hide_global_option', 'roam_mikado_set_hide_dep_options_header_standard' );
	add_filter( 'roam_mikado_full_screen_menu_hide_global_option', 'roam_mikado_set_hide_dep_options_header_standard' );
	add_filter( 'roam_mikado_header_vertical_hide_global_option', 'roam_mikado_set_hide_dep_options_header_standard' );
	add_filter( 'roam_mikado_header_vertical_menu_hide_global_option', 'roam_mikado_set_hide_dep_options_header_standard' );
	add_filter( 'roam_mikado_get_hide_dep_for_tabbed_options', 'roam_mikado_set_hide_dep_options_header_standard' );

	// header types panel meta boxes
	add_filter( 'roam_mikado_header_centered_hide_meta_boxes', 'roam_mikado_set_hide_dep_options_header_standard' );
	add_filter( 'roam_mikado_header_vertical_hide_meta_boxes', 'roam_mikado_set_hide_dep_options_header_standard' );
}