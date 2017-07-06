<?php
	/**
	 * Plugin Name:[Bizpanda Addon] Popup mode
	 * Plugin URI: http://byoneress.com
	 * Description: Adds the ability to create locks in a pop-up window. Has a set of functions and various scenarios for calling pop-up windows.
	 * Author: Webcraftic <alex.kovalevv@gmail.com>
	 * Version: 1.0.3
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
			}

			require_once BZDA_ADN_PLUGIN_DIR . '/plugin/boot.php';

			// Подключаем styleroller addon
			if( !defined('ONP_OP_STYLER_PLUGIN_ACTIVE') && file_exists(BZDA_ADN_PLUGIN_DIR . '/addons/styleroller/styleroller-addon.php') ) {
				$bizpanda->loadAddons(array(
					'styleroller' => BZDA_ADN_PLUGIN_DIR . '/addons/styleroller/styleroller-addon.php'
				));
			}
		}
	}

	add_action('bizpanda_init', 'onp_bzda_adn_init', 20);


