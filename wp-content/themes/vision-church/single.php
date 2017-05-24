<?php
/******************/
/**  Single Post
/******************/
get_header();

$vision_church_options = vision_church_options();
$vision_church_options['vision_church_blog_singlepost_sidebar'] = isset($vision_church_options['vision_church_blog_singlepost_sidebar']) ? $vision_church_options['vision_church_blog_singlepost_sidebar'] : 'right' ;
$vision_church_options['vision_church_blog_sinlge_featuredimage_enable'] = isset($vision_church_options['vision_church_blog_sinlge_featuredimage_enable']) ? $vision_church_options['vision_church_blog_sinlge_featuredimage_enable'] : '1' ;
$vision_church_options['vision_church_blog_meta_gravatar_enable'] = isset($vision_church_options['vision_church_blog_meta_gravatar_enable']) ? $vision_church_options['vision_church_blog_meta_gravatar_enable'] : '1' ;
$vision_church_options['vision_church_blog_meta_author_enable'] = isset($vision_church_options['vision_church_blog_meta_author_enable']) ? $vision_church_options['vision_church_blog_meta_author_enable'] : '0' ;
$vision_church_options['vision_church_blog_meta_category_enable'] = isset($vision_church_options['vision_church_blog_meta_category_enable']) ? $vision_church_options['vision_church_blog_meta_category_enable'] : '1' ;
$vision_church_options['vision_church_blog_meta_comments_enable'] = isset($vision_church_options['vision_church_blog_meta_comments_enable']) ? $vision_church_options['vision_church_blog_meta_comments_enable'] : '1' ;
$vision_church_options['vision_church_blog_meta_views_enable'] = isset($vision_church_options['vision_church_blog_meta_views_enable']) ? $vision_church_options['vision_church_blog_meta_views_enable'] : '0' ;
$vision_church_options['vision_church_blog_social_share'] = isset($vision_church_options['vision_church_blog_social_share']) ? $vision_church_options['vision_church_blog_social_share'] : '1' ;
$vision_church_options['vision_church_blog_single_authorbox_enable'] = isset($vision_church_options['vision_church_blog_single_authorbox_enable']) ?  $vision_church_options['vision_church_blog_single_authorbox_enable'] : '0' ;
$vision_church_options['vision_church_recommended_posts'] = isset($vision_church_options['vision_church_recommended_posts']) ? $vision_church_options['vision_church_recommended_posts'] : '1' ;

//PostShow1
$post_meta = rwmb_meta( 'vision_church_blogpost_meta' );
if(!empty($post_meta)){
	if($post_meta=="postshow1" && $thumbnail_id = get_post_thumbnail_id()){
		$background = wp_get_attachment_image_src( $thumbnail_id, 'full' ); ?>
		<div class="postshow1" style="background-image: url(<?php echo esc_url($background[0]); ?> );">
			<div class="postshow-overlay"></div>
			<div class="container"><h1 class="post-title-ps1"><?php the_title() ?></h1></div>
		</div>
<?php }
}
?>


