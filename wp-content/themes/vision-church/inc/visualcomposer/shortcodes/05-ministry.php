<?php
vc_map( array(
        'name' =>'Webnus Ministry',
        'base' => 'ministry',
		'description' => 'Introduce Ministries',
		'category' => esc_html__( 'Webnus Shortcodes', 'vision-church' ), 
        'icon' => 'ministry',
        'params'=>array(

        	array(
					"type" => "dropdown",
					"heading" => esc_html__( "Type", 'vision-church' ),
					"param_name" => "type",
					"value" => array(
						"Type 1"=>"1",
						"Type 2"=>"2",						
				),
				"description" => esc_html__( "Select style type", 'vision-church')
			),		
		
			array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Ministry Name', 'vision-church' ),
					'param_name' => 'ministry_name',
					'value'=>'',
					'description' => esc_html__( 'Ministry name', 'vision-church')
			),		
			array(
					'type' => 'attach_image',
					'heading' => esc_html__( 'Ministry Image', 'vision-church' ),
					'param_name' => 'ministry_img',
					'value'=>'',
					'description' => esc_html__( 'Ministry image', 'vision-church')
			),
			array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Image Size', 'power-addons' ),
					'param_name' => 'thumbnail',
					'value'=>'',
					'description'	=> esc_html__( 'Enter image size (Example: 200x100 (Width x Height)).', 'vision-church'),
			),
			array(
					"type"=>'colorpicker',
					"heading"=>esc_html__('Main color (leave bank for default color)', 'vision-church'),
					"param_name"=> "color",
					"value"=>"",
					"dependency" => array('element'=>'type','value'=>array('1')),
					"description" => esc_html__( "Select title color", 'vision-church')
			),
			array(
					'type' => 'textarea',
					'heading' => esc_html__( 'Ministry Description Text', 'vision-church' ),
					'param_name' => 'text',
					'value'=>'',
					'description' => esc_html__( 'Ministry description text', 'vision-church')
			),
			array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Ministry Director Name', 'vision-church' ),
					'param_name' => 'director_name',
					'value'=>'',
					"dependency" => array('element'=>'type','value'=>array('1')),
					'description' => esc_html__( 'Ministry director name', 'vision-church')
			),
			array(
					'type' => 'attach_image',
					'heading' => esc_html__( 'Ministry Director Image', 'vision-church' ),
					'param_name' => 'director_img',
					'value'=>'',
					"dependency" => array('element'=>'type','value'=>array('1')),
					'description' => esc_html__( 'Ministry director image', 'vision-church')
			),
			array(
                'type'       	=> 'textfield',
                'heading'    	=> esc_html__( 'Image Size', 'vision-church' ),
                'param_name' 	=> 'thumbnail2',
                'value'      	=> '',
                'description'	=> esc_html__( 'Enter image size (Example: 200x100 (Width x Height)).', 'vision-church'),
            ),
			array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Ministry Link URL', 'vision-church' ),
					'param_name' => 'link',
					'value'=>'',
					'description' => esc_html__( 'Ministry link url', 'vision-church')
			),
		),
    ) );
?>