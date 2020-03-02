<?php
$day = get_the_time('d');
$month = get_the_time('M');
$month_link = get_the_time('m');
$year = get_the_time('Y');
$title = get_the_title();
?>
<div itemprop="dateCreated" class="mkdf-post-info-date entry-date published updated">
    <?php if(empty($title) && roam_mikado_blog_item_has_link()) { ?>
        <a itemprop="url" href="<?php the_permalink() ?>">
    <?php } else { ?>
        <a itemprop="url" href="<?php echo get_month_link($year, $month_link); ?>">
    <?php } ?>

            <div class="mkdf-post-date-wrap">
                <div class="mkdf-post-date-day">
                    <?php echo esc_html($day); ?>
                </div>
                <div class="mkdf-post-date-month">
                    <?php echo esc_html($month); ?>
                </div>
            </div>
        </a>
    <meta itemprop="interactionCount" content="UserComments: <?php echo get_comments_number(roam_mikado_get_page_id()); ?>"/>
</div>