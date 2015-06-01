$(function(){

	$(document).on('click','.dropdown',function(e){
		$(this).toggleClass('active');
	});
	
	$(document).on('click','.dropdown a',function(e){
		var dropdown = $(this).parents('.dropdown');
		var ul = $(this).parents('ul');
		var li = $(this).parent('li');
		li.detach().prependTo(ul);
	});
	
	$(document).on('click',function(e){
		if (!$(e.target).parents().andSelf().is('.dropdown')) {
			$('.dropdown').removeClass('active');
		};
	});
	
});