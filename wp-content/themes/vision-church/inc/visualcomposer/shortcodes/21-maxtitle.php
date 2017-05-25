<?php
vc_map( array(
	"name" =>"Max Title",
	"base" => "maxtitle",
	"description" => "MaxTitle",
	"category" => esc_html__( 'Webnus Shortcodes', 'vision-church' ),
	"icon" => "icon-wpb-maxtitle",
	"params" => array(

		array(
			"heading" => esc_html__( "Type", 'vision-church' ),
			"description" => esc_html__( "Title Type", 'vision-church'),
			"type" => "dropdown",
			"param_name" => "type",
			"value" => array(
				"Maxtitle 1"=>"1",
				"Maxtitle 2"=>"2",
				"Maxtitle 3"=>"3",
				"Maxtitle 4"=>"4",
				"Maxtitle 5"=>"5",
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
			'std' => '2',
		),

		array(
			"heading" 		=> esc_html__( "Title", 'vision-church' ),
			"description" 	=> esc_html__( "Enter the title", 'vision-church'),
			"type" 			=> "textarea",
			"param_name" 	=> "maxtitle_content",
		),

		array(
			'heading'		=> esc_html__( 'Text Color', 'vision-church' ),
			'type'			=> 'colorpicker',
			'param_name'	=> 'maxtitle_color',
			'value'			=> '',
		),

	),
) );