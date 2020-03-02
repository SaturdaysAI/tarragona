<?php

if ( ! function_exists( 'roam_mikado_sticky_header_meta_boxes_options_map' ) ) {
	function roam_mikado_sticky_header_meta_boxes_options_map( $header_meta_box ) {
		
		$sticky_amount_container = roam_mikado_add_admin_container(
			array(
				'parent'          => $header_meta_box,
				'name'            => 'sticky_amount_container_meta_container',
				'hidden_property' => 'mkdf_header_behaviour_meta',
				'hidden_values'   => array(
					'',
					'no-behavior',
					'fixed-on-scroll',
					'sticky-header-on-scroll-up'
				)
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_scroll_amount_for_sticky_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Scroll amount for sticky header appearance', 'roam' ),
				'description' => esc_html__( 'Define scroll amount for sticky header appearance', 'roam' ),
				'parent'      => $sticky_amount_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px'
				)
			)
		);
	}
	
	add_action( 'roam_mikado_additional_header_area_meta_boxes_map', 'roam_mikado_sticky_header_meta_boxes_options_map', 10, 1 );
}