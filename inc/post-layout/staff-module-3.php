<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Staff Module 3
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_staff_module_3' ) ) {

function ssel_staff_module_3($arge,$post_excerpt = true){
  	$ratio =  ssel_data($arge,'ratio', 'rd-ratio100'); 
  	$hover_post_link = ssel_data($arge,'hover_post_link');     
    	$alignment = ssel_data($arge,'alignment','center'); 
  	$caption_layout = ssel_data($arge,'caption_layout',ssel_option('blog_caption_layout')); 
  	$image_effect =ssel_data($arge,'image_effect',ssel_option('image_effect')); 
	$caption_effect =ssel_data($arge,'caption_effect',ssel_option('caption_effect'));
	$title = ssel_data($arge,'post_title');
 	$excerpt = !empty($post_excerpt) ? ssel_data($arge,'excerpt'):'';
   	 
 	$staff_position = ssel_data($arge,'staff_position');    
   	$social_icon = ssel_data($arge,'social_icon');    
   
 	if($caption_layout == 'middle' || $caption_layout == 'bottom' || $caption_layout == 'middle-rand' ||$caption_layout == 'bottom-rand' || $caption_layout == 'gradient-bottom'){
		$caption_effect='';
	}elseif($caption_layout == 'hover-bottom' ){
		$caption_effect='imghvr-slide-up';
	}elseif($caption_layout == 'hover-top' ){
		$caption_effect='imghvr-slide-down';
	}
	
	 
 	$classes = array(
		'rd-staff',
		'rd-post-module-3',
		'rd-all-post',
		'rd-auto-width-post',
		'rd-caption-3-layout-'.$caption_layout,
		'rd-alignment-center ',
		$ratio,
 	);
   
  	?>
  	
	<div <?php post_class( $classes );?> >
	<div class="rd-post-container  rd-post-gap-item">
	<div class="rd-post-warp  rd-thumb-style  rd-hover-link <?php echo 'rd-thumb-hover-'.esc_attr($image_effect.' '.$caption_effect) ?>">
  				
                	
		<?php ssel_staff_thumb ($arge,false);?>
 		 
         
         
         
		<figcaption>
		<div class="rd-details-warp rd-all-padding  rd-auto-width-warp">
		<div class="rd-details rd-auto-width-item">
        
        
			<?php
            ssel_post_hover_link(); 
 			 ssel_staff_post_title($arge);
 			if(!empty($staff_position)) ssel_staff_position();
            if(!empty($social_icon)) ssel_staff_social($arge);
			if(!empty($excerpt)) ssel_staff_description($arge);
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