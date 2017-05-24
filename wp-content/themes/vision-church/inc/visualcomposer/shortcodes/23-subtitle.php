<?php
vc_map( array(
	"name" =>"Subtitle",
	"base" => "subtitle",
	"description" => "SubTitle",
	"category" => esc_html__( 'Webnus Shortcodes', 'vision-church' ),
	"icon" => "webnus_subtitle1",
	"params" => array(

		array(
			"heading" => esc_html__( "Type", 'vision-church' ),
			"description" => esc_html__( "Title Type", 'vision-church'),
			"type" => "dropdown",
			"param_name" => "type",
			"value" => array(
				"Subtitle 1"=>"1",
				"Subtitle 2"=>"2",
				"Subtitle 3"=>"3",									
				"Subtitle 4"=>"4",
				"Subtitle 5"=>"5",
				"Subtitle 6"=>"6",

			),
		),

		array(
			"heading" => esc_html__( "Heading", 'vision-church' ),
			"description" => wp_kses( __( "Just for SEO<br>Note: it doesn\'t change the size of the max title in the page.", 'vision-church'), array( 'br' => array() ) ),
			"type" => "dropdown",
			"param_name" => "heading",
			"value" => array(
				"h1"=>"1",
				"h2"=>"2",
				"h3"=>"3",
				"h4"=>"4",
				"h5"=>"5",
				"h6"=>"6",
			),
			'std' => '4',
		),

		array(
			"heading" => esc_html__( "Title", 'vision-church' ),
			"description" => esc_html__( "Enter the title", 'vision-church'),
			"type" => "textarea",
			"param_name" => "subtitle_content",
			"value" => array('Title'),
		),

		array(
			'heading'		=> esc_html__( 'Text Color', 'vision-church' ),
			'type'			=> 'colorpicker',
			'param_name'	=> 'subtitle_color',
			'value'			=> '',
		),

		array(
			'heading'		=> esc_html__( 'Border Color', 'vision-church' ),
			'type'			=> 'colorpicker',
			'param_name'	=> 'border_color',
			'value'			=> '',
		),

	),
) );