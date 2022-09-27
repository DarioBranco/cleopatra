<?php

 /**
  * @package kommunicate-wp-live-chat
  * @author Kommunicate.io
 */

namespace Inc\Api\Callbacks;

use \Inc\Base\BaseController;


class AdminCallbacks extends BaseController
{
	
	public function adminDashboard()
	{
		return require_once( "$this->plugin_path/templates/adminPage.php" );
	}

	public function kommunicateOptionsGroup( $input ) 
	{
		/*
		 validate input here
		*/

		return $input;
	}
	
	public function kommunicateAdminSection() 
	{
		echo 'Enter your APP_ID to enable chat-based support in your product';
	}
	
	public function App_IdInput() 
	{
		$value = esc_attr(get_option( 'kommunicate_app_id' ) );
		echo '<div class="App_idInput"> <input type="text" class="regular-text App_Id" name="kommunicate_app_id" value="' . $value . '" placeholder="Enter your APP_ID *"> </div>';
	}	
	
}
