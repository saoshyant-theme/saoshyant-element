<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
																		
																		Box Layout Module 1 Staff
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_box_layout_module_1_staff' ) ) {

function ssel_box_layout_module_1_staff($option = false,$layout=false){ 
 	 
 	$box_layout_panel = ssel_option('blog_box_layout');
 
	if($box_layout_panel !== 'none' && $box_layout_panel ){
   		$box_layout_option = 'boxed-item' ;
	} else{
   		$box_layout_option =  'none' ;
	}

	$box_layout = ssel_data($option,'box_layout',$box_layout_option);

	
		$class='';
	 if($layout=='post'){
		$class.= ' rd-post-layout-'.esc_attr($box_layout);
		
	 
  	}elseif($layout=='container'){
	 
		if($box_layout =='boxed-item'  ){
  			$class.='  rd-box-layout-boxed  rd-auto-width-warp rd-all-padding ' ;
		
		}elseif($box_layout =='none'  ){
  			$class.=' rd-auto-width-warp rd-box-layout-none';
		
		}				
				
 	} elseif($layout=='details'){
		 
		 
		if( $box_layout =='none' || $box_layout =='boxed-item' ){
 			$class.='  rd-text-boxed rd-padding-right ' ;
 		  
		}
		
	}  
 	return $class;
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
																		
																		Box Layout Module 2 Staff
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_box_layout_module_2_staff' ) ) {

function ssel_box_layout_module_2_staff($option = false,$layout=false){ 
 	 
	$box_layout_panel = ssel_option('blog_box_layout');
 
	if($box_layout_panel !== 'none' && $box_layout_panel ){
   		$box_layout_option = 'boxed-item' ;
	} else{
   		$box_layout_option =  'none' ;
	}
 	$class='';
	$box_layout = ssel_data($option,'box_layout',$box_layout_option);
	 		
 	 if($layout=='post'){
		$class.= ' rd-post-layout-'.$box_layout;
	
  	}elseif($layout=='container'){
		 
		if($box_layout =='boxed-item'  ){
  			$class.='  rd-box-layout-boxed';
		
		}elseif($box_layout =='none'  ){
  			$class.=' rd-box-layout-none  rd-auto-width-warp ';
		
		}				
				
 	} elseif($layout=='details'){
		if($box_layout =='boxed-item'  ){
			$class.='   rd-details-boxed rd-auto-width-warp rd-all-padding ' ;
		
		}
		 
		if( $box_layout =='none' ){
			$class.='  rd-text-boxed rd-margin-top ' ;
		  
		}
		
	}
	 		
 	
 	return $class;
}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
																		
																		Staff Thumb
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_staff_thumb' ) ) {

function ssel_staff_thumb( $option,$thumb_style=false) { 
 global $post;
 	
	$thumb =  ssel_data($option,'image_size','full');   
 	$thumb_style = !empty($thumb_style)?'rd-thumb-style':'';
    
	$the_permalink = get_permalink();
	if(has_post_thumbnail()){
 	?>
		<div class="rd-thumb-item   rd-auto-width-warp">
		<div class="rd-thumb rd-auto-width-item <?php echo esc_attr($thumb_style);?>">
			
            
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
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
																		
																		Staff Post Title
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_staff_post_title' ) ) {

function ssel_staff_post_title($option= false,$font=false) {
	 	$limit = ssel_data($option,'title_limit');    
		global $post;
	$staff_external = get_post_meta($post->ID, 'staff_external', true);

		$the_title = strip_tags(get_the_title());
		if ( !empty($limit) && strlen($the_title) > $limit){
			 $content= mb_substr($the_title, 0,$limit).'...';
			 
		} else {
			$content= $the_title;
			$dots='';
		}
		$font_size = !empty($font)?$font:'large';
 		
 		if(!empty($staff_external)){
 			$the_permalink =$staff_external;
		}else{
		$the_permalink = get_permalink();
		}
 	?>
    
 	<div class="rd-title-warp  rd-element-child"><h3 class="rd-title rd-color-link rd-font-<?php echo esc_attr($font_size);?>"><a class="rd-font-<?php echo esc_attr($font_size);?>" href="<?php echo esc_url($the_permalink); ?>"><?php echo esc_html($content);?></a></h3></div>
 	 	
	<?php 
}  
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
																		
																		Staff Position
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_staff_position' ) ) {

function ssel_staff_position($option= false ) {
	global $post;
	$ssel_meta = get_post_meta( $post->ID );
	$content = !empty( $ssel_meta['staff_position'][0] ) ? $ssel_meta['staff_position'][0] : ''; 
   
  	?>
    
 	<div class="rd-staff-position  rd-color-meta rd-text-none rd-margin-top rd-font-medium"><?php echo esc_html($content);?></div>
 	 	
	<?php 
}
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
																		
																		Staff Description
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_staff_description' ) ) {

function ssel_staff_description($option= false ) {
	global $post;	$ssel_meta = get_post_meta( $post->ID );

	$staff_description = !empty( $ssel_meta['staff_description'][0] ) ? $ssel_meta['staff_description'][0] : ''; 
 	$limit = ssel_data($option,'excerpt_limit');    
   
	$the_excerpt = strip_tags($staff_description );
  	if ( !empty($limit) && strlen($the_excerpt) > $limit){
 		 $content= mb_substr($the_excerpt, 0,$limit).'...';
		 
	}else{
		$content= $the_excerpt;
 	}
	
	
	
 
	
	
 	?>
    	<div class="rd-excerpt-warp rd-staff-description rd-excerpt-fexid"><div class="rd-excerpt  rd-color-text rd-text-none rd-margin-top rd-font-medium"><?php echo esc_html($content);?></div></div>

   	 	
	<?php 
}
 }
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
																		
																		Staff Socail
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_staff_social' ) ) {

function ssel_staff_social($option =false) {
	global $post;
	$meta = get_post_meta( $post->ID );
	$style = ssel_data($option,'icon_style','style-1');
    
  	?>
     
     
      <ul class="rd-social-<?php echo esc_attr($style);?>  rd-staff-social rd-social-icons rd-font-medium" >
                    <?php if ( !empty($meta['staff_facebook'][0] ) ) { ?>
                        <li class="rd-margin-top rd-text-none"><a class="rd-social-facebook  fa-facebook fa" href="<?php echo esc_url($meta['staff_facebook'][0]); ?>"></a></li>
                    <?php }  ?>
            
                    <?php if (!empty($meta['staff_twitter'][0] ) ) {?>
                        <li class="rd-margin-top rd-text-none"><a class="rd-social-twitter fa-twitter  fa" href="<?php echo esc_url($meta['staff_twitter'][0]); ?>"></a></li>
                    <?php }  ?>
                    
                    <?php if (!empty( $meta['staff_googleplus'][0] )) { ?>
                        <li class="rd-margin-top rd-text-none"><a  class="rd-social-googleplus  fa-google-plus fa"  href="<?php echo esc_url($meta['staff_googleplus'][0]); ?>"></a></li>
                    <?php }  ?>
                    
                    <?php if (!empty($meta['staff_linkedin'][0] )) { ?>
                        <li class="rd-margin-top rd-text-none"><a  class="rd-social-linkedin  fa-linkedin fa" href="<?php echo esc_url($meta['staff_linkedin'][0]); ?>"></a></li>
                    <?php }  ?>
            
                    <?php if ( !empty($meta['staff_flickr'][0] )  ) { ?>
                        <li class="rd-margin-top rd-text-none"><a   class="rd-social-flickr  fa-flickr fa"  href="<?php echo esc_url($meta['staff_flickr'][0]); ?>"></a></li>
                    <?php }  ?>
            
        		    <?php if (!empty($meta['staff_skype'][0] ) ) { ?>
                        <li class="rd-margin-top rd-text-none"><a   class="rd-social-skype  fa-skype fa"  href="<?php echo esc_url($meta['staff_skype'][0]); ?>"></a></li>
                    <?php }  ?>
                    <?php if (!empty($meta['staff_tumblr'][0] ) ) { ?>
                        <li class="rd-margin-top rd-text-none"><a   class="rd-social-tumblr  fa-tumblr fa"  href="<?php echo esc_url($meta['staff_tumblr'][0]); ?>"></a></li>
                    <?php }  ?>
            
                    <?php if ( !empty($meta['staff_vimeo'][0] )) { ?>
                        <li class="rd-margin-top rd-text-none"><a  class="rd-social-vimeo  fa-vimeo fa"  href="<?php echo esc_url($meta['staff_vimeo'][0]); ?>"></a></li>
                    <?php }  ?>
            
                    <?php if (!empty($meta['staff_youtube'][0] ) ) { ?>
                        <li class="rd-margin-top rd-text-none"><a  class="rd-social-youtube  fa-youtube fa"  href="<?php echo esc_url($meta['staff_youtube'][0]); ?>"></a></li>
                    <?php }  ?>
                    
                    <?php if (!empty($meta['staff_instagram'][0] )   ) { ?>
                        <li class="rd-margin-top rd-text-none"><a  class="rd-social-instagram  fa-instagram fa"  href="<?php echo esc_url($meta['staff_instagram'][0]); ?>"></a></li>
                    <?php }  ?>
                    
                    <?php if ( !empty($meta['staff_telegram'][0] ) ) { ?>
                        <li class="rd-margin-top rd-text-none"><a  class="rd-social-telegram   fa-telegram fa"  href="<?php echo esc_url($meta['staff_telegram'][0]); ?>"></a></li>
                    <?php }  ?>    
                    
                    <?php if (!empty($meta['staff_pinterest'][0] ) ) { ?>
                        <li class="rd-margin-top rd-text-none"><a  class="rd-social-pinterest  fa-pinterest fa"  href="<?php echo esc_url($meta['staff_pinterest'][0]); ?>"></a></li>
                    <?php }  ?>    
				</ul>
      
	<?php 
}
 }
?>