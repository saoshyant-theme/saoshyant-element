<?php
  /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Menu Item Start
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$featured = ! empty( $item->ssel_menu_featured ) ? $item->ssel_menu_featured : '';
$icon = ! empty( $item->ssel_menu_icon ) ? $item->ssel_menu_icon : '';
$icon_size = ! empty( $item->ssel_menu_icon_size ) ? $item->ssel_menu_icon_size : '';
$sub_width = ! empty( $item->ssel_menu_sub_width ) ? $item->ssel_menu_sub_width : '';
$background_image = ! empty( $item->ssel_menu_background_image ) ? $item->ssel_menu_background_image : '';								
$background_full_size = ! empty( $item->ssel_menu_background_full_size ) ? $item->ssel_menu_background_full_size : '';								
$background_position = ! empty( $item->ssel_menu_background_position ) ? $item->ssel_menu_background_position : '';								
				
//Main Class
$classes = empty( $item->classes ) ? array() : (array) $item->classes;
 			 if($item->type !== 'section' && $depth !== 0 ){
				 $classes[] = 'rd-menu-not-section';
 			 }
$classes[] = 'menu-item-' . $item->ID;
$classes[] = 'li-depth-' . $depth;
 
$classes[] = 'li-menu-item';
$classes[] = 'rd-color-border';
$classes[] = !empty($sub_width) && $depth == 0 ? 'rd-menu-width-'. $sub_width:'';
$classes[] = !empty($background_image) && $depth == 0  ? 'rd-has-background-image':'';
$classes[] = !empty($background_full_size) && $depth == 0 ? 'rd-menu-background-full-size':'';
$classes[] = !empty($background_position)  && $depth == 0 ? 'rd-position-'.$background_position:'';

$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
 	ssel_icon_fontfamily($icon );
 
//A Class
$a_classes = array();
 
$a_classes[] = 'rd-depth-'.$depth;
$a_classes[] = 'menu-item-link';
$a_classes[] = 'rd-color-border';

$a_classes[] = 'rd-header-padding';
 $a_classes[] = !empty($icon)? 'rd-has-icon '.$icon:'';
  ssel_icon_fontfamily($icon);

$a_classes[] = !empty($icon_size)? $icon_size:'';
$a_classes_names = join( ' ', $a_classes );
	
if(!empty($background_image) && $depth == 0){
	$background_image= wp_get_attachment_image_src($background_image,'full');
	$data_background = ' data-background="'.esc_url($background_image[0]).'"';
}else{
	$data_background = ' ';
}

$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
                  
$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );
                   
$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';
$output .= $indent . '<li' . $id .$data_background.'   class=" rd-color-dropdown '.esc_attr($class_names).'">';

$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );
$attributes = '';
foreach ( $atts as $attr => $value ) {
	if ( ! empty( $value ) ) {
		$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
		$attributes .= ' ' . $attr . '="' . $value . '"';
	}
}
$title = apply_filters( 'the_title', $item->title, $item->ID );
$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );
$item_output = $args->before;
				
				
$item_output .= '<a'. $attributes .' class="'.esc_attr($a_classes_names).'">';
 
$item_output .= $args->link_before . $title . $args->link_after;
				
				
if(!empty($featured)){
	$item_output .= '<span class="rd-menu-featured rd-element-text rd-menu-featured-'.esc_attr($featured).' ">';
	
	if($featured == 'new'){
		$item_output .= ssel_t('new');
	}elseif($featured == 'sale'){
		$item_output .= ssel_t('sale');
	}elseif($featured == 'hot'){
		$item_output .= ssel_t('hot');
	}elseif($featured == 'featured'){
		$item_output .= ssel_t('featured');
	}
	$item_output .= '</span>';
}

$item_output .= '</a>';
$item_output .= $args->after;

$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

				?>