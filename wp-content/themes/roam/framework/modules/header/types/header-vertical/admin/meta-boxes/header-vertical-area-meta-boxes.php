<?php

if ( ! function_exists( 'roam_mikado_get_hide_dep_for_header_vertical_area_meta_boxes' ) ) {
	function roam_mikado_get_hide_dep_for_header_vertical_area_meta_boxes() {
		$hide_dep_options = apply_filters( 'roam_mikado_header_vertical_hide_meta_boxes', $hide_dep_options = array() );
		
		return $hide_dep_options;
	}
}

if ( ! function_exists( 'roam_mikado_header_vertical_area_meta_options_map' ) ) {
	function roam_mikado_header_vertical_area_meta_options_map( $header_meta_box ) {
		$hide_dep_options = roam_mikado_get_hide_dep_for_header_vertical_area_meta_boxes();
		
		$header_vertical_area_meta_container = roam_mikado_add_admin_container(
			array(
				'parent'          => $header_meta_box,
				'name'            => 'header_vertical_area_container',
				'hidden_property' => 'mkdf_header_type_meta',
				'hidden_values'   => $hide_dep_options
			)
		);
		
		roam_mikado_add_admin_section_title(
			array(
				'parent' => $header_vertical_area_meta_container,
				'name'   => 'vertical_area_style',
				'title'  => esc_html__( 'Vertical Area Style', 'roam' )
			)
		);
		
		$roam_custom_sidebars = roam_mikado_get_custom_sidebars();
		if ( count( $roam_custom_sidebars ) > 0 ) {
			roam_mikado_create_meta_box_field(
				array(
					'name'        => 'mkdf_custom_vertical_area_sidebar_meta',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Choose Custom Widget Area in Vertical area', 'roam' ),
					'description' => esc_html__( 'Choose custom widget area to display in vertical menu"', 'roam' ),
					'parent'      => $header_vertical_area_meta_container,
					'options'     => $roam_custom_sidebars
				)
			);
		}
		
		roam_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_vertical_header_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'roam' ),
				'description' => esc_html__( 'Set background color for vertical menu', 'roam' ),
				'parent'      => $header_vertical_area_meta_container
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_vertical_header_background_image_meta',
				'type'          => 'image',
				'default_value' => '',
				'label'         => esc_html__( 'Background Image', 'roam' ),
				'description'   => esc_html__( 'Set background image for vertical menu', 'roam' ),
				'parent'        => $header_vertical_area_meta_container
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_disable_vertical_header_background_image_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Background Image', 'roam' ),
				'description'   => esc_html__( 'Enabling this option will hide background image in Vertical Menu', 'roam' ),
				'parent'        => $header_vertical_area_meta_container
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_vertical_header_shadow_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Shadow', 'roam' ),
				'description'   => esc_html__( 'Set shadow on vertical menu', 'roam' ),
				'parent'        => $header_vertical_area_meta_container,
				'default_value' => '',
				'options'       => roam_mikado_get_yes_no_select_array()
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_vertical_header_border_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Vertical Area Border', 'roam' ),
				'description'   => esc_html__( 'Set border on vertical area', 'roam' ),
				'parent'        => $header_vertical_area_meta_container,
				'default_value' => '',
				'options'       => roam_mikado_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#mkdf_vertical_header_border_container',
						'no'  => '#mkdf_vertical_header_border_container',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#mkdf_vertical_header_border_container'
					)
				)
			)
		);
		
		$vertical_header_border_container = roam_mikado_add_admin_container(
			array(
				'type'            => 'container',
				'name'            => 'vertical_header_border_container',
				'parent'          => $header_vertical_area_meta_container,
				'hidden_property' => 'mkdf_vertical_header_border_meta',
				'hidden_value'    => 'no',
				'hidden_values'   => array( '', 'no' )
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_vertical_header_border_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Border Color', 'roam' ),
				'description' => esc_html__( 'Choose color of border', 'roam' ),
				'parent'      => $vertical_header_border_container
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_vertical_header_center_content_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Center Content', 'roam' ),
				'description'   => esc_html__( 'Set content in vertical center', 'roam' ),
				'parent'        => $header_vertical_area_meta_container,
				'default_value' => '',
				'options'       => roam_mikado_get_yes_no_select_array()
			)
		);
	}
	
	add_action( 'roam_mikado_additional_header_area_meta_boxes_map', 'roam_mikado_header_vertical_area_meta_options_map', 10, 1 );
}