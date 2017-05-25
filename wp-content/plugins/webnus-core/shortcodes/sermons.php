<?php
function webnus_sermons( $attributes, $content = null ) {
	extract(shortcode_atts(	array(
		'type'					=> 'toggle',
		'category'				=> '',
		'carousel'				=> '',
		'count'					=> '6',
		'page'					=> '',
		'sort'					=> '',
		'icon'					=> '',
		'sermon_carousel_item'	=> '',
	), $attributes));

	ob_start();

	$view =($sort=='view')?"'&orderby=meta_value_num&meta_key=webnus_views":"";
	$paged = ( is_front_page() ) ? 'page' : 'paged' ;
	$pages = ($page)?'&paged='.get_query_var($paged):'&paged=1';
	$query = new WP_Query('post_type=sermon&posts_per_page='.$count.'&category_name='.$category.$pages.$view);

	if(empty($count)){
		$count=1;
	}

	$rcount= 1 ;

	// $sermon_carousel_item = '';
	if ( $carousel == true ) {
		$carousel				= 'sermon-carousel owl-carousel owl-theme';
		$sermon_carousel_item	= 'data-items="' . $sermon_carousel_item . '"';
	} ?>

	<div class="clearfix sermons-<?php echo esc_attr($type) . ' ' . $carousel . '" ' . $sermon_carousel_item; ?>>
		<?php
		if ( $type == 'toggle' || $type == 'toggle2' ){
			echo '<div class="sermon-wrap-toggle">';
		}
		if ($type=='clean'){
			echo '<div class="row">';
		}
		while ($query -> have_posts()) : $query -> the_post();
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
		$category = ($cats_slug_str)?esc_html__('Category: ','webnus-core') . $cats_slug_str:'';
		$date = get_the_time('F d, Y');
		$sep = ($cats_slug_str && $terms_slug_str )?' / ':'';
		$sep2 = ($date && $terms_slug_str )?' | ':'';
		$speaker = get_the_term_list( get_the_id() , 'sermon_speaker' , esc_html__('Speaker: ','webnus-core') );
		$title = get_the_title();
		$permalink = get_the_permalink();
		$desc = $category.$sep.$speaker;
		$image = get_the_image( array( 'meta_key' => array( 'thumbnail', 'thumbnail' ), 'size' => 'sermons-grid','echo'=>false, ) );

		global $sermon_meta;
		$sermon_video			= rwmb_meta( 'vision_church_sermon_video' );
		$sermon_audio			= rwmb_meta( 'vision_church_sermon_audio' );
		$sermon_attachment		= rwmb_meta( 'vision_church_sermon_attachment' );
		$download_file = '<a href="'.$sermon_attachment.'" class="button theme-skin larg " target="_self"><span><i class="pe-7s-cloud-download"></i>'.esc_html__('DOWNLOAD','webnus-core').'</span></a>';

		$sermons_meta =
		'<div class="media-links">
		<a href="'.$sermon_video.'" class="video-popup button theme-skin larg" target="_self" data-effect="mfp-zoom-in"><span><i class="pe-7s-play"></i>'.esc_html__('WATCH','webnus-core').'</span></a>
		<a href="#w-audio-'.$post_id.'" class="audio-popup button theme-skin larg " target="_self" data-effect="mfp-zoom-in"><span><i class="pe-7s-headphones"></i>'.esc_html__('LISTEN','webnus-core').'</span></a>
		<div class="white-popup mfp-with-anim mfp-hide">
			<div class="w-audio wn-audio-content" id="w-audio-'.$post_id.'">
				'.do_shortcode('[audio mp3="'.$sermon_audio.'"][/audio]').'
			</div>
		</div>
		' . $download_file . '
		<a href="' . get_the_permalink() . '" class="button theme-skin larg "><span><i class="pe-7s-notebook"></i>'.esc_html__('READ MORE','webnus-core').'</span></a>
	</div>';

	$sermon_read ='<a href="'.$permalink.'" target="_self"><i class="pe-7s-notebook"></i><span class="media_label">'.esc_html__('READ MORE','webnus-core').'</a>';
	$download_file = '<a href="'.$sermon_attachment.'" class="button theme-skin larg " target="_self"><span><i class="pe-7s-cloud-download"></i>'.esc_html__('DOWNLOAD','webnus-core').'</span></a>';

	if ( $type=='toggle' ) {
		echo '
		<div class="js-contentToggle wn-sertg-item" data-default-state="close">
			<h2 class="wn-sertg-title js-contentToggle__trigger">' . $title . '<i class="ti-plus"></i></h2>
			<div class="js-contentToggle__content">
				<div class="wn-sertg-content">
					<div class="wn-sertg-meta">
						<p class="wn-sertg-category">'. $category .'</p>
						<p class="wn-sertg-speaker">'. $speaker .'</p>
						<p class="wn-sertg-date">'. get_the_date() .'</p>
					</div>
					' .$content. '
					'. $sermons_meta . '
				</div>
			</div>
		</div>';
	} if ( $type=='toggle2' ) {
		$download_file = '<a href="'.$sermon_attachment.'" target="_self"><i class="pe-7s-cloud-download"></i>'.esc_html__('DOWNLOAD','webnus-core').'</a>';
		$sermons_meta =
			'<div class="media-links">
				<a href="'.$sermon_video.'" class="fancybox-media" target="_self"><i class="pe-7s-play"></i>'.esc_html__('WATCH','webnus-core').'</a>
				<a href="#w-audio-'.$post_id.'" class="inlinelb" target="_self"><i class="pe-7s-headphones"></i>'.esc_html__('LISTEN','webnus-core').'</a>
				<div style="display:none">
					<div class="w-audio w-audio-'.$post_id.'">
						'.do_shortcode('[audio mp3="'.$sermon_audio.'"][/audio]').'
					</div>
				</div>
				' . $download_file . '
				<a href="' . get_the_permalink() . '"><i class="pe-7s-notebook"></i>'.esc_html__('READ MORE','webnus-core').'</a>
			</div>';

		echo '
		<div class="js-contentToggle wn-sertg-item" data-default-state="close">
			<span class="title-toggle"></span><h2 class="wn-sertg-title js-contentToggle__trigger">' . $title . '</h2>
			<div class="js-contentToggle__content">
				<div class="wn-sertg-content">
					<div class="wn-sertg-meta">
						<p class="wn-sertg-category"><i class="ti-folder"></i>'. $category .'</p>
						<p class="wn-sertg-speaker"><i class="ti-comment"></i>'. $speaker .'</p>
						<p class="wn-sertg-date"><i class="ti-calendar"></i>'. get_the_date() .'</p>
					</div>
					' .$content. '
					'. $sermons_meta . '
				</div>
			</div>
		</div>';
	} else if ($type=='minimal') {

		$download_file = '<a href="'.$sermon_attachment.'" target="_self" class="wn-data-tooltip" data-name="' . esc_html__( 'DOWNLOAD', 'webnus-core' ) . '"><i class="pe-7s-cloud-download"></i><span class="wn-shape"></span></a>';
		$sermons_meta_minimal =
		'<div class="media-links">
		<a href="'.$sermon_video.'" class="video-popup wn-data-tooltip" target="_self" data-name="' . esc_html__( 'WHATCH', 'webnus-core' ) . '" data-effect="mfp-zoom-in"><i class="pe-7s-play"></i><span class="wn-shape"></span></a>
		<a href="#w-audio-'.$post_id.'" class="audio-popup wn-data-tooltip" target="_self" data-name="' . esc_html__( 'LISTEN', 'webnus-core' ) . '" data-effect="mfp-zoom-in"><i class="pe-7s-headphones"></i><span class="wn-shape"></span></a>
		<div class="white-popup mfp-with-anim mfp-hide">
			<div class="w-audio wn-audio-content" id="w-audio-'.$post_id.'">
				'.do_shortcode('[audio mp3="'.$sermon_audio.'"][/audio]').'
			</div>
		</div>
		' . $download_file . '
		<a href="' . get_the_permalink() . '" class="wn-data-tooltip" target="_self" data-name="' . esc_html__( 'READ MORE', 'webnus-core' ) . '"><i class="pe-7s-notebook"></i><span class="wn-shape"></span><span class="media_label"></span></a>
	</div>';

	$icon=($icon)?$icon:'fa-microphone';
	$sermon_icon=($icon!='none')?'<i class="sermon-icon '.$icon.'"></i>':'';
	echo '<article><a href="'.$permalink.'">'.$sermon_icon.'<h4>'.$title.'</h4></a><div class="sermon-detail">'. $desc.'</div><div class="media-links">'. $sermons_meta_minimal . '</div></article>';
}  else if ( $type == 'grid') {

	$download_file = '<a href="'.$sermon_attachment.'" target="_self" class="wn-data-tooltip" data-name="' . esc_html__( 'DOWNLOAD', 'webnus-core' ) . '"><i class="pe-7s-cloud-download"></i></a>';

	$sermons_meta_grid =
	'<div class="media-links">
		<a href="'.$sermon_video.'" class="video-popup wn-data-tooltip" target="_self" data-name="' . esc_html__( 'WHATCH', 'webnus-core' ) . '" data-effect="mfp-zoom-in"><i class="pe-7s-play"></i></a>
		<a href="#w-audio-'.$post_id.'" class="audio-popup wn-data-tooltip" target="_self" data-name="' . esc_html__( 'LISTEN', 'webnus-core' ) . '" data-effect="mfp-zoom-in"><i class="pe-7s-headphones"></i></a>
		<div class="white-popup mfp-with-anim mfp-hide">
			<div class="w-audio wn-audio-content" id="w-audio-'.$post_id.'">
				'.do_shortcode('[audio mp3="'.$sermon_audio.'"][/audio]').'
			</div>
		</div>
		' . $download_file . '
		<a href="' . get_the_permalink() . '" class="inlinelb wn-data-tooltip" target="_self" data-name="' . esc_html__( 'READ MORE', 'webnus-core' ) . '"><i class="pe-7s-notebook"></i><span class="media_label"></span></a>
	</div>';
$grids_class = $carousel == false ? 'col-md-3' : '' ;
$out = '
<div class="sermon-'.$type.'-item ' . $grids_class . '">
	<div class="sermons-grid-wrap">
		<div class="sermon-grid-header">
			<h4><a href="'.$permalink.'">'.$title.'</a></h4>
			<div class="sermon-grid-cat">' .$cats_slug_str. '</div>
		</div>
		<div class="sermon-grid-content">
			' .$sermons_meta_grid. '
			<p>'. vision_church_excerpt(15) .'</p>
			<a class="sermon-readmore" href="' .$permalink. '">' .esc_html__( 'Sermon Details', 'webnus-core' ). '</a>
		</div>
	</div>
</div>';
echo $out;
} else if ($type=='simple') {

	$col = ($count<5)? 12/$count:2;
	$row = 12/$col;
	$image = get_the_image( array( 'meta_key' => array( 'thumbnail', 'thumbnail' ), 'size' => 'square','echo'=>false, ) );
	echo ($rcount == 1)?'<div class="row">':'';
	$image_media=($image)?'<figure class="sermon-img">'.$image.'</figure>':'';
	echo '<div class="col-md-'.$col.' col-sm-'.$col.'"><article>'
	.$image_media.
	'<h4><a href="'.$permalink.'">'.$title.'</a></h4>
</article></div>';
if($rcount == $row){
	echo '</div>';
	$rcount = 0;
}

$rcount++;

} else if ($type=='clean'){

	$download_file = '<a href="'.$sermon_attachment.'" target="_self" class="wn-data-tooltip" data-name="' . esc_html__( 'DOWNLOAD', 'webnus-core' ) . '"><i class="pe-7s-cloud-download"></i><span class="wn-shape"></span></a>';
	$sermons_meta_clean =
	'<div class="media-links">
	<a href="'.$sermon_video.'" class="video-popup wn-data-tooltip" target="_self" data-name="' . esc_html__( 'WHATCH', 'webnus-core' ) . '" data-effect="mfp-zoom-in"><i class="pe-7s-play"></i><span class="wn-shape"></span></a>
	<a href="#w-audio-'.$post_id.'" class="audio-popup wn-data-tooltip" target="_self" data-name="' . esc_html__( 'LISTEN', 'webnus-core' ) . '" data-effect="mfp-zoom-in"><i class="pe-7s-headphones"></i><span class="wn-shape"></span></a>
	<div class="white-popup mfp-with-anim mfp-hide">
		<div class="w-audio wn-audio-content" id="w-audio-'.$post_id.'">
			'.do_shortcode('[audio mp3="'.$sermon_audio.'"][/audio]').'
		</div>
	</div>
	' . $download_file . '
	<a href="' . get_the_permalink() . '" class="wn-data-tooltip" target="_self" data-name="' . esc_html__( 'READ MORE', 'webnus-core' ) . '"><i class="pe-7s-notebook"></i><span class="wn-shape"></span><span class="media_label"></span></a>
</div>
<div class="clearn-view" data-name="' . esc_html__( 'VIEWS', 'webnus-core' ) . '"><i class="pe-7s-look"></i>'.vision_church_getViews(get_the_ID()).'</div>';

$col = ($count<5)? 12/$count:4;
$row = 12/$col;
echo '
<div class="col-md-6">
	<div class="sermon-clean-item">
		<figure class="clean-image">';
			the_post_thumbnail('full');
			echo '
		</figure>
		<div class="clean-content">
			<h4><a href="'.$permalink.'">'.$title.'</a></h4>
			<div class="sermon-detail">'.$speaker.$sep2.$date.'</div>
			<div class="media-links">'. $sermons_meta_clean . '</div>
		</div>
	</div>
</div>';

$rcount++;
}
endwhile;
echo '</div>';
if ( $type == 'toggle' || $type == 'toggle2' ){
	echo '</div>';
}
if ($type=='clean') {
	echo '</div>';
}

if($page){ ?>
<section class="container aligncenter">
	<?php
	if(function_exists('wp_pagenavi')) {
		wp_pagenavi( array( 'query' => $query ) );
	}
	?>
	<hr class="vertical-space2">
</section>
<?php }
$out = ob_get_contents();
ob_end_clean();
wp_reset_postdata();
return $out;
}
add_shortcode('sermons', 'webnus_sermons');
?>