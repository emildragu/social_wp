<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              none
 * @since             1.0.0
 * @package           Social
 *
 * @wordpress-plugin
 * Plugin Name:       FormInfoDisplay
 * Plugin URI:        none
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Emil Dragu
 * Author URI:        none
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       social
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'SOCIAL_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-social-activator.php
 */
function activate_social() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-social-activator.php';
	Social_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-social-deactivator.php
 */
function deactivate_social() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-social-deactivator.php';
	Social_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_social' );
register_deactivation_hook( __FILE__, 'deactivate_social' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-social.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_social() {
    add_menu_page(
          'Page Title',
          'Voluntari Donare Sange',
          'edit_posts',
          'social/index.php',
          '',
          'dashicons-groups'

         );
    }

	add_action('admin_menu', 'custom_menu');
	$plugin = new Social();
	$plugin->run();

}
run_social();
