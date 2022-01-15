<?php
 
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																Data
																	 	
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_data' ) ) {

function ssel_data($option=false,$id=false,$def = false){
   	$option_id = !empty( $option[esc_html($id)] ) ? $option[esc_html($id)] : $def;
 	return $ajax_sao_evalue_id;
	
}    
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																Post Item
																	 	
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_post_item_new' ) ) {

function ssel_post_item_new(){
 	$ajax_sao_evalue_id =  ' rd-post-item-new ' ; 
	return $ajax_sao_evalue_id;
	
}    
}
if( ! function_exists( 'ssel_settings' ) ) {
function ssel_settings($settings,$id=false){
	return !empty( $settings[ $id] )? $settings[$id] : '';
 }   
}
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																Title Tabs
																	 	
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_multi_cats_array' ) ) {

function ssel_multi_cats_array($array){
	$new_array=array();
	if(!empty($array) && is_array($array)){
	foreach($array as $key => $value){
		$new_array[esc_html($value)]=1;
	}
	}
	return $new_array;
 
}   
 }
/********************************************************************
Post Title Box
*********************************************************************/ 
 if( ! function_exists( 'ssel_title_box' ) ) {

function ssel_title_box($title =false){
	global  $ssel_data;
	
	$title_box_type = 'main-tabs';
	$title_box_style = ssel_option('title_box_style','style-1');
	$class = ' rd-title-box-'.esc_attr($title_box_type).' rd-title-box-'.esc_attr($title_box_style).' ';
	if(!empty($title)){
		
  		echo'<div class="rd-title-box '.esc_attr($class).'">';
		echo '<h4 class="rd-title-box-warp">';

 			echo '<div class="rd-tab-main"><span class=" rd-color-link rd-tab-padding ">';
			echo esc_html($title);
			echo '</span></div>';
 		
			 
		echo'</h4>';
	echo'</div>';
	}
}
 }

/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																Title class
																	 	
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_title_class' ) ) {

function ssel_title_class(){

	$title_box_style = ssel_option('title_box_style');
	$class = ' rd-title-box-main-tabs rd-title-box-'.esc_attr($title_box_style).' ';
	
	return $class;
 }
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																Title Tabs
																	 	
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_title_tabs' ) ) {

function ssel_title_tabs($option,$id =false,$arrow =false){
	global  $post;
  
	$option['action']= $id;
	$option['post_status']='publish';
 	
  
	$multi_cats = ssel_data($option,'multi_cats');
	$orderby = ssel_data($option,'orderby');
  	$max_page = ssel_query($option)->max_num_pages;	
	
		if(!empty($multi_cats)){
			$key_cats = implode(", ", array_keys($multi_cats));
  			$option['cats']=$key_cats;
		} else{
			$key_cats='';
		}
   
    	?>
	<?php 
 
 	if(!empty($option['title'])){?>
	<div class="rd-title-box " > 
        <h4>
        <span class="rd-tab-active"  data-cats="<?php echo esc_attr($key_cats);?>" data-orderby="<?php echo esc_attr($orderby);?>" data-max_page="<?php echo esc_attr($max_page);?>" ><?php echo esc_html($option['title']) ?></span>
            
        <?php 
		if(!empty($option['tabs']) && is_array($option['tabs']) ):
		foreach ($option['tabs'] as  $key => $value) : 
 		$tab_cats = ssel_data($value,'cats');
		$tab_orderby = ssel_data($value,'orderby');
  		
		$tabs_title = ssel_data($value,'title');
		$tab_max_page = ssel_query($value)->max_num_pages;
 		?>
		<span data-cats="<?php echo esc_attr($tab_cats);?>" data-orderby="<?php echo esc_attr($tab_orderby);?>"   data-max_page="<?php echo esc_attr($tab_max_page);?>" ><?php echo esc_html($tabs_title);?></span>
		<?php	
		endforeach;
		endif;  
		?>
        <?php if(!empty($arrow)){?>
        <div class="rd-carousel-action" >
			<a class="rd-tab-prev fa fa-angle-left"  ></a>
			<a class="rd-tab-next fa fa-angle-right" ></a>
		</div>

		<?php }?>
 
		</h4>
		<div class="rd-data-json"><?php echo wp_kses_post(json_encode($option));?></div>
	</div>
	<?php 
	}
}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																Load More
																	 	
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_load_more' ) ) {

