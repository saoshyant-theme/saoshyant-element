<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

														Staff Post Type

*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_staff_post_type' ) ) {

add_action( 'init', 'ssel_staff_post_type' );
function ssel_staff_post_type() {
	  $labels = array(
        'name'                => __( 'Staff Member', 'ssel'),
        'singular_name'       => __( 'Staff', 'ssel'),
        'menu_name'           => __( 'Staff Member',  'ssel'),
        'parent_item_colon'   => __( 'Parent Movie', 'ssel'),
        'all_items'           => __( 'All Staff Member', 'ssel'),
        'view_item'           => __( 'View Staff', 'ssel'),
        'add_new_item'        => __( 'Add New Staff', 'ssel'),
        'add_new'             => __( 'Add New',  'ssel'),
        'edit_item'           => __( 'Edit Staff', 'ssel'),
        'update_item'         => __( 'Update Staff', 'ssel'),
        'search_items'        => __( 'Search Staff', 'ssel'),
        'not_found'           => __( 'Not Found', 'ssel'),
        'not_found_in_trash'  => __( 'Not found in Trash',  'ssel'),
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
		'supports' => array( 'title', 'thumbnail' ,'editor')
	); 
	 

	register_post_type( 'staff', $args );
}
 }
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************

														Staff Categorries Taxonomy

*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_staff_categories_taxonomy' ) ) {

add_action( 'init', 'ssel_staff_categories_taxonomy', 1 );
function ssel_staff_categories_taxonomy() {
 
   $labels = array(
		'name'							=> __( 'Categories','ssel' ),
		'singular_name'					=> __( 'Category','ssel'  ),
		'search_items'					=> __( 'Search Categories' ,'ssel' ),
		'popular_items'					=> __( 'Popular Categories','ssel'  ),
		'all_items' 					=> __( 'All Categories' ,'ssel' ),
 		'parent_item'					=> __( 'Parent Category' ,'ssel' ),
		'edit_item'						=> __( 'Edit Topic','ssel' ), 
		'update_item' 					=> __( 'Update Category','ssel'  ),
		'add_new_item'					=> __( 'Add New Category','ssel'  ),
		'new_item_name'			 		=> __( 'New Topic Name' ,'ssel' ),
		'separate_items_with_commas'	=> __( 'Separate Categories with commas' ,'ssel' ),
		'add_or_remove_items'			=> __( 'Add or remove Categories','ssel'  ),
		'choose_from_most_used' 		=> __( 'Choose from the most used Categories','ssel'  ),
		'menu_name' 					=> __( 'Categories' ,'ssel' ),
	);  
	$staff_category_slug =  ssel_option('staff_category_slug') ;
  
	register_taxonomy('staff_category','staff', array(
		'hierarchical' 					=> true,
		'labels' 						=> $labels,
		'show_ui' 						=> true,
		'show_admin_column'				=> true,
		'query_var'						=> true,
   ));

}
 
 
add_action('manage_ssel_staff_posts_custom_column', 'ssel_display_thumbnails_column', 5, 2);
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															staff Display thumbnail column

*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_staff_add_thumbnail_column' ) ) {
add_filter('manage_staff_posts_columns', 'ssel_staff_add_thumbnail_column', 5);
function ssel_staff_add_thumbnail_column($columns){
   $columns['new_post_thumb'] = __('Featured Image','ssel');
  return $columns;
} 
 }
 if( ! function_exists( 'ssel_staff_display_thumbnail_column' ) ) {
add_action('manage_staff_posts_custom_column', 'ssel_staff_display_thumbnail_column', 5, 2);
function ssel_staff_display_thumbnail_column($column_name, $post_id){
  switch($column_name){
    case 'new_post_thumb':
      $post_thumbnail_id =  get_post_thumbnail_id($post_id);
		$thumbnail = !empty($post_thumbnail_id)? wp_get_attachment_image_src($post_thumbnail_id, 'thumbnail'):'';

       if (!empty($thumbnail[0])) {
         echo '<img width="100" src="' . esc_url($thumbnail[0]) . '" />';
      }
      break;
  }
}
 }
 ?>