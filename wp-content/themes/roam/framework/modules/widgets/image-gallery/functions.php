<?php

if ( ! function_exists( 'roam_mikado_register_image_gallery_widget' ) ) {
	/**
	 * Function that register image gallery widget
	 */
	function roam_mikado_register_image_gallery_widget( $widgets ) {
		$widgets[] = 'RoamMikadoImageGalleryWidget';
		
		return $widgets;
	}
	
	add_filter( 'roam_mikado_register_widgets', 'roam_mikado_register_image_gallery_widget' );
}