<?php
function vision_church_h1 ($attributes, $content = null) {

	extract(shortcode_atts(array(
	"class" => '',

	), $attributes));

 	return '<h1 class="'. $class .'">' . do_shortcode($content) . '</h1>';
 }
 add_shortcode('h1','vision_church_h1');
 
 function vision_church_h2 ($attributes, $content = null) {

	extract(shortcode_atts(array(
	"class" => '',

	), $attributes));

 	return '<h2 class="'. $class .'">' . do_shortcode($content) . '</h2>';
 }
 add_shortcode('h2','vision_church_h2');
 
 function vision_church_h3 ($attributes, $content = null) {

	extract(shortcode_atts(array(
	"class" => '',

	), $attributes));

 	return '<h3 class="'. $class .'">' . do_shortcode($content) . '</h3>';
 }
 add_shortcode('h3','vision_church_h3');
 
 function vision_church_h4 ($attributes, $content = null) {

	extract(shortcode_atts(array(
	"class" => '',

	), $attributes));

 	return '<h4 class="'. $class .'">' . do_shortcode($content) . '</h4>';
 }
 add_shortcode('h4','vision_church_h4');
 
 function vision_church_h5 ($attributes, $content = null) {

	extract(shortcode_atts(array(
	"class" => '',

	), $attributes));

 	return '<h5 class="'. $class .'">' . do_shortcode($content) . '</h5>';
 }
 add_shortcode('h5','vision_church_h5');
 
 function vision_church_h6 ($attributes, $content = null) {

	extract(shortcode_atts(array(
	"class" => '',

	), $attributes));

 	return '<h6 class="'. $class .'">' . do_shortcode($content) . '</h6>';
 }
 add_shortcode('h6','vision_church_h6');
 
 
 function vision_church_strong ($attributes, $content = null) {

	extract(shortcode_atts(array(
	"class" => '',

	), $attributes));

 	return '<strong class="'. $class .'">' . do_shortcode($content) . '</strong>';
 }
 add_shortcode('strong','vision_church_strong');
 
 function vision_church_br ($attributes, $content = null) {

	extract(shortcode_atts(array(
	"class" => '',

	), $attributes));

 	return '<br class="'. $class .'">';
 }
 add_shortcode('br','vision_church_br');
 
  function vision_church_div ($attributes, $content = null) {

	extract(shortcode_atts(array(
	"class" => '',

	), $attributes));

 	return '<div class="'. $class .'">'.do_shortcode($content). '</div>';
 }
 add_shortcode('div','vision_church_div');
 ?>