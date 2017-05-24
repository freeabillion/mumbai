<?php
if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

/**
 * Shortcode attributes
 * @var $atts
 * @var $el_class
 * @var $css_animation
 * @var $css
 * @var $content - shortcode content
 * Shortcode class
 * @var $this WPBakeryShortCode_VC_Column_text
 */

extract( shortcode_atts( array(
	// Animation Pro
	'enable_animation_pro'	=> '',
	'trigger_hook'			=> '0.4',
	'duration'				=> '100%',
	'vertical_movement'		=> '',
	'horizontal_movement'	=> '',
	'rotation'				=> '',
	'opacity'				=> '',
), $atts ) );

$el_class = $css = $css_animation = '';
$atts = vc_map_get_attributes( $this->getShortcode(), $atts );
extract( $atts );

$class_to_filter = 'wpb_text_column wpb_content_element ' . $this->getCSSAnimation( $css_animation );
$class_to_filter .= vc_shortcode_custom_css_class( $css, ' ' ) . $this->getExtraClass( $el_class );
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $this->settings['base'], $atts );

$uniqid	= uniqid();

$horizontal_movement	= $horizontal_movement ? 'x: "' . $horizontal_movement . '",' : '';
$vertical_movement		= $vertical_movement ? 'y: "' . $vertical_movement . '",' : '';
$opacity				= is_numeric( $opacity ) ? 'opacity: "' . $opacity . '",' : '';
$rotation				= $rotation ? 'rotation: "' . $rotation . '",' : '';
$script					= '';

if ( $enable_animation_pro ) :
	$script = '
		<script>
			( function( $ ) {
				$( document ).ready( function() {
					var controller = new ScrollMagic.Controller();
					new ScrollMagic.Scene({
							triggerElement: "#wpb_text_column' . $uniqid . '",
							duration: "' . $duration . '",
							triggerHook: "' . $trigger_hook . '"
						})
						.setTween( "#wpb_text_column' . $uniqid . ' .wpb_wrapper", { ' . $opacity . $rotation . $horizontal_movement . $vertical_movement . ' } )
						.addTo( controller );
				}); // end document ready
			})( jQuery );
		</script>';
endif;

echo '
	<div class="' . esc_attr( $css_class ) . '" id="wpb_text_column' . $uniqid . '">
		<div class="wpb_wrapper">
			' . wpb_js_remove_wpautop( $content, true ) . '
		</div>
	</div>
	' . $script . '
';
