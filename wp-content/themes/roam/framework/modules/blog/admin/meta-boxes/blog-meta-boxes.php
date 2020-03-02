<?php

foreach ( glob( MIKADO_FRAMEWORK_MODULES_ROOT_DIR . '/blog/admin/meta-boxes/*/*.php' ) as $meta_box_load ) {
	include_once $meta_box_load;
}

if ( ! function_exists( 'roam_mikado_map_blog_meta' ) ) {
	function roam_mikado_map_blog_meta() {
		$mkd_blog_categories = array();
		$categories           = get_categories();
		foreach ( $categories as $category ) {
			$mkd_blog_categories[ $category->slug ] = $category->name;
		}
		
		$blog_meta_box = roam_mikado_create_meta_box(
			array(
				'scope' => array( 'page' ),
				'title' => esc_html__( 'Blog', 'roam' ),
				'name'  => 'blog_meta'
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_category_meta',
				'type'        => 'selectblank',
				'label'       => esc_html__( 'Blog Category', 'roam' ),
				'description' => esc_html__( 'Choose category of posts to display (leave empty to display all categories)', 'roam' ),
				'parent'      => $blog_meta_box,
				'options'     => $mkd_blog_categories
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_show_posts_per_page_meta',
				'type'        => 'text',
				'label'       => esc_html__( 'Number of Posts', 'roam' ),
				'description' => esc_html__( 'Enter the number of posts to display', 'roam' ),
				'parent'      => $blog_meta_box,
				'options'     => $mkd_blog_categories,
				'args'        => array( "col_width" => 3 )
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_masonry_layout_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Layout', 'roam' ),
				'description' => esc_html__( 'Set masonry layout. Default is in grid.', 'roam' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''           => esc_html__( 'Default', 'roam' ),
					'in-grid'    => esc_html__( 'In Grid', 'roam' ),
					'full-width' => esc_html__( 'Full Width', 'roam' )
				)
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_masonry_number_of_columns_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Number of Columns', 'roam' ),
				'description' => esc_html__( 'Set number of columns for your masonry blog lists', 'roam' ),
				'parent'      => $blog_meta_box,
				'options'     => array(
					''      => esc_html__( 'Default', 'roam' ),
					'two'   => esc_html__( '2 Columns', 'roam' ),
					'three' => esc_html__( '3 Columns', 'roam' ),
					'four'  => esc_html__( '4 Columns', 'roam' ),
					'five'  => esc_html__( '5 Columns', 'roam' )
				)
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'        => 'mkdf_blog_masonry_space_between_items_meta',
				'type'        => 'select',
				'label'       => esc_html__( 'Masonry - Space Between Items', 'roam' ),
				'description' => esc_html__( 'Set space size between posts for your masonry blog lists', 'roam' ),
				'options'     => roam_mikado_get_space_between_items_array( true ),
				'parent'      => $blog_meta_box
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_blog_list_featured_image_proportion_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Featured Image Proportion', 'roam' ),
				'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on masonry blog lists', 'roam' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''         => esc_html__( 'Default', 'roam' ),
					'fixed'    => esc_html__( 'Fixed', 'roam' ),
					'original' => esc_html__( 'Original', 'roam' )
				)
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'name'          => 'mkdf_blog_pagination_type_meta',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'roam' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'roam' ),
				'parent'        => $blog_meta_box,
				'default_value' => '',
				'options'       => array(
					''                => esc_html__( 'Default', 'roam' ),
					'standard'        => esc_html__( 'Standard', 'roam' ),
					'load-more'       => esc_html__( 'Load More', 'roam' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'roam' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'roam' )
				)
			)
		);
		
		roam_mikado_create_meta_box_field(
			array(
				'type'          => 'text',
				'name'          => 'mkdf_number_of_chars_meta',
				'default_value' => '',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'roam' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'roam' ),
				'parent'        => $blog_meta_box,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
	}
	
	add_action( 'roam_mikado_meta_boxes_map', 'roam_mikado_map_blog_meta', 30 );
}