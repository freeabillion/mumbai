<?php get_header(); ?>

<!-- Start Page Content -->
	<div class="wn-gallery-single">
		<?php
			if( have_posts() ):
				while( have_posts() ):
					the_post(); ?>
					<section id="headline">
						<div class="container">
							<h2><?php the_title(); ?></h2>
						</div>
					</section>
					<hr class="vertical-space2">
					<div class="container">
						<figure class="gallery-single-featured-image image-id-<?php echo get_post_thumbnail_id(); ?>">
							<?php get_the_image( array( 'meta_key' => array( 'Full', 'Full' ), 'size' => 'Full', 'link_to_post' => false, ) );?>
						</figure>
						<hr class="vertical-space2">
					<?php the_content(); ?>
					</div>
		<?php	endwhile;
			endif;
		?>
	</div>

<!-- Start Related Work -->
<?php
	// get current portfolio terms
	$post_id = get_the_ID();
	$terms	 = get_the_terms( $post_id , 'gallery_category' );

	// get current gallery category names
	$category_filter = array();
	if( is_array( $terms ) ) :
		foreach( $terms as $term )
			$category_filter[] = $term->slug;
	endif;

	// new Query
	$args = array(
		'post_type'		 => 'gallery',
		'taxonomy'		 => 'gallery_category',
		'post__not_in'	 => array( $post_id ),
		'orderby'        => 'rand',
		'posts_per_page' => 10,
		'tax_query'		 => array(
			array(
				'taxonomy' => 'gallery_category',
				'field'    => 'slug',
				'terms'    => $category_filter,
			),
		),
	);
	$rw_query = new WP_Query( $args );
?>

<section class="related-works">
	<!-- subtitle -->
	<div class="container">
		<div class="col-md-12">
			<div class="portfolio-carousel-subtitle">
				<h4 class="subtitle"><?php esc_html_e( 'Related Works', 'vision-church' ); ?></h4>
				<!-- owl-carousel custom navigation -->
				<div class="latest-projects-navigation">
					<a class="btn prev"><i class="fa-angle-left"></i></a>
					<a class="btn next"><i class="fa-angle-right"></i></a>
				</div>
			</div>

			<!-- latest-projects (owl-carousel) -->
			<ul id="latest-projects" class="owl-carousel owl-theme">
				<?php if ( $rw_query->have_posts()) : while ( $rw_query->have_posts() ) : $rw_query->the_post(); ?>
					<li class="portfolio-item">
						<a><?php the_post_thumbnail( 'vision_church_thumb300x200' ) ?></a>
						<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
						<div class="portfolio-meta"><?php echo '<span class="portfolio-date">' . get_the_date('d F Y') . '</span>'; ?></div>
					</li>
				<?php endwhile; endif;
				wp_reset_postdata(); ?>
			</ul> <!-- end latest-projects -->
		</div> <!-- end col-md-12 -->
	</div>
</section> <!-- end related-works -->

<?php get_footer(); ?>