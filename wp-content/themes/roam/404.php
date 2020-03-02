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
	
	<div class="mkdf-wrapper mkdf-404-page">
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
					<div class="mkdf-page-not-found">
						<?php
						$mkdf_title_image_404 = roam_mikado_options()->getOptionValue( '404_page_title_image' );
						$mkdf_title_404       = roam_mikado_options()->getOptionValue( '404_title' );
						$mkdf_subtitle_404    = roam_mikado_options()->getOptionValue( '404_subtitle' );
						$mkdf_text_404        = roam_mikado_options()->getOptionValue( '404_text' );
						
						if ( ! empty( $mkdf_title_image_404 ) ) { ?>
							<div class="mkdf-404-title-image">
								<img src="<?php echo esc_url( $mkdf_title_image_404 ); ?>" alt="<?php esc_attr_e( '404 Title Image', 'roam' ); ?>" />
							</div>
						<?php } ?>
						
						<h1 class="mkdf-404-title">
							<?php if ( ! empty( $mkdf_title_404 ) ) {
								echo esc_html( $mkdf_title_404 );
							} else {
								esc_html_e( '404', 'roam' );
							} ?>
						</h1>
						
						<h3 class="mkdf-404-subtitle">
							<?php if ( ! empty( $mkdf_subtitle_404 ) ) {
								echo esc_html( $mkdf_subtitle_404 );
							} else {
								esc_html_e( 'Page not found', 'roam' );
							} ?>
						</h3>
						
						<h5 class="mkdf-404-text">
							<?php if ( ! empty( $mkdf_text_404 ) ) {
								echo esc_html( $mkdf_text_404 );
							} else {
								esc_html_e( 'Oops! The page you are looking for does not exist. It might have been moved or deleted.', 'roam' );
							} ?>
						</h5>

						<?php get_search_form(); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php wp_footer(); ?>
</body>
</html>