<?php
/********************************************************************
Custom Commtents
*********************************************************************/ 
 if( ! function_exists( 'ssel_custom_comments' ) ) {

function ssel_custom_comments( $comment, $args, $depth ) {
			global $smof_data,$post;

		$time_format = ssel_option('time_format');	
	$GLOBALS['comment'] = $comment ;
 switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
 	?>
	<li class="rd-pingback"><?php echo esc_html( ssel_t('pingback')) ; ?> <?php comment_author_link(); ?><?php edit_comment_link( '('.ssel_t('edit').')', '<span class="edit-link">', '</span>' ); ?>
	</li>
	<?php
	 	break;
		 default :
	?>
	<li id="comment-<?php comment_ID(); ?>">
		<div  <?php comment_class('comment-wrap'); ?> >
			<div class="comment-avatar"><div class="avater"><?php echo get_avatar( $comment, 70 ); ?></div></div>
			<div class="author-comment">
            			<div class="author-link">

				<?php printf(  '%s ', sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) );  
			 
				if (  $depth =='1'){}else {?>
 		 <div class="author-link-reply"><?php $pcom = get_comment($comment->comment_parent);?><a href="<?php echo get_comment_link($comment->comment_parent)?>">: @<?php echo esc_html($pcom->comment_author); ?></a></div><?php }?>
 
 	</div>
				<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><?php  	if(  $time_format == 'traditional'  ){	 
					printf( '%1$s '.esc_html(ssel_t('at')).' %2$s', get_comment_date(),  get_comment_time() ); 

 				}else{
					echo ssel_number_replace(ssel_elapsed_string( strtotime("{$comment->comment_date_gmt} GMT"))) ;


 				}
				?></a><?php edit_comment_link(  '('.ssel_t('edit').')', ' ' ); ?></div><!-- .comment-meta .commentmetadata -->
			</div>
			<div class="clear"></div>
			<div class="comment-content rd-post-content">
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em class="comment-awaiting-moderation"><?php echo esc_html( ssel_t('ssel_t_yourcomment')); ?></em>
					<br />
				<?php endif; ?>
					
				<?php comment_text(); ?>
			</div>
			<div class="reply"><?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?></div><!-- .reply -->
		</div><!-- #comment-##  -->

	<?php
	 break;
	 endswitch;
}
 }
 
  if( ! function_exists( 'ssel_custom_pings' ) ) {

function ssel_custom_pings($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>
	<li class="comment pingback">
		<p><?php echo esc_html( ssel_t('ssel_t_yourcomment')); ?><?php comment_author_link(); ?><?php edit_comment_link(   '('.ssel_t('edit').')', ' ' ); ?></p>
<?php	
}
  }
    if( ! function_exists( 'ssel_pingback_header' ) ) {

 function ssel_pingback_header() {
	if ( is_singular() && pings_open() ) {
 	}
}
add_action( 'wp_head', 'ssel_pingback_header' );
	}
    if( ! function_exists( 'ssel_elapsed_string' ) ) {
function ssel_elapsed_string($ptime)
{
    $etime = time() - $ptime;

    if ($etime < 1)
    {
        return '۰ ثانیه';
    }

    $a = array( 365 * 24 * 60 * 60  =>  'سال',
                 30 * 24 * 60 * 60  =>  'ماه',
                      24 * 60 * 60  =>  'روز',
                           60 * 60  =>  'ساعت',
                                60  =>  'دقیقه',
                                 1  =>  'ثانیه'
                );
    $a_plural = array( 'سال'   => 'سال',
                       'ماه'  => 'ماه',
                       'روز'    => 'روز',
                       'ساعت'   => 'ساعت',
                       'دقیقه' => 'دقیقه',
                       'ثانیه' => 'ثانیه'
                );

    foreach ($a as $secs => $str)
    {
        $d = $etime / $secs;
        if ($d >= 1)
        {
            $r = round($d);
            return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' قبل';
        }
    }
} 
	}
?>