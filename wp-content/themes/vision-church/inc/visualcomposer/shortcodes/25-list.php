<?php

vc_map( array(
        'name' =>'Webnus List',
        'base' => 'ul',
		"description" => "List + custom style",
        'category' => esc_html__( 'Webnus Shortcodes', 'vision-church' ),
        "icon" => "webnus_list",
        'params' => array(
						array(
							'type' => 'dropdown',
							'heading' => esc_html__( 'List Type', 'vision-church' ),
							'param_name' => 'type',
							'value' => array(
											'Plus'=>'plus',
											'Minus'=>'minus',
											'Star'=>'star',
											'Arrow'=>'arrow',
											'Arrow 2'=>'arrow2',
											'Square'=>'square',
											'Circle'=>'circle',
											'Cross'=>'cross',
											'Check'=>'check',
											'Check 2'=>'check2'
																
										),
							'description' => esc_html__( 'Select the List Items type', 'vision-church')
						),
						
						array(
							'type' => 'textarea_html',
							'heading' => esc_html__( 'Items', 'vision-church' ),
							'param_name' => 'content',
							'value' => '[li]First Item[/li][li]Second Item[/li]',
							'description' => esc_html__( 'Enter list items, you can use [li]SomeText[/li]', 'vision-church')
						),
						
           
        ),
		
        
    ) );


?>