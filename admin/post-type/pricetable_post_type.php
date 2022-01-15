<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

														Price Table Post Type

*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_price_post_type' ) ) {

add_action( 'init', 'ssel_price_post_type' );
function ssel_price_post_type() {
	
	$labels = array(
		'name' 					=> __('Price Tables','ssel'),
		'singular_name'			=> __('Price Table','ssel'),
		'add_new'				=> __('Add New','ssel'),
		'add_new_item'			=> __('Add New Price Table','ssel'),
		'edit_item'				=> __('Edit Price Table','ssel'),
		'new_item'				=> __('New Price','ssel'),
		'view_item'				=> __('View Price Table','ssel'),
 		'all_items'				=> __('All Price Tables','ssel'),
 		'search_items'			=> __('Search Price','ssel'),
		'not_found'				=> __('No Price found','ssel'),
		'not_found_in_trash'	=>__('No Price found in trash','ssel'),
		'parent_item_colon'		=> '',
		'menu_name'				=> __('Price Tables','ssel')
	);
	
	$args = array(
		'labels'				=> $labels,
		'public'				=> true,
		'publicly_queryable'	=> true,
		'show_ui'				=> true, 
		'show_in_menu'			=> true, 
		'query_var'				=> true,
   		'capability_type'		=> 'post',
		'has_archive'			=> true, 
		'hierarchical'			=> false,
		'menu_position'			=> null,
		'supports' => array( 'title')
	); 
	 

	register_post_type( 'pricetable', $args );
}
 }
?>