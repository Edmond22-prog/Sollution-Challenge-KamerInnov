(function ($) {
    "use strict";

    $('.color-trigger').on('click', function () {
        $(this).parent().toggleClass('switcher-palate');
    });
	
	$('.color-switcher .colors-list .theme-color').on('click', function() {
		var newThemeColor = $(this).attr('data-file');
		var targetCSSFile = $('link[id="switcher-color"]');
	   $(targetCSSFile).attr('href',newThemeColor);
	   $('.color-switcher .colors-list .theme-color').removeClass('active');
        $(this).addClass('active');
	});

	
	var layoutChangerBtn = $(".color-switcher .box-with li");
	var body = $("body");
	layoutChangerBtn.on("click", function(e) {
        var $this = $(this);
        if ( $this.hasClass("box") ) {
            body.addClass("box-layout");
        } else {
        	body.removeClass("box-layout");
    	};
	});


	
}(jQuery));