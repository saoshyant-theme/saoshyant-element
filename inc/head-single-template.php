<?php 
 /*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																Head Singe Temeplate
																		
*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
global $ssel_single_template,$post,$smof_data; 
$meta = get_post_meta( $post->ID ); 
$hide_post_meta = isset( $meta['hide_post_meta'][0] ) ? $meta['hide_post_meta'][0] : '';
$hide_post_share = !empty( $meta['hide_post_share'][0] ) ? $meta['hide_post_share'][0] : '';

if(!empty($meta['video'][0])) {
	$class=' rd-alignment-right rd-video'; 
} else{ 
	$class=' rd-alignment-center rd-none-video';
}?>
 

<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
    
	<div class="rd-head-post-a<?php echo esc_attr(ssel_single())?> <?php echo esc_attr($class);?>  rd-all-post  rd-head-single-post  rd-auto-width-warp rd-single-ratio-auto">
		<div <?php post_class(); ?>>
 		<div class="rd-head-post-content">
			
             <div class="rd-thumb rd-single-thumb">
				<figure class="rd-single-thumb-warp "  >
				<div class="rd-single-thumb-container"  >
						<?php  if ( has_post_thumbnail() ){the_post_thumbnail( 'full');} ?>
				</div>
				</figure>
             
             </div>
             <div class="rd-post-middle ">
				<div class="rd-post-container  rd-all-padding rd-auto-width-item">
 					<div class="rd-details  rd-all-padding">
 						<h1 class="rd-title entry-title rd-font-large"><?php the_title(); ?></h1>
					<?php if($hide_post_meta !== 'hide' ) { ssel_single_meta();} ?>

  				<?php if( $hide_post_share !== 'hide' ) { ssel_share_post();} ?>
          			</div>
					<?php if( !empty($meta['video'][0]) ){ ssel_video();}?>              
          	 	</div>
			</div>
		</div>
		</div>
	</div>

<?php endwhile;?>
<?php endif; ?>
     