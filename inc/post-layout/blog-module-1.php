<?php

/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Blog Module 1
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_blog_module_1' ) ) {

function ssel_blog_module_1($arge=false,$post_excerpt=true){
	
   	$ratio =  ssel_data($arge,'ratio', ssel_option('blog_ratio'));   
   	$image_width =  ssel_data($arge,'image_width', ssel_option('blog_image_width'));   

  	$image_effect =ssel_data($arge,'image_effect',ssel_option('image_effect')); 
	$caption_effect =ssel_data($arge,'caption_effect',ssel_option('caption_effect'));
	
   	$excerpt = !empty($post_excerpt) ? ssel_data($arge,'excerpt'):''; 
   	$meta_layout =ssel_blog_meta_layout($arge);  
  	$readmore = ssel_data($arge,'readmore');    
 
  	$classes = array(
		'rd-blog',
		'rd-color-border',
		'rd-post-module-1',
		'rd-all-post',
		'rd-post-gap-item',
   		$ratio,
		'rd-image-width-'.$image_width , 
 		ssel_box_layout_module_1($arge,'post','blog'),
		
	);
 
 	?>
  	
	<div <?php post_class( $classes );?> >
 	<div class="rd-post-inner rd-hover-link <?php echo 'rd-thumb-hover-'.esc_attr($image_effect).' '.ssel_caption_effect($caption_effect); ?>">
	<div class="rd-post-container  <?php echo esc_attr(ssel_box_layout_module_1($arge,'container','blog'));?> ">
  	<div class="rd-post-warp ">
    
  					
		<?php
 
		ssel_blog_thumb ($arge,true);?>
                     
                     
		<div class="rd-details-warp  <?php echo esc_attr(ssel_box_layout_module_1($arge,'details','blog'));?>">
		<div class="rd-details  rd-auto-width-item  ">
		
                             
			<?php
 			if($meta_layout['location'] == 'title-top' ) ssel_blog_meta($arge);  
			ssel_blog_post_title($arge);   
 			if($meta_layout['location'] == 'title-bottom' ) ssel_blog_meta($arge); 
			if(!empty($excerpt)) ssel_blog_excerpt($arge); 
			if($meta_layout['location'] == 'details-bottom' ) ssel_blog_meta($arge); 
 			if(!empty($readmore)) ssel_read_more(); 
			?>
            
        
		</div>
		</div>
        
        
        
  	</div>
  	</div>
	</div>
	</div> 
    
<?php  
 
} 
 }
?>