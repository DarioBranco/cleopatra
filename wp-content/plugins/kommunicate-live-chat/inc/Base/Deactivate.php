<?php

/**
  * @package kommunicate-wp-live-chat
  * @author Kommunicate.io
 */

namespace Inc\Base;


class Deactivate
 {

   public static function deactivate()
   {
   
      flush_rewrite_rules();
   }
}