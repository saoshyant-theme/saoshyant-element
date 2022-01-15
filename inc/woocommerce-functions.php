<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Action
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Action
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
add_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
if ( ! function_exists( 'woocommerce_template_loop_product_link_open' ) ) {
    function woocommerce_template_loop_product_link_open() {} 
} 
 



remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
add_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
if ( ! function_exists( 'woocommerce_template_loop_product_link_close' ) ) {
    function woocommerce_template_loop_product_link_close() {} 
} 



//***woocommerce_template_loop_price
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price');
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
if ( ! function_exists( 'woocommerce_template_loop_price' ) ) {
    function woocommerce_template_loop_price() {} 
} 



remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash');
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10 );
if ( ! function_exists( 'woocommerce_show_product_loop_sale_flash' ) ) {
    function woocommerce_show_product_loop_sale_flash() {} 
} 



remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail');
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10 );
if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {
    function woocommerce_template_loop_product_thumbnail() {} 
} 

 
remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart');
add_action( 'woocommerce_after_shop_loop_item', 'ssel_woocommerce_template_loop_add_to_cart', 10 );
     function ssel_woocommerce_template_loop_add_to_cart() { } 
 



remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating');

 add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 10 );
if ( ! function_exists( 'woocommerce_template_loop_rating' ) ) {
    function woocommerce_template_loop_rating() { } 
} 
 



remove_action('woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title');
 add_action( 'woocommerce_shop_loop_subcategory_title', 'woocommerce_template_loop_category_title', 10 );
if ( ! function_exists( 'woocommerce_template_loop_category_title' ) ) {
    function woocommerce_template_loop_category_title() { } 
} 




remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10 );
 add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_category_title', 10 );
 if ( ! function_exists( 'woocommerce_template_loop_product_title' ) ) {
    function woocommerce_template_loop_product_title() { } 
} 


 


remove_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
 
if ( ! function_exists( 'woocommerce_template_loop_product_thumbnail' ) ) {
    function woocommerce_template_loop_product_thumbnail() {} 
} 
 

 


/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Loop columns
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
add_filter('loop_shop_columns', 'ssel_loop_columns');
if (!function_exists('ssel_loop_columns')) {
	function ssel_loop_columns() {
		return 4; // 4 products per row
	}
}  

/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	loop shop per page
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_loop_shop_per_page' ) ) {

function ssel_loop_shop_per_page( $cols ) {
  global $smof_data  ;
   $cols = ssel_option('product_number','12' );
  return $cols;
}
add_filter( 'loop_shop_per_page', 'ssel_loop_shop_per_page', 10 );
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	before widget product list
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 
 if( ! function_exists( 'ssel_before_widget_product_list' ) ) {

add_filter('woocommerce_before_widget_product_list','ssel_before_widget_product_list',1);
function ssel_before_widget_product_list() {
	 return '<aside class="rd-list-warp rd-list rd-post-list_1 "><div class="rd-post-list">';
 	 
 }
 }
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Product Line
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_product_line' ) ) {