<section class="container page-content" >
<hr class="vertical-space2">
<?php if( 'left' == $vision_church_options['vision_church_blog_singlepost_sidebar'] ){ ?>
	<aside class="col-md-3 sidebar leftside">
		<?php if( is_active_sidebar( 'Left Sidebar' ) ) dynamic_sidebar( 'Left Sidebar' ); ?>
	</aside>
<?php } ?>
<section class="<?php echo ( 'none' == $vision_church_options['vision_church_blog_singlepost_sidebar']  )?'col-md-12':'col-md-9 cntt-w'?>">
<?php if( have_posts() ): while( have_posts() ): the_post();  ?>
<article class="blog-single-post">
<?php
vision_church_setViews(get_the_ID());
$post_format = get_post_format(get_the_ID());
$content = get_the_content(); ?>
<div class="post-trait-w"> <?php
if(!isset($background)) { ?>
<h1 class="post-title"><?php the_title() ?></h1> <?php }
if(  $vision_church_options['vision_church_blog_sinlge_featuredimage_enable'] && !isset($background) ){
$meta_video = rwmb_meta( 'vision_church_featured_video_meta' );
if( 'video'  == $post_format || 'audio'  == $post_format){
$pattern = '\\[' . '(\\[?)' . "(video|audio)" . '(?![\\w-])' . '(' . '[^\\]\\/]*' . '(?:' . '\\/(?!\\])' . '[^\\]\\/]*' . ')*?' . ')' . '(?:' . '(\\/)' . '\\]' . '|' . '\\]' . '(?:' . '(' . '[^\\[]*+' . '(?:' . '\\[(?!\\/\\2\\])' . '[^\\[]*+' . ')*+' . ')' . '\\[\\/\\2\\]' . ')?' . ')' . '(\\]?)';
preg_match('/'.$pattern.'/s', $post->post_content, $matches);
if( (is_array($matches)) && (isset($matches[3])) && ( ($matches[2] == 'video') || ('audio'  == $post_format)) && (isset($matches[2]))){
$video = $matches[0];
echo do_shortcode($video);
$content = preg_replace('/'.$pattern.'/s', '', $content);
}else
if( (!empty( $meta_video )) ){
echo do_shortcode($meta_video);}
}else
if( 'gallery'  == $post_format)	{
$pattern = '\\[' . '(\\[?)' . "(gallery)" . '(?![\\w-])' . '(' . '[^\\]\\/]*' . '(?:' . '\\/(?!\\])' . '[^\\]\\/]*' . ')*?' . ')' . '(?:' . '(\\/)' . '\\]' . '|' . '\\]' . '(?:' . '(' . '[^\\[]*+' . '(?:' . '\\[(?!\\/\\2\\])' . '[^\\[]*+' . ')*+' . ')' . '\\[\\/\\2\\]' . ')?' . ')' . '(\\]?)';
preg_match('/'.$pattern.'/s', $post->post_content, $matches);
if( (is_array($matches)) && (isset($matches[3])) && ($matches[2] == 'gallery') && (isset($matches[2]))){
$atts = shortcode_parse_atts($matches[3]);
$ids = $gallery_type = '';
if(isset($atts['ids'])){
$ids = $atts['ids'];}
if(isset($atts['vision_church_gallery_type'])){
$gallery_type = $atts['vision_church_gallery_type'];}
echo do_shortcode('[vc_gallery img_size= "full" type="flexslider_fade" interval="3" images="'.$ids.'" onclick="link_image" custom_links_target="_self"]');
$content = preg_replace('/'.$pattern.'/s', '', $content);}
}else
if( (!empty( $meta_video )) ){
echo do_shortcode($meta_video);
}else ?>
<figure class="single-featured-image image-id-<?php echo get_post_thumbnail_id(); ?>">
	<?php get_the_image( array( 'meta_key' => array( 'Full', 'Full' ), 'size' => 'Full', 'link_to_post' => false, ) );
	if($vision_church_options['vision_church_blog_meta_views_enable'] && has_post_thumbnail() ){ ?>
		<h6 class="blog-views"><i class="pe-7s-look"></i><span><?php echo vision_church_getViews(get_the_ID()); ?></span> </h6>
	<?php } ?>
</figure>
<?php } ?>
</div>
<div <?php post_class('post'); ?>>

<div class="postmetadata">
	<h6 class="blog-date"><i class="ti-calendar"></i><?php the_time(get_option( 'date_format' )) ?></h6>
	<?php if($vision_church_options['vision_church_blog_meta_category_enable']){ ?>
		<h6 class="blog-cat"><i class="ti-folder"></i><?php the_category(', ') ?> </h6>
	<?php } ?>
	<?php if($vision_church_options['vision_church_blog_meta_comments_enable']){ ?>
		<h6 class="blog-comments"><i class="ti-comment"></i><?php comments_number(  ); ?> </h6>
	<?php } ?>
</div>

<?php if( $vision_church_options['vision_church_blog_meta_gravatar_enable'] ){ ?>
	<div class="au-avatar-box">
		<div class="au-avatar"><?php echo get_avatar( get_the_author_meta( 'user_email' ), 90 ); ?></div>
		<?php if($vision_church_options['vision_church_blog_meta_author_enable']){ ?>
		<p class="blog-author"><?php esc_html_e('Write by:','vision-church');  the_author_posts_link(); ?></p>
		<?php } ?>
	</div>
<?php } ?>

<?php
if( 'quote' == $post_format  ) echo '<blockquote>';
echo apply_filters('the_content',$content);
if( 'quote' == $post_format  ) echo '</blockquote>';
?>

<?php if($vision_church_options['vision_church_blog_social_share']) {
	$dashed_title =  sanitize_title_with_dashes ( get_the_title() );
	$dashed_blog_info_name =  sanitize_title_with_dashes ( get_bloginfo( 'name' ) );?>
	<div class="post-sharing">
		<div class="blog-social">
		<a class="facebook single-wntooltip" data-wntooltip="Share on facebook" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php echo esc_html( $dashed_title ); ?>" target="blank"><i class="sl-social-facebook"></i></a>
		<a class="google single-wntooltip" data-wntooltip="Share this on Google+" href="https://plusone.google.com/_/+1/confirm?hl=en-US&amp;url=<?php the_permalink(); ?>" target="_blank"><i class="sl-social-google"></i></a>
		<a class="twitter single-wntooltip" data-wntooltip="Tweet" href="https://twitter.com/intent/tweet?original_referer=<?php the_permalink(); ?>&amp;text=<?php echo esc_html( $dashed_title ); ?>&amp;tw_p=tweetbutton&amp;url=<?php the_permalink(); ?><?php echo isset( $twitter_user ) ? '&amp;via='.$twitter_user : ''; ?>" target="_blank"><i class="sl-social-twitter"></i></a>
		<a class="linkedin single-wntooltip" data-wntooltip="Share on LinkedIn" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?php the_permalink(); ?>&amp;title=<?php echo esc_html( $dashed_title ); ?>&amp;source=<?php echo esc_html( $dashed_blog_info_name ); ?>"><i class="sl-social-linkedin"></i></a>
		<a class="email single-wntooltip" data-wntooltip="Email" href="mailto:?subject=<?php echo esc_html( $dashed_title ); ?>&amp;body=<?php the_permalink(); ?>"><i class="sl-envelope"></i></a>
		</div>
	</div>
<?php } ?>

