<?php 
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
																		
																		Single
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_single' ) ) {


 function ssel_single() {
 	global $post, $smof_data;
	if ( (  is_page() || is_single())) {
	$meta = get_post_meta( $post->ID );
	}
	$ssel_single_template = isset( $meta['single_template'][0] ) ?  $meta['single_template'][0]  : 'default';
	$ssel_single_admin = isset( $smof_data['single_template'] ) ?  $smof_data['single_template']  : '3';
 
  	if( $ssel_single_template == 'default' || empty($ssel_single_template)  ) {
 		$ssel_single = $ssel_single_admin; 

	} else{
		$ssel_single = $ssel_single_template;
 	}
	return $ssel_single;
	
}
  }
 
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
																		
																		Single Body Classses
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_single_body_classes' ) ) {


add_filter('body_class', 'ssel_single_body_classes');
function ssel_single_body_classes($classes) {
 	global $post, $smof_data;
	if ( (  is_page() || is_single())) {
	$meta = get_post_meta( $post->ID );
	}
	$ssel_single_template = isset( $meta['single_template'][0] ) ?  $meta['single_template'][0]  : 'default';
	$ssel_single_admin = isset( $smof_data['single_template'] ) ?  $smof_data['single_template']  : ssel_option_default('single_template');
	
  	if( $ssel_single_template == 'default' || empty($ssel_single_template)  ) {
 		$ssel_single = $ssel_single_admin; 

	} else{
		$ssel_single = $ssel_single_template;
 	}
 	
		 
	
	$classes[] = 'body-single-template-'.$ssel_single;
 		
	$body_layout = ssel_option('body_layout') ; 
 		if($body_layout == 'enable'){
			$classes[] ='rd-body-boxed'	;
		}else{
			$classes[] ='rd-body-none'	;
		}		
		
		$logo_position = ssel_logo_position() ; 
		$searchform = ssel_option('searchform');   
		$social_net = ssel_option('social_net');   
		$loginform = ssel_option('loginform'); 
 		$cart = ssel_option('cart','header');  
		$wish = ssel_option('wish','header');  
 		$contact_us = ssel_option('contact_us'); 
 		$call = ssel_option('call'); 		
		  $classes[] = 'body-logo-align-'.ssel_option('logo_align');
        $classes[] = 'body-logo-position-'.$logo_position;
        $classes[] = 'body-search-position-'.$searchform;
        $classes[] = 'body-social-position-'.$social_net;
        $classes[] = 'body-cart-position-'.$cart;
        $classes[] = 'body-contact-position-'.$contact_us;
        $classes[] = 'body-call-position-'.$call;
        $classes[] = 'body-wish-position-'.$wish;
        $classes[] = 'body-loginform-position-'.$loginform;
        $classes[] = ' woocommerce ';
        $classes[] = ' rd-body ';
         return $classes;
 
}  
 }
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
																		
																		Single Tags
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_tags' ) ) {

function ssel_tags() {
	if(has_tag()) {
	?>
 	<ul class="rd-tags">
		<li><?php the_tags('',''); ?></li>
	</ul>
	<?php 
	}
} 
 }
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
																		
																	Get Youtube id
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_get_youtube_id' ) ) {

 function ssel_get_youtube_id($url) 
{
    $pattern = '#^(?:https?://)?';    
    $pattern .= '(?:www\.)?';        
    $pattern .= '(?:';                
    $pattern .=   'youtu\.be/';      
    $pattern .=   '|youtube\.com';    
    $pattern .=   '(?:';              
    $pattern .=     '/embed/';       
    $pattern .=     '|/v/';            
    $pattern .=     '|/watch\?v=';    
    $pattern .=     '|/watch\?.+&v='; 
    $pattern .=   ')';                
    $pattern .= ')';                 
    $pattern .= '([\w-]{11})';        
    $pattern .= '(?:.+)?$#x';      
    preg_match($pattern, $url, $matches);
    return (isset($matches[1])) ? $matches[1] : false;
}
 }
 if( ! function_exists( 'ssel_get_aparat_id' ) ) {

 function ssel_get_aparat_id($url) 
{
    $pattern = '#^(?:https?://)?';    # Optional URL scheme. Either http or https.
    $pattern .= '(?:www\.)?';         #  Optional www subdomain.
    $pattern .= '(?:';                #  Group host alternatives:
    $pattern .=   'aparat\.be/';       #    Either youtu.be,
    $pattern .=   '|aparat\.com';    #    or youtube.com
    $pattern .=   '(?:';              #    Group path alternatives:
    $pattern .=     '/embed/';        #      Either /embed/,
    $pattern .=     '|/v/';           #      or /v/,
 
    $pattern .=   ')';                #    End path alternatives.
    $pattern .= ')';                  #  End host alternatives.
    $pattern .= '([\w-]{5})';        # 11 characters (Length of Youtube video ids).
    $pattern .= '(?:.+)?$#x';         # Optional other ending URL parameters.
    preg_match($pattern, $url, $matches);
    return (isset($matches[1])) ? $matches[1] : false;
}
 }
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
																		
																	Video
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_video' ) ) {

