<?php
function vision_church_icon ($atts, $content = null) {
	extract(shortcode_atts(array(
		'name'			=>	'',
		'link'      	=>	'',
		'link_class'    =>	'',
		'size'			=>	'',
		'color'			=>	'',
		'padding' => '',
		'bg_color' => '',
		'border_radius' => '',
		'el_class' => '',
	), $atts));

	$style = 'style="';
	if( $size )  $style .= ' font-size:' . $size. ';';
	if( $color ) $style .= ' color:' . $color. ';';
	if( $bg_color ) $style .= ' background-color:' . $bg_color. ';';
	if( $padding ) $style .= ' padding:' . $padding. ';';
	if( $border_radius ) $style .= ' border-radius:' . $border_radius. ';';
	
	
	$style .= '"';			
				
	if(!empty($link)){
	 $out = '<a href="'. esc_url($link) .'" class="'. $link_class .'"><i class="'. $name .'" '.$style.'></i></a>';
	}
	else{
	 $out = '<i class="'. $name .'" '.$style.'></i>';
	}
	return $out;
}
add_shortcode('icon','vision_church_icon');
?>