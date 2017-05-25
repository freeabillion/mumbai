<?php include_once str_replace("\\","/",get_template_directory()).'/inc/init.php';
class WebnusTestimonialWidget extends WP_Widget{
	function __construct(){
		$params = array('description'=> 'Webnus Testimonial Widget','name'=> 'Webnus-Testimonial');
		parent::__construct('WebnusTestimonialWidget', '', $params);
	}
	public function form($instance){
		extract($instance);	?>
		<p><label for="<?php echo esc_attr( $this->get_field_id('title') ) ?>"><?php esc_html_e('Title:','vision-church') ?></label><input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('title') ) ?>" name="<?php echo esc_attr( $this->get_field_name('title') ) ?>" value="<?php if( isset($title) )  echo esc_attr($title); ?>" /></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id('image') ) ?>"><?php esc_html_e('Image URL:','vision-church') ?></label><input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('image') ) ?>" name="<?php echo esc_attr( $this->get_field_name('image') ) ?>" value="<?php if( isset($image) )  echo esc_attr($image); ?>" /></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id('name') ) ?>"><?php esc_html_e('Name:','vision-church') ?></label><input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('name') ) ?>" name="<?php echo esc_attr( $this->get_field_name('name') ) ?>" value="<?php if( isset($name) )  echo esc_attr($name); ?>" /></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id('subtitle') ) ?>"><?php esc_html_e('Subtitle:','vision-church') ?></label><input type="text" class="widefat" id="<?php echo esc_attr( $this->get_field_id('subtitle') ) ?>" name="<?php echo esc_attr( $this->get_field_name('subtitle') ) ?>" value="<?php if( isset($subtitle) )  echo esc_attr($subtitle); ?>" /></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id('text') ) ?>"><?php esc_html_e('Text:','vision-church') ?></label><textarea class="widefat" id="<?php echo esc_attr( $this->get_field_id('text') ) ?>" name="<?php echo esc_attr( $this->get_field_name('text') ) ?>"><?php if( isset($text) )  echo esc_attr($text); ?></textarea></p>
		<?php }
	public function widget($args, $instance){
		extract($args);
		extract($instance);
		echo '' . $before_widget;
		if(!empty($title)) echo '' . $before_title.esc_html($title).$after_title;
		$image = (isset($image)) ? $image : '' ;
		$name = (isset($name)) ? $name : '' ;
		$subtitle = (isset($subtitle)) ? $subtitle : '' ;
		$text = (isset($text)) ? $text : '' ;
		echo do_shortcode("[testimonial img='$image' name='$name' subtitle='$subtitle' testimonial_content='$text']");
		echo '' . $after_widget;
	}
}
add_action('widgets_init','register_vision_church_testimonial_widget'); 
function register_vision_church_testimonial_widget(){
	register_widget('WebnusTestimonialWidget');
}