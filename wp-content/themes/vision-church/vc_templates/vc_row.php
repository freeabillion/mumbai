<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

//Main Parameters
$output = '';
extract(shortcode_atts(array(
	// General
	'full_height'			=> '',
	'dec_full_height'		=> '',
	'columns_placement'		=> 'top',
	'row_height'			=> '',
	'gap'					=> '',
	'row_pattern'			=> '',
	'row_pattern_color'		=> '',
	'content_placement'		=> '',
	'row_dark'				=> '',
	'equal_height'			=> '',
	'align_center'			=> '',
	'r_margin_bottom'		=> '',
	'disable_element'		=> '',
	'layer_animation'		=> '',
	// bg image
	'wn_bg_image'			=> '',
	'wn_bg_color'			=> '',
	'bg_position'			=> 'center center',
	'bg_repeat'				=> 'no-repeat',
	'bg_cover'				=> 'yes',
	'bg_attachment'			=> '',
	'wn_parallax'			=> '',
	'wn_parallax_speed'		=> '190',
	'responsive_bg_none'	=> '',
	// bg video
	'video_bg_source'		=> 'youtube',
	'video_bg_url'			=> '',
	'mp4_format'			=> '',
	'webm_format'			=> '',
	'ogg_format'			=> '',
	'video_mute'			=> 'muted',
	// styling
	'css'					=> '',
	// Animation
	'css_animation'			=> '',
	// ID and Extra Classes
	'el_id'					=> '',
	'el_class'				=> '',
), $atts));

wp_enqueue_script( 'wpb_composer_front_js' );
$el_class = $this->getExtraClass( $el_class ) . $this->getCSSAnimation( $css_animation );

// Added Parameters
$wn_style = $video_host = $has_video_bg = '';
$row_dark = ( $row_dark ) ? 'blox dark' : '' ;
$layer_animation = ( $layer_animation ) ? 'wn-layer-anim' : '' ;

// Row Height Style
if ( $row_height ){
	$w_height = ltrim ($row_height);
	if(substr($w_height,-2,2)=="px")
		$wn_style .= " min-height: {$w_height}; ";
	else
		$wn_style .= " min-height: {$w_height}px; ";
}

// Pattern Overlay
$pattern = '';
if ( $row_pattern_color ) {
	$color_overlay = $row_pattern_color ? 'style="background-color:' . $row_pattern_color . ';"' : '' ;
	$pattern =	'<div class="max-overlay" '. $color_overlay .'></div>';
}

$css_classes = array(
	'vc_row',
	'wpb_row',
	//deprecated
	'vc_row-fluid',
	$el_class,
	// Webnus Classes
	$row_pattern,
	$responsive_bg_none,
	$align_center,
	$row_dark,
	$layer_animation,
	vc_shortcode_custom_css_class( $css ),
);

if ( 'yes' === $disable_element ) {
	if ( vc_is_page_editable() ) {
		$css_classes[] = 'vc_hidden-lg vc_hidden-xs vc_hidden-sm vc_hidden-md';
	} else {
		return '';
	}
}

if ( ! empty( $atts['gap'] ) ) {
	$css_classes[] = 'vc_column-gap-' . $atts['gap'];
}

$wrapper_attributes = array();
// build attributes for wrapper
if ( ! empty( $el_id ) ) {
	$wrapper_attributes[] = 'id="' . esc_attr( $el_id ) . '"';
}

// full height
if ( ! empty( $full_height ) ) {
	$height_val = $dec_full_height ? 'calc(100vh - ' . $dec_full_height . ') !important' : '100vh !important' ;
	$wn_style .= ' min-height: ' . $height_val . ';';
	if ( ! empty( $columns_placement ) ) {
		$flex_row = true;
		$css_classes[] = 'vc_row-o-columns-' . $columns_placement;
		if ( 'stretch' === $columns_placement ) {
			$css_classes[] = 'vc_row-o-equal-height';
		}
	}
}

