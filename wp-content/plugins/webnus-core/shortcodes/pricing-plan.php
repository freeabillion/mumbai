<?php
function vision_church_pricing_plan( $atts, $content = null ) {
	extract(shortcode_atts( array(
		'type' 			=> '1',
		'flag' 			=> 'none',
		'title' 		=> '',
		'text_content'	=> '',
		'features'		=> '',
		'price' 		=> '',
		'link_text'		=> '',
		'link_url'		=> '',
	), $atts ));

	$title = $title ? '<h4>'. esc_html($title) .'</h4>' : '' ;
	$text_content = $text_content ? '<p>'. $text_content .'</p>' : '' ;
	$price = $price ? '<h4>'. esc_html($price) .'</h4>'  : '' ;
	$link_text = $link_text ? '<a href="'. esc_url($link_url) .'" class="readmore">'. esc_html($link_text) .'</a>' : '' ;

	if ($type == 1) {
		$out = '
		<div class="pricing-plan'. esc_html( $type ) .'">
		 	<div class="ppheader"> ' . $title . $text_content . ' </div>
			<div class="ppfooter"> ' . $price . $link_text . ' </div> 
		</div>';
	}
	elseif ($type == 2) {
		// features loop
		$features		= (array) vc_param_group_parse_atts( $features );
		$features_data	= array();
		foreach ( $features as $data ) :
			$new_line 					= $data;
			$new_line['feature_icon']	= isset( $data['feature_icon'] ) ? $data['feature_icon'] : '';
			$new_line['feature_item']	= isset( $data['feature_item'] ) ? $data['feature_item'] : '';
			$features_data[] 			= $new_line;
		endforeach;

		$features_out = '<ul class="ppfeatures">';
			foreach ( $features_data as $line ) :
				$features_out .= '<li class="feature-item"><span class="feature-icon ' . esc_html( $line['feature_icon'] ) . '"></span>' . esc_html( $line['feature_item'] ) . '</li>';
			endforeach;
		$features_out .= '</ul>';

		$flag = ( $flag != 'none' ) ? '<div class="ppflag">' . $flag . '</div>' : '';

		$out = '
		<div class="pricing-plan'. esc_html( $type ) .'">
			' . $flag . '
		 	<div class="ppheader"> ' . $title . $features_out . ' </div>
			<div class="ppfooter"> ' . $price . $link_text . ' </div> 
		</div>';
	}

	
	return $out;
}
add_shortcode( 'pricing-plan','vision_church_pricing_plan' );