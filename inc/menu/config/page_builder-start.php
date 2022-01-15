<?php
  /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Page Builder Start
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 $item_output='';
	$ssel_menu_page_builder = ! empty( $item->ssel_menu_page_builder ) ? $item->ssel_menu_page_builder : '';
	if(!empty($ssel_menu_page_builder)){
		$post_name = get_page_by_path($ssel_menu_page_builder);
		   if(function_exists( "sao_builder_meta") && !empty($post_name)){
 
				$out = sao_section_config($post_name->ID,'output');
				$css = sao_section_config($post_name->ID,'css');
				$script = sao_section_config($post_name->ID,'script');
				if(!empty($out)){
 				$item_output.= '<div class="rd-menu-page-builder">'.esc_html($out).'</div>';
				ob_start(); 
				sao_enqueue_footer();
				$item_output.=ob_get_clean();
				}
				 
		   }else{
			   $out='';
			   $css='';
			   $script='';
		   }
 			  
  }
$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
 
				?>