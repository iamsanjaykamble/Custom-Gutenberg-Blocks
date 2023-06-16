<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       pph.me/iamsanjaykamble
 * @since      1.0.0
 *
 * @package    Custom_Gutenberg_Blocks
 * @subpackage custom-gutenberg-blocks/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Custom_Gutenberg_Blocks
 * @subpackage custom-gutenberg-blocks/admin
 * @author     Sanjay Kamble <sanjaykamble1100@gmail.com>
 */
class Custom_Gutenberg_Blocks_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	function register_custom_gutenberg_block() {
		register_block_type( CGB_BLOCKS . '/cgb-header' );
		register_block_type( CGB_BLOCKS . '/cgb-feeds' );
	}
}