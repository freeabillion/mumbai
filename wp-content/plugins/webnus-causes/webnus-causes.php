<?php
/*
Plugin Name: Webnus Causes
Description: Webnus Causes plugin is a wordpress plugin designed to create Causes in to your wordpress website.
Version: 1.0
Author: Webnus
Author URI: http://webnus.net
License: GPL2
*/

define('CAUSES_DIR', dirname(__FILE__));
define('CAUSES_THEMES_DIR', CAUSES_DIR . "/themes");
define('CAUSES_URL', WP_PLUGIN_URL . "/" . basename(CAUSES_DIR));
define('W_CAUSES_VERSION', '1.0');

//Method And Action Are Call
add_filter('manage_edit-cause_columns', 'w_add_new_cause_columns');
add_action('manage_cause_posts_custom_column', 'w_manage_cause_columns', 5, 2);
add_action('init', 'w_cause_register');

//Register Post Type
function w_cause_register() {
    $labels = array(
        'name' => __('Causes', 'vision'),
        'all_items' => __('All Causes', 'vision'),
        'singular_name' => __('Cause', 'vision'),
        'add_new' => __('Add Cause', 'vision'),
        'add_new_item' => __('Add New Cause', 'vision'),
        'edit_item' => __('Edit Cause', 'vision'),
        'new_item' => __('New Cause', 'vision'),
        'view_item' => __('View Cause', 'vision'),
        'search_items' => __('Search Cause', 'vision'),
        'not_found' => __('No Cause found', 'vision'),
        'not_found_in_trash' => __('No Item found in Trash', 'vision'),
        'parent_item_colon' => '',
        'menu_name' => __('Causes', 'vision')
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'rewrite' => array('slug' => 'cause'),
        'supports' => array(
            'title',
            'thumbnail',
            'editor',
			'page-attributes',
			'excerpt',
			'comments',
        ),
        'menu_position' => 23,
        'menu_icon' => 'dashicons-heart',
    );
    register_post_type('cause', $args);
	w_cause_register_taxonomies();
}
//Register Taxonomies
function w_cause_register_taxonomies() {
	$labels = array(
			'name'					=> __('Causes Categories', 'vision'),
			'singular_name'			=> __('Cause Category',  'vision'),
			'all_items'				=> __('All Causes Categories', 'vision'),
	);
	register_taxonomy('cause_category', 'cause', 	
	array(
	'hierarchical' => true,
	'labels' => $labels,
	'query_var' => true,
	'rewrite' => array('slug' => 'cause-category')
	));
	
}
	
//Admin Dashobord Listing Cause Columns Title
function w_add_new_cause_columns() {
	$columns['cb'] = '<input type="checkbox" />';
 	$columns['title'] = __('Title', 'vision');
	$columns['cause_category'] = __('Categories', 'vision' );
	$columns['date'] = __('Date', 'vision');
	$columns['received'] = __('Amount Received', 'vision');
	$columns['amount'] = __('Amount Needed', 'vision');
	$columns['end'] = __('End Date', 'vision');
	return $columns; 
}

//Admin Dashobord Listing Cause Columns Manage
function w_manage_cause_columns($columns) {
	global $post;
	switch ($columns) {
 	case 'cause_category':
		$terms = wp_get_post_terms($post->ID, 'cause_category');  
		foreach ($terms as $term) {  
			echo $term->name .'&nbsp;&nbsp; ';  
		}  
	break;
	case 'received':
	echo rwmb_meta( 'vision_cause_amount_received' );
	break;
	case 'amount':
	echo rwmb_meta( 'vision_cause_amount' );
	break;
	case 'end':
	echo rwmb_meta( 'vision_cause_end_date' );
	break;
	}
}
?>