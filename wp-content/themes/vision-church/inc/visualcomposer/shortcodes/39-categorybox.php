<?php

$categories = array();

$categories = get_categories();

$category_slug_array = array();
$category_slug_array[] = 'Entire Categories';
foreach($categories as $category)
{
	$category_slug_array[] = $category->slug;
}
vc_map( array(
        'name' =>'Category Box',
        'base' => 'categorybox',
		"description" => "Show Categorybox, By category filter",
        "icon" => "webnus_categorybox",
        'params'=>array(
					
					
				array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Category', 'vision-church' ),
						'param_name' => 'category',
						'value'=>$category_slug_array,
						'description' => esc_html__( 'Select specific category', 'vision-church')
				),
				array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Title', 'vision-church' ),
						'param_name' => 'title',
						'value'=> '',
						'description' => esc_html__( 'Set title', 'vision-church')
				),
				array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Show title', 'vision-church' ),
						'param_name' => 'show_title',
						'value'=>array('Show'=>'true','Hide'=>'false'),
						'description' => esc_html__( 'Show/Hide title', 'vision-church')
				),
				array(
						'type' => 'textfield',
						'heading' => esc_html__( 'Posts count', 'vision-church' ),
						'param_name' => 'post_count',
						'value'=>'5',
						'description' => esc_html__( 'How many posts to dispaly?', 'vision-church')
				),
				array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Show date', 'vision-church' ),
						'param_name' => 'show_date',
						'value'=>array('Show'=>'true','Hide'=>'false'),
						'description' => esc_html__( 'Show/Hide date', 'vision-church')
				),
					
				array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Show category', 'vision-church' ),
						'param_name' => 'show_category',
						'value'=>array('Show'=>'true','Hide'=>'false'),
						'description' => esc_html__( 'Show/Hide category', 'vision-church')
				),
				array(
						'type' => 'dropdown',
						'heading' => esc_html__( 'Show author', 'vision-church' ),
						'param_name' => 'show_author',
						'value'=>array('Show'=>'true','Hide'=>'false'),
						'description' => esc_html__( 'Show/Hide author', 'vision-church')
				),
				array(
					'heading'		=> esc_html__( 'Order By', 'vision-church' ),
					'type'			=> 'dropdown',
					'param_name'	=> 'orderby',
					'value'			=> array(
						esc_html__( 'Date (Latest Posts)', 'vision-church' ) => 'date',
						esc_html__( 'Popular posts: Comment Count', 'vision-church' ) => 'comment_count',
						esc_html__( 'Popular posts: View Count', 'vision-church' ) => 'view_count',
						esc_html__( 'Popular Posts: Social Score', 'vision-church' ) => 'social_score',
					),
					'description' => esc_html__( 'If you use "Social Post Score" type, then Social Metrics Tracker plugin must be activated via Apperance > Install Plugins.', 'vision-church')
				),

		),
		'category' => esc_html__( 'Webnus Shortcodes', 'vision-church' ),
        
    ) );
?>