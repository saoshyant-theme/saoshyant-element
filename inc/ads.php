<?php
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

														 ADS
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_ads' ) ) {

function ssel_ads() {
	global $ssel_data;
	if( !empty($ssel_data[ 'newwindow' ]) ){ $newwindow = '_blank'; }else{$newwindow= '';}
	if( !empty($ssel_data[ 'nofollow' ]) ){ $nofollow = 'nofollow'; }else{$nofollow= '';}
    $image = isset( $ssel_data[ 'image' ] ) ? $ssel_data[ 'image' ]: '';
 	$ads_url = isset( $ssel_data[ 'ads_url' ] ) ? $ssel_data[ 'ads_url' ]: '';
	if( !empty($ssel_data[ 'resize' ]) ){ $resize = 'rd-resize'; }else{$resize= '';}
      echo  '<div class="rd-ads '.esc_attr($resize).'">';
     	echo '<a href="'.esc_url($ads_url).'"   rel="'.esc_attr($nofollow).'" target="'.esc_attr($newwindow).'">';
    		echo '<img alt="ads" src="'.esc_url($image).'" />';
  		echo '</a>'; 		
 	echo '</div>'  ;  
}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

														Above content
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_above_content' ) ) {

function ssel_above_content() {
	global $smof_data ;
	
	if (!empty($smof_data['above_content']) && is_active_sidebar( 'sidebar_above_content_ads' ) ) { 
	?>
	<div id="rd-row-blog" class="rd-row-item rd-row-main rd-row-1200  ">
	<div class="rd-row-middle">
	<div class="rd-row-container">  
		<div class="rd-column rd-content rd-1200">
  		<div class="rd-content-sidebar rd-widget-banner">
     		<?php dynamic_sidebar('sidebar_above_content_ads'); ?>
		</div>
		</div>
	</div>
	</div>
	</div>
	<?php
	}
}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

														Below content
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_below_content' ) ) {

function ssel_below_content() {
	global $smof_data ;
	if (!empty($smof_data['below_content']) && is_active_sidebar( 'sidebar_below_content_ads' ) ) {
	?>
	<div id="rd-row-blog" class="rd-row-item rd-row-main rd-row-1200 '">
	<div class="rd-row-middle">
	<div class="rd-row-container">  
		<div class="rd-column rd-content rd-1200">
		<div class="rd-content-sidebar rd-widget-banner">
			<?php dynamic_sidebar('sidebar_below_content_ads'); ?>
		</div>
		</div>
	</div>
	</div>
	</div>
	<?php 
	}
}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

														Above content
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_below_content' ) ) {

function ssel_above_center() {
	global $smof_data;
 	if (!empty($smof_data['above_center'] ) && is_active_sidebar( 'sidebar_above_center_ads' ) ) { ?>
		<div class="rd-widget-banner">
			<?php dynamic_sidebar('above_center_ads'); ?>
        </div>
	<?php 
	}
}
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

														Below Center
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_ads' ) ) {

function ssel_below_center() {
	global $smof_data;
	if (!empty($smof_data['below_center'] ) && is_active_sidebar( 'sidebar_below_center_ads' ) ) {   ?>
		<div class="rd-widget-banner">
			<?php dynamic_sidebar('sidebar_below_center_ads'); ?>
        </div>
	<?php }
} 
 }
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

															Banner Header
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_ads' ) ) {
function ssel_banner_header() {
  global $smof_data,$post ;
 if (  is_page() || is_single()) {
		$ssel_meta = get_post_meta( $post->ID );
	}  	else{
		$ssel_meta = '';
	}	$ssel_header_rtl = is_rtl() ? 'left':'right';
	 
		$ssel_banner_img = ssel_option('banner_header_img');
 		 
      

	
	
	$ssel_header_align = !empty( $smof_data[ 'banner_header_align' ] ) ? $smof_data[ 'banner_header_align' ] :  $ssel_logo_rtl;

	if(!empty($smof_data['banner_header_url'])){ 
		$link_url = $smof_data['banner_header_url'];
	} else {
		$link_url = '#';
	}
	
	if(!empty($smof_data['banner_header_window'])) {
		$target = '_blank' ;
	} else {
		$target = '' ;
	}
	
	if(!empty($smof_data['banner_header_nofollow'])) {
		$nofollow = 'nofollow';
	} else{
		$nofollow = '';
	}
 
	if($ssel_banner_img!='false'){
		
 	?>
    <div class="rd-banner-header rd-header-item  rd-banner-header-<?php echo esc_attr($ssel_header_align);?>">
 		<div class="rd-banner-header-warp <?php if(!empty($smof_data['widget_header'] ))echo esc_attr('rd-widget-header-warp'); else echo esc_attr('rd-header-content'); ?>">
		<?php if (!empty($ssel_banner_img)){   ?>
   			<a href="<?php echo esc_url($link_url); ?>" target="<?php echo esc_attr($target);?>" rel="<?php echo esc_attr($nofollow);?>" >

                 	<img alt="#" src="<?php echo esc_url($ssel_banner_img); ?>" />
                 
            </a>
            
            <?php }elseif (!empty($smof_data['widget_header'] ) && is_active_sidebar( 'widget_header' ) ) {   ?>
				<div class="rd-widget-banner rd-widget-header-content">
					<?php dynamic_sidebar('widget_header'); ?>
        		</div>
			<?php }?>
  		</div>
	</div>
 	<?php 
	}
	
}
 }
?>