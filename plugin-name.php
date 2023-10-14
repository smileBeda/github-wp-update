<?php
/**
 * Minimal Example Plugin
 *
 * @link    https://site.tld
 * @since   1.0.0 Introduced on 2023-10-14 15:30
 * @package Plugins
 * @author  Your Name <your-name@site.tld>
 */

/**
 * The WordPress/Classicpress Plugin Header
 *
 * @see               https://developer.wordpress.org/plugins/plugin-basics/header-requirements/
 *
 * Plugin Name:       My Plugin Name
 * Plugin URI:        https://site.tld/plugin-name-uri/
 * Update URI:        https://de-facto-does-not-matter.tld/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.1
 * Author:            Ideally, your WordPress forum username.
 * Requires at least: 5.5
 * Requires PHP:      7.4
 * Tested up to:      6.3
 * Author URI:        https://site.tld/author-name-uri/
 * License:           GPL-3.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.txt
 * Text Domain:       plugin-name
 * Domain Path:       /resources/languages
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Require the GitHub_Updater class.
 *
 * Each of your plugins will require GitHub_Updater to be loaded under a different namespace.
 * Ideally use an autoloader, but for the sake of functionality we are using require_once here.
 */
require_once plugin_dir_path( __FILE__ ) . 'update.php';
use MyPlugin\GitHub_Updater;
( new GitHub_Updater( plugin_basename( __FILE__ ), '1.0.1', 'https://api.github.com/repos/smileBeda/github-wp-update' ) )->init();
