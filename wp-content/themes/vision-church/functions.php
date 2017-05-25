<?php
// Add Localization
load_theme_textdomain('vision-church', get_template_directory().'/languages');

// Include inc folder files
include_once get_template_directory(). '/inc/init.php';
include_once get_template_directory() . '/inc/dynamicfiles/dyncss.php';


// Sets up theme defaults and registers support for various WordPress features
add_action( 'after_setup_theme', 'vision_church_theme_setup' );
function vision_church_theme_setup() {
	add_theme_support('title-tag');
	add_theme_support('woocommerce');
	add_theme_support('post-thumbnails');
	add_theme_support('automatic-feed-links');
	add_theme_support('post-formats', array( 'aside','gallery', 'link', 'quote','image','video','audio' ));

	add_action( 'init', 'vision_church_register_menus');
	add_action( 'widgets_init', 'vision_church_sidebar_init');
	add_action( 'wp_enqueue_scripts', 'vision_church_script_loader');
	add_action( 'wp_enqueue_scripts', 'vision_church_api', 10);
	add_action( 'wp_enqueue_scripts', 'wn_enqueue_typekit' );

	add_action( 'admin_enqueue_scripts', 'vision_church_admin_enqueue' );
	add_action( 'wp_head', 'vision_church_wphead_action');
	add_action( 'login_head', 'vision_church_custom_login_logo' );
	add_action( 'wp_head', 'vision_church_open_graph_tags');
	add_action( 'template_redirect', 'vision_church_maintenance_mode');
	add_action( 'admin_bar_menu', 'remove_redux_themeoption_from_adminbar', 999 );
	add_action( 'admin_bar_menu', 'vision_church_admin_bar_link',25);
	add_action( 'init','vision_church_set_vc_as_theme');

	add_filter('excerpt_length', 'vision_church_excerpt_length', 999);
	add_filter('excerpt_more', 'vision_church_excerpt_more');
	add_filter('the_content', 'vision_fix_vc_sec' );
	add_filter('the_content_more_link', 'vision_church_excerpt_more');
	add_filter('upload_mimes', 'vision_church_custom_font_mimes');
	add_filter('body_class', 'vision_church_body_classes');

	update_option( 'image_default_link_type', 'file' );
}

// Globals should always be within a function
function vision_church_options() {
	global $vision_church_options;
	return $vision_church_options;
}

/***************************************/
/*	    Maintenance Mode
/***************************************/
function vision_church_maintenance_mode() {
	$vision_church_options = vision_church_options();
	$is_maintenance = isset( $vision_church_options['vision_church_maintenance_mode'] ) ? $vision_church_options['vision_church_maintenance_mode'] : '';
	$maintenance_page = isset($vision_church_options['vision_church_maintenance_page']) ? $vision_church_options['vision_church_maintenance_page'] : '';
	if (!is_page( $maintenance_page ) && $is_maintenance && $maintenance_page && !current_user_can('edit_posts') && !in_array( $GLOBALS['pagenow'], array( 'wp-login.php', 'wp-register.php' ))){
		wp_redirect( esc_url( home_url( 'index.php?page_id='.$maintenance_page) ) );
		exit();
	}
}

/***************************************/
/*	    General Sidebars
/***************************************/

