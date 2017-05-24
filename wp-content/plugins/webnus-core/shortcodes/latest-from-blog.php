<?php
function vision_church_latestfromblog( $attributes, $content = null ) {
extract(shortcode_atts(	array(
	'type'			=> 'one',
	'category'		=> '',
	'carousel'		=> 'false',
	'item_carousel'	=> '',
	'post_to_show'	=> '',
), $attributes));
	$post_format = get_post_format(get_the_ID());
	ob_start();
	$vision_church_options = vision_church_options();

	// carousel
if ( $carousel == 'true' ){
	$carousel					= $carousel ? 'latest-b-carousel owl-carousel owl-theme' : '' ;
	$lastest_b_carousel_item	= $item_carousel ? 'data-items="' . $item_carousel . '"' : '';
	echo '<div class="clearfix">
			<div class="container latestposts-'.esc_attr($type).' ' .$carousel. ' " ' .$lastest_b_carousel_item. '>';
} else {
	echo '<div class="container latestposts-'.esc_attr($type).' ">';
}
?>
<?php
	if ($type=='one'){
			$query = new WP_Query('posts_per_page=2&category_name='.$category.'');
			while ($query -> have_posts()) : $query -> the_post();
			$thumbnail_url = get_the_post_thumbnail_url();
			if( !empty( $thumbnail_url ) ) {
				// if main class not exist get it
				if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
					require_once WEBNUS_CORE_DIR .'shortcodes/classes/class_webnus_manuplate.php';
				}
				$image = new Wn_Img_Maniuplate; // instance from settor class
				$thumbnail_url = $image->m_image( $thumbnail_url , '720' , '388' ); // set required and get result
			}
?>
	<div class="col-md-6 col-sm-6"><article class="latest-b"><figure class="latest-img"><img src="<?php echo $thumbnail_url ?>" alt="<?php the_title(); ?>" ></figure><div class="latest-content"><h6 class="latest-b-cat"><?php the_category(', '); ?></h6><h3 class="latest-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3><p class="latest-author"><?php the_author_posts_link(); ?> / <?php the_time(get_option( 'date_format' )); ?></p><p class="latest-excerpt"><?php echo vision_church_excerpt(36); ?></p></div></article></div>
<?php
	endwhile;
	}elseif ($type=='two'){
			$i = 0;
			$query = new WP_Query('posts_per_page=5&category_name='.$category.'');
			while ($query -> have_posts()) : $query -> the_post();
      		if( $i == 0 ) {
      		$thumbnail_url = get_the_post_thumbnail_url();
      		if( !empty( $thumbnail_url ) ) {
				// if main class not exist get it
				if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
					require_once WEBNUS_CORE_DIR .'shortcodes/classes/class_webnus_manuplate.php';
				}
				$image = new Wn_Img_Maniuplate; // instance from settor class
				$thumbnail_url = $image->m_image( $thumbnail_url , '720' , '388' ); // set required and get result
			}
      		?>
      		<div class="col-md-7">
				<article class="blog-post clearfix ">
					<figure class="pad-r20">
								<?php
								  if( !empty($thumbnail_url) )
									echo '<img src="'.$thumbnail_url.'">';
								  else
									echo '<img src="'.get_template_directory_uri() . '/images/featured.jpg" />';
								?>
					</figure>
					<div class="entry-content">
					<div class="blgt1-top-sec">
					<h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
					<h6 class="blog-cat"><?php the_category(', ') ?></h6><h6 class="blog-date"><i class="fa-clock-o"></i><?php the_time(get_option( 'date_format' )) ?></h6>
					</div>
						 <?php
							if( 'quote' == $post_format  ) echo '<blockquote>';
							echo '<p class="blog-detail">';
							echo vision_church_excerpt(45);
							echo '... <br><br><a class="readmore" href="' . get_permalink($query->ID) . '">' . esc_html($vision_church_options['vision_church_blog_readmore_text']) . '</a>';
							echo '</p>';
							if( 'quote' == $post_format  ) echo '</blockquote>';
						?>
					</div>
				</article>
			</div><div class="col-md-5">
		<?php  }else{ 
		$thumbnail_url = get_the_post_thumbnail_url();
		if( !empty( $thumbnail_url ) ) {
			// if main class not exist get it
			if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
				require_once WEBNUS_CORE_DIR .'shortcodes/classes/class_webnus_manuplate.php';
			}
			$image = new Wn_Img_Maniuplate; // instance from settor class
			$thumbnail_url = $image->m_image( $thumbnail_url , '164' , '124' ); // set required and get result
		}
			?>

      	<article class="blog-line clearfix">
          	<a href="<?php the_permalink(); ?>" class="img-hover"><?php
				if( !empty($thumbnail_url) )
					echo '<img src="'.$thumbnail_url.'">';
				else
					echo '<img src="'.get_template_directory_uri() . '/images/featured_140x110.jpg" />';
          	?></a>
			<p class="blog-cat"><?php the_category(', '); ?></p><h4><a href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h4><p><?php echo get_the_time(get_option( 'date_format' )); ?> 	/<strong><?php esc_html_e('by', 'risotto') ?></strong> <?php echo get_the_author(); ?>
        </article>

      <?php
		}
		$i++;
		endwhile;
		?>
		</div>
		<?php
	}elseif ($type=='three'){
	$query = new WP_Query('posts_per_page=3&category_name='.$category.'');
	while ($query -> have_posts()) : $query -> the_post();
	$thumbnail_url = get_the_post_thumbnail_url();
	if( !empty( $thumbnail_url ) ) {
		// if main class not exist get it
		if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
			require_once WEBNUS_CORE_DIR .'shortcodes/classes/class_webnus_manuplate.php';
		}
		$image = new Wn_Img_Maniuplate; // instance from settor class
		$thumbnail_url = $image->m_image( $thumbnail_url , '720' , '388' ); // set required and get result
	}