add_filter('woocommerce_single_product_summary','ssel_product_line',21);
add_filter('woocommerce_single_product_summary','ssel_product_line',39);
function ssel_product_line( ) { 
echo '<div class="rd-product-line rd-margin-top rd-text-boxed rd-color-border rd-line"></div>';
 	 
 }
 }

 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Product Title Tabs
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
  if( ! function_exists( 'ssel_product_title_tabs' ) ) {

 function ssel_product_title_tabs($option,$id =false){
	global  $post;
  
	$option['action']= $id;
	$option['post_status']='publish';
 	 
 	$multi_cats = ssel_data($option,'multi_cats');
 	$tabs = ssel_data($option,'tabs');
 
     
 	$orderby = ssel_data($option,'orderby');
  	$max_page = ssel_query($option)->max_num_pages;	
	
	$element_key = ssel_data($option,'key','123456');

	if(!empty($multi_cats)){
		$key_cats = implode(", ", array_keys($multi_cats));
  		$option['cats']=$key_cats;
	} else{
		$key_cats='';
	}
      
	 
	$title_box_type = ssel_data($option,'title_box_type','main-tabs');
	$title_box_style = ssel_data($option,'title_box_style',ssel_option('title_box_style'));
	$class = ' rd-title-box-'.$title_box_type.' rd-title-box-'.$title_box_style.' ';
  
   	/*---------------------------------------------------------------------------------------------------------------------------
	Title Start-------------------------------------------------------------------------------------------------------------------
	----------------------------------------------------------------------------------------------------------------------------*/
 	if(!empty($option['title']) && $title_box_type!=='hide'){
		
		echo '<div class="rd-title-box  '.esc_attr($class).' "  >';
		
			echo '<h4 class="rd-title-box-warp">';
			
			
				/*---------------------------------------------------------------------------------------------------------------------------
				Tab Main-------------------------------------------------------------------------------------------------------------------
				----------------------------------------------------------------------------------------------------------------------------*/
				if(	$title_box_type =='main-right' ||
					$title_box_type =='main-center' ||
					$title_box_type =='main-tabs' 
 				){
 					echo '<div class="rd-tab-main"><span class=" rd-color-link rd-tab-padding ">'.esc_attr($option['title']).'</span></div>';
 		
 
				}
			
				/*---------------------------------------------------------------------------------------------------------------------------
				Between Item-------------------------------------------------------------------------------------------------------------------
				----------------------------------------------------------------------------------------------------------------------------*/
  				 

					/*---------------------------------------------------------------------------------------------------------------------------
					Tabs-------------------------------------------------------------------------------------------------------------------
					----------------------------------------------------------------------------------------------------------------------------*/
					if( 
						$title_box_type =='tabs-center' ||
 						$title_box_type =='main-tabs'
 					){
						$title_box_type_data= ssel_data($option,'title_box_all');
 						if( $title_box_type_data =='main-tabs'){
							$option['title']= ssel_data('title_box_all');
						}else{
							$option['title']=ssel_option('title_box_all');
						}
						
			 		if(!empty($tabs)  || $title_box_type =='tabs-center' ){
					echo '<ul class="rd-tabs">';
					 
						
						//Tab Item Active
						echo '<li class="rd-tab-active rd-tab-item rd-tab-item-first  rd-color-link"    data-cats="" data-orderby="'.esc_attr($orderby).'" data-max_page="'.esc_attr($max_page).'">';
							echo '<a class="rd-tab-padding">'.esc_html($option['title']).'</a>';
						echo '</li>';
						
						
						 
						//Tab Item 
							if(!empty($option['tabs']) && is_array($option['tabs']) ):
							foreach ($option['tabs'] as  $key => $value) : 
							$tab_cats = ssel_data($value,'cats');
							$tab_orderby = ssel_data($value,'orderby');
							
							$tabs_title = ssel_data($value,'title');
							$tab_max_page = ssel_query($value)->max_num_pages;
              
 						 
                 			echo '<li class="rd-tab-item  " data-cats="'.esc_attr($tab_cats).'"  data-orderby="'.esc_attr($tab_orderby).'" data-max_page="'.esc_attr($tab_max_page).'" >';
								echo '<a class="rd-tab-padding">'.esc_html($tabs_title).'</a>';
							echo '</li>';
         
		  
						endforeach;
						endif;  
						
						
						
						
					echo '</ul>';
 
  			
				}
					}
				/*---------------------------------------------------------------------------------------------------------------------------
				END Tabs-------------------------------------------------------------------------------------------------------------------
				----------------------------------------------------------------------------------------------------------------------------*/
			 
				/*---------------------------------------------------------------------------------------------------------------------------
				Arrow-------------------------------------------------------------------------------------------------------------------
				----------------------------------------------------------------------------------------------------------------------------*/
 
				 
		echo '</h4>';
				echo '<div class="rd-data-json">'.wp_kses_post(json_encode($option)).'</div>';

	echo'</div>';
  
	}
}
}

/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	After Widget Product List
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_after_widget_product_list' ) ) {

add_filter('woocommerce_after_widget_product_list','ssel_after_widget_product_list',1);
function ssel_after_widget_product_list() {
	 return '</div></aside>';
	 
 }
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Product Countdown
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_product_countdown' ) ) {

function ssel_product_countdown(){
	 if ( function_exists ( "is_woocommerce" )){
	global $product,$post;
     $sales_price_to = get_post_meta($post->ID, '_sale_price_dates_to', true);
     $sales_price_from = get_post_meta($post->ID, '_sale_price_dates_from', true);
     $diff=0;
     if ( !empty($sales_price_from) ) $diff = current_time( 'timestamp' ) - 12600 - $sales_price_from;  // use 12600 number for fix seconds this server gmt 3:30 time

if(!empty($sales_price_to) && ($diff >=0) ){
 
 echo '<div class="rd-countdown-warp rd-text-boxed rd-margin-top"><div class="rd-countdown" data-days="'.ssel_t('days').'" data-hours="'.ssel_t('hours').'" data-minutes="'.ssel_t('minutes').'" data-seconds="'.ssel_t('seconds').'" data-date="'.esc_attr(date("Y-m-d", $sales_price_to)).'"></div></div>';
   
}
}}
}
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Product Countdown
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_product_sale' ) ) {

