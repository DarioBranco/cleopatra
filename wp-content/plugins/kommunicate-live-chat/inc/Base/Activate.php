<?php

 /**
  * @package kommunicate-wp-live-chat
  * @author Kommunicate.io
 */

namespace Inc\Base;

class Activate
 {

   public static function activate()
   {
      
      flush_rewrite_rules();
   }
}
