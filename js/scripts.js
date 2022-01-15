 (function($) {
	'use strict';
	jQuery(document).ready(function() {
	 
	  	$('.widget').each(function(index, element) {
		$(this).find('.widget-warp .rd-title-box').unwrap();   
		$(this).addClass('rd-show-visibility');  
	});
	                
	 
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
 	/***********************************************************************************************************************************************************
	Image Resize
	***********************************************************************************************************************************************************/	
	function rd_get_thumb_ratio(){ 
			$('.rd-thumb img,.rd-single-thumb img').each(function(index, element) {
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

			
	
		jQuery(document).bind("change keyup mousedown keydown price_slider_create price_slider_slide mousemove mouseover", ".price_slider" , function(){
 			var from = EnglishTopersian($(this).find('.price_label .from').text());
			$(this).find('.price_label .from').text(from);
			
			var to = EnglishTopersian($(this).find('.price_label .to').text());
			$(this).find('.price_label .to').text(to);
			 
		 
			
		});
	 
	$('li .page-numbers').each(function(index, element) {
		var from = EnglishTopersian($(this).text());
		$(this).text(from);
	});
	  	 
 	/***********************************************************************************************************************************************************
	Image Crop Resize
	***********************************************************************************************************************************************************/	
	function rd_crop_resize(){ 
		$('.rd-thumb,.rd-single-thumb').each(function(index, block) {
 			var ratio_img = $(this).find('img').attr('data-img-ratio');		    
			var width = $(this).width();
			var height = $(this).height();
 			
			var ratio = width/height;
 			if(ratio_img <= ratio ){
				$(this).removeClass('rd-ratio-vertical').addClass('rd-ratio-horizontal')
				//$(this).find('img').css("width" ,"100.1%").css("min-width" ,"auto").css("height" ,"auto").css("min-height" ,"100.1%");		
			}else{
				$(this).removeClass('rd-ratio-horizontal').addClass('rd-ratio-vertical')
 				//$(this).find('img').css("width" ,"auto").css("min-width" ,"100.1%").css("height" ,"100.1%").css("min-height" ,"auto");		
			}
 
		});  
 	  
	}	
	
	function rd_img_resize(){ 
		rd_get_thumb_ratio();
  		rd_crop_resize();
	} 
 	 
	$('.rd-category-menu-warp').find('.li-depth-0.rd-menu-width-full-width').each(function(index, block) {
		var masthead_width = $('.rd-masthead').width();
		var category_width = $('.rd-category-menu').width();
		var width = masthead_width - category_width;
		$('.sub-depth-0', this).width(width);
  			 
	}); 
  
	$('.rd-nav-menu,.rd-category-menu').find('li').each(function(index, element) {
				var this_id = $(this);
                 $(this).find('.li-menu-item').each(function(index, element) {
                   if($(this).hasClass('menu-item')){
					$(this_id).addClass('rd-has-menu-item');
 				   } 
		});
 				
	});    
 
 	/***********************************************************************************************************************************************************
 	Scale
	************************************************************************************************************************************************************/	
 
   	/*!
	/**
	 * Monkey patch jQuery 1.3.1+ to add support for setting or animating CSS
	 * scale and rotation independently.
	 * https://github.com/zachstronaut/jquery-animate-css-rotate-scale
	 * Released under dual MIT/GPL license just like jQuery.
	 * 2009-2012 Zachary Johnson www.zachstronaut.com*/
  
	function initData($el) {
        var _ARS_data = $el.data('_ARS_data');
        if (!_ARS_data) {
            _ARS_data = {
                rotateUnits: 'deg',
                scale: 1,
                rotate: 0
            };
            
            $el.data('_ARS_data', _ARS_data);
        }
        
        return _ARS_data;
    }
    
    function setTransform($el, data) {
        $el.css('transform', 'rotate(' + data.rotate + data.rotateUnits + ') scale(' + data.scale + ',' + data.scale + ')');
    }
    
    $.fn.rotate = function (val) {
        var $self = $(this), m, data = initData($self);
                        
        if (typeof val == 'undefined') {
            return data.rotate + data.rotateUnits;
        }
        
        m = val.toString().match(/^(-?\d+(\.\d+)?)(.+)?$/);
        if (m) {
            if (m[3]) {
                data.rotateUnits = m[3];
            }
            
            data.rotate = m[1];
            
            setTransform($self, data);
        }
        
        return this;
    };
    
    // Note that scale is unitless.
    $.fn.scale = function (val) {
        var $self = $(this), data = initData($self);
        
        if (typeof val == 'undefined') {
            return data.scale;
        }
        
        data.scale = val;
        
        setTransform($self, data);
        
        return this;
    };

    // fx.cur() must be monkey patched because otherwise it would always
    // return 0 for current rotate and scale values
    var curProxied = $.fx.prototype.cur;
    $.fx.prototype.cur = function () {
        if (this.prop == 'rotate') {
            return parseFloat($(this.elem).rotate());
            
        } else if (this.prop == 'scale') {
            return parseFloat($(this.elem).scale());
        }
        
        return curProxied.apply(this, arguments);
    };
    
    $.fx.step.rotate = function (fx) {
        var data = initData($(fx.elem));
        $(fx.elem).rotate(fx.now + data.rotateUnits);
    };
    
    $.fx.step.scale = function (fx) {
        $(fx.elem).scale(fx.now);
    };
    
    /*
    
    Starting on line 3905 of jquery-1.3.2.js we have this code:
    
    // We need to compute starting value
    if ( unit != "px" ) {
        self.style[ name ] = (end || 1) + unit;
        start = ((end || 1) / e.cur(true)) * start;
        self.style[ name ] = start + unit;
    }
    
    This creates a problem where we cannot give units to our custom animation
    because if we do then this code will execute and because self.style[name]
    does not exist where name is our custom animation's name then e.cur(true)
    will likely return zero and create a divide by zero bug which will set
    start to NaN.
    
    The following monkey patch for animate() gets around this by storing the
    units used in the rotation definition and then stripping the units off.
    
    */
    
    var animateProxied = $.fn.animate;
    $.fn.animate = function (prop) {
        if (typeof prop['rotate'] != 'undefined') {
            var $self, data, m = prop['rotate'].toString().match(/^(([+-]=)?(-?\d+(\.\d+)?))(.+)?$/);
            if (m && m[5]) {
                $self = $(this);
                data = initData($self);
                data.rotateUnits = m[5];
            }
            
            prop['rotate'] = m[1];
        }
        
        return animateProxied.apply(this, arguments);
	
	}; 	
	
  
 	/***********************************************************************************************************************************************************
	Auto Width Warp
	***********************************************************************************************************************************************************/	
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
 	/***********************************************************************************************************************************************************
	Width Warp Resize
 	***********************************************************************************************************************************************************/
  	$(window).resize(function () { 
		auto_width($('body'));
  	});
	auto_width($('body'));
 
   
 	/***********************************************************************************************************************************************************
	Toolbar Loading
 	***********************************************************************************************************************************************************/
		
	jQuery(document).on("click", ".rd-mobilebar .rd-mobilebar-close" , function(){
			if($('body').hasClass('rtl')){
 				$(".rd-mobilebar-middle").animate({right: '-100%'},500, function() {
					$('.rd-mobilebar').removeClass('rd-mobilebar-active').removeClass('rd-dropdown-dark').removeClass('rd-dropdown-light');
					 $(".rd-mobilebar-container,.rd-cart-container").remove();
	
   				});
			}else{
				$(".rd-mobilebar-middle").animate({left: '-100%'},500, function() {
				$('.rd-mobilebar').removeClass('rd-mobilebar-active').removeClass('rd-dropdown-dark').removeClass('rd-dropdown-light');
				 $(".rd-mobilebar-container,.rd-cart-container").remove();
	
   				});
			}
  
	});
 	function mobilebar_loading(main){
				$('.rd-mobilebar').addClass('rd-mobilebar-active');
				
			if($('body').hasClass('rtl')){
				$(".rd-mobilebar-middle").animate({right: '0'});

			}else{
				$(".rd-mobilebar-middle").animate({left: '0'});

			}
			 				var logo_attr = $('.rd-logo').attr('class');
				var logo_html = $('.rd-logo').html();
 				var social_attr = $('header .rd-social').attr('class');
				var social_html = $('header .rd-social').html();	
				var contact_html = $('header .rd-contact-us').html();		
 				var call_attr = $('header .rd-call-header').attr('class');
				var call_html = $('header .rd-call-header').html();											
				var out ='';
				out+= '';
					out+= '<div class="rd-mobilebar-container rd-color-item rd-color-background  rd-color-border">';
					out+= '<div class="'+ logo_attr+'">'+logo_html+'</div>';
					if($('header .rd-social').hasClass('rd-header-item')){
					out+= '<div class="'+ social_attr+'">'+social_html+'</div>';
					}
					
					out+= main;
					if($('header .rd-contact-us').hasClass('rd-header-item')){
					out+= '<div class="rd-contact-us rd-contact-active">'+contact_html+'</div>';
					}
					if($('header .rd-call-header').hasClass('rd-header-item')){
					out+= '<div class="'+ call_attr+' rd-call-active">'+call_html+'</div>';
					}
					
 				out+= '</div>';
				$('.rd-mobilebar-warp').append(out);
				
				
	}

 	jQuery("#wpadminbar").addClass('wpadminbar');	
	var wpadmin_height = jQuery("#wpadminbar").height();
	jQuery(".rd-menu-active").css("margin-top", wpadmin_height+"px");	
	 
	 
	/***********************************************************************************************************************************************************
	Nav Menu
 	***********************************************************************************************************************************************************/
	$(".rd-nav-menu li.menu-item-has-children,.rd-category-menu li.menu-item-has-children").on({
		mouseenter: function () {
			$(this).addClass('rd-menu-hover');
 			$(this).find('ul:first').addClass('rd-menu-dropdown-box-active');
		},
		mouseleave: function () {
			$(this).removeClass('rd-menu-hover');
			$(this).find('ul:first').removeClass('rd-menu-dropdown-box-active');
 		}
	});		
  		/*
	$('.rd-category-menu-warp li.menu-item-has-children').hover(
		function() {
			$('ul:first,.sub-posts', this).stop().fadeIn(0 , function() {
				$(this).addClass('rd-menu-hover');
				$(this).removeClass('rd-menu-not-hover');
				if($(this).hasClass('sub-posts')){
					auto_width($(this));
					rd_img_resize(); 
				}
			});
		}, function() {
			$('ul:first,.sub-posts', this).stop().fadeOut(0, function() {
				$(this).removeClass('rd-menu-hover');
				$(this).addClass('rd-menu-not-hover');
			});
		}
	); 	
		 */
	jQuery('.rd-nav-menu .menu-item-has-children,.rd-category-menu .menu-item-has-children').append('<span class="rd-menu-down rd-color-link"></span><span class="rd-menu-up  rd-color-link" ></span>');  
 
	jQuery(document).on("click", ".rd-mobile-menu .rd-menu-icon" , function(){
		var menu_html = $(this).parents('.rd-mobile-menu').html();	
 		if($('.rd-masthead').find('.rd-mobile-menu').hasClass('rd-header-item')){
			menu_html+= $('.rd-masthead').find('.rd-mobile-menu .rd-nav-menu').html();		 
		} 		 
  		mobilebar_loading('<div class="rd-nav-menu rd-menu-active">'+menu_html+'</div>');
 	});
		/*/
   		jQuery(document).on("click", ".rd-menu-icon-click" , function(){
 			var menu_html = $(this).next().html();		 
 			mobilebar_loading('<div class="rd-nav-menu rd-menu-active">'+menu_html+'</div>');
  
		});*/
				 /*
		 jQuery(document).resize( function(){
	
			var windows = $(window).width();
 			$('.rd-nav-menu').find('ul,div').removeClass('rd-menu-show');
			$('.rd-nav-menu').removeClass('rd-menu-active');
			jQuery('body').removeClass('rd-body-menu-active');
			$('.rd-navhead-warp').removeClass('rd-nav-active');
			$('.rd-nav-menu .sub-menu').each(function(index, element) {
				$(this).hide();
 			});
			$('.rd-nav-menu .sub-posts').each(function(index, element) {
				$(this).hide();
 			});
 
 		});
		
		jQuery(document).on("click", ".rd-menu-active .rd-menu-icon" , function(){
			jQuery(this).parent().removeClass('rd-menu-active');
			jQuery('body').removeClass('rd-body-menu-active');
	
			jQuery(this).parents('.rd-navhead-warp').removeClass('rd-nav-active');

 		});
	*/	
 	jQuery(document).on("click", ".rd-mobilebar ul .rd-menu-up" , function(){
			jQuery(this).parent().find('ul:first').removeClass('rd-menu-show');
			jQuery(this).hide();
			jQuery(this).prev().show().css({ display:"inline-block "});
 	});
		
	jQuery(document).on("click", ".rd-mobilebar .rd-menu-down" , function(){
		jQuery(this).parent().find('ul:first').addClass('rd-menu-show');
		jQuery(this).hide();
		jQuery(this).next().show().css({ display:"inline-block "});
	});
		
	$('.rd-has-background-image').each(function(index, element) {
		var data = $(this).attr('data-background');
		$(this).find('.sub-depth-0 .rd-menu-background').css('background-image','url("'+data+'")');
 	});	
	$('.rd-menu-section').each(function(index, element) {
			var top = $(this).attr('data-padding-top');
			var right = $(this).attr('data-padding-right');
			var bottom = $(this).attr('data-padding-bottom');
			var left = $(this).attr('data-padding-left');
			$(this).css('padding-top',top+'px');
			$(this).css('padding-right',right+'px');
			$(this).css('padding-bottom',bottom+'px');
			$(this).css('padding-left',left+'px');
 	});			
	/*
	jQuery(document).resize( function(){
 			var windows = $(window).width();
 			$('.rd-category-menu').find('ul,div').removeClass('rd-menu-show');
			$('.rd-category-menu').removeClass('rd-menu-active');
			jQuery('body').removeClass('rd-body-menu-active');
			$('.rd-navhead-warp').removeClass('rd-nav-active');
			$('.rd-category-menu .sub-menu').each(function(index, element) {
				$(this).hide();
 			});
			$('.rd-category-menu .sub-posts').each(function(index, element) {
				$(this).hide();
 			});
 	});
	/*
	jQuery(document).on("click", ".rd-menu-active .rd-menu-icon" , function(){
			jQuery(this).parent().removeClass('rd-menu-active').removeAttr("style");
 			jQuery('body').removeClass('rd-body-menu-active');
			jQuery('body').removeClass('rd-body-menu-active');
 			jQuery(this).parents('.rd-navhead-warp').removeClass('rd-nav-active');

 		});
		jQuery('.rd-nav-menu,.rd-category-menu').on("click", "ul .rd-menu-up" , function(){
			jQuery(this).parent().find('ul:first').removeClass('rd-menu-show');
			jQuery(this).hide();
			jQuery(this).prev().show().css({ display:"inline-block "});
 		});
		
		jQuery('.rd-nav-menu,.rd-category-menu').on("click", ".rd-menu-down" , function(){
			jQuery(this).parent().find('ul:first').addClass('rd-menu-show');
			jQuery(this).parent().find('.rd-menu-section ul:first').addClass('rd-menu-show');
 			jQuery(this).next().show().css({ display:"inline-block "});
  		});
 

		
		jQuery('.rd-nav-menu,.rd-category-menu').on("click", ".rd-menu-sub-posts .rd-menu-down" , function(){
			jQuery(this).parent().find('.sub-posts').addClass('rd-menu-show');
			jQuery(this).hide();
			jQuery(this).next().show().css({ display:"inline-block"});
  		});
	
		jQuery('.rd-nav-menu,.rd-category-menu').on("click", " .sub-posts .rd-menu-up" , function(){
			jQuery(this).parent().find('.sub-posts').removeClass('rd-menu-show');
			jQuery(this).hide();
			jQuery(this).prev().show().css({ display:"inline-block"});
 		});	
 */
 
 	/***********************************************************************************************************************************************************
	LoginForm
 	***********************************************************************************************************************************************************/
 	$(".rd-singout").on({
			mouseenter: function () {
				$(this).addClass('rd-login-hover');
 				$(this).find('ul:first').addClass('rd-login-dropdown-box-active');
 			 },
			mouseleave: function () {
				$(this).removeClass('rd-login-hover');
				$(this).find('ul:first').addClass('rd-login-dropdown-box-active');
 
 			}
	});	
	
	jQuery('.rd-mobile-login.rd-login-singout').on("click", "a" , function(){
		if(jQuery(this).hasClass('rd-ismobile-login')){
		if(jQuery(this).parent().find('.rd-login-singout').hasClass('rd-login-singout')){
				var menu_html =  jQuery(this).parent().find('.rd-login-singout').html();		 
				var menu_attr = jQuery(this).parent().find('.rd-login-singout').attr('class');		 
				mobilebar_loading('<div class="'+menu_attr+' rd-singout-active">'+menu_html+'</div>');
			 
			}
		}else{
			if(jQuery(this).parents('header').find('.rd-login-singout').hasClass('rd-login-singout')){
			var menu_html =  jQuery(this).parents('header').find('.rd-login-singout').html();		 
			var menu_attr = jQuery(this).parents('header').find('.rd-login-singout').attr('class');		 
			mobilebar_loading('<div class="'+menu_attr+' rd-singout-active">'+menu_html+'</div>');
  		 
			}
		}
  	}); 
 	/***********************************************************************************************************************************************************
	LoginForm
 	***********************************************************************************************************************************************************/
	jQuery('.rd-search').on("click", "a.rd-search-icon" , function(){
 
		if(jQuery(this).parent().hasClass('rd-search-active')){
			jQuery(this).parent().removeClass('rd-search-active'); 
 
		}else{
			jQuery(this).parent().addClass('rd-search-active');
  

		}
	}); 
   		jQuery('.rd-mobile-search').on("click", ".rd-search-icon" , function(){
			if($('header .rd-search').hasClass('rd-header-item')){

			var rdsearch = jQuery(this).parents('header').find('.rd-search-sub').html();
			var rdsearch_attr = jQuery(this).parents('header').find('.rd-search').attr('class');
			mobilebar_loading('<div class="'+rdsearch_attr+' rd-search-active">'+rdsearch+'</div>');
 			 	jQuery('.rd-mobilebar').find('.rd-searchform select').remove();			
			}
		});
			
 	/***********************************************************************************************************************************************************
	social
 	***********************************************************************************************************************************************************/
	
 		$("header .rd-social-dropdown").on({
			mouseenter: function () {
				$(this).addClass('rd-social-hover');
			},
			mouseleave: function () {
				$(this).removeClass('rd-social-hover');
			}
     	});
		jQuery('.rd-mobile-social').on("click", ".rd-social-icon" , function(){
  			mobilebar_loading('');
			var rdsocial = jQuery(this).parents('header').find('.rd-social-sub').html();
			var rdsocial_attr = jQuery(this).parents('header').find('.rd-social').attr('class');
			mobilebar_loading('<div class="'+rdsocial_attr+' rd-social-active">'+rdsocial+'</div>');
 			
       	}); 	 
		
	 
 
	 
	 
		 /*
		
		jQuery(document).resize( function(){
 			var windows = $(window).width();
   			if(windows > 991){
				jQuery(this).parents('.rd-login').removeClass('rd-singout-active');
				jQuery('body').removeClass('rd-body-login-active');
				jQuery(this).parents('.rd-navhead-warp').removeClass('rd-sing-active');
				
			}
		});		 
  
*/
	 
	
 	$(".rd-addcart .rd-addcart-content").on({
			mouseenter: function () {
			$('.rd-addcart-warp', this).stop().fadeIn(0,function() {
					rd_img_resize();
					
					auto_width($(this));
 
        		 });
				$(this).parents('.rd-addcart').addClass('rd-cart-hover');
				$(this).parents('.rd-addcart').removeClass('rd-cart-not-hover');

 			 },
			mouseleave: function () {
    			$('.rd-addcart-warp', this).stop().fadeOut(0,function() {
				$(this).parents('.rd-addcart').removeClass('rd-cart-hover');
				$(this).parents('.rd-addcart').addClass('rd-cart-not-hover');
				});

						 
			}
	});	
		
	
 	jQuery('.rd-mobile-cart').on("click", ".rd-addcart-price" , function(){
 						if($('header .rd-addcart').hasClass('rd-desktop-item')){

 
			var addcart = jQuery(this).parents('header').find('.rd-addcart').html();
			var addcart_attr = jQuery(this).parents('header').find('.rd-addcart').attr('class');
			mobilebar_loading('<div class="'+addcart_attr+' rd-cart-active">'+addcart+'</div>');
		 
			auto_width($('.rd-mobilebar-active'));
 	}
  	}); 	
	 
	 

	$(".rd-cart-item a").on({
			mouseenter: function () {
			var text = $(this).find('.rd-text-hover').text();
				var height =  $(this).height()/2;
				var widths =  $(this).width()/2;
			
				var left=$(this).offset().left - 65 + widths ;
				var top=   $(this).offset().top - height - 15;
  			 	$('body').append('<div class="rd-cart-text-hover" style="left:'+left+'px;top:'+top+'px;"><div class="rd-cart-text-hover-warp">'+text+'</div></div>');
 			 },
			mouseleave: function () {
			 	 $('.rd-cart-text-hover').remove();
    		},	 
	});		
	
			
	jQuery(document).on("click", ".rd-category-title" , function(){
   		if(jQuery(this).parents('.rd-category-menu').hasClass('rd-category-active')){
 			jQuery(this).parents('.rd-category-menu').removeClass('rd-category-active');
 		} else{
 			jQuery(this).parents('.rd-category-menu').addClass('rd-category-active');
			
		}
  	}); 	
	
	 
	 
				 
 
	/***********************************************************************************************************************************************************
	Review
 	***********************************************************************************************************************************************************/
 	//Copyright (c) monochromer.
 	
 	function ssel_review(){
 	$('.rd-review-circular').each(function(index, element) {
		
		if(!$(this).find('canvas').hasClass('rd-canvas')){	
	
	var el = this; // get canvas

	var options = {
		percent:  el.getAttribute('data-percent') || 25,
		size: el.getAttribute('data-size') || 190,
		lineWidth: el.getAttribute('data-line') || 15,
		rotate: el.getAttribute('data-rotate') || 0
	}

		var canvas = document.createElement('canvas');
		$(this).find('canvas').addClass('rd-canvas');				

		if (typeof(G_vmlCanvasManager) !== 'undefined') {
			G_vmlCanvasManager.initElement(canvas);
		}
		
		var ctx = canvas.getContext('2d');
		canvas.width = canvas.height = options.size;
		
		el.appendChild(canvas);
		
		ctx.translate(options.size / 2, options.size / 2); // change center
		ctx.rotate((-1 / 2 + options.rotate / 180) * Math.PI); // rotate -90 deg
		
		//imd = ctx.getImageData(0, 0, 240, 240);
		var radius = (options.size - options.lineWidth) / 2;
		
		var drawCircle = function(color, lineWidth, percent) {
				percent = Math.min(Math.max(0, percent || 1), 1);
				ctx.beginPath();
				ctx.arc(0, 0, radius, 0, Math.PI * 2 * percent, false);
				ctx.strokeStyle = color;
				ctx.lineCap = 'round'; // butt, round or square
				ctx.lineWidth = lineWidth
				ctx.stroke();
		};
		
		drawCircle('#333', options.lineWidth, 100 / 100);
		drawCircle(ssel_js.primary_color, options.lineWidth, options.percent / 100);
		}
	}); 
	}
	ssel_review(); 
	

	/***********************************************************************************************************************************************************
	Color random
 	***********************************************************************************************************************************************************/ 
 	function color_random(id ){
		var rd_colorful = Math.floor(Math.random() * 7);

 		id.find('.rd-caption-3-layout-bottom-rand.rd-post-module-3').each(function(index, element) {
			var randomArray_1 = [
  				 'rgba(255, 0, 0, 0.4)','rgba(0, 39, 255, 0.4)','rgba(44, 129, 140, 0.4)','rgba(214, 0, 219, 0.4)','rgba(82, 0, 159, 0.4)', 'rgba(94, 159, 0, 0.4)' ,'rgba(255, 0, 0, 0.4)'  
			];
			var randomArray_2 = [
  				 'rgba(255, 150, 0, 0.4)','rgba(0, 255, 237, 0.4)','rgba(60, 255, 0, 0.4)','rgba(218, 44, 7, 0.4)','rgba(0, 30, 255, 0.4) ','rgba(231, 255, 0, 0.4)','rgba(0, 12, 255, 0.4)' 
  			]; 
			
  			var resultOfMod = (index + rd_colorful ) % 7;
			$(this).find("figcaption").attr('style','background: -moz-linear-gradient(top,  '+randomArray_1[resultOfMod]+' 0%,  '+randomArray_2[resultOfMod]+' 100%) !important; background: -webkit-linear-gradient(top, '+randomArray_1[resultOfMod]+' 0%,'+randomArray_2[resultOfMod]+'  100%) !important; background: linear-gradient(to bottom,  '+randomArray_1[resultOfMod]+' 0%,'+randomArray_2[resultOfMod]+'  100%) !important;');
   		});
		
		
		id.find('.rd-caption-3-layout-middle-rand').each(function(index, element) {
			var randomArray_1 = [
  				 'rgba(255, 0, 0, 0.7)','rgba(207, 66, 0, 0.7)','rgba(44, 129, 140, 0.7)','rgba(214, 0, 219, 0.7)','rgba(82, 0, 159, 0.7)', 'rgba(94, 159, 0, 0.7)' ,'rgba(255, 198, 0, 0.7)'  
			]; 
			
  			var resultOfMod = (index + rd_colorful ) % 7;
			$(this).find("figcaption,.rd-category a").attr('style',"background: "+randomArray_1[resultOfMod] + ' !important');
   		});
	}
	color_random($('body'));
 

	/***********************************************************************************************************************************************************
	Custom Slider
 	***********************************************************************************************************************************************************/ 
 
 	function custom_slider(classs){
 
  	classs.find('.rd-custom-slider.sao-opacity-hide').each(function(index, block) {	
		$('.rd-custom-slider').show(); 
 
 		var data_slider = jQuery.parseJSON( $(this).find('.sao-slider-options').html());
		
		  
 		data_slider['onSliderLoad']= function ($el, scene) {
		auto_width($el);
  			$el.parents('.rd-custom-slider').addClass('rd-show-custom-slider');
 		};
 		data_slider['onBeforeStart']= function ($el) {
			auto_width($el);
  		} 
 		$(this).find('.sao-slider-options').parents('.rd-custom-slider').find('.rd-slider-list').sao_lightSlider(data_slider);
 		
		auto_width($(this));
		console.log(data_slider);

 	});	
	}
	custom_slider($('body'));
   
   
	function title_box(){

   	$('.rd-wrapper .rd-title-box').each(function(index, block) {	
	
		$(this).find('.rd-title-box-border,.rd-title-box-border-after,.rd-title-box-border-before').remove();	
		var width= $(this).outerWidth(true);
		var main_width= $(this).find('.rd-tab-main').outerWidth(true);
		
		var tab_width= $(this).find('.rd-tabs').outerWidth(true);
		
		var rs_tab = width - main_width;
		
		if(rs_tab < tab_width){
			$(this).addClass('rd-tab-full-width');
		}else{
			$(this).removeClass('rd-tab-full-width');
		}
		
		if($(this).hasClass('rd-title-box-style-5')){
  			
			var children_width =0;
		   	$(this).find('.rd-title-box-warp').children().each(function(index, block) {	
 				children_width += parseInt($(this).outerWidth(true),10); 
			});
 			if($(this).hasClass('rd-title-box-main-center') || $(this).hasClass('rd-title-box-tabs-center')){
			var	bagho = width - children_width;
			var	half = bagho / 2;
  				$(this).find('.rd-title-box-warp').append('<i class="rd-title-box-border-before" style="width:'+half+'px;"></i><i class="rd-title-box-border-after" style="width:'+half+'px;"></i>');
			}else{
				$(this).find('.rd-title-box-warp').append('<i class="rd-title-box-border" style="width:'+(width - children_width)+'px; right:'+main_width+'px;"></i>');
			}
				
		}
		

 	});	
	} 
  	 
	title_box();
	
 	/***********************************************************************************************************************************************************
	Cart
 	***********************************************************************************************************************************************************/	
	function cart_item(){
	$('.rd-cart-item a').each(function(index, element) {
		var text = $(this).text();
  		$(this).html('');
		$(this).append('<div class="rd-text-hover">'+text+'</div>');

    }); 
	 
	
	$(".rd-cart-item a").on({
			mouseenter: function () {
			var text = $(this).find('.rd-text-hover').text();
				var height =  $(this).height()/2;
				var widths =  $(this).width()/2;
			
				var left=$(this).offset().left - 65 + widths ;
				var top=   $(this).offset().top - height - 15;
  			 	$('body').append('<div class="rd-cart-text-hover" style="left:'+left+'px;top:'+top+'px;"><div class="rd-cart-text-hover-warp">'+text+'</div></div>');
 			 },
			mouseleave: function () {
			 	 $('.rd-cart-text-hover').remove();
    		},	 
	});		
	
	}
	cart_item();
 jQuery( 'body' ).on( 'added_to_cart', function( e, fragments, cart_hash, this_button ) {
	setTimeout(function(){  
 		var added_to_cart = this_button.next();
 		var text = added_to_cart.text();
  		added_to_cart.html('');
		added_to_cart.append('<div class="rd-text-hover">'+text+'</div>');
		this_button.remove();
 		cart_item();
		
	},500);
   
 } );
 	/***********************************************************************************************************************************************************
	Macy Masonry
 	***********************************************************************************************************************************************************/
   
	function macy_masonry(id){
		var masonry = id.parents('.macy-masonry');
		if(masonry.hasClass('macy-masonry')){
			id.attr('data-column');
			var datarand =  Math.floor((Math.random() * 100000000) + 1);
			var thisss =id.attr('id','macy-' + datarand);
			var col = masonry.attr('data-column');
			
			if(col === 8){
				var breakAt= {
					1199: 6,
					990: 4,
					767: 2,
					499: 1
				};
				
			}else if(col === 7){
				var breakAt = {
					1199: 6,
					990: 4,
					767: 2,
					499: 1
				};
					 
			}else if(col === 6){
				var breakAt = {
					1199: 5,
					990: 4,
					767: 2,
					499: 1
				};
					 
			}else if(col === 5){
				var breakAt = {
					1199: 4,
					990: 3,
					767: 2,
					499: 1
				};
			}else if(col === 4){
				var breakAt = {
					1199: 4,
					990: 3,
					767: 2,
					499: 1
				};			
					 
			}else if(col === 3){
				var breakAt = {
					1199: 3,
					990: 3,
					767: 2,
					499: 1
				};
					 
			}else {
				 var breakAt = {
					1199: 2,
					990: 2,
					767: 2,
					499: 1
				};
			} 
				
				
			var array={
				container: '#macy-'+datarand,
				margin: 0,
				columns: col,
				breakAt:breakAt,
					 
			};
 			var macy = Macy(array) ;
 			
		} 			
 	
	} 
		
	$('.macy-masonry .rd-post-list').each(function(index, element) {
		macy_masonry($(this));
	});
 	/***********************************************************************************************************************************************************
	Portfolio
 	***********************************************************************************************************************************************************/	  
 
	$('.rez-portfolio .rd-post-item').each(function(index, element) {
		$(this).addClass('rez-has-show');
	});
		 
			  
 
	$('.rez-portfolio').find('.rd-post-item').each(function(index, element) {
						$(this).attr('data-order',index);			
 				}); 			 
	$('.rez-portfolio').on('click','.rd-title-box .rd-tabs .rd-tab-item',function(index, element) {
				
 					var rez_portfolio = $(this).parents('.rez-portfolio');
 					rez_portfolio.addClass('rez-not-transition');
					 
					rez_portfolio.find('.rd-tab-active').removeClass('rd-tab-active');
					$(this).addClass('rd-tab-active');
	 			
   					var data_filter = $(this).attr('data-filter');
 
					var cls = rez_portfolio.find('.rd-post-list').attr('class');
					rez_portfolio.find('.rd-post-list').addClass('rd-post-list-main');
 					var post_list = rez_portfolio.find('.rd-post-list-main');
 
					var width = post_list.width();
					var height = post_list.height();
 					var html = post_list.html();
 					 rez_portfolio.find('.rd-post-list-new').remove();
 					
 					if(!rez_portfolio.find('.rd-post-list-new').length) { 
 						post_list.parent().append('<div class="rd-post-list-new"><div  class="'+cls+'" style="width:'+width+'px; height:'+height+'px;">'+html+'</div></div>');
	 				}
	 					
						var post_list_new = rez_portfolio.find('.rd-post-list-new');

 						// Post List New
						 post_list_new.find('.rd-post-item').each(function(index, element) {
							 var post_item = $(this);
							
						
								 if(post_item.hasClass(data_filter) || data_filter ==='all'){
									//to show
									post_item.addClass('rez-test-show');
									
									if(post_item.hasClass('rez-has-show')){
										post_item.addClass('rez-to-move');
									} 
									if(post_item.hasClass('rez-has-hide')){
										post_item.addClass('rez-hide-to-show');
									} 
									
								}else{
									post_item.addClass('rez-test-hide');
									 
									if(post_item.hasClass('rez-has-show')){
										
										post_item.addClass('rez-show-to-hide');
									} 
				
								}
						  });
					   
					
				 var myVar = setInterval(function(index, element) {
 						if(rez_portfolio.find('.rd-post-list-new').length) { 
							clearInterval(myVar);
							setTimeout(function(){  
								//auto_width(rez_portfolio);
  								macy_masonry(post_list_new.find('.rd-post-list'));
  								macy_masonry(post_list_new.find('.rd-post-list'));
  								macy_masonry(post_list_new.find('.rd-post-list'));
 			 				
							},10);
							setTimeout(function(){   
 								if(rez_portfolio.hasClass('rez-portfolio-flex')){
								post_list.attr('list-height',post_list.height());
								
								 post_list.find('.rd-post-item').each(function(index, element) {
									 
									var post_item = $(this);
									var data_order = $(this).attr('data-order');
									var post_item_new = rez_portfolio.find('.rd-post-list-new .rd-post-item[data-order="'+data_order+'"]' );
									if(post_item_new.hasClass('rez-hide-to-show')){
 
									  $(this).attr('old-width',post_item_new.width());
									  $(this).attr('old-height',post_item_new.height());
									}else{
										$(this).attr('old-width',$(this).width());
										  $(this).attr('old-height',$(this).height());
									}
									  $(this).attr('old-top',$(this).position().top);
									$(this).attr('old-left',$(this).position().left);
									 
								});
 								}
 							},15);
  					 		 
  					 		
							 
							setTimeout(function(){   
 							 
							 
							rez_portfolio.addClass('rez-animate');
 							
							var post_new_list_height = rez_portfolio.find('.rd-post-list-new .rd-post-list' ).height();
							var list_height = post_list.attr('list-height');
							
								post_list.stop().css({height:list_height+'px'});
 							 	post_list.animate({ height:post_new_list_height+'px' },300 );


							 post_list.find('.rd-post-item').each(function(index, element) {
								 
								if(rez_portfolio.hasClass('rez-portfolio-flex')){
 									var width = $(this).attr('old-width');
									var height = $(this).attr('old-height');
									var old_top= $(this).attr('old-top');
									var old_left= $(this).attr('old-left');
									$(this).css({top:old_top+'px',left:old_left+'px',width:width+'px',height:height+'px'}).addClass('rd-post-ab');
 								}
								var data_order = $(this).attr('data-order');
 
								
								var post_item_new = rez_portfolio.find('.rd-post-list-new .rd-post-item[data-order="'+data_order+'"]' );
 	 
								var new_top = post_item_new.position().top;
								var new_left = post_item_new.position().left;
 			
 								if(post_item_new.hasClass('rez-to-move')){ 
								
									$(this).animate({ left:new_left+'px',top:new_top+'px'  },300 );
								} 
									if(post_item_new.hasClass('rez-show-to-hide')){
										$(this).animate({ scale:0},300 );
									}
									if(post_item_new.hasClass('rez-hide-to-show')){
										$(this).css({left:new_left+'px',top:new_top+'px'}).animate({ scale:1},300 );
									}	
								
								});
						 
						},30);
							setTimeout(function(){   
								rez_portfolio.removeClass('rez-animate');
							post_list.stop(true,false).clearQueue();

							if(rez_portfolio.hasClass('rez-portfolio-flex')){
								post_list.removeAttr('style');	
							}
							 
	 
								 
								post_list.find('.rd-post-item').each(function(index, element) {
					 
									var post_item = $(this);
									if(post_item.hasClass(data_filter) || data_filter ==='all'){
											post_item.removeClass('rez-has-hide').addClass('rez-has-show');
									}else{ 
										post_item.removeClass('rez-has-show').addClass('rez-has-hide');
									}
									 if(rez_portfolio.hasClass('rez-portfolio-flex')){
										post_item.stop();
										post_item.removeClass('rd-post-ab').removeAttr('style');
									}
 								}); 
								
							rez_portfolio.find('.rd-post-list-main').removeClass('rd-post-list-main');
							rez_portfolio.find('.rd-post-list-new').remove();
					 
 							macy_masonry(rez_portfolio.find('.rd-post-list'));
							//auto_width(rez_portfolio);
 
 							},360);
							setTimeout(function(){ 
								rez_portfolio.removeClass('rez-not-transition');
							},500);
						}
					}, 50);
  	});
 
 	/***********************************************************************************************************************************************************
	Ajax
 	***********************************************************************************************************************************************************/
	$(".rd-ajax-tab .rd-title-box .rd-tabs .rd-tab-item").on("click",function(){
		
		if($('.rd-custom-slider').hasClass('rd-custom-slider')){
			var slider = true;
		}else{
			var slider = false;
		}
 
   		var rd_this = $(this);
  		var tab_jax = $(this).parents('.rd-ajax-tabs');
		
		rd_this.parent().find('.rd-tab-active').removeClass('rd-tab-active');

  		rd_this.addClass('rd-tab-active');
   		var rd_list = $(this).parents('.sao-element-item,.rd-elementor-item').find('.rd-post-list');
		var rd_module = $(this).parents('.sao-element-item,.rd-elementor-item');
		rd_module.find('.rd-load-more').removeClass('rd-loading');
 
 		var data_option = $(this).parents('.rd-title-box').find('.rd-data-json').html();
 	 
 		var dataajax = jQuery.parseJSON(data_option);
 		dataajax['cats'] = $(this).data('cats');
 		dataajax['orderby'] = $(this).data('orderby');
 		dataajax['max_page'] = $(this).data('max_page');
		console.log(dataajax);
 				rd_module.addClass('rd-not-transition');
		rd_module.addClass('rd-module-loading');
		rd_module.find('.rd-load-more span').attr('data-page','2').attr('data-cats',dataajax['cats']).attr('data-orderby',dataajax['orderby']).attr('data-max_page',dataajax['max_page']);
  
  		// This does the ajax request
		$.ajax({
			 type: "POST",
			dataType: "html",
			url: ssel_js.ajaxurl,
			data:dataajax,
			success:function(data) {
				var $data = $(data);
	 
				 if($data.length){
 					if(slider === true){
						 rd_module.find('.rd-slider-list-warp').children('.lSSlideOuter').remove();
						 rd_module.find('.rd-slider-list-warp').append('<div class="rd-post-list rd-slider-list"></div>');
						rd_list= rd_module.find('.rd-post-list');

					}else{
 						rd_list.children().remove();
					}
					rd_module.addClass('rd-transfrom-element');

					rd_list.fadeOut(0);
 					rd_list.append($data);
					
					if(slider===true){
						custom_slider(rd_module);

					}
					setTimeout(function(){  
 					auto_width(rd_module);
					},0);
 					rd_list.fadeIn(0);
 					rd_module.removeClass('rd-module-loading');
 					rd_img_resize();
 					ssel_review(); 
					cart_item();

					if(jQuery(".rd-countdown").length>0){
						jQuery(".rd-countdown").each(function(){
							jQuery(this).countdown();	
						})
						
					}
					
 					
					if(dataajax['max_page'] > 1 ){
						rd_module.find('.rd-load-more').show();
 
					} else{
						rd_module.find('.rd-load-more').hide();
					}
					color_random(rd_module);
 				 
					setTimeout(function(){  
 						rd_module.removeClass('rd-transfrom-element');
  					 	macy_masonry(rd_module.find('.rd-post-list')); 
   					},1);

  					setTimeout(function(){   
						rd_module.removeClass('rd-transfrom-show');
  						 auto_width(rd_module);
    					}, 300);
					setTimeout(function(){   
 						rd_module.removeClass('rd-not-transition');
  					}, 500);
 				  }  
  
				
  			},
			error : function(jqXHR, textStatus, errorThrown) {
				$loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
			}
		});  
	 
	});
	
  
 	// load more portofolio
	$(".rd-load-more span").on("click",function(){
		var gets = $(this).attr('rd-id');
		var rd_module = $(this).parents('.sao-element-item,.rd-elementor-item');
 
		var	masonry = $(this).parents('.macy-masonry');
		var portfolio = $(this).parents('.rez-portfolio');
 
		$(this).parent().addClass('rd-loading');
		
		
		var rd_item = $(this).parents('.sao-element-item,.rd-elementor-item');
		var rd_this = $(this);
		 var active_filter = rd_item.find('.rd-tab-active').attr('data-filter');
		
		var rd_list = $(this).parents('.sao-element-item,.rd-elementor-item').find('.rd-post-list');
		var data_option = $(this).next().html();
		var dataajax = jQuery.parseJSON(data_option);
		dataajax['count'] =  true;
		dataajax['cats'] =  $(this).attr('data-cats');
		dataajax['orderby'] =  $(this).attr('data-orderby');
 		dataajax['max_page'] =  $(this).attr('data-max_page');
		var max_pages =  $(this).attr('data-max_page');
		var pageNumber =  rd_this.attr('data-page');
  		dataajax['pageNumber'] = pageNumber;

 		
 		// This does the ajax request
		$.ajax({
			 type: "POST",
			dataType: "html",
			url: ssel_js.ajaxurl,
			data:dataajax,
			success:function(data) {
				var $data = $(data);
	 
 	 
				 if($data.length){
 		 				rd_module.addClass('rd-not-transition');
 		 				rd_module.addClass('rd-not-transition-item');
 		 				rd_module.addClass('rd-transform-hide');
						 
					rd_module.addClass('rd-transfrom-element');
					rd_list.append($data);
					auto_width(rd_module);

  					rd_this.parent().addClass('rd-loading');
					rd_this.parent().removeClass('rd-loading');
					
  		
				  } 
				  
 				pageNumber++;
				  rd_this.attr('data-page', pageNumber );
				  if(pageNumber > dataajax['max_page']) {
					 rd_this.parent().hide();
				 }
				setTimeout(function(){   
					auto_width(rd_module);
  				  },0);
				 
 				if(jQuery(".rd-countdown").length>0){
						jQuery(".rd-countdown").each(function(){
							jQuery(this).countdown();	
						});
						
					}
				 rd_img_resize();
 				  	portfolio.find('.rd-post-item').each(function(index, element) {
						$(this).attr('data-order',index).position();
					if($(this).hasClass(active_filter) || active_filter ==='all' || active_filter == null){
						$(this).removeClass('rez-has-hide').addClass('rez-has-show');
					}else{ 
						$(this).removeClass('rez-has-show').addClass('rez-has-hide');
					}
						
 				});
				color_random(rd_module);
				cart_item();

					setTimeout(function(){  
 						macy_masonry(rd_module.find('.rd-post-list'));
   					},0);
					setTimeout(function(){  
											auto_width(rd_module);

  						macy_masonry(rd_module.find('.rd-post-list'));
 					},1);
					setTimeout(function(){  
						auto_width(rd_module);
 		 				rd_module.removeClass('rd-transform-hide');
 		 				rd_module.addClass('rd-transfrom-show');
 		 				rd_module.removeClass('rd-transfrom-element');
						 
 					},10);

 					setTimeout(function(){  
						rd_module.find('.rd-post-item-new').each(function(index, element) {
							$(this).removeClass('rd-post-item-new');
							$(this).removeClass('rd-post-item-old');
						});
					},300);
					
					setTimeout(function(){   
						rd_module.removeClass('rd-not-transition-item');
  					 rd_module.removeClass('rd-not-transition');
					 
  					}, 500);
							 
   			},
			error : function(jqXHR, textStatus, errorThrown) {
				$loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
			}
		});  
	 
	});
	  	 
  

 
 	$('.rd-load-more span').each(function(index, element) {
			var max_page =  $(this).data('max_page');
			if(max_page > 1 ){
					$(this).parent().show();
			}
	
	});
	$('.sao-builder-warp').on('click','.rd-title-box', function(){
//mmm();
	});
	

 		// wp-pagenavi
 		jQuery(document).on('click',".rd-page-ajax a", function(e){
					var	masonry = $(this).parents('.macy-masonry');

			var key = $(this).parents('.rd_module_pagenavi').attr('data-key');
			var data_builder = $(this).parents('.rd-data-builder').attr('data-builder');
			var rd_module = $(this).parents('.rd_module_pagenavi');
			var x = $(this).parents(".rd_module_pagenavi").offset().top;
			window.scrollTo(0, x - 60);
			$(this).parents('.rd_module_pagenavi').addClass('rd-module-loading');
			e.preventDefault();
			var link = jQuery(this).attr('href');
			
 			jQuery('.rd-pagenavi').load(link + ' .rd-data-builder[data-builder="'+data_builder+'"] .sao-element-'+key+'  .rd-pagenavi .rd-page-number ', function() {
			  jQuery('.rd-pagenavi').fadeIn(0);
			});
	 
		  jQuery(this).parents(".rd_module_pagenavi").find('.rd-post-list').load(link + ' .rd-data-builder[data-builder="'+data_builder+'"] .sao-element-'+key+'  .rd-post-list', function() {
 		 	 rd_module.addClass('rd-transfrom-element');
			rd_module.removeClass('rd-module-loading');
  
 			rd_img_resize();
			window.history.pushState("object or string", "Title",link);
			
			jQuery(this).parents(".rd_module_pagenavi").find(".rd-post-list").children('.rd-post-list').unwrap();
			 rd_module.addClass('rd-transfrom-element');
			 		color_random(rd_module);
 			setTimeout(function(){  
 			auto_width(rd_module);
			},1);
			if(jQuery(".rd-countdown").length>0){
						jQuery(".rd-countdown").each(function(){
							jQuery(this).countdown();	
						})
						
					}
  			setTimeout(function(){  
 				rd_module.removeClass('rd-transfrom-element');
 				 
			},1);

			setTimeout(function(){   
					macy_masonry(masonry.find('.rd-post-list'));
			}, 1);		
			
			ssel_review(); 
		
		});
	 }); 
	 $(document).on("click", ".rd-tab-next", function(){
			$(this).parents('.rd-carousel').find('.lSNext').trigger("click");
	});
	$(document).on("click", ".rd-tab-prev", function(){
			$(this).parents('.rd-carousel').find('.lSPrev').trigger("click");
	});
	 	 $(document).on("click", ".rd-lSAction .lSNext", function(){
			$(this).parents('.rd-carousel').find('.lSSlideOuter  .lSNext').trigger("click");
	});
	$(document).on("click", ".rd-lSAction .lSPrev", function(){
			$(this).parents('.rd-carousel').find('.lSSlideOuter  .lSPrev').trigger("click");
	});
	  
	
	 
	/*
		$(window).resize(function () { 
 				 $('.rd-featured .rd-thumb,.rd-background').each(function(index, element) {
					var resize_width_img = $(this).find('img').attr('width');
					var resize_height_img = $(this).find('img').attr('height');
					var resize_ratio_img = resize_width_img/resize_height_img;	
 					var resize_width = $(this).width();
					var resize_height = $(this).height();
					var resize_ratio = resize_width/resize_height;
  					if(resize_ratio_img < resize_ratio ){
						$(this).find('img').css("width" ,"100.1%").css("min-width" ,"auto").css("height" ,"auto").css("min-height" ,"100.1%");		
					}else if (resize_ratio_img > resize_ratio){
						$(this).find('img').css("width" ,"auto").css("min-width" ,"100.1%").css("height" ,"100.1%").css("min-height" ,"auto");		
					}
				 });
 
		});*/
		
	var video_width = $('.rd-post-video').width();
 	var video_height = $('.rd-post-video').height();
 	$('.rd-video-warp #rd-video').attr('width',video_width).attr('height',video_height);
 	$('.rd-video-warp iframe').attr('width',video_width).attr('height',video_height);
	
	
 	$('.rd-post .rd-video-warp iframe').attr('width',video_width).attr('height',(video_width* 3/4));
 	   	   
 	$('.rd-head-post-a6 .rd-head-post-content').each(function(index, element) {
		var background = $(this).find('.rd-thumb img').attr('src');
		$(this).css('background-image', 'url(' + background + ')');	
		$(this).find('.rd-thumb').remove();
	});



	//-------------- LightBox --------------// 
	//Copyright (c) jzBox 
	 $('.single .rd-post-content img').parent('a').each(function(i, el) {
 	var ssel_href_value = this.href;
  	if (/\.(jpg|png|gif|jpeg|bmp)$/.test(ssel_href_value)) {
		$(this).addClass('rd-img-lightbox');
  	}  
	});
	
 
	
	if(jQuery('.rd-lightbox').hasClass('rd-lightbox-active')){
		$('.rd-img-lightbox').on('click',function (event) {
			$('.rd-lightbox').addClass('rd-lightbox-post-content')
			
			event.stopPropagation();
			event.preventDefault();
			var images = $('.rd-post-content img').parent('a');
			rd_lightboxActual = this;
			
			$('.rd-lightbox-targetimg').css('display', 'none').attr('src', this.getAttribute('href'));
			$('.rd-lightbox-targetimg').one('load', function () {
				$('.rd-lightbox-loading').css('display', 'none');
				$(this).slideToggle('slow');
			});
	
			var text = $(this).next().html();
			var display = 'block';
			if (text == null) {
				text = '';
				display = 'none';
			}
			
			$('.rd-lightbox-title').text(text).css('display', display);
			$('.rd-lightbox').addClass('rd-multi-lightbox').slideToggle('fast');
			var actualId;
			$.each(images, function (index) {
				if (rd_lightboxActual === images[index]) {
					actualId = index + 1;
				}
			});
			if (images.length == 1) {
				$('.rd-lightbox-moreitems').css('display', 'none');
			}
			
			$('.rd-lightbox-counter').text($.rd_lightboxMessage(actualId, images.length));
			

	});
	}
	$.rd_lightboxMove = function (direction, allImages) {
		console.log(allImages);
    		direction = (direction == 'next') ? 'next' : 'prev';
			var actualId;
			$.each(allImages, function (index) {
       		if (allImages[index] === rd_lightboxActual) {
				actualId = index;
       		}
    	});
	
     	var iterator;
		if (direction == 'next') {
        	iterator = actualId + 1;
        	if (actualId == allImages.length - 1) {
            iterator = 0;
        	}
    	} else if (direction == 'prev') {
        	iterator = actualId - 1;
        	if (actualId == 0) {
            	iterator = allImages.length - 1;
        	}
    	}
		
		var newImage = allImages[iterator];
		$('.rd-lightbox-targetimg').css('display', 'none').attr('src', newImage.getAttribute('href'));
		$('.rd-lightbox-loading').css('display', 'block');
		
    	$('.rd-lightbox-targetimg').one('load', function () {
        	$('.rd-lightbox-loading').css('display', 'none');
        	$(this).css('display', 'inline-block');
    	});
    	
		var text = $(newImage).next().html();
    	var display = 'block';
		
		if (text == null) {
        	text = '';
        	display = 'none';
    	}
		$('.rd-lightbox-title').text(text).css('display', display);
		$('.rd-lightbox-counter').text($.rd_lightboxMessage(iterator + 1, allImages.length));
		rd_lightboxActual = newImage;
	}; 
	
		
	$(document).on('click','.rd-lightbox-post-content.rd-multi-lightbox .rd-lightbox-prevbig',function() {
			$.rd_lightboxMove('prev', $('.rd-post-content img').parent('a'));
	});

	$(document).on('click','.rd-lightbox-outer',function() {
			$('.rd-lightbox').slideToggle('fast');
	});
		
	$(document).on('click','.rd-lightbox-close',function() {
		$('.rd-lightbox').removeClass('rd-lightbox-singleimg').removeClass('rd-multi-lightbox').slideToggle('fast');
		$('.rd-lightbox').removeClass('rd-lightbox-post-contet').removeClass('rd-lightbox-gallery');
	});  
		 
	$(document).on('click','.rd-multi-lightbox.rd-lightbox-post-content .rd-lightbox-nextbig,.rd-multi-lightbox.rd-lightbox-post-content .rd-lightbox-targetimg',function() {
    	$.rd_lightboxMove('next', $('.rd-post-content img').parent('a'));
	});
 
	
	
	var rd_lightboxActual = null;

	$.rd_lightboxMessage = function (actual, last) {
    	return '' + EnglishTopersian(actual  + ' / ' + last);
	};
 
		
  
		$(document).on('keydown', function (event) {
			if(event.keyCode  == 37 ){
				
	
				if($('.rd-lightbox').hasClass('rd-multi-lightbox')){
				if($('.rd-lightbox').hasClass('rd-lightbox-post-content') ){
							
					$.rd_lightboxMove('prev', $('.rd-post-content img').parent('a'));
				}
				}
			}
		});
		$(document).on('keydown', function (event) {
				
				if($('.rd-lightbox').hasClass('rd-multi-lightbox')){
				if($('.rd-lightbox').hasClass('rd-lightbox-post-content') ){
					if(event.keyCode  == 39 ){
						$.rd_lightboxMove('next', $('.rd-post-content img').parent('a'));
					}
				}
				}
			
		});		
			
	 
	/*
	$(document).on('click','.rd-multi-lightbox .rd-lightbox-nextbig,.rd-multi-lightbox .rd-lightbox-targetimg',function() {
    	$.rd_lightboxMove('next', $('.rd-post-content img').parent('a'));
	});	
	
	*/
	
	
	
	$('.rd-hover-img-link').each(function(i, el) {
		var ssel_href_value = this.href;
		if (/\.(jpg|png|gif|jpeg|bmp)$/.test(ssel_href_value)) {
			$(this).addClass('rd-singleimg-lightbox');
		}  
	});
	
     	if(jQuery('.rd-lightbox').hasClass('rd-lightbox-active')){
		$('.rd-singleimg-lightbox').on('click',function (event) {
			event.stopPropagation();
			event.preventDefault();
			var rand = Math.floor((Math.random() * 10000000) + 1); 

 			$(this).parents('.rd-post-all-warp').attr('data-lightbox',rand);
			
 			
			$('.rd-lightbox').addClass('rd-lightbox-gallery').attr('data-rand',rand);
			var images = $(this).parents('.rd-post-all-warp').find('.rd-singleimg-lightbox');
			rd_lightboxActual = this;
			
			$('.rd-lightbox-targetimg').css('display', 'none').attr('src', this.getAttribute('href'));
			$('.rd-lightbox-targetimg').one('load', function () {
				$('.rd-lightbox-loading').css('display', 'none');
				$(this).slideToggle('slow');
			});
	
			var text = $(this).next().html();
			var display = 'block';
			if (text == null) {
				text = '';
				display = 'none';
			}
			
			$('.rd-lightbox-title').text(text).css('display', display);
			$('.rd-lightbox').addClass('rd-multi-lightbox').slideToggle('fast');
			var actualId;
			$.each(images, function (index) {
				if (rd_lightboxActual === images[index]) {
					actualId = index + 1;
				}
			});
			if (images.length == 1) {
				$('.rd-lightbox-moreitems').css('display', 'none');
				
 
			}
					$('.rd-lightbox').attr('data-item',images.length);
 			$('.rd-lightbox-counter').text($.rd_lightboxMessage(actualId,images.length));
			 

			
	});
	}
	
	
	
	
	$(document).on('click','.rd-multi-lightbox.rd-lightbox-gallery .rd-lightbox-prevbig',function() {
		var rand = $('.rd-lightbox').attr('data-rand');
 			$.rd_lightboxMove('prev', $('[data-lightbox="'+rand+'"]').find('.rd-hover-img-link'));
	});

 
		
	$(document).on('click','.rd-multi-lightbox.rd-lightbox-gallery .rd-lightbox-nextbig,.rd-multi-lightbox.rd-lightbox-gallery .rd-lightbox-targetimg',function() {
		var rand = $('.rd-lightbox').attr('data-rand');
      	$.rd_lightboxMove('next', $('[data-lightbox="'+rand+'"] .rd-hover-img-link'));
	});
	
	
 
		
 		$(document).on('keydown', function (event) {
			if(event.keyCode  == 39 ){
				
			 	if($('.rd-lightbox').hasClass('rd-multi-lightbox') ){
				if($('.rd-lightbox').hasClass('rd-lightbox-gallery') ){
					var rand = $('.rd-lightbox').attr('data-rand');
					$.rd_lightboxMove('next',$('[data-lightbox="'+rand+'"] .rd-hover-img-link'));
				 }
				 }
			}
		});
		$(document).on('keydown', function (event) {
			if(event.keyCode  == 37 ){
				
			 	if($('.rd-lightbox').hasClass('rd-multi-lightbox') ){
				if($('.rd-lightbox').hasClass('rd-lightbox-gallery') ){

				
				var rand = $('.rd-lightbox').attr('data-rand');
 				$.rd_lightboxMove('prev', $('[data-lightbox="'+rand+'"] .rd-hover-img-link'));
				
				 }
				 }
				
			}
		}); 
	 
	  
	 
	
	
	
	
	
	//-------------- Sticky Nav --------------// 
  
 	if($('.rd-masthead-warp').hasClass('rd-sticky')){
 		var main_sticky = jQuery('.rd-masthead-warp.rd-sticky').offset().top;
 
 		function masthead_sticky(main_sticky){
			var top = jQuery(window).scrollTop();
			var height_sticky = main_sticky + 50 ;

			if (top > height_sticky   ) {
				 
                jQuery(".rd-masthead-warp.rd-sticky").removeClass('rd-nav-transparent');
 				jQuery(".rd-masthead-warp.rd-sticky").addClass('rd-sticky-warp');
				 jQuery(".rd-masthead-warp.rd-sticky").show( 1 ,function() {
					
					
    // Animation complete.
	 
					if(!jQuery(".rd-masthead-warp").hasClass('rd-sticky-enable')){
						jQuery(".rd-masthead-warp.rd-sticky").find('.rd-category-menu').removeClass('rd-category-active');
					}
	 
					jQuery(".rd-masthead-warp.rd-sticky").addClass('rd-sticky-enable');
					var wpadminbar_height = jQuery("#wpadminbar").height();
					jQuery(".rd-masthead-warp.rd-sticky-enable").css("margin-top", wpadminbar_height+"px");
					jQuery(".rd-masthead-warp.rd-sticky").find('.rd-category-menu').removeClass('rd-sub-category-menu');
	 
			  });
			  
			} else { 
			 
				if($('.rd-all-header').hasClass('rd-header-transparent')){
                  jQuery(".rd-masthead-warp.rd-sticky").addClass('rd-nav-transparent');
				}
				jQuery(".rd-masthead-warp.rd-sticky").css("margin-top", "0px");
                 jQuery(".rd-masthead-warp.rd-sticky").removeClass('rd-sticky-enable');
 				
				if($('.rd-category-menu').hasClass('rd-has-sub-category-menu')){
                  jQuery(".rd-masthead-warp.rd-sticky").find('.rd-category-menu').addClass('rd-sub-category-menu');
				}	  
 					jQuery(".rd-masthead-warp.rd-sticky").removeClass('rd-sticky-warp');
 				  
  			}   
		}
		$(window).on('scroll', function() {
           	masthead_sticky(main_sticky);
		});	
	}
  
 	if($('.rd-mobile-warp').hasClass('rd-sticky')){
 		var mob_sticky = jQuery('.rd-mobile-warp.rd-sticky').offset().top;
  		function mobile_sticky(mob_sticky){
			var top = jQuery(window).scrollTop();
			var height_sticky = mob_sticky + 50 ;

 			if (top > height_sticky   ) {
   				jQuery(".rd-mobile-warp.rd-sticky").addClass('rd-sticky-warp');
				jQuery(".rd-mobile-warp.rd-sticky").show( 0 ,function() {
					jQuery(".rd-mobile-warp.rd-sticky").addClass('rd-sticky-enable');
					var wpadminbar_height = jQuery("#wpadminbar").height();
					jQuery(".rd-mobile-warp.rd-sticky-enable").css("margin-top", wpadminbar_height+"px");
					jQuery(".rd-mobile-warp.rd-sticky-enable").html();
 				});
			} else { 
				jQuery(".rd-mobile-warp.rd-sticky-enable").css("margin-top", "0px");
	
                jQuery(".rd-mobile-warp.rd-sticky-warp").removeClass('rd-sticky-enable').removeClass('rd-sticky-warp');
			}   
		}
$(window).on('scroll', function() {
           	mobile_sticky(mob_sticky);
		});	
	}
	 
 	if( ! $('#respond').hasClass('comment-respond') && ! $('.rd-element-comments').hasClass('rd-have-comments')){
				$('.rd-element-comments').prev('.rd-line').remove();

		$('.rd-element-comments').remove();
 	}
	

 		if( $( "#user-instagram-feed" ).hasClass( "user-instagram-feed" )){
		var access_token = $('#user-instagram-feed').data('token');   
  
		var url = 'https://api.instagram.com/v1/users/self/media/recent/?access_token='+access_token;
		$.ajax({
			type:"GET",
			dataType:"jsonp",
			url: url,
 			success: function(data){
			for (var i = 0; i < 8; i++) {
				if( data.data){
					var images = data.data[i].images;
						$("#user-instagram-feed").append('<li><a href="' + data.data[0].link + '" target="_blank"><img src="'+images.low_resolution.url + '" /></a></li>');
					}
				}
			},
			error: function (data, xhr, desc, err)
				{
					$("#user-instagram-feed").append('<div class="alert alert-danger">An Error Occurred: ' + xhr + ' ' + desc + ' ' + err + '</div>');
					console.log(data);
				}
			});
					
		}
					

 	$('.rd-widget-instagram').each(function(index, element) {
		var ssel_access_token = $(this).data('token');   
		var thiss = $(this);   

		var url = 'https://api.instagram.com/v1/users/self/media/recent/?access_token='+ssel_access_token;
			$.ajax({
				type:"GET",
				dataType:"jsonp",
				url: url,
	
				success: function(data){
					for (var i = 0; i < 9; i++) {
						if( data.data){

                            var images = data.data[i].images;
                             thiss.find('.rd-post-list').append('<div class="rd-post-item rd-col-1-3 "><a href="' + data.data[0].link + '" target="_blank"><img src="'+images.thumbnail.url + '" /></a></div>');
							}
							}
                        },
                        error: function (data, xhr, desc, err)
                        {
                             console.log(data);
                        }
                    });					
                
	}); 
	
	
 	
	
	
	
	
	
 
	// Generated by CoffeeScript 1.9.2
	
	/**
	@license Sticky-kit v1.1.2 | WTFPL | Leaf Corcoran 2015 | http://leafo.net
	 */
	
	(function() {
	  var $, win;
	
	  $ = this.jQuery || window.jQuery;
	
	  win = $(window);
	
	  $.fn.stick_in_parent = function(opts) {
		var doc, elm, enable_bottoming, fn, i, inner_scrolling, len, manual_spacer, offset_top, parent_selector, recalc_every, sticky_class;
		if (opts == null) {
		  opts = {};
		}
		sticky_class = opts.sticky_class, inner_scrolling = opts.inner_scrolling, recalc_every = opts.recalc_every, parent_selector = opts.parent, offset_top = opts.offset_top, manual_spacer = opts.spacer, enable_bottoming = opts.bottoming;
		if (offset_top == null) {
		  offset_top = 0;
		}
		if (parent_selector == null) {
		  parent_selector = void 0;
		}
		if (inner_scrolling == null) {
		  inner_scrolling = true;
		}
		if (sticky_class == null) {
		  sticky_class = "is_stuck";
		}
		doc = $(document);
		if (enable_bottoming == null) {
		  enable_bottoming = true;
		}
		fn = function(elm, padding_bottom, parent_top, parent_height, top, height, el_float, detached) {
		  var bottomed, detach, fixed, last_pos, last_scroll_height, offset, parent, recalc, recalc_and_tick, recalc_counter, spacer, tick;
		  if (elm.data("sticky_kit")) {
			return;
		  }
		  elm.data("sticky_kit", true);
		  last_scroll_height = doc.height();
		  parent = elm.parent();
		  if (parent_selector != null) {
			parent = parent.closest(parent_selector);
		  }
		  if (!parent.length) {
			throw "failed to find stick parent";
		  }
		  fixed = false;
		  bottomed = false;
		  spacer = manual_spacer != null ? manual_spacer && elm.closest(manual_spacer) : $("<div />");
		  if (spacer) {
			spacer.css('position', elm.css('position'));
		  }
		  recalc = function() {
			var border_top, padding_top, restore;
			if (detached) {
			  return;
			}
			last_scroll_height = doc.height();
			border_top = parseInt(parent.css("border-top-width"), 10);
			padding_top = parseInt(parent.css("padding-top"), 10);
			padding_bottom = parseInt(parent.css("padding-bottom"), 10);
			parent_top = parent.offset().top + border_top + padding_top;
			parent_height = parent.height();
			if (fixed) {
			  fixed = false;
			  bottomed = false;
			  if (manual_spacer == null) {
				elm.insertAfter(spacer);
				spacer.detach();
			  }
			  elm.css({
				position: "",
				top: "",
				width: "",
				bottom: ""
			  }).removeClass(sticky_class);
			  restore = true;
			}
			top = elm.offset().top - (parseInt(elm.css("margin-top"), 10) || 0) - offset_top;
			height = elm.outerHeight(true);
			el_float = elm.css("float");
			if (spacer) {
			  spacer.css({
				width: elm.outerWidth(true),
				height: height,
				display: elm.css("display"),
				"vertical-align": elm.css("vertical-align"),
				"float": el_float
			  });
			}
			if (restore) {
			  return tick();
			}
		  };
		  recalc();
		  if (height === parent_height) {
			return;
		  }
		  last_pos = void 0;
		  offset = offset_top;
		  recalc_counter = recalc_every;
		  tick = function() {
			var css, delta, recalced, scroll, will_bottom, win_height;
			if (detached) {
			  return;
			}
			recalced = false;
			if (recalc_counter != null) {
			  recalc_counter -= 1;
			  if (recalc_counter <= 0) {
				recalc_counter = recalc_every;
				recalc();
				recalced = true;
			  }
			}
			if (!recalced && doc.height() !== last_scroll_height) {
			  recalc();
			  recalced = true;
			}
			scroll = win.scrollTop();
			if (last_pos != null) {
			  delta = scroll - last_pos;
			}
			last_pos = scroll;
			if (fixed) {
			  if (enable_bottoming) {
				will_bottom = scroll + height + offset > parent_height + parent_top;
				if (bottomed && !will_bottom) {
				  bottomed = false;
				  elm.css({
					position: "fixed",
					bottom: "",
					top: offset
				  }).trigger("sticky_kit:unbottom");
				}
			  }
			  if (scroll < top) {
				fixed = false;
				offset = offset_top;
				if (manual_spacer == null) {
				  if (el_float === "left" || el_float === "right") {
					elm.insertAfter(spacer);
				  }
				  spacer.detach();
				}
				css = {
				  position: "",
				  width: "",
				  top: ""
				};
				elm.css(css).removeClass(sticky_class).trigger("sticky_kit:unstick");
			  }
			  if (inner_scrolling) {
				win_height = win.height();
				if (height + offset_top > win_height) {
				  if (!bottomed) {
					offset -= delta;
					offset = Math.max(win_height - height, offset);
					offset = Math.min(offset_top, offset);
					if (fixed) {
					  elm.css({
						top: offset + "px"
					  });
					}
				  }
				}
			  }
			} else {
			  if (scroll > top) {
				fixed = true;
				css = {
				  position: "fixed",
				  top: offset
				};
				css.width = elm.css("box-sizing") === "border-box" ? elm.outerWidth() + "px" : elm.width() + "px";
				elm.css(css).addClass(sticky_class);
				if (manual_spacer == null) {
				  elm.after(spacer);
				  if (el_float === "left" || el_float === "right") {
					spacer.append(elm);
				  }
				}
				elm.trigger("sticky_kit:stick");
			  }
			}
			if (fixed && enable_bottoming) {
			  if (will_bottom == null) {
				will_bottom = scroll + height + offset > parent_height + parent_top;
			  }
			  if (!bottomed && will_bottom) {
				bottomed = true;
				if (parent.css("position") === "static") {
				  parent.css({
					position: "relative"
				  });
				}
				return elm.css({
				  position: "absolute",
				  bottom: padding_bottom,
				  top: "auto"
				}).trigger("sticky_kit:bottom");
			  }
			}
		  };
		  recalc_and_tick = function() {
			recalc();
			return tick();
		  };
		  detach = function() {
			detached = true;
			win.off("touchmove", tick);
			win.off("scroll", tick);
			win.off("resize", recalc_and_tick);
			$(document.body).off("sticky_kit:recalc", recalc_and_tick);
			elm.off("sticky_kit:detach", detach);
			elm.removeData("sticky_kit");
			elm.css({
			  position: "",
			  bottom: "",
			  top: "",
			  width: ""
			});
			parent.position("position", "");
			if (fixed) {
			  if (manual_spacer == null) {
				if (el_float === "left" || el_float === "right") {
				  elm.insertAfter(spacer);
				}
				spacer.remove();
			  }
			  return elm.removeClass(sticky_class);
			}
		  };
		  win.on("touchmove", tick);
		  win.on("scroll", tick);
		  win.on("resize", recalc_and_tick);
		  $(document.body).on("sticky_kit:recalc", recalc_and_tick);
		  elm.on("sticky_kit:detach", detach);
		  return setTimeout(tick, 0);
		};
		for (i = 0, len = this.length; i < len; i++) {
		  elm = this[i];
		  fn($(elm));
		}
		return this;
	  };
	
	}).call(this);
	$('.rd-column-sidebar').each(function(index, element) {
		$(this).find(".rd-sticky-sidebar").stick_in_parent();
	
	});
  
 	 rd_img_resize();
 		
	  	 if(jQuery().slick){
	  	 
$('.has-gallery-slider.has-gallery .rd-none-yith .thumbnails .thumbnails-ul').slick({
 infinite: false,
  vertical:true,
  verticalSwiping:true,
  slidesToShow:4,
  slidesToScroll: 1,
  prevArrow: $('#slider-prev'),
  nextArrow: $('#slider-next'),
    responsive: [
                            {
                              breakpoint: 1199,
                              settings: {
                                slidesToShow: 3,
                               }
                            },
                            {
                              breakpoint: 991,
                              settings: {
                                slidesToShow: 4,
                               }
                            },
                            {
                              breakpoint: 767,
                              settings: {
                                slidesToShow: 4,
                               }
                            }
							,
                            {
                              breakpoint: 499,
                              settings: {
                                slidesToShow: 3,
                               }
                            }
 		]
});  
 
		 }
   if(jQuery().ZooMove)
{
	jQuery(document).on("click", ".slick-slide" , function(e){
		e.preventDefault(); 
 		var img = $(this).find('a').attr('href');
		var width = $(this).find('img').attr('width');
		var height = $(this).find('img').attr('height');
	 
		 		$('.rd-single-product-warp .woocommerce-product-gallery__image').children().remove();
		 		$('.rd-single-product-warp .woocommerce-product-gallery__image').children().remove();
		 		$('.rd-single-product-warp .woocommerce-product-gallery__image').children().remove();
				$('.rd-single-product-warp .woocommerce-product-gallery__image').append('<a href="'+img+'"><img src="'+img+'" width="'+width+'" height="'+height+'"></a>')

  		 
	});     
	
	$('.woocommerce-product-gallery__image').hover(
  			function() {
				$(this).ZooMove({
				cursor: 'false',
				scale: '2',
				move: 'true',
				over: 'false'
	  
			});
  			},
			function() {
			 
			 $(this).find('.zoo-img').remove();
			 

 			}
		); 	
		}
 
	
	
	if($('.rd-all-header').hasClass('rd-header-transparent')){
 	 
		 var glass_header = $('.rd-header-transparent').height(); 
 		 $('.rd-wrapper-row').css("margin-top","-"+glass_header+"px"); 
	 }
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 /*
	 
	 	 var height_magnifier_thumbnail= $('.yith_magnifier_thumbnail').height() ;
 		 $('.caroufredsel_wrapper,.yith_magnifier_gallery').css("height",height_magnifier_thumbnail+"px"); 
		$(window).on('load', function () {
			 var height_magnifier_thumbnail= $('.yith_magnifier_thumbnail').height() ;
 			 $('.caroufredsel_wrapper,.yith_magnifier_gallery').css("height",height_magnifier_thumbnail+"px"); 
		});
	
	
	  setInterval(function(){ 
		 var height_magnifier_thumbnail= $('.yith_magnifier_thumbnail').height() ;
 		 $('.caroufredsel_wrapper,.yith_magnifier_gallery').css("height",height_magnifier_thumbnail+"px"); 
	   }, 3000);
	
	$('.rd-single-product .images').on('click', function () {
			 var height_magnifier_thumbnail= $('.yith_magnifier_thumbnail').height() ;
 		 $('.caroufredsel_wrapper,.yith_magnifier_gallery').css("height",height_magnifier_thumbnail+"px"); 
	});
	*/

	
	function social_font_size(){
			$('.rd-widget-social .rd-post-gap-item a').each(function(index, element) {
               var width = $(this).width();
                $(this).css('font-size',width);
 
            });
			
	}
	social_font_size();
 	
	
	
	
	
	$(window).resize(function () { 
	social_font_size();
  	});
		 
	/****************************************************************************************
	ssel_jquerysimplecounterv
	****************************************************************************************/		 
 
	$.fn.ssel_jquerysimplecounter = function( options ) {
			let settings = $.extend({
				start:  0,
				end:    100,
				duration: 200,
				complete: '',
				endcrt: '',
				endcrt_rtl: ''
			}, options );
	
			const thisElement = $(this);
		 if (  thisElement.ssel_visible(true)) {
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
			}
	};	
	
	/****************************************************************************************
	animateCountNumber
	****************************************************************************************/
	function animateCountNumber() {
	$('.rd-none-edit.rd-count-number').each(function(index, element) {
		var	elem = $(this);
 		var number =$(this).attr('data-number');
 		var endnumber =$(this).attr('end-number');
 		var duration =  parseInt($(this).attr('data-duration'));
    		
		 	 
	  if(!$(this).hasClass('animated') &&$(this).ssel_visible(true)){
			setTimeout(function() {
					elem.addClass('animated');
			}, duration);
  			elem.ssel_jquerysimplecounter({
				start:  0,
				end:    number,
				duration: duration,
				endcrt: endnumber,
			});
		  }
		});

	  }
	/****************************************************************************************
	animatePieChart
	****************************************************************************************/ 
 	
	function animatePieChart(){
 		$('.rd-none-edit.rd-chart').each(function(index, element) {
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
    	  if(!$(this).hasClass('animated') && $(this).ssel_visible(true)){
	 
		setTimeout(function() {
					elem.addClass('animated');
			}, duration); 
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
 			chart_percent.ssel_jquerysimplecounter({
						start:  0,
						end:    percent,
						duration: duration,
						endcrt:end_percentage,
						endcrt_rtl: true,

			});
		  
  }
	  
	  
		});	 
	}	 
  
  
	/****************************************************************************************
	animateProgressBar
	****************************************************************************************/ 
 	
  
  	function animateProgressBar() {
		$('.rd-none-edit.rd-progress-bar-item').each(function(i, elem) {
				var	elem = $(this).find('.pro-bar');
				var percent = $(this).find('.pro-bar').attr('data-pro-bar-percent');
 				var pro_delay = $(this).find('.pro-bar').attr('data-pro-bar-delay');
				var pro_duration =  parseInt($(this).find('.pro-bar').attr('data-pro-bar-duration'));
				var count_percent = $(this).find('.rd-progress-bar-percent');

 	  	  if(!$(this).hasClass('animated') && $(this).ssel_visible(true)){
				setTimeout(function() {
					elem.animate({ 'width' : percent + '%' }, pro_duration);
				}, pro_delay);
			  
				count_percent.ssel_jquerysimplecounter({
					start:  0,
					end: percent,
			 	duration: pro_duration,
									endcrt:'%',

 					endcrt_rtl:true
  				});
		 }			
			
		});
	}
  
  
	
	$(window).on('load', function () {
		auto_width($('body'));
 
 			setTimeout(function(){   
				$('.macy-masonry .rd-post-list').each(function(index, element) {
					macy_masonry($(this));
				});
			},500); 
			auto_width($('body'));
			
 	setTimeout(function(){
 		animatePieChart();
		animateCountNumber();
		animateProgressBar();
		}, 2000); 
			
			
   		});
 
	setTimeout(function(){
		auto_width($('body'));
		animatePieChart();
		animateCountNumber();
		animateProgressBar();
		}, 1000); 

 
 

	 
  	$(window).resize(function() {
		animatePieChart();
		animateCountNumber();
			animateProgressBar();
	
	});
//	
    if(ssel_js.ssel_mobile =='no' ){
	$(window).scroll(function() {
				animatePieChart();
		animateCountNumber();
			animateProgressBar();
	
   		if ($(window).scrollTop() + $(window).height() == $(document).height())
		animatePieChart();
		animateCountNumber();
				animateProgressBar();

	}); 
	 
 }
	 
	  	 
	  
 });
 })(jQuery);
!function(e,n){"function"==typeof define&&define.amd?define(["exports"],n):"undefined"!=typeof exports?n(exports):n(e.dragscroll={})}(this,function(e){var n,t,o=window,r=document,i=[],l=function(e,l){for(e=0;e<i.length;)(l=(l=i[e++]).container||l).removeEventListener("mousedown",l.md,0),o.removeEventListener("mouseup",l.mu,0),o.removeEventListener("mousemove",l.mm,0);for(i=[].slice.call(r.getElementsByClassName("dragscroll")),e=0;e<i.length;)!function(e,i,l,s,d,m){(m=e.container||e).addEventListener("mousedown",m.md=function(n){e.hasAttribute("nochilddrag")&&r.elementFromPoint(n.pageX,n.pageY)!=m||(s=1,i=n.clientX,l=n.clientY,n.preventDefault())},0),o.addEventListener("mouseup",m.mu=function(){s=0},0),o.addEventListener("mousemove",m.mm=function(o){s&&((d=e.scroller||e).scrollLeft-=n=-i+(i=o.clientX),d.scrollTop-=t=-l+(l=o.clientY),e==r.body&&((d=r.documentElement).scrollLeft-=n,d.scrollTop-=t))},0)}(i[e++])};"complete"==r.readyState?l():o.addEventListener("load",l,0),e.reset=l});