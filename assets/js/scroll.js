$(function(){
	$(document).on('click','.scroll',function(){
		var rel=$(this).attr("rel");
		if(rel=="top"){
			$('html,body').animate({scrollTop:0});
		}else if(rel=="mpoptop"){
			$('.mpopup').animate({scrollTop:0});
		}else{
			var target=$("."+rel);
			offset=target.offset();
			$('html,body').animate({scrollTop:offset.top});
		}
	});
});