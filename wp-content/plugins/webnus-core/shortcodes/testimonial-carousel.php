<?php
function vision_church_testimonial_carousel( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'testimonial_item'	=> '',
		'items'				=> '3',
		'type'				=> '1',
	), $atts));

	// testimonial_item loop
	$testimonial_item		= (array) vc_param_group_parse_atts( $testimonial_item );
	$testimonial_item_data	= array();
	foreach ( $testimonial_item as $data ) :
		if( isset( $data['img'] ) && is_numeric( $data['img'] ) )
			$data['img'] = wp_get_attachment_url( $data['img'] );
		// crop image if thumbnail is set
		if ( $data['thumbnail'] ) {
			// if main class not exist get it
			if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
				require_once WEBNUS_CORE_DIR .'shortcodes/classes/class_webnus_manuplate.php';
			}

			$patt = array ( '0'  => 'x', '1'  => '*' );

			$arr = explode( chr( 1 ), str_replace( $patt, chr( 1 ), $thumbnail ) ); // get width and height

			$image = new Wn_Img_Maniuplate; // instance from settor class

			$data['img'] = $image->m_image( $data['img'] , $arr['0'] , $arr['1'] ); // set required and get result
		}

		$new_line 				= $data;
		$new_line['img']		= isset( $data['img'] ) ? '<img src="' . esc_url( $data['img'] ) . '" alt="' . $data['name'] . '">' : '';
		$new_line['tc_content']	= isset( $data['tc_content'] ) ? '<p class="tc-content">' . esc_html( $data['tc_content'] ) . '</p>' : '';
		$new_line['name']		= isset( $data['name'] ) ? '<p class="tc-name">' . esc_html( $data['name'] ) . '</p>' : '';
		$new_line['job']		= isset( $data['job'] ) ? '<p class="tc-job">' . esc_html( $data['job'] ) . '</p>' : '';
		$new_line['thumbnail'] 	= isset( $data['thumbnail'] )	? $data['thumbnail']: '';
		$testimonial_item_data[]= $new_line;
	endforeach;

	// render
	if ( $type == '1' ) { 

		$out = '<div class="testimonial-carousel testi-carou-' . $type . '">';
			$out .= '<div class="testimonial-owl-carousel owl-carousel owl-theme" data-testimonial_count="' . $items . '">';
				foreach ( $testimonial_item_data as $line ) :
					$out .= '<div class="tc-item">' . $line['img'] . $line['tc_content'] . $line['name'] . $line['job'] . '</div>';
				endforeach;
			$out .= '</div>';
		$out .= '</div>';

	} if ( $type == '2' ) {

		$out = '<div class="testimonial-carousel testi-carou-' . $type . '">';
			$out .= '<div class="testimonial-owl-carousel owl-carousel owl-theme" data-testimonial_count="' . $items . '">';
				foreach ( $testimonial_item_data as $line ) :
					$out .= '<div class="tc-item">
								' . $line['tc_content'] . '
								<div class="t-m-footer">'. $line['img'] . $line['name'] . $line['job'] . '</div>
							</div>';
				endforeach;
			$out .= '</div>';
		$out .= '</div>';

	} if ( $type == '3' ) {

		$out = '<div class="testimonial-carousel testi-carou-' . $type . '">';
			$out .= '<div class="testimonial-owl-carousel owl-carousel owl-theme" data-testimonial_count="' . $items . '">';
				foreach ( $testimonial_item_data as $line ) :
					$out .= '<div class="tc-item">
								' . $line['img'] . '
								<div class="main-content">
									' . $line['name'] . $line['job'] . '
									<div class="t-m-footer"> ' . $line['tc_content'] . ' </div>
								</div>
								
							</div>';
				endforeach;
			$out .= '</div>';
		$out .= '</div>';

	}
	return $out;
}

add_shortcode( 'testimonial-carousel', 'vision_church_testimonial_carousel' );