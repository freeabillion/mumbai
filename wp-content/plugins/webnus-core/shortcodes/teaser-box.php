<?php
function vision_church_teaserbox ($atts, $content = null) {
 	extract(shortcode_atts(array(
		'type'			=> '1',
		'img'			=> '',
		'title'			=> '',
		'subtitle'		=> '',
		'link_url'		=> '#',
		'img_alt'		=> '',
		'text_content'	=> '',
		'border'		=> '',
		'featured'		=> '',
		'border_color'	=> '#00b1cd',
		'thumbnail' 	=> '',
	), $atts));

	$border_color = ( $border_color ) ? $border_color : '#00b1cd';
	$style_border = ( $border == 'true' ) ? 'style = "background-color: '.$border_color.';"' : '' ;

	if(is_numeric($img))
		$img = wp_get_attachment_url( $img );
	if ( $thumbnail ) {
		// if main class not exist get it
		if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
			require_once WEBNUS_CORE_DIR .'shortcodes/classes/class_webnus_manuplate.php';
		}

		$patt = array ( '0'  => 'x', '1'  => '*' );

		$arr = explode( chr( 1 ), str_replace( $patt, chr( 1 ), $thumbnail ) ); // get width and height

		$image = new Wn_Img_Maniuplate; // instance from settor class

		$img = $image->m_image( $img , $arr['0'] , $arr['1'] ); // set required and get result
	}
	$out = '';
	$out .= '<div class="teaser-box'.$type.'">';
	$has_image = $teaser_image = '';
	if ((($type==4)OR($type==5))&&(empty($subtitle))){
		$subtitle = $title;
	}
	if (($type==6)&&(empty($subtitle))){
		$subtitle = esc_html__('understand more','webnus-core');
	}
	if($img){
		$has_image = 'has-image';
		$teaser_image ='<img class="teaser-image " src="'. $img .'" alt="' . $img_alt . '">';
	}
	if ( !empty($link_url) )
		$out .= '<a href="'.$link_url.'">';
	$out .= $teaser_image;
	if ( !empty($featured) )
		$out .= '<h6 class="teaser-featured">'.$featured.'</h4>';
	$out .= '<h4 class="teaser-title '.$has_image.'">'.$title.'</h4>';
	if ( $border == 'true' )
		$out .= '<div class="border-bottom" '.$style_border.'></div>';
	if (!empty($subtitle))
		$out .= '<h5 class="teaser-subtitle">'.$subtitle.'</h5>';
	if ( !empty($link_url) )
		$out.= '</a>';
	if ( !empty($text_content) && $type == '8' )
		$out.= '<p>'.$text_content.'</p>';
	$out .= '</div>';
	return $out;
}
 add_shortcode('teaserbox','vision_church_teaserbox');
?>