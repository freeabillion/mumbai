<?php include_once str_replace("\\","/",get_template_directory()).'/inc/init.php';
class vision_church_youtube_widget extends WP_Widget{
	function __construct(){
		$params = array('description'=> 'Youtube Box','name'=> 'Webnus - Youtube');
		parent::__construct('vision_church_youtube_widget', '', $params);
	}
	public function form($instance){
		extract($instance);	?>
		<p><label for="<?php echo esc_attr( $this->get_field_id('title') ) ?>"><?php esc_html_e('Title:','vision-church') ?></label><input	type="text"	class="widefat"	id="<?php echo esc_attr( $this->get_field_id('title') ) ?>"	name="<?php echo esc_attr( $this->get_field_name('title') ) ?>"		value="<?php if( isset($title) )  echo esc_attr($title); ?>" /></p>
		<p><label for="<?php echo esc_attr( $this->get_field_id('id') ) ?>"><?php esc_html_e('Channel Name or ID:','vision-church') ?></label><input	type="text"	class="widefat"	id="<?php echo esc_attr( $this->get_field_id('id') ) ?>"	name="<?php echo esc_attr( $this->get_field_name('id') ) ?>" value="<?php if( isset($id) )  echo esc_attr($id); ?>"	/>		</p>			
	<?php 	}
	public function widget($args, $instance){
		extract($args);
		extract($instance);
		echo '' . $before_widget;
		if(!empty($title)) echo '' . $before_title.esc_html($title).$after_title; ?>	
			<script src="https://apis.google.com/js/platform.js" async defer></script>
			<div class="g-ytsubscribe" data-channel="<?php echo esc_attr($id); ?>" data-layout="full" data-count="default"></div>
			<?php
			echo '' . $after_widget;
	}
}
add_action('widgets_init', 'register_vision_church_youtube'); 
function register_vision_church_youtube(){
	register_widget('vision_church_youtube_widget');
}