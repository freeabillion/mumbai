<?php
function  vision_church_our_process_shortcode( $attributes, $content ) {
	extract( shortcode_atts( array(
		'process_item' => '',
	), $attributes ) );

	// process_item loop
	$process_item		= (array) vc_param_group_parse_atts( $process_item );
	$process_item_data	= array();
	foreach ( $process_item as $data ) :
		$new_line 						= $data;
		$new_line['process_title']		= isset( $data['process_title'] ) ? $data['process_title'] : '';
		$new_line['process_content']	= isset( $data['process_content'] ) ? $data['process_content'] : '';
		$new_line['icon_fontawesome']	= isset( $data['icon_fontawesome'] ) ? $data['icon_fontawesome'] : 'fa fa-adjust';
		$process_item_data[]			= $new_line;
	endforeach;

	// render
	$out  = '<div class="our-process-wrap">';
		foreach ( $process_item_data as $line ) :
			// Enqueue needed icon font
			vc_icon_element_fonts_enqueue( 'fontawesome' );
			$out .= '
				<div class="our-process-item ">
					<i class="' . esc_attr( $line['icon_fontawesome'] ) . '"></i>
					<h4>' . $line['process_title'] . '</h4>
					<p>' . $line['process_content'] . '</p>
				</div>';
		endforeach;
	$out .= '</div>';

	return $out;
}

add_shortcode( 'our_process', 'vision_church_our_process_shortcode' );