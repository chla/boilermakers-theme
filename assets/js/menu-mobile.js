$(function(){
	$(".menu-toggle").on("click",function(){
		$("#header").toggleClass("mobile");
	});
	$(".menu-mobile").on("click",function(){
		$(".menu-item-has-children").children("a").on("click",function(e){
			e.preventDefault();
			$(this).parent("li").addClass("open");
		});
	});
});