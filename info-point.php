<?php
/**
 * @package   InfoPoint
 *
 * Plugin Name:     Info Point
 * Plugin URI:      http://withoutform.net
 * Description:     Store and display different kinds of info points
 * Version:         1.0.0
 * Author:          Roman Handke
 * Author URI:      http://withoutform.net
 * License:         GPL2
 * License URI:     https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:     info-point
 */

/**
 * Blocking direct access to the plugin
 */
defined( 'ABSPATH' ) or die( 'Nope, not today' );

/**
 * Require_once the Composer Autoloader
 */
if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
  require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

/**
 * Code that runs during plugin activation
 */
function activate_infopoint_plugin()
{
  Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_infopoint_plugin' );

/**
 * Code that runs during plugin deactivation
 */
function deactivate_infopoint_plugin()
{
  Inc\Base\Deactivate::deactivate();
}
register_activation_hook( __FILE__, 'deactivate_infopoint_plugin' );

/**
 * Initialize all the core classes of the plugin
 */
if ( class_exists( 'Inc\\Init' ) ) {
  Inc\Init::register_services();
}

