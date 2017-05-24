<?php
	get_header();
	$vision_church_options = vision_church_options();
	$sidebar = isset($vision_church_options['vision_church_blog_sidebar']) ? $vision_church_options['vision_church_blog_sidebar'] : 'right' ;
	$template = isset($vision_church_options['vision_church_blog_template']) ? $vision_church_options['vision_church_blog_template'] : '2';
	$vision_church_options['vision_church_blog_featuredimage_enable'] = isset( $vision_church_options['vision_church_blog_featuredimage_enable'] ) ? $vision_church_options['vision_church_blog_featuredimage_enable'] : '1' ;
	$vision_church_options['vision_church_blog_meta_category_enable'] = isset( $vision_church_options['vision_church_blog_meta_category_enable'] ) ? $vision_church_options['vision_church_blog_meta_category_enable'] : '1' ;
	$vision_church_options['vision_church_blog_posttitle_enable'] = isset( $vision_church_options['vision_church_blog_posttitle_enable'] ) ? $vision_church_options['vision_church_blog_posttitle_enable'] : '1' ;
	$vision_church_last_time = get_the_time(get_option( 'date_format' )); $vision_church_i=1; $vision_church_flag = false; //timeline
	if ($template == 6 || $template == 7) // disabled sidebar in masonry or timeline
		$sidebar = 'none';
	if ($template == 4 || $template == 5) // post count in template 4,5
		$p_count = '0';
?>


<?php // start headline
	$webnus_blog_title = isset($vision_church_options['vision_church_blog_page_title']) ? $vision_church_options['vision_church_blog_page_title'] : '' ;
	echo '<section id="headline"><div class="container"><h2>';
		if ( is_day() ) :
			printf('<small>'. esc_html__( 'Daily Archives', 'vision-church' ) . ':</small> %s', get_the_date() );
		elseif ( is_month() ) :
			printf('<small>'. esc_html__( 'Monthly Archives', 'vision-church' ) . ':</small> %s', get_the_date( _x( 'F Y', 'monthly archives date format', 'vision-church' ) ) );
		elseif ( is_year() ) :
			printf('<small>'. esc_html__( 'Yearly Archives', 'vision-church' ) .':</small> %s', get_the_date( _x( 'Y', 'yearly archives date format', 'vision-church' ) ) );
		elseif ( is_category() ):
			printf(  '%s', single_cat_title( '', false ) );
		elseif ( is_tag() ):
			printf('<small>'. esc_html__( 'Tag', 'vision-church' ) .':</small> %s', single_tag_title( '', false ) );
		else :
			echo esc_html($webnus_blog_title);
		endif;
	echo '</h2></div></section>';
 // end headline ?>



<?php // start main content
	if($template == 1 || $template == 2 || $template == 3 || $template == 4 || $template == 5){
		echo '<section class="container page-content" ><hr class="vertical-space2">';
		if ($sidebar == 'left' || $sidebar == 'both'){ ?>
				<aside class="col-md-3 sidebar leftside">
					<?php if( is_active_sidebar( 'Left Sidebar' ) ) dynamic_sidebar( 'Left Sidebar' ); ?>
				</aside>
			<?php }
		if ($sidebar == 'both')
				$class='col-md-6 cntt-w';
		elseif ($sidebar == 'right' || $sidebar == 'left')
				$class='col-md-9 cntt-w';
		else // none sidebar
				$class='col-md-12 omega';
		echo '<section class="'. esc_attr( $class ) .'">';
	}else if ($template == 6){
		echo'<section id="main-content-pin"><div class="container"><div id="pin-content">';
	}else if ($template == 7){ 
		echo'<section id="main-timeline"><div class="container"><div id="tline-content">';
	} // end main content ?>
	
