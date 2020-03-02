<?php

if ( ! function_exists( 'roam_mikado_admin_map_init' ) ) {
	function roam_mikado_admin_map_init() {
		do_action( 'roam_mikado_before_options_map' );
		
		require_once MIKADO_FRAMEWORK_ROOT_DIR . '/admin/options/fonts/map.php';
		require_once MIKADO_FRAMEWORK_ROOT_DIR . '/admin/options/general/map.php';
		require_once MIKADO_FRAMEWORK_ROOT_DIR . '/admin/options/page/map.php';
		require_once MIKADO_FRAMEWORK_ROOT_DIR . '/admin/options/social/map.php';
		require_once MIKADO_FRAMEWORK_ROOT_DIR . '/admin/options/reset/map.php';
		
		do_action( 'roam_mikado_options_map' );
		
		do_action( 'roam_mikado_after_options_map' );
	}
	
	add_action( 'after_setup_theme', 'roam_mikado_admin_map_init', 1 );
}