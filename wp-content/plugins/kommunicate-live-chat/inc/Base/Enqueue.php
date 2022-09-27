<?php

 /**
  * @package kommunicate-wp-live-chat
  * @author Kommunicate.io
 */
 
namespace Inc\Base;

use Inc\Base\BaseController;

class Enqueue extends BaseController
{
	
	public function register() 
	{
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
		add_action ('wp_enqueue_scripts', array( $this, 'enqueue_chatScripts') );
	}
	
	function enqueue()
	 {
		wp_enqueue_style( 'plugin_admin_style', $this->plugin_url . 'assets/kommunicate_admin_style.css' );
		wp_enqueue_script( 'plugin_admin_script', $this->plugin_url . 'assets/kommunicate_admin_script.js' );
	}

	function enqueue_chatScripts() 
	{
		wp_enqueue_script( 'plugin_chat_script', $this->plugin_url . 'assets/kommunicate_chat_script.js', '', '', true );
		
		/*
		get value from wp_option
		*/
		$value = esc_attr(get_option( 'kommunicate_app_id' ) );
		
		$APP_ID_Value = array(
			'input' =>  $value,			
		);
		wp_localize_script( 'plugin_chat_script', 'APP_ID', $APP_ID_Value );
   }
}
