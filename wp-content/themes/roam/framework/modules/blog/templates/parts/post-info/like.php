<?php if(roam_mikado_core_plugin_installed()) { ?>
<div class="mkdf-blog-like">
	<?php if( function_exists('roam_mikado_get_like') ) roam_mikado_get_like(); ?>
</div>
<?php } ?>