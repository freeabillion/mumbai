<?php // Define variables

	// fetch vision options
	$vision_church_options 		= vision_church_options();

	// Mobile Specific Metas
	$enable_responsive		= isset( $vision_church_options['vision_church_enable_responsive'] ) ? $vision_church_options['vision_church_enable_responsive'] : '1';

	// Site Icon
	$apple_iphone_icon		= isset( $vision_church_options['vision_church_apple_iphone_icon']['url'] ) ? $vision_church_options['vision_church_apple_iphone_icon']['url'] : '';
	$apple_ipad_icon		= isset( $vision_church_options['vision_church_apple_ipad_icon']['url'] ) ? $vision_church_options['vision_church_apple_ipad_icon']['url'] : '';
	$favicon				= isset( $vision_church_options['vision_church_favicon']['url'] ) ? $vision_church_options['vision_church_favicon']['url'] : '';

	// Sticky
	$header_sticky												= isset( $vision_church_options['vision_church_header_sticky'] ) ? $vision_church_options['vision_church_header_sticky'] : '0';
	$header_sticky_scrolls										= isset( $vision_church_options['vision_church_header_sticky_scrolls'] ) ? $vision_church_options['vision_church_header_sticky_scrolls'] : '380';
	$vision_church_custom_color_skin							= isset( $vision_church_options['vision_church_custom_color_skin'] ) ? $vision_church_options['vision_church_custom_color_skin'] : '';
	$vision_church_options['vision_church_color_skin']			= isset( $vision_church_options['vision_church_color_skin'] ) ? $vision_church_options['vision_church_color_skin'] : 'e3e3e3';
	$vision_church_options['vision_church_header_sticky_phone'] = isset( $vision_church_options['vision_church_header_sticky_phone'] ) ? $vision_church_options['vision_church_header_sticky_phone']  : '' ;

	// -> Start the #wrap div classes

	$wrap_class = '';

	// Colorskin
	if ( $vision_church_options['vision_church_color_skin'] != 'e3e3e3' || $vision_church_custom_color_skin ) {
		$wrap_class .= 'colorskin-custom ';
	}

	// Header Menu
	$header_menu_type	= isset( $vision_church_options['vision_church_header_menu_type'] ) ? $vision_church_options['vision_church_header_menu_type'] : '13';
	$dark_submenu		= isset( $vision_church_options['vision_church_dark_submenu'] ) ? $vision_church_options['vision_church_dark_submenu'] : '2';
	$header_bottom 		= isset( $vision_church_options['vision_church_header_bottom'] ) ? $vision_church_options['vision_church_header_bottom']  : '' ;

	$wrap_class	.= ( $header_menu_type == 0 )? esc_attr( 'no-menu-header' ) . ' ' : '';
	$wrap_class	.= ( $header_menu_type == 6 )? esc_attr( 'vertical-header-enabled' ) . ' ' : '';
	$wrap_class	.= ( $header_menu_type == 7 )? esc_attr( 'vertical-toggle-header-enabled' ) . ' ' : '';
	$wrap_class	.= ( ! isset( $dark_submenu ) || ( $dark_submenu == '2' ) )? esc_attr( ' dark-submenu' ) . ' ' : '';

	// Background Layout
	$background_layout	= isset( $vision_church_options['vision_church_background_layout'] ) ? $vision_church_options['vision_church_background_layout'] : 'wide';
	$wrap_class 		.= ( ( $background_layout == 'boxed-wrap' ) && ( $header_menu_type != 6 ) && ( $header_menu_type != 7 ) ) ? $background_layout . ' ' : '';

	// -> End the #wrap div classes


	// Toggle Toparea
	$toggle_toparea_enable	= isset( $vision_church_options['vision_church_toggle_toparea_enable'] ) ? $vision_church_options['vision_church_toggle_toparea_enable'] : 0 ;

	// Top Bar
	$header_topbar_enable	= isset( $vision_church_options['vision_church_header_topbar_enable'] ) ? $vision_church_options['vision_church_header_topbar_enable'] : '1';

	// News Ticker
	$news_ticker			= isset( $vision_church_options['vision_church_news_ticker'] ) ? $vision_church_options['vision_church_news_ticker'] : '';

	// Modal Contact Form
	$topbar_contact			= isset( $vision_church_options['vision_church_topbar_contact'] ) ? $vision_church_options['vision_church_topbar_contact'] : '';
	$topbar_form			= isset($vision_church_options['vision_church_topbar_form']) ? $vision_church_options['vision_church_topbar_form'] : '';

	// woocommerce
	$woo_product_title_enable 	= isset( $vision_church_options['vision_church_woo_product_title_enable'] ) ? $vision_church_options['vision_church_woo_product_title_enable'] : '';
	$woo_product_title			= isset( $vision_church_options['vision_church_woo_product_title'] ) ? $vision_church_options['vision_church_woo_product_title'] : '';
	$woo_shop_title_enable		= isset( $vision_church_options['vision_church_woo_shop_title_enable'] ) ? $vision_church_options['vision_church_woo_shop_title_enable'] : '';
	$woo_shop_title				= isset( $vision_church_options['vision_church_woo_shop_title'] ) ? $vision_church_options['vision_church_woo_shop_title'] : '';

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">

	<?php
	// Mobile Specific Metas
	if( $enable_responsive ) : ?>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<?php else : ?>
	<meta name="viewport" content="width=1200,user-scalable=yes">
	<?php endif; ?>

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>

