<?php

if ( ! function_exists( 'roam_mikado_get_hide_dep_for_header_logo_area_options' ) ) {
	function roam_mikado_get_hide_dep_for_header_logo_area_options() {
		$hide_dep_options = apply_filters( 'roam_mikado_header_logo_area_hide_global_option', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'roam_mikado_header_logo_area_options_map' ) ) {
	function roam_mikado_header_logo_area_options_map( $panel_header ) {
		$hide_dep_options = roam_mikado_get_hide_dep_for_header_logo_area_options();
		
		$logo_area_container = roam_mikado_add_admin_container_no_style(
			array(
				'parent'          => $panel_header,
				'name'            => 'logo_area_container',
				'hidden_property' => 'header_type',
				'hidden_values'   => $hide_dep_options
			)
		);
		
		roam_mikado_add_admin_section_title(
			array(
				'parent' => $logo_area_container,
				'name'   => 'logo_menu_area_title',
				'title'  => esc_html__( 'Logo Area', 'roam' )
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'parent'        => $logo_area_container,
				'type'          => 'yesno',
				'name'          => 'logo_area_in_grid',
				'default_value' => 'no',
				'label'         => esc_html__( 'Logo Area In Grid', 'roam' ),
				'description'   => esc_html__( 'Set menu area content to be in grid', 'roam' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#mkdf_logo_area_in_grid_container'
				)
			)
		);
		
		$logo_area_in_grid_container = roam_mikado_add_admin_container(
			array(
				'parent'          => $logo_area_container,
				'name'            => 'logo_area_in_grid_container',
				'hidden_property' => 'logo_area_in_grid',
				'hidden_value'    => 'no'
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'parent'        => $logo_area_in_grid_container,
				'type'          => 'color',
				'name'          => 'logo_area_grid_background_color',
				'default_value' => '',
				'label'         => esc_html__( 'Grid Background Color', 'roam' ),
				'description'   => esc_html__( 'Set grid background color for logo area', 'roam' ),
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'parent'        => $logo_area_in_grid_container,
				'type'          => 'text',
				'name'          => 'logo_area_grid_background_transparency',
				'default_value' => '',
				'label'         => esc_html__( 'Grid Background Transparency', 'roam' ),
				'description'   => esc_html__( 'Set grid background transparency', 'roam' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'parent'        => $logo_area_in_grid_container,
				'type'          => 'yesno',
				'name'          => 'logo_area_in_grid_border',
				'default_value' => 'no',
				'label'         => esc_html__( 'Grid Area Border', 'roam' ),
				'description'   => esc_html__( 'Set border on grid area', 'roam' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#mkdf_logo_area_in_grid_border_container'
				)
			)
		);
		
		$logo_area_in_grid_border_container = roam_mikado_add_admin_container(
			array(
				'parent'          => $logo_area_in_grid_container,
				'name'            => 'logo_area_in_grid_border_container',
				'hidden_property' => 'logo_area_in_grid_border',
				'hidden_value'    => 'no'
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'parent'        => $logo_area_in_grid_border_container,
				'type'          => 'color',
				'name'          => 'logo_area_in_grid_border_color',
				'default_value' => '',
				'label'         => esc_html__( 'Border Color', 'roam' ),
				'description'   => esc_html__( 'Set border color for grid area', 'roam' ),
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'parent'        => $logo_area_container,
				'type'          => 'color',
				'name'          => 'logo_area_background_color',
				'default_value' => '',
				'label'         => esc_html__( 'Background Color', 'roam' ),
				'description'   => esc_html__( 'Set background color for logo area', 'roam' )
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'parent'        => $logo_area_container,
				'type'          => 'text',
				'name'          => 'logo_area_background_transparency',
				'default_value' => '',
				'label'         => esc_html__( 'Background Transparency', 'roam' ),
				'description'   => esc_html__( 'Set background transparency for logo area', 'roam' ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'parent'        => $logo_area_container,
				'type'          => 'yesno',
				'name'          => 'logo_area_border',
				'default_value' => 'no',
				'label'         => esc_html__( 'Logo Area Border', 'roam' ),
				'description'   => esc_html__( 'Set border on logo area', 'roam' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#mkdf_logo_area_border_container'
				)
			)
		);
		
		$logo_area_border_container = roam_mikado_add_admin_container(
			array(
				'parent'          => $logo_area_container,
				'name'            => 'logo_area_border_container',
				'hidden_property' => 'logo_area_border',
				'hidden_value'    => 'no'
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'parent'        => $logo_area_border_container,
				'type'          => 'color',
				'name'          => 'logo_area_border_color',
				'default_value' => '',
				'label'         => esc_html__( 'Border Color', 'roam' ),
				'description'   => esc_html__( 'Set border color for logo area', 'roam' ),
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'parent'        => $logo_area_container,
				'type'          => 'text',
				'name'          => 'logo_area_height',
				'default_value' => '',
				'label'         => esc_html__( 'Height', 'roam' ),
				'description'   => esc_html__( 'Enter logo area height (default is 90px)', 'roam' ),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		do_action( 'roam_mikado_header_logo_area_additional_options', $logo_area_container );
	}
	
	add_action( 'roam_mikado_header_logo_area_options_map', 'roam_mikado_header_logo_area_options_map', 10, 1 );
}