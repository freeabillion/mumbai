<?php
function  vision_church_buy_process_shortcode( $attributes, $content ) {
	extract( shortcode_atts( array(
		'process_item'	 => '',
		'bg_color'		 => '',
	), $attributes ) );

	// process_item loop
	$process_item		= (array) vc_param_group_parse_atts( $process_item );
	$process_item_data	= array();
	foreach ( $process_item as $data ) :
		$new_line 						= $data;
		$new_line['process_title']		= isset( $data['process_title'] ) ? $data['process_title'] : '';
		$new_line['process_content']	= isset( $data['process_content'] ) ? $data['process_content'] : '';
		$new_line['icon_fontawesome']	= isset( $data['icon_fontawesome'] ) ? $data['icon_fontawesome'] : 'fa fa-adjust';
		$new_line['line_flag']			= isset( $data['line_flag'] ) ? $data['line_flag'] : '';
		$new_line['process_style']		= isset( $data['process_style'] ) && $data['process_style'] == 'featured' ? ' ' . $data['process_style'] : '';
		$process_item_data[]			= $new_line;
	endforeach;

	// bg color
	$bg_color = $bg_color ? ' style="background-color: ' . $bg_color . ';"' : '';

	// render
	$out  = '
	<div class="buy-process-wrap"' . $bg_color . '>
		<div class="buy-process-items">';
			foreach ( $process_item_data as $line ) :
				$out .= '
				<div class="buy-process-item' . $line['process_style'] . '">
					<div class="text-wrap">
						<h4>' . $line['process_title'] . '</h4>
						<p>' . $line['process_content'] . '</p>
					</div>
					<span>' . $line['line_flag'] . '</span>
					<div class="icon-wrapper">
						<i class="' . esc_attr( $line['icon_fontawesome'] ) . '"></i>
					</div>
				</div>';
			endforeach;
	$out .= '
		</div>
	</div>';

	return $out;
}

add_shortcode( 'buy_process', 'vision_church_buy_process_shortcode' );