function ssel_load_more($option,$id= false){
 	global  $post;
   	$max_page= ssel_query($option)->max_num_pages;
 		$option['action']=$id;
 
		
		$option['post_status']='publish';
 		echo '<div class="rd-load-more-warp rd-more-posts-custom" ><div class="rd-load-more " ><span  data-page="2" data-max_page="'.esc_attr($max_page).'" >'.esc_html(ssel_t('load_more')).'<i></i></span><div class="rd-data-json">'.wp_kses_post(json_encode($option)).'</div></div></div>';
 	//}
}
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																Query
																	 	
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 

/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																Query
																	 	
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_query' ) ) {

function ssel_query($option =false,$pagenumber= false){
  	$qurey = ssel_data($option,'qurey');

 $more_posts = ssel_data($option,'more_posts');
	if(!empty($pagenumber) || $more_posts =="pagenavi" ){
   		$page = is_front_page() ? get_query_var( 'page') :get_query_var( 'paged');
	}else{
   		$page =   1;
	}
 	$publish =  'publish';
	$number = ssel_data($option,'number','5');
 	$sliders = ssel_data($option,'sliders');
	$cats = ssel_data($option,'cats');
	$post_type = ssel_data($option,'post_type');
	$multi_cats = ssel_data($option,'multi_cats');
 
	
	
	
	$args = array();
	
	$args['post_status'] =  $publish;
	$args['posts_per_page']=$number;
	$args['ignore_sticky_posts'] = 1;
  	if(!empty($qurey)){
		$args =$qurey;
	}
	
	elseif($post_type=='testimonial'){
   		 
		
		$args['post_type']= 'testimonial';
 			
 			if(!empty($cats)){	
 
 				 
 			$tax_query_category =array(
					'taxonomy' => 'testimonial_category',
					'terms' => $cats,
					'field' => 'slug',
				);		
				$args['tax_query'][0][] =	$tax_query_category;		 
			} 
  
  		 
 		$args['paged']=$page; 
		
 	 
	}	
	elseif($post_type=='staff'){
   		 
		
		$args['post_type']= 'staff';
 			
 			if(!empty($cats)){	
 
 				 
 			$tax_query_category =array(
					'taxonomy' => 'staff_category',
					'terms' => $cats,
					'field' => 'slug',
				);		
				$args['tax_query'][0][] =	$tax_query_category;		 
			} 
  
  		 
 		$args['paged']=$page; 
		
 	 
	}	
	
	
	elseif($post_type=='portfolio'){
		$orderby = ssel_orderby($option);
		$date_query = ssel_date_query($option);
		$meta_key = ssel_meta_key($option);	
		
		$args['post_type']= 'portfolio';
 	 		$array =array();
			
			
			if(!empty($cats)){	
 
				$array = $cats;
				}elseif(!empty($multi_cats) && is_array($multi_cats)){
					foreach($multi_cats as $key => $value){
						if(!empty($key)){
						$array[] = $key;
					}
					}
				}
				if(!empty($array)){
 				 
 			$tax_query_category =array(
					'taxonomy' => 'portfolio_category',
					'terms' =>  $array,
					'field' => 'slug',
				);		
			$args['tax_query'][0][] =	$tax_query_category;		 
				}
  
  		 
 		$args['paged']=$page; 
		
 	 
	}
	elseif($post_type=='sao_slide'){
		
		$args['post_type'] = 'sao_slide';
 		$args['no_found_rows'] = 1;
		if(!empty($sliders)){
			$args['tax_query'] =  array(
				array(
					'taxonomy' => 'sao_sliders',
					'terms' => $sliders,
					'field' => 'slug',
				)
			);
		}
 	}elseif($post_type=='image'){
		$args['post_type'] = 'sao_image';
 		$args['no_found_rows'] = 1;
 		
		
  		if(!empty($cats)){
			$args['tax_query'] =  array(
				array(
					'taxonomy' => 'sao_images',
					'terms' => $cats,
					'field' => 'slug',
				)
			);
		}
			
 	 		
 	}elseif($post_type=='product'){
		$orderby = ssel_data($option,'orderby');
		$args['post_type']= 'product';
			 
		if(!empty($cats)){	
			$args['product_cat'] = $cats;
		}elseif(!empty($multi_cats)){	
			$key_cats = implode(",", array_keys($multi_cats));
			$args['product_cat'] = $key_cats;
		} 
		
		if(!empty($orderby)){
			if($orderby== 'onsale'){
			   $args['meta_query'] =  array(
 					array( 
					'key'		=> '_sale_price',
					'value'		=>  1,
					'type'		=> 'numeric', 
					'compare' 	=> '>='					
 					) 
				);
				$args['orderby']='date';
				
				}elseif($orderby== 'stock'){
				
				$args['meta_query']  = array(
				array(
					'key' => '_stock_status',
					'value' => 'instock'
				),
				array(
					'key' => '_backorders',
					'value' => 'no'
				)
				
				);
				$args['orderby']='date';
			}elseif($orderby== 'price'){
				   $args['orderby']= 'meta_value_num';
				   $args['meta_key']= '_price';
				 
			}else{
			$args['orderby']=$orderby;
			}
		}
		 
		$args['paged']=$page; 
		 			
 	}else{
		$orderby = ssel_orderby($option);
		$date_query = ssel_date_query($option);
		$meta_key = ssel_meta_key($option);	
			
			
		if(!empty($cats)){
			$args['category_name']=$cats;
		 }elseif(!empty($multi_cats)){
			$key_multi = implode(", ", array_keys($multi_cats));
 			$args['category_name']=$key_multi;
		}
		if(!empty($orderby)){
			$args['orderby']=$orderby;
		}
		
		if( !empty($date_query)){
			$args['date_query']=$date_query;
		}
		
		if(!empty($meta_key)){
			$args['meta_key']= $meta_key;
		}
		
			$args['paged']= $page; 

	}
	 
 
	$archive = ssel_data($option,'archive');
	
	if(!empty($archive)){
		global  $wp_query;
		return  $wp_query;
	}else{
		return new WP_Query($args );
	}
				
} 
 }

