<?php

if ( ! function_exists( 'roam_mikado_footer_options_map' ) ) {
	function roam_mikado_footer_options_map() {
		
		roam_mikado_add_admin_page(
			array(
				'slug'  => '_footer_page',
				'title' => esc_html__( 'Footer', 'roam' ),
				'icon'  => 'fa fa-sort-amount-asc'
			)
		);
		
		$footer_panel = roam_mikado_add_admin_panel(
			array(
				'title' => esc_html__( 'Footer', 'roam' ),
				'name'  => 'footer',
				'page'  => '_footer_page'
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'footer_in_grid',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Footer in Grid', 'roam' ),
				'description'   => esc_html__( 'Enabling this option will place Footer content in grid', 'roam' ),
				'parent'        => $footer_panel,
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_top',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Top', 'roam' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'roam' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#mkdf_show_footer_top_container'
				),
				'parent'        => $footer_panel,
			)
		);
		
		$show_footer_top_container = roam_mikado_add_admin_container(
			array(
				'name'            => 'show_footer_top_container',
				'hidden_property' => 'show_footer_top',
				'hidden_value'    => 'no',
				'parent'          => $footer_panel
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns',
				'parent'        => $show_footer_top_container,
				'default_value' => '4',
				'label'         => esc_html__( 'Footer Top Columns', 'roam' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Top area', 'roam' ),
				'options'       => array(
					'1' => '1',
					'2' => '2',
					'3' => '3',
					'4' => '4'
				)
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_top_columns_alignment',
				'default_value' => 'left',
				'label'         => esc_html__( 'Footer Top Columns Alignment', 'roam' ),
				'description'   => esc_html__( 'Text Alignment in Footer Columns', 'roam' ),
				'options'       => array(
					''       => esc_html__( 'Default', 'roam' ),
					'left'   => esc_html__( 'Left', 'roam' ),
					'center' => esc_html__( 'Center', 'roam' ),
					'right'  => esc_html__( 'Right', 'roam' )
				),
				'parent'        => $show_footer_top_container,
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'        => 'footer_top_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'roam' ),
				'description' => esc_html__( 'Set background color for top footer area', 'roam' ),
				'parent'      => $show_footer_top_container
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'show_footer_bottom',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Footer Bottom', 'roam' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'roam' ),
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#mkdf_show_footer_bottom_container'
				),
				'parent'        => $footer_panel,
			)
		);
		
		$show_footer_bottom_container = roam_mikado_add_admin_container(
			array(
				'name'            => 'show_footer_bottom_container',
				'hidden_property' => 'show_footer_bottom',
				'hidden_value'    => 'no',
				'parent'          => $footer_panel
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'footer_bottom_columns',
				'default_value' => '2',
				'label'         => esc_html__( 'Footer Bottom Columns', 'roam' ),
				'description'   => esc_html__( 'Choose number of columns for Footer Bottom area', 'roam' ),
				'options'       => array(
					'1' => '1',
					'2' => '2',
					'3' => '3'
				),
				'parent'        => $show_footer_bottom_container,
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'        => 'footer_bottom_background_color',
				'type'        => 'color',
				'label'       => esc_html__( 'Background Color', 'roam' ),
				'description' => esc_html__( 'Set background color for bottom footer area', 'roam' ),
				'parent'      => $show_footer_bottom_container
			)
		);
	}
	
	add_action( 'roam_mikado_options_map', 'roam_mikado_footer_options_map', 11 );
}