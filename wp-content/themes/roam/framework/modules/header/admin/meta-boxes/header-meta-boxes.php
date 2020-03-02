<?php

if ( ! function_exists( 'roam_mikado_header_types_meta_boxes' ) ) {
	function roam_mikado_header_types_meta_boxes() {
		$header_type_options = apply_filters( 'roam_mikado_header_type_meta_boxes', $header_type_options = array( '' => esc_html__( 'Default', 'roam' ) ) );
		
		return $header_type_options;
	}
}

if ( ! function_exists( 'roam_mikado_get_show_dep_for_header_types_meta_boxes' ) ) {
	function roam_mikado_get_show_dep_for_header_types_meta_boxes() {
		$show_dep_options = apply_filters( 'roam_mikado_header_type_show_meta_boxes', $show_dep_options = array() );
		
		return $show_dep_options;
	}
}

if ( ! function_exists( 'roam_mikado_get_hide_dep_for_header_types_meta_boxes' ) ) {
	function roam_mikado_get_hide_dep_for_header_types_meta_boxes() {
		$hide_dep_options = apply_filters( 'roam_mikado_header_type_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'roam_mikado_get_hide_dep_for_header_behavior_meta_boxes' ) ) {
	function roam_mikado_get_hide_dep_for_header_behavior_meta_boxes() {
		$hide_dep_options = apply_filters( 'roam_mikado_header_behavior_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

foreach ( glob( MIKADO_FRAMEWORK_HEADER_ROOT_DIR . '/admin/meta-boxes/*/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

foreach ( glob( MIKADO_FRAMEWORK_HEADER_TYPES_ROOT_DIR . '/*/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'roam_mikado_map_header_meta' ) ) {
	function roam_mikado_map_header_meta() {
		$header_type_meta_boxes = roam_mikado_header_types_meta_boxes();
		
		$set_active_global_containers_for_default_value = '#mkdf_menu_area_container';
		
		$header_type_meta_boxes_show_dep = array_merge( array( '' => $set_active_global_containers_for_default_value ), roam_mikado_get_show_dep_for_header_types_meta_boxes() );
		
		$get_all_containers_arrays = array_unique( explode( ' ', str_replace( ',', ' ', implode( ' ', array_values( $header_type_meta_boxes_show_dep ) ) ) ) );
		foreach ( $get_all_containers_arrays as $key => $value ) {
			if ( $value == $set_active_global_containers_for_default_value ) {
				unset( $get_all_containers_arrays[ $key ] );
			}
		}
		$get_all_containers_except_global_for_default_value = array( '' => implode( ',', $get_all_containers_arrays ) );
		
		$header_type_meta_boxes_hide_dep     = array_merge( $get_all_containers_except_global_for_default_value, roam_mikado_get_hide_dep_for_header_types_meta_boxes() );
		$header_behavior_meta_boxes_hide_dep = roam_mikado_get_hide_dep_for_header_behavior_meta_boxes();
		
		$header_meta_box = roam_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'roam_mikado_set_scope_for_meta_boxes', array( 'page', 'post' ) ),
				'title' => esc_html__( 'Header', 'roam' ),
				'name'  => 'header_meta'
			)
		);
		
		
		roam_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_header_type_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Choose Header Type', 'roam' ),
				'description'   => esc_html__( 'Select header type layout', 'roam' ),
				'parent'        => $header_meta_box,
				'options'       => $header_type_meta_boxes,
				'args'          => array(
					"dependence" => true,
					'show'       => $header_type_meta_boxes_show_dep,
					'hide'       => $header_type_meta_boxes_hide_dep
				)
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_header_style_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Header Skin', 'roam' ),
				'description'   => esc_html__( 'Choose a header style to make header elements (logo, main menu, side menu button) in that predefined style', 'roam' ),
				'parent'        => $header_meta_box,
				'options'       => array(
					''             => esc_html__( 'Default', 'roam' ),
					'light-header' => esc_html__( 'Light', 'roam' ),
					'dark-header'  => esc_html__( 'Dark', 'roam' )
				)
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'parent'          => $header_meta_box,
				'type'            => 'select',
				'name'            => 'mkdf_header_behaviour_meta',
				'default_value'   => '',
				'label'           => esc_html__( 'Choose Header Behaviour', 'roam' ),
				'description'     => esc_html__( 'Select the behaviour of header when you scroll down to page', 'roam' ),
				'options'         => array(
					''                                => esc_html__( 'Default', 'roam' ),
					'fixed-on-scroll'                 => esc_html__( 'Fixed on scroll', 'roam' ),
					'no-behavior'                     => esc_html__( 'No Behavior', 'roam' ),
					'sticky-header-on-scroll-up'      => esc_html__( 'Sticky on scroll up', 'roam' ),
					'sticky-header-on-scroll-down-up' => esc_html__( 'Sticky on scroll up/down', 'roam' )
				),
				'hidden_property' => 'mkdf_header_type_meta',
				'hidden_values'   => $header_behavior_meta_boxes_hide_dep,
				'args'            => array(
					'dependence' => true,
					'show'       => array(
						''                                => '',
						'fixed-on-scroll'                 => '',
						'no-behavior'                     => '',
						'sticky-header-on-scroll-up'      => '',
						'sticky-header-on-scroll-down-up' => '#mkdf_sticky_amount_container_meta_container'
					),
					'hide'       => array(
						''                                => '#mkdf_sticky_amount_container_meta_container',
						'fixed-on-scroll'                 => '#mkdf_sticky_amount_container_meta_container',
						'no-behavior'                     => '#mkdf_sticky_amount_container_meta_container',
						'sticky-header-on-scroll-up'      => '#mkdf_sticky_amount_container_meta_container',
						'sticky-header-on-scroll-down-up' => ''
					)
				)
			)
		);
		
		//additional area
		do_action( 'roam_mikado_additional_header_area_meta_boxes_map', $header_meta_box );
		
		//top area
		do_action( 'roam_mikado_header_top_area_meta_boxes_map', $header_meta_box );
		
		//logo area
		do_action( 'roam_mikado_header_logo_area_meta_boxes_map', $header_meta_box );
		
		//menu area
		do_action( 'roam_mikado_header_menu_area_meta_boxes_map', $header_meta_box );
	}
	
	add_action( 'roam_mikado_meta_boxes_map', 'roam_mikado_map_header_meta', 50 );
}