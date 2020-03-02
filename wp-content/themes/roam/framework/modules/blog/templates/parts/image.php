<?php
$image_size          = isset( $image_size ) ? $image_size : 'full';
$image_meta          = get_post_meta( get_the_ID(), 'mkdf_blog_list_featured_image_meta', true );
$has_featured        = ! empty( $image_meta ) || has_post_thumbnail();
$blog_list_image_src = ! empty( $image_meta ) && roam_mikado_blog_item_has_link() ? $image_meta : '';
?>

<?php if ( $has_featured ) { ?>
	<div class="mkdf-post-image">
		<?php if ( roam_mikado_blog_item_has_link() ) { ?>
			<a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
		<?php } ?>
			<?php if ( ! empty( $blog_list_image_src ) ) { ?>
				<img itemprop="image" class="mkdf-custom-post-image" src="<?php echo esc_url( $blog_list_image_src ); ?>" alt="<?php esc_attr_e( 'Blog List Featured Image', 'roam' ); ?>" />
			<?php } else { ?>
				<?php the_post_thumbnail( $image_size ); ?>
			<?php } ?>
		<?php if ( roam_mikado_blog_item_has_link() ) { ?>
			</a>
		<?php } ?>
		<?php do_action('roam_mikado_action_blog_inside_image_tag')?>
	</div>
<?php } ?>