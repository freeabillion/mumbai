<?php
function vision_church_portfolio_carousel( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'title' => 'Recent Works',
		'carousel_count' => '10',
	), $atts));

	ob_start();

	// new Query
	$args = array(
		'post_type'		 => 'gallery',
		'posts_per_page' => $carousel_count,
	);
	$rw_query = new WP_Query( $args ); ?>

	<section class="related-works">
		<!-- subtitle -->
		<div class="portfolio-carousel-subtitle">
			<h4 class="subtitle"><?php echo esc_html( $title ); ?></h4>
			<!-- owl-carousel custom navigation -->
			<div class="latest-projects-navigation">
				<a class="btn prev"><i class="fa-angle-left"></i></a>
				<a class="btn next"><i class="fa-angle-right"></i></a>
			</div>
		</div>

		<!-- latest-projects (owl-carousel) -->
		<ul id="latest-projects" class="owl-carousel owl-theme">
			<?php if ( $rw_query->have_posts()) : while ( $rw_query->have_posts() ) : $rw_query->the_post();
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
				<li class="portfolio-item">
					<a><img src="<?php echo $thumbnail_url ?>"></a>
					<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
					<div class="portfolio-meta"><?php echo '<span class="portfolio-date">' . get_the_date('d F Y') . '</span>'; ?></div>
				</li>
			<?php endwhile; endif;
			wp_reset_query(); ?>
		</ul> <!-- end latest-projects -->
	</section> <!-- end related-works -->	
	<?php

	$out = ob_get_contents();
	ob_end_clean();
	$out = str_replace('<p></p>','',$out);

	return $out;
}

add_shortcode('portfolio-carousel', 'vision_church_portfolio_carousel');