?>
	<div class="col-md-4 col-sm-4"><article class="latest-b2"><figure class="latest-b2-img"><img src="<?php echo $thumbnail_url ?>" alt="<?php the_title(); ?>" ></figure><div class="latest-b2-cont"><h6 class="latest-b2-cat"><?php the_category(', '); ?></h6><h3 class="latest-b2-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3><p><?php echo vision_church_excerpt(17); ?></p><div class="latest-b2-metad2"><i class="fa-comment-o"></i><span><?php echo get_comments_number() ?></span> / <span class="latest-b2-date"><?php the_author_posts_link(); ?> / <?php echo get_the_date('F d, Y');?></span></div></div></article></div>
<?php
	endwhile;
	}elseif ($type=='four'){
	$query = new WP_Query('posts_per_page=2&category_name='.$category.'');
	while ($query -> have_posts()) : $query -> the_post();
	$thumbnail_url = get_the_post_thumbnail_url();
	if( !empty( $thumbnail_url ) ) {
		// if main class not exist get it
		if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
			require_once WEBNUS_CORE_DIR .'shortcodes/classes/class_webnus_manuplate.php';
		}
		$image = new Wn_Img_Maniuplate; // instance from settor class
		$thumbnail_url = $image->m_image( $thumbnail_url , '720' , '388' ); // set required and get result
	}
?>
	<div class="col-md-6"><article class="latest-b2"> <div class="col-md-3"> <h6 class="blog-date"><span><?php the_time('d') ?> </span><?php the_time('M Y') ?> </h6> <div class="au-avatar"><?php echo get_avatar( get_the_author_meta( 'user_email' ), 90 ); ?></div> <h6 class="blog-author"><strong><?php esc_html_e('Written by','webnus-core'); ?></strong><br> <?php the_author_posts_link(); ?> </h6> <h6 class="latest-b2-cat"><?php the_category(', '); ?></h6> </div><div class="col-md-9"> <figure class="latest-b2-img"><img src="<?php echo $thumbnail_url ?>" alt="<?php the_title(); ?>" ></figure> <div class="latest-b2-cont"><h3 class="latest-b2-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3> </div> </div><hr class="vertical-space"></article></div>
