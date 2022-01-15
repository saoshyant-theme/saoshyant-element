<?php
  /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Image Text Start
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$image = ! empty( $item->ssel_menu_image ) ? $item->ssel_menu_image : '';
$image_url = ! empty( $item->ssel_menu_image_url ) ? $item->ssel_menu_image_url : '';
 $title = apply_filters( 'the_title', $item->title, $item->ID );

				
//Main Class
$alignment =! empty( $item->ssel_menu_alignment ) ? 'rd_alignment_'.$item->ssel_menu_alignment : 'rd_alignment_'.ssel_rtl_left();

  
if(  $depth!==0){
$item_output = '<div class="sao-element-item rd-element-menu-image-text rd-menu-image-text '.esc_attr($alignment).'">';
if(!empty($image)){
$item_output.= '<div class="rd-menu-image">';
	if(!empty($image_url) ){ 
		$item_output .= '<a href="'.esc_attr($image_url).'">';
	}
	$src_image= wp_get_attachment_image_src($image,'full');
 	$item_output .= '<img src="'.esc_url($src_image[0]).'" width="'.esc_attr($src_image[1]).'" height="'.esc_attr($src_image[2]).'">';
	if(!empty($image_url) ){ 
		$item_output .= '</a>';
	}
$item_output .= '</div>';
 }
$item_output .= '<div class="rd-menu-text li-menu-item menu-item">';
 		$item_output .= '<a class="menu-item-link" href="'.esc_url($image_url).'">';
	 
	 $item_output .= esc_html($title);
	
 		$item_output .= '</a>';
	 
	
 $item_output .= '</div>';
$item_output .= '</div>';
 
}else{
$item_output = '';

}
 $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

				?>