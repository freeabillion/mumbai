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
if( !defined( 'ABSPATH' ) ) exit;

// Don't duplicate me!
if( !class_exists( 'ReduxFramework_extension_wn_header_builder' ) ) {


    /**
     * Main ReduxFramework wn_header_builder extension class
     *
     * @since       1.0.0
     */
    class ReduxFramework_extension_wn_header_builder extends ReduxFramework {

        // Protected vars
        protected $parent;
        public $extension_url;
        public $extension_dir;
        public static $theInstance;

        /**
        * Class Constructor. Defines the args for the extions class
        *
        * @since       1.0.0
        * @access      public
        * @param       array $sections Panel sections.
        * @param       array $args Class constructor arguments.
        * @param       array $extra_tabs Extra panel tabs.
        * @return      void
        */
        public function __construct( $parent ) {
            
            $this->parent = $parent;
            if ( empty( $this->extension_dir ) ) {
                $this->extension_dir = trailingslashit( str_replace( '\\', '/', dirname( __FILE__ ) ) );
            }
            $this->field_name = 'wn_header_builder';

            self::$theInstance = $this;

            add_filter( 'redux/'.$this->parent->args['opt_name'].'/field/class/'.$this->field_name, array( &$this, 'overload_field_path' ) ); // Adds the local field

        }

        public function getInstance() {
            return self::$theInstance;
        }

        // Forces the use of the embeded field path vs what the core typically would use    
        public function overload_field_path( $field ) {
            return dirname(__FILE__).'/'.$this->field_name.'/field_'.$this->field_name.'.php';
        }

    } // class
} // if


// create backend option
add_action( 'wp_ajax_wn_backend_header_builder', 'wn_save_backend_header_builder' );

function wn_save_backend_header_builder() {
	update_option( 'wn_backend_header_builder', $_POST['from'] );
	echo wp_unslash( $_POST['from'] );

	wp_die(); // this is required to terminate immediately and return a proper response
}

// create menus update
add_action( 'wp_ajax_wn_header_builder_menus', 'wn_save_wn_header_builder_menus' );

function wn_save_wn_header_builder_menus() {
	$menus = wp_get_nav_menus();
	$dropdown_menus = '';
	if ( ! empty ( $menus ) ) :
		$dropdown_menus .= '<select class="whb-field-select">';
			foreach ( $menus as $item ) :
				$dropdown_menus .= '<option value="' . $item->term_id . '">' . $item->name . '</option>';
			endforeach;
		$dropdown_menus .= '</select>';
	else :
		$dropdown_menus .= '<span>' . esc_html__( 'No items of this type were found.', 'vision-church' ) . '</span>';
	endif;

	echo $dropdown_menus;

	wp_die(); // this is required to terminate immediately and return a proper response
}


// create frontend option
add_action( 'wp_ajax_wn_frontend_header_builder', 'wn_save_frontend_header_builder' );

function wn_save_frontend_header_builder() {
	update_option( 'wn_frontend_header_builder', $_POST['from'] );
	echo wp_unslash( $_POST['from'] );

	wp_die(); // this is required to terminate immediately and return a proper response
}