<?php
$vision_church_options = vision_church_options(); 
$vision_church_options['vision_church_blog_meta_author_enable'] = isset($vision_church_options['vision_church_blog_meta_author_enable']) ? $vision_church_options['vision_church_blog_meta_author_enable'] : '0' ;
$vision_church_options['vision_church_blog_meta_category_enable'] = isset($vision_church_options['vision_church_blog_meta_category_enable']) ? $vision_church_options['vision_church_blog_meta_category_enable'] : '1' ;
$vision_church_options['vision_church_blog_meta_comments_enable'] = isset($vision_church_options['vision_church_blog_meta_comments_enable']) ? $vision_church_options['vision_church_blog_meta_comments_enable'] : '1' ;
$vision_church_options['vision_church_blog_excerpt_list'] = isset($vision_church_options['vision_church_blog_excerpt_list']) ? $vision_church_options['vision_church_blog_excerpt_list'] : 17 ;
?>
<article id="post-<?php the_ID(); ?>" class="blog-post"> 
	<div class="col-md-11 alpha omega">
	  <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></h3>
	  <div class="postmetadata">
			<h6 class="blog-date"><i class="ti-calendar"></i><?php the_time(get_option( 'date_format' )) ?></h6>
			<?php
			$vision_church_options['vision_church_blog_meta_category_enable'] = isset( $vision_church_options['vision_church_blog_meta_category_enable'] ) ? $vision_church_options['vision_church_blog_meta_category_enable'] : '1' ;
			if( $vision_church_options['vision_church_blog_meta_category_enable'] && has_category() ){ ?>
				<h6 class="blog-cat"><i class="ti-folder"></i><?php the_category(', ') ?> </h6>
			<?php } ?>
			<?php
			$vision_church_options['vision_church_blog_meta_comments_enable'] = isset( $vision_church_options['vision_church_blog_meta_comments_enable'] ) ? $vision_church_options['vision_church_blog_meta_comments_enable'] : '1' ;
			if($vision_church_options['vision_church_blog_meta_comments_enable']){ ?>
				<h6 class="blog-comments"><i class="ti-comment"></i><?php comments_number(  ); ?> </h6>
			<?php } ?>
		</div><br>
	 <p>
	  <?php 
		echo vision_church_excerpt(($vision_church_options['vision_church_blog_excerpt_list'])?$vision_church_options['vision_church_blog_excerpt_list']:35);
	  ?>
	  </p>
	  </div>
	<hr class="vertical-space1">
</article>