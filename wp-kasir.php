<?php
/**
 * @wordpress-plugin
 * Plugin Name:       WP Kasir
 * Plugin URI:        https://github.com/adityathok/wp-kasir
 * Description:       Plugin Kasir / Point Of Sales berbasis WordPress
 * Version:           0.0.1
 * Author:            Aditya Thok
 * Author URI:        https://github.com/adityathok/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp-kasir
 * Domain Path:       /languages
 * 
 * 
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
	die;
}

/**
 * Define constants
 */
if (!defined('WPKASIR_VERSION'))	define('WPKASIR_VERSION', '0.0.1'); // Plugin version constant
if (!defined('WPKASIR_PLUGIN'))		define('WPKASIR_PLUGIN', trim(dirname(plugin_basename(__FILE__)), '/')); // Name of the plugin folder eg - 'wp-kasir'
if (!defined('WPKASIR_PLUGIN_DIR'))	define('WPKASIR_PLUGIN_DIR', plugin_dir_path(__FILE__)); // Plugin directory absolute path with the trailing slash. Useful for using with includes eg - /var/www/html/wp-content/plugins/wp-kasir/
if (!defined('WPKASIR_PLUGIN_URL'))	define('WPKASIR_PLUGIN_URL', plugin_dir_url(__FILE__)); // URL to the plugin folder with the trailing slash. Useful for referencing src eg - http://localhost/wp/wp-content/plugins/wp-kasir/

// Load everything
$includes = [
	'admin/AdminPage.php',
	'produk/Produk.php',
];

foreach ($includes as $include) {
	require_once(WPKASIR_PLUGIN_DIR . $include);
}