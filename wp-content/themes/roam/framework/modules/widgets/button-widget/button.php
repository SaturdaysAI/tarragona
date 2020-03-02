<?php

class RoamMikadoButtonWidget extends RoamMikadoWidget {
	public function __construct() {
		parent::__construct(
			'mkdf_button_widget',
			esc_html__( 'Mikado Button Widget', 'roam' ),
			array( 'description' => esc_html__( 'Add button element to widget areas', 'roam' ) )
		);
		
		$this->setParams();
	}
	
	protected function setParams() {
		$this->params = array(
			array(
				'type'    => 'dropdown',
				'name'    => 'type',
				'title'   => esc_html__( 'Type', 'roam' ),
				'options' => array(
					'solid'   => esc_html__( 'Solid', 'roam' ),
					'outline' => esc_html__( 'Outline', 'roam' ),
					'simple'  => esc_html__( 'Simple', 'roam' )
				)
			),
			array(
				'type'        => 'dropdown',
				'name'        => 'size',
				'title'       => esc_html__( 'Size', 'roam' ),
				'options'     => array(
					'small'  => esc_html__( 'Small', 'roam' ),
					'medium' => esc_html__( 'Medium', 'roam' ),
					'large'  => esc_html__( 'Large', 'roam' ),
					'huge'   => esc_html__( 'Huge', 'roam' )
				),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'roam' )
			),
			array(
				'type'    => 'textfield',
				'name'    => 'text',
				'title'   => esc_html__( 'Text', 'roam' ),
				'default' => esc_html__( 'Button Text', 'roam' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'link',
				'title' => esc_html__( 'Link', 'roam' )
			),
			array(
				'type'    => 'dropdown',
				'name'    => 'target',
				'title'   => esc_html__( 'Link Target', 'roam' ),
				'options' => roam_mikado_get_link_target_array()
			),
			array(
				'type'  => 'textfield',
				'name'  => 'color',
				'title' => esc_html__( 'Color', 'roam' )
			),
			array(
				'type'  => 'textfield',
				'name'  => 'hover_color',
				'title' => esc_html__( 'Hover Color', 'roam' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'background_color',
				'title'       => esc_html__( 'Background Color', 'roam' ),
				'description' => esc_html__( 'This option is only available for solid button type', 'roam' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'hover_background_color',
				'title'       => esc_html__( 'Hover Background Color', 'roam' ),
				'description' => esc_html__( 'This option is only available for solid button type', 'roam' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'border_color',
				'title'       => esc_html__( 'Border Color', 'roam' ),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'roam' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'hover_border_color',
				'title'       => esc_html__( 'Hover Border Color', 'roam' ),
				'description' => esc_html__( 'This option is only available for solid and outline button type', 'roam' )
			),
			array(
				'type'        => 'textfield',
				'name'        => 'margin',
				'title'       => esc_html__( 'Margin', 'roam' ),
				'description' => esc_html__( 'Insert margin in format: top right bottom left (e.g. 10px 5px 10px 5px)', 'roam' )
			)
		);
	}
	
	public function widget( $args, $instance ) {
		$params = '';
		
		if ( ! is_array( $instance ) ) {
			$instance = array();
		}
		
		// Filter out all empty params
		$instance = array_filter( $instance, function ( $array_value ) {
			return trim( $array_value ) != '';
		} );
		
		// Default values
		if ( ! isset( $instance['text'] ) ) {
			$instance['text'] = 'Button Text';
		}
		
		// Generate shortcode params
		foreach ( $instance as $key => $value ) {
			$params .= " $key='$value' ";
		}
		
		echo '<div class="widget mkdf-button-widget">';
			echo do_shortcode( "[mkdf_button $params]" ); // XSS OK
		echo '</div>';
	}
}