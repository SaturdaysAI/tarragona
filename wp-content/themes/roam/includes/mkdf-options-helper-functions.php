<?php

if(!function_exists('roam_mikado_first_color_array')){

    function roam_mikado_first_color_array() {

        $background_color_selector = array(
            '.mkdf-st-loader .pulse',
			'.mkdf-st-loader .double_pulse .double-bounce1',
			'.mkdf-st-loader .double_pulse .double-bounce2',
			'.mkdf-st-loader .cube',
			'.mkdf-st-loader .rotating_cubes .cube1',
			'.mkdf-st-loader .rotating_cubes .cube2',
			'.mkdf-st-loader .stripes>div',
			'.mkdf-st-loader .wave>div',
			'.mkdf-st-loader .two_rotating_circles .dot1',
			'.mkdf-st-loader .two_rotating_circles .dot2',
			'.mkdf-st-loader .five_rotating_circles .container1>div',
			'.mkdf-st-loader .five_rotating_circles .container2>div',
			'.mkdf-st-loader .five_rotating_circles .container3>div',
			'.mkdf-st-loader .atom .ball-1:before',
			'.mkdf-st-loader .atom .ball-2:before',
			'.mkdf-st-loader .atom .ball-3:before',
			'.mkdf-st-loader .atom .ball-4:before',
			'.mkdf-st-loader .clock .ball:before',
			'.mkdf-st-loader .mitosis .ball',
			'.mkdf-st-loader .lines .line1',
			'.mkdf-st-loader .lines .line2',
			'.mkdf-st-loader .lines .line3',
			'.mkdf-st-loader .lines .line4',
			'.mkdf-st-loader .fussion .ball',
			'.mkdf-st-loader .fussion .ball-1',
			'.mkdf-st-loader .fussion .ball-2',
			'.mkdf-st-loader .fussion .ball-3',
			'.mkdf-st-loader .fussion .ball-4',
			'.mkdf-st-loader .wave_circles .ball',
			'.mkdf-st-loader .pulse_circles .ball',
			'#submit_comment',
			'.post-password-form input[type=submit]',
			'.mkdf-owl-slider .owl-dots .owl-dot.active span',
			'.mkdf-owl-slider .owl-dots .owl-dot:hover span',
			'.mkdf-owl-slider-style .owl-dots .owl-dot.active span',
			'.mkdf-owl-slider-style .owl-dots .owl-dot:hover span',
			'#mkdf-back-to-top .mkdf-btt-tb',
			'footer .widget.widget_search .input-holder button',
			'.mkdf-side-menu .widget.widget_search .input-holder button',
			'.wpb_widgetised_column .widget.widget_search .input-holder button',
			'aside.mkdf-sidebar .widget.widget_search .input-holder button',
			'.widget.widget_search .input-holder button',
			'.mkdf-blog-holder article.format-audio .mkdf-blog-audio-holder .mejs-container .mejs-controls>.mejs-time-rail .mejs-time-total .mejs-time-current',
			'.mkdf-blog-holder article.format-audio .mkdf-blog-audio-holder .mejs-container .mejs-controls>a.mejs-horizontal-volume-slider .mejs-horizontal-volume-current',
			'.mkdf-blog-holder.mkdf-blog-masonry article.format-link .mkdf-post-mark',
			'.mkdf-blog-holder.mkdf-blog-masonry article.format-quote .mkdf-post-mark',
			'.mkdf-blog-holder.mkdf-blog-standard-date-on-side article .mkdf-post-date-inner .mkdf-post-date-wrap',
			'.mkdf-blog-holder.mkdf-blog-standard-date-on-side article.format-link .mkdf-post-mark',
			'.mkdf-blog-holder.mkdf-blog-standard-date-on-side article.format-quote .mkdf-post-mark',
			'.mkdf-blog-holder.mkdf-blog-standard article.format-link .mkdf-post-mark',
			'.mkdf-blog-holder.mkdf-blog-standard article.format-quote .mkdf-post-mark',
			'.mkdf-blog-holder.mkdf-blog-single article .mkdf-post-date-inner .mkdf-post-date-wrap',
			'.mkdf-blog-holder.mkdf-blog-single article.format-link .mkdf-post-mark',
			'.mkdf-blog-holder.mkdf-blog-single article.format-quote .mkdf-post-mark',
			'.mkdf-accordion-holder.mkdf-ac-boxed .mkdf-accordion-title.ui-state-active',
			'.mkdf-accordion-holder.mkdf-ac-boxed .mkdf-accordion-title.ui-state-hover',
			'.mkdf-btn.mkdf-btn-solid',
			'.mkdf-icon-shortcode.mkdf-circle',
			'.mkdf-icon-shortcode.mkdf-dropcaps.mkdf-circle',
			'.mkdf-icon-shortcode.mkdf-square',
			'.mkdf-icon-shortcode.mkdf-circle .mkdf-icon-shortcode-hover-layer',
			'.mkdf-icon-shortcode.mkdf-dropcaps.mkdf-circle .mkdf-icon-shortcode-hover-layer',
			'.mkdf-icon-shortcode.mkdf-square .mkdf-icon-shortcode-hover-layer',
			'.mkdf-process-holder .mkdf-process-circle',
			'.mkdf-process-holder .mkdf-process-line',
			'.mkdf-progress-bar .mkdf-pb-content-holder .mkdf-pb-content',
			'.mkdf-tabs.mkdf-tabs-standard .mkdf-tabs-nav li.ui-state-active a',
			'.mkdf-tabs.mkdf-tabs-standard .mkdf-tabs-nav li.ui-state-hover a',
			'.mkdf-tabs.mkdf-tabs-boxed .mkdf-tabs-nav li.ui-state-active a',
			'.mkdf-tabs.mkdf-tabs-boxed .mkdf-tabs-nav li.ui-state-hover a',
			'.mkdf-video-button-holder .mkdf-video-button-play',
			'#ui-datepicker-div .ui-datepicker-header',
			'.mkdf-tours-booking-form-holder .mkdf-tours-check-availability:hover',
			'.mkdf-tour-item-label',
			'.mkdf-tours-list-item .mkdf-tours-list-item-bottom-content',
			'.mkdf-tours-standard-item .mkdf-tours-standard-item-bottom-content',
			'.mkdf-tour-reviews-display-wrapper .mkdf-tour-reviews-display-right .mkdf-tour-reviews-bar-holder .mkdf-tour-reviews-bar-progress',
			'.mkdf-tours-search-main-filters-holder .mkdf-tours-range-input',
			'.mkdf-tours-search-main-filters-holder .mkdf-tours-range-input .noUi-connect',
			'.mkdf-tours-search-main-filters-holder .mkdf-tours-range-input .noUi-handle',
			'.tt-suggestion.tt-cursor',
			'.tt-suggestion:hover',
			'.mkdf-tour-item-single-holder .mkdf-tour-item-section .mkdf-route-id',
			'form.searchform .input-holder button'
        );


        $woo_background_color_selector = array();
        if(roam_mikado_is_woocommerce_installed()) {
            $woo_background_color_selector = array(
				'div.woocommerce .wc-forward:not(.added_to_cart):not(.checkout-button)',
				'div.woocommerce a.added_to_cart',
				'div.woocommerce a.button',
				'div.woocommerce button[type=submit]:not(.mkdf-woo-search-widget-button)',
				'div.woocommerce input[type=submit]',
				'.mkdf-shopping-cart-holder .mkdf-header-cart .mkdf-cart-count',
				'.widget.woocommerce.widget_price_filter .price_slider_wrapper .ui-widget-content .ui-slider-handle',
				'.widget.woocommerce.widget_price_filter .price_slider_wrapper .ui-widget-content .ui-slider-range',
				'.widget.woocommerce.widget_product_search .woocommerce-product-search button',
				'.mkdf-plc-holder .mkdf-plc-item .mkdf-plc-add-to-cart.mkdf-default-skin .added_to_cart',
				'.mkdf-plc-holder .mkdf-plc-item .mkdf-plc-add-to-cart.mkdf-default-skin .button',
				'.mkdf-plc-holder .mkdf-plc-item .mkdf-plc-add-to-cart.mkdf-light-skin .added_to_cart:hover',
				'.mkdf-plc-holder .mkdf-plc-item .mkdf-plc-add-to-cart.mkdf-light-skin .button:hover',
				'.mkdf-plc-holder .mkdf-plc-item .mkdf-plc-add-to-cart.mkdf-dark-skin .added_to_cart:hover',
				'.mkdf-plc-holder .mkdf-plc-item .mkdf-plc-add-to-cart.mkdf-dark-skin .button:hover',
				'.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-text-inner .mkdf-pli-add-to-cart.mkdf-default-skin .added_to_cart',
				'.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-text-inner .mkdf-pli-add-to-cart.mkdf-default-skin .button',
				'.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-text-inner .mkdf-pli-add-to-cart.mkdf-light-skin .added_to_cart:hover',
				'.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-text-inner .mkdf-pli-add-to-cart.mkdf-light-skin .button:hover',
				'.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-text-inner .mkdf-pli-add-to-cart.mkdf-dark-skin .added_to_cart:hover',
				'.mkdf-pl-holder .mkdf-pli-inner .mkdf-pli-text-inner .mkdf-pli-add-to-cart.mkdf-dark-skin .button:hover',
				'.mkdf-woo-pl-info-below-image .mkdf-pl-main-holder ul.products>.product .added_to_cart',
				'.mkdf-woo-pl-info-below-image .mkdf-pl-main-holder ul.products>.product .button',
            );
        }

        $background_color_selector = array_merge($background_color_selector, $woo_background_color_selector);

        $background_color_no_space_selector = array(
			'.mkdf-header-tabbed .mkdf-page-header .mkdf-menu-area .mkdf-header-tabbed-left',
            '.woocommerce-page .mkdf-content .wc-forward:not(.added_to_cart):not(.checkout-button)',
			'.woocommerce-page .mkdf-content a.added_to_cart',
			'.woocommerce-page .mkdf-content a.button',
			'.woocommerce-page .mkdf-content button[type=submit]:not(.mkdf-woo-search-widget-button)',
			'.woocommerce-page .mkdf-content input[type=submit]',
    	);

        $background_color_important_selector = array(
        	'.mkdf-btn.mkdf-btn-outline:not(.mkdf-btn-custom-hover-bg):hover',
    	);

        $color_selector = array(
        	'a:hover',
			'h1 a:hover',
			'h2 a:hover',
			'h3 a:hover',
			'h4 a:hover',
			'h5 a:hover',
			'h6 a:hover',
			'p a:hover',
			'blockquote:before',
			'.mkdf-comment-holder .mkdf-comment-text .comment-edit-link:hover',
			'.mkdf-comment-holder .mkdf-comment-text .comment-reply-link:hover',
			'.mkdf-comment-holder .mkdf-comment-text .replay:hover',
			'.mkdf-comment-holder .mkdf-comment-text .comment-reply-link:before',
			'.mkdf-comment-holder .mkdf-comment-text #cancel-comment-reply-link',
			'input.wpcf7-form-control.wpcf7-submit',
			'.mkdf-owl-slider .owl-nav .owl-next',
			'.mkdf-owl-slider .owl-nav .owl-prev',
			'.mkdf-owl-slider-style .owl-nav .owl-next',
			'.mkdf-owl-slider-style .owl-nav .owl-prev',
			'footer .widget ul li a:hover',
			'footer .widget.widget_archive ul li a:hover',
			'footer .widget.widget_categories ul li a:hover',
			'footer .widget.widget_meta ul li a:hover',
			'footer .widget.widget_nav_menu ul li a:hover',
			'footer .widget.widget_pages ul li a:hover',
			'footer .widget.widget_recent_entries ul li a:hover',
			'footer .widget #wp-calendar tfoot a:hover',
			'footer .widget.widget_tag_cloud a:hover',
			'.mkdf-side-menu .widget ul li a:hover',
			'.mkdf-side-menu .widget.widget_archive ul li a:hover',
			'.mkdf-side-menu .widget.widget_categories ul li a:hover',
			'.mkdf-side-menu .widget.widget_meta ul li a:hover',
			'.mkdf-side-menu .widget.widget_nav_menu ul li a:hover',
			'.mkdf-side-menu .widget.widget_pages ul li a:hover',
			'.mkdf-side-menu .widget.widget_recent_entries ul li a:hover',
			'.mkdf-side-menu .widget #wp-calendar tfoot a:hover',
			'.mkdf-side-menu .widget.widget_tag_cloud a:hover',
			'.wpb_widgetised_column .widget ul li a:hover',
			'.wpb_widgetised_column .widget.widget_archive ul li a:hover',
			'.wpb_widgetised_column .widget.widget_categories ul li a:hover',
			'.wpb_widgetised_column .widget.widget_meta ul li a:hover',
			'.wpb_widgetised_column .widget.widget_nav_menu ul li a:hover',
			'.wpb_widgetised_column .widget.widget_pages ul li a:hover',
			'.wpb_widgetised_column .widget.widget_recent_entries ul li a:hover',
			'aside.mkdf-sidebar .widget ul li a:hover',
			'aside.mkdf-sidebar .widget.widget_archive ul li a:hover',
			'aside.mkdf-sidebar .widget.widget_categories ul li a:hover',
			'aside.mkdf-sidebar .widget.widget_meta ul li a:hover',
			'aside.mkdf-sidebar .widget.widget_nav_menu ul li a:hover',
			'aside.mkdf-sidebar .widget.widget_pages ul li a:hover',
			'aside.mkdf-sidebar .widget.widget_recent_entries ul li a:hover',
			'.wpb_widgetised_column .widget #wp-calendar tfoot a',
			'.wpb_widgetised_column .widget #wp-calendar tfoot a:hover',
			'aside.mkdf-sidebar .widget #wp-calendar tfoot a',
			'aside.mkdf-sidebar .widget #wp-calendar tfoot a:hover',
			'.wpb_widgetised_column .widget.widget_tag_cloud a:hover',
			'aside.mkdf-sidebar .widget.widget_tag_cloud a:hover',
			'.widget.widget_rss .mkdf-widget-title .rsswidget:hover',
			'.widget.widget_search button:hover',
			'.mkdf-page-footer .widget a:hover',
			'.mkdf-side-menu .widget a:hover',
			'.mkdf-page-footer .widget.widget_rss .mkdf-footer-widget-title .rsswidget:hover',
			'.mkdf-side-menu .widget.widget_rss .mkdf-footer-widget-title .rsswidget:hover',
			'.mkdf-page-footer .widget.widget_search button:hover',
			'.mkdf-side-menu .widget.widget_search button:hover',
			'.mkdf-page-footer .widget.widget_tag_cloud a:hover',
			'.mkdf-side-menu .widget.widget_tag_cloud a:hover',
			'.mkdf-top-bar a:hover',
			'.mkdf-icon-widget-holder',
			'.mkdf-icon-widget-holder.mkdf-link-with-href:hover .mkdf-icon-text',
			'.widget.widget_mkdf_twitter_widget .mkdf-twitter-widget.mkdf-twitter-standard li .mkdf-twitter-icon',
			'.widget ul li a:hover',
			'.widget.widget_archive ul li a:hover',
			'.widget.widget_categories ul li a:hover',
			'.widget.widget_meta ul li a:hover',
			'.widget.widget_nav_menu ul li a:hover',
			'.widget.widget_pages ul li a:hover',
			'.widget.widget_recent_entries ul li a:hover',
			'.widget #wp-calendar tfoot a',
			'.widget #wp-calendar tfoot a:hover',
			'.widget.widget_tag_cloud a:hover',
			'.widget.widget_mkdf_twitter_widget .mkdf-twitter-widget.mkdf-twitter-slider li .mkdf-tweet-text a',
			'.widget.widget_mkdf_twitter_widget .mkdf-twitter-widget.mkdf-twitter-slider li .mkdf-tweet-text span',
			'.widget.widget_mkdf_twitter_widget .mkdf-twitter-widget.mkdf-twitter-standard li .mkdf-tweet-text a:hover',
			'.widget.widget_mkdf_twitter_widget .mkdf-twitter-widget.mkdf-twitter-slider li .mkdf-twitter-icon i',
			'.mkdf-blog-holder article.sticky .mkdf-post-title a',
			'.mkdf-blog-holder.mkdf-blog-masonry article .mkdf-post-info>div a:hover',
			'.mkdf-blog-holder.mkdf-blog-masonry article .mkdf-post-info>div.mkdf-blog-like .liked i',
			'.mkdf-blog-holder.mkdf-blog-masonry article .mkdf-post-info-bottom .mkdf-post-info-bottom-left>div a:hover',
			'.mkdf-blog-holder.mkdf-blog-masonry article .mkdf-post-info-bottom .mkdf-post-info-bottom-left>div.mkdf-blog-like .liked i',
			'.mkdf-blog-holder.mkdf-blog-masonry article .mkdf-post-info-bottom .mkdf-post-info-author a:hover',
			'.mkdf-blog-holder.mkdf-blog-masonry article .mkdf-post-info-bottom .mkdf-blog-like:hover i:first-child',
			'.mkdf-blog-holder.mkdf-blog-masonry article .mkdf-post-info-bottom .mkdf-blog-like:hover span:first-child',
			'.mkdf-blog-holder.mkdf-blog-masonry article .mkdf-post-info-bottom .mkdf-post-info-comments-holder:hover span:first-child',
			'.mkdf-blog-holder.mkdf-blog-standard-date-on-side article .mkdf-post-title a:hover',
			'.mkdf-blog-holder.mkdf-blog-standard-date-on-side article .mkdf-post-info>div a:hover',
			'.mkdf-blog-holder.mkdf-blog-standard-date-on-side article .mkdf-post-info>div.mkdf-blog-like .liked i',
			'.mkdf-blog-holder.mkdf-blog-standard-date-on-side article .mkdf-post-info-bottom .mkdf-post-info-bottom-left>div a:hover',
			'.mkdf-blog-holder.mkdf-blog-standard-date-on-side article .mkdf-post-info-bottom .mkdf-post-info-bottom-left>div.mkdf-blog-like .liked i',
			'.mkdf-blog-holder.mkdf-blog-standard article .mkdf-post-info>div a:hover',
			'.mkdf-blog-holder.mkdf-blog-standard article .mkdf-post-info>div.mkdf-blog-like .liked i',
			'.mkdf-blog-holder.mkdf-blog-standard article .mkdf-post-info-bottom .mkdf-post-info-bottom-left>div a:hover',
			'.mkdf-blog-holder.mkdf-blog-standard article .mkdf-post-info-bottom .mkdf-post-info-bottom-left>div.mkdf-blog-like .liked i',
			'.mkdf-blog-holder.mkdf-blog-standard article .mkdf-post-info-bottom .mkdf-post-info-author a:hover',
			'.mkdf-author-description .mkdf-author-description-text-holder .mkdf-author-name a:hover',
			'.mkdf-author-description .mkdf-author-description-text-holder .mkdf-author-social-icons a:hover',
			'.mkdf-bl-standard-pagination ul li.mkdf-bl-pag-active a',
			'.mkdf-blog-pagination ul li a.mkdf-pag-active',
			'.mkdf-blog-single-navigation .mkdf-blog-single-next:hover',
			'.mkdf-blog-single-navigation .mkdf-blog-single-prev:hover',
			'.mkdf-blog-list-holder .mkdf-bli-info>div a:hover',
			'.mkdf-blog-holder.mkdf-blog-single article .mkdf-post-info-bottom .mkdf-post-info-bottom-left>div.mkdf-blog-like .liked i',
			'.mkdf-blog-holder.mkdf-blog-single article.format-link .mkdf-post-info>div a:hover',
			'.mkdf-blog-holder.mkdf-blog-single article.format-quote .mkdf-post-info>div a:hover',
			'.mkdf-blog-holder.mkdf-blog-single article.format-link .mkdf-post-info>div.mkdf-blog-like .liked i',
			'.mkdf-blog-holder.mkdf-blog-single article.format-quote .mkdf-post-info>div.mkdf-blog-like .liked i',
			'.mkdf-main-menu ul li a:hover',
			'.mkdf-main-menu>ul>li.mkdf-active-item>a',
			'.mkdf-drop-down .second .inner ul li.current-menu-ancestor>a',
			'.mkdf-drop-down .second .inner ul li.current-menu-item>a',
			'.mkdf-drop-down .wide .second .inner>ul>li.current-menu-ancestor>a',
			'.mkdf-drop-down .wide .second .inner>ul>li.current-menu-item>a',
			'.mkdf-drop-down .wide .second .inner>ul>li>a',
			'.mkdf-fullscreen-menu-opener.mkdf-fm-opened',
			'nav.mkdf-fullscreen-menu ul li ul li.current-menu-ancestor>a',
			'nav.mkdf-fullscreen-menu ul li ul li.current-menu-item>a',
			'nav.mkdf-fullscreen-menu>ul>li.mkdf-active-item>a',
			'.mkdf-mobile-header .mkdf-mobile-menu-opener.mkdf-mobile-menu-opened a',
			'.mkdf-mobile-header .mkdf-mobile-nav .mkdf-grid>ul>li.mkdf-active-item>a',
			'.mkdf-mobile-header .mkdf-mobile-nav ul li a:hover',
			'.mkdf-mobile-header .mkdf-mobile-nav ul li h6:hover',
			'.mkdf-mobile-header .mkdf-mobile-nav ul ul li.current-menu-ancestor>a',
			'.mkdf-mobile-header .mkdf-mobile-nav ul ul li.current-menu-item>a',
			'.mkdf-search-page-holder article.sticky .mkdf-post-title a',
			'.mkdf-search-cover .mkdf-search-close a:hover',
			'.mkdf-side-menu-button-opener.opened',
			'.mkdf-side-menu-button-opener:hover',
			'.mkdf-side-menu a.mkdf-close-side-menu:hover',
			'.mkdf-team.info-hover .mkdf-icon-shortcode a:hover span',
			'.mkdf-team-single-holder .mkdf-icon-shortcode a:hover',
			'.mkdf-testimonials-holder.mkdf-testimonials-standard .mkdf-testimonial-author .mkdf-testimonials-author-name',
			'.mkdf-banner-holder .mkdf-single-banner-holder .mkdf-banner-link-text .mkdf-banner-link-hover span',
			'.mkdf-btn.mkdf-btn-simple',
			'.mkdf-btn.mkdf-btn-outline',
			'.mkdf-section-title-holder .mkdf-st-subtitle',
			'.mkdf-social-share-holder.mkdf-list li a:hover',
			'.mkdf-social-share-holder.mkdf-dropdown .mkdf-social-share-dropdown-opener:hover',
			'#ui-datepicker-div .ui-datepicker-calendar td a',
			'.mkdf-tours-booking-form-holder .mkdf-tour-message-success',
			'.mkdf-tours-my-booking-item .mkdf-tours-info-items .mkdf-tours-booking-price',
			'.mkdf-tours-checkout-content-inner .mkdf-tours-info-holder .mkdf-tours-info-message',
			'.mkdf-tours-checkout-content-inner .mkdf-tours-info-holder .mkdf-tours-booking-price',
			'.mkdf-tours-list-holder .mkdf-tour-list-filter-item.mkdf-tour-list-current-filter a',
			'.mkdf-tours-price-holder',
			'.mkdf-tours-input-icon',
			'.mkdf-tour-item-rating-stars-holder .mkdf-tour-reviews-star',
			'.mkdf-tours-pagination ul li.active',
			'.mkdf-tours-gallery-item .mkdf-tours-gallery-item-destination-holder',
			'.mkdf-tour-reviews-criteria-holder .mkdf-tour-reviews-rating-holder',
			'.mkdf-tour-reviews-display-wrapper .mkdf-tour-review-subtitle',
			'.mkdf-tour-reviews-display-wrapper .mkdf-tour-reviews-average-rating',
			'.mkdf-tours-search-main-filters-holder input[type=checkbox]:checked+label:before',
			'.mkdf-search-ordering-holder .mkdf-search-ordering-list li.mkdf-search-ordering-item-active',
			'.mkdf-search-ordering-holder .mkdf-search-ordering-list li a:hover',
			'.mkdf-tours-filter-horizontal .mkdf-tours-filter-button:hover',
			'.mkdf-tour-item-single-holder .mkdf-single-tour-nav-holder .mkdf-tour-tabs-nav li a:hover',
			'.mkdf-tour-item-single-holder .mkdf-single-tour-nav-holder .mkdf-tour-tabs-nav li.mkdf-active-item',
			'.mkdf-tour-item-single-holder .mkdf-single-tour-nav-holder .mkdf-tour-tabs-nav li.mkdf-active-item a',
			'.mkdf-tour-item-single-holder article .mkdf-tour-item-price-holder .mkdf-tour-item-price-text',
			'.mkdf-tour-item-single-holder article .mkdf-tour-main-info-holder li.mkdf-tours-checked-attributes .mkdf-tour-main-info-attr:before',
			'.mkdf-tour-item-single-holder article .mkdf-tour-main-info-holder li.mkdf-tours-unchecked-attributes .mkdf-tour-main-info-attr:before',
			'.mkdf-tour-item-single-holder .mkdf-tour-gallery-item-holder .mkdf-tour-gallery-item-subtitle',
			'.mkdf-tour-item-single-holder .mkdf-location-part .mkdf-location-excerpt',
        );

        $woo_color_selector = array();
        if(roam_mikado_is_woocommerce_installed()) {
            $woo_color_selector = array(
                '.woocommerce-pagination .page-numbers li a.current',
				'.woocommerce-pagination .page-numbers li a:hover',
				'.woocommerce-pagination .page-numbers li span.current',
				'.woocommerce-pagination .page-numbers li span:hover',
				'div.woocommerce .mkdf-quantity-buttons .mkdf-quantity-minus:hover',
				'div.woocommerce .mkdf-quantity-buttons .mkdf-quantity-plus:hover',
				'.woocommerce .star-rating',
				'ul.products>.product .price',
				'.mkdf-shopping-cart-dropdown .mkdf-item-info-holder .remove:hover',
				'.mkdf-shopping-cart-dropdown .mkdf-cart-bottom .mkdf-btn-holder .view-cart:before',
				'.mkdf-shopping-cart-dropdown .mkdf-cart-bottom .mkdf-btn-holder .checkout:before',
				'.widget.woocommerce.widget_layered_nav ul li a:hover',
				'.widget.woocommerce.widget_layered_nav_filters ul li a:hover',
				'.widget.woocommerce.widget_product_categories ul li a:hover',
				'.widget.woocommerce.widget_products ul li a:hover',
				'.widget.woocommerce.widget_rating_filter ul li a:hover',
				'.widget.woocommerce.widget_recent_reviews ul li a:hover',
				'.widget.woocommerce.widget_recently_viewed_products ul li a:hover',
				'.widget.woocommerce.widget_shopping_cart ul li a:hover',
				'.widget.woocommerce.widget_top_rated_products ul li a:hover',
				'.widget.woocommerce.widget_layered_nav ul li.chosen a',
				'.widget.woocommerce.widget_products ul li .amount',
				'.widget.woocommerce.widget_recently_viewed_products ul li .amount',
				'.widget.woocommerce.widget_top_rated_products ul li .amount',
				'.widget.woocommerce.widget_products ul li ins',
				'.widget.woocommerce.widget_recent_reviews ul li ins',
				'.widget.woocommerce.widget_recently_viewed_products ul li ins',
				'.widget.woocommerce.widget_top_rated_products ul li ins',
				'.mkdf-shopping-cart-dropdown .mkdf-cart-bottom .mkdf-btn-holder .checkout:hover',
				'.mkdf-shopping-cart-dropdown .mkdf-cart-bottom .mkdf-btn-holder .view-cart:hover'
            );
        }

        $color_selector = array_merge($color_selector, $woo_color_selector);

        $color_no_space_selector = array(        	
			'.mkdf-header-vertical .mkdf-vertical-menu ul li a:hover',
			'.mkdf-header-vertical .mkdf-vertical-menu ul li.current-menu-ancestor>a',
			'.mkdf-header-vertical .mkdf-vertical-menu ul li.current-menu-item>a',
			'.mkdf-header-vertical .mkdf-vertical-menu ul li.current_page_item>a',
			'.mkdf-header-vertical .mkdf-vertical-menu ul li.mkdf-active-item>a',
			'.woocommerce-page .mkdf-content .mkdf-quantity-buttons .mkdf-quantity-minus:hover',
			'.woocommerce-page .mkdf-content .mkdf-quantity-buttons .mkdf-quantity-plus:hover',
			'.mkdf-woo-single-page .mkdf-single-product-summary .price',
			'.mkdf-woo-single-page .mkdf-single-product-summary .product_meta>span a:hover',
			'.mkdf-woo-single-page .woocommerce-tabs ul.tabs>li.active a',
			'.mkdf-woo-single-page .related.products .product .added_to_cart',
			'.mkdf-woo-single-page .related.products .product .button',
			'.mkdf-woo-single-page .upsells.products .product .added_to_cart',
			'.mkdf-woo-single-page .upsells.products .product .button',
    	);

        $color_important_no_space_selector = array(
        	'.mkdf-dark-header.mkdf-header-vertical .mkdf-vertical-menu ul li a:hover',
			'.mkdf-dark-header.mkdf-header-vertical .mkdf-vertical-menu ul li ul li.current-menu-ancestor>a',
			'.mkdf-dark-header.mkdf-header-vertical .mkdf-vertical-menu ul li ul li.current-menu-item>a',
			'.mkdf-dark-header.mkdf-header-vertical .mkdf-vertical-menu ul li ul li.current_page_item>a',
			'.mkdf-dark-header.mkdf-header-vertical .mkdf-vertical-menu>ul>li.current-menu-ancestor>a',
			'.mkdf-dark-header.mkdf-header-vertical .mkdf-vertical-menu>ul>li.mkdf-active-item>a',
        );

        $border_color_selector = array(
            '.mkdf-st-loader .pulse_circles .ball',
			'.mkdf-owl-slider .owl-dots .owl-dot.active span',
			'.mkdf-owl-slider .owl-dots .owl-dot:hover span',
			'.mkdf-owl-slider-style .owl-dots .owl-dot.active span',
			'.mkdf-owl-slider-style .owl-dots .owl-dot:hover span',
			'footer .widget.widget_search .input-holder',
			'.mkdf-side-menu .widget.widget_search .input-holder',
			'.wpb_widgetised_column .widget.widget_search .input-holder',
			'aside.mkdf-sidebar .widget.widget_search .input-holder',
			'.mkdf-page-footer .widget.widget_nav_menu ul li a:before',
			'.mkdf-side-menu .widget.widget_nav_menu ul li a:before',
			'.widget.widget_search .input-holder',
			'.mkdf-btn.mkdf-btn-outline',
			'.mkdf-drop-down .wide .second .inner>ul>li',
			'.mkdf-tours-booking-form-holder .mkdf-tours-check-availability:hover',
			'form.searchform .input-holder',
        );

        $woo_border_color_selector = array();
        if(roam_mikado_is_woocommerce_installed()) {
            $woo_border_color_selector = array(
				'.widget.woocommerce.widget_product_search .woocommerce-product-search>div',
				'.mkdf-shopping-cart-dropdown .mkdf-cart-bottom .mkdf-subtotal-holder:after'
            );
        }

        $border_color_selector = array_merge($border_color_selector, $woo_border_color_selector);

        $border_color_no_space_selector = array(
            '.mkdf-woocommerce-page .select2-container--default .select2-selection--single',
    	);

        $border_color_important_selector = array(
        	'.mkdf-btn.mkdf-btn-outline:not(.mkdf-btn-custom-border-hover):hover',
    	);

        return array('background-color' => $background_color_selector, 'background-color-no-space' => $background_color_no_space_selector, 'background-color-important' => $background_color_important_selector,'color' => $color_selector, 'color-no-space' => $color_no_space_selector, 'color-important-no-space' => $color_important_no_space_selector,'border' => $border_color_selector, 'border-no-space' => $border_color_no_space_selector, 'border-important' => $border_color_important_selector);

    }

}


if(!function_exists('roam_mikado_add_prefix_to_first_color_selectors')) {

    function roam_mikado_add_prefix_to_first_color_selectors($value) {

        $id = roam_mikado_get_page_id();

        $prefix = roam_mikado_get_unique_page_class($id);

        return $value = $prefix . ' '. $value;
    }
}

if(!function_exists('roam_mikado_add_prefix_to_first_color_selectors_nospace')) {

    function roam_mikado_add_prefix_to_first_color_selectors_nospace($value) {

        $id = roam_mikado_get_page_id();

        $prefix = roam_mikado_get_unique_page_class($id);

        return $value = $prefix.$value;
    }
}