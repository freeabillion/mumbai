<?php
$block = $block_data[0];
$settings = $block_data[1];
$category_id = get_cat_ID($post->cat);
$category_link = get_category_link( $category_id );
?>
<div class="hero-carousel-wrap">
	<div class="hero-metadata">
		<span class="category"><a href="<?php echo esc_url( $category_link ); ?>" title="<?php echo esc_attr( $post->cat ) ?>"><?php echo '' . $post->cat ?></a></span>
		<span class="date"><?php echo esc_html( $post->date ) ?></span>

<!-- Print a link to this category -->

	</div>
	<h2 class="post-title"><?php echo '<a href="' . get_permalink( $post->id ) . '">' . $post->title . '</a>'; ?></h2>
</div>

<?php if($block === 'image' && !empty($post->thumbnail)){ ?>
	<div class="post-thumb">
		<?php echo !empty($settings[0]) && $settings[0]!='no_link' ? $this->getLinked($post, $post->thumbnail, $settings[0], 'link_image') : $post->thumbnail ?>
	</div>
<?php } ?>
<?php if($block === 'text'){ ?>
	<div class="entry-content">
		<?php echo !empty($settings[0]) && $settings[0]==='text' ?  $post->content : $post->excerpt; ?>
	</div>
<?php } ?>
<?php if($block === 'link'){ ?>
	<a href="<?php echo esc_url( $post->link ) ?>" class="vc_read_more" title="<?php echo esc_attr(sprintf(__( 'Permalink to', 'vision-church' ).' %s', $post->title_attribute)); ?>"<?php echo '' . $this->link_target ?>><?php _e('Read more', 'vision-church') ?></a>
<?php }