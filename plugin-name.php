<?php
/**
 * The main plugin file
 *
 * @link    https://site.tld
 * @since   1.0.0 Introduced on 2023-08-01 15:30
 * @package Plugins\PluginName
 * @author  Your Name <your-name@site.tld>
 */

/**
 * The WordPress/Classicpress Plugin Header
 *
 * @see               https://developer.wordpress.org/plugins/plugin-basics/header-requirements/
 *
 * Plugin Name:       My Plugin Name
 * Plugin URI:        https://site.tld/plugin-name-uri/
 * Update URI:        https://github.com/smileBeda/github-wp-update
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
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

require_once( plugin_dir_path( __FILE__ ) . 'update.php' );

$github_updater = new GitHub_Updater( plugin_dir_path( __FILE__ ) . 'plugin-name.php', '1.0.1', 'https://api.github.com/repos/smileBeda/github-wp-update');
