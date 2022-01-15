<?php
 /*
Plugin Name: Saoshyant Element
Description: ALL elmenet ,Custom Post Type,Portfolio,Staff Member,Price Tablet,testimonials,Products,Widget,Addon for Elementor
Author: Saoshyant 
Version: 1.0

License: GPLv2 or later
Text Domain: saoshyant-element
*/

/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more dSTails.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin StreST, Fifth Floor, Boston, MA  02110-1301, USA.
 
*/

if( !defined('SSEL_PATH') ){
	define( 'SSEL_PATH', plugin_dir_path(__FILE__) );
}
if( !defined('SSEL_DIR') ){
	define( 'SSEL_DIR', plugin_dir_url(__FILE__) );
}	
  
if( ! function_exists( 'ssel_constructor' ) ) {
    function ssel_constructor() {

        load_plugin_textdomain( 'ssel', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
 
    }
}
add_action( 'sao_slider_init', 'ssel_constructor' );

/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																 Slider Install
 
*/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
if( ! function_exists( 'ssel_install' ) ) {
function ssel_install() {

     
            do_action( 'ssel_init' );
}
 
add_action( 'plugins_loaded', 'ssel_install', 1 );
}
include_once SSEL_PATH . 'admin/post-type/blog_post_type.php';     
include_once SSEL_PATH . 'admin/post-type/portfolio_post_type.php';     
include_once SSEL_PATH . 'admin/post-type/pricetable_post_type.php';     
include_once SSEL_PATH. 'admin/post-type/testimonials_post_type.php';     
include_once SSEL_PATH . 'admin/post-type/staff_post_type.php';     
include_once SSEL_PATH . 'admin/array.php';  



/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
																		
																		Option
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_option' ) ) {
function ssel_option($id, $def =false,$true =false) {
	global $smof_data,$post;
	
	$data=$smof_data;
 	if( is_singular()) {
		global $post;
		$mSTa = get_post_meta( $post->ID );
	}  	
	
 	if(!empty( $mSTa[$id][0] )){
		$st_option = !empty($true) ? $true : $mSTa[$id][0] ;

	}elseif(!empty($data[$id])){
		$st_option = !empty($true) ? $true : $data[$id];
		
	}else{
		$st_option =!empty($def)?$def:'';
 	}
  	return $st_option;
}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																		Option Array
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_option_2' ) ) {

function ssel_option_2($id,$arge_2 ,$def =false,$true =false) {
 		global $smof_data,$post;

	$data=$smof_data;
 	if( is_singular()) {
		global $post;
  		$mSTa = get_post_meta($post->ID, $id, true);
 	}  	
 
 
  	if(!empty( $mSTa[$arge_2] )){
		$st_option = !empty($true) ? $true : $mSTa[$arge_2] ;

	}
	elseif(!empty($data[$id][$arge_2])){
		$st_option = !empty($true) ? $true : $data[$id][$arge_2];
		
	}else{
		$st_option =!empty($def)?$def: '';
		
	}
		 
 	return $st_option;
}
 }

?>