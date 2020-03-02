<?php

if ( ! function_exists( 'roam_mikado_map_post_video_meta' ) ) {
	function roam_mikado_map_post_video_meta() {
		$video_post_format_meta_box = roam_mikado_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Video Post Format', 'roam' ),
				'name'  => 'post_format_video_meta'
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_video_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Video Type', 'roam' ),
				'description'   => esc_html__( 'Choose video type', 'roam' ),
				'parent'        => $video_post_format_meta_box,
				'default_value' => 'social_networks',
				'options'       => array(
					'social_networks' => esc_html__( 'Video Service', 'roam' ),
					'self'            => esc_html__( 'Self Hosted', 'roam' )
				),
				'args'          => array(
					'dependence' => true,
					'hide'       => array(
						'social_networks' => '#mkdf_mkdf_video_self_hosted_container',
						'self'            => '#mkdf_mkdf_video_embedded_container'
					),
					'show'       => array(
						'social_networks' => '#mkdf_mkdf_video_embedded_container',
						'self'            => '#mkdf_mkdf_video_self_hosted_container'
					)
				)
			)
		);
		
		$mkdf_video_embedded_container = roam_mikado_add_admin_container(
			array(
				'parent'          => $video_post_format_meta_box,
				'name'            => 'mkdf_video_embedded_container',
				'hidden_property' => 'mkdf_video_type_meta',
				'hidden_value'    => 'self'
			)
		);
		
		$mkdf_video_self_hosted_container = roam_mikado_add_admin_container(
			array(
				'parent'          => $video_post_format_meta_box,
				'name'            => 'mkdf_video_self_hosted_container',
				'hidden_property' => 'mkdf_video_type_meta',
				'hidden_value'    => 'social_networks'
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_video_link_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video URL', 'roam' ),
				'description' => esc_html__( 'Enter Video URL', 'roam' ),
				'parent'      => $mkdf_video_embedded_container,
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_post_video_custom_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Video MP4', 'roam' ),
				'description' => esc_html__( 'Enter video URL for MP4 format', 'roam' ),
				'parent'      => $mkdf_video_self_hosted_container,
			)
		);
	}
	
	add_action( 'roam_mikado_meta_boxes_map', 'roam_mikado_map_post_video_meta', 22 );
}