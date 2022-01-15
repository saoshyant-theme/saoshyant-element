<?php 
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																Blog Archive
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_blog_archive' ) ) {
 function ssel_blog_archive($title =false){
	$args=array();
	$args['key'] = 'blog';
	$args['option'] = array(
		'archive'=>  '1',
		'number'=>get_option('posts_per_page'),	
		'title'=> $title ,
		'layout'=>  ssel_option('blog_layout' ),
		'list_layout'=>  ssel_option('blog_list_layout' ),
		'grid_layout'=>  ssel_option('blog_grid_layout' ),
		'between'=> ssel_option('blog_between' ),	
		'excerpt' => ssel_option('blog_excerpt'),
		'title_limit' => ssel_option('title_excerpt_limit'),
		'excerpt_limit' => ssel_option('blog_excerpt_limit'),
		'readmore' => ssel_option('blog_readmore'),
		'meta'=> array(
			'meta_category'=>  ssel_option('blog_meta_category'),
			'meta_author'=> ssel_option('blog_meta_author'),
			'meta_date'=>  ssel_option('blog_meta_date'),
			'meta_view'=>  ssel_option('blog_meta_view'),
			'meta_comments'=>  ssel_option('blog_meta_comments'),
		),
		'more_posts'=>  'pagenavi',
		'padding'=> array(
			'left'=>'20',
			'top'=>'20',
			'right'=>'20',
			'bottom'=>'20'
		),
		'ratio'=>  ssel_option('blog_ratio' ), 
		'image_size'=>  ssel_option('blog_image_size'),
		'image_width'=>  ssel_option('blog_image_width'),
		'alignment'=> ssel_option('blog_alignment'),
		'meta_layout'=> ssel_option('blog_meta_layout'),
		'box_layout'=> ssel_option('blog_box_layout','none'), 
	);
	echo ssel_blog_config($args, true);
}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																Blog title Tabs
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_blog_title_tabs' ) ) {

function ssel_blog_title_tabs($option,$id =false){
	global  $post;
  
	$option['action']= $id;
	$option['post_status']='publish';
 	 
 	$multi_cats = ssel_data($option,'multi_cats');
 	$tabs = ssel_data($option,'tabs');
      
 	$orderby = ssel_data($option,'orderby');
  	$max_page = ssel_query($option)->max_num_pages;	
	
	$element_key = ssel_data($option,'key','123456');

	if(!empty($multi_cats)){
		$key_cats = implode(", ", array_keys($multi_cats));
  		$option['cats']=$key_cats;
	} else{
		$key_cats='';
	}
      
	 
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
						echo '<li class="rd-tab-active rd-tab-item rd-tab-item-first  rd-color-link"    data-cats="" data-orderby="'.esc_attr($orderby).'" data-max_page="'.esc_attr($max_page).'">';
							echo '<a class="rd-tab-padding">'.esc_html($option['title']).'</a>';
						echo '</li>';
						
						
						 
						//Tab Item 
							if(!empty($option['tabs']) && is_array($option['tabs']) ):
							foreach ($option['tabs'] as  $key => $value) : 
							$tab_cats = ssel_data($value,'cats');
							$tab_orderby = ssel_data($value,'orderby');
							
							$tabs_title = ssel_data($value,'title');
							$tab_max_page = ssel_query($value)->max_num_pages;
              
 						 
                 			echo '<li class="rd-tab-item  " data-cats="'.esc_attr($tab_cats).'"  data-orderby="'.esc_attr($tab_orderby).'" data-max_page="'.esc_attr($tab_max_page).'" >';
								echo '<a class="rd-tab-padding">'.esc_html($tabs_title).'</a>';
							echo '</li>';
         
		  
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
 
	echo'</div>';
  
	}
}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																Blog Featured Image Meta
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_blog_featured_image_meta' ) ) {
function ssel_blog_featured_image_meta($class) { 
 	global $post;
	$meta = get_post_meta( $post->ID );
  	$featured_image_meta = !empty($meta['featured_image_meta'][0])? $meta['featured_image_meta'][0]:'';
	?> 
	 
	<?php	if( $featured_image_meta  == 'video' ){ ?>
		<div class="rd-featured-image-warp <?php echo esc_attr($class);?> ">
			<div class="  rd-icon-video rd-font-large"></div>
		</div>			
  
 	<?php
	}
}  
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																Blog Thumb
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_blog_thumb' ) ) {

