<?php if($max_num_pages > 1) { ?>
	<div class="mkdf-blog-pag-loading">
		<div class="mkdf-blog-pag-bounce1"></div>
		<div class="mkdf-blog-pag-bounce2"></div>
		<div class="mkdf-blog-pag-bounce3"></div>
	</div>
	<div class="mkdf-blog-pag-load-more">
		<?php
        if(roam_mikado_core_plugin_installed()) {
			echo roam_mikado_get_button_html(
                apply_filters(
                    'roam_mikado_blog_template_load_more_button',
                    array(
                        'link' => 'javascript: void(0)',
                        'size' => 'large',
                        'text' => esc_html__('Load more', 'roam')
			        )
                )
            );
        } else { ?>
            <a itemprop="url" href="javascript:void(0)" target="_self" class="mkdf-btn mkdf-btn-large mkdf-btn-solid">
                <span class="mkdf-btn-text">
                    <?php echo esc_html__('Load more', 'roam'); ?>
                </span>
            </a>
		<?php } ?>
	</div>
<?php }