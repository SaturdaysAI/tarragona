<form role="search" method="get" class="searchform" id="searchform-<?php echo esc_attr(rand())?>" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label class="screen-reader-text"><?php esc_html_e( 'Search for:', 'roam' ); ?></label>
	<div class="input-holder clearfix">
		<input type="search" class="search-field" placeholder="<?php esc_attr_e( 'Search...', 'roam' ); ?>" value="" name="s" title="<?php esc_attr_e( 'Search for:', 'roam' ); ?>"/>
		<button type="submit" class="mkdf-search-submit"><?php echo roam_mikado_icon_collections()->renderIcon( 'icon_search', 'font_elegant' ); ?></button>
	</div>
</form>