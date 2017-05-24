<?php

vc_map( array(
        'name' =>'Webnus Callout',
        'base' => 'callout',
		"description" => "Call to action + button",
        "icon" => "webnus_callout",
        'params'=>array(
					
					
					
					array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Title', 'vision-church' ),
							'param_name' => 'title',
							'value'=>'',
							'description' => esc_html__( 'Enter the Callout title', 'vision-church')
					),
					array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Button Text', 'vision-church' ),
							'param_name' => 'button_text',
							'value'=>'',
							'description' => esc_html__( 'Callout Button text', 'vision-church')
					),
					array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Button Link', 'vision-church' ),
							'param_name' => 'button_link',
							'value'=>'',
							'description' => esc_html__( 'Button Link URL', 'vision-church')
					),
					array(
							'type' => 'textarea',
							'heading' => esc_html__( 'Content Text', 'vision-church' ),
							'param_name' => 'text',
							'value' => '',
							'description' => esc_html__( 'Enter the Callout content text', 'vision-church')
					),
		),
		'category' => esc_html__( 'Webnus Shortcodes', 'vision-church' ),
        
    ) );


?>