<br class="clear">
<?php the_tags( '<div class="post-tags"><i class="fa-tags"></i>', '', '</div>' ); ?><!-- End Tags -->
<div class="next-prev-posts">
	<?php $args = array(
		'before'           => '',
		'after'            => '',
		'link_before'      => '',
		'link_after'       => '',
		'next_or_number'   => 'next',
		'nextpagelink'     => esc_html__( 'Next Page', 'vision-church' ) . '<i class="ti-angle-right"></i>',
		'previouspagelink' => '<i class="ti-angle-left"></i>' . esc_html__( 'Previous Page','vision-church' ),
		'pagelink'         => '%',
		'echo'             => 1
		);
		wp_link_pages($args); ?>

</div><!-- End next-prev post -->

<?php if( $vision_church_options['vision_church_blog_single_authorbox_enable'] ) { ?>
	<div class="about-author-sec">
		<?php echo get_avatar( get_the_author_meta( 'user_email' ), 90 ); ?>
		<h5><?php the_author_posts_link(); ?></h5>
		<p><?php echo get_the_author_meta( 'description' ); ?></p>
	</div>
<?php  } ?>


<?php if($vision_church_options['vision_church_recommended_posts']) {
	$tags = wp_get_post_tags($post->ID);
	$tag_ids = array();
	foreach($tags as $individual_tag)
	$tag_ids[] = $individual_tag->term_id;
	$cats = wp_get_post_categories($post->ID);
	$post_ids = array();
	$post_ids[] = $post->ID;
	$args = array(
		'post__not_in' => $post_ids,
		'showposts' => 3,
		'tax_query' => array(
			'relation' => 'OR',
			array(
				'taxonomy' => 'post_tag',
				'field' => 'id',
				'terms' => $tag_ids,
			),
			array(
				'taxonomy' => 'category',
				'field' => 'cat_ID',
				'terms' => $cats,
			),
		)
	);
	$my_query = new wp_query($args);
	if($my_query->have_posts()){
		echo '<div class="container rec-posts"><div class="col-md-12"><h3 class="rec-title">'. esc_html__('Recommended Posts','vision-church') .'</h3></div>';
		while ($my_query->have_posts()){
			$my_query->the_post();
			$post_ids[] = $post->ID;
?>
			<div class="col-md-4 col-sm-4"><article class="rec-post">
				<figure><?php get_the_image( array( 'meta_key' => array( 'thumbnail', 'thumbnail' ), 'size' => 'vision_church_blog2_thumb' ) ); ?></figure>
				<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
				<p><?php the_time(get_option( 'date_format' )) ?> </p>
			</article></div>
		<?php }
        echo '</div>';
	}
	else
		echo '<div class="container rec-posts"><div class="col-md-12"><h3 class="rec-title">'. esc_html__('Recent Posts','vision-church') .'</div></h3>';
wp_reset_postdata();

$rel_count = $my_query->found_posts;
if ($rel_count < 3){
$rec_count = 3 - $rel_count;
$args = array(
		'post__not_in' => $post_ids,
		'showposts' => $rec_count,
		);
$rec_query = new wp_query($args);
	if($rec_query->have_posts()){
		while ($rec_query->have_posts()){
		$rec_query->the_post();
?>
			<div class="col-md-4 col-sm-4"><article class="rec-post">
				<figure><?php get_the_image( array( 'meta_key' => array( 'thumbnail', 'thumbnail' ), 'size' => 'vision_church_blog2_thumb' ) ); ?></figure>
				<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
				<p><?php the_time(get_option( 'date_format' )) ?> </p>
			</article></div>
		<?php }
		echo '</div>';
	}
	wp_reset_postdata();
}
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

<?php if($vision_church_options['vision_church_blog_singlepost_sidebar'] == 'right' ){ ?>
	<aside class="col-md-3 sidebar">
		<?php if( is_active_sidebar( 'Right Sidebar' ) ) dynamic_sidebar( 'Right Sidebar' ); ?>
	</aside>
<?php } ?>
<div class="white-space"></div>
</section>
<?php
get_footer();
?>