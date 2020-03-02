<?php do_action('roam_mikado_before_page_header'); ?>

<aside class="mkdf-vertical-menu-area <?php echo esc_attr($holder_class); ?>">
	<div class="mkdf-vertical-menu-area-inner">
		<div class="mkdf-vertical-area-background"></div>
		<?php if(!$hide_logo) {
			roam_mikado_get_logo();
		} ?>
		<?php roam_mikado_get_header_vertical_main_menu(); ?>
		<div class="mkdf-vertical-area-widget-holder">
			<?php roam_mikado_get_header_vertical_widget_areas(); ?>
		</div>
		<div class="mkdf-vertical-area-widget-holder-bottom">
			<?php if ( is_active_sidebar( 'mkdf-vertical-area-bottom' )) {
	            dynamic_sidebar('mkdf-vertical-area-bottom');
             } ?>
		</div>
	</div>
</aside>

<?php do_action('roam_mikado_after_page_header'); ?>