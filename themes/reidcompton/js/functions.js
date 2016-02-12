$(document).ready(function() {
    $('#fullpage').fullpage({
    	fixedElements : '#masthead',
    	navigation:true
    });

    $('#showPlus a').off('click').on('click', function(e){
    	e.preventDefault();
    	$('#colophon').toggleClass('showFooter');
    	$(this).children('span').toggleClass('hide');
    });

});