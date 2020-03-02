<?php

namespace MikadoCore\CPT\Shortcodes\ProductListSimple;

use MikadoCore\Lib;

class ProductListSimple implements Lib\ShortcodeInterface {
	private $base;
	
	function __construct() {
		$this->base = 'mkdf_product_list_simple';
		
		add_action( 'vc_before_init', array( $this, 'vcMap' ) );
	}
	
	public function getBase() {
		return $this->base;
	}
	
	public function vcMap() {
		if ( function_exists( 'vc_map' ) ) {
			vc_map(
				array(
					'name'                      => esc_html__( 'Mikado Product List - Simple', 'roam' ),
					'base'                      => $this->base,
					'icon'                      => 'icon-wpb-product-list-simple extended-custom-icon',
					'category'                  => esc_html__( 'by MIKADO', 'roam' ),
					'allowed_container_element' => 'vc_row',
					'params'                    => array(
						array(
							'type'       => 'dropdown',
							'param_name' => 'type',
							'heading'    => esc_html__( 'Type', 'roam' ),
							'value'      => array(
								esc_html__( 'Sale', 'roam' )         => 'sale',
								esc_html__( 'Best Sellers', 'roam' ) => 'best-sellers',
								esc_html__( 'Featured', 'roam' )     => 'featured'
							),
							'save_always' => true
						),
						array(
							'type'        => 'textfield',
							'param_name'  => 'number',
							'heading'     => esc_html__( 'Number of Products', 'roam' ),
							'description' => esc_html__( 'Number of products to show (default value is 4)', 'roam' )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'order_by',
							'heading'     => esc_html__( 'Order By', 'roam' ),
							'value'       => array_flip( roam_mikado_get_query_order_by_array() ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'type', 'value' => array( 'sale', 'featured' ) )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'sort_order',
							'heading'     => esc_html__( 'Order', 'roam' ),
							'value'       => array_flip( roam_mikado_get_query_order_array() ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'type', 'value' => array( 'sale', 'featured' ) )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_title',
							'heading'    => esc_html__( 'Display Title', 'roam' ),
							'value'      => array_flip( roam_mikado_get_yes_no_select_array( false, true ) )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'title_tag',
							'heading'     => esc_html__( 'Title Tag', 'roam' ),
							'value'       => array_flip( roam_mikado_get_title_tag( true ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'display_title', 'value' => array( 'yes' ) )
						),
						array(
							'type'        => 'dropdown',
							'param_name'  => 'title_transform',
							'heading'     => esc_html__( 'Title Text Transform', 'roam' ),
							'value'       => array_flip( roam_mikado_get_text_transform_array( true ) ),
							'save_always' => true,
							'dependency'  => array( 'element' => 'display_title', 'value' => array( 'yes' ) )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_rating',
							'heading'    => esc_html__( 'Display Rating', 'roam' ),
							'value'      => array_flip( roam_mikado_get_yes_no_select_array( false, true ) )
						),
						array(
							'type'       => 'dropdown',
							'param_name' => 'display_price',
							'heading'    => esc_html__( 'Display Price', 'roam' ),
							'value'      => array_flip( roam_mikado_get_yes_no_select_array( false, true ) )
						)
					)
				)
			);
		}
	}
	
	public function render( $atts, $content = null ) {
		$default_atts = array(
			'type'            => 'sale',
			'number'          => '4',
			'order_by'        => 'title',
			'sort_order'      => 'ASC',
			'display_title'   => 'yes',
			'title_tag'       => 'h5',
			'title_transform' => 'uppercase',
			'display_price'   => 'yes',
			'display_rating'  => 'yes'
		);
		$params       = shortcode_atts( $default_atts, $atts );
		
		$params['holder_classes'] = $this->getHolderClasses( $params );
		$params['class_name']     = 'pls';
		
		$params['title_tag']    = ! empty( $params['title_tag'] ) ? $params['title_tag'] : $default_atts['title_tag'];
		$params['title_styles'] = $this->getTitleStyles( $params );
		
		$queryArray             = $this->generateProductQueryArray( $params );
		$query_result           = new \WP_Query( $queryArray );
		$params['query_result'] = $query_result;
		
		$html = roam_mikado_get_woo_shortcode_module_template_part( 'templates/product-list-template', 'product-list-simple', '', $params );
		
		return $html;
	}
	
	private function getHolderClasses( $params ) {
		$holderClasses   = '';
		$productListType = $params['type'];
		
		switch ( $productListType ) {
			case 'sale':
				$holderClasses = 'mkdf-pls-sale';
				break;
			case 'best-sellers':
				$holderClasses = 'mkdf-pls-best-sellers';
				break;
			case 'featured':
				$holderClasses = 'mkdf-pls-featured';
				break;
			default:
				$holderClasses = 'mkdf-pls-sale';
				break;
		}
		
		return $holderClasses;
	}
	
	private function generateProductQueryArray( $params ) {
		switch ( $params['type'] ) {
			case 'sale':
				$args = array(
					'post_status'    => 'publish',
					'post_type'      => 'product',
					'posts_per_page' => $params['number'],
					'orderby'        => $params['order_by'],
					'order'          => $params['sort_order'],
					'no_found_rows'  => 1,
					'post__in'       => array_merge( array( 0 ), wc_get_product_ids_on_sale() )
				);
				break;
			case 'best-sellers':
				$args = array(
					'post_status'         => 'publish',
					'post_type'           => 'product',
					'ignore_sticky_posts' => 1,
					'posts_per_page'      => $params['number'],
					'meta_key'            => 'total_sales',
					'orderby'             => 'meta_value_num'
				);
				break;
			case 'featured':
				$args = array(
					'post_status'    => 'publish',
					'post_type'      => 'product',
					'posts_per_page' => $params['number'],
					'orderby'        => $params['order_by'],
					'order'          => $params['sort_order'],
					'tax_query' 	 => array(
                        array(
                            'taxonomy' => 'product_visibility',
                            'field'    => 'name',
                            'terms'    => 'featured',
                        ),
                    ),

				);
				break;
		}
		
		return $args;
	}
	
	private function getTitleStyles( $params ) {
		$styles = array();
		
		if ( ! empty( $params['title_transform'] ) ) {
			$styles[] = 'text-transform: ' . $params['title_transform'];
		}
		
		return implode( ';', $styles );
	}
}