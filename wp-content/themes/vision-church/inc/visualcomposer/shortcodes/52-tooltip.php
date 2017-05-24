<?php
vc_map( array(
	"name"			=>"Webnus Tooltip",
	"base"			=> "tooltip",
	"description"	=> "Tooltip",
	"category"		=> esc_html__( 'Webnus Shortcodes', 'vision-church' ),
	"icon"			=> "webnus_tooltip",
	"params"		=> array(
		array(
			"type"			=> "textarea",
			"heading"		=> esc_html__( "Tooltip Text", 'vision-church' ),
			"param_name"	=> "tooltiptext",
			"value"			=> '',
			"description"	=> esc_html__( "Tooltip text goes here", 'vision-church')
		),
		array(
			'type'			=> "textarea",
			"heading"		=> esc_html__( 'Tooltip Content', 'vision-church' ),
			"param_name"	=> 'tooltip_content',
			"value"			=>'',
			"description" 	=> esc_html__( "Contet Goes Here", 'vision-church')
		),
		array(
			'type' 			=> "textfield",
			"heading" 		=> esc_html__( 'Conten URL', 'vision-church' ),
			"param_name" 	=> 'tooltip_link',
			"value"			=>'',
			"description" 	=> esc_html__( "Please enter content url", 'vision-church')
		),
	),
));