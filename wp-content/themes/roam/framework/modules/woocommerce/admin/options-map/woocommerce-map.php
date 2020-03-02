<?php

if ( ! function_exists( 'roam_mikado_woocommerce_options_map' ) ) {
	
	/**
	 * Add Woocommerce options page
	 */
	function roam_mikado_woocommerce_options_map() {
		
		roam_mikado_add_admin_page(
			array(
				'slug'  => '_woocommerce_page',
				'title' => esc_html__( 'Woocommerce', 'roam' ),
				'icon' => 'fa fa-shopping-cart'
			)
		);
		
		/**
		 * Product List Settings
		 */
		$panel_product_list = roam_mikado_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_product_list',
				'title' => esc_html__( 'Product List', 'roam' )
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'mkdf_woo_product_list_columns',
				'type'          => 'select',
				'label'         => esc_html__( 'Product List Columns', 'roam' ),
				'default_value' => 'mkdf-woocommerce-columns-3',
				'description'   => esc_html__( 'Choose number of columns for product listing and related products on single product', 'roam' ),
				'options'       => array(
					'mkdf-woocommerce-columns-3' => esc_html__( '3 Columns', 'roam' ),
					'mkdf-woocommerce-columns-4' => esc_html__( '4 Columns', 'roam' )
				),
				'parent'        => $panel_product_list,
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'mkdf_woo_product_list_columns_space',
				'type'          => 'select',
				'label'         => esc_html__( 'Space Between Items', 'roam' ),
				'description'   => esc_html__( 'Select space between items for product listing and related products on single product', 'roam' ),
				'default_value' => 'normal',
				'options'       => roam_mikado_get_space_between_items_array(),
				'parent'        => $panel_product_list,
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'mkdf_woo_product_list_info_position',
				'type'          => 'select',
				'label'         => esc_html__( 'Product Info Position', 'roam' ),
				'default_value' => 'info_below_image',
				'description'   => esc_html__( 'Select product info position for product listing and related products on single product', 'roam' ),
				'options'       => array(
					'info_below_image'    => esc_html__( 'Info Below Image', 'roam' ),
					'info_on_image_hover' => esc_html__( 'Info On Image Hover', 'roam' )
				),
				'parent'        => $panel_product_list,
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'mkdf_woo_products_per_page',
				'type'          => 'text',
				'label'         => esc_html__( 'Number of products per page', 'roam' ),
				'description'   => esc_html__( 'Set number of products on shop page', 'roam' ),
				'parent'        => $panel_product_list,
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'mkdf_products_list_title_tag',
				'type'          => 'select',
				'label'         => esc_html__( 'Products Title Tag', 'roam' ),
				'default_value' => 'h4',
				'options'       => roam_mikado_get_title_tag(),
				'parent'        => $panel_product_list,
			)
		);
		
		/**
		 * Single Product Settings
		 */
		$panel_single_product = roam_mikado_add_admin_panel(
			array(
				'page'  => '_woocommerce_page',
				'name'  => 'panel_single_product',
				'title' => esc_html__( 'Single Product', 'roam' )
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'show_title_area_woo',
				'default_value' => '',
				'label'         => esc_html__( 'Show Title Area', 'roam' ),
				'description'   => esc_html__( 'Enabling this option will show title area on single post pages', 'roam' ),
				'parent'        => $panel_single_product,
				'options'       => roam_mikado_get_yes_no_select_array(),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'mkdf_single_product_title_tag',
				'type'          => 'select',
				'default_value' => 'h3',
				'label'         => esc_html__( 'Single Product Title Tag', 'roam' ),
				'options'       => roam_mikado_get_title_tag(),
				'parent'        => $panel_single_product,
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'woo_set_thumb_images_position',
				'type'          => 'select',
				'default_value' => 'on-left-side',
				'label'         => esc_html__( 'Set Thumbnail Images Position', 'roam' ),
				'options'       => array(
					'below-image'  => esc_html__( 'Below Featured Image', 'roam' ),
					'on-left-side' => esc_html__( 'On The Left Side Of Featured Image', 'roam' )
				),
				'parent'        => $panel_single_product
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'type'          => 'select',
				'name'          => 'woo_enable_single_product_zoom_image',
				'default_value' => 'no',
				'label'         => esc_html__( 'Enable Zoom Maginfier', 'roam' ),
				'description'   => esc_html__( 'Enabling this option will show magnifier image on featured image hover', 'roam' ),
				'parent'        => $panel_single_product,
				'options'       => roam_mikado_get_yes_no_select_array( false ),
				'args'          => array(
					'col_width' => 3
				)
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'name'          => 'woo_set_single_images_behavior',
				'type'          => 'select',
				'default_value' => '',
				'label'         => esc_html__( 'Set Images Behavior', 'roam' ),
				'options'       => array(
					''             => esc_html__( 'No Behavior', 'roam' ),
					'pretty-photo' => esc_html__( 'Pretty Photo Lightbox', 'roam' ),
					'photo-swipe'  => esc_html__( 'Photo Swipe Lightbox', 'roam' )
				),
				'parent'        => $panel_single_product
			)
		);
	}
	
	add_action( 'roam_mikado_options_map', 'roam_mikado_woocommerce_options_map', 21 );
}