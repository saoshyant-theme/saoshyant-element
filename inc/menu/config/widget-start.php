<?php
   /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Widget Start
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$widget = ! empty( $item->ssel_menu_widget ) ? $item->ssel_menu_widget : '';

ob_start(); 

   	$widgets = !empty( $widget ) ? $widget : '';
	
	if ( is_active_sidebar( $widgets ) ) : 
		echo '<section class="rd-custom-widget rd-sidebar rd-sidebar-layout-none" >';
		dynamic_sidebar( sanitize_title($widgets) ); 
		echo '</section>';
	endif;
		
	$item_output =ob_get_clean();  	
			
		
   
$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );

				?>