function ssel_video(){
	global $post ;
	$ssel_metas = get_post_meta( $post->ID );
	$video_type = !empty( $ssel_metas[ 'video_type'][0] ) ? $ssel_metas[ 'video_type'][0] : '';
	$video_url = !empty( $ssel_metas[ 'video_url'][0] ) ? $ssel_metas[ 'video_url'][0] : '';
   if( $video_type == 'aparat' && !empty($video_url)){
  	 	$id = ssel_get_aparat_id($video_url);
 		$video_src= 'https://www.aparat.com/video/video/embed/videohash/'.$id.'/vt/frame';
	} 
 	elseif($video_type == 'youtube' && !empty($video_url)){	
			$id = ssel_get_youtube_id($video_url);

		$video_src= 'https://www.youtube.com/embed/'.$id.'?rel=0';
		
	} elseif(!empty($video_url)) {
		$video_src= $video_url;
		
	} else {
		$video_src= '';
		
	}
	?>
	<div class="rd-post-video">
 		 
		<?php if( $video_type == 'aparat'){ ?>
			<div class="rd-video-warp rd-apart">
				<iframe src="<?php echo esc_url($video_src);?>" allowFullScreen="true" webkitallowfullscreen="true" mozallowfullscreen="true"></iframe>>
			</div>
		<?php }elseif( $video_type == 'youtube'){ ?>
			<div class="rd-video-warp rd-yt">
				<iframe width="600" height="400" src="<?php echo esc_url($video_src);?>"  frameborder="0" allowfullscreen></iframe>
			</div>
		<?php } else {?>
			<div class="rd-video-warp rd-mp4">
				<video width="640" height="360" id="rd-video" controls>
					<source src="<?php echo esc_url($video_src);?>" type="video/mp4" title="mp4"> 
				</video>
			</div>
		<?php } ?>
	</div>
    
	<?php
}
 }
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
																		
																	Author Box
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_author_box' ) ) {
function ssel_author_box() { 
 	$class_box_layout_single = ssel_box_layout_single('blog',true);
 	$box_layout_single = ssel_box_layout_single('blog');
 	if($box_layout_single =='none'){

 	?>
		<div class="rd-single-line rd-color-border rd-line"></div>
      
     <?php }?> 
 
 		<aside class="rd-element-item rd-element-author ">
 		<div class="rd-post-list-boxid <?php echo esc_attr($class_box_layout_single);?>">
 		<div class="rd-author-box">
        
			<div class="rd-author-thumb"><?php echo get_avatar( get_the_author_meta( 'user_email' ), '80' ); ?></div>
			
            <div class="rd-details   ">
				<h4 class="rd-author-name  "><?php the_author_posts_link(); ?></h4>
 				<?php if(get_the_author_meta( 'description' )){?>
                 	<p class="rd-author-description  ">
						<?php the_author_meta( 'description' ); ?>
					</p>
                    <?php }?>
 				<ul class="rd-social-style-1  rd-social-icons" >
                    <?php if ( get_the_author_meta( 'facebook' ) ) { ?>
                        <li><a class="rd-social-facebook fa-facebook fa" href="<?php the_author_meta( 'facebook' ); ?>"></a></li>
                    <?php }  ?>
            
                    <?php if ( get_the_author_meta( 'twitter' ) ) { ?>
                        <li><a class="rd-social-twitter fa-twitter fa" href="<?php the_author_meta( 'twitter' ); ?>"></a></li>
                    <?php }  ?>
                    
                    <?php if ( get_the_author_meta( 'googleplus' ) ) { ?>
                        <li><a  class="rd-social-googleplus fa-google-plus fa"  href="<?php the_author_meta( 'googleplus' ); ?>"></a></li>
                    <?php }  ?>
                    
                    <?php if ( get_the_author_meta( 'linkedin' ) ) { ?>
                        <li><a  class="rd-social-linkedin fa-linkedin fa" href="<?php the_author_meta( 'linkedin' ); ?>"></a></li>
                    <?php }  ?>
            
                    <?php if ( get_the_author_meta( 'flickr' ) ) { ?>
                        <li><a   class="rd-social-flickr fa-flickr fa"  href="<?php the_author_meta( 'flickr' ); ?>"></a></li>
                    <?php }  ?>
            
            
                    <?php if ( get_the_author_meta( 'tumblr' ) ) { ?>
                        <li><a   class="rd-social-tumblr fa-tumblr fa"  href="<?php the_author_meta( 'tumblr' ); ?>"></a></li>
                    <?php }  ?>
            
                    <?php if ( get_the_author_meta( 'vimeo' ) ) { ?>
                        <li><a  class="rd-social-vimeo fa-vimeo fa"  href="<?php the_author_meta( 'vimeo' ); ?>"></a></li>
                    <?php }  ?>
            
                    <?php if ( get_the_author_meta( 'youtube' ) ) { ?>
                        <li><a  class="rd-social-youtube fa-youtube fa"  href="<?php the_author_meta( 'youtube' ); ?>"></a></li>
                    <?php }  ?>
                    
                    <?php if ( get_the_author_meta( 'instagram' ) ) { ?>
                        <li><a  class="rd-social-instagram fa-instagram fa"  href="<?php the_author_meta( 'instagram' ); ?>"></a></li>
                    <?php }  ?>
                    
                    <?php if ( get_the_author_meta( 'telegram' ) ) { ?>
                        <li><a  class="rd-social-telegram fa-telegram fa"  href="<?php the_author_meta( 'telegram' ); ?>"></a></li>
                    <?php }  ?>    
                    
                    <?php if ( get_the_author_meta( 'pinterest' ) ) { ?>
                        <li><a  class="rd-social-pinterest fa-pinterest fa"  href="<?php the_author_meta( 'pinterest' ); ?>"></a></li>
                    <?php }  ?>    
				</ul>
     		</div>
		</div>
		</div>
		</aside>
 	<?php
	 
}
 }
 
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
																		
																	Share Post
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_share_post' ) ) {

