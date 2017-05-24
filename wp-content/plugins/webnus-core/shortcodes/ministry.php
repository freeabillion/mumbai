<?php
function vision_church_ministry ($atts, $content = null) {
	extract(shortcode_atts(array(
	'type'			=> '1',
	'ministry_name'	=> '',
	'ministry_img'	=> '',
	'color'			=> '#0099cb',
	'text'			=> '',
	'director_name'	=> '',
	'director_img'	=> '',
	'link'			=> '',
	'thumbnail' 	=> '',
	'thumbnail2' 	=> '',
	), $atts));
	
	if(is_numeric($ministry_img)) $ministry_img = wp_get_attachment_url( $ministry_img );
	// crop image if thumbnail is set
	if ( $thumbnail ) {
		// if main class not exist get it
		if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
			require_once POWER_ADDONS_DIR .'includes/class-webnus-manuplate.php';
		}

		$patt = array ( '0'  => 'x', '1'  => '*' );

		$arr = explode( chr( 1 ), str_replace( $patt, chr( 1 ), $thumbnail ) ); // get width and height

		$image = new Wn_Img_Maniuplate; // instance from settor class

		$ministry_img = $image->m_image( $ministry_img , $arr['0'] , $arr['1'] ); // set required and get result
	}


	if(is_numeric($director_img)) $director_img = wp_get_attachment_url( $director_img );
	// crop image if thumbnail is set
	if ( $thumbnail2 ) {
		// if main class not exist get it
		if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
			require_once POWER_ADDONS_DIR .'includes/class-webnus-manuplate.php';
		}

		$patt = array ( '0'  => 'x', '1'  => '*' );

		$arr = explode( chr( 1 ), str_replace( $patt, chr( 1 ), $thumbnail ) ); // get width and height

		$image = new Wn_Img_Maniuplate; // instance from settor class

		$director_img = $image->m_image( $director_img , $arr['0'] , $arr['1'] ); // set required and get result
	}
	if($type==1){
		$out = '<article class="ministry-box" style="background-color:'.$color.'">
			<div class="ministry-bar" style="color:'.$color.'"><a href="'.$link.'"><h4>'.$ministry_name.'</h4></a></div>
			<div class="ministry-content" style="background-color:'.$color.'">
				<p>'.$text.'</p>
				<figure class="ministry-director">
					<img class="director-img" src="'. $director_img .'" alt="'.$director_name.'">
					<figcaption><h5>'.$director_name.'</h5><p>'.$ministry_name.' '.esc_html__('director','webnus-core').'</p></figcaption>
				</figure>
			</div>	
			<div class="ministry-img"><img src="'. $ministry_img .'" alt="'.$ministry_name.'"></div>			
		</article>';
	}elseif($type==2){
		$out = '<article class="ministry-box2"><a href="'.esc_url($link).'"><img src="'. $ministry_img .'" alt="'.$ministry_name.'"><h4>'.$ministry_name.'</h4><p>'.$text.'</p></a></article>';	
	}
return $out;
}
add_shortcode('ministry','vision_church_ministry');
?>