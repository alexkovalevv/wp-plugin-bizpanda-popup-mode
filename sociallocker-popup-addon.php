<?php
	/**
	 * Plugin Name:[Sociallocker Addon] Pop Up locker Mode
	 * Plugin URI: http://byoneress.com
	 * Description: The plugin extends conventional capabilities of plugin Optin panda.
	 * Author: Alex Kovalev <alex.kovalevv@gmail.com>
	 * Version: 1.0.1
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

			/**
			 * Регистрируем новую тему Input popup
			 */
			function onp_bzda_adn_register_social_locker_themes()
			{
				OPanda_ThemeManager::registerTheme(array(
					'name' => 'facebook',
					'title' => 'Facebook [popup addon]',
					//'path' => OPANDA_BIZPANDA_DIR . '/themes/input-popup',
					'items' => array('signin-locker', 'email-locker', 'social-locker', 'custom-locker')
				));
				OPanda_ThemeManager::registerTheme(array(
					'name' => 'glasscase',
					'title' => 'Glasscase [popup addon]',
					//'path' => OPANDA_BIZPANDA_DIR . '/themes/input-popup',
					'items' => array('signin-locker', 'email-locker', 'social-locker', 'custom-locker')
				));
				OPanda_ThemeManager::registerTheme(array(
					'name' => 'darkness',
					'title' => 'Darkness [popup addon]',
					//'path' => OPANDA_BIZPANDA_DIR . '/themes/input-popup',
					'items' => array('signin-locker', 'email-locker', 'social-locker', 'custom-locker')
				));
				OPanda_ThemeManager::registerTheme(array(
					'name' => 'download',
					'title' => 'Download [popup addon]',
					//'path' => OPANDA_BIZPANDA_DIR . '/themes/input-popup',
					'items' => array('signin-locker', 'email-locker', 'social-locker', 'custom-locker')
				));
				/*OPanda_ThemeManager::registerTheme(array(
					'name' => 'flat',
					'title' => 'Input Popup [Premium]',
					'preview' => 'https://cconp.s3.amazonaws.com/bizpanda/social-locker/preview/input-popup.jpg',
					'hint' => sprintf(__('This theme is available only in the <a href="%s" target="_blank">premium version</a> of the plugin', 'plugin-sociallocker'), opanda_get_premium_url(null, 'themes')),
					'items' => array('social-locker')
				));*/
			}

			add_action('bizpanda_register_themes', 'onp_bzda_adn_register_social_locker_themes');

			/**
			 * Подключаем скрипты для фронтенда
			 */
			function onp_bzda_adn_connect_locker_assets()
			{
				wp_enqueue_style('onp-bizpanda-popup-mode', BZDA_ADN_PLUGIN_URL . '/assets/css/popup-mode.min.css');
				wp_enqueue_script('onp-bizpanda-popup-mode', BZDA_ADN_PLUGIN_URL . '/assets/js/popup-mode.min.js', array(
					'opanda-lockers'
				), false, true);

				// Определение adblock
				wp_enqueue_script('onp-bizpanda-detect-adblock', BZDA_ADN_PLUGIN_URL . '/assets/js/ads.js', array(
					'onp-bizpanda-popup-mode'
				), false, true);
			}

			add_action('bizpanda_connect_locker_assets', 'onp_bzda_adn_connect_locker_assets');

			/**
			 * Печатаем дополнительные настройки на фронтенд
			 */
			function onp_bzda_adn_frontend_item_options($options, $lockerId)
			{
				$options['lock_mode'] = opanda_get_item_option($lockerId, 'lock_mode');
				$options['open_locker_trigger'] = opanda_get_item_option($lockerId, 'open_locker_trigger');
				$options['open_locker_way'] = opanda_get_item_option($lockerId, 'open_locker_way');
				$options['open_locker_selector'] = opanda_get_item_option($lockerId, 'open_locker_selector');

				return $options;
			}

			add_filter('bizpanda_item_options', 'onp_bzda_adn_frontend_item_options', 10, 2);

			function onp_bzda_adn_register_shortcodes($atts, $content = "")
			{
				$atts = shortcode_atts(array(
					'locker_id' => ''
				), $atts, 'bizpanda_open_locker');

				return '<div class="onp-open-locker-selector" style="cursor:pointer;" data-locker-id="' . sanitize_text_field($atts['locker_id']) . '">' . $content . '</div>';
			}

			add_shortcode('bizpanda_open_locker', 'onp_bzda_adn_register_shortcodes');
		}
	}

	add_action('init', 'onp_bzda_adn_init');

