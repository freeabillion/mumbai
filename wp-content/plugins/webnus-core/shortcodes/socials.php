<?php
function vision_church_socials( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'show_social'	=> '',
	), $atts ));
	ob_start();

	echo '
		<div class="socialfollow wn-social-network">
			<div class="social-main-content">';
		get_template_part('parts/social' );
	echo '
			</div>
		</div>';

	$out = ob_get_contents();
	ob_end_clean();
	return $out;

}
add_shortcode( 'webnus-socials','vision_church_socials' );