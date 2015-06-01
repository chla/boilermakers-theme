$(function(){
	
	if($('.content-page.calculator').length){
		$('#quiz-cost-calculator .container').detach().appendTo($('.content-page'));
	};
	
	var 
	debug
	,hasresult
	,cal
	,totalYear
	,unitCost
	,cigDay
	,costDay
	,costWeek
	,costMonth
	,costYear
	,savings; 

	debug = false;
	cal = $(".calculator").find("input.cal");
	
	// EVENT ..
	cal.on('input',function(){
		if(check()){
			if(debug){
				console.log('true');
			};
			getExp();
			showResult();
			animArrow();
		};
	});
	
	// ..CHECK IF INPUT ARE FILLED
	function check(){
		hasresult = [];
		cal.each(function(){
			if($(this).val()){
				hasresult.push("true");
			} else {
				hasresult.push("false");
			};
		});
		if(debug){
			console.log(hasresult);
		};
		if(hasresult.indexOf("false")>-1){
			return false;
		} else {
			return true;
		};
	};
	
	// ..RETURN RESULTS
	function getExp(){
		totalYear = $("#unit-yea").val();
		unitCost = $("#unit-pac").val()/25;
		cigDay = $("#unit-cig").val();
		costDay=unitCost*cigDay;
		costWeek=costDay*7;
		costMonth=costDay*31;
		costYear=costDay*365;
		savings=totalYear*costYear;
		if(debug){
			console.log("unitCost = "+unitCost);
			console.log("costDay = "+cigDay);
			console.log("costDay = "+costDay);
			console.log("costWeek = "+costWeek);
			console.log("costMonth = "+costMonth);
			console.log("costYear = "+costYear);
			console.log("savings = "+savings);
		};
		$("#costWeek").text(costWeek.toFixed(2));
		$("#costMonth").text(costMonth.toFixed(2));
		$("#costYear").text(costYear.toFixed(2));
		$("#savings").text(savings.toFixed(2));
	};


	
});