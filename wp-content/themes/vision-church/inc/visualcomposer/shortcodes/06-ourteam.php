<?php
vc_map( array(
    'name' =>'Our Team',
    'base' => 'ourteam',
	"description" => "Team member",
	'category' => esc_html__( 'Webnus Shortcodes', 'vision-church' ),
    "icon" => "webnus_ourteam",
    'params'=>array(
		
    	array(
			"type" => "dropdown",
			"heading" => esc_html__( "Type", 'vision-church' ),
			"param_name" => "type",
			"value" => array(
				"Type 1"=>"1",
				"Type 2"=>"2",
				"Type 3"=>"3",						
				"Type 4"=>"4",						
				"Type 5"=>"5",						
				"Type 6"=>"6",						
			),
			"description" => esc_html__( "You can choose among these pre-designed types.", 'vision-church')
		),

		array(
			'type' => 'attach_image',
			'heading' => esc_html__( 'Team Image', 'vision-church' ),
			'param_name' => 'img',
			'value'=>'',
			'description' => esc_html__( 'Team member image', 'vision-church')
		),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Image Size', 'vision-church' ),
			'param_name' => 'thumbnail',
			'value'=>'',
			'description' => esc_html__( 'Enter image size (Example: 200x100 (Width x Height)).', 'vision-church')
		),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Team Memeber Name', 'vision-church' ),
			'param_name' => 'name',
			'value'=>'',
			'description' => esc_html__( 'Team member name', 'vision-church')
		),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Team Memeber Title', 'vision-church' ),
			'param_name' => 'title',
			'value'=>'',
			'description' => esc_html__( 'Team member title', 'vision-church')
		),

		array(
			'type' => 'textarea',
			'heading' => esc_html__( 'Team Memeber Description Text', 'vision-church' ),
			'param_name' => 'text',
			'value'=>'',
			'description' => esc_html__( 'Team member description text', 'vision-church'),
			'dependency'	=> array( 'element' => 'type', 'value' => '6' ),
		),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Link URL', 'vision-church' ),
			'param_name' => 'link',
			'value'=>'',
			'description' => esc_html__( 'Team member link url', 'vision-church')
		),

		array(
			'heading' => esc_html__('Social Icons', 'vision-church') ,
			'description' => wp_kses( __('By enabling this option, Member social networks links will appear.<br/><br/>', 'vision-church'), array( 'br' => array() ) ),
			'param_name' => 'social',
			'value' => array( esc_html__( 'Enable', 'vision-church' ) => 'enable'),
			'type' => 'checkbox',
			'std' => '',
		),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'First Social Name', 'vision-church' ),
			'param_name' => 'first_social',
			 'value' => array(
				"Twitter"=>'twitter',
				"Facebook"=>'facebook',
				"Google Plus"=>'google-plus',
				"Vimeo"=>'vimeo',
				"Dribbble"=>'dribbble',
				"Youtube"=>'youtube',
				"Youtube"=>'youtube',
				"Pinterest"=>'pinterest',
				"LinkedIn"=>'linkedin',
				"Instagram"=>'instagram',
					),
				'std' => 'twitter',
			'description' => esc_html__( 'Select Social Name', 'vision-church'),
			"dependency" => array('element'=>'social','value'=>array('enable')),
		),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'First Social URL', 'vision-church' ),
			'param_name' => 'first_url',
			'value'=>'',
			'description' => esc_html__( 'First social URL', 'vision-church'),
			"dependency" => array('element'=>'social','value'=>array('enable')),
		),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Second Social Name', 'vision-church' ),
			'param_name' => 'second_social',
			 'value' => array(
				"Twitter"=>'twitter',
				"Facebook"=>'facebook',
				"Google Plus"=>'google-plus',
				"Vimeo"=>'vimeo',
				"Dribbble"=>'dribbble',
				"Youtube"=>'youtube',
				"Youtube"=>'youtube',
				"Pinterest"=>'pinterest',
				"LinkedIn"=>'linkedin',
				"Instagram"=>'instagram',
					),
				'std' => 'facebook',

			'description' => esc_html__( 'Select Social Name', 'vision-church'),
			"dependency" => array('element'=>'social','value'=>array('enable')),
		),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Second Social URL', 'vision-church' ),
			'param_name' => 'second_url',
			'value'=>'',
			'description' => esc_html__( 'Second social URL', 'vision-church'),
			"dependency" => array('element'=>'social','value'=>array('enable')),
		),


		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Third Social Name', 'vision-church' ),
			'param_name' => 'third_social',
			 'value' => array(
				"Twitter"=>'twitter',
				"Facebook"=>'facebook',
				"Google Plus"=>'google-plus',
				"Vimeo"=>'vimeo',
				"Dribbble"=>'dribbble',
				"Youtube"=>'youtube',
				"Youtube"=>'youtube',
				"Pinterest"=>'pinterest',
				"LinkedIn"=>'linkedin',
				"Instagram"=>'instagram',
					),
				'std' => 'google-plus',
			'description' => esc_html__( 'Select Social Name', 'vision-church'),
			"dependency" => array('element'=>'social','value'=>array('enable')),
		),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Third Social URL', 'vision-church' ),
			'param_name' => 'third_url',
			'value'=>'',
			'description' => esc_html__( 'Third social URL', 'vision-church'),
			"dependency" => array('element'=>'social','value'=>array('enable')),
		),

		array(
			'type' => 'dropdown',
			'heading' => esc_html__( 'Fourth Social Name', 'vision-church' ),
			'param_name' => 'fourth_social',
			 'value' => array(
				"Twitter"=>'twitter',
				"Facebook"=>'facebook',
				"Google Plus"=>'google-plus',
				"Vimeo"=>'vimeo',
				"Dribbble"=>'dribbble',
				"Youtube"=>'youtube',
				"Youtube"=>'youtube',
				"Pinterest"=>'pinterest',
				"LinkedIn"=>'linkedin',
				"Instagram"=>'instagram',
					),
				'std' => 'linkedin',
			'description' => esc_html__( 'Select Social Name', 'vision-church'),
			"dependency" => array('element'=>'social','value'=>array('enable')),
		),

		array(
			'type' => 'textfield',
			'heading' => esc_html__( 'Fourth Social URL', 'vision-church' ),
			'param_name' => 'fourth_url',
			'value'=>'',
			'description' => esc_html__( 'Fourth social URL', 'vision-church'),
			"dependency" => array('element'=>'social','value'=>array('enable')),
		),
	),        
) );