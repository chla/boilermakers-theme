$(function(){
	function ratio(){
		var ratio,rheight;
		ratio=1;
		rheight = $(".ratio").height();
		ratio = $(".ratio").attr("rel");
		$(".ratio").width(rheight*ratio);
	};
	ratio();
	$(window).resize(function(){
		ratio();
	});
});