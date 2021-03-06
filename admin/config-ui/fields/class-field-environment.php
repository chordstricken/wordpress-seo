<?php
/**
 * @package WPSEO\Admin\ConfigurationUI
 */

/**
 * Class WPSEO_Config_Field_Environment
 */
class WPSEO_Config_Field_Environment extends WPSEO_Config_Field_Choice {
	/**
	 * WPSEO_Config_Field_Environment constructor.
	 */
	public function __construct() {
		parent::__construct( 'environment_type' );

		/* translators: %1$s resolves to the home_url of the blog. */
		$this->set_property( 'label', sprintf( __( 'Please specify the environment %1$s is running in.', 'wordpress-seo' ), get_home_url() ) );

		$this->add_choice( 'production', __( 'Production - live site.', 'wordpress-seo' ) );
		$this->add_choice( 'staging', __( 'Staging - copy of live site used for testing purposes only.', 'wordpress-seo' ) );
		$this->add_choice( 'development', __( 'Development - locally running site used for development purposes.', 'wordpress-seo' ) );
	}

	/**
	 * Set adapter
	 *
	 * @param WPSEO_Configuration_Options_Adapter $adapter Adapter to register lookup on.
	 */
	public function set_adapter( WPSEO_Configuration_Options_Adapter $adapter ) {
		$adapter->add_yoast_lookup( $this->get_identifier(), 'wpseo', 'environment_type' );
	}
}
