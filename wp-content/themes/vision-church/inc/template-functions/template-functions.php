<?php
// topbar
function vision_church_topbar(){
    $vision_church_options = vision_church_options();
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    $vision_church_options['topbar_elements'] = isset( $vision_church_options['topbar_elements'] ) ? $vision_church_options['topbar_elements'] : '' ;
    $vision_church_options['topbar_elements']['left'] = isset( $vision_church_options['topbar_elements']['left'] ) ? $vision_church_options['topbar_elements']['left'] : '' ;
    $vision_church_options['topbar_elements']['right'] = isset( $vision_church_options['topbar_elements']['right'] ) ? $vision_church_options['topbar_elements']['right'] : '' ;
    $elements_topbar_left = $vision_church_options['topbar_elements']['left'];
    $elements_topbar_right = $vision_church_options['topbar_elements']['right'];
    $vision_church_options['vision_church_topbar_button_link'] = isset($vision_church_options['vision_church_topbar_button_link']) ? $vision_church_options['vision_church_topbar_button_link'] : '';
    $vision_church_options['vision_church_topbar_login'] = isset($vision_church_options['vision_church_topbar_login']) ? $vision_church_options['vision_church_topbar_login'] : '' ;
    $vision_church_options['vision_church_topbar_address'] = isset($vision_church_options['vision_church_topbar_address']) ? $vision_church_options['vision_church_topbar_address'] : '' ;
    $vision_church_options['vision_church_topbar_email'] = isset($vision_church_options['vision_church_topbar_email']) ? $vision_church_options['vision_church_topbar_email'] : 'info@site.com' ;
    $vision_church_options['vision_church_topbar_phone'] = isset($vision_church_options['vision_church_topbar_phone']) ? $vision_church_options['vision_church_topbar_phone'] : '+1 234 56789' ;
    $vision_church_options['vision_church_header_menu_type'] = isset($vision_church_options['vision_church_header_menu_type']) ? $vision_church_options['vision_church_header_menu_type'] : '13' ;
    $vision_church_options['vision_church_topbar_text'] = isset($vision_church_options['vision_church_topbar_text']) ? $vision_church_options['vision_church_topbar_text'] : '' ;

    if ( ! function_exists( 'topbar_button' ) ){
        function topbar_button(){
            $vision_church_options = vision_church_options();
            echo '<a href="' . esc_url_raw( $vision_church_options['vision_church_topbar_button_link'] ) . '" class="topbar-btn">' . $vision_church_options['vision_church_topbar_button_text'] . '</a>';
        }
    }

    if ( ! function_exists( 'topbar_search' ) ){
        function topbar_search(){
          echo '<div id="top-search-form">
                    <a href="javascript:void(0)" class="top-search-form-icon"><i id="top-searchbox-icon" class="fa-search"></i></a>
                        <div id="top-search-form-box" class="top-search-form-box">
                            <form action="'.esc_url(home_url( '/' )).'" method="get">
                                <input type="text" class="top-search-text-box" id="top-search-box" name="s">
                            </form>
                        </div>
                </div>';
        }
    }

    if ( ! function_exists( 'topbar_social' ) ){
        function topbar_social(){
            echo '<div class="socialfollow">';
            get_template_part('parts/social' );
            echo '</div>';
        }
    }

    if ( ! function_exists( 'topbar_login' ) ){
        function topbar_login(){
            $vision_church_options = vision_church_options();
            $color_skin_class = ( isset( $vision_church_options['vision_church_custom_color_skin'] ) || isset( $vision_church_options['vision_church_color_skin'] ) && $vision_church_options['vision_church_color_skin'] != 'e3e3e3' ) ? 'colorskin-custom' : '' ;
            $login_text = isset( $vision_church_options['vision_church_topbar_login_text'] ) ? $vision_church_options['vision_church_topbar_login_text'] : 'Login / Register' ;
            if ( is_user_logged_in() ) {
                global $user_identity;
                $login_text = esc_html__('Welcome ','vision-church') . esc_html($user_identity);
            }
            $login_class =(is_plugin_active('user-pro/index.php'))? 'popup-login':'inlinelb';
            echo '<a href="#w-login" class="' . $login_class . ' topbar-login" target="_self">'.esc_html($login_text).'</a>
            <div style="display:none"><div id="w-login" class="w-login ' . $color_skin_class . '">';
                vision_church_login();
                echo '</div></div>';
        }
    }

    if ( ! function_exists( 'topbar_lang' ) ){
        function topbar_lang(){
            if (is_plugin_active('polylang/polylang.php' )){
                echo '<div class="polylang-flags">';
                pll_the_languages(array('dropdown'=>1));
                echo '</div>';
            }else{
                do_action('wpml_add_language_selector');
            }
        }
    }

    if ( ! function_exists( 'topbar_contact' ) ){
        function topbar_contact(){
            echo'<a class="inlinelb topbar-contact" href="#w-contact" target="_self">'.esc_html__('CONTACT','vision-church').'</a>';
        }
    }

    if ( ! function_exists( 'topbar_address' ) ){
        function topbar_address(){
            $vision_church_options = vision_church_options();
            if( $vision_church_options['vision_church_topbar_address'] )
                echo '<h6><i class="sl-location-pin"></i>'. esc_html($vision_church_options['vision_church_topbar_address']) .'</h6>';
        }
    }

    if ( ! function_exists( 'topbar_email' ) ){
        function topbar_email(){
            $vision_church_options = vision_church_options();
            if( $vision_church_options['vision_church_topbar_email'] )
                echo '<h6><i class="sl-envelope-open"></i>'. esc_html($vision_church_options['vision_church_topbar_email']) .'</h6>';
        }
    }

    if ( ! function_exists( 'topbar_phone' ) ){
        function topbar_phone(){
            $vision_church_options = vision_church_options();
            if( $vision_church_options['vision_church_topbar_phone'] )
                echo '<h6><i class="fa-fax"></i>'. esc_html($vision_church_options['vision_church_topbar_phone']).'</h6>';
        }
    }

    if ( ! function_exists( 'topbar_menu' ) ){
        function topbar_menu(){
            $vision_church_options = vision_church_options();
            if ( has_nav_menu('header-top-menu') ){
                if($vision_church_options['vision_church_header_menu_type']==0){
                    $menuParameters = array('theme_location' => 'header-top-menu','container' => 'false','menu_id' => 'nav','depth' => '5','items_wrap' => '<ul id="%1$s">%3$s</ul>',);
                }else{
                    $menuParameters = array('theme_location' => 'header-top-menu','container' => 'false', 'depth' => '1', 'echo'  => false,);
                }
                echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );
            }
        }
    }

    if ( ! function_exists( 'topbar_text' ) ){
        function topbar_text(){
            $vision_church_options = vision_church_options();
            echo '<div class="top-custom-text">' .wp_kses( $vision_church_options['vision_church_topbar_text'], vision_church_kses() ) . '</div>' ;
        }
    }

    if( $vision_church_options['topbar_elements']['left'] ){
        echo '<div class="top-links lftflot">';
        foreach ($elements_topbar_left as $key=>$value) {

            switch($key) {

                case 'button': topbar_button();
                break;

                case 'search': topbar_search();
                break;

                case 'social': topbar_social();
                break;

                case 'login': topbar_login();
                break;

                case 'language': topbar_lang();
                break;

                case 'contact': topbar_contact();
                break;

                case 'address': topbar_address();
                break;

                case 'email': topbar_email();
                break;

                case 'phone': topbar_phone();
                break;

                case 'menu': topbar_menu();
                break;

                case 'text': topbar_text();
                break;

                }

        }
        echo '</div>';
    }

    if( $vision_church_options['topbar_elements']['right'] ){
        echo '<div class="top-links rgtflot">';
        foreach ($elements_topbar_right as $key=>$value) {

            switch($key) {

                case 'button': topbar_button();
                break;

                case 'search': topbar_search();
                break;

                case 'social': topbar_social();
                break;

                case 'login': topbar_login();
                break;

                case 'language': topbar_lang();
                break;

                case 'contact': topbar_contact();
                break;

                case 'address': topbar_address();
                break;

                case 'email': topbar_email();
                break;

                case 'phone': topbar_phone();
                break;

                case 'menu': topbar_menu();
                break;

                case 'text': topbar_text();
                break;

            }

        }
        echo '</div>';
    }
} // end topbar


