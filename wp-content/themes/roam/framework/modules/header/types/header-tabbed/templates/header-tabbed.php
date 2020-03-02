<?php do_action('roam_mikado_before_page_header'); ?>

<header class="mkdf-page-header">
	<?php do_action('roam_mikado_after_page_header_html_open'); ?>
	<?php if($show_fixed_wrapper) : ?>
		<div class="mkdf-fixed-wrapper">
	<?php endif; ?>
	<div class="mkdf-menu-area">
		<?php do_action('roam_mikado_after_header_menu_area_html_open'); ?>
        <div class="mkdf-vertical-align-containers"><!--
         --><div class="mkdf-header-tabbed-left mkdf-position-left">
                <div class="mkdf-position-left-inner">
                    <?php if(!$hide_logo) {
                        roam_mikado_get_logo();
                    } ?>
                </div>
            </div><!--
         --><div class="mkdf-header-tabbed-right mkdf-position-right"><!--
        	 --><div class="mkdf-header-tabbed-right-inner">
	            <?php if (roam_mikado_header_tabbed_top_exists()) { ?>
					<div class="mkdf-header-tabbed-top mkdf-vertical-align-containers"><!--
        			 --><div class="mkdf-position-left"><!--
            			 --><div class="mkdf-position-left-inner">
								<?php roam_mikado_get_header_tabbed_left_widget_menu_area(); ?>
							</div>
						</div><!--
    				 --><div class="mkdf-position-right"><!--
            			 --><div class="mkdf-position-right-inner">
								<?php roam_mikado_get_header_tabbed_right_widget_menu_area(); ?>
							</div>
						</div><!--
        		 --></div>
	        	<?php } ?>
					<div class="mkdf-header-tabbed-bottom mkdf-vertical-align-containers">
			            <div class="mkdf-position-left"><!--
        				 --><div class="mkdf-position-left-inner">
			                    <?php roam_mikado_get_main_menu(); ?>
			                </div>
			            </div>
			            <div class="mkdf-position-right"><!--
            			 --><div class="mkdf-position-right-inner">
								<?php roam_mikado_get_header_widget_menu_area(); ?>
			                </div>
			            </div>
		            </div>
		        </div>
	        </div>
        </div>
	</div>		
	<?php if($show_fixed_wrapper) { ?>
		</div>
	<?php } ?>	
	<?php if($show_sticky) {
		roam_mikado_get_sticky_header();
	} ?>	
	<?php do_action('roam_mikado_before_page_header_html_close'); ?>
</header>

<?php do_action('roam_mikado_after_page_header'); ?>