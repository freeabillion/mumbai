<?php
vc_map( array(
	'base'			=> 'pricing-tables',
	'name'			=> 'Pricing Tables',
	'description'	=> 'Pricing Tables',
	'icon'			=> 'webnus_pricingtable',
	'category'		=> esc_html__( 'Webnus Shortcodes', 'vision-church' ),

	'params' => array(

		array(
			'heading'		=> esc_html__( 'Type', 'vision-church' ),
			'description'	=> esc_html__( 'You can choose among these pre-designed types.', 'vision-church'),
			'type'			=> 'dropdown',
			'param_name'	=> 'type',
			'value'			=> array(
				esc_html__( 'Type 1', 'vision-church' ) => '1',
				esc_html__( 'Type 2', 'vision-church' ) => '2',
				esc_html__( 'Type 3', 'vision-church' ) => '3',
				esc_html__( 'Type 4', 'vision-church' ) => '4',
				esc_html__( 'Type 5', 'vision-church' ) => '5',
				esc_html__( 'Type 6', 'vision-church' ) => '6',
				esc_html__( 'Type 7', 'vision-church' ) => '7',
			),
		),

		array(
			'heading'		=> esc_html__( 'Title', 'vision-church' ),
			'description' 	=> esc_html__( 'Pricing Table Title', 'vision-church'),
			'type'			=> 'textfield',
			'param_name'	=> 'title',
		),

		array(
			'heading'		=> esc_html__( 'Header Description', 'vision-church' ),
			'description' 	=> esc_html__( 'Pricing Table Description', 'vision-church'),
			'type'			=> 'textfield',
			'param_name'	=> 'description',
			'dependency'	=> array( 'element' => 'type', 'value' => '4' ),
		),

		array(
			'heading'		=> esc_html__( 'Price Symbol', 'vision-church' ),
			'type'			=> 'textfield',
			'param_name'	=> 'price_symbol',
			'value'			=> '$',
			'dependency'	=> array( 'element' => 'type', 'value' => '7' ),
		),

		array(
			'heading'		=> esc_html__( 'Price', 'vision-church' ),
			'description'	=> esc_html__( 'Pricing Table Price', 'vision-church'),
			'type'			=> 'textfield',
			'param_name'	=> 'price',
			'value'			=> '$10',
		),

		array(
			'heading'		=> esc_html__( 'Special Offer', 'vision-church' ),
			'description'	=> esc_html__( 'Pricing Table Special Offer or On Sale Price', 'vision-church'),
			'type'			=> 'textfield',
			'param_name'	=> 'on_sale_price',
			'value'			=> '',
		),

		array(
			'heading'		=> esc_html__( 'Plan Label', 'vision-church' ),
			'description'	=> esc_html__( 'Pricing Table Label', 'vision-church'),
			'type'			=> 'textfield',
			'param_name'	=> 'plan_label',
			'value'			=> '',
			'dependency'	=> array( 'element' => 'type', 'value' => array( '3', '5' ) ),
		),

		array(
			'heading'		=> esc_html__( 'Label Color', 'vision-church' ),
			'description' 	=> esc_html__( 'Select Custom Label Color', 'vision-church'),
			'type'			=> 'colorpicker',
			'param_name'	=> 'label_bg_color',
			'dependency'	=> array( 'element' => 'type', 'value' => '5' ),
		),

		array(
			'heading'		=> esc_html__( 'Period', 'vision-church' ),
			'description'	=> esc_html__( 'Pricing Table Period', 'vision-church'),
			'type'			=> 'textfield',
			'param_name'	=> 'period',
			'value'			=> esc_html__( 'Month', 'vision-church'),
		),

		array(
			'heading'		=> esc_html__( 'Features', 'vision-church' ),
			'description'	=> esc_html__( 'Enter features for pricing table - value, title and color.', 'vision-church' ),
			'type'			=> 'param_group',
			'param_name'	=> 'features',
			'params' => array(
				array(
					'heading'	 => esc_html__( 'Feature Item Icon', 'vision-church' ),
					'type'		 => 'dropdown',
					'param_name' => 'feature_icon',
					'value'		 => array(
						esc_html__( 'Empty', 'vision-church' )			=> 'empty-icon',
						esc_html__( 'Available', 'vision-church' )		=> 'available-icon',
						esc_html__( 'Not Available', 'vision-church' )	=> 'not-available-icon',
					),
					'admin_label'	=> true,
				),
				array(
					'heading'		=> esc_html__( 'Feature Item Text', 'vision-church' ),
					'type'			=> 'textfield',
					'param_name'	=> 'feature_item',
					'admin_label'	=> true,
				),
			),
		),

		array(
			'heading'		=> esc_html__( 'Footer Pricing Table Text', 'vision-church' ),
			'type'			=> 'textfield',
			'param_name'	=> 'footer_text',
			'value'			=> '',
		),		

		array(
			'heading'		=> esc_html__( 'Button Text', 'vision-church' ),
			'type'			=> 'textfield',
			'param_name'	=> 'button_text',
			'value'			=> '',
		),

		array(
			'heading'		=> esc_html__( 'Button URL', 'vision-church' ),
			'description'	=> esc_html__( 'Button URL (http://example.com)', 'vision-church' ),	
			'type'			=> 'textfield',
			'param_name'	=> 'button_url',
			'value'			=> '',
		),

		array(
			'type'			=> 'checkbox',
			'heading'		=> esc_html__( 'Featured Plan ?', 'vision-church' ),
			'param_name'	=> 'featured',
			'value'			=> array( esc_html__( 'Yes', 'vision-church' ) => ' w-featured' ),
			'description'	=> esc_html__( 'Pricing Tables Featured Plan', 'vision-church'),
		),

		array(
			'heading'		=> esc_html__('Plan Icon', 'vision-church'),
			'type'			=> 'iconfonts',
			'param_name'	=> 'icon',
			'value'			=> '',
			'dependency'	=> array(
				'element' => 'type',
				'value'   => '2',
			),
		),

		array(
			'heading'		=> esc_html__( 'Heading Background Color', 'vision-church' ),
			'description' 	=> esc_html__( 'Select Custom Background Color', 'vision-church'),
			'type'			=> 'colorpicker',
			'param_name'	=> 'heading_bg_color',
			'dependency'	=> array( 'element' => 'type', 'value' => '6' ),
		),

		array(
			'heading'		=> esc_html__( 'Heading Text Color', 'vision-church' ),
			'description' 	=> esc_html__( 'Select Custom Text Color', 'vision-church'),
			'type'			=> 'colorpicker',
			'param_name'	=> 'heading_text_color',
			'dependency'	=> array( 'element' => 'type', 'value' => '6' ),
		),
	)

) );