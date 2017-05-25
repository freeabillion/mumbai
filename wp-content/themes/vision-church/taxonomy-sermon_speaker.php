<?php
	get_header();
	$vision_church_options = vision_church_options();
	$vision_church_options['webnus_blog_sidebar'] = isset( $vision_church_options['webnus_blog_sidebar'] ) ? $vision_church_options['webnus_blog_sidebar'] : '';
	$sidebar = $vision_church_options['webnus_blog_sidebar'];
?>

<section id="headline">
	<div class="container">
		<h2>
		<?php
			printf(  '%s', single_term_title( '', false ) );
		?>
		</h2>
	</div>
</section>

<section class="container page-content" ><hr class="vertical-space2">
<hr class="vertical-space3">
<?php
echo '<section class="row omega sermons-grid">';
if(have_posts()):
	while( have_posts() ): the_post();
		//terms
		$post_id = get_the_ID();

		$terms = get_the_terms( $post_id , 'sermon_speaker' );
		if(is_array($terms)){
			$sermon_speaker= array();
			foreach($terms as $term){
				$sermon_speaker[] = $term->slug;
			}
		}else $sermon_speaker=array();

		$terms = get_the_terms(get_the_id(), 'sermon_speaker' );
		$terms_slug_str = '';
		if ($terms && ! is_wp_error($terms)) :
			$term_slugs_arr = array();
		foreach ($terms as $term) {
			$term_slugs_arr[] = $term->name;
		}
		$terms_slug_str = implode( ", ", $term_slugs_arr);
		endif;

		//cats
		$cats = get_the_terms( $post_id , 'sermon_category' );
		if(is_array($cats)){
			$sermon_category = array();
			foreach($cats as $cat){
				$sermon_category[] = $cat->slug;
			}
		}else $sermon_category=array();
		$cats = get_the_terms(get_the_id(), 'sermon_category' );
		$cats_slug_str = '';
		if ($cats && ! is_wp_error($cats)) :
			$cat_slugs_arr = array();
		foreach ($cats as $cat) {
			$cat_slugs_arr[] = '<a href="'. get_term_link($cat, 'sermon_category') .'">' . $cat->name . '</a>';
		}
		$cats_slug_str = implode( ", ", $cat_slugs_arr);
		endif;

		$content ='<p>'. vision_church_excerpt(36) .'</p>';
		$category = ($cats_slug_str)?esc_html__('Category: ','vision-church') . $cats_slug_str:'';
		$date = get_the_time('F d, Y');
		$sep = ($cats_slug_str && $terms_slug_str )?' / ':'';
		$sep2 = ($date && $terms_slug_str )?' | ':'';
		$speaker = get_the_term_list( get_the_id() , 'sermon_speaker' , esc_html__('Speaker: ','vision-church') );
		$title = get_the_title();
		$permalink = get_the_permalink();
		$desc = $category.$sep.$speaker;
		$thumbnail_url = get_the_post_thumbnail_url();
		if( !empty( $thumbnail_url ) ) {
			// if main class not exist get it
			if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
				require_once WEBNUS_CORE_DIR .'shortcodes/classes/class_webnus_manuplate.php';
			}
			$image = new Wn_Img_Maniuplate; // instance from settor class
			$thumbnail_url = $image->m_image( $thumbnail_url , '420' , '230' ); // set required and get result
		}

		global $sermon_meta;
		$sermon_video			= rwmb_meta( 'vision_church_sermon_video' );
		$sermon_audio			= rwmb_meta( 'vision_church_sermon_audio' );
		$sermon_attachment		= rwmb_meta( 'vision_church_sermon_attachment' );
		$download_file = '<a href="'.$sermon_attachment.'" class="button theme-skin larg " target="_self"><span><i class="pe-7s-cloud-download"></i>'.esc_html__('DOWNLOAD','vision-church').'</span></a>';

		$sermons_meta =
		'<div class="media-links">
		<a href="'.$sermon_video.'" class="fancybox-media button theme-skin larg" target="_self"><span><i class="pe-7s-play"></i>'.esc_html__('WATCH','vision-church').'</span></a>
		<a href="#w-audio-'.$post_id.'" class="inlinelb button theme-skin larg " target="_self"><span><i class="pe-7s-headphones"></i>'.esc_html__('LISTEN','vision-church').'</span></a>
		<div style="display:none">
			<div class="w-audio w-audio-'.$post_id.'">
				'.do_shortcode('[audio mp3="'.$sermon_audio.'"][/audio]').'
			</div>
		</div>
		' . $download_file . '
		<a href="' . get_the_permalink() . '" class="button theme-skin larg "><span><i class="pe-7s-notebook"></i>'.esc_html__('READ MORE','vision-church').'</span></a>
	</div>';

	$sermon_read ='<a href="'.$permalink.'" target="_self"><i class="pe-7s-notebook"></i><span class="media_label">'.esc_html__('READ MORE','vision-church').'</a>';
	$download_file = '<a href="'.$sermon_attachment.'" class="button theme-skin larg " target="_self"><span><i class="pe-7s-cloud-download"></i>'.esc_html__('DOWNLOAD','vision-church').'</span></a>';

	$download_file = '<a href="'.$sermon_attachment.'" target="_self" class="wn-data-tooltip" data-name="' . esc_html__( 'DOWNLOAD', 'vision-church' ) . '"><i class="pe-7s-cloud-download"></i></a>';

	$sermons_meta_grid =
	'<div class="media-links">
	<a href="'.$sermon_video.'" class="fancybox-media wn-data-tooltip" target="_self" data-name="' . esc_html__( 'WATCH', 'vision-church' ) . '"><i class="pe-7s-play"></i></a>
	<a href="#w-audio-'.$post_id.'" class="inlinelb wn-data-tooltip" target="_self" data-name="' . esc_html__( 'LISTEN', 'vision-church' ) . '"><i class="pe-7s-headphones"></i></a>
	<div style="display:none">
		<div class="w-audio w-audio-'.$post_id.'">
			'.do_shortcode('[audio mp3="'.$sermon_audio.'"][/audio]').'
		</div>
	</div>
	' . $download_file . '
	<a href="' . get_the_permalink() . '" class="inlinelb wn-data-tooltip" target="_self" data-name="' . esc_html__( 'READ MORE', 'vision-church' ) . '"><i class="pe-7s-notebook"></i><span class="media_label"></span></a>
	</div>';
	echo'
	<div class="col-md-4">
		<div class="sermon-grid-item">
			<div class="sermons-grid-wrap">';
			if ( $thumbnail_url ){
				echo '<div class="sermon-grid-thumbnail">
					<a href="'.$permalink.'"><img src="'. $thumbnail_url .'" alt="'.$title.'"></a>
				</div>';
			}
			echo '
				<div class="sermon-grid-header">
					<h4><a href="'.$permalink.'">'.$title.'</a></h4>
					<div class="sermon-grid-cat">' .$cats_slug_str. '</div>
				</div>
				<div class="sermon-grid-content">
					' .$sermons_meta_grid. '
					<p>'. vision_church_excerpt(15) .'</p>
					<a class="sermon-readmore" href="' .$permalink. '">' .esc_html__( 'Sermon Details', 'vision-church' ). '</a>
				</div>
			</div>
		</div>
	</div>';
endwhile;
else:
	get_template_part('blogloop-none');
endif;
?>
<?php if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else {
	echo '<div class="wp-pagenavi">';
	next_posts_link(esc_html__('&larr; Previous page', 'vision-church'));
	previous_posts_link(esc_html__('Next page &rarr;', 'vision-church'));
	echo '<hr class="vertical-space">';
} ?>
<hr class="vertical-space5">
</section>

</section>
<?php get_footer(); ?>