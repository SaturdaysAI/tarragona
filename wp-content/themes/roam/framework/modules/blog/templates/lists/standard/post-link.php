<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
    <div class="mkdf-post-content">
        <div class="mkdf-post-text">
            <div class="mkdf-post-text-inner">
                <div class="mkdf-post-mark">
                    <span class="icon_link mkdf-link-mark"></span>
                </div>
                <div class="mkdf-post-text-main">
                    <?php roam_mikado_get_module_template_part('templates/parts/post-type/link', 'blog', '', $part_params); ?>
                </div>
                <div class="mkdf-post-info">
                    <?php roam_mikado_get_module_template_part('templates/parts/post-info/date', 'blog', 'standard', $part_params); ?>
                    <?php roam_mikado_get_module_template_part('templates/parts/post-info/comments', 'blog', '', $part_params); ?>
                    <?php roam_mikado_get_module_template_part('templates/parts/post-info/category', 'blog', '', $part_params); ?>
                </div>
            </div>
        </div>
    </div>
</article>