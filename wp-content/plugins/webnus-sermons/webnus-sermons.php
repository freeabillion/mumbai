<?php

/*
Plugin Name: Webnus Sermons
Description: Webnus Sermons plugin is a wordpress plugin designed to create Sermons in to your wordpress website.
Version: 1.2.1
Author: Webnus
Author URI: http://webnus.net
License: GPL2
*/

define('SERMONS_DIR', dirname(__FILE__));
define('SERMONS_THEMES_DIR', SERMONS_DIR . "/themes");
define('SERMONS_URL', WP_PLUGIN_URL . "/" . basename(SERMONS_DIR));
define('W_SERMONS_VERSION', '1.2');

//Method And Action Are Call
add_filter('manage_edit-sermon_columns', 'w_add_new_sermon_columns');
add_action('manage_sermon_posts_custom_column', 'w_manage_sermon_columns', 5, 2);
add_action('init', 'w_sermon_register');

//Register Post Type
function w_sermon_register() {
    $labels = array(
        'name' => __('Sermons', 'vision'),
        'all_items' => __('All Sermons', 'vision'),
        'singular_name' => __('Sermon', 'vision'),
        'add_new' => __('Add Sermon', 'vision'),
        'add_new_item' => __('Add New Sermon', 'vision'),
        'edit_item' => __('Edit Sermon', 'vision'),
        'new_item' => __('New Sermon', 'vision'),
        'view_item' => __('View Sermon', 'vision'),
        'search_items' => __('Search Sermon', 'vision'),
        'not_found' => __('No Sermon found', 'vision'),
        'not_found_in_trash' => __('No Item found in Trash', 'vision'),
        'parent_item_colon' => '',
        'menu_name' => __('Sermons', 'vision')
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'rewrite' => array('slug' => 'sermon'),
        'supports' => array(
            'title',
            'thumbnail',
            'editor',
			'page-attributes',
			'excerpt',
			'comments',
        ),
        'menu_position' => 23,
        'menu_icon' => 'dashicons-money',
        'taxonomies' => array('sermon_category', 'vision')
    );
    register_post_type('sermon', $args);
	w_sermon_register_taxonomies();
}

//Register Taxonomies
function w_sermon_register_taxonomies() {
    register_taxonomy('sermon_category', 'sermon', 
	array(
	'hierarchical' => true,
	'label' => 'Sermon Categories',
	'query_var' => true,
	'rewrite' => array('slug' => 'sermon-category')
	));

	$labels = array(
			'name'					=> __('Sermon Speakers', 'vision'),
			'singular_name'			=> __('Sermon Speaker',  'vision'),
			'search_items'			=> __('Search Sermon Speaker', 'vision'),
			'popular_items'			=> __('Popular Sermons Speakers', 'vision'),
			'all_items'				=> __('All Sermons Speakers', 'vision'),
			'parent_item'			=> null,
			'parent_item_colon'		=> null,
			'edit_item'				=> __('Edit Sermons Speaker', 'vision'),
			'update_item'			=> __('Update Sermons Speaker', 'vision'),
			'add_new_item'			=> __('Add New Sermons Speaker', 'vision'),
			'new_item_name'			=> __('New Sermons Speaker Name', 'vision'),
			'add_or_remove_items'	=> __('Add or remove Sermons Speakers', 'vision'),
			'choose_from_most_used' => __('Choose from the most used Sermons Speakers', 'vision'),
			'separate_items_with_commas' => __('Separate Sermons Speakers with commas', 'vision'),
		);
	register_taxonomy('sermon_speaker', 'sermon', 	
	array(
	'hierarchical' => true,
	'labels' => $labels,
	'query_var' => true,	'rewrite' => array('slug' => 'sermon-speaker')
	));
	
register_taxonomy('sermon_tag', 'sermon', array(
    'hierarchical' => false, 
    'label' => "Sermon Tags", 
    'rewrite' => true, 
    'query_var' => true
    )
);
	
	}
	
//Admin Dashobord Listing Sermon Columns Title
function w_add_new_sermon_columns() {
	$columns['cb'] = '<input type="checkbox" />';
 	$columns['title'] = __('Title', 'vision');
	$columns['sermon_category'] = __('Categories', 'vision' );
	$columns['sermon_speaker'] = __('Speakers', 'vision' );
	$columns['sermon_tag'] = __('Tags', 'vision' );
	$columns['date'] = __('Date', 'vision');
	return $columns; 
}

//Admin Dashobord Listing Sermon Columns Manage
function w_manage_sermon_columns($columns) {
	global $post;
	switch ($columns) {
 	case 'sermon_category':
		$terms = wp_get_post_terms($post->ID, 'sermon_category');  
		foreach ($terms as $term) {  
			echo $term->name .'&nbsp;&nbsp; ';  
		}  
	break;
	 	case 'sermon_speaker':
		$terms = wp_get_post_terms($post->ID, 'sermon_speaker');  
		foreach ($terms as $term) {  
			echo $term->name .'&nbsp;&nbsp; ';  
		}
break;
	 	case 'sermon_tag':
		$terms = wp_get_post_terms($post->ID, 'sermon_tag');  
		foreach ($terms as $term) {  
			echo $term->name .'&nbsp;&nbsp; ';  
		}		


	break;
	}
}
?>