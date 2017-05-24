<?php
function vision_church_toggle_box ( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'type'						=> '',
		'service_single_title'		=> '',
		'bgcolor'					=> '',
		'service_single_content'	=> '',
		'icon_name'					=> '',
		'offers_subtitle'			=> '',
		'offers_title'				=> '',
		'background_image'			=> '',
		'bgcolor'					=> '',
		'open'						=> 'true',
		'offers_content'			=> '',
		'icon_name'					=> '',
		'min_height'				=> '',
	), $atts ));

	$type = ( $type ) ? $type : '1' ;
	if ( $type == 1 ) {
		$service_single_title = ( $service_single_title ) ? '<h3>' . $service_single_title . '</h3>' : '' ;
		$background = ( $bgcolor ) ? 'style="background-color:'.$bgcolor.'"' : '' ;
		$service_single_content = wpb_js_remove_wpautop($service_single_content, true);
		$service_main_content = ( $service_single_content ) ? '<div class="extra-content">' . $service_single_content . ' </div>' : '';
		$out = '
		<div class="suite-toggle" ' . $background . ' >
			<div class="main-content">
				'. $service_single_title . '
				<div class="service-icon">
					<i class="'.$icon_name.'"></i>
				</div>
			</div>
			<div class="toggle-content">
				' . $service_main_content . '
				<span><i class="ti-plus" style="color:'.$bgcolor.'"></i></span>
			</div>
		</div>';

		return $out;

	} else {
		$min_height				= ( $min_height ) ? ' min-height:'. $min_height .'px;' : '' ;
		$open					= ( $open ) ? 'true' : 'false';
		$hide_content			= ( $open == "true" ) ? '' : 'w-hide' ;
		$plus_minus				= ( $open == "true" ) ? 'minus' : 'plus' ;
		$icon					= ( $icon_name ) ? '<div class="offer-icon"><i class="'. $icon_name .'"></i></div>' : '' ;
		$offers_subtitle 		= ( $offers_subtitle ) ? '<h4>' . $offers_subtitle . '</h4>' : '' ;
		$offers_title 	 		= ( $offers_title ) ? '<h3>' . $offers_title . '</h3>' : '' ;
		$background_color 		= ( $bgcolor ) ? ' background-color:' . $bgcolor . ';' : '' ;
		$background_image_url 	= ( $background_image ) ? wp_get_attachment_url( $background_image ) : '' ;
		$background_image 	 	= ( $background_image_url ) ? "background: url('{$background_image_url}') no-repeat center center; background-size: cover;" : '' ;
		$background 			= ( $background_image_url || $background_color ) ? 'style="' . $min_height . $background_color . $background_image . '"'  : '' ;
		$plus_icon 				= ( $offers_content ) ? '<span class="toogle-plus"><i class="ti-'. $plus_minus .'"></i></span>' : '' ;
		$offers_content 		= ( $offers_content ) ? wpb_js_remove_wpautop($offers_content, true) : '' ;
		$offers_main_content	= ( $offers_content ) ? '<div class="extra-content">' . $offers_content . '</div>' : '';
		$out = '
		<div class="offer-toggle" ' . $background . ' >
			<figure>
				<div class="main-content">
					' . $icon . '
					' . $offers_subtitle . '
					' . $offers_title . '
					' . $plus_icon . '
					<div class="toggle-content  '. $hide_content . '">
						' . $offers_main_content . '
					</div>
				</div>
			</figure>
		</div>';
		return $out;
	}

}
	add_shortcode( 'toggle_box','vision_church_toggle_box' );