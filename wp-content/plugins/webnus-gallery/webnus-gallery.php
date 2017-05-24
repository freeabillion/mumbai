<?php

/*
Plugin Name: Webnus Gallery
Description: Webnus Gallery plugin is a wordpress plugin designed to create gallery in to your wordpress website.
Version: 1.0
Author: Webnus
Author URI: http://webnus.net
License: GPL2
*/

define('GALLERY_DIR', dirname(__FILE__));
define('GALLERY_THEMES_DIR', GALLERY_DIR . "/themes");
define('GALLERY_URL', WP_PLUGIN_URL . "/" . basename(GALLERY_DIR));
define('W_GALLERY_VERSION', '1.0');

//Method And Action Are Call
add_filter('manage_edit-gallery_columns', 'w_add_new_gallery_columns');
add_action('manage_gallery_posts_custom_column', 'w_manage_gallery_columns', 5, 2);
add_action('init', 'w_gallery_register');

//Register Post Type
function w_gallery_register() {
    $labels = array(
        'name' => __('Gallery'),
        'singular_name' => __('Gallery'),
        'add_new' => __('Add Gallery Item'),
        'add_new_item' => __('Add New Gallery Item'),
        'edit_item' => __('Edit Gallery Item'),
        'new_item' => __('New Gallery Item'),
        'view_item' => __('View Gallery Item'),
        'search_items' => __('Search Gallery Item'),
        'not_found' => __('No Gallery Items found'),
        'not_found_in_trash' => __('No Gallery Items found in Trash'),
        'parent_item_colon' => '',
        'menu_name' => __('Gallery')
    );
    $args = array(
        'labels' => $labels,
        'public' => true,
        'show_ui' => true,
        'capability_type' => 'post',
        'hierarchical' => true,
        'rewrite' => array('slug' => 'gallery'),
        'supports' => array(
            'title',
            'thumbnail',
            'editor',
			'page-attributes'
        ),
        'menu_position' => 23,
        'menu_icon' => 'dashicons-format-gallery',
        'taxonomies' => array('gallery_category')
    );
    register_post_type('gallery', $args);
	w_gallery_register_taxonomies();
}

//Register Taxonomies
function w_gallery_register_taxonomies() {
    register_taxonomy('gallery_category', 'gallery', array('hierarchical' => true, 'label' => 'Gallery Category', 'query_var' => true, 'rewrite' => array('slug' => 'gallery-type')));
     if (count(get_terms('gallery_category', 'hide_empty=0')) == 0) {
        register_taxonomy('type', 'gallery', array('hierarchical' => true, 'label' => 'Item Type'));
        $_categories = get_categories('taxonomy=type&title_li=');
        foreach ($_categories as $_cat) {
            if (!term_exists($_cat->name, 'gallery_category'))
                wp_insert_term($_cat->name, 'gallery_category');
        }
        $gallery = new WP_Query(array('post_type' => 'gallery', 'posts_per_page' => '-1'));
        while ($gallery->have_posts()) : $gallery->the_post();
            $post_id = get_the_ID();
            $_terms = wp_get_post_terms($post_id, 'type');
            $terms = array();
            foreach ($_terms as $_term) {
                $terms[] = $_term->term_id;
            }
            wp_set_post_terms($post_id, $terms, 'gallery_category');
        endwhile;
        wp_reset_query();
        register_taxonomy('type', array());
    } }

//Admin Dashobord Listing Gallery Columns Title
function w_add_new_gallery_columns() {
	$columns['cb'] = '<input type="checkbox" />';
 	$columns['title'] = __('Title', 'webnus_gallery');
	$columns['thumbnail'] = __('Thumbnail', 'webnus_gallery' );
	$columns['author'] = __('Author', 'webnus_gallery' );
	$columns['gallery_category'] = __('Gallery Categories', 'webnus_gallery' );
	$columns['date'] = __('Date', 'webnus_gallery');
	return $columns;
}

//Admin Dashobord Listing Gallery Columns Manage
function w_manage_gallery_columns($columns) {
	global $post;
	switch ($columns) {
	case 'thumbnail':
	 	if(get_the_post_thumbnail( $post->ID, 'thumbnail' )){
				echo get_the_post_thumbnail( $post->ID, 'thumbnail' );
			}else{
				echo '<img width="150" height="150" src="'.GALLERY_URL.'/images/no_image.jpg" class="attachment-thumbnail wp-post-image" alt="no image">';
		 }
	break;
 	case 'gallery_category':
		$terms = wp_get_post_terms($post->ID, 'gallery_category');
		foreach ($terms as $term) {
			echo $term->name .'&nbsp;&nbsp; ';
		}
	break;
	}
}
?>