function ssel_share_post(){
	global  $smof_data;
 if(function_exists('ssel_share_icons_config')){
$share_array['key'] = 'single';
$share_array['option'] = array(
	'share_url' => '#4444',
	'between' => '10px',
	'icon_style' => 'style-2',
	'alignment' => 'center',
	 
);
  	echo '<div class="rd-share rd-text-none  rd-margin-top rd-font-small">';
	echo ssel_share_icons_config($share_array,1); 
	echo '</div>';

 
  
}
}
 }
 
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
																		
															Box Layout Single
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_box_layout_single' ) ) {

function ssel_box_layout_single($type='blog',$class= false){ 
 	 
 	$box_layout = ssel_option('blog_box_layout');
  	if($box_layout !== 'none' && $box_layout !== ''){
		
   		return empty($class)?'boxed':' rd-box-layout-boxed rd-auto-width-warp rd-all-padding' ;
	}else{
		return empty($class)?'none' :' rd-box-layout-none ';
	}
	 
}
 }
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
																		
															 Single Meta
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_single_meta' ) ) {
function ssel_single_meta(){ 
	global $smof_data; 	
 	$meta_between= ssel_option_2('single_meta_layout','between'); 
	$meta_layout= ssel_option_2('single_meta_layout','layout'); 
 
 
 	
	
 	$meta_author = !empty($smof_data['single_meta_author'] )? $smof_data['single_meta_author']:'' ;
	$meta_date = !empty($smof_data['single_meta_date'] )? $smof_data['single_meta_date']:'' ;
 	$meta_view =!empty( $smof_data['single_meta_view'])? $smof_data['single_meta_view']:'' ; 
 	$meta_comments =!empty( $smof_data['single_meta_comments'])? $smof_data['single_meta_comments']:'' ;
 	$meta_category =!empty( $smof_data['single_meta_cats'])? $smof_data['single_meta_cats']:'' ;
	 
	
	if( !empty($meta_author) || !empty($meta_date) ||  !empty($meta_view)|| !empty($meta_comments) || !empty($meta_category )){ 
 
  
  if($meta_layout=='layout-2' || $meta_layout=='layout-5' || $meta_layout=='layout-8'){
		$avatar = get_avatar( get_the_author_meta( 'ID' ), 32 );
	}else{
		$avatar='';
	}
	

 	//Category Style
	switch($meta_layout){
		case 'layout-3':
		case 'layout-6': 
		$by='';
     break;
	default:
		$by = ssel_t('by');
 	}
 
 	switch($meta_layout){
		case 'layout-6':
		case 'layout-7': 
		case 'layout-8': 
		$in_right='rd-meta-item-left';
		$no_text='1';
       break;
	default:
		$in_right='rd-meta-item-right';
		$no_text='';

 	}
	
	echo '<div class="rd-meta-warp rd-single-meta rd-color-border rd-text-none rd-meta-'.esc_attr($meta_layout).' rd-meta-'.esc_attr($meta_between).' rd-margin-top">';
  	echo '<ul class="rd-meta rd-font-small rd-color-meta">';
	 if( !empty($meta_author)){ 
				echo '<li class="rd-author  rd-meta-item-right">';
				echo wp_kses_post($avatar).esc_html($by).' ';
			 	the_author_posts_link();
				echo'</li>';
			}
			//Category
 			if( !empty($meta_category) ){ 	
				echo '<li class="rd-cats  rd-meta-item-right">';
				ssel_blog_category(5);
				echo '</li>';
			}
	  
    
			 if(!empty( $meta_date) ){ 
				echo '<li class="rd-date  rd-meta-item-right">';
					ssel_get_time();
				echo '</li>';
			} 
    
 			if( !empty($meta_view )){
				echo '<li class="rd-view '.esc_attr($in_right).'">'.ssel_getPostViews(get_the_ID(),$no_text).'</li>';
			}	
 			if( !empty($meta_comments )){
				echo '<li class="rd-comment '.esc_attr($in_right).'">'.ssel_blog_meta_comments($no_text).'</li>';
			}	
	
	   
	echo '</ul>';
	echo '</div>';
     
	
	 }
			
} 
 
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
																		
															LightBox
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_lightbox' ) ) {

