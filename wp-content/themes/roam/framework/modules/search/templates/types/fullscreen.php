<div class="mkdf-fullscreen-search-holder">
	<a class="mkdf-fullscreen-search-close" href="javascript:void(0)">
		<?php echo roam_mikado_icon_collections()->renderIcon( 'icon_close', 'font_elegant' ); ?>
	</a>
	<div class="mkdf-fullscreen-search-table">
		<div class="mkdf-fullscreen-search-cell">
			<div class="mkdf-fullscreen-search-inner">
				<form action="<?php echo esc_url( home_url( '/' ) ); ?>" class="mkdf-fullscreen-search-form" method="get">
					<div class="mkdf-form-holder">
						<div class="mkdf-form-holder-inner">
							<div class="mkdf-field-holder">
								<input type="text" placeholder="<?php esc_attr_e( 'Search for...', 'roam' ); ?>" name="s" class="mkdf-search-field" autocomplete="off"/>
							</div>
							<button type="submit" class="mkdf-search-submit"><?php echo roam_mikado_icon_collections()->renderIcon( 'icon_search', 'font_elegant' ); ?></button>
							<div class="mkdf-line"></div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>