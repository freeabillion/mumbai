<?php
$vision_church_options = vision_church_options();
$social = array();
$social[1] = strtolower( trim( isset( $vision_church_options['vision_church_social_first'] ) ? $vision_church_options['vision_church_social_first'] : '' ) );
$social[2] = strtolower( trim( isset( $vision_church_options['vision_church_social_second'] ) ? $vision_church_options['vision_church_social_second'] : '' ) );
$social[3] = strtolower( trim( isset( $vision_church_options['vision_church_social_third'] ) ? $vision_church_options['vision_church_social_third'] : '' ) );
$social[4] = strtolower( trim( isset( $vision_church_options['vision_church_social_fourth'] ) ? $vision_church_options['vision_church_social_fourth'] : '' ) );
$social[5] = strtolower( trim( isset( $vision_church_options['vision_church_social_fifth'] ) ? $vision_church_options['vision_church_social_fifth'] : '' ) );
$social[6] = strtolower( trim( isset( $vision_church_options['vision_church_social_sixth'] ) ? $vision_church_options['vision_church_social_sixth'] : '' ) );
$social[7] = strtolower( trim( isset( $vision_church_options['vision_church_social_seventh'] ) ? $vision_church_options['vision_church_social_seventh'] : '' ) );
$social_url = array();
$social_url[1] = trim( isset( $vision_church_options['vision_church_social_first_url'] ) ? $vision_church_options['vision_church_social_first_url'] : '' );
$social_url[2] = trim( isset( $vision_church_options['vision_church_social_second_url'] ) ? $vision_church_options['vision_church_social_second_url'] : '' );
$social_url[3] = trim( isset( $vision_church_options['vision_church_social_third_url'] ) ? $vision_church_options['vision_church_social_third_url'] : '' );
$social_url[4] = trim( isset( $vision_church_options['vision_church_social_fourth_url'] ) ? $vision_church_options['vision_church_social_fourth_url'] : '' );
$social_url[5] = trim( isset( $vision_church_options['vision_church_social_fifth_url'] ) ? $vision_church_options['vision_church_social_fifth_url'] : '' );
$social_url[6] = trim( isset( $vision_church_options['vision_church_social_sixth_url'] ) ? $vision_church_options['vision_church_social_sixth_url'] : '' );
$social_url[7] = trim( isset( $vision_church_options['vision_church_social_seventh_url'] ) ? $vision_church_options['vision_church_social_seventh_url'] : '' );

for ($x = 1; $x <= 7; $x++) {
	echo($social[$x] && $social_url[$x])?'<a target="_blank" href="'. $social_url[$x] .'" data-network= "'.$social[$x].'" class="'.$social[$x].'"><i class="fa-'.$social[$x].'"></i></a>':'';
} 
?>