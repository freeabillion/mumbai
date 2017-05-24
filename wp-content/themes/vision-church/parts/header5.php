<?php
// define variables
$vision_church_options = vision_church_options();
$vision_church_options['vision_church_header_address'] = isset($vision_church_options['vision_church_header_address']) ? $vision_church_options['vision_church_header_address'] : '<strong>1234 North Avenue Luke Lane</strong><br>South Bend, IN 360001' ;
$vision_church_options['vision_church_header_phone'] = isset($vision_church_options['vision_church_header_phone']) ? $vision_church_options['vision_church_header_phone'] : '<strong>987.654.3216</strong><br>987.654.3217' ;
$vision_church_options['vision_church_header_email'] = isset($vision_church_options['vision_church_header_email']) ? $vision_church_options['vision_church_header_email'] : '<strong>info@example.com</strong><br>support@example.com' ;
$vision_church_options['vision_church_header_woocart_enable'] = isset($vision_church_options['vision_church_header_woocart_enable']) ? $vision_church_options['vision_church_header_woocart_enable'] : '0' ;
$vision_church_options['vision_church_header_menu_type'] = isset($vision_church_options['vision_church_header_menu_type']) ? $vision_church_options['vision_church_header_menu_type'] : '13' ;
$vision_church_options['vision_church_header_search_enable'] = isset($vision_church_options['vision_church_header_search_enable']) ? $vision_church_options['vision_church_header_search_enable'] : '1' ;
$hideheader = '';

if( is_page()){
	$hideheader = rwmb_meta( 'vision_church_hide_header_meta' );
}

$menu_icon 		= isset($vision_church_options['vision_church_header_menu_icon']) ? $vision_church_options['vision_church_header_menu_icon'] : '' ;
$menu_type 		= $vision_church_options['vision_church_header_menu_type'];
$header_class 	= '';
$header_class  	= !empty($menu_icon) ? ' sm-rgt-mn' : '';
$header_class  .= $hideheader ? ' hi-header' : '';
$header_class  .= $menu_type == '11' ? ' w-header-type-11' : '';
?>

<!-- header components - display: @media only screen and (max-width: 767px) -->
<div class="container">
	<div class="components phones-components clearfix">
		<?php
			$logo_rightside = isset($vision_church_options['vision_church_header_logo_rightside']) ? $vision_church_options['vision_church_header_logo_rightside'] : '2' ;
			if( $logo_rightside == 1 ) { ?>
				<form action="<?php echo esc_url( home_url( '/' ) ); ?>" method="get">
					<input name="s" type="text" placeholder="<?php esc_html_e('Search...','vision-church') ?>" class="header-saerch" >
				</form>
			<?php }
			elseif( $logo_rightside == 2 ) {
				$allowed_html = array( 'a' => array( 'href' => array(), 'title' => array() ), 'br' => array(), 'em' => array(), 'strong' => array() ); ?>
				<h6 class="col-sm-4"><i class="sl-location-pin"></i><span><?php echo wp_kses( $vision_church_options['vision_church_header_address'], $allowed_html ); ?></span></h6>
				<h6 class="col-sm-4"><i class="sl-phone"></i><span><?php echo '' . $vision_church_options['vision_church_header_phone']; ?></span></h6>
				<h6 class="col-sm-4"><i class="sl-envelope-open"></i><span><?php echo '' . $vision_church_options['vision_church_header_email']; ?></span></h6>
			<?php }
			elseif( $logo_rightside == 3 ) {
				if(is_active_sidebar('header-advert'))
				dynamic_sidebar('header-advert');
				if(is_active_sidebar('woocommerce_header'))
				dynamic_sidebar('woocommerce_header');
			}
$mobile_sticky = ( isset( $vision_church_options['vision_church_header_sticky_phone'] ) && $vision_church_options['vision_church_header_sticky_phone'] == '1' ) ? ' mobistky ' : '' ;
		?>
	</div>
</div>

