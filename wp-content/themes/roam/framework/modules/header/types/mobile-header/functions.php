<?php

if ( ! function_exists( 'roam_mikado_include_mobile_header_menu' ) ) {
	function roam_mikado_include_mobile_header_menu( $menus ) {
		$menus['mobile-navigation'] = esc_html__( 'Mobile Navigation', 'roam' );
		
		return $menus;
	}
	
	add_filter( 'roam_mikado_register_headers_menu', 'roam_mikado_include_mobile_header_menu' );
}

if ( ! function_exists( 'roam_mikado_register_mobile_header_areas' ) ) {
	/**
	 * Registers widget areas for mobile header
	 */
	function roam_mikado_register_mobile_header_areas() {
		if ( roam_mikado_is_responsive_on() && roam_mikado_core_plugin_installed() ) {
			register_sidebar(
				array(
					'id'            => 'mkdf-right-from-mobile-logo',
					'name'          => esc_html__( 'Mobile Header Widget Area', 'roam' ),
					'description'   => esc_html__( 'Widgets added here will appear on the right hand side from the mobile logo on mobile header', 'roam' ),
					'before_widget' => '<div id="%1$s" class="widget %2$s mkdf-right-from-mobile-logo">',
					'after_widget'  => '</div>'
				)
			);
		}
	}
	
	add_action( 'widgets_init', 'roam_mikado_register_mobile_header_areas' );
}

if ( ! function_exists( 'roam_mikado_mobile_header_class' ) ) {
	function roam_mikado_mobile_header_class( $classes ) {
		$classes[] = 'mkdf-default-mobile-header';
		
		$classes[] = 'mkdf-sticky-up-mobile-header';
		
		return $classes;
	}
	
	add_filter( 'body_class', 'roam_mikado_mobile_header_class' );
}

if ( ! function_exists( 'roam_mikado_get_mobile_header' ) ) {
	/**
	 * Loads mobile header HTML only if responsiveness is enabled
	 */
	function roam_mikado_get_mobile_header( $slug = '', $module = '' ) {
		if ( roam_mikado_is_responsive_on() ) {
			$mobile_menu_title = roam_mikado_options()->getOptionValue( 'mobile_menu_title' );
			$has_navigation    = has_nav_menu( 'main-navigation' ) || has_nav_menu( 'mobile-navigation' ) ? true : false;
			
			$parameters = array(
				'show_navigation_opener' => $has_navigation,
				'mobile_menu_title'      => $mobile_menu_title
			);
			
			$module = ! empty( $module ) ? $module : 'header/types/mobile-header';
			
			roam_mikado_get_module_template_part( 'templates/mobile-header', $module, $slug, $parameters );
		}
	}
	
	add_action( 'roam_mikado_after_page_header', 'roam_mikado_get_mobile_header' );
}

if ( ! function_exists( 'roam_mikado_get_mobile_logo' ) ) {
	/**
	 * Loads mobile logo HTML. It checks if mobile logo image is set and uses that, else takes normal logo image
	 */
	function roam_mikado_get_mobile_logo() {
		$show_logo_image = roam_mikado_options()->getOptionValue( 'hide_logo' ) === 'yes' ? false : true;
		
		if ( $show_logo_image ) {
			$mobile_logo_image = roam_mikado_get_meta_field_intersect( 'logo_image_mobile', roam_mikado_get_page_id() );
			
			//check if mobile logo has been set and use that, else use normal logo
			$logo_image = ! empty( $mobile_logo_image ) ? $mobile_logo_image : roam_mikado_get_meta_field_intersect( 'logo_image', roam_mikado_get_page_id() );
			
			//get logo image dimensions and set style attribute for image link.
			$logo_dimensions = roam_mikado_get_image_dimensions( $logo_image );
			
			$logo_height = '';
			$logo_styles = '';
			if ( is_array( $logo_dimensions ) && array_key_exists( 'height', $logo_dimensions ) ) {
				$logo_height = $logo_dimensions['height'];
				$logo_styles = 'height: ' . intval( $logo_height / 2 ) . 'px'; //divided with 2 because of retina screens
			}
			
			//set parameters for logo
			$parameters = array(
				'logo_image'      => $logo_image,
				'logo_dimensions' => $logo_dimensions,
				'logo_height'     => $logo_height,
				'logo_styles'     => $logo_styles
			);
			
			roam_mikado_get_module_template_part( 'templates/mobile-logo', 'header/types/mobile-header', '', $parameters );
		}
	}
}

if ( ! function_exists( 'roam_mikado_get_mobile_nav' ) ) {
	/**
	 * Loads mobile navigation HTML
	 */
	function roam_mikado_get_mobile_nav() {
		roam_mikado_get_module_template_part( 'templates/mobile-navigation', 'header/types/mobile-header' );
	}
}