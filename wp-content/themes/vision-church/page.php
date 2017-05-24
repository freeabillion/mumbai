<?php
get_header();

// theme options variables
$vision_church_options	= vision_church_options();
$enable_breadcrumbs		= isset( $vision_church_options['vision_church_enable_breadcrumbs'] ) ? $vision_church_options['vision_church_enable_breadcrumbs'] : '0';

// page options variables
$show_titlebar	= rwmb_meta( 'vision_church_page_title_bar_meta' );
$titlebar_fg	= rwmb_meta( 'vision_church_page_title_text_color_meta' );
$titlebar_bg	= rwmb_meta( 'vision_church_page_title_bg_color_meta' );
$titlebar_fs	= rwmb_meta( 'vision_church_page_title_font_size_meta' );
$breadcrumb 	= rwmb_meta( 'vision_church_breadcrumb_meta');

// headline and breadcrubs
if ( $show_titlebar ) : ?>
	<section id="headline" style="<?php if ( ! empty( $titlebar_bg ) ) echo 'background-color: ' . esc_attr($titlebar_bg) . ';'; ?>">
		<div class="container">
			<h2 style="<?php if ( ! empty( $titlebar_fg ) ) echo 'color: ' . esc_attr($titlebar_fg) . ';'; if ( ! empty( $titlebar_fs ) ) echo ' font-size: ' . $titlebar_fs . ';'; ?>"><?php the_title(); ?></h2>
		</div>
	</section>

<?php endif; ?>

<?php
if ( $enable_breadcrumbs == 1 ) { ?>
	<div class="breadcrumbs-w">
		<div class="container">
			<?php if ( 'vision_church_breadcrumbs' ) vision_church_breadcrumbs(); ?>
		</div>
	</div>
<?php
}else{
	if ($breadcrumb == 'yes'){ ?>
		<div class="breadcrumbs-w">
			<div class="container">
				<?php if ( 'vision_church_breadcrumbs' ) vision_church_breadcrumbs(); ?>
			</div>
		</div>
	<?php
	}else{
		echo '';
	}
}

if ( have_posts() ) : while( have_posts() ): the_post();
		$pure_content = get_the_content();
		$vc_enabled	  = ( $pure_content && substr( $pure_content, 0, 4 ) === '[vc_' ) ? true : false;
		if ( ! $vc_enabled ) : ?>
			<!-- Start Page Content -->
			<div class="wn-section clearfix">
				<div id="main-content" class="container">
					<?php the_content(); ?>
				</div> <!-- end container -->
			</div> <!-- end wn-section -->
		<?php else :
			the_content();
		endif;
endwhile; endif;

	echo '<div class="container">';
		wp_link_pages();
		if ( comments_open() || get_comments_number() ) {
			comments_template();
		}
	echo '</div>';

get_footer();