<?php

if ( ! function_exists( 'roam_mikado_register_blog_standard_date_on_side_template_file' ) ) {
	/**
	 * Function that register blog standard date on side template
	 */
	function roam_mikado_register_blog_standard_date_on_side_template_file( $templates ) {
		$templates['blog-standard-date-on-side'] = esc_html__( 'Blog: Standard Date On Side', 'roam' );
		
		return $templates;
	}
	
	add_filter( 'roam_mikado_register_blog_templates', 'roam_mikado_register_blog_standard_date_on_side_template_file' );
}

if ( ! function_exists( 'roam_mikado_set_blog_standard_date_on_side_type_global_option' ) ) {
	/**
	 * Function that set blog list type value for global blog option map
	 */
	function roam_mikado_set_blog_standard_date_on_side_type_global_option( $options ) {
		$options['standard-date-on-side'] = esc_html__( 'Blog: Standard Date On Side', 'roam' );
		
		return $options;
	}
	
	add_filter( 'roam_mikado_blog_list_type_global_option', 'roam_mikado_set_blog_standard_date_on_side_type_global_option' );
}