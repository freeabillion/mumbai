<?php
vc_map( array(
        'name' =>'Single Sermon',
        'base' => 'asermon',
        "icon" => "asermon",
		"description" => "Show a sermon",
        'category' => esc_html__( 'Webnus Shortcodes', 'vision-church' ),
        'params' => array(
			array(
				"type" => "dropdown",
				'heading' => esc_html__( 'Type', 'vision-church' ),
				'param_name' => 'type',
				"value" => array(
					"Latest Sermon"=>"latest",
					"Custom Sermon"=>"custom",
				),
				'description' => esc_html__( 'You can choose among these pre-designed types.', 'vision-church')
			), 
			
			array(
					"type" => "dropdown",
					"heading" => esc_html__( "Style", 'vision-church' ),
					"param_name" => "style",
					"value" => array(
						"Standard"=>"",
						"Boxed"=>"boxed",
					),
					"description" => esc_html__( "You can choose among these pre-designed styles. Note: If you choose boxed style, your picture and explanation text won\'t show.", 'vision-church')
				),

			array(
					'type' => 'textfield',
					'heading' => esc_html__( 'Title', 'vision-church' ),
					'param_name' => 'box_title',
					'value'=>'',
					'description' => esc_html__( 'Choose a title for your sermon box style.', 'vision-church'),
					"dependency" => array('element'=>'style','value'=>array('boxed')),
			),
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Sermon ID', 'vision-church' ),
				'param_name' => 'post',
				'value'=>'',
				'description' => esc_html__( 'Pick up the ID & follow this instruction: Sermons > Sermon Categories > ID column. Note: When you type nothing it puts latest sermon as default to show.', 'vision-church'),
				"dependency" => array('element'=>'type','value'=>array('custom')),
			), 
			),    
		) );
?>