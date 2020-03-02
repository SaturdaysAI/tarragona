<?php
$share_type = isset($share_type) ? $share_type : 'list';
?>
<?php if( roam_mikado_core_plugin_installed() && roam_mikado_options()->getOptionValue('enable_social_share') === 'yes' && roam_mikado_options()->getOptionValue('enable_social_share_on_post') === 'yes') { ?>
    <div class="mkdf-blog-share">
        <?php echo roam_mikado_get_social_share_html(array('type' => $share_type)); ?>
    </div>
<?php } ?>