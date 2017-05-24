<?php
add_filter( 'rwmb_meta_boxes', 'vision_church_meta_boxes' );
function vision_church_meta_boxes( $meta_boxes ) {

	// Post
	$meta_boxes[] = array(
		'title'			=> esc_attr__( 'Webnus Post Options', 'vision-church' ),
		'post_types'	=> 'post',
		'fields'		=> array(
			array(
				'id'	=> 'vision_church_featured_video_meta',
				'name'	=> esc_attr__( 'Video or Audio iFrame', 'vision-church' ),
				'desc'	=> esc_attr__( 'Enter the Embed Code', 'vision-church' ),
				'type'	=> 'textarea',
			),
			array(
				'id'	=> 'vision_church_blogpost_meta',
				'name'	=> esc_attr__( 'Post Style', 'vision-church' ),
				'type'	=> 'select',
				'options'     => array(
					'postshow1' => esc_attr__( 'Post Show1 Style', 'vision-church' ),
					'postshow2' => esc_attr__( 'Post Show2 Style', 'vision-church' ),
				),
				'placeholder' => esc_attr__( 'Select an Item', 'vision-church' ),
			),
		),
	);

	// Page
	$meta_boxes[] = array(
		'title'			=> esc_attr__( 'Webnus Page Options', 'vision-church' ),
		'post_types'	=> 'page',
		'fields'		=> array(
			array(
				'id'	=> 'vision_church_page_title_bar_meta',
				'name'	=> esc_attr__( 'Show Page Title:', 'vision-church' ),
				'type'	=> 'switcher',
				'std'	=> 1,
			),
			array(
				'id'	=> 'vision_church_breadcrumb_meta',
				'name'	=> esc_attr__( 'Show Breadcrumb:', 'vision-church' ),
				'type'	=> 'select',
				'options'	=> array(
					'yes'	=> esc_attr__( 'Yes', 'vision-church' ),
					'no'	=> esc_attr__( 'No', 'vision-church' ),
				),
				'placeholder'	=> esc_attr__( 'Select an Item', 'vision-church' ),
			),
			array(
				'id'	=> 'vision_church_page_title_text_color_meta',
				'name'	=> esc_attr__( 'Page Title Text Color:', 'vision-church' ),
				'type'	=> 'color',
			),
			array(
				'id'	=> 'vision_church_page_title_bg_color_meta',
				'name'	=> esc_attr__( 'Page Title Background Color:', 'vision-church' ),
				'type'	=> 'color',
			),
			array(
				'id'	=> 'vision_church_page_title_font_size_meta',
				'name'	=> esc_attr__( 'Page Title Font Size:', 'vision-church' ),
				'desc'	=> esc_attr__( '(in px format)', 'vision-church' ),
				'type'	=> 'text',
			),
			array(
				'type'	=>'divider',
			),
			array(
				'id'	=> 'vision_church_transparent_header_meta',
				'name'	=> esc_attr__( 'Transparent Header:', 'vision-church' ),
				'type'	=> 'select',
				'options'	=> array(
					'light'	=> esc_attr__( 'Light Style', 'vision-church' ),
					'dark'	=> esc_attr__( 'Dark Style', 'vision-church' ),
				),
				'placeholder'	=> esc_attr__( 'Select an Item', 'vision-church' ),
			),
			array(
				'id'	=> 'vision_church_hide_header_meta',
				'name'	=> esc_attr__( 'Hide Header at Start:', 'vision-church' ),
				'type'	=> 'switcher',
				'std'	=> 0,
			),
			array(
				'type'	=>'divider',
			),
			array(
				'id'	=> 'vision_church_sidebar_position_meta',
				'name'	=> esc_attr__( 'Sidebar Position:', 'vision-church' ),
				'type'	=> 'select',
				'options'	=> array(
					'right'	=> esc_attr__( 'Right', 'vision-church' ),
					'left'	=> esc_attr__( 'Left', 'vision-church' ),
					'both'	=> esc_attr__( 'Both', 'vision-church' ),
				),
				'placeholder'	=> esc_attr__( 'Select an Item', 'vision-church' ),
			),
			array(
				'type'	=>'divider',
			),
			array(
				'id'	=> 'vision_church_topbar_show',
				'name'	=> esc_attr__( 'Show Topbar:', 'vision-church' ),
				'type'	=> 'switcher',
				'std'	=> 1,
			),
			array(
				'id'	=> 'vision_church_header_show',
				'name'	=> esc_attr__( 'Show Header:', 'vision-church' ),
				'type'	=> 'switcher',
				'std'	=> 1,
			),
			array(
				'id'	=> 'vision_church_footer_show',
				'name'	=> esc_attr__( 'Show Footer:', 'vision-church' ),
				'type'	=> 'switcher',
				'std'	=> 1,
			),
			array(
				'type'	=>'divider',
			),
			array(
				'id'	=> 'vision_church_wrap_color_meta',
				'name'	=> esc_attr__( 'Content Background Color:', 'vision-church' ),
				'type'	=> 'color',
			),
			array(
				'id'	=> 'vision_church_body_bg_color_meta',
				'name'	=> esc_attr__( 'Body Background Color:', 'vision-church' ),
				'type'	=> 'color',
			),
			array(
				'id'	=> 'vision_church_body_bg_img_meta',
				'name'	=> esc_attr__( 'Body Background Image:', 'vision-church' ),
				'type'	=> 'image_advanced',
			),
			array(
				'id'	=> 'vision_church_body_bg_image_100_meta',
				'name'	=> esc_attr__( '100% Background Image:', 'vision-church' ),
				'type'	=> 'switcher',
				'std'	=> 0,
			),
			array(
				'id'	=> 'vision_church_body_bg_image_repeat_meta',
				'name'	=> esc_attr__( 'Background Repeat:', 'vision-church' ),
				'type'	=> 'select',
				'options'	=> array(
					'0'	=> esc_attr__( 'No repeat', 'vision-church' ),
					'1'	=> esc_attr__( 'Repeat both vertically and horizontally', 'vision-church' ),
					'2'	=> esc_attr__( 'Repeat only horizontally', 'vision-church' ),
					'3'	=> esc_attr__( 'Repeat only vertically', 'vision-church' ),
				),
				'placeholder'	=> esc_attr__( 'Select an Item', 'vision-church' ),
			),
			array(
				'type'	=>'divider',
			),
			array(
				'id'	=> 'vision_church_onepage_menu_meta',
				'name'	=> esc_attr__( 'OnePage Menu:', 'vision-church' ),
				'type'	=> 'switcher',
				'std'	=> 0,
			),
			array(
				'type'	=>'divider',
			),
			array(
				'id'	=> 'vision_church_mega_menu_meta',
				'name'	=> esc_attr__( 'Is mega menu?', 'vision-church' ),
				'desc'	=> esc_attr__( 'Is this page Mega Menu content', 'vision-church' ),
				'type'	=> 'switcher',
				'std'	=> 0,
			),
		),
	);

	// Cause
	$meta_boxes[] = array(
		'title'			=> esc_attr__( 'Webnus Cause Options', 'vision-church' ),
		'post_types'	=> 'cause',
		'fields'		=> array(

			array(
				'id'	=> 'vision_church_cause_end_date',
				'name'	=> esc_attr__( 'Cause End Date', 'vision-church' ),
				'desc'	=> esc_attr__( 'Insert date of Cause end. for example 8/12/2018', 'vision-church' ),
				'type'	=> 'date',
			),

			array(
				'id'	=> 'vision_church_cause_amount',
				'name'	=> esc_attr__( 'Cause Amount', 'vision-church' ),
				'desc'	=> esc_attr__( 'Insert total number of amount required for cause. for example 48000', 'vision-church' ),
				'type'	=> 'text',
			),

			array(
				'id'	=> 'vision_church_cause_amount_received',
				'name'	=> esc_attr__( 'Cause Amount Received', 'vision-church' ),
				'desc'	=> esc_attr__( 'This is the total amount reveived for this cause. for example 30000', 'vision-church' ),
				'type'	=> 'text',
			),
		),
	);

	// Sermon
	$meta_boxes[] = array(
		'title'			=> esc_attr__( 'Webnus Sermon Options', 'vision-church' ),
		'post_types'	=> 'sermon',
		'fields'		=> array(

			array(
				'id'	=> 'vision_church_sermon_video',
				'name'	=> esc_attr__( 'Video', 'vision-church' ),
				'desc'	=> esc_attr__( 'Enter the Video URL', 'vision-church' ),
				'type'	=> 'url',
			),

			array(
				'id'	=> 'vision_church_sermon_audio',
				'name'	=> esc_attr__( 'Audio', 'vision-church' ),
				'desc'	=> esc_attr__( 'Enter the Audio URL', 'vision-church' ),
				'type'	=> 'url',
			),

			array(
				'id'	=> 'vision_church_sermon_attachment',
				'name'	=> esc_attr__( 'File for Download', 'vision-church' ),
				'desc'	=> esc_attr__( 'Add the PDF or Media', 'vision-church' ),
				'type'	=> 'url',
			),
		),
	);


	return $meta_boxes;
}