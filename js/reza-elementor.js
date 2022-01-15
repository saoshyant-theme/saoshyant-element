"use strict";
(function($){
 $.fn.ssel_elementor = function(classs) {
	 
	 		 
  
	var this_element= this;
	this_element.find('.sao-opacity-hide').removeClass('sao-opacity-hide').addClass('sao-opacity-show');

 
	 
 	function rd_get_thumb_ratio(classs){ 
			classs.find('.rd-thumb img,.rd-single-thumb img').each(function(index, element) {
 				$(this).addClass('rd-thumb-full-width');
			
				var attr_width  = $(this).attr('width');
				if(attr_width > 0){
					var width_img = attr_width ;
				}else{
					var width_img = $(this).width();
				}
				
			var attr_height  = $(this).attr('height');
			if(attr_height > 0){
				var height_img = attr_height ;
			}else{
				var height_img = $(this).height();
			}
			
			
	
			var ratio = width_img/height_img;
			var ratio_img =  $(this).attr('data-img-ratio',ratio);
			$(this).removeClass('rd-thumb-full-width');
		});  
	}
	function rd_crop_resize(classs){ 
		classs.find('.rd-thumb,.rd-single-thumb').each(function(index, block) {
 			var ratio_img = $(this).find('img').attr('data-img-ratio');		    
			var width = $(this).width();
			var height = $(this).height();
 			
			var ratio = width/height;
 			if(ratio_img <= ratio ){
				$(this).removeClass('rd-ratio-vertical').addClass('rd-ratio-horizontal')
 			}else{
				$(this).removeClass('rd-ratio-horizontal').addClass('rd-ratio-vertical')
 			}
 
		});  
 	  
	}		
	function auto_width_warp(items,id){
		
		id.find('.rd-auto-width'+ items).each(function() {
 	 		if($(this).hasClass('rd-malti')){
				var widths = $(this).width() * 0.7;
			} else {
			var widths = $(this).outerWidth(false);
			}
 
			if (1400 < widths ){
				$(this).addClass('rd-1920'+ items);
			
			}else if (1200 < widths && widths <= 1400){
				$(this).addClass('rd-1400'+ items);
			
			}else if (1000 < widths && widths <= 1200){
				$(this).addClass('rd-1200'+ items);
			
			}else if (800 < widths && widths <= 1000){
				$(this).addClass('rd-1000'+ items);
			
			}else if (600 < widths && widths <= 800){
				$(this).addClass('rd-800'+ items);
				 
			}else if (500 < widths && widths <= 600){
				$(this).addClass('rd-600'+ items);
						
			}else if (400 < widths && widths <= 500){
				$(this).addClass('rd-500'+ items);
							
			}else if (300 < widths && widths <= 400){
				$(this).addClass('rd-400'+ items);
	 
			} else if (250 < widths && widths <= 300){
				$(this).addClass('rd-300'+ items);
				
			}else if (200 < widths && widths <= 250){
				$(this).addClass('rd-250'+ items);
				
			}else if ( 150 < widths && widths <= 200){
				$(this).addClass('rd-200'+ items);
				
			}else if ( 150 > widths ){
				$(this).addClass('rd-150'+ items);
				
			}		 
		});
	}
 	/***********************************************************************************************************************************************************
	Remove Auto Width Warp
	***********************************************************************************************************************************************************/	
	 
 	function remove_auto_width_warp(items,id ){
  		id.find('.rd-auto-width'+ items).each(function() {
			var widths = $(this).width();
	 
 				$(this).removeClass('rd-1920'+ items).removeClass('rd-1400'+ items).removeClass('rd-1200'+ items).removeClass('rd-1000'+ items).removeClass('rd-800'+ items).removeClass('rd-600'+ items).removeClass('rd-500'+ items).removeClass('rd-400'+ items).removeClass('rd-300'+ items).removeClass('rd-250'+ items).removeClass('rd-200'+ items).removeClass('rd-150'+ items);
	
 			
 		}); 
	}
 	function  auto_width(id ){
		remove_auto_width_warp('',id);
 		remove_auto_width_warp('-item',id);
 		remove_auto_width_warp('-warp',id);
 		remove_auto_width_warp('-post',id);	
	
		auto_width_warp('',id);   
 		auto_width_warp('-item',id);	
		auto_width_warp('-warp',id);	
		auto_width_warp('-post',id);	
		
	} 
 	
	 	function custom_slider(classs){
 
  	classs.find('.rd-custom-slider').each(function(index, block) {	
		$('.rd-custom-slider').show(); 
 
 		var data_slider = jQuery.parseJSON( $(this).find('.sao-slider-options').html());
		
		  
 		data_slider['onSliderLoad']= function ($el, scene) {
		//auto_width($el);
  			$el.parents('.rd-custom-slider').addClass('rd-show-custom-slider');
 		};
 		data_slider['onBeforeStart']= function ($el) {
			//auto_width($el);
  		} 
 		$(this).find('.sao-slider-options').parents('.rd-custom-slider').find('.rd-slider-list').sao_lightSlider(data_slider);
 		
		 auto_width($(this));
		console.log(data_slider);

 	});	
	}
	
	 
	  function EnglishTopersian(input) {
            var inputstring = input;
            var english  = ["۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹"]
            var persian = ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"]
            for (var i = 0; i < 10; i++) {
                var regex = new RegExp(persian[i], 'g');
                inputstring = inputstring.toString().replace(regex, english[i]);
            }
            return inputstring;
        }
	function pad(n) {
	    return EnglishTopersian((n < 10) ? ("0" + n) : n);
	}
	$.fn.showclock = function() {
	    
	    var currentDate=new Date();
	    var fieldDate=$(this).data('date').split('-');
	    var text_days=$(this).data('days');
	    var text_hours=$(this).data('hours');
	    var text_minutes=$(this).data('minutes');
	    var text_seconds=$(this).data('seconds');
	    var fieldTime=[0,0];
	    if($(this).data('time')!=undefined)
	    fieldTime=$(this).data('time').split(':');
	    var futureDate=new Date(fieldDate[0],fieldDate[1]-1,fieldDate[2],fieldTime[0],fieldTime[1]);
	    var seconds=futureDate.getTime() / 1000 - currentDate.getTime() / 1000;

	    if(seconds<=0 || isNaN(seconds)){
	    	this.hide();
	    	return this;
	    }

	    var days=Math.floor(seconds/86400);
	    seconds=seconds%86400;
	    
	    var hours=Math.floor(seconds/3600);
	    seconds=seconds%3600;

	    var minutes=Math.floor(seconds/60);
	    seconds=Math.floor(seconds%60);
	    
	    var html="";

		    html+='<div class="rd-countdown-container">';
		 
				if(days!=0){
  		    		html+=pad(days)+' : ';
 				}
			html+=pad(hours)+' : '+pad(minutes)+' : '+pad(seconds);
    
 
 		    html+="</div>";
		 
 
 
 

	    this.html(html);
	};

	 
	function countdown(this_element){
 		this_element.find(".rd-countdown").each(function(){
			  var el=$(this);
				el.showclock();
				 
			 setInterval(function(){
					el.showclock();
				},1000);
		});
		
	} 	
		 
	$.fn.jQuerySimpleCounter = function( options ) {
			let settings = $.extend({
				start:  0,
				end:    100,
				duration: 200,
				complete: '',
				endcrt: '',
				endcrt_rtl: ''
			}, options );
	
			const thisElement = $(this);
			//	if (thisElement.visible(true)) {
			$({count: settings.start}).animate({count: settings.end}, {
				duration: settings.duration,
				easing: settings.easing,
				step: function() {
					let mathCount = Math.ceil(this.count);
					
 						var etp=EnglishTopersian( mathCount );
					 
					 
   						thisElement.text(etp+ settings.endcrt);
					
  
  
 				},
				complete: settings.complete
			});
				 
	};	
	
	function animateCountNumber(this_element){
 		this_element.find('.rd-edit-mode.rd-count-number').each(function(index, element) {
		var	elem = $(this);
 		var number =$(this).attr('data-number');
 		var endnumber =$(this).attr('end-number');
 		var duration =  parseInt($(this).attr('data-duration'));
    		
 		
			$(this).jQuerySimpleCounter({
				start:  0,
				end:    number,
				duration: duration,
				endcrt: endnumber,
			});
 		});

	  }
		
	
	function animatePieChart(this_element){
 		this_element.find('.rd-edit-mode.rd-chart').each(function(index, element) {
			var	elem = $(this);

		var percent =$(this).attr('data-percent');
		var end_percentage =$(this).attr('end-percentage');
 		var duration =  parseInt($(this).attr('data-duration'));
 		var chart_size =  parseInt($(this).attr('data-size'));
		var chart_percent = $(this).find('.rd-chart-percent');
		
 		var percent_circle =$(this).attr('data-percent') / 100;
 		var first = $(this).find('.rd-chart-background').attr('data-bar-first');
		var second = $(this).find('.rd-chart-background').attr('data-bar-second');
		if(second == null || second ==''){
			second = first;
		}
		var size = $(this).find('.rd-chart-background').attr('data-bar-size');		
		var track = $(this).find('.rd-chart-background').attr('data-track');		
 		
	  
			$(this).find('.rd-chart-background').circleProgress({
						value: percent_circle,
						animation: {
						  duration: duration,
						  easing: 'circleProgressEasing'
						},
						emptyFill:track,
						size: chart_size,
						thickness: size,
						fill: {gradient: [first,second]}
			}) ; 
 
		
		
		
			chart_percent.jQuerySimpleCounter({
						start:  0,
						end:    percent,
						duration: duration,
						endcrt:end_percentage,
						endcrt_rtl: true,

			});
		  
	// }
	  
	  
		});	 
	}	 
	 
	function animateProgressBar(this_element) {
		this_element.find('.rd-edit-mode.rd-progress-bar-item').each(function(i, elem) {
				var	elem = $(this).find('.pro-bar');
				var percent = $(this).find('.pro-bar').attr('data-pro-bar-percent');
 				var pro_delay = $(this).find('.pro-bar').attr('data-pro-bar-delay');
				var pro_duration =  parseInt($(this).find('.pro-bar').attr('data-pro-bar-duration'));
				var count_percent = $(this).find('.rd-progress-bar-percent');

 			
				setTimeout(function() {
					elem.animate({ 'width' : percent + '%' }, pro_duration);
				}, pro_delay);
			  
				count_percent.jQuerySimpleCounter({
					start:  0,
					end: percent,
			 	duration: pro_duration,
									endcrt:'%',

 					endcrt_rtl:true
  				});
		//	}			
			
		});
	}
	 custom_slider(this_element);
 	
	

		setTimeout(function(){   
			countdown(this_element);
 		auto_width(this_element);
 		rd_get_thumb_ratio(this_element);
	 	rd_crop_resize(this_element);
				 animatePieChart(this_element);
				 animateCountNumber(this_element);
				animateProgressBar(this_element);
		},1000);   
		
		setTimeout(function(){   
			countdown(this_element);
 		auto_width(this_element);
 		rd_get_thumb_ratio(this_element);
	 	rd_crop_resize(this_element);
				 animatePieChart(this_element);
				 animateCountNumber(this_element);
				animateProgressBar(this_element);
		},2000);   		
			
	 	$('body').on('resize',this,function () { 

		countdown(this_element);
 		auto_width(this_element);
 	 	rd_get_thumb_ratio(this_element);
	 	rd_crop_resize(this_element);
	 
	});	 
	   	
			 
    
}
})(jQuery);