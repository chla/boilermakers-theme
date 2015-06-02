$(function(){
	
	var debug=false;
	var place,subject,data,postoffset,localresources;
	var localresources = $(".localresources");

	function getTerm(foo){
		foo = foo.filter(function(e){return e});
		foo = foo.pop();
		return foo;
	};
	function getData(){
		place = getTerm($(".dropdown.location").find("li:first-child a").attr("href").split("/"));
		subject = getTerm($(".dropdown.subject").find("li:first-child a").attr("href").split("/"));
		data = {
			"action": "foo",
			"place": place,
			"subject": subject,
			"offset":postoffset
		};
		return data;
	};
	function updateSearch(){
		var info = getTerm($(".dropdown.location").find("li:first-child a").attr("href").split("/"));
		if(info=='resource-location'){
			$(".filter-info").find("span.location").text('');
		}else{
			$(".filter-info").find("span.location").text(info);
		};
	};
	function check(){
		postoffset = $('#resource-results li').length;
		if(postoffset){
			if(postoffset>8){
				localresources.find('.cta').removeClass('hide');
			} else {
				localresources.find('.cta').addClass('hide');
			};
			if(postoffset<1){
				localresources.find('.noresults').removeClass('hide');
			} else {
				localresources.find('.noresults').addClass('hide');
			};
			getData(postoffset+9);
			$.get(
				loc.ajaxurl,
				data,
				success = function(response){
					if (response=='') {
						$('.loadmore').hide();
					}
				}
			);
		}
	};

	$('.dropdown a').on('click',function(e){
		
		e.preventDefault();
		
		var dropdown = $(this).parents('.dropdown');
		var ul = $(this).parents('ul');
		var li = $(this).parent('li');
		li.detach().prependTo(ul);
		
		postoffset = 0;
		getData(postoffset);
		if(debug){
			console.log(data);
		};
		$.get(
			loc.ajaxurl,
			data,
			success = function(response){
				$(".list ul").html(response);
				updateSearch();
				check();
			}
		);
		
	});
	$('.loadmore').click(function(e){
		e.preventDefault();
		postoffset = $('#resource-results li').length;
		getData(postoffset);
		if(debug){
			console.log(data);
		};
		$.get(
			loc.ajaxurl,
			data,
			success = function(response){
				if (response=='') {
					$('.loadmore').hide();
				} else {
					$(".list ul").append(response);
					check();
				}
			}
		);
	});
	$(window).load(function(){
		check();
	});

});