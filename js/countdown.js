 
(function ( $ ) {
	
		 
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

		    html+='<div class="rd-countdown-container  rd-font-medium rd-seconds">';
		    html+='<div class="rd-countdown-container-center">';
 		    	html+='<span class="countdown-value  rd-seconds-top">'+pad(seconds)+'</span>';
		    	html+='<span class="countdown-heading rd-seconds-bottom">'+text_seconds+'</span>';
		    html+="</div>";
		    html+="</div>";

		    html+='<div class="rd-countdown-container rd-font-medium rd-minutes">';
		    html+='<div class="rd-countdown-container-center">';
 		    	html+='<span class="countdown-value   rd-minutes-top">'+pad(minutes)+'</span>';
		    	html+='<span class="countdown-heading rd-minutes-bottom">'+text_minutes+'</span>';
		    html+="</div>";
		    html+="</div>";

		    html+='<div class="rd-countdown-container  rd-font-medium  rd-hours">';
		    html+='<div class="rd-countdown-container-center">';
 		    	html+='<span class="countdown-value  rd-hours-top">'+pad(hours)+'</span>';
		    	html+='<span class="countdown-heading rd-hours-bottom">'+text_hours+'</span>';
		    html+="</div>";
		    html+="</div>";


	    if(days!=0){
		    html+='<div class="rd-countdown-container  rd-font-medium rd-days">';
		    html+='<div class="rd-countdown-container-center">';
 		    	html+='<span class="countdown-value rd-days-top">'+pad(days)+'</span>';
		    	html+='<span class="countdown-heading rd-days-bottom">'+text_days+'</span>';
		    html+="</div>";
		    html+="</div>";
		}
 
 
 

	    this.html(html);
	};

	$.fn.countdown = function() {
		var el=$(this);
		el.showclock();
		setInterval(function(){
			el.showclock();
 		},1000);
		
	}

}(jQuery));

jQuery(document).ready(function(){
 	if(jQuery(".rd-countdown").length>0){
		jQuery(".rd-countdown").each(function(){
			   jQuery(this).countdown() ;	
		})
		
	}
})