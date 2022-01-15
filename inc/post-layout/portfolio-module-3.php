<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Portfolio Module 3
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_portfolio_module_3' ) ) {

function ssel_portfolio_module_3($arge=false,$post_excerpt = true){
   	 
  	$ratio =  ssel_data($arge,'ratio', ssel_option('blog_ratio'));  
 	$alignment = ssel_data($arge,'alignment',ssel_option('portfolio_alignment')); 
	$title = ssel_data($arge,'post_title');
 	$excerpt = !empty($post_excerpt) ? ssel_data($arge,'excerpt'):''; 
  	$image_effect =ssel_data($arge,'image_effect',ssel_option('image_effect')); 
	$caption_effect =ssel_data($arge,'caption_effect',ssel_option('caption_effect'));
  	$meta_layout =ssel_portfolio_meta_layout($arge); 
  	$caption_layout = ssel_data($arge,'caption_layout',ssel_option('portfolio_caption_layout')); 
  	$viewmore = ssel_data($arge,'viewmore');    
	
 	if($caption_layout == 'middle' || $caption_layout == 'bottom' || $caption_layout == 'middle-rand' ||$caption_layout == 'bottom-rand' || $caption_layout == 'gradient-bottom'){
		$caption_effect='';
	}elseif($caption_layout == 'hover-bottom' ){
		$caption_effect='imghvr-slide-up';
	}elseif($caption_layout == 'hover-top' ){
		$caption_effect='imghvr-slide-down';
	} 
	
 	$classes = array(
		'rd-portfolio',
		'rd-post-module-3',
		'rd-all-post',
 		'rd-caption-3-layout-'.$caption_layout,
		'rd-alignment-'.$alignment,
		$ratio,
 	);
   
  	?>
  	
	<div <?php post_class( $classes );?> >
	<div class="rd-post-container  rd-post-gap-item">
 	<div class="rd-post-warp rd-auto-width-post rd-thumb-style  rd-hover-link <?php echo 'rd-thumb-hover-'.esc_attr($image_effect).' '.  esc_attr(ssel_caption_effect($caption_effect));?>">
 			
		<?php ssel_portfolio_thumb ($arge,false);?>
   		 
   
         
        <figcaption>
		<div class="rd-details-warp rd-all-padding  rd-auto-width-warp">
		<div class="rd-details rd-auto-width-item">
			 
			
			<?php
             ssel_post_hover_link(); 
 			if($meta_layout['location'] == 'title-top' ) ssel_portfolio_meta($arge); 
			if(!empty($title)) ssel_portfolio_post_title($arge);   
			if($meta_layout['location'] == 'title-bottom' ) ssel_portfolio_meta($arge); 
			if(!empty($excerpt)) ssel_portfolio_excerpt($arge);
			if($meta_layout['location'] == 'excerpt-bottom' ) ssel_portfolio_meta($arge); 
 			if(!empty($viewmore)) ssel_view_more();
 			?>
             
		</div>
		</div>
		</figcaption>
                 
                
	</div>
	</div>
	</div> 
    
	<?php
    
 }
?>