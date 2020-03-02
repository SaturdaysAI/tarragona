<?php

if ( ! function_exists( 'roam_mikado_centered_title_type_options_meta_boxes' ) ) {
	function roam_mikado_centered_title_type_options_meta_boxes( $show_title_area_meta_container ) {
		
		roam_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_subtitle_side_padding_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Subtitle Side Padding', 'roam' ),
				'description' => esc_html__( 'Set left/right padding for subtitle area', 'roam' ),
				'parent'      => $show_title_area_meta_container,
				'args'        => array(
					'col_width' => 2,
					'suffix'    => 'px or %'
				)
			)
		);
	}
	
	add_action( 'roam_mikado_additional_title_area_meta_boxes', 'roam_mikado_centered_title_type_options_meta_boxes', 5 );
}