<?php if ( ! $header_sticky ) : ?>
<body <?php body_class(); ?>>
<?php else: ?>
<body <?php body_class(); ?> data-scrolls-value="<?php echo esc_attr( $header_sticky_scrolls ); ?>">
<?php endif;
$vision_church_options['vision_church_hamburger_menu_bgcolor_style'] = isset( $vision_church_options['vision_church_hamburger_menu_bgcolor_style'] ) ? $vision_church_options['vision_church_hamburger_menu_bgcolor_style'] : '2';
$hamburger_style = ( $vision_church_options['vision_church_hamburger_menu_bgcolor_style'] == 1 ) ? 'hm-dark' : '' ; ?>

<?php 
	$vision_church_options['vision_church_header_hamburger_menu_enable'] = isset( $vision_church_options['vision_church_header_hamburger_menu_enable'] ) ? $vision_church_options['vision_church_header_hamburger_menu_enable'] : '1';
	if ( $vision_church_options['vision_church_header_hamburger_menu_enable'] == 2 && ( $header_menu_type == 10 || $header_menu_type == 13 || $header_menu_type == 1 ) ) { ?>

		<div class="wn-hamburger-wrap wn-hamuburger-bg fat-nav <?php echo ''. $hamburger_style; ?>" data-wnfire-fatnav="true">
			<div class="fat-nav__wrapper">
				<?php wp_nav_menu( array( 'theme_location' => 'hamburger-menu', 'container' => 'false', 'menu_class' => 'full-menu', 'depth' => '5', 'fallback_cb' => 'wp_page_menu', 'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',  'walker' => new vision_church_description_walker()) ); ?>
				<div class="socialfollow">
					<?php get_template_part('parts/social' ); ?>
				</div>
			</div>
		</div>
<?php } ?>