<?php
	endwhile;
	}elseif ($type=='five'){
			$query = new WP_Query('posts_per_page=6&category_name='.$category.'');
			while ($query -> have_posts()) : $query -> the_post();
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
	 <div class="col-md-6 col-lg-4"><article class="latest-b2">
	  <figure class="latest-b2-img"><img src="<?php echo $thumbnail_url ?>" alt="<?php the_title(); ?>" ></figure>
	  <div class="latest-b2-cont">
	  <h6 class="latest-b2-cat"><?php the_category(', '); ?></h6>
	  <h3 class="latest-b2-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	  <h5 class="latest-b2-date"><?php the_author_posts_link(); ?> / <?php echo get_the_date('F d, Y');?></h5>
	  </div></article></div>
<?php
	endwhile;
	} elseif ($type=='six') {
			$query = new WP_Query('posts_per_page=4&category_name='.$category.'');
			while ($query -> have_posts()) : $query -> the_post();
			$thumbnail_url = get_the_post_thumbnail_url();
			if( !empty( $thumbnail_url ) ) {
				// if main class not exist get it
				if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
					require_once WEBNUS_CORE_DIR .'shortcodes/classes/class_webnus_manuplate.php';
				}
				$image = new Wn_Img_Maniuplate; // instance from settor class
				$thumbnail_url = $image->m_image( $thumbnail_url , '720' , '388' ); // set required and get result
			}
?>
	<div class="col-md-3 col-sm-6"><article class="latest-b">
	  <figure class="latest-img"><img src="<?php echo $thumbnail_url ?>" alt="<?php the_title(); ?>" ></figure>
		<div class="latest-content">
		<p class="latest-date"><?php the_time(get_option( 'date_format' )); ?></p>
		<h3 class="latest-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<p class="latest-author"><strong><?php esc_html_e('by','webnus-core') ?></strong> <?php the_author_posts_link(); ?> <strong><?php esc_html_e('in','webnus-core') ?></strong> <?php the_category(', '); ?></p>
		</div>
      </article></div>
