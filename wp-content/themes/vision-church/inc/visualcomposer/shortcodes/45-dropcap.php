<?php

vc_map( array(
        'name' =>'Webnus Dropcap',
        'base' => 'dropcap',
		"description" => "Dropcap",
        'category' => esc_html__( 'Webnus Shortcodes', 'vision-church' ),
         "icon" => "webnus_dropcap",
        'params' => array(
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Dropcap Type', 'vision-church' ),
							'param_name' => 'type',
							'value' => array(
											'Dropcap 1'=>'1',
											'Dropcap 2'=>'2',
											'Dropcap 3'=>'3',
											
							
										),
							'description' => esc_html__( 'Specify the Dropcap type', 'vision-church')
						),
						
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Dropcap Character', 'vision-church' ),
							'param_name' => 'dropcap_content',
							'value' => '',
							'description' => esc_html__( 'Specify the Dropcap Text', 'vision-church')
						),
						
           
        ),
		
        
    ) );


?>