function ssel_product_sale(){
	 if ( function_exists ( "is_woocommerce" )){
	global $product,$post;

 if ( $product->is_on_sale() ) : ?>

	<?php echo apply_filters( 'woocommerce_sale_flash', '<span class="onsale">' . ssel_t( 'salet') . '</span>', $post, $product ); ?>

<?php endif;
	 }
} 
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Product Category
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_product_category' ) ) {

function ssel_product_category($category_layout=false) {
	$terms = wp_get_post_terms(get_the_ID(),"product_cat");
	$size = !empty($font)? $font : 'small';
	
	$class='';
 
   
	
	
 	$count=0;
 	if(!empty($terms)){
	?>
 	<div class="rd-porduct-category rd-color-meta rd-text-none rd-all-category rd-font-small  rd-margin-bottom  ">
	<?php foreach ( $terms as $term ) { $count++; ?>
		<a href="<?php echo esc_url(get_term_link($term->term_id)); ?>"><?php echo esc_html( $term->name);?></a>
			<?php 
 			if($count == 3) { 
			break;
			}
			
			} ?>
	</div>
  	
<?php  }
}
 }
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Wishlist
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_wishlist' ) ) {

function ssel_wishlist() {
	if(  function_exists( 'yith_wishlist_constructor' ) ) {
 		echo '<div class="rd-cart-item rd-font-medium rd-wishlist-add">';
		echo do_shortcode( "[yith_wcwl_add_to_wishlist]" );
		echo '</div>';
	}
}
 }
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Compare Button
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_compare_button' ) ) {

function ssel_compare_button() {
	if(  function_exists( 'yith_woocompare_constructor' ) ) {
  		global $post;
		$home = get_home_url();
 		echo '<div class="rd-cart-item rd-font-medium rd-compare-add">';
		echo '<div class="woocommerce product compare-button"><a href="'.esc_url($home.'?action=yith-woocompare-remove-product&id='.$post->ID.'" class="compare button" data-product_id="'.$post->ID).'" rel="nofollow"><div class="rd-text-hover">'.ssel_t('compare').'</div></a></div>';
		
		echo '</div>';
 
	}
} 
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Product Thumb
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_product_thumb' ) ) {

