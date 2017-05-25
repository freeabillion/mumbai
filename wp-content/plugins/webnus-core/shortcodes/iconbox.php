<?php
function vision_church_iconbox( $attributes, $content = null ) {

	extract(shortcode_atts(array(
		'type'					=> '',
		'icon_title'			=> '',
		'icon_link_url'			=> '',
		'icon_link_text'		=> '',
		'icon_name'				=> '',
		'iconbox_content'		=> '',
		'icon_size'				=> '',
		'icon_bg'				=> '',
		'icon_color'			=> '',
		'title_color'			=> '',
		'content_color'			=> '',
		'link_color'			=> '',
		'icon_image'			=> '',
		'featured'				=> '',
		'border_left'			=> '',
		'border_right'			=> '',
		'icon_subtitle'			=> '',
		'min_height'			=> '',
		'background_color'		=> '',
		'align'					=> '',
		'thumbnail'				=> '',
	), $attributes));

	ob_start();
	$type 		=  ( $type == 0 ) ? '' : $type ;
	$icon_bg 	= ( $icon_bg ) ? 'background:'. esc_attr($icon_bg) .'; ' : '' ;
	$min_height = ( $min_height ) ? 'min-height:'. $min_height .'; ' : '' ;
	$wrap_style = ( $icon_bg ||  $min_height ) ? 'style="' . $icon_bg . $min_height . '"' : '' ;
	$iconbox_style = $start_wrap = $end_wrap = '';
	if ( $type==17 ) {
		$iconbox_style = ( !empty($icon_color) ) ? ' style="color: ' . esc_attr($icon_color) . '"' : '' ;
		$start_wrap = '<div class="icon-wrap" style="background-color:' . esc_attr($icon_color) . '">';
		$end_wrap   = '</div>';
	}

	if ( $type == 26 ) {
		$start_wrap = '<div class="icon-wrap" '. $wrap_style .'>';
		$end_wrap   = '</div>';
	}

	$iconbox22_class = '';
	if ( $type == 15 || $type == 22 ) {
		$iconbox22_class .= $featured ? ' ' . $featured : '';
		$iconbox22_class .= $border_left ? ' ' . $border_left : '';
		$iconbox22_class .= $border_right ? ' ' . $border_right : '';
	}

	echo '<article class="icon-box' . $type . $iconbox22_class . ' ' . $align . ' " ' . $iconbox_style . '>';
			if ( $type == 18 ) {
				$color = $background_color ? 'border-top-color:' . $background_color . ';' : '';
				echo '<span class="shape" style="background:' . $background_color . ';"></span>';
				echo '<div class="wn-content-wrap" style="background:' . $background_color . ';">';
			}			
			if( !empty( $icon_link_url ) && $icon_name != 'none' )
				echo '' . $start_wrap . '<a href="' . esc_url($icon_link_url) . '">'  . do_shortcode(  "[icon name='$icon_name' size='$icon_size' color='$icon_color']" ).'</a>' . $end_wrap . '';
			elseif ( $icon_name != 'none' && $type != 21 )
				echo $start_wrap . do_shortcode(  "[icon name='$icon_name' size='$icon_size' color='$icon_color']" ) . $end_wrap;
			if ( !empty( $icon_image ) ) {
				if( is_numeric( $icon_image ) ){
					$icon_image = wp_get_attachment_url( $icon_image );
					if ( $thumbnail ) {
						// if main class not exist get it
						if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
							require_once WEBNUS_CORE_DIR .'shortcodes/classes/class_webnus_manuplate.php';
						}

						$patt = array ( '0'  => 'x', '1'  => '*' );

						$arr = explode( chr( 1 ), str_replace( $patt, chr( 1 ), $thumbnail ) ); // get width and height

						$image = new Wn_Img_Maniuplate; // instance from settor class

						$icon_image = $image->m_image( $icon_image , $arr['0'] , $arr['1'] ); // set required and get result
					}
				}
				if( !empty( $icon_link_url ) )
					echo "<a href='$icon_link_url'>" . '<img src="'.$icon_image.'" alt="" />' . '</a>' ;
				else
					echo $start_wrap . '<img src="'.$icon_image.'" alt="" />' . $end_wrap ;
			}
			if ( $type == 21 ){
				echo '<div class="iconbox-leftsection">';
				echo do_shortcode(  "[icon name='$icon_name' size='$icon_size' color='$icon_color']" );
				echo '</div>';
			} 
		$content_style = !empty($content_color)?' style="color:'.$content_color.'"':'';
	 	$title_style = !empty($title_color)?' style="color:'.$title_color.'"':'';
		$link_style = !empty($link_color)?' style="color:'.$link_color.'"':'';
if ( $type != 21 ) {
	 	echo (!empty($icon_subtitle)) ? '<h5>' . $icon_subtitle . '</h5>' : '';
		echo '<h4'.$title_style.'>' . $icon_title . '</h4>';
      	echo '<p'.$content_style.'>'.$iconbox_content .'</p>' ;
		echo (!empty($icon_link_url) &&  (!empty($icon_link_text)) )?"<a".$link_style." class=\"magicmore\" href=\"{$icon_link_url}\">{$icon_link_text}</a>":'';
	}
	if ( $type == 21 ) {
		$icon_subtitle = $icon_subtitle ? '<h6'.$title_style.'>'.$icon_subtitle.'</h6>' : '' ;
		echo '
			<div class="iconbox-rightsection">
				<h6'.$title_style.'>'.$icon_subtitle.'</h6>
				<h4'.$title_style.'>'.$icon_title.'</h4>
				<p'.$content_style.'>'.$iconbox_content .'</p>
				<a'.$link_style.' class="magicmore" href="' . $icon_link_url . '">' . $icon_link_text . '</a>
			</div>';
	}
if ( $type == 18 ) {
	echo '</div>';
}
	echo '</article>';

$out = ob_get_contents();
ob_end_clean();
$out = str_replace('<p></p>','',$out);
	return $out;
 }
 add_shortcode('iconbox', 'vision_church_iconbox');
?>