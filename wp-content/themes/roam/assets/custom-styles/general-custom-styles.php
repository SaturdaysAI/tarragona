<?php

if(!function_exists('roam_mikado_design_styles')) {
    /**
     * Generates general custom styles
     */
    function roam_mikado_design_styles() {
	    $font_family = roam_mikado_options()->getOptionValue( 'google_fonts' );
	    if ( ! empty( $font_family ) && roam_mikado_is_font_option_valid( $font_family ) ) {
		    $font_family_selector = array(
			    'body'
		    );
		    echo roam_mikado_dynamic_css( $font_family_selector, array( 'font-family' => roam_mikado_get_font_option_val( $font_family ) ) );
	    }

		$first_main_color = roam_mikado_options()->getOptionValue('first_color');

        if(!empty($first_main_color)) {

            $first_color_array  = roam_mikado_first_color_array();

            $color_selector = array_merge($first_color_array['color'],$first_color_array['color-no-space']);
            $color_important_selector = $first_color_array['color-important-no-space'];
            $background_color_selector = array_merge($first_color_array['background-color'],$first_color_array['background-color-no-space']);
            $background_color_important_selector = $first_color_array['background-color-important'];
            $border_color_selector = array_merge($first_color_array['border'],$first_color_array['border-no-space']);
            $border_color_important_selector = $first_color_array['border-important'];

            echo roam_mikado_dynamic_css($color_selector, array('color' => $first_main_color));
	        echo roam_mikado_dynamic_css($color_important_selector, array('color' => $first_main_color.'!important'));
	        echo roam_mikado_dynamic_css($background_color_selector, array('background-color' => $first_main_color));
	        echo roam_mikado_dynamic_css($background_color_important_selector, array('background-color' => $first_main_color.'!important'));
	        echo roam_mikado_dynamic_css($border_color_selector, array('border-color' => $first_main_color));
	        echo roam_mikado_dynamic_css($border_color_important_selector, array('border-color' => $first_main_color.'!important'));
        }
	
	    $page_background_color = roam_mikado_options()->getOptionValue( 'page_background_color' );
	    if ( ! empty( $page_background_color ) ) {
		    $background_color_selector = array(
			    '.mkdf-wrapper-inner',
			    '.mkdf-content .mkdf-content-inner > .mkdf-container'
		    );
		    echo roam_mikado_dynamic_css( $background_color_selector, array( 'background-color' => $page_background_color ) );
	    }
	
	    $selection_color = roam_mikado_options()->getOptionValue( 'selection_color' );
	    if ( ! empty( $selection_color ) ) {
		    echo roam_mikado_dynamic_css( '::selection', array( 'background' => $selection_color ) );
		    echo roam_mikado_dynamic_css( '::-moz-selection', array( 'background' => $selection_color ) );
	    }
	
	    $preload_background_styles = array();
	
	    if ( roam_mikado_options()->getOptionValue( 'preload_pattern_image' ) !== "" ) {
		    $preload_background_styles['background-image'] = 'url(' . roam_mikado_options()->getOptionValue( 'preload_pattern_image' ) . ') !important';
	    }
	
	    echo roam_mikado_dynamic_css( '.mkdf-preload-background', $preload_background_styles );
    }

    add_action('roam_mikado_style_dynamic', 'roam_mikado_design_styles');
}

if ( ! function_exists( 'roam_mikado_content_styles' ) ) {
	function roam_mikado_content_styles() {
		$content_style = array();
		
		$padding_top = roam_mikado_options()->getOptionValue( 'content_top_padding' );
		if ( $padding_top !== '' ) {
			$content_style['padding-top'] = roam_mikado_filter_px( $padding_top ) . 'px';
		}
		
		$content_selector = array(
			'.mkdf-content .mkdf-content-inner > .mkdf-full-width > .mkdf-full-width-inner',
		);
		
		echo roam_mikado_dynamic_css( $content_selector, $content_style );
		
		$content_style_in_grid = array();
		
		$padding_top_in_grid = roam_mikado_options()->getOptionValue( 'content_top_padding_in_grid' );
		if ( $padding_top_in_grid !== '' ) {
			$content_style_in_grid['padding-top'] = roam_mikado_filter_px( $padding_top_in_grid ) . 'px';
		}
		
		$content_selector_in_grid = array(
			'.mkdf-content .mkdf-content-inner > .mkdf-container > .mkdf-container-inner',
		);
		
		echo roam_mikado_dynamic_css( $content_selector_in_grid, $content_style_in_grid );
	}
	
	add_action( 'roam_mikado_style_dynamic', 'roam_mikado_content_styles' );
}

