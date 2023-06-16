<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       pph.me/iamsanjaykamble
 * @since      1.0.0
 *
 * @package    Custom_Gutenberg_Blocks
 * @subpackage custom-gutenberg-blocks/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Custom_Gutenberg_Blocks
 * @subpackage custom-gutenberg-blocks/includes
 * @author     Sanjay Kamble <sanjaykamble1100@gmail.com>
 */
class Custom_Gutenberg_Blocks_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'custom-gutenberg-blocks',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
