<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php
	/**
	 * roam_mikado_header_meta hook
	 *
	 * @see roam_mikado_header_meta() - hooked with 10
	 * @see roam_mikado_user_scalable_meta - hooked with 10
	 * @see mkdf_core_set_open_graph_meta - hooked with 10
	 */
	do_action( 'roam_mikado_header_meta' );
	
	wp_head(); ?>
</head>
<body <?php body_class(); ?> itemscope itemtype="http://schema.org/WebPage">
	<?php
	/**
	 * roam_mikado_after_body_tag hook
	 *
	 * @see roam_mikado_get_side_area() - hooked with 10
	 * @see roam_mikado_smooth_page_transitions() - hooked with 10
	 */
	do_action( 'roam_mikado_after_body_tag' ); ?>

    <div class="mkdf-wrapper">
        <div class="mkdf-wrapper-inner">
            <?php roam_mikado_get_header(); ?>
	
	        <?php
	        /**
	         * roam_mikado_after_header_area hook
	         *
	         * @see roam_mikado_back_to_top_button() - hooked with 10
	         * @see roam_mikado_get_full_screen_menu() - hooked with 10
	         */
	        do_action( 'roam_mikado_after_header_area' ); ?>
	        
            <div class="mkdf-content" <?php roam_mikado_content_elem_style_attr(); ?>>
                <div class="mkdf-content-inner">