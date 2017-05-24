<?php

vc_map( array(
        'name' =>'Max Counter',
        'base' => 'maxcounter',
        "icon" => "icon-wpb-maxcounter",
		"description" => "MaxCounter",
        'category' => esc_html__( 'Webnus Shortcodes', 'vision-church' ),
        'params' => array(
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'Type', 'vision-church' ),
							'param_name' => 'type',
							'value' => array(
							'Type 1'=>'1',
							'Type 2'=>'2',
							'Type 3'=>'3',
							'Type 4'=>'4',
							),
							'description' => esc_html__( 'You can choose among these pre-designed types.', 'vision-church')
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Count', 'vision-church' ),
							'param_name' => 'count',
							'value' => '',
							'description' => esc_html__( 'Enter the number that you want to count.', 'vision-church')
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Prefix', 'vision-church' ),
							'param_name' => 'prefix',
							'value' => '',
							'description' => esc_html__( 'Show the unit content before your counter number., Example: $', 'vision-church')
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Suffix', 'vision-church' ),
							'param_name' => 'suffix',
							'value' => '',
							'description' => esc_html__( 'Show the unit content after your counter number., Example: %', 'vision-church')
						),
						array(
							'type' => 'textfield',
							'heading' => esc_html__( 'Title', 'vision-church' ),
							'param_name' => 'title',
							'value' => '',
							'description' => esc_html__( 'Enter the title', 'vision-church')
						),
						array(
							'type' => 'colorpicker',
							'heading' => esc_html__( 'Color', 'vision-church' ),
							'param_name' => 'color',
							'value' => '',
							'description' => esc_html__( 'Please select icon color', 'vision-church'),
						),
						array(
							'type' => 'iconfonts',
							'heading' => esc_html__( 'Icon', 'vision-church' ),
							'param_name' => 'icon',
							'value' => '',
							'description' => esc_html__( 'Please select counter icon', 'vision-church'),
						),
						
        ),
		
        
    ) );


?>