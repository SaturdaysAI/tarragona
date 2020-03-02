(function($) {
    "use strict";

    var headerTabbed = {};
    mkdf.modules.headerTabbed = headerTabbed;
	
	headerTabbed.mkdfInitTabbedHeaderMenu = mkdfInitTabbedHeaderMenu;
	
	headerTabbed.mkdfOnDocumentReady = mkdfOnDocumentReady;
	headerTabbed.mkdfOnWindowResize = mkdfOnWindowResize;

    $(document).ready(mkdfOnDocumentReady);
    $(window).resize(mkdfOnWindowResize);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function mkdfOnDocumentReady() {
        mkdfInitTabbedHeaderMenu();
    }

    /* 
        All functions to be called on $(window).resize() should be in this function
    */
    function mkdfOnWindowResize() {
        mkdfInitTabbedHeaderMenu();
    }
    
    /**
     * Init Tabbed Header Menu
     */
    function mkdfInitTabbedHeaderMenu(){
        if(mkdf.body.hasClass('mkdf-header-tabbed')){
            var menuHeaderArea = $('.mkdf-header-tabbed-bottom .mkdf-position-left'),
                leftHeaderArea = $('.mkdf-header-tabbed-left'),
                leftHeaderAreaWidth = 0,
                logo,
                rightHeaderArea = $('.mkdf-header-tabbed-bottom .mkdf-position-right'),
                rightHeaderAreaWidgets = $('.mkdf-header-tabbed-bottom .mkdf-position-right .mkdf-position-right-inner > a'),
                headerAreaPadding = parseInt($('.mkdf-page-header .mkdf-menu-area > .mkdf-vertical-align-containers').css('padding-left'))*2; //* 2 on both side of header

            rightHeaderAreaWidgets.each(function() {
                var thisWidget = $(this);
                thisWidget.wrapAll('<div class="mkdf-right-tabbed-widgets-holder"><div class="mkdf-right-tabbed-widgets-holder-inner"></div></div>');
            });

            var rightHeaderAreaWidth = rightHeaderArea.width() + 1;

            rightHeaderArea.width(rightHeaderAreaWidth);

            leftHeaderArea.waitForImages(function(){
                logo = leftHeaderArea.find('.mkdf-logo-wrapper a');

                logo.css('width',logo.width()); //to make sure width is round
                leftHeaderAreaWidth = leftHeaderArea.width();

	            menuHeaderArea.width(Math.floor(mkdf.windowWidth - leftHeaderAreaWidth - rightHeaderAreaWidth - headerAreaPadding));
	            menuHeaderArea.css('opacity',1);
            });
        }
    }

})(jQuery);