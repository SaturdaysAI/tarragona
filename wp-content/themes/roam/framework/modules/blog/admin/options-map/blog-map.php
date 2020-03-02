<?php

if ( ! function_exists( 'roam_mikado_get_blog_list_types_options' ) ) {
	function roam_mikado_get_blog_list_types_options() {
		$blog_list_type_options = apply_filters( 'roam_mikado_blog_list_type_global_option', $blog_list_type_options = array() );
		
		return $blog_list_type_options;
	}
}

if ( ! function_exists( 'roam_mikado_blog_options_map' ) ) {
	function roam_mikado_blog_options_map() {
		$blog_list_type_options = roam_mikado_get_blog_list_types_options();
		
		roam_mikado_add_admin_page(
			array(
				'slug'  => '_blog_page',
				'title' => esc_html__( 'Blog', 'roam' ),
				'icon' => 'fa fa-files-o'
			)
		);
		
		/**
		 * Blog Lists
		 */
		$panel_blog_lists = roam_mikado_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_lists',
				'title' => esc_html__( 'Blog Lists', 'roam' )
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'blog_list_type',
				'type'          => 'select',
				'label'         => esc_html__( 'Blog Layout for Archive Pages', 'roam' ),
				'description'   => esc_html__( 'Choose a default blog layout for archived blog post lists', 'roam' ),
				'default_value' => 'standard',
				'parent'        => $panel_blog_lists,
				'options'       => $blog_list_type_options
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'archive_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout for Archive Pages', 'roam' ),
				'description'   => esc_html__( 'Choose a sidebar layout for archived blog post lists', 'roam' ),
				'default_value' => '',
				'parent'        => $panel_blog_lists,
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
			roam_mikado_add_admin_field(
				array(
					'name'        => 'archive_custom_sidebar_area',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Sidebar to Display for Archive Pages', 'roam' ),
					'description' => esc_html__( 'Choose a sidebar to display on archived blog post lists. Default sidebar is "Sidebar Page"', 'roam' ),
					'parent'      => $panel_blog_lists,
					'options'     => roam_mikado_get_custom_sidebars(),
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'blog_masonry_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Layout', 'roam' ),
				'default_value' => 'in-grid',
				'description'   => esc_html__( 'Set masonry layout. Default is in grid.', 'roam' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'in-grid'    => esc_html__( 'In Grid', 'roam' ),
					'full-width' => esc_html__( 'Full Width', 'roam' )
				)
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'blog_masonry_number_of_columns',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Number of Columns', 'roam' ),
				'default_value' => 'three',
				'description'   => esc_html__( 'Set number of columns for your masonry blog lists. Default value is 4 columns', 'roam' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'two'   => esc_html__( '2 Columns', 'roam' ),
					'three' => esc_html__( '3 Columns', 'roam' ),
					'four'  => esc_html__( '4 Columns', 'roam' ),
					'five'  => esc_html__( '5 Columns', 'roam' )
				)
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'blog_masonry_space_between_items',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Space Between Items', 'roam' ),
				'description'   => esc_html__( 'Set space size between posts for your masonry blog lists. Default value is normal', 'roam' ),
				'default_value' => 'normal',
				'options'       => roam_mikado_get_space_between_items_array(),
				'parent'        => $panel_blog_lists
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'blog_list_featured_image_proportion',
				'type'          => 'select',
				'label'         => esc_html__( 'Masonry - Featured Image Proportion', 'roam' ),
				'default_value' => 'fixed',
				'description'   => esc_html__( 'Choose type of proportions you want to use for featured images on masonry blog lists', 'roam' ),
				'parent'        => $panel_blog_lists,
				'options'       => array(
					'fixed'    => esc_html__( 'Fixed', 'roam' ),
					'original' => esc_html__( 'Original', 'roam' )
				)
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'blog_pagination_type',
				'type'          => 'select',
				'label'         => esc_html__( 'Pagination Type', 'roam' ),
				'description'   => esc_html__( 'Choose a pagination layout for Blog Lists', 'roam' ),
				'parent'        => $panel_blog_lists,
				'default_value' => 'standard',
				'options'       => array(
					'standard'        => esc_html__( 'Standard', 'roam' ),
					'load-more'       => esc_html__( 'Load More', 'roam' ),
					'infinite-scroll' => esc_html__( 'Infinite Scroll', 'roam' ),
					'no-pagination'   => esc_html__( 'No Pagination', 'roam' )
				)
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'type'          => 'text',
				'name'          => 'number_of_chars',
				'default_value' => '40',
				'label'         => esc_html__( 'Number of Words in Excerpt', 'roam' ),
				'description'   => esc_html__( 'Enter a number of words in excerpt (article summary). Default value is 40', 'roam' ),
				'parent'        => $panel_blog_lists,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		/**
		 * Blog Single
		 */
		$panel_blog_single = roam_mikado_add_admin_panel(
			array(
				'page'  => '_blog_page',
				'name'  => 'panel_blog_single',
				'title' => esc_html__( 'Blog Single', 'roam' )
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'blog_single_sidebar_layout',
				'type'          => 'select',
				'label'         => esc_html__( 'Sidebar Layout', 'roam' ),
				'description'   => esc_html__( 'Choose a sidebar layout for Blog Single pages', 'roam' ),
				'default_value' => '',
				'parent'        => $panel_blog_single,
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
		
		if ( count( $roam_custom_sidebars ) > 0 ) {
			roam_mikado_add_admin_field(
				array(
					'name'        => 'blog_single_custom_sidebar_area',
					'type'        => 'selectblank',
					'label'       => esc_html__( 'Sidebar to Display', 'roam' ),
					'description' => esc_html__( 'Choose a sidebar to display on Blog Single pages. Default sidebar is "Sidebar"', 'roam' ),
					'parent'      => $panel_blog_single,
					'options'     => roam_mikado_get_custom_sidebars(),
					'args'        => array(
						'select2' => true
					)
				)
			);
		}
		
		roam_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_blog',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'roam' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single post pages', 'roam' ),
				'parent'        => $panel_blog_single,
				'options'       => roam_mikado_get_yes_no_select_array(),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'blog_single_title_in_title_area',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Post Title in Title Area', 'roam' ),
				'description'   => esc_html__( 'Enabling this option will show post title in title area on single post pages', 'roam' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'no'
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'blog_single_related_posts',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Related Posts', 'roam' ),
				'description'   => esc_html__( 'Enabling this option will show related posts on single post pages', 'roam' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'no'
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'blog_single_comments',
				'type'          => 'yesno',
				'label'         => esc_html__( 'Show Comments Form', 'roam' ),
				'description'   => esc_html__( 'Enabling this option will show comments form on single post pages', 'roam' ),
				'parent'        => $panel_blog_single,
				'default_value' => 'yes'
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_single_navigation',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Enable Prev/Next Single Post Navigation Links', 'roam' ),
				'description'   => esc_html__( 'Enable navigation links through the blog posts (left and right arrows will appear)', 'roam' ),
				'parent'        => $panel_blog_single,
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#mkdf_mkdf_blog_single_navigation_container'
				)
			)
		);
		
		$blog_single_navigation_container = roam_mikado_add_admin_container(
			array(
				'name'            => 'mkdf_blog_single_navigation_container',
				'hidden_property' => 'blog_single_navigation',
				'hidden_value'    => 'no',
				'parent'          => $panel_blog_single,
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_navigation_through_same_category',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Navigation Only in Current Category', 'roam' ),
				'description'   => esc_html__( 'Limit your navigation only through current category', 'roam' ),
				'parent'        => $blog_single_navigation_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_author_info',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Author Info Box', 'roam' ),
				'description'   => esc_html__( 'Enabling this option will display author name and descriptions on single post pages', 'roam' ),
				'parent'        => $panel_blog_single,
				'args'          => array(
					'dependence'             => true,
					'dependence_hide_on_yes' => '',
					'dependence_show_on_yes' => '#mkdf_mkdf_blog_single_author_info_container'
				)
			)
		);
		
		$blog_single_author_info_container = roam_mikado_add_admin_container(
			array(
				'name'            => 'mkdf_blog_single_author_info_container',
				'hidden_property' => 'blog_author_info',
				'hidden_value'    => 'no',
				'parent'          => $panel_blog_single,
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_author_info_email',
				'default_value' => 'no',
				'label'         => esc_html__( 'Show Author Email', 'roam' ),
				'description'   => esc_html__( 'Enabling this option will show author email', 'roam' ),
				'parent'        => $blog_single_author_info_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'blog_single_author_social',
				'default_value' => 'yes',
				'label'         => esc_html__( 'Show Author Social Icons', 'roam' ),
				'description'   => esc_html__( 'Enabling this option will show author social icons on single post pages', 'roam' ),
				'parent'        => $blog_single_author_info_container,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		do_action( 'roam_mikado_blog_single_options_map', $panel_blog_single );
	}
	
	add_action( 'roam_mikado_options_map', 'roam_mikado_blog_options_map', 13 );
}