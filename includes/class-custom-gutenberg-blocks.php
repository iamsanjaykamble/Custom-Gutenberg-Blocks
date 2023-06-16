<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link       pph.me/iamsanjaykamble
 * @since      1.0.0
 *
 * @package    Custom_Gutenberg_Blocks
 * @subpackage custom-gutenberg-blocks/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Custom_Gutenberg_Blocks
 * @subpackage custom-gutenberg-blocks/includes
 * @author     Sanjay Kamble <sanjaykamble1100@gmail.com>
 */
class Custom_Gutenberg_Blocks {

	/**
	 * The loader that's responsible for maintaining and registering all hooks that power
	 * the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      Custom_Gutenberg_Blocks_Loader    $loader    Maintains and registers all hooks for the plugin.
	 */
	protected $loader;

	/**
	 * The unique identifier of this plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * Define the core functionality of the plugin.
	 *
	 * Set the plugin name and the plugin version that can be used throughout the plugin.
	 * Load the dependencies, define the locale, and set the hooks for the admin area and
	 * the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function __construct() {
		if ( defined( 'CUSTOM_GUTENBERG_BLOCKS_VERSION' ) ) {
			$this->version = CUSTOM_GUTENBERG_BLOCKS_VERSION;
		} else {
			$this->version = '1.0.0';
		}
		$this->plugin_name = 'custom-gutenberg-blocks';


		$this->define_constants();
		$this->load_dependencies();
		$this->set_locale();
		$this->define_admin_hooks();
		$this->define_public_hooks();

	}

	/**
	 * Load the required dependencies for this plugin.
	 *
	 * Include the following files that make up the plugin:
	 *
	 * - Custom_Gutenberg_Blocks_Loader. Orchestrates the hooks of the plugin.
	 * - Custom_Gutenberg_Blocks_i18n. Defines internationalization functionality.
	 * - Custom_Gutenberg_Blocks_Admin. Defines all hooks for the admin area.
	 * - Custom_Gutenberg_Blocks_Public. Defines all hooks for the public side of the site.
	 *
	 * Create an instance of the loader which will be used to register the hooks
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function load_dependencies() {

		/**
		 * The class responsible for orchestrating the actions and filters of the
		 * core plugin.
		 */
		require_once CGB_INC . 'class-custom-gutenberg-blocks-loader.php';

		/**
		 * The class responsible for defining internationalization functionality
		 * of the plugin.
		 */
		require_once CGB_INC . 'class-custom-gutenberg-blocks-i18n.php';

		/**
		 * The class responsible for defining all actions that occur in the admin area.
		 */
		require_once CGB_ADMIN . '/class-custom-gutenberg-blocks-admin.php';

		/**
		 * The class responsible for defining all actions that occur in the public-facing
		 * side of the site.
		 */
		require_once CGB_PUBLIC . 'class-custom-gutenberg-blocks-public.php';

		$this->loader = new Custom_Gutenberg_Blocks_Loader();

	}

	/**
	 * Define the locale for this plugin for internationalization.
	 *
	 * Uses the Custom_Gutenberg_Blocks_i18n class in order to set the domain and to register the hook
	 * with WordPress.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function set_locale() {

		$plugin_i18n = new Custom_Gutenberg_Blocks_i18n();

		$this->loader->add_action( 'plugins_loaded', $plugin_i18n, 'load_plugin_textdomain' );

	}

	/**
	 * Register all of the hooks related to the admin area functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_admin_hooks() {

		$plugin_admin = new Custom_Gutenberg_Blocks_Admin( $this->get_plugin_name(), $this->get_version() );
		$this->loader->add_action( 'init', $plugin_admin, 'register_custom_gutenberg_block' );
	}

	/**
	 * Register all of the hooks related to the public-facing functionality
	 * of the plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	private function define_public_hooks() {

		$plugin_public = new Custom_Gutenberg_Blocks_Public( $this->get_plugin_name(), $this->get_version() );
	}

	/**
	 * Run the loader to execute all of the hooks with WordPress.
	 *
	 * @since    1.0.0
	 */
	public function run() {
		$this->loader->run();
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * The reference to the class that orchestrates the hooks with the plugin.
	 *
	 * @since     1.0.0
	 * @return    Custom_Gutenberg_Blocks_Loader    Orchestrates the hooks of the plugin.
	 */
	public function get_loader() {
		return $this->loader;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

	/**
	* Define constant if not already set.
	* @since 1.0.0
	* @param string $name constant name
	* @param mixed $value constant value
	*/
	private function define( $name, $value ){
		if( ! defined( $name ) ){
			define( $name, $value );
		}
	}

	/**
	* Define Constants.
	*/
	private function define_constants(){
		$this->define( 'CGB_ABSPATH', dirname( CGB_PLUGIN_FILE ) );
		$this->define( 'CGB_INC', CGB_ABSPATH . '/includes/' );
		$this->define( 'CGB_ADMIN', CGB_ABSPATH . '/admin/' );
		$this->define( 'CGB_PUBLIC', CGB_ABSPATH . '/public/' );
		$this->define( 'CGB_BLOCKS', CGB_ABSPATH . '/blocks/' );
		$this->define( 'CGB_PLUGIN_BASENAME', plugin_basename( CGB_PLUGIN_FILE ) );
		$this->define( 'CGB_VERSION', $this->get_version() );
		$this->define( 'CGB_PLUGIN_NAME', $this->get_plugin_name() );
		$this->define( 'CGB_DOMAIN', 'custom-gutenberg-blocks' );
		$this->define( 'CGB_ERROR_LOG_FILE', CGB_ABSPATH . '/error.log' );
	}
}
