<?php
/**
* Redux Framework is free software: you can redistribute it and/or modify
* it under the terms of the GNU General Public License as published by
* the Free Software Foundation, either version 2 of the License, or
* any later version.
*
* Redux Framework is distributed in the hope that it will be useful,
* but WITHOUT ANY WARRANTY; without even the implied warranty of
* MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
* GNU General Public License for more details.
*
* You should have received a copy of the GNU General Public License
* along with Redux Framework. If not, see <http://www.gnu.org/licenses/>.
*
* @package     ReduxFramework
* @author      Webnus
* @version     1.0.0
*/

// Exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;

// Don't duplicate me!
if( ! class_exists( 'ReduxFramework_wn_header_builder' ) ) {

	/**
	* Main ReduxFramework_wn_header_builder class
	*
	* @since       1.0.0
	*/
	class ReduxFramework_wn_header_builder extends ReduxFramework {

		public $parent;
		public $field;
		public $value;
		public $args;
		public $repeater_values	= '';
		public $extension_dir	= '';
		public $extension_url	= '';

		/**
		* Field Constructor.
		*
		* Required - must call the parent constructor, then assign field and value to vars, and obviously call the render field function
		*
		* @since       1.0.0
		* @access      public
		* @return      void
		*/
		function __construct( $field = array(), $value ='', $parent ) {

			// Set required variables
			$this->parent	= $parent;
			$this->field	= $field;
			$this->value	= $value;
			$this->args		= $parent->args;

			// Set extension dir & url
			if ( empty( $this->extension_dir ) ) {
				$this->extension_dir = trailingslashit( str_replace( '\\', '/', dirname( __FILE__ ) ) );
				$this->extension_url = site_url( str_replace( trailingslashit( str_replace( '\\', '/', ABSPATH ) ), '', $this->extension_dir ) );
			}

			// Set default args for this field to avoid bad indexes. Change this to anything you use.
			$defaults = array(
				'options'			=> array(),
				'stylesheet'		=> '',
				'output'			=> true,
				'enqueue'			=> true,
				'enqueue_frontend'	=> true
			);

			$this->field = wp_parse_args( $this->field, $defaults );

		}

		/**
		* Field Render Function.
		*
		* Takes the vars and outputs the HTML for the field in the settings
		*
		* @since       1.0.0
		* @access      public
		* @return      void
		*/
		public function render() {

			// fetch backend header builder
			// delete_option( 'wn_backend_header_builder' );
			// delete_option( 'wn_frontend_header_builder' );
			$whb_html 	= get_option( 'wn_backend_header_builder' );
			$whb_html 	= wp_unslash( $whb_html );

			if ( $whb_html ) :

				$doc		= new DOMDocument();
				$doc->loadHTML( $whb_html );
				$whb_html	= $doc->saveHTML(); ?>

				<!-- webnus header builder wrap -->
				<div class="w-header-builder-wrap w-clearfix"><?php echo $whb_html; ?></div>

			<?php else : ?>

				<!-- webnus header builder wrap -->
				<div class="w-header-builder-wrap w-clearfix">

					<!-- main header -->
					<div class="whb-columns" id="whb-columns">
						<div class="whb-col col-left" data-align-col="left">
							<div class="whb-elements-place"></div>
							<a href="#" class="w-add-element" data-align-col="left"><i class="sl-plus"></i></a>
						</div>
						<div class="whb-col col-center" data-align-col="center">
							<div class="whb-elements-place"></div>
							<a href="#" class="w-add-element" data-align-col="center"><i class="sl-plus"></i></a>
						</div>
						<div class="whb-col col-right" data-align-col="right">
							<div class="whb-elements-place"></div>
							<a href="#" class="w-add-element" data-align-col="right"><i class="sl-plus"></i></a>
						</div>
					</div> <!-- end whb-columns -->

					<!-- modal elements -->
					<div class="whb-modal-wrap whb-elements">
						<div class="whb-modal-header">
							<h4><?php esc_html_e( 'Add Element', 'vision' ); ?></h4>
							<i class="ti-close"></i>
						</div>
						<div class="whb-modal-contents-wrap">
							<div class="whb-modal-contents w-clearfix">
								<div class="whb-elements-item w-col-sm-4" data-element="<?php echo esc_attr( 'menu' ); ?>">
									<a href="#"><i class="ti-align-justify"></i><?php esc_html_e( 'Menu', 'vision' ); ?></a>
								</div>
								<div class="whb-elements-item w-col-sm-4" data-element="<?php echo esc_attr( 'image' ); ?>">
									<a href="#"><i class="ti-image"></i><?php esc_html_e( 'Logo', 'vision' ); ?></a>
								</div>
								<div class="whb-elements-item w-col-sm-4" data-element="<?php echo esc_attr( 'search' ); ?>">
									<a href="#"><i class="ti-search"></i><?php esc_html_e( 'Search', 'vision' ); ?></a>
								</div>
								<!-- <div class="whb-elements-item w-col-sm-4" data-element="<?php echo esc_attr( 'socials' ); ?>">
									<a href="#"><i class="sl-share"></i><?php esc_html_e( 'Socials', 'vision' ); ?></a>
								</div> -->
								<!-- <div class="whb-elements-item w-col-sm-4" data-element="<?php echo esc_attr( 'button' ); ?>">
									<a href="#"><i class="ti-control-record"></i><?php esc_html_e( 'Button', 'vision' ); ?></a>
								</div> -->
								<div class="whb-elements-item w-col-sm-4" data-element="<?php echo esc_attr( 'text' ); ?>">
									<a href="#"><i class="ti-smallcap"></i><?php esc_html_e( 'Text', 'vision' ); ?></a>
								</div>
							</div>
						</div> <!-- end whb-modal-contents-wrap -->
					</div> <!-- end whb-elements -->

					<!-- modal menu edit -->
					<div class="whb-modal-wrap whb-modal-edit" data-element-target="<?php echo esc_attr( 'menu' ); ?>">
						<div class="whb-modal-header">
							<h4><?php esc_html_e( 'Menu Settings', 'vision' ); ?></h4>
							<i class="ti-close"></i>
						</div>
						<div class="whb-modal-contents-wrap">
							<div class="whb-modal-contents w-row">
								<div class="whb-field whb-field-menu w-col-sm-12">
									<h5><?php esc_html_e( 'Select a menu', 'vision' ); ?></h5>									
									<div class="whb-menu-dropdown">
										<?php
											$menus = wp_get_nav_menus();
											if ( ! empty ( $menus ) ) :
												echo '<select class="whb-field-select">';
													foreach ( $menus as $item ) :
														echo '<option value="' . $item->term_id . '">' . $item->name . '</option>';
													endforeach;
												echo '</select>';
											else :
												echo '<span>' . esc_html__( 'No items of this type were found.', 'vision-church' ) . '</span>';
											endif;
										?>
									</div>
								</div>
							</div>
						</div> <!-- end whb-modal-contents-wrap -->
						<div class="whb-modal-footer">
							<input type="button" class="whb_close button" value="<?php esc_html_e( 'Close', 'vision' ); ?>">
							<input type="button" class="whb_save button button-primary" value="<?php esc_html_e( 'Save Changes', 'vision' ); ?>">
						</div>
					</div> <!-- end whb-elements -->

					<!-- modal search edit -->
					<div class="whb-modal-wrap whb-modal-edit" data-element-target="<?php echo esc_attr( 'search' ); ?>">
						<div class="whb-modal-header">
							<h4><?php esc_html_e( 'search Settings', 'vision' ); ?></h4>
							<i class="ti-close"></i>
						</div>
						<div class="whb-modal-contents-wrap">
							<div class="whb-modal-contents w-row">
								<div class="whb-field whb-field-search-placeholder w-col-sm-12">
									<h5><?php esc_html_e( 'Search Input Placeholder', 'vision' ); ?></h5>
									<input type="text" class="whb-field-input">
								</div>
							</div>
						</div> <!-- end whb-modal-contents-wrap -->
						<div class="whb-modal-footer">
							<input type="button" class="whb_close button" value="<?php esc_html_e( 'Close', 'vision' ); ?>">
							<input type="button" class="whb_save button button-primary" value="<?php esc_html_e( 'Save Changes', 'vision' ); ?>">
						</div>
					</div> <!-- end whb-elements -->

					<!-- modal image edit -->
					<div class="whb-modal-wrap whb-modal-edit" data-element-target="<?php echo esc_attr( 'image' ); ?>">
						<div class="whb-modal-header">
							<h4><?php esc_html_e( 'Image Settings', 'vision' ); ?></h4>
							<i class="ti-close"></i>
						</div>
						<div class="whb-modal-contents-wrap">
							<div class="whb-modal-contents w-row">
								<div class="whb-field whb-field-image-url w-col-sm-12">
									<h5><?php esc_html_e( 'Image URL', 'vision' ); ?></h5>
									<input type="text" class="whb-field-input">
								</div>
								<div class="whb-field whb-field-image-width w-col-sm-12">
									<h5><?php esc_html_e( 'Width', 'vision' ); ?></h5>
									<input type="text" class="whb-field-input">
								</div>
								<div class="whb-field whb-field-image-height w-col-sm-12">
									<h5><?php esc_html_e( 'Height', 'vision' ); ?></h5>
									<input type="text" class="whb-field-input">
								</div>
							</div>
						</div> <!-- end whb-modal-contents-wrap -->
						<div class="whb-modal-footer">
							<input type="button" class="whb_close button" value="<?php esc_html_e( 'Close', 'vision' ); ?>">
							<input type="button" class="whb_save button button-primary" value="<?php esc_html_e( 'Save Changes', 'vision' ); ?>">
						</div>
					</div> <!-- end whb-elements -->

					<!-- modal text edit -->
					<div class="whb-modal-wrap whb-modal-edit" data-element-target="<?php echo esc_attr( 'text' ); ?>">
						<div class="whb-modal-header">
							<h4><?php esc_html_e( 'Text Settings', 'vision' ); ?></h4>
							<i class="ti-close"></i>
						</div>
						<div class="whb-modal-contents-wrap">
							<div class="whb-modal-contents w-row">
								<div class="whb-field whb-field-text w-col-sm-12">
									<h5><?php esc_html_e( 'Text', 'vision' ); ?></h5>
									<input type="text" class="whb-field-input">
								</div>
								<div class="whb-field whb-field-link-url w-col-sm-12" style="display: none;">
									<h5><?php esc_html_e( 'Link', 'vision' ); ?></h5>
									<input type="text" class="whb-field-input">
								</div>
							</div>
						</div> <!-- end whb-modal-contents-wrap -->
						<div class="whb-modal-footer">
							<input type="button" class="whb_close button" value="<?php esc_html_e( 'Close', 'vision' ); ?>">
							<input type="button" class="whb_save button button-primary" value="<?php esc_html_e( 'Save Changes', 'vision' ); ?>">
						</div>
					</div> <!-- end whb-elements -->

				</div> <!-- end w-header-builder-wrap -->
			<?php endif;

		}

		/**
		* Enqueue Function.
		*
		* If this field requires any scripts, or css define this function and register/enqueue the scripts/css
		*
		* @since       1.0.0
		* @access      public
		* @return      void
		*/
		public function enqueue() {

			wp_enqueue_script( 'wn-header-builder',  $this->extension_url . 'field_wn_header_builder.js',  array( 'jquery' ), '1.0.0', true );
			wp_enqueue_style( 'wn-header-builder',  $this->extension_url . 'field_wn_header_builder.css', '1.0.0', true );

		}

		/**
		* Output Function.
		*
		* Used to enqueue to the front-end
		*
		* @since       1.0.0
		* @access      public
		* @return      void
		*/
		public function output() {

			if ( $this->field['enqueue_frontend'] ) {

			}

		}

	}
}
