<?php
/**
 * Nav Menu API: Walker_Nav_Menu class
 *
 * @package WordPress
 * @subpackage Nav_Menus
 * @since 4.6.0
 */
/**
 * Core class used to implement an HTML list of nav menu items.
 *
 * @since 3.0.0
 *
 * @see Walker
 */
 
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	 Nav Menu Mobile
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! class_exists( 'ssel_Walker_Nav_Menu_Mobile' ) ) {

class ssel_Walker_Nav_Menu_Mobile extends Walker {
 
        public $tree_type = array( 'post_type', 'taxonomy', 'custom' );
		public $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );
        
        public function start_lvl( &$output, $depth = 0, $args = array() ) {
                $indent = str_repeat("\t", $depth);
                $output .= "\n$indent<ul class=\"sub-menu rd-color-item   sub-depth-".esc_attr($depth)." \">\n";
			 
	    } 
        public function end_lvl( &$output, $depth = 0, $args = array() ) {
                $indent = str_repeat("\t", $depth);
                $output .= "$indent</ul>\n";
        } 
		
        public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
                $atts = array();
                $atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
                $atts['target'] = ! empty( $item->target )     ? $item->target     : '';
                $atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
                $atts['href']   = ! empty( $item->url )        ? $item->url        : '';
  				
   				 
 				 
                 
 				 
         }
       
        public function end_el( &$output, $item, $depth = 0, $args = array() ) {
 				
				
			 
   				$output .= "</li>\n";
			
		}
}
 }// Walker_Nav_Menu 
 