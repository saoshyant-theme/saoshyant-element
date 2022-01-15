<?php
  /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Section Start
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if($depth!==0){
$sub_column = ! empty( $item->ssel_menu_sub_column ) ? $item->ssel_menu_sub_column : '1-1';
 
$attr = array();
$attr[] = isset( $item->ssel_menu_padding_top )? 'data-padding-top="'.$item->ssel_menu_padding_top.'"':'';
$attr[] = isset( $item->ssel_menu_padding_right )? 'data-padding-right="'.$item->ssel_menu_padding_right.'"':'';
$attr[] = isset( $item->ssel_menu_padding_bottom)? 'data-padding-bottom="'.$item->ssel_menu_padding_bottom.'"':'';
$attr[] = isset( $item->ssel_menu_padding_left )? 'data-padding-left="'.$item->ssel_menu_padding_left.'"':'';
 
 
$item_output = '<li class="rd-menu-section rd-menu-section-'.esc_attr($sub_column).' rd-sub-section-'.esc_attr($depth).' " '.wp_kses_post(join( ' ', $attr )).'>';
}else{
$item_output = '';
}
$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

				?>