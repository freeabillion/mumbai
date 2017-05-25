<?php

vc_map( array(
        "name" =>"Video Play Button",
        "base" => "videoplay",
		"description" => "Video Play Button",
		"icon" => "webnus_videoplay",
        "category" => esc_html__( 'Webnus Shortcodes', 'vision-church' ),
        "params" => array(
		
  			array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Video URL', 'vision-church' ),
							'param_name' => 'link',
							'value' => '#',
							'description' => esc_html__( 'YouTube/Vimeo URL', 'vision-church')
					),
					
             array(
				"type"=>'textfield',
				"heading"=>esc_html__('Icon Size', 'vision-church'),
				"param_name"=> "size",
				"value"=>"",
				"description" => esc_html__( "Icon size in px format, Example: 80px", 'vision-church')
				
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
				"heading"=>esc_html__('Extra Class', 'vision-church'),
				"param_name"=> "link_class",
				"value"=>"",
				"description" => esc_html__( "Extra Class ", 'vision-church')
				
			),
           
        ),
		
        
    ) );


?>