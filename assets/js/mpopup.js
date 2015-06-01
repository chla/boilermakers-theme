// MPOPUP
// AUTHOR: CHARLES OLIVIER
// REQUIRE JQUERY, JQUERYUI
// V1

$(function() {
	
	function PopShow(target){
		target
		.addClass('active')
		.fadeIn({duration:500,easing:'easeInOutExpo'})
		.append('<a id="mpopDefaultClose" class="popclose btn primary">close<span class="icon-cross"></span></a>');
		$('body')
		.append('<div id="popfade"></div>')
		.find('#popfade')
		.fadeIn({duration:500,easing:'easeInOutExpo'})
		.promise()
		.done(function(){
			$('body').addClass('stop-scrolling');
		});
	};

	function PopHide(){
		$('#popfade,.mpopup')
		.fadeOut({duration:500,easing:'easeInOutExpo'})
		.promise()
		.done(function(){
			$('#popfade,#mpopDefaultClose')
			.remove();
			$('.mpopup')
			.removeClass('active')
			.removeAttr('style');
			$('body').removeClass('stop-scrolling');
		}); 
	};

	function PopPosition(target){
		if(target.hasClass('fill')){
			target.css({
				'top':0,
				'left':0,
				'height':$(window).height()
			});
		}else{
			var popMargTop='-'+((target.height()+10)/2)+'px';
			var popMargLeft='-'+((target.width()+10)/2)+'px';
			target.css({
				'margin-top':popMargTop,
				'margin-left':popMargLeft
			});
		};
	};

	$('.mpop').click(function(e){
		e.preventDefault();
		var target=$('#'+$(this).attr('rel')+'');
		PopShow(target);
		PopPosition(target);
		$('.popclose,#popfade').click(function(){
			PopHide();
		});
	});

	$(window).resize(function(){
		target=$('.mpopup.active');
		PopPosition(target);
	});

});