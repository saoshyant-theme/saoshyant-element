<?php
 
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																Footer Logo
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_footer_logo' ) ) {

function ssel_footer_logo() {
  global $smof_data,$ssel_single_template,$post ;
	if ( is_category() ) {
		$ssel_meta = get_term_meta(get_query_var( 'cat'  ));
	}
 
		
 	// footer_logo	
	$footer_logo = ssel_option( 'footer_logo' );
 
	
  
		$footer_logo = ssel_option('footer_logo'  ) ;
		$footer_logo_type = ssel_option('footer_logo_type'  ) ;
		$footer_logo_width =ssel_option('footer_logo_width');?>

				<div class="rd-footer-logo rd-footer-logo-main rd-header-item rd-footer-logo-center rd-footer-logo-<?php echo esc_attr($footer_logo_type);?>">
					<h2 class="rd-footer-logo-warp">
						<?php if ( $footer_logo_type == 'image' ) {?>
							<a  title="<?php echo esc_attr(bloginfo('name')); ?>" href="<?php echo esc_url(home_url( '/') ); ?>"><?php echo esc_html(bloginfo('name')); ?> <?php echo esc_html(bloginfo('description')); ?><img alt="<?php esc_url(bloginfo( 'name' )); ?>" src="<?php echo esc_url( $footer_logo); ?>" width="<?php echo esc_attr( $footer_logo_width );?>"  /></a>
                                    
						<?php } elseif( $footer_logo_type == 'title'){ ?>
								<a class="rd-footer-logo-title" href="<?php echo esc_url(home_url( '/') ); ?>"><?php echo esc_html(bloginfo('name')); ?></a>
	
						<?php } elseif( $footer_logo_type == 'description'){ ?>
                                <a class="rd-footer-logo-title" href="<?php echo esc_url(home_url( '/') ); ?>"><?php echo esc_html(bloginfo('name')); ?></a>
                                <a class="rd-footer-logo-description" href="<?php echo esc_url(home_url( '/') ); ?>"><?php echo esc_html(bloginfo('description')); ?></a>
                                            
                         <?php }?>
					</h2>
				</div>
<?php 
}
 }
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																Page Builder Footer
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
 if( ! function_exists( 'ssel_page_footer' ) ) {
function ssel_page_footer($out) {
	$page_footer = ssel_option('page_footer' );
	if(!empty($page_footer)){
	if($page_footer !='hide'){
		$post_name = get_page_by_path($page_footer);
  		   if(function_exists( "sao_builder_meta") && !empty($post_name->ID)){
				$section = sao_section_config($post_name->ID) ;
				if($out=='output'){
					if(!empty($section['output'])){
						echo '<div class="rd-footer-page-builder"></div>';
						sao_enqueue_footer();
			
					}
				}elseif($out=='css'){
					if(!empty($section['css'])){
 					}
			 
				} 
				
			
			
			
			
 		   }else{
			$section = '';
		   }
	}
 
	}
}
 }
