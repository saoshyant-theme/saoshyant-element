<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	All Image Size
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_all_image_sizes' ) ) {

function ssel_all_image_sizes() {
    global $_wp_additional_image_sizes;
    $default_image_sizes = get_intermediate_image_sizes();

    foreach ( $default_image_sizes as $size ) {
        $image_sizes[ $size ][ 'width' ] = intval( get_option( "{$size}_size_w" ) );
        $image_sizes[ $size ][ 'height' ] = intval( get_option( "{$size}_size_h" ) );
        $image_sizes[ $size ][ 'crop' ] = get_option( "{$size}_crop" ) ? get_option( "{$size}_crop" ) : false;
    }

    if ( isset( $_wp_additional_image_sizes ) && count( $_wp_additional_image_sizes ) ) {
        $image_sizes = array_merge( $image_sizes, $_wp_additional_image_sizes );
    } 
	 
 	$image = array();
  	foreach ($image_sizes as $key => $value) {
     	$image[esc_html($key)] = esc_html($key).' '.$value['width'].' x '.$value['height'];
	}	
 	$image['full'] = esc_html__('Full','ssel');
	 
	return $image;	
	
	
}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
 
																	Array Options
 
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_array_options' ) ) {

function ssel_array_options($value) {
	
	 
	global $wp_registered_sidebars;
 	$sidebar_options = array();
 	$sidebar_options[''] = esc_html__('Default','ssel'); 
  	$sidebar_options_obj = $wp_registered_sidebars;
  	if(!empty($sidebar_options_obj)){
		foreach ($sidebar_options_obj as $side) {
			$sidebar_options[$side['id']] = $side['name'];
		}
	}
 
	$options['sidebars'] = $sidebar_options;
	
	$sidebar_options = array();
	$sidebar_options_obj = get_option('ssel_boxes');
	$sidebar_options['ssel_main_sidebar'] = esc_html__('Primery Sidebar','ssel') ;
  	if(!empty($sidebar_options_obj) && is_array($sidebar_options_obj) ){
		foreach ($sidebar_options_obj as $side) {
			$sidebar_options['ssel_'.sanitize_title($side)] = $side;
		}
	}
	
	
	$page_args = array(
			'sort_order' => 'asc',
			'sort_column' => 'post_title',
			'hierarchical' => 1,
			'meta_key' => 'sao_show_page_builder',
			'meta_value' => '1',
			'child_of' => 0,
			'parent' => -1,
			'post_type' => 'page',
			'post_status' => 'publish'
		); 
		 
		$options_page = array();
		$options_page_obj =get_pages($page_args); 
 
		if(!empty($options_page_obj) && is_array($options_page_obj) ){
		foreach ($options_page_obj as $sselpage) {
			$options_page[$sselpage->post_name] = $sselpage->post_title;
		}
	}	
	
	$options['page_builder'] = $options_page;

	
	$page_args = array(
			'sort_order' => 'asc',
			'sort_column' => 'post_title',
			'hierarchical' => 1,
			'meta_key' => 'sao_show_page_builder',
			'meta_value' => '1',
			'child_of' => 0,
			'parent' => -1,
			'post_type' => 'page',
			'post_status' => 'publish'
		); 
		 
		$options_page = array();
		$options_page_obj =get_pages($page_args); 
 		$options_page[''] = __('Default','ssel');

		if(!empty($options_page_obj) && is_array($options_page_obj) ){
		foreach ($options_page_obj as $sselpage) {
			$options_page[$sselpage->post_name] = $sselpage->post_title;
		}
	}	
	
	$options['page_builder_footer'] = $options_page;

	
	$options['post_type']= array(
		'posts'				=>	esc_html__('Posts','ssel'),
 		'slides'			=>	esc_html__('Custom Slides','ssel'),
	);	 
	 
	$options_sliders = array();
	$options_sliders_obj = get_categories('taxonomy=ssel_sliders&type=ssel_slides&hide_empty=0'); 
	if(!empty($options_sliders_obj) && is_array($options_sliders_obj) ){
  	foreach ($options_sliders_obj as $slider) {
    	$options_sliders[$slider->cat_ID] = $slider->cat_name;
	}	 
	}
	$options['sliders'] = $options_sliders;
	
	
	$options_product = array();
	$options_product_obj = get_categories('taxonomy=product_cat&type=product&hide_empty=0');
	 	$options_product['']=  ssel_t('category');  
	if(!empty($options_product_obj) && is_array($options_product_obj) ){
 	foreach ($options_product_obj as $product) {
    	$options_product[$product->slug] = $product->cat_name;
	}
	}
	 
	$options['product_cat'] = $options_product;
	
		  
 	$options['sidebar']= $sidebar_options;  
	$options_categories = array();
	$options_categories_obj = get_categories('hide_empty=0');
 	$options_categories['']=esc_html__('All Categories','ssel');
	if(!empty($options_categories_obj) && is_array($options_categories_obj) ){
 	foreach ($options_categories_obj as $category) {
		$options_categories[$category->slug] = $category->cat_name;
	}
	}

	$options['cats']= $options_categories;
	
	
	
 	$menu = array();
	$menu_obj = wp_get_nav_menus();
	if(!empty($menu_obj) && is_array($menu_obj) ){
 	foreach ($menu_obj as $menu_item) {
		$menu[$menu_item->term_id] = $menu_item->name;
	}
	}
	$options_testimonial = array();
	$options_testimonial_obj = get_categories('taxonomy=testimonial_category&type=testimonial&hide_empty=0');
	 	$options_testimonial['']=  ssel_t('category');  
	if(!empty($options_testimonial_obj) && is_array($options_testimonial_obj) ){
 	foreach ($options_testimonial_obj as $testimonial) {
    	$options_testimonial[$testimonial->slug] = $testimonial->cat_name;
	}
	}
	 
	$options['testimonial_category'] = $options_testimonial;


	$options_staff = array();
	$options_staff_obj = get_categories('taxonomy=staff_category&type=staff&hide_empty=0');
	 	$options_staff['']=  ssel_t('category');  
	if(!empty($options_staff_obj) && is_array($options_staff_obj) ){
 	foreach ($options_staff_obj as $staff) {
    	$options_staff[$staff->slug] = $staff->cat_name;
	}
	}
	 
	$options['staff_category'] = $options_staff;


	$options_portfolio = array();
	$options_portfolio_obj = get_categories('taxonomy=portfolio_category&type=portfolio&hide_empty=0');
	 	$options_portfolio['']=  ssel_t('category');  
	if(!empty($options_portfolio_obj) && is_array($options_portfolio_obj) ){
 	foreach ($options_portfolio_obj as $portfolio) {
    	$options_portfolio[ $portfolio->slug ] = $portfolio->cat_name;
	}
	}
	 
	$options['portfolio_category'] = $options_portfolio;


	$options['menu']= $menu;
	 	$options['unit']= array(
		'px'				=>	esc_html__('px', 'ssel' ),
		'%'					=>	esc_html__('%', 'ssel' ), 
		'em'				=>	esc_html__('em', 'ssel' ), 
 		
	);
		
		
		
		
		
		

	$price_args = array(
			'sort_order' => 'asc',
			'sort_column' => 'post_title',
 
			'post_type' => 'pricetable',
			'post_status' => 'publish'
		); 
		 
		$options_price = array();
		$options_price_obj =get_posts($price_args); 
 
		if(!empty($options_price_obj) && is_array($options_price_obj) ){
		foreach ($options_price_obj as $price) {
			$options_price[$price->post_name] = $price->post_title;
		}
	}	
	
	$options['pricetable'] = $options_price;
	
	
	$contactform_args = array('post_type' => 'wpcf7_contact_form', 'posts_per_page' => -1);
 
		 
	$options_contactform= array();
	$options_contactform_obj =get_posts($contactform_args); 
 
	if(!empty($options_contactform_obj) && is_array($options_contactform_obj) ){
		foreach ($options_contactform_obj as $contactform) {
			if(!empty($contactform)){
			$options_contactform[$contactform->post_name] = $contactform->post_title;
		}}
	}	
	
	$options['contactform'] = $options_contactform;
	
	$options['product_orderby'] =array(
					'date'  => esc_html__( 'زمان', 'ssel' ),
					'price' => esc_html__( 'قیمت', 'ssel' ),
					'rand'  => esc_html__( 'تصادفی', 'ssel' ),
					'sales' => esc_html__( 'فروش', 'ssel' ),
					'onsale' => esc_html__( 'حراج', 'ssel' ),
					'stock' => esc_html__( 'موجودی انبار', 'ssel' ),

				);	
			
			
	$options['list_col']= array(
 		'1'				=> esc_html__('1', 'ssel' ),
		'2'				=> esc_html__('2', 'ssel' ), 
		'3'				=> esc_html__('3', 'ssel' ), 
		'4'				=> esc_html__('4', 'ssel' ), 
		'5'				=> esc_html__('5', 'ssel' ), 
		'6'				=> esc_html__('6', 'ssel' ), 
 		'7'				=> esc_html__('7', 'ssel' ),
		'8'				=> esc_html__('8', 'ssel' ), 		
	);	
	$options['border_style']= array(
	
		'solid'			=>esc_html__('Solid','ssel'), 
		'dotted'		=> esc_html__('Dotted','ssel'), 
		'dashed'		=> esc_html__('Dashed','ssel'), 
		'double'		=> esc_html__('Double','ssel'), 
		'groove'		=> esc_html__('Groove','ssel'), 
		'ridge'			=> esc_html__('Ridge','ssel'), 
		'inset'			=> esc_html__('Inset','ssel'), 
		'outset'		=> esc_html__('Outset','ssel'), 
		'none'			=> esc_html__('None','ssel'), 
		'hidden'			=> esc_html__('hidden','ssel'), 
 		 
		 
		
		
 	);	

 	$options['alignment']= array(
 	""				=> 	__('Default','ssel'),
	"left"			=> __('Left','ssel'),
	"center"		=>  __('Center','ssel'),
 	"right"			=>  __('Right','ssel'),						
 	);
	
	$options['alignment_none']= array(
 	"left"			=> __('Left','ssel'),
	"center"		=>  __('Center','ssel'),
 	"right"			=>  __('Right','ssel'),						
 	);
 	$options['layout']= array(
		'list'				=>	esc_html__('Layout 1', 'ssel' ),
		'grid'				=>	esc_html__('Layout 2', 'ssel' ),
		'featured'				=>	esc_html__('Layout 3', 'ssel' ),
  		
	);
 
 	$options['size1']= array(
 		'rd-img-medium'				=>	esc_html__('Medium','ssel'), 
		'rd-img-large'				=>	esc_html__('Large','ssel'), 
		
	);
 
 
 	$options['size2']= array(
		'rd-img-small'				=>	esc_html__('Small','ssel'),
		'rd-img-medium'				=>	esc_html__('Medium','ssel'), 
		'rd-img-large'				=>	esc_html__('Large','ssel'), 
		
	);		
	
 
 	$options['height']= array(
		'rd-400px'				=>	esc_html__('400px', 'ssel' ),
		'rd-500px'				=>	esc_html__('500px', 'ssel' ),
		'rd-600px'				=>	esc_html__('600px', 'ssel' ),
		'rd-700px'				=>	esc_html__('700px', 'ssel' ),
		'rd-800px'				=>	esc_html__('800px', 'ssel' ),
		
	);
 
			
 
 	$options['height_content']= array(
		'rd-300px'				=>	esc_html__('300px', 'ssel' ),
		'rd-400px'				=>	esc_html__('400px', 'ssel' ),
		'rd-500px'				=>	esc_html__('500px', 'ssel' ),
		'rd-600px'				=>	esc_html__('600px', 'ssel' ),
		
	);	
 $options['orderby']= array(
		''							=>	esc_html__('Recent Posts','ssel'),
		'rand'						=>	esc_html__('Randam','ssel'),
		'rand-day'					=>	esc_html__('Randam - 1 day ago','ssel'),
		'rand-week'					=>	esc_html__('Randam - 1 week ago','ssel'),
		'rand-month'				=>	esc_html__('Randam - 1 month ago','ssel'),
		'rand-year'					=>	esc_html__('Randam - 1 year ago','ssel'),
		'most-comment'				=>	esc_html__('Most Comments ','ssel'),
		'most-comment-day'			=>	esc_html__('Most Comments 1 day ago','ssel'),
		'most-comment-week'			=>	esc_html__('Most Comments 1 week ago','ssel'),
		'most-comment-month'		=>	esc_html__('Most Comments 1 month ago','ssel'),
		'most-comment-year'			=>	esc_html__('Most Comments 1 year ago','ssel'),		
		'views'						=>	esc_html__('Most Views','ssel'),
		'views-day'					=>	esc_html__('Most Views - 1 day ago','ssel'),
		'views-week'				=>	esc_html__('Most Views - 1 week ago','ssel'),
		'views-month'				=>	esc_html__('Most Views - 1 month ago','ssel'),
		'views-year'				=>	esc_html__('Most Views - 1 year ago','ssel'), 
	); 
	
	

	$options['meta']= array(
		'comments'				=>	esc_html__('Comments','ssel'), 
  		'view'					=>	esc_html__('Views','ssel'),
 		'date'					=>	esc_html__('Date','ssel'), 
  		'author'				=>	esc_html__('Author','ssel'), 
		'review'				=>	esc_html__('Review Stars','ssel'),
		
	); 
	

	$options['meta_portfolio']= array(
			'comments'				=>	esc_html__('Comments','ssel'), 
   		'view'					=>	esc_html__('Views','ssel'),
 		'date'					=>	esc_html__('Date','ssel'), 
  		'author'				=>	esc_html__('Author','ssel'), 
 		
	); 	
	$options['ratio1']= array(
		'rd-ratio40f'				=>	esc_html__('5/2','ssel'),
		'rd-ratio60f'				=>	esc_html__('16/9','ssel')  
		
	);
	
	$options['ratio2']= array(
		'rd-ratio-auto'				=>	esc_html__('Auto','ssel'),
		'rd-ratio60'				=>	esc_html__('16/9','ssel'),
		'rd-ratio75'				=>	esc_html__('4/3','ssel')  
		
	);
	
 	
	
	$options['ratio3']= array(
		'rd-ratio60'				=>	esc_html__('16/9','ssel'),
		'rd-ratio75'				=>	esc_html__('4/3','ssel'), 
		'rd-ratio100'				=>	esc_html__('1/1','ssel') , 
		
		
	);

	$options['ratio4']= array(
 		'rd-ratio60'				=>	esc_html__('16/9','ssel'),
		'rd-ratio75'				=>	esc_html__('4/3','ssel'), 
		'rd-ratio100'				=>	esc_html__('1/1','ssel') ,
		'rd-ratio135'				=>	esc_html__('3/5','ssel') ,
 	);
	
	$options['ratio5']= array(
 		'rd-ratio40'				=>	esc_html__('5/2','ssel'),
 		'rd-ratio50'				=>	esc_html__('1/2','ssel'),
 		'rd-ratio60'				=>	esc_html__('16/9','ssel'),
		'rd-ratio75'				=>	esc_html__('4/3','ssel'), 
		'rd-ratio100'				=>	esc_html__('1/1','ssel') ,
		'rd-ratio135'				=>	esc_html__('3/5','ssel') ,
 	);
	$options['blog-ratio6']= array(
 		'rd-ratio-auto'				=>	esc_html__('Auto','ssel'),
 		'rd-ratio40'				=>	esc_html__('5/2','ssel'),
 		'rd-ratio50'				=>	esc_html__('1/2','ssel'),
 		'rd-ratio60'				=>	esc_html__('16/9','ssel'),
		'rd-ratio75'				=>	esc_html__('4/3','ssel'), 
		'rd-ratio100'				=>	esc_html__('1/1','ssel') ,
		'rd-ratio135'				=>	esc_html__('3/5','ssel') ,
 	);
	$options['ratio6']= array(
  		''				=>	esc_html__('Default','ssel'),
 		'rd-ratio-auto'				=>	esc_html__('Auto','ssel'),
 		'rd-ratio40'				=>	esc_html__('2/5','ssel'),
 		'rd-ratio50'				=>	esc_html__('1/2','ssel'),
 		'rd-ratio60'				=>	esc_html__('16/9','ssel'),
		'rd-ratio75'				=>	esc_html__('4/3','ssel'), 
		'rd-ratio100'				=>	esc_html__('1/1','ssel') ,
		'rd-ratio135'				=>	esc_html__('3/5','ssel') ,
 	);
			
	$options['product_ratio4']= array(
		'rd-ratio-auto'				=>	esc_html__('Auto','ssel'),
 		'rd-ratio60'				=>	esc_html__('16/9','ssel'),
		'rd-ratio75'				=>	esc_html__('4/3','ssel'), 
		'rd-ratio100'				=>	esc_html__('1/1','ssel') ,
		'rd-ratio135'				=>	esc_html__('3/5','ssel') ,
 	);
	
	$options['between']= array(
			"" =>esc_html__('Default','ssel'),
			"0px" => esc_html__('0px','ssel'),
			"2px" => esc_html__('2px','ssel'),
			"5px" => esc_html__('2px','ssel'),
			"10px" => esc_html__('2px','ssel'),
			"15px" => esc_html__('10px','ssel'),
			"20px" => esc_html__('20px','ssel'),
			"30px" => esc_html__('20px','ssel'),
			"40px" => esc_html__('40px','ssel'),
			"60px" => esc_html__('60px','ssel'),
	);
			
	
	$options['effect']= array(
		'slide'					=>	esc_html__('Slide','ssel'),
		'fade'					=>	esc_html__('Fade','ssel'), 
	); 
 	$options['background_thumb']= array(
		'none'					=>	esc_html__('None','ssel'),
		'light'					=>	esc_html__('Light','ssel'), 
		'dark'					=>	esc_html__('Dark','ssel'), 
	);
	
 	$options['style_featured']= array(
		''						=>	esc_html__('Default','ssel'),
		'gradient-dark'			=>	esc_html__('Gradient Dark','ssel'), 
		'dark-glass'			=>	esc_html__('Dark Glass','ssel'), 
		'colorful'				=>	esc_html__('Colorful','ssel'), 
		'details-dark-glass' 	=>	esc_html__('Dark Glass Details ','ssel'), 
		'details-colorful' 		=>	esc_html__('Colorful Details','ssel'), 
	);
 	$options['style_featured_2']= array(
		''						=>	esc_html__('Default','ssel'),
		'gradient-dark'			=>	esc_html__('Gradient Dark','ssel'), 
		'dark-glass'			=>	esc_html__('Dark Glass','ssel'), 
		'colorful'				=>	esc_html__('Colorful','ssel'),  
	);

 		
 	$options['style_boxid']= array(
		''					=>	esc_html__('None','ssel'),
		'light'					=>	esc_html__('Light','ssel'), 
		'light-gray'			=>	esc_html__('Light Gray','ssel'), 
		'light-glass'			=>	esc_html__('Light Glass','ssel'), 
 		'dark'					=>	esc_html__('Dark','ssel'), 
 		'dark-gray'				=>	esc_html__('Dark Gray','ssel'), 
 		'dark-glass'			=>	esc_html__('Dark Glass','ssel'), 
	);	
	$options['hover_image'] =  array( 
			""			=> __('Default','ssel'),
			"none"			=> __('None','ssel'),
 			"reduce-opacity"	=> __('Reduce Opacity','ssel'),
			"remove-opacity"	=> __('Remove Opacity','ssel'),
			"add-color"			=> __('Add Color','ssel'),
			"remove-color"		=> __('Remove Color','ssel'),
			"grow"				=> __('Grow','ssel'),
			"shrink"			=> __('Shrink','ssel'), 
			"rotate"			=> __('Rotate','ssel'),
 			"add-blur"			=> __('Add Blur','ssel'),
 			"remove-blur"		=> __('Remove Blur','ssel'),
			"add-brighten"		=> __('Add Brighten','ssel'),
			"remove-brighten"	=> __('Remove Brighten','ssel'),
			"add-darkness"		=> __('Add Darkness','ssel'),
			"remove-darkness"	=> __('Remove Darkness','ssel'),			
	);	
	$options['button'] = array(
 			'style-1'					=> esc_html__('Style 1','ssel'),  
  			'style-2'					=> esc_html__('Style 2:Top Border inset','ssel'),  
 			'style-3'					=> esc_html__('Style 3:Bottom Border inset','ssel'),  
 			'style-4'					=> esc_html__('Style 4:Left Border inset','ssel'),  
 			'style-5'					=> esc_html__('Style 5:Right Border inset','ssel'),  
 			'style-6'					=> esc_html__('Style 6:no background Border 1px','ssel'),   
 			'style-7'					=> esc_html__('Style 7:no background Border 2px','ssel'),   
 			'style-8'					=> esc_html__('Style 8:no background Border 3px','ssel'),   
  	); 	
		$options['font_weight'] =  array( 
					""				=> esc_html__('Default','ssel'),
					"300"			=> esc_html__('Light','ssel'),
					"normal"		=> esc_html__('Normal','ssel'),
					"500"			=> esc_html__('Medium','ssel'),
					"bold"			=> esc_html__('Bold','ssel'),
					"900"			=> esc_html__('Extra-Bold','ssel'),
 
 			);
	$options['arrow_style'] = array(
 
  			'style-1'					=> esc_html__('Style 1','ssel'),    
  			'style-2'					=> esc_html__('Style 2:no background Border 1px','ssel'),   
 			'style-3'					=> esc_html__('Style 3:no background Border 2px','ssel'),   
 			'style-4'					=> esc_html__('Style 4:no background Border 3px','ssel'),
  			'style-5'					=> esc_html__('Style 4:Full','ssel'),    
  			'style-6'					=> esc_html__('Style 2:Full - no background Border 1px','ssel'),   
 			'style-7'					=> esc_html__('Style 3:Full - no background Border 2px','ssel'),   
 			'style-8'					=> esc_html__('Style 4:Full - no background Border 3px','ssel'),
  			  	); 	
	
	$options['radius_position'] = array(
 			"round"							=>	esc_html__('All Round','ssel'),  
			"top"							=>	esc_html__('Top','ssel'),  
			"bottom"						=>	esc_html__('Bottom','ssel'),  
			"top-left-bottom-right"			=> is_rtl() ? esc_html__('Top Left & Bottom Right','ssel') :esc_html__('Top Right & Bottom Left','ssel'),
			"top-right-bottom-left"			=> is_rtl() ? esc_html__('Top Right & Bottom Left','ssel') :esc_html__('Top Left & Bottom Right','ssel'),
			
  	); 		
	
	$options['box_padding'] = array(
 			"" 				=>  esc_html__('Default','ssel'),
			"10px" 			=> "10px",
			"10px-15px" 	=> "10px - 15px",
			"10px-20px" 	=> "10px - 20px",
			"15px"		 	=> "15px",
			"15px-20px" 	=> "15px - 20px",
			"15px-30px" 	=> "15px - 30px",
 			"20px" 			=> "20px",
 			"20px-30px" 	=> "20px - 30px",
 			"20px-40px" 	=> "20px - 40px",
 			"30px" 	=> "30px",
 			"30px-40px" 	=> "30px - 40px",
			"40px" 	=> "40px",
 			
  	); 		
		
	
	$options['item_padding'] = array(
 			"" 				=>  esc_html__('Default','ssel'),
			"0px" 			=> "0px",
			"1px" 			=> "1px", 
			"10px-15px" 	=> "10px - 15px",
			"10px-20px" 	=> "10px - 20px",
			"15px"		 	=> "15px",
			"15px-20px" 	=> "15px - 20px",
			"15px-30px" 	=> "15px - 30px",
 			"20px" 			=> "20px",
 			"20px-30px" 	=> "20px - 30px",
 			"20px-40px" 	=> "20px - 40px",
 			"30px" 	=> "30px",
 			"30px-40px" 	=> "30px - 40px",
			"40px" 	=> "40px",
 			
  	); 		
				
	$options['shadow'] = array(
 			"" 				=>  esc_html__('Default','ssel'),
			
			"0px-0px" 			=> esc_html__('0px Blur - 0px Spread','ssel'),
			"3px-0px" 			=> esc_html__('3px Blur - 0px Spread','ssel'),
			"5px-0px" 			=> esc_html__('5px Blur - 0px Spread','ssel'),
 			"7px-0px" 			=> esc_html__('7px Blur - 0px Spread','ssel'),
			"10px-0px" 			=> esc_html__('10px Blur - 0px Spread','ssel'),
			"15px-0px" 			=> esc_html__('15px Blur - 0px Spread','ssel'),
			
			"0px-1px" 			=> esc_html__('0px Blur - 1px Spread','ssel'),
			"0px-2px" 			=> esc_html__('0px Blur - 2px Spread','ssel'),
			"0px-3px" 			=> esc_html__('0px Blur - 3px Spread','ssel'),
			"0px-5px" 			=> esc_html__('0px Blur - 5px Spread','ssel'),
			"0px-7px" 			=> esc_html__('0px Blur - 7px Spread','ssel'),
			"0px-10px" 			=> esc_html__('0px Blur - 10px Spread','ssel'),
			"0px-15px" 			=> esc_html__('0px Blur - 15px Spread','ssel'),
 
 			"3px-3px" 			=> esc_html__('3px Blur - 3px Spread','ssel'),
			"5px-5px" 			=> esc_html__('5px Blur - 5px Spread','ssel'),
			"7px-7px" 			=> esc_html__('7px Blur - 7px Spread','ssel'),
			"10px-10px"			=> esc_html__('10px Blur - 10px Spread','ssel'),
			"15px-15px"			=> esc_html__('15px Blur - 15px Spread','ssel'),
			
			
  	); 	
	
	$options['panel_shadow'] = array(
 			
			"0px-0px" 			=> esc_html__('0px Blur - 0px Spread','ssel'),
			"3px-0px" 			=> esc_html__('3px Blur - 0px Spread','ssel'),
			"5px-0px" 			=> esc_html__('5px Blur - 0px Spread','ssel'),
 			"7px-0px" 			=> esc_html__('7px Blur - 0px Spread','ssel'),
			"10px-0px" 			=> esc_html__('10px Blur - 0px Spread','ssel'),
			"15px-0px" 			=> esc_html__('15px Blur - 0px Spread','ssel'),
			
			"0px-1px" 			=> esc_html__('0px Blur - 1px Spread','ssel'),
			"0px-2px" 			=> esc_html__('0px Blur - 2px Spread','ssel'),
			"0px-3px" 			=> esc_html__('0px Blur - 3px Spread','ssel'),
			"0px-5px" 			=> esc_html__('0px Blur - 5px Spread','ssel'),
			"0px-7px" 			=> esc_html__('0px Blur - 7px Spread','ssel'),
			"0px-10px" 			=> esc_html__('0px Blur - 10px Spread','ssel'),
			"0px-15px" 			=> esc_html__('0px Blur - 15px Spread','ssel'),
 
 			"3px-3px" 			=> esc_html__('3px Blur - 3px Spread','ssel'),
			"5px-5px" 			=> esc_html__('5px Blur - 5px Spread','ssel'),
			"7px-7px" 			=> esc_html__('7px Blur - 7px Spread','ssel'),
			"10px-10px"			=> esc_html__('10px Blur - 10px Spread','ssel'),
			"15px-15px"			=> esc_html__('15px Blur - 15px Spread','ssel'),
			
			
  	); 	
		
	
	$options['radius'] = array(
	 
   			"" 				=> esc_html__('Default','ssel'),
   			"0px" 			=> esc_html__('0px','ssel'),
  			"3px" 			=> esc_html__('3px ','ssel'),
			"5px" 			=> esc_html__('5px','ssel'),
 			"7px" 			=> esc_html__('7px','ssel'),
			"10px" 			=> esc_html__('10px','ssel'),
			"15px" 			=> esc_html__('15px','ssel'),
			"1000px" 			=> esc_html__('Circular','ssel'),
 	); 	
	
	$options['panel_radius'] = array(
	 
    		"0px" 			=> esc_html__('0px','ssel'),
  			"3px" 			=> esc_html__('3px ','ssel'),
			"5px" 			=> esc_html__('5px','ssel'),
 			"7px" 			=> esc_html__('7px','ssel'),
			"10px" 			=> esc_html__('10px','ssel'),
			"15px" 			=> esc_html__('15px','ssel'),
			"1000px" 			=> esc_html__('Circular','ssel'),
 	); 		
		
	$options['radius_mini'] = array(
	 
   			"" 				=> esc_html__('Default','ssel'),
   			"0px" 			=> esc_html__('0px','ssel'),
  			"3px" 			=> esc_html__('3px ','ssel'),
			"5px" 			=> esc_html__('5px','ssel'),
 			"7px" 			=> esc_html__('7px','ssel'),
			"10px" 			=> esc_html__('10px','ssel'),
			"15px" 			=> esc_html__('15px','ssel'),
  	);
	
	$options['panel_radius_mini'] = array(
	 
    		"0px" 			=> esc_html__('0px','ssel'),
  			"3px" 			=> esc_html__('3px ','ssel'),
			"5px" 			=> esc_html__('5px','ssel'),
 			"7px" 			=> esc_html__('7px','ssel'),
			"10px" 			=> esc_html__('10px','ssel'),
			"15px" 			=> esc_html__('15px','ssel'),
  	);	 	
	
	$options['border'] = array(
   			"" 			=> esc_html__('Default','ssel'),
   			"0px" 			=> esc_html__('0px  All Round','ssel'),
  			"1px" 			=> esc_html__('1px All Round','ssel'),
			"2px" 			=> esc_html__('2px All Round','ssel'),
			"3px" 			=> esc_html__('3px All Round','ssel'),
			"5px" 			=> esc_html__('5px All Round','ssel'), 
			
  			"1px-top" 			=> esc_html__('1px Top','ssel'),
			"2px-top" 			=> esc_html__('2px Top','ssel'),
			"3px-top" 			=> esc_html__('3px Top','ssel'),
			"5px-top" 			=> esc_html__('5px Top','ssel'), 
			
  			"1px-left" 			=> esc_html__('1px Left','ssel'),
			"2px-left" 			=> esc_html__('2px Left','ssel'),
			"3px-left" 			=> esc_html__('3px Left','ssel'),
			"5px-left" 			=> esc_html__('5px Left','ssel'), 
					
  			"1px-bottom" 			=> esc_html__('1px Bottom','ssel'),
			"2px-bottom" 			=> esc_html__('2px Bottom','ssel'),
			"3px-bottom" 			=> esc_html__('3px Bottom','ssel'),
			"5px-bottom" 			=> esc_html__('5px Bottom','ssel'), 
					
  			"1px-top-bottom" 			=> esc_html__('1px Top Bottom','ssel'),
			"2px-top-bottom" 			=> esc_html__('2px Top Bottom','ssel'),
			"3px-top-bottom" 			=> esc_html__('3px Top Bottom','ssel'),
			"5px-top-bottom" 			=> esc_html__('5px Top  Bottom','ssel'), 
					
  	); 	
	
	
	$options['elementor_padding'] = array(
 			"0px" 			=> "0px",
			"1px" 			=> "1px", 
			"10px" 			=> "10px",
			"10px 15px" 	=> "10px - 15px",
			"10px 20px" 	=> "10px - 20px",
			"15px"		 	=> "15px",
			"15px 10px"		=> "15px - 10px",
			"15px 20px" 	=> "15px - 20px",
			"15px 30px" 	=> "15px - 30px",
 			"20px" 			=> "20px",
 			"20px 10px" 	=> "20px - 10px",
 			"20px 15px" 	=> "20px - 15px",
 			"20px 30px" 	=> "20px - 30px",
 			"20px 40px" 	=> "20px - 40px",
 			"30px" 	=> "30px",
 			"30px 10px" 	=> "30px - 10px",
 			"30px 15px" 	=> "30px - 15px",
 			"30px 20px" 	=> "30px - 20px",
 			"30px 40px" 	=> "30px - 40px",
			"40px" 	=> "40px",
			"40px 20px" 	=> "40px - 20px",
 			"50px" 	=> "50px",
 			"50px 25px" 	=> "50px - 25px",
 			
  	); 	
	$options['elementor_padding2'] = array(
 			"1px" 			=> "1px", 
			"10px" 			=> "10px",
			"10px 15px" 	=> "10px - 15px",
			"10px 20px" 	=> "10px - 20px",
			"15px"		 	=> "15px",
			"15px 10px"		=> "15px - 10px",
			"15px 20px" 	=> "15px - 20px",
			"15px 30px" 	=> "15px - 30px",
 			"20px" 			=> "20px",
 			"20px 10px" 	=> "20px - 10px",
 			"20px 15px" 	=> "20px - 15px",
 			"20px 30px" 	=> "20px - 30px",
 			"20px 40px" 	=> "20px - 40px",
 			"30px" 	=> "30px",
 			"30px 10px" 	=> "30px - 10px",
 			"30px 15px" 	=> "30px - 15px",
 			"30px 20px" 	=> "30px - 20px",
 			"30px 40px" 	=> "30px - 40px",
			"40px" 	=> "40px",
			"40px 20px" 	=> "40px - 20px",
 			"50px" 	=> "50px",
 			"50px 25px" 	=> "50px - 25px",
 			
  	); 	
	
$options['panel_border'] = array(
    			"0px" 			=> esc_html__('0px  All Round','ssel'),
  			"1px" 			=> esc_html__('1px All Round','ssel'),
			"2px" 			=> esc_html__('2px All Round','ssel'),
			"3px" 			=> esc_html__('3px All Round','ssel'),
			"5px" 			=> esc_html__('5px All Round','ssel'), 
			
  			"1px-top" 			=> esc_html__('1px Top','ssel'),
			"2px-top" 			=> esc_html__('2px Top','ssel'),
			"3px-top" 			=> esc_html__('3px Top','ssel'),
			"5px-top" 			=> esc_html__('5px Top','ssel'), 
			
  			"1px-left" 			=> esc_html__('1px Left','ssel'),
			"2px-left" 			=> esc_html__('2px Left','ssel'),
			"3px-left" 			=> esc_html__('3px Left','ssel'),
			"5px-left" 			=> esc_html__('5px Left','ssel'), 
					
  			"1px-bottom" 			=> esc_html__('1px Bottom','ssel'),
			"2px-bottom" 			=> esc_html__('2px Bottom','ssel'),
			"3px-bottom" 			=> esc_html__('3px Bottom','ssel'),
			"5px-bottom" 			=> esc_html__('5px Bottom','ssel'), 
					
  			"1px-top-bottom" 			=> esc_html__('1px Top Bottom','ssel'),
			"2px-top-bottom" 			=> esc_html__('2px Top Bottom','ssel'),
			"3px-top-bottom" 			=> esc_html__('3px Top Bottom','ssel'),
			"5px-top-bottom" 			=> esc_html__('5px Top  Bottom','ssel'), 
					
  	); 		
	
	$options['user_social'] = array(
	 
   			"facebook" 				=> esc_html__('Facebook','ssel'),
   			"twitter" 			=> esc_html__('Twitter','ssel'),
  			"googleplus" 			=> esc_html__('Google Plus','ssel'),
			"linkedin" 			=> esc_html__('Linkedin','ssel'),
 			"flickr" 			=> esc_html__('Flickr','ssel'),
 			"skype" 			=> esc_html__('Skype','ssel'),
			 
			"tumblr" 			=> esc_html__('Tumblr','ssel'),
			"vimeo" 			=> esc_html__('Vimeo','ssel'),
			"youtube" 			=> esc_html__('Youtube','ssel'),
			
  			"instagram" 			=> esc_html__('Instagram','ssel'),
			"telegram" 			=> esc_html__('Telegram','ssel'),
 			"pinterest" 			=> esc_html__('Pinterest','ssel'), 
	); 	
	
	
 	$options['caption_effect'] = array( 
	'' 						=> __('Default','ssel'), 
	'imghvr-fade' 						=> __('Fade','ssel'), 
 	'imghvr-slide-up'					=> __('Slide Up','ssel'), 
	'imghvr-slide-down'					=> __('Slide Down','ssel'), 
	'imghvr-slide-left'					=> __('Slide Left','ssel'), 
	'imghvr-slide-right'					=> __('Slide Right','ssel'), 
	'imghvr-flip-vert'					=> __('Flip Vert','ssel'),  	
 	'imghvr-flip-horiz'					=> __('Flip Horiz','ssel'),  	
	'imghvr-flip-diag-1'				=> __('Flip Diag 1','ssel'),  	
	'imghvr-flip-diag-2'				=> __('Flip Diag 2','ssel'),  	 	 
	'imghvr-zoom-in'					=> __('Zoom in','ssel'), 
	'imghvr-zoom-out'					=> __('Zoom out','ssel'),  
 	'imghvr-layla'						=> __('Layla','ssel'), 
	'imghvr-oscar'						=> __('Oscar','ssel'), 
	'imghvr-bubba'						=> __('Bubba','ssel'), 
	'imghvr-chico'						=> __('Chico','ssel'), 
	'imghvr-goliath'					=> __('Goliath','ssel'), 
	'imghvr-selena'						=> __('Selena','ssel'), 
	'imghvr-ming'						=> __('Ming','ssel'), 
	 
    	);
 
	
		
	return $options[$value];
}	
 }
 if( ! function_exists( 'ssel_multi_array_options' ) ) {

function ssel_multi_array_options($value) {


	$options['margin_horizontal'] = array( 
			array( 
				"name"			=> esc_html__('Top','ssel'),			
  				"id"			=> "top",
				"type"			=> "number",
 			), 
			array( 
				"name"			=> esc_html__('Bottom','ssel'),
    				"id"			=> "bottom",
 				"type"			=> "number",
 			), 
			array( 
 				"name"			=> 	esc_html__('Unit','ssel'),
 				"id"			=> "unit",
  				"type"			=> "select",
				"options"		=>  ssel_array_options('unit'),
 			),
  	);
	
	 		
	
	$options['margin'] = array( 
			array( 
				"name"			=> esc_html__('Top','ssel'),			
  				"id"			=> "top",
				"type"			=> "number",
 			),
			array( 
				"name"			=> esc_html__('Right','ssel'),
 				"id"			=> "right",
 				"type"			=> "number",
 			),	
			array( 
				"name"			=> esc_html__('Bottom','ssel'),
    				"id"			=> "bottom",
 				"type"			=> "number",
 			),
			array( 
				"name"			=>  esc_html__('Left','ssel'),
  				"id"			=> "left",
 				"type"			=> "number",
 			),	
			array( 
 				"name"			=> 	esc_html__('Unit','ssel'),
 				"id"			=> "unit",
  				"type"			=> "select",
				"options"		=>  ssel_array_options('unit'),
 			),
  	);
	
	 
 	$options['border'] = array( 
			array( 
				"name"			=> esc_html__('Size','ssel'),			
  				"id"			=> "size",
				"type"			=> "select",
				"options"		=>  ssel_array_options('border'),
  			),
 			 			
			array( 
   				"id"			=> "color",
 				"type"			=> "color_rgba",
 			),	
			 					
	); 
	
	
	 
 	$options['panel_border'] = array( 
			array( 
				"name"			=> esc_html__('Size','ssel'),			
  				"id"			=> "size",
				"type"			=> "select",
				"options"		=>  ssel_array_options('panel_border'),
  			),
 			 			
			array( 
   				"id"			=> "color",
 				"type"			=> "color_rgba",
 			),	
			 					
	); 	
	 
	$options['border_mini'] = array( 
			array( 
   				"id"			=> "size",
				"type"			=> "select",
				"options"		=> array(
						"" 			=> esc_html__('Defult','ssel'),
						"0px" 			=> esc_html__('0px','ssel'),
						"1px" 			=> esc_html__('1px','ssel'),
						"2px" 			=> esc_html__('2px','ssel'),
						"3px" 			=> esc_html__('3px','ssel'),
						"4px" 			=> esc_html__('4px','ssel'),
						"5px" 			=> esc_html__('5px','ssel'), 
  				),
			),					
			array( 
   				"id"			=> "color",
 				"type"			=> "color_rgba",
 			 
			 					
 		), 	
	); 
	
$options['border_between'] = array( 
			array( 
   				"id"			=> "size",
				"type"			=> "select",
				"options"		=> array(	
						"" 						=> esc_html__('Default','ssel'),
						"0px" 					=> esc_html__('0px','ssel'),
						"1px-bottom" 			=> esc_html__('1px','ssel'),
						"2px-bottom" 			=> esc_html__('2px','ssel'),
						"3px-bottom" 			=> esc_html__('3px','ssel'),
						"3px-bottom" 			=> esc_html__('3px','ssel'),
						"5px-bottom" 			=> esc_html__('5px','ssel'), 
  				),
			),					
			array( 
   				"id"			=> "color",
 				"type"			=> "color_rgba",
 			 
			 					
 		), 	
	); 		 		
		
		$options['border_2'] = array( 
			array( 
				"name"			=> esc_html__('Size','ssel'),			
  				"id"			=> "size",
				"type"			=> "number",
				"placeholder"	=> esc_html__('Pexel','ssel'),	
 			),
			array( 
   				"id"			=> "position",
				"type"			=> "select",
				"options"		=> array(
 					"round"			=>	esc_html__('All Round','ssel'),  
					"top"			=>	esc_html__('Top','ssel'),  
					"right"			=>	esc_html__('Right','ssel'),  
					"bottom"		=>	esc_html__('Bottom','ssel'),  
					"left"			=>	esc_html__('Left','ssel'),  
   					"top-bottom"	=>	esc_html__('Top And Bottom','ssel'), 
 				),),
 		 
 			array( 
  				"id"			=> "style",
  				"type"			=> "select",
				"options"		=>  ssel_array_options('border_style'),
 			),					
			array( 
   				"id"			=> "color",
 				"type"			=> "color_rgba",
 			 
			 					
 		), 	
	); 	 
	$options['border_3'] = array( 
			array( 
				"name"			=> esc_html__('Size','ssel'),			
  				"id"			=> "size",
				"type"			=> "number",
				"placeholder"	=> esc_html__('Pexel','ssel'),	
 			),
			array( 
   				"id"			=> "position",
				"type"			=> "select",
				"options"		=> array(
 					"round"			=>	esc_html__('All Round','ssel'),  
					"top"			=>	esc_html__('Top','ssel'),  
					"right"			=>	esc_html__('Right','ssel'),  
					"middle"		=>	esc_html__('Middle','ssel'),  
 					"bottom"		=>	esc_html__('Bottom','ssel'),  
					"left"			=>	esc_html__('Left','ssel'),  
   					"top-bottom"	=>	esc_html__('Top And Bottom','ssel'), 
 				),
			),
 		 
 			array( 
  				"id"			=> "style",
  				"type"			=> "select",
				"options"		=>  ssel_array_options('border_style'),
 			),					
			array( 
   				"id"			=> "color",
 				"type"			=> "color_rgba",
 			 
			 					
 		), 	

	); 	
	 
			
	
	$options['shadow'] = array( 
 
			array( 
 				"name"			=> 	esc_html__('Size','ssel'),
 				"id"			=> "size",
  				"type"			=> "select",
				"options"		=>  ssel_array_options('shadow'),
 			),	
			array( 
   				"id"			=> "color",
 				"type"			=> "color_rgba",
 			),				
		 
			);
 
	$options['panel_shadow'] = array( 
 
			array( 
 				"name"			=> 	esc_html__('Size','ssel'),
 				"id"			=> "size",
  				"type"			=> "select",
				"options"		=>  ssel_array_options('shadow'),
 			),	
			array( 
   				"id"			=> "color",
 				"type"			=> "color_rgba",
 			),				
		 
			);
  
 
 
 
 
	$options['border_2'] = array( 
			array( 
				"name"			=> esc_html__('Size','ssel'),			
  				"id"			=> "size",
				"type"			=> "number",
				"placeholder"	=> esc_html__('Pexel','ssel'),	
 			), 
			array( 
  				"id"			=> "radius_position",
  				"type"			=> "select",
				"options"		=>  ssel_array_options('radius_position'),
 			),	
  	
 		); 	
		 
		$options['radius_mini'] = array( 
			array( 
				"name"			=> esc_html__('Size','ssel'),			
  				"id"			=> "size",
				"type"			=> "number",
				"placeholder"	=> esc_html__('Pexel','ssel'),	
 			), 
			array( 
  				"id"			=> "radius_position",
  				"type"			=> "select",
				"options"		=>  ssel_array_options('radius_position'),
 			),	
  	
 		); 
  
		$options['meta'] = array( 
	 
			array( 
				"name"			=> esc_html__('Author','ssel'),
 				"id"			=> "meta_author",
 				"type"			=> "checkbox",
 			),	
			array( 
				"name"			=> esc_html__('Category','ssel'),
				"id"			=> "meta_category",
 				"type"			=> "checkbox",
 			), 
			array( 
				"name"			=> esc_html__('Date','ssel'),
				"id"			=> "meta_date",
 				"type"			=> "checkbox",
 			), 
			
 			array( 
				"name"			=> esc_html__('View','ssel'),
				"id"			=> "meta_view",
 				"type"			=> "checkbox",
 			),			
			array( 
				"name"			=>  esc_html__('Comments','ssel'),
  				"id"			=> "meta_comments",
 				"type"			=> "checkbox",
 			),	
			
			
			 
 		); 
		$options['meta_portfolio'] = array( 
	 
			array( 
				"name"			=> esc_html__('Author','ssel'),
 				"id"			=> "meta_author",
 				"type"			=> "checkbox",
 			),	
			array( 
				"name"			=> esc_html__('Category','ssel'),
				"id"			=> "meta_category",
 				"type"			=> "checkbox",
 			), 
			array( 
				"name"			=> esc_html__('Date','ssel'),
				"id"			=> "meta_date",
 				"type"			=> "checkbox",
 			), 
 			array( 
				"name"			=> esc_html__('View','ssel'),
				"id"			=> "meta_view",
 				"type"			=> "checkbox",
 			),			
		  
			 
 		); 	
 
		$options['typo'] = array( 
	 
			array( 
				"name"			=> esc_html__('Font Size','ssel'),
 				"id"			=> "font_size",
 				"type"			=> "number",
 			),	
			array( 
				"name"			=> esc_html__('Font Weight','ssel'),
				"id"			=> "font_weight",
 				"type"			=> "select",
				"options"		=>  array( 
					""				=> esc_html__('Default','ssel'),
					"300"			=> esc_html__('Light','ssel'),
					"normal"		=> esc_html__('Normal','ssel'),
					"500"			=> esc_html__('Medium','ssel'),
					"bold"			=> esc_html__('Bold','ssel'),
					"900"			=> esc_html__('Extra-Bold','ssel'),
					) ,
 			), 
 			array( 
				"name"			=> esc_html__('Text Transform','ssel'),
				"id"			=> "text_transform",
 				"type"			=> "select",
				"options"		=>  array( 
						""					=> __('Default','ssel'),
 						"none"			=> 	__('None','ssel'),
 						"uppercase"			=> 	__('Uppercase','ssel'),
 						"lowercase"			=> __('Lowercase','ssel'),
  						"capitalize"			=> __('Capitalize','ssel'),
				) ,
				) ,
		);	
		
	$options['panel_typo'] = array( 
	 
			array( 
				"name"			=> esc_html__('Font Size','ssel'),
 				"id"			=> "font_size",
 				"type"			=> "number",
 			),	
			array( 
				"name"			=> esc_html__('Font Weight','ssel'),
				"id"			=> "font_weight",
 				"type"			=> "select",
				"options"		=>  array( 
 					"300"			=> esc_html__('Light','ssel'),
					"normal"		=> esc_html__('Normal','ssel'),
					"500"			=> esc_html__('Medium','ssel'),
					"bold"			=> esc_html__('Bold','ssel'),
					"900"			=> esc_html__('Extra-Bold','ssel'),
					) ,
 			), 
 			array( 
				"name"			=> esc_html__('Text Transform','ssel'),
				"id"			=> "text_transform",
 				"type"			=> "select",
				"options"		=>  array( 
  						"none"			=> 	__('None','ssel'),
 						"uppercase"			=> 	__('Uppercase','ssel'),
 						"lowercase"			=> __('Lowercase','ssel'),
  						"capitalize"			=> __('Capitalize','ssel'),
				) ,
				) ,
		);			
		
	$options['typo_line'] = array( 
	 
			array( 
				"name"			=> esc_html__('Font Size','ssel'),
 				"id"			=> "font_size",
 				"type"			=> "number",
 			),
			
			array( 
				"name"			=> esc_html__('Line Height','ssel'),
 				"id"			=> "line_height",
 				"type"			=> "select",
				"options"		=>  array( 
 						"1em"		=> "1em",
						"1.05em"	=> "1.05em",
						"1.1em"		=> "1.1em",
						"1.15em"	=> "1.15em",
						"1.2em" 	=> "1.2em",
						"1.2em" 	=> "1.25em",
						"1.3em" 	=> "1.3em",
						"1.35em"	=> "1.35em",
						"1.4em" 	=> "1.4em",
						"1.45em"	=> "1.45em",
						"1.5em" 	=> "1.5em",
 						"1.6em" 	=> "1.6em",
 						"1.7em" 	=> "1.7em",
 						"1.8em" 	=> "1.8em",
 						"1.9em" 	=> "1.9em",
 						"2em" 		=> "2em",
						"2.1em" 		=> "2.1em",
						"2.2em" 		=> "2.2em",
						"2.3em" 		=> "2.3em",
						"2.4em" 		=> "2.4em",
						"2.5em" 		=> "2.5em",
   			),	
			 
 			 
				) ,
		);				
			 
		$options['typo_style'] = array( 
	 
			array( 
				"name"			=> esc_html__('Font Size','ssel'),
 				"id"			=> "font_size",
 				"type"			=> "number",
 			),	
			array( 
				"name"			=> esc_html__('Font Weight','ssel'),
				"id"			=> "font_weight",
 				"type"			=> "select",
				"options"		=>  array( 
					""				=> esc_html__('Default','ssel'),
					"300"			=> esc_html__('Light','ssel'),
					"normal"		=> esc_html__('Normal','ssel'),
					"500"			=> esc_html__('Medium','ssel'),
					"bold"			=> esc_html__('Bold','ssel'),
					"900"			=> esc_html__('Extra-Bold','ssel'),
					) ,
 			), 
 			array( 
				"name"			=> esc_html__('Text Transform','ssel'),
				"id"			=> "text_transform",
 				"type"			=> "select",
				"options"		=>  array( 
						""					=> __('Default','ssel'),
 						"none"			=> 	__('none','ssel'),
 						"uppercase"			=> 	__('Uppercase','ssel'),
 						"lowercase"			=> __('Lowercase','ssel'),
  						"capitalize"			=> __('Capitalize','ssel'),
				),
			) ,
			array( 
					"name"			=> esc_html__('Font Style','ssel'),
					"id"			=> "font_style",
					"type"			=> "select",
					"options"		=>  array( 
						''				=>esc_html__('Default','ssel'), 
						'normal'		=> esc_html__('Normal','ssel'), 
						'italic'		=> esc_html__('Italic','ssel'), 
						'oblique'		=> esc_html__('Oblique','ssel'), 
					) ,	
				) ,					
				
			 
 		);			
			 		 
			 
		$options['typo_mini'] = array( 
	 
			 
			array( 
				"name"			=> esc_html__('Font Weight','ssel'),
				"id"			=> "font_weight",
 				"type"			=> "select",
				"options"		=>  array( 
					""				=> esc_html__('Default','ssel'),
					"300"			=> esc_html__('Light','ssel'),
					"normal"		=> esc_html__('Normal','ssel'),
					"bold"			=> esc_html__('Bold','ssel'),
					"900"			=> esc_html__('Extra-Bold','ssel'),
					) ,
 			), 
 			array( 
				"name"			=> esc_html__('Text Transform','ssel'),
				"id"			=> "text_transform",
 				"type"			=> "select",
				"options"		=>  array( 
						""					=> __('None','ssel'),
 						"uppercase"			=> 	__('Uppercase','ssel'),
 						"lowercase"			=> __('Lowercase','ssel'),
  						"capitalize"			=> __('Capitalize','ssel'),
				) ,
				) ,
		);	


	$options['panel_typo_mini'] = array( 
	 
			 
			array( 
				"name"			=> esc_html__('Font Weight','ssel'),
				"id"			=> "font_weight",
 				"type"			=> "select",
				"options"		=>  array( 
 					"300"			=> esc_html__('Light','ssel'),
					"normal"		=> esc_html__('Normal','ssel'),
					"bold"			=> esc_html__('Bold','ssel'),
					"900"			=> esc_html__('Extra-Bold','ssel'),
					) ,
 			), 
 			array( 
				"name"			=> esc_html__('Text Transform','ssel'),
				"id"			=> "text_transform",
 				"type"			=> "select",
				"options"		=>  array( 
						""					=> __('None','ssel'),
 						"uppercase"			=> 	__('Uppercase','ssel'),
 						"lowercase"			=> __('Lowercase','ssel'),
  						"capitalize"			=> __('Capitalize','ssel'),
				) ,
				) ,
		);	

	
return $options[$value];
}
 }
?>