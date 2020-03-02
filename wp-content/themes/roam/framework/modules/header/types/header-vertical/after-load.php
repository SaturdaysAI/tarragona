<?php

if ( ! function_exists( 'roam_mikado_disable_behaviors_for_header_vertical' ) ) {
	/**
	 * This function is used to disable sticky header functions that perform processing variables their used in js for this header type
	 */
	function roam_mikado_disable_behaviors_for_header_vertical( $allow_behavior ) {
		return false;
	}
	
	if ( roam_mikado_check_is_header_type_enabled( 'header-vertical', roam_mikado_get_page_id() ) ) {
		add_filter( 'roam_mikado_allow_sticky_header_behavior', 'roam_mikado_disable_behaviors_for_header_vertical' );
		add_filter( 'roam_mikado_allow_content_boxed_layout', 'roam_mikado_disable_behaviors_for_header_vertical' );
	}
}