<!-- Start the hamburger menu div -->
<?php if ($vision_church_options['vision_church_header_hamburger_menu_enable'] == 1 && ( $header_menu_type == 10 || $header_menu_type == 13 || $header_menu_type == 1 ) ){
	?>
<div id="hamburger-menu" class="wn-hamuburger-bg hamburger-menu-content <?php echo esc_html($hamburger_style); ?>">
	<div class="hamburger-menu-main">
		<?php
		if ( has_nav_menu( 'hamburger-menu' )){
			wp_nav_menu( array( 'theme_location' => 'hamburger-menu', 'container' => 'false', 'menu_id' => 'hamburger-nav', 'depth' => '5', 'fallback_cb' => 'wp_page_menu', 'items_wrap' => '<ul id="%1$s">%3$s</ul>',  'walker' => new vision_church_description_walker()) );
			}else{
				echo '<ul id="wp_page_menu"><li>';
				esc_html_e( 'Please create menu in "Appearance > Menus"' , 'vision-church');
				echo '</li></ul>';
		}
		?>
		<form id="hamburger-menu-search-form" role="search" action="<?php echo esc_url(home_url( '/' )); ?>" method="get" >
			<div class="hamburger-menu-search-content">
				<input name="s" type="text" class="hamburger-search-text-box" placeholder="<?php esc_html_e('Search...','vision-church');?>" >
				<i class="sl-magnifier hamburger-menu-search-icon"></i>
			</div>
		</form>

		<div class="hamburger-social-icons">
			<?php get_template_part('parts/social' ); ?>
		</div>

		<?php 
			$vision_church_options['vision_church_footer_copyright_left'] = isset( $vision_church_options['vision_church_footer_copyright_left'] ) ? $vision_church_options['vision_church_footer_copyright_left'] : '';
			if( $vision_church_options['vision_church_footer_copyright_left'] ) { ?>
			<div class="hamburger-copyright">
			<?php echo esc_html( $vision_church_options['vision_church_footer_copyright_left'] ); ?>
			</div>
		<?php } ?>

	</div>
</div>
<?php } ?>
<!-- Start the #wrap div -->
<div id="wrap" class="<?php echo esc_attr( $wrap_class ); ?>">

	<?php if ( $toggle_toparea_enable ) : ?>
		<section class="toggle-top-area footer-in">
			<div class="w_toparea container">
				<div class="col-md-3">
					<?php if( is_active_sidebar( 'top-area-1' ) ) dynamic_sidebar('top-area-1'); ?>
				</div>
				<div class="col-md-3">
					<?php if( is_active_sidebar( 'top-area-2' ) ) dynamic_sidebar('top-area-2'); ?>
				</div>
				<div class="col-md-3">
					<?php if( is_active_sidebar( 'top-area-3' ) ) dynamic_sidebar('top-area-3'); ?>
				</div>
				<div class="col-md-3">
					<?php if( is_active_sidebar( 'top-area-4' ) ) dynamic_sidebar('top-area-4'); ?>
				</div>
			</div>
			<a class="w_toggle" href="#"></a>
		</section>
	<?php endif;

	$topbar_show = $header_show = true;
	if( isset( $post ) ) :
		$topbar_show = rwmb_meta( 'vision_church_topbar_show' );
		$header_show = rwmb_meta( 'vision_church_header_show' );
	endif;

	// Top Bar
	if ( $topbar_show || is_archive() || is_single() || is_home() || is_search() || is_404() ) :
		 if ( $header_topbar_enable )
			get_template_part( 'parts/topbar' );
	endif;

if ( $header_show || is_archive() || is_single() || is_home() || is_search() || is_404() ) :
// Menu Type
 switch( $header_menu_type ){
 	case 0:
	case 2:
	case 3:
	case 4:
	case 5:
		get_template_part('parts/header2');
	break;
	case 6:
	case 7:
		get_template_part('parts/header3');
	break;
	case 8:
		get_template_part('parts/header4');
	break;
	case 9:
		get_template_part('parts/header2');
	break;
	case 11:
		get_template_part('parts/header5');
	break;
	case 12:
        get_template_part( 'parts/header2' );
    break;
	case 13:
		get_template_part('parts/header1');
	break;
	default: //case: 1
		get_template_part('parts/header1');
	break;
 }
endif;

// ============> Header Bottom
if ( $header_bottom || is_archive() || is_single() || is_home() && $header_bottom && $header_menu_type == 13 ) :
	switch( $header_menu_type ){
		case 0:
		case 2:
		case 3:
		case 4:
		case 5:
		case 6:
		case 7:
		case 8:
		case 9:
		case 11:
		case 12:
	    break;
		case 13:
			get_template_part('parts/header-bottom');
		break;
	}
endif;

	// News Ticker
	if( $news_ticker ) :
		get_template_part( 'parts/news-ticker' );
	endif;

	// Modal Contact Form
	if ( $topbar_contact ) :
		$form_id = esc_html( $topbar_form );
		echo '<div style="display:none">
				<div class="w-modal modal-contact" id="w-contact">
					<h3 class="modal-title"> ' . esc_html__( 'CONTACT', 'vision-church' ) . '</h3>
					<br>
					' . do_shortcode( '[contact-form-7 id="'.$form_id.'" title="' . esc_attr( 'Contact' ) . '"]' ) . '
				</div>
			</div>';
	endif;

	// Woocommerce - if woocommerce available add page headline section
	if ( isset( $post ) && get_post_type( $post->ID ) == 'product' ) :
		if ( function_exists( 'is_product' ) && is_product() && $woo_product_title_enable ) { ?>
			<section id="headline">
				<div class="container">
					<h2><?php echo esc_html( $woo_product_title ); ?></h2>
				</div>
			</section>
		<?php }

		if ( function_exists( 'is_product'  ) && ! is_product() && $woo_shop_title_enable ) { ?>
			<section id="headline">
				<div class="container">
					<h2><?php echo esc_html( $woo_shop_title ); ?></h2>
				</div>
			</section>
		<?php } ?>

		<!-- Start Page Content -->
		<section class="container">
			<hr class="vertical-space">
	<?php endif; // end woocommerce