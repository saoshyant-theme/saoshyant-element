<?php 
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
																		
																		Related Blog
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$orig_post = $post;
global $post,$smof_data,$categories;
$tags = wp_get_post_tags($post->ID);
$count=0;
$ssel_related_row = ssel_option('related_row');
$ssel_related_query =  ssel_option('related_query');
$related_ratio = ssel_option('related_ratio')  ;
 $box_layout=ssel_option('blog_box_layout' );
$between=ssel_option('blog_between' );

 	$related_between=ssel_option('related_between');
 
$col = ssel_option('width');
 
 $full_width = ssel_option('full_width');
 if(!empty($full_width)){
 	if( $col == '1600px' || $col == '1920px' || $col == '100%' ){
		$layout = 'grid_6' ; 
	
	}elseif( $col == '1300px' || $col == '1400px' || $col == '1500px' ){
		$layout = 'grid_5' ; 
		
	}elseif( $col == '1200px' || $col == '1100px' || $col == '1100px' ){
		$layout = 'grid_4' ; 
		
	} else{
		$layout = 'grid_3' ;
	}
}else{
	$layout = ssel_option('related_layout');
  
}
 
if($layout == 'grid_6'){
	$max_col= 6;
}elseif($layout == 'grid_5'){
	$max_col= 5;
}elseif($layout == 'grid_4'){
	$max_col= 4;
}else {
	$max_col= 3;
}

$ssel_related_number = $max_col * $ssel_related_row;
 
$args_category = array(
			'category__in' => wp_get_post_categories($post->ID),
			'post__not_in' => array($post->ID),
			'posts_per_page'=> 	$ssel_related_number,
			'ignore_sticky_posts'=>1,
			'orderby'=>'rand',
			'post_type'=>'post'

);
$related_category = new wp_query( $args_category );


$posttags = get_the_tags();
$test = '';
$sep = '';
if ($posttags) {
    foreach($posttags as $tag) {
        $test .= $sep . $tag->name; 
        $sep = ",";
    }
}

$args_tags = array(
	'tag' => $test,
	'post_type'=>'post',
 	'post__not_in' => array($post->ID),
	'posts_per_page'=>	$ssel_related_number, 
	'ignore_sticky_posts'=>1,
);

$related_tags = new wp_query( $args_tags );


if($ssel_related_query =='category' && $related_category->have_posts()){
$args = $args_category;
  				
} elseif($ssel_related_query =='tag' && $related_tags->have_posts()){
 
$args = $args_tags;
			
} elseif($ssel_related_query =='random'){
	
    $args = array(
      'posts_per_page'=> $ssel_related_number,
	  'ignore_sticky_posts'=>1,
		'post_type'=>'post',

     );	 
	 
} else {
	
    $args = array( 
		'posts_per_page'=> $ssel_related_number,
		'orderby'=>'rand',
		'post_type'=>'post',
		'ignore_sticky_posts'=>1,
	);
}
       
		

$related['key'] = 'related';
$related['option'] = array(
	'qurey'=>  $args,
	'title'=>  ssel_option('related_title'),
 	'post_title'=> 1,
 	 
 				
	'between'=>$related_between,
	'layout'=> 'grid',
	'grid_layout'=> $layout,
	'padding'=> array(
		'left'=>'20',
		'top'=>'20',
		'right'=>'20',
		'bottom'=>'20'
	),
 	'ratio'=>  ssel_option('related_ratio' ),
 	'layout'=>  'grid',
 	'image_size'=>  ssel_option('related_image_size' ),
 	'excerpt'=>  ssel_option('related_excerpt' ),
 
	'alignment'=> ssel_option('blog_alignment'),
  	'meta_layout'=> ssel_option('blog_meta_layout'),
  	'box_layout'=> ssel_option('blog_box_layout'),
  	'image_effect'=> ssel_option('image_effect'),
 	'caption_effect'=> ssel_option('caption_effect'),
	
 
 );
 	?>
    		 
			<aside class="rd-element-item  sao-element-item sao_element_related  sao-element-related sao-auto-width">       
            <?php echo ssel_blog_config($related, true);?>
         	</aside>
    <?php
  
 	$post = $orig_post;
	wp_reset_postdata();
?>