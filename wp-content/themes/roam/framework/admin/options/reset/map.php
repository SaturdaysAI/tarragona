<?php

if ( ! function_exists( 'roam_mikado_reset_options_map' ) ) {
	/**
	 * Reset options panel
	 */
	function roam_mikado_reset_options_map() {
		
		roam_mikado_add_admin_page(
			array(
				'slug'  => '_reset_page',
				'title' => esc_html__( 'Reset', 'roam' ),
				'icon'  => 'fa fa-retweet'
			)
		);
		
		$panel_reset = roam_mikado_add_admin_panel(
			array(
				'page'  => '_reset_page',
				'name'  => 'panel_reset',
				'title' => esc_html__( 'Reset', 'roam' )
			)
		);
		
		roam_mikado_add_admin_field(
			array(
				'type'          => 'yesno',
				'name'          => 'reset_to_defaults',
				'default_value' => 'no',
				'label'         => esc_html__( 'Reset to Defaults', 'roam' ),
				'description'   => esc_html__( 'This option will reset all Select Options values to defaults', 'roam' ),
				'parent'        => $panel_reset
			)
		);
	}
	
	add_action( 'roam_mikado_options_map', 'roam_mikado_reset_options_map', 100 );
}