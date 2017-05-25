<?php
$vision_church_options = vision_church_options();
$w_fbl_type = isset($vision_church_options['vision_church_footer_bottom_left']) ? $vision_church_options['vision_church_footer_bottom_left'] : '3' ;
$w_fbr_type = isset($vision_church_options['vision_church_footer_bottom_right']) ? $vision_church_options['vision_church_footer_bottom_right'] : '1' ;
$w_fb_logo = '<img src="'.esc_url(isset($vision_church_options['vision_church_footer_logo']['url']) ? $vision_church_options['vision_church_footer_logo']['url'] : '').'" width="65" alt="'.get_bloginfo( "name" ).'">';
$vision_church_options['vision_church_footer_copyright_left'] = isset($vision_church_options['vision_church_footer_copyright_left']) ? $vision_church_options['vision_church_footer_copyright_left'] : '' ;
$vision_church_options['vision_church_footer_copyright_right'] = isset($vision_church_options['vision_church_footer_copyright_right']) ? $vision_church_options['vision_church_footer_copyright_right'] : '' ;

if (has_nav_menu('footer-menu')){
	$menuParameters = array('theme_location'=>'footer-menu','container' => false,'echo' => false,'items_wrap' => '%3$s','depth' => 0,);
	$w_fb_menu = strip_tags(wp_nav_menu( $menuParameters ), '<a>' );
}
$w_fb_text_left = wp_kses( $vision_church_options['vision_church_footer_copyright_left'], vision_church_kses() );
$w_fb_text_right = wp_kses( $vision_church_options['vision_church_footer_copyright_right'], vision_church_kses() );
?>
<section class="footbot">
<div class="container">
	<div class="col-md-6">
	<div class="footer-navi">
	<?php switch ($w_fbl_type){
		case 1: echo '' . $w_fb_logo;
		break;
		case 2:	echo '' . $w_fb_menu;
		break;
		case 3:	echo '' . $w_fb_text_left;
		break;		
		case 4:	echo '<div class="socialfollow">'; get_template_part('parts/social' ); echo '</div>';
		break;
	} ?>
	</div>
	</div>
	<div class="col-md-6">
	<div class="footer-navi floatright">
	<?php switch ($w_fbr_type){
		case 1: echo '' . $w_fb_logo;
		break;
		case 2:	echo '' . $w_fb_menu;
		break;
		case 3:	echo '' . $w_fb_text_right;
		break;		
		case 4:	echo '<div class="socialfollow">'; get_template_part('parts/social' ); echo '</div>';
		break;
	} ?>
	</div>
	</div>
</div>
</section>