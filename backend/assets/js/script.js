$(document).ready(function() {
    $('.tip').tooltip()
});

$(document).ready(function() {
	$('a.delete').click(function(e) {
		e.preventDefault();
		var parent = $(this).parent().parent();
	    var answer = confirm('Delete item?')
	    if (answer){	
			$.ajax({
				type 		: 'get',
				url 		: $(this).attr('href'),
				beforeSend 	: function() {
					parent.find('td').css('backgroundColor','#fb6c6c');
				},
				success 	: function(e) {
					parent.find('td').fadeOut(600,function() {
						parent.remove();
					});						
				}
			});
		}
	});

	$('.undelete').click(function(e){
		e.preventDefault();
		alert($(this).attr('title'));
	})
});