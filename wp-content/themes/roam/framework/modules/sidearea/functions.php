<?php
if ( ! function_exists( 'roam_mikado_register_side_area_sidebar' ) ) {
	/**
	 * Register side area sidebar
	 */
	function roam_mikado_register_side_area_sidebar() {
		register_sidebar(
			array(
				'id'            => 'sidearea',
				'name'          => esc_html__( 'Side Area', 'roam' ),
				'description'   => esc_html__( 'Side Area', 'roam' ),
				'before_widget' => '<div id="%1$s" class="widget mkdf-sidearea %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="mkdf-widget-title-holder"><h4 class="mkdf-widget-title">',
				'after_title'   => '</h4></div>'
			)
		);
	}
	
	add_action( 'widgets_init', 'roam_mikado_register_side_area_sidebar' );
}

if ( ! function_exists( 'roam_mikado_side_menu_body_class' ) ) {
	/**
	 * Function that adds body classes for different side menu styles
	 *
	 * @param $classes array original array of body classes
	 *
	 * @return array modified array of classes
	 */
	function roam_mikado_side_menu_body_class( $classes ) {
		
		if ( is_active_widget( false, false, 'mkdf_side_area_opener' ) ) {
			
			$classes[] = 'mkdf-side-menu-slide-from-right';
		}
		
		return $classes;
	}
	
	add_filter( 'body_class', 'roam_mikado_side_menu_body_class' );
}

if ( ! function_exists( 'roam_mikado_get_side_area' ) ) {
	/**
	 * Loads side area HTML
	 */
	function roam_mikado_get_side_area() {
		
		if ( is_active_widget( false, false, 'mkdf_side_area_opener' ) ) {
			
			roam_mikado_get_module_template_part( 'templates/sidearea', 'sidearea' );
		}
	}
	
	add_action( 'roam_mikado_after_body_tag', 'roam_mikado_get_side_area', 10 );
}