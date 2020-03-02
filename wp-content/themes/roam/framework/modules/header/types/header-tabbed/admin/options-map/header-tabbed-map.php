<?php

if ( ! function_exists( 'roam_mikado_get_hide_dep_for_tabbed_options' ) ) {
	function roam_mikado_get_hide_dep_for_tabbed_options() {
		$hide_dep_options = apply_filters( 'roam_mikado_tabbed_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'roam_mikado_tabbed_options_map' ) ) {
	function roam_mikado_tabbed_options_map($menu_area_container) {
		$hide_dep_options = roam_mikado_get_hide_dep_for_tabbed_options();

		$tabbed_menu_area_container = roam_mikado_add_admin_container_no_style(
			array(
				'parent'          => $menu_area_container,
				'name'            => 'tabbed_menu_area_container',
				'hidden_property' => 'header_type',
				'hidden_values'   => $hide_dep_options
			)
		);

		roam_mikado_add_admin_field(
			array(
				'parent'        => $tabbed_menu_area_container,
				'type'          => 'color',
				'name'          => 'header_tabbed_logo_background_color',
				'label'         => esc_html__( 'Header Tabbed Logo Background Color', 'roam' ),
				'description'   => esc_html__( 'Choose background color for header tabbed logo', 'roam' )
			)
		);

		roam_mikado_add_admin_field(
			array(
				'parent'        => $tabbed_menu_area_container,
				'type'          => 'text',
				'name'          => 'header_tabbed_logo_background_transparency',
				'label'         => esc_html__( 'Header Tabbed Logo Background Transparency', 'roam' ),
				'description'   => esc_html__( 'Choose background color transparency for header tabbed logo', 'roam' ),
				'args'			=> array(
					'col_width' => 6
				)
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'parent'        => $tabbed_menu_area_container,
				'type'          => 'yesno',
				'name'          => 'disable_header_tabbed_top',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Header Tabbed Top Bar', 'roam' ),
				'description'   => esc_html__( 'Enabling this option will hide header tabbed top bar area', 'roam' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '#mkdf_tabbed_top_container',
					'dependence_show_on_yes' => ''
				)
			)
		);

		$tabbed_top_container = roam_mikado_add_admin_container(
			array(
				'parent'          => $tabbed_menu_area_container,
				'name'            => 'tabbed_top_container',
				'hidden_property' => 'disable_header_tabbed_top',
				'hidden_values'   => array('yes')
			)
		);

		roam_mikado_add_admin_field(
			array(
				'parent'        => $tabbed_top_container,
				'type'          => 'text',
				'name'          => 'header_tabbed_top_height',
				'label'         => esc_html__( 'Header Tabbed Top Bar Height', 'roam' ),
				'description'   => esc_html__( 'Set height for header tabbed top (default is 40px)', 'roam' ),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'parent'        => $tabbed_top_container,
				'type'          => 'color',
				'name'          => 'header_tabbed_top_background_color',
				'label'         => esc_html__( 'Header Tabbed Top Bar Background Color', 'roam' ),
				'description'   => esc_html__( 'Choose background color header tabbed top', 'roam' )
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'parent'        => $tabbed_top_container,
				'type'          => 'text',
				'name'          => 'header_tabbed_top_background_transparency',
				'label'         => esc_html__( 'Header Tabbed Top Bar Background Transparency', 'roam' ),
				'description'   => esc_html__( 'Choose background transparency header tabbed top', 'roam' ),
				'args'          => array(
					'col_width' => 6,
				)
			)
		);
	}
	
	add_action( 'roam_mikado_header_menu_area_additional_options', 'roam_mikado_tabbed_options_map' );
}