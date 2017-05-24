<?php
/******************/
/**  Single Sermon
/******************/
$vision_church_options = vision_church_options();
get_header();
$post_id = get_the_ID();
?>
<section class="container page-content" >
<hr class="vertical-space2">
<?php
$vision_church_options['webnus_singlesermon_sidebar'] = isset( $vision_church_options['webnus_singlesermon_sidebar'] ) ? $vision_church_options['webnus_singlesermon_sidebar'] : 'right';
if($vision_church_options['webnus_singlesermon_sidebar'] == 'left'){ ?>
	<aside class="col-md-3 sidebar leftside">
		<?php dynamic_sidebar( 'Left Sidebar' ); ?>
	</aside>
<?php } ?>
<section class="<?php echo ($vision_church_options['webnus_singlesermon_sidebar']=='none')?'col-md-12':'col-md-9 cntt-w'?>">
<?php if( have_posts() ): while( have_posts() ): the_post();  ?>
<article class="blog-single-post">
<?php vision_church_setViews(get_the_ID());
$content = get_the_content(); ?>
<div class="post-trait-w">
<?php 
$vision_church_options['webnus_sermon_featuredimage'] = isset( $vision_church_options['webnus_sermon_featuredimage'] ) ? $vision_church_options['webnus_sermon_featuredimage'] : '1';
$vision_church_options['webnus_sermon_speaker'] = isset( $vision_church_options['webnus_sermon_speaker'] ) ? $vision_church_options['webnus_sermon_speaker'] : '1';
$vision_church_options['webnus_sermon_date'] = isset( $vision_church_options['webnus_sermon_date'] ) ? $vision_church_options['webnus_sermon_date'] : '1';
$vision_church_options['webnus_sermon_category'] = isset( $vision_church_options['webnus_sermon_category'] ) ? $vision_church_options['webnus_sermon_category'] : '1';
$vision_church_options['webnus_sermon_comments'] = isset( $vision_church_options['webnus_sermon_comments'] ) ? $vision_church_options['webnus_sermon_comments'] : '1';
$vision_church_options['webnus_sermon_views'] = isset( $vision_church_options['webnus_sermon_views'] ) ? $vision_church_options['webnus_sermon_views'] : '1';
$vision_church_options['webnus_sermon_series'] = isset( $vision_church_options['webnus_sermon_series'] ) ? $vision_church_options['webnus_sermon_series'] : '1';
$vision_church_options['webnus_recent_sermons'] = isset( $vision_church_options['webnus_recent_sermons'] ) ? $vision_church_options['webnus_recent_sermons'] : '1';
$webnus_ser_spkr	=	$vision_church_options['webnus_sermon_speaker'];
$webnus_ser_date  	=	$vision_church_options['webnus_sermon_date'];
$webnus_ser_cats	=	$vision_church_options['webnus_sermon_category'];
$webnus_ser_cmnt	=	$vision_church_options['webnus_sermon_comments'];
$webnus_ser_view 	=	$vision_church_options['webnus_sermon_views'];
$webnus_ser_series 	=	$vision_church_options['webnus_sermon_series'];
 // sermon meta
$sermon_video			= rwmb_meta( 'vision_church_sermon_video' );
$sermon_audio			= rwmb_meta( 'vision_church_sermon_audio' );
$sermon_attachment		= rwmb_meta( 'vision_church_sermon_attachment' );

