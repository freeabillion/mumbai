<?php
/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.4.1
 * @author     Thomas Griffin
 * @author     Gary Jones
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */

require_once get_template_directory() . '/inc/plugins/plugin-activator/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'vision_church_register_required_plugins' );
function vision_church_register_required_plugins() {
	$plugins = array(
		
		array(
			'name'		=> esc_html__( 'Visual Composer', 'vision-church' ),
			'slug'		=> 'js_composer',
			'source'	=> get_template_directory() . '/inc/plugins/js_composer.zip',
			'required'	=> true,
		),

		array(
			'name'		=> esc_html__( 'Webnus Core', 'vision-church' ),
			'slug'		=> 'webnus-core',
			'source'	=> get_template_directory() . '/inc/plugins/webnus-core.zip',
			'required'	=> true,
		),

		array(
			'name'					=> 'Webnus Gallery',
			'slug'					=> 'webnus-gallery',
			'required'				=> true,
			'source'				=> get_template_directory() . '/inc/plugins/webnus-gallery.zip',
			'force_activation'		=> false,
			'force_deactivation'	=> false,
		),

		array(
			'name'		=> esc_html__( 'Modern Events Calendar', 'vision-church' ),
			'slug'		=> 'modern-events-calendar',
			'source'	=> get_template_directory() . '/inc/plugins/modern-events-calendar.zip',
			'required'	=> false,
		),

		array(
			'name'		=> esc_html__( 'The Grid', 'vision-church' ),
			'slug'		=> 'the-grid',
			'source'	=> get_template_directory() . '/inc/plugins/the-grid.zip',
			'required'	=> true,
		),

		array(
			'name'		=> esc_html__( 'Woocommerce', 'vision-church' ),
			'slug'		=> 'woocommerce',
			'required'	=> false,
		),

		array(
			'name'		=> esc_html__( 'Contact Form 7', 'vision-church' ),
			'slug'		=> 'contact-form-7',
			'required'	=> true,
		),

		array(
			'name'		=> esc_html__( 'WP PageNavi', 'vision-church' ),
			'slug'		=> 'wp-pagenavi',
			'required'	=> true,
		),

		array(
			'name'		=> esc_html__( 'Social Count Plus', 'vision-church' ),
			'slug'		=> 'social-count-plus',
			'required'	=> false,
		),

		array(
			'name'		=> esc_html__( 'Prayer Wall', 'vision-church' ),
			'slug'		=> 'prayer-wall',
			'source'	=> get_template_directory() . '/inc/plugins/prayer-wall.zip',
			'required'	=> true,
		),

		array(
			'name'		=> esc_html__( 'Slider Revolution', 'vision-church' ),
			'slug'		=> 'revslider',
			'source'	=> get_template_directory() . '/inc/plugins/revslider.zip',
			'required'	=> false,
		),
		
		array(
			'name'		=> esc_html__( 'Webnus Causes', 'vision-church' ),
			'slug'		=> 'webnus-causes',
			'source'	=> get_template_directory() . '/inc/plugins/webnus-causes.zip',
			'required'	=> false,
		),
			
		array(
			'name'		=> esc_html__( 'Webnus Sermons', 'vision-church' ),
			'slug'		=> 'webnus-sermons',
			'source'	=> get_template_directory() . '/inc/plugins/webnus-sermons.zip',
			'required'	=> false,
		),

		array(
			'name'		=> esc_html__( 'Envato Wordpress Toolkit', 'vision-church' ),
			'slug'		=> 'envato-wordpress-toolkit',
			'source'	=> get_template_directory() . '/inc/plugins/envato-wordpress-toolkit.zip',
			'required'	=> false,
		),

	);


	$config = array(
		'id'			=> 'tgmpa',					// Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path'	=> '',						// Default absolute path to bundled plugins.
		'menu'			=> 'tgmpa-install-plugins',	// Menu slug.
		'parent_slug'	=> 'themes.php',			// Parent menu slug.
		'capability'	=> 'edit_theme_options',	// Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'	=> true,					// Show admin notices or not.
		'dismissable'	=> true,					// If false, a user cannot dismiss the nag message.
		'dismiss_msg'	=> '',						// If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic'	=> true,					// Automatically activate plugins after installation or not.
		'message'		=> '',						// Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );

}
if(function_exists('vc_set_as_theme')) vc_set_as_theme( $disable_updater = true );