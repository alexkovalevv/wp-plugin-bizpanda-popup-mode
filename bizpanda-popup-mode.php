<?php
	/**
	 * Plugin Name:[Bizpanda Addon] Popup mode
	 * Plugin URI: http://byoneress.com
	 * Description: Adds the ability to create locks in a pop-up window. Has a set of functions and various scenarios for calling pop-up windows.
	 * Author: Webcraftic <wordpress.webraftic@gmail.com>
	 * Version: 1.0.0
	 * Author URI: https://profiles.wordpress.org/webcraftic
	 */

	define('BZDA_POPUPS_ADN_INIT', true);

	define('BZDA_POPUPS_ADN_PLUGIN_URL', plugins_url(null, __FILE__));
	define('BZDA_POPUPS_ADN_PLUGIN_DIR', dirname(__FILE__));

	// build: free, premium, ultimate
	if( !defined('BUILD_TYPE') ) {
		define('BUILD_TYPE', 'premium');
	}

	// license: free, paid
	if( !defined('LICENSE_TYPE') ) {
		define('LICENSE_TYPE', 'paid');
	}

	function onp_bzda_popups_adn_init()
	{
		if( defined('OPTINPANDA_PLUGIN_ACTIVE') || defined('SOCIALLOCKER_PLUGIN_ACTIVE') ) {

			global $bizpanda, $bizpanda_popups_addon;

			load_textdomain('bizpanda-popups-addon', BZDA_POPUPS_ADN_PLUGIN_DIR . '/langs/' . get_locale() . '.mo');

			require_once BZDA_POPUPS_ADN_PLUGIN_DIR . '/admin/classes/plugin.class.php';

			$bizpanda_popups_addon = new BZDA_POPUPS_ADN_Factory000_Plugin(__FILE__, array(
				'name' => 'bizpanda-popups-addon',
				'title' => '[Bizpanda Addon] Popup mode',
				'plugin_type' => 'addon',
				'version' => '1.0.0',
				'assembly' => BUILD_TYPE,
				'lang' => get_locale(),
				'api' => 'http://api.byonepress.com/1.1/',
				'account' => 'http://accounts.byonepress.com/',
				'updates' => BZDA_POPUPS_ADN_PLUGIN_DIR . '/plugin/updates/'
			));

			// requires factory modules extend global bizpanda
			$bizpanda_popups_addon->load(array(
				array('libs/factory/bootstrap', 'factory_bootstrap_000', 'admin'),
				array('libs/onepress/api', 'onp_api_000'),
				array('libs/onepress/licensing', 'onp_licensing_000'),
				array('libs/onepress/updates', 'onp_updates_000')
			));

			BizPanda::registerPlugin($bizpanda_popups_addon, 'bizpanda-popups-addon', BUILD_TYPE);

			if( is_admin() ) {
				require_once BZDA_POPUPS_ADN_PLUGIN_DIR . '/admin/boot.php';
			}

			require_once BZDA_POPUPS_ADN_PLUGIN_DIR . '/plugin/boot.php';
		}
	}

	add_action('bizpanda_init', 'onp_bzda_popups_adn_init', 20);

	/**
	 * Activates the plugin.
	 *
	 * TThe activation hook has to be registered before loading the plugin.
	 * The deactivateion hook can be registered in any place (currently in the file plugin.class.php).
	 */
	function onp_bzda_popups_adn_activation()
	{
		if( defined('OPTINPANDA_PLUGIN_ACTIVE') || defined('SOCIALLOCKER_PLUGIN_ACTIVE') ) {
			onp_bzda_popups_adn_init();

			global $bizpanda_popups_addon;
			$bizpanda_popups_addon->activate();
		}
	}

	register_activation_hook(__FILE__, 'onp_bzda_popups_adn_activation');


