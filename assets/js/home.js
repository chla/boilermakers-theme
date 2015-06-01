$(function(){
	var hero=function(){
		var debug=false;
		var minWidth=1024;
		var hero,winHeight,headHeight,heroHeight,adjustHeight,minWidth;
		// RE-ADJUST HEIGHT IF WIDTH>MIN-WIDTH 
		function adjustHeight(){
			hero = $('.homehero');
			if($(window).width()>minWidth){
				headHeight = $("#header").height();
				winHeight = $(window).height();
				heroHeight = winHeight-headHeight;
				if(debug){console.log(winHeight+"-"+headHeight+"="+heroHeight)};
				hero.height(heroHeight);
			}else{
				hero.removeAttr("style");
			};
		};
		adjustHeight();
		$(window).resize(adjustHeight);
	}();
});