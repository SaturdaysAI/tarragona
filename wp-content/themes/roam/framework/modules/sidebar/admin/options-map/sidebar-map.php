<?php

if ( ! function_exists( 'roam_mikado_sidebar_options_map' ) ) {
	function roam_mikado_sidebar_options_map() {
		
		$sidebar_panel = roam_mikado_add_admin_panel(
			array(
				'title' => esc_html__( 'Sidebar Area', 'roam' ),
				'name' => 'sidebar',
				'page' => '_page_page'
			)
		);
		
		roam_mikado_add_admin_field( array(
			'name'          => 'sidebar_layout',
			'type'          => 'select',
			'label'         => esc_html__( 'Sidebar Layout', 'roam' ),
			'description'   => esc_html__( 'Choose a sidebar layout for pages', 'roam' ),
			'parent'        => $sidebar_panel,
			'default_value' => 'no-sidebar',
			'options'       => array(
				'no-sidebar'       => esc_html__( 'No Sidebar', 'roam' ),
				'sidebar-33-right' => esc_html__( 'Sidebar 1/3 Right', 'roam' ),
				'sidebar-25-right' => esc_html__( 'Sidebar 1/4 Right', 'roam' ),
				'sidebar-33-left'  => esc_html__( 'Sidebar 1/3 Left', 'roam' ),
				'sidebar-25-left'  => esc_html__( 'Sidebar 1/4 Left', 'roam' )
			)
		) );
		
		$roam_custom_sidebars = roam_mikado_get_custom_sidebars();
		if ( count( $roam_custom_sidebars ) > 0 ) {
			roam_mikado_add_admin_field( array(
				'name'        => 'custom_sidebar_area',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'roam' ),
				'description' => esc_html__( 'Choose a sidebar to display on pages. Default sidebar is "Sidebar"', 'roam' ),
				'parent'      => $sidebar_panel,
				'options'     => $roam_custom_sidebars,
				'args'        => array(
					'select2' => true
				)
			) );
		}
	}
	
	add_action( 'roam_mikado_additional_page_options_map', 'roam_mikado_sidebar_options_map', 9 );
}