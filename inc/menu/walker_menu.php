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
 
																	Walker Nav Menu
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

 if( ! class_exists( 'ssel_Walker_Nav_Menu' ) ) {
class ssel_Walker_Nav_Menu extends Walker {
 
        public $tree_type = array( 'post_type', 'taxonomy', 'custom' );
		public $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );
        
        public function start_lvl( &$output, $depth = 0, $args = array() ) {
                $indent = str_repeat("\t", $depth);
                $output .= "\n$indent<ul class=\"sub-menu  rd-menu-dropdown-box  rd-color-text rd-color-item  rd-color-background rd-color-box rd-color-border  sub-depth-".esc_attr($depth)." \">\n";
				if($depth ==0){
                $output .= '<li class="rd-menu-background"></li>';
				}
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
 				
				
			if($item->type == 'image_text'){
  			}elseif($item->type == 'image'){
  			}elseif($item->type == 'page_builder'){
  			 }elseif($item->type == 'section'){
 			}else{
   				$output .= "</li>\n";
			}
		}
} 
  /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																  El Icon
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if ( !function_exists ( "ssel_icon_font" )){
 function ssel_icon_fontfamily($value =false) {
 	 	if(!empty($value)){
	 	global $sao_fonticon_style;
	 	if(strpos($value,'fa-')!==false){
			$sao_fonticon_style['FontAwesome']=true;
		}
	 	if(strpos($value,'flaticonarrow-')!==false){
			$sao_fonticon_style['flaticonarrow']=true;
		}
		if(strpos($value,'flaticonmultimedia-')!==false){
			$sao_fonticon_style['flaticonmultimedia']=true;
		} 
		
		if(strpos($value,'flaticonbusiness-')!==false){
			$sao_fonticon_style['flaticonbusiness']=true;
		} 
			
		if(strpos($value,'flaticonoffice-')!==false){
			$sao_fonticon_style['flaticonoffice']=true;
		} 
		if(strpos($value,'flaticoninterface-')!==false){
			$sao_fonticon_style['flaticoninterface']=true;
		} 
		
		if(strpos($value,'flaticonessentialset-')!==false){
			$sao_fonticon_style['flaticonessentialset']=true;
		} 
		if(strpos($value,'flaticontechsupport-')!==false){
			$sao_fonticon_style['flaticontechsupport']=true;
		} 
		if(strpos($value,'flaticontech-')!==false){
			$sao_fonticon_style['flaticontech']=true;
		} 
		if(strpos($value,'flaticonstrategy-')!==false){
			$sao_fonticon_style['flaticonstrategy']=true;
		} 
		if(strpos($value,'flaticonhipster-')!==false){
			$sao_fonticon_style['flaticonhipster']=true;
		} 
		if(strpos($value,'flaticonfashion-')!==false){
			$sao_fonticon_style['flaticonfashion']=true;
		} 
		if(strpos($value,'flaticonwebdesign-')!==false){
			$sao_fonticon_style['flaticonwebdesign']=true;
		} 
		if(strpos($value,'flaticontravel-')!==false){
			$sao_fonticon_style['flaticontravel']=true;
		} 
		if(strpos($value,'flaticonnetwork-')!==false){
			$sao_fonticon_style['flaticonnetwork']=true;
		} 
 		 
	 	if(strpos($value,'metrizeicon-')!==false){
			$sao_fonticon_style['metrizeicon']=true;
		}
 		if(strpos($value,'typcn-')!==false){
			$sao_fonticon_style['typcn']=true;
		} 
		}
	 
 }
}
 }
if ( !function_exists ( "ssel_icon_enqueue" )){
function ssel_icon_enqueue($var=false,$true=false) {
	global $sao_fonticon_style;
	
}
}
   add_action('wp_footer', 'ssel_icon_enqueue');

 
?>