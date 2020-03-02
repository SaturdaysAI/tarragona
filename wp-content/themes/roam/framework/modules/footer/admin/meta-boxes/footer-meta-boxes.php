<?php

if ( ! function_exists( 'roam_mikado_map_footer_meta' ) ) {
	function roam_mikado_map_footer_meta() {
		
		$footer_meta_box = roam_mikado_create_meta_box(
			array(
				'scope' => apply_filters( 'roam_mikado_set_scope_for_meta_boxes', array( 'page', 'post' ) ),
				'title' => esc_html__( 'Footer', 'roam' ),
				'name'  => 'footer_meta'
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_disable_footer_meta',
				'type'          => 'yesno',
				'default_value' => 'no',
				'label'         => esc_html__( 'Disable Footer for this Page', 'roam' ),
				'description'   => esc_html__( 'Enabling this option will hide footer on this page', 'roam' ),
				'parent'        => $footer_meta_box
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_footer_top_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Footer Top', 'roam' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Top area', 'roam' ),
				'parent'        => $footer_meta_box,
				'options'       => roam_mikado_get_yes_no_select_array()
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_footer_bottom_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Footer Bottom', 'roam' ),
				'description'   => esc_html__( 'Enabling this option will show Footer Bottom area', 'roam' ),
				'parent'        => $footer_meta_box,
				'options'       => roam_mikado_get_yes_no_select_array()
			)
		);
	}
	
	add_action( 'roam_mikado_meta_boxes_map', 'roam_mikado_map_footer_meta', 70 );
}