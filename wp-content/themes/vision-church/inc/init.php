<?php

// Redirect to webnus welcome page
if ( is_admin() ) {
	include_once get_template_directory() . '/inc/webnus-admin-welcome/index.php';
}

if ( ! class_exists( 'ReduxFramework' ) ) {
	include_once get_template_directory() . '/inc/theme-options/ReduxCore/framework.php';
}

if ( ! isset( $vision_church_options ) ) :
	include_once get_template_directory() . '/inc/theme-options/webnus-options/webnus-options.php';
endif;

include_once get_template_directory() . '/inc/editor/nc-sc.php';
include_once get_template_directory() . '/inc/widgets/widgets-init.php';

include_once get_template_directory() . '/inc/helpers/breadcrumbs.php';
include_once get_template_directory() . '/inc/helpers/cat-field.php';
include_once get_template_directory() . '/inc/helpers/get-the-image.php';
include_once get_template_directory() . '/inc/helpers/show-ids.php';
include_once get_template_directory() . '/inc/helpers/speakers-images.php';

include_once get_template_directory() . '/inc/woocommerce/index.php';

include_once get_template_directory() . '/inc/plugins/plugin-activator/init.php';
include_once get_template_directory() . '/inc/plugins/sweet-custom-menu/sweet-custom-menu.php';

include_once get_template_directory() . '/inc/meta-box/metabox-core/meta-box.php';
include_once get_template_directory() . '/inc/meta-box/webnus-metabox/webnus-meta-box.php';

include_once get_template_directory(). '/inc/visualcomposer/init.php';