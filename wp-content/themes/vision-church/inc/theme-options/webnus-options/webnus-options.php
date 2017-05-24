<?php

    /**
     * ReduxFramework Barebones Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "vision_church_options";

    /**
     * ---> SET ARGUMENTS
     * All the possible arguments for Redux.
     * For full documentation on arguments, please refer to: https://github.com/ReduxFramework/ReduxFramework/wiki/Arguments
     * */

    $theme = wp_get_theme(); // For use with some settings. Not necessary.
	$theme_bg_dir = get_template_directory_uri() . '/images/bgs/bg-pattern/';

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'submenu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Theme Options', 'vision-church' ),
        'page_title'           => esc_html__( 'Theme Options', 'vision-church' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => true,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => 'vision_church_theme_options',
        // Page slug used to denote the panel
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!

        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        //'compiler'             => true,

        'hide_expand'			=> true,

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'light',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */



    /*
     *
     * ---> START SECTIONS
     *
     */

	$ext_path = WP_PLUGIN_DIR . '/webnus-core/theme-options/extensions/';
	Redux::setExtensions( $opt_name, $ext_path );

	/*
     * ---> END ARGUMENTS
     */



    /*
     *
     * ---> START SECTIONS
     *
     */
	$webnus_socials = array (
		'dribbble'		=> 'dribbble',
		'facebook'		=> 'facebook',
		'flickr'		=> 'flickr',
		'foursquare'	=> 'foursquare',
		'github'		=> 'github',
		'google-plus'	=> 'google-plus',
		'instagram'		=> 'instagram',
		'lastfm'		=> 'lastfm',
		'linkedin'		=> 'linkedin',
		'pinterest'		=> 'pinterest',
		'reddit'		=> 'reddit',
		'soundcloud'	=> 'soundcloud',
		'spotify'		=> 'spotify',
		'tumblr'		=> 'tumblr',
		'twitter'		=> 'twitter',
		'vimeo'			=> 'vimeo',
		'vine'			=> 'vine',
		'yelp'			=> 'yelp',
		'yahoo'			=> 'yahoo',
		'youtube'		=> 'youtube',
		'wordpress'		=> 'wordpress',
		'dropbox'		=> 'dropbox',
		'evernote'		=> 'evernote',
		'envato'		=> 'envato',
		'skype'			=> 'skype',
		'feed'			=> 'feed',
	);
	$webnus_languages = array(
	'en'		=> 'en',
	'uk'		=> 'uk',
	'fa'		=> 'fa',
	'ue'		=> 'ue',
	'us'		=> 'us',
	);
	// SSL VALUE
	$backend_protocol = ( is_ssl() ) ? 'https' : 'http' ;

	$fonts = array (
		'Open Sans,arial,helvatica' => 'Open Sans',
		'BebasRegular,arial,helvatica' => 'Bebas Regular',
		'LeagueGothicRegular,arial,helvatica' => 'League Gothic Regular',
		'Arial,helvetica,sans-serif' => 'Arial',
		'helvetica,sans-serif,arial' => 'Helvatica',
		'sans-serif,arial,helvatica' => 'Sans Serif',
		'verdana,san-serif,helvatica' => 'Verdana' ,
		'custom-font-1' => 'vision_church_custom_font1',
		'Custom Font 2' => 'vision_church_custom_font2',
		'Custom Font 3' => 'vision_church_custom_font3',
		'typekit-font-1' => 'vision_church_typekit_font1',
		'typekit-font-2' => 'vision_church_typekit_font2',
		'typekit-font-3' => 'vision_church_typekit_font3',
	);

    $keyses = array(
            'a' => array(
                'href' => array(),
                'title' => array(),
                'target' => array(),
                ),
            'br' => array(),
            'em' => array(),
            'strong' => array(),
            'span' => array(
                'class' => array(),
                ),
            );

    // -> START Layout Fields
    Redux::setSection( $opt_name, array(
        'title'		=> esc_html__( 'Layout', 'vision-church' ),
        'desc'		=> esc_html__( 'Here are general settings of the theme:', 'vision-church' ),
        'id'		=> 'layout_opts',
        'icon'		=> 'ti-layout',
        'fields'	=> array(
			array(
				'title'		=> esc_html__( 'Responsive', 'vision-church' ),
				'subtitle'	=> esc_html__( 'Disable this option in case you don\'t need a responsive website.', 'vision-church' ),
				'id'		=> 'vision_church_enable_responsive',
				'type'		=> 'switch',
				'default'	=> '1',
				'on'		=> esc_html__( 'Enabled', 'vision-church' ),
				'off'		=> esc_html__( 'Disabled', 'vision-church' ),
			),
			array(
				'title'		=> esc_html__( 'CSS Minifyer', 'vision-church' ),
				'subtitle'	=> esc_html__( 'Enable this option to minify your styles. It\'ll decrease size of your style-sheet files to speed up your website.', 'vision-church' ),
				'id'		=> 'vision_church_css_minifier',
				'type'		=> 'switch',
				'default'	=> '0',
				'on'		=> esc_html__( 'Enabled', 'vision-church' ),
				'off'		=> esc_html__( 'Disabled', 'vision-church' ),
			),
            array(
                'title'     => esc_html__( 'Smooth Scroll', 'vision-church' ),
                'subtitle'  => esc_html__( 'By enabling this option, your page will have smooth scrolling effect.','vision-church' ),
                'id'        => 'vision_church_enable_smoothscroll',
                'type'      => 'switch',
                'default'   => '1',
                'on'        => esc_html__( 'Enabled', 'vision-church' ),
                'off'       => esc_html__( 'Disabled', 'vision-church' ),
            ),
			array(
				'title'		=> esc_html__( 'Layout', 'vision-church' ),
				'subtitle'	=> esc_html__( 'Select boxed or wide layout. in Boxed you can set background from "Styling Options > Background".','vision-church' ),
				'id'		=> 'vision_church_background_layout',
				'type'		=> 'button_set',
				'default'	=> 'wide',
				'options'	=> array(
					'wide'			 => esc_html__( 'Wide', 'vision-church' ),
					'boxed-wrap' => esc_html__( 'Boxed', 'vision-church' ),
				),
			),
            array(
                'title'     => esc_html__( 'Wide Container', 'vision-church' ),
                'subtitle'  => esc_html__( 'Enable this option to have Wide Container in large screen', 'vision-church' ),
                'id'        => 'vision_church_wide_screen',
                'type'      => 'switch',
                'default'   => '1',
                'on'        => esc_html__( 'Enabled', 'vision-church' ),
                'off'       => esc_html__( 'Disabled', 'vision-church' ),
                'required'  => array( 'vision_church_background_layout', '=', 'wide' ),
            ),
			array(
				'title'		=> esc_html__( 'Container max-width', 'vision-church' ),
				'subtitle'	=> esc_html__( 'You can define width of your website. ( Max width: 1170px )','vision-church' ),
				'id'		=> 'vision_church_container_width',
				'type'		=> 'text',
			),
        ),
    ) );


	// -> START Header Options Fields
    Redux::setSection( $opt_name, array(
        'title'		=> esc_html__( 'Header Options', 'vision-church' ),
        'desc'		=> esc_html__( 'Everything about headers, Logo, Menus and contact information are here:', 'vision-church' ),
        'id'		=> 'header_opts',
        'icon'		=> 'ti-layout-tab-window',
	));

	Redux::setSection( $opt_name, array(
	'title'            => esc_html__( 'Logo', 'vision-church' ),
	'id'               => 'header_general_opts',
	'subsection'       => true,
	'fields'			=> array(
			array(
				'title'		=> esc_html__( 'Logo', 'vision-church' ),
				'subtitle'	=> esc_html__( 'Choose an image file for your logo. For Retina displays please add Image in large size and set custom width.', 'vision-church' ),
				'id'		=> 'vision_church_logo',
				'type'		=> 'media',
				'url'		=> true,
			),
			array(
				'title'		=> esc_html__( 'Logo width', 'vision-church' ),
				'id'		=> 'vision_church_logo_width',
				'type'		=> 'text',
				'validate'	=> 'numeric',
			),
			array(
				'title'		=> esc_html__( 'Transparent logo', 'vision-church' ),
				'subtitle'	=> esc_html__( 'Choose an image file for your Transparent header logo and Header Type 11', 'vision-church' ),
				'id'		=> 'vision_church_transparent_logo',
				'type'		=> 'media',
				'url'		=> true,
			),
			array(
				'title'		=> esc_html__( 'Transparent logo width', 'vision-church' ),
				'id'		=> 'vision_church_transparent_logo_width',
				'type'		=> 'text',
				'validate'	=> 'numeric',
			),
			array(
				'title'		=> esc_html__( 'Header padding-top', 'vision-church' ),
				'id'		=> 'vision_church_header_padding_top',
				'type'		=> 'text',
			),
			array(
				'title'		=> esc_html__( 'Header padding-bottom', 'vision-church' ),
				'id'		=> 'vision_church_header_padding_bottom',
				'type'		=> 'text',
			),
			array(
				'title'		=> esc_html__( 'Text logo', 'vision-church' ),
				'id'		=> 'vision_church_slogan',
				'subtitle'	=> esc_html__( 'If you do not set logo, this text appears instead of that.', 'vision-church' ),
				'type'		=> 'text',
			),
        ),
    ) );

	Redux::setSection( $opt_name, array(
		'title'            => __( 'Header Layout', 'vision-church' ),
		'id'               => 'header_layout_opts',
		'subsection'       => true,
		'fields'	=> array(
			array(
				'title'		=> esc_html__( 'Select Header Layout', 'vision-church' ),
				'id'		=> 'vision_church_header_menu_type',
				'type'		=> 'image_select',
				'options'	=> array(
					'0' => array(
						'alt'	=> 'Header Type 0',
						'img'	=> get_template_directory_uri() . '/inc/theme-options/webnus-options/assets/img/menu0.png',
						'class'	=> 'header-select-image',
					),
					'1' => array(
						'alt'	=> 'Header Type 1',
						'img'	=> get_template_directory_uri() . '/inc/theme-options/webnus-options/assets/img/menu1.png',
						'class'	=> 'header-select-image',
					),
					'2' => array(
						'alt'	=> 'Header Type 2',
						'img'	=> get_template_directory_uri() . '/inc/theme-options/webnus-options/assets/img/menu2.png',
						'class'	=> 'header-select-image',
					),
					'3' => array(
						'alt'	=> 'Header Type 3',
						'img'	=> get_template_directory_uri() . '/inc/theme-options/webnus-options/assets/img/menu3.png',
						'class'	=> 'header-select-image',
					),
					'4' => array(
						'alt'	=> 'Header Type 4',
						'img'	=> get_template_directory_uri() . '/inc/theme-options/webnus-options/assets/img/menu4.png',
						'class'	=> 'header-select-image',
					),
					'5' => array(
						'alt'	=> 'Header Type 5',
						'img'	=> get_template_directory_uri() . '/inc/theme-options/webnus-options/assets/img/menu5.png',
						'class'	=> 'header-select-image',
					),
					'6' => array(
						'alt'	=> 'Header Type 6',
						'img'	=> get_template_directory_uri() . '/inc/theme-options/webnus-options/assets/img/menu6.png',
						'class'	=> 'header-select-image',
					),
					'7' => array(
						'alt'	=> 'Header Type 7',
						'img'	=> get_template_directory_uri() . '/inc/theme-options/webnus-options/assets/img/menu7.png',
						'class'	=> 'header-select-image',
					),
					'8' => array(
						'alt'	=> 'Header Type 8',
						'img'	=> get_template_directory_uri() . '/inc/theme-options/webnus-options/assets/img/menu8.png',
						'class'	=> 'header-select-image',
					),
					'9' => array(
						'alt'	=> 'Header Type 9',
						'img'	=> get_template_directory_uri() . '/inc/theme-options/webnus-options/assets/img/menu9.png',
						'class'	=> 'header-select-image',
					),
					'10' => array(
						'alt'	=> 'Header Type 10',
						'img'	=> get_template_directory_uri() . '/inc/theme-options/webnus-options/assets/img/menu10.png',
						'class'	=> 'header-select-image',
					),
					'11' => array(
						'alt'	=> 'Header Type 11',
						'img'	=> get_template_directory_uri() . '/inc/theme-options/webnus-options/assets/img/menu11.png',
						'class'	=> 'header-select-image',
					),
					'12' => array(
						'alt'	=> 'Header Type 12',
						'img'	=> get_template_directory_uri() . '/inc/theme-options/webnus-options/assets/img/menu12.png',
						'class'	=> 'header-select-image',
					),
					'13' => array(
						'alt'	=> 'Header Type 13',
						'img'	=> get_template_directory_uri() . '/inc/theme-options/webnus-options/assets/img/menu13.png',
						'class'	=> 'header-select-image',
					),
				),
				'default'		=> '13',
				'full_width'	=> true,
			),
			array(
				'id'     => 'opt-notice-warning',
				'type'   => 'info',
				'notice' => false,
				'style'  => 'warning',
				'title'  => __( 'Set Menus', 'vision-church' ),
				'desc'   => __( 'After saving your setting, please go to "Appearance > Menus" and create menus then set them to Duplex Menu Left and Right.', 'vision-church' ),
				'required'  => array( 'vision_church_header_menu_type', '=', '8' ),
			),
			array(
				'title'		=> esc_html__( 'Submenu Style', 'vision-church' ),
				'subtitle'	=> esc_html__( 'For Header Menu and Topbar Menu', 'vision-church' ),
				'id'		=> 'vision_church_dark_submenu',
				'type'		=> 'button_set',
				'default'	=> '2',
				'options' => array(
					'1' => 'Light',
					'2' => 'Dark',
				 ),
			),

            array(
                'title'     => __('Hamburger Menu Toggle', 'vision-church'),
                'id'        => 'vision_church_header_hamburger_menu_enable',
                'subtitle'  => __('This option shows an icon at the end of the header menu.', 'vision-church'),
                'type'      => 'button_set',
                'default'   => '0',
                'options'   => array(
                	'0'	=> esc_html__( 'Disabled', 'vision-church' ),
                	'1'	=> esc_html__( 'Toggle', 'vision-church' ),
                	'2'	=> esc_html__( 'Full', 'vision-church' ),
                ),
                'required'  => array( 'vision_church_header_menu_type', '=', array( '1','10','13', ) ),
            ),

            array(
                'title'     => esc_html__( 'Hamburger Menu Background Color', 'vision-church'),
                'id'        => 'vision_church_hamburger_menu_bgcolor',
                'type'      => 'color_rgba',
                'output'    => array( '.wn-ht #hamburger-menu.wn-hamuburger-bg','.wn-hamburger-wrap.fat-nav.wn-hamuburger-bg' ),
                'mode'      => 'background',
                'options'       => array(
                    'clickout_fires_change'     => true,
                ),
                'required'  => array(
                        array('vision_church_header_hamburger_menu_enable', '=', array( '1','2' ) ),
                        array('vision_church_header_menu_type', '=', array( '1','10','13', )),
                ),
            ),

            array(
                'title'     => esc_html__( 'Hamburger Menu Background Color Style', 'vision-church'),
                'id'        => 'vision_church_hamburger_menu_bgcolor_style',
                'type'      => 'button_set',
                'default'   => '2',
                'options'   => array(
                    '1' => esc_html__( 'Dark', 'vision-church' ),
                    '2' => esc_html__( 'Light', 'vision-church' ),
                ),
                'required'  => array(
                        array('vision_church_header_hamburger_menu_enable', '=', array( '1','2' ) ),
                        array('vision_church_header_menu_type', '=', array( '1','10','13', )),

                ),
            ),


			array(
				'title'		=> esc_html__( 'Header Background Image', 'vision-church' ),
				'id'		=> 'vision_church_header_background',
				'type'		=> 'media',
				'url'		=> true,
				'required'  => array( 'vision_church_header_menu_type', '=', '6' ),
			),

            array(
                'id'            => 'top_header_elements',
                'type'          => 'sorter',
                'title'         => 'Extra Section (on top of menu items)',
                'desc'          => esc_html__('You can set value of elements in below sections.', 'vision-church'),
                'compiler'      => 'true',
                'full_width'    => true,
                'options'       => array(
                    'disabled'  => array(
                        'top_header_menu'   => 'Top Header Menu',
                        'weather'           => 'Weather',
                        'map'               => 'Map',
                        'custom_link'       => 'Custom Link',
                    ),
                    'left'      => array(),
                    'right'     => array(),
                ),
                'required'  => array( 'vision_church_header_menu_type', '=', '12' ),
            ),

            array(
                'title'     => esc_html__( 'Weather Post ID', 'vision-church' ),
                'type'      => 'text',
                'id'        => 'vision_church_weather_id',
                'default'   => '17',
                'required'  => array( 'vision_church_header_menu_type', '=', '12' ),
            ),

            array(
                'title'     => esc_html__( 'Custom Link Text', 'vision-church' ),
                'type'      => 'text',
                'id'        => 'vision_church_top_header_ctext',
                'default'   => 'Custom Text',
                'required'  => array( 'vision_church_header_menu_type', '=', '12' ),
            ),

            array(
                'title'     => esc_html__( 'Custom Link Address', 'vision-church' ),
                'type'      => 'text',
                'id'        => 'vision_church_top_header_clink',
                'default'   => 'http://',
                'required'  => array( 'vision_church_header_menu_type', '=', '12' ),
            ),

            array(
                'title'     => esc_html__( 'Map Address', 'vision-church' ),
                'type'      => 'text',
                'id'        => 'vision_church_top_header_map_address',
                'default'   => 'Space+Needle,Seattle+WA',
                'required'  => array( 'vision_church_header_menu_type', '=', '12' ),
            ),


			array(
				'id'		=> 'vision_church_header_logo_alignment',
				'type'		=> 'button_set',
				'title'		=> __('Logo Alignment', 'vision-church'),
				'subtitle'	=> __('This option changes the position of the logo on top of the header.', 'vision-church'),
				'options'	=> array(
					'1'		=> 'Left',
					'2'		=> 'Center',
					'3'		=> 'Right'
				 ),
				'default'	=> '1',
				'required'  => array( 'vision_church_header_menu_type', '=', array('2','3','4','5','9','12') ),
			),
			array(
				'id'		=> 'vision_church_header_search_enable',
				'title'		=> __('Search in Header', 'vision-church'),
				'subtitle'	=> __('This option shows a search icon at the end of the header menu.', 'vision-church'),
				'type'		=> 'switch',
				'on'		=> esc_html__( 'Enabled', 'vision-church' ),
				'off'		=> esc_html__( 'Disabled', 'vision-church' ),
				'default'	=> '1',
				'required'  => array( 'vision_church_header_menu_type', '=', array('1','13') ),
			),

            array(
                'title'     => esc_html__( 'Search Tooltip Text', 'vision-church' ),
                'id'        => 'vision_church_header_search_text',
                'type'      => 'text',
                'default'   => 'Search',
                'required'  => array(
                        array('vision_church_header_search_enable', '=', '1'),
                        array('vision_church_header_menu_type', '=', '13'),

                ),
            ),

			array(
				'title'		=> esc_html__( 'Header Login Modal', 'vision-church' ),
				'id'		=> 'vision_church_header_login',
				'subtitle'	=> __('This option shows a login modal button at the end of the header menu.', 'vision-church'),
				'type'		=> 'switch',
				'on'		=> esc_html__( 'Enabled', 'vision-church' ),
				'off'		=> esc_html__( 'Disabled', 'vision-church' ),
				'default'	=> '0',
				'required'  => array( 'vision_church_header_menu_type', '=', array('13') ),
			),

            array(
                'title'     => esc_html__( 'Login Tooltip Text', 'vision-church' ),
                'id'        => 'vision_church_header_login_text',
                'type'      => 'text',
                'default'   => 'Login',
                'required'  => array( 'vision_church_header_login', '=', '1' ),
            ),

            array(
                'title'     => esc_html__( 'Header Contact Modal', 'vision-church' ),
                'id'        => 'vision_church_header_contact',
                'subtitle'  => __('This option shows a contact modal button at the end of the header menu.', 'vision-church'),
                'type'      => 'switch',
                'on'        => esc_html__( 'Enabled', 'vision-church' ),
                'off'       => esc_html__( 'Disabled', 'vision-church' ),
                'default'   => '0',
                'required'  => array( 'vision_church_header_menu_type', '=', array('13') ),
            ),

            array(
                'title'     => esc_html__( 'Contact Tooltip Text', 'vision-church' ),
                'id'        => 'vision_church_header_contact_text',
                'type'      => 'text',
                'default'   => 'Contact',
                'required'  => array( 'vision_church_header_contact', '=', array('1') ),
            ),

            array(
                'title'     => esc_html__( 'Select Modal Contact Form', 'vision-church' ),
                'id'        => 'vision_church_header_form',
                'type'      => 'select',
                'data'      => 'posts',
                'args'      => array( 'post_type' => 'wpcf7_contact_form', ),
                'required'  => array( 'vision_church_header_contact', '=', array('1') ),
            ),

            array(
                'title'     => esc_html__( 'Header Share Modal', 'vision-church' ),
                'id'        => 'vision_church_header_share',
                'subtitle'  => __('This option shows a share modal button at the end of the header menu. You should insert at least one social (in Social Networks section) to display this option.', 'vision-church'),
                'type'      => 'switch',
                'on'        => esc_html__( 'Enabled', 'vision-church' ),
                'off'       => esc_html__( 'Disabled', 'vision-church' ),
                'default'   => '1',
                'required'  => array( 'vision_church_header_menu_type', '=', array('13') ),
            ),

            array(
                'title'     => esc_html__( 'Share Tooltip Text', 'vision-church' ),
                'id'        => 'vision_church_header_share_text',
                'type'      => 'text',
                'default'   => 'Share',
                'required'  => array( 'vision_church_header_share', '=', '1' ),
            ),

			array(
				'id'		=> 'vision_church_header_woocart_enable',
				'title'		=> __('Wocommerce cart in Header', 'vision-church'),
				'subtitle'	=> __('This option shows a woocommerce cart icon at top of the header menu.', 'vision-church'),
				'type'		=> 'switch',
				'on'		=> esc_html__( 'Enabled', 'vision-church' ),
				'off'		=> esc_html__( 'Disabled', 'vision-church' ),
				'default'	=> '0',
				'required'  => array( 'vision_church_header_menu_type', '=', array('1','10','11') ),
			),

			array(
				'id'		=> 'vision_church_header_logo_rightside',
				'title'		=> __('Header Next Side Space', 'vision-church'),
				'type'		=> 'button_set',
				'options'	=> array(
					'0'		=> 'None',
					'1'		=> 'Search Box',
					'2'		=> 'Contact Information',
					'3'		=> 'Header Sidebar'
				 ),
				'default'	=> '2',
				'required'  => array( 'vision_church_header_menu_type', '=', array('2','3','4','5','9','11','12') ),
			),
			array(
				'id'		=> 'vision_church_header_address',
				'title'		=> __('Header Address', 'vision-church'),
				'type'		=> 'textarea',
				'default'	=> '<strong>1234 North Avenue Luke Lane</strong><br>South Bend, IN 360001',
				'allowed_html' => array(
					'a' => array(
						'href' => array(),
						'title' => array()
					),
					'br'	=> array(),
					'em'	=> array(),
					'strong'=> array()
				),
				'required'  => array( 'vision_church_header_logo_rightside', '=', array('2') ),
			),
			array(
				'id'		=> 'vision_church_header_phone',
				'title'		=> __('Header Phone Number', 'vision-church'),
				'type'		=> 'textarea',
				'default'	=> '<strong>987.654.3216</strong><br>987.654.3217',
				'allowed_html' => array(
					'a' => array(
						'href' => array(),
						'title' => array()
					),
					'br' => array(),
					'em' => array(),
					'strong' => array()
				),
				'required'	=> array( 'vision_church_header_logo_rightside', '=', array('2') ),
			),
			array(
				'id'		=> 'vision_church_header_email',
				'title'		=> __('Header Email Address', 'vision-church'),
				'type'		=> 'textarea',
				'default'	=> '<strong>info@example.com</strong><br>support@example.com',
				'allowed_html' => array(
					'a' => array(
						'href' => array(),
						'title' => array()
					),
					'br' => array(),
					'em' => array(),
					'strong' => array()
				),
				'required'	=> array( 'vision_church_header_logo_rightside', '=', array('2') ),
			),
            array(
                'title'     => esc_html__( 'WPML Language Switcher', 'vision-church' ),
                'id'        => 'vision_church_wpml_language_switcher',
                'type'      => 'switch',
                'default'   => '2',
                'on'        => esc_html__( 'Enable', 'vision-church' ),
                'off'       => esc_html__( 'Disable', 'vision-church' ),
                'required'  => array( 'vision_church_header_menu_type', '=', array('12') ),
            ),
            array(
                'title'     => esc_html__( 'Mobile Menu', 'vision-church' ),
                'subtitle'  => 'Choose between two type of menu style for mobile and tablet sizes.',
                'id'        => 'vision_church_header_menu_icon',
                'type'      => 'image_select',
                'options'   => array(
                    'sm-rgt-ms'      => array(
                        'alt'  => 'Modern',
                        'img'  => get_template_directory_uri() . '/inc/theme-options/webnus-options/assets/img/menu-icon1.png'
                    ),
                    ''      => array(
                        'alt'  => 'Classic',
                        'img'  => get_template_directory_uri() . '/inc/theme-options/webnus-options/assets/img/menu-icon2.png'
                    ),

                ),
                'default'   => 'sm-rgt-ms',
            ),
		),
	));

	Redux::setSection( $opt_name, array(
	'title'            => __( 'Sticky Menu', 'vision-church' ),
	'id'               => 'header_menu_opts',
	'subsection'       => true,
	'fields'	=> array(
			array(
				'title'		=> esc_html__( 'Sticky Menu', 'vision-church' ),
				'subtitle'	=> esc_html__( 'Sticky Menu is a fixed header when scrolling the page.By enabling this option when you are scrolling, the header menu will scroll too.', 'vision-church' ),
				'id'		=> 'vision_church_header_sticky',
				'type'		=> 'switch',
				'default'	=> '0',
				'on'		=> esc_html__( 'Enabled', 'vision-church' ),
				'off'		=> esc_html__( 'Disabled', 'vision-church' ),
			),
			array(
				'title'		=> esc_html__( 'Sticky Menu In Phone', 'vision-church' ),
				'id'		=> 'vision_church_header_sticky_phone',
				'type'		=> 'switch',
				'default'	=> '0',
				'on'		=> esc_html__( 'Enabled', 'vision-church' ),
				'off'		=> esc_html__( 'Disabled', 'vision-church' ),
			),
			array(
				'title'		=> esc_html__( 'Sticky Menu logo', 'vision-church' ),
				'subtitle'	=> esc_html__( 'Use this option to upload a logo which will be used when header is on sticky state.', 'vision-church' ),
				'id'		=> 'vision_church_sticky_logo',
				'type'		=> 'media',
				'url'		=> true,
				'required'  => array( 'vision_church_header_sticky', '=', '1' ),
			),
			array(
				'title'		=> esc_html__( 'Sticky Menu logo width', 'vision-church' ),
				'id'		=> 'vision_church_sticky_logo_width',
				'type'		=> 'text',
				'validate'	=> 'numeric',
				'required'  => array( 'vision_church_header_sticky', '=', '1' ),
			),

			array(
				'title'		=> esc_html__( 'Scrolls value to sticky the header', 'vision-church' ),
				'subtitle'	=> esc_html__( 'Fill your desired amount which by scrolling that amount, sticky menu will appear.', 'vision-church' ),
				'type'		=> 'text',
				'id'		=> 'vision_church_header_sticky_scrolls',
				'validate'	=> 'numeric',
				'default'	=> '380',
				'required'  => array( 'vision_church_header_sticky', '=', '1' ),
			),
		),
    ) );


	Redux::setSection( $opt_name, array(
	'title'            => __( 'Topbar', 'vision-church' ),
	'id'               => 'topbar_opts',
	'subsection'       => true,
	'fields'	=> array(
			array(
				'title'		=> esc_html__( 'TopBar', 'vision-church' ),
				'subtitle'	=> esc_html__( 'Top bar is the topmost location in your website that you can place special elements in.', 'vision-church' ),
				'id'		=> 'vision_church_header_topbar_enable',
				'type'		=> 'switch',
				'default'	=> '2',
				'on'		=> esc_html__( 'Enabled', 'vision-church' ),
				'off'		=> esc_html__( 'Disabled', 'vision-church' ),
			),

			array(
				'title'		=> esc_html__( 'Background Color', 'vision-church' ),
				'subtitle'	=> esc_html__( 'This option changes the background color of Topbar.', 'vision-church' ),
				'id'		=> 'vision_church_topbar_background_color',
				'type'		=> 'color',
				'output'	=> array(
					'background-color' => '#wrap .top-bar',
				),
			),

            array(
                'title'     => esc_html__( 'Topbar Backgruond Color Style', 'vision-church'),
                'id'        => 'vision_church_topbar_bgcolor_style',
                'type'      => 'button_set',
                'default'   => '1',
                'options'   => array(
                    '1' => esc_html__( 'Dark', 'vision-church' ),
                    '2' => esc_html__( 'Light', 'vision-church' ),
                ),
            ),

			array(
				'title'		=> esc_html__( 'Fixed TopBar', 'vision-church' ),
				'id'		=> 'vision_church_topbar_fixed',
				'type'		=> 'switch',
				'default'	=> '0',
				'on'		=> esc_html__( 'Enabled', 'vision-church' ),
				'off'		=> esc_html__( 'Disabled', 'vision-church' ),
			),

            array(
                'id'            => 'topbar_elements',
                'type'          => 'sorter',
                'title'         => 'Topbar Elements',
                'desc'          => esc_html__('You can set value of elements in below sections.', 'vision-church'),
                'compiler'      => 'true',
                'full_width'    => true,
                'options'       => array(
                    'disabled' => array(
                        'search'    => 'Search',
                        'social'    => 'Social Icons',
                        'login'     => 'Login Modal',
                        'contact'   => 'Contact Modal',
                        'address'   => 'Contact Addresse',
                        'email'     => 'Contact Email Address',
                        'text'      => 'Custom Text',
                        'phone'     => 'Contact Phone Number',
                        'menu'      => 'Topbar Menu',
                        'language'  => 'Language Bar',
                        'button'    => 'Custom Button',
                    ),
                    'left'  => array(),
                    'right'  => array(),
                ),
            ),

			array(
				'title'		=> esc_html__( 'Login Modal Link Text', 'vision-church' ),
				'id'		=> 'vision_church_topbar_login_text',
				'type'		=> 'text',
				'default'	=> 'Login / Register',
			),

			array(
				'title'		=> esc_html__( 'Select Modal Contact Form', 'vision-church' ),
				'id'		=> 'vision_church_topbar_form',
				'type'		=> 'select',
				'data'      => 'posts',
                'args'      => array( 'post_type' => 'wpcf7_contact_form', ),
			),

			array(
				'title'		=> esc_html__( 'Contact Addresse', 'vision-church' ),
				'type'		=> 'text',
				'id'		=> 'vision_church_topbar_address',
				'default'	=> '',
			),

			array(
				'title'		=> esc_html__( 'Contact Phone Number', 'vision-church' ),
				'type'		=> 'text',
				'id'		=> 'vision_church_topbar_phone',
				'default'	=> '+1 234 56789',
			),

			array(
				'title'		=> esc_html__( 'Contact Email Address', 'vision-church' ),
				'type'		=> 'text',
				'id'		=> 'vision_church_topbar_email',
				'default'	=> 'info@site.com',
			),

			array(
				'title'		=> esc_html__( 'Custom Button Text', 'vision-church' ),
				'id'		=> 'vision_church_topbar_button_text',
				'type'		=> 'text',
			),

			array(
				'title'		=> esc_html__( 'Custom Button Link URL', 'vision-church' ),
				'id'		=> 'vision_church_topbar_button_link',
				'type'		=> 'text',
			),

			array(
				'title'		=> esc_html__( 'Your Custom Text', 'vision-church' ),
				'subtitle'	=> esc_html__( 'Insert any text', 'vision-church' ),
				'id'		=> 'vision_church_topbar_text',
				'type'		=> 'text',
			),
		),
    ) );

	Redux::setSection( $opt_name, array(
	'title'            => __( 'Toggle Top Area', 'vision-church' ),
	'id'               => 'toggle_top_area_opts',
	'subsection'       => true,
	'fields'	=> array(
			array(
				'title'		=> esc_html__( 'Toggle Top Area', 'vision-church' ),
				'subtitle'	=> esc_html__( 'It loads a small plus icon to the top right corner of your website.By clicking on it, it opens and shows your content that you set before.','vision-church' ),
				'id'		=> 'vision_church_toggle_toparea_enable',
				'type'		=> 'switch',
				'default'	=> 0,
				'on'		=> esc_html__( 'Show', 'vision-church' ),
				'off'		=> esc_html__( 'Hide', 'vision-church' ),
			),
		),
    ) );

	Redux::setSection( $opt_name, array(
	'title'            => __( 'Admin Login Logo', 'vision-church' ),
	'id'               => 'admin_logo_opts',
	'subsection'       => true,
	'fields'	=> array(
			array(
				'title'		=> esc_html__( 'Admin Login Logo', 'vision-church' ),
				'subtitle'	=> esc_html__( 'It belongs to the back-end of your website to log-in to admin panel.', 'vision-church' ),
				'id'		=> 'vision_church_admin_login_logo',
				'type'		=> 'media',
				'url'		=> true,
			),
		),
    ) );

	// -> START Footer Options Fields
	Redux::setSection( $opt_name, array(
		'title'		=> esc_html__( 'Footer Options', 'vision-church' ),
		'id'		=> 'start_footer_opts',
		'icon'		=> 'ti-layout-accordion-merged',
	) );

	Redux::setSection( $opt_name, array(
		'title'		=> esc_html__( 'Footer Top Area', 'vision-church' ),
		'id'		=> 'footer_top_area_opts',
		'subsection'=> true,
		'fields'	=> array(
			array(
				'title'		=> esc_html__('Footer Social Bar', 'vision-church'),
				'subtitle'	=> esc_html__('Set in Social Networks Tab.', 'vision-church'),
				'id'		=> 'vision_church_footer_social_bar',
				'type'		=> 'switch',
				'default'	=> '0',
				'on'		=> esc_html__( 'Show', 'vision-church' ),
				'off'		=> esc_html__( 'Hide', 'vision-church' ),
			),
			array(
				'title'		=> esc_html__('Footer Instagram Bar', 'vision-church'),
				'id'		=> 'vision_church_footer_instagram_bar',
				'type'		=> 'switch',
				'default'	=> '0',
				'on'		=> esc_html__( 'Show', 'vision-church' ),
				'off'		=> esc_html__( 'Hide', 'vision-church' ),
			),
			array(
				'title'		=> esc_html__('Instagram Username', 'vision-church'),
				'id'		=> 'vision_church_footer_instagram_username',
				'type'		=> 'text',
				'required'  => array( 'vision_church_footer_instagram_bar', '=', '1' ),
			),
			array(
				'title'		=> esc_html__('Instagram Access Token', 'vision-church'),
				'subtitle'	=> wp_kses( __('Get the this information <a target="_blank" href="http://www.pinceladasdaweb.com.br/instagram/access-token/">here</a>.', 'vision-church'), $keyses ),
				'id'		=> 'vision_church_footer_instagram_access',
				'type'		=> 'text',
				'required'  => array( 'vision_church_footer_instagram_bar', '=', '1' ),
			),
			array(
				'title'		=> esc_html__('Footer Subscribe Bar', 'vision-church'),
				'id'		=> 'vision_church_footer_subscribe_bar',
				'type'		=> 'switch',
				'default'	=> '0',
				'on'		=> esc_html__( 'Show', 'vision-church' ),
				'off'		=> esc_html__( 'Hide', 'vision-church' ),
			),
			array(
				'title'		=> esc_html__('Footer Subscribe Text', 'vision-church'),
				'id'		=> 'vision_church_footer_subscribe_text',
				'type'		=> 'text',
				'required'  => array( 'vision_church_footer_subscribe_bar', '=', '1' ),
			),
			array(
				'title'		=> esc_html__('Subscribe Service', 'vision-church'),
				'id'		=> 'vision_church_footer_subscribe_type',
				'type'		=> 'button_set',
				'default'	=> 'FeedBurner',
				'options'	=> array(
					'FeedBurner'	=> esc_html__( 'FeedBurner', 'vision-church' ),
					'MailChimp'		=> esc_html__( 'MailChimp', 'vision-church' ),
				),
				'required'  => array( 'vision_church_footer_subscribe_bar', '=', '1' ),
			),
			array(
				'title'		=> esc_html__('Feedburner ID', 'vision-church'),
				'id'		=> 'vision_church_footer_feedburner_id',
				'type'		=> 'text',
				'required'  => array( 'vision_church_footer_subscribe_type', '=', 'FeedBurner' ),
			),
			array(
				'title'		=> esc_html__('Mailchimp URL', 'vision-church'),
				'sub_desc'	=> esc_html__('Mailchimp form action URL', 'vision-church'),
				'id'		=> 'vision_church_footer_mailchimp_url',
				'type'		=> 'text',
				'required'  => array( 'vision_church_footer_subscribe_type', '=', 'MailChimp' ),
			),
		),
	) );

	Redux::setSection( $opt_name, array(
		'title'		=> esc_html__( 'Footer', 'vision-church' ),
		'id'		=> 'footer_opts',
		'subsection'=> true,
		'fields'	=> array(
			array(
				'title'		=> esc_html__( 'Footer Columns', 'vision-church' ),
				'subtitle'	=> wp_kses( __( 'Choose among these structures (1column, 2column, 3column and 4column) for your footer section.<br>To filling these column sections you should go to appearance > widget. And put every widget that you want in these sections.','vision-church'), array( 'br' => array() ) ),
				'id'		=> 'vision_church_footer_columns',
				'type'		=> 'image_select',
				'full_width'=> true,
				'default'	=> '1',
				'options'  => array(
					'1' => array(
						'alt' => esc_html__( 'Footer Layout 1', 'vision-church' ),
						'img' => get_template_directory_uri() . '/inc/theme-options/webnus-options/assets/img/footer1.png'
					),
					'2' => array(
						'alt' => esc_html__( 'Footer Layout 2', 'vision-church' ),
						'img' => get_template_directory_uri() . '/inc/theme-options/webnus-options/assets/img/footer2.png'
					),
					'3' => array(
						'alt' => esc_html__( 'Footer Layout 3', 'vision-church' ),
						'img' => get_template_directory_uri() . '/inc/theme-options/webnus-options/assets/img/footer3.png'
					),
					'4' => array(
						'alt' => esc_html__( 'Footer Layout 4', 'vision-church' ),
						'img' => get_template_directory_uri() . '/inc/theme-options/webnus-options/assets/img/footer4.png'
					),
					'5' => array(
						'alt' => esc_html__( 'Footer Layout 5', 'vision-church' ),
						'img' => get_template_directory_uri() . '/inc/theme-options/webnus-options/assets/img/footer5.png'
					),
					'6' => array(
						'alt' => esc_html__( 'Footer Layout 6', 'vision-church' ),
						'img' => get_template_directory_uri() . '/inc/theme-options/webnus-options/assets/img/footer6.png'
					),
				),
			),
			array(
				'title'		=> esc_html__( 'Footer background color', 'vision-church' ),
				'subtitle'	=> esc_html__( 'Pick a background color', 'vision-church' ),
				'id'		=> 'vision_church_footer_background_color',
				'type'		=> 'color',
				'output'	=> array(
					'background-color' => '#wrap #footer',
				),
			),
			array(
				'title'		=> esc_html__( 'Footer Backgruond Color Style', 'vision-church'),
				'id'		=> 'vision_church_footer_color',
				'type'		=> 'button_set',
				'default'	=> '1',
				'options'	=> array(
					'1' => esc_html__( 'Dark', 'vision-church' ),
					'2' => esc_html__( 'Light', 'vision-church' ),
				),
			),
		),
	) );

	Redux::setSection( $opt_name, array(
		'title'		=> esc_html__( 'Footer Bottom Area', 'vision-church' ),
		'id'		=> 'footer_bottom_area_opts',
		'subsection'=> true,
		'fields'	=> array(
			array(
				'title'		=> esc_html__( 'Footer Bottom', 'vision-church' ),
				'subtitle'	=> esc_html__( 'This option shows a section below the footer that you can put copyright menu and logo in it.', 'vision-church' ),
				'id'		=> 'vision_church_footer_bottom_enable',
				'type'		=> 'switch',
				'default'	=> '0',
				'on'		=> esc_html__( 'Show', 'vision-church' ),
				'off'		=> esc_html__( 'Hide', 'vision-church' ),
			),
			array(
				'title'		=> esc_html__('Footer bottom background color', 'vision-church'),
				'subtitle'	=> esc_html__('Pick a background color', 'vision-church'),
				'id'		=> 'vision_church_footer_bottom_background_color',
				'type'		=> 'color',
				'required'  => array( 'vision_church_footer_bottom_enable', '=', '1' ),
				'output'	=> array(
					'background-color' => '#wrap #footer .footbot',
				),
			),
			array(
				'title'		=> esc_html__('Footer Bottom Left', 'vision-church'),
				'id'		=> 'vision_church_footer_bottom_left',
				'type'		=> 'button_set',
				'default'	=> '3',
				'options'	=> array(
					'1' => esc_html__( 'Logo', 'vision-church' ),
					'2' => esc_html__( 'Menu', 'vision-church' ),
					'3' => esc_html__( 'Custom Text', 'vision-church' ),
					'4' => esc_html__( 'Social Icons', 'vision-church' ),
				),
				'required'  => array( 'vision_church_footer_bottom_enable', '=', '1' ),
			),
			array(
				'title'		=> esc_html__('Footer Bottom Right', 'vision-church'),
				'id'		=> 'vision_church_footer_bottom_right',
				'type'		=> 'button_set',
				'default'	=> '1',
				'options'	=> array(
					'1' => esc_html__( 'Logo', 'vision-church' ),
					'2' => esc_html__( 'Menu', 'vision-church' ),
					'3' => esc_html__( 'Custom Text', 'vision-church' ),
					'4' => esc_html__( 'Social Icons', 'vision-church' ),
				),
				'required'  => array( 'vision_church_footer_bottom_enable', '=', '1' ),
			),
			array(
				'title'		=> esc_html__('Footer Logo', 'vision-church'),
				'subtitle'	=> esc_html__('Please choose an image file for footer logo.', 'vision-church'),
				'id'		=> 'vision_church_footer_logo',
				'type'		=> 'media',
				'url'		=> true,
				'required'  => array( 'vision_church_footer_bottom_enable', '=', '1' ),
			),
			array(
				'title'		=> esc_html__('Footer Custom Text 1', 'vision-church'),
				'id'		=> 'vision_church_footer_copyright_left',
				'type'		=> 'text',
				'required'  => array( 'vision_church_footer_bottom_enable', '=', '1' ),
			),
			array(
				'title'		=> esc_html__('Footer Custom Text 2', 'vision-church'),
				'id'		=> 'vision_church_footer_copyright_right',
				'type'		=> 'text',
				'required'  => array( 'vision_church_footer_bottom_enable', '=', '1' ),
			),
		),
	) );

	// -> START Church Options Fields
	Redux::setSection( $opt_name, array(
		'title'		=> esc_html__( 'Church Options', 'vision-church' ),
		'id'		=> 'church_opts',
		'icon'		=> 'ti-book',
	) );

	Redux::setSection( $opt_name, array(
		'title'		=> esc_html__( 'Sermon', 'vision-church' ),
		'id'		=> 'sermon_opts',
		'subsection'=> true,
		'fields'	=> array(
			array(
				'title'		=> esc_html__( 'Single Sermon Sidebar', 'vision-church' ),
				'id'		=> 'webnus_singlesermon_sidebar',
				'type'		=> 'button_set',
				'default'	=> 'right',
				'options'	=> array(
					'none'	=> esc_html__( 'None', 'vision-church' ),
					'left'	=> esc_html__( 'Left', 'vision-church' ),
					'right'	=> esc_html__( 'Right', 'vision-church' ),
				 ),
			),
			array(
				'title'		=> esc_html__( 'Metadata Speaker', 'vision-church' ),
				'id'		=> 'webnus_sermon_speaker',
				'type'		=> 'switch',
				'default'	=> '1',
				'on'		=> esc_html__( 'On', 'vision-church' ),
				'off'		=> esc_html__( 'Off', 'vision-church' ),
			),
            array(
                'title'     => esc_html__( 'Metadata Series', 'vision-church' ),
                'id'        => 'webnus_sermon_series',
                'type'      => 'switch',
                'default'   => '1',
                'on'        => esc_html__( 'On', 'vision-church' ),
                'off'       => esc_html__( 'Off', 'vision-church' ),
            ),
			array(
				'title'		=> esc_html__( 'Metadata Date', 'vision-church' ),
				'id'		=> 'webnus_sermon_date',
				'type'		=> 'switch',
				'default'	=> '1',
				'on'		=> esc_html__( 'On', 'vision-church' ),
				'off'		=> esc_html__( 'Off', 'vision-church' ),
			),
			array(
				'title'		=> esc_html__( 'Metadata Category', 'vision-church' ),
				'id'		=> 'webnus_sermon_category',
				'type'		=> 'switch',
				'default'	=> '1',
				'on'		=> esc_html__( 'On', 'vision-church' ),
				'off'		=> esc_html__( 'Off', 'vision-church' ),
			),
			array(
				'title'		=> esc_html__( 'Metadata Comments', 'vision-church' ),
				'id'		=> 'webnus_sermon_comments',
				'type'		=> 'switch',
				'default'	=> '1',
				'on'		=> esc_html__( 'On', 'vision-church' ),
				'off'		=> esc_html__( 'Off', 'vision-church' ),
			),
			array(
				'title'		=> esc_html__( 'Metadata Views', 'vision-church' ),
				'id'		=> 'webnus_sermon_views',
				'type'		=> 'switch',
				'default'	=> '1',
				'on'		=> esc_html__( 'On', 'vision-church' ),
				'off'		=> esc_html__( 'Off', 'vision-church' ),
			),
			array(
				'title'		=> esc_html__( 'Featured Image on Sermon Post', 'vision-church' ),
				'id'		=> 'webnus_sermon_featuredimage',
				'type'		=> 'switch',
				'default'	=> '1',
				'on'		=> esc_html__( 'On', 'vision-church' ),
				'off'		=> esc_html__( 'Off', 'vision-church' ),
			),
			array(
				'title'		=> esc_html__( 'Social Share Links', 'vision-church' ),
				'id'		=> 'webnus_sermon_social_share',
				'type'		=> 'switch',
				'default'	=> '1',
				'on'		=> esc_html__( 'On', 'vision-church' ),
				'off'		=> esc_html__( 'Off', 'vision-church' ),
			),
			array(
				'title'		=> esc_html__( 'Show Sermon Speaker Box', 'vision-church' ),
				'id'		=> 'webnus_sermon_speakerbox',
				'type'		=> 'switch',
				'default'	=> '1',
				'on'		=> esc_html__( 'On', 'vision-church' ),
				'off'		=> esc_html__( 'Off', 'vision-church' ),
			),
			array(
				'title'		=> esc_html__( 'Show Recent Sermons', 'vision-church' ),
				'id'		=> 'webnus_recent_sermons',
				'type'		=> 'switch',
				'default'	=> '1',
				'on'		=> esc_html__( 'On', 'vision-church' ),
				'off'		=> esc_html__( 'Off', 'vision-church' ),
			),
		),
	) );

	Redux::setSection( $opt_name, array(
		'title'		=> esc_html__( 'Cause', 'vision-church' ),
		'id'		=> 'cause_opts',
		'subsection'=> true,
		'fields'	=> array(
			array(
				'title'		=> esc_html__( 'Donate Form', 'vision-church' ),
				'subtitle'	=> esc_html__( 'Choose previously created contact form from the drop down list.', 'vision-church' ),
				'id'		=> 'webnus_donate_form',
				'type'		=> 'select',
				'data'		=> 'posts',
				'args'		=> array( 'post_type' => 'wpcf7_contact_form', ),
			),
			array(
				'title'		=> esc_html__( 'Currency', 'vision-church' ),
				'id'		=> 'webnus_cause_currency',
				'type'		=> 'text',
				'default'	=> '$',
			),
			array(
				'title'		=> esc_html__( 'Metadata Date', 'vision-church' ),
				'id'		=> 'webnus_cause_date',
				'type'		=> 'switch',
				'default'	=> '1',
				'on'		=> esc_html__( 'On', 'vision-church' ),
				'off'		=> esc_html__( 'Off', 'vision-church' ),
			),
			array(
				'title'		=> esc_html__( 'Metadata Category', 'vision-church' ),
				'id'		=> 'webnus_cause_category',
				'type'		=> 'switch',
				'default'	=> '1',
				'on'		=> esc_html__( 'On', 'vision-church' ),
				'off'		=> esc_html__( 'Off', 'vision-church' ),
			),
			array(
				'title'		=> esc_html__( 'Metadata Comments', 'vision-church' ),
				'id'		=> 'webnus_cause_comments',
				'type'		=> 'switch',
				'default'	=> '1',
				'on'		=> esc_html__( 'On', 'vision-church' ),
				'off'		=> esc_html__( 'Off', 'vision-church' ),
			),
			array(
				'title'		=> esc_html__( 'Metadata Views', 'vision-church' ),
				'id'		=> 'webnus_cause_views',
				'type'		=> 'switch',
				'default'	=> '1',
				'on'		=> esc_html__( 'On', 'vision-church' ),
				'off'		=> esc_html__( 'Off', 'vision-church' ),
			),
			array(
				'title'		=> esc_html__( 'Featured Image on Cause Post', 'vision-church' ),
				'id'		=> 'webnus_cause_featuredimage',
				'type'		=> 'switch',
				'default'	=> '1',
				'on'		=> esc_html__( 'On', 'vision-church' ),
				'off'		=> esc_html__( 'Off', 'vision-church' ),
			),
			array(
				'title'		=> esc_html__( 'Social Share Links', 'vision-church' ),
				'id'		=> 'webnus_cause_social_share',
				'type'		=> 'switch',
				'default'	=> '1',
				'on'		=> esc_html__( 'On', 'vision-church' ),
				'off'		=> esc_html__( 'Off', 'vision-church' ),
			),
		),
	) );




	// -> START Pages Fields
	Redux::setSection( $opt_name, array(
		'title'		=> esc_html__( 'Pages', 'vision-church' ),
		'id'		=> 'pages_opts',
		'icon'		=> 'sl-docs',
	) );

	Redux::setSection( $opt_name, array(
		'title'		=> esc_html__( '404 Page', 'vision-church' ),
		'id'		=> '404_opts',
		'subsection'=> true,
		'fields'	=> array(
			array(
				'id'		=> 'vision_church_404_page_switch',
				'title'		=> __('Custom 404 page?', 'vision-church'),
				'type'		=> 'switch',
				'default'	=> '0',
				'on'		=> esc_html__( 'Enable', 'vision-church' ),
				'off'		=> esc_html__( 'Disable', 'vision-church' ),
			),
			array(
				'title'		=> esc_html__( 'Select Custom 404 Page', 'vision-church' ),
				'subtitle'	=> esc_html__( 'Select 404 Page', 'vision-church' ),
				'id'		=> 'vision_church_404_page',
				'type'		=> 'select',
				'data'		=> 'page',
				'required'	=> array( 'vision_church_404_page_switch', '=', '1' ),
			),
			array(
				'title'		=> esc_html__( 'Text To Display', 'vision-church' ),
				'id'		=> 'vision_church_404_text',
				'type'		=> 'ace_editor',
				'theme'		=> 'chrome',
				'mode'		=> 'php',
				'default'	=> 'We\'re sorry, but the page you were looking for doesn\'t exist.',
				'full_width'=> true,
				'required'  => array( 'vision_church_404_page_switch', '=', '0' ),
			),
		),
	) );

	Redux::setSection( $opt_name, array(
		'title'		=> esc_html__( 'Breadcrumbs', 'vision-church' ),
		'id'		=> 'breadcrumbs_opts',
		'subsection'=> true,
		'fields'	=> array(
			array(
				'title'		=> esc_html__( 'Breadcrumbs', 'vision-church' ),
				'subtitle'	=> esc_html__( 'It allows users to keep track of their locations within pages.','vision-church' ),
				'id'		=> 'vision_church_enable_breadcrumbs',
				'type'		=> 'switch',
				'default'	=> '0',
				'on'		=> esc_html__( 'Show', 'vision-church' ),
				'off'		=> esc_html__( 'Hide', 'vision-church' ),
			),
		),
	) );

	// -> START Blog Options Fields
	Redux::setSection( $opt_name, array(
		'title'		=> esc_html__( 'Blog Options', 'vision-church' ),
		'id'		=> 'blog-opts',
		'icon'		=> 'ti-pencil-alt',
	) );

	Redux::setSection( $opt_name, array(
		'title'		=> esc_html__( 'Blog Page', 'vision-church' ),
		'id'		=> 'blog-page-opts',
		'subsection'=> true,
		'fields'	=> array(
			array(
				'title'		=> esc_html__( 'BlogTemplate', 'vision-church' ),
				'subtitle'	=> esc_html__( 'For styling your blog page you can choose among these template layouts.', 'vision-church' ),
				'id'		=> 'vision_church_blog_template',
				'type'		=> 'image_select',
				'full_width'=> true,
				'default'	=> '1',
				'options'	=> array(
					'1' => array(
						'alt' => esc_html__( 'Blog Type 1', 'vision-church' ),
						'img' => get_template_directory_uri() . '/inc/theme-options/webnus-options/assets/img/blog-type1.png'
					),
					'2' => array(
						'alt' => esc_html__( 'Blog Type 2', 'vision-church' ),
						'img' => get_template_directory_uri() . '/inc/theme-options/webnus-options/assets/img/blog-type2.png'
					),
					'3' => array(
						'alt' => esc_html__( 'Blog Type 3', 'vision-church' ),
						'img' => get_template_directory_uri() . '/inc/theme-options/webnus-options/assets/img/blog-type3.png'
					),
					'4' => array(
						'alt' => esc_html__( 'Blog Type 4', 'vision-church' ),
						'img' => get_template_directory_uri() . '/inc/theme-options/webnus-options/assets/img/blog-type4.png'
					),
					'5' => array(
						'alt' => esc_html__( 'Blog Type 5', 'vision-church' ),
						'img' => get_template_directory_uri() . '/inc/theme-options/webnus-options/assets/img/blog-type5.png'
					),
					'6' => array(
						'alt' => esc_html__( 'Blog Type 6', 'vision-church' ),
						'img' => get_template_directory_uri() . '/inc/theme-options/webnus-options/assets/img/blog-type6.png'
					),
					'7' => array(
						'alt' => esc_html__( 'Blog Type 7', 'vision-church' ),
						'img' => get_template_directory_uri() . '/inc/theme-options/webnus-options/assets/img/blog-type7.png'
					),
				),
			),
			array(
				'title'		=> esc_html__('Blog Sidebar Position', 'vision-church'),
				'id'		=> 'vision_church_blog_sidebar',
				'type'		=> 'button_set',
				'default'	=> 'right',
				'options'	=> array(
					'none'	=> esc_html__( 'None', 'vision-church' ),
					'left'	=> esc_html__( 'Left', 'vision-church' ),
					'right'	=> esc_html__( 'Right', 'vision-church' ),
					'both'	=> esc_html__( 'Both', 'vision-church' ),
				),
			),
			array(
				'title'		=> esc_html__('Excerpt Or Full Blog Content', 'vision-church'),
				'subtitle'	=> esc_html__('You can show all text of your posts in blog page or a fixed amount of characters to show for each post.','vision-church'),
				'id'		=> 'vision_church_blog_excerptfull_enable',
				'type'		=> 'switch',
				'default'	=> '0',
				'on'		=> esc_html__( 'Full', 'vision-church' ),
				'off'		=> esc_html__( 'Excerpt', 'vision-church' ),
			),
			array(
				'title'		=> esc_html__('Excerpt Length for Large Posts', 'vision-church'),
				'subtitle'	=> esc_html__('Type the number of characters you want to show in the blog page for each post.','vision-church'),
				'id'		=> 'vision_church_blog_excerpt_large',
				'type'		=> 'slider',
				'default'	=> 93,
				'min'		=> 1,
				'step'		=> 1,
				'max'		=> 400,
				'display_value'	=> 'text',
				'required'  => array( 'vision_church_blog_excerptfull_enable', '=', '0' ),
			),
			array(
				'title'		=> esc_html__('Excerpt Length for List Posts', 'vision-church'),
				'subtitle'	=> esc_html__('Type the number of characters you want to show in the blog page for each post.','vision-church'),
				'id'		=> 'vision_church_blog_excerpt_list',
				'type'		=> 'slider',
				'default'	=> 17,
				'min'		=> 1,
				'step'		=> 1,
				'max'		=> 400,
				'display_value'	=> 'text',
				'required'  => array( 'vision_church_blog_excerptfull_enable', '=', '0' ),
			),
			array(
				'title'		=> esc_html__('Blog Page Title', 'vision-church'),
				'subtitle'	=> esc_html__('By hiding this option, blog Page title will be disappearing.','vision-church'),
				'id'		=> 'vision_church_blog_page_title_enable',
				'type'		=> 'switch',
				'default'	=> '1',
				'on'		=> esc_html__( 'Show', 'vision-church' ),
				'off'		=> esc_html__( 'Hide', 'vision-church' ),
			),
			array(
				'title'		=> esc_html__('Blog Page Title Text', 'vision-church'),
				'id'		=> 'vision_church_blog_page_title',
				'type'		=> 'text',
				'default'	=> 'Blog',
				'required'  => array( 'vision_church_blog_page_title_enable', '=', '1' ),
			),
			array(
				'title'		=> esc_html__('Read More Text', 'vision-church'),
				'subtitle'	=> esc_html__('You can set another name instead of read more link.','vision-church'),
				'id'		=> 'vision_church_blog_readmore_text',
				'type'		=> 'text',
				'default'	=> 'Continue Reading',
			),
			array(
				'title'		=> esc_html__( 'Featured Image on Blog', 'vision-church' ),
				'subtitle'	=> esc_html__( 'By disabling this option, all blog feature images will be disappearing.', 'vision-church' ),
				'id'		=> 'vision_church_blog_featuredimage_enable',
				'type'		=> 'switch',
				'default'	=> '1',
				'on'		=> esc_html__( 'On', 'vision-church' ),
				'off'		=> esc_html__( 'Off', 'vision-church' ),
			),
			array(
				'title'		=> esc_html__('Default Blank Featured Image', 'vision-church'),
				'id'		=> 'vision_church_no_image',
				'type'		=> 'switch',
				'default'	=> '0',
				'on'		=> esc_html__( 'On', 'vision-church' ),
				'off'		=> esc_html__( 'Off', 'vision-church' ),
			),
			array(
				'title'		=> esc_html__('Custom Default Blank Featured Image', 'vision-church'),
				'id'		=> 'vision_church_no_image_src',
				'type'		=> 'media',
				'url'		=> true,
				'required'  => array( 'vision_church_no_image', '=', '1' ),
			),
			array(
				'title'		=> esc_html__( 'Post Title on Blog', 'vision-church' ),
				'subtitle'	=> esc_html__( 'By disabling this option, all post title images will be disappearing.','vision-church' ),
				'id'		=> 'vision_church_blog_posttitle_enable',
				'type'		=> 'switch',
				'default'	=> '1',
				'on'		=> esc_html__( 'On', 'vision-church' ),
				'off'		=> esc_html__( 'Off', 'vision-church' ),
			),
		),
	) );

	Redux::setSection( $opt_name, array(
		'title'		=> esc_html__( 'Single Blog Page', 'vision-church' ),
		'id'		=> 'single-blog-page-opts',
		'subsection'=> true,
		'fields'	=> array(
			array(
				'title'		=> esc_html__('Single Post Sidebar Position', 'vision-church'),
				'id'		=> 'vision_church_blog_singlepost_sidebar',
				'type'		=> 'button_set',
				'default'	=> 'right',
				'options'	=> array(
					'none'	=> esc_html__( 'None', 'vision-church' ),
					'left'	=> esc_html__( 'Left', 'vision-church' ),
					'right'	=> esc_html__( 'Right', 'vision-church' ),
				),
			),
			array(
				'title'		=> esc_html__('Featured Image on Single Post', 'vision-church'),
				'id'		=> 'vision_church_blog_sinlge_featuredimage_enable',
				'type'		=> 'switch',
				'on'		=> esc_html__( 'On', 'vision-church' ),
				'off'		=> esc_html__( 'Off', 'vision-church' ),
				'default'	=> '1',
			),
			array(
				'title'		=> esc_html__('Social Share Links', 'vision-church'),
				'subtitle'	=> esc_html__('By enabling this feature your visitors can share the post to social networks such as Facebook, Twitter and...','vision-church'),
				'id'		=> 'vision_church_blog_social_share',
				'type'		=> 'switch',
				'on'		=> esc_html__( 'On', 'vision-church' ),
				'off'		=> esc_html__( 'Off', 'vision-church' ),
				'default'	=> '1',
			),
			array(
				'title'		=> esc_html__('Single post Authorbox', 'vision-church'),
				'subtitle'	=> esc_html__('This feature shows a picture of post author and some info about author.','vision-church'),
				'id'		=> 'vision_church_blog_single_authorbox_enable',
				'type'		=> 'switch',
				'on'		=> esc_html__( 'On', 'vision-church' ),
				'off'		=> esc_html__( 'Off', 'vision-church' ),
				'default'	=> '0',
			),
			array(
				'title'		=> esc_html__('Recommended Posts', 'vision-church'),
				'subtitle'	=> esc_html__('This feature recommends related post to visitors.','vision-church'),
				'id'		=> 'vision_church_recommended_posts',
				'type'		=> 'switch',
				'on'		=> esc_html__( 'On', 'vision-church' ),
				'off'		=> esc_html__( 'Off', 'vision-church' ),
				'default'	=> '1',
			),
		),
	) );

	Redux::setSection( $opt_name, array(
		'title'		=> esc_html__( 'Post Metadatas', 'vision-church' ),
		'id'		=> 'post-meta-opts',
		'subsection'=> true,
		'fields'	=> array(
			array(
				'title'		=> esc_html__('Metadata Gravatar', 'vision-church'),
				'id'		=> 'vision_church_blog_meta_gravatar_enable',
				'type'		=> 'switch',
				'on'		=> esc_html__( 'On', 'vision-church' ),
				'off'		=> esc_html__( 'Off', 'vision-church' ),
				'default'	=> '1'
			),
			array(
				'title'		=> esc_html__('Metadata Author', 'vision-church'),
				'id'		=> 'vision_church_blog_meta_author_enable',
				'type'		=> 'switch',
				'on'		=> esc_html__( 'On', 'vision-church' ),
				'off'		=> esc_html__( 'Off', 'vision-church' ),
				'default'	=> '0'
			),
			array(
				'title'		=> esc_html__('Metadata Date', 'vision-church'),
				'id'		=> 'vision_church_blog_meta_date_enable',
				'type'		=> 'switch',
				'on'		=> esc_html__( 'On', 'vision-church' ),
				'off'		=> esc_html__( 'Off', 'vision-church' ),
				'default'	=> '1'
			),
			array(
				'id'		=> 'vision_church_blog_meta_category_enable',
				'type'		=> 'switch',
				'title'		=> esc_html__('Metadata Category', 'vision-church'),
				'on'		=> esc_html__( 'On', 'vision-church' ),
				'off'		=> esc_html__( 'Off', 'vision-church' ),
				'default'	=> '1'
			),
			array(
				'id'		=> 'vision_church_blog_meta_comments_enable',
				'type'		=> 'switch',
				'title'		=> esc_html__('Metadata Comments', 'vision-church'),
				'on'		=> esc_html__( 'On', 'vision-church' ),
				'off'		=> esc_html__( 'Off', 'vision-church' ),
				'default'	=> '1'
			),
			array(
				'id'		=> 'vision_church_blog_meta_views_enable',
				'type'		=> 'switch',
				'title'		=> esc_html__('Metadata Views', 'vision-church'),
				'on'		=> esc_html__( 'On', 'vision-church' ),
				'off'		=> esc_html__( 'Off', 'vision-church' ),
				'default'	=> '0'
			),
		),
	) );


	// -> START Styling Options Fields
	Redux::setSection( $opt_name, array(
	'title'		=> __( 'Styling Options', 'vision-church' ),
	'id'		=> 'styling_opts',
	'icon'		=> 'ti-palette',
	));

	Redux::setSection( $opt_name, array(
	'title'			=> __( 'Background', 'vision-church' ),
	'id'			=> 'background_opts',
	'desc'		=> esc_html__('Background shows in Boxed layout. you can select layout in "Layout" tab.', 'vision-church'),
	'subsection'	=> true,
	'fields'		=> array(
		array(
			'title'		=> esc_html__( 'Body Background', 'vision-church' ),
			'id'		=> 'vision_church_background',
			'type'		=> 'background',
			'output'	=> array( 'body' ),
		),

		array(
			'title'		=> esc_html__( 'Background Pattern', 'vision-church' ),
			'id'		=> 'vision_church_background_pattern',
			'type'		=> 'image_select',
			'options'	=> array(
				'none'	=> array('alt' => 'None','img' => $theme_bg_dir.'none.jpg',),
				$theme_bg_dir.'bdbg1.png'				=> array('alt'  => 'Default BG', 'img'  	=> $theme_bg_dir.'bdbg1.png',),
				$theme_bg_dir.'gray-jean.png'			=> array('alt'  => 'Gray Jean', 'img'  		=> $theme_bg_dir.'gray-jean.png',),
				$theme_bg_dir.'light-wool.png'			=> array('alt'  => 'Light Wool', 'img'  	=> $theme_bg_dir.'light-wool.png',),
				$theme_bg_dir.'subtle_freckles.png'		=> array('alt'	=> 'Subtle Freckles','img'	=>$theme_bg_dir.'subtle_freckles.png',),
				$theme_bg_dir.'subtle_freckles2.png'	=> array('alt'	=> 'Subtle Freckles 2','img'	=>$theme_bg_dir.'subtle_freckles2.png',),
				$theme_bg_dir.'green-fibers.png'		=> array('alt'  => 'Green Fibers', 'img'  	=> $theme_bg_dir.'green-fibers.png',),
				$theme_bg_dir.'dust.png'  				=> array('alt'  => 'Dust', 'img'  			=> $theme_bg_dir.'dust.png',),
			),
			'height'	=> '64',
		),
	),
	));

	Redux::setSection( $opt_name, array(
	'title'            => __( 'Colors', 'vision-church' ),
	'id'               => 'colors_opts',
	'subsection'       => true,
	'fields'		   => array(
        array(
            'title'     => esc_html__( 'Choose Color Skin', 'vision-church' ),
            'subtitle'  => esc_html__( 'Select Predefiend or Custom Color.' , 'vision-church' ),
            'id'        => 'vision_church_color_skin_type',
            'type'      => 'button_set',
            'default'   => 'predefined',
            'options'   => array(
                'predefined'    => esc_html__( 'Predefined', 'vision-church' ),
                'custom'        => esc_html__( 'Custom', 'vision-church' ),
            ),
        ),
		array(
			'title'		=> esc_html__( 'Predefined Color Skin', 'vision-church' ),
			'id'		=> 'vision_church_color_skin',
			'type'		=> 'palette',
			'class'		=> 'w-p-colorskin',
			'default'	=> 'e3e3e3',
			'palettes'	=> array(
				'e3e3e3'	=> array( '#e3e3e3' ),
				'1bbc9b'	=> array( '#1bbc9b' ),
				'0093d0'	=> array( '#0093d0' ),
				'e53f51'	=> array( '#e53f51' ),
				'f1c40f'	=> array( '#f1c40f' ),
				'e64883'	=> array( '#e64883' ),
				'45ab48'	=> array( '#45ab48' ),
				'9661ab'	=> array( '#9661ab' ),
				'0aad80'	=> array( '#0aad80' ),
				'03acdc'	=> array( '#03acdc' ),
				'ff5a00'	=> array( '#ff5a00' ),
				'c3512f' 	=> array( '#c3512f' ),
				'55606e'	=> array( '#55606e' ),
				'fe8178'	=> array( '#fe8178' ),
				'7c6853'	=> array( '#7c6853' ),
				'bed431'	=> array( '#bed431' ),
				'2d5c88'	=> array( '#2d5c88' ),
				'76dd56'	=> array( '#76dd56' ),
				'2997ab'	=> array( '#2997ab' ),
				'734854'	=> array( '#734854' ),
				'a81010'	=> array( '#a81010' ),
			),
            'required'      => array( 'vision_church_color_skin_type', '=', 'predefined' ),

        ),

		array(
			'id'			=> 'vision_church_custom_color_skin',
			'type'			=> 'color',
			'title'			=> esc_html__('Choose Color ', 'vision-church'),
			'subtitle'		=> esc_html__('Choose your desire color scheme.', 'vision-church'),
			'transparent'	=> false,
			'required'      => array( 'vision_church_color_skin_type', '=', 'custom' ),
		),
		array(
			'id'		=> 'vision_church_link_color',
			'type'		=> 'link_color',
			'title'		=> esc_html__('Links Color', 'vision-church'),
			'active'	=> false,
			'visited'	=> true,
			'output'	=> array( 'a' ),
		),
		/*array(
			'id'       => 'vision_church_contactform_button',
			'type'     => 'link_color',
			'title'    => esc_html__('Contact form button', 'vision-church'),
			'subtitle'	=> esc_html__( 'In Footer'),
			'active'    => false,
		),*/
		array(
			'id'       => 'vision_church_menu_link_color',
			'type'     => 'link_color',
			'title'    => esc_html__('Header Menu Link', 'vision-church'),
		),
		array(
			'id'			=> 'vision_church_menu_selected_border_color',
			'type'			=> 'color',
			'title'			=> esc_html__('Header Menu Selected Border', 'vision-church'),
			'transparent'	=> false,
			'output'		=> array(
				'border-color' => '#wrap #nav li.current > a',
			),
		),
		array(
			'id'		=> 'vision_church_scroll_to_top_hover_background_color',
			'type'		=> 'link_color',
			'title'		=> esc_html__('Scroll to top', 'vision-church'),
			'active'	=> false,
			'visited'	=> false,
		),
		array(
			'id'			=> 'vision_church_iconbox_base_color',
			'type'			=> 'color',
			'title'			=> esc_html__('Iconboxes', 'vision-church'),
			'subtitle'		=> esc_html__( 'Iconboxes Base Color', 'vision-church' ),
			'transparent'	=> false,
			'output'		=> array('#wrap [class*="icon-box"] i'),
		),
		array(
			'id'			=> 'vision_church_learnmore_link_color',
			'type'			=> 'color',
			'title'			=> esc_html__( 'Learn more link', 'vision-church' ),
			'subtitle'		=> esc_html__( 'In IconBox', 'vision-church' ),
			'transparent'	=> false,
			'output'		=> array('#wrap a.magicmore'),
		),

		array(
			'id'			=> 'vision_church_learnmore_hover_link_color',
			'type'			=> 'color',
			'title'			=> esc_html__( 'Learn more hover link color', 'vision-church' ),
			'subtitle'		=> esc_html__( 'In IconBox' , 'vision-church' ),
			'transparent'	=> false,
			'output'		=> array('#wrap [class*="icon-box"] a.magicmore:hover'),
		),

		array(
			'id'			=> 'vision_church_resoponsive_menu_icon_color',
			'type'			=> 'color',
			'title'			=> esc_html__('Responsive Menu Icon', 'vision-church'),
			'subtitle'		=> esc_html__( 'Appears in mobile & tablet view', 'vision-church'),
			'transparent'	=> false,
			'output'		=> array(
				'background-color' => '#wrap #header.sm-rgt-mn #menu-icon span.mn-ext1, #wrap #header.sm-rgt-mn #menu-icon span.mn-ext2, #wrap #header.sm-rgt-mn #menu-icon span.mn-ext3',
			),
		),

	)));

	// -> START Typography Fields
	Redux::setSection( $opt_name, array(
		'title'				=> esc_html__( 'Typography', 'vision-church' ),
		'id'				=> 'typography_opts',
		'icon'				=> 'ti-smallcap',
	));

	Redux::setSection( $opt_name, array(
		'title'				=> esc_html__( 'Body Typography', 'vision-church' ),
		'id'				=> 'body_typography_opts',
		'subsection'		=> true,
		'fields'			=> array(
			array(
				'title'			=> esc_html__( 'Body Typography', 'vision-church' ),
				'subtitle'		=> esc_html__( 'These settings control the typography for all body text.', 'vision-church' ),
				'id'			=> 'body-typography',
				'type'			=> 'typography',
				'all_styles'	=> true,
				'letter-spacing'=> true,
				'font-style'	=> false,
				'font-weight'	=> false,
				'font-style'	=> true,
				'font-weight'	=> true,
				'word-spacing'	=> true,
				'text-transform'=> true,
				'output'		=> array( 'body' ),
				'units'			=> 'px',
				'fonts' => $fonts,
			),
		),
	));

	Redux::setSection( $opt_name, array(
		'title'				=> esc_html__( 'Paragraph Typography', 'vision-church' ),
		'id'				=> 'p_typography_opts',
		'subsection'		=> true,
		'fields'			=> array(
			array(
				'title'			=> esc_html__( '(P) Paragraph Typography', 'vision-church' ),
				'subtitle'		=> esc_html__( 'These settings control the typography for all (P) Paragraph.', 'vision-church' ),
				'id'			=> 'p-typography',
				'type'			=> 'typography',
				'all_styles'	=> true,
				'letter-spacing'=> true,
				'font-style'	=> false,
				'font-weight'	=> false,
				'font-style'	=> true,
				'font-weight'	=> true,
				'word-spacing'	=> true,
				'text-transform'=> true,
				'output'		=> array( 'body p' ),
				'units'			=> 'px',
				'fonts' => $fonts,
			),
		),
	));

	Redux::setSection( $opt_name, array(
		'title'				=> esc_html__( 'Headings Typography', 'vision-church' ),
		'id'				=> 'h_typography_opts',
		'subsection'		=> true,
		'fields'			=> array(
			array(
				'title'			=> esc_html__( 'All Headings Typography', 'vision-church' ),
				'subtitle'		=> esc_html__( 'These settings control the typography for all Headings.', 'vision-church' ),
				'id'			=> 'all-h-typography',
				'type'			=> 'typography',
				'all_styles'	=> false,
				'letter-spacing'=> false,
				'font-weight'	=> false,
				'word-spacing'	=> false,
				'text-transform'=> false,
				'font-size'		=> false,
				'line-height'	=> false,
				'text-align'	=> false,
				'color'			=> false,
				'output'		=> array( '#wrap h1,#wrap h2,#wrap h3,#wrap h4,#wrap h5,#wrap h6' ),
				'units'			=> 'px',
				'fonts' 		=> $fonts,
			),
			array(
				'title'			=> esc_html__( '(H1) Headings Typography', 'vision-church' ),
				'subtitle'		=> esc_html__( 'These settings control the typography for all H1 Headings.', 'vision-church' ),
				'id'			=> 'h1-typography',
				'type'			=> 'typography',
				'all_styles'	=> true,
				'letter-spacing'=> true,
				'font-style'	=> false,
				'font-weight'	=> false,
				'font-style'	=> true,
				'font-weight'	=> true,
				'word-spacing'	=> true,
				'text-transform'=> true,
				'output'		=> array( 'body #wrap h1' ),
				'units'			=> 'px',
				'fonts' 		=> $fonts,
			),
			array(
				'title'			=> esc_html__( '(H2) Headings Typography', 'vision-church' ),
				'subtitle'		=> esc_html__( 'These settings control the typography for all H2 Headings.', 'vision-church' ),
				'id'			=> 'h2-typography',
				'type'			=> 'typography',
				'all_styles'	=> true,
				'letter-spacing'=> true,
				'font-style'	=> false,
				'font-weight'	=> false,
				'font-style'	=> true,
				'font-weight'	=> true,
				'word-spacing'	=> true,
				'text-transform'=> true,
				'output'		=> array( 'body #wrap h2' ),
				'units'			=> 'px',
				'fonts' 		=> $fonts,
			),
			array(
				'title'			=> esc_html__( '(H3) Headings Typography', 'vision-church' ),
				'subtitle'		=> esc_html__( 'These settings control the typography for all H3 Headings.', 'vision-church' ),
				'id'			=> 'h3-typography',
				'type'			=> 'typography',
				'all_styles'	=> true,
				'letter-spacing'=> true,
				'font-style'	=> false,
				'font-weight'	=> false,
				'font-style'	=> true,
				'font-weight'	=> true,
				'word-spacing'	=> true,
				'text-transform'=> true,
				'output'		=> array( 'body #wrap h3' ),
				'units'			=> 'px',
				'fonts' 		=> $fonts,
			),
			array(
				'title'			=> esc_html__( '(H4) Headings Typography', 'vision-church' ),
				'subtitle'		=> esc_html__( 'These settings control the typography for all H4 Headings.', 'vision-church' ),
				'id'			=> 'h4-typography',
				'type'			=> 'typography',
				'all_styles'	=> true,
				'letter-spacing'=> true,
				'font-style'	=> false,
				'font-weight'	=> false,
				'font-style'	=> true,
				'font-weight'	=> true,
				'word-spacing'	=> true,
				'text-transform'=> true,
				'output'		=> array( 'body #wrap h4' ),
				'units'			=> 'px',
				'fonts' 		=> $fonts,
			),
			array(
				'title'			=> esc_html__( '(H5) Headings Typography', 'vision-church' ),
				'subtitle'		=> esc_html__( 'These settings control the typography for all H5 Headings.', 'vision-church' ),
				'id'			=> 'h5-typography',
				'type'			=> 'typography',
				'all_styles'	=> true,
				'letter-spacing'=> true,
				'font-style'	=> false,
				'font-weight'	=> false,
				'font-style'	=> true,
				'font-weight'	=> true,
				'word-spacing'	=> true,
				'text-transform'=> true,
				'output'		=> array( 'body #wrap h5' ),
				'units'			=> 'px',
				'fonts' 		=> $fonts,
			),
			array(
				'title'			=> esc_html__( '(H6) Headings Typography', 'vision-church' ),
				'subtitle'		=> esc_html__( 'These settings control the typography for all H6 Headings.', 'vision-church' ),
				'id'			=> 'h6-typography',
				'type'			=> 'typography',
				'all_styles'	=> true,
				'letter-spacing'=> true,
				'font-style'	=> false,
				'font-weight'	=> false,
				'font-style'	=> true,
				'font-weight'	=> true,
				'word-spacing'	=> true,
				'text-transform'=> true,
				'output'		=> array( 'body #wrap h6' ),
				'units'			=> 'px',
				'fonts' 		=> $fonts,
			),
		),
	));

	Redux::setSection( $opt_name, array(
		'title'				=> esc_html__( 'Menu Typography', 'vision-church' ),
		'id'				=> 'menu_typography_opts',
		'subsection'		=> true,
		'fields'			=> array(
			array(
				'title'			=> esc_html__( 'Menu Typography', 'vision-church' ),
				'subtitle'		=> esc_html__( 'These settings control the typography for all Menu.', 'vision-church' ),
				'id'			=> 'menu-typography',
				'type'			=> 'typography',
				'all_styles'	=> true,
				'letter-spacing'=> true,
				'font-style'	=> false,
				'font-weight'	=> false,
				'font-style'	=> true,
				'font-weight'	=> true,
				'word-spacing'	=> true,
				'text-transform'=> true,
				'output'		=> array( '#wrap ul#nav a' ),
				'units'			=> 'px',
				'fonts' => $fonts,
			),
			array(
				'title'			=> esc_html__( 'Sub Menu Typography', 'vision-church' ),
				'subtitle'		=> esc_html__( 'These settings control the typography for all Sub Menus.', 'vision-church' ),
				'id'			=> 'sub-menu-typography',
				'type'			=> 'typography',
				'all_styles'	=> true,
				'letter-spacing'=> true,
				'font-style'	=> false,
				'font-weight'	=> false,
				'font-style'	=> true,
				'font-weight'	=> true,
				'word-spacing'	=> true,
				'text-transform'=> true,
				'output'		=> array( '#nav ul li a' ),
				'units'			=> 'px',
				'fonts'			=> $fonts,
			),
		),
	));

	Redux::setSection( $opt_name, array(
		'title'				=> esc_html__( 'Blog Typography', 'vision-church' ),
		'id'				=> 'blog_typography_opts',
		'subsection'		=> true,
		'fields'			=> array(
			array(
				'title'			=> esc_html__( 'Post Title Typography In Blog Page', 'vision-church' ),
				'subtitle'		=> esc_html__( 'These settings control the typography for all Post Title.', 'vision-church' ),
				'id'			=> 'post-title-typography',
				'type'			=> 'typography',
				'all_styles'	=> true,
				'letter-spacing'=> true,
				'font-style'	=> false,
				'font-weight'	=> false,
				'font-style'	=> true,
				'font-weight'	=> true,
				'word-spacing'	=> true,
				'text-transform'=> true,
				'output'		=> array( '.blog-post h4, .blog-post h1, .blog-post h3, .blog-line h4, .blog-single-post h1' ),
				'units'			=> 'px',
				'fonts' => $fonts,
			),
			array(
				'title'			=> esc_html__( 'Post Title Typography in Single Blog Page', 'vision-church' ),
				'subtitle'		=> esc_html__( 'These settings control the typography for all Post Title.', 'vision-church' ),
				'id'			=> 'single-post-title-typography',
				'type'			=> 'typography',
				'all_styles'	=> true,
				'letter-spacing'=> true,
				'font-style'	=> false,
				'font-weight'	=> false,
				'font-style'	=> true,
				'font-weight'	=> true,
				'word-spacing'	=> true,
				'text-transform'=> true,
				'output'		=> array( '.blog-single-post h1' ),
				'units'			=> 'px',
				'fonts' => $fonts,
			),
		),
	));

	Redux::setSection( $opt_name, array(
		'title'				=> esc_html__( 'Custom Fonts', 'vision-church' ),
		'id'				=> 'custom_fonts_opts',
		'desc'				=> esc_html__( 'After uploading your fonts, you should select font family (custom-font-1/custom-font-2/custom-font-3) from dropdown list in (Body/Paragraph/Headings/Menu/Blog) Typography section.', 'vision-church' ),
		'subsection'		=> true,
		'fields'			=> array(
			array(
				'title'		=> esc_html__( 'Custom Font1', 'vision-church' ),
				'subtitle'	=> esc_html__( 'Please Enable this option to use Custom Font 1.', 'vision-church' ),
				'id'		=> 'vision_church_custom_font1',
				'type'		=> 'switch',
				'default'	=> '0',
				'on'		=> esc_html__( 'Enabled', 'vision-church' ),
				'off'		=> esc_html__( 'Disabled', 'vision-church' ),
			),
			array(
				'title'		=> esc_html__( 'Custom font 1 .woff', 'vision-church' ),
				'id'		=> 'vision_church_custom_font1_woff',
				'type'		=> 'media',
				'mode'       => false,
                'preview'  => false,
				'url'		=> true,
				'required'  => array( 'vision_church_custom_font1', '=', '1' ),
			),
			array(
				'title'		=> esc_html__( 'Custom font 1 .ttf', 'vision-church' ),
				'id'		=> 'vision_church_custom_font1_ttf',
				'type'		=> 'media',
				'mode'		=> false,
                'preview'	=> false,
				'url'		=> true,
				'required'  => array( 'vision_church_custom_font1', '=', '1' ),
			),
			array(
				'title'		=> esc_html__( 'Custom font 1 .eot', 'vision-church' ),
				'id'		=> 'vision_church_custom_font1_eot',
				'type'		=> 'media',
				'mode'		=> false,
                'preview'	=> false,
				'url'		=> true,
				'required'  => array( 'vision_church_custom_font1', '=', '1' ),
			),

			array(
				'title'		=> esc_html__( 'Custom Font2', 'vision-church' ),
				'subtitle'	=> esc_html__( 'Please Enable this option to use Custom Font 2', 'vision-church' ),
				'id'		=> 'vision_church_custom_font2',
				'type'		=> 'switch',
				'default'	=> '0',
				'on'		=> esc_html__( 'Enabled', 'vision-church' ),
				'off'		=> esc_html__( 'Disabled', 'vision-church' ),
			),
			array(
				'title'		=> esc_html__( 'Custom font 2 .woff', 'vision-church' ),
				'id'		=> 'vision_church_custom_font2_woff',
				'type'		=> 'media',
				'mode'		=> false,
                'preview'	=> false,
				'url'		=> true,
				'required'  => array( 'vision_church_custom_font2', '=', '1' ),
			),
			array(
				'title'		=> esc_html__( 'Custom font 2 .ttf', 'vision-church' ),
				'id'		=> 'vision_church_custom_font2_ttf',
				'type'		=> 'media',
				'mode'		=> false,
                'preview'	=> false,
				'url'		=> true,
				'required'  => array( 'vision_church_custom_font2', '=', '1' ),
			),
			array(
				'title'		=> esc_html__( 'Custom font 2 .eot', 'vision-church' ),
				'id'		=> 'vision_church_custom_font2_eot',
				'type'		=> 'media',
				'mode'		=> false,
                'preview'	=> false,
				'url'		=> true,
				'required'  => array( 'vision_church_custom_font2', '=', '1' ),
			),

			array(
				'title'		=> esc_html__( 'Custom Font3', 'vision-church' ),
				'subtitle'	=> esc_html__( 'Please Enable this option to use Custom Font 3', 'vision-church' ),
				'id'		=> 'vision_church_custom_font3',
				'type'		=> 'switch',
				'default'	=> '0',
				'on'		=> esc_html__( 'Enabled', 'vision-church' ),
				'off'		=> esc_html__( 'Disabled', 'vision-church' ),
			),
			array(
				'title'		=> esc_html__( 'Custom font 3 .woff', 'vision-church' ),
				'id'		=> 'vision_church_custom_font3_woff',
				'type'		=> 'media',
				'mode'		=> false,
                'preview'	=> false,
				'url'		=> true,
				'required'  => array( 'vision_church_custom_font3', '=', '1' ),
			),
			array(
				'title'		=> esc_html__( 'Custom font 3 .ttf', 'vision-church' ),
				'id'		=> 'vision_church_custom_font3_ttf',
				'type'		=> 'media',
				'mode'		=> false,
                'preview'	=> false,
				'url'		=> true,
				'required'  => array( 'vision_church_custom_font3', '=', '1' ),
			),
			array(
				'title'		=> esc_html__( 'Custom font 3 .eot', 'vision-church' ),
				'id'		=> 'vision_church_custom_font3_eot',
				'type'		=> 'media',
				'mode'		=> false,
                'preview'	=> false,
				'url'		=> true,
				'required'  => array( 'vision_church_custom_font3', '=', '1' ),
			),
		),
	));

	Redux::setSection( $opt_name, array(
		'title'				=> esc_html__( 'Adobe Typekit', 'vision-church' ),
		'id'				=> 'adobe_typekit_opts',
		'desc'				=> esc_html__( 'After completing below settings, you should select font family (typekit-font-1/typekit-font-2/typekit-font-3) from dropdown list in (Body/Paragraph/Headings/Menu/Blog) Typography section', 'vision-church' ),
		'subsection'		=> true,
		'fields'			=> array(
			array(
				'title'		=> esc_html__( 'Adobe Typekit', 'vision-church' ),
				'subtitle'	=> esc_html__( 'Please Enable this option to use Adobe Typekit.', 'vision-church' ),
				'id'		=> 'vision_church_adobe_typekit',
				'type'		=> 'switch',
				'default'	=> '0',
				'on'		=> esc_html__( 'Enabled', 'vision-church' ),
				'off'		=> esc_html__( 'Disabled', 'vision-church' ),
			),
			array(
				'title'		=> esc_html__('Typekit Kit ID', 'vision-church'),
				'id'		=> 'vision_church_typekit_id',
				'type'		=> 'text',
				'required'  => array( 'vision_church_adobe_typekit', '=', '1' ),
			),
			array(
				'title'		=> esc_html__('Typekit Font Family 1', 'vision-church'),
				'id'		=> 'vision_church_typekit_font1',
				'type'		=> 'text',
				'required'  => array( 'vision_church_adobe_typekit', '=', '1' ),
			),
			array(
				'title'		=> esc_html__('Typekit Font Family 2', 'vision-church'),
				'id'		=> 'vision_church_typekit_font2',
				'type'		=> 'text',
				'required'  => array( 'vision_church_adobe_typekit', '=', '1' ),
			),
			array(
				'title'		=> esc_html__('Typekit Font Family 3', 'vision-church'),
				'id'		=> 'vision_church_typekit_font3',
				'type'		=> 'text',
				'required'  => array( 'vision_church_adobe_typekit', '=', '1' ),
			),

		),
	));


	// -> START Social Networks Fields
	Redux::setSection( $opt_name, array(
		'title'		=> esc_html__( 'Social Networks', 'vision-church' ),
		'id'		=> 'social_opts',
		'icon'		=> 'sl-share',
		'fields'	=> array(
			array(
                'id'       => 'vision_church_social_first',
                'type'     => 'select',
                'title'    => esc_html__('1st Social Name', 'vision-church'),
                'options'  => $webnus_socials,
                'default'  => 'facebook',
            ),
			array(
				'id'		=> 'vision_church_social_first_url',
				'type'		=> 'text',
				'title'		=> esc_html__('1st Social URL', 'vision-church'),
				'required'  => array( 'vision_church_social_first', '!=', '' ),
        'default'  => 'https://www.facebook.com/',
			),
			array(
				'id'		=> 'vision_church_social_second',
				'type'		=> 'select',
				'title'		=> esc_html__('2nd Social Name', 'vision-church'),
				'options'	=> $webnus_socials,
        'default'  => 'twitter',
			),
			array(
				'id'		=> 'vision_church_social_second_url',
				'type'		=> 'text',
				'title'		=> esc_html__('2nd Social URL', 'vision-church'),
				'required'  => array( 'vision_church_social_second', '!=', '' ),
        'default'  => 'https://twitter.com/',
			),
			array(
				'id'		=> 'vision_church_social_third',
				'type'		=> 'select',
				'title'		=> esc_html__('3rd Social Name', 'vision-church'),
				'options'	=> $webnus_socials,
        'default'  => 'instagram',
			),
			array(
				'id'		=> 'vision_church_social_third_url',
				'type'		=> 'text',
				'title'		=> esc_html__('3rd Social URL', 'vision-church'),
				'required'  => array( 'vision_church_social_third', '!=', '' ),
        'default'  => 'https://www.instagram.com/',
			),
			array(
				'id'		=> 'vision_church_social_fourth',
				'type'		=> 'select',
				'title'		=> esc_html__('4th Social Name', 'vision-church'),
				'options'	=> $webnus_socials,
			),
			array(
				'id'		=> 'vision_church_social_fourth_url',
				'type'		=> 'text',
				'title'		=> esc_html__('4th Social URL', 'vision-church'),
				'required'  => array( 'vision_church_social_fourth', '!=', '' ),
			),
			array(
				'id'		=> 'vision_church_social_fifth',
				'type'		=> 'select',
				'title'		=> esc_html__('5th Social Name', 'vision-church'),
				'options'	=> $webnus_socials,
			),
			array(
				'id'		=> 'vision_church_social_fifth_url',
				'type'		=> 'text',
				'title'		=> esc_html__('5th Social URL', 'vision-church'),
				'required'  => array( 'vision_church_social_fifth', '!=', '' ),
			),
			array(
				'id'		=> 'vision_church_social_sixth',
				'type'		=> 'select',
				'title'		=> esc_html__('6th Social Name', 'vision-church'),
				'options'	=> $webnus_socials,
			),
			array(
				'id'		=> 'vision_church_social_sixth_url',
				'type'		=> 'text',
				'title'		=> esc_html__('6th Social URL', 'vision-church'),
				'required'  => array( 'vision_church_social_sixth', '!=', '' ),
			),
			array(
				'id'		=> 'vision_church_social_seventh',
				'type'		=> 'select',
				'title'		=> esc_html__('7th Social Name', 'vision-church'),
				'options'	=> $webnus_socials,
			),
			array(
				'id'		=> 'vision_church_social_seventh_url',
				'type'		=> 'text',
				'title'		=> esc_html__('7th Social URL', 'vision-church'),
				'required'  => array( 'vision_church_social_seventh', '!=', '' ),
			),
		),
	) );

    // -> START Google Map Fields
    Redux::setSection( $opt_name, array(
        'title'     => esc_html__( 'Google Map', 'vision-church' ),
        'id'        => 'google_map_opts',
        'icon'      => 'icon-map-pin',
        'fields'    => array(
            array(
                'title'     => esc_html__( 'API key', 'vision-church' ),
                'subtitle'  => wp_kses( __('You should create an API for yourself and put code here. red below link to more info:  <a href="https://console.developers.google.com/flows/enableapi?apiid=maps_backend,geocoding_backend,directions_backend,distance_matrix_backend,elevation_backend,places_backend&keyType=CLIENT_SIDE&reusekey=true" target="_blank">Here</a><br><br>', 'vision-church'), $keyses ),
                'id'        => 'vision_church_google_map_api',
                'type'      => 'text',
            ),
            array(
                'title'     => esc_html__( 'Display Sign in button', 'vision-church' ),
                'subtitle'  => wp_kses( __('You can see Sign In button <a href="https://developers.google.com/maps/documentation/javascript/examples/save-simple" target="_blank">Here</a><br/><br/>', 'vision-church'), $keyses ),
                'id'        => 'vision_church_google_map_api_sign_in',
                'type'      => 'switch',
                'default'   => '1',
                'on'        => esc_html__( 'Show', 'vision-church' ),
                'off'       => esc_html__( 'Hide', 'vision-church' ),
            ),
        ),
    ) );

	// -> START Shop Fields
	Redux::setSection( $opt_name, array(
		'title'		=> esc_html__( 'Shop', 'vision-church' ),
		'id'		=> 'shop_opts',
		'icon'		=> 'ti-shopping-cart',
		'fields'	=> array(
			array(
				'title'		=> esc_html__('Show/Hide Sidebar', 'vision-church'),
				'id'		=> 'vision_church_woo_sidebar_enable',
				'type'		=> 'switch',
				'default'	=> '1',
				'on'		=> esc_html__( 'Show', 'vision-church' ),
				'off'		=> esc_html__( 'Hide', 'vision-church' ),
			),
			array(
				'title'		=> esc_html__('Shop title Show/Hide', 'vision-church'),
				'id'		=> 'vision_church_woo_shop_title_enable',
				'type'		=> 'switch',
				'default'	=> '1',
				'on'		=> esc_html__( 'Show', 'vision-church' ),
				'off'		=> esc_html__( 'Hide', 'vision-church' ),
			),
			array(
				'title'		=> esc_html__('Shop page title', 'vision-church'),
				'id'		=> 'vision_church_woo_shop_title',
				'type'		=> 'text',
				'default'	=> 'Shop',
				'required'  => array( 'vision_church_woo_shop_title_enable', '=', '1' ),
			),
			array(
				'title'		=> esc_html__('Product page title Show/Hide', 'vision-church'),
				'id'		=> 'vision_church_woo_product_title_enable',
				'type'		=> 'switch',
				'default'	=> '1',
				'on'		=> esc_html__( 'Show', 'vision-church' ),
				'off'		=> esc_html__( 'Hide', 'vision-church' ),
			),
			array(
				'title'		=> esc_html__('Product page title', 'vision-church'),
				'id'		=> 'vision_church_woo_product_title',
				'type'		=> 'text',
				'default'	=> 'Product',
				'required'  => array( 'vision_church_woo_product_title_enable', '=', '1' ),
			),
		),
	) );

	// -> START Maintenance Fields
	Redux::setSection( $opt_name, array(
		'title'		=> esc_html__( 'Maintenance Mode', 'vision-church' ),
		'id'		=> 'coming_soon_opts',
		'desc'		=> esc_html__( 'After creating your page, you can select it from dropdown list.', 'vision-church' ),
		'icon'		=> 'sl-rocket',
		'fields'	=> array(
			array(
				'title'		=> esc_html__( 'Maintenance Mode', 'vision-church' ),
				'subtitle'		=> esc_html__( 'Status of Maintenance Mode', 'vision-church' ),
				'id'		=> 'vision_webnus_maintenance_mode',
				'type'		=> 'switch',
				'default'	=> '0',
				'on'		=> esc_html__( 'Enabled', 'vision-church' ),
				'off'		=> esc_html__( 'Disabled', 'vision-church' ),
			),
			array(
				'title'		=> esc_html__( 'Maintenance Page', 'vision-church' ),
				'subtitle'		=> esc_html__( 'Select Maintenance Page', 'vision-church' ),
				'id'		=> 'vision_webnus_maintenance_page',
				'type'		=> 'select',
				'data'		=> 'page',
				'required'  => array( 'vision_webnus_maintenance_mode', '=', '1' ),
			),
		),
	) );


	// -> START Custom Codes Fields
	Redux::setSection( $opt_name, array(
		'title'		=> esc_html__( 'Custom Codes', 'vision-church' ),
		'id'		=> 'custom_codes',
		'icon'		=> 'fa-code',
		'fields'	=> array(
			array(
				'title'		=> esc_html__( 'Custom CSS', 'vision-church' ),
				'subtitle'	=> esc_html__( 'Any custom CSS from the user should go in this field, it will override the theme CSS.', 'vision-church' ),
				'id'		=> 'vision_church_custom_css',
				'type'		=> 'ace_editor',
				'mode'		=> 'css',
				'theme'		=> 'chrome',
				'full_width'=> true,
			),
			array(
				'title'		=> esc_html__( 'Space Before &lt;/head&gt;', 'vision-church' ),
				'subtitle'		=> esc_html__( 'Add code before the &lt;/head&gt; tag.', 'vision-church' ),
				'id'		=> 'vision_church_space_before_head',
				'type'		=> 'ace_editor',
				'theme'		=> 'chrome',
				'full_width'=> true,
			),
			array(
				'title'		=> esc_html__( 'Space Before &lt;/body&gt;', 'vision-church' ),
				'subtitle'		=> esc_html__( 'Add code before the &lt;/body&gt; tag.', 'vision-church' ),
				'id'		=> 'vision_church_space_before_body',
				'type'		=> 'ace_editor',
				'theme'		=> 'chrome',
				'full_width'=> true,
			),
		),
	) );


	/*
	 * <--- END SECTIONS
	 */