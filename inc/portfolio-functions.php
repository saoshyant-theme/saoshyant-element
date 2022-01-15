<?php
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																Portfolio Archive
																	 	
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if( ! function_exists( 'ssel_portfolio_archive' ) ) {

function ssel_portfolio_archive($title =false){
	$args=array();
	$args['key'] = 'portfolio';
	$args['option'] = array(
		'archive'=>  '1',
		'number'=>get_option('posts_per_page'),	
		'title'=> $title ,
		'layout'=>  ssel_option('portfolio_layout','list' ),
		'list_layout'=>  ssel_option('portfolio_list_layout' ),
		'grid_layout'=>  ssel_option('portfolio_grid_layout' ),
		'featured_layout'=>  ssel_option('portfolio_featured_layout' ),
		'between'=> ssel_option('portfolio_between'),	
		'post_title' => ssel_option('portfolio_post_title'),
		'excerpt' => ssel_option('portfolio_excerpt'),
		'portfolio_title_limit' => ssel_option('portfolio_title_limit'),
		'excerpt_limit' => ssel_option('portfolio_excerpt_limit'),
		'readmore' => ssel_option('portfolio_readmore'),
		'meta'=> array(
				'meta_category'=>  ssel_option('portfolio_meta_category'),
				'meta_author'=> ssel_option('portfolio_meta_author'),
				'meta_date'=>  ssel_option('portfolio_meta_date'),
				'meta_view'=>  ssel_option('portfolio_meta_view'),
				'meta_comments'=>  ssel_option('portfolio_meta_comments'),
		),
		'more_posts'=>  'pagenavi',
	 
		'padding'=> array(
			'left'=>'20',
			'top'=>'20',
			'right'=>'20',
			'bottom'=>'20'
		),
		'ratio'=>  ssel_option('portfolio_ratio' ), 
		'image_size'=>  ssel_option('portfolio_image_size'),
		'image_width'=>  ssel_option('portfolio_image_width'),
		'alignment'=> ssel_option('portfolio_alignment'),
		'meta_layout'=> ssel_option('portfolio_meta_layout'),
		'viewmore'=> ssel_option('portfolio_viewmore'),
		'box_layout'=> ssel_option('portfolio_box_layout'), 
	  );
	echo ssel_portfolio_config($args, true);
}
}
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																Portfolio Title Tabs
																	 	
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if( ! function_exists( 'ssel_portfolio_title_tabs' ) ) {
function ssel_portfolio_title_tabs($option,$id =false){

	$option['action']= $id;
	$option['post_status']='publish';
 	 
 	$multi_cats = ssel_data($option,'multi_cats');
 	$tabs = ssel_data($option,'multi_cats');
 
  
 	$orderby = ssel_data($option,'orderby');
  	$max_page = ssel_query($option)->max_num_pages;	
	
	$element_key = ssel_data($option,'key','123456');

	if(!empty($multi_cats)){
		$key_cats = implode(", ", array_keys($multi_cats));
  		$option['cats']=$key_cats;
	} else{
		$key_cats='';
	}
      
	$class='';  
	$title_box_type = ssel_data($option,'title_box_type','main-tabs');
	$title_box_style = ssel_data($option,'title_box_style',ssel_option('title_box_style'));
	$class = ' rd-title-box-'.$title_box_type.' rd-title-box-'.$title_box_style.' ';

 
   	/*---------------------------------------------------------------------------------------------------------------------------
	Title Start-------------------------------------------------------------------------------------------------------------------
	----------------------------------------------------------------------------------------------------------------------------*/
 	if(!empty($option['title']) && $title_box_type!=='hide'){
		
		echo '<div class="rd-title-box  '.esc_attr($class).' "  >';
		
			echo '<h4 class="rd-title-box-warp">';
			
			
				/*---------------------------------------------------------------------------------------------------------------------------
				Tab Main-------------------------------------------------------------------------------------------------------------------
				----------------------------------------------------------------------------------------------------------------------------*/
				if(	$title_box_type =='main-right' ||
					$title_box_type =='main-center' ||
					$title_box_type =='main-tabs' 
 				){
 					echo '<div class="rd-tab-main"><span class=" rd-color-link rd-tab-padding ">'.esc_html($option['title']).'</span></div>';
 					 
 
				}
			
				/*---------------------------------------------------------------------------------------------------------------------------
				Between Item-------------------------------------------------------------------------------------------------------------------
				----------------------------------------------------------------------------------------------------------------------------*/
  				 
					/*---------------------------------------------------------------------------------------------------------------------------
					Arrow-------------------------------------------------------------------------------------------------------------------
					----------------------------------------------------------------------------------------------------------------------------*/
 
					

					/*---------------------------------------------------------------------------------------------------------------------------
					Tabs-------------------------------------------------------------------------------------------------------------------
					----------------------------------------------------------------------------------------------------------------------------*/
					if(	
						$title_box_type =='tabs-center' ||
						$title_box_type =='main-tabs'
					){
						
						$title_box_type_data= ssel_data($option,'title_box_all');
 						if( $title_box_type_data =='main-tabs'){
							$option['title']= ssel_data('title_box_all');
						}else{
							$option['title']=ssel_option('title_box_all');
						}
						
			 		if(!empty($tabs)  || $title_box_type =='tabs-center' ){
					echo '<ul class="rd-tabs">';
					 
						
						//Tab Item Active
						echo '<li class="rd-tab-active rd-tab-item rd-tab-item-first  rd-color-link"   data-filter="all"  data-cats="" data-orderby="'.esc_attr($orderby).'" data-max_page="'.esc_attr($max_page).'">';
							echo '<a class="rd-tab-padding">'.esc_html($option['title']).'</a>';
						echo '</li>';
						
					 
						if(!empty($tabs) && is_array($tabs) ):
						foreach ($tabs as  $key => $value) :  
							if(!empty($key)){
             				$tab_cats = get_term_by('slug', $key , 'portfolio_category');
            				$tabs_title =  $tab_cats->name;
              
                 			echo '<li class="rd-tab-item  " data-cats="'.esc_attr($key).'" data-filter="'.esc_attr('rez-'.$key).'" >';
								echo '<a class="rd-tab-padding">'.esc_html($tabs_title).'</a>';
							echo '</li>';
							}
		  			
						endforeach;
						endif;  
						 
					echo '</ul>';
 
  			
				}
					}
				/*---------------------------------------------------------------------------------------------------------------------------
				END Tabs-------------------------------------------------------------------------------------------------------------------
				----------------------------------------------------------------------------------------------------------------------------*/
			 
				/*---------------------------------------------------------------------------------------------------------------------------
				Arrow-------------------------------------------------------------------------------------------------------------------
				----------------------------------------------------------------------------------------------------------------------------*/
 
				 
		echo '</h4>';
				echo '<div class="rd-data-json">'.wp_kses_post(json_encode($option)).'</div>';

	echo'</div>';
  
	}

 } 
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																Portfolio Thumb
																	 	
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if( ! function_exists( 'ssel_portfolio_thumb' ) ) {
function ssel_portfolio_thumb( $option,$thumb_style=false) { 
 	global $post;
	$meta = get_post_meta( $post->ID );
 		 
 

	$portfolio_external = get_post_meta($post->ID, 'portfolio_external', true);
	if(!empty($portfolio_external)){
 			$the_permalink =$portfolio_external;
	}else{
		$the_permalink = get_permalink();
	}
	
	
	$thumb =  ssel_data($option,'image_size','full');   
 	$thumb_style = !empty($thumb_style)?'rd-thumb-style rd-auto-width-item ':'';
 	$thumb_warp_style = !empty($thumb_style)?'rd-auto-width-warp':'';
    
	$the_permalink = get_permalink();
	if(has_post_thumbnail()){
	?>
		<div class="rd-thumb-item <?php echo esc_attr($thumb_warp_style);?>">
		<div class="rd-thumb <?php echo esc_attr($thumb_style);?>">
			
            
			<a	href="<?php echo esc_url($the_permalink);?>" >
			<figure class="rd-thumb-warp ">
			<div class="rd-thumb-container"  >
				<?php the_post_thumbnail( $thumb );?>
			</div>
			</figure>
			</a> 
					 
			<?php if(!empty($thumb_style)){?>
                <figcaption>
                <?php ssel_post_hover_link();?>
                </figcaption> 
			<?php }?>
					
  				
		</div> 
		</div> 
	<?php
	}
} 
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																Portfolio Terms Tabs
																	 	
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if( ! function_exists( 'ssel_portfolio_terms_tabs' ) ) {

function ssel_portfolio_terms_tabs( $args  =false) { 

	$args = !empty($args['key'])?$args['key']:'123456';
	$terms = wp_get_post_terms( get_the_ID(),"portfolio_category");
	$catname =' rez ';
	if(!empty($terms)){
	foreach ( $terms as $term ) {
	$catname.= ' rez-'.esc_html($term->slug).' '; 
  	 }  
	 }

	 return $catname ;	 

}
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																Portfolio Post Title
																	 	
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if( ! function_exists( 'ssel_portfolio_post_title' ) ) {

function ssel_portfolio_post_title($option= false,$font=false) {
	 	$limit = ssel_data($option,'title_limit');    
		global $post;
	$the_title = strip_tags(get_the_title());
  	if ( !empty($limit) && strlen($the_title) > $limit){
 		 $content= mb_substr($the_title, 0,$limit).'...';
		 
	} else {
		$content= $the_title;
		$dots='';
	}
	$font_size = !empty($font)?$font:'large';
	
	
			$portfolio_external = get_post_meta($post->ID, 'portfolio_external', true);
		if(!empty($portfolio_external)){
 			$the_permalink =$portfolio_external;
		}else{
		$the_permalink = get_permalink();
		}
 	?>
    
 	<div class="rd-title-warp  rd-element-child"><h3 class="rd-title rd-color-link rd-font-<?php echo esc_attr($font_size);?>"><a class="rd-font-<?php echo esc_attr($font_size);?>" href="<?php echo esc_url($the_permalink); ?>"><?php echo esc_html($content);?></a></h3></div>
 	 	
	<?php 
}
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																Portfolio Excerpt
																	 	
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if( ! function_exists( 'ssel_portfolio_excerpt' ) ) {

function ssel_portfolio_excerpt($option=false) {
	 	$limit = ssel_data($option,'excerpt_limit');    
   	$the_excerpt = strip_tags(get_the_excerpt());
  	if ( !empty($limit) && strlen($the_excerpt) > $limit){
 		 $content= mb_substr($the_excerpt, 0,$limit).'...';
		 
	}else{
		$content= $the_excerpt;
 	}
 	?>
    
	<div class="rd-excerpt-warp "><div class="rd-excerpt rd-text-none rd-margin-top rd-font-medium"><?php echo esc_html($content);?></div></div>
	
	<?php 
		 
}
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																Portfolio Category
																	 	
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_portfolio_category' ) ) {

function ssel_portfolio_category($item=1) {
	$terms = wp_get_post_terms(get_the_ID(),"portfolio_category");
	$size = !empty($font)? $font : 'small';
	
	$class='';
 
 
 
 	$count=0;
 	if(!empty($terms)){
 
	echo '<div class="rd-portfolio-category  rd-text-none rd-all-category rd-font-small '.$class.'">';
		foreach ( $terms as $term ) { $count++;  
			echo '<a href="'.esc_url(get_term_link($term->term_id)).'">'.esc_html( $term->name).'</a>';
 
			if($count == $item) { 
				break;
			}
			
		} 
	echo '</div>';

	}
}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																Portfolio Tags
																	 	
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_portfolio_tags' ) ) {

function ssel_portfolio_tags() {
	$terms = wp_get_post_terms(get_the_ID(),"portfolio_tag");
 	
	$class='';
  
 	$count=0;
 	if(!empty($terms)){
	?>
    
    	 
 	<ul class="rd-tags">
		<?php foreach ( $terms as $term ) { $count++; ?>
			<li><a href="<?php echo esc_url(get_term_link($term->term_id)); ?>"><?php echo esc_html( $term->name);?></a></li>
			<?php 
 			 
			
			} ?>
	</ul>
  	
<?php  }
} 
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																Portfolio Meta
																	 	
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_portfolio_meta' ) ) {

function ssel_portfolio_meta($option =false){ 
	global  $post,$smof_data;
	$meta = ssel_data($option,'meta');
 	$meta_layout = ssel_portfolio_meta_layout($option);
  
 	$meta_author = !empty($meta['meta_author'] )? $meta['meta_author']:'' ;
	$meta_date = !empty($meta['meta_date'] )? $meta['meta_date']:'' ;
 	$meta_view =!empty( $meta['meta_view'])? $meta['meta_view']:'' ; 
 	$meta_category =!empty( $meta['meta_category'])? $meta['meta_category']:'' ; 
	
 
  	if( !empty($meta_author) || !empty($meta_date) ||!empty($meta_view) || !empty($meta_category)  ){ 
	
	
	$class='';
 
   	if($meta_layout['location']=='title-top'){
		$class.= ' rd-margin-bottom';
		
	}else{
		$class.= ' rd-margin-top';
		
	} 
	
		 
	if($meta_layout['layout']=='layout-2' || $meta_layout['layout']=='layout-5' || $meta_layout['layout']=='layout-8'){
		$avatar = get_avatar( get_the_author_meta( 'ID' ), 32 );
	}else{
		$avatar='';
	}
   
 	//Category Style
	switch($meta_layout['layout']){
		case 'layout-3':
		case 'layout-6': 
		$by='';
     break;
	default:
		$by = ssel_t('by');
 	}
 
 	switch($meta_layout['layout']){
		case 'layout-6':
		case 'layout-7': 
		case 'layout-8': 
		$in_right='rd-meta-item-left';
		$no_text='1';
       break;
	default:
		$in_right='rd-meta-item-right';
		$no_text='';

 	}
	 
	  
 	echo '<div class="rd-meta-warp rd-text-none rd-meta-'.esc_attr($meta_layout['layout']).' rd-meta-'.esc_attr($meta_layout['between']).' '.esc_attr($class).'">';
 	echo '<ul class="rd-meta rd-font-small">';
 	//Category
	 	 
     		//Meta Author
			if( !empty($meta_author)){ 
				echo '<li class="rd-author  rd-meta-item-right">'.wp_kses_post($avatar.esc_html($by)).' '.get_the_author_link().'</li>';
			}
			//Category
 			if( !empty($meta_category)){ 	
				echo '<li class="rd-cats  rd-meta-item-right">';
				ssel_portfolio_category();
				echo '</li>';
			}
	  
    
			 if(!empty( $meta_date) ){ 
				echo '<li class="rd-date  rd-meta-item-right">';
					ssel_get_time();
				echo '</li>';
			} 
    
 			if( !empty($meta_view )){
				echo '<li class="rd-view '.esc_attr($in_left).'">'.ssel_getPostViews(get_the_ID(),$no_text).'</li>';
			}
			
 		
				
     
	echo '</ul>';
	echo '</div>';
     
	
	 }
}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																Portfolio Meta Layout
																	 	
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_portfolio_meta_layout' ) ) {

function ssel_portfolio_meta_layout($option =false){ 
	$layout = ssel_data($option,'meta_layout',ssel_option('portfolio_meta_layout'));
 	$meta_location= !empty($layout['location'])?$layout['location']: ssel_option_2('portfolio_meta_layout','location'); 
	$meta_between= !empty($layout['between'])?$layout['between']:ssel_option_2('portfolio_meta_layout','between'); 
	$meta_layout= !empty($layout['layout'])?$layout['layout']:ssel_option_2('portfolio_meta_layout','layout'); 
 
 	 
   
	$return['location'] = $meta_location;
	$return['between'] = $meta_between;
	$return['layout'] = $meta_layout;
  		 
	return  $return;
 		
}
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																Portfolio View More
																	 	
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_view_more' ) ) {

function ssel_view_more($option =false){ ?>
 <div class="rd-viewmore rd-text-boxed rd-margin-top rd-font-medium"><a href="<?php the_permalink();?>" ><?php echo esc_html(ssel_t('view_more'));?></a></div>
 <?php
}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																Portfolio Image gallery
																	 	
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_portfolio_image_gallery' ) ) {
function ssel_portfolio_image_gallery(){ 
	global $post;
	$gallery = get_post_meta($post->ID, 'ssel_gallery_id', true);
	 
	
	if(has_post_thumbnail()){
 	
	if(!empty($gallery['json'])){
  		
 	$data_gallery = json_decode($gallery['json']);	
 	$has_gallery = json_decode($gallery['json']);	
 		
 	}else{
 	$data_gallery = array();	
 	$has_gallery = '';			
	}
   	array_unshift($data_gallery,get_post_thumbnail_id());

$ssel_ratio = get_post_meta($post->ID, 'portfolio_ratio', true);
	
	if(!empty($ssel_ratio)){
 		$ratio = get_post_meta($post->ID, 'portfolio_ratio', true);
	}else{
		$ratio = !empty($has_gallery) && is_array($has_gallery)?'rd-ratio60': 'rd-ratio-auto';
 	}	 
 		$image_effect =ssel_option('image_effect'); 
		$caption_effect =ssel_option('caption_effect');
			 
				$class=	!empty($has_gallery) && is_array($has_gallery) ? 'rd-custom-slider  sao-opacity-hide rd-between-0px rd-carousel':'';
	 
			 
		echo'<aside class="sao-image-gallery rd-portfolio-single-thumb  '.esc_attr($class).'  rd-between-0px  sao-arrow-medium rd-post-all-warp sao-arrow-style  rd-caption-3-layout-hover-middle sao-arrow-hover  sao-arrow-slider-1 rd-portfolio-featured-warp rd-featured-warp" data-column="1">';
 		echo'<div class="rd-slider-list-warp  rd-post-list-warp rd-post-gap-warp "  >';
 		echo'<div class="rd-post-list rd-slider-list"  >';
 		  
 				if( $data_gallery ) : 
				foreach ( $data_gallery as $key => $value ) :
 				
					echo'<div class="rd-post-item  rd_column_1_1">';
					echo'<div class="rd-portfolio rd-box-padding-0px rd-post-module-2 rd-all-post post rd-auto-width-post '.esc_attr($ratio).'">';
					echo'<div class="rd-post-container  rd-post-gap-item">';
					echo'<div class="rd-post-warp  rd-thumb-style  rd-hover-link  rd-thumb-hover-'.esc_attr($image_effect).' '.esc_attr($caption_effect).'">';
					echo'<div class="rd-thumb-item  rd-auto-width-item  rd-auto-width-warp"> ';
							echo '<div class="rd-thumb rd-thumb-style">';
 								echo '<figure class="rd-thumb-warp "  >';
									echo '<div class="rd-thumb-container"  >';
										$thumbnail = wp_get_attachment_image_src($value, 'full');
 									echo '<img  src="'.esc_url($thumbnail['0']).'"  width="'.esc_attr($thumbnail[1]).'" height="'.esc_attr($thumbnail[2]).'"  >'; 
									echo'</div>';
									
									
								echo'</figure>';
								
							 
								echo '<figcaption>';
									echo '<div class="rd-element-child rd-hover-post-icon">';
										echo '<a class="rd-hover-img-link" href="'.esc_url($thumbnail['0']).'"></a>';
									echo '</div>';
 								echo '</figcaption>';
   							echo'</div>';
 					echo'</div>';
 
					
					
					echo'</div>';
					
					
					echo'</div>';
					echo'</div>';
					echo'</div>';
		   
				 
					
				endforeach; 
				endif; 
		  
		echo'</div>';
        
        
         if(!empty($has_gallery) && is_array($has_gallery)){ 
				echo'<div class="rd-lSAction sao-lSAction"><a class="lSPrev"></a><a class="lSNext"></a></div>';
		 } 
        echo'</div>';
		 
		$slider_options = array();   
 		 
 	
 	$slider_options['speed']=  !empty($option['speed']) ? $option['speed'] : '2000';
	
 	$slider_options['pause']= !empty($option['pause']) ? $option['pause'] : '5000';
	
	
  	$slider_options['between']=    '0';	
 	$slider_options['pager']= false;	
	$slider_options['timer']= false;	
 	$slider_options['controls']= '1';
 	$slider_options['loop']=isset($option['loop']) ? $option['loop'] : false;
	$slider_options['auto']=  !empty($option['auto']) ? $option['auto'] : '';
	         if(!empty($has_gallery) && is_array($has_gallery)){ 
  	 echo ssel_lightslider('1',$slider_options);
			 }
		 
		
		
		  echo'</aside>';
       
		wp_reset_query();
	}
}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																Portfolio Single Meta
																	 	
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
 if( ! function_exists( 'ssel_portfolio_single_meta' ) ) {

function ssel_portfolio_single_meta(){ 
	global $smof_data; 	
 	$meta_between= ssel_option_2('single_meta_layout','between'); 
	$meta_layout= ssel_option_2('single_meta_layout','layout'); 
 
 
 	
	
 	$meta_author = !empty($smof_data['single_meta_author'] )? $smof_data['single_meta_author']:'' ;
	$meta_date = !empty($smof_data['single_meta_date'] )? $smof_data['single_meta_date']:'' ;
 	$meta_view =!empty( $smof_data['single_meta_view'])? $smof_data['single_meta_view']:'' ; 
 	$meta_category =!empty( $smof_data['single_meta_cats'])? $smof_data['single_meta_cats']:'' ;
	 
	
	if( !empty($meta_author) || !empty($meta_date) ||  !empty($meta_view)|| !empty($meta_category )){ 
 
  
  if($meta_layout=='layout-2' || $meta_layout=='layout-5' || $meta_layout=='layout-8'){
		$avatar = get_avatar( get_the_author_meta( 'ID' ), 32 );
	}else{
		$avatar='';
	}
	

 	//Category Style
	switch($meta_layout){
		case 'layout-3':
		case 'layout-6': 
		$by='';
     break;
	default:
		$by = ssel_t('by');
 	}
 
 	switch($meta_layout){
		case 'layout-6':
		case 'layout-7': 
		case 'layout-8': 
		$in_left='rd-meta-item-left';
		$no_text='1';
       break;
	default:
		$in_left='rd-meta-item-right';
		$no_text='';

 	}
	
	echo '<div class="rd-meta-warp rd-single-meta rd-color-border rd-text-none rd-meta-'.esc_attr($meta_layout).' rd-meta-'.esc_attr($meta_between).' rd-margin-top">';
  	echo '<ul class="rd-meta rd-font-small rd-color-meta">';
	 if( !empty($meta_author)){ 
				echo '<li class="rd-author  rd-meta-item-right">'.wp_kses_post($avatar.esc_html($by)).' '.get_the_author_link().'</li>';
			}
			//Category
 			if( !empty($meta_category) ){ 	
				echo '<li class="rd-cats  rd-meta-item-right">';
				ssel_portfolio_category(5);
				echo '</li>';
			}
	  
    
			 if(!empty( $meta_date) ){ 
				echo '<li class="rd-date  rd-meta-item-right">';
					ssel_get_time();
				echo '</li>';
			} 
    
 			if( !empty($meta_view )){
				echo '<li class="rd-view '.esc_attr($in_left).'">'.ssel_getPostViews(get_the_ID(),$no_text).'</li>';
			}	
 		
	
	   
	echo '</ul>';
	echo '</div>';
     
	
	 }
			
}
 }?>