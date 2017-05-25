<?php
vc_map( array(
	'name'			=> esc_html__( ' Webnus socials ', 'vision-church' ),
	'base'			=> 'webnus-socials',
	'description'	=> esc_html__( 'Webnus socials', 'vision-church' ),
	'icon'			=> 'webnus-socials',
	'category'		=> esc_html__( 'Webnus Shortcodes', 'vision-church' ),
	'params'		=> array(

		array(
			'heading'		=> esc_html__( 'Show socials?', 'vision-church' ),
			'description'	=> esc_html__( 'Do you want socials ?', 'vision-church'),
			'param_name'	=> 'show_social',
			'type'			=> 'checkbox',
			'value' 		=> array( esc_html__( 'Yes', 'vision-church' ) => true ),
			'std'			=> false,
		),
	) )
);