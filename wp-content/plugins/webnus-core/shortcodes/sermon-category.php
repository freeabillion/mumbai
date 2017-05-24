<?php
function vision_church_sermon_category( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'category'    => '',
		'image'       => '',
        'thumbnail'   => '',
	), $atts));

$category = get_term_by( 'slug', $category, 'sermon_category' );
$image_url = ($image) ? wp_get_attachment_url($image) : '';
if ( $thumbnail ) {
    // if main class not exist get it
    if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
        require_once WEBNUS_CORE_DIR .'shortcodes/classes/class_webnus_manuplate.php';
    }

    $patt = array ( '0'  => 'x', '1'  => '*' );

    $arr = explode( chr( 1 ), str_replace( $patt, chr( 1 ), $thumbnail ) ); // get width and height

    $image = new Wn_Img_Maniuplate; // instance from settor class

    $image_url = $image->m_image( $image_url , $arr['0'] , $arr['1'] ); // set required and get result
}
$out = '
    <div class="sermon-category-parent">
        <a href="' . esc_url( get_category_link( $category ) ) . '" title="' . esc_attr( sprintf( __( '%s category', 'michigan' ), $category->name ) ) . '">
            <img src="'.$image_url.'">
            <div class="sermon-overlay colorb"></div>
            <div class="sermon-category-box">
                <div class="sermon-category-name">
                    '.esc_html( $category->name ).'
                </div>
                <div class="sermon-category-count">
                    '. esc_html( 'sermons' , 'webnus-core' ) . ' ' . '(' . esc_html( $category->count ) . ')' .'
                </div>
            </div>
        </a>
    </div>
';

return $out;

}
add_shortcode( 'sermon-category', 'vision_church_sermon_category' );