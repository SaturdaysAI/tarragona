<?php
/*
Template Name: Full Width Template
*/
?>
<?php
$mkdf_sidebar_layout = roam_mikado_sidebar_layout();

get_header();
roam_mikado_get_title();
get_template_part( 'slider' );
?>

<div class="mkdf-full-width">
	<div class="mkdf-full-width-inner">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="mkdf-grid-row">
				<div <?php echo roam_mikado_get_content_sidebar_class(); ?>>
					<?php
						the_content();
						do_action( 'roam_mikado_page_after_content' );
					?>
				</div>
				<?php if ( $mkdf_sidebar_layout !== 'no-sidebar' ) { ?>
					<div <?php echo roam_mikado_get_sidebar_holder_class(); ?>>
						<?php get_sidebar(); ?>
					</div>
				<?php } ?>
			</div>
		<?php endwhile; endif; ?>
	</div>
</div>

<?php get_footer(); ?>