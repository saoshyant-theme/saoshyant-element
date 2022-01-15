<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Portfolio Module 1
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_portfolio_module_1' ) ) {

function ssel_portfolio_module_1($arge=false,$post_excerpt = true){
   	$ratio =  ssel_data($arge,'ratio', ssel_option('portfolio_ratio'));   
   	$image_width =  ssel_data($arge,'image_width', ssel_option('portfolio_image_width'));   
 	$image_effect =ssel_data($arge,'image_effect',ssel_option('image_effect')); 
	$caption_effect =ssel_data($arge,'caption_effect',ssel_option('caption_effect'));
	$title = ssel_data($arge,'post_title');
	$excerpt = !empty($post_excerpt) ? ssel_data($arge,'excerpt'):''; 
   	$meta_layout =ssel_portfolio_meta_layout($arge);  
  	$viewmore = ssel_data($arge,'viewmore');   
	
	
  	$classes = array(
		'rd-portfolio',
		'rd-color-border',
 		'rd-post-module-1',
		'rd-all-post',
		'rd-post-gap-item',
 		$ratio,
		'rd-image-width-'.$image_width , 
   		ssel_box_layout_module_1($arge,'post','portfolio'),	
	);
 
 	?>
  	
	<div <?php post_class( $classes );?> >
 	<div class="rd-post-inner rd-hover-link <?php echo 'rd-thumb-hover-'.esc_attr($image_effect).' '.esc_attr(ssel_caption_effect($caption_effect)); ?>">
	<div class="rd-post-container   <?php echo esc_attr(ssel_box_layout_module_1($arge,'container','portfolio'));?> ">
  	<div class="rd-post-warp">
      
		<?php ssel_portfolio_thumb ($arge,true); ?>
        
		 
        <div class="rd-details-warp rd-auto-width-warp <?php echo esc_attr(ssel_box_layout_module_1($arge,'details','portfolio'));?>">
		<div class="rd-details  rd-auto-width-item">
                              
			<?php 
 			if($meta_layout['location'] == 'title-top' ) ssel_portfolio_meta($arge); 
  			if(!empty($title)) ssel_portfolio_post_title($arge);   
			if($meta_layout['location'] == 'title-bottom' ) ssel_portfolio_meta($arge);  
			if(!empty($excerpt)) ssel_portfolio_excerpt($arge); 
			if($meta_layout['location'] == 'excerpt-bottom' ) ssel_portfolio_meta($arge);   
			if(!empty($viewmore)) ssel_view_more();
			?>
                               
		</div>
 		</div>
       
        
        
	</div>
	</div>
	</div>
	</div> 
    
<?php }
?>