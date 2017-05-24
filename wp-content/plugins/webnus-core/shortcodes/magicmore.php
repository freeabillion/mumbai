<?php

 function vision_church_magicmore( $attributes, $content = null ) {
 	
	extract(shortcode_atts(array(
	
	"title" =>'',
	"link" =>'#',	
	), $attributes));

 return '<a href="'.$link.'" class="magicmore">'.$title. '</a>'; 
	

 }
 add_shortcode('magicmore', 'vision_church_magicmore');
?>