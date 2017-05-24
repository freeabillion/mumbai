<?php

vc_map( array(
        'name' =>'Icon Box',
        'base' => 'iconbox',
        'description' => 'Icon + text article',
		'icon' => 'webnus_iconbox',
        'category' => esc_html__( 'Webnus Shortcodes', 'vision-church' ),
        'params' => array(
            array(
                'type' => 'dropdown',
                'heading' => esc_html__( 'Type', 'vision-church' ),
                'param_name' => 'type',
                'value' => array(
				'Type 0'=>'0',
				'Type 1'=>'1',
				'Type 2'=>'2',
				'Type 3'=>'3',
				'Type 4'=>'4',
				'Type 5'=>'5',
				'Type 6'=>'6',
				'Type 7'=>'7',
				'Type 8'=>'8',
				'Type 9'=>'9',
				'Type 10'=>'10',
				'Type 11'=>'11',
				'Type 12'=>'12',
				'Type 13'=>'13',
				'Type 14'=>'14',
				'Type 15'=>'15',
				'Type 16'=>'16',
				'Type 17'=>'17',
				'Type 18'=>'18',
				'Type 19'=>'19',
				'Type 20'=>'20',
				'Type 21'=>'21',
				'Type 22'=>'22',
				'Type 23'=>'23',
				'Type 24'=>'24',
				'Type 25'=>'25',
                'Type 26'=>'26',
                'Type 27'=>'27',
				),
                'description' => esc_html__( 'You can choose among these pre-designed types.', 'vision-church')
            ),

			array(
				"type" => "colorpicker",
				"heading" => esc_html__( "Background color style", 'vision-church' ),
				"description" => esc_html__( "Select background color style .", 'vision-church'),
				"param_name" => "background_color",
				"value" => '',
				"dependency" => array(
					'element'	=> 'type',
					'value'		=> '18',
				),
			),

			array(
				"type" => "checkbox",
				"heading" => esc_html__( "Align", 'vision-church' ),
				"description" => esc_html__( "Please choose align, Left or Right", 'vision-church'),
				"param_name" => "align",
				"value" => array(
					esc_html__( "Left", 'vision-church' ) 	=> 'left',
					esc_html__( "right", 'vision-church' ) 	=> 'right',
				),
				"dependency" => array( 
					'element' 	=> 'type',
					'value' 	=> '18',
				),
			),
            array(
				'type'			=> 'checkbox',
				'heading'		=> esc_html__( 'Featured Iconbox ?', 'vision-church' ),
				'param_name'	=> 'featured',
				'value'			=> array( esc_html__( 'Yes', 'vision-church' ) => ' w-featured' ),
				'description'	=> esc_html__( 'Iconbox Featured Plan', 'vision-church'),
				'dependency'	=> array(
					'element' => 'type',
					'value'   => '22',
				),
			),
			array(
				'type'			=> 'checkbox',
				'heading'		=> esc_html__( 'Remove left border?', 'vision-church' ),
				'param_name'	=> 'border_left',
				'value'			=> array( esc_html__( 'Yes', 'vision-church' ) => ' w-border-left' ),
				'dependency'	=> array(
					'element' => 'type',
					'value'   => array( '15', ),
				),
			),
			array(
				'type'			=> 'checkbox',
				'heading'		=> esc_html__( 'Remove right border?', 'vision-church' ),
				'param_name'	=> 'border_right',
				'value'			=> array( esc_html__( 'Yes', 'vision-church' ) => ' w-border-right' ),
				'dependency'	=> array(
					'element' => 'type',
					'value'   => array( '15', '22', ),
				),
			),
			array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Title', 'vision-church'),
				'param_name'    => 'icon_title',
				'value'         => '',
				'description'   => esc_html__( 'IconBox Title', 'vision-church')
			),
			array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Subtitle', 'vision-church'),
				'param_name'    => 'icon_subtitle',
				'value'         => '',
				'description'   => esc_html__( 'IconBox Subtitle', 'vision-church'),
				'dependency'    => array(
					'element' => 'type',
					'value'   => array( '1', '15', '21', ),
				),
			),
			array(
				'type'          => 'colorpicker',
				'heading'       => esc_html__('Title color (leave bank for default color)', 'vision-church'),
				'param_name'    => 'title_color',
				'value'         => '',
				'description'   => esc_html__( 'Select title color', 'vision-church')
			),

            array(
				'type'          => 'textarea',
				'heading'       => esc_html__('Content', 'vision-church'),
				'param_name'    => 'iconbox_content',
				'value'         => '',
				'description'   => esc_html__( 'IconBox Content Goes Here', 'vision-church'),
                'dependency'    => array(
                    'element' => 'type',
                    'value'   => array( '0', '1', '2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25', '26', '27' ),
                ),
			),

			array(
				'type'          => 'colorpicker',
				'heading'       => esc_html__('Content color (leave bank for default color)', 'vision-church'),
				'param_name'    => 'content_color',
				'value'         => '',
				'description'   => esc_html__( 'Select content color', 'vision-church'),
                'dependency'    => array(
                    'element' => 'type',
                    'value'   => array( '1', '2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25', '26', '27' ),
                ),
			),


			 array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Link Text', 'vision-church'),
				'param_name'    => 'icon_link_text',
				'value'         => '',
				'description'   => esc_html__( 'IconBox Link Text', 'vision-church'),
                'dependency'    => array(
                    'element' => 'type',
                    'value'   => array( '1','1', '2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25', '26', '27' ),
                ),
			),


			 array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Link URL', 'vision-church'),
				'param_name'    => 'icon_link_url',
				'value'         => '',
				'description'   => esc_html__( 'IconBox Link URL (http://example.com)', 'vision-church'),
                'dependency'    => array(
                    'element' => 'type',
                    'value'   => array( '1', '2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25', '26', '27' ),
                ),
			),

			array(
				'type'          => 'colorpicker',
				'heading'       => esc_html__('Link color (leave bank for default color)', 'vision-church'),
				'param_name'    => 'link_color',
				'value'         => '',
				'description'   => esc_html__( 'Select link color', 'vision-church'),
                'dependency'    => array(
                    'element' => 'type',
                    'value'   => array( '1', '2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25', '26', '27' ),
                ),
			),

            array(
				'type'          => 'textfield',
				'heading'       => esc_html__('Icon Size (leave blank for default size)', 'vision-church'),
				'param_name'    => 'icon_size',
				'value'         => '',
				'description'   => esc_html__( 'Icon size in px format, Example: 16px', 'vision-church'),

			),
            array(
                'type'          => 'textfield',
                'heading'       => esc_html__('Minimum Background Color Height', 'vision-church'),
                'param_name'    => 'min_height',
                'value'         => '',
                'description'   => esc_html__( 'Height size in px format, Example: 250px', 'vision-church'),
                'dependency'    => array(
                    'element' => 'type',
                    'value'   => '26',
                ),

            ),
            array(
                'type'          => 'colorpicker',
                'heading'       => esc_html__('Icon Background Color', 'vision-church'),
                'param_name'    => 'icon_bg',
                'value'         => '',
                'description'   => esc_html__( 'Select Icon Background Color', 'vision-church'),
                'dependency'    => array(
                    'element' => 'type',
                    'value'   => '26',
                ),

            ),
			array(
				'type'          =>'colorpicker',
				'heading'       => esc_html__('Icon color (leave bank for default color)', 'vision-church'),
				'param_name'    => 'icon_color',
				'value'         => '',
				'description'   => esc_html__( 'Select icon color', 'vision-church'),

			),

            array(
                'type'          => 'attach_image',
                'heading'       => esc_html__( 'Image', 'vision-church' ),
                'param_name'    => 'icon_image',
                'value'         => '',
                'description'   => wp_kses( __( 'Select Image instead of Icons.<br>Note: If you have another Icon that not is here. You can put PNG image of that instead of these Icons.', 'vision-church'), array( 'br' => array() ) ),
            ),

            array(
                'type'          => 'textfield',
                'heading'       => esc_html__( 'Image Size', 'vision-church' ),
                'param_name'    => 'thumbnail',
                'value'         => '',
                'description' => esc_html__( 'Enter image size (Example: 200x100 (Width x Height)).', 'vision-church')
            ),

            array(
                'type'          => 'iconfonts',
                'heading'       => esc_html__( 'Icon', 'vision-church' ),
                'param_name'    => 'icon_name',
                'value'         => '',
                'description'   => esc_html__( 'Select Icon', 'vision-church'),
            ),

        ),


    ) );


?>