if ( ! empty( $equal_height ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-equal-height';
}

if ( ! empty( $content_placement ) ) {
	$flex_row = true;
	$css_classes[] = 'vc_row-o-content-' . $content_placement;
}

if ( ! empty( $flex_row ) ) {
	$css_classes[] = 'vc_row-flex';
}

if ( ! empty( $r_margin_bottom ) ) {
	$css_classes[] = 'wn-margin-bottom0';
}

// background image
$wn_bg_image = is_numeric( $wn_bg_image ) ? wp_get_attachment_url( $wn_bg_image ) : $wn_bg_image ;
$wn_style .= $wn_bg_image ? ' background-image: url(' . $wn_bg_image . ');' : '' ;

// background color
$wn_style .= $wn_bg_color ? ' background-color: ' . $wn_bg_color . ';' : '' ;

// background position
$wn_style .= $bg_position ? ' background-position: ' . $bg_position . ';' : '' ;

// background repeat
$wn_style .= $bg_repeat ? ' background-repeat: ' . $bg_repeat . ';' : '' ;

// background cover
$wn_style .= $bg_cover ? ' background-size: cover;' : '' ;

// background attachment
$wn_style .= $bg_attachment ? ' background-attachment: fixed;' : '' ;

// background parallax
$parallax_content = '';
if ( $wn_parallax ) :
	$css_classes[] = 'wn-parallax';
	$parallax_content .= '<div class="wn-parallax-bg-holder" data-wnparallax-speed="' . $wn_parallax_speed . '"><div class="wn-parallax-bg"></div></div>';
endif;


// video background
$wn_has_video_bg = $video_bg_url || $mp4_format || $webm_format || $ogg_format ? true : false;
if ( $wn_has_video_bg ) :
	if ( ( $video_bg_source == 'host' ) & ( $mp4_format || $webm_format || $ogg_format ) ) :
		// self hosted
		$css_classes[] = 'wn_video-bg-container';
		$video_host .= '<div class="vc_video-bg vc_hidden-xs">';
		$video_host	.= '<video  loop autoplay ' . $video_mute . ' preload="auto">';
		$video_host .= ! empty( $mp4_format ) ? '<source src="' . $mp4_format . '" type="video/mp4">' : '';
		$video_host .= ! empty( $webm_format ) ? '<source src="' . $webm_format . '" type="video/webm">' : '';
		$video_host .= ! empty( $ogg_format ) ? '<source src="' . $ogg_format . '" type="video/ogg">' : '';
		$video_host .= esc_html__('Your browser does not support the video tag. I suggest you upgrade your browser.','vision-church');
		$video_host .= '</video>';
		$video_host .= '</div>';
	elseif ( ( $video_bg_source == 'youtube' ) && ! empty( $video_bg_url ) && vc_extract_youtube_id( $video_bg_url ) ) :
		// youtube
		$css_classes[] = 'vc_row vc_video-bg-container';
		wp_enqueue_script( 'vc_youtube_iframe_api_js' );
		$wrapper_attributes[] = 'data-vc-video-bg="' . esc_attr( $video_bg_url ) . '"';
	endif;
endif;

$css_class = preg_replace( '/\s+/', ' ', apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, implode( ' ', array_filter( array_unique( $css_classes ) ) ), $this->settings['base'], $atts ) );
$wrapper_attributes[] = 'class="' . esc_attr( trim( $css_class ) ) . '"';
$wn_style = ( $wn_style ) ? 'style=" ' . $wn_style . ' "' : '' ;

$output .= '<div class="container">';
$output .= '<div ' . implode( ' ', $wrapper_attributes ) . ' ' . $wn_style .'>' . $parallax_content . $video_host . $pattern;
$output .= wpb_js_remove_wpautop( $content );
$output .= '</div>';
$output .= '</div>';

echo '' . $output;
