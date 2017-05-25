<?php
function vision_church_pricing_tables( $attributes, $content = null ) {
	extract( shortcode_atts( array(
		'type'				=> '1',
		'title'				=> '',
		'description'		=> '',
		'price_symbol'		=> '$',
		'price'				=> '$10',
		'on_sale_price'		=> '',
		'plan_label'		=> '',
		'label_bg_color'	=> '',
		'period'			=> 'Month',
		'features'			=> '',
		'footer_text'		=> '',
		'button_text'		=> '',
		'button_url'  		=> '',
		'featured'  		=> '',
		'icon'				=> '',
		'heading_bg_color'	=> '',
		'heading_text_color'=> '',
	), $attributes ) );

	// variables
	$featured 	 = $featured ? ' featured' : '';
	$footer_text = $footer_text ? '<p>' . $footer_text . '</p>' : '';
	if ( $on_sale_price ) :
		$temp_price		= $price;
		$price			= $on_sale_price;
		$on_sale_price	= '<h5>' . $temp_price . '</h5>';
	endif;
	if ( $type != '6' ) : 
		$period = $period ? '<small>/' . esc_html( $period ) . '</small>' : '';
	else :
		$period = $period ? $period : '';
	endif;


	// features loop
	$features_out	= '';
	$features		= (array) vc_param_group_parse_atts( $features );
	$features_data	= array();
	foreach ( $features as $data ) :
		$new_line 					= $data;
		$new_line['feature_icon']	= isset( $data['feature_icon'] ) ? $data['feature_icon'] : '';
		$new_line['feature_item']	= isset( $data['feature_item'] ) ? $data['feature_item'] : '';
		$features_data[] 			= $new_line;
	endforeach;
	$features_out .= '<ul class="pt-features">';
		foreach ( $features_data as $line ) :
			$features_out .= '<li class="feature-item"><span class="feature-icon ' . esc_html( $line['feature_icon'] ) . '"></span>' . esc_html( $line['feature_item'] ) . '</li>';
		endforeach;
	$features_out .= '</ul>';

	// footer cache
	$footer_out = '
	<div class="pt-footer">
		' . $footer_text . '
		<a href="' . esc_url( $button_url ) . '" class="magicmore">' . esc_html( $button_text ) . '</a>
	</div>';

	// type6
	$pt6_color = $heading_text_color ? ' style="color: ' . $heading_text_color . ';"' : '';

	$pt6_bg_color = $pt6_bg_border = '';
	if ( $heading_bg_color ) :
		$pt6_bg_color = ' style="background-color: ' . $heading_bg_color . ';"';
		$pt6_bg_border = ' style="border-color: ' . $heading_bg_color . ';"';
	endif;


	// render
	$out = '<div class="w-pricing-table pt-type' . esc_html( $type ) . esc_html( $featured ) . '"' . $pt6_bg_border . '>';

		switch ( $type ) :
			case '1':
			case '3':
			case '7':
				$plan_label	  = ( $type == 3 && $plan_label ) ? '<span>' . $plan_label . '</span>' : '';
				$price_symbol = ( $type == 7 && $price_symbol ) ? '<span class="price-symbol">' . esc_html( $price_symbol ) . '</span>': '';
				$out .= '
				<div class="pt-header">
					<h3 class="plan-title">' . esc_html( $title ) . '</h3>
					<h4 class="plan-price">' . $price_symbol . '<span>' . esc_html( $price ) . '</span>' . $period . '</h4>
					' . $on_sale_price . '
				</div>
				' . $plan_label . '
				' . $features_out . '
				' . $footer_out . '';
			break;

			case '2':
				$out .= '
				<span class="icon vc_icon_element-icon ' . $icon . '"></span>
				<h3 class="plan-title">' . esc_html( $title ) . '</h3>
				' . $features_out . '
				<h4 class="pt-price"><span>' . esc_html( $price ) . '</span>' . $period . '</h4>
				' . $on_sale_price . '
				' . $footer_out . '';
			break;

			case '4':
				$out .= '
				<div class="pt-header">
					<h3 class="plan-title">' . esc_html( $title ) . '</h3>
					<h6 class="plan-desc">' . esc_html( $description ) . '</h6>
				</div>
				' . $features_out . '
				<div class="pt-price">
					<h4 class="plan-price"><span>' . esc_html( $price ) . '</span>' . $period . '</h4>
					' . $on_sale_price . '
				</div>
				' . $footer_out . '';
			break;

			case '5':
				$label_bg_color = $label_bg_color ? ' style="background: ' . $label_bg_color . ';"' : '';
				$plan_label  = $plan_label ? '<span' . $label_bg_color . '>' . $plan_label . '</span>' : '';
				$out .= '
				<div class="pt-header">
					' . $plan_label . '
					<h3 class="plan-title">' . esc_html( $title ) . '</h3>
					<h4 class="plan-price"><span>' . esc_html( $price ) . '</span>' . $period . '</h4>
					' . $on_sale_price . '
				</div>
				' . $features_out . '
				' . $footer_out . '';
			break;

			case '6':
				$out .= '
				<div class="pt-header"' . $pt6_bg_color . '>
					<h3 class="plan-title"' . $pt6_color . '>' . esc_html( $title ) . '</h3>
					<h4 class="plan-price"'. $pt6_color .'><span>' . esc_html( $price ) . '</span><small' . $pt6_color . '>/' . esc_html( $period ) . '</small></h4>
					' . $on_sale_price . '
				</div>
				' . $features_out . '
				' . $footer_out . '';
			break;
		endswitch;

	$out .= '</div>';


	return $out;
}

add_shortcode('pricing-tables', 'vision_church_pricing_tables');