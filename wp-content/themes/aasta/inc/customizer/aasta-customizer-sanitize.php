<?php
/**
 * Customizer sanitize class.
 *
 * @package aasta
 *
 * @access  public
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


/**
 * Customizer Sanitizes Initial setup
 */
class Aasta_Customizer_Sanitize {

	/**
	 * Instance
	 *
	 * @access private
	 * @var object
	 */
	private static $instance;

	/**
	 * Initiator
	 */
	public static function get_instance() {
		if ( ! isset( self::$instance ) ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

	/**
	 * Constructor
	 */
	public function __construct() {
	}

	// Sanitize Alpha Color control.
	public static function sanitize_alpha_color( $val ) {
		if ( '' === $val ) { return ''; }
		if ( is_string( $val ) && 'transparent' === trim( $val ) ) {
			return 'transparent';
		}
		if ( false === strpos( $val, 'rgba' ) ) {
			return sanitize_hex_color( $val );
		}
		$color = str_replace( ' ', '', $val );
		sscanf( $color, 'rgba(%d,%d,%d,%f)', $r, $g, $b, $a );
		return "rgba($r,$g,$b,$a)";
	}


	// Sanitize Dimensions control.
	public static function sanitize_dimensions( $val ) {
		if ( ! is_array( $val ) ) { return array(); }
		foreach ( $val as $key => $item ) {
			$val[ $key ] = sanitize_text_field( $item );
		}
		return $val;
	}

	// Sanitize Radio Buttonset control.
	public static function sanitize_radio( $val, $setting ) {
		$val = sanitize_key( $val );
		$choices = $setting->manager->get_control( $setting->id )->choices;
		return array_key_exists( $val, $choices ) ? $val : $setting->default;
	}
	
	public static function sanitize_sortable( $input, $setting ) {

		// Get list of choices from the control
		// associated with the setting.
		$choices    = $setting->manager->get_control( $setting->id )->choices;
		$input_keys = $input;

		foreach ( $input_keys as $key => $value ) {
			if ( ! array_key_exists( $value, $choices ) ) {
					unset( $input[ $key ] );
			}
		}

		// If the input is a valid key, return it;
		// otherwise, return the default.
		return ( is_array( $input ) ? $input : $setting->default );
	}
	
	/**
	 * Sanitize Slider control.
	 *
	 * @param array  $val     The value to be sanitized.
	 * @param object $setting Control setting.
	 *
	 * @return array
	 */
	public static function sanitize_slider( $val, $setting ) {

		$input_attrs = array();

		if ( isset( $setting->manager->get_control( $setting->id )->input_attrs ) ) {
			$input_attrs = $setting->manager->get_control( $setting->id )->input_attrs;
		}

		$val['slider'] = is_numeric( $val['slider'] ) ? $val['slider'] : '';

		$val['slider'] = isset( $input_attrs['min'] ) && ( ! empty( $val ) ) && ( $input_attrs['min'] > $val['slider'] ) ? $input_attrs['min'] : $val['slider'];
		$val['slider'] = isset( $input_attrs['max'] ) && ( ! empty( $val ) ) && ( $input_attrs['max'] < $val['slider'] ) ? $input_attrs['max'] : $val['slider'];

		$val['suffix'] = esc_attr( $val['suffix'] );

		return $val;

	}

	// Sanitize checkbox.
	public static function sanitize_checkbox( $val ) {
		if ( '0' === $val || 'false' === $val ) {
			return false;
		}
		return (bool) $val;
	}

}

Aasta_Customizer_Sanitize::get_instance();
