<?php
$categories = array();
$categories = get_categories();
$category_slug_array = array('');
foreach($categories as $category) {
	$category_slug_array[] = $category->slug;
}

vc_map( array(
		'name'			=>'Webnus Causes',
		'base'			=> 'causes',
		"icon"			=> "causes",
		"description"	=> "Show Latest Or Popular Causes",
		'category'		=> esc_html__( 'Webnus Shortcodes', 'vision-church' ),
		'params'		=> array(

			array(
				"type" 			=> "dropdown",
				"heading" 		=> esc_html__( "Type", 'vision-church' ),
				"param_name" 	=> "type",
				"value" 		=> array(
					"Grid"		=> "grid",
					"Grid 2"	=> "grid2",
					"List"		=> "list",
					"List 2"	=> "list2",
				),
				"description" => esc_html__( "You can choose among these pre-designed types.", 'vision-church')
			),

			array(
				"type" 			=> "dropdown",
				"heading" 		=> esc_html__( "Order by", 'vision-church' ),
				"description" 	=> esc_html__( "Recent Or Popular", 'vision-church'),
				"param_name" 	=> "sort",
				"value" 		=> array(
					"Most Recent"	=> "",
					"Most Popular"	=> "view",
				),
			),

			array(
			'type' 			=> 'textfield',
			'heading' 		=> esc_html__( 'Post Count', 'vision-church' ),
			'param_name' 	=> 'count',
			'value' 		=> '',
			'description' 	=> esc_html__( 'Type nothing to default (6) and type 0 to show all.', 'vision-church')
			),

			array(
				'heading' 		=> esc_html__('Page Navigation', 'vision-church') ,
				'description' 	=> wp_kses( __('Enable page navigation.<br/><br/>', 'vision-church'), array( 'br' => array() ) ),
				'param_name' 	=> 'page',
				'value' 		=> array( esc_html__( 'Enable', 'vision-church' ) => 'enable'),
				'type' 			=> 'checkbox',
				'std' 			=> '',
			) ,

			array(
				"type" 			=> "iconfonts",
				"heading" 		=> esc_html__( "Icon", 'vision-church' ),
				"param_name" 	=> "icon",
				'value'			=>'',
				"description" 	=> esc_html__( "Show an icon on the left side of the sermon title.", 'vision-church'),
				"dependency" 	=> array('element'=>'type','value'=>array('minimal')),
			),

		),      
) );
?>