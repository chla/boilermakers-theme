$(function() {
	
	$(".TabNav").children().each(function(){
		$(this).attr("rel","tab"+($(this).index()+1)+"");
	});

	$(".Tab").children().each(function(){
		$(this).attr("id","tab"+($(this).index()+1)+"");
	});

	$(".TabNav > li").first().addClass("active");

	$(".Tab > li").first().addClass("show");

	$(".TabNav > li").click(function() {
		if( ! $(this).hasClass('disabled') ){
			$(".TabNav > li").removeClass("active");
			$(this).addClass("active");
			$(".Tab > li").removeClass("show");
			$("#"+$(this).attr('rel')+"").addClass("show");
		};
	});
 
});