<header id="header"  class="horizontal-w<?php echo esc_attr( $header_class ) . $mobile_sticky ; ?>">
	<div class="container">

		<!-- logo -->
		<div class="col-sm-3 logo-wrap">
			<div class="logo">
			<?php
				$logo 					= isset( $vision_church_options['vision_church_logo']['url'] ) ? $vision_church_options['vision_church_logo']['url'] : '';
				$logo_width 			= isset( $vision_church_options['vision_church_logo_width'] ) ? $vision_church_options['vision_church_logo_width'] : '';
				$transparent_logo 		= isset( $vision_church_options['vision_church_transparent_logo']['url'] ) ? $vision_church_options['vision_church_transparent_logo']['url'] : '';
				$transparent_logo_width = isset( $vision_church_options['vision_church_transparent_logo_width'] ) ? $vision_church_options['vision_church_transparent_logo_width'] : '';
				$sticky_logo 			= isset( $vision_church_options['vision_church_sticky_logo']['url'] ) ? $vision_church_options['vision_church_sticky_logo']['url'] : '';
				$sticky_logo_width 		= isset( $vision_church_options['vision_church_sticky_logo_width'] ) ? $vision_church_options['vision_church_sticky_logo_width'] : '150';
				$has_logo				= false; /* Check if there is one logo exists at least. */

				if( !empty($logo) || !empty($transparent_logo) || !empty($sticky_logo) )
					$has_logo = true;

				if( $has_logo === TRUE ) {
					if(!empty($transparent_logo))
						echo '<a href="'.esc_url(home_url( '/' )).'"><img src="'.esc_url($transparent_logo).'" width="' . $transparent_logo_width . '" id="img-logo-w1" alt="'.get_bloginfo( "name" ).'" class="img-logo-w1" style="width: ' . $transparent_logo_width . 'px"></a>';
					else
						echo '<a href="'.esc_url(home_url( '/' )).'"><img src="'.esc_url($logo).'" width="' . $logo_width . '" id="img-logo-w1" alt="'.get_bloginfo( "name" ).'" class="img-logo-w1" style="width: ' . $logo_width . 'px"></a>';

					if(!empty($sticky_logo))
						echo '<span class="logo-sticky"><a href="'.esc_url(home_url( '/' )).'"><img src="'.esc_url($sticky_logo).'" width="' . $sticky_logo_width . '" id="img-logo-w3" alt="'.get_bloginfo( "name" ).'" class="img-logo-w3"></a></span>';
					else
						echo '<span class="logo-sticky"><a href="'.esc_url(home_url( '/' )).'"><img src="'.esc_url($logo).'" width="'. (!empty($sticky_logo_width)?$sticky_logo_width:$logo_width). '" id="img-logo-w3" alt="'.get_bloginfo( "name" ).'" class="img-logo-w3"></a></span>';
				} else { ?>
					<span id="site-title"><a href="<?php echo esc_url(home_url( '/' )); ?>"><?php bloginfo( 'name' ); ?></a></span>
						<span class="site-slog">
							<a href="<?php echo esc_url(home_url( '/' )); ?>">
								<?php
									$slogan = isset( $vision_church_options['vision_church_slogan'] ) ? $vision_church_options['vision_church_slogan'] : '';
									if( empty($slogan)) bloginfo( 'description' ); else echo esc_html($slogan);
								?>
							</a>
						</span>
					<?php
				}
			?>
			</div> <!-- end logo -->
		</div> <!-- end logo-wrap -->

		<!-- nav and component -->
		<div class="col-sm-9 nav-components">
			<!-- header components -->
			<div class="components clearfix">
				<?php
					$logo_rightside = isset($vision_church_options['vision_church_header_logo_rightside']) ? $vision_church_options['vision_church_header_logo_rightside'] : '2' ;
					if( $logo_rightside == 1 ) { ?>
						<form action="<?php echo esc_url(home_url( '/' )); ?>" method="get">
							<input name="s" type="text" placeholder="<?php esc_html_e('Search...','vision-church') ?>" class="header-saerch" >
						</form>
					<?php }
					elseif( $logo_rightside == 2 ) {
						$allowed_html = array( 'a' => array( 'href' => array(), 'title' => array() ), 'br' => array(), 'em' => array(), 'strong' => array() ); ?>
						<h6><i class="sl-location-pin"></i><span><?php echo wp_kses( $vision_church_options['vision_church_header_address'], $allowed_html ); ?></span></h6>
						<h6><i class="sl-phone"></i><span><?php echo '' . $vision_church_options['vision_church_header_phone']; ?></span></h6>
						<h6><i class="sl-envelope-open"></i><span><?php echo '' . $vision_church_options['vision_church_header_email']; ?></span></h6>
					<?php }
					elseif( $logo_rightside == 3 ) {
						if(is_active_sidebar('header-advert'))
						dynamic_sidebar('header-advert');
						if(is_active_sidebar('woocommerce_header'))
						dynamic_sidebar('woocommerce_header');
					}
					if ( class_exists( 'WooCommerce' ) && $vision_church_options['vision_church_header_woocart_enable'] ) {
						the_widget( 'Woocommerce_Header_Cart' );
					}
				?>
			</div>
			<!-- navigation -->
			<nav id="nav-wrap" class="nav-wrap1">
				<div class="container">
				<?php
					$onepage_menu = '';
					if(is_page()){
						$onepage_menu = rwmb_meta( 'vision_church_onepage_menu_meta' );
					}
					$menu_location = '';
					if( $vision_church_options['vision_church_header_menu_type'] == 0 ) {
						$menu_location = 'header-top-menu';
					} elseif($onepage_menu) {
						$menu_location = 'onepage-header-menu';
					} else {
						$menu_location = 'header-menu';
					}
					// nav
					if ( has_nav_menu( $menu_location ) ) {
						wp_nav_menu( array( 'theme_location' => $menu_location, 'container' => 'false', 'menu_id' => 'nav', 'depth' => '5', 'fallback_cb' => 'wp_page_menu', 'items_wrap' => '<ul id="%1$s">%3$s</ul>',  'walker' => new vision_church_description_walker() ) );
					} ?>
				</div>  <!-- end container -->
			</nav> <!-- end nav-wrap -->
			<!-- search -->
			<?php if( $vision_church_options['vision_church_header_search_enable'] ) : ?>
				<form id="w-header-type-11-search" role="search" action="<?php echo esc_url(home_url( '/' )); ?>" method="get" >
					<i id="header11_search_icon" class="sl-magnifier"></i>
					<input name="s" type="text">
				</form>
			<?php endif; ?>
		</div> <!-- end col-md-9 -->

	</div> <!-- end container -->
</header> <!-- end header -->