<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="mkdf-post-content">
        <div class="mkdf-post-text">
            <div class="mkdf-post-text-inner">
                <div class="mkdf-post-mark">
                    <span class="icon_quotations mkdf-quote-mark"></span>
                </div>
                <div class="mkdf-post-text-main">
                    <?php roam_mikado_get_module_template_part('templates/parts/post-type/quote', 'blog', '', $part_params); ?>
                </div>
                <div class="mkdf-post-info">
                    <?php roam_mikado_get_module_template_part('templates/parts/post-info/date', 'blog', 'standard', $part_params); ?>
                    <?php roam_mikado_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $part_params); ?>
                    <?php roam_mikado_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="mkdf-post-additional-content">
        <?php the_content(); ?>
    </div>
    <div class="mkdf-post-info-bottom clearfix">
        <div class="mkdf-post-info-bottom-left">
            <?php roam_mikado_get_module_template_part('templates/parts/post-info/like', 'blog', '', $part_params); ?>
            <?php roam_mikado_get_module_template_part('templates/parts/post-info/tags', 'blog', '', $part_params); ?>
        </div>
        <div class="mkdf-post-info-bottom-right">
            <?php roam_mikado_get_module_template_part('templates/parts/post-info/share', 'blog', '', $part_params); ?>
        </div>
    </div>
</article>