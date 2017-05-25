<?php
function vision_church_tpt( $attributes, $content = null ) {

	extract(shortcode_atts(array(
		'type'						=> '1',
		'top_title'					=> '',
		'top_title_color'			=> '',
		'top_title_part_1'			=> '',
		'top_title_part_2'			=> '',
		'top_title_part_1_color'	=> '',
		'top_title_part_2_color'	=> '',
		'top_title_2'				=> '',
		'main_title'				=> '',
		'text_content'				=> '',
		'align'						=> '',
	), $attributes));
	ob_start();
	$align		= ($align) ? $align : '';
	$style_1	= ($top_title_part_1_color) ? 'style="color:'.$top_title_part_1_color.'"': '';
	$style_2	= ($top_title_part_2_color) ? 'style="color:'.$top_title_part_2_color.'"': '';
	$style_3	= ($top_title_color) ? 'style="color:'.$top_title_color.'"': '';

	echo '<article class="title-plus-text type-'.$type.' '.$align.' ">';
	if ( $type == '1' || $type == '3' ) {
		echo ( $top_title ) ? '<h3 '.$style_3.'><span class="before"></span>'.$top_title.'<span class="after"></span></h3>' : '';
		echo ( $top_title_part_1 ) ? '<h2 class="part-1"' .$style_1.'>'.$top_title_part_1.'</h2>' : '';
		echo ( $top_title_part_2 ) ? '<h2 class="part-2"' .$style_2.'>'.$top_title_part_2.'</h2>' : '';
		echo ( $text_content ) ? '<p>'.$text_content.'</p>' : '';
	}else{
		echo ($top_title_2) ? '<h3>'.$top_title_2.'</h3>' : '';
		echo ($main_title) ? '<h2>'.$main_title.'</h2>' : '';
	}
	echo '</article>';

	$out = ob_get_contents();
	ob_end_clean();
	$out = str_replace('<p></p>','',$out);
	return $out;
}
add_shortcode('title_p_text', 'vision_church_tpt');