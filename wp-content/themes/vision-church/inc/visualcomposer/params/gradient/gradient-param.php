<?php

add_action( 'admin_enqueue_scripts', 'vision_church_gradient_param_scripts' );
function vision_church_gradient_param_scripts() {
	// css
	wp_enqueue_style( 'vision-jquery-minicolors', get_template_directory_uri() . '/inc/visualcomposer/params/gradient/assets/css/jquery.minicolors.css' );
	// js
	wp_enqueue_script( 'vision-jquery-minicolors', get_template_directory_uri() . '/inc/visualcomposer/params/gradient/assets/js/jquery.minicolors.min.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'vision-event-drag', get_template_directory_uri() . '/inc/visualcomposer/params/gradient/assets/js/jquery.event.drag.js', array( 'jquery' ), null, true );
	wp_enqueue_script( 'vision-radass', get_template_directory_uri() . '/inc/visualcomposer/params/gradient/assets/js/radass.js', array( 'jquery' ), null, true );
}


vc_add_shortcode_param( 'wn_gradient', 'vision_church_gradient_param' );
function vision_church_gradient_param( $settings, $value ) {

	$type		= isset( $settings['type'] ) ? $settings['type'] : '';
	$param_name	= isset( $settings['param_name'] ) ? $settings['param_name'] : '';
	$uniqid		= uniqid();

	$out = '
	<div class="wn-gradient-wrap" style="position: relative; height: 114px; width: 100%;">
		<div class="wn-gradient" data-uniqid="' . $uniqid . '" style="position: absolute; top: 13px; left: 30px;">
			<div class="wn-gradient-creater" data-uniqid="' . $uniqid . '"></div>
			<input
				type="hidden"
				name="' . esc_attr( $param_name ) . '"
				id="wn-gradient-val' . $uniqid . '"
				class="wpb_vc_param_value wn-gradient-input ' . esc_attr( $param_name ) . ' ' . esc_attr( $type ) . '"
				value="' . esc_attr( $value ) . '"
				data-uniqid="' . $uniqid . '"
			>
		</div>
	</div>

	<script type="text/javascript">
		( function( $ ) {
			$( document ).ready( function() {
				var uniqid = "' . $uniqid . '";
				$( ".wn-gradient-creater[data-uniqid=" + uniqid + "]" ).on( "change", function( e, obj, css ) {
					console.log( e );
					console.log( obj );
					console.log( css );
				}).radass({
					angle: 0,
					color: [
						"rgba(168,125,168,0.6) 0%",
						"rgba(0,60,255,0.5) 36%",
						"rgba(39,230,141,0.6) 65%",
						"rgba(207,204,128,1) 100%"
					]
				});
			}); // end document ready
		})( jQuery );
	</script>';

	return $out;

}
