<?php

if ( ! function_exists( 'roam_mikado_general_options_map' ) ) {
	/**
	 * General options page
	 */
	function roam_mikado_general_options_map() {
		
		roam_mikado_add_admin_page(
			array(
				'slug'  => '',
				'title' => esc_html__( 'General', 'roam' ),
				'icon'  => 'fa fa-institution'
			)
		);

		do_action('roam_mikado_add_general_options_map_first');
		
		$panel_design_style = roam_mikado_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_design_style',
				'title' => esc_html__( 'Appearance', 'roam' )
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'google_fonts',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Google Font Family', 'roam' ),
				'description'   => esc_html__( 'Choose a default Google font for your site', 'roam' ),
				'parent'        => $panel_design_style
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'additional_google_fonts',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Additional Google Fonts', 'roam' ),
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#mkdf_additional_google_fonts_container"
				)
			)
		);
		
		$additional_google_fonts_container = roam_mikado_add_admin_container(
			array(
				'parent'          => $panel_design_style,
				'name'            => 'additional_google_fonts_container',
				'hidden_property' => 'additional_google_fonts',
				'hidden_value'    => 'no'
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'additional_google_font1',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'roam' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'roam' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'additional_google_font2',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'roam' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'roam' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'additional_google_font3',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'roam' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'roam' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'additional_google_font4',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'roam' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'roam' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'additional_google_font5',
				'type'          => 'font',
				'default_value' => '-1',
				'label'         => esc_html__( 'Font Family', 'roam' ),
				'description'   => esc_html__( 'Choose additional Google font for your site', 'roam' ),
				'parent'        => $additional_google_fonts_container
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'google_font_weight',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Style & Weight', 'roam' ),
				'description'   => esc_html__( 'Choose a default Google font weights for your site. Impact on page load time', 'roam' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'100'       => esc_html__( '100 Thin', 'roam' ),
					'100italic' => esc_html__( '100 Thin Italic', 'roam' ),
					'200'       => esc_html__( '200 Extra-Light', 'roam' ),
					'200italic' => esc_html__( '200 Extra-Light Italic', 'roam' ),
					'300'       => esc_html__( '300 Light', 'roam' ),
					'300italic' => esc_html__( '300 Light Italic', 'roam' ),
					'400'       => esc_html__( '400 Regular', 'roam' ),
					'400italic' => esc_html__( '400 Regular Italic', 'roam' ),
					'500'       => esc_html__( '500 Medium', 'roam' ),
					'500italic' => esc_html__( '500 Medium Italic', 'roam' ),
					'600'       => esc_html__( '600 Semi-Bold', 'roam' ),
					'600italic' => esc_html__( '600 Semi-Bold Italic', 'roam' ),
					'700'       => esc_html__( '700 Bold', 'roam' ),
					'700italic' => esc_html__( '700 Bold Italic', 'roam' ),
					'800'       => esc_html__( '800 Extra-Bold', 'roam' ),
					'800italic' => esc_html__( '800 Extra-Bold Italic', 'roam' ),
					'900'       => esc_html__( '900 Ultra-Bold', 'roam' ),
					'900italic' => esc_html__( '900 Ultra-Bold Italic', 'roam' )
				)
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'google_font_subset',
				'type'          => 'checkboxgroup',
				'default_value' => '',
				'label'         => esc_html__( 'Google Fonts Subset', 'roam' ),
				'description'   => esc_html__( 'Choose a default Google font subsets for your site', 'roam' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'latin'        => esc_html__( 'Latin', 'roam' ),
					'latin-ext'    => esc_html__( 'Latin Extended', 'roam' ),
					'cyrillic'     => esc_html__( 'Cyrillic', 'roam' ),
					'cyrillic-ext' => esc_html__( 'Cyrillic Extended', 'roam' ),
					'greek'        => esc_html__( 'Greek', 'roam' ),
					'greek-ext'    => esc_html__( 'Greek Extended', 'roam' ),
					'vietnamese'   => esc_html__( 'Vietnamese', 'roam' )
				)
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'        => 'first_color',
				'type'        => 'color',
				'label'       => esc_html__( 'First Main Color', 'roam' ),
				'description' => esc_html__( 'Choose the most dominant theme color. Default color is #ff681a', 'roam' ),
				'parent'      => $panel_design_style
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'        => 'page_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Page Background Color', 'roam' ),
				'description' => esc_html__( 'Choose the background color for page content. Default color is #ffffff', 'roam' ),
				'parent'      => $panel_design_style
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'        => 'selection_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Text Selection Color', 'roam' ),
				'description' => esc_html__( 'Choose the color users see when selecting text', 'roam' ),
				'parent'      => $panel_design_style
			)
		);
		
		/***************** Passepartout Layout - begin **********************/
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'boxed',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Boxed Layout', 'roam' ),
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#mkdf_boxed_container"
				)
			)
		);
		
			$boxed_container = roam_mikado_add_admin_container(
				array(
					'parent'          => $panel_design_style,
					'name'            => 'boxed_container',
					'hidden_property' => 'boxed',
					'hidden_value'    => 'no'
				)
			);
		
				roam_mikado_add_admin_field(
					array(
						'name'        => 'page_background_color_in_box',
						'type'        => 'color',
						'label'       => esc_html__( 'Page Background Color', 'roam' ),
						'description' => esc_html__( 'Choose the page background color outside box', 'roam' ),
						'parent'      => $boxed_container
					)
				);
				
				roam_mikado_add_admin_field(
					array(
						'name'        => 'boxed_background_image',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Image', 'roam' ),
						'description' => esc_html__( 'Choose an image to be displayed in background', 'roam' ),
						'parent'      => $boxed_container
					)
				);
				
				roam_mikado_add_admin_field(
					array(
						'name'        => 'boxed_pattern_background_image',
						'type'        => 'image',
						'label'       => esc_html__( 'Background Pattern', 'roam' ),
						'description' => esc_html__( 'Choose an image to be used as background pattern', 'roam' ),
						'parent'      => $boxed_container
					)
				);
				
				roam_mikado_add_admin_field(
					array(
						'name'          => 'boxed_background_image_attachment',
						'type'          => 'select',
						'default_value' => '',
						'label'         => esc_html__( 'Background Image Attachment', 'roam' ),
						'description'   => esc_html__( 'Choose background image attachment', 'roam' ),
						'parent'        => $boxed_container,
						'options'       => array(
							''       => esc_html__( 'Default', 'roam' ),
							'fixed'  => esc_html__( 'Fixed', 'roam' ),
							'scroll' => esc_html__( 'Scroll', 'roam' )
						)
					)
				);
		
		/***************** Boxed Layout - end **********************/
		
		/***************** Passepartout Layout - begin **********************/
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'paspartu',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Passepartout', 'roam' ),
				'description'   => esc_html__( 'Enabling this option will display passepartout around site content', 'roam' ),
				'parent'        => $panel_design_style,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#mkdf_paspartu_container"
				)
			)
		);
		
			$paspartu_container = roam_mikado_add_admin_container(
				array(
					'parent'          => $panel_design_style,
					'name'            => 'paspartu_container',
					'hidden_property' => 'paspartu',
					'hidden_value'    => 'no'
				)
			);
		
				roam_mikado_add_admin_field(
					array(
						'name'        => 'paspartu_color',
						'type'        => 'color',
						'label'       => esc_html__( 'Passepartout Color', 'roam' ),
						'description' => esc_html__( 'Choose passepartout color, default value is #ffffff', 'roam' ),
						'parent'      => $paspartu_container
					)
				);
				
				roam_mikado_add_admin_field(
					array(
						'name'        => 'paspartu_width',
						'type'        => 'text',
						'label'       => esc_html__( 'Passepartout Size', 'roam' ),
						'description' => esc_html__( 'Enter size amount for passepartout', 'roam' ),
						'parent'      => $paspartu_container,
						'args'        => array(
							'col_width' => 2,
							'suffix'    => 'px or %'
						)
					)
				);
				
				roam_mikado_add_admin_field(
					array(
						'parent'        => $paspartu_container,
						'type'          => 'yesno',
						'default_value' => 'no',
						'name'          => 'disable_top_paspartu',
						'label'         => esc_html__( 'Disable Top Passepartout', 'roam' )
					)
				);
		
		/***************** Passepartout Layout - end **********************/
		
		/***************** Content Layout - begin **********************/
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'initial_content_width',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Initial Width of Content', 'roam' ),
				'description'   => esc_html__( 'Choose the initial width of content which is in grid (Applies to pages set to "Default Template" and rows set to "In Grid")', 'roam' ),
				'parent'        => $panel_design_style,
				'options'       => array(
					'mkdf-grid-1100' => esc_html__( '1100px - default', 'roam' ),
					'mkdf-grid-1300' => esc_html__( '1300px', 'roam' ),
					'mkdf-grid-1200' => esc_html__( '1200px', 'roam' ),
					'mkdf-grid-1000' => esc_html__( '1000px', 'roam' ),
					'mkdf-grid-800'  => esc_html__( '800px', 'roam' )
				)
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'preload_pattern_image',
				'type'          => 'image',
				'label'         => esc_html__( 'Preload Pattern Image', 'roam' ),
				'description'   => esc_html__( 'Choose preload pattern image to be displayed until images are loaded', 'roam' ),
				'parent'        => $panel_design_style
			)
		);
		
		/***************** Content Layout - end **********************/
		
		$panel_settings = roam_mikado_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_settings',
				'title' => esc_html__( 'Behavior', 'roam' )
			)
		);
		
		/***************** Smooth Scroll Layout - begin **********************/
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'page_smooth_scroll',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Scroll', 'roam' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth scrolling effect on every page (except on Mac and touch devices)', 'roam' ),
				'parent'        => $panel_settings
			)
		);
		
		/***************** Smooth Scroll Layout - end **********************/
		
		/***************** Smooth Page Transitions Layout - begin **********************/
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'smooth_page_transitions',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Smooth Page Transitions', 'roam' ),
				'description'   => esc_html__( 'Enabling this option will perform a smooth transition between pages when clicking on links', 'roam' ),
				'parent'        => $panel_settings,
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "",
					"dependence_show_on_yes" => "#mkdf_page_transitions_container"
				)
			)
		);
		
			$page_transitions_container = roam_mikado_add_admin_container(
				array(
					'parent'          => $panel_settings,
					'name'            => 'page_transitions_container',
					'hidden_property' => 'smooth_page_transitions',
					'hidden_value'    => 'no'
				)
			);
		
				roam_mikado_add_admin_field(
					array(
						'name'          => 'page_transition_preloader',
						'type'          => 'yesno',
						'default_value' => 'no',
						'label'         => esc_html__( 'Enable Preloading Animation', 'roam' ),
						'description'   => esc_html__( 'Enabling this option will display an animated preloader while the page content is loading', 'roam' ),
						'parent'        => $page_transitions_container,
						'args'          => array(
							"dependence"             => true,
							"dependence_hide_on_yes" => "",
							"dependence_show_on_yes" => "#mkdf_page_transition_preloader_container"
						)
					)
				);
				
				$page_transition_preloader_container = roam_mikado_add_admin_container(
					array(
						'parent'          => $page_transitions_container,
						'name'            => 'page_transition_preloader_container',
						'hidden_property' => 'page_transition_preloader',
						'hidden_value'    => 'no'
					)
				);
		
		
					roam_mikado_add_admin_field(
						array(
							'name'   => 'smooth_pt_bgnd_color',
							'type'   => 'color',
							'label'  => esc_html__( 'Page Loader Background Color', 'roam' ),
							'parent' => $page_transition_preloader_container
						)
					);
					
					$group_pt_spinner_animation = roam_mikado_add_admin_group(
						array(
							'name'        => 'group_pt_spinner_animation',
							'title'       => esc_html__( 'Loader Style', 'roam' ),
							'description' => esc_html__( 'Define styles for loader spinner animation', 'roam' ),
							'parent'      => $page_transition_preloader_container
						)
					);
					
					$row_pt_spinner_animation = roam_mikado_add_admin_row(
						array(
							'name'   => 'row_pt_spinner_animation',
							'parent' => $group_pt_spinner_animation
						)
					);
					
					roam_mikado_add_admin_field(
						array(
							'type'          => 'selectsimple',
							'name'          => 'smooth_pt_spinner_type',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Type', 'roam' ),
							'parent'        => $row_pt_spinner_animation,
							'options'       => array(
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
					
					roam_mikado_add_admin_field(
						array(
							'type'          => 'colorsimple',
							'name'          => 'smooth_pt_spinner_color',
							'default_value' => '',
							'label'         => esc_html__( 'Spinner Color', 'roam' ),
							'parent'        => $row_pt_spinner_animation
						)
					);
					
					roam_mikado_add_admin_field(
						array(
							'name'          => 'page_transition_fadeout',
							'type'          => 'yesno',
							'default_value' => 'no',
							'label'         => esc_html__( 'Enable Fade Out Animation', 'roam' ),
							'description'   => esc_html__( 'Enabling this option will turn on fade out animation when leaving page', 'roam' ),
							'parent'        => $page_transitions_container
						)
					);
		
		/***************** Smooth Page Transitions Layout - end **********************/
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'show_back_button',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show "Back To Top Button"', 'roam' ),
				'description'   => esc_html__( 'Enabling this option will display a Back to Top button on every page', 'roam' ),
				'parent'        => $panel_settings
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'responsiveness',
				'type'          => 'yesno',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Responsiveness', 'roam' ),
				'description'   => esc_html__( 'Enabling this option will make all pages responsive', 'roam' ),
				'parent'        => $panel_settings
			)
		);
		
		$panel_custom_code = roam_mikado_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_custom_code',
				'title' => esc_html__( 'Custom Code', 'roam' )
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'        => 'custom_css',
				'type'        => 'textarea',
				'label'       => esc_html__( 'Custom CSS', 'roam' ),
				'description' => esc_html__( 'Enter your custom CSS here', 'roam' ),
				'parent'      => $panel_custom_code
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'        => 'custom_js',
				'type'        => 'textarea',
				'label'       => esc_html__( 'Custom JS', 'roam' ),
				'description' => esc_html__( 'Enter your custom Javascript here', 'roam' ),
				'parent'      => $panel_custom_code
			)
		);
		
		$panel_google_api = roam_mikado_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_google_api',
				'title' => esc_html__( 'Google API', 'roam' )
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'        => 'google_maps_api_key',
				'type'        => 'text',
				'label'       => esc_html__( 'Google Maps Api Key', 'roam' ),
				'description' => esc_html__( 'Insert your Google Maps API key here. For instructions on how to create a Google Maps API key, please refer to our to our documentation.', 'roam' ),
				'parent'      => $panel_google_api
			)
		);
	}
	
	add_action( 'roam_mikado_options_map', 'roam_mikado_general_options_map', 1 );
}

