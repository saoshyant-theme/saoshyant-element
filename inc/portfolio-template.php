<?php 
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************

																Portfolio Template
																	 	
*////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// 
global $smof_data,$post;
$ssel_meta = get_post_meta( $post->ID );
$ssel_hide_post_share = !empty( $ssel_meta['hide_post_share'][0] ) ? $ssel_meta['hide_post_share'][0] : '';
$ssel_hide_post_tags = !empty( $ssel_meta['hide_post_tags'][0] ) ? $ssel_meta['hide_post_tags'][0] : '';
$ssel_hide_post_meta = !empty($ssel_meta['hide_post_meta'][0] ) ? $ssel_meta['hide_post_meta'][0] : '';
 $ssel_hide_author_box = !empty( $ssel_meta['hide_author_box'][0] ) ? $ssel_meta['hide_author_box'][0] : '';
$ssel_hide_banner_below = !empty( $ssel_meta['hide_banner_below'][0] ) ? $ssel_meta['hide_banner_below'][0] : '';
$ssel_hide_related_post = !empty( $ssel_meta['hide_related_post'][0] ) ? $ssel_meta['hide_related_post'][0] : '';
$ssel_hide_comments = !empty( $ssel_meta['hide_comments'][0] ) ? $ssel_meta['hide_comments'][0] : '';
 $ssel_single = ssel_single();
 $box_layout_single= ssel_box_layout_single('product');
 
$ssel_column_1 = ssel_column(1);
$ssel_column_2 = ssel_column(2);
$ssel_column_3 = ssel_column(3);

 
  ?>
<div class="rd-single-item ">
	<aside class="rd-element-item rd-element-single">
	<?php if ( have_posts() ) :?>
	<?php while ( have_posts() ) : the_post(); ?>
		<div class="rd-post-list-boxid <?php echo esc_attr($box_layout_single);?>">
		<article class=" rd-post-a<?php echo esc_attr(ssel_single());?>  <?php if(!empty($ssel_meta['video'][0])) {echo 'rd-video';} ?> rd-single-post rd-post rd-single-ratio-auto" id="post-<?php the_ID(); ?>">
        
			<div <?php post_class(); ?>>
				 
                         
         
        
                        <div class="rd-details rd-single-details rd-color-border rd-auto-width-item">
                            <h1 class="rd-title rd-single-title entry-title rd-font-big"><?php the_title(); ?></h1>
                            <?php if( $ssel_hide_post_meta !== 'hide' ){ ssel_portfolio_single_meta();  } ?>
                        </div>
                                
                                      
                     
                            <?php ssel_portfolio_image_gallery();?>
           
                          
                
                      
                
                <article class="rd-post-content rd-font-medium">
                    <?php the_content();?>
                </article>
                 
					<?php ssel_wp_link_pages();?>
                    <?php //if(!empty($ssel_meta['review'][0])  ) { ssel_box_review(); } ?>
                    <?php edit_post_link(ssel_t('edit')); ?>
                    <?php if(  $ssel_hide_post_tags !== 'hide' && !empty($smof_data['single_tags'])){ssel_portfolio_tags(); } ?>
                    <?php if(  $ssel_hide_post_share !== 'hide' && !empty($smof_data['single_share_icons'])){ssel_share_post();}?>
                  
                
               
 			</div>
		</article>
		</div>
	<?php endwhile;?>
	<?php endif; ?>
    </aside>
 

 
   
    
<?php if (  $ssel_hide_banner_below !== 'hide' && !empty($smof_data['below_article']) && is_active_sidebar( 'below_article_ads' ) ) { ?>
 	<div class="rd-widget-banner">
		<?php dynamic_sidebar('below_article_ads'); ?>
	</div>
<?php }?>

     
  

 
 
</div>
