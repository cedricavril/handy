<?php

final class ITSEC_Two_Factor_Logs {
	private $providers;

	public function __construct() {
		add_filter( 'itsec_logs_prepare_two_factor_entry_for_list_display', array( $this, 'filter_entry_for_list_display' ), 10, 3 );
		add_filter( 'itsec_logs_prepare_two_factor_entry_for_details_display', array( $this, 'filter_entry_for_details_display' ), 10, 4 );
	}

	public function filter_entry_for_list_display( $entry, $code, $data ) {
		if ( empty( $entry['user_id'] ) && ! empty( $data[0] ) && get_userdata( $data[0] ) ) {
			$entry['user_id'] = $data[0];
		}

		$entry['module_display'] = esc_html__( 'Two Factor', 'better-wp-security' );
		$entry['description']    = $this->get_description( $entry, $code, $data );

		return $entry;
	}

	public function filter_entry_for_details_display( $details, $entry, $code, $code_data ) {
		$details['module']['content']      = esc_html__( 'Two Factor', 'better-wp-security' );
		$details['description']['content'] = $this->get_description( $entry, $code, $code_data );

		return $details;
	}

	private function get_description( $entry, $code, $data ) {

		switch ( $code ) {
			case 'successful_authentication':
			case 'failed_authentication':

				if ( $user = get_userdata( $entry['user_id'] ) ) {
					$username = $user->user_login;
				} else {
					$username = '<b>' . esc_html__( 'Unknown User', 'better-wp-security' ) . '</b>';
				}

				if ( isset( $data[1] ) ) {
					$provider = $this->get_provider_label( $data[1] );

					if ( 'successful_authentication' === $code ) {
						/* translators: 1: Username, 2: Two Factor provider */
						return sprintf( esc_html__( '%1$s Authenticated Using %2$s', 'better-wp-security' ), $username, $provider );
					}

					/* translators: 1: Username, 2: Two Factor provider */
					return sprintf( esc_html__( '%1$s Failed Authentication Using %2$s', 'better-wp-security' ), $username, $provider );
				}

				if ( 'successful_authentication' === $code ) {
					/* translators: 1: Username */
					return sprintf( esc_html__( '%1$s Authenticated', 'better-wp-security' ), $username );
				}

				/* translators: 1: Username */
				return sprintf( esc_html__( '%1$s Failed Authentication', 'better-wp-security' ), $username );
			case 'sync_override':
				return esc_html__( 'Sync Override', 'better-wp-security' );
			case 'remember_success':
				return esc_html__( 'Successful Remember Device', 'better-wp-security' );
			case 'remember_failed':
				return esc_html__( 'Failed Remember Device', 'better-wp-security' );
			case 'remember_fingerprint_failed':
				return esc_html__( 'Failed Remember Device (Fingerprint)', 'better-wp-security' );
			case 'remember_generated':
				return esc_html__( 'Generated Remember Device Token', 'better-wp-security' );
			default:
				return isset( $entry['description'] ) ? $entry['description'] : '';
		}
	}

	private function get_provider_label( $provider ) {

		if ( null === $this->providers ) {
			$two_factor_helper = ITSEC_Two_Factor_Helper::get_instance();

			$this->providers = $two_factor_helper->get_all_provider_instances();
		}

		return isset( $this->providers[ $provider ] ) ? $this->providers[ $provider ]->get_label() : $provider;
	}
}

new ITSEC_Two_Factor_Logs();
