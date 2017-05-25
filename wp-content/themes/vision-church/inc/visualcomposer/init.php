<?php

if ( class_exists( 'WPBakeryVisualComposerAbstract' ) ) {

	$vc_directory		= get_template_directory() . '/inc/visualcomposer';

	// load webnus vc_maps
	$files = glob( $vc_directory . '/shortcodes/*.php' );
	foreach ( $files as $file ) :
		if ( __FILE__ != basename( $file ) ) {
			include_once $file;
		}
	endforeach;

	// load visual composer vc_maps
	$files = glob( $vc_directory . '/setup/*.php' );
	foreach ( $files as $file ) :
		if ( __FILE__ != basename( $file ) ) {
			include_once $file;
		}
	endforeach;

	// load gradient param
	include_once $vc_directory . '/params/gradient/gradient-param.php';

	// frontend scripts
	add_action( 'wp_enqueue_scripts', 'vision_church_setup_assets' );
	function vision_church_setup_assets() {
		wp_deregister_style( 'js_composer_custom_css' );
		wp_dequeue_style( 'js_composer_custom_css' );
	}

}

	// admin scripts
	add_action( 'admin_enqueue_scripts','vision_church_setup_admin_assets' );
	function vision_church_setup_admin_assets() {
		wp_register_style( 'webnus_js_composer', get_template_directory_uri() . '/inc/visualcomposer/assets/webnus_js_composer.css', false, false, false );
		wp_enqueue_style( 'webnus_js_composer' );
		wp_deregister_style( 'font-awesome' );
		wp_enqueue_style( 'font-awesome' );	
	}