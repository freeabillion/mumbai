<?php
	get_header();
	$vision_church_options = vision_church_options();
?>
<section id="headline"><div class="container"><h2><?php printf(  '%s', single_term_title( '', false ) ); ?></h2></div></section>
<section class="container page-content" ><hr class="vertical-space2">
<?php
echo '<section class="col-md-12 omega causes causes-list">';
if(have_posts()):
	while( have_posts() ): the_post();
		$post_id = get_the_ID();
		$cats = get_the_terms( $post_id , 'cause_category' );
		if(is_array($cats)){
			$cause_category = array();
			foreach($cats as $cat){
				$cause_category[] = $cat->slug;
			}
		}else $cause_category=array();
		$cats = get_the_terms($post_id, 'cause_category' );
		$cats_slug_str = '';
		if ($cats && ! is_wp_error($cats)) :
			$cat_slugs_arr = array();
		foreach ($cats as $cat) {
			$cat_slugs_arr[] = '<a href="'. get_term_link($cat, 'cause_category') .'">' . $cat->name . '</a>';
		}
		$cats_slug_str = implode( ", ", $cat_slugs_arr);
		endif;


		$category = ($cats_slug_str)?esc_html__('Category: ','vision-church') . $cats_slug_str:'';
		$date = get_the_time('F d, Y');
		$permalink = get_the_permalink();
		$image = get_the_image( array( 'meta_key' => array( 'thumbnail', 'thumbnail' ), 'size' => 'sermons-gridmons-grid','echo'=>false, ) );
		$image2 = get_the_image( array( 'meta_key' => array( 'thumbnail', 'thumbnail' ), 'size' => 'blog2_thumb','echo'=>false, ) );
		$title = '<h4><a class="cause-title" href="'.$permalink.'">'.get_the_title().'</a></h4>';
		$content ='<p>'. vision_church_excerpt(25) .'</p>';
		$view = '<div class="cause_view"><i class="sl-eye"></i>'.vision_church_getViews($post_id).'</div>';
		$vision_church_options = vision_church_options();
		$vision_church_options['webnus_donate_form'] = isset( $vision_church_options['webnus_donate_form'] ) ? $vision_church_options['webnus_donate_form'] : '';
		global $cause_meta;
		$progressbar = $cause_days = $cause_donate = '';
		$received = $percentage = 0;

		$received	= rwmb_meta( 'vision_church_cause_amount_received' );
		$amount		= rwmb_meta( 'vision_church_cause_amount' );
		$end		= rwmb_meta( 'vision_church_cause_end_date' );
		$vision_church_options['webnus_cause_currency'] = isset( $vision_church_options['webnus_cause_currency'] ) ? $vision_church_options['webnus_cause_currency'] : '$';
		$currency = esc_html($vision_church_options['webnus_cause_currency']);

		if($amount) {
			$percentage = ($received/$amount)*100;
			$percentage = round($percentage);
			$out=$percentage.'% '.esc_html__('DONATED OF ','vision-church').$currency.$amount;
			$progressbar = do_shortcode('[vc_progress_bar values="'.$percentage.'|'.$out.'" bgcolor="custom"]');
		}
		$now = date('Y-m-d 23:59:59');
		$now = strtotime($now);
		$end_date = $end.' 23:59:59';
		$your_date = strtotime($end_date);
		$datediff = $your_date - $now;
		$days_left = floor($datediff/(60*60*24));
		$date_msg = '';
		if($days_left==0) {$date_msg = '1';}
		elseif($days_left<0) {$date_msg = 'No';}
		else {$date_msg = $days_left+'1'.'';}
		$cause_days = ($percentage<100)?'<span>'.$date_msg.'</span> '.esc_html__('Days left to achieve target','vision-church'):esc_html__('Thank You','vision-church');

		echo '<article id="post-'.$post_id.'">
		<div class="row">
			<div class="col-md-4 wn-ca-list-left">';
				echo ($image)?'<figure class="cause-img">'.$image2.'':'';
				echo '<div class="postmetadata">
				<ul class="cause-metadata">';
					$vision_church_options['webnus_cause_views'] = isset( $vision_church_options['webnus_cause_views'] ) ? $vision_church_options['webnus_cause_views'] : '1';
					if($vision_church_options['webnus_cause_views']){ ?>
					<li  class="cause-views"> <i class="sl-eye"></i><span><?php echo vision_church_getViews($post_id); ?></span></li>
					<?php }
					$vision_church_options['webnus_cause_comments'] = isset( $vision_church_options['webnus_cause_comments'] ) ? $vision_church_options['webnus_cause_comments'] : '1';
					if($vision_church_options['webnus_cause_comments']){ ?>
					<li class="cause-comments"><i class="ti-comment"></i><span><?php comments_number(); ?></span> </li>
					<?php }
					echo '</ul></div></figure>
				</div>
				<div class="col-md-8 wn-ca-list-right">
					<div class="cause-content">
						'.$title.'
						<div class="postmetadata">';
							?>
							<ul class="cause-metadata">
								<?php
								$vision_church_options['webnus_cause_date'] = isset( $vision_church_options['webnus_cause_date'] ) ? $vision_church_options['webnus_cause_date'] : '1';
								if($vision_church_options['webnus_cause_date']){ ?>
								<li class="cause-date"><i class="ti-calendar"></i><span><?php the_time('F d, Y') ?></span> </li>
								<?php }
								$vision_church_options['webnus_cause_category'] = isset( $vision_church_options['webnus_cause_category'] ) ? $vision_church_options['webnus_cause_category'] : '1';
								if($vision_church_options['webnus_cause_category']){ ?>
								<li class="cause-comments"><i class="ti-folder"></i><span><?php the_terms( $post_id , 'cause_category', '',' | ','' ); ?></span> </li>
								<?php } ?>
							</ul>
						</div>
						<?php echo esc_html( $content ) .'<div class="cause-meta">'.$progressbar;
						echo '<div class="wn-cause-list-foot">';
						if($days_left>=0 && $percentage<100 && $vision_church_options['webnus_donate_form']){
							echo vision_church_modal_donate();
						} else {
							echo '<p class="cause-completed">'.esc_html__('Has been completed','vision-church').'</p>';
						}
						$vision_church_options['webnus_cause_social_share'] = isset( $vision_church_options['webnus_cause_social_share'] ) ? $vision_church_options['webnus_cause_social_share'] : '1';

						if( $vision_church_options['webnus_cause_social_share'] ) {
							$dashed_title =  sanitize_title_with_dashes ( get_the_title() );
							$dashed_blog_info_name =  sanitize_title_with_dashes ( get_bloginfo( 'name' ) );?>
							<div class="wn-cause-sharing">
								<ul class="wn-cause-sharing-icons">
									<li class="wn-wrap-social"><i class="pe-7s-share"></i>
										<ul>
											<li><a class="facebook" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php echo esc_html( $dashed_title ); ?>" target="blank"><i class="sl-social-facebook"></i></a></li>
											<li><a class="google" href="https://plusone.google.com/_/+1/confirm?hl=en-US&amp;url=<?php the_permalink(); ?>" target="_blank"><i class="sl-social-google"></i></a></li>
											<li><a class="twitter" href="https://twitter.com/intent/tweet?original_referer=<?php the_permalink(); ?>&amp;text=<?php echo esc_html( $dashed_title ); ?>&amp;tw_p=tweetbutton&amp;url=<?php the_permalink(); ?><?php echo isset( $twitter_user ) ? '&amp;via='.$twitter_user : ''; ?>" target="_blank"><i class="sl-social-twitter"></i></a></li>
										</ul>
									</li>
									<li class="single-mail"><a class="email" href="mailto:?subject=<?php echo esc_html( $dashed_title ); ?>&amp;body=<?php the_permalink(); ?>"><i class="pe-7s-mail"></i></a></li>
								</ul>
							</div>
			<?php } // end wn-cause-sharing
			echo '</div>'; // end wn-cause-list-foot
			echo '</div>'; // end cause-meta
			echo '</div>'; // end cause-content
			echo '</div>'; // end col-md-8
			echo'</div>'; // end row
			echo'</article>';
	endwhile;
endif;

if(function_exists('wp_pagenavi')) { wp_pagenavi(); } else {
	echo '<div class="wp-pagenavi">';
	next_posts_link(esc_html__('&larr; Previous page', 'vision-church'));
	previous_posts_link(esc_html__('Next page &rarr;', 'vision-church'));
	echo '<hr class="vertical-space">';
} ?>
</section>

</section>
<?php get_footer(); ?>