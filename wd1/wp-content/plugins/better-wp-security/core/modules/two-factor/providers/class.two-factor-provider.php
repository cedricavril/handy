<?php

require_once( dirname( dirname( __FILE__ ) ) . '/includes/interface-itsec-two-factor-provider-on-boardable.php' );
require_once( dirname( dirname( __FILE__ ) ) . '/includes/interface-itsec-two-factor-provider-cli-configurable.php' );

/**
 * Abstract class for creating two-factor authentication providers.
 *
 * @since 0.1-dev
 *
 * @package Two_Factor
 */
abstract class Two_Factor_Provider {

	public $recommended = false;

	/**
	 * Class constructor.
	 *
	 * @since 0.1-dev
	 */
	protected function __construct() {

	}

	/**
	 * Returns the name of the provider.
	 *
	 * @since 0.1-dev
	 *
	 * @return string
	 */
	abstract function get_label();

	/**
	 * Prints the name of the provider.
	 *
	 * @since 0.1-dev
	 */
	public function print_label() {
		echo esc_html( $this->get_label() );
	}

	/**
	 * Prints the form that prompts the user to authenticate.
	 *
	 * @since 0.1-dev
	 *
	 * @param WP_User $user WP_User object of the logged-in user.
	 */
	abstract function authentication_page( $user );

	/**
	 * Validates the users input token.
	 *
	 * @since 0.1-dev
	 *
	 * @param WP_User $user WP_User object of the logged-in user.
	 * @return boolean
	 */
	abstract function validate_authentication( $user );

	/**
	 * Whether this Two-Factor provider is configured and available for the user specified.
	 *
	 * @param WP_User $user WP_User object of the logged-in user.
	 * @return boolean
	 */
	abstract function is_available_for_user( $user );

	/**
	 * Run code before rendering the authentication page and HTML is outputted.
	 *
	 * @param WP_User $user
	 */
	public function pre_render_authentication_page( $user ) {}

	/**
	 * Can this two-factor provider resend its code.
	 *
	 * @return bool
	 */
	public function can_resend_code() {
		return false;
	}

	/**
	 * Generate a random eight-digit string to send out as an auth code.
	 *
	 * @since 0.1-dev
	 *
	 * @param int          $length The code length.
	 * @param string|array $chars Valid auth code characters.
	 * @return string
	 */
	public function get_code( $length = 8, $chars = '1234567890' ) {

		$code = '';

		for ( $i = 0; $i < $length; $i++ ) {
			$code .= substr( $chars, wp_rand( 0, strlen( $chars ) - 1 ), 1 );
		}

		return $code;
	}

}
