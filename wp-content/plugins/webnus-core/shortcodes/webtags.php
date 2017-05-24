<?php
 
 
function vision_church_maxone_paragraph ($atts, $content = null) {
	extract(shortcode_atts(array(
		'class'      => ''
	), $atts));
 	return '<p class="max-p">' . do_shortcode($content) . '</p>';
 }
 add_shortcode('max-p','vision_church_maxone_paragraph');


 // Link (magicmore)
function  vision_church_magiclink_shortcode($attributes, $content = null) {

	extract(shortcode_atts(array(
	"url" => '#',
		), $attributes));

	return '<a class="magicmore" href="'. esc_url($url) .'">'. do_shortcode($content) . '</a>';
}
add_shortcode("link", 'vision_church_magiclink_shortcode');




 // Lists (ul li)
 function vision_church_ul( $atts, $content = null ) {
 	extract(shortcode_atts(array(
 	'type'      => '',

 	), $atts));
 	return '<ul class="'. $type . '" >' . do_shortcode($content) . '</ul>';
 }
 add_shortcode('list-ul', 'vision_church_ul');

 function vision_church_li( $atts, $content = null ) {
 	extract(shortcode_atts(array(
 	'type'      => '',

 	), $atts));
	return '<li class="'. $type .'">' . do_shortcode($content) . '</li>';
 }
 add_shortcode('li-row', 'vision_church_li');

 

  // Center
 function vision_church_center( $atts, $content = null ) {
 	
	return '<div class="aligncenter">' . do_shortcode($content) . '</div>';
 }
 add_shortcode('center', 'vision_church_center');


  // Span
 function vision_church_span( $atts, $content = null ) {
 	
	return '<span>' . do_shortcode($content) . '</span>';
 }
 add_shortcode('span', 'vision_church_span');


  // Row
 function vision_church_row( $atts, $content = null ) {
 	
	return '<div class="row">' . do_shortcode($content) . '</div>';
 }
 add_shortcode('row', 'vision_church_row');

 // Row
 function vision_church_container( $atts, $content = null ) {
 	
	
	return '<section class="container">' . do_shortcode($content) . '</section>';
	
 }
 add_shortcode('container', 'vision_church_container');

// Horizonal line1
 function vision_church_hr1( $atts, $content = null ) {
 	return '<hr class="vertical-space1">';
 }
 add_shortcode('line1', 'vision_church_hr1');
 
// Horizonal line2
 function vision_church_hr2( $atts, $content = null ) {
 	return '<hr class="vertical-space2">';
 }
 add_shortcode('line2', 'vision_church_hr2');
 // Clear
 function vision_church_clear( $atts, $content = null ) {
 	return '<div class="clear"></div>';
 }
 add_shortcode('clear', 'vision_church_clear');


 
  // Horizonal line
 function vision_church_hr( $atts, $content = null ) {
 	
	extract(shortcode_atts(array(
 	'type'      => '1'
						), $atts));
	return ( $type == '1')?  '<hr>' : '<hr class="boldbx">';
	
	
 }
 add_shortcode('line', 'vision_church_hr');

 
 // Horizonal line
 function vision_church_thickline( $atts, $content = null ) {
 	return '<hr class="boldbx">';
 }
 add_shortcode('tline', 'vision_church_thickline');


 // Maxone line
 function vision_church_maxline( $atts, $content = null ) {
 	return '<span class="max-line"></span>';
 }
 add_shortcode('max-line', 'vision_church_maxline');
 

 

?>