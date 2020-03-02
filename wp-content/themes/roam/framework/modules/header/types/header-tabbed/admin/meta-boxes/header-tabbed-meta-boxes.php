<?php 

if ( ! function_exists( 'roam_mikado_get_hide_dep_for_header_tabbed_meta_boxes' ) ) {
	function roam_mikado_get_hide_dep_for_header_tabbed_meta_boxes() {
		$hide_dep_options = apply_filters( 'roam_mikado_header_tabbed_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'roam_mikado_header_tabbed_meta_options_map' ) ) {
	function roam_mikado_header_tabbed_meta_options_map( $menu_area_container ) {
		$hide_dep_options = roam_mikado_get_hide_dep_for_header_tabbed_meta_boxes();
		
		$header_tabbed_meta_container = roam_mikado_add_admin_container_no_style(
			array(
				'type'            => 'container',
				'name'            => 'header_tabbed_meta_container',
				'parent'          => $menu_area_container,
				'hidden_property' => 'mkdf_header_type_meta',
				'hidden_values'   => $hide_dep_options,
				'args'            => array(
					'enable_panels_for_default_value' => true
				)
			)
		);

		roam_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_disable_header_tabbed_top_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Disable Header Tabbed Top Bar', 'roam' ),
				'description'   => esc_html__( 'Enabling this option will hide header tabbed top bar area', 'roam' ),
				'parent'        => $header_tabbed_meta_container,
				'options'		=> roam_mikado_get_yes_no_select_array(),
				'args'          => array(
					'dependence'             => true,
					'show' => array(
						'' => '#mkdf_header_tabbed_top_meta_container',
						'yes' => '',
						'no' => '#mkdf_header_tabbed_top_meta_container',
					),
					'hide' => array(
						'' => '',
						'yes' => '#mkdf_header_tabbed_top_meta_container',
						'no' => '',
					)
				)
			)
		);

		$roam_custom_sidebars = roam_mikado_get_custom_sidebars();
		if ( count( $roam_custom_sidebars ) > 0 ) {

			$header_tabbed_top_meta_container = roam_mikado_add_admin_container(
				array(
					'type'            => 'container',
					'name'            => 'header_tabbed_top_meta_container',
					'parent'          => $header_tabbed_meta_container,
					'hidden_property' => 'mkdf_disable_header_tabbed_top_meta',
					'hidden_values'   => array('yes'),
					'args'            => array(
						'enable_panels_for_default_value' => true
					)
				)
			);

			roam_mikado_create_meta_box_field(
				array(
					'name'        => 'mkdf_custom_menu_area_tabbed_top_left_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area In Header Tabbed Top Left', 'roam' ),
					'description' => esc_html__( 'Choose custom widget area to display in header tabbed top left"', 'roam' ),
					'parent'      => $header_tabbed_top_meta_container,
					'options'     => $roam_custom_sidebars
				)
			);

			roam_mikado_create_meta_box_field(
				array(
					'name'        => 'mkdf_custom_menu_area_tabbed_top_right_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area In Header Tabbed Top Right', 'roam' ),
					'description' => esc_html__( 'Choose custom widget area to display in header tabbed top right"', 'roam' ),
					'parent'      => $header_tabbed_top_meta_container,
					'options'     => $roam_custom_sidebars
				)
			);
		}
	}

	add_action('roam_mikado_header_menu_area_additional_meta_boxes_map','roam_mikado_header_tabbed_meta_options_map');
}