<?php
	if ($template == 3)
		echo '<div class="row">';
	if(have_posts()):
		while( have_posts() ): the_post();
			if( $sidebar == 'both')
				get_template_part('parts/blogloop','bothsidebar');
			else{
				switch($template){
					case 2:
						get_template_part('parts/blogloop','type2');
					break;
					case 3:
						get_template_part('parts/blogloop','type3');
					break;
					case 4:
						if($p_count == '0')
							get_template_part('parts/blogloop');
						else
							get_template_part('parts/blogloop','type2');
						$p_count++;
					break;
					case 5:
						if($p_count == '0'){
							get_template_part('parts/blogloop');
							echo '<div class="row">';
						}else
							get_template_part('parts/blogloop','type3');
						$p_count++;
					break;
					case 6:
						get_template_part('parts/blogloop','masonry');
					break;
					case 7:
						global $post;
						$post_format = get_post_format(get_the_ID());	
						$content = get_the_content();	
						if( !$post_format ) $post_format = 'standard';	
						if(($vision_church_last_time != date(' F Y',strtotime($post->post_date)) ) || $vision_church_i==1){
							$vision_church_last_time = date(' F Y',strtotime($post->post_date));
							echo '<div class="tline-topdate">'.  date(' F Y',strtotime($post->post_date)) .'</div>';
							if( $vision_church_i>1 ) $vision_church_flag = true;
						} ?>
							<article id="post-<?php the_ID(); ?>"  class="tline-box <?php if(($vision_church_i%2)==0 && $vision_church_flag) { $vision_church_flag = false; $vision_church_i++; } elseif( ($vision_church_i%2)==0 ) echo ' rgtline'; ?>"> <span class="tline-row-<?php if(($vision_church_i%2)==0) echo 'r'; else echo 'l'; ?>"></span>
							<div class="tline-author-box">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), 90 ); ?>
							<h6 class="tline-author">
							<?php the_author_posts_link(); ?>
							</h6>
							<h6 class="tline-date"><?php esc_html_e('Posted at: ','vision-church'); ?><a href="<?php the_permalink(); ?>"><?php echo get_the_date('d M Y');?></a></h6>
							</div>
							 <?php
							if( $vision_church_options['vision_church_blog_featuredimage_enable'] ){
								$meta_video = rwmb_meta( 'vision_church_featured_video_meta' );
								if( 'video'  == $post_format || 'audio'  == $post_format){
									$pattern = '\\[' . '(\\[?)' . "(gallery)" . '(?![\\w-])' . '(' . '[^\\]\\/]*' . '(?:' . '\\/(?!\\])' . '[^\\]\\/]*' . ')*?' . ')' . '(?:' . '(\\/)' . '\\]' . '|' . '\\]' . '(?:' . '(' . '[^\\[]*+' . '(?:' . '\\[(?!\\/\\2\\])' . '[^\\[]*+' . ')*+' . ')' . '\\[\\/\\2\\]' . ')?' . ')' . '(\\]?)';
									preg_match('/'.$pattern.'/s', $post->post_content, $matches);
									if( (is_array($matches)) && (isset($matches[3])) && ( ($matches[2] == 'video') || ('audio'  == $post_format)) && (isset($matches[2]))){
										$video = $matches[0];
										echo do_shortcode($video);
										$content = preg_replace('/'.$pattern.'/s', '', $content);
									} else				
									if( (!empty( $meta_video )) ){
										echo do_shortcode($meta_video);
									}
								} else
								if( 'gallery'  == $post_format){			
									$pattern = '\\[' . '(\\[?)' . "(gallery)" . '(?![\\w-])' . '(' . '[^\\]\\/]*' . '(?:' . '\\/(?!\\])' . '[^\\]\\/]*' . ')*?' . ')' . '(?:' . '(\\/)' . '\\]' . '|' . '\\]' . '(?:' . '(' . '[^\\[]*+' . '(?:' . '\\[(?!\\/\\2\\])' . '[^\\[]*+' . ')*+' . ')' . '\\[\\/\\2\\]' . ')?' . ')' . '(\\]?)';
									preg_match('/'.$pattern.'/s', $post->post_content, $matches);
									if( (is_array($matches)) && (isset($matches[3])) && ($matches[2] == 'gallery') && (isset($matches[2])))
									{
										$ids = (shortcode_parse_atts($matches[3]));
										if(is_array($ids) && isset($ids['ids']))
											$ids = $ids['ids'];
										echo do_shortcode('[vc_gallery onclick="link_no" img_size= "full" type="flexslider_fade" interval="3" images="'.$ids.'"  custom_links_target="_self"]');
										$content = preg_replace('/'.$pattern.'/s', '', $content);
									}
								} else
									get_the_image( array( 'meta_key' => array( 'Thumbnail', 'Thumbnail' ), 'size' => 'vision_church_blog2_thumb' )  ); 
							} ?> <br>
							  <div class="tline-ecxt">
								<?php if(  $vision_church_options['vision_church_blog_meta_category_enable'] ):?>
								<h6 class="blog-cat-tline"> <?php the_category('- ') ?></h6>
								<?php endif; ?>
						  <?php
							if( $vision_church_options['vision_church_blog_posttitle_enable'] ) { 
								if( ('aside' != $post_format ) && ('quote' != $post_format)  ) { 	
									if( 'link' == $post_format ) { 
									 preg_match('/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i', $content,$matches);
									 $content = preg_replace('/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i','', $content,1);
									 $link ='';
									if(isset($matches) && is_array($matches))
									$link = $matches[0];	
								?>
								<h4><a href="<?php echo esc_url($link); ?>"><?php the_title(); ?></a></h4>
							<?php
							}else{
						  ?>
						  <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
						  <?php } } } ?>
							  </div>
							   <?php
								 if( isset( $vision_church_options['vision_church_blog_meta_comments_enable'] ) ) {
								?>
							  <div class="blog-com-sp"> <?php comments_popup_link(esc_html__('No Comments','vision-church') . ' &#187;', esc_html__('1 Comment','vision-church').' &#187;', esc_html__('% Comments','vision-church').' &#187;'); ?></div>
							  <?php } ?>
						</article>
						<?php $vision_church_i++;
					break;
					default:
						get_template_part('parts/blogloop'); //type 1
					break;
				}
			}
		endwhile;
	else:
		get_template_part('blogloop-none');
	endif;


	if($template == 7) // for timeline
		echo'<div class="tline-topdate enddte">'. get_the_time(get_option( 'date_format' )) .'</div></div>';

// end query ?>


<?php 
	if($template == 3 || $template == 5 || $template == 6 || $template == 7)
		echo '</div>'; 
	if($template == 6)
		echo '</div>'; 
?>


<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else {
	echo '<div class="wp-pagenavi">';
	next_posts_link(esc_html__('&larr; Previous page', 'vision-church'));
	previous_posts_link(esc_html__('Next page &rarr;', 'vision-church'));
} ?> 

</section>

<?php if ($sidebar == 'right' || $sidebar == 'both'){ ?>
	<aside class="col-md-3 sidebar">
		<?php if( is_active_sidebar( 'Right Sidebar' ) ) dynamic_sidebar( 'Right Sidebar' ); ?>
	</aside>
<?php } ?>
<?php if($template == 1 || $template == 2 || $template == 3 || $template == 4 || $template == 5 || $template == 6 || $template == 7)
	echo '</section>'; ?>


<?php get_footer(); ?>