<?php
	endwhile;
	} elseif ( $type == 'seven' ) {
		$wpbp = new WP_Query('posts_per_page=3&category_name='.$category.'');
		if ($wpbp->have_posts()) : while ($wpbp->have_posts()) : $wpbp->the_post(); 
		$thumbnail_url = get_the_post_thumbnail_url();
		if( !empty( $thumbnail_url ) ) {
			// if main class not exist get it
			if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
				require_once WEBNUS_CORE_DIR .'shortcodes/classes/class_webnus_manuplate.php';
			}
			$image = new Wn_Img_Maniuplate; // instance from settor class
			$thumbnail_url = $image->m_image( $thumbnail_url , '720' , '388' ); // set required and get result
		}
		?>
		<div class="col-md-4 col-sm-4"><article class="latest-b">
		<figure class="latest-img"><img src="<?php echo $thumbnail_url ?>" alt="<?php the_title(); ?>" ></figure>
		  	<div class="wrap-date-icons">
			    <h3 class="latest-date">
			    	<span class="latest-date-month"><?php the_time('M') ?></span>
			    	<span class="latest-date-day"><?php the_time('d') ?></span>
			    	<span class="latest-date-year"><?php the_time('Y') ?></span>
			    </h3>
			    <div class="latest-icons">
			    	<p>
			    		<span><i class="fa-eye"></i></span>
			    	</p>
			    	<p>
			            <span><?php echo vision_church_getViews(get_the_ID()); ?></span>
				    </p>
			    </div>
			</div>
			<div class="latest-content">
				<h3 class="latest-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<p class="latest-author"><?php esc_html_e('by ','webnus-core'). the_author() . esc_html_e(' in ','webnus-core') . the_category(', '); ?></p>
			</div>
	    </article></div> <?php

		endwhile; endif;
	} elseif ($type=='eight') {
		$query = new WP_Query('posts_per_page=3&category_name='.$category.'');
		while ($query -> have_posts()) : $query -> the_post();
		$thumbnail_url = get_the_post_thumbnail_url();
		if( !empty( $thumbnail_url ) ) {
			// if main class not exist get it
			if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
				require_once WEBNUS_CORE_DIR .'shortcodes/classes/class_webnus_manuplate.php';
			}
			$image = new Wn_Img_Maniuplate; // instance from settor class
			$thumbnail_url = $image->m_image( $thumbnail_url , '720' , '388' ); // set required and get result
		}
		?>
			<div class="col-sm-4">
				<article class="latest-b8">
					<figure class="latest-b8-img">
						<img src="<?php echo $thumbnail_url ?>" alt="<?php the_title(); ?>" >
					</figure>
					<div class="latest-b8-content">
						<span class="post-format-icon <?php echo get_post_format(); ?>"></span>
						<h3 class="latest-b8-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p><?php echo vision_church_excerpt(32); ?></p>
						<a class="readmore" href="<?php echo get_permalink($query->ID); ?>"><?php echo esc_html($vision_church_options['vision_church_blog_readmore_text']); ?></a>
						<div class="latest-b8-meta">
							<div class="autho"><i class="sl-user"></i><span><?php esc_html_e( 'by: ', 'webnus-core' ); the_author_posts_link(); ?></span></div>
							<div class="date"><i class="sl-calendar"></i><span><?php echo get_the_date('d F Y'); ?></span></div>
							<div class="comments"><i class="sl-bubble"></i><span><?php echo get_comments_number(); ( get_comments_number() == 0 || get_comments_number() == 1 ) ? esc_html_e( ' Comment', 'webnus-core' ) : esc_html_e( ' Comments', 'webnus-core' ); ?></span></div>
						</div>
					</div>
				</article>
			</div>
		<?php endwhile;
	} elseif ($type=='nine') {
		$query = new WP_Query('posts_per_page=3&category_name='.$category.'');
		while ($query -> have_posts()) : $query -> the_post();
		$thumbnail_url = get_the_post_thumbnail_url();
		if( !empty( $thumbnail_url ) ) {
			// if main class not exist get it
			if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
				require_once WEBNUS_CORE_DIR .'shortcodes/classes/class_webnus_manuplate.php';
			}
			$image = new Wn_Img_Maniuplate; // instance from settor class
			$thumbnail_url = $image->m_image( $thumbnail_url , '720' , '388' ); // set required and get result
		}
		?>
			<div class="col-sm-4">
				<article class="latest-b9">
					<figure class="latest-b9-img">
						<img src="<?php echo $thumbnail_url ?>" alt="<?php the_title(); ?>" >
					</figure>
					<div class="latest-b9-content">
						<h3 class="latest-b9-title">
							<span class="post-format-icon <?php echo get_post_format(); ?>"></span>
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h3>
						<div class="latest-b9-meta">
							<span class="date"><?php echo get_the_date('F d, Y'); ?></span>
							<span class="categories"><?php esc_html_e( 'in ', 'webnus-core' ); the_category(', '); ?></span>
							<span class="comments"><?php echo get_comments_number(); ( get_comments_number() == 0 || get_comments_number() == 1 ) ? esc_html_e( ' Comment', 'webnus-core' ) : esc_html_e( ' Comments', 'webnus-core' ); ?></span>
						</div>
					</div>
				</article>
			</div>
		<?php endwhile;
	} elseif ($type=='ten') {
		$query = new WP_Query('posts_per_page=4&category_name='.$category.'');
		while ($query -> have_posts()) : $query -> the_post();
		$thumbnail_url = get_the_post_thumbnail_url();
		if( !empty( $thumbnail_url ) ) {
			// if main class not exist get it
			if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
				require_once WEBNUS_CORE_DIR .'shortcodes/classes/class_webnus_manuplate.php';
			}
			$image = new Wn_Img_Maniuplate; // instance from settor class
			$thumbnail_url = $image->m_image( $thumbnail_url , '460' , '460' ); // set required and get result
		}
		?>
			<div class="col-md-6">
				<article class="latest-b10">
					<figure class="latest-b10-img">
						<img src="<?php echo $thumbnail_url ?>" alt="<?php the_title(); ?>" >
					</figure>
					<div class="latest-b10-content">
						<div class="latest-b10-meta">
							<span class="date"><?php echo get_the_date('d F Y'); ?></span>
						</div>
						<h3 class="latest-b10-title">
							<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						</h3>
						<p><?php echo vision_church_excerpt(19); ?></p>
						<a class="readmore" href="<?php echo get_permalink($query->ID); ?>"><?php echo esc_html($vision_church_options['vision_church_blog_readmore_text']); ?></a>
					</div>
				</article>
			</div>
		<?php endwhile;
	} elseif ($type=='eleven') {
		$query = new WP_Query('posts_per_page=3&category_name='.$category.'');
		while ($query -> have_posts()) : $query -> the_post();
		$thumbnail_url = get_the_post_thumbnail_url();
		if( !empty( $thumbnail_url ) ) {
			// if main class not exist get it
			if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
				require_once WEBNUS_CORE_DIR .'shortcodes/classes/class_webnus_manuplate.php';
			}
			$image = new Wn_Img_Maniuplate; // instance from settor class
			$thumbnail_url = $image->m_image( $thumbnail_url , '460' , '460' ); // set required and get result
		}
		?>
			<div class="col-sm-4">
				<article class="latest-b11">
					<div class="latest-b11-content">
						<h6 class="categories"><?php esc_html_e( 'In ', 'webnus-core' ); the_category(', '); ?></h6>
						<h3 class="latest-b11-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<div class="latest-b11-meta">
							<span class="date"><?php echo get_the_date('F d, Y'); ?></span>
							<span class="comments"><?php echo get_comments_number(); ( get_comments_number() == 0 || get_comments_number() == 1 ) ? esc_html_e( ' Comment', 'webnus-core' ) : esc_html_e( ' Comments', 'webnus-core' ); ?></span>
						</div>
					</div>
					<figure class="latest-b11-img">
						<img src="<?php echo $thumbnail_url ?>" alt="<?php the_title(); ?>" >
					</figure>
				</article>
			</div>
		<?php endwhile;
	} elseif ($type=='twelve'){
		$post_to_show = $post_to_show ? $post_to_show : '3' ;
		$query = new WP_Query('posts_per_page=' . $post_to_show . '&category_name='.$category.'');
		while ($query -> have_posts()) : $query -> the_post();
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
				<div class="col-md-4 col-sm-4">
					<article class="latest-b12">
						<figure class="latest-b12-img">
							<img src="<?php echo $thumbnail_url ?>" alt="<?php the_title(); ?>" >
						</figure>
						<div class="latest-b12-cont">
							<h6 class="latest-b12-cat"><?php the_category(', '); ?></h6>
							<h3 class="latest-b12-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p><?php echo vision_church_excerpt(19); ?></p>
							<div class="latest-b12-metad2">
								<span class="latest-b12-author"><span><?php esc_html_e( 'by', 'webnus-core') ?></span><?php the_author_posts_link(); ?></span>
								<span class="latest-b12-date"><?php echo get_the_date();?></span>
							</div>
						</div>
					</article>
				</div>
		<?php
		endwhile;
	}elseif ($type=='thirteen'){
		$post_to_show = $post_to_show ? $post_to_show : '4' ;
		$query = new WP_Query('posts_per_page=' . $post_to_show . '&category_name='.$category.'');
		while ($query -> have_posts()) : $query -> the_post();
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
		<div class="col-md-3 col-sm-3">
			<article class="latest-b13">
				<figure class="latest-b13-img">
					<img src="<?php echo $thumbnail_url ?>" alt="<?php the_title(); ?>" >
					<h6 class="latest-b13-cat"><?php the_category(', '); ?></h6>
				</figure>
				<div class="latest-b13-cont">
					<h3 class="latest-b13-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<p><?php echo vision_church_excerpt(19); ?></p>
					<div class="latest-b13-metad2">
						<span class="latest-b13-author"><span><?php esc_html_e( 'BY', 'webnus-core') ?> </span><?php the_author_posts_link(); ?></span>
						<span class="latest-b13-date"><?php echo get_the_date();?></span>
					</div>
				</div>
			</article>
		</div>
		<?php
		endwhile;
	} elseif ( $type == 'fourteen' ){
			$query = new WP_Query('posts_per_page=4&category_name='.$category.'');
			while ($query -> have_posts()) : $query -> the_post(); ?>
				<div class="col-lg-3 col-md-6 wn-latest-b14">
					<article class="latest-b14" style="background: url(<?php echo the_post_thumbnail_url ( $query->ID, 'vision_church_latest_img' ); ?> ); ">
						<div class="latest-b14-cont">
							<a class="hcolorf" href="<?php the_permalink(); ?>">
								<i class="ti-arrow-right" aria-hidden="true"></i>
							</a>
							<div class="latest-b14-meta">
								<span class="latest-b14-cat"><?php echo the_category(', '); ?></span>
								<span class="latest-b14-date"><?php echo get_the_date(); ?></span>
							</div>
							<h3 class="latest-b14-title"><a class="hcolorf" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						</div>
					</article>
				</div>
			<?php endwhile;
		} elseif ( $type == 'fifteen' ){
			$query = new WP_Query('posts_per_page=3&category_name='.$category.'');
			while ($query -> have_posts()) : $query -> the_post();
			$thumbnail_url = get_the_post_thumbnail_url();
			if( !empty( $thumbnail_url ) ) {
				// if main class not exist get it
				if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
					require_once WEBNUS_CORE_DIR .'shortcodes/classes/class_webnus_manuplate.php';
				}
				$image = new Wn_Img_Maniuplate; // instance from settor class
				$thumbnail_url = $image->m_image( $thumbnail_url , '460' , '460' ); // set required and get result
			}
			?>
				<div class="col-md-4 wn-latest-b15">
					<article class="latest-b15">
						<figure class="latest-b15-img">
							<img src="<?php echo $thumbnail_url ?>" alt="<?php the_title(); ?>" >
							<div class="latest-b15-overlay">
								<a href="<?php get_permalink(); ?>"><i class="ti-arrow-right"></i></a>
							</div>
						</figure>
						<div class="latest-b15-content">
							<div class="latest-b15-meta-data"><?php echo the_category(', '); ?> / <?php echo get_the_date(); ?></div>
							<h2><a href="<?php get_permalink(); ?>"><?php the_title(); ?></a></h2>
						</div>
					</article>
				</div>
			<?php endwhile;
		} elseif ( $type == 'sixteen' ){
			$query = new WP_Query('posts_per_page=4&category_name='.$category.'');
			while ($query -> have_posts()) : $query -> the_post();
			$thumbnail_url = get_the_post_thumbnail_url();
			if( !empty( $thumbnail_url ) ) {
				// if main class not exist get it
				if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
					require_once WEBNUS_CORE_DIR .'shortcodes/classes/class_webnus_manuplate.php';
				}
				$image = new Wn_Img_Maniuplate; // instance from settor class
				$thumbnail_url = $image->m_image( $thumbnail_url , '300' , '200' ); // set required and get result
			}
			?>
				<div class="col-md-3 wn-latest-b16">
					<article class="latest-b16">
						<figure class="latest-b16-img">
							<img src="<?php echo $thumbnail_url ?>" alt="<?php the_title(); ?>" >
							<div class="latest-b16-overlay">
								<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
								<div class="latest-b16-meta-data"><?php echo the_category(', '); ?></div>
							</div>
						</figure>
						<div class="latest-b16-content">
							<p class="latest-b61-excerpt"><?php echo vision_church_excerpt(15); ?></p>
							<a href="<?php the_permalink(); ?>" class="latest-b16-readmore"><?php echo esc_html__( 'Read More', 'webnus-core' ); ?></a>
							<div class="latest-b16-footer">
								<div class="latest-author">
								<span><?php esc_html_e('By','webnus-core') ?></span><strong><?php the_author_posts_link(); ?></strong>
								</div>
								<div class="latest-date">
								<span><i class="pe-7s-clock"></i><?php echo get_the_date(); ?></span>
								</div>
							</div>
						</div>
					</article>
				</div>
			<?php endwhile;
		} elseif ( $type == 'seventeen' ) {
			$query = new WP_Query('posts_per_page=3&category_name='.$category.'');
			while ($query -> have_posts()) : $query -> the_post(); ?>
				<div class="col-md-12 wn-latest-b17">
					<article class="latest-b17">
						<div class="latest-b17-content">
							<div class="latest-date"><?php echo get_the_date(); ?></div>
							<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<a href="<?php the_permalink(); ?>" class="latest-b17-readmore"><?php echo esc_html__( 'Read More', 'webnus-core' ); ?></a>
						</div>
					</article>
				</div>
			<?php endwhile;
		}
?>

<?php if ( $carousel == 'true' ) {
	echo '</div></div>';
} else {
	echo '</div>';
}
	$out = ob_get_contents();
	ob_end_clean();
	wp_reset_postdata();
	return $out;
 }
 add_shortcode('latestfromblog', 'vision_church_latestfromblog');
?>