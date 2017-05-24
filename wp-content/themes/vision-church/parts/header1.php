<?php
$vision_church_options = vision_church_options();
$hideheader = '';
if( is_page()){
	$hideheader =rwmb_meta( 'vision_church_hide_header_meta' );
}
$menu_type = isset($vision_church_options['vision_church_header_menu_type']) ? $vision_church_options['vision_church_header_menu_type'] : '13' ;
$mobile_sticky = ( isset( $vision_church_options['vision_church_header_sticky_phone'] ) && $vision_church_options['vision_church_header_sticky_phone'] == '1' ) ? ' mobistky ' : '' ;
$vision_church_options['vision_church_header_share'] = isset( $vision_church_options['vision_church_header_share'] ) ? $vision_church_options['vision_church_header_share'] : '1' ;
$header_class = ( $menu_type == 13 ) ?  ' w-header-type-13 ' : '';
$header_class .= ( $menu_type == 1 ) ?  ' has-header-type1 ' : '';
$mobile_menu_class = ' sm-rgt-mn ';?>
<header id="header" class="horizontal-w <?php echo '' . $mobile_sticky . $header_class;  ?> <?php $vision_church_options['vision_church_header_color_type'] = isset($vision_church_options['vision_church_header_color_type']) ? $vision_church_options['vision_church_header_color_type'] : '' ;
	$vision_church_options['vision_church_header_search_enable'] = isset($vision_church_options['vision_church_header_search_enable']) ? $vision_church_options['vision_church_header_search_enable'] : '1' ;
	echo '' . $mobile_menu_class;
	if($menu_type==10) echo ' w-header-type-10 ';
	echo ($hideheader)? ' hi-header ' : '';
	echo ' '.$vision_church_options['vision_church_header_color_type'];
	?>">

	<?php if ($menu_type == 13 && ( $vision_church_options['vision_church_header_share'] || $vision_church_options['vision_church_header_search_enable'] ) ){ ?>
	<div class="main-slide-toggle colorb">

		<?php if ( $vision_church_options['vision_church_header_share'] ){ ?>
			<div id="header-share-modal" class="wn-header-share">
				<div class="header-social-content container">
					<div class="col-md-6">
						<h3 class="header-share-modal-title">
							<?php esc_html_e( 'Social Network' , 'vision-church'); ?>
						</h3>
					</div>
					<div class="col-md-6">
						<div class="socialfollow">
							<?php get_template_part('parts/social' ); ?>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

		<?php if ( $vision_church_options['vision_church_header_search_enable'] ){ ?>
			<div id="header-search-modal" class="wn-header-search">
				<div class="header-search-content container">
					<div class="col-md-12">
						<form id="header-search-modal-form" role="search" action="<?php echo esc_url(home_url( '/' )); ?>" method="get" >
							<input name="s" type="text" class="header-search-modal-text-box" placeholder="<?php esc_html_e('Search ...','vision-church');?>" autofocus>
							<i class="sl-magnifier"></i>
						</form>
					</div>
				</div>
			</div>
		<?php } ?>

	</div>
	<?php } ?>


	<?php if ( $menu_type != 13 ) { ?>
	<div class="container">
	<?php }
	$logo_class =  $menu_type != 13 ? 'class="col-md-3 col-sm-3 logo-wrap"' : 'class="col-md-2 col-sm-2 logo-wrap"' ;
	?>
		<div class="responsovive-modals">
			<div id="search-form-res" class="wn-header-toggle js-contentToggle">
				<i id="wn-search-modal-icon-res" class="sl-magnifier"></i>
				<div id="search-form-box" class="search-form-box js-contentToggle__content">
				<form action="#" method="get">
					<input type="text" class="search-text-box" id="search-box" name="s">
				</form>
				</div>
			</div>
			<?php
			$vision_church_options['vision_church_header_hamburger_menu_enable'] = isset( $vision_church_options['vision_church_header_hamburger_menu_enable'] ) ? $vision_church_options['vision_church_header_hamburger_menu_enable'] : '1' ;
			if ($vision_church_options['vision_church_header_hamburger_menu_enable'] == 1 ){ ?>
			<div class="hamburger-toggle-content js-contentToggle wn-header-toggle" >
				<a class="hamburger-toggle-link">
					<div class="hamburger-toggle-link-icon  js-contentToggle__trigger"></div>
				</a>
			</div>
			<?php } ?>
		</div>
		<div <?php echo '' . $logo_class; ?> >
			<div class="logo">
				<?php
				$logo 					= isset( $vision_church_options['vision_church_logo']['url'] ) ? $vision_church_options['vision_church_logo']['url'] : '';
				$logo_width 			= isset( $vision_church_options['vision_church_logo_width'] ) ? $vision_church_options['vision_church_logo_width'] : '';
				$transparent_logo 		= isset( $vision_church_options['vision_church_transparent_logo']['url'] ) ? $vision_church_options['vision_church_transparent_logo']['url'] : '';
				$transparent_logo_width = isset( $vision_church_options['vision_church_transparent_logo_width'] ) ? $vision_church_options['vision_church_transparent_logo_width'] : '';
				$sticky_logo 			= isset( $vision_church_options['vision_church_sticky_logo']['url'] ) ? $vision_church_options['vision_church_sticky_logo']['url'] : '';
				$sticky_logo_width 		= isset( $vision_church_options['vision_church_sticky_logo_width'] ) ? $vision_church_options['vision_church_sticky_logo_width'] : '150';
				$has_logo				= false; /* Check if there is one logo exists at least. */

				if( !empty($logo) || !empty($transparent_logo) || !empty($sticky_logo) ) $has_logo = true;
				if((TRUE === $has_logo)){
					if(!empty($logo))
						echo '<a href="'.esc_url(home_url( '/' )).'"><img src="'.esc_url($logo).'" width="' . $logo_width . '" id="img-logo-w1" alt="'.get_bloginfo( "name" ).'" class="img-logo-w1" style="width: '. $logo_width . 'px"></a>';
					if(!empty($transparent_logo))
						echo '<a href="'.esc_url(home_url( '/' )).'"><img src="'.esc_url($transparent_logo).'" width="' . $transparent_logo_width . '" id="img-logo-w2" alt="'.get_bloginfo( "name" ).'" class="img-logo-w2" style="width: ' . $transparent_logo_width  . 'px"></a>';
					else
						echo '<a href="'.esc_url(home_url( '/' )).'"><img src="'.esc_url($logo).'" width="' . (!empty($transparent_logo_width)?$transparent_logo_width:$logo_width) . '" id="img-logo-w2" alt="' .get_bloginfo( "name" ).'" class="img-logo-w2" style="width: '. ( !empty($transparent_logo_width) ? $transparent_logo_width : $logo_width ). 'px"></a>';

					if(!empty($sticky_logo))
						echo '<span class="logo-sticky"><a href="'.esc_url(home_url( '/' )).'"><img src="'.esc_url($sticky_logo).'" width="'. (!empty($sticky_logo_width)?$sticky_logo_width:$logo_width). '" id="img-logo-w3" alt="'.get_bloginfo( "name" ).'" class="img-logo-w3"></a></span>';
					else
						echo '<span class="logo-sticky"><a href="'.esc_url(home_url( '/' )).'"><img src="'.esc_url($logo).'" width="'. (!empty($sticky_logo_width)?$sticky_logo_width:$logo_width). '" id="img-logo-w3" alt="'.get_bloginfo( "name" ).'" class="img-logo-w3"></a></span>';
				}else{ ?>
					<a id="site-title" href="<?php echo esc_url(home_url( '/' )); ?>"><?php bloginfo( 'name' ); ?></a>
					<span class="site-slog">
						<a href="<?php echo esc_url(home_url( '/' )); ?>">
							<?php
							$slogan = isset($vision_church_options['vision_church_slogan']) ? $vision_church_options['vision_church_slogan'] : '' ;
							if( empty($slogan))
								bloginfo( 'description' );
							else
								echo esc_html($slogan);
							?>
						</a>
					</span>
					<?php }
					$nav_class = $menu_type == 13 ? 'class="nav-wrap1 col-md-8 col-sm-8 wn-full-header"' : 'class="nav-wrap1 col-md-9 col-sm-9"' ;
					?></div></div>
					<nav id="nav-wrap" <?php echo '' . $nav_class ; ?> >
					<?php if ( $menu_type != 13 ) { ?>
						<div class="container">
						<?php } ?>
							<?php
							if(is_active_sidebar('woocommerce_header')) {
								dynamic_sidebar('woocommerce_header');
							}
							$search_url = esc_url(home_url( '/' ));
							$search_tooltip = isset( $vision_church_options['vision_church_header_search_text'] ) ? $vision_church_options['vision_church_header_search_text'] : 'Search' ;
							if ( $menu_type == 13 ){
								$header_search = '
								<div id="search-form" class="wn-header-toggle" data-tooltip="' . esc_html($search_tooltip) . '">
									<i id="wn-search-modal-icon" class="sl-magnifier"></i>
								</div>';
							}else{
								$header_search = '
								<div id="search-form" class="wn-header-toggle js-contentToggle">
									<i id="wn-search-modal-icon" class="sl-magnifier"></i>
									<div id="search-form-box" class="search-form-box js-contentToggle__content">
									<form action="" method="get">
										<input type="text" class="search-text-box" id="search-box" name="s">
									</form>
									</div>
								</div>';
							}


							if( $vision_church_options['vision_church_header_search_enable'] && $menu_type != 13 ){
								echo '' . $header_search ;

							if ( class_exists( 'WooCommerce' ) && $vision_church_options['vision_church_header_woocart_enable'] && ($menu_type == 10 || $menu_type == 1) ) {
								echo '<div class="wn-header-toggle">';
									the_widget( 'Woocommerce_Header_Cart' );
								echo '</div>';
							}

							if ($vision_church_options['vision_church_header_hamburger_menu_enable'] == 1 && ( $menu_type == 10 || $menu_type == 13 || $menu_type == 1 ) ){
								echo'
								<div class="hamburger-toggle-content js-contentToggle wn-header-toggle" >
									<a class="hamburger-toggle-link">
										<div class="hamburger-toggle-link-icon  js-contentToggle__trigger"></div>
									</a>
								</div>';
							}
							?>
								<?php }

							// OnePage Menu
								$onepage_menu = '';
								if(is_page()){
									$onepage_menu = rwmb_meta( 'vision_church_onepage_menu_meta' );
								}

								if($onepage_menu){
									if ( has_nav_menu( 'onepage-header-menu' ) ) {
										wp_nav_menu( array( 'theme_location' => 'onepage-header-menu', 'container' => 'false', 'menu_id' => 'nav', 'depth' => '5', 'fallback_cb' => 'wp_page_menu', 'items_wrap' => '<ul id="%1$s">%3$s</ul>',  'walker' => new vision_church_description_walker()) );
									}
								}
								else{
									if ( has_nav_menu( 'header-menu' ) ) {
										wp_nav_menu( array( 'theme_location' => 'header-menu', 'container' => 'false', 'menu_id' => 'nav', 'depth' => '5', 'fallback_cb' => 'wp_page_menu', 'items_wrap' => '<ul id="%1$s">%3$s</ul>',  'walker' => new vision_church_description_walker()) );
									}
								}
								?>
						<?php if ( $menu_type != 13 ) { ?>
							</div>
						<?php } ?>
						</nav>
						<?php if( $menu_type == 13 ){
							$header_search = $vision_church_options['vision_church_header_search_enable'] ? $header_search : '';
							echo '<div class="col-sm-2 tools-section">';
							if ($vision_church_options['vision_church_header_hamburger_menu_enable'] == 1 && ( $menu_type == 10 || $menu_type == 13 || $menu_type == 1 ) ){
								echo'
								<div class="hamburger-toggle-content js-contentToggle wn-header-toggle" >
									<a class="hamburger-toggle-link">
										<div class="hamburger-toggle-link-icon  js-contentToggle__trigger"></div>
									</a>
								</div>';
							}
							echo '' . $header_search;
							$vision_church_options['vision_church_social_first'] = isset( $vision_church_options['vision_church_social_first'] ) ? $vision_church_options['vision_church_social_first'] : '' ;
							$vision_church_options['vision_church_social_second'] = isset( $vision_church_options['vision_church_social_second'] ) ? $vision_church_options['vision_church_social_second'] : '' ;
							$vision_church_options['vision_church_social_third'] = isset( $vision_church_options['vision_church_social_third'] ) ? $vision_church_options['vision_church_social_third'] : '' ;
							$vision_church_options['vision_church_social_fourth'] = isset( $vision_church_options['vision_church_social_fourth'] ) ? $vision_church_options['vision_church_social_fourth'] : '' ;
							$vision_church_options['vision_church_social_fifth'] = isset( $vision_church_options['vision_church_social_fifth'] ) ? $vision_church_options['vision_church_social_fifth'] : '' ;
							$vision_church_options['vision_church_social_sixth'] = isset( $vision_church_options['vision_church_social_sixth'] ) ? $vision_church_options['vision_church_social_sixth'] : '' ;
							$vision_church_options['vision_church_social_seventh'] = isset( $vision_church_options['vision_church_social_seventh'] ) ? $vision_church_options['vision_church_social_seventh'] : '' ;
							if ( $vision_church_options['vision_church_header_share'] && ( $vision_church_options['vision_church_social_first'] || $vision_church_options['vision_church_social_second'] || $vision_church_options['vision_church_social_third'] || $vision_church_options['vision_church_social_fourth'] || $vision_church_options['vision_church_social_fifth'] || $vision_church_options['vision_church_social_sixth'] || $vision_church_options['vision_church_social_seventh'] ) ) {
								$share_tooltip = isset( $vision_church_options['vision_church_header_share_text'] ) ? $vision_church_options['vision_church_header_share_text'] : 'Share' ;
								if ( is_user_logged_in() ) {
									global $user_identity;
									$login_text = esc_html__('Welcome ','vision-church') . esc_html($user_identity);
								}
								echo '
									<div class="w-share-modal wn-header-toggle" data-tooltip="' . esc_html($share_tooltip) . '">
										<i class="sl-share" id="wn-share-modal-icon"></i>
									</div>';
							}

								$vision_church_options['vision_church_header_login'] = isset( $vision_church_options['vision_church_header_login'] ) ? $vision_church_options['vision_church_header_login'] : '0' ;
								if ( $vision_church_options['vision_church_header_login'] ){
									$login_tooltip = isset( $vision_church_options['vision_church_header_login_text'] ) ? $vision_church_options['vision_church_header_login_text'] : '0' ;
									if ( is_user_logged_in() ) {
										global $user_identity;
										$login_text = esc_html__('Welcome ','vision-church') . esc_html($user_identity);
									}
									echo '
										<div class="w-login-modal wn-header-toggle" data-tooltip="' . esc_html($login_tooltip) . '">
											<a href="#w-login" id="wn-contact-modal-icon"  data-effect="mfp-zoom-in"><i class="sl-user" id="wn-login-modal-icon"></i></a>
											<div id="w-login" class="w-login white-popup mfp-with-anim mfp-hide">';
											if ( function_exists('vision_church_login') ) {
												vision_church_login();
											}
										echo '</div>
										</div>';
								}
								$vision_church_options['vision_church_header_contact'] = isset( $vision_church_options['vision_church_header_contact'] ) ? $vision_church_options['vision_church_header_contact'] : '0' ;
								if ( $vision_church_options['vision_church_header_contact'] ){
									$contact_tooltip = isset( $vision_church_options['vision_church_header_contact_text'] ) ? $vision_church_options['vision_church_header_contact_text'] : 'Contact';
									if ( is_user_logged_in() ) {
										global $user_identity;
										$login_text = esc_html__('Welcome ','vision-church') . esc_html($user_identity);
									}
									echo '
										<div class="w-contact-modal wn-header-toggle" data-tooltip="' . esc_html($contact_tooltip) . '">
											<a href="#header-contact-modal" id="wn-contact-modal-icon" data-effect="mfp-zoom-in"><i class="sl-envelope-open"></i></a>
											<div id="header-contact-modal" class="wn-header-contact white-popup mfp-with-anim mfp-hide">';
												// Modal Contact Form
												$header_contact_form = isset($vision_church_options['vision_church_header_form']) ? $vision_church_options['vision_church_header_form'] : '';
												$contact_form_id = esc_html( $header_contact_form );
												echo '
													<div class="wn-header-contact-modal">
														<h3 class="modal-title"> ' . esc_html__( 'Contact Us', 'vision-church' ) . '</h3>
														<br>';
														if ( $header_contact_form ) {
														 echo do_shortcode( '[contact-form-7 id="'.$contact_form_id.'" title="' . esc_attr( 'Contact' ) . '"]' );
														} 
												echo'</div>';
										echo '</div>
										</div>';
								}

							echo '</div>';
						} ?>
				<?php if ( $menu_type != 13 ) { ?>
					</div>
				<?php } ?>
				</header>
<!-- end-header -->