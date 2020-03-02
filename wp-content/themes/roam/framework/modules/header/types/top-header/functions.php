<?php

if ( ! function_exists( 'roam_mikado_set_header_top_enabled_class' ) ) {
    function roam_mikado_set_header_top_enabled_class( $classes ) {

        if ( roam_mikado_is_top_bar_enabled() ) {
            $classes[] = 'mkdf-header-top-enabled';
        }

        return $classes;
    }

    add_filter( 'body_class', 'roam_mikado_set_header_top_enabled_class' );
}

if ( ! function_exists( 'roam_mikado_top_header_global_js_var' ) ) {
	function roam_mikado_top_header_global_js_var( $global_variables ) {
		$global_variables['mkdfTopBarHeight'] = roam_mikado_get_top_bar_height();
		
		return $global_variables;
	}
	
	add_filter( 'roam_mikado_js_global_variables', 'roam_mikado_top_header_global_js_var' );
}

if ( ! function_exists( 'roam_mikado_get_header_top' ) ) {
	/**
	 * Loads header top HTML and sets parameters for it
	 */
	function roam_mikado_get_header_top() {
		$params = array(
			'show_header_top'                => roam_mikado_is_top_bar_enabled(),
			'show_header_top_background_div' => roam_mikado_get_meta_field_intersect( 'header_type' ) == 'header-box' ? true : false,
			'top_bar_in_grid'                => roam_mikado_get_meta_field_intersect( 'top_bar_in_grid' ) == 'yes' ? true : false,
		);
		
		$params = apply_filters( 'roam_mikado_header_top_params', $params );
		
		roam_mikado_get_module_template_part( 'templates/top-header', 'header/types/top-header', '', $params );
	}
	
	add_action( 'roam_mikado_before_page_header', 'roam_mikado_get_header_top' );
}

if ( ! function_exists( 'roam_mikado_is_top_bar_enabled' ) ) {
	/**
	 * Returns is top header area enabled
	 *
	 * @return bool
	 */
	function roam_mikado_is_top_bar_enabled() {
		$top_bar_enabled = roam_mikado_get_meta_field_intersect( 'top_bar' ) === 'yes' ? true : false;
		
		if ( is_404() ) {
			$top_bar_enabled = false;
		}
		
		return apply_filters( 'roam_mikado_enabled_top_bar', $top_bar_enabled );
	}
}

if ( ! function_exists( 'roam_mikado_get_top_bar_height' ) ) {
	/**
	 * Returns top header area height
	 *
	 * @return bool|int|void
	 */
	function roam_mikado_get_top_bar_height() {
		if ( roam_mikado_is_top_bar_enabled() ) {
			$top_bar_height_meta = roam_mikado_filter_px( roam_mikado_options()->getOptionValue( 'top_bar_height' ) );
			$top_bar_height      = ! empty( $top_bar_height_meta ) ? $top_bar_height_meta : 46;
			
			return $top_bar_height;
		} else {
			return 0;
		}
	}
}

if ( ! function_exists( 'roam_mikado_get_top_bar_background_height' ) ) {
	/**
	 * Returns top header area background height
	 *
	 * @return bool|int|void
	 */
	function roam_mikado_get_top_bar_background_height() {
		$top_bar_height_meta = roam_mikado_filter_px( roam_mikado_options()->getOptionValue( 'top_bar_height' ) );
		$header_height_meta  = roam_mikado_filter_px( roam_mikado_options()->getOptionValue( 'menu_area_height' ) );
		
		$top_bar_height = ! empty( $top_bar_height_meta ) ? $top_bar_height_meta : 46;
		$header_height  = ! empty( $header_height_meta ) ? $header_height_meta : 90;
		
		$top_bar_background_height = round( $top_bar_height ) + round( $header_height / 2 );
		
		return $top_bar_background_height;
	}
}

if ( ! function_exists( 'roam_mikado_is_top_bar_transparent' ) ) {
	/**
	 * Checks if top header area is transparent or not
	 *
	 * @return bool
	 */
	function roam_mikado_is_top_bar_transparent() {
		$top_bar_enabled      = roam_mikado_is_top_bar_enabled();
		$top_bar_bg_color     = roam_mikado_options()->getOptionValue( 'top_bar_background_color' );
		$top_bar_transparency = roam_mikado_options()->getOptionValue( 'top_bar_background_transparency' );
		
		if ( $top_bar_enabled && $top_bar_bg_color !== '' && $top_bar_transparency !== '' ) {
			return $top_bar_transparency >= 0 && $top_bar_transparency < 1;
		} else {
			return false;
		}
	}
}

