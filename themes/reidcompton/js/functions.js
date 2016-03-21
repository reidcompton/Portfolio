$(document).ready(function() {
    (function(){
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
        bindEvents();
        bindEscape();
    })();

    function bindEvents() {
        $(window).scroll(function(){
            if ($(this).scrollTop() > 0) {
                $('#masthead').css('background','rgba(44, 44, 44, 0.8)');
                if($('body').hasClass('page-id-25')) 
                    animateSkills();
            } else {
                $('#masthead').css('background','');
            }
        });
        $('.samples').hover(function(){
            $(this).parent().addClass('hover');
        }, function(){
            $(this).parent().removeClass('hover');
        });
        $('.port-lb').off('click').on('click', function(e) {
            e.preventDefault();
            openLightbox(this);
        });

        $('.lb-escape, .lb-bg').off('click').on('click', function(e){
            e.preventDefault();
            closeLightbox();
        });

        $('.menu-toggle').off('click').on('click', function(e){
            e.preventDefault();
            $('.menu-main-navigation-container').addClass('open').find('ul').append('<li class="escape"><a href="#">x</a></li>');
            bindEscape();
        });
        $('#showPlus a').off('click').on('click', function(e){
            e.preventDefault();
            $('#colophon').toggleClass('showFooter');
            $(this).children('span').toggleClass('hide');
        });
        $('.lb-slider-img').off('click').on('click', function(e){
            e.preventDefault();
            $('.lb-slider .viewport .overview li').removeClass('selected');
            $('.lb-mainImage img').attr('src', $(this).attr('data-url'));
            $(this).parent().addClass('selected');
        });
        $('.lb-prev, .lb-next').off('click').on('click', function(e){
            e.preventDefault();
            if($(this).hasClass('lb-prev')) {
                var prevUrl;
                if (!$('.lb-slider .selected').first().is(':first-child')) {
                    prevUrl = $('.lb-slider .selected').first().removeClass('selected').prev().addClass('selected').find('a').attr('data-url');
                } else {
                    $('.lb-slider li').removeClass('selected');
                    prevUrl = $('.lb-slider li:last-child').addClass('selected').find('a').attr('data-url');
                }
                $('.lb-mainImage img').attr('src', prevUrl);
            } else {
                var nextUrl;
                if (!$('.lb-slider .selected').first().is(':last-child')) {
                    nextUrl = $('.lb-slider .selected').first()
                                .removeClass('selected')
                                .next()
                                .addClass('selected')
                                .find('a')
                                .attr('data-url');
                    } else {
                        $('.lb-slider li').removeClass('selected');
                        nextUrl = $('.lb-slider li:first-child').addClass('selected').find('a').attr('data-url');
                    }

                $('.lb-mainImage img').attr('src', nextUrl);
            }
        });
        bindEscape();
    }

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
                closeLightbox();
            }
        });
    }

    function animateSkills() {
        $('.skill').each(function(e, i){
            var level = $(this).children('.skillLevel').children('span').attr('class'),
                width = level == 'high' ? '282px' : '211px';
            $(this).children('.skillLevel').children('span').animate({ 'width' : width }, 1000);
        });
    }

    if($('body').hasClass('page-template-page-photography')) {
        // run it once first
        rotatePhotographyPortfolio($('.portEntry:first'));

        $('.portEntry').hover(function(e){
            rotatePhotographyPortfolio($(this));
        });
    }

    

    function closeLightbox() {
        $('.lb, .lb-bg').addClass('hide');
        $('.lb-slider .viewport .overview').html('');
    }

    function openLightbox(image) {
        $('.lb-mainImage img').attr('src', $(image).attr('data-url'));
        $('.lb, .lb-bg').removeClass('hide');
        var imageUrls = $('#allImageUrls').attr('data-urls').split('|');
        $.each(imageUrls, function(i, o){
            if (o == $(image).attr('data-url')) {
                $('.lb-slider .viewport .overview').append('<li class="selected"><a href="#" class="lb-slider-img" style="background-image:url(' + o + '); background-position: center bottom; background-size:cover" data-url="' + o + '"></a></li>')
            } else {
                $('.lb-slider .viewport .overview').append('<li><a href="#" class="lb-slider-img" style="background-image:url(' + o + '); background-position: center bottom; background-size:cover" data-url="' + o + '"></a></li>')
            }
        });
        $('.lb-slider').tinycarousel();
        
        bindEvents();
    }

    function rotatePhotographyPortfolio(element) {
		var niceName = element.find('.hiddenNiceName').html(),
    		desc = element.find('.hiddenDescription').html();

		$('.portNiceName').html(niceName);
		$('.portDescription').html(desc);
    }   

	var width = $(window).width();

    $('#photoAccordion').AccordionImageMenu({
		 'closeDim': (width/3),
		 'openDim': (width/1.8),
		 //'width':'100%',
		 'height':500,
		 'effect': 'easeOutQuint',
		 'duration': 400,
		 'openItem': 0,
		 'position':'horizontal',
		 'fadeInTitle': false,
         'color':'#ffffff'
    });

    $('#about-carousel').tinycarousel();


});