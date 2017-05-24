<?php
if ( class_exists( 'WPBakeryVisualComposerAbstract') ) {

	if(!function_exists('vision_church_setup_vc_row_inner')){

		function vision_church_setup_vc_row_inner(){
			vc_remove_param('vc_row_inner', 'el_id');
			vc_remove_param('vc_row_inner', 'equal_height');
			vc_remove_param('vc_row_inner', 'content_placement');
			vc_remove_param('vc_row_inner', 'gap');
			vc_remove_param('vc_row_inner', 'disable_element');
			vc_remove_param('vc_row_inner', 'el_class');
			vc_remove_param('vc_row_inner', 'css');

		$attributes = array(
			array(
				'type'				=> 'dropdown',
				'heading'			=> esc_html__( 'Content position', 'vision-church' ),
				'param_name'		=> 'content_placement',
				'value'				=> array(
					esc_html__( 'Default', 'vision-church' )	=> '',
					esc_html__( 'Top', 'vision-church' )		=> 'top',
					esc_html__( 'Middle', 'vision-church' )	=> 'middle',
					esc_html__( 'Bottom', 'vision-church' )	=> 'bottom',
				),
				'description'		=> esc_html__( 'Select content position within columns.', 'vision-church' ),
			),

			array(
				'heading'			=> esc_html__( 'Columns gap', 'vision-church' ),
				'description'		=> esc_html__( 'Select gap between columns in row.', 'vision-church' ),
				'type'				=> 'dropdown',
				'param_name'		=> 'gap',
				'value'				=> array(
					''		=> '',
					'0px'	=> '0',
					'1px'	=> '1',
					'2px'	=> '2',
					'3px'	=> '3',
					'4px'	=> '4',
					'5px'	=> '5',
					'10px'	=> '10',
					'15px'	=> '15',
					'20px'	=> '20',
					'25px'	=> '25',
					'30px'	=> '30',
					'35px'	=> '35',
				),
			),

			array(
				'type'				=> 'checkbox',
				'heading'			=> esc_html__( 'Equal height', 'vision-church' ),
				'param_name'		=> 'equal_height',
				'description'		=> esc_html__( 'If checked columns will be set to equal height.', 'vision-church' ),
				'value'				=> array( esc_html__( 'Yes', 'vision-church' ) => 'yes' ),
			),

			array(
				'heading'			=> esc_html__( 'Align Center?', 'vision-church' ),
				'description'		=> esc_html__('Align center content', 'vision-church'),
				'type'				=> 'checkbox',
				'param_name'		=> 'align_center',
				'value'				=> array( esc_html__( 'Yes', 'vision-church' ) => 'aligncenter' ),
			),

			array(
				'heading'			=> esc_html__( 'White Text Color?', 'vision-church' ),
				'description' 		=> esc_html__( 'If you choose it, all text will be white.', 'vision-church' ),
				'type'				=> 'checkbox',
				'param_name'		=> 'white_text_color',
				'value'				=> array( esc_html__( 'Yes', 'vision-church' ) => 'yes' ),
			),

			array(
				'heading'			=> esc_html__( 'Layer Animation', 'vision-church' ),
				'type'				=> 'checkbox',
				'param_name'		=> 'layer_animation',
			),

			array(
				'type'				=> 'checkbox',
				'heading'			=> esc_html__( 'Disable row', 'vision-church' ),
				'param_name'		=> 'disable_element',
				'description'		=> esc_html__( 'If checked the row won\'t be visible on the public side of your website. You can switch it back any time.', 'vision-church' ),
				'value'				=> array( esc_html__( 'Yes', 'vision-church' ) => 'yes' ),
			),

			array(
				'type'				=> 'css_editor',
				'heading'			=> esc_html__( 'CSS box', 'vision-church' ),
				'param_name'		=> 'css',
				'group'				=> esc_html__( 'Background & Design', 'vision-church' ),
			),

			array(
				'type'				=> 'el_id',
				'heading'			=> esc_html__( 'Row ID', 'vision-church' ),
				'param_name'		=> 'el_id',
				'description'		=> sprintf( esc_html__( 'Enter optional row ID. Make sure it is unique, and it is valid as w3c specification: %s (Must not have spaces)', 'vision-church' ), '<a target="_blank" href="http://www.w3schools.com/tags/att_global_id.asp">' . esc_html__( 'link', 'vision-church' ) . '</a>' ),
				'group'				=> esc_html__( 'ID & Extra Class', 'vision-church' ),
			),

			array(
				'type'				=> 'textfield',
				'heading'			=> esc_html__( 'Extra class name', 'vision-church' ),
				'param_name'		=> 'el_class',
				'description'		=> esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'vision-church' ),
				'group'				=> esc_html__( 'ID & Extra Class', 'vision-church' ),
			),

		);
		vc_add_params('vc_row_inner',$attributes);

		}

	}
	add_action('admin_init', 'vision_church_setup_vc_row_inner');
}