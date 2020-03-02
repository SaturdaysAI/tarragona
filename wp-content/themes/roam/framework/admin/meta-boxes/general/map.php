<?php

if ( ! function_exists( 'roam_mikado_map_general_meta' ) ) {
	function roam_mikado_map_general_meta() {
		
		$general_meta_box = roam_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'roam_mikado_set_scope_for_meta_boxes', array( 'page', 'post' ) ),
				'title' => esc_html__( 'General', 'roam' ),
				'name'  => 'general_meta'
			)
		);
		
		/***************** Slider Layout - begin **********************/
		
		roam_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_page_slider_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Slider Shortcode', 'roam' ),
				'description' => esc_html__( 'Paste your slider shortcode here', 'roam' ),
				'parent'      => $general_meta_box
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name' => 'mkdf_page_scroll_to_content_meta',
				'type' => 'select',
				'default_value' => '',
				'label' => esc_html__('One-Scroll To Page Content', 'roam'),
				'description' => esc_html__('Enable this option will allow for direct scroll to content on first scroll if slider is set.', 'roam'),
				'options' => array(
					'no' => esc_html__('No','roam'),
					'yes' => esc_html__('Yes','roam')
				),
				'parent' => $general_meta_box
			)
		);

		/***************** Slider Layout - begin **********************/
		
		/***************** Content Layout - begin **********************/
		
		roam_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_page_content_behind_header_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Always put content behind header', 'roam' ),
				'description'   => esc_html__( 'Enabling this option will put page content behind page header', 'roam' ),
				'parent'        => $general_meta_box
			)
		);
		
		$mkdf_content_padding_group = roam_mikado_add_admin_group(
			array(
				'name'        => 'content_padding_group',
				'title'       => esc_html__( 'Content Style', 'roam' ),
				'description' => esc_html__( 'Define styles for Content area', 'roam' ),
				'parent'      => $general_meta_box
			)
		);
		
			$mkdf_content_padding_row = roam_mikado_add_admin_row(
				array(
					'name'   => 'mkdf_content_padding_row',
					'next'   => true,
					'parent' => $mkdf_content_padding_group
				)
			);
		
				roam_mikado_create_meta_box_field(
					array(
						'name'   => 'mkdf_page_content_top_padding',
						'type'   => 'textsimple',
						'label'  => esc_html__( 'Content Top Padding', 'roam' ),
						'parent' => $mkdf_content_padding_row,
						'args'   => array(
							'suffix' => 'px'
						)
					)
				);
				
				roam_mikado_create_meta_box_field(
					array(
						'name'    => 'mkdf_page_content_top_padding_mobile',
						'type'    => 'selectsimple',
						'label'   => esc_html__( 'Set this top padding for mobile header', 'roam' ),
						'parent'  => $mkdf_content_padding_row,
						'options' => roam_mikado_get_yes_no_select_array( false )
					)
				);

        roam_mikado_create_meta_box_field(
            array(
                'name'       => 'mkdf_first_color_meta',
                'type'       => 'color',
                'label'      => esc_html__( 'First Main Color', 'roam' ),
                'description' => esc_html__( 'Choose the most dominant page color', 'roam' ),
                'parent'      => $general_meta_box
            )
        );
		
		roam_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_page_background_color_meta',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'roam' ),
				'description' => esc_html__( 'Choose background color for page content', 'roam' ),
				'parent'      => $general_meta_box
			)
		);
		
		/***************** Content Layout - end **********************/
		
		/***************** Boxed Layout - begin **********************/
		
		roam_mikado_create_meta_box_field(
			array(
				'name'    => 'mkdf_boxed_meta',
				'type'    => 'select',
				'label'   => esc_html__( 'Boxed Layout', 'roam' ),
				'parent'  => $general_meta_box,
				'options' => roam_mikado_get_yes_no_select_array(),
				'args'    => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#mkdf_boxed_container_meta',
						'no'  => '#mkdf_boxed_container_meta',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#mkdf_boxed_container_meta'
					)
				)
			)
		);
		
			$boxed_container_meta = roam_mikado_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'boxed_container_meta',
					'hidden_property' => 'mkdf_boxed_meta',
					'hidden_values'   => array(
						'',
						'no'
					)
				)
			);
		
				roam_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_page_background_color_in_box_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'roam' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'roam' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				roam_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_boxed_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'roam' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'roam' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				roam_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_boxed_pattern_background_image_meta',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'roam' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'roam' ),
						'parent'      => $boxed_container_meta
					)
				);
				
				roam_mikado_create_meta_box_field(
					array(
						'name'          => 'mkdf_boxed_background_image_attachment_meta',
						'type'          => 'select',
						'default_value' => 'fixed',
						'label'         => esc_html__( 'Background Image Attachment', 'roam' ),
						'description'   => esc_html__( 'Choose background image attachment', 'roam' ),
						'parent'        => $boxed_container_meta,
						'options'       => array(
							''       => esc_html__( 'Default', 'roam' ),
							'fixed'  => esc_html__( 'Fixed', 'roam' ),
							'scroll' => esc_html__( 'Scroll', 'roam' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		roam_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_paspartu_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Passepartout', 'roam' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'roam' ),
				'parent'        => $general_meta_box,
				'options'       => roam_mikado_get_yes_no_select_array(),
				'args'    => array(
					'dependence'    => true,
					'hide'          => array(
						''    => '#mkdf_mkdf_paspartu_container_meta',
						'no'  => '#mkdf_mkdf_paspartu_container_meta',
						'yes' => ''
					),
					'show'          => array(
						''    => '',
						'no'  => '',
						'yes' => '#mkdf_mkdf_paspartu_container_meta'
					)
				)
			)
		);
		
			$paspartu_container_meta = roam_mikado_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'mkdf_paspartu_container_meta',
					'hidden_property' => 'mkdf_paspartu_meta',
					'hidden_values'   => array(
						'',
						'no'
					)
				)
			);
		
				roam_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_paspartu_color_meta',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'roam' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'roam' ),
						'parent'      => $paspartu_container_meta
					)
				);
				
				roam_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_paspartu_width_meta',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'roam' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'roam' ),
						'parent'      => $paspartu_container_meta,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				roam_mikado_create_meta_box_field(
					array(
						'parent'        => $paspartu_container_meta,
						'type'          => 'select',
						'default_value' => '',
						'name'          => 'mkdf_disable_top_paspartu_meta',
						'label'         => esc_html__( 'Disable Top Passepartout', 'roam' ),
						'options'       => roam_mikado_get_yes_no_select_array(),
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Content Width Layout - begin **********************/
		
		roam_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_initial_content_width_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'roam' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'roam' ),
				'parent'        => $general_meta_box,
				'options'       => array(
					''                => esc_html__( 'Default', 'roam' ),
					'mkdf-grid-1100' => esc_html__( '1100px', 'roam' ),
					'mkdf-grid-1300' => esc_html__( '1300px', 'roam' ),
					'mkdf-grid-1200' => esc_html__( '1200px', 'roam' ),
					'mkdf-grid-1000' => esc_html__( '1000px', 'roam' ),
					'mkdf-grid-800'  => esc_html__( '800px', 'roam' )
				)
			)
		);
		
		/***************** Content Width Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		roam_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_smooth_page_transitions_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Smooth Page Transitions', 'roam' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'roam' ),
				'parent'        => $general_meta_box,
				'options'       => roam_mikado_get_yes_no_select_array(),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						''    => '#mkdf_page_transitions_container_meta',
						'no'  => '#mkdf_page_transitions_container_meta',
						'yes' => ''
					),
					'show'       => array(
						''    => '',
						'no'  => '',
						'yes' => '#mkdf_page_transitions_container_meta'
					)
				)
			)
		);
		
			$page_transitions_container_meta = roam_mikado_add_admin_container(
				array(
					'parent'          => $general_meta_box,
					'name'            => 'page_transitions_container_meta',
					'hidden_property' => 'mkdf_smooth_page_transitions_meta',
					'hidden_values'   => array(
						'',
						'no'
					)
				)
			);
		
				roam_mikado_create_meta_box_field(
					array(
						'name'        => 'mkdf_page_transition_preloader_meta',
						'type'        => 'select',
						'label'       => esc_html__( 'Enable Preloading Animation', 'roam' ),
						'description' => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'roam' ),
						'parent'      => $page_transitions_container_meta,
						'options'     => roam_mikado_get_yes_no_select_array(),
						'args'        => array(
							'dependence' => true,
							'hide'       => array(
								''    => '#mkdf_page_transition_preloader_container_meta',
								'no'  => '#mkdf_page_transition_preloader_container_meta',
								'yes' => ''
							),
							'show'       => array(
								''    => '',
								'no'  => '',
								'yes' => '#mkdf_page_transition_preloader_container_meta'
							)
						)
					)
				);
				
				$page_transition_preloader_container_meta = roam_mikado_add_admin_container(
					array(
						'parent'          => $page_transitions_container_meta,
						'name'            => 'page_transition_preloader_container_meta',
						'hidden_property' => 'mkdf_page_transition_preloader_meta',
						'hidden_values'   => array(
							'',
							'no'
						)
					)
				);
				
					roam_mikado_create_meta_box_field(
						array(
							'name'   => 'mkdf_smooth_pt_bgnd_color_meta',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'roam' ),
							'parent' => $page_transition_preloader_container_meta
						)
					);
					
					$group_pt_spinner_animation_meta = roam_mikado_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation_meta',
							'title'       => esc_html__( 'Loader Style', 'roam' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'roam' ),
							'parent'      => $page_transition_preloader_container_meta
						)
					);
					
					$row_pt_spinner_animation_meta = roam_mikado_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation_meta',
							'parent' => $group_pt_spinner_animation_meta
						)
					);
					
					roam_mikado_create_meta_box_field(
						array(
							'type'    => 'selectsimple',
							'name'    => 'mkdf_smooth_pt_spinner_type_meta',
							'label'   => esc_html__( 'Spinner Type', 'roam' ),
							'parent'  => $row_pt_spinner_animation_meta,
							'options' => array(
								''                      => esc_html__( 'Default', 'roam' ),
								'rotate_circles'        => esc_html__( 'Rotate Circles', 'roam' ),
								'pulse'                 => esc_html__( 'Pulse', 'roam' ),
								'double_pulse'          => esc_html__( 'Double Pulse', 'roam' ),
								'cube'                  => esc_html__( 'Cube', 'roam' ),
								'rotating_cubes'        => esc_html__( 'Rotating Cubes', 'roam' ),
								'stripes'               => esc_html__( 'Stripes', 'roam' ),
								'wave'                  => esc_html__( 'Wave', 'roam' ),
								'two_rotating_circles'  => esc_html__( '2 Rotating Circles', 'roam' ),
								'five_rotating_circles' => esc_html__( '5 Rotating Circles', 'roam' ),
								'atom'                  => esc_html__( 'Atom', 'roam' ),
								'clock'                 => esc_html__( 'Clock', 'roam' ),
								'mitosis'               => esc_html__( 'Mitosis', 'roam' ),
								'lines'                 => esc_html__( 'Lines', 'roam' ),
								'fussion'               => esc_html__( 'Fussion', 'roam' ),
								'wave_circles'          => esc_html__( 'Wave Circles', 'roam' ),
								'pulse_circles'         => esc_html__( 'Pulse Circles', 'roam' )
							)
						)
					);
					
					roam_mikado_create_meta_box_field(
						array(
							'type'   => 'colorsimple',
							'name'   => 'mkdf_smooth_pt_spinner_color_meta',
							'label'  => esc_html__( 'Spinner Color', 'roam' ),
							'parent' => $row_pt_spinner_animation_meta
						)
					);
					
					roam_mikado_create_meta_box_field(
						array(
							'name'        => 'mkdf_page_transition_fadeout_meta',
							'type'        => 'select',
							'label'       => esc_html__( 'Enable Fade Out Animation', 'roam' ),
							'description' => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'roam' ),
							'options'     => roam_mikado_get_yes_no_select_array(),
							'parent'      => $page_transitions_container_meta
						
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		/***************** Comments Layout - begin **********************/
		
		roam_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_page_comments_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Show Comments', 'roam' ),
				'description' => esc_html__( 'Enabling this option will show comments on your page', 'roam' ),
				'parent'      => $general_meta_box,
				'options'     => roam_mikado_get_yes_no_select_array()
			)
		);
		
		/***************** Comments Layout - end **********************/
	}
	
	add_action( 'roam_mikado_meta_boxes_map', 'roam_mikado_map_general_meta', 10 );
}