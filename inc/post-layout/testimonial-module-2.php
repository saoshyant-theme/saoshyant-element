<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Testimoial Module 2
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_testimonial_module_2' ) ) {

function ssel_testimonial_module_2($arge=false,$post_excerpt = true){
   	
  	$author_image =  ssel_data($arge,'author_image'); 
 	$author_information =  ssel_data($arge,'author_information'); 
 	$author_rating =  ssel_data($arge,'author_rating'); 
 	$author_quote_layout = ssel_data($arge,'author_quote_layout','bottom');  
	$box_layout =  ssel_data($arge,'box_layout',ssel_box_layout_testimonial()); 
  	
	if($box_layout =='boxed-item'  ){
		$box_class='  rd-box-layout-boxed  rd-auto-width-warp  rd-all-padding ' ;
 	} else{
		$box_class='  rd-box-layout-none ';
	}				
	  
	$classes = array(
		'rd-testimonials',
		'rd-post-module-2',
		'rd-all-post',
		'rd-post-gap-item',
		'rd-auto-width-post',
		'rd-alignment-center',
		!empty($author_quote_layout)?'rd-has-author-image':'rd-not-author-image',
		'rd-ratio100',
  
	);
	
	 
 	?>
  	
	<div <?php post_class( $classes );?> >
	<div class="rd-post-inner">
	<div class="rd-post-container <?php echo esc_attr($box_class);?> ">
	<div class="rd-post-warp"> 
                    
		<div class="rd-details-warp rd-auto-width-warp">
		<div class="rd-details  rd-auto-width-item">
			<?php
			if($author_quote_layout=='top')ssel_testimonial_author_quote($arge,'bottom');
 			if(!empty($author_image))  ssel_testimonial_thumb();
			ssel_testimonial_author_name();
			if(!empty($author_information)) ssel_testimonial_author_information();
			if(!empty($author_rating)) ssel_testimonial_rating();
 			if($author_quote_layout=='bottom') ssel_testimonial_author_quote($arge,'top');
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