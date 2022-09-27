<?php
/* 
 * Plugin Name: Vestige Core
 * Plugin URI:  https://www.imithemes.com
 * Description: Vestige core plugin includes all features of Vestige theme in a plugin for a better user experience.
 * Author:      imithemes
 * Version:     2.0
 * Text Domain: vestige-core
 * Domain Path: /language
 * Author URI:  https://www.imithemes.com
 * Licence:     GPLv2
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 * Copyright:   (c) 2021 imithemes. All rights reserved
 */

// Do not allow direct access to this file.
defined('ABSPATH') or die('No script kiddies please!');
$path = plugin_dir_path(__FILE__);
define('VESTIGE_CORE__PLUGIN_PATH', plugin_dir_path(__FILE__));
define('VESTIGE_CORE__PLUGIN_URL', plugin_dir_url(__FILE__));
/* CUSTOM POST TYPES
================================================== */
require_once $path . '/imic-post-type-permalinks.php';
require_once VESTIGE_CORE__PLUGIN_PATH . 'includes.php';
/* SET LANGUAGE FILE FOLDER
=================================================== */
add_action('after_setup_theme', 'imic_plugin_setup');
function imic_plugin_setup()
{
    load_theme_textdomain('vestige-core', plugin_dir_path(__FILE__) . '/language');
}
