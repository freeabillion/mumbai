<?php
vc_map( array(
		'name'			=> esc_html__( 'Toggle box', 'vision-church' ),
		'base'			=> 'toggle_box',
		'description'	=> esc_html__( 'toggle box', 'vision-church' ),
		'icon'			=> 'webnus-services',
		'category'		=> esc_html__( 'Webnus Shortcodes', 'vision-church' ),
		'params'		=> array(
			array(
				'type'				=> 'dropdown',
				'heading'			=> esc_html__('Type', 'vision-church'),
				'param_name'		=> 'type',
				'value'				=> array(
					'Type 1' => '1',
					'Type 2' => '2',
					),
				'description'		=> esc_html__( 'Please select type', 'vision-church'),
				'edit_field_class'	=> 'vc_col-sm-6',
			),
			array(
				'type'				=> 'textfield',
				'heading'			=> esc_html__('Service Title', 'vision-church'),
				'param_name'		=> 'service_single_title',
				'value'				=> '',
				'description'		=> esc_html__( 'Please write Service Title', 'vision-church'),
				'edit_field_class'	=> 'vc_col-sm-6',
                'dependency'		=> array(
                	'element' => 'type',
                	'value' => array('1',),
                ),
			),
			array(
				'type'				=> 'textarea',
				'heading'			=> esc_html__('Content', 'vision-church'),
				'param_name'		=> 'service_single_content',
				'value'				=> '',
				'description'		=> esc_html__( 'Please write Content', 'vision-church'),
                'dependency'		=> array(
                	'element' => 'type',
                	'value' => array('1',),
                ),
			),

            array(
                'type'              => 'attach_image',
                'heading'           => esc_html__( 'Background Image', 'vision-church' ),
                'param_name'        => 'background_image',
                'value'             =>'',
                'description'       => wp_kses( __( 'Select Image for background<br>Note: If you have another Icon that not is here. You can put PNG image of that instead of these Icons.', 'vision-church'), array( 'br' => array() ) ),
                'dependency'		=> array(
                	'element' => 'type',
                	'value' => array('2',),
                ),
            ),
            array(
                'type'              => 'colorpicker',
                'heading'           => esc_html__('Background Color', 'vision-church'),
                'param_name'        => 'bgcolor',
                'value'             => '',
                'description'       => esc_html__( 'Select Background color', 'vision-church'),
            ),
            array(
                'type'              => 'textfield',
                'heading'           => esc_html__('Subtitle', 'vision-church'),
                'param_name'        => 'offers_subtitle',
                'value'             => '',
                'description'       => esc_html__( 'Please write Offer Subtitle', 'vision-church'),
                'edit_field_class'  => 'vc_col-sm-6',
                'dependency'		=> array(
                	'element' => 'type',
                	'value' => array('2',),
                ),
            ),
            array(
                'type'              => 'textfield',
                'heading'           => esc_html__('Title', 'vision-church'),
                'param_name'        => 'offers_title',
                'value'             => '',
                'description'       => esc_html__( 'Please write Offer Title', 'vision-church'),
                'edit_field_class'  => 'vc_col-sm-6',
                'dependency'		=> array(
                	'element' => 'type',
                	'value' => array('2',),
                ),
            ),
            array(
                'type'              => 'textfield',
                'heading'           => esc_html__('Minimum Height', 'vision-church'),
                'param_name'        => 'min_height',
                'value'             => '',
                'description'       => esc_html__( 'Please Enter Minimum Height (just write number, like: 575)', 'vision-church'),
                'edit_field_class'  => 'vc_col-sm-6',
                'dependency'		=> array(
                	'element' => 'type',
                	'value' => array('2',),
                ),
            ),
            array(
                'type'              => 'checkbox',
                'heading'           => esc_html__('Do you want the content open as default?', 'vision-church'),
                'description'       => esc_html__('Please check to enable this feature. ', 'vision-church'),
                'std'               => 'true',
                'param_name'        => 'open',
                'edit_field_class'  => 'vc_col-sm-6',
                'dependency'		=> array(
                	'element' => 'type',
                	'value' => array('2',),
                ),
            ),
            array(
                'type'              => 'textarea',
                'heading'           => esc_html__('Content', 'vision-church'),
                'param_name'        => 'offers_content',
                'value'             => '',
                'description'       => esc_html__( 'Please write Content', 'vision-church'),
                'dependency'		=> array(
                	'element' => 'type',
                	'value' => array('2',),
                ),
            ),
            array(
                'type'              => 'iconfonts',
                'heading'           => esc_html__( 'Icon', 'vision-church' ),
                'param_name'        => 'icon_name',
                'value'             => '',
                'description'       => esc_html__( 'Select Icon', 'vision-church'),
                'group'             => 'Icons',
            ),
		)
	)
);