<?php
$vision_church_options = vision_church_options();
$hideheader = '';
if( is_page()){
$hideheader =rwmb_meta( 'vision_church_hide_header_meta' );
}
$mobile_sticky = ( isset( $vision_church_options['vision_church_header_sticky_phone'] ) && $vision_church_options['vision_church_header_sticky_phone'] == '1' ) ? ' mobistky ' : '' ;
$mobile_menu_class = ' sm-rgt-mn ';
?>
<header id="header"  class="horizontal-w <?php echo '' . $mobile_sticky;  ?> <?php
$menu_type = isset($vision_church_options['vision_church_header_menu_type']) ? $vision_church_options['vision_church_header_menu_type'] : '13' ;
echo 'w-header-type-' . esc_attr( $menu_type ) .' ';
$vision_church_options['vision_church_header_color_type'] = isset($vision_church_options['vision_church_header_color_type']) ? $vision_church_options['vision_church_header_color_type'] : '' ;
$vision_church_options['vision_church_header_logo_alignment'] = isset($vision_church_options['vision_church_header_logo_alignment']) ? $vision_church_options['vision_church_header_logo_alignment'] : '1' ;
$vision_church_options['vision_church_header_email'] = isset($vision_church_options['vision_church_header_email']) ? $vision_church_options['vision_church_header_email'] : '<strong>info@example.com</strong><br>support@example.com' ;
$vision_church_options['vision_church_header_phone'] = isset($vision_church_options['vision_church_header_phone']) ? $vision_church_options['vision_church_header_phone'] : '<strong>987.654.3216</strong><br>987.654.3217' ;
$vision_church_options['vision_church_header_address'] = isset($vision_church_options['vision_church_header_address']) ? $vision_church_options['vision_church_header_address'] : '<strong>1234 North Avenue Luke Lane</strong><br>South Bend, IN 360001' ;
echo esc_html( $mobile_menu_class );
if($menu_type==9) echo 'box-menu ';
if($menu_type==11) echo 'w-header-type-11 ';
if($menu_type==12) echo 'header-type-12 ';
echo ($hideheader)? 'hi-header ' : '';
echo ' '.$vision_church_options['vision_church_header_color_type']
 ?>">
	<div  class="container">
		<?php if(!$menu_type==0){
			$logo_alignment = $vision_church_options['vision_church_header_logo_alignment'];
			if( 1 == $logo_alignment ) {
				echo '<div class="col-md-3 logo-wrap">';
			} elseif( 2 == $logo_alignment ) {
				echo '<div class="col-md-3 cntmenu-leftside"></div><div class="col-md-6 logo-wrap center">';
			} elseif( 3 == $logo_alignment ) {
				echo '<div class="col-md-3 logo-wrap right">';
			}
		}
		else {
			echo '<div class="col-md-12 logo-wrap center">';
		}
		?>
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
	echo '<a href="'.esc_url(home_url( '/' )).'"><img src="'.esc_url($logo).'" width="'. $logo_width . '" id="img-logo-w1" alt="'.get_bloginfo( "name" ).'" class="img-logo-w1" style="width: '. $logo_width . 'px"></a>';
if(!empty($transparent_logo))
	echo '<a href="'.esc_url(home_url( '/' )).'"><img src="'.esc_url($transparent_logo).'" width="' . (!empty($transparent_logo_width)?$transparent_logo_width:$logo_width) . '" id="img-logo-w2" alt="'.get_bloginfo( "name" ).'" class="img-logo-w2" style="width: ' . $transparent_logo_width . 'px"></a>';
else
	echo '<a href="'.esc_url(home_url( '/' )).'"><img src="'.esc_url($logo).'" width="'. (!empty($transparent_logo_width)?$transparent_logo_width:$logo_width). '" id="img-logo-w2" alt="'.get_bloginfo( "name" ).'" class="img-logo-w2" style="width: '. ( !empty($transparent_logo_width) ? $transparent_logo_width . 'px': $logo_width. 'px' ). '"></a>';
