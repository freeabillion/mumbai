<?php
vc_map( array(
	'name'			=> esc_html__( 'Buy Process', 'vision-church' ),
	'base'			=> 'buy_process',
	'description'	=> esc_html__( 'Buy Process', 'vision-church' ),
	'icon'			=> 'buy_process',
	'category'		=> esc_html__( 'Webnus Shortcodes', 'vision-church' ),
	'params'		=> array(
		array(
			'heading'		=> esc_html__( 'Process Item', 'vision-church' ),
			'description'	=> esc_html__( 'If you want this element cover whole page width, please add it inside of a full row. For this purpose, click on edit button of the row and set Select Row Type on Full Width Row.', 'vision-church' ),
			'type'			=> 'param_group',
			'param_name'	=> 'process_item',
			'params'		=> array(

				array(
					'heading'		=> esc_html__( 'Process Title', 'vision-church' ),
					'type'			=> 'textfield',
					'param_name'	=> 'process_title',
					'value'			=> '',
					'admin_label'	=> true,
				),

				array(
					'heading'		=> esc_html__( 'Process Content', 'vision-church' ),
					'type'			=> 'textarea',
					'param_name'	=> 'process_content',
					'value'			=> '',
				),

				array(
					'type'			=> 'iconpicker',
					'heading'		=> esc_html__( 'Icon', 'vision-church' ),
					'param_name'	=> 'icon_fontawesome',
					'value'			=> 'fa fa-adjust',
					'settings'		=> array(
						'emptyIcon'		=> false,
						'iconsPerPage'	=> 4000,
					),
					'description'	=> esc_html__( 'Select icon from library.', 'vision-church' ),
				),

				array(
					'heading'		=> esc_html__( 'Line number ( or text )', 'vision-church' ),
					'type'			=> 'textfield',
					'param_name'	=> 'line_flag',
					'value'			=> '',
				),

				array(
					'heading'		=> esc_html__( 'Porcess style', 'vision-church' ),
					'type'			=> 'dropdown',
					'param_name'	=> 'process_style',
					'value'			=> array(
						esc_html__( 'Default Porcess', 'vision-church' )	 => 'default',
						esc_html__( 'Featured Porcess', 'vision-church' ) => 'featured',
					),
					'admin_label'	=> true,
				),

			),
		),
		
		array(
			'heading'		=> esc_html__( 'Background Color', 'vision-church' ),
			'type'			=> 'colorpicker',
			'param_name'	=> 'bg_color',
			'value'			=> '',
			'description'	=> esc_html__( 'Select custom background color', 'vision-church' ),
		),
) ) );