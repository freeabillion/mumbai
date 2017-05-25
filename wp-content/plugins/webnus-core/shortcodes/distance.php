<?php


 // distance (horizonal-space)
 function vision_church_distance1 ($atts, $content = null) {

 	return '<hr class="vertical-space1">';
 }
 add_shortcode('distance1','vision_church_distance1');
 
 function vision_church_distance2 ($atts, $content = null) {

 	return '<hr class="vertical-space2">';
 }
 add_shortcode('distance2','vision_church_distance2');
 
  function vision_church_distance3 ($atts, $content = null) {

 	return '<hr class="vertical-space3">';
 }
 add_shortcode('distance3','vision_church_distance3');

  function vision_church_distance4 ($atts, $content = null) {

 	return '<hr class="vertical-space4">';
 }
 add_shortcode('distance4','vision_church_distance4');

 
  function vision_church_distance ($atts, $content = null) {
	extract(shortcode_atts(array(
 	'type'      => '1'
						), $atts));
 	return ($type >0 )? '<hr class="vertical-space'.$type.'">': '<div class="null"></div>';
 }
 add_shortcode('distance','vision_church_distance');
 
?>