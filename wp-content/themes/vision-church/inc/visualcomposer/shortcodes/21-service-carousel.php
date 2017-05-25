<?php
vc_map( array(
		'name'			=> esc_html__( 'Box Carousel', 'vision-church' ),
		'base'			=> 'service_carousel',
		'description'	=> esc_html__( 'Box Carousel', 'vision-church' ),
		'icon'			=> 'webnus-services-carousel',
		'category'		=> esc_html__( 'Webnus Shortcodes', 'vision-church' ),
		'params'		=> array(
			array(
				'type'			=> 'param_group',
				'heading'		=> esc_html__( 'Box Item', 'vision-church' ),
				'description'	=> esc_html__( 'Please Add Your service', 'vision-church' ),
				'param_name'	=> 'carousel_item',
				'value' 		=> '',
				'params'		=> array(
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__( 'Box Title', 'vision-church' ),
						'description'	=> esc_html__( 'Please enter your title', 'vision-church' ),
						'param_name'	=> 'service_title',
						'value'			=> '',
						'admin_label'	=> true,
					),
					array(
						'type'			=> 'textarea',
						'heading'		=> esc_html__( 'Box Content', 'vision-church' ),
						'description'	=> esc_html__( 'Please enter your content', 'vision-church' ),
						'param_name'	=> 'service_content',
						'value'			=> '',
					),
					array(
						'type'			=> 'attach_image',
						'heading'		=> esc_html__( 'Select image', 'vision-church' ),
						'description'	=> esc_html__( 'Please enter your content', 'vision-church' ),
						'param_name'	=> 'service_image',
						'value'			=> '',
					),
					array(
						'type'			=> 'textfield',
						'heading'		=> esc_html__( 'Image Size', 'power-addons' ),
						'param_name'	=> 'thumbnail',
						'value'			=> '',
						'description'	=> esc_html__( 'Enter image size (Example: 200x100 (Width x Height)).', 'vision-church'),
					),
				),
			),
			array(
				'heading'		=> esc_html__( 'Carousel Items', 'vision-church' ),
				'description'	=> esc_html__( 'Please enter carousel items to show', 'vision-church' ),
				'type'			=> 'textfield',
				'param_name'	=> 'item_carousle',
				'value'			=> '',
			),
		)
	)
);