<?php
function vision_church_postfromblog( $attributes, $content = null ) {
extract(shortcode_atts(	array(
	'post'=>''
), $attributes));
	ob_start();	
	$query = new WP_Query('p='.$post.'');
	if ($query -> have_posts()) : $query -> the_post();
	$thumbnail_url = get_the_post_thumbnail_url();
    if( !empty( $thumbnail_url ) ) {
        // if main class not exist get it
        if ( !class_exists( 'Wn_Img_Maniuplate' ) ) {
            require_once WEBNUS_CORE_DIR .'shortcodes/classes/class_webnus_manuplate.php';
        }
        $image = new Wn_Img_Maniuplate; // instance from settor class
        $thumbnail_url = $image->m_image( $thumbnail_url , '690' , '460' ); // set required and get result
    }
?>
	<article class="a-post-box">
		<figure class="latest-img"><img src="<?php echo $thumbnail_url ?>"></figure>
		<div class="latest-overlay"></div>
		<div class="latest-txt">
			<h4 class="latest-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
			<span class="latest-cat"><?php the_category(' / ') ?></span>
			<span class="latest-date"><i class="fa-clock-o"></i> <?php the_time(get_option( 'date_format' )); ?></span>
		</div>
    </article>
<?php
	endif;
	$out = ob_get_contents();
	ob_end_clean();	
	wp_reset_postdata();
	return $out;
 }
 add_shortcode('postblog', 'vision_church_postfromblog');
?>