<?php

if ( ! function_exists( 'roam_mikado_get_title_types_meta_boxes' ) ) {
	function roam_mikado_get_title_types_meta_boxes() {
		$title_type_options = apply_filters( 'roam_mikado_title_type_meta_boxes', $title_type_options = array( '' => esc_html__( 'Default', 'roam' ) ) );
		
		return $title_type_options;
	}
}

foreach ( glob( MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/title/types/*/admin/meta-boxes/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'roam_mikado_map_title_meta' ) ) {
	function roam_mikado_map_title_meta() {
		$title_type_meta_boxes = roam_mikado_get_title_types_meta_boxes();
		
		$title_meta_box = roam_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'roam_mikado_set_scope_for_meta_boxes', array( 'page', 'post' ) ),
				'title' => esc_html__( 'Title', 'roam' ),
				'name'  => 'title_meta'
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_title_area_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'roam' ),
				'description'   => esc_html__( 'Disabling this option will turn off page title area', 'roam' ),
				'parent'        => $title_meta_box,
				'options'       => roam_mikado_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '',
						'no'  => '#mkdf_mkdf_show_title_area_meta_container',
						'yes' => ''
					),
					'show'       => array(
						''    => '#mkdf_mkdf_show_title_area_meta_container',
						'no'  => '',
						'yes' => '#mkdf_mkdf_show_title_area_meta_container'
					)
				)
			)
		);
		
			$show_title_area_meta_container = roam_mikado_add_admin_container(
				array(
					'parent'          => $title_meta_box,
					'name'            => 'mkdf_show_title_area_meta_container',
					'hidden_property' => 'mkdf_show_title_area_meta',
					'hidden_value'    => 'no'
				)
			);
		
				roam_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_type_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area Type', 'roam' ),
						'description'   => esc_html__( 'Choose title type', 'roam' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => $title_type_meta_boxes
					)
				);
		
				roam_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_in_grid_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Area In Grid', 'roam' ),
						'description'   => esc_html__( 'Set title area content to be in grid', 'roam' ),
						'options'       => roam_mikado_get_yes_no_select_array(),
						'parent'        => $show_title_area_meta_container
					)
				);
		
				roam_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_title_area_height_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Height', 'roam' ),
						'description' => esc_html__( 'Set a height for Title Area', 'roam' ),
						'parent'      => $show_title_area_meta_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px'
						)
					)
				);
				
				roam_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_title_area_background_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Background Color', 'roam' ),
						'description' => esc_html__( 'Choose a background color for title area', 'roam' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				roam_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_title_area_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'roam' ),
						'description' => esc_html__( 'Choose an Image for title area', 'roam' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
				roam_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_background_image_behavior_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Behavior', 'roam' ),
						'description'   => esc_html__( 'Choose title area background image behavior', 'roam' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''                    => esc_html__( 'Default', 'roam' ),
							'hide'                => esc_html__( 'Hide Image', 'roam' ),
							'responsive'          => esc_html__( 'Enable Responsive Image', 'roam' ),
							'responsive-disabled' => esc_html__( 'Disable Responsive Image', 'roam' ),
							'full-screen'         => esc_html__( 'Enable Full Screen Height Image', 'roam' ),
							'full-screen-disabled'=> esc_html__( 'Disable Full Screen Height Image', 'roam' ),
							'parallax'            => esc_html__( 'Enable Parallax Image', 'roam' ),
							'parallax-zoom-out'   => esc_html__( 'Enable Parallax With Zoom Out Image', 'roam' ),
							'parallax-disabled'   => esc_html__( 'Disable Parallax Image', 'roam' )
						)
					)
				);
				
				roam_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_vertical_alignment_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Vertical Alignment', 'roam' ),
						'description'   => esc_html__( 'Specify title area content vertical alignment', 'roam' ),
						'parent'        => $show_title_area_meta_container,
						'options'       => array(
							''              => esc_html__( 'Default', 'roam' ),
							'header_bottom' => esc_html__( 'From Bottom of Header', 'roam' ),
							'window_top'    => esc_html__( 'From Window Top', 'roam' )
						)
					)
				);
				
				roam_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_title_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Title Tag', 'roam' ),
						'options'       => roam_mikado_get_title_tag( true ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				roam_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_title_text_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Title Color', 'roam' ),
						'description' => esc_html__( 'Choose a color for title text', 'roam' ),
						'parent'      => $show_title_area_meta_container
					)
				);
				
				roam_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_subtitle_meta',
						'type'          => 'text',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Text', 'roam' ),
						'description'   => esc_html__( 'Enter your subtitle text', 'roam' ),
						'parent'        => $show_title_area_meta_container,
						'args'          => array(
							'col_width' => 6
						)
					)
				);
		
				roam_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_title_area_subtitle_tag_meta',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Subtitle Tag', 'roam' ),
						'options'       => roam_mikado_get_title_tag( true, array( 'span' => esc_html__('Theme Style','roam') ) ),
						'parent'        => $show_title_area_meta_container
					)
				);
				
				roam_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_subtitle_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Subtitle Color', 'roam' ),
						'description' => esc_html__( 'Choose a color for subtitle text', 'roam' ),
						'parent'      => $show_title_area_meta_container
					)
				);
		
		/***************** Additional Title Area Layout - start *****************/
		
		do_action( 'roam_mikado_additional_title_area_meta_boxes', $show_title_area_meta_container );
		
		/***************** Additional Title Area Layout - end *****************/
		
	}
	
	add_action( 'roam_mikado_meta_boxes_map', 'roam_mikado_map_title_meta', 60 );
}