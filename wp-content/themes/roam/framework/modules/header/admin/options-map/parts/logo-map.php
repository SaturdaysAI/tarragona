<?php

if ( ! function_exists( 'roam_mikado_logo_options_map' ) ) {
	function roam_mikado_logo_options_map() {

		$panel_logo = roam_mikado_add_admin_panel(
			array(
				'page'  => '',
				'name'  => 'panel_logo',
				'title' => esc_html__( 'Branding', 'roam' )
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'parent'        => $panel_logo,
				'type'          => 'yesno',
				'name'          => 'hide_logo',
				'default_value' => 'no',
				'label'         => esc_html__( 'Hide Logo', 'roam' ),
				'description'   => esc_html__( 'Enabling this option will hide logo image', 'roam' ),
				'args'          => array(
					"dependence"             => true,
					"dependence_hide_on_yes" => "#mkdf_hide_logo_container",
					"dependence_show_on_yes" => ""
				)
			)
		);
		
		$hide_logo_container = roam_mikado_add_admin_container(
			array(
				'parent'          => $panel_logo,
				'name'            => 'hide_logo_container',
				'hidden_property' => 'hide_logo',
				'hidden_value'    => 'yes'
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'logo_image',
				'type'          => 'image',
				'default_value' => MIKADO_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Default', 'roam' ),
				'parent'        => $hide_logo_container
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'logo_image_dark',
				'type'          => 'image',
				'default_value' => MIKADO_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Dark', 'roam' ),
				'parent'        => $hide_logo_container
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'logo_image_light',
				'type'          => 'image',
				'default_value' => MIKADO_ASSETS_ROOT . "/img/logo_white.png",
				'label'         => esc_html__( 'Logo Image - Light', 'roam' ),
				'parent'        => $hide_logo_container
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'logo_image_sticky',
				'type'          => 'image',
				'default_value' => MIKADO_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Sticky', 'roam' ),
				'parent'        => $hide_logo_container
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'logo_image_mobile',
				'type'          => 'image',
				'default_value' => MIKADO_ASSETS_ROOT . "/img/logo.png",
				'label'         => esc_html__( 'Logo Image - Mobile', 'roam' ),
				'parent'        => $hide_logo_container
			)
		);
	}
	
	add_action( 'roam_mikado_add_general_options_map_first', 'roam_mikado_logo_options_map', 2 );
}