<?php

$attributes = array(
			"type"=>'colorpicker',
			"heading"=>esc_html__('Icon color', 'vision-church'),
			"param_name"=> "icon_color",
			"value"=>"",
			"description" => esc_html__( "Select icon color", 'vision-church')
);
vc_add_param('vc_tab', $attributes);

$attributes = array(
			"type" => "iconfonts",
			"heading" => esc_html__( "Icon", 'vision-church' ),
			"param_name" => "icon_name",
			'value'=>'',
			"description" => esc_html__( "Select Icon", 'vision-church')
);
vc_add_param('vc_tab', $attributes);

$attributes =   array(
                "type" => "dropdown",
                "heading" => esc_html__( "Type", 'vision-church' ),
                "param_name" => "tabs_type",
                "value" => array(
				"Type 1"=>'',
				"Type 2"=>'2',
				),
                "description" => esc_html__( "Select Tabs Type", 'vision-church')
);
vc_add_param('vc_tabs', $attributes);

$attributes =   array(
                "type" => "dropdown",
                "heading" => esc_html__( "Type", 'vision-church' ),
                "param_name" => "tabs_type",
                "value" => array(
				"Type 1"=>'',
				"Type 2"=>'2',
				),
                "description" => esc_html__( "Select Tabs Type", 'vision-church')
);
vc_add_param('vc_tour', $attributes);
?>