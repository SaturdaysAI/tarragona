<?php

if ( ! function_exists( 'roam_mikado_register_header_tabbed_type' ) ) {
	/**
	 * This function is used to register header type class for header factory file
	 */
	function roam_mikado_register_header_tabbed_type( $header_types ) {
		$header_type = array(
			'header-tabbed' => 'RoamMikado\Modules\Header\Types\HeaderTabbed'
		);
		
		$header_types = array_merge( $header_types, $header_type );
		
		return $header_types;
	}
}

if ( ! function_exists( 'roam_mikado_init_register_header_tabbed_type' ) ) {
	/**
	 * This function is used to wait header-function.php file to init header object and then to init hook registration function above
	 */
	function roam_mikado_init_register_header_tabbed_type() {
		add_filter( 'roam_mikado_register_header_type_class', 'roam_mikado_register_header_tabbed_type' );
	}
	
	add_action( 'roam_mikado_before_header_function_init', 'roam_mikado_init_register_header_tabbed_type' );
}

if ( ! function_exists( 'roam_mikado_register_header_tabbed_top_areas' ) ) {
	/**
	 * Registers widget areas for header tabbed top
	 */
	function roam_mikado_register_header_tabbed_top_areas() {
		register_sidebar(
			array(
				'id'            => 'mkdf-tabbed-top-left',
				'name'          => esc_html__( 'Header Tabbed Top Left Column', 'roam' ),
				'description'   => esc_html__( 'Widgets added here will appear on the left side in tabbed header top area', 'roam' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s mkdf-tabbed-top-widget">',
				'after_widget'  => '</div>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'mkdf-tabbed-top-right',
				'name'          => esc_html__( 'Header Tabbed Top Right Column', 'roam' ),
				'description'   => esc_html__( 'Widgets added here will appear on the right side in tabbed header top area', 'roam' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s mkdf-tabbed-top-widget">',
				'after_widget'  => '</div>'
			)
		);
	}
	
	add_action( 'widgets_init', 'roam_mikado_register_header_tabbed_top_areas' );
}

if ( ! function_exists('roam_mikado_header_tabbed_top_exists')){
	function roam_mikado_header_tabbed_top_exists(){
		$top_active = true;
		$page_id = roam_mikado_get_page_id();
		$disable_top = roam_mikado_get_meta_field_intersect('disable_header_tabbed_top',$page_id);

		if ( $disable_top == 'yes' ) {
			$top_active = false;
		}

		return $top_active;
	}
}

if ( ! function_exists( 'roam_mikado_get_header_tabbed_left_widget_menu_area' ) ) {
	/**
	 * Loads header widgets area HTML
	 */
	function roam_mikado_get_header_tabbed_left_widget_menu_area() {
		$page_id                 = roam_mikado_get_page_id();
		$custom_menu_widget_area = get_post_meta( $page_id, 'mkdf_custom_menu_area_tabbed_top_left_meta', true );
		
		if ( is_active_sidebar( 'mkdf-tabbed-top-left' ) && empty( $custom_menu_widget_area ) ) {
			dynamic_sidebar( 'mkdf-tabbed-top-left' );
		} else if ( ! empty( $custom_menu_widget_area ) && is_active_sidebar( $custom_menu_widget_area ) ) {
			dynamic_sidebar( $custom_menu_widget_area );
		}
	}
}

if ( ! function_exists( 'roam_mikado_get_header_tabbed_right_widget_menu_area' ) ) {
	/**
	 * Loads header widgets area HTML
	 */
	function roam_mikado_get_header_tabbed_right_widget_menu_area() {
		$page_id                 = roam_mikado_get_page_id();
		$custom_menu_widget_area = get_post_meta( $page_id, 'mkdf_custom_menu_area_tabbed_top_right_meta', true );
		
		if ( is_active_sidebar( 'mkdf-tabbed-top-right' ) && empty( $custom_menu_widget_area ) ) {
			dynamic_sidebar( 'mkdf-tabbed-top-right' );
		} else if ( ! empty( $custom_menu_widget_area ) && is_active_sidebar( $custom_menu_widget_area ) ) {
			dynamic_sidebar( $custom_menu_widget_area );
		}
	}
}