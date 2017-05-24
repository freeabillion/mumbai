<?php

function vision_church_onethird( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	'last'  => null,
 	), $attributes));
	
	$out = '<div class="col-md-4">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('one_third', 'vision_church_onethird');
 
 
function vision_church_onehalf( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	'last'  => null,
 	), $attributes));
	
	$out = '<div class="col-md-6">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('one_half', 'vision_church_onehalf');

 
 
function vision_church_twothird( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	'last'  => null,
 	), $attributes));
	
	$out = '<div class="col-md-8">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('two_third', 'vision_church_twothird');
 
 
 
 
function vision_church_onefourth( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	'last'  => null,
 	), $attributes));
	
	$out = '<div class="col-md-3">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('one_fourth', 'vision_church_onefourth');
 
 
 
function vision_church_onesixth( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	'last'  => null,
 	), $attributes));
	
	$out = '<div class="col-md-2">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('one_sixth', 'vision_church_onesixth');
 
 function vision_church_onetwelfth( $attributes, $content = null ) {

	extract(shortcode_atts(array(
 	'last'  => null,
 	), $attributes));
	
	$out = '<div class="col-md-1">';
	$out .= do_shortcode($content);
	$out .= '</div>';
			
	return $out;
}
 add_shortcode('one_twelfth', 'vision_church_onetwelfth');
 
?>