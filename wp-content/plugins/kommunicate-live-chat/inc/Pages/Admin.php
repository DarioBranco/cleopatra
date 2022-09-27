<?php

 /**
  * @package kommunicate-wp-live-chat
  * @author Kommunicate.io
 */

namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Base\BaseController;
use \Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController
{
	public $settings;

	public $callbacks;

	public $pages = array();

	public function register() 
	{
		$this->settings = new SettingsApi();

		$this->callbacks = new AdminCallbacks();

		$this->setPages();

      $this->setSettings();
		$this->setSections();
		$this->setFields();

		$this->settings->addPages( $this->pages )->register();
	}

	public function setPages() 
	{

		$this->pages = array(
			array(
				'page_title' => 'Kommunicate Plugin', 
				'menu_title' => 'Kommunicate Settings', 
				'capability' => 'manage_options', 
				'menu_slug' => 'kommunicate-live-chat', 
				'callback' => array( $this->callbacks, 'adminDashboard' ), 
				'icon_url' => 'dashicons-admin-generic', 
				'position' => 110
			)
		);
	}

   public function setSettings()
	{
		$args = array(
			array(
				'option_group' => 'kommunicate_plugin_setting',
				'option_name' => 'kommunicate_app_id',
				'callback' => array( $this->callbacks, 'kommunicateOptionsGroup' )
			),
		);

		$this->settings->setSettings( $args );
	}

	public function setSections()
	{
		$args = array(
			array(
				'id' => 'kommunicate_admin_index',
				'title' => 'Delight your customers with intelligent chat-based support',
				'callback' => array( $this->callbacks, 'kommunicateAdminSection' ),
				'page' => 'kommunicate-live-chat'
			)
		);

		$this->settings->setSections( $args );
	}

	public function setFields()
	{
		$args = array(
			array(
				'id' => 'kommunicate_app_id',
				'title' => 'APP_ID',
				'callback' => array( $this->callbacks, 'App_IdInput' ),
				'page' => 'kommunicate-live-chat',
				'section' => 'kommunicate_admin_index',
			),
		);

		$this->settings->setFields( $args );
	}
}
