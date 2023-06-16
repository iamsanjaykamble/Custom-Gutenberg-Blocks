<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              pph.me/iamsanjaykamble
 * @since             1.0.0
 * @package           Custom_Gutenberg_Blocks
 *
 * @wordpress-plugin
 * Plugin Name:       Custom Gutenberg Blocks
 * Plugin URI:        pph.me/iamsanjaykamble
 * Description:       This plugin is developed to create custom gutenberg blocks.
 * Version:           1.0.0
 * Author:            Sanjay Kamble
 * Author URI:        pph.me/iamsanjaykamble
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       custom-gutenberg-blocks
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
* Define CGB_PLUGIN_FILE
*/
if( ! defined( 'CGB_PLUGIN_FILE' ) ){
	define( 'CGB_PLUGIN_FILE', __FILE__ );
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CUSTOM_GUTENBERG_BLOCKS_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-custom-gutenberg-blocks-activator.php
 */
function activate_custom_gutenberg_blocks() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-custom-gutenberg-blocks-activator.php';
	Custom_Gutenberg_Blocks_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-custom-gutenberg-blocks-deactivator.php
 */
function deactivate_custom_gutenberg_blocks() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-custom-gutenberg-blocks-deactivator.php';
	Custom_Gutenberg_Blocks_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_custom_gutenberg_blocks' );
register_deactivation_hook( __FILE__, 'deactivate_custom_gutenberg_blocks' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-custom-gutenberg-blocks.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_custom_gutenberg_blocks() {

	$plugin = new Custom_Gutenberg_Blocks();
	$plugin->run();

}
run_custom_gutenberg_blocks();
