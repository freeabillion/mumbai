<?php
function vision_church_services ( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'type'						=> '1',
		'service_single_title'		=> '',
		'bgcolor'					=> '',
		'service_single_content'	=> '',
		'icon_name'					=> '',
		'carousel_item'				=> '',
		'item_carousle'				=> '3',
	), $atts ));


	if ( $type == '1' ){
		// Fetch Carousle Item Loop Variables
		$carousel_item = (array) vc_param_group_parse_atts( $carousel_item );
		$carousel_item_data = array();

		foreach ( $carousel_item as $data ) {
			$new_line 						= $data;
			$new_line['service_icon'] 		= isset( $new_line['service_icon'] )	? $new_line['service_icon']: '';
			$new_line['service_title'] 		= isset( $new_line['service_title'] )	? $new_line['service_title']: '';
			$new_line['service_content'] 	= isset( $new_line['service_content'] )	? $new_line['service_content']: '';
			$new_line['service_image'] 		= isset( $new_line['service_image'] )	? $new_line['service_image']: '';
			$carousel_item_data[]			= $new_line;
		}

		// Render
		$out = '
			<div class="clearfix">
				<div class="container">
					<div class="our-service-carousel-wrap owl-carousel owl-theme" data-items="' . $item_carousle . '" >';
						foreach ( $carousel_item_data as $line ) :

						$line['service_image'] 			= is_numeric( $line['service_image'] ) ? wp_get_attachment_url( $line['service_image'] ) : $line['service_image'];
						$line['service_image'] 			= $line['service_image'] 	? '<img src="' . $line['service_image'] . '" alt="' . $line['service_title'] . '">' : '' ;
						$line['service_icon'] 			= $line['service_icon'] 	? '<i class="' . $line['service_icon'] . '"></i>' : '' ;
						$line['service_title'] 			= $line['service_title'] 	? '<h2>' . $line['service_title'] . '</h2>' : '' ;
						$line['service_content'] 		= $line['service_content'] 	? '<p>' . $line['service_content'] . '</p>' : '' ;

						$out .='
						<div class="services-carousel">
							' . $line['service_image'] . '
							<div class="tdetail">
								' . $line['service_icon'] . $line['service_title'] . $line['service_content'] . '
							</div>
						</div>';
						endforeach;
		$out .='
			</div>
				</div>
					</div>';
	}

	if ( $type == '2' ){
		$service_single_title = ( $service_single_title ) ? '<h3>' . $service_single_title . '</h3>' : '' ;
		$background = ( $bgcolor ) ? 'style="background-color:'.$bgcolor.'"' : '' ;
		$service_single_content = wpb_js_remove_wpautop($service_single_content, true);
		$service_main_content = ( $service_single_content ) ? '<div class="extra-content">' . $service_single_content . '  <div class="close-toggle"><i class="ti-minus"></i></div> </div>' : '';
		$out = '
			<div class="suite-toggle" ' . $background . ' >
				<div class="main-content">
					'. $service_single_title . '
					<div class="service-icon">
						<i class="sl-trophy"></i>
					</div>
				</div>
				<div class="toggle-content">
					' . $service_main_content . '
					<span><i class="ti-plus" style="color:'.$bgcolor.'"></i></span>
				</div>
			</div>
		';
	}

	return $out;

}
	add_shortcode( 'services','vision_church_services' );