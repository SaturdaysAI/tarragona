<?php

/*** Post Settings ***/

if ( ! function_exists( 'roam_mikado_map_post_meta' ) ) {
	function roam_mikado_map_post_meta() {
		
		$post_meta_box = roam_mikado_create_meta_box(
			array(
				'scope' => array( 'post' ),
				'title' => esc_html__( 'Post', 'roam' ),
				'name'  => 'post-meta'
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_blog_single_sidebar_layout_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'roam' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog single page', 'roam' ),
				'default_value' => '',
				'parent'        => $post_meta_box,
				'options'       => array(
					''                 => esc_html__( 'Default', 'roam' ),
					'no-sidebar'       => esc_html__( 'No Sidebar', 'roam' ),
					'sidebar-33-right' => esc_html__( 'Sidebar 1/3 Right', 'roam' ),
					'sidebar-25-right' => esc_html__( 'Sidebar 1/4 Right', 'roam' ),
					'sidebar-33-left'  => esc_html__( 'Sidebar 1/3 Left', 'roam' ),
					'sidebar-25-left'  => esc_html__( 'Sidebar 1/4 Left', 'roam' )
				)
			)
		);
		
		$roam_custom_sidebars = roam_mikado_get_custom_sidebars();
		if ( count( $roam_custom_sidebars ) > 0 ) {
			roam_mikado_create_meta_box_field( array(
				'name'        => 'mkdf_blog_single_custom_sidebar_area_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Sidebar to Display', 'roam' ),
				'description' => esc_html__( 'Choose a sidebar to display on Blog single page. Default sidebar is "Sidebar"', 'roam' ),
				'parent'      => $post_meta_box,
				'options'     => roam_mikado_get_custom_sidebars(),
				'args' => array(
					'select2' => true
				)
			) );
		}
		
		roam_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_list_featured_image_meta',
				'type'        => 'image',
				'label'       => esc_html__( 'Blog List Image', 'roam' ),
				'description' => esc_html__( 'Choose an Image for displaying in blog list. If not uploaded, featured image will be shown.', 'roam' ),
				'parent'      => $post_meta_box
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_blog_masonry_gallery_fixed_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Fixed Proportion', 'roam' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry lists in fixed proportion', 'roam' ),
				'default_value' => 'default',
				'parent'        => $post_meta_box,
				'options'       => array(
					'default'            => esc_html__( 'Default', 'roam' ),
					'large-width'        => esc_html__( 'Large Width', 'roam' ),
					'large-height'       => esc_html__( 'Large Height', 'roam' ),
					'large-width-height' => esc_html__( 'Large Width/Height', 'roam' )
				)
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_blog_masonry_gallery_original_dimensions_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Dimensions for Original Proportion', 'roam' ),
				'description'   => esc_html__( 'Choose image layout when it appears in Masonry lists in original proportion', 'roam' ),
				'default_value' => 'default',
				'parent'        => $post_meta_box,
				'options'       => array(
					'default'     => esc_html__( 'Default', 'roam' ),
					'large-width' => esc_html__( 'Large Width', 'roam' )
				)
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_show_title_area_blog_meta',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'roam' ),
				'description'   => esc_html__( 'Enabling this option will show title area on your single post page', 'roam' ),
				'parent'        => $post_meta_box,
				'options'       => roam_mikado_get_yes_no_select_array()
			)
		);

		do_action('roam_mikado_blog_post_meta', $post_meta_box);
	}
	
	add_action( 'roam_mikado_meta_boxes_map', 'roam_mikado_map_post_meta', 20 );
}
