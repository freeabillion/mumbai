<?php
vc_map( array(
		'name'			=> esc_html__( 'Webnus Image Carousel', 'vision-church' ),
		'base'			=> 'imagecarousel',
		'description'	=> esc_html__( 'Webnus Image Carousel', 'vision-church' ),
		'icon'			=> 'webnus-imagecarousel',
		'category'		=> esc_html__( 'Webnus Shortcodes', 'vision-church' ),
		'params'		=> array(
			array(
				'heading'		=> esc_html__( 'Carousel Items', 'vision-church' ),
				'description'	=> esc_html__( 'Please enter carousel items to show', 'vision-church' ),
				'type'			=> 'textfield',
				'param_name'	=> 'item_carousle',
				'value'			=> '',
				),
				array(
					'type'			=> 'param_group',
					'heading'		=> esc_html__( 'Image Item', 'vision-church' ),
					'description'	=> esc_html__( 'Please Add Your image', 'vision-church' ),
					'param_name'	=> 'image_item',
					'value' 		=> '',
					'params'		=> array(
						array(
							'type'			=> 'attach_image',
							'heading'		=> esc_html__( 'Select image', 'vision-church' ),
							'description'	=> esc_html__( 'Please Select Your Desired image', 'vision-church' ),
							'param_name'	=> 'image',
							'value'			=> '',
						),
				),

			),
		)
	)
);