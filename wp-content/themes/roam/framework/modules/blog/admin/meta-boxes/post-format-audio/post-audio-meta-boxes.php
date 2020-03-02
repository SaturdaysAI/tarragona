<?php

if ( ! function_exists( 'roam_mikado_map_post_audio_meta' ) ) {
	function roam_mikado_map_post_audio_meta() {
		$audio_post_format_meta_box = roam_mikado_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Audio Post Format', 'roam' ),
				'name'  => 'post_format_audio_meta'
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_audio_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Audio Type', 'roam' ),
				'description'   => esc_html__( 'Choose audio type', 'roam' ),
				'parent'        => $audio_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Audio Service', 'roam' ),
					'self'            => esc_html__( 'Self Hosted', 'roam' )
				),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						'social_networks' => '#mkdf_mkdf_audio_self_hosted_container',
						'self'            => '#mkdf_mkdf_audio_embedded_container'
					),
					'show'       => array(
						'social_networks' => '#mkdf_mkdf_audio_embedded_container',
						'self'            => '#mkdf_mkdf_audio_self_hosted_container'
					)
				)
			)
		);
		
		$mkdf_audio_embedded_container = roam_mikado_add_admin_container(
			array(
				'parent'          => $audio_post_format_meta_box,
				'name'            => 'mkdf_audio_embedded_container',
				'hidden_property' => 'mkdf_audio_type_meta',
				'hidden_value'    => 'self'
			)
		);
		
		$mkdf_audio_self_hosted_container = roam_mikado_add_admin_container(
			array(
				'parent'          => $audio_post_format_meta_box,
				'name'            => 'mkdf_audio_self_hosted_container',
				'hidden_property' => 'mkdf_audio_type_meta',
				'hidden_value'    => 'social_networks'
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_audio_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio URL', 'roam' ),
				'description' => esc_html__( 'Enter audio URL', 'roam' ),
				'parent'      => $mkdf_audio_embedded_container,
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_audio_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Audio Link', 'roam' ),
				'description' => esc_html__( 'Enter audio link', 'roam' ),
				'parent'      => $mkdf_audio_self_hosted_container,
			)
		);
	}
	
	add_action( 'roam_mikado_meta_boxes_map', 'roam_mikado_map_post_audio_meta', 23 );
}