/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																Date Query
																	 	
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_date_query' ) ) {

function ssel_date_query($option=false,$custom = false){
	if(!empty($custom)){
		$orderby =   isset( $custom['orderby'] ) ? $custom['orderby'] : null;
	} else{
		$orderby = ssel_data($option,'orderby');
	}
		
	if($orderby =='rand-day' || $orderby =='last-comment-day'||$orderby =='most-comment-day'||$orderby =='views-day'||$orderby =='best-reviews-day'){
			$date_query = array(array('after' => '1 day ago' )) ;
			
	} elseif($orderby =='rand-week'|| $orderby =='last-comment-week'|| $orderby =='most-comment-week'|| $orderby =='views-week'|| $orderby =='best-reviews-day'){
			$date_query = array(array('after' => '1 week ago' )) ;
			
	} elseif( $orderby =='rand-month'|| $orderby =='last-comment-month'|| $orderby =='most-comment-month'|| $orderby =='views-day'|| $orderby =='best-reviews-month'){
			$date_query = array(array('after' => '1 month ago' )) ;
 		
	} elseif( $orderby =='rand-year'|| $orderby =='last-comment-year'|| $orderby =='most-comment-year'|| $orderby =='views-year'|| $orderby =='best-reviews-year'){
			$date_query = array(array('after' => '1 year ago' )) ;
	}else{
 			$date_query='';
	}
	return $date_query;
	
} 
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															 Query
																	 	
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_orderby' ) ) {

