(function($) {
    "use strict";

    var title = {};
    mkdf.modules.title = title;

    title.mkdfOnDocumentReady = mkdfOnDocumentReady;

    $(document).ready(mkdfOnDocumentReady);
    $(window).resize(mkdfOnWindowResize);
    
    /* 
        All functions to be called on $(document).ready() should be in this function
    */
    function mkdfOnDocumentReady() {
	    mkdfParallaxTitle();
	    mkdfToursTitleFullHeight();
    }

    function mkdfOnWindowResize() {
	    mkdfToursTitleFullHeight();
    }

    /*
     **	Title image with parallax effect
     */
	function mkdfParallaxTitle() {
		var parallaxBackground = $('.mkdf-title-holder.mkdf-bg-parallax');
		
		if (parallaxBackground.length > 0 && mkdf.windowWidth > 1024) {
			var parallaxBackgroundWithZoomOut = parallaxBackground.hasClass('mkdf-bg-parallax-zoom-out'),
				titleHeight = parseInt(parallaxBackground.data('height')),
				imageWidth = parseInt(parallaxBackground.data('background-width')),
				parallaxRate = titleHeight / 10000 * 7,
				parallaxYPos = -(mkdf.scroll * parallaxRate),
				adminBarHeight = mkdfGlobalVars.vars.mkdfAddForAdminBar;
			
			parallaxBackground.css({'background-position': 'center ' + (parallaxYPos + adminBarHeight) + 'px'});
			
			if (parallaxBackgroundWithZoomOut) {
				parallaxBackgroundWithZoomOut.css({'background-size': imageWidth - mkdf.scroll + 'px auto'});
			}
			
			//set position of background on window scroll
			$(window).scroll(function () {
				parallaxYPos = -(mkdf.scroll * parallaxRate);
				parallaxBackground.css({'background-position': 'center ' + (parallaxYPos + adminBarHeight) + 'px'});
				
				if (parallaxBackgroundWithZoomOut) {
					parallaxBackgroundWithZoomOut.css({'background-size': imageWidth - mkdf.scroll + 'px auto'});
				}
			});
		}
	}

    function mkdfToursTitleFullHeight() {
    	var titleArea = $('.mkdf-title-holder.mkdf-bg-full-screen'),
    		titleWrapper = titleArea.find('.mkdf-title-wrapper'),
    		content = $('.mkdf-wrapper-inner > .mkdf-content'),
    		titleAreaHeight;

    	if (titleArea.length) {
    		titleAreaHeight = mkdf.windowHeight;

    		titleAreaHeight -= content.offset().top;

    		if (mkdf.windowWidth > 1024){
	    		titleArea.css('height',titleAreaHeight);
	    		titleWrapper.css('height',titleAreaHeight);
	    	}
    	}
    }

})(jQuery);
