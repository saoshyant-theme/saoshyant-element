jQuery(function($) {
	 	jQuery(document).ready(function($) {
 
	"use strict";
 
 
function jalali_to_gregorian(jy,jm,jd){
        var gy=(jy<=979)?621:1600;
        jy-=(jy<=979)?0:979;
        var days=(365*jy) +((parseInt(jy/33))*8) +(parseInt(((jy%33)+3)/4))
                +78 +jd +((jm<7)?(jm-1)*31:((jm-7)*30)+186);
        gy+=400*(parseInt(days/146097));
        days%=146097;
        if(days > 36524){
            gy+=100*(parseInt(--days/36524));
            days%=36524;
            if(days >= 365)days++;
        }
        gy+=4*(parseInt((days)/1461));
        days%=1461;
        gy+=parseInt((days-1)/365);
        if(days > 365)days=(days-1)%365;
        var gd=days+1;
        var sal_a=[0,31,((gy%4==0 && gy%100!=0) || (gy%400==0))?29:28,31,30,31,30,31,31,30,31,30,31];
        var gm
        for(gm=0;gm<13;gm++){
            var v=sal_a[gm];
            if(gd <= v)break;
            gd-=v;
        }
		
		
		
		if(gd < 10){
 			var number_day = '0'+ gd.toString();
		}else{
			var number_day =  gd.toString();
 		}
		if(gm < 10){
 			var number_month = '0'+ gm.toString();
		}else{
			var number_month =  gm.toString();
 		}

		
		
		
		
		
        return [gy+'-'+number_month+'-'+number_day];
    }
 
		 
	  function EnglishTopersian(input) {
		  //	if(input!==null){
            var inputstring = input;
            var english  =  ["0", "1", "2", "3", "4", "5", "6", "7", "8", "9"] ;
            var persian = ["۰", "۱", "۲", "۳", "۴", "۵", "۶", "۷", "۸", "۹"];
			 if(inputstring ===undefined){
			 }else{
             for (var i = 0; i < 10; i++) {
                var regex = new RegExp(persian[i], 'g');
                  inputstring = inputstring.toString().replace(regex, english[i]);
            }
			
            return inputstring;
			 }
			//}
			//}
		}
	
 	
	function jalali_meta(currVal){
			var main =EnglishTopersian(currVal); 
			if(main ===undefined){
			 }else{
		   		var rxDatePattern =/^(\d{4})([\/-])(\d{1,2})([\/-])(\d{1,2})$/; //Declare Regex
				var dtArray = main.match(rxDatePattern); 
				if(dtArray ===null){
				}else{
				return jalali_to_gregorian(parseInt(dtArray[1]),parseInt(dtArray[3]),parseInt(dtArray[5]));
				}
			}
	 }
	  
	  var salehtml= $( '.sale_price_dates_fields' ).html();
	  	  $('.options_group.pricing').append('<div class="old-salse">'+salehtml+'</div>');

	var price_dates_from = $( '.old-salse input[name="_sale_price_dates_from"]' ).attr('value');
	var price_dates_to = $( '.old-salse input[name="_sale_price_dates_to"]' ).attr('value');

//	 	if((price_dates_from !==undefined ) && (price_dates_to !==undefined  )){
 
	  
	  
	  
 	//if(price_dates_from !==undefined  ){
 	 $( '.sale_price_dates_fields input[name="_sale_price_dates_from"]' ).val(jalali_meta(price_dates_from));
	//}
	 
// 	if(price_dates_to !==undefined  ){

 	 $( '.sale_price_dates_fields input[name="_sale_price_dates_to"]' ).val(jalali_meta(price_dates_to));
	//}
 		//jQuery(document).on("click", ".options_group" , function(){

  	 $('.old-salse').remove();
	//	}
		//	});
	 
	 /*
	 var sale = $('[name="_sale_price_dates_to"]').attr('value');
	 alert(sale);
	  $('[name="_sale_price_dates_to"]').val(sale);*/
	
      //    alert($('[name="_sale_price_dates_from"]').val());       
  
});
 

});
 