function ssel_orderby($option=false,$custom = false){
	if(!empty($custom)){
		$orderby =   isset( $custom['orderby'] ) ? $custom['orderby'] : null;
	} else{
		$orderby = ssel_data($option,'orderby');
	}
 	
	if( $orderby == 'rand'|| $orderby =='rand-day'|| $orderby =='rand-week'|| $orderby =='rand-month'|| $orderby =='rand-year'){
		$order='rand';
		
	}elseif( $orderby == 'most-comment'|| $orderby =='most-comment-day'|| $orderby =='most-comment-week'|| $orderby =='most-comment-month'|| $orderby =='most-comment-year'){
		$order='comment_count';
			
	}elseif( $orderby == 'views'|| $orderby =='views-day'|| $orderby =='views-week'|| $orderby =='views-month'|| $orderby =='views-year'
		|| $orderby == 'best-reviews'|| $orderby =='best-reviews-day'|| $orderby =='best-reviews-week'|| $orderby =='best-reviews-month'|| $orderby =='best-reviews-year'){
		$order='meta_value_num';					
			
	} else {
 		$order=$orderby;
	}
	
	return $order;
	
}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															 Meta Key
																	 	
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_meta_key' ) ) {

function ssel_meta_key($option=false,$custom = false){
	if(!empty($custom)){
		$orderby =   isset( $custom['orderby'] ) ? $custom['orderby'] : null;
	} else{
		$orderby = ssel_data($option,'orderby');
	}
	
  	if( $orderby == 'views'|| $orderby =='views-day'|| $orderby =='views-week'|| $orderby =='views-month'|| $orderby =='views-year'){
		if(function_exists('the_views')) {
     $meta_key = 'views';
	}else{
  	  $meta_key	 = 'ssel_views_count';
	}
			
	} elseif($orderby == 'best-reviews'|| $orderby =='best-reviews-day'|| $orderby =='best-reviews-week'|| $orderby =='best-reviews-month'|| $orderby =='best-reviews-year'){
		$meta_key='ssel_review_score';	
							
	} else{
		$meta_key='';
			
 	}
	return $meta_key;
	
}  
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															 Post View
																	 	
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////  
 if( ! function_exists( 'ssel_getPostViews' ) ) {

function ssel_getPostViews($postID,$only_count =false){
    $count_key = 'ssel_views_count';
    $count = get_post_meta($postID, $count_key, true);
	
    if($count=='' || $count=='0'){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
		if(!empty($only_count)){
        	return "0";
		}else{
        	return "0 ". ssel_t('view');
		}
	}
	if(!empty($only_count)){
     	return ssel_number_replace($count);
	}else{
     	return ssel_number_replace($count).' '. ssel_t('views') ;
 	}
}
 }
 
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															 light slider
																	 	
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_lightslider' ) ) {
 
 function ssel_lightslider($item,$slider_options=false) {
 
 	$number = isset( $sao_evalue['number'] ) ? $sao_evalue['number'] : '5'; 
 	ob_start(); 

 	global $sao_lightslider_style,
		$sao_lightslider_script;
		$sao_lightslider_style=true;
		$sao_lightslider_script=true;

 	$slider_options["item"] = (int)$item;
	$slider_options["slideMove"] = 1;
	$slider_options["rtl"] = true;
	$slider_options["slideMargin"] = 0;
 
  
 	 ?>
 	<div class="sao-slider-options" ><?php echo wp_kses_post(json_encode($slider_options));?></div>
    <?php
	 

	return ob_get_clean(); 
} 
 }


/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															 Get Time
																	 	
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_get_time' ) ) {

