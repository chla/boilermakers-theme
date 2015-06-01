// SLIDER BY MIRACULOUS CODE !!
// AUTHOR: CHARLES OLIVIER
// REQUIRE JQUERY, JQUERYUI, HAMMER & JQUERYHAMMER
// V1
// slide by default fade if mfade class is added to mslider

mirslider=function(){
	
	var 
	mslider
	,play
	,playrotate
	,delay
	,speed
	,sliderTarget
	,sliderTargetRel
	,sliderSetup
	,sliderHeight
	,sliderWidth
	,sliderUl
	,sliderUlWidth
	,liCount
	,liTarget
	,liActive
	,liActiveIndex
	,liActiveRel
	,liPrefade
	,direction
	,pad
	,str
	,ans
	,type;
	
	mslider=$(".mslider");
	delay=5000; //5s
	speed=1000; //1s
	play=[];
	
	// SETUP UL/LI
	mslider.each(function(){
		sliderTarget=$(this);
		sliderUl=sliderTarget.children("ul");
		sliderTarget.attr('rel',$(this).parent().find(".mslider").index(sliderTarget));
		sliderUl.children('li').first().addClass('active');
		sliderUl.children('li').each(function(){
			var LiIndex=$(this).index();
			$(this).attr({rel:LiIndex}).addClass('li'+LiIndex+'');
		});
		sliderTarget.find('li').last().prependTo(sliderUl);
		if(sliderTarget.hasClass("mtime")){
			StartTimeOut(sliderTarget)
		};
		sliderTarget.css({opacity:1});
	});
	sliderSetup();
	// SETUP PREV/NEXT 
	mslider.each(function(){
		getTotal(sliderTarget);
		output ='<div class="prevnextnav">';
		output +='<a class="prev"><i></i></a>';
		output +='<div class="count">';
		output +='<span id="liActiveIndex">01</span>';
		output +='/';
		output +='<span id="liTotal">'+ans+'</span>';
		output +='</div>';
		output +='<a class="next"><i></i></a>';
		output +='</div>';
		$(this).append(output);
	});
	// SETUP BULLETS
	mslider.each(function(){
		sliderTarget=$(this);	
		liCount=sliderTarget.find("li").size();
		sliderTarget.append("<div class='bulletnav'></div>");
		for (var i=0;i<liCount;i++){ sliderTarget.find(".bulletnav").append("<a></a>") };
		sliderTarget.find(".bulletnav a").each(function(){$(this).attr({rel:$(this).index()});});
		sliderTarget.find(".bulletnav a").first().addClass('active');
	});
	// SETUP COUNT
	mslider.each(function(){
		slidertarget=$(this);
		liCount=sliderTarget.find("li").size();
		var str=liCount;
		formatCount(str);
	});
		
	// EVENT - PREV/NEXT CLICK
	mslider.find(".next").bind('click',nextHandler);
	mslider.find(".prev").bind('click',prevHandler);
	// EVENT - SWIPE 
	mslider.hammer().bind("panright panleft",function(ev){
		direction=ev.type;
	});
	mslider.hammer().bind("panend",function(ev){
		if(direction=="panright"){
			sliderTarget=$(this);
			sliderTargetRel=sliderTarget.attr('rel');
			if(play[sliderTargetRel]){
				clearTimeout(play[sliderTargetRel])
			};
			prevSlide(sliderTarget);
		}
		if(direction=="panleft"){
			sliderTarget=$(this);
			sliderTargetRel=sliderTarget.attr('rel');
			if(play[sliderTargetRel]){
				clearTimeout(play[sliderTargetRel]);
			};
			nextSlide(sliderTarget);
		}
	});
	// EVENT - BULLET CLICK 
	mslider.find(".bulletnav a").click(function(){
		sliderTarget=$(this).parents(".mslider");
		liTarget=$(this).attr('rel');
		liActive=sliderTarget.find("li.active");
		if(sliderTarget.hasClass("mfade")){
			liActive.addClass("prefade");
		};
		sliderTarget.find("li").removeClass("active");
		sliderTarget.find("li[rel="+liTarget+"]").addClass("active");
		sliderTargetRel=sliderTarget.attr('rel');
		if(play[sliderTargetRel]){
			clearTimeout(play[sliderTargetRel])
		};
		rotate(sliderTarget);
	});
	// EVENT - MOUSEOVER
	mslider.on("mouseover",function(){
		sliderTarget=$(this);
		sliderTargetRel=sliderTarget.attr('rel');
		if(play[sliderTargetRel]){
			clearTimeout(play[sliderTargetRel]);
		};
	});
	mslider.on("mouseout",function(){
		sliderTarget=$(this);
		if(sliderTarget.hasClass("mtime")){
			StartTimeOut(sliderTarget);
		};
	});
	// EVENT - RESIZE
	$(window).resize(function(){
		sliderSetup();
	});
	
	function prevHandler(e){
		$(this).unbind('click',prevHandler);
		setTimeout(function(){
			sliderTarget.find('.prev').bind('click',prevHandler);
		},speed);
		sliderTarget=$(this).parents(".mslider");
		sliderTargetRel=sliderTarget.attr('rel');
		if(play[sliderTargetRel]){
			clearTimeout(play[sliderTargetRel]);
		};
		prevSlide(sliderTarget);
	};
	function nextHandler(e){
		sliderTarget=$(this).parents(".mslider");
		$(this).unbind('click',nextHandler);
		setTimeout(function(){
			sliderTarget.find('.next').bind('click',nextHandler);
		},speed);
		sliderTargetRel=sliderTarget.attr('rel');
		if(play[sliderTargetRel]){
			clearTimeout(play[sliderTargetRel]);
		};
		nextSlide(sliderTarget);
	};
	function sliderSetup(){
		mslider.each(function(){
			sliderTarget=$(this);
			sliderHeight=sliderTarget.height();
			sliderWidth=sliderTarget.width();
			sliderLiCount=sliderTarget.find("li").size();
			if(sliderTarget.hasClass("mfade")){
				sliderTarget.find("li").css({
					"position":"absolute",
					"left":0,
					"top":0,
					"opacity":0,
					"z-index":0
				});
				sliderTarget.find("li.active").css({
					"opacity":"1",
					"z-index":"1"
				});
				sliderTarget.find("li").width(sliderWidth);
			}else{
				liActiveIndex=sliderTarget.find("li.active").index();
				sliderUlWidth=sliderWidth * sliderLiCount;
				sliderTarget.find("ul").width(sliderUlWidth);
				sliderTarget.find("li").width(sliderWidth);
				sliderTarget.find("ul").css({'margin-left':-liActiveIndex*sliderWidth});
			};
		});
	};
	function nextSlide(sliderTarget){
		liActive=sliderTarget.find("li.active");
		liActiveIndex=liActive.index();
		if(sliderTarget.hasClass("mfade")){
			liActive.addClass("prefade");
		};
		if(liActive.next().length){
			liActive.removeClass("active").next().addClass("active");
		};
		rotate(sliderTarget);
	};
	function prevSlide(sliderTarget){
		liActive=sliderTarget.find("li.active");
		liActiveIndex=liActive.index();
		if(sliderTarget.hasClass("mfade")){
			liActive.addClass("prefade");
		};
		if(liActive.prev().length){
			liActive.removeClass("active").prev().addClass("active");
		};
		rotate(sliderTarget);
	};
	function rotate(sliderTarget){
		liActiveRel=sliderTarget.find("li.active").attr('rel');
		sliderTarget.find(".bulletnav a[rel="+liActiveRel+"]").addClass('active').siblings().removeClass('active');
		if(sliderTarget.hasClass("mfade")){
			fade(sliderTarget);
		}else{
			slide(sliderTarget);
		};
		if(sliderTarget.hasClass("mtime")){
			StartTimeOut(sliderTarget)
		};
		getCount(sliderTarget,liActiveRel);
	};
	function StartTimeOut(sliderTarget){
		sliderTarget.addClass("initialized");
		sliderTargetRel=sliderTarget.attr('rel');
		if(play[sliderTargetRel]){clearTimeout(play[sliderTargetRel])};
		play[sliderTargetRel]=setTimeout(function(){
			nextSlide(sliderTarget);
		},delay);
	};
	function slide(sliderTarget){
		sliderWidth=sliderTarget.width();
		liActiveIndex=sliderTarget.find("li.active").index();
		sliderUl=sliderTarget.children('ul');
		sliderUl
		.animate({'margin-left':-liActiveIndex*sliderWidth},{duration:speed,easing:'easeInOutExpo'})
		.promise()
		.done(function(){
			shiftLi(sliderTarget,liActiveIndex,sliderUl);
			liActiveIndex=sliderTarget.find("li.active").index();
			sliderUl.css({'margin-left':-liActiveIndex*sliderWidth});
		});
	};
	function fade(sliderTarget){
		sliderUl=sliderTarget.children('ul');
		liPrefade=sliderTarget.find("li.prefade");
		liActive=sliderTarget.find("li.active");
		liActiveIndex=liActive.index();
		liPrefade
		.css({
			'z-index':1,
			'opacity':1
		})
		liActive
		.css({'z-index':2})
		.animate({'opacity':1},{duration:speed,easing:'easeInOutExpo'})
		.promise()
		.done(function(){
			shiftLi(sliderTarget,liActiveIndex,sliderUl);
			liPrefade.css({
				"opacity":0,
				"z-index":0
			}).removeClass('prefade');
		});
	};
	function shiftLi(sliderTarget,liActiveIndex,sliderUl){
		if(liActiveIndex==liCount-1){
			sliderTarget.find('li').first().appendTo(sliderUl);
		} else if(liActiveIndex==0){
			sliderTarget.find('li').last().prependTo(sliderUl);
		}
	};
	function getCount(sliderTarget,liActiveRel){
		str=parseInt(liActiveRel)+1;
		formatCount(str);
		sliderTarget.find("#liActiveIndex").text(ans);
	};
	function getTotal(sliderTarget){
		str=sliderTarget.find("li").size();
		formatCount(str);
	};
	function formatCount(str){
		pad="0";
		ans=pad.substring(str.length)+str;
	};
	
}();