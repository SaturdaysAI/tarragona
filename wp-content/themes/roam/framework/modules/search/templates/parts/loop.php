<?php if ( $query->have_posts() ) : while ( $query->have_posts() ) : $query->the_post(); ?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="mkdf-post-content">
	        <?php if ( has_post_thumbnail() ) { ?>
		        <div class="mkdf-post-image">
			        <a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				        <?php the_post_thumbnail( 'thumbnail' ); ?>
			        </a>
		        </div>
	        <?php } ?>
	        <div class="mkdf-post-title-area <?php if ( ! has_post_thumbnail() ) { echo esc_attr( 'mkdf-no-thumbnail' ); } ?>">
		        <div class="mkdf-post-title-area-inner">
			        <h4 itemprop="name" class="mkdf-post-title entry-title">
				        <a itemprop="url" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title(); ?></a>
			        </h4>
			        <?php
			        $mkdf_my_excerpt = get_the_excerpt();
		        	$content_exerpt = get_the_content();
			        
			        if ( ! empty( $mkdf_my_excerpt ) ) { ?>
				        <p itemprop="description" class="mkdf-post-excerpt"><?php echo wp_trim_words( esc_html( $mkdf_my_excerpt ), 30 ); ?></p>
			        <?php } elseif ( ! empty($content_exerpt)) { ?>
				        <p itemprop="description" class="mkdf-post-excerpt"><?php echo wp_trim_words( esc_html( $content_exerpt ), 30 ); ?></p>
			        <?php }

			        if ( roam_mikado_core_plugin_installed() ) {
						echo roam_mikado_get_button_html(
							array(
								'link' => get_permalink(),
								'size' => 'small',
								'text' => esc_html__( 'Continue reading', 'roam' )
							)
						);
					} else { ?>
						<a itemprop="url" class="mkdf-btn mkdf-btn-small mkdf-btn-solid" href="<?php the_permalink();?>" target="_self">
							<span class="mkdf-btn-text">
							<?php esc_html_e( 'Continue reading', 'roam' ); ?>
							</span>
						</a>
					<?php }
					?>

		        </div>
	        </div>
        </div>
    </article>
<?php endwhile; ?>
<?php else: ?>
	<p class="mkdf-blog-no-posts"><?php esc_html_e( 'No posts were found.', 'roam' ); ?></p>
<?php endif; ?>