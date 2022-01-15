<?php
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
																		
																		Box Layout Testimonial
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_box_layout_testimonial' ) ) {

function ssel_box_layout_testimonial(){ 
 	 
 	$box_layout = ssel_option('blog_box_layout');
  	if($box_layout !== 'none' && $box_layout !== ''){
   		return  'boxed-item' ;
	} else{
   		return  'none' ;
	}
}
 }
if( ! function_exists( 'ssel_testimonial_thumb' ) ) {
function ssel_testimonial_thumb() { 

	if(has_post_thumbnail()){
		
	?>
    <div class="rd-thumb-item rd-margin-bottom rd-text-boxed"> 
	<div class="rd-thumb rd-testimonial-author-image"> 
          
			<figure class="rd-thumb-warp"  >
				<div class="rd-thumb-container"  >
					<?php the_post_thumbnail( 'thumbnail' );  ?>
				</div>
			</figure>
			</a>
         </div>
         </div>
             
 	<?php
  }
 } 
}
  /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
																		
																	Testimonial Author Name
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if( ! function_exists( 'ssel_testimonial_author_name' ) ) {
function ssel_testimonial_author_name($option= false) {
	global $post;
	$ssel_meta = get_post_meta( $post->ID );
	$content = !empty( $ssel_meta['testimonials_author_name'][0] ) ? $ssel_meta['testimonials_author_name'][0] : ''; 
   
  	?>
    
<h3 class="rd-testimonial-author-name rd-color-link"><?php echo esc_html($content);?></h3>
 	 	
	<?php 
}
}
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
																		
																	Testimonial Author information
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  if( ! function_exists( 'ssel_testimonial_author_information' ) ) {

 function ssel_testimonial_author_information($option= false ) {
	global $post;
	$ssel_meta = get_post_meta( $post->ID );
	$content = !empty( $ssel_meta['testimonials_author_information'][0] ) ? $ssel_meta['testimonials_author_information'][0] : ''; 
   
  	?>
    
 	<div class="rd-testimonial-author-information  rd-color-meta rd-text-none "><?php echo esc_html($content);?></div>
 	 	
	<?php 
}
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
																		
																	Testimonial Author Quote
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_testimonial_author_quote' ) ) {

function ssel_testimonial_author_quote($option= false,$layout= 'top') {
	global $post;	$ssel_meta = get_post_meta( $post->ID );

	$author_quote = !empty( $ssel_meta['testimonials_author_quote'][0] ) ? $ssel_meta['testimonials_author_quote'][0] : ''; 
 
	$limit = ssel_data($option,'author_quote_limit');    
	 
  
	$the_excerpt = strip_tags($author_quote );
  	if ( !empty($limit) && strlen($the_excerpt) > $limit){
 		 $content= mb_substr($the_excerpt, 0,$limit).'...';
		 
	}else{
		$content= $the_excerpt;
 	}
	
	
	
 
	
	
 	?>
 	<div class="rd-testimonial-author-quote   rd-color-text rd-margin-<?php echo esc_attr($layout);?> rd-font-medium"><?php echo esc_html($content);?></div>
  	 	
	<?php 
}
 }
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
																		
																	Testimonial Rating
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_testimonial_rating' ) ) {

function ssel_testimonial_rating() {
  
	global $post;	$ssel_meta = get_post_meta( $post->ID );

		$author_rating = !empty( $ssel_meta['testimonials_author_rating'][0] ) ? $ssel_meta['testimonials_author_rating'][0] : ''; 
 
	
	
	if(!empty($author_rating)){
	?>
  
 	<div class="rd-testimonial-rating   rd-tm-<?php echo esc_attr($author_rating);?>">
 
        <div class="rd-tm-rating">
       	 
            
            <div class="rd-tm-not-rating">
			<?php for ($x = 1; $x <= 5; $x++) {?>
            	<span></span>
             <?php } ?>
            </div>
            	 <div class="rd-tm-has-rating">
			<?php for ($x = 1; $x <= intval($author_rating); $x++) {?>
            <span></span>
             <?php } ?>
            </div>
            
            
         </div>
 	</div>
 <?php
	}
} 
 }

