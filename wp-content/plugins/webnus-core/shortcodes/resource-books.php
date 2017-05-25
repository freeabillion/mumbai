<?php
function vision_church_resource_books( $atts, $content = null ) {
	extract(shortcode_atts(array(
		'img'		=>'',
		'name'		=>'',
		'author'	=>'',
		'text'		=>'',
		'link_text'	=>'',
		'link_url'	=>'',
	), $atts));

	if (is_numeric( $img ) ) $img = wp_get_attachment_url( $img );

	$img		= $img ? '<img src=" '. esc_url( $img ) .' " alt="'. $name .'">' : '';
	$name		= $name ? '<h3>'. esc_html( $name ) .'</h3>' : '';
	$author		= $author ? '<h6>'. esc_html( $author ) .'</h6>' : '';
	$text		= $text ? '<p>'. esc_html( $text ) .'</p>' : '';
	$link_url	= $link_url ? '<a class="magicmore" href="'. esc_url( $link_url ) . '">' . esc_html( $link_text ) . '</a>' : '';

	$out = '
		<div class="resource-books">
			' . $img . '
			<div class="content">' . $name . $author . $text . $link_url . '</div>
		</div>';

	return $out;
}

add_shortcode( 'resource-books', 'vision_church_resource_books' );