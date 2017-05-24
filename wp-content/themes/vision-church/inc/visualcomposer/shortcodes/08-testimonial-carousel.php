<?php 
vc_map( array(
	'name'			=> esc_html__( 'Testimonial Carousel', 'vision-church' ),
	'base'			=> 'testimonial-carousel',
	'description'	=> esc_html__( 'Testimonial Carousel', 'vision-church' ),
	'icon'			=> 'testimonial-carousel',
	'category'		=> esc_html__( 'Webnus Shortcodes', 'vision-church' ),
	'params'		=> array(


		array(
			'type'			=> 'dropdown',
			'heading'		=> esc_html__( 'Testimonial Type', 'vision-church' ),
			'param_name'	=> 'type',
			'value'			=>  array(
					'One'	=> '1',
					'Two'	=> '2',
					'Three'	=> '3',
				),
		),
		array(
			'type'			=> 'textfield',
			'heading'		=> esc_html__( 'Testimonial Items Per View', 'vision-church' ),
			'param_name'	=> 'items',
			'value'			=> '',
		),

		array(
			'heading'		=> esc_html__( 'Testimonial Items', 'vision-church' ),
			'type'			=> 'param_group',
			'param_name'	=> 'testimonial_item',
			'params' => array(

				array(
					'heading'		=> esc_html__( 'Testimonial Image', 'vision-church' ),
					'type'			=> 'attach_image',
					'param_name'	=> 'img',
					'value'			=> '',
				),
				array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Image Size', 'vision-church' ),
					'param_name' => 'thumbnail',
					'value'=>'',
					'description' => esc_html__( 'Enter image size (Example: 200x100 (Width x Height)).', 'vision-church')
				),

				array(
					'heading'		=> esc_html__( 'Testimonial Content', 'vision-church' ),
					'type'			=> 'textarea',
					'param_name'	=> 'tc_content',
					'value'			=> '',
				),

				array(
					'heading'		=> esc_html__( 'Testimonial Name', 'vision-church' ),
					'type'			=> 'textfield',
					'param_name'	=> 'name',
					'value'			=> '',
					'admin_label'	=> true,
				),

				array(
					'heading'		=> esc_html__( 'Testimonial Job', 'vision-church' ),
					'type'			=> 'textfield',
					'param_name'	=> 'job',
					'value'			=> '',
					'admin_label'	=> true,
				),
			),
		),

	)
) );