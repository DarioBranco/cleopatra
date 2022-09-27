<?php

/**
 
  * Trigger this file on Plugin uninstall
  * @package kommunicate-wp-live-chat
  * @author Kommunicate.io
 */

if ( !defined ( 'WP_UNINSTALL_PLUGIN' ) ) {
    die;
}

   $option_name = 'kommunicate_app_id';
   delete_option($option_name);

