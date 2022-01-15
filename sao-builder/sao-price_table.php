<?php
 if( ! function_exists( 'sao_element_item_price_table' ) ) {

add_filter('sao_element_item', 'sao_element_item_price_table');
function sao_element_item_price_table( $element ) {
 	
 	$element[]= array(
 		'name'			=> 	esc_html__('Price Table','ssel'),
 		'id'			=> 'price_table',
		'img'			=>  SSEL_DIR.'/admin/assets/images/element-price.jpg',
  	); 
	
	return $element;
}  
 }
 if( ! function_exists( 'ssel_price_table_options' ) ) {

add_filter('sao_element_options_price_table', 'ssel_price_table_options');
function ssel_price_table_options( $option ) {
 
			
	$option[]= array( 
 		"group"			=>  esc_html__('General','ssel'),		  
	);	
	$option[]= array( 
 		"group"			=>  esc_html__('Layout','ssel'),		  
	);	
	
	 
 
	$option[]= array( 
		"name"			=> esc_html__('Price Table','ssel'),
 		"id"			=> "pricetable",
  		"type"			=> "select",
 		"options"		=>  ssel_array_options('pricetable'),						
 	);	


$option[]= array( 
		"name"			=> esc_html__('Show Recommend','ssel'),
 		"id"			=> "recommend",
  		"default"		=>  1,
  		"type"			=> "checkbox",
  	);	     	
 	
 
	$option[]= array( 
		"name"			=> __('Price Layout','ssel'),
 		"id"			=> "price_layout",
  		"default"		=>  'layout-2',
  		"type"			=> "select",
		"options"			=>	array( 	
 				"layout-1"		=> 	__('Layout 1','ssel'),
 				"layout-2"		=> 	__('Layout 2','ssel'),
 				"layout-3"		=> 	__('Layout 3','ssel'),
   			
 		), 			
 	); 	
	 

	$option[]= array( 
		"name"			=> esc_html__('Column','ssel'),
 		"id"			=> "layout",
 		"group"			=>  esc_html__('Layout','ssel'),
  		"default"		=> '4',
		"type"			=> "select",
   		"options"		=>  array( 
 			"1"	=> '1', 
 			"2"	=> '2', 
 			"3"	=> '3', 
 			"4"	=> '4', 
 			"5"	=> '5', 
 			"6"	=> '6', 
			
 		),						
				  
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
			"60px" 	=> "60px",
 		 ),
  	); 	 	
 
	/********************************************************************
	Box Style
	*********************************************************************/
	$option[]= array( 
		"name"			=> __('Price Style','ssel'),
 		"id"			=> "price_style",
 		"group"			=>  esc_html__('Style','ssel'),
  		"type"			=> "select",
		"options"			=>	array( 	
 				"style-1"		=> 	__('Style 1','ssel'),
 				"style-2"		=> 	__('Style 2','ssel'),
 				"style-3"		=> 	__('Style 3','ssel'),
 				"style-4"		=> 	__('Style 4','ssel'),
 				"style-5"		=> 	__('Style 5','ssel'),
 				"style-6"		=> 	__('Style 6','ssel'),
 				"style-7"		=> 	__('Style 7','ssel'),
 				"style-8"		=> 	__('Style 8','ssel'),
 				"style-9"		=> 	__('Style 9','ssel'),
 				"style-10"		=> 	__('Style 10','ssel'), 
    			
 		), 			
 	); 	
 
  	$option[]= array( 
		"name"			=>   __('All Primary Color','ssel'),
 		"id"			=> "main_primary_color",
 		"group"			=>  esc_html__('Style','ssel'),
  		"type"			=> "color",
 	); 
	 
  	$option[]= array( 
		"name"			=>   __('Recommend Primary Color','ssel'),
 		"id"			=> "recommend_primary_color",
 		"group"			=>  esc_html__('Style','ssel'),
 
 		"type"			=> "color",
 	);
 	$option[]= array( 
		"name"			=>   __('Hover Primary Color','ssel'),
 		"id"			=> "hover_primary_color",
 		"group"			=>  esc_html__('Style','ssel'),
  		"type"			=> "color",
 	); 	
	 
 
	
	
		 
	$option[]= array( 
		"name"			=>  __('Background Color','ssel'),
 		"id"			=>  "background",
		"fold"			=>	array( 	
  					"style-1"				=> "price_style",
  					"style-2"				=> "price_style",
  					"style-3"				=> "price_style",
  					"style-4"				=> "price_style",
  					"style-6"				=> "price_style",
  					"style-7"				=> "price_style",
  					"style-8"				=> "price_style",
  					"style-9"				=> "price_style",
		), 
 		"group"			=>  esc_html__('Style','ssel'),
   		"type"			=> "multi_options",
 		"options"			=>	array( 	 			 
 			array( 
 				"name"			=> 	__('Background','ssel'),
 				"id"			=> "background",
  				"type"			=> "color_rgba",
  			
 			), 			
			array( 
 				"name"			=> 	__('Background 2','ssel'),
 				"id"			=> "background_2",
				"fold"			=>	array( 	
  					"style-6"				=> "price_style",
  					"style-7"				=> "price_style",
  					"style-8"				=> "price_style",
  					"style-9"				=> "price_style",
  					"style-10"				=> "price_style",
   				), 
  				"type"			=> "color_rgba",
  			),		
			 
		), 			
 	); 
 
		
	
	$option[]= array( 
		"name"			=>  __('Text Color','ssel'),
 		"id"			=>  "text_color",
		"fold"			=>	array( 	
  					"style-1"				=> "price_style",
  					"style-2"				=> "price_style",
  					"style-3"				=> "price_style",
  					"style-4"				=> "price_style",
  					"style-6"				=> "price_style",
  					"style-7"				=> "price_style",
  					"style-8"				=> "price_style",
  					"style-9"				=> "price_style",
		), 
 		"group"			=>  esc_html__('Style','ssel'),
  		"type"			=> "color",
 	); 	
 
	
	$option[]= array( 
		"name"			=> esc_html__('Border Color','ssel'),
 		"id"			=> "border_color",
		"fold"			=>	array( 	
  					"style-1"				=> "price_style",
  					"style-2"				=> "price_style",
  					"style-3"				=> "price_style",
  					"style-4"				=> "price_style",
  					"style-6"				=> "price_style",
  					"style-7"				=> "price_style",
  					"style-8"				=> "price_style",
  					"style-9"				=> "price_style",
		), 
 		"group"			=>  esc_html__('Style','ssel'),
   		"type"			=> "color_rgba",
	); 
	
	
	
	$option[]= array( 
		"name"			=> esc_html__('Border Radius','ssel'),
 		"id"			=> "radius",
 		"group"			=>  esc_html__('Style','ssel'),
   		"type"			=> "select",
  		"options"		=>   ssel_array_options('radius')
	); 				


	$option[]= array( 
		"name"			=>  __('Button Border Radius','ssel'),
 		"id"			=> "button_radius",
   		"type"			=> "select",
 		"group"			=>  esc_html__('Style','ssel'),
  		"options"		=>   ssel_array_options('radius')
	); 	
	
	$option[]= array( 
		"name"			=>	esc_html__('Column Style','ssel'),
 		"id"			=> "column_style_start", 
 		"group"			=>  esc_html__('Style','ssel'),
  		"type"			=>  "according-start",						
   	); 
	
	$option[]= array( 
		"name"			=>   __('1st Column Primary Color','ssel'),
	 		"id"			=> "1st_primary_color",
 		"group"			=>  esc_html__('Style','ssel'),
  		"type"			=> "color",
 	); 
	$option[]= array( 
		"name"			=>   __('2st Column Primary Color','ssel'),
	 		"id"			=> "2st_primary_color",
 		"group"			=>  esc_html__('Style','ssel'),
  		"type"			=> "color",
 	); 
	$option[]= array( 
		"name"			=>   __('3st Column Primary Color','ssel'),
	 		"id"			=> "3st_primary_color",
 		"group"			=>  esc_html__('Style','ssel'),
  		"type"			=> "color",
 	); 
			
	$option[]= array( 
		"name"			=>   __('4st Column Primary Color','ssel'),
	 		"id"			=> "4st_primary_color",
 		"group"			=>  esc_html__('Style','ssel'),
  		"type"			=> "color",
 	); 
			
	$option[]= array( 
		"name"			=>   __('5st Column Primary Color','ssel'),
	 		"id"			=> "5st_primary_color",
 		"group"			=>  esc_html__('Style','ssel'),
  		"type"			=> "color",
 	); 
			
	$option[]= array( 
		"name"			=>   __('6st Column Primary Color','ssel'),
	 		"id"			=> "6st_primary_color",
 		"group"			=>  esc_html__('Style','ssel'),
  		"type"			=> "color",
 	); 
						
			
	$option[]= array( 
		"name"			=>	esc_html__('Column Style','ssel'),
 		"id"			=> "column_style_end", 
 		"group"			=>  esc_html__('Style','ssel'),
 		"type"			=>  "according-end",						
  	); 	 		
 
	 
	
 
		
	$option[]= array( 
		"name"			=> __('Title Typography','ssel'),
 		"id"			=> "title_typo",
  		"group"			=>  esc_html__('Typography','ssel'),
		"type"			=> "multi_options",
		"options"		=>	ssel_multi_array_options('typo')
		
  	);	 
				
	$option[]= array( 
		"name"			=> __('Price Typography','ssel'),
 		"id"			=> "price_typo",
  		"group"			=>  esc_html__('Typography','ssel'),
		"type"			=> "multi_options",
		"options"		=>	ssel_multi_array_options('typo')
		
  	);
	
	$option[]= array( 
		"name"			=> __('Price Info Typography','ssel'),
 		"id"			=> "price_info_typo",
  		"group"			=>  esc_html__('Typography','ssel'),
		"type"			=> "multi_options",
		"options"		=>	ssel_multi_array_options('typo')
		
  	);		 
	
	$option[]= array( 
		"name"			=> __('Details Typography','ssel'),
 		"id"			=> "details_typo",
  		"group"			=>  esc_html__('Typography','ssel'),
		"type"			=> "multi_options",
		"options"		=>	ssel_multi_array_options('typo')
		
  	);		 	
	
		$option[]= array( 
		"name"			=> __('Button Typography','ssel'),
 		"id"			=> "button_typo",
  		"group"			=>  esc_html__('Typography','ssel'),
		"type"			=> "multi_options",
		"options"		=>	ssel_multi_array_options('typo')
		
  	);		 	
	
							
   	include SSEL_PATH . '/sao-builder/general/sao-element.php';
	   
  	 
    return $option;

} 
 }
 if( ! function_exists( 'ssel_builder_perview_price_table' ) ) {

add_filter('sao_builder_perview_price_table', 'ssel_builder_perview_price_table');
function ssel_builder_perview_price_table( $args ) {
	 
	
  		$key = $args['key'];
 		$option = $args['option'];
		$output='';
		$css='';
 		$output ='<img src="'.SSEL_DIR.'/admin/assets/images/element-price.jpg">'; 
	 
		$css.= '.sao-element-'.$key.' {text-align: center;}'; 
  	$return['css']= $css;
	$return['output']= $output;
		return $return;
}
}
 
 
 if( ! function_exists( 'ssel_price_table_config' ) ) {

add_filter('sao_builder_price_table', 'ssel_price_table_config');
function ssel_price_table_config( $args,$out = false ,$out_css=false) {
 
	$option = $args['option'];
	$key = $args['key'];
	
	ob_start(); 
	$option['key']=!empty($args['key'])? $args['key']:'';
 
	$output='';
	$css =''; 
	$ssel_ismobile=ssel_ismobile();	 
 	if(!empty($option['hide_mobile'])){
 		$is_mobile =!empty($ssel_ismobile)? 'hide':'show';
	}else{
		$is_mobile ='show';
	}
	if($is_mobile =='show'){
	//Text Css

	$query = ssel_query($option,1);
	$layout = ssel_data($option,'layout','4');
	$between = ssel_data($option,'between',ssel_data($option,'blog_between','40px'));
  
	if($layout=='2'){
 	 	$list_class =' rd_column_1_2 rd_desktop_1_2 rd_tablet_1_2 rd_phablet_1_2 rd_phone_1_1	';
	}else if($layout=='3'){
 	 	$list_class =' rd_column_1_3 rd_desktop_1_3 rd_tablet_1_3 rd_phablet_1_1 rd_phone_1_1	';
	}else if($layout=='4'){
 	 	$list_class =' rd_column_1_4 rd_desktop_1_4 rd_tablet_1_2 rd_phablet_1_2 rd_phone_1_1 ';
	}else if($layout=='5'){
 	 	$list_class =' rd_column_1_5 rd_desktop_1_5 rd_tablet_1_3 rd_phablet_1_2 rd_phone_1_1	';
	}else if($layout=='6'){
 	 	$list_class =' rd_column_1_6 rd_desktop_1_3 rd_tablet_1_3 rd_phablet_1_2 rd_phone_1_1	';
	} else{
		
 	 	$list_class =' rd_column_1_1 ';
	}
	
  	if(!empty($option['pricetable'])){
 		$post_name = get_page_by_path($option['pricetable'],'','pricetable');
		if(!empty($post_name->ID)){
			$plan = ssel_element_pricetable_urldecode(json_decode(get_post_meta($post_name->ID, 'plan', true),true));
			$details = ssel_element_pricetable_urldecode(json_decode(get_post_meta($post_name->ID, 'details', true),true));
			$recommened = get_post_meta($post_name->ID, 'recommened', true); 
		}else{
			$plan='';
			$details='';
			$recommened='';
		}
	}else{
		$post_name="";
		$plan='';
		$details='';
		$recommened='';		
	}
	
  
  	$has_background_2_css = !empty($option['background']['background_2']) ?' rd-has-background-2 ':' rd-not-background-2 ';
	$price_layout = ssel_data($option,'price_layout' );
	$price_style = ssel_data($option,'price_style' );
	
 	echo '<aside class="rd-between-'.esc_attr($between).' rd-price-'.esc_attr($price_layout).' rd-price-'.esc_attr($price_style).' rd-prietable-warp">'; 
		
 	 
		echo '<div class="rd-post-list-warp rd-post-gap-warp">';
		echo '<div class="rd-post-list   '.esc_attr($list_class).' rd-post-group-flex "  >';
 			$count=0;
 			if (!empty($plan)) : 
			foreach($plan as $plan_key => $plan_value) :
			$count++;
 
 
 			if($recommened == $plan_value['value']){
				
				$class_recommened = !empty($option['recommend'])?'rd-pricetable-warp-recommend':'';
			}else{
				$class_recommened = '';
			}
			
			
				echo '<div class="rd-pricetable-item rd-pricetable-item-'.esc_attr($count).'">';
				echo '<div class="rd-all-post rd-pricetable rd-post-gap-item rd-auto-width-post">';
				
 
 					echo '<ul class="rd-pricetable-warp-item '.esc_attr($class_recommened).'  '.esc_attr($has_background_2_css).' rd-auto-width-item rd-color-border">';
						echo '<li class="rd-pricetable-content-item rd-pricetable-title rd-font-large">';
						
							if(!empty($plan_value['title'])) echo '<h3>'.esc_html($plan_value['title']).'</h3>';
						
						echo '</li>';
										
						echo '<li class="rd-pricetable-content-item rd-pricetable-price rd-font-large">';
							if(!empty($plan_value['price'])){
								echo '<span class="rd-pt-price">';
								echo esc_attr($plan_value['price']);
								echo '</span>';
							}
							if(!empty($plan_value['priceinfo'])){
								echo '<span class="rd-pt-priceinfo">';
								echo esc_html($plan_value['priceinfo']);
								echo '</span>';
							}						
							
						echo '</li>';
						
						
						if (!empty($details)) : 
						foreach($details as $details_key => $details_value) :
						
						if($plan_value['value']== $details_value['child']){
									echo '<li class="rd-pricetable-content-item rd-pricetable-details rd-font-medium">';
									echo '<span>'.esc_html($details_value['value']).'</span>';
									echo '</li>';
						}
 								
						endforeach; 
						endif;  
			
						
						echo '<li class="rd-pricetable-content-item rd-pricetable-button rd-font-large">';
							  	$buttonurl = $plan_value['buttonurl']?$plan_value['buttonurl']:'';
							  	$buttontext = $plan_value['buttontext']?$plan_value['buttontext']:'';
								echo '<a class="rd-pt-button rd-button" href="'.esc_url($buttonurl).'">';
								echo esc_html($buttontext);
 								echo '</a>';
							 
						echo '</li>';
						 
						
						
					echo '</ul>';					
									
	
				
				
				
				echo '</div>';
				
				echo '</div>';
 
			 
			endforeach; 
			endif;  
			
			 
			 
  			
		 echo '</div>';
		 echo '</div>';
			
			
   	echo '</aside>';	
 	
 	$item = '.sao-element-'.$key.'  ';
	
	
  	$style= array();
	if(!empty($option['main_primary_color'])){
 		$style['main_'] = esc_html__('All Style','ssel');
	}
	if(!empty($option['recommend_primary_color'])){
 		$style['recommend_'] = esc_html__('Recommend','ssel');
	}
	if(!empty($option['hover_primary_color'])){
 		$style['hover_'] = esc_html__('Hover','ssel');
	}	
	if(!empty($option['1st_primary_color'])){
 		$style['1st_'] = esc_html__('1st Column','ssel');
	}	
 	if(!empty($option['2st_primary_color'])){
 		$style['2st_'] = esc_html__('1st Column','ssel');
	}	
			 
 	if(!empty($option['3st_primary_color'])){
 		$style['3st_'] = esc_html__('1st Column','ssel');
	}	
 	if(!empty($option['4st_primary_color'])){
 		$style['4st_'] = esc_html__('1st Column','ssel');
	}	
		
 	if(!empty($option['5st_primary_color'])){
 		$style['5st_'] = esc_html__('1st Column','ssel');
	}	
 	if(!empty($option['6st_primary_color'])){
 		$style['6st_'] = esc_html__('1st Column','ssel');
	}	
		
		 	
	/* Box Style ***************************/
 
 	
 	
	
	$background_css = ssel_element_background_color_css( $option,'background','background');
  	$background_2_css = ssel_element_background_color_css( $option,'background','background_2');
	
	if(($price_style == 'style-6' ||$price_style == 'style-7'  ||$price_style == 'style-8' || $price_style == 'style-9' || $price_style == 'style-10'  ) && !empty($background_2_css)){
   		$css.= ssel_element_item_css($background_css , $item .'  .rd-pricetable-content-item:nth-child(2n)::before');
   		$css.= ssel_element_item_css($background_2_css , $item .' .rd-pricetable-content-item:nth-child(2n+1)::before');
	}else{
   		$css.= ssel_element_item_css($background_css , $item .'.rd-pricetable-warp-item');
	}
 	
	
	foreach($style as $style_key=> $style_name){
		if($style_key=='recommend_'){
			$plan_item = $item.' .rd-pricetable-warp-recommend';
			
		 }elseif($style_key=='hover_'){
			$plan_item = $item.' .rd-pricetable-warp-item:hover';
		}elseif($style_key=='1st_'){
			$plan_item = $item.' .rd-pricetable-item-1';
			
		} elseif($style_key=='2st_'){
			$plan_item = $item.' .rd-pricetable-item-2';
			
		} elseif($style_key=='3st_'){
			
			$plan_item = $item.' .rd-pricetable-item-3';
		} 
		 elseif($style_key=='4st_'){
			$plan_item = $item.' .rd-pricetable-item-4';
			
		} elseif($style_key=='5st_'){
			$plan_item = $item.' .rd-pricetable-item-5';
		} 
				  elseif($style_key=='6st_'){
			$plan_item = $item.' .rd-pricetable-item-6';
		} 
		else{
			$plan_item = $item.' .rd-pricetable-warp-item';
		} 
		
		$price_text_css = '';
		$price_background_css = '';
	
	 
		 
		
		if($price_style=='style-1'){
			$price_text_css =$plan_item.' .rd-pt-price';
				
			$price_background_css = $plan_item.'  .rd-pt-button';
		}
		if($price_style=='style-2'){
			$price_text_css = $plan_item.' .rd-pt-price';
			$price_background_css = $plan_item.' .rd-pricetable-title::before,'.$plan_item.'  .rd-pt-button';
		}		
		if($price_style=='style-3'){
  				
			$price_background_css = $plan_item.' .rd-pricetable-price::before,'.$plan_item.'  .rd-pt-button';
		}	
		 	
		if($price_style=='style-4'){
			if($style_key=='recommend_'|| $style_key=='hover_'){
  				$price_background_css = $plan_item.'.rd-pricetable-warp-item';
				$price_text_css =$plan_item.' .rd-pt-button';
			}else{
  				$price_background_css = $plan_item.' .rd-pt-button';
				$price_text_css =$plan_item.' .rd-pt-price';
			}
 		}	
		if($price_style=='style-5'){
   				$price_background_css = $plan_item.'.rd-pricetable-warp-item';
   				$price_text_css = $plan_item.' .rd-pt-button';
 			 
 		}			
		if($price_style=='style-6'){
			$price_text_css =$plan_item.' .rd-pt-price';
				
			$price_background_css = $plan_item.'  .rd-pt-button';
		}	 
		
		if($price_style=='style-7'){
			$price_text_css = $plan_item.' .rd-pt-price';
				
			$price_background_css = $plan_item.' .rd-pricetable-title::before,'.$plan_item.'  .rd-pt-button';
 
		}
		
		if($price_style=='style-8'){
			$price_background_css = $plan_item.' .rd-pricetable-price::before,'.$plan_item.'  .rd-pt-button';

		}
		if($price_style=='style-9'){
			if($style_key=='recommend_' || $style_key=='hover_' ){
				if(!empty($background_2_css)){
  					$price_background_css = $plan_item.' .rd-pricetable-content-item::before';
				}else{
  					$price_background_css = $plan_item.'.rd-pricetable-warp-item';
				}
				$price_text_css =$plan_item.' .rd-pt-button';
			}else{
  				$price_background_css = $plan_item.' .rd-pt-button';
				$price_text_css =$plan_item.' .rd-pt-price';
			}
 		}	
			if($price_style=='style-10'){
   				$price_background_css = $plan_item.' .rd-pricetable-content-item::before';
   				$price_text_css = $plan_item.' .rd-pt-button';
 			 
 		}
		 
	/*pREMIRAY*/
	if(!empty($option[$style_key.'primary_color'])){
 	$main_primary_text = ssel_element_text_css( $option,$style_key.'primary_color');
 	$css.= ssel_element_item_css($main_primary_text,$price_text_css);
	 
  	$main_primary_background = ssel_element_background_color_css( $option,$style_key.'primary_color');
	$css.= ssel_element_item_css($main_primary_background,$price_background_css);
	 
	}}	
 
 
 	$border_color_css = ssel_element_border_css($option,'border_color');
	$border_color_css.= !empty($option['border_color'])?' box-shadow: 0 0 10px '.$option['border_color'].' !important; ':'';
	$css.= ssel_element_item_css($border_color_css , $item.' .rd-pricetable-warp-item');
	 
 	$border_radius_css = ssel_element_radius_css($option,'radius');
	$css.= ssel_element_item_css($border_radius_css , $item.' .rd-pricetable-warp-item');
	
 	$button_radius_css = ssel_element_radius_css($option,'button_radius');
	$css.= ssel_element_item_css($button_radius_css ,  $item.' .rd-pricetable-warp-item .rd-pt-button');
		
		
	$text_color_css = ssel_element_text_css( $option,'text_color');
	$css.= ssel_element_item_css($text_color_css , $item .' .rd-pricetable-content-item');	
  
  
  
	/******* Typo**********************/
	$title_typo= ssel_element_font_typo($option,'title_typo') ; 
   	$css.= ssel_element_item_css($title_typo,$item.' .rd-pricetable-title h3');		
	
	
	$price_typo= ssel_element_font_typo($option,'price_typo') ; 
   	$css.= ssel_element_item_css($price_typo,$item.' .rd-pt-price');		
	
	$priceinfo_typo= ssel_element_font_typo($option,'priceinfo_typo') ; 
   	$css.= ssel_element_item_css($priceinfo_typo,$item.' .rd-pt-priceinfo');		
	
	$priceinfo_typo= ssel_element_font_typo($option,'priceinfo_typo') ; 
   	$css.= ssel_element_item_css($priceinfo_typo,$item.' .rd-pt-priceinfo');		
	
	
	$details_typo= ssel_element_font_typo($option,'details_typo') ; 
   	$css.= ssel_element_item_css($details_typo,$item.' .rd-pricetable-details');		
	
	$button_typo= ssel_element_font_typo($option,'button_typo') ; 
   	$css.= ssel_element_item_css($button_typo,$item.' .rd-pt-button');		
	  
	$css.=ssel_element_padding( $key,$option); 
  
   	$return['output']=  ob_get_clean();
  	$return['css']= $css;
	
	return !empty($out)? $return['output'] :$return;	

}
}
 }
 if( ! function_exists( 'ssel_element_pricetable_urldecode' ) ) {

 function ssel_element_pricetable_urldecode($array_or_string) {
    if( is_string($array_or_string) ){
        $array_or_string = urldecode($array_or_string);
    }elseif( is_array($array_or_string) ){
        foreach ( $array_or_string as $key => &$value ) {
            if ( is_array( $value ) ) {
                $value = ssel_element_pricetable_urldecode($value);
            } 
            else {
                $value = urldecode( $value );
            }
        }
    }

    return $array_or_string;
}
 }
?>