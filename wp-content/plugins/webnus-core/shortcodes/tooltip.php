<?php
function vision_church_tooltips ($atts, $content = null) {
	extract(shortcode_atts(array(
		'tooltiptext'		=> 'Tooltip Text',
		'tooltip_content'	=> '',
		'tooltip_link'		=> '',
	), $atts));

	$out = '<span class="tooltips"><a href="' . $tooltip_link . '" rel="help" title="' .$tooltiptext. '">';
	$out .= $tooltip_content;
	$out .= '</a></span>';
	
	return $out;
}
add_shortcode('tooltip','vision_church_tooltips');
