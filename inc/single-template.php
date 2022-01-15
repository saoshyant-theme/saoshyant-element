<?php 
/*****************************************************************************************************************************************************
******************************************************************************************************************************************************
																		
																		Sinle Template
																		
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
 $box_layout_single= ssel_box_layout_single('blog',true);
$related = ssel_option('related')  ;

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
				 
                    <?php if( $ssel_single =='1' || $ssel_single =='2'|| $ssel_single =='3'|| $ssel_single =='4' ){?>
                        
         
        
                        <div class="rd-details rd-single-details rd-color-border rd-auto-width-item">
                            <h1 class="rd-title rd-single-title entry-title rd-font-big"><?php the_title(); ?></h1>
                            <?php if( $ssel_hide_post_meta !== 'hide' ){ ssel_single_meta();  } ?>
                        </div>
                                
                        <?php  if( !empty($ssel_meta['video'][0] )){?>
                         
                            <?php ssel_video();?>
                                    
                        <?php  } elseif( $ssel_single !=='4' &&  has_post_thumbnail() && !is_attachment() ) {?>
                    
                            <div class="rd-thumb rd-single-thumb  rd-thumb-style">
                             <?php if($ssel_single=='1' || $ssel_single=='2'){ ?>
									<figure class="rd-single-thumb-warp "  >
                                     <div class="rd-single-thumb-container"  >
                                        <?php the_post_thumbnail('large');?>
                                    </div>
                                    </figure>
                                <?php } elseif ($ssel_single=='3'){ ?>
									<figure class="rd-single-thumb-warp "  >
                                     <div class="rd-single-thumb-container"  >
                                        <?php the_post_thumbnail('full'); ?>
                                    </div>
                                    </figure>
                                <?php } ?>
           
                            </div>
                        
                        <?php } ?>
                    
                    <?php } ?>
                
                      
                
                <article class="rd-post-content rd-font-medium">
                    <?php the_content();?>
                </article>
                 
					<?php ssel_wp_link_pages();?>
                     <?php edit_post_link(ssel_t('edit')); ?>
                    <?php if(  $ssel_hide_post_tags !== 'hide' && !empty($smof_data['single_tags'])){ssel_tags(); } ?>
                    <?php if(  $ssel_hide_post_share !== 'hide' && !empty($smof_data['single_share_icons'])){ssel_share_post();}?>
                  
                
               
 			</div>
		</article>
		</div>
	<?php endwhile;?>
	<?php endif; ?>
    </aside>
 

 
  
<?php if(  $ssel_hide_author_box !== 'hide' && !empty($smof_data['single_author_box']) && get_the_author_meta( 'description' )  ) { ssel_author_box(); } ?> 
    
<?php if (  $ssel_hide_banner_below !== 'hide' && !empty($smof_data['below_article']) && is_active_sidebar( 'below_article_ads' ) ) { ?>
 	<div class="rd-widget-banner">
		<?php dynamic_sidebar('below_article_ads'); ?>
	</div>
<?php }?>

<?php if(  $ssel_hide_related_post !== 'hide' && !empty($related ) ) { get_template_part('inc/related-post'); }?> 
    
<?php if( $ssel_hide_comments !== 'hide'){ comments_template( '', true ); } ?>
 

 
 
</div>
