<?php
if ( class_exists( 'WPBakeryVisualComposerAbstract') ) {

	if( ! function_exists( 'vision_church_setup_vc_row' ) ) {

		function vision_church_setup_vc_row() {

			// remove vc default row map
			vc_remove_param( 'vc_row', 'full_width' );
			vc_remove_param( 'vc_row', 'gap' );
			vc_remove_param( 'vc_row', 'full_height' );
			vc_remove_param( 'vc_row', 'columns_placement' );
			vc_remove_param( 'vc_row', 'equal_height' );
			vc_remove_param( 'vc_row', 'content_placement' );
			vc_remove_param( 'vc_row', 'video_bg' );
			vc_remove_param( 'vc_row', 'video_bg_url' );
			vc_remove_param( 'vc_row', 'video_bg_parallax' );
			vc_remove_param( 'vc_row', 'parallax' );
			vc_remove_param( 'vc_row', 'parallax_image' );
			vc_remove_param( 'vc_row', 'parallax_speed_video' );
			vc_remove_param( 'vc_row', 'parallax_speed_bg' );
			vc_remove_param( 'vc_row', 'el_id' );
			vc_remove_param( 'vc_row', 'disable_element' );
			vc_remove_param( 'vc_row', 'css_animation' );
			vc_remove_param( 'vc_row', 'el_class' );
			vc_remove_param( 'vc_row', 'css' );


			// start webnus row map
			$attributes = array(

				/**
			     * ---> General group
			     */
				array(
					'type'				=> 'checkbox',
					'heading'			=> esc_html__( 'Full height row?', 'vision-church' ),
					'param_name'		=> 'full_height',
					'description'		=> esc_html__( 'If checked row will be set to full height.', 'vision-church' ),
					'value'				=> array( esc_html__( 'Yes', 'vision-church' ) => 'yes' ),
				),

				array(
					'heading'			=> esc_html__( 'Decrease height of full height section', 'vision-church' ),
					'description'		=> esc_html__( 'Can be used with px. Example: 35px', 'vision-church' ),
					'type'				=> 'textfield',
					'param_name'		=> 'dec_full_height',
					'dependency'		=> array(
						'element'	=> 'full_height',
						'not_empty'	=> true,
					),
				),

				array(
					'type'				=> 'dropdown',
					'heading'			=> esc_html__( 'Columns position', 'vision-church' ),
					'param_name'		=> 'columns_placement',
					'value'				=> array(
						esc_html__( 'Top', 'vision-church' )		=> 'top',
						esc_html__( 'Middle', 'vision-church' )	=> 'middle',
						esc_html__( 'Bottom', 'vision-church' )	=> 'bottom',
						esc_html__( 'Stretch', 'vision-church' )	=> 'stretch',
					),
					'description'		=> esc_html__( 'Select columns position within row.', 'vision-church' ),
					'dependency'		=> array(
						'element'	=> 'full_height',
						'not_empty' => true,
					),
				),

				array(
					'type'				=> 'textfield',
					'heading'			=> esc_html__( 'Row Height', 'vision-church' ),
					'param_name'		=> 'row_height',
					'value'				=> '',
					'description'		=> esc_html__( 'Set height for row. This feature doesn\'t work in "Full Height" row.', 'vision-church' ),
					'dependency'		=> array(
						'element'	=> 'full_height',
						'is_empty'	=> true,
					),
				),

	    		array(
					'type'				=> 'dropdown',
					'heading'			=> esc_html__( 'Columns gap', 'vision-church' ),
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
					'std'				=> '',
					'description'		=> esc_html__( 'Select gap between columns in row.', 'vision-church' ),
					'edit_field_class'	=> 'vc_col-sm-6',
				),

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
					'edit_field_class'	=> 'vc_col-sm-6',
				),

				array(
					'type'				=> 'dropdown',
					'heading'			=> esc_html__('Overlay pattern', 'vision-church'),
					'param_name'		=> 'row_pattern',
					'value'				=> array(
						esc_html__( 'No Pattern', 'vision-church' )	=> '',
						esc_html__( 'Pattern 1', 'vision-church' )		=> 'max-pat',
						esc_html__( 'Pattern 2', 'vision-church' )		=> 'max-pat2'
					),
					'description' 		=> esc_html__( 'Overlay Pattern', 'vision-church'),
					'edit_field_class'	=> 'vc_col-sm-6',
				),

				array(
					'type'				=> 'colorpicker',
					'heading'			=> esc_html__('Overlay color', 'vision-church'),
					'param_name'		=> 'row_pattern_color',
					'value'				=> '',
					'description'		=> esc_html__( 'Overlay Color', 'vision-church'),
					'edit_field_class'	=> 'vc_col-sm-6',
				),

				array(
					'type'				=> 'checkbox',
					'heading'			=> esc_html__( 'White Text Color?', 'vision-church' ),
					'param_name'		=> 'row_dark',
					'value'				=> array( esc_html__( 'Yes', 'vision-church' ) => 'yes' ),
					'description' 		=> esc_html__( 'If you choose it, all text will be white.', 'vision-church' ),
					'edit_field_class'	=> 'vc_col-sm-6',
				),

				array(
					'type'				=> 'checkbox',
					'heading'			=> esc_html__( 'Equal height', 'vision-church' ),
					'param_name'		=> 'equal_height',
					'description'		=> esc_html__( 'If checked columns will be set to equal height.', 'vision-church' ),
					'value'				=> array( esc_html__( 'Yes', 'vision-church' ) => 'yes' ),
					'edit_field_class'	=> 'vc_col-sm-6',
				),

				array(
					'type'				=> 'checkbox',
					'heading'			=> esc_html__( 'Align Center?', 'vision-church' ),
					'param_name'		=> 'align_center',
					'value'				=> array( esc_html__( 'Yes', 'vision-church' ) => 'aligncenter' ),
					'description'		=> esc_html__('Align center content', 'vision-church'),
					'edit_field_class'	=> 'vc_col-sm-6',
				),

				array(
					'type'				=> 'checkbox',
					'heading'			=> esc_html__( 'Remove Margin Bottom?', 'vision-church' ),
					'param_name'		=> 'r_margin_bottom',
					'value'				=> array( esc_html__( 'Yes', 'vision-church' ) => 'aligncenter' ),
					'description'		=> esc_html__('Align center content', 'vision-church'),
					'edit_field_class'	=> 'vc_col-sm-6',
				),

				array(
					'type'				=> 'checkbox',
					'heading'			=> esc_html__( 'Disable Row', 'vision-church' ),
					'param_name'		=> 'disable_element',
					'description'		=> esc_html__( 'If checked the row won\'t be visible on the public side of your website. You can switch it back any time.', 'vision-church' ),
					'value'				=> array( esc_html__( 'Yes', 'vision-church' ) => 'yes' ),
					'edit_field_class'	=> 'vc_col-sm-6',
				),

				array(
					'heading'			=> esc_html__( 'Layer Animation', 'vision-church' ),
					'type'				=> 'checkbox',
					'param_name'		=> 'layer_animation',
					'edit_field_class'	=> 'vc_col-sm-6',
				),

				/**
			     * ---> Start Background group
			     */
				array(
					'heading'			=> esc_html__( 'Background Image', 'vision-church' ),
					'description'		=> esc_html__( 'Select image from media library.', 'vision-church' ),
					'type'				=> 'attach_image',
					'param_name'		=> 'wn_bg_image',
					'value'				=> '',
					'group'				=> esc_html__( 'Background', 'vision-church' ),
				),

				array(
					'heading'			=> esc_html__( 'Background Color', 'vision-church' ),
					'description'		=> esc_html__( 'Select Custom Background color.', 'vision-church' ),
					'type'				=> 'colorpicker',
					'param_name'		=> 'wn_bg_color',
					'group'				=> esc_html__( 'Background', 'vision-church' ),
				),

				array(
					'type'				=> 'dropdown',
					'heading'			=> esc_html__( 'Background Position', 'vision-church' ),
					'param_name'		=> 'bg_position',
					'value'				=> array(
						esc_html__( 'Left Top'	, 'vision-church' )	=> 'left top',
						esc_html__( 'Left Center', 'vision-church' )	=> 'left center',
						esc_html__( 'Left Bottom', 'vision-church' )	=> 'left bottom',
						esc_html__( 'Center Top', 'vision-church' )	=> 'center top',
						esc_html__( 'Center Center', 'vision-church' )	=> 'center center',
						esc_html__( 'Center Bottom', 'vision-church' )	=> 'center bottom',
						esc_html__( 'Right Top'	, 'vision-church' )	=> 'right top',
						esc_html__( 'Right Center', 'vision-church' )	=> 'right center',
						esc_html__( 'Right Bottom', 'vision-church' )	=> 'right bottom',
					),
					'std'				=> 'center center',
					'description'		=> esc_html__( 'The background-position property sets the starting position of a background image.', 'vision-church' ),
					'group'				=> esc_html__( 'Background', 'vision-church' ),
					'edit_field_class'	=> 'vc_col-sm-6',
				),

				array(
					'type'				=> 'dropdown',
					'heading'			=> esc_html__( 'Background Repeat', 'vision-church' ),
					'param_name'		=> 'bg_repeat',
					'value'				=> array(
						esc_html__( 'Repeat'	, 'vision-church' )	=> 'repeat',
						esc_html__( 'Repeat x', 'vision-church' )		=> 'repeat-x',
						esc_html__( 'Repeat y', 'vision-church' )		=> 'repeat-y',
						esc_html__( 'No Repeat', 'vision-church' )		=> 'no-repeat',
					),
					'std'				=> 'no-repeat',
					'description'		=> esc_html__( 'The background-position property sets the starting position of a background image.', 'vision-church' ),
					'group'				=> esc_html__( 'Background', 'vision-church' ),
					'edit_field_class'	=> 'vc_col-sm-6',
				),

				array(
					'heading'			=> esc_html__( 'Background Cover ?', 'vision-church' ),
					'type'				=> 'checkbox',
					'param_name'		=> 'bg_cover',
					'value'				=> array( esc_html__( 'Yes', 'vision-church' ) => 'yes' ),
					'std'				=> 'yes',
					'group'				=> esc_html__( 'Background', 'vision-church' ),
					'edit_field_class'	=> 'vc_col-sm-6',
				),

				array(
					'heading'			=> esc_html__( 'Fixed Background ?', 'vision-church' ),
					'type'				=> 'checkbox',
					'param_name'		=> 'bg_attachment',
					'value'				=> array( esc_html__( 'Yes', 'vision-church' ) => 'yes' ),
					'group'				=> esc_html__( 'Background', 'vision-church' ),
					'edit_field_class'	=> 'vc_col-sm-6',
				),

				array(
					'heading'			=> esc_html__( 'Parallax', 'vision-church' ),
					'description'		=> esc_html__( 'Add parallax type background for row.', 'vision-church' ),
					'type'				=> 'dropdown',
					'param_name'		=> 'wn_parallax',
					'value'				=> array(
						esc_html__( 'None', 'vision-church' )		=> '',
						esc_html__( 'Parallax', 'vision-church' )	=> 'content-moving',
					),
					'group'				=> esc_html__( 'Background', 'vision-church' ),
				),				

				array(
					'heading'			=> esc_html__( 'Parallax Speed', 'vision-church' ),
					'type'				=> 'dropdown',
					'param_name'		=> 'wn_parallax_speed',
					'value'				=> array(
						esc_html__( 'Very Slow', 'vision-church' )	=> '108',
						esc_html__( 'Slow', 'vision-church' )		=> '123',
						esc_html__( 'Normal', 'vision-church' )	=> '190',
						esc_html__( 'Fast', 'vision-church' )		=> '225',
						esc_html__( 'Very Fast', 'vision-church' )	=> '260',
					),
					'std'				=> '123',
					'dependency'		=> array(
						'element'	=> 'wn_parallax',
						'not_empty'	=> true,
					),
					'group'				=> esc_html__( 'Background', 'vision-church' ),
				),

				array(
					'type'				=> 'checkbox',
					'heading'			=> esc_html__('Background None in Mobile Size?', 'vision-church'),
					'param_name'		=> 'responsive_bg_none',
					'value'				=> array( esc_html__( 'Yes', 'vision-church' ) => 'respo-bg-none' ),
					'description'		=> esc_html__('If checked background columns will be disable in mobile.', 'vision-church'),
					'edit_field_class'	=> 'vc_col-sm-6',
					'group'				=> esc_html__( 'Background', 'vision-church' ),
				),


				/**
			     * ---> Start video Background group
			     */
				array(
					'type'				=> 'dropdown',
					'heading'			=> esc_html__( 'Video Background Source', 'vision-church' ),
					'param_name'		=> 'video_bg_source',
					'description'		=> esc_html__( 'Please select video source', 'vision-church' ),
					'value'				=> array(
						esc_html__( 'Youtube', 'vision-church' )		=> 'youtube',
						esc_html__( 'Self Hosted', 'vision-church' )	=> 'host',
					),
					'group'				=> esc_html__( 'Video BG', 'vision-church' ),
				),

				array(
					'type'				=> 'textfield',
					'heading'			=> esc_html__( 'YouTube link', 'vision-church' ),
					'param_name'		=> 'video_bg_url',
					'value'				=> '',
					'description'		=> esc_html__( 'Add YouTube link.', 'vision-church' ),
					'dependency'		=> array(
						'element'	=> 'video_bg_source',
						'value' 	=> 'youtube',
					),
					'group'				=> esc_html__( 'Video BG', 'vision-church' ),
				),

				array(
					'type'				=> 'textfield',
					'heading'			=> esc_html__('.MP4 Format', 'vision-church'),
					'param_name'		=> 'mp4_format',
					'value'				=> '',
					'description'		=> esc_html__( 'Compatibility for Safari and IE9', 'vision-church'),
					'dependency'		=> array(
						'element'	=> 'video_bg_source',
						'value'		=> 'host',
					),
					'group'				=> esc_html__( 'Video BG', 'vision-church' ),
				),

				array(
					'type'				=> 'textfield',
					'heading'			=> esc_html__('.WebM Format', 'vision-church'),
					'param_name'		=> 'webm_format',
					'value'				=> '',
					'description'		=> esc_html__( 'Compatibility for Firefox4, Opera, and Chrome', 'vision-church'),
					'dependency'		=> array(
						'element'	=> 'video_bg_source',
						'value'		=> 'host',
					),
					'group'				=> esc_html__( 'Video BG', 'vision-church' ),
				),

				array(
					'type'				=> 'textfield',
					'heading'			=> esc_html__('.Ogg Format', 'vision-church'),
					'param_name'		=> 'ogg_format',
					'value'				=> '',
					'description'		=> esc_html__( 'Compatibility for older Firefox and Opera versions', 'vision-church'),
					'dependency'		=> array(
						'element'	=> 'video_bg_source',
						'value'		=> 'host',
					),
					'group'				=> esc_html__( 'Video BG', 'vision-church' ),
				),

				array(
					'type'				=> 'checkbox',
					'heading'			=> esc_html__( 'Video Muted', 'vision-church' ),
					'param_name'		=> 'video_mute',
					'value'				=> array( esc_html__( 'Yes', 'vision-church' ) => 'muted' ),
					'std'				=> 'muted',
					'description'		=> esc_html__( 'If checked the video will be Muted', 'vision-church' ),
					'dependency'		=> array(
						'element'	=> 'video_bg_source',
						'value'		=> 'host',
					),
					'group'				=> esc_html__( 'Video BG', 'vision-church' ),
					'edit_field_class'	=> 'vc_col-sm-12',
				),

				/**
			     * ---> Start Styling
			     */
				array(
					'type'				=> 'css_editor',
					'heading'			=> esc_html__( 'CSS box', 'vision-church' ),
					'param_name'		=> 'css',
					'group'				=> esc_html__( 'Styling', 'vision-church' ),
					'edit_field_class' => 'vc_col-sm-12 vc_column wn-css-editor',
				),

				/**
			     * ---> Animation group
			     */
				//vc_map_add_css_animation( true ),
				array(
					'type'				=> 'animation_style',
					'heading'			=> esc_html__( 'CSS Animation', 'vision-church' ),
					'param_name'		=> 'css_animation',
					'admin_label'		=> true,
					'value'				=> '',
					'settings'			=> array(
						'type'		=> 'in',
						'custom'	=> array(
							array(
								'label'		=> esc_html__( 'Default', 'vision-church' ),
								'values'	=> array(
									esc_html__( 'Top to bottom', 'vision-church' ) 		=> 'top-to-bottom',
									esc_html__( 'Bottom to top', 'vision-church' ) 		=> 'bottom-to-top',
									esc_html__( 'Left to right', 'vision-church' ) 		=> 'left-to-right',
									esc_html__( 'Right to left', 'vision-church' ) 		=> 'right-to-left',
									esc_html__( 'Appear from center', 'vision-church' )	=> 'appear',
							),
						),
					),
					),
					'description'		=> esc_html__( 'Select type of animation for element to be animated when it enters the browsers viewport (Note: works only in modern browsers).', 'vision-church' ),
					'group'				=> esc_html__( 'Animate', 'vision-church' ),
				),


				/**
			     * ---> Start Class & ID
			     */
				array(
					'type'				=> 'el_id',
					'heading'			=> esc_html__( 'Row ID', 'vision-church' ),
					'param_name'		=> 'el_id',
					'description'		=> wp_kses( __( 'Enter row ID (Note: make sure it is unique and valid according to <a href="http://www.w3schools.com/tags/att_global_id.asp" target="_blank">w3c specification</a>).', 'vision-church' ), vision_church_kses() ),
					'group'				=> esc_html__( 'Class & ID', 'vision-church' ),
				),

				array(
					'type'				=> 'textfield',
					'heading'			=> esc_html__( 'Extra class name', 'vision-church' ),
					'param_name'		=> 'el_class',
					'description'		=> esc_html__( 'Style particular content element differently - add a class name and refer to it in custom CSS.', 'vision-church' ),
					'group'				=> esc_html__( 'Class & ID', 'vision-church' ),
				),

			);
			vc_add_params('vc_row',$attributes);
		}

	}
	add_action('admin_init', 'vision_church_setup_vc_row');
}