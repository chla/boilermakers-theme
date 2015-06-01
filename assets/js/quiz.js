$(function(){
	
	var debug=true;
	
	// RESET CHECKBOX ON LOAD
	$(".wpcf7-checkbox").find("input[type='checkbox']").removeAttr("checked").each(function(){
		var checkname=$(this).attr("name");
		checkname=checkname.replace('[]','');
		$(this).attr("name",checkname);
	});
	
	// UPDATE RADIO UI
	$(".wpcf7-radio").find(".wpcf7-list-item").click(function(){
		$(this).addClass("active").siblings().removeClass("active");
		$(this).find("input[type='radio']").attr('checked','checked');
		$(this).siblings().find("input").removeAttr('checked');
	});
	
	// EVENT
	$(document).on("change",".wpcf7-checkbox .wpcf7-list-item",function(){
		$(this).toggleClass("active");
		if($(this).hasClass('active')){
			$(this).find("input[type='checkbox']").attr('checked','checked');
		}else{
			$(this).find("input[type='checkbox']").removeAttr('checked');
		}
	});
	$(document).on("click",".smoking input",function(){
		var nosmoker = $(".quitting_smoking").find("input[value='Not a Smoker']");
		if ($(this).val()=='Not at All'){
			nosmoker
			.addClass('active')
			.parent().addClass('active')
			.siblings('span').removeClass("active")
			.children('input').removeAttr('checked');
		} else {
			nosmoker
			.removeAttr("checked")
			.parent('span').removeClass("active")
		}
	});
	$(document).on("click",".quitting_smoking input",function(){
		
		var nosmoker = $(".smoking").find("input[value='Not at All']");
		
		if ($(this).val()=='Not a Smoker'){
			if(!nosmoker.parent().hasClass('active')){
				nosmoker
				.addClass('active')
				.parent().addClass('active')
				.siblings().removeClass("active")
				.children('input').removeAttr('checked');
			}
		} else {
			nosmoker
			.removeAttr('checked')
			.parent().removeClass("active");
		}
		
	});
	$(document).on("click",".health_condition input",function(){
		if ($(this).val()=='None'){
			$(this).parent('span').siblings().removeClass('active')
			.children('input').removeAttr("checked");
		} else {
			$(".health_condition").find("input[value='None']").removeAttr("checked")
			.parent("span").removeClass("active");
		};
	});
	$(document).on("click",".wpcf7-submit",function(e){

		e.preventDefault();
		var quizID,form,submit,msg;
		form=$(this).parents('form');
		submit=true;
		msg="Please finish to complete the quiz to see your result";
		quizID=$(this).attr('id');

		function quit(){
			alert(msg);
			submit=false;
		};
		function run(){
			submit=true;
		};
		function check(){
			// CHECK VAL FOR INPUT TEXT
			form.find("input[type='text']").each(function(){
				if(submit){
					if($(this).val()){
						run();
					} else {
						quit();
					};
				};
			});
			// CHECK VAL FOR RADIO
			form.find(".wpcf7-radio").each(function(){
				if(submit){
					if($(this).children(".active").length>0){
						run();
					}else{
						quit();
					};
				};
			});
			return submit;
		};
		function getFormData(form){
			var config = {};
			config.id = loc.userid;
			$(form).serializeArray().map(function(item){
			    if (config[item.name]){
			      if(typeof(config[item.name])==="string"){
			        config[item.name] = [config[item.name]];
			      }
			      config[item.name].push(item.value);
			    } else {
			      config[item.name]=item.value;
			    }
			});
			// REMOVE KEY I DON'T CARE ABOUT
			delete config["_wpcf7"];
			delete config["_wpcf7_unit_tag"];
			delete config["_wpcf7_version"];
			delete config["_wpnonce"];
			delete config["_wpcf7_locale"];
			delete config["id"];
			//
			data = {
				"action": "mquiz",
				"quizid": quizID,
				"userid": loc.userid,
				"username": loc.username,
				"useremail": loc.useremail,
				"formdata": config,
				"userdata": JSON.stringify(config)
			};
			return data;
		};
		
		if(check()){
			formdata=getFormData(form);
			if(debug){
				console.log(data);
			};
			getAnswers(data);
			getCount();
			switchtab();
			cloudify(data);
		};
		
	});
	$(document).on("click",".backToQuiz",function(){
		switchtab();
	});
	
	// QUIZ HEALTH ASSESSMENT CONDITIONAL ANSWERS
	function getAnswers(data){
		// RESET
		$(".results").find('li').removeClass('active');
		// BMA
		var heightFeet = data.formdata.feet;
		var heightInches = data.formdata.inches;
		var height = parseInt((heightFeet*12)) + parseInt(heightInches);
		var weight = data.formdata.weight;
		var BMI = (weight*703)/(height*height);
		var res = $(".results-weight");
		if(BMI<25){
			res.find(".a").addClass("active");
		}
		if(BMI>25 && BMI<29.9){
			res.find(".b").addClass("active");
		}
		if(BMI>30){
			res.find(".c").addClass("active");
		}
		if(debug){
			var grade = $(".results-weight").find(".active").attr("class").replace("active","");
			console.log("feet="+heightFeet+",inches="+heightInches+",height="+height+",weight="+weight+",BMI="+BMI);
			console.log("weight-result="+grade);
		};
		// PHYSICAL ACTIVITY
		var physical = data.formdata.weekly_physical_activity_count;
		var res = $(".results-activity");
		if(physical == "2.5+ Hours"){
			res.find(".a").addClass("active");
		}
		if(physical == "1 to 2.5 Hours"){
			res.find(".b").addClass("active");
		}
		if(physical == "0 to 1 Hours"){
			res.find(".c").addClass("active");
		}
		if(debug){
			var grade = $(".results-activity").find(".active").attr("class").replace("active","");
			console.log(physical+" of physical activity per day");
			console.log("physical activity results="+grade);
		};
		// NUTRITION
		var fastFood = data.formdata.weekly_fast_food_serving;
		var healthies = data.formdata.daily_healthy_serving_count;
		$(".results-nutrition").find(".healthies").text(healthies);
		$(".results-nutrition").find(".junk").text(fastFood);
		var res = $(".results-nutrition");
		res.find('li').removeClass("active");
		// You get at least the recommended 7 servings of fruits and vegetables every day 
		// and rarely eat fast food.
		if(fastFood=="0 - 1" && healthies=="7+") {res.find(".a").addClass("active");}
		if(fastFood=="2 - 3" && healthies=="7+") {res.find(".a").addClass("active");}
		// You get enough fruits and vegetables but should consider cutting back on fast food.
		if(fastFood=="4+" && healthies=="7+"){res.find(".b").addClass("active");}
		if(fastFood=="4+" && healthies=="5 - 6"){res.find(".b").addClass("active");}
		if(fastFood=="2 - 3" && healthies=="5 - 6"){res.find(".b").addClass("active");}
		// You could use more fruits and vegetables but do a good job staying away from fast food.
		if(fastFood=="0 - 1" && healthies=="3 - 4"){res.find(".c").addClass("active");}
		if(fastFood=="0 - 1" && healthies=="0 - 2"){res.find(".c").addClass("active");}
		if(fastFood=="2 - 3" && healthies=="3 - 4"){res.find(".c").addClass("active");}
		if(fastFood=="2 - 3" && healthies=="0 - 2"){res.find(".c").addClass("active");}
		// You could eat more veggies and cut back on the fast food.
		if(fastFood=="0 - 1" && healthies=="5 - 6"){res.find(".d").addClass("active");}
		if(fastFood=="4+" && healthies=="3 - 4"){res.find(".d").addClass("active");}
		if(fastFood=="4+" && healthies=="0 - 2"){res.find(".d").addClass("active");}
		if(debug){
			var grade = $(".results-nutrition").find(".active").attr("class").replace("active","");
			console.log("fastfood="+fastFood+",healthies="+healthies);
			console.log("eating-results="+grade);
		};
		// SMOKING
		var smoking = data.formdata.smoking;
		var thinking = data.formdata.quitting_smoking;
		var res=$(".results-smoking");
		if(smoking=="Not at All"){
			res.find(".a").addClass("active");
		} else {
			if(thinking=="Yes"){res.find(".b").addClass("active");}
			if(thinking=="No"){res.find(".c").addClass("active");}
		};
		if(debug){
			var grade = $(".results-smoking").find(".active").attr("class").replace("active","");
			console.log("how often do you smoke="+smoking+",quitting? "+thinking);
			console.log("smoking-results="+grade);
		};
		// DRINKING
		var drinking = data.formdata.weekly_alcoholic_beverages_count;
		$(".results-alcohol").find(".alcohol").text(drinking);
		if(debug){
			console.log(drinking);
		};
		var res=$(".results-alcohol");
		if(drinking=="0" || drinking=="1 - 4"){res.find(".a").addClass("active");}
		else if(drinking=="15 - 19" || drinking=="+20"){res.find(".c").addClass("active");}
		else {res.find(".b").addClass("active");};
		if(debug){
			var grade = $(".results-alcohol").find(".active").attr("class").replace("active","");
			console.log("drinking="+drinking);
			console.log("drinking-results="+grade);
		};
		// HEALTH CONDITION
		var condition=data.formdata.health_condition;
		var res=$(".results-condition");
		if (condition==='None'){
			res.find(".a").addClass("active");
		} else {
			res.find(".b").addClass("active");
		}
		if(debug){
			var grade = $(".results-condition").find(".active").attr("class").replace("active","");
			console.log("condition length="+condition.length+":"+condition);
			console.log("condition="+grade);
		};
	};
	function getCount(){
		var a = $(".a.active").length;
		var b = $(".b.active").length;
		var c = $(".c.active").length;
		var d = $(".d.active").length;
		var res = $(".heading");
		if (a>b && a>c+d){
			res.find(".a").addClass("active")
		}
		else if (b>a && b>c+d){
			res.find(".b").addClass("active")
		}
		else {
			res.find(".c").addClass("active")
		}
		if(debug){
			console.log("a="+a+",b="+b+",c="+(c+d));
		};
	};
	function switchtab(){
		var scrollHeight = $(".quiz").find(".hero").height();
		$('.mpopup').animate({scrollTop:scrollHeight},0);
		$(".TabNav > li").removeClass("disabled").toggleClass("active");
		$(".Tab > li").toggleClass("show");
	};
	function cloudify(data){
		jQuery.ajax({
			type: 'POST',
			url: loc.ajaxurl,
			data: data,
			success: function(data){
				console.log('inserted');
			}
		});
	};
	
});