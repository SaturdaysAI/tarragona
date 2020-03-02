<?php

if ( ! function_exists( 'roam_mikado_search_opener_icon_size' ) ) {
	function roam_mikado_search_opener_icon_size() {
		$icon_size = roam_mikado_options()->getOptionValue( 'header_search_icon_size' );
		
		if ( ! empty( $icon_size ) ) {
			echo roam_mikado_dynamic_css( '.mkdf-search-opener', array(
				'font-size' => roam_mikado_filter_px( $icon_size ) . 'px'
			) );
		}
	}
	
	add_action( 'roam_mikado_style_dynamic', 'roam_mikado_search_opener_icon_size' );
}

if ( ! function_exists( 'roam_mikado_search_opener_icon_colors' ) ) {
	function roam_mikado_search_opener_icon_colors() {
		$icon_color       = roam_mikado_options()->getOptionValue( 'header_search_icon_color' );
		$icon_hover_color = roam_mikado_options()->getOptionValue( 'header_search_icon_hover_color' );
		
		if ( ! empty( $icon_color ) ) {
			echo roam_mikado_dynamic_css( '.mkdf-search-opener', array(
				'color' => $icon_color
			) );
		}
		
		if ( ! empty( $icon_hover_color ) ) {
			echo roam_mikado_dynamic_css( '.mkdf-search-opener:hover', array(
				'color' => $icon_hover_color
			) );
		}
	}
	
	add_action( 'roam_mikado_style_dynamic', 'roam_mikado_search_opener_icon_colors' );
}

if ( ! function_exists( 'roam_mikado_search_opener_text_styles' ) ) {
	function roam_mikado_search_opener_text_styles() {
		$item_styles = roam_mikado_get_typography_styles( 'search_icon_text' );
		
		$item_selector = array(
			'.mkdf-search-icon-text'
		);
		
		echo roam_mikado_dynamic_css( $item_selector, $item_styles );
		
		$text_hover_color = roam_mikado_options()->getOptionValue( 'search_icon_text_color_hover' );
		
		if ( ! empty( $text_hover_color ) ) {
			echo roam_mikado_dynamic_css( '.mkdf-search-opener:hover .mkdf-search-icon-text', array(
				'color' => $text_hover_color
			) );
		}
	}
	
	add_action( 'roam_mikado_style_dynamic', 'roam_mikado_search_opener_text_styles' );
}