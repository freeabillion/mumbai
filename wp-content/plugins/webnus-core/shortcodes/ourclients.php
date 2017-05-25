<?php

function vision_church_ourclients($attributes, $content){
	extract(shortcode_atts(array(
	'type'  => '1',
	'client_images'=>'',
	'thumbnail'		=> ''
	), $attributes));

	$client_images_url = '';
	if(!empty($client_images))
	{
		$images_id_array = array();
		$images_id_array =explode(',',$client_images);
		foreach($images_id_array as $id)
		{
			@$link = get_post($id)->post_excerpt;
			$alt_text = get_post_meta($id, '_wp_attachment_image_alt', true);
			$img = wp_get_attachment_url( $id );
			if(empty($link))
			$client_images_url .= '<li><img alt="'.$alt_text.'" src="' .$img . '"/></li>';
			else
			$client_images_url .= '<li><a target="_blank" href="'.esc_url($link).'"><img alt="'.$alt_text.'"  src="' .$img . '"/></a></li>';
		}
	}
	$out = '';
	$out .= '<div class="aligncenter">';
    $out .= '<hr class="vertical-space1"><div class="col-md-12 our-clients-wrap ';
	if($type==2)
	{
	$out .='crsl';
	}
	$out .= '"><ul id="our-clients" class="our-clients ';
	if($type==2)
	{
	$out .='crsl';
	}
	$out .='">';
	$out .= $client_images_url;
	$out .= do_shortcode($content);
	$out .='</ul>';
	$out .= '</div><hr class="vertical-space2"></div>';
	
	return $out;
}
add_shortcode("ourclients", "vision_church_ourclients");
function vision_church_client($attributes, $content){
	extract(shortcode_atts(array(
		"img" => '',
		"img_alt" => '',
	), $attributes));

return !empty($img)?'<li><img src="'.$img.'" alt="'.$img_alt.'"></li>':'';
}
add_shortcode("client", "vision_church_client");
?>