<?php

if (!function_exists('roam_mikado_header_tabbed_general_styles')) {
	function roam_mikado_header_tabbed_general_styles() {
		$top_style = array();
		$top_selector = array(
			'.mkdf-header-tabbed .mkdf-page-header .mkdf-menu-area .mkdf-header-tabbed-right .mkdf-header-tabbed-right-inner .mkdf-header-tabbed-top'
		);
		
		$height         			= roam_mikado_options()->getOptionValue('header_tabbed_top_height');
		$background_color         	= roam_mikado_options()->getOptionValue('header_tabbed_top_background_color');
		$background_transparency    = roam_mikado_options()->getOptionValue('header_tabbed_top_background_transparency');
		
		if ($height !== ''){
			$top_style['height'] = roam_mikado_filter_px($height).'px';
		}

		if ($background_color !== ''){
			$transparency = 1;
			if ($background_transparency !== ''){
				$transparency = $background_transparency;
			}

			$top_style['background-color'] = roam_mikado_rgba_color( $background_color, $transparency );
		}

		echo roam_mikado_dynamic_css( $top_selector, $top_style );

		$logo_style = array();
		$logo_selector = array(
			'.mkdf-header-tabbed .mkdf-page-header .mkdf-menu-area .mkdf-header-tabbed-left'
		);
		
		$background_color         	= roam_mikado_options()->getOptionValue('header_tabbed_logo_background_color');
		$background_transparency    = roam_mikado_options()->getOptionValue('header_tabbed_logo_background_transparency');

		if ($background_color !== ''){
			$transparency = 1;
			if ($background_transparency !== ''){
				$transparency = $background_transparency;
			}

			$logo_style['background-color'] = roam_mikado_rgba_color( $background_color, $transparency );
		}

		echo roam_mikado_dynamic_css( $logo_selector, $logo_style );
	}

	add_action('roam_mikado_style_dynamic', 'roam_mikado_header_tabbed_general_styles');
}
