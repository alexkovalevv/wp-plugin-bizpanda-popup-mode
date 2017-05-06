<?php
	/**
	 * Plugin Name:[Bizpanda Addon] Social and Optin Locker evolution pack
	 * Plugin URI: http://byoneress.com
	 * Description: The plugin extends conventional capabilities of plugin Optin panda.
	 * Author: Alex Kovalev <alex.kovalevv@gmail.com>
	 * Version: 1.0.2
	 * Author URI: http://byoneress.com
	 */

	define('BZDA_ADN_PLUGIN_URL', plugins_url(null, __FILE__));
	define('BZDA_ADN_PLUGIN_DIR', dirname(__FILE__));

	function onp_bzda_adn_init()
	{
		if( defined('OPTINPANDA_PLUGIN_ACTIVE') || defined('SOCIALLOCKER_PLUGIN_ACTIVE') ) {
			global $bizpanda;

			if( is_admin() ) {
				if( defined('WPLANG') && WPLANG != 'en_US' ) {
					load_textdomain('plugin-addon-popup-locker', BZDA_ADN_PLUGIN_DIR . '/langs/' . WPLANG . '.mo');
				}
				require_once BZDA_ADN_PLUGIN_DIR . '/admin/boot.php';
				require_once BZDA_ADN_PLUGIN_DIR . '/panda-items/step-to-step/admin/boot.php';
			}

			require_once BZDA_ADN_PLUGIN_DIR . '/panda-items/step-to-step/boot.php';
			require_once BZDA_ADN_PLUGIN_DIR . '/plugin/boot.php';
		}
	}

	add_action('init', 'onp_bzda_adn_init');