if(  $vision_church_options['webnus_sermon_featuredimage'] && !isset($background) ){
get_the_image( array( 'meta_key' => array( 'Full', 'Full' ), 'size' => 'Full', 'link_to_post' => false, ) );
}
if($webnus_ser_spkr || $webnus_ser_date || $webnus_ser_cats || $webnus_ser_cmnt || $webnus_ser_view){ ?>
	<div class="sermon-meta clearfix">
		
		<div class="col-sm-9 wn-sermon-metaleft">
			<?php
			echo "<div class='media-links'>";
				
				echo '<a href="'.esc_url( $sermon_video ).'" class="video-popup button colorf readmore" target="_self" data-effect="mfp-zoom-in"><i class="pe-7s-play"></i>'.esc_html__('WATCH','vision-church').'</a>';
				
				echo '<a href="#w-audio-'.$post_id.'" class="audio-popup button colorf readmore " data-effect="mfp-zoom-in"><i class="pe-7s-headphones"></i>'.esc_html__('LISTEN','vision-church').'</a>
				<div class="white-popup mfp-with-anim mfp-hide">
					<div class="w-audio wn-audio-content" id="w-audio-'.$post_id.'">
						'.do_shortcode('[audio mp3="'.$sermon_audio.'"][/audio]').'
					</div>
				</div>';
				
				if ( !empty( $sermon_attachment ) ) {
						echo '<a href="'.esc_url($sermon_attachment).'" class="button colorf readmore  " target="_self"><i class="pe-7s-cloud-download"></i>'.esc_html__('DOWNLOAD','vision-church').'</a>';
				}

			echo '</div>';
			?>
			
		</div>
		<div class="col-sm-3 wn-sermon-metaright">
		<?php if($webnus_ser_cmnt){ ?>
			<h6 class="blog-comments"><i class="ti-comment"></i><span><?php comments_number( '0', '1', '%' ); ?></span></h6>
		<?php } ?>

		<?php if($webnus_ser_view){ ?>
			<h6 class="blog-views"><i class="ti-eye"></i><span><?php echo vision_church_getViews(get_the_ID()); ?></span> </h6>
		<?php } ?>
		</div>

	</div>
<?php } 
if(!isset($background)) { ?>
<h1 class="aligncenter"><?php the_title() ?></h1> <?php } ?>
</div>
<div <?php post_class('post'); ?>>
<div class="postmetadata">
    <ul class="sermon-metadata">
        <?php
        if($webnus_ser_spkr){
			the_terms(get_the_id(), 'sermon_speaker' ,'<h6 class="sermon-metadata-detail"><i class="ti-user"></i>'.esc_html__('Speaker: ','vision-church'),', ','</h6>');
		} 
		if($webnus_ser_cats){
			the_terms(get_the_id(), 'sermon_category' ,'<h6 class="sermon-metadata-detail"><i class="ti-folder"></i>'.esc_html__('Category: ','vision-church'),', ','</h6>');
		}
		if($webnus_ser_series){
			the_terms(get_the_id(), 'sermon_series' ,'<h6 class="sermon-metadata-detail"><i class="ti-layers"></i>'.esc_html__('Series: ','vision-church'),', ','</h6>');
		}
		?>
		<?php if($webnus_ser_date){ ?>
		<h6 class="sermon-metadata-detail"><i class="ti-calendar"></i><?php the_date() ?></h6>
		<?php } ?>
    </ul>
</div>

<?php // content
echo apply_filters('the_content',$content);
?>

<?php // social share
	$vision_church_options['webnus_sermon_social_share'] = isset( $vision_church_options['webnus_sermon_social_share'] ) ? $vision_church_options['webnus_sermon_social_share'] : '1';
	if($vision_church_options['webnus_sermon_social_share']) {
		$dashed_title =  sanitize_title_with_dashes ( get_the_title() );
		$dashed_blog_info_name =  sanitize_title_with_dashes ( get_bloginfo( 'name' ) );
		?>
		<div class="post-sharing"><div class="blog-social">
			<span><?php esc_html_e('Share','vision-church');?></span>
			<a class="facebook single-wntooltip" data-wntooltip="Share on facebook" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php echo esc_html( $dashed_title ); ?>" target="blank"><i class="sl-social-facebook"></i></a>
			<a class="google single-wntooltip" data-wntooltip="Share this on Google+" href="https://plusone.google.com/_/+1/confirm?hl=en-US&amp;url=<?php the_permalink(); ?>" target="_blank"><i class="sl-social-google"></i></a>
			<a class="twitter single-wntooltip" data-wntooltip="Tweet" href="https://twitter.com/intent/tweet?original_referer=<?php the_permalink(); ?>&amp;text=<?php echo esc_html( $dashed_title ); ?>&amp;tw_p=tweetbutton&amp;url=<?php the_permalink(); ?><?php echo isset( $twitter_user ) ? '&amp;via='.$twitter_user : ''; ?>" target="_blank"><i class="sl-social-twitter"></i></a>
			<a class="linkedin single-wntooltip" data-wntooltip="Share on LinkedIn" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php echo esc_html( $dashed_title ); ?>&amp;source=<?php echo esc_html( $dashed_blog_info_name ); ?>"><i class="sl-social-linkedin"></i></a>
			<a class="email single-wntooltip" data-wntooltip="Email" href="mailto:?subject=<?php echo esc_html( $dashed_title ); ?>&amp;body=<?php the_permalink(); ?>"><i class="sl-envelope"></i></a>
		</div></div>
<?php } ?>

