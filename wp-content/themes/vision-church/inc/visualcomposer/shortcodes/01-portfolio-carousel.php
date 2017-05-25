<?php
vc_map(array(
	'name'		  => esc_html__( 'Gallery Carousel', 'vision-church' ),
	'base'		  => 'portfolio-carousel',
	'description' => esc_html__( 'Gallery Carousel Element', 'vision-church' ),
	'icon'		  => 'portfolio-carousel',
	'category'	  => esc_html__( 'Webnus Shortcodes', 'vision-church' ),       
	'params'	  => array(

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Title', 'vision-church' ),
			'param_name' => 'title',
			'value' => esc_html__( 'Recent Works', 'vision-church' ),
		),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Carousel Count', 'vision-church' ),
			'param_name' => 'carousel_count',
			'value' => '10',
			'description' => esc_html__( 'Default: 10', 'vision-church'),
		),

	)
));