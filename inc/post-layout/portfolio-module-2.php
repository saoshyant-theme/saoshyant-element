<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Portfolio Module 2
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_portfolio_module_2' ) ) {

function ssel_portfolio_module_2($arge=false,$post_excerpt = true){
   	 
   	$ratio =  ssel_data($arge,'ratio', ssel_option('portfolio_ratio'));  
	$alignment = ssel_data($arge,'alignment',ssel_option('portfolio_alignment')); 
  	$image_effect =ssel_data($arge,'image_effect',ssel_option('image_effect')); 
	$caption_effect =ssel_data($arge,'caption_effect',ssel_option('caption_effect'));
	$title = ssel_data($arge,'post_title');
  	$excerpt = !empty($post_excerpt) ? ssel_data($arge,'excerpt'):''; 
	$meta_layout =ssel_blog_meta_layout($arge); 
  	$viewmore = ssel_data($arge,'viewmore');    
	 
	$classes = array(
		'rd-blog',
		'rd-color-border',
		'rd-post-module-2',
		'rd-all-post',
		'rd-post-gap-item',
 		'rd-alignment-'.$alignment,
 		'rd-color-border',
		$ratio,
 		ssel_box_layout_module_2($arge,'post')
	);
 	?>
  	
	<div <?php post_class( $classes );?> >
	<div class="rd-post-inner rd-hover-link <?php echo 'rd-thumb-hover-'.esc_attr($image_effect).' '.ssel_caption_effect($caption_effect); ?>">
	<div class="rd-post-container   <?php echo ssel_box_layout_module_2($arge,'container','portfolio');?> ">
	<div class="rd-post-warp  ">
	
    
    	<?php ssel_portfolio_thumb ($arge,true);?>

                     
                     
		<div class="rd-details-warp  <?php echo ssel_box_layout_module_2($arge,'details','portfolio');?> rd-auto-width-warp">
		<div class="rd-details  rd-auto-width-item">
                                
                                 
			<?php
  			if($meta_layout['location'] == 'title-top' ) ssel_portfolio_meta($arge); 
           	if(!empty($title)) ssel_portfolio_post_title($arge); 
         	if($meta_layout['location'] == 'title-bottom' ) ssel_portfolio_meta($arge);  
            if(!empty($excerpt)) ssel_portfolio_excerpt($arge); 
         	if($meta_layout['location'] == 'details-bottom' ) ssel_portfolio_meta($arge);
            	if(!empty($viewmore)) ssel_view_more();
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