function ssel_product_thumb( $option =false) { 
 	global $post,$product;
	$the_permalink = get_permalink();
   	$second_image =	ssel_data($option,'second_image');   
	$thumb =  ssel_data($option,'image_size','full');
	   
	$meta = get_post_meta( $post->ID );
 	$attachment_ids = version_compare(WC()->version, '3.0.0', '<') ? $product->get_gallery_image_ids() : $product->get_gallery_image_ids();
	$has_second_image = !empty($second_image) && !empty($attachment_ids[0]) ? ' rd-has-second':'';
 				
	if(has_post_thumbnail()){
	?> 
	<div class="rd-thumb-item"> 
	<div class="rd-thumb rd-thumb-style <?php  echo esc_attr($has_second_image);?> "> 
		<a href="<?php echo esc_url($the_permalink) ?>" >
        
        
 			<figure class="rd-thumb-warp ">
			<div class="rd-thumb-container"  >
                
				<?php the_post_thumbnail( $thumb );	?>
                     
				<?php if(!empty($second_image) && !empty($attachment_ids[0])){?>
					<?php $image_attributes = wp_get_attachment_image_src( $attachment_ids[0],$thumb);?>
					<img class="rd-second-image"  src="<?php echo esc_url($image_attributes[0]);?>" width="<?php echo esc_attr($image_attributes[1]);?>" height="<?php echo esc_attr($image_attributes[2]);?>" alt="<?php the_title_attribute();?>">
				<?php }?>
                    
                    
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
 
																	Product Post Title
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_product_post_title' ) ) {

function ssel_product_post_title($option= false,$font=false) {
	 	$limit = ssel_data($option,'title_limit');    

	$the_title = strip_tags(get_the_title());
  	if ( !empty($limit) && strlen($the_title) > $limit){
 		 $content= mb_substr($the_title, 0,$limit).'...';
		 
	} else {
		$content= $the_title;
		$dots='';
	}
	$font_size = !empty($font)?$font:'large';
 	?>
    
 	<div class="rd-title-warp  rd-element-child"><h3 class="rd-title  rd-color-link  rd-color-link-hover rd-font-<?php echo esc_attr($font_size);?>"><a class="rd-font-<?php echo esc_attr($font_size);?>" href="<?php the_permalink(); ?>"><?php echo esc_html($content);?></a></h3></div>
 	 	
	<?php 
}
 }
 if( ! function_exists( 'sv_change_product_price_display' ) ) {

function sv_change_product_price_display( $price ) {
	$out='<span class="rd-price rd-price-cart rd-price-'.get_option( 'woocommerce_currency_pos' ).'">';
	$out.=ssel_number_replace($price);
	 
	$out.='</span>';

 	return $out;
}
 }
 if( ! function_exists( 'ssel_price' ) ) {

 
add_filter( 'woocommerce_get_price_html', 'sv_change_product_price_display' );
add_filter( 'woocommerce_cart_item_price', 'sv_change_product_price_display' );
add_filter( 'woocommerce_cart_item_subtotal', 'sv_change_product_price_display' ); // added
add_filter( 'woocommerce_cart_subtotal', 'sv_change_product_price_display' ); // added
add_filter( 'woocommerce_cart_total', 'sv_change_product_price_display' );
 function ssel_price( $price =false) {
 
		 if ( function_exists ( "is_woocommerce" )){

	global $product;
	
	$font_size_price = !empty($price)?$price:'medium';
  	?>
  
     
    <div class="rd-price-warp rd-margin-top rd-text-none ">
    <div class="rd-price rd-font-<?php echo esc_attr($font_size_price);?> rd-price-<?php echo get_option( 'woocommerce_currency_pos' ); ?>">
 	<?php echo ssel_number_replace($product->get_price_html(true)); ?>
    </div>
    </div>
   
 <?php
		 }

}   
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Product Rating
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_product_rating' ) ) {

 function ssel_product_rating( $rating_size =false) {
		 if ( function_exists ( "is_woocommerce" )){

	global $product;
	
 	$font_size_rating = !empty($rating_size)?$rating_size:'medium';
	$rating_review =  $product->get_average_rating()  ;
	?>
  
 	<div class="rd-rating rd-text-none rd-margin-top rd-font-<?php echo esc_attr($font_size_rating);?>">
		<?php if(!empty($rating_review)){?>
  		<?php echo wc_get_rating_html( $product->get_average_rating() );?>
		<?php }else{?>
        <div class="star-rating"><span> <strong class="rating"></strong> </span></div>
    <?php }?>
	</div>
 <?php
	}	 
} 
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Add To Cart
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_add_to_cart' ) ) {

function ssel_add_to_cart() {
	
		 if ( function_exists ( "is_woocommerce" )){
?>
    <div class="rd-add-to-cart rd-font-large">
	  <div class="rd-cart-item">
	  <?php woocommerce_template_loop_add_to_cart();?>
      </div>
      <?php
	  ssel_wishlist();
	  ssel_compare_button();
	   ?>
</div>
<?php }
}
 }
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Product Excerpt
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_product_excerpt' ) ) {

function ssel_product_excerpt($option=false) {
 
	global $post;
	$limit = ssel_data($option,'excerpt_limit');    
	$excerpt_layout = ssel_data($option,'excerpt_layout');    
 
	$the_excerpt = strip_tags(apply_filters( 'woocommerce_short_description', $post->post_excerpt ));
  	if ( !empty($limit) && strlen($the_excerpt) > $limit){
 		 $content= mb_substr($the_excerpt, 0,$limit).'...';
		 
	}else{
		$content= $the_excerpt;
 	}
	?>
    
   	<div class="rd-excerpt-warp "><div class="rd-excerpt  rd-color-text rd-text-none rd-margin-top rd-font-medium"><?php echo esc_html($content);?></div></div>
 
     <?php
	 
} 
 }
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Button Add to Cart
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_button_add_to_cart' ) ) {

function ssel_button_add_to_cart() {
	
	if ( function_exists ( "is_woocommerce" )){
?>
    <div class="rd-button-add-to-cart rd-cart-item rd-font-medium">
	  <?php woocommerce_template_loop_add_to_cart(); ?>
	</div>
<?php
}
}
 }
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	change number related products
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_change_number_related_products' ) ) {

add_filter( 'woocommerce_output_related_products_args', 'ssel_change_number_related_products', 9999 );
function ssel_change_number_related_products( $args ) {
 $args['posts_per_page'] = 4; // # of related products
 $args['columns'] = 4; // # of columns per row
 return $args;
}
 }