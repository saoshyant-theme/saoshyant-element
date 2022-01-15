<?php
  /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Image Start
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$image = ! empty( $item->ssel_menu_image ) ? $item->ssel_menu_image : '';
$image_url = ! empty( $item->ssel_menu_image_url ) ? $item->ssel_menu_image_url : '';
$width = ! empty( $item->ssel_menu_full_width ) ? 'rd-menu-image-full-width': '';
$height = ! empty( $item->ssel_menu_full_height ) ? 'rd-menu-image-full-height': '';
				
//Main Class
 
  
if(!empty($image) && $depth!==0){
$item_output = '<div class="sao-element-item rd-element-menu-image">';
$item_output.= '<div class="rd-menu-image '.esc_attr($width).' '.esc_attr($height).'">';
	if(!empty($image_url) ){ 
		$item_output .= '<a href="'.esc_attr($image_url).'">';
	}
	$src_image= wp_get_attachment_image_src($image,'full');
 	$item_output .= '<img src="'.esc_url($src_image[0]).'" width="'.esc_attr($src_image[1]).'" height="'.esc_attr($src_image[2]).'">';
	if(!empty($image_url) ){ 
		$item_output .= '</a>';
	}
$item_output .= '</div>';
$item_output .= '</div>';
}else{
$item_output = '';

}
 $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

				?>