<?php
function vision_church_highlight1 ($atts, $content = null) {

 	return '<span class="highlight1">' . do_shortcode($content) . '</span>';
 }
 add_shortcode('highlight1','vision_church_highlight1');

 function vision_church_highlight2 ($atts, $content = null) {

 	return '<span class="highlight2">' . do_shortcode($content) . '</span>';
 }
 add_shortcode('highlight2','vision_church_highlight2');

 function vision_church_highlight3 ($atts, $content = null) {

 	return '<span class="highlight3">' . do_shortcode($content) . '</span>';
 }
 add_shortcode('highlight3','vision_church_highlight3');

 function vision_church_highlight4 ($atts, $content = null) {

 	return '<span class="highlight4">' . do_shortcode($content) . '</span>';
 }
 add_shortcode('highlight4','vision_church_highlight4');
 
 
 function vision_church_highlight( $atts, $content = null ) {
 	extract( shortcode_atts( array(
 	'type' => '1', 
 	
 	), $atts ) );
	return '<span class="highlight'.$type.'">' . do_shortcode($content) . '</span>';
}
 add_shortcode('highlight','vision_church_highlight');
?>