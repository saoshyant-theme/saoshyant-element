<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Portfolio Post Type

*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_portfolio_post_type' ) ) {

add_action( 'init', 'ssel_portfolio_post_type' );
function ssel_portfolio_post_type() {
	$labels = array(
		'name' 					=> __('Portfolio','ssel'),
		'singular_name'			=> __('Portfolio','ssel'),
		'add_new'				=> __('Add New','ssel'),
		'add_new_item'			=> __('Add New Portfolio','ssel'),
		'edit_item'				=> __('Edit Portfolio','ssel'),
		'new_item'				=> __('New Portfolio','ssel'),
		'view_item'				=> __('View Portfolio','ssel'),
 		'all_items'				=> __('All Portfolio','ssel'),
 		'search_items'			=> __('Search Portfolio','ssel'),
		'not_found'				=> __('No Portfolio found','ssel'),
		'not_found_in_trash'	=>__('No Portfolio found in trash','ssel'),
		'parent_item_colon'		=> '',
		'menu_name'				=> __('Portfolio','ssel')
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
	$portfolio_slug =  ssel_option('portfolio_slug') ;
	if(!empty($portfolio_slug)){
		$args['rewrite']= array('slug' => sanitize_title($portfolio_slug));
	}

	register_post_type( 'portfolio', $args );
}
  
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Portfolio Categories Taxonomy

*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_portfolio_post_type' ) ) {

add_action( 'init', 'ssel_portfolio_categories_taxonomy', 1 );
function ssel_portfolio_categories_taxonomy() {
 
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


// Now register the taxonomy
 	$portfolio_category_slug =  ssel_option('portfolio_category_slug') ;
 
	
  register_taxonomy('portfolio_category','portfolio', array(
    'hierarchical' 					=> true,
    'labels' 						=> $labels,
    'show_ui' 						=> true,
    'show_admin_column'				=> true,
    'query_var'						=> true,
    'rewrite' 						=> array( 'slug' => sanitize_title($portfolio_category_slug) ),
  ));

}
 }
 
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Portfolio Tags Taxonomy

*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_portfolio_tags_taxonomies' ) ) {
add_action( 'init', 'ssel_portfolio_tags_taxonomies',1 );
function ssel_portfolio_tags_taxonomies() 
{
  	$portfolio_tag_slug =  ssel_option('portfolio_tag_slug') ;

   register_taxonomy( 'portfolio_tag', 
    	array('portfolio'),  
    	array('hierarchical'		=> false,  
     		'labels' 				=> array(
					'name' 				=> __( 'Tags', 'ssel' ),  
					'singular_name'		=> __( 'Tag', 'ssel' ), 
					'search_items' 		=>  __( 'Search Tags', 'ssel' ),  
					'all_items' 		=> __( 'All Tags', 'ssel' ),  
					'parent_item' 		=> __( 'Parent Tag', 'ssel' ),  
					'parent_item_colon' => __( 'Parent Tag:', 'ssel' ), 
					'edit_item'			=> __( 'Edit Tag', 'ssel' ),  
					'update_item' 		=> __( 'Update Tag', 'ssel' ), 
					'add_new_item' 		=> __( 'Add New Tag', 'ssel' ), 
					'new_item_name' 	=> __( 'New Tag Name', 'ssel' )  
    		),
    		'show_ui' 				=> true,
    		'query_var' 			=> true,
		    'rewrite'				=> array( 'slug' => sanitize_title($portfolio_tag_slug) ),
    	)
    );
 
}

add_action('manage_ssel_portfolio_posts_custom_column', 'ssel_display_thumbnails_column', 5, 2);
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Portfolio Display thumbnail column

*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if( ! function_exists( 'ssel_portfolio_add_thumbnail_column' ) ) {
add_filter('manage_portfolio_posts_columns', 'ssel_portfolio_add_thumbnail_column', 5);
function ssel_portfolio_add_thumbnail_column($columns){
   $columns['new_post_thumb'] = __('Featured Image','ssel');
  return $columns;
} 

}
 if( ! function_exists( 'ssel_portfolio_display_thumbnail_column' ) ) {

add_action('manage_portfolio_posts_custom_column', 'ssel_portfolio_display_thumbnail_column', 5, 2);
function ssel_portfolio_display_thumbnail_column($column_name, $post_id){
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