if(!empty($sticky_logo))
	echo '<span class="logo-sticky"><a href="'.esc_url(home_url( '/' )).'"><img src="'.esc_url($sticky_logo).'" width="'. (!empty($sticky_logo_width)?$sticky_logo_width:"150"). '" id="img-logo-w3" alt="'.get_bloginfo( "name" ).'" class="img-logo-w3"></a></span>';
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
<?php } ?>
		</div></div>
	<?php if(!$menu_type==0){
		switch($logo_alignment){
			case 1:
				echo '<div class="col-md-9 alignright"><hr class="vertical-space" />';
			break;
			case 2:
				echo '<div class="col-md-3 right-side">';
			break;
			case 3:
				echo '<div class="col-md-9 left-side"><hr class="vertical-space" />';
			break;
			default:
			echo '';
		}
			$logo_rightside = isset($vision_church_options['vision_church_header_logo_rightside']) ? $vision_church_options['vision_church_header_logo_rightside'] : '2' ;
			if( 1 == $logo_rightside ){
			?>
				<form action="<?php echo esc_url(home_url( '/' )); ?>" method="get">
				<input name="s" type="text" placeholder="<?php esc_html_e('Search...','vision-church') ?>" class="header-saerch" >
				</form>
			<?php }
			elseif(2 == $logo_rightside)
			{ ?>
				<h6><i class="sl-location-pin"></i><span><?php echo '' . $vision_church_options['vision_church_header_email']; ?></span></h6>
				<h6><i class="sl-phone"></i><span><?php echo '' . $vision_church_options['vision_church_header_phone']; ?></span></h6>
				<h6><i class="sl-envelope-open"></i><span><?php echo '' . $vision_church_options['vision_church_header_address']; ?></span></h6>
			<?php }
			elseif(3 == $logo_rightside)
			{
				echo '<div class="header-widget-component wn-toggle">';
				echo '<i class="sl-event wn-click"></i>';
				echo '<div class="booking-content-component wn-content-toggle">';
				if(is_active_sidebar('header-advert'))
				dynamic_sidebar('header-advert');
				if(is_active_sidebar('woocommerce_header'))
				dynamic_sidebar('woocommerce_header');
				echo '</div>';
				echo '</div>';
			}
			?>
		</div>
		<?php } ?>
	</div>
	<?php
	$menu_alignment ='';
	if(!$menu_type==0){
		if($logo_alignment==3 ){
			$menu_alignment='left ';
		}elseif($logo_alignment==2 ){
			$menu_alignment='center ';
		}
	}

	if ( $menu_type == '12' ) { ?>

	<div class="top-header-sec wn-toggle">
		<i class="sl-info wn-click"></i>
		<div class="container wn-content-toggle">
			<div class="col-md-6 col-sm-6">
			<?php
			$vision_church_options['top_header_elements'] = isset( $vision_church_options['top_header_elements'] ) ? $vision_church_options['top_header_elements']['left'] : '' ;
			$vision_church_options['top_header_elements']['left'] = isset( $vision_church_options['top_header_elements']['left'] ) ? $vision_church_options['top_header_elements']['left'] : '' ;
			$vision_church_options['top_header_elements']['right'] = isset( $vision_church_options['top_header_elements']['right'] ) ? $vision_church_options['top_header_elements']['left'] : '' ;
			if( $vision_church_options['top_header_elements']['left'] ){
		        foreach ($vision_church_options['top_header_elements']['left'] as $key=>$value) {
		            switch($key) {

		                case 'top_header_menu': topheader_menu();
		                break;

		                case 'weather': topheader_weather();
		                break;

		                case 'map': topheader_map();
		                break;

		                case 'custom_link': topheader_custom_link();
		                break;

		            }
		        }
			}
			?>
			</div>
			<div class="col-md-6 col-sm-6">
			<?php
			if( $vision_church_options['top_header_elements']['right'] ){
		        foreach ($vision_church_options['top_header_elements']['right'] as $key=>$value) {
		            switch($key) {

		                case 'top_header_menu': topheader_menu();
		                break;

		                case 'weather': topheader_weather();
		                break;

		                case 'map': topheader_map();
		                break;

		                case 'custom_link': topheader_custom_link();
		                break;

		            }
		        }
			}
			?>
			</div>
		</div>
	</div>
	<?php
		}
	?>
	<nav id="nav-wrap" class="nav-wrap2 <?php echo esc_attr( $menu_alignment );
		switch($menu_type){
			case 2:
				echo 'mn4';
				break;
			case 3:
				echo 'mn4 darknavi';
				break;
			case 5:
				echo 'darknavi';
				break;
			default:
				echo '';
		}
	?>">
		<div class="container">
			<?php
			$onepage_menu = '';
			if(is_page()){
				$onepage_menu = rwmb_meta( 'vision_church_onepage_menu_meta' );
			}

				$menu_location = '';
				if($menu_type==0){
					$menu_location = 'header-top-menu';
				}elseif($onepage_menu){
					$menu_location = 'onepage-header-menu';
				}else{
					$menu_location = 'header-menu';
				}
				if ( has_nav_menu( $menu_location ) ) {
					wp_nav_menu( array( 'theme_location' => $menu_location, 'container' => 'false', 'menu_id' => 'nav', 'depth' => '5', 'fallback_cb' => 'wp_page_menu', 'items_wrap' => '<ul id="%1$s">%3$s</ul>',  'walker' => new vision_church_description_walker() ) );
				}

			if( ! function_exists( 'is_plugin_active' ) ) {
				include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
			}
			$vision_church_options['vision_church_wpml_language_switcher'] = isset( $vision_church_options['vision_church_wpml_language_switcher'] ) ? $vision_church_options['vision_church_wpml_language_switcher'] : '2' ;
			if ( is_plugin_active( 'sitepress-multilingual-cms/sitepress.php' ) && $vision_church_options['vision_church_wpml_language_switcher'] == '1' ) {
				do_action('wpml_add_language_selector');
			}
			?>
		</div>
	</nav>

</header>
<!-- end-header -->