function ssel_blog_thumb( $option,$thumb_style=false) { 
 	global $post;
 	
	$thumb =  ssel_data($option,'image_size','full');   
 	$thumb_style = !empty($thumb_style)?'rd-thumb-style rd-auto-width-item ':'';
 	$thumb_warp_style = !empty($thumb_style)?'rd-auto-width-warp':'';
    
	$the_permalink = get_permalink();
	if(has_post_thumbnail()){
	?>
		<div class="rd-thumb-item   <?php echo esc_attr($thumb_warp_style);?>">
		<div class="rd-thumb <?php echo esc_attr($thumb_style);?>">
			
            
			<a	href="<?php echo esc_url($the_permalink);?>" >
                <figure class="rd-thumb-warp ">
                    <div class="rd-thumb-container"  >
                        <?php the_post_thumbnail( $thumb );?>
                    </div>
                </figure>
			</a> 
            
			<?php if(!empty($thumb_style)){?>
            				<?php ssel_blog_featured_image_meta('rd-all-padding');?>

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

																Blog Terms Tabs
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_blog_terms_tabs' ) ) {

function ssel_blog_terms_tabs( $args  =false) { 

	$args = !empty($args['key'])?$args['key']:'123456';
	$terms = wp_get_post_terms( get_the_ID(),"blog_category");
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

																Blog Post Title
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_blog_post_title' ) ) {
 
function ssel_blog_post_title($option= false,$font=false) {
	 	$limit = ssel_data($option,'title_limit');    

	$the_title = strip_tags(get_the_title());
  	if ( !empty($limit) && strlen($the_title) > $limit){
 		 $content= mb_substr($the_title, 0,$limit).'...';
		 
	} else {
		$content= $the_title;
		$dots='';
	}
	$font_size = !empty($font)?$font:'large';
 	?>
    
 	<div class="rd-title-warp  rd-element-child"><h3 class="rd-title  rd-color-link  rd-color-link-hover rd-font-<?php echo esc_attr($font_size);?>"><a class="rd-font-<?php echo esc_attr($font_size);?>" href="<?php the_permalink(); ?>"><?php echo esc_html($content);?></a></h3></div>
 	 	
	<?php 
}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																Blog Excerpt
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_blog_excerpt' ) ) {

function ssel_blog_excerpt($option=false) {
	 	$limit = ssel_data($option,'excerpt_limit');    
   	$the_excerpt = strip_tags(get_the_excerpt());
  	if ( !empty($limit) && strlen($the_excerpt) > $limit){
 		 $content= mb_substr($the_excerpt, 0,$limit).'...';
		 
	}else{
		$content= $the_excerpt;
 	}
 	?>
    
	<div class="rd-excerpt-warp "><div class="rd-excerpt  rd-color-text rd-text-none rd-margin-top rd-font-medium"><?php echo esc_html($content);?></div></div>
	
	<?php 
	 
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																Blog Excerpt Category
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_blog_category' ) ) {

function ssel_blog_category($item= 1) {
	$terms = wp_get_post_terms(get_the_ID(),"category");
	$size = !empty($font)? $font : 'small';
	
	$class='';
  
 	$count=0;
 	if(!empty($terms)){
	 
 	echo '<div class="rd-blog-category  rd-text-none rd-all-category rd-font-small '.esc_attr($class).'">';
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

																Blog Meta
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_blog_meta' ) ) {

function ssel_blog_meta($option =false){ 
	global  $post,$smof_data;
	$meta = ssel_data($option,'meta');
		$meta_layout = ssel_blog_meta_layout($option);

  	$meta_author = !empty($meta['meta_author'] )? $meta['meta_author']:'' ;
	$meta_category = !empty($meta['meta_category'] )? $meta['meta_category']:'' ;
	$meta_date = !empty($meta['meta_date'] )? $meta['meta_date']:'' ;
 	$meta_view =!empty( $meta['meta_view'])? $meta['meta_view']:'' ; 
 	$meta_comments =!empty( $meta['meta_comments'])? $meta['meta_comments']:'' ; 
	
	 
  	if( !empty($meta_author) || !empty($meta_comments) || !empty($meta_date) ||!empty($meta_view) || !empty($meta_category)  ){ 
	
	
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
		$in_left='rd-meta-item-left';
		$no_text='1';
       break;
	default:
		$in_left='rd-meta-item-right';
		$no_text='';

 	}
	 
	  
 	echo '<div class="rd-meta-warp rd-color-border rd-text-none rd-meta-'.esc_attr($meta_layout['layout']).' rd-meta-'.esc_attr($meta_layout['between']).' '.esc_attr($class).'">';
  	echo '<ul class="rd-meta rd-font-small rd-color-meta">';
 		 

     		//Meta Author
			if( !empty($meta_author)){ 
				echo '<li class="rd-author  rd-meta-item-right">'.wp_kses_post($avatar.esc_html($by)).' ';
					the_author_posts_link();
				echo '</li>';
			}
			//Category
 			if( !empty($meta_category)){ 	
				echo '<li class="rd-cats  rd-meta-item-right">';
				ssel_blog_category(1);
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
 			if( !empty($meta_comments )){
				echo '<li class="rd-comment '.esc_attr($in_left).'">'.ssel_blog_meta_comments($no_text).'</li>';
			}	
			
 		
			
     
	echo '</ul>';
	echo '</div>';
     
	
	 }
} 
 }
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																Blog Meta Comments
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_blog_meta_comments' ) ) {

function ssel_blog_meta_comments($no_text =false){ 
	ob_start(); 

 		if(!empty($no_text)){
			  comments_popup_link(ssel_t('0'),ssel_t('1') ,esc_html('%'), '' , ssel_t('0'));
 		} else{
			  comments_popup_link(ssel_t('nocommentsyet'),ssel_t('1').' '.ssel_t('commentalready') ,esc_html('%'.' '.ssel_t('commentsalready')), '' , ssel_t('commetsoff'));
		}
		   return  ob_get_clean();;

}
 }
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																Blog Meta Layout
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_blog_meta_layout' ) ) {

function ssel_blog_meta_layout($option =false){ 
	$layout = ssel_data($option,'meta_layout',ssel_option('blog_meta_layout'));
 	$meta_location= !empty($layout['location'])?$layout['location']: ssel_option_2('blog_meta_layout','location'); 
	$meta_between= !empty($layout['between'])?$layout['between']:ssel_option_2('blog_meta_layout','between'); 
	$meta_layout= !empty($layout['layout'])?$layout['layout']:ssel_option_2('blog_meta_layout','layout'); 
 
	
	 
   
	$return['location'] = $meta_location;
	$return['between'] = $meta_between;
	$return['layout'] = $meta_layout;
  		 
	return  $return;
 		
}
 }
 }
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																Blog Read More
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_read_more' ) ) {
function ssel_read_more($option =false){ ?>
 <div class="rd-readmore rd-text-boxed   rd-margin-top   rd-font-medium"><a href="<?php the_permalink();?>"  ><?php echo esc_html(ssel_t('read_more'));?></a></div>
 <?php
}
 }

?>