<?php
/***************************************/
/*	Close  head line if woocommerce available
/***************************************/
if( isset($post) ){
	if( 'product' == get_post_type( $post->ID )){
		echo '</section>';
	}
}
$footer_show = true;
if(isset($post)){
	$footer_show = rwmb_meta( 'vision_church_footer_show' );
} ?>
<?php
if ( $footer_show || is_archive() || is_single() || is_home() || is_search() || is_404() ) : ?>
<section id="pre-footer">
<?php //start footer bars
$vision_church_options = vision_church_options();
$vision_church_options['vision_church_footer_instagram_bar'] = isset($vision_church_options['vision_church_footer_instagram_bar']) ? $vision_church_options['vision_church_footer_instagram_bar'] : '0' ;
$vision_church_options['vision_church_footer_social_bar'] = isset($vision_church_options['vision_church_footer_social_bar']) ? $vision_church_options['vision_church_footer_social_bar'] : '0' ;
$vision_church_options['vision_church_footer_subscribe_bar'] = isset($vision_church_options['vision_church_footer_subscribe_bar']) ? $vision_church_options['vision_church_footer_subscribe_bar'] : '0' ;
$vision_church_options['vision_church_footer_color'] = isset($vision_church_options['vision_church_footer_color']) ? $vision_church_options['vision_church_footer_color'] : '1' ;
$vision_church_options['vision_church_footer_bottom_enable'] = isset($vision_church_options['vision_church_footer_bottom_enable']) ? $vision_church_options['vision_church_footer_bottom_enable'] : '0' ;

if( $vision_church_options['vision_church_footer_instagram_bar'] )
	get_template_part('parts/instagram-bar');
if( $vision_church_options['vision_church_footer_social_bar'] ){
	get_template_part('parts/social-bar');
}
if( $vision_church_options['vision_church_footer_subscribe_bar'] )
	get_template_part('parts/subscribe-bar');
?>
</section>


	<footer id="footer" <?php if( $vision_church_options['vision_church_footer_color'] == 2 ) echo 'class="litex"';?>>
	<?php if( is_active_sidebar( 'footer-section-1' ) || is_active_sidebar( 'footer-section-2' ) || is_active_sidebar( 'footer-section-3' ) || is_active_sidebar( 'footer-section-4' )){ ?>
	<section class="container footer-in">
	<div class="row">
	<?php $footer_type = isset($vision_church_options['vision_church_footer_columns']) ? $vision_church_options['vision_church_footer_columns'] : '1' ;
	switch($footer_type){
	case 1: ?>
	<div class="col-md-4"><?php if( is_active_sidebar( 'footer-section-1' ) ) dynamic_sidebar('footer-section-1'); ?></div>
	<div class="col-md-4"><?php if( is_active_sidebar( 'footer-section-2' ) ) dynamic_sidebar('footer-section-2'); ?></div>
	<div class="col-md-4"><?php if( is_active_sidebar( 'footer-section-3' ) ) dynamic_sidebar('footer-section-3'); ?></div>
	<?php break;
	case 2: ?>
	<div class="col-md-3"><?php if( is_active_sidebar( 'footer-section-1' ) ) dynamic_sidebar('footer-section-1'); ?></div>
	<div class="col-md-3"><?php if( is_active_sidebar( 'footer-section-2' ) ) dynamic_sidebar('footer-section-2'); ?></div>
	<div class="col-md-3"><?php if( is_active_sidebar( 'footer-section-3' ) ) dynamic_sidebar('footer-section-3'); ?></div>
	<div class="col-md-3"><?php if( is_active_sidebar( 'footer-section-4' ) ) dynamic_sidebar('footer-section-4'); ?></div>
	<?php break;
	case 3: ?>
	<div class="col-md-6"><?php if( is_active_sidebar( 'footer-section-1' ) ) dynamic_sidebar('footer-section-1'); ?></div>
	<div class="col-md-3"><?php if( is_active_sidebar( 'footer-section-2' ) ) dynamic_sidebar('footer-section-2'); ?></div>
	<div class="col-md-3"><?php if( is_active_sidebar( 'footer-section-3' ) ) dynamic_sidebar('footer-section-3'); ?></div>
	<?php break;
	case 4: ?>
	<div class="col-md-3"><?php if( is_active_sidebar( 'footer-section-1' ) ) dynamic_sidebar('footer-section-1'); ?></div>
	<div class="col-md-3"><?php if( is_active_sidebar( 'footer-section-2' ) ) dynamic_sidebar('footer-section-2'); ?></div>
	<div class="col-md-6"><?php if( is_active_sidebar( 'footer-section-3' ) ) dynamic_sidebar('footer-section-3'); ?></div>
	<?php break;
	case 5: ?>
	<div class="col-md-6"><?php if( is_active_sidebar( 'footer-section-1' ) ) dynamic_sidebar('footer-section-1'); ?></div>
	<div class="col-md-6"><?php if( is_active_sidebar( 'footer-section-2' ) ) dynamic_sidebar('footer-section-2'); ?></div>
	<?php break;
	case 6: ?>
	<div class="col-md-12"><?php if( is_active_sidebar( 'footer-section-1' ) ) dynamic_sidebar('footer-section-1'); ?></div>
	<?php break;
	 } ?>
	 </div>
	 </section>
	 <?php } ?>
	<!-- end-footer-in -->
	<?php if( $vision_church_options['vision_church_footer_bottom_enable'] )
		get_template_part('parts/footer','bottom'); ?>
	<!-- end-footbot -->
	</footer>
	<!-- end-footer -->
<?php endif; ?>
<span id="scroll-top"><a class="scrollup"><i class="icon-arrows-slim-up"></i></a></span></div>
<!-- end-wrap -->
<!-- End Document
================================================== -->
<?php
echo isset($vision_church_options['vision_church_space_before_body']) ? $vision_church_options['vision_church_space_before_body'] : '';
wp_footer(); ?>
</body>
</html>