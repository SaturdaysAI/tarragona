<?php if(comments_open()) { ?>
	<div class="mkdf-post-info-comments-holder">
		<a itemprop="url" class="mkdf-post-info-comments" href="<?php comments_link(); ?>" target="_self">
			<span class="mkdf-post-info-comments-icon">
				<?php echo roam_mikado_icon_collections()->renderIcon('icon_chat', 'font_elegant'); ?>
			</span>
            <span itemprop="commentCount"><?php comments_number('0', '1', '%'); ?></span>
		</a>
	</div>
<?php } ?>
