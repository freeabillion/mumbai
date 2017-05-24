<?php

vc_map( array(
        'name' =>'Webnus Link',
        'base' => 'link',
		"description" => "Learn more link",
        'category' => esc_html__( 'Webnus Shortcodes', 'vision-church' ),
        "icon" => "webnus_link",
		'params'=>array(
            array(
                'type'              => 'dropdown',
                'heading'           => esc_html__( 'Type', 'vision-church' ),
                'param_name'        => 'type',
                'value'             => array(
                    'Simple'    => '1',
                    'Toggle'    => '2',
                ),
                'description'       => esc_html__( 'You can choose among these pre-designed types.', 'vision-church')
            ),
			array(
					'type'         => 'textfield',
					'heading'      => esc_html__( 'Link URL', 'vision-church' ),
					'param_name'   => 'url',
					'value'        => '#',
					'description'  => esc_html__( 'Link URL, Example: http://domain.com', 'vision-church')
			),
			array(
					'type'         => 'textfield',
					'heading'      => esc_html__( 'Link Text', 'vision-church' ),
					'param_name'   => 'content',
					'value'        => 'Link Text',
					'description'  => esc_html__( 'Link Text (Content)', 'vision-church')
			),
		)

    ) );


?>