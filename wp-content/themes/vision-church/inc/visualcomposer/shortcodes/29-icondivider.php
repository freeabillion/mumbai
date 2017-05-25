<?php

vc_map( array(
        "name" =>"Icon Divider",
        "base" => "icon-divider",
		"description" => "Vector font icon",
        
		"icon" => "icon-wpb-wicon",
        "category" => esc_html__( 'Webnus Shortcodes', 'vision-church' ),
        "params" => array(
           
             array(
				"type"=>'colorpicker',
				"heading"=>esc_html__('Icon color', 'vision-church'),
				"param_name"=> "color",
				"value"=>"",
				"description" => esc_html__( "Select icon color", 'vision-church')
				
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


?>