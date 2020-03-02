<?php

roam_mikado_get_single_post_format_html($blog_single_type);

do_action('roam_mikado_after_article_content');

roam_mikado_get_module_template_part('templates/parts/single/author-info', 'blog');

roam_mikado_get_module_template_part('templates/parts/single/single-navigation', 'blog');

roam_mikado_get_module_template_part('templates/parts/single/related-posts', 'blog', '', $single_info_params);

roam_mikado_get_module_template_part('templates/parts/single/comments', 'blog');