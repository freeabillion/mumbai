<?php

 // Lists (ul li)
 function vision_church_list( $atts, $content = null ) {
 	extract(shortcode_atts(array(
 	'type'      => 'plus',

 	), $atts));
 	return '<ul class="'. $type . '" >' . do_shortcode($content) . '</ul>';
 }
 add_shortcode('ul', 'vision_church_list');

 function vision_church_list_item( $atts, $content = null ) {
 	extract(shortcode_atts(array(
 	'type'      => '',

 	), $atts));
	return '<li class="'. $type .'">' . do_shortcode($content) . '</li>';
 }
 add_shortcode('li', 'vision_church_list_item');

?>