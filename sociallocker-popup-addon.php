<?php
	/**
	 * Plugin Name: Addon Pop Up locker Mode
	 * Plugin URI: https://sociallocker.org
	 * Description: The plugin extends conventional capabilities of plugin Optin panda.
	 * Author: Alex Kovalev <alex.kovalevv@gmail.com>
	 * Version: 1.0.0
	 * Author URI: http://byoneress.com/
	 */

	define('OPANDA_SLA_PLUGIN_URL', plugins_url(null, __FILE__));
	define('OPANDA_SLA_PLUGIN_DIR', dirname(__FILE__));

	function onp_sl_addon_init()
	{

		if( defined('OPTINPANDA_PLUGIN_ACTIVE') || defined('SOCIALLOCKER_PLUGIN_ACTIVE') ) {
			require_once OPANDA_SLA_PLUGIN_DIR . '/admin/metaboxes/bulk-locking.php';
		}
	}

	add_action('init', 'onp_sl_addon_init');

