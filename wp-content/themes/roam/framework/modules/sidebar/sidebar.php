<?php

if ( ! function_exists( 'roam_mikado_register_sidebars' ) ) {
	/**
	 * Function that registers theme's sidebars
	 */
	function roam_mikado_register_sidebars() {
		
		register_sidebar(
			array(
				'id'            => 'sidebar',
				'name'          => esc_html__( 'Sidebar', 'roam' ),
				'description'   => esc_html__( 'Default Sidebar', 'roam' ),
				'before_widget' => '<div id="%1$s" class="widget %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<div class="mkdf-widget-title-holder"><h4 class="mkdf-widget-title">',
				'after_title'   => '</h4></div>'
			)
		);
	}
	
	add_action( 'widgets_init', 'roam_mikado_register_sidebars', 1 );
}

if ( ! function_exists( 'roam_mikado_add_support_custom_sidebar' ) ) {
	/**
	 * Function that adds theme support for custom sidebars. It also creates RoamMikadoSidebar object
	 */
	function roam_mikado_add_support_custom_sidebar() {
		add_theme_support( 'RoamMikadoSidebar' );
		
		if ( get_theme_support( 'RoamMikadoSidebar' ) ) {
			new RoamMikadoSidebar();
		}
	}
	
	add_action( 'after_setup_theme', 'roam_mikado_add_support_custom_sidebar' );
}