function vision_church_sidebar_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Left Sidebar', 'vision-church' ),
		'id'            => 'left-sidebar',
		'description'   => esc_html__( 'Appears in left side in the blog page.', 'vision-church' ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="subtitle-wrap"><h4 class="subtitle">',
		'after_title'   => '</h4></div>',
		) );

	register_sidebar( array(
		'name'          => esc_html__( 'Right Sidebar', 'vision-church' ),
		'id'            => 'right-sidebar',
		'description'   => esc_html__( 'Appears in right side in the blog page.', 'vision-church' ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="subtitle-wrap"><h4 class="subtitle">',
		'after_title'   => '</h4></div>',
		) );

	register_sidebar( array(
		'name'          => esc_html__( 'Custom Sidebar', 'vision-church' ),
		'id'            => 'custom-sidebar',
		'description'   => esc_html__( 'Appears in custom pages.', 'vision-church' ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<div class="subtitle-wrap"><h4 class="subtitle">',
		'after_title'   => '</h4></div>',
		) );

	register_sidebar( array(
		'name'          => esc_html__( 'Toggle Top Area Section 1', 'vision-church' ),
		'id'            => 'top-area-1',
		'description'   => esc_html__( 'Appears in top area section 1', 'vision-church' ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="subtitle">',
		'after_title'   => '</h5>',
		) );

	register_sidebar( array(
		'name'          => esc_html__( 'Toggle Top Area Section 2', 'vision-church' ),
		'id'            => 'top-area-2',
		'description'   => esc_html__( 'Appears in top area section 2', 'vision-church' ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="subtitle">',
		'after_title'   => '</h5>',
		) );

	register_sidebar( array(
		'name'          => esc_html__( 'Toggle Top Area Section 3', 'vision-church' ),
		'id'            => 'top-area-3',
		'description'   => esc_html__( 'Appears in top area section 3', 'vision-church' ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="subtitle">',
		'after_title'   => '</h5>',
		) );

	register_sidebar( array(
		'name'          => esc_html__( 'Toggle Top Area Section 4', 'vision-church' ),
		'id'            => 'top-area-4',
		'description'   => esc_html__( 'Appears in top area section 4', 'vision-church' ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="subtitle">',
		'after_title'   => '</h5>',
		) );


	register_sidebar( array(
		'name'          => esc_html__( 'Footer Section 1', 'vision-church' ),
		'id'            => 'footer-section-1',
		'description'   => esc_html__( 'Appears in footer section 1', 'vision-church' ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="subtitle">',
		'after_title'   => '</h5>',
		) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Section 2', 'vision-church' ),
		'id'            => 'footer-section-2',
		'description'   => esc_html__( 'Appears in footer section 2', 'vision-church' ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="subtitle">',
		'after_title'   => '</h5>',
		) );


	register_sidebar( array(
		'name'          => esc_html__( 'Footer Section 3', 'vision-church' ),
		'id'            => 'footer-section-3',
		'description'   => esc_html__( 'Appears in footer section 3', 'vision-church' ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="subtitle">',
		'after_title'   => '</h5>',
		) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Section 4', 'vision-church' ),
		'id'            => 'footer-section-4',
		'description'   => esc_html__( 'Appears in footer section 4', 'vision-church' ),
		'before_widget' => '<div class="widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5 class="subtitle">',
		'after_title'   => '</h5>',
		) );

	register_sidebar( array(
		'name' => esc_html__( 'WooCommerce Page Sidebar', 'vision-church' ),
		'id' => 'shop-widget-area',
		'description' => esc_html__( 'Product page widget area', 'vision-church' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title"><span>',
		'after_title' => '</span></h3><div class="sidebar-line"><span></span></div>',
		) );

	register_sidebar( array(
		'name' => esc_html__( 'Header Sidebar', 'vision-church' ),
		'id' => 'header-advert',
		'description' => esc_html__( 'Header Sidebar', 'vision-church' ),
		'before_widget' => '<div class="widget">',
		'after_widget' => '</div>',
		'before_title' => '<h5 class="subtitle">',
		'after_title' => '</h5>',
		) );

	if(function_exists('is_woocommerce')) {
		register_sidebar(array(
			'name' => esc_html__( 'WooCommerce Header Widget Area', 'vision-church' ),
			'id' => 'woocommerce_header',
			'description' => esc_html__('This widget area should be used only for WooCommerce header cart widget', 'vision-church' ),
			'before_widget' => '',
			'after_widget' => '',
			'before_title' => '',
			'after_title' => ''
			));
	}

}

/***************************************/
/*	    Excerpt Length
/***************************************/

function vision_church_excerpt_length($length) {
	return 300;
}

function vision_church_excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);
	if (count($excerpt)>=$limit) {
		array_pop($excerpt);
		$excerpt = implode(" ",$excerpt).'...';
	} else {
		$excerpt = implode(" ",$excerpt);
	}
	return $excerpt;
}

function vision_church_excerpt_more($more) {
	$vision_church_options = vision_church_options();
	$vision_church_options['vision_church_blog_readmore_text'] = isset($vision_church_options['vision_church_blog_readmore_text']) ? $vision_church_options['vision_church_blog_readmore_text'] : 'Continue Reading' ;
	global $post;
	return '... <br><br><a class="readmore" href="' . get_permalink($post->ID) . '">' . esc_html($vision_church_options['vision_church_blog_readmore_text']) . '</a>';
}


/*******************************/
/*	 Add to Admin Bar Menu
/******************************/

// Add Webnus Theme Options To Admin Menu
function vision_church_admin_bar_link() {
	global $wp_admin_bar;
	if ( !is_super_admin() || !is_admin_bar_showing() )
		return;
	$wp_admin_bar->add_menu( array(
		'id' => 'vision_church_themeoption_link',
		'title' => esc_html__( 'Webnus Theme Option','vision-church'),
		'href' => site_url().'/wp-admin/themes.php?page=vision_church_theme_options',
		) );
}

/****************************/
/*	   Navigation Menu
/****************************/

/** Register Menus */
function vision_church_register_menus() {
	register_nav_menus(
		array(
			'header-top-menu'				=> esc_html__('Topbar Menu', 'vision-church'),
			'top-header-menu'				=> esc_html__('Top Header Menu', 'vision-church'),
			'header-menu'					=> esc_html__('Header Menu', 'vision-church'),
			'onepage-header-menu'			=> esc_html__('Onepage Header Menu', 'vision-church'),
			'duplex-menu-left'				=> esc_html__('Duplex Menu - Left', 'vision-church'),
			'duplex-menu-right' 			=> esc_html__('Duplex Menu - Right', 'vision-church'),
			'hamburger-menu' 				=> esc_html__('Hamburger Menu', 'vision-church'),
			'footer-menu'					=> esc_html__('Footer Menu', 'vision-church'),
			)
		);
}

/** Walker Nav Menu */
class vision_church_description_walker extends Walker_Nav_Menu{
	function start_el( &$output, $item, $depth=0, $args=array(), $current_object_id=0 ) {

		$is_mega = '';
		if ( $item->object == 'page' ) :
			$is_mega	= get_post_meta( $item->object_id, 'vision_church_mega_menu_meta', true );
		endif;

		// indent
		$indent			= ( $depth ) ? str_repeat( "\t", $depth ) : '';

		// menu id
		$id 			= apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id 			= $id ? ' id="' . esc_attr( $id ) . '"' : '';

		// menu attribiuts
		$attributes = '';
		!empty( $item->attr_title ) and $attributes .= ' title="' . esc_attr( $item->attr_title ) .'"';
		!empty( $item->target ) and $attributes .= ' target="' . esc_attr( $item->target ) .'"';
		!empty( $item->xfn ) and $attributes .= ' rel="' . esc_attr( $item->xfn ) .'"';
		$attributes .= ( ! empty( $item->url ) && ! $is_mega ) ? ' href="' . esc_url( $item->url ) .'"' : 'href="#"';

		// menu icon
		$icon = isset( $item->icon ) && $item->icon ? '<i class="'.$item->icon.'"></i>' : '' ;

		// colorize categories in menu
		$cat_color = '';
		if ( $item->object == 'category' ) :
			$cat_data	= get_option( 'category_' . $item->object_id );
			$cat_color	= ! empty( $cat_data['catBG'] ) ? ' style="color:' . $cat_data['catBG'] .'"' : '' ;
		endif;

		// start item outputs
		$item_output = '';
		$item_output .= $args->before;
		$item_output .= '<a ' . $attributes . ' data-description="' .$item->description .'"' . $cat_color . '>';
		$item_output .= $icon;
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

		// start menu class
		$classes		= empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[]		= 'menu-item-' . $item->ID;

		// mega menu
		if ( $is_mega ) :
			$post_obj	  = get_post( $item->object_id, 'OBJECT' );
			$classes[]	  = 'mega';
			$item_output .= '<ul class="sub-menu"><li>' .  do_shortcode( $post_obj->post_content ) . '</li></ul>';
		endif;

		// end menu class
		$class_names	= join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names	= $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '' ;

		// posts mega menu
		if ( $depth == 0 && $item->object == 'category' && $item->classes['0'] == "mega" ) :
			global $post;
			$menuposts = get_posts( array( 'posts_per_page' => 4, 'category' => $item->object_id ) );
			$item_output .= '<ul class="sub-posts">';
				foreach ( $menuposts as $post ) :
					$post_title		= get_the_title();
					$post_link		= get_permalink();
					$post_time		= get_the_time( get_option( 'date_format' ) );
					$post_comments	= get_comments_number();
					$post_views		= vision_church_getViews( get_the_ID() );
					$post_image		= wp_get_attachment_image_src( get_post_thumbnail_id(), 'vision_church_latestfromblog' );
					if ( $post_image != '' ) :
						$menu_post_image = '<img src="' . $post_image[0]. '" alt="' . $post_title . '" width="' . $post_image[1]. '" height="' . $post_image[2]. '">';
					else :
						$menu_post_image = esc_html__( 'No image', 'vision-church' );
					endif;
					$item_output .= '
						<li>
							<figure>
								<a href="'  .esc_url($post_link) . '">' . $menu_post_image . '</a>
							</figure>
							<h5><a href="' . esc_url($post_link) . '">' . $post_title . '</a></h5>
						</li>';
				endforeach;
				wp_reset_postdata();
			$item_output .= '</ul>';
		endif;

		$output .= $indent . '<li' . $id . $class_names .'>';
		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}
}


/****************************/
/*		Enqueue Scripts
/***************************/

// Webnus Google Fonts
function vision_church_google_fonts_url() {
	$fonts_url 		= '';
	$font_families	= array();
	$subsets		= 'latin,latin-ext';

    // Default typography
	if ( 'off' !== _x( 'on', 'Source Sans Pro font: on or off', 'vision-church' ) ) {
		$font_families[] = 'Source Sans Pro:400,300,400italic,600,700,700italic,900';
	}
	if ( 'off' !== _x( 'on', 'Lora font: on or off', 'vision-church' ) ) {
		$font_families[] = 'Lora:400,400italic,700,700italic';
	}
	if ( 'off' !== _x( 'on', 'Playfair Display font: on or off', 'vision-church' ) ) {
		$font_families[] = 'Playfair Display:400,400italic,700';
	}

	if ( $font_families ) {
		$fonts_url = add_query_arg( array(
			'family' => urlencode( implode( '|', $font_families ) ),
			'subset' => urlencode( $subsets ),
			), 'https://fonts.googleapis.com/css' );
	}

	return esc_url( $fonts_url );
}

function vision_church_script_loader(){
	$vision_church_options = vision_church_options();

	$w_theme = wp_get_theme();
	$w_version = $w_theme->get('Version');

// main style
	$vision_church_options['vision_church_css_minifier'] = isset( $vision_church_options['vision_church_css_minifier'] ) ? $vision_church_options['vision_church_css_minifier'] : '1';
	$main_style_uri = ( $vision_church_options['vision_church_css_minifier'] ) ? get_template_directory_uri() . '/css/master-min.php':get_template_directory_uri().'/css/master.css';
	wp_register_style( 'vision-church-main-style', $main_style_uri, false, $w_version );
	wp_enqueue_style('vision-church-main-style');


// google font
	wp_enqueue_style( 'vision-church-google-fonts', vision_church_google_fonts_url(), array(), null );


// Comment Reply JS
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

// Webnus JS
	wp_enqueue_script('doubletab', get_template_directory_uri() . '>/js/jquery.plugins.js', array( 'jquery' ), null, true);
	if(!is_single())
		wp_enqueue_script('vision_church_masonry', get_template_directory_uri() . '/js/jquery.masonry.min.js', array( 'jquery' ), null, true);
	wp_enqueue_script( 'vision_church_custom_script', get_template_directory_uri() . '/js/webnus-custom.js', array( 'jquery' ), null, true );
}

function vision_church_api() {
	// Google Map api
	$vision_church_options = vision_church_options();
	$api_code       = ( isset( $vision_church_options['vision_church_google_map_api'] ) && $vision_church_options['vision_church_google_map_api'] ) ? 'key=' . $vision_church_options['vision_church_google_map_api'] : '';
	$sign_in        = ( isset( $vision_church_options['vision_church_google_map_api_sign_in'] ) && $vision_church_options['vision_church_google_map_api_sign_in'] ) ? 'signed_in=true' : '';
	$init_query     = ( $api_code || $sign_in ) ? '?' : '';
	$merge_query    = $api_code ? '&' : '';
	wp_register_script( 'vision-googlemap-api', 'https://maps.googleapis.com/maps/api/js' . $init_query . $api_code . $merge_query . $sign_in, array(), false, false );

    // youtube
	wp_register_script( 'youtube-api', get_template_directory_uri() . '/js/youtube-api.js', array(), false, false );
}

/****************************/
/*	Admin Enqueue Scripts
/****************************/

function vision_church_admin_enqueue() {
// IconFonts Style
	wp_enqueue_style( 'vision-church-iconfonts-style', get_template_directory_uri() . '/css/iconfonts.css', null, null );
	wp_enqueue_style( 'sweetalert', get_template_directory_uri() . '/css/sweetalert.min.css', array(), 'all' );

// Webnus Admin JS
	wp_enqueue_script( 'sweetalert', get_template_directory_uri() . '/js/sweetalert.min.js', array(), null, true );
	wp_enqueue_script( 'vision-custom-scripts', get_template_directory_uri() . '/js/webnus-custom-admin.js', array( 'jquery' ), null, true );
}



/************************************************************/
/*	Add Page Background & Typekit & Header Area to Header
/************************************************************/

// Typekit
function wn_enqueue_typekit() {
	$vision_church_options = vision_church_options();
	$w_adobe_typekit = ltrim ( isset( $vision_church_options['vision_church_typekit_id'] ) ? $vision_church_options['vision_church_typekit_id'] : '' );
	$vision_church_options['vision_church_adobe_typekit'] = isset( $vision_church_options['vision_church_adobe_typekit'] ) ? $vision_church_options['vision_church_adobe_typekit'] : '0';
	if(isset($w_adobe_typekit ) && !empty($w_adobe_typekit ) && $vision_church_options['vision_church_adobe_typekit'] == '1') {
		wp_enqueue_script( 'wn-typekit', 'https://use.typekit.net/'.esc_attr( $w_adobe_typekit ).'.js', array(), '1.0' );
		wp_add_inline_script( 'wn-typekit', 'try{Typekit.load({ async: true });}catch(e){}' );
	}
}

function vision_church_wphead_action() {
	$vision_church_options = vision_church_options();

	// Header Area
	echo isset( $vision_church_options['vision_church_space_before_head'] ) ? $vision_church_options['vision_church_space_before_head'] : '';


}


/*******************************/
/*		Custom Admin Logo
/******************************/

function vision_church_custom_login_logo() {
	$vision_church_options = vision_church_options();
	$logo = isset($vision_church_options['vision_church_admin_login_logo']['url'])? $vision_church_options['vision_church_admin_login_logo']['url'] : '' ;
	if(isset($logo) && !empty($logo))
		echo '<style type="text/css">h1 a { background-image:url('.esc_url( $logo ).') !important; }</style>';
}


/*************************/
/*		Open Graph
**************************/

function vision_church_my_excerpt($text, $excerpt){
	if ($excerpt) return $excerpt;
	$text = strip_shortcodes( $text );
	$text = apply_filters('the_content', $text);
	$text = str_replace(']]>', ']]&gt;', $text);
	$text = strip_tags($text);
	$excerpt_length = apply_filters('excerpt_length', 55);
	$excerpt_more = apply_filters('excerpt_more', ' ' . '[...]');
	$words = preg_split("/[\n
		]+/", $text, $excerpt_length + 1, PREG_SPLIT_NO_EMPTY);
	if ( count($words) > $excerpt_length ) {
		array_pop($words);
		$text = implode(' ', $words);
		$text = $text . $excerpt_more;
	} else {
		$text = implode(' ', $words);
	}
	return apply_filters('wp_trim_excerpt', $text, $excerpt);
}


function vision_church_open_graph_tags() {
	if (is_single()) {
		global $post;
		if(get_the_post_thumbnail($post->ID, 'thumbnail')) {
			$thumbnail_id = get_post_thumbnail_id($post->ID);
			$thumbnail_object = get_post($thumbnail_id);
			$image = $thumbnail_object->guid;
		} else {
			$image = ''; // Change this to the URL of the logo you want beside your links shown on Facebook
		}
		$description = vision_church_my_excerpt( $post->post_content, $post->post_excerpt );
		$description = strip_tags($description);
		$description = str_replace("\"", "'", $description);
		?>
		<meta property="og:title" content="<?php the_title(); ?>" />
		<meta property="og:type" content="article" />
		<meta property="og:image" content="<?php echo esc_url($image); ?>" />
		<meta property="og:url" content="<?php the_permalink(); ?>" />
		<meta property="og:description" content="<?php echo esc_attr($description); ?>" />
		<meta property="og:site_name" content="<?php echo get_bloginfo('name'); ?>" />
		<?php
	}
}


/**************************/
/*		Post View
/**************************/

function vision_church_setViews($postID) {
	$count_key = 'vision_church_views';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	}else{
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
	return $count;
}
function vision_church_getViews($postID) {
	$count_key = 'vision_church_views';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
	}
	return $count;
}





/********************************/
/*   	Custom Functions
/********************************/

// MIMETYPE fonts
function vision_church_custom_font_mimes ( $existing_mimes=array() ) {
	$existing_mimes['woff'] = 'application/x-font-woff';
	$existing_mimes['ttf'] = 'application/x-font-ttf';
	$existing_mimes['eot'] = 'application/vnd.ms-fontobject"';
	return $existing_mimes;
}

// Validates a field's length.
if ( ! function_exists( 'vision_church_validate_length' ) ) {
	function vision_church_validate_length( $fieldValue, $minLength ) {
		return ( strlen( trim( $fieldValue ) ) > $minLength );
	}
}

function vision_church_set_vc_as_theme(){
	if( function_exists( 'vc_set_as_theme' ) ) {
		vc_set_as_theme( $notifier = false );
	}
}
if (!isset($content_width)){$content_width = 940;}
if(false){wp_link_pages(); posts_nav_link(); paginate_links(); the_tags();get_post_format(0);}

if ( ! function_exists( 'vision_fix_vc_sec' ) ) :
	function vision_fix_vc_sec( $content ) {
		return strtr( $content, array( '<p>[' => '[', ']</p>' => ']', ']<br />' => ']' ) );
	}
endif;

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
function vision_church_body_classes( $classes ) {
	$vision_church_options = vision_church_options();
	// Transparent Header
	$transparent_header = '';
	if(is_page()){
		$transparent_header = rwmb_meta( 'vision_church_transparent_header_meta' );
	}
	$classes[] = ($transparent_header=='light')?esc_attr( ' transparent-header-w' ):'';
	$classes[] = ($transparent_header=='dark')?esc_attr( ' transparent-header-w t-dark-w' ):'';

	// Post Show
	if (is_single()){
		$post_meta = rwmb_meta( 'vision_church_blogpost_meta' );
		if(!empty($post_meta)){
			if($post_meta=="postshow1" && $thumbnail_id = get_post_thumbnail_id()){
				$classes[] = esc_attr( " postshow1-hd transparent-header-w t-dark-w" );
			} elseif ( $post_meta=="postshow2" && $thumbnail_id = get_post_thumbnail_id() ) {
				$classes[] = esc_attr( " postshow2-hd" );
			}
		}
	}
	$vision_church_options['vision_church_header_topbar_enable'] = isset($vision_church_options['vision_church_header_topbar_enable']) ? $vision_church_options['vision_church_header_topbar_enable'] : '1' ;
	$vision_church_options['vision_church_topbar_fixed'] = isset($vision_church_options['vision_church_topbar_fixed']) ? $vision_church_options['vision_church_topbar_fixed'] : '0' ;
	$vision_church_options['vision_church_enable_smoothscroll'] = isset($vision_church_options['vision_church_enable_smoothscroll']) ? $vision_church_options['vision_church_enable_smoothscroll'] : '' ;
	$vision_church_options['vision_church_header_menu_type'] = isset($vision_church_options['vision_church_header_menu_type']) ? $vision_church_options['vision_church_header_menu_type'] : '13' ;
	// topbar
	$classes[] =($vision_church_options['vision_church_header_topbar_enable'])?esc_attr( ' has-topbar-w' ):'';
	$classes[] =($vision_church_options['vision_church_topbar_fixed'])?esc_attr( ' topbar-fixed' ):'';

	// smooth scroll
	$classes[] = $vision_church_options['vision_church_enable_smoothscroll'] ? esc_attr( ' smooth-scroll' ) : '';

	// header 11
	$classes[] = $vision_church_options['vision_church_header_menu_type'] == '11' ? esc_attr( ' has-header-type11' ) : '';

	// header 13
	$classes[] = $vision_church_options['vision_church_header_menu_type'] == '13' ? esc_attr( ' has-header-type13' ) : '';

	// header 9
	$classes[] = $vision_church_options['vision_church_header_menu_type'] == '9' ? esc_attr( ' has-header-type9' ) : '';
	
	// hamburger toggle
	$vision_church_options['vision_church_header_hamburger_menu_enable'] = isset( $vision_church_options['vision_church_header_hamburger_menu_enable'] ) ? $vision_church_options['vision_church_header_hamburger_menu_enable'] : '1';
	$classes[] = ( $vision_church_options['vision_church_header_hamburger_menu_enable'] == 1 && ( $vision_church_options['vision_church_header_menu_type'] == 13 || $vision_church_options['vision_church_header_menu_type'] == 10 || $vision_church_options['vision_church_header_menu_type'] == 1 ) )? esc_attr( 'wn-ht' ) . ' ' : '';
	$classes[] = empty( $vision_church_options['vision_church_header_menu_icon'] ) ? esc_attr( 'wn-responsive' ) . ' ' : '';
	return $classes;
}


/********************************/
/*   	Template Tags
/********************************/
function vision_church_comments($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment; ?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID() ?>">
	<div class="comment-content">
		<div class="comment-info">
			<?php echo get_avatar( $comment, 90 ); ?>
			<cite>
				<?php comment_author_link() ?> :
				<span class="comment-data"><a href="#comment-<?php comment_ID() ?>" title=""><?php comment_date('F j, Y'); ?> at <?php comment_time('g:i a'); ?></a><?php edit_comment_link('Edit',' | ',''); ?></span>
			</cite>
		</div>
		<div class="comment-text">
			<?php if ($comment->comment_approved == '0') : ?>
				<p><em><?php esc_html_e('Your comment is awaiting moderation.','vision-church'); ?></em></p>
			<?php endif; ?>
			<?php comment_text() ?>
			<div class="reply">
				<?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
			</div>
		</div>
	</div>
<?php }

require get_template_directory() . '/inc/template-functions/template-functions.php';

// Remove theme option from admin topbar
	if ( ! function_exists( 'remove_redux_themeoption_from_adminbar' ) ) :
		function remove_redux_themeoption_from_adminbar( $wp_admin_bar ){
			$wp_admin_bar->remove_node( 'vision_church_theme_options' );
		}
	endif;

	if ( ! function_exists( 'vision_church_kses' )) {
		function vision_church_kses(){
			return array(
				'a' => array(
					'href' => array(),
					'title' => array(),
					'target' => array(),
					'style' => array(),
					'class' => array(),
					),
				'br' => array(),
				'em' => array(),
				'strong' => array(),
				'span' => array(
					'class' => array(),
					),
				);
		}
	}

// Modal Donate
	function vision_church_modal_donate() {
		GLOBAL $post;
		$vision_church_options = vision_church_options();
		$vision_church_options['webnus_donate_form'] = isset( $vision_church_options['webnus_donate_form'] ) ? $vision_church_options['webnus_donate_form'] : '';
		return '
		<a class="donate-button" href="#w-donate-'.get_the_ID().'" target="_self" data-effect="mfp-zoom-in">
			<span class="media_label">'.__('DONATE NOW','vision-church').'</span>
		</a>
		<div class="white-popup mfp-with-anim mfp-hide">
			<div id="donate-contact-modal-'.get_the_ID().'">
				<div class="w-modal modal-donate wn-donate-contact-modal" id="w-donate-'.get_the_ID().'">
					<h3 class="modal-title">'.__('Donate now','vision-church').'</h3><br>
					'.do_shortcode('[contact-form-7 id="'.$vision_church_options['webnus_donate_form'].'" title="Donate"]').'
				</div>
			</div>
		</div>';
	}