add_action( 'wp_footer', 'ssel_lightbox' );
function ssel_lightbox() {
	global $smof_data ;
 	?>
		<div class="rd-lightbox rd-lightbox-active">
			<div class="rd-lightbox-middle">
            
				<div class="rd-lightbox-outer"></div>
 				<div class="rd-lightbox-nextbig"></div>
    			<div class="rd-lightbox-prevbig"></div>
		
        		<div class="rd-lightbox-img">
 					<i class="rd-lightbox-close"></i>
    				<img src="#" class="rd-lightbox-targetimg" alt="#"/>
				</div>
                
   	 			<i class="rd-lightbox-loading"></i>
				<div class="rd-lightbox-bottom">
         	 		<div class="rd-lightbox-title"></div>
         			<div class="rd-lightbox-moreitems">
            			<div class="rd-lightbox-counter"></div>
         			</div>
         
     			</div>

			</div>
		</div>
  
	<?php 
 
}
 
 
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************
																		
															wp link pages
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_wp_link_pages' ) ) {

function ssel_wp_link_pages( $args = '' ) {
	$defaults = array(
		'before' => '<div id="rd-post-pagination"><a>' . ssel_t('pages').'</a>', 
		'after' => '</div>',
		'text_before' => '',
		'text_after' => '',
		'next_or_number' => 'number', 
		'nextpagelink' =>  ssel_t('next').' '.ssel_t('page') ,
		'previouspagelink' =>  ssel_t('previous').' '.ssel_t('page'),
		'pagelink' => '%',
		'echo' => 1
	);

	$r = wp_parse_args( $args, $defaults );
	$r = apply_filters( 'wp_link_pages_args', $r );
	extract( $r, EXTR_SKIP );

	global $page, $numpages, $multipage, $more, $pagenow;

	$output = '';
	if ( $multipage ) {
		if ( 'number' == $next_or_number ) {
			$output .= $before;
			for ( $i = 1; $i < ( $numpages + 1 ); $i = $i + 1 ) {
				$j = str_replace( '%', $i, $pagelink );
				$output .= ' ';
				if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) )
					$output .= _wp_link_page( $i );
				else
					$output .= '<span class="current-post-page">';

				$output .= $text_before . $j . $text_after;
				if ( $i != $page || ( ( ! $more ) && ( $page == 1 ) ) )
					$output .= '</a>';
				else
					$output .= '</span>';
			}
			$output .= $after;
		} else {
			if ( $more ) {
				$output .= $before;
				$i = $page - 1;
				if ( $i && $more ) {
					$output .= _wp_link_page( $i );
					$output .= $text_before . $previouspagelink . $text_after . '</a>';
				}
				$i = $page + 1;
				if ( $i <= $numpages && $more ) {
					$output .= _wp_link_page( $i );
					$output .= $text_before . $nextpagelink . $text_after . '</a>';
				}
				$output .= $after;
			}
		}
	} 
	if ( $echo )
		echo wp_kses_post($output);
	return   $output;
}
 }
 ?>