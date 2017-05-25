<?php
// Theme options reqire
$vision_church_options = vision_church_options();

// Header Bottom
$header_bottom = isset( $vision_church_options['vision_church_header_bottom'] ) ? $vision_church_options['vision_church_header_bottom'] : '' ;
if ( $header_bottom ) {

	// -> Start define variables

	// Social bar
	$social_media		= isset( $vision_church_options['vision_church_header_bottom_social_bar'] ) ? $vision_church_options['vision_church_header_bottom_social_bar'] : '';
	$language_bar		= isset( $vision_church_options['vision_church_header_bottom_languages'] ) ? $vision_church_options['vision_church_header_bottom_languages'] : '';

	// Languages name URL
	$first_lang			= isset( $vision_church_options['vision_church_lang_first'] ) ? $vision_church_options['vision_church_lang_first'] : '';
	$second_lang		= isset( $vision_church_options['vision_church_lang_second'] ) ? $vision_church_options['vision_church_lang_second'] : '';
	$third_lang			= isset( $vision_church_options['vision_church_lang_third'] ) ? $vision_church_options['vision_church_lang_third'] : '';
	$fourth_lang		= isset( $vision_church_options['vision_church_lang_fourth'] ) ? $vision_church_options['vision_church_lang_fourth'] : '';
	$first_lang_url		= isset( $vision_church_options['vision_church_language_first_url'] ) ? $vision_church_options['vision_church_language_first_url'] : '';
	$second_lang_url	= isset( $vision_church_options['vision_church_language_second_url'] ) ? $vision_church_options['vision_church_language_second_url'] : '';
	$third_lang_url		= isset( $vision_church_options['vision_church_language_third_url'] ) ? $vision_church_options['vision_church_language_third_url'] : '';
	$fourth_lang_url	= isset( $vision_church_options['vision_church_language_fourth_url'] ) ? $vision_church_options['vision_church_language_fourth_url'] : '';

	// Languages name
	$first_language		= $first_lang && $first_lang_url ? '<a href ="' . $first_lang_url . '"> ' . $first_lang . ' </a>' : '';
	$second_language	= $second_lang && $second_lang_url ? '<a href ="' . $second_lang_url . '"> ' . $second_lang . ' </a>' : '';
	$third_language		= $third_lang && $third_lang_url ? '<a href ="' . $third_lang_url . '"> ' . $third_lang . ' </a>' : '';
	$fourth_language	= $fourth_lang && $fourth_lang_url ? '<a href ="' . $fourth_lang_url . '"> ' . $fourth_lang . ' </a>' : '';

	$languages = array(
		$first_language,
		$second_language,
		$third_language,
		$fourth_language,
	);
	// -> End define variables
	?>

	<div class="w-header-bottom">

		<?php if ( $social_media ) { ?>
			<div class="whb-left-sect">
				<div class="socialfollow">
				<?php get_template_part( 'parts/social'); ?>
				</div>
			</div>
		<?php }

		if ( $language_bar ) { ?>
			<div class="whb-right-sect">
				<div class="w-lagn-bar">
				<?php foreach ($languages as $value) {
					echo '' . $value;
				} ?>
				</div>
			</div>
		<?php } ?>

	</div>
<?php }