if ( ! function_exists( 'roam_mikado_is_top_bar_completely_transparent' ) ) {
	/**
	 * Checks is top header area completely transparent
	 *
	 * @return bool
	 */
	function roam_mikado_is_top_bar_completely_transparent() {
		$top_bar_enabled      = roam_mikado_is_top_bar_enabled();
		$top_bar_bg_color     = roam_mikado_options()->getOptionValue( 'top_bar_background_color' );
		$top_bar_transparency = roam_mikado_options()->getOptionValue( 'top_bar_background_transparency' );
		
		if ( $top_bar_enabled && $top_bar_bg_color !== '' && $top_bar_transparency !== '' ) {
			return $top_bar_transparency === '0';
		} else {
			return false;
		}
	}
}

if ( ! function_exists( 'roam_mikado_register_top_header_areas' ) ) {
	/**
	 * Registers widget areas for top header bar when it is enabled
	 */
	function roam_mikado_register_top_header_areas() {
		register_sidebar(
			array(
				'id'            => 'mkdf-top-bar-left',
				'name'          => esc_html__( 'Header Top Bar Left Column', 'roam' ),
				'description'   => esc_html__( 'Widgets added here will appear on the left side in top bar header', 'roam' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s mkdf-top-bar-widget">',
				'after_widget'  => '</div>'
			)
		);
		
		register_sidebar(
			array(
				'id'            => 'mkdf-top-bar-right',
				'name'          => esc_html__( 'Header Top Bar Right Column', 'roam' ),
				'description'   => esc_html__( 'Widgets added here will appear on the right side in top bar header', 'roam' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s mkdf-top-bar-widget">',
				'after_widget'  => '</div>'
			)
		);
	}
	
	add_action( 'widgets_init', 'roam_mikado_register_top_header_areas' );
}

if ( ! function_exists( 'roam_mikado_top_bar_grid_class' ) ) {
	/**
	 * @param $classes
	 *
	 * @return array
	 */
	function roam_mikado_top_bar_grid_class( $classes ) {
		if ( roam_mikado_get_meta_field_intersect( 'top_bar_in_grid', roam_mikado_get_page_id() ) == 'yes' &&
		     roam_mikado_options()->getOptionValue( 'top_bar_grid_background_color' ) !== '' &&
		     roam_mikado_options()->getOptionValue( 'top_bar_grid_background_transparency' ) !== '0'
		) {
			$classes[] = 'mkdf-top-bar-in-grid-padding';
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'roam_mikado_top_bar_grid_class' );
}

if ( ! function_exists( 'roam_mikado_get_top_bar_styles' ) ) {
	/**
	 * Sets per page styles for header top bar
	 *
	 * @param $styles
	 *
	 * @return array
	 */
	function roam_mikado_get_top_bar_styles( $styles ) {
		$page_id      = roam_mikado_get_page_id();
		$class_prefix = roam_mikado_get_unique_page_class( $page_id, true );
		
		$top_bar_style = array();
		
		$top_bar_bg_color     = get_post_meta( $page_id, 'mkdf_top_bar_background_color_meta', true );
		$top_bar_border       = get_post_meta( $page_id, 'mkdf_top_bar_border_meta', true );
		$top_bar_border_color = get_post_meta( $page_id, 'mkdf_top_bar_border_color_meta', true );
		
		$current_style = '';
		
		$top_bar_selector = array(
			$class_prefix . ' .mkdf-top-bar'
		);
		
		if ( $top_bar_bg_color !== '' ) {
			$top_bar_transparency = get_post_meta( $page_id, 'mkdf_top_bar_background_transparency_meta', true );
			if ( $top_bar_transparency === '' ) {
				$top_bar_transparency = 1;
			}
			$top_bar_style['background-color'] = roam_mikado_rgba_color( $top_bar_bg_color, $top_bar_transparency );
		}
		
		if ( $top_bar_border == 'yes' ) {
			$top_bar_style['border-bottom'] = '1px solid ' . $top_bar_border_color;
		} elseif ( $top_bar_border == 'no' ) {
			$top_bar_style['border-bottom'] = '0';
		}
		
		$current_style .= roam_mikado_dynamic_css( $top_bar_selector, $top_bar_style );
		
		$current_style = $current_style . $styles;
		
		return $current_style;
	}
	
	add_filter( 'roam_mikado_add_page_custom_style', 'roam_mikado_get_top_bar_styles' );
}