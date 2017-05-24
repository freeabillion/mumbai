<?php
$vision_church_options = vision_church_options(); 
$vision_church_options['vision_church_blog_featuredimage_enable'] = isset($vision_church_options['vision_church_blog_featuredimage_enable']) ? $vision_church_options['vision_church_blog_featuredimage_enable'] : '1' ;
$vision_church_options['vision_church_blog_posttitle_enable'] = isset($vision_church_options['vision_church_blog_posttitle_enable']) ? $vision_church_options['vision_church_blog_posttitle_enable'] : '1' ;
$vision_church_options['vision_church_blog_excerpt_list'] = isset($vision_church_options['vision_church_blog_excerpt_list']) ? $vision_church_options['vision_church_blog_excerpt_list'] : 17 ;
$vision_church_options['vision_church_blog_readmore_text'] = isset($vision_church_options['vision_church_blog_readmore_text']) ? $vision_church_options['vision_church_blog_readmore_text'] : 'Continue Reading' ;
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('blog-post blgtyp2'); ?>>
<?php
	$featured_enable = $vision_church_options['vision_church_blog_featuredimage_enable'];
	$post_format = get_post_format(get_the_ID());
	if(!$post_format) $post_format = 'standard';
	$content = get_the_content();
	$meta_video = rwmb_meta( 'vision_church_featured_video_meta' );

// Post Thumbnail
if( !empty($featured_enable) && $post_format != 'aside' && $post_format != 'quote' && $post_format != 'link' && (has_post_thumbnail() || !empty($meta_video))) { 
    $thumbnail_url = get_the_post_thumbnail_url();
    if( !empty( $thumbnail_url ) ) {
        // if main class not exist get it
        if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
            require_once WEBNUS_CORE_DIR .'shortcodes/classes/class_webnus_manuplate.php';
        }
        $image = new Wn_Img_Maniuplate; // instance from settor class
        $thumbnail_url = $image->m_image( $thumbnail_url , '420' , '330' ); // set required and get result
    }
    ?>
	 <div class="col-md-5 alpha">
		<?php if($post_format  == 'video' || $post_format == 'audio') {
					$pattern = '\\[' . '(\\[?)' . "(video|audio)" . '(?![\\w-])' . '(' . '[^\\]\\/]*' . '(?:' . '\\/(?!\\])' . '[^\\]\\/]*' . ')*?' . ')' . '(?:' . '(\\/)' . '\\]' . '|' . '\\]' . '(?:' . '(' . '[^\\[]*+' . '(?:' . '\\[(?!\\/\\2\\])' . '[^\\[]*+' . ')*+' . ')' . '\\[\\/\\2\\]' . ')?' . ')' . '(\\]?)';
					preg_match('/'.$pattern.'/s', $post->post_content, $matches);
					if( (is_array($matches)) && (isset($matches[3])) && ( ($matches[2] == 'video') || ('audio'  == $post_format)) && (isset($matches[2]))) {
					$video = $matches[0];
					echo do_shortcode($video);
					$content = preg_replace('/'.$pattern.'/s', '', $content);
					} elseif( (!empty( $meta_video )) ) {
					echo do_shortcode($meta_video);
					}
			} elseif( 'gallery'  == $post_format) {
					$pattern = '\\[' . '(\\[?)' . "(gallery)" . '(?![\\w-])' . '(' . '[^\\]\\/]*' . '(?:' . '\\/(?!\\])' . '[^\\]\\/]*' . ')*?' . ')' . '(?:' . '(\\/)' . '\\]' . '|' . '\\]' . '(?:' . '(' . '[^\\[]*+' . '(?:' . '\\[(?!\\/\\2\\])' . '[^\\[]*+' . ')*+' . ')' . '\\[\\/\\2\\]' . ')?' . ')' . '(\\]?)';
					preg_match('/'.$pattern.'/s', $post->post_content, $matches);
					if( (is_array($matches)) && (isset($matches[3])) && ($matches[2] == 'gallery') && (isset($matches[2]))) {
					$ids = (shortcode_parse_atts($matches[3]));				
					if(is_array($ids) && isset($ids['ids'])) { $ids = $ids['ids']; }
					echo do_shortcode('[vc_gallery img_size= "420x330" type="flexslider_slide" interval="3" images="'.$ids.'" onclick="link_no" custom_links_target="_self"]');
					$content = preg_replace('/'.$pattern.'/s', '', $content);}
			} else {
					echo "<img src=".$thumbnail_url.">";
                     }
		?>
	</div>
	<div class="col-md-7 omega">
<?php } else { ?>
	<div class="col-md-12 omega">
	
<?php } ?>

<div class="postmetadata">
	<h6 class="blog-date"><i class="ti-calendar"></i><?php the_time(get_option( 'date_format' )) ?></h6>
	<?php
	$vision_church_options['vision_church_blog_meta_category_enable'] = isset( $vision_church_options['vision_church_blog_meta_category_enable'] ) ? $vision_church_options['vision_church_blog_meta_category_enable'] : '1';
	if($vision_church_options['vision_church_blog_meta_category_enable']){ ?>
	<h6 class="blog-cat"><i class="ti-folder"></i><?php the_category(', ') ?> </h6>
	<?php } ?>
	<?php 
	$vision_church_options['vision_church_blog_meta_comments_enable'] = isset( $vision_church_options['vision_church_blog_meta_comments_enable'] ) ? $vision_church_options['vision_church_blog_meta_comments_enable'] : '1';
	if($vision_church_options['vision_church_blog_meta_comments_enable']){ ?>
	<h6 class="blog-comments"><i class="ti-comment"></i><?php comments_number(  ); ?> </h6>
	<?php } ?>
</div>
<?php

// Post Title
if( $vision_church_options['vision_church_blog_posttitle_enable'] && $post_format !='aside' && $post_format !='quote') { 	
	if( 'link' == $post_format ) {
		preg_match('/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i', $content,$matches);
		$content = preg_replace('/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i','', $content,1);
		$link ='';
		if(isset($matches[0]) && is_array($matches)) $link = $matches[0]; ?>
			<h3 class="post-title"><a href="<?php echo esc_url($link); ?>"><?php the_title() ?></a></h3>
	<?php }	else { ?>
		<h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h3>
	<?php }
}

// Post Content
		if($post_format == 'quote' ) echo '<blockquote>';

			echo '<p>'.vision_church_excerpt(($vision_church_options['vision_church_blog_excerpt_list'])?$vision_church_options['vision_church_blog_excerpt_list'] : 17 ).'</p>';
			echo '<a class="readmore" href="' . get_permalink($post->ID) . '">' . esc_html($vision_church_options['vision_church_blog_readmore_text']) . '</a>';

		if($post_format == 'quote') echo '</blockquote>';
		if($post_format == ('quote') || $post_format == 'aside' )
			echo '<a class="readmore" href="'. get_permalink( get_the_ID() ) . '">' . esc_html__('View Post', 'vision-church') . '</a>';
	?>	

	</div>
<hr class="vertical-space1">
</article>