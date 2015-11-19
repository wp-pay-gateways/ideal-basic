<?php

abstract class Pronamic_WP_Pay_Gateways_IDealBasic_AbstractIntegration extends Pronamic_WP_Pay_Gateways_AbstractIntegration {
	public function __construct() {
		parent::__construct();

		// Actions
		$function = array( 'Pronamic_WP_Pay_Gateways_IDealBasic_Listener', 'listen' );

		if ( ! has_action( 'wp_loaded', $function ) ) {
			add_action( 'wp_loaded', $function );
		}
	}

	public function get_config_factory_class() {
		return 'Pronamic_WP_Pay_Gateways_IDealBasic_ConfigFactory';
	}

	public function get_config_class() {
		return 'Pronamic_WP_Pay_Gateways_IDealBasic_Config';
	}

	public function get_settings_class() {
		return 'Pronamic_WP_Pay_Gateways_IDealBasic_Settings';
	}

	public function get_gateway_class() {
		return 'Pronamic_WP_Pay_Gateways_IDealBasic_Gateway';
	}
}
