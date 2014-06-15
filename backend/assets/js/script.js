// Sidr is a jQuery plugin for creating side menus and the easiest way for doing your menu responsive. 
// We use it for Shortcut button, so some custom may needed to make it work properly. 
$(document).ready(function() {

    $('#sidr-log').sidr({
    	name       : 'log',
    	side       : 'left',
    	source     : '#log',
    	renaming   : false
    });

    $('#sidr-message').sidr({
    	name       : 'message',
    	side       : 'right',
    	source     : '#message',
    	renaming   : false
    });

    $('.sidr-close').click(function(e){
        $.sidr('close','log');
    	$.sidr('close','message');
    	e.preventDefault();
    });

});

$(document).ready(function(){
    $('.tip').tooltip()
});

