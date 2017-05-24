<?php
add_action( 'init', 'vision_church_sermon_category_map' );
function vision_church_sermon_category_map() {
    // get sermon categoies
    $args = array(
        'type'         => 'sermon',
        'child_of'     => 0,
        'parent'       => '',
        'orderby'      => 'term_group',
        'hide_empty'   => false,
        'hierarchical' => 1,
        'exclude'      => '',
        'include'      => '',
        'number'       => '',
        'taxonomy'     => 'sermon_category',
        'pad_counts'   => false
    );
    include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
    $webnus_sermon_categories = '';
    if ( is_plugin_active( 'webnus-sermons/webnus-sermons.php' ) ) {
        $categories = get_categories( $args );
        // get category name
        $webnus_sermon_categories   = array();
        foreach( $categories as $category ) :
            $webnus_sermon_categories[] = $category->slug;
        endforeach;
    }
    vc_map( array(
        'name'          => esc_attr__( 'sermon Category', 'vision-church' ),
        'base'          => 'sermon-category',
        'icon'          => 'webnus-sermon-category',
        'description'   => esc_attr__( 'Show Single sermon Category', 'vision-church' ),
        'category'      => esc_attr__( 'Webnus Shortcodes', 'vision-church' ),
        'params'        => array(
            array(
                'heading'       => esc_attr__( 'Select Category', 'vision-church' ),
                'description'   => esc_html__( 'Select specific category', 'vision-church' ),
                'param_name'    => 'category',
                'type'          => 'dropdown',
                'value'         => $webnus_sermon_categories,
                'save_always'   => true,
            ),
            array(
                'heading'       => esc_html__( 'Select Category Image', 'vision-church' ),
                'description'   => wp_kses( __( 'Select Image for your category.', 'vision-church'), array( 'br' => array() ) ),
                'param_name'    => 'image',
                'type'          => 'attach_image',
                'value'         => '',
            ),
            array(
                'type'          => 'textfield',
                'heading'       => esc_html__( 'Image Size', 'vision-church' ),
                'param_name'    => 'thumbnail',
                'value'         => '',
                'description'   => esc_html__( 'Enter image size (Example: 200x100 (Width x Height)).', 'vision-church'),
            ),
        ),
    ) ); // end vc_map
} // end vision_church_sermon_category_map fun