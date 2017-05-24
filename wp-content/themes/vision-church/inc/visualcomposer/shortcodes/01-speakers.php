<?php
vc_map( array(
        'name' =>'Sermons Speakers',
        'base' => 'speakers',
        "icon" => "sermons",
		"description" => "Show Sermons Speakers",
        'category' => esc_html__( 'Webnus Shortcodes', 'vision-church' ),
        'params' => array(
				array(
					'heading' => esc_html__('Hide Speakers with no sermons', 'vision-church') ,
					'param_name' => 'hide',
					'value' => array( esc_html__( 'Yes', 'vision-church' ) => true),
					'type' => 'checkbox',
					'std' => '',
				) ,							
			),      
		) );
?>