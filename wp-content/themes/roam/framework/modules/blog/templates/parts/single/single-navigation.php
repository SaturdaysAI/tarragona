<?php
$blog_single_navigation = roam_mikado_options()->getOptionValue('blog_single_navigation') === 'no' ? false : true;
$blog_navigation_through_same_category = roam_mikado_options()->getOptionValue('blog_navigation_through_same_category') === 'no' ? false : true;
?>
<?php if($blog_single_navigation){ ?>
	<div class="mkdf-blog-single-navigation">
		<div class="mkdf-blog-single-navigation-inner clearfix">
			<?php
				/* Single navigation section - SETTING PARAMS */
				$post_navigation = array(
					'prev' => array(
						'mark' => '<span class="mkdf-blog-single-nav-mark ion-ios-arrow-thin-left"></span>',
						'title' => '',
						'image' => '',
					),
					'next' => array(
						'mark' => '<span class="mkdf-blog-single-nav-mark ion-ios-arrow-thin-right"></span>',
						'title' => '',
						'image' => '',
					)
				);

			if(get_previous_post() !== ""){
				if($blog_navigation_through_same_category){
					if(get_previous_post(true) !== ""){
						$post_navigation['prev']['post'] = get_previous_post(true);
					}
				} else {
					if(get_previous_post() != ""){
						$post_navigation['prev']['post'] = get_previous_post();
					}
				}

				if($post_navigation['prev']['post']->post_title != '') {
					$post_navigation['prev']['title'] = '<span class="mkdf-blog-single-nav-title-text">'.esc_html($post_navigation['prev']['post']->post_title).'</span>';
				}

				$prev_post_ID = $post_navigation['prev']['post']->ID;
				$prev_background_image_src = wp_get_attachment_image_src(get_post_thumbnail_id($prev_post_ID),'roam_mikado_square');
				$prev_post_thumbnail = $prev_background_image_src[0];

				if($prev_post_thumbnail != '') {
					$post_navigation['prev']['image'] = '<img class="mkdf-nav-image" src="'.esc_url($prev_post_thumbnail).'" alt="'.esc_attr__("Image thumbnail", "roam").'">';
				}
			}
			if(get_next_post() != ""){
				if($blog_navigation_through_same_category){
					if(get_next_post(true) !== ""){
						$post_navigation['next']['post'] = get_next_post(true);

					}
				} else {
					if(get_next_post() !== ""){
						$post_navigation['next']['post'] = get_next_post();
					}
				}

				if($post_navigation['next']['post']->post_title != '') {
					$post_navigation['next']['title'] = '<span class="mkdf-blog-single-nav-title-text">'.esc_html($post_navigation['next']['post']->post_title).'</span>';
				}

				$next_post_ID = $post_navigation['next']['post']->ID;
				$next_background_image_src = wp_get_attachment_image_src(get_post_thumbnail_id($next_post_ID),'roam_mikado_square');
				$next_post_thumbnail = $next_background_image_src[0];

				if($next_post_thumbnail != '') {
					$post_navigation['next']['image'] = '<img class="mkdf-nav-image" src="'.esc_url($next_post_thumbnail).'" alt="'.esc_attr__("Image thumbnail", "roam").'">';
				}
			}


			if (isset($post_navigation['prev']['post']) || isset($post_navigation['next']['post'])) {

                if (isset($post_navigation['prev']['post'])) { ?>
                    <?php $mkdf_nav_class = get_the_post_thumbnail($post_navigation['prev']['post']->ID) == '' ? ' mkdf-no-nav-image' : '';  ?>
                    <a itemprop="url" class="mkdf-blog-single-<?php echo esc_attr('prev'); ?> <?php echo esc_attr($mkdf_nav_class); ?>" href="<?php echo get_permalink($post_navigation['prev']['post']->ID); ?>">
                    	<div class="mkdf-blog-single-nav-table-holder">
	                    	<?php if ($post_navigation['prev']['image'] !== '') { ?>
		                        <div class="mkdf-nav-blog-post-image">
		                            <?php echo wp_kses($post_navigation['prev']['image'], array('img' => array('class' => true, 'src' => true, 'alt' => true))); ?>
		                        </div>
	                        <?php } ?>
	                        <div class="mkdf-nav-blog-post-label-wrapper">
	                            <h6 class="mkdf-blog-single-nav-title">
	                                <?php echo wp_kses($post_navigation['prev']['title'], array('span' => array('class' => true))); ?>
	                            </h6>
	                        </div>
	                    </div>
                    </a>
                <?php } ?>
                <?php if (isset($post_navigation['next']['post'])) { ?>
	                <?php $mkdf_nav_class = get_the_post_thumbnail($post_navigation['next']['post']->ID) == '' ? ' mkdf-no-nav-image' : '';  ?>
	                <a itemprop="url" class="mkdf-blog-single-<?php echo esc_attr('next'); ?> <?php echo esc_attr($mkdf_nav_class); ?>" href="<?php echo get_permalink($post_navigation['next']['post']->ID); ?>">
                    	<div class="mkdf-blog-single-nav-table-holder">
		                    <div class="mkdf-nav-blog-post-label-wrapper">
		                        <h6 class="mkdf-blog-single-nav-title">
		                            <?php echo wp_kses($post_navigation['next']['title'], array('span' => array('class' => true))); ?>
		                        </h6>
		                    </div>
		                	<?php if ($post_navigation['next']['image'] !== '') { ?>
			                    <div class="mkdf-nav-blog-post-image">
			                        <?php echo wp_kses($post_navigation['next']['image'], array('img' => array('class' => true, 'src' => true, 'alt' => true))); ?>
			                    </div>
		                    <?php } ?>
		                </div>
	                </a>
            <?php }

			}
			?>
		</div>
	</div>
<?php } ?>
