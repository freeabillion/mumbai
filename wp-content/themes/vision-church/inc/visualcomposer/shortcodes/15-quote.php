<?php

vc_map( array(
        'name' =>'Webnus Quote',
        'base' => 'quote',
		"description" => "Quote",
        "icon" => "webnus_quote",
        'params'=>array(
					
					
					
					array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Name', 'vision-church' ),
							'param_name' => 'name',
							'value'=>'',
							'description' => esc_html__( 'Enter the Name', 'vision-church')
					),
					array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Name Subtitle', 'vision-church' ),
							'param_name' => 'name_sub',
							'value'=>'',
							'description' => esc_html__( 'Enter the Name Subtitle', 'vision-church')
					),
					
					
					
					array(
							'type' => 'textarea',
							'heading' => esc_html__( 'Content', 'vision-church' ),
							'param_name' => 'text',
							'value' => '',
							'description' => esc_html__( 'Enter the Quote of the Week content text', 'vision-church')
					),
		),
		'category' => esc_html__( 'Webnus Shortcodes', 'vision-church' ),
        
    ) );


?>