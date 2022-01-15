<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																		Socail Icons
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'sao_element_item_social_icons' ) ) {

add_filter('sao_element_item', 'sao_element_item_social_icons');
function sao_element_item_social_icons( $element ) {
 	
 	$element[]= array(
 		'name'			=> 	esc_html__('Socail Icons','ssel'),
 		'id'			=> 'social_icons',
		'img'			=>  SSEL_DIR.'/admin/assets/images/element-social.jpg',
  	); 
   
	return $element;
}  
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																		Socail Icons Options
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_social_icons_options' ) ) {

add_filter('sao_element_options_social_icons', 'ssel_social_icons_options');
function ssel_social_icons_options( $option ) {
 

					
	$option[] = array( 
		"name" 		=> esc_html__('RSS' , 'ssel'),
		"desc" 		=> esc_html__('Insert your custom link to show the RSS icon. Leave blank to hide icon' , 'ssel' ),
		"id" 		=> "social_rss",
		"default" 		=> "#",
		"type" 		=> "text"
	); 
					
	$option[] = array(
			"name" 		=> esc_html__('Facebook' , 'ssel'),
			"desc" 		=> esc_html__('Insert your custom link to show the Facebook icon. Leave blank to hide icon' , 'ssel' ),
			"id" 		=> "social_facebook",
			"default"	=> "#",
			"type" 		=> "text"
	); 
					
	$option[] = array( 
			"name" 		=> esc_html__('Twitter' , 'ssel'),
			"desc" 		=> esc_html__('Insert your custom link to show the Twitter icon. Leave blank to hide icon' , 'ssel' ),
			"id" 		=> "social_twitter",
			"default" 		=> "#",
			"type" 		=> "text"
	);
	
	$option[] = array(
			"name" 		=> esc_html__('Google+' , 'ssel'),
			"desc" 		=> esc_html__('Insert your custom link to show the Google+ icon. Leave blank to hide icon' , 'ssel' ),
			"id" 		=> "social_googleplus",
			"default" 		=> "#",
			"type" 		=> "text"
	);		
					
	$option[] = array(
			"name" 		=> esc_html__('Telegram' , 'ssel' ),
			"desc" 		=> esc_html__('Insert your custom link to show the Telegram icon. Leave blank to hide icon' , 'ssel' ),
			"id" 		=> "social_telegram",
			"default" 		=> "#",
			"type" 		=> "text"
	);	
	
	 
					
	$option[] = array(
			"name" 		=> esc_html__('dribbble' , 'ssel' ),
			"desc" 		=> esc_html__('Insert your custom link to show the dribbble icon. Leave blank to hide icon' , 'ssel' ),
			"id" 		=> "social_dribbble",
			"default" 		=> "",
			"type" 		=> "text"
	);					
	
	$option[] = array( "name" 		=> esc_html__('LinkedIn' , 'ssel' ),
							"desc" 		=> esc_html__('Insert your custom link to show the LinkedIn icon. Leave blank to hide icon' , 'ssel' ),
							"id" 		=> "social_linkedIn",
							"default" 		=> "",
							"type" 		=> "text"
					);		
					
	 $option[] = array( "name" 		=> esc_html__('Dropbox' , 'ssel' ),
							"desc" 		=> esc_html__('Insert your custom link to show the Dropbox icon. Leave blank to hide icon' , 'ssel' ),
							"id" 		=> "social_dropbox",
							"default" 		=> "",
							"type" 		=> "text"
					);	
	
	$option[] = array( "name" 		=> esc_html__('Flickr' , 'ssel' ),
							"desc" 		=> esc_html__('Insert your custom link to show the Flickr icon. Leave blank to hide icon' , 'ssel' ),
							"id" 		=> "social_flickr",
							"default" 		=> "",
							"type" 		=> "text"
					);	
					
	$option[] = array( "name" 		=> esc_html__('DeviantArt' , 'ssel' ),
							"desc" 		=> esc_html__('Insert your custom link to show the DeviantArt icon. Leave blank to hide icon' , 'ssel' ),
							"id" 		=> "social_deviantArt",
							"default" 		=> "",
							"type" 		=> "text"
					);	
					
	$option[] = array( "name" 		=> esc_html__('YouTube' , 'ssel' ),
							"desc" 		=> esc_html__('Insert your custom link to show the YouTube icon. Leave blank to hide icon' , 'ssel' ),
							"id" 		=> "social_youTube",
							"default" 		=> "",
							"type" 		=> "text"
					);		
					
	$option[] = array( "name" 		=> esc_html__('Yahoo' , 'ssel' ),
							"desc" 		=> esc_html__('Insert your custom link to show the yahoo icon. Leave blank to hide icon' , 'ssel' ),
							"id" 		=> "social_yahoo",
							"default" 		=> "",
							"type" 		=> "text"
					);
						
	$option[] = array( "name" 		=> esc_html__('Vimeo' , 'ssel' ),
							"desc" 		=> esc_html__('Insert your custom link to show the Vimeo icon. Leave blank to hide icon' , 'ssel' ),
							"id" 		=> "social_vimeo",
							"default" 		=> "",
							"type" 		=> "text"
					);					
	
	$option[] = array( "name" 		=> esc_html__('Skype' , 'ssel' ),
							"desc" 		=> esc_html__('Insert your custom link to show the Skype icon. Leave blank to hide icon' , 'ssel' ),
							"id" 		=> "social_skype",
							"default" 		=> "",
							"type" 		=> "text"
					);	
					
	$option[] = array( "name" 		=> esc_html__('Digg' , 'ssel' ),
							"desc" 		=> esc_html__('Insert your custom link to show the Digg icon. Leave blank to hide icon' , 'ssel' ),
							"id" 		=> "social_digg",
							"default" 		=> "",
							"type" 		=> "text"
					);	
					
	$option[] = array( "name" 		=> esc_html__('StumbleUpon' , 'ssel' ),
							"desc" 		=> esc_html__('Insert your custom link to show the StumbleUpon icon. Leave blank to hide icon' , 'ssel' ),
							"id" 		=> "social_stumbleUpon",
							"default" 		=> "",
							"type" 		=> "text"
					);	
						
	$option[] = array( "name" 		=> esc_html__('Tumblr' , 'ssel' ),
							"desc" 		=> esc_html__('Insert your custom link to show the Tumblr icon. Leave blank to hide icon' , 'ssel' ),
							"id" 		=> "social_tumblr",
							"default" 		=> "",
							"type" 		=> "text"
					);	
	 
																	
	$option[] = array( "name" 		=> esc_html__('Pinterest' , 'ssel' ),
							"desc" 		=> esc_html__('Insert your custom link to show the Pinterest icon. Leave blank to hide icon' , 'ssel' ),
							"id" 		=> "social_pinterest",
							"default" 		=> "",
							"type" 		=> "text"
					);	
								
	$option[] = array( "name" 		=> esc_html__('Instagram' , 'ssel' ),
							"desc" 		=> esc_html__('Insert your custom link to show the Instagram icon. Leave blank to hide icon' , 'ssel' ),
							"id" 		=> "social_instagram",
							"default" 		=> "",
							"type" 		=> "text"
					);	
								
	$option[] = array( "name" 		=> esc_html__('PayPal' , 'ssel' ),
							"desc" 		=> esc_html__('Insert your custom link to show the PayPal icon. Leave blank to hide icon' , 'ssel' ),
							"id" 		=> "social_paypal",
							"default" 		=> "",
							"type" 		=> "text"
					);				
								
	$option[] = array( "name" 		=> esc_html__('Behance' , 'ssel' ),
							"desc" 		=> esc_html__('Insert your custom link to show the Behance icon. Leave blank to hide icon' , 'ssel' ),
							"id" 		=> "social_behance",
							"default" 		=> "",
							"type" 		=> "text"
					);			
					
					
	
					
		if(is_rtl()){				
	$option[] = array( "name" 		=> esc_html__('Aparat' , 'ssel' ),
							"desc" 		=> esc_html__('Insert your custom link to show the Aparat icon. Leave blank to hide icon' , 'ssel' ),
							"id" 		=> "social_aparat",
							"default" 		=> "",
							"type" 		=> "text"
					);							 		
							
	$option[] = array( "name" 		=> esc_html__('Bisphone' , 'ssel' ),
							"desc" 		=> esc_html__('Insert your custom link to show the Bisphone icon. Leave blank to hide icon' , 'ssel' ),
							"id" 		=> "social_bisphone",
							"default" 		=> "",
							"type" 		=> "text"
					);		
					
							
	$option[] = array( "name" 		=> esc_html__('Bale' , 'ssel' ),
							"desc" 		=> esc_html__('Insert your custom link to show the Bale icon. Leave blank to hide icon' , 'ssel' ),
							"id" 		=> "social_bale",
							"default" 		=> "",
							"type" 		=> "text"
					);						
							
				
	$option[] = array( "name" 		=> esc_html__('Wispi' , 'ssel' ),
							"desc" 		=> esc_html__('Insert your custom link to show the Wispi icon. Leave blank to hide icon' , 'ssel' ),
							"id" 		=> "social_wispi",
							"default" 		=> "",
							"type" 		=> "text"
					);		
					
					
	$option[] = array( "name" 		=> esc_html__('iGap' , 'ssel' ),
							"desc" 		=> esc_html__('Insert your custom link to show the iGap icon. Leave blank to hide icon' , 'ssel' ),
							"id" 		=> "social_igap",
							"default" 		=> "",
							"type" 		=> "text"
					);		
					
	$option[] = array( "name" 		=> esc_html__('Soroush' , 'ssel' ),
							"desc" 		=> esc_html__('Insert your custom link to show the Soroush icon. Leave blank to hide icon' , 'ssel' ),
							"id" 		=> "social_soroush",
							"default" 		=> "",
							"type" 		=> "text"
					);		
					
	$option[] = array( "name" 		=> esc_html__('Eitaa' , 'ssel' ),
							"desc" 		=> esc_html__('Insert your custom link to show the Eitaa icon. Leave blank to hide icon' , 'ssel' ),
							"id" 		=> "social_eitaa",
							"default" 		=> "",
							"type" 		=> "text"
					);	
		}
	 	 
 
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
					"5px" 	=> "5px",
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
			'left'			=>  esc_html__('Left','ssel'),
			'center'		=>  esc_html__('Center','ssel'),
 			'right'			=>  esc_html__('Right','ssel'),											
			 
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
		"name"			=> __('Social Icon Size','ssel'),
 		"id"			=> "icon_size",
		"group"			=>  esc_html__('Social Icon','ssel'),
 		"type"			=> "number",
		 
		
		 						

 	); 	
	$option[]= array( 
		"name"			=> __('Icon Style','ssel'),
 		"id"			=> "icon_style",
		"group"			=>  esc_html__('Social Icon','ssel'),
 		"type"			=> "select",
		"options"		=> array(
			"style-1" => esc_html__('Style 1: only icon','ssel'),
			"style-2" => esc_html__('Style 2: Boxed Icon','ssel'),
			"style-3" => esc_html__('Style 3: Boxed Original Color','ssel'),
		),						
	); 
	$option[]= array( 
		"name"			=> __('Social Icon Color','ssel'),
 		"id"			=> "icon_color",
		"fold"			=>  array(
			'style-1'			=>'icon_style',
			'style-2'			=>'icon_style',
 		),		
		"group"			=>  esc_html__('Social Icon','ssel'),
 		"type"			=> "color_rgba",
 	); 	
	
	$option[]= array( 
		"name"			=> __('Social Icon Background','ssel'),
 		"id"			=> "icon_background",
		"fold"			=>  array(
 			'style-2'			=>'icon_style',
 		),	
		"group"			=>  esc_html__('Social Icon','ssel'),
 		"type"			=> "color_rgba",
 	); 	
			
	
	$option[]= array( 
		"name"			=> __('Social Icon Border Color','ssel'),
 		"id"			=> "icon_border_color",
 		"group"			=>  esc_html__('Social Icon','ssel'),
 		"type"			=> "color_rgba",
 	); 	
	
	 
 	$option[]= array( 
		"name"			=> __('Social Icon Border Radius','ssel'),
 		"id"			=> "icon_radius",
		"fold"			=>  array(
 			'style-2'			=>'icon_style',
 			'style-3'			=>'icon_style',
 		),	
		"group"			=>  esc_html__('Social Icon','ssel'),
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

																		Socail Icons Config
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_social_icons_config' ) ) {

add_filter('sao_builder_social_icons', 'ssel_social_icons_config');
function ssel_social_icons_config( $args ) {
 
 
 
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
	
	$social_url= !empty($option['social_url']) ?$option['social_url']:'';
	$alignment= !empty($option['alignment']) ?$option['alignment']:'left';
	$between= !empty($option['between']) ?$option['between']:'10px';
	$icon_size= !empty($option['icon_size']) ?$option['icon_size']:'';
	$style = !empty($option['icon_style']) ?$option['icon_style']:'style-1';
 			 

	echo '<div class="rd-social-icons rd-color-main rd-between-'.esc_attr($between).' rd-alignment-'.esc_attr($alignment).' rd-social-'.esc_attr($style).'">';

		 	echo '<ul class="rd-post-gap-warp rd-font-medium">';
			 
			ssel_social($option);
  
		 	echo '</ul>';
 
	echo '</div>';	
	 
	$item = '.sao-element-'.$key.' '; 
	$css.=ssel_social_icon_css( $option,$item);
 	 
	 
	$css.=ssel_element_padding( $key,$option); 
 	
   	$return['output']=  ob_get_clean();;
  	$return['css']= $css;
	
	return $return;	
}
}
 }
 
?>