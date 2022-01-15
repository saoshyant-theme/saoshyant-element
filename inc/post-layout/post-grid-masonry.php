<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																Post Grid Masonry 1
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_post_grid_masonry_1' ) ) {

function ssel_post_grid_masonry_1($option =false) {
 	
	
  	$query = ssel_query($option);
	  	if( $query->have_posts() ) : 
	while ( $query->have_posts() ) : $query->the_post(); 
 
		echo'<div class="rd-post-item rd_column_1_1  '.esc_attr(ssel_portfolio_terms_tabs($option)).' '.esc_attr(ssel_post_item_new()).'">';
		  ssel_module_2($option,true);
		echo'</div>';
  	endwhile; 
	endif; 
	
 } 
add_action('wp_ajax_nopriv_ssel_post_grid_masonry_1', 'ssel_post_grid_masonry_1');
add_action('wp_ajax_ssel_post_grid_masonry_1', 'ssel_post_grid_masonry_1');
 }
?>