function ssel_get_time(){
	global  $smof_data ;
	$time_format = !empty($smof_data['ssel_time_format' ]) ? $smof_data['ssel_time_format' ] :'traditional';
 	if(  $time_format == 'traditional'  ){	
		echo  esc_html(get_the_time(get_option('date_format')));

 	}else{
		echo ssel_number_replace(ssel_time_elapsed_string());

 	}
}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															   Time Elased String
																	 	
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_time_elapsed_string' ) ) {
 
 function ssel_time_elapsed_string( )
{
		$to = current_time('timestamp'); //time();
		$from = get_the_time('U') ;
		
		$diff = (int) abs($to - $from);
		$etime=$diff ;
   	 if ($etime < 1)
    {
        return '0 seconds';
    }

    $a = array( 365 * 24 * 60 * 60  =>  'year',
                 30 * 24 * 60 * 60  =>  'month',
                      24 * 60 * 60  =>  'day',
                           60 * 60  =>  'hour',
                                60  =>  'minute',
                                 1  =>  'second'
                );
    $a_dates = array( 'year'   => esc_html(ssel_t('years')),
                       'month'  => esc_html(ssel_t('months')),
                       'day'    => esc_html(ssel_t('days')),
                       'hour'   => esc_html(ssel_t('hours')),
                       'minute' => esc_html(ssel_t('minutes' )),
                       'second' => esc_html(ssel_t('seconds')),
                );
    $a_date = array( 'year'   => esc_html(ssel_t('year')),
                       'month'  => esc_html(ssel_t('month')),
                       'day'    => esc_html(ssel_t('day')),
                       'hour'   => esc_html(ssel_t('hour')),
                       'minute' => esc_html(ssel_t('minute' )),
                       'second' => esc_html(ssel_t('second')),
                );

    foreach ($a as $secs => $str)
    {
        $d = $etime / $secs;
        if ($d >= 1)
        {
            $r = round($d);
            return $r . ' ' . ($r > 1 ? $a_dates[$str] : $a_date[$str]) . " ". esc_html(ssel_t('ago'));
        }
    }
}}

/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															   Post Hover Link
																	 	
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_post_hover_link' ) ) {

function ssel_post_hover_link(){
	 	global $post;
		$img_link =get_the_post_thumbnail_url($post->ID,'full');
		$the_permalink = get_permalink();
		
		$staff_external = get_post_meta($post->ID, 'staff_external', true);
		$portfolio_external = get_post_meta($post->ID, 'portfolio_external', true);
 		if(!empty($staff_external)){
 			$the_permalink =$staff_external;
		}elseif(!empty($portfolio_external)){
 			$the_permalink =$portfolio_external;
		}else{
		$the_permalink = get_permalink();
		}

 
	?>


		<div class="rd-element-child rd-hover-post-icon">
			<a class="rd-hover-img-link" href="<?php echo esc_url($img_link);?>"></a>
			<a class="rd-hover-post-link" href="<?php echo esc_url($the_permalink);?>"></a>
		</div>
<?php
}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Arrow Layout
																	 	
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_arrow_layout' ) ) {

function ssel_arrow_layout($option =false){ 
	$arrow_layout = ssel_data($option,'arrow_layout');
 	 $return=array();
	switch($arrow_layout){
		case 'hover-offset-small':
		case 'hover-offset-medium': 
		case 'hover-offset-large': 
 		case 'title-box-offset': 
		$offset='offset';
	break;
	default:
		$offset='nooffset';
 
 	}
	switch($arrow_layout){
  		case 'hover-small':
		case 'hover-medium': 
		case 'hover-large': 
		case 'hover-offset-small':
		case 'hover-offset-medium': 
		case 'hover-offset-large':  
		$location='hover';
	break;
		case 'fexid-small':
		case 'fexid-medium': 
		case 'fexid-large': 
 		$location='fexid';	
	break;
	default:
		$location='title-box';
 
 	}  
switch($arrow_layout){
  		case 'hover-small':
		case 'hover-offset-small': 
 		case 'fexid-small':  
		$size='small';
	break;
  		case 'hover-medium':
		case 'hover-offset-medium': 
 		case 'fexid-medium':  
 		$size='medium';	
	break;
  		case 'hover-large':
		case 'hover-offset-large': 
 		case 'fexid-large':  
 		$size='large';	
		break;

	default:
		$size='medium';
 
 	}  	  
 	$return['location'] = $location;
	$return['offset'] = $offset;
 	$return['size'] = $size;
	return  $return;
 		
	
		
}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Title Layout
																	 	
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_between_layout' ) ) {

function ssel_between_layout($between =false){ 
 	
	if($between =='0px'){
		return '0';
	}elseif($between =='2px'){
		return '2';
		
	}elseif($between =='10px'){
		return '10';
		
	}elseif($between =='20px'){
		return '20';
	
	}elseif($between =='30px'){
		return '30';
		
	}elseif($between =='40px'){
		return '40';
	}elseif($between =='60px'){
		return '60';
	}else{
		return '0';
	}
	
	 

}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															caption Effect
																	 	
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_caption_effect' ) ) {

