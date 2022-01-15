<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																		Share Icons 
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'sao_element_item_share_icons' ) ) {

add_filter('sao_element_item', 'sao_element_item_share_icons');
function sao_element_item_share_icons( $element ) {
 	
 	$element[]=array(
 		'name'			=> 	esc_html__('Share Icons','ssel'),
 		'id'			=> 'share_icons',
		'img'			=>  SSEL_DIR.'/admin/assets/images/element-share.jpg',
  	); 
   
	return $element;
}  
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																		Share Icons Options
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_share_icons_options' ) ) {

add_filter('sao_element_options_share_icons', 'ssel_share_icons_options');
function ssel_share_icons_options( $option ) {
  

	$option[]= array( 
		"name"			=> __('URL Share','ssel'),
 		"id"			=> "share_url",
 		"type"			=> "text",
 		"default"		=> "http://google.com",
		 
 	);
	
	$option[]= array( 
		"name"			=> __('Share on Facebook','ssel'),
 		"id"			=> "facebook",
  		"type"			=> "checkbox",
 		"default"		=> 1,
 	);
	
	$option[]= array( 
		"name"			=> __('Share on Twitter','ssel'),
 		"id"			=> "twitter",
  		"type"			=> "checkbox",
 		"default"		=> 1,
 	);
	
	$option[]= array( 
		"name"			=> __('Share on Google+','ssel'),
 		"id"			=> "googleplus",
  		"type"			=> "checkbox",
 		"default"		=> 1,
 	);
	
	$option[]= array( 
		"name"			=> __('Share on Tumblr','ssel'),
 		"id"			=> "tumblr",
 		"default"		=> 1,
  		"type"			=> "checkbox",
 	);
	
	$option[]= array( 
		"name"			=> __('Share on Linkedin','ssel'),
 		"id"			=> "linkedin",
 		"default"		=> 1,
  		"type"			=> "checkbox",
 	);				


	
	$option[]= array( 
		"name"			=> __('Share by Reddit','ssel'),
 		"id"			=> "reddit",
 		"default"		=> 1,
		
  		"type"			=> "checkbox",
 	);				
	
	$option[]= array( 
		"name"			=> __('Share by Telegram','ssel'),
 		"id"			=> "telegram",
 		"default"		=> 1,
  		"type"			=> "checkbox",
 	);				 	 
		   
	
	$option[]= array( 
		"name"			=> __('Share by Mail','ssel'),
 		"id"			=> "mail",
  		"type"			=> "checkbox",
 		"default"		=> 1,
 	);				
	 	 
 
	$option[]= array( 
		
	
		"name"			=> esc_html__('Space Between Item','ssel'),
 		"id"			=> "between",
 		"group"			=>  esc_html__('Layout','ssel'),
		"type"			=> "select",
  		"default"		=>  '',
		"options" 		=>	array(
			"" 	=>__('Default','ssel'),
			"0px" 	=> "0px",
			"2px" 	=> "2px",
  			"10px" 	=> "10px",
			"15px" 	=> "15px",
			"20px" 	=> "20px",
 			"30px" 	=> "30px",
			"40px" 	=> "40px",
 		 ),
  	); 	 	 	 	 
	$option[]= array( 
		"name"			=> __('Alignment','ssel'),
 		"id"			=> "alignment",
  		"group"			=>  __('Layout','ssel'),
		"default"		=>  'center',
		"desc"			=>  __('Default "Center"','ssel'),
		"type"			=> "select",
		"options"		=>  array( 
			'' 			=> 	__('Default','ssel'),
			'left'			=>   esc_html__('Left','ssel'),
			'center'		=>  esc_html__('Center','ssel'),
 			'right'			=>   esc_html__('Right','ssel'),											
			 
		),					
		 
	);
 
 	$option[]= array( 
		"name"			=> __('Padding','ssel'),
 		"id"			=> "padding",
  		"group"			=>  __('Layout','ssel'),
		"default"		=>  array( 
			"top"			=> '20',
			"left"			=> '20',
			"bottom"		=> '20',
			"right"			=> '20',
 			), 
		
		"type"			=> "multi_options",
 		"options"		=>  sao_multi_array_options('margin'),						
 	);
	 
	 
 
 	$option[]= array( 
		"name"			=> esc_html__('CSS Animation','ssel'),
 		"id"			=> "cssanime",
		"desc"			=>  esc_html__('Select type of animation if you want this element to be animated when it enters into the browsers viewport. Note: Works only in modern browsers.','ssel'),
 		"group"			=>  esc_html__('Layout','ssel'),
		"type"			=> "select",
 		"options"		=>  sao_array_options('cssanime'),						
 	);
	
	$option[]= array( 
		"name"			=> __('Share Icon Size','ssel'),
 		"id"			=> "icon_size",
		"group"			=>  esc_html__('Share Icon','ssel'),
 		"type"			=> "number",
		 
		
		 						

 	); 	
	
	$option[]= array( 
		"name"			=> __('Icon Style','ssel'),
 		"id"			=> "icon_style",
		"group"			=>  esc_html__('Share Icon','ssel'),
 		"type"			=> "select",
		"options"		=> array(
			"style-1" => esc_html__('Style 1: only icon','ssel'),
			"style-2" => esc_html__('Style 2: Boxed Icon','ssel'),
			"style-3" => esc_html__('Style 3: Boxed Original Color','ssel'),
		),						
	); 
	$option[]= array( 
		"name"			=> __('Share Icon Color','ssel'),
 		"id"			=> "icon_color",
		"fold"			=>  array(
			'style-1'			=>'icon_style',
			'style-2'			=>'icon_style',
 		),		
		"group"			=>  esc_html__('Share Icon','ssel'),
 		"type"			=> "color_rgba",
 	); 	
	
	$option[]= array( 
		"name"			=> __('Social Icon Background','ssel'),
 		"id"			=> "icon_background",
		"fold"			=>  array(
 			'style-2'			=>'icon_style',
 		),	
		"group"			=>  esc_html__('Share Icon','ssel'),
 		"type"			=> "color_rgba",
 	); 	
			
	
	$option[]= array( 
		"name"			=> __('Share Icon Border Color','ssel'),
 		"id"			=> "icon_border_color",
		"fold"			=>  array(
 			'style-2'			=>'icon_style',
 		),	
		"group"			=>  esc_html__('Share Icon','ssel'),
 		"type"			=> "color_rgba",
 	); 	
	
	 
 	$option[]= array( 
		"name"			=> __('Share Icon Border Radius','ssel'),
 		"id"			=> "icon_radius",
		"fold"			=>  array(
 			'style-2'			=>'icon_style',
 			'style-3'			=>'icon_style',
 		),	
		"group"			=>  esc_html__('Share Icon','ssel'),
 		"type"			=> "select",
  		"options"		=>  ssel_array_options('radius'),						
	 
	); 	 

	  
	$option[]= array( 
		"name"			=> esc_html__('Element ID','ssel'),
 		"id"			=> "element_id",
 		"group"			=>  esc_html__('Attribute','ssel'),
		"desc"			=>  esc_html__('Enter Column ID ,','ssel').'<a href="https://www.w3schools.com/tags/att_global_id.asp">'.esc_html__('Learn more','ssel').'</a>',
		"type"			=> "text",
		 
	);
	
	$option[]= array( 
		"name"			=> esc_html__('Element Custom Class','ssel'),
 		"id"			=> "custom_class",
 		"group"			=>  esc_html__('Attribute','ssel'),
		"desc"			=>  esc_html__('Enter Class ,','ssel'),
		"type"		=> "text",

	);				 
 	 
    return $option;
} 
 }
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																		Share Icons Config
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_share_icons_config' ) ) {
add_filter('sao_builder_share_icons', 'ssel_share_icons_config');
function ssel_share_icons_config( $args ,$out = false ) {
 
	$option = $args['option'];
	$key = $args['key'];
	$output='';
	$css ='';
	$ssel_ismobile=ssel_ismobile();	 
 	if(!empty($option['hide_mobile'])){
 		$is_mobile =!empty($ssel_ismobile)? 'hide':'show';
	}else{
		$is_mobile ='show';
	}
	if($is_mobile =='show'){
	ob_start(); 
	
	$share_url= !empty($option['share_url']) ?$option['share_url']:'';
	$alignment= !empty($option['alignment']) ?$option['alignment']:'right';
	$between= !empty($option['between']) ?$option['between']:'10px';
	$icon_size= !empty($option['icon_size']) ?$option['icon_size']:'medium';
 			 
	$style = !empty($option['icon_style']) ?$option['icon_style']:'style-1';

	echo '<div class="rd-share-icons rd-between-'.$between.' rd-alignment-'.$alignment.' rd-share-'.$style.'">';

		 	echo '<ul class="rd-post-gap-warp rd-font-'.esc_attr($icon_size).'">';
			if(!empty($option['facebook'])|| !empty($out)){
				$facebook_url ="popup = window.open('http://www.facebook.com/sharer.php?u=".$share_url."&t=', 'PopupPage', 'height=450,width=500,scrollbars=yes,resizable=yes'); return false";
				echo '<li class="rd-share-facebook rd-post-gap-item">';
					echo '<a class="fa fa-facebook" onClick="'.esc_html($facebook_url).'"></a>';
				echo '</li>';
			} 
			
			if(!empty($option['twitter']) || !empty($out) ){
				$twitter_url ="popup = window.open('http://twitter.com/home?status= ".$share_url."', 'PopupPage', 'height=450,width=500,scrollbars=yes,resizable=yes'); return false";
 				echo '<li class="rd-share-twitter rd-post-gap-item">';
					echo '<a class="fa fa-twitter" onClick="'.esc_html($twitter_url).'"></a>';
				echo '</li>';
			} 
			
			if(!empty($option['googleplus'])|| !empty($out)){
				
				$googleplus_url ="popup = window.open('https://plus.google.com/share?url=".$share_url."&title=', 'PopupPage', 'height=450,width=500,scrollbars=yes,resizable=yes'); return false";
				echo '<li class="rd-share-googleplus rd-post-gap-item">';
					echo '<a class="fa fa-google-plus" onClick="'.esc_html($googleplus_url).'"></a>';
				echo '</li>';
			} 
						
			if(!empty($option['tumblr'])|| !empty($out)){
  				$tumblr_url = "popup = window.open('http://www.tumblr.com/share/link?url=".$share_url."&name=&description=', 'PopupPage', 'height=450,width=500,scrollbars=yes,resizable=yes'); return false";	
				
				echo '<li class="rd-share-tumblr rd-post-gap-item">';
					echo '<a class="fa fa-tumblr"  onClick="'.esc_html($tumblr_url).'" ></a>';
				echo '</li>';
			} 
			if(!empty($option['linkedin'])|| !empty($out)){
 				$linkedin_url ="popup = window.open('http://linkedin.com/shareArticle?mini=true&url=".$share_url."&title=', 'PopupPage', 'height=450,width=500,scrollbars=yes,resizable=yes'); return false";	
				echo '<li class="rd-share-linkedin rd-post-gap-item">';
					echo '<a class="fa fa-linkedin" onClick="'.esc_html($linkedin_url).'"></a>';
				echo '</li>';
			} 	

			if(!empty($option['reddit']) || !empty($out) ){
				$reddit_url = "popup = window.open('http://reddit.com/submit?url=http://www.google.com&title=', 'PopupPage', 'height=450,width=500,scrollbars=yes,resizable=yes'); return false";
				
				echo '<li class="rd-share-reddit rd-post-gap-item">';
					echo '<a class="fa fa-reddit" onClick="'.esc_html($reddit_url).'"></a>';
				echo '</li>';
			} 
			if(!empty($option['telegram']) || !empty($out) ){
				$telegram_url = "popup = window.open('tg://msg?text=".$share_url."', 'PopupPage', 'height=450,width=500,scrollbars=yes,resizable=yes'); return false";
				echo '<li class="rd-share-telegram rd-post-gap-item">';
					echo '<a class="fa fa-telegram"  onClick="'.esc_html($telegram_url).'" ></a>';
				echo '</li>';
			} 		
	
			if(!empty($option['mail'])|| !empty($out) ){
				$mail_url = "popup = window.open('mailto:?subject=&body=".$share_url."', 'PopupPage', 'height=450,width=500,scrollbars=yes,resizable=yes'); return false";
				echo '<li class="rd-share-mail rd-post-gap-item">';
					echo '<a class="fa fa-envelope-o" onClick="'.esc_html($mail_url).'" ></a>';
				echo '</li>';
			} 						
			
								
								
		 	echo '</ul>';


	echo '</div>';	
	 
	$item = '.sao-element-'.$key.' '; 
 	$icon_css='';
 	if(!empty($option['icon_size'])){
 		$icon_css.= "font-size:".$option['icon_size']."px !important;";
 	}
	$css.= ssel_element_item_css($icon_css , $item .' .rd-share-icons a');
	$text_color = ssel_element_text_css( $option,'icon_color');
   	$css.= ssel_element_item_css($text_color , $item .' .rd-share-icons.rd-share-style-1 a,'.$item .' .rd-share-icons.rd-share-style-2 li a');
	
 	$icon_border= ssel_element_border_css( $option,'icon_border_color');
 	$icon_border.= ssel_element_radius_css($option,'icon_radius');
   	$css.= ssel_element_item_css($icon_border , $item .' .rd-share-icons.rd-share-style-2 a,'.$item .' .rd-share-icons.rd-share-style-3 li a');
	
	$icon_background= ssel_element_background_color_css( $option,'icon_background');
	$css.= ssel_element_item_css($icon_background , $item .' .rd-share-icons.rd-share-style-2 a');

	 
	$css.=ssel_element_padding( $key,$option); 
 	
   	$return['output']=  ob_get_clean();;
  	$return['css']= $css;
	
	return !empty($out)? $return['output'] :$return;	
}
}
 }
 
?>