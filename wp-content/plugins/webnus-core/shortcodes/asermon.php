<?php
function webnus_asermon( $attributes, $content = null ) {
extract(shortcode_atts(	array(
	'post'		=>'',
	'type'		=>'latest',
	'style'		=>'',
	'box_title'	=>'',
), $attributes));
	ob_start();	
	$w_post = ($type=='custom')?'&p='.$post:'&posts_per_page=1';
	$query = new WP_Query('post_type=sermon'.$w_post);
	if ($query -> have_posts()) : $query -> the_post();
	
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

		
		$content ='<p>'. vision_church_excerpt(28) .'</p>';
		$date = get_the_time('F d, Y');
		$sep2 = ($date && $terms_slug_str )?' | ':'';
		$speaker = get_the_term_list( get_the_id() , 'sermon_speaker' , esc_html__('Speaker: ','webnus-core') );
		$title = get_the_title();
		$permalink = get_the_permalink();
		$image = get_the_image( array( 'meta_key' => array( 'thumbnail', 'thumbnail' ), 'size' => 'sermons-grid','echo'=>false, ) );
		$button=($style=='hasbutton')?'button dark-gray medium':'';
		global $sermon_meta;
		$sermon_video			= rwmb_meta( 'vision_church_sermon_video' );
		$sermon_audio			= rwmb_meta( 'vision_church_sermon_audio' );
		$sermon_attachment		= rwmb_meta( 'vision_church_sermon_attachment' );
		$download_file = '<a href="'.$sermon_attachment.'" class="button larg " target="_self"><span><i class="pe-7s-cloud-download"></i>'.esc_html__('DOWNLOAD','webnus-core').'</span></a>';

		$sermons_meta = 
		'<div class="media-links">
		<a href="'.$sermon_video.'" class="fancybox-media button larg" target="_self"><span><i class="pe-7s-play"></i>'.esc_html__('WATCH','webnus-core').'</span></a>
		<a href="#w-audio-'.$post_id.'" class="inlinelb button larg " target="_self"><span><i class="pe-7s-headphones"></i>'.esc_html__('LISTEN','webnus-core').'</span></a>
		<div style="display:none">
			<div class="w-audio w-audio-'.$post_id.'">
				'.do_shortcode('[audio mp3="'.$sermon_audio.'"][/audio]').'
			</div>
		</div>
		' . $download_file . '
		<a href="' . get_the_permalink() . '" class="button larg "><span><i class="pe-7s-notebook"></i>'.esc_html__('READ MORE','webnus-core').'</span></a>
	</div>';

		$sermon_read ='<a class="'.$button.'" href="'.$permalink.'" target="_self"><span><i class="fa-book"></i>'.esc_html__('READ MORE','webnus-core').'</span></a>';
		if( $style == 'boxed' ){
			$thumbnail_url = get_the_post_thumbnail_url();
			if( !empty( $thumbnail_url ) ) {
				// if main class not exist get it
				if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
					require_once WEBNUS_CORE_DIR .'shortcodes/classes/class_webnus_manuplate.php';
				}
				$image = new Wn_Img_Maniuplate; // instance from settor class
				$thumbnail_url = $image->m_image( $thumbnail_url , '720' , '388' ); // set required and get result
			}
			echo '<article class="a-sermon-boxed">';
			echo '<div class="sermon-boxed-top"><img src="'.$thumbnail_url.'">';
			echo( $box_title ) ? '<h3>' . $box_title . '</h3>' : '' ;
			echo '</div><h4><a href="'.$permalink.'">'.$title.'</a></h4><div class="sermon-detail">'.$speaker.' | '.$date.'</div>';
			echo $content . $sermons_meta ;
			echo '</article>';
		} else {
			$download_file = '<a href="'.$sermon_attachment.'" data-name="' . esc_html__( 'DOWNLOAD', 'webnus-core' ) . '" class="wn-data-tooltip" target="_self"><i class="pe-7s-cloud-download"></i></a>';
			$sermons_meta_grid =
			'<div class="media-links">
			<a href="'.$sermon_video.'" class="fancybox-media wn-data-tooltip" target="_self" data-name="' . esc_html__( 'WHATCH', 'webnus-core' ) . '"><i class="pe-7s-play"></i></a>
			<a href="#w-audio-'.$post_id.'" class="inlinelb wn-data-tooltip" target="_self" data-name="' . esc_html__( 'LISTEN', 'webnus-core' ) . '"><i class="pe-7s-headphones"></i></a>
			<div style="display:none">
				<div class="w-audio w-audio-'.$post_id.'">
					'.do_shortcode('[audio mp3="'.$sermon_audio.'"][/audio]').'
				</div>
			</div>
			' . $download_file . '
			<a href="' . get_the_permalink() . '" class="inlinelb wn-data-tooltip" target="_self" data-name="' . esc_html__( 'READ MORE', 'webnus-core' ) . '"><i class="pe-7s-notebook"></i><span class="media_label"></span></a>
		</div>';
			echo '
			<div class="sermon-'.$type.'-item">
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
		}
		
	endif;
	$out = ob_get_contents();
	ob_end_clean();	
	wp_reset_postdata();
	return $out;
 }
 add_shortcode('asermon', 'webnus_asermon');
?>