function ssel_caption_effect($caption_effect =false){ 
 	
	 if($caption_effect=='imghvr-layla' || 
	 $caption_effect=='imghvr-oscar' || 
	 $caption_effect=='imghvr-bubba' || 
	 $caption_effect=='imghvr-chico' || 
	 $caption_effect=='imghvr-goliath' || 
	 $caption_effect=='imghvr-selena' || 
	 $caption_effect=='imghvr-ming' ){ 
 
		return  $caption_effect.' rd-caption-effect-padding';
		 
	 }else{
		return  $caption_effect;
	 }
	
	 

}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																		Thumbnail Image
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_remove_rel_attr' ) ) {
 	function ssel_remove_rel_attr($content) {
		return preg_replace('/\s+rel="attachment wp-att-[0-9]+"/i', '', $content);
	}
	add_filter('the_content', 'ssel_remove_rel_attr');
}

if( ! function_exists( 'ssel_filter_image_sizes' ) ) {
	function ssel_filter_image_sizes( $sizes) {
		unset( $sizes['yith-woocompare-image']);
		return $sizes;
	}
	add_filter('intermediate_image_sizes_advanced', 'ssel_filter_image_sizes');	
}

 if( ! function_exists( 'ssel_filter_post_thumbnail_html' ) ) {

function ssel_filter_post_thumbnail_html( $html ) {
 
    if ( '' == $html ) {
        return '<img src="images/default-thumbnail.jpg" width="640px" height="384px" class="image-size-name" />';
    } 
    return $html;
}
add_filter( 'post_thumbnail_html', 'ssel_filter_post_thumbnail_html' );
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Get Search Form
																	 	
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_get_search_form' ) ) {

function ssel_get_search_form( $form ) {
 
  	$form= '<div class="rd-searchfield-warp rd-auto-width-warp rd-searchfield-button-icon">';
 				$form.= '<form method="get" class="rd-searchfield rd-searchfield-full-width rd-auto-width-item rd-color-border rd-color-text" action="'.esc_url(home_url( '/') ).'">';
  				$form.= '<input type="text" name="s" class="rd-searchfield-text rd-font-medium" value="" placeholder="'.esc_attr(ssel_t('searchitem')).'" />';
				 
				$form.= '<button type="submit" name="btnSubmit" class="rd-searchfield-button fa-search"></button>';
 				$form.= '</form>';
				 
	$form.= '</div>';
 
	return $form;

}

add_filter( 'get_search_form', 'ssel_get_search_form' );
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															responsive item
																	 	
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_post_responsive_item' ) ) {

function ssel_post_responsive_item( $item  = 4 , $size = false ) {
	
	if($item == '12' || $item == '11' || $item == '10'|| $item == '9' || $item == '7' ){
		$item1199 = 6;
		$item990 = 3;
		$item767 = 2;
		$item499 = 1;
	} elseif($item == '6'  ){
		$item1199 = 5;
		$item990 = 3;
		$item767 = 2;
		$item499 = 1;
	} elseif($item == '5'  ){
		$item1199 = 4;
		$item990 = 3;
		$item767 = 2;
		$item499 = 1;
		
	}elseif($item == '4'  ){
		$item1199 = 4;
		$item990 = 3;
		$item767 = 2;
		$item499 = 1;
	} elseif($item == '3'  ){
		$item1199 = 3;
		$item990 = 3;
		$item767 = 2;
		$item499 = 1;
	} elseif($item == '2'  ){
		$item1199 = 2;
		$item990 = 2;
		$item767 = 2;
		$item499 = 1;
	}else{
		$item1199 = 1;
		$item990 = 1;
		$item767 = 1;
		$item499 = 1;
		
	}

	if($size == '1199'){
		return $item1199;
		
 	}elseif($size == '990'){
		return $item990;
		
 	}elseif($size == '767'){
		return $item767;
 	}elseif($size == '499'){
		return $item499;
 	}

}
 }
 
?>