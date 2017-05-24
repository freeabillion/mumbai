<?php
vc_map( array(
	'name'			=> esc_html__( ' Webnus Pricing Plan ', 'vision-church' ),
	'base'			=> 'pricing-plan',
	'description'	=> esc_html__( 'Webnus Pricing Plan', 'vision-church' ),
	'icon'			=> 'pricing-plan',
	'category'		=> esc_html__( 'Webnus Shortcodes', 'vision-church' ),
	'params'		=> array(

		array(
			'heading'		=> esc_html__( 'Type', 'vision-church' ),
			'description'	=> esc_html__( 'You can choose among these pre-designed types.', 'vision-church'),
			'type'			=> 'dropdown',
			'param_name'	=> 'type',
			'value'			=> array(
				esc_html__( 'Type 1', 'vision-church' ) => '1',
				esc_html__( 'Type 2', 'vision-church' ) => '2',
			),
		),

		array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Title', 'vision-church' ),
				'param_name' => 'title',
				'value'=>'',
				'description' => esc_html__( 'Enter title pricing table', 'vision-church'),
		),

		array(
			'heading'		=> esc_html__( 'Features', 'vision-church' ),
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
			'dependency'	=> array( 'element' => 'type', 'value' => '2' ),
		),

		array(
				'type' => 'textarea',
				'heading' => esc_html__( 'Content', 'vision-church' ),
				'param_name' => 'text_content',
				'value'=>'',
				'description' => esc_html__( 'Enter the content Name', 'vision-church'),
				'dependency'	=> array( 'element' => 'type', 'value' => '1' ),	
		),

		array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Flag', 'vision-church' ),
				'param_name' => 'flag',
				'value'		 => array(
					esc_html__( 'None', 'vision-church' )	=> 'none',
					esc_html__( 'Featured', 'vision-church' )	=> 'Featured',
					esc_html__( 'Popular', 'vision-church' )	=> 'Popular',
				),
				'description' => esc_html__( 'Enter the content Name', 'vision-church'),
				'dependency'	=> array( 'element' => 'type', 'value' => '2' ),	
		),

		array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Price', 'vision-church' ),
				'param_name' => 'price',
				'value'=>'$',
				'description' => esc_html__( 'Enter the price Name', 'vision-church'),
			),

		array(
			"type"=>'textfield',
			"heading"=>esc_html__('Link Text', 'vision-church'),
			"param_name"=> "link_text",
			"value"=>"",
			"description" => esc_html__( "Link Text", 'vision-church'),	
		),

		array(
			"type"=>'textfield',
			"heading"=>esc_html__('Link URL', 'vision-church'),
			"param_name"=> "link_url",
			"value"=>"",
			"description" => esc_html__( "Link URL (http://example.com)", 'vision-church'),	
		),

) ) );