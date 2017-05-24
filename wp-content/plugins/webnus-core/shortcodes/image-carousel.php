<?php
function vision_church_image_carousel ( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'image_item'		=> '',
		'item_carousle'		=> '',
		'image'				=> '',
	), $atts ));


		// Fetch Carousle Item Loop Variables
		$image_item = (array) vc_param_group_parse_atts( $image_item );
		$image_item_data = array();

		foreach ( $image_item as $data ) {
			$new_line 						= $data;
			$new_line['image'] 		= isset( $new_line['image'] )	? $new_line['image']: '';
			$image_item_data[]			= $new_line;
		}
		$item_carousle = $item_carousle ? $item_carousle : '3' ;
		// Render
		$out = '
			<div class="clearfix">
				<div class="container">
					<div class="w-image-carousel owl-carousel owl-theme" data-items="' . $item_carousle . '" >';
						foreach ( $image_item_data as $line ) {
							$image_info = is_numeric( $line['image'] ) ? wp_get_attachment_metadata( $line['image'] ) : '';
							$line['image']	= is_numeric( $line['image'] ) ? wp_get_attachment_url( $line['image'] ) : $line['image'];
							$line['image']	= $line['image'] 	? '<img src="' . $line['image'] . '" alt="'.$image_info['file'].'">' : '' ;

							$out .='
							<div class="services-carousel">
								' . $line['image'] . '
							</div>';
						}
		$out .='
					</div>
				</div>
			</div>';

	return $out;

}
	add_shortcode( 'imagecarousel','vision_church_image_carousel' );