if ( ! function_exists( 'roam_mikado_h1_styles' ) ) {
	function roam_mikado_h1_styles() {
		$margin_top    = roam_mikado_options()->getOptionValue( 'h1_margin_top' );
		$margin_bottom = roam_mikado_options()->getOptionValue( 'h1_margin_bottom' );
		
		$item_styles = roam_mikado_get_typography_styles( 'h1' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = roam_mikado_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = roam_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h1'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo roam_mikado_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'roam_mikado_style_dynamic', 'roam_mikado_h1_styles' );
}

if ( ! function_exists( 'roam_mikado_h2_styles' ) ) {
	function roam_mikado_h2_styles() {
		$margin_top    = roam_mikado_options()->getOptionValue( 'h2_margin_top' );
		$margin_bottom = roam_mikado_options()->getOptionValue( 'h2_margin_bottom' );
		
		$item_styles = roam_mikado_get_typography_styles( 'h2' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = roam_mikado_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = roam_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h2'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo roam_mikado_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'roam_mikado_style_dynamic', 'roam_mikado_h2_styles' );
}

if ( ! function_exists( 'roam_mikado_h3_styles' ) ) {
	function roam_mikado_h3_styles() {
		$margin_top    = roam_mikado_options()->getOptionValue( 'h3_margin_top' );
		$margin_bottom = roam_mikado_options()->getOptionValue( 'h3_margin_bottom' );
		
		$item_styles = roam_mikado_get_typography_styles( 'h3' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = roam_mikado_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = roam_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h3'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo roam_mikado_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'roam_mikado_style_dynamic', 'roam_mikado_h3_styles' );
}

if ( ! function_exists( 'roam_mikado_h4_styles' ) ) {
	function roam_mikado_h4_styles() {
		$margin_top    = roam_mikado_options()->getOptionValue( 'h4_margin_top' );
		$margin_bottom = roam_mikado_options()->getOptionValue( 'h4_margin_bottom' );
		
		$item_styles = roam_mikado_get_typography_styles( 'h4' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = roam_mikado_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = roam_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h4'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo roam_mikado_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'roam_mikado_style_dynamic', 'roam_mikado_h4_styles' );
}

if ( ! function_exists( 'roam_mikado_h5_styles' ) ) {
	function roam_mikado_h5_styles() {
		$margin_top    = roam_mikado_options()->getOptionValue( 'h5_margin_top' );
		$margin_bottom = roam_mikado_options()->getOptionValue( 'h5_margin_bottom' );
		
		$item_styles = roam_mikado_get_typography_styles( 'h5' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = roam_mikado_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = roam_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h5'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo roam_mikado_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'roam_mikado_style_dynamic', 'roam_mikado_h5_styles' );
}

if ( ! function_exists( 'roam_mikado_h6_styles' ) ) {
	function roam_mikado_h6_styles() {
		$margin_top    = roam_mikado_options()->getOptionValue( 'h6_margin_top' );
		$margin_bottom = roam_mikado_options()->getOptionValue( 'h6_margin_bottom' );
		
		$item_styles = roam_mikado_get_typography_styles( 'h6' );
		
		if ( $margin_top !== '' ) {
			$item_styles['margin-top'] = roam_mikado_filter_px( $margin_top ) . 'px';
		}
		if ( $margin_bottom !== '' ) {
			$item_styles['margin-bottom'] = roam_mikado_filter_px( $margin_bottom ) . 'px';
		}
		
		$item_selector = array(
			'h6'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo roam_mikado_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'roam_mikado_style_dynamic', 'roam_mikado_h6_styles' );
}

if ( ! function_exists( 'roam_mikado_text_styles' ) ) {
	function roam_mikado_text_styles() {
		$item_styles = roam_mikado_get_typography_styles( 'text' );
		
		$item_selector = array(
			'p'
		);
		
		if ( ! empty( $item_styles ) ) {
			echo roam_mikado_dynamic_css( $item_selector, $item_styles );
		}
	}
	
	add_action( 'roam_mikado_style_dynamic', 'roam_mikado_text_styles' );
}

if ( ! function_exists( 'roam_mikado_link_styles' ) ) {
	function roam_mikado_link_styles() {
		$link_styles      = array();
		$link_color       = roam_mikado_options()->getOptionValue( 'link_color' );
		$link_font_style  = roam_mikado_options()->getOptionValue( 'link_fontstyle' );
		$link_font_weight = roam_mikado_options()->getOptionValue( 'link_fontweight' );
		$link_decoration  = roam_mikado_options()->getOptionValue( 'link_fontdecoration' );
		
		if ( ! empty( $link_color ) ) {
			$link_styles['color'] = $link_color;
		}
		if ( ! empty( $link_font_style ) ) {
			$link_styles['font-style'] = $link_font_style;
		}
		if ( ! empty( $link_font_weight ) ) {
			$link_styles['font-weight'] = $link_font_weight;
		}
		if ( ! empty( $link_decoration ) ) {
			$link_styles['text-decoration'] = $link_decoration;
		}
		
		$link_selector = array(
			'a',
			'p a'
		);
		
		if ( ! empty( $link_styles ) ) {
			echo roam_mikado_dynamic_css( $link_selector, $link_styles );
		}
	}
	
	add_action( 'roam_mikado_style_dynamic', 'roam_mikado_link_styles' );
}

if ( ! function_exists( 'roam_mikado_link_hover_styles' ) ) {
	function roam_mikado_link_hover_styles() {
		$link_hover_styles     = array();
		$link_hover_color      = roam_mikado_options()->getOptionValue( 'link_hovercolor' );
		$link_hover_decoration = roam_mikado_options()->getOptionValue( 'link_hover_fontdecoration' );
		
		if ( ! empty( $link_hover_color ) ) {
			$link_hover_styles['color'] = $link_hover_color;
		}
		if ( ! empty( $link_hover_decoration ) ) {
			$link_hover_styles['text-decoration'] = $link_hover_decoration;
		}
		
		$link_hover_selector = array(
			'a:hover',
			'p a:hover'
		);
		
		if ( ! empty( $link_hover_styles ) ) {
			echo roam_mikado_dynamic_css( $link_hover_selector, $link_hover_styles );
		}
		
		$link_heading_hover_styles = array();
		
		if ( ! empty( $link_hover_color ) ) {
			$link_heading_hover_styles['color'] = $link_hover_color;
		}
		
		$link_heading_hover_selector = array(
			'h1 a:hover',
			'h2 a:hover',
			'h3 a:hover',
			'h4 a:hover',
			'h5 a:hover',
			'h6 a:hover'
		);
		
		if ( ! empty( $link_heading_hover_styles ) ) {
			echo roam_mikado_dynamic_css( $link_heading_hover_selector, $link_heading_hover_styles );
		}
	}
	
	add_action( 'roam_mikado_style_dynamic', 'roam_mikado_link_hover_styles' );
}

if ( ! function_exists( 'roam_mikado_smooth_page_transition_styles' ) ) {
	function roam_mikado_smooth_page_transition_styles( $style ) {
		$id            = roam_mikado_get_page_id();
		$loader_style  = array();
		$current_style = '';
		
		$background_color = roam_mikado_get_meta_field_intersect( 'smooth_pt_bgnd_color', $id );
		if ( ! empty( $background_color ) ) {
			$loader_style['background-color'] = $background_color;
		}
		
		$loader_selector = array(
			'.mkdf-smooth-transition-loader'
		);
		
		if ( ! empty( $loader_style ) ) {
			$current_style .= roam_mikado_dynamic_css( $loader_selector, $loader_style );
		}
		
		$spinner_style = array();
		$spinner_color = roam_mikado_get_meta_field_intersect( 'smooth_pt_spinner_color', $id );
		if ( ! empty( $spinner_color ) ) {
			$spinner_style['background-color'] = $spinner_color;
		}
		
		$spinner_selectors = array(
			'.mkdf-st-loader .mkdf-rotate-circles > div',
			'.mkdf-st-loader .pulse',
			'.mkdf-st-loader .double_pulse .double-bounce1',
			'.mkdf-st-loader .double_pulse .double-bounce2',
			'.mkdf-st-loader .cube',
			'.mkdf-st-loader .rotating_cubes .cube1',
			'.mkdf-st-loader .rotating_cubes .cube2',
			'.mkdf-st-loader .stripes > div',
			'.mkdf-st-loader .wave > div',
			'.mkdf-st-loader .two_rotating_circles .dot1',
			'.mkdf-st-loader .two_rotating_circles .dot2',
			'.mkdf-st-loader .five_rotating_circles .container1 > div',
			'.mkdf-st-loader .five_rotating_circles .container2 > div',
			'.mkdf-st-loader .five_rotating_circles .container3 > div',
			'.mkdf-st-loader .atom .ball-1:before',
			'.mkdf-st-loader .atom .ball-2:before',
			'.mkdf-st-loader .atom .ball-3:before',
			'.mkdf-st-loader .atom .ball-4:before',
			'.mkdf-st-loader .clock .ball:before',
			'.mkdf-st-loader .mitosis .ball',
			'.mkdf-st-loader .lines .line1',
			'.mkdf-st-loader .lines .line2',
			'.mkdf-st-loader .lines .line3',
			'.mkdf-st-loader .lines .line4',
			'.mkdf-st-loader .fussion .ball',
			'.mkdf-st-loader .fussion .ball-1',
			'.mkdf-st-loader .fussion .ball-2',
			'.mkdf-st-loader .fussion .ball-3',
			'.mkdf-st-loader .fussion .ball-4',
			'.mkdf-st-loader .wave_circles .ball',
			'.mkdf-st-loader .pulse_circles .ball'
		);
		
		if ( ! empty( $spinner_style ) ) {
			$current_style .= roam_mikado_dynamic_css( $spinner_selectors, $spinner_style );
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'roam_mikado_add_page_custom_style', 'roam_mikado_smooth_page_transition_styles' );
}