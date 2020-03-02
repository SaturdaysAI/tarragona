<?php

if ( ! function_exists( 'roam_mikado_register_blog_list_widget' ) ) {
	/**
	 * Function that register blog list widget
	 */
	function roam_mikado_register_blog_list_widget( $widgets ) {
		$widgets[] = 'RoamMikadoBlogListWidget';
		
		return $widgets;
	}
	
	add_filter( 'roam_mikado_register_widgets', 'roam_mikado_register_blog_list_widget' );
}