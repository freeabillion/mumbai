<?php

/**
 * Subtitle
 */
function vision_church_subtitle ($atts, $content = null) {
	extract( shortcode_atts( array(
		'type'				=> '1',
		'heading'			=> '4',
		'subtitle_content'	=> '',
		'subtitle_color'	=> '',
		'border_color'	=> '',
	), $atts ) );

	$border_color	= $border_color ? ' style="border-bottom-color: ' . $border_color . ';"' : '';
	$subtitle_color	= $subtitle_color ? ' style="color: ' . $subtitle_color . ';"' : '';

	$out = '
	<div class="subtitle-element subtitle-element' . $type . '"' . $border_color .'>
		<span class="before"></span>
		<h' . $heading . $subtitle_color . '>'. $subtitle_content .'</h' . $heading . '>
		<span class="after"></span>
	</div>';

	return $out;
 }
 add_shortcode('subtitle','vision_church_subtitle');


function vision_church_bigtitle2_shortcode ($atts, $content = null) {
	extract(shortcode_atts(array(
	'title'      => '',
	'bigtitle'      => '',
	
		), $atts));

	
	$out = '<h2 class="mex-title">'. $bigtitle .'</h2>';
	
	return $out;
}
add_shortcode('big_title2','vision_church_bigtitle2_shortcode');

function vision_church_title($atts, $content = null) {
	extract(shortcode_atts(array(
	'type'      => '4',

	), $atts));

	$out = '<h'.$type.'><strong>'.$content.'</strong></h'.$type.'>';
	return $out;
}
add_shortcode('title', 'vision_church_title');



/**
 * Max Title
 */
function vision_church_maxtitle_shortcode( $atts, $content = null ) {

	extract( shortcode_atts( array(
		'type'				=> '1',
		'heading'			=> '2',
		'maxtitle_content'	=> '',
		'maxtitle_color'	=> '',
	), $atts ) );

	$maxtitle_color = $maxtitle_color ? ' style="color: ' . $maxtitle_color . ';"' : '';

	$out = '
	<div class="max-title max-title' . $type . '">
		<span class="before"></span>
		<h' . $heading. $maxtitle_color . '>'. $maxtitle_content .'</h'.$heading.'>
		<span class="after"></span>
	</div>';

	return $out;
}

add_shortcode('maxtitle','vision_church_maxtitle_shortcode');