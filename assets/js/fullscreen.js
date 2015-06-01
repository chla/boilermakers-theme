$(function(){
	var fullscreen=function(){
		
		var winHeight,fullscreen,minWidth;
		
		minWidth=1024;
		fullscreen=$('.fullscreen');
		
		function adjustHeight(){
			if($(window).width()>minWidth){
				winHeight = $(window).height();
				fullscreen.height(winHeight);
			}else{
				fullscreen.removeAttr("style");
			}
		};
		
		adjustHeight();
		$(window).resize(adjustHeight);

	}();
});