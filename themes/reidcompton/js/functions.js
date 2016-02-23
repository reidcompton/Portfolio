$(document).ready(function() {
    $('#fullpage').fullpage({
    	fixedElements : '#masthead',
    	navigation:true,
    	onLeave: function(index, nextIndex, direction) {
    		if (!$('body').hasClass('.home')) {
				if (nextIndex > 1) {
					$('#masthead').css('background','rgba(44, 44, 44, 0.8)');
				} else {
					$('#masthead').css('background','');
				}
		    }
    	}
    });

    $('.menu-toggle').off('click').on('click', function(e){
    	e.preventDefault();
    	$('.menu-main-navigation-container').addClass('open').find('ul').append('<li class="escape"><a href="#">x</a></li>');
        bindEscape();
    });

    function bindEscape() {
        $('.escape').off('click').on('click', function(e){
            e.preventDefault();
            $('.menu-main-navigation-container').removeClass('open');
            $(this).remove();
        });
        $(document).keypress(function(e) { 
            if (e.keyCode == 27) {
                $('.menu-main-navigation-container').removeClass('open');
                $('.escape').remove();
            }
        });
    }

    $('#showPlus a').off('click').on('click', function(e){
    	e.preventDefault();
    	$('#colophon').toggleClass('showFooter');
    	$(this).children('span').toggleClass('hide');
    });

    // run it once first
    rotatePhotographyPortfolio($('.portEntry:first'));

    $('.portEntry').hover(function(e){
    	rotatePhotographyPortfolio($(this));
    });

    function rotatePhotographyPortfolio(element) {
		var niceName = element.find('.hiddenNiceName').html(),
    		desc = element.find('.hiddenDescription').html();

		$('.portNiceName').html(niceName);
		$('.portDescription').html(desc);
    }   

	var width = $(window).width();

    $('#photoAccordion').AccordionImageMenu({
		 'closeDim': (width/3),
		 'openDim': (width/1.6),
		 //'width':'100%',
		 'height':500,
		 'effect': 'easeOutQuint',
		 'duration': 400,
		 'openItem': 0,
		 'position':'horizontal',
		 'fadeInTitle': false
    });

    $('#slider1').tinycarousel();

});