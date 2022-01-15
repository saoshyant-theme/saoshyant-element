<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Staff Module 1
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_staff_module_1' ) ) {

function ssel_staff_module_1($arge=false,$post_excerpt = true){
   	$ratio =  ssel_data($arge,'ratio',  'rd-ratio100');   
   	$image_width =  ssel_data($arge,'image_width', ssel_option('blog_image_width'));      
   	$image_vertical =  ssel_data($arge,'image_vertical');     
	
  	$image_effect =ssel_data($arge,'image_effect',ssel_option('image_effect')); 
	$caption_effect =ssel_data($arge,'caption_effect',ssel_option('caption_effect'));
  
 	$excerpt = !empty($post_excerpt) ? ssel_data($arge,'excerpt'):''; 
 	$staff_position = ssel_data($arge,'staff_position');    
   	$social_icon = ssel_data($arge,'social_icon');    
  
	$box_layout =  ssel_data($arge,'box_layout',ssel_box_layout_module_2_staff()); 
 	
	 		
	  
	$classes = array(
		'rd-staff',
		'rd-post-module-1',
		'rd-all-post',
 		'rd-post-gap-item',
 		$ratio,
		'rd-image-width-'.$image_width ,
 		ssel_box_layout_module_1_staff($arge,'post'),
	);
 
 	?>
  	
	<div <?php post_class( $classes );?> >
	<div class="rd-post-inner rd-hover-link">
	<div class="rd-post-container   <?php echo esc_attr(ssel_box_layout_module_1_staff($arge,'container'));?> ">
	<div class="rd-post-warp <?php echo 'rd-thumb-hover-'.esc_attr($image_effect.' '.$caption_effect) ?>">
		
		<?php ssel_staff_thumb ($arge,true);?>
                     
                     
		<div class="rd-details-warp  <?php echo esc_attr(ssel_box_layout_module_1_staff($arge,'details'));?> rd-auto-width-warp">
		<div class="rd-details  rd-auto-width-item">
 
                                 
			<?php
			ssel_staff_post_title($arge);
 			if(!empty($staff_position)) ssel_staff_position();
            if(!empty($social_icon)) ssel_staff_social($arge);
			if(!empty($excerpt)) ssel_staff_description($arge);
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