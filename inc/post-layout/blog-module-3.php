<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Blog Module 3
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_blog_module_3' ) ) {


function ssel_blog_module_3($arge,$post_excerpt = true){
  	$ratio =  ssel_data($arge,'ratio', ssel_option('blog_ratio')); 
 	$alignment = ssel_data($arge,'alignment',ssel_option('blog_alignment')); 
  	$caption_layout = ssel_data($arge,'caption_layout',ssel_option('blog_caption_layout')); 
  	$image_effect =ssel_data($arge,'image_effect',ssel_option('image_effect')); 
	$caption_effect =ssel_data($arge,'caption_effect',ssel_option('caption_effect'));
  	$excerpt = !empty($post_excerpt) ? ssel_data($arge,'excerpt'):'';
 	$meta_layout =ssel_blog_meta_layout($arge); 
  	$readmore = ssel_data($arge,'readmore');    
	 
 	if($caption_layout == 'middle' || $caption_layout == 'bottom' || $caption_layout == 'gradient-bottom'){
		$caption_effect='';
	}elseif($caption_layout == 'hover-bottom' ){
		$caption_effect='imghvr-slide-up';
	}elseif($caption_layout == 'hover-top' ){
		$caption_effect='imghvr-slide-down';
	}
	
	 
 	$classes = array(
		'rd-blog',
		'rd-post-module-3',
		'rd-all-post',
 		'rd-caption-3-layout-'.$caption_layout,
		'rd-alignment-'.$alignment,
		$ratio,
 	);
   
  	?>
  	
	<div <?php post_class( $classes );?> >
	<div class="rd-post-container    rd-post-gap-item">
	<div class="rd-post-warp  rd-thumb-style rd-auto-width-post rd-hover-link <?php echo 'rd-thumb-hover-'.esc_attr($image_effect).' '.esc_attr(ssel_caption_effect($caption_effect)); ?>">
  				
                	
		<?php ssel_blog_thumb ($arge,false);?>
 		 
         
         <?php if($caption_layout == 'bottom'|| $caption_layout =='gradient-bottom'|| $caption_layout =='hover-bottom' || $caption_layout =='hover-middle') {?>
  		<?php ssel_blog_featured_image_meta('rd-auto-width-item rd-auto-width-warp rd-all-padding');?>
         <?php }?>
         
		<figcaption>
		<div class="rd-details-warp rd-all-padding  rd-auto-width-warp">
		<div class="rd-details rd-auto-width-item">
        
        
			<?php
            ssel_post_hover_link();  
            if($caption_layout == 'middle')ssel_blog_featured_image_meta('rd-margin-bottom rd-text-none'); 
 			if($meta_layout['location'] == 'title-top' ) ssel_blog_meta($arge);  
 			ssel_blog_post_title($arge);  
           	if($meta_layout['location'] == 'title-bottom' ) ssel_blog_meta($arge); 
 			if(!empty($excerpt)) ssel_blog_excerpt($arge); 
			if($meta_layout['location'] == 'excerpt-bottom' ) ssel_blog_meta($arge);  
			            	if(!empty($readmore)) ssel_read_more();

  			?>
            
            
		</div>
		</div>

		</figcaption>
		
                 
                 
                
	</div>
	</div>
	</div> 
    
	<?php
}
 }
?>