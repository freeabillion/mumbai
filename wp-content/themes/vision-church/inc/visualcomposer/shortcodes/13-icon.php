<?php
vc_map( array(
    "name" =>"Webnus Icon",
    "base" => "icon",
	"description" => "Vector font icon",
    
	"icon" => "webnus_icon",
    "category" => esc_html__( 'Webnus Shortcodes', 'vision-church' ),
    "params" => array(
       
         array(
			"type"=>'textfield',
			"heading"=>esc_html__('Icon Size', 'vision-church'),
			"param_name"=> "size",
			"value"=>"",
			"description" => esc_html__( "Icon size in px format, Example: 16px", 'vision-church')
			
		),
		array(
			"type"=>'colorpicker',
			"heading"=>esc_html__('Icon color', 'vision-church'),
			"param_name"=> "color",
			"value"=>"",
			"description" => esc_html__( "Select icon color", 'vision-church')
			
		),
		 array(
			"type"=>'textfield',
			"heading"=>esc_html__('Icon Link URL', 'vision-church'),
			"param_name"=> "link",
			"value"=>"",
			"description" => esc_html__( "Icon link URL http:// ", 'vision-church')
			
		),
		array(
			"type"=>'textfield',
			"heading"=>esc_html__('Icon Link Class', 'vision-church'),
			"param_name"=> "link_class",
			"value"=>"",
			"description" => esc_html__( "Icon link Class ", 'vision-church')
			
		),
		array(
			"type" => "colorpicker",
			"heading" => __( 'Custom background color', 'vision-church' ),
			"param_name" => "bg_color",
			"value"=>"",
			"description" => esc_html__( "Select background color", 'vision-church')
		),
		array(
			"type"=>'textfield',
			"heading"=>esc_html__('Padding', 'vision-church'),
			"param_name"=> "padding",
			"value"=>"",
			"description" => esc_html__( "Example: 20px", 'vision-church')
		),
		array(
			"type"=>'textfield',
			"heading"=>esc_html__('Border Radius', 'vision-church'),
			"param_name"=> "border_radius",
			"value"=>"",
			"description" => esc_html__( "Border Radius, Example: 8px or 50%", 'vision-church')
		),
		array(
			'type' => 'textfield',
			'heading' => __( 'Extra class name', 'vision-church' ),
			'param_name' => 'el_class',
			'description' => __( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'vision-church' ),
		),
       array(
            "type" => "iconfonts",
            "heading" => esc_html__( "Icon", 'vision-church' ),
            "param_name" => "name",
            'value'=>'',
            "description" => esc_html__( "Select Icon", 'vision-church')
        ),
       
    ),
	
    
) );