<?php
	$vision_church_options = vision_church_options();
	$vision_church_options['vision_church_blog_posttitle_enable'] = isset($vision_church_options['vision_church_blog_posttitle_enable']) ? $vision_church_options['vision_church_blog_posttitle_enable'] : '1' ;
	$vision_church_options['vision_church_blog_meta_gravatar_enable'] = isset($vision_church_options['vision_church_blog_meta_gravatar_enable']) ? $vision_church_options['vision_church_blog_meta_gravatar_enable'] : '1' ;
	$vision_church_options['vision_church_blog_featuredimage_enable'] = isset($vision_church_options['vision_church_blog_featuredimage_enable']) ? $vision_church_options['vision_church_blog_featuredimage_enable'] : '1' ;
	$vision_church_options['vision_church_no_image'] = isset($vision_church_options['vision_church_no_image']) ? $vision_church_options['vision_church_no_image'] : '0' ;
	$vision_church_options['vision_church_blog_excerptfull_enable'] = isset($vision_church_options['vision_church_blog_excerptfull_enable']) ? $vision_church_options['vision_church_blog_excerptfull_enable'] : '0' ;
	$vision_church_options['vision_church_blog_excerpt_large'] = isset($vision_church_options['vision_church_blog_excerpt_large']) ? $vision_church_options['vision_church_blog_excerpt_large'] : 93 ;
	$vision_church_options['vision_church_blog_readmore_text'] = isset($vision_church_options['vision_church_blog_readmore_text']) ? $vision_church_options['vision_church_blog_readmore_text'] : 'Continue Reading' ;
	$vision_church_options['vision_church_blog_social_share'] = isset($vision_church_options['vision_church_blog_social_share']) ? $vision_church_options['vision_church_blog_social_share'] : '1' ;

	$post_thumb = (!has_post_thumbnail())? 'post-no-image':'';
	$classes = array(
		'blog-post',
		'blgtyp1',
		$post_thumb,
	);
?>
<article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>

