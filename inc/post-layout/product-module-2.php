<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Product Module 2
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_product_module_2' ) ) {

function ssel_product_module_2($arge=false,$post_excerpt=true){
	if(function_exists ( "is_woocommerce" )){
 
   	$ratio =  ssel_data($arge,'ratio', ssel_option('product_ratio')); 
 	$alignment = ssel_data($arge,'alignment',ssel_option('product_alignment')); 
  	$title = ssel_data($arge,'post_title');
	$excerpt = !empty($post_excerpt) ? ssel_data($arge,'excerpt'):''; 
 	$countdown = ssel_data($arge,'countdown');
 	$meta_category = ssel_data($arge,'meta_category');    
 	$rating = ssel_data($arge,'rating');    
 	$addcart = ssel_data($arge,'addcart'); 
	
	   
  	$classes = array(
		'rd-product',
		'rd-post-module-2',
		'rd-all-post',
		'rd-post-gap-item',
		'rd-category-none',
		'rd-auto-width-post',
 		$ratio,
		'rd-alignment-'.$alignment,
 		ssel_box_layout_module_2($arge,'post','product'),
 	);
 
 	?>
  	
	<div <?php post_class( $classes );?> >
 	<div class="rd-post-inner">
	<div class="rd-post-container <?php echo esc_attr(ssel_box_layout_module_2($arge,'container','product'));?> ">
  	<div class="rd-post-warp">
    

			<?php do_action( 'woocommerce_before_shop_loop_item' );?>
   					
		<?php ssel_product_thumb ($arge);?>
		
        
        
        <div class="rd-details-warp rd-auto-width-warp <?php echo esc_attr(ssel_box_layout_module_2($arge,'details','product'));?>">
		<div class="rd-details  rd-auto-width-item  ">
                              
			<?php 
			do_action( 'woocommerce_before_shop_loop_item_title' );

			if(!empty($meta_category)) ssel_product_category($arge);
			ssel_product_post_title($arge); 
			do_action( 'woocommerce_shop_loop_item_title' );

			ssel_price('large');  
			if(!empty($rating)) ssel_product_rating(); 
			if(!empty($excerpt)) ssel_product_excerpt($arge);
			if(!empty($countdown)) ssel_product_countdown();
			 do_action( 'woocommerce_after_shop_loop_item_title' );
			?>	 
                           
		</div>
 		</div>
        <?PHP do_action( 'woocommerce_after_shop_loop_item' );?>
        
		<?php ssel_product_sale();?>
        
        
		<?php
		if(!empty($addcart)){?>
            <div class="rd-cart-button-warp rd-auto-width-item">
            <div class="rd-cart-button  rd-font-medium ">
                <?php ssel_button_add_to_cart();?>
                <?php ssel_wishlist();?>
                <?php ssel_compare_button();?>
            </div>
            </div>
        <?php } ?>
        
         
	</div>
  	</div>
	</div>
	</div> 
	<?php }
}
 }
?>