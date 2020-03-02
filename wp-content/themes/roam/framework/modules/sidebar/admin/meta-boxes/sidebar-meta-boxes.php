<?php

if ( ! function_exists( 'roam_mikado_map_sidebar_meta' ) ) {
	function roam_mikado_map_sidebar_meta() {
		$mkdf_sidebar_meta_box = roam_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'roam_mikado_set_scope_for_meta_boxes', array( 'page' ) ),
				'title' => esc_html__( 'Sidebar', 'roam' ),
				'name'  => 'sidebar_meta'
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_sidebar_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Layout', 'roam' ),
				'description' => esc_html__( 'Choose the sidebar layout', 'roam' ),
				'parent'      => $mkdf_sidebar_meta_box,
				'options'     => array(
					''                 => esc_html__( 'Default', 'roam' ),
					'no-sidebar'       => esc_html__( 'No Sidebar', 'roam' ),
					'sidebar-33-right' => esc_html__( 'Sidebar 1/3 Right', 'roam' ),
					'sidebar-25-right' => esc_html__( 'Sidebar 1/4 Right', 'roam' ),
					'sidebar-33-left'  => esc_html__( 'Sidebar 1/3 Left', 'roam' ),
					'sidebar-25-left'  => esc_html__( 'Sidebar 1/4 Left', 'roam' )
				)
			)
		);
		
		$mkdf_custom_sidebars = roam_mikado_get_custom_sidebars();
		if ( count( $mkdf_custom_sidebars ) > 0 ) {
			roam_mikado_create_meta_box_field(
				array(
					'name'        => 'mkdf_custom_sidebar_area_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Widget Area in Sidebar', 'roam' ),
					'description' => esc_html__( 'Choose Custom Widget area to display in Sidebar"', 'roam' ),
					'parent'      => $mkdf_sidebar_meta_box,
					'options'     => $mkdf_custom_sidebars,
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
	}
	
	add_action( 'roam_mikado_meta_boxes_map', 'roam_mikado_map_sidebar_meta', 31 );
}