<div class="blog-inner">
	<?php
	$post_format = get_post_format(get_the_ID());
	$content = get_the_content();

	if( !$post_format ) $post_format = 'standard';

	if( $vision_church_options['vision_church_blog_featuredimage_enable'] ) {
		$meta_video = rwmb_meta( 'vision_church_featured_video_meta' );
		// video post type
		if( 'video'  == $post_format || 'audio'  == $post_format) {
			$pattern = '\\[' .'(\\[?)' ."(video|audio)" .'(?![\\w-])' .'(' .'[^\\]\\/]*' .'(?:' .'\\/(?!\\])' .'[^\\]\\/]*' .')*?' .')' .'(?:' .'(\\/)' .'\\]' .'|' .'\\]' .'(?:' .'(' .'[^\\[]*+' .'(?:' .'\\[(?!\\/\\2\\])' .'[^\\[]*+' .')*+' .')' .'\\[\\/\\2\\]' .')?' .')' .'(\\]?)';
			preg_match('/'.$pattern.'/s', $post->post_content, $matches);
			if( (is_array($matches)) && (isset($matches[3])) && ( ($matches[2] == 'video') || ('audio'  == $post_format)) && (isset($matches[2]))) {
				$video = $matches[0];
				echo do_shortcode($video);
				$content = preg_replace('/'.$pattern.'/s', '', $content);
			} else if( (!empty( $meta_video )) ) {
				echo do_shortcode($meta_video);
			}
		// gallery post type
		} else if( 'gallery'  == $post_format) {
			$pattern = '\\[' .'(\\[?)' ."(gallery)" .'(?![\\w-])' .'(' .'[^\\]\\/]*' .'(?:' .'\\/(?!\\])' .'[^\\]\\/]*' .')*?' .')' .'(?:' .'(\\/)' .'\\]' .'|' .'\\]' .'(?:' .'(' .'[^\\[]*+' .'(?:' .'\\[(?!\\/\\2\\])' .'[^\\[]*+' .')*+' .')' .'\\[\\/\\2\\]' .')?' .')' .'(\\]?)';
			preg_match('/'.$pattern.'/s', $post->post_content, $matches);

			if( (is_array($matches)) && (isset($matches[3])) && ($matches[2] == 'gallery') && (isset($matches[2]))) {
				$ids = (shortcode_parse_atts($matches[3]));
				if(is_array($ids) && isset($ids['ids'])) $ids = $ids['ids'];
				echo do_shortcode('[vc_gallery onclick="link_no" img_size= "full" type="flexslider_fade" interval="3" images="'.$ids.'"  custom_links_target="_self"]');
				$content = preg_replace('/'.$pattern.'/s', '', $content);
			}
		} else {
			if(has_post_thumbnail()){
				get_the_image(array('meta_key' => array( 'Full', 'Full' ), 'size' => 'Full'));
			}else{
				if($vision_church_options['vision_church_no_image']){
					$no_image_src = isset( $vision_church_options['vision_church_no_image_src']['url'] ) ? $vision_church_options['vision_church_no_image_src']['url'] : get_template_directory_uri() . '/images/no_image.jpg';
					echo '<img alt="'.get_the_title().'" width="756" height="443" src="'.esc_url($no_image_src).'">';
				}
			}
		}
	} ?>
	<div class="blgt1-top-sec">
		<div class="blog1-header-wrap">
			<div class="postmetadata">
				<h6 class="blog-date"><i class="ti-calendar"></i><?php the_time(get_option( 'date_format' )) ?></h6>
				<?php
				$vision_church_options['vision_church_blog_meta_category_enable'] = isset( $vision_church_options['vision_church_blog_meta_category_enable'] ) ? $vision_church_options['vision_church_blog_meta_category_enable'] : '1' ;
				if($vision_church_options['vision_church_blog_meta_category_enable']){ ?>
					<h6 class="blog-cat"><i class="ti-folder"></i><?php the_category(', ') ?> </h6>
				<?php } ?>
				<?php
				$vision_church_options['vision_church_blog_meta_comments_enable'] = isset( $vision_church_options['vision_church_blog_meta_comments_enable'] ) ? $vision_church_options['vision_church_blog_meta_comments_enable'] : '1' ;
				if($vision_church_options['vision_church_blog_meta_comments_enable']){ ?>
					<h6 class="blog-comments"><i class="ti-comment"></i><?php comments_number(  ); ?> </h6>
				<?php } ?>
			</div>
			<?php
			if( function_exists( 'wp_review_show_total' ) ) {
				wp_review_show_total(true, 'review-total-only small-thumb');
			}
			if( $vision_church_options['vision_church_blog_posttitle_enable'] ) {
				if( ('aside' != $post_format ) && ('quote' != $post_format) ) {
					if( 'link' == $post_format ) {
						preg_match('/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i', $content,$matches);
						$content = preg_replace('/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i','', $content,1);
						$link ='';
						if(isset($matches) && is_array($matches)) $link = $matches[0]; ?>
						<h3 class="post-title"><a href="<?php echo esc_url($link); ?>"><?php the_title() ?></a></h3> <?php
					} else { ?>
					<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h3> <?php
				}
			}
		}

		if ( $post_format != 'quote' ) {
			if( $vision_church_options['vision_church_blog_meta_gravatar_enable'] ) { ?>
			<div class="au-avatar-box">
				<div class="au-avatar"><?php echo get_avatar( get_the_author_meta( 'user_email' ), 90 ); ?></div>
				<h6 class="blog-author"><?php esc_html_e('Write By:','vision-church') . the_author_posts_link(); ?></h6>
			</div>
			<?php } ?>
		<?php } ?>
		</div>
	</div>
	<div class="blgt1-inner">
	 <?php
		if( 0 == $vision_church_options['vision_church_blog_excerptfull_enable'] ) {
			if( 'quote' == $post_format  ) echo '<blockquote>';
			echo '<p>';
			echo vision_church_excerpt(($vision_church_options['vision_church_blog_excerpt_large']) ? $vision_church_options['vision_church_blog_excerpt_large'] : 93 );
			echo '... <br><br><a class="readmore" href="' . get_permalink($post->ID) . '">' . esc_html($vision_church_options['vision_church_blog_readmore_text']) . '</a>';
			echo '</p>';

			if( 'quote' == $post_format  ) echo '</blockquote>';
		} else {
			if( 'quote' == $post_format  ) echo '<blockquote>';
			echo apply_filters('the_content',$content);
			if( 'quote' == $post_format  ) echo '</blockquote>';
		} ?>
	</div>

	<?php if ( $post_format == 'quote' ) {
		if( $vision_church_options['vision_church_blog_meta_gravatar_enable'] ) { ?>
			<div class="au-avatar-box">
				<div class="au-avatar"><?php echo get_avatar( get_the_author_meta( 'user_email' ), 90 ); ?></div>
				<h6 class="blog-author"><?php esc_html_e('Write By:','vision-church') . the_author_posts_link(); ?></h6>
			</div>
		<?php } ?>
	<?php } ?>

	<?php if( 1 == $vision_church_options['vision_church_blog_social_share'] ) {
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

	<hr class="vertical-space1">
	</div>
</article>