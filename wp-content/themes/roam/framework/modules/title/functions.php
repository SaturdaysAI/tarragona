<?php

if ( ! function_exists( 'roam_mikado_include_title_types' ) ) {
	/**
	 * Load's all title types by going through all folders that are placed directly in title types folder
	 */
	function roam_mikado_include_title_types() {
		foreach ( glob( MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/load.php' ) as $module_load ) {
			include_once $module_load;
		}
	}
	
	add_action('roam_mikado_options_map', 'roam_mikado_include_title_types', 1); // 1 is set to just be before title option map init
}

if ( ! function_exists( 'roam_mikado_get_title' ) ) {
	/**
	 * Loads title area template
	 */
	function roam_mikado_get_title() {
		$page_id              = roam_mikado_get_page_id();
		$show_title_area_meta = roam_mikado_get_meta_field_intersect( 'show_title_area', $page_id ) == 'yes' ? true : false;
		$show_title_area      = apply_filters( 'roam_mikado_show_title_area', $show_title_area_meta );
		
		if ( $show_title_area ) {
			$type_meta     = roam_mikado_get_meta_field_intersect( 'title_area_type', $page_id );
			$type          = ! empty( $type_meta ) ? $type_meta : 'standard';
			$template_path = apply_filters( 'roam_mikado_title_template_path', $template_path = 'types/' . $type . '/templates/' . $type . '-title' );
			$module        = apply_filters( 'roam_mikado_title_module', $module = 'title' );
			$layout        = apply_filters( 'roam_mikado_title_layout', $layout = '' );
			
			$title_tag_meta = roam_mikado_get_meta_field_intersect( 'title_area_title_tag', $page_id );
			$title_tag      = ! empty( $title_tag_meta ) ? $title_tag_meta : 'h1';
			
			$subtitle_tag_meta = roam_mikado_get_meta_field_intersect( 'title_area_subtitle_tag', $page_id );
			$subtitle_tag      = ! empty( $subtitle_tag_meta ) ? $subtitle_tag_meta : 'h6';
			
			$parameters = array(
				'holder_classes'  => roam_mikado_get_title_holder_classes(),
				'holder_styles'   => roam_mikado_get_title_holder_styles(),
				'holder_data'     => roam_mikado_get_title_holder_data(),
				'wrapper_styles'  => roam_mikado_get_title_wrapper_styles(),
				'title_image'     => roam_mikado_get_title_background_image(),
				'title'           => roam_mikado_get_title_text(),
				'title_tag'       => $title_tag,
				'title_styles'    => roam_mikado_get_title_styles(),
				'subtitle'        => roam_mikado_subtitle_text(),
				'subtitle_tag'    => $subtitle_tag,
				'subtitle_styles' => roam_mikado_get_subtitle_styles(),
			);
			$parameters = apply_filters( 'roam_mikado_title_area_params', $parameters );
			
			roam_mikado_get_module_template_part( $template_path, $module, $layout, $parameters );
		}
	}
}

if ( ! function_exists( 'roam_mikado_get_title_holder_classes' ) ) {
	/**
	 * Function that adds classes to title holder div
	 */
	function roam_mikado_get_title_holder_classes() {
		$page_id            = roam_mikado_get_page_id();
		$title_type_meta    = roam_mikado_get_meta_field_intersect( 'title_area_type', $page_id );
		$title_type         = ! empty( $title_type_meta ) ? $title_type_meta : 'standard';
		$title_in_grid_meta = roam_mikado_get_meta_field_intersect( 'title_area_in_grid', $page_id );
		$title_img          = roam_mikado_get_meta_field_intersect( 'title_area_background_image', $page_id );
		$title_img_behavior = roam_mikado_get_meta_field_intersect( 'title_area_background_image_behavior', $page_id );
		
		$classes = array();
		
		$classes[] = 'mkdf-' . $title_type . '-type';
		
		if ( $title_in_grid_meta === 'no' ) {
			$classes[] = 'mkdf-title-full-width';
		}
		
		if ( ! empty( $title_img ) && $title_img_behavior !== 'hide' ) {
			$classes[] = 'mkdf-preload-background';
			$classes[] = 'mkdf-has-bg-image';
			
			if ( ! empty( $title_img_behavior ) ) {
				$classes[] = 'mkdf-bg-' . $title_img_behavior;
			}
			
			if ( $title_img_behavior === 'parallax-zoom-out' ) {
				$classes[] = 'mkdf-bg-parallax';
			}
		}
		
		return implode( ' ', apply_filters( 'roam_mikado_title_holder_classes', $classes ) );
	}
}

if ( ! function_exists( 'roam_mikado_get_title_holder_styles' ) ) {
	/**
	 * Function that adds inline styles to title holder div
	 */
	function roam_mikado_get_title_holder_styles() {
		$page_id               = roam_mikado_get_page_id();
		$title_height          = roam_mikado_get_title_area_height();
		$title_content_padding = roam_mikado_get_title_content_padding();
		$title_bg_color        = roam_mikado_get_meta_field_intersect( 'title_area_background_color', $page_id );
		$title_image           = roam_mikado_get_meta_field_intersect( 'title_area_background_image', $page_id );
		$title_image_behavior  = roam_mikado_get_meta_field_intersect( 'title_area_background_image_behavior', $page_id );
		
		$styles = array();
		
		if ( ! empty( $title_height ) ) {
			$styles[] = 'height: ' . ( $title_height + $title_content_padding ) . 'px';
		}
		
		if ( ! empty( $title_bg_color ) ) {
			$styles[] = 'background-color: ' . $title_bg_color;
		}
		
		if ( ! empty( $title_image ) && $title_image_behavior !== 'hide' ) {
			$styles[] = 'background-image:url(' . esc_url( $title_image ) . ');';
		}
		
		return implode( ';', $styles );
	}
}

if ( ! function_exists( 'roam_mikado_get_title_holder_data' ) ) {
	/**
	 * Function that adds data attributes to title holder div
	 */
	function roam_mikado_get_title_holder_data() {
		$page_id            = roam_mikado_get_page_id();
		$title_height       = roam_mikado_get_title_area_height();
		$title_img          = roam_mikado_get_meta_field_intersect( 'title_area_background_image', $page_id );
		$title_img_behavior = roam_mikado_get_meta_field_intersect( 'title_area_background_image_behavior', $page_id );
		
		$data = array();
		
		if ( ! empty( $title_height ) ) {
			$data['data-height'] = $title_height;
		}
		
		if ( ! empty( $title_img ) && $title_img_behavior === 'parallax-zoom-out' ) {
			$attachment_dimensions = roam_mikado_get_image_dimensions( $title_img );
			
			if ( ! empty( $attachment_dimensions['width'] ) ) {
				$data['data-background-width'] = esc_attr( $attachment_dimensions['width'] );
			}
		}
		
		return apply_filters( 'roam_mikado_title_holder_data', $data );
	}
}

if ( ! function_exists( 'roam_mikado_get_title_wrapper_styles' ) ) {
	/**
	 * Function that adds inline styles to title wrapper div
	 */
	function roam_mikado_get_title_wrapper_styles() {
		$page_id                  = roam_mikado_get_page_id();
		$title_height             = roam_mikado_get_title_area_height();
		$title_content_padding    = roam_mikado_get_title_content_padding();
		$title_img_behavior       = roam_mikado_get_meta_field_intersect( 'title_area_background_image_behavior', $page_id );
		$title_vertical_alignment = roam_mikado_get_meta_field_intersect( 'title_area_vertical_alignment', $page_id );
		
		$styles = array();
		
		if ( $title_vertical_alignment === 'header_bottom' ) {
			
			if ( $title_img_behavior !== 'responsive' ) {
				$styles[] = 'height: ' . $title_height . 'px';
			}
			
			if ( ! empty( $title_content_padding ) ) {
				$styles[] = 'padding-top: ' . $title_content_padding . 'px';
			}
		}
		
		return implode( ';', $styles );
	}
}

if ( ! function_exists( 'roam_mikado_get_title_background_image' ) ) {
	/**
	 * Function that return background image data if background image is set
	 */
	function roam_mikado_get_title_background_image() {
		$page_id            = roam_mikado_get_page_id();
		$title_img          = roam_mikado_get_meta_field_intersect( 'title_area_background_image', $page_id );
		$title_img_behavior = roam_mikado_get_meta_field_intersect( 'title_area_background_image_behavior', $page_id );
		
		$image = array();
		
		if ( ! empty( $title_img ) && $title_img_behavior !== 'hide' ) {
			$image_id = roam_mikado_get_attachment_id_from_url( $title_img );
			$alt      = ! empty( $image_id ) ? get_post_meta( $image_id, '_wp_attachment_image_alt', true ) : '';
			
			$image['src'] = $title_img;
			$image['alt'] = ! empty( $alt ) ? esc_html( $alt ) : esc_html__( 'Image Alt', 'roam' );
		}
		
		return $image;
	}
}

if ( ! function_exists( 'roam_mikado_get_title_area_height' ) ) {
	/**
	 * Function that returns title area height
	 **/
	function roam_mikado_get_title_area_height() {
		$title_height_meta = roam_mikado_get_meta_field_intersect( 'title_area_height' );
		$title_height      = ! empty( $title_height_meta ) ? intval( $title_height_meta ) : apply_filters( 'roam_mikado_title_area_default_height_value', 300 );
		
		return apply_filters( 'roam_mikado_title_area_height', $title_height );
	}
}

if ( ! function_exists( 'roam_mikado_get_title_content_padding' ) ) {
	/**
	 * Function that returns title content padding
	 **/
	function roam_mikado_get_title_content_padding() {
		$title_content_padding = apply_filters( 'roam_mikado_title_content_padding', 0 );
		
		return intval($title_content_padding);
	}
}

if ( ! function_exists( 'roam_mikado_get_title_text' ) ) {
	/**
	 * Function that returns current page title text
	 */
	function roam_mikado_get_title_text() {
		$id    = roam_mikado_get_page_id();
		$title = get_the_title( $id );
		
		if ( ( is_home() && is_front_page() ) || is_singular( 'post' ) ) {
			$title = get_option( 'blogname' );
		} elseif ( is_tag() ) {
			$title = single_term_title( '', false ) . esc_html__( ' Tag', 'roam' );
		} elseif ( is_date() ) {
			$title = get_the_time( 'F Y' );
		} elseif ( is_author() ) {
			$title = esc_html__( 'Author:', 'roam' ) . " " . get_the_author();
		} elseif ( is_category() ) {
			$title = single_cat_title( '', false );
		} elseif ( is_archive() ) {
			$title = esc_html__( 'Archive', 'roam' );
		} elseif ( is_search() ) {
			$title = esc_html__( 'Search results for: ', 'roam' ) . get_search_query();
		} elseif ( is_404() ) {
			$title_404 = roam_mikado_options()->getOptionValue( '404_title' );
			$title     = ! empty( $title_404 ) ? $title_404 : esc_html__( '404 - Page not found', 'roam' );
		}
		
		return apply_filters( 'roam_mikado_title_text', $title );
	}
}

if ( ! function_exists( 'roam_mikado_get_title_styles' ) ) {
	/**
	 * Function that adds inline styles to page title
	 */
	function roam_mikado_get_title_styles() {
		$page_id = roam_mikado_get_page_id();
		$color   = get_post_meta( $page_id, 'mkdf_title_text_color_meta', true );
		
		$styles = array();
		
		if ( ! empty( $color ) ) {
			$styles[] = 'color: ' . esc_attr( $color );
		}
		
		return implode( ';', $styles );
	}
}

if ( ! function_exists( 'roam_mikado_subtitle_text' ) ) {
	/**
	 * Function that echoes subtitle text.
	 */
	function roam_mikado_subtitle_text() {
		$subtitle_meta = get_post_meta( roam_mikado_get_page_id(), 'mkdf_title_area_subtitle_meta', true );
		$subtitle      = ! empty( $subtitle_meta ) ? $subtitle_meta : '';
		
		return apply_filters( 'roam_mikado_subtitle_title_text', $subtitle );
	}
}

if ( ! function_exists( 'roam_mikado_get_subtitle_styles' ) ) {
	/**
	 * Function that adds inline styles to page subtitle
	 */
	function roam_mikado_get_subtitle_styles() {
		$page_id      = roam_mikado_get_page_id();
		$color        = get_post_meta( $page_id, 'mkdf_subtitle_color_meta', true );
		$side_padding = get_post_meta( $page_id, 'mkdf_subtitle_side_padding_meta', true );
		
		$styles = array();
		
		if ( ! empty( $color ) ) {
			$styles[] = 'color: ' . $color;
		}
		
		if ( $side_padding !== '' ) {
			if ( roam_mikado_string_ends_with( $side_padding, '%' ) || roam_mikado_string_ends_with( $side_padding, 'px' ) ) {
				$styles[] = 'padding: 0 ' . $side_padding;
			} else {
				$styles[] = 'padding: 0 ' . intval( $side_padding ) . 'px';
			}
		}
		
		return implode( ';', $styles );
	}
}