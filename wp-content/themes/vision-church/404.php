<?php
get_header();

$vision_church_options = vision_church_options();
$not_found_page_status = isset( $vision_church_options['vision_church_404_page_switch'] ) ? $vision_church_options['vision_church_404_page_switch'] : '0' ;
$not_found_page_id = isset( $vision_church_options['vision_church_404_page'] )? $vision_church_options['vision_church_404_page'] : '' ;
$not_found_page_text = isset( $vision_church_options['vision_church_404_text'] )? $vision_church_options['vision_church_404_text'] : 'We\'re sorry, but the page you were looking for doesn\'t exist.' ;

if( $not_found_page_status && $not_found_page_id ){
	echo apply_filters('the_content', get_post_field('post_content', $not_found_page_id));
} else { ?>

	<div class="wn-section clearfix">
		<div id="main-content" class="container">
			<h1 class="pnf404"><?php esc_html_e('404','vision-church'); ?></h1>
			<h2 class="pnf404"><?php esc_html_e('Page Not Found','vision-church'); ?></h2>
			<br>
			<div>
				<?php get_search_form(); ?>
			</div>
			<h3><?php echo esc_html( $not_found_page_text ); ?></h3>
			<hr class="vertical-space5">
		</div>
	</div>

 <?php }

 get_footer(); ?>