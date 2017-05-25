<?php
// Add menu
function webnus_admin_page() {
	$webnus_theme = wp_get_theme();
	$theme_name = $webnus_theme->get( 'Name' );
	$page_title = $theme_name.' page';
	$menu_title = $theme_name;
	$capability = 'edit_theme_options';
	$menu_slug  = 'wn-admin-page';
	$function	= 'webnus_welcome';
	add_theme_page($page_title, $menu_title, $capability, $menu_slug, $function);
}
add_action('admin_menu', 'webnus_admin_page');

// Redirect to welcome page
global $pagenow;
if ( is_admin() && 'themes.php' == $pagenow && isset( $_GET['activated'] ) ) {
	$webnus_theme = wp_get_theme();
	$theme_name = $webnus_theme->get( 'Name' );
	wp_redirect( admin_url( 'themes.php?page=wn-admin-page' ) );
}

// Content
function webnus_welcome(){
	$webnus_theme = wp_get_theme();
	$theme_version = $webnus_theme->get( 'Version' );
	$theme_name = $webnus_theme->get( 'Name' );
	$mem_limit = ini_get('memory_limit');
	$mem_limit_byte = wp_convert_hr_to_bytes($mem_limit);
	$upload_max_filesize = ini_get('upload_max_filesize');
	$upload_max_filesize_byte = wp_convert_hr_to_bytes($upload_max_filesize);
	$post_max_size = ini_get('post_max_size');
	$post_max_size_byte = wp_convert_hr_to_bytes($post_max_size);
	$mem_limit_byte_boolean = ($mem_limit_byte < 268435456);
	$upload_max_filesize_byte_boolean = ($upload_max_filesize_byte < 67108864);
	$post_max_size_byte_boolean = ($post_max_size_byte < 67108864);
	$execution_time = ini_get('max_execution_time');
	$execution_time_boolean = ($execution_time < 300);
	$input_vars = ini_get('max_input_vars');
	$input_vars_boolean = ($input_vars < 2000);
	$input_time = ini_get('max_input_time');
	$input_time_boolean = ($input_time < 1000);
	$theme_option_address = admin_url("themes.php?page=vision_church_theme_options");

	$keyses = array(
    'a' => array(
        'href' => array(),
        'title' => array(),
		'target' => array(),
    ),
    'br' => array(),
    'em' => array(),
    'strong' => array(),
	'code' => array(
		'class' => array(),
	),
	'p' => array(
		'class' => array(),
	),
	);
	ob_start();
	?>
	<div id="webnus-dashboard" class="wrap about-wrap">
		<div class="welcome-head w-clearfix">
			<div class="w-row">
				<div class="w-col-sm-10">
					<h1> <?php echo esc_html__('Welcome to','vision-church') .' '.$theme_name.'!'; ?> </h1>
					<div class="w-welcome">
						<p><?php echo  $theme_name.' '.esc_html__('is now installed and ready to use! Get ready to build something beautiful.','vision-church') ?></p>
					</div>
				</div>
				<div class="w-col-sm-2">
					<img src="<?php echo get_template_directory_uri() . '/images/logo.png'; ?>" />
					<span class="w-theme-version"><?php echo esc_html__('Version','vision-church'); ?> <?php echo '' . $theme_version; ?></span>
				</div>
			</div>
		</div>
		<div class="welcome-content w-clearfix">
			<div class="w-row">
				<div class="w-col-sm-12">
					<h3> <?php echo esc_html__('To use the theme in best way, we suggest importing the demo first. please read below steps To install Theme and  import Dummy data:','vision-church'); ?> </h3>
				</div>
			</div>
			<div class="w-row">
				<div class="w-col-sm-6">
					<div class="w-box plugin">
						<div class="w-box-head">
							<span> 1 </span> <?php echo esc_html__('Install Plugins','vision-church'); ?>
						</div>
						<div class="w-box-content">
							<?php esc_html_e('These are plugins we include or offer for design integration with Vision Church. Webnus Core, Webnus Gallery, WP PageNavi, Visual Composer and Contact Form 7 are required plugins to use Vision Church. To install All plugins, click on "Install Plugins" button.' , 'vision-church'); ?>
							<div class="w-system-info">
								<span> <?php esc_html_e('Visual Composer','vision-church'); ?> </span>
								<?php
								if(!is_plugin_active('js_composer/js_composer.php')){ ?>
									<i class="w-icon w-icon-red ti-close"></i> <span class="w-current"> <?php esc_html_e('Not Active','vision-church') ?> </span>
								<?php } else { ?>
									<i class="w-icon w-icon-green ti-check"></i> <span class="w-current"> <?php esc_html_e('Active','vision-church') ?></span>
								<?php } ?>
							</div>
							<div class="w-system-info">
								<span> <?php esc_html_e('Webnus Core','vision-church'); ?> </span>
								<?php
								if(!is_plugin_active('webnus-core/webnus-core.php')){ ?>
									<i class="w-icon w-icon-red ti-close"></i> <span class="w-current"> <?php esc_html_e('Not Active','vision-church') ?></span>
								<?php } else { ?>
									<i class="w-icon w-icon-green ti-check"></i> <span class="w-current"> <?php esc_html_e('Active','vision-church') ?></span>
								<?php } ?>
							</div>
							<div class="w-system-info">
								<span> <?php echo esc_html__('Webnus Gallery','vision-church'); ?> </span>
								<?php
								if(!is_plugin_active('webnus-gallery/webnus-gallery.php')){ ?>
									<i class="w-icon w-icon-red ti-close"></i> <span class="w-current"> <?php esc_html_e('Not Active','vision-church') ?></span>
								<?php } else { ?>
									<i class="w-icon w-icon-green ti-check"></i> <span class="w-current"> <?php esc_html_e('Active','vision-church') ?></span>
								<?php } ?>
							</div>
							<div class="w-system-info">
								<span> <?php echo esc_html__('WP PageNavi','vision-church'); ?> </span>
								<?php
								if(!is_plugin_active('wp-pagenavi/wp-pagenavi.php')){ ?>
									<i class="w-icon w-icon-red ti-close"></i> <span class="w-current"> <?php esc_html_e('Not Active','vision-church')?></span>
								<?php } else { ?>
									<i class="w-icon w-icon-green ti-check"></i> <span class="w-current"> <?php esc_html_e('Active','vision-church')?></span>
								<?php } ?>
							</div>
							<div class="w-system-info">
								<span> <?php echo esc_html__('Contact Form 7','vision-church'); ?> </span>
								<?php
								if(!is_plugin_active('contact-form-7/wp-contact-form-7.php')){ ?>
									<i class="w-icon w-icon-red ti-close"></i> <span class="w-current"> <?php esc_html_e('Not Active','vision-church')?></span>
								<?php } else { ?>
									<i class="w-icon w-icon-green ti-check"></i> <span class="w-current"> <?php esc_html_e('Active','vision-church')?></span>
								<?php } ?>
							</div>
							<div class="w-system-info">
								<span> <?php echo esc_html__('Revolution Slider','vision-church'); ?> </span>
								<?php
								if(!is_plugin_active('revslider/revslider.php')){ ?>
									<i class="w-icon w-icon-red ti-close"></i> <span class="w-current"> <?php esc_html_e('Not Active','vision-church')?></span>
								<?php } else { ?>
									<i class="w-icon w-icon-green ti-check"></i> <span class="w-current"> <?php esc_html_e('Active','vision-church')?></span>
								<?php } ?>
							</div>
							<div class="w-button">
								<a href="<?php echo admin_url("themes.php?page=tgmpa-install-plugins") ?>" target="_blank"><?php esc_html_e('Install Plugins','vision-church'); ?></a>
							</div>
						</div>
					</div>
				</div>
				<div class="w-col-sm-6">
					<div class="w-box">
						<div class="w-box-head">
							<span> 2 </span> <?php esc_html_e('Import Dummy','vision-church'); ?>
						</div>
						<div class="w-box-content">
							<?php esc_html_e('When you install a demo it provides pages, images, theme options, posts, slider, widgets and etc. IMPORTANT: before installing a demo you need to install and activate included plugins. Please check below status to see if your server meets all essential requirements for a successful import.','vision-church') ?>
							<div class="w-system-info">
								<span> <?php esc_html_e('WP Memory Limit','vision-church'); ?> </span>
								<?php
								$wp_memory_limit = WP_MEMORY_LIMIT;
								$wp_memory_limit_value = preg_replace("/[^0-9]/", '', $wp_memory_limit);
								if( $wp_memory_limit_value < 256 ){ ?>
									<i class="w-icon w-icon-red ti-close"></i> <span class="w-current"> <?php echo esc_html__('Currently:','vision-church').' '.$wp_memory_limit ?> </span>
									<span class="w-min"> <?php esc_html_e('(min:256M)','vision-church') ?> </span>
									<label class="hero button" for="wp-memory-limit"> <?php esc_html('How to fix it','vision-church') ?> </label>
									<aside class="lightbox">
										<input type="checkbox" class="state" id="wp-memory-limit" />
										<article class="content">
											<header class="header">
												<label class="button" for="wp-memory-limit"><i class="ti-close"></i></label>
											</header>
											<main class="main">
												<p class="red"> <?php esc_html_e( 'We recommend setting memory to at least 256MB. Please define memory limit in wp-config.php file. you can read below link for more information:' , 'vision-church' ) ?></p>
												<a href="https://codex.wordpress.org/Editing_wp-config.php#Increasing_memory_allocated_to_PHP" target="_blank"> <?php esc_html_e( 'Increasing Wp Memory Limit' , 'vision-church' ) ?> </a>
											</main>
										</article>
										<label class="backdrop" for="wp-memory-limit"></label>
									</aside>
								<?php } else { ?>
									<i class="w-icon w-icon-green ti-check"></i> <span class="w-current"> <?php echo esc_html__('Currently:','vision-church').' '.$wp_memory_limit; ?> </span>
								<?php } ?>
							</div>
							<div class="w-system-info">
								<span> <?php esc_html_e('Upload Max. Filesize','vision-church') ?> </span>
								<?php
								if($upload_max_filesize_byte_boolean){ ?>
									<i class="w-icon w-icon-red ti-close"></i> <span class="w-current"> <?php echo esc_html__('Currently:','vision-church').' '.$upload_max_filesize; ?> </span>
									<span class="w-min"> <?php esc_html_e('(min:64M)','vision-church') ?> </span>
									<label class="hero button" for="php-upload-size"> <?php esc_html_e('How to fix it','vision-church') ?> </label>
									<aside class="lightbox">
										<input type="checkbox" class="state" id="php-upload-size" />
										<article class="content">
											<header class="header">
												<label class="button" for="php-upload-size"><i class="ti-close"></i></label>
											</header>
											<main class="main">
												<p class="red"> <?php esc_html_e( 'We recommend setting Upload Max. Filesize to at least 64MB. you can read below link for more information:' , 'vision-church' ) ?></p>
												<a href="https://premium.wpmudev.org/blog/increase-memory-limit/?ench=b&utm_expid=3606929-78.ZpdulKKETQ6NTaUGxBaTgQ.1&utm_referrer=https%3A%2F%2Fpremium.wpmudev.org%2Fblog%2F%3Fench%3Db%26s%3Dmemory_limit" target="_blank"> <?php esc_html_e( 'Increasing Upload Max. Filesize' , 'vision-church' ) ?></a><br>
											</main>
										</article>
										<label class="backdrop" for="php-upload-size"></label>
									</aside>
								<?php } else { ?>
									<i class="w-icon w-icon-green ti-check"></i> <span class="w-current"> <?php echo esc_html__('Currently:','vision-church').' '.$upload_max_filesize; ?> </span>
								<?php } ?>
							</div>
							<div class="w-system-info">
								<span> <?php esc_html_e('Max. Post Size','vision-church') ?> </span>
								<?php
								if($post_max_size_byte_boolean){ ?>
									<i class="w-icon w-icon-red ti-close"></i> <span class="w-current"> <?php echo esc_html__('Currently:','vision-church').' '.$post_max_size; ?> </span>
									<span class="w-min"> <?php esc_html_e('(min:64M)','vision-church') ?> </span>
									<label class="hero button" for="php-post-upload-size"> <?php esc_html_e('How to fix it','vision-church') ?> </label>
									<aside class="lightbox">
										<input type="checkbox" class="state" id="php-post-upload-size" />
										<article class="content">
											<header class="header">
												<label class="button" for="php-post-upload-size"><i class="ti-close"></i></label>
											</header>
											<main class="main">
												<p class="red"> <?php esc_html_e( 'We recommend setting Max. Post Size to at least 64MB. you can read below link for more information:' , 'vision-church' ) ?> </p>
												<a href="https://premium.wpmudev.org/blog/increase-memory-limit/?ench=b&utm_expid=3606929-78.ZpdulKKETQ6NTaUGxBaTgQ.1&utm_referrer=https%3A%2F%2Fpremium.wpmudev.org%2Fblog%2F%3Fench%3Db%26s%3Dmemory_limit" target="_blank">Increasing Max. Post Size</a><br>
											</main>
										</article>
										<label class="backdrop" for="php-post-upload-size"></label>
									</aside>
								<?php }else{ ?>
									<i class="w-icon w-icon-green ti-check"></i> <span class="w-current"> <?php echo esc_html__('Currently:','vision-church').' '.$post_max_size; ?> </span>
								<?php } ?>
							</div>
							<div class="w-system-info">
								<span> <?php esc_html_e('Max. Execution Time','vision-church'); ?> </span>
								<?php
								if($execution_time_boolean){ ?>
									<i class="w-icon w-icon-red ti-close"></i>
									<span class="w-current"> <?php echo esc_html('Currently:','vision-church').' '.$execution_time; ?> </span>
									<span class="w-min"> <?php esc_html_e('(min:300)','vision-church') ?> </span>
									<label class="hero button" for="execution-time"> <?php esc_html_e('How to fix it','vision-church') ?> </label>
									<aside class="lightbox">
										<input type="checkbox" class="state" id="execution-time" />
										<article class="content">
											<header class="header">
												<label class="button" for="execution-time"><i class="ti-close"></i></label>
											</header>
											<main class="main">
												<p class="red"> <?php esc_html_e( 'We recommend setting max execution time to at least 300. you can read below link for more information:' , 'vision-church' ) ?> </p>
												<a href="http://codex.wordpress.org/Common_WordPress_Errors#Maximum_execution_time_exceeded" target="_blank"> <?php esc_html_e( 'Increasing Max. Execution Time' , 'vision-church' ) ?> </a>
											</main>
										</article>
										<label class="backdrop" for="execution-time"></label>
									</aside>
								<?php } else { ?>
									<i class="w-icon w-icon-green ti-check"></i> <span class="w-current"> <?php echo esc_html__('Currently:','vision-church').' '.$execution_time; ?> </span>
								<?php } ?>
							</div>
							<div class="w-system-info">
								<span> <?php esc_html_e('PHP Max. Input Vars','vision-church') ?> </span>
								<?php
								if($input_vars_boolean){ ?>
									<i class="w-icon w-icon-red ti-close"></i>
									<span class="w-current"> <?php echo esc_html__('Currently:','vision-church').' '.$input_vars; ?> </span>
									<span class="w-min"> <?php esc_html_e('(min:2000)','vision-church') ?> </span>
									<label class="hero button" for="input-variables"><?php esc_html_e('How to fix it','vision-church') ?> </label>
									<aside class="lightbox">
										<input type="checkbox" class="state" id="input-variables" />
										<article class="content">
											<header class="header">
												<label class="button" for="input-variables"><i class="ti-close"></i></label>
											</header>
											<main class="main">
												<p class="red"> <?php esc_html_e( 'We recommend setting max execution time to at least 300. you can read below link for more information:' , 'vision-church' ) ?></p>
												<a href="http://codex.wordpress.org/Common_WordPress_Errors#Maximum_execution_time_exceeded" target="_blank"> <?php esc_html_e( 'Increasing PHP Max. Input Vars' , 'vision-church' ) ?> </a>
											</main>
										</article>
										<label class="backdrop" for="input-variables"></label>
									</aside>
								<?php } else { ?>
									<i class="w-icon w-icon-green ti-check"></i> <span class="w-current"> <?php echo esc_html__('Currently:','vision-church').' '.$input_vars; ?> </span>
								<?php } ?>
							</div>
							<div class="w-system-info">
								<span> <?php esc_html_e('PHP Max. Input Time','vision-church') ?> </span>
								<?php
								if($input_time_boolean){ ?>
									<i class="w-icon w-icon-red ti-close"></i> <span class="w-current"> <?php echo esc_html__('Currently:','vision-church').' '.$input_time; ?> </span>
									<span class="w-min"> <?php esc_html_e('(min:1000)','vision-church') ?></span>
									<label class="hero button" for="php-input-time"> <?php esc_html('How to fix it','vision-church') ?></label>
									<aside class="lightbox">
										<input type="checkbox" class="state" id="php-input-time" />
										<article class="content">
											<header class="header">
												<label class="button" for="php-input-time"><i class="ti-close"></i></label>
											</header>
											<main class="main">
												<p class="red"> <?php esc_html_e('It may not work with some shared hosts in which case you would have to ask your hosting service provider for support.' , 'vision-church' ) ?> </p>
												<strong> <?php esc_html_e('1- Create or Edit an existing PHP.INI file' , 'vision-church' ) ?> </strong><br>
												<?php esc_html_e('In most cases if you are on a shared host, you will not see a php.ini file in your directory. If you do not see one, then create a file called php.ini and upload it in the root folder. In that file add the following code:' , 'vision-church' ) ?><br>
												<code class="red"> <?php esc_html_e('max_input_time' , 'vision-church' ) ?> = 1000 </code><br><br>
												<strong> <?php esc_html_e('2- htaccess Method' , 'vision-church' ) ?></strong><br>
												<?php esc_html_e('Some people have tried using the htaccess method where by modifying the .htaccess file in the root directory, you can increase the Max. Input Time in WordPress. Open or create the .htaccess file in the root folder and add the following code:' , 'vision-church' ) ?><br>
												<code class="red"> <?php esc_html_e('php_value max_input_time' , 'vision-church' ) ?> 1000</code><br>
											</main>
										</article>
										<label class="backdrop" for="php-input-time"></label>
									</aside>
								<?php } else { ?>
									<i class="w-icon w-icon-green ti-check"></i> <span class="w-current"> <?php echo esc_html__('Currently:','vision-church').' '.$input_time; ?> </span>
								<?php }	?>
							</div>
							<div class="w-button">
								<a href="<?php echo '' . $theme_option_address; ?>" target="_blank"><?php esc_html_e('Import Dummy','vision-church'); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="welcome-content w-clearfix extra">
			<div class="w-row">
				<div class="w-col-sm-6">
					<div class="w-box doc">
						<div class="w-box-head">
							<?php esc_html_e('Documentation','vision-church'); ?>
						</div>
						<div class="w-box-content">
							<p>
							<?php esc_html_e('Our documentation is simple and functional wit full details and cover all essential aspects from beginning to the most advanced parts.' , 'vision-church'); ?>
							</p>
							<div class="w-button">
								<a href="http://webnus.biz/documentation/vision/" target="_blank"><?php esc_html_e('DOCUMENTATION','vision-church'); ?></a>
							</div>
						</div>
					</div>
				</div>
				<div class="w-col-sm-6">
					<div class="w-box support">
						<div class="w-box-head">
							<?php esc_html_e('Support Forum','vision-church'); ?>
						</div>
						<div class="w-box-content">
							<p>
							<?php esc_html_e('Webnus is elite and trusted author with high percentage of satisfied user. If you have any issues please don\'t hesitate to contact us, we will reply as soon as possible.' , 'vision-church'); ?>
							</p>
							<div class="w-button">
								<a href="https://webnus.ticksy.com/" target="_blank"><?php esc_html_e('OPEN A TICKET','vision-church'); ?></a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="w-row">
				<div class="w-col-sm-12">
					<div class="w-box change-log">
						<div class="w-box-head">
							<?php esc_html_e('Changelog (Updates)','vision-church'); ?>
						</div>
						<div class="w-box-content">
							<?php include_once get_template_directory() . '/Change_log.php'; ?>
							<pre><?php echo '' . $change_log; ?></pre>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
$out = ob_get_contents();
ob_end_clean();
echo '' . $out;
}