<br class="clear">
<?php
		the_terms(get_the_id(), 'sermon_tag' ,'<div class="post-tags"><i class="fa-tags"></i>', '', '</div>');
	?>
<!-- End Tags -->
<div class="next-prev-posts">
<?php $args = array(
'before'           => '',
'after'            => '',
'link_before'      => '',
'link_after'       => '',
'next_or_number'   => 'next',
'nextpagelink'     => '&nbsp;&nbsp; '.esc_html__('Next Page','vision-church'),
'previouspagelink' => esc_html__('Previous Page','vision-church').'&nbsp;&nbsp;',
'pagelink'         => '%',
'echo'             => 1
);
wp_link_pages($args);
?>
</div><!-- End next-prev post -->

<?php // Sermon Speaker Box
$vision_church_options['webnus_sermon_speakerbox'] = isset( $vision_church_options['webnus_sermon_speakerbox'] ) ? $vision_church_options['webnus_sermon_speakerbox'] : '1';
$terms = wp_get_post_terms($post->ID, "sermon_speaker");
	if( $vision_church_options['webnus_sermon_speakerbox'] && $terms ){
	echo '<div class="about-author-sec">';

	if (function_exists('z_taxonomy_image_url')){
		echo '<img class="sermon-speaker" width="80" src="' . z_taxonomy_image_url($terms[0]->term_id,array(160, 160), TRUE) . '" alt="' . $terms[0]->term_name . '" >';
	}
	the_terms(get_the_id(), 'sermon_speaker' , '<h5>',', ','</h5>' );
	echo term_description( $terms[0]->term_id, "sermon_speaker" ) . '</div>';
	}
?>

<?php
if ( get_the_terms(get_queried_object_id(), 'sermon_series' )  ){
	global $post;
	$terms = get_the_terms( $post->ID , 'sermon_series', 'string');
	$term_ids = wp_list_pluck($terms,'term_id');
	$second_query = new WP_Query( array(
      'post_type' => 'sermon',
      'tax_query' => array(
                    array(
                        'taxonomy' => 'sermon_series',
                        'field' => 'id',
                        'terms' => $term_ids,
                        'operator'=> 'IN' //Or 'AND' or 'NOT IN'
                     )),
      'posts_per_page' => 3,
      'ignore_sticky_posts' => 1,
      'orderby' => 'rand',
      'post__not_in'=>array($post->ID)
	) );
	if($second_query->have_posts()) {
	   echo '<div class="container rec-posts"><div class="col-md-12"><h3 class="rec-title">'. esc_html__('Other Sermons In This Series ','vision-church') .'</h3></div>';
		while ($second_query->have_posts() ) : $second_query->the_post(); ?>
		 <div class="col-md-4 col-sm-4"><article class="rec-post">
				<figure><?php get_the_image( array( 'meta_key' => array( 'thumbnail', 'thumbnail' ), 'size' => 'blog2_thumb' ) ); ?></figure>
				<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
				<p><?php the_time('F d, Y') ?> </p>
			</article></div>
	         
	        <?php
		endwhile; wp_reset_query();
	}

}elseif( $vision_church_options['webnus_recent_sermons'] ) {
	$post_ids = array();
	$post_ids[] = $post->ID;
	echo '<div class="container rec-posts"><div class="col-md-12"><h3 class="rec-title">'. esc_html__('Recent Sermons','vision-church') .'</h3></div>';
		$args = array(
			'post__not_in' => $post_ids,
			'showposts' => 3,
			'post_type' => 'sermon',
			);
		$rec_query = new wp_query($args);
		if($rec_query->have_posts()){
			while ($rec_query->have_posts()){
				$rec_query->the_post();
?>
				<div class="col-md-4 col-sm-4"><article class="rec-post">
					<figure><?php get_the_image( array( 'meta_key' => array( 'thumbnail', 'thumbnail' ), 'size' => 'blog2_thumb' ) ); ?></figure>
					<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
					<p><?php the_time('F d, Y') ?> </p>
				</article></div>
<?php 		}
			echo '</div>';
		}
wp_reset_postdata();
}
?>

</div>
</article>
<?php
endwhile;
endif;
comments_template(); ?>
</section>
<!-- end-main-conten -->

<?php
if($vision_church_options['webnus_singlesermon_sidebar'] == 'right' ){ ?>
	<aside class="col-md-3 sidebar">
		<?php dynamic_sidebar( 'Right Sidebar' ); ?>
	</aside>
<?php } ?>
<div class="white-space"></div>
</section>
<?php
get_footer();
?>