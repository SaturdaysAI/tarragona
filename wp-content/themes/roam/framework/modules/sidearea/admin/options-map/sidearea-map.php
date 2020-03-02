<?php

if ( ! function_exists( 'roam_mikado_sidearea_options_map' ) ) {
	function roam_mikado_sidearea_options_map() {
		
		roam_mikado_add_admin_page(
			array(
				'slug'  => '_side_area_page',
				'title' => esc_html__( 'Side Area', 'roam' ),
				'icon' => 'fa fa-bars'
			)
		);
		
		$side_area_panel = roam_mikado_add_admin_panel(
			array(
				'title' => esc_html__( 'Side Area', 'roam' ),
				'name'  => 'side_area',
				'page'  => '_side_area_page'
			)
		);
		
		$side_area_icon_style_group = roam_mikado_add_admin_group(
			array(
				'parent'      => $side_area_panel,
				'name'        => 'side_area_icon_style_group',
				'title'       => esc_html__( 'Side Area Icon Style', 'roam' ),
				'description' => esc_html__( 'Define styles for Side Area icon', 'roam' )
			)
		);
		
		$side_area_icon_style_row1 = roam_mikado_add_admin_row(
			array(
				'parent' => $side_area_icon_style_group,
				'name'   => 'side_area_icon_style_row1'
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type'   => 'colorsimple',
				'name'   => 'side_area_icon_color',
				'label'  => esc_html__( 'Color', 'roam' )
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row1,
				'type'   => 'colorsimple',
				'name'   => 'side_area_icon_hover_color',
				'label'  => esc_html__( 'Hover Color', 'roam' )
			)
		);
		
		$side_area_icon_style_row2 = roam_mikado_add_admin_row(
			array(
				'parent' => $side_area_icon_style_group,
				'name'   => 'side_area_icon_style_row2',
				'next'   => true
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type'   => 'colorsimple',
				'name'   => 'side_area_close_icon_color',
				'label'  => esc_html__( 'Close Icon Color', 'roam' )
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'parent' => $side_area_icon_style_row2,
				'type'   => 'colorsimple',
				'name'   => 'side_area_close_icon_hover_color',
				'label'  => esc_html__( 'Close Icon Hover Color', 'roam' )
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'parent'        => $side_area_panel,
				'type'          => 'text',
				'name'          => 'side_area_width',
				'default_value' => '',
				'label'         => esc_html__( 'Side Area Width', 'roam' ),
				'description'   => esc_html__( 'Enter a width for Side Area', 'roam' ),
				'args'          => array(
					'col_width' => 3,
					'suffix'    => 'px'
				)
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'parent'      => $side_area_panel,
				'type'        => 'color',
				'name'        => 'side_area_background_color',
				'label'       => esc_html__( 'Background Color', 'roam' ),
				'description' => esc_html__( 'Choose a background color for Side Area', 'roam' )
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'parent'      => $side_area_panel,
				'type'        => 'text',
				'name'        => 'side_area_padding',
				'label'       => esc_html__( 'Padding', 'roam' ),
				'description' => esc_html__( 'Define padding for Side Area in format top right bottom left', 'roam' ),
				'args'        => array(
					'col_width' => 3
				)
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'parent'        => $side_area_panel,
				'type'          => 'selectblank',
				'name'          => 'side_area_aligment',
				'default_value' => '',
				'label'         => esc_html__( 'Text Alignment', 'roam' ),
				'description'   => esc_html__( 'Choose text alignment for side area', 'roam' ),
				'options'       => array(
					''       => esc_html__( 'Default', 'roam' ),
					'left'   => esc_html__( 'Left', 'roam' ),
					'center' => esc_html__( 'Center', 'roam' ),
					'right'  => esc_html__( 'Right', 'roam' )
				)
			)
		);
	}
	
	add_action( 'roam_mikado_options_map', 'roam_mikado_sidearea_options_map', 5 );
}