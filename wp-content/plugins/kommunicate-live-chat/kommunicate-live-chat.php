<?php

 /**
  * @package kommunicate-wp-live-chat
  * @author Kommunicate.io
 */

/* 
Plugin Name: Kommunicate – WP Live Chat
Plugin URI: https://drive.google.com/drive/folders/1KD95gIomq-Zmuv6tp4dC-ma6NFJdZmkI
Description: Delight your customers with intelligent chat-based support and engage your website visitors through live chat and chat-bots.
Version: 1.0.0
Author: Kommunicate
Author URI: https://www.kommunicate.io/
Licence: GPL v2 or later
Licence URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: kommunicate-live-chat
*/

defined( 'ABSPATH' ) or die( 'Sorry, you are not allowed to access this page.!' );

if ( file_exists( dirname( __FILE__ ) . '/vendor/autoload.php' ) ) {
	require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}


function activate_kommunicate_plugin() {
	Inc\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_kommunicate_plugin' );


function deactivate_kommunicate_plugin() {
	Inc\Base\Deactivate::deactivate();
}
register_deactivation_hook( __FILE__, 'deactivate_kommunicate_plugin' );


if ( class_exists( 'Inc\\Init' ) ) {
	Inc\Init::registerServices();
}





