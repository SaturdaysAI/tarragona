<?php
	$roam_mikado_day = 'd';
	$roam_mikado_month = 'F';
?>

<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="mkdf-post-content">
        <div class="mkdf-post-heading">
            <?php roam_mikado_get_module_template_part('templates/parts/image', 'blog', '', $part_params); ?>
            <?php roam_mikado_get_module_template_part('templates/parts/post-type/audio', 'blog', '', $part_params); ?>
        </div>
        <div class="mkdf-post-text">
            <div class="mkdf-post-date-inner">
                <div class="mkdf-post-date-wrap">
                    <div class="mkdf-post-date-day">
                        <?php the_time($roam_mikado_day); ?>
                    </div>
                    <div class="mkdf-post-date-month">
                        <?php the_time($roam_mikado_month); ?>
                    </div>
                </div>
            </div>
            <div class="mkdf-post-text-inner">
                <?php roam_mikado_get_module_template_part('templates/parts/title', 'blog', '', $part_params); ?>
                <div class="mkdf-post-text-main">
                    <?php roam_mikado_get_module_template_part('templates/parts/excerpt', 'blog', '', $part_params); ?>
                    <?php do_action('roam_mikado_single_link_pages'); ?>
                </div>
                <div class="mkdf-post-info-bottom clearfix">
                    <div class="mkdf-post-info-bottom-left">
                        <?php roam_mikado_get_module_template_part('templates/parts/post-info/like', 'blog', '', $part_params); ?>
                        <?php roam_mikado_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $part_params); ?>
                        <?php roam_mikado_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
                    </div>
                    <div class="mkdf-post-info-bottom-right">
                        <?php roam_mikado_get_module_template_part('templates/parts/post-info/share', 'blog', '', $part_params); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>