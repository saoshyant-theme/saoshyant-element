<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Blog Module 2
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_blog_module_2' ) ) {
function ssel_blog_module_2($arge,$post_excerpt = true){
  
   	$ratio =  ssel_data($arge,'ratio', ssel_option('blog_ratio'));  
	$alignment = ssel_data($arge,'alignment',ssel_option('blog_alignment')); 
   	$image_effect =ssel_data($arge,'image_effect',ssel_option('blog_image_effect')); 
	$caption_effect =ssel_data($arge,'caption_effect',ssel_option('caption_effect'));
	$title = ssel_data($arge,'post_title');
  	$excerpt = !empty($post_excerpt) ? ssel_data($arge,'excerpt'):''; 
	$meta_layout =ssel_blog_meta_layout($arge); 
  	$readmore = ssel_data($arge,'readmore');    
	 
	$classes = array(
		'rd-blog',
		'rd-color-border',
		'rd-post-module-2',
		'rd-all-post',
		'rd-post-gap-item',
 		'rd-alignment-'.$alignment,
		$ratio,
 		ssel_box_layout_module_2($arge,'post','blog')
	);
 
 	?>
  	
	<div <?php post_class( $classes );?> >
	<div class="rd-post-inner rd-hover-link <?php echo 'rd-thumb-hover-'.esc_attr($image_effect).' '.ssel_caption_effect($caption_effect); ?>">
	<div class="rd-post-container   <?php echo ssel_box_layout_module_2($arge,'container','blog');?> ">
	<div class="rd-post-warp  ">
                
                
                
		<?php
 
		ssel_blog_thumb ($arge,true);?>
                     
                     
                     
                     
		<div class="rd-details-warp  <?php echo  esc_attr(ssel_box_layout_module_2($arge,'details','blog'));?> rd-auto-width-warp">
		<div class="rd-details  rd-auto-width-item">
 
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