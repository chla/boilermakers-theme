$(function(){

	$(document).on('click','.dropdown',function(e){
		$(this).toggleClass('active');
	});
	
	$(document).on('click',function(e){
		if (!$(e.target).parents().andSelf().is('.dropdown')) {
			$('.dropdown').removeClass('active');
		};
	});
	
});