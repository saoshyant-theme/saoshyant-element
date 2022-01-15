<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Testimoial Module 1
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_testimonial_module_1' ) ) {

function ssel_testimonial_module_1($arge=false,$post_excerpt = true){
   	
  	$author_image =  ssel_data($arge,'author_image'); 
 	$author_information =  ssel_data($arge,'author_information'); 
 	$author_rating =  ssel_data($arge,'author_rating'); 
 	$author_quote_layout = ssel_data($arge,'author_quote_layout','bottom');  
	$box_layout =  ssel_data($arge,'box_layout',ssel_box_layout_testimonial()); 
  	if($box_layout =='boxed-item'  ){
		$box_class=' rd-box-layout-boxed  rd-auto-width-warp rd-all-padding' ;
	} else{
 		$box_class=' rd-auto-width-warp rd-box-layout-none ';
	}				
	  
	$classes = array(
		'rd-testimonials',
		'rd-post-module-1',
		'rd-all-post',
		'rd-post-gap-item',
 		!empty($author_quote_layout)?'rd-has-author-image':'rd-not-author-image',
		'rd-ratio100',
  
	);
	 
 	?>
  	
	<div <?php post_class( $classes );?> >
	<div class="rd-post-inner">
	<div class="rd-post-container <?php echo esc_attr($box_class);?> ">
	<div class="rd-post-warp"> 
		
		
		
		<?php if(!empty($author_image))  ssel_testimonial_thumb();?> 

		
        
        <div class="rd-details-warp rd-text-boxed rd-padding-right">
        <div class="rd-details  rd-auto-width-item">


			<?php
            if($author_quote_layout=='top') ssel_testimonial_author_quote($arge,'bottom');
 			ssel_testimonial_author_name();
 			if(!empty($author_rating)) ssel_testimonial_rating();
 			if(!empty($author_information)) ssel_testimonial_author_information();
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