if ( ! function_exists( 'roam_mikado_page_general_style' ) ) {
	/**
	 * Function that prints page general inline styles
	 */
	function roam_mikado_page_general_style( $style ) {
		$current_style = '';
		$page_id       = roam_mikado_get_page_id();
		$class_prefix  = roam_mikado_get_unique_page_class( $page_id );
		
		$boxed_background_style = array();
		
		$boxed_page_background_color = roam_mikado_get_meta_field_intersect( 'page_background_color_in_box', $page_id );
		if ( ! empty( $boxed_page_background_color ) ) {
			$boxed_background_style['background-color'] = $boxed_page_background_color;
		}
		
		$boxed_page_background_image = roam_mikado_get_meta_field_intersect( 'boxed_background_image', $page_id );
		if ( ! empty( $boxed_page_background_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_image ) . ')';
			$boxed_background_style['background-position'] = 'center 0px';
			$boxed_background_style['background-repeat']   = 'no-repeat';
		}
		
		$boxed_page_background_pattern_image = roam_mikado_get_meta_field_intersect( 'boxed_pattern_background_image', $page_id );
		if ( ! empty( $boxed_page_background_pattern_image ) ) {
			$boxed_background_style['background-image']    = 'url(' . esc_url( $boxed_page_background_pattern_image ) . ')';
			$boxed_background_style['background-position'] = '0px 0px';
			$boxed_background_style['background-repeat']   = 'repeat';
		}
		
		$boxed_page_background_attachment = roam_mikado_get_meta_field_intersect( 'boxed_background_image_attachment', $page_id );
		if ( ! empty( $boxed_page_background_attachment ) ) {
			$boxed_background_style['background-attachment'] = $boxed_page_background_attachment;
		}
		
		$boxed_background_selector = $class_prefix . '.mkdf-boxed .mkdf-wrapper';
		
		if ( ! empty( $boxed_background_style ) ) {
			$current_style .= roam_mikado_dynamic_css( $boxed_background_selector, $boxed_background_style );
		}
		
		$paspartu_style = array();
		
		$paspartu_color = roam_mikado_get_meta_field_intersect( 'paspartu_color', $page_id );
		if ( ! empty( $paspartu_color ) ) {
			$paspartu_style['background-color'] = $paspartu_color;
		}
		
		$paspartu_width = roam_mikado_get_meta_field_intersect( 'paspartu_width', $page_id );
		if ( $paspartu_width !== '' ) {
			if ( roam_mikado_string_ends_with( $paspartu_width, '%' ) || roam_mikado_string_ends_with( $paspartu_width, 'px' ) ) {
				$paspartu_style['padding'] = $paspartu_width;
			} else {
				$paspartu_style['padding'] = $paspartu_width . 'px';
			}
		}
		
		$paspartu_selector = $class_prefix . '.mkdf-paspartu-enabled .mkdf-wrapper';
		
		if ( ! empty( $paspartu_style ) ) {
			$current_style .= roam_mikado_dynamic_css( $paspartu_selector, $paspartu_style );
		}
		
		$current_style = $current_style . $style;
		
		return $current_style;
	}
	
	add_filter( 'roam_mikado_add_page_custom_style', 'roam_mikado_page_general_style' );
}