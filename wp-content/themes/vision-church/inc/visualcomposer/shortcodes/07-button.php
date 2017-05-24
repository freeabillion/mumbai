<?php
vc_map( array(
	"name" =>"Webnus Button",
	"base" => "button",
	"description" => "Button shortcode",
	"category" => esc_html__( 'Webnus Shortcodes', 'vision-church' ),
	"icon" => "webnus_button",
	"params" => array(
			array(
			"type" => "dropdown",
			"heading" => esc_html__( "Shape", 'vision-church' ),
			"param_name" => "shape",
			"value" => array(
				"Default"=>"",
				"Square"=>"square",
				"Rounded"=>"rounded",
				),
			"description" => esc_html__( "Button Type", 'vision-church')
			),
			
			array(
			"type" => "textarea",
			"heading" => esc_html__( "Content", 'vision-church' ),
			"param_name" => "btn_content",
			"value"=>'',
			"description" => esc_html__( "Button Text Content", 'vision-church')
			),
			
			array(
			"type" => "textfield",
			"heading" => esc_html__( "URL", 'vision-church' ),
			"param_name" => "url",
			"value"=>'#',
			"description" => esc_html__( "Button URL Link", 'vision-church')
			),
									
			array(
			"type" => "dropdown",
			"heading" => esc_html__( "Target", 'vision-church' ),
			"param_name" => "target",
			"description" => esc_html__( "Button URL Target", 'vision-church'),
			"value" => array(
				"Self"=>"_self",
				"Blank"=>"_blank",
				"Parent"=>"_parent",
				"Top"=>"_top",
				),
			),
			
			array(
			"type" => "dropdown",
			"heading" => esc_html__( "Color", 'vision-church' ),
			"param_name" => "color",
			"description" => esc_html__( "Button Color", 'vision-church'),
			"value" => array(
				"Default"=>"theme-skin",
				"Green"=>"green",
				"Gold"=>"gold",
				"Red"=>"red",
				"Blue"=>"blue",
				"Gray"=>"gray",
				"Dark gray"=>"dark-gray",
				"Cherry"=>"cherry",
				"Orchid"=>"orchid",
				"Pink"=>"pink",
				"Orange"=>"orange",
				"Teal"=>"teal",
				"SkyBlue"=>"skyblue",
				"Jade"=>"jade",
				"White"=>"white",
				"Black"=>"black",
				),
			),
									
			array(
			"type" => "dropdown",
			"heading" => esc_html__( "Size", 'vision-church' ),
			"param_name" => "size",
			"description" => esc_html__( "Button Size", 'vision-church'),
			"value" => array(
				"Small"=>"small",
				"Medium"=>"medium",
				"Large"=>"large",	
				),
			),

			array(
			"type" => "dropdown",
			"heading" => esc_html__( "Font Weight", 'vision-church' ),
			"param_name" => "f_weight",
			"description" => esc_html__( "Please select your desired font weight", 'vision-church'),
			"value" => array(
				"Bold"=>"bold",
				"Thin"=>"thin",
				),
			),

			array(
			"type" => "dropdown",
			"heading" => esc_html__( "Bordered?", 'vision-church' ),
			"param_name" => "border",
			"value"=>array('Normal'=>'false','Bordered'=>'true'),
			"description" => esc_html__( "Is button bordered?", 'vision-church')
			),
			
			array(
			"type" => "iconfonts",
			"heading" => esc_html__( "Icon", 'vision-church' ),
			"param_name" => "icon",
			"value"=>'',
			"description" => esc_html__( "Select Button Icon", 'vision-church')
			),	
	),
));
?>