// start "header2 > type 12" functions
if ( ! function_exists( 'topheader_menu' ) ) {
	function topheader_menu() {
		$vision_church_options = vision_church_options();
		if ( has_nav_menu('top-header-menu') ){
			if($vision_church_options['vision_church_header_menu_type']==0){
				$menuParameters = array('theme_location' => 'top-header-menu','container' => 'false','menu_id' => 'nav-extra','depth' => '5','items_wrap' => '<ul id="%1$s">%3$s</ul>',);
			}else{
				$menuParameters = array('theme_location' => 'top-header-menu','container' => 'false', 'depth' => '1','menu_id' => 'nav-extra','depth' => '5','items_wrap' => '<ul id="%1$s">%3$s</ul>', 'echo'  => false,);
			}
			echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );
		}
	}
}

if ( ! function_exists( 'topheader_weather' ) ) {
	function topheader_weather() {
		$vision_church_options = vision_church_options();
		$time = date( 'H:i', current_time( 'timestamp', 0 ) ) ;
        $vision_church_options['vision_church_weather_id'] = isset( $vision_church_options['vision_church_weather_id'] ) ? $vision_church_options['vision_church_weather_id'] : '17' ;
		echo '<div class="wtop-weather"><span>' .$time . '</span>' . do_shortcode('[wpc-weather id="'.$vision_church_options['vision_church_weather_id'].'"]') . '</div>';
	}
}

if ( ! function_exists( 'topheader_map' ) ) {
	function topheader_map() {
		$vision_church_options = vision_church_options();
		$map_address = ( isset( $vision_church_options['vision_church_top_header_map_address'] ) && $vision_church_options['vision_church_top_header_map_address'] ) ? $vision_church_options['vision_church_top_header_map_address'] : 'Space+Needle,Seattle+WA';
		echo '<a class="w-top-headaer-link topheader-map" href="https://maps.google.com/maps?q=' . esc_url( $map_address ) . '" data-effect="mfp-zoom-in">' . esc_html('MAP','vision-church') . '<i class="ti-location-pin"></i></a>';
	}
}

if ( ! function_exists( 'topheader_custom_link' ) ) {
	function topheader_custom_link() {
		$vision_church_options = vision_church_options();
        $vision_church_options['vision_church_top_header_clink'] = isset( $vision_church_options['vision_church_top_header_clink'] ) ? $vision_church_options['vision_church_top_header_clink'] : 'http://' ;
        $vision_church_options['vision_church_top_header_ctext'] = isset( $vision_church_options['vision_church_top_header_ctext'] ) ? $vision_church_options['vision_church_top_header_ctext'] : 'Custom Text' ;
		echo '<a href="'. $vision_church_options['vision_church_top_header_clink'] .'" class="w-top-headaer-link topheader-clink" target="_blank">'. $vision_church_options['vision_church_top_header_ctext'] .'</a>';
	}
}

// end "header2 > type 12" functions