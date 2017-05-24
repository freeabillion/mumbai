<?php
/*
	Plugin Name: Webnus Core
	Description: Adds Webnus Core to your WordPress website.
	Version: 1.0
	Author: Webnus
	Author URI: http://webnus.net
	License: GPL2
*/
// Go away.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// define some const
define( 'WEBNUS_CORE_DIR', plugin_dir_path(  __FILE__  ));

add_action( 'plugins_loaded', 'shortcodes_init' );
function shortcodes_init() {
	foreach( glob( plugin_dir_path( __FILE__ ) . '/shortcodes/*.php' ) as $filename ) {
		require_once $filename;
	}
}

add_action( 'wp_enqueue_scripts', 'vision_webnus_core_script_loader');
function vision_webnus_core_script_loader() {
	// Woocommerce js error hack
	if (class_exists('Woocommerce')){
		global $post, $woocommerce;
		$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
		if(file_exists($woocommerce->plugin_path() . '/assets/js/jquery-cookie/jquery.cookie'.$suffix.'.js')){
			rename($woocommerce->plugin_path() . '/assets/js/jquery-cookie/jquery.cookie'.$suffix.'.js', $woocommerce->plugin_path() . '/assets/js/jquery-cookie/jquery_cookie'.$suffix.'.js');
		}
		wp_deregister_script( 'jquery-cookie' );
		wp_register_script( 'jquery-cookie', $woocommerce->plugin_url() . '/assets/js/jquery-cookie/jquery_cookie'.$suffix.'.js', array( 'jquery' ), '1.3.1', true );
	}
	wp_deregister_style('flexslider');
	wp_dequeue_style('flexslider');
	wp_deregister_script('flexslider');
	wp_dequeue_script('flexslider');
}

add_action( 'wp_print_scripts', 'vision_core_admin_scripts', 100 );
add_action( 'admin_enqueue_scripts', 'vision_core_admin_scripts', 100 );
function vision_core_admin_scripts() {
	
	wp_dequeue_script( 'wpb_ace' );
	wp_deregister_script( 'wpb_ace' );

	// JWp6 plugin giving us problems.  They need to update.
	if (  wp_script_is ( 'jquerySelect2' )) {
		wp_deregister_script( 'jquerySelect2' );
		wp_dequeue_script('jquerySelect2');
		wp_dequeue_style('jquerySelect2Style');
	}
}

if ( ! isset( $vision_church_options ) ) :
	include_once plugin_dir_path( __FILE__ ) . '/theme-options/extensions/wbc_importer/webnus-wbc-configs.php';
	include_once plugin_dir_path( __FILE__ ) . '/theme-options/extensions/wbc_importer/webnus-prevent-duplicated-menus.php';
endif;

/*********************/
/*	    LOGIN
/*********************/
if ( ! function_exists('vision_webnus_login') ) {
	function vision_webnus_login() {
		$vision_church_options = vision_church_options();
		$color_skin_class = ( isset( $vision_church_options['vision_webnus_custom_color_skin'] ) || isset( $vision_church_options['vision_webnus_color_skin'] ) && $vision_church_options['vision_webnus_color_skin'] != 'e3e3e3' ) ? 'colorskin-custom' : '' ;
		global $user_ID, $user_identity;
		if ($user_ID) : ?>
			<div id="user-logged" class="<?php echo $color_skin_class; ?>">
				<span class="author-avatar"><?php echo get_avatar( $user_ID, $size = '100'); ?></span>
				<div class="user-welcome"><?php esc_html_e('Welcome','vision'); ?> <strong><?php echo esc_html($user_identity) ?></strong></div>
				<ul class="logged-links colorb">
					<li><a href="<?php echo esc_url(home_url('/wp-admin/')); ?>"><?php esc_html_e('Dashboard','vision'); ?> </a></li>
					<li><a href="<?php echo esc_url(home_url('/wp-admin/profile.php')); ?>"><?php esc_html_e('My Profile','vision'); ?> </a></li>
					<li><a href="<?php echo esc_url(wp_logout_url(get_permalink())); ?>"><?php esc_html_e('Logout','vision'); ?> </a></li>
				</ul>
				<div class="clear"></div>
			</div>
		<?php else: ?>
			<h3 class="user-login-title"><?php esc_html_e( 'Account Login', 'vision' ); ?></h3>
			<div id="user-login">
			<?php wp_login_form(array('label_username' => esc_html__( 'Username','vision' ),'label_password' => esc_html__( 'Password','vision' ),'label_remember' => esc_html__( 'Remember Me','vision' ),
			'label_log_in'   => esc_html__( 'Log In','vision' ),));?>
				<ul class="login-links">
					<?php if ( get_option('users_can_register') ) : ?><?php echo wp_register() ?><?php endif; ?>
					<li><a href="<?php echo esc_url(wp_lostpassword_url(get_permalink()))?>"><?php esc_html_e('Foreget Password?','vision'); ?></a></li>
				</ul>
			</div>
		<?php endif;
	}
}