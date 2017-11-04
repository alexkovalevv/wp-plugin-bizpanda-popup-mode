<?php
	/**
	 * Общие хуки и вызовы для фронтенда
	 * @author Alex Kovalev <alex.kovalevv@gmail.com>
	 * @copyright Alex Kovalev 30.04.2017
	 * @version 1.0
	 */

	/**
	 * Регистрируем новую тему Input popup
	 */
	function onp_bzda_popups_adn_register_social_locker_themes()
	{
		OPanda_ThemeManager::registerTheme(array(
			'name' => 'facebook',
			'title' => 'Facebook [addon]',
			'path' => BZDA_POPUPS_ADN_PLUGIN_DIR . '/plugin/themes/facebook',
			'items' => array('step-to-step', 'signin-locker', 'email-locker', 'social-locker', 'custom-locker')
		));
		OPanda_ThemeManager::registerTheme(array(
			'name' => 'glasscase',
			'title' => 'Glasscase [addon]',
			'path' => BZDA_POPUPS_ADN_PLUGIN_DIR . '/plugin/themes/glasscase',
			'items' => array('step-to-step', 'signin-locker', 'email-locker', 'social-locker', 'custom-locker')
		));
		OPanda_ThemeManager::registerTheme(array(
			'name' => 'darkness',
			'title' => 'Darkness [addon]',
			'path' => BZDA_POPUPS_ADN_PLUGIN_DIR . '/plugin/themes/darkness',
			'items' => array('step-to-step', 'signin-locker', 'email-locker', 'social-locker', 'custom-locker')
		));
		OPanda_ThemeManager::registerTheme(array(
			'name' => 'download',
			'title' => 'Download [addon]',
			'path' => BZDA_POPUPS_ADN_PLUGIN_DIR . '/plugin/themes/download',
			'items' => array('step-to-step', 'signin-locker', 'email-locker', 'social-locker', 'custom-locker')
		));
		OPanda_ThemeManager::registerTheme(array(
			'name' => 'dark-force',
			'title' => 'Dark Force',
			'path' => BZDA_POPUPS_ADN_PLUGIN_DIR . '/plugin/themes/darkforce',
			'items' => array('step-to-step', 'signin-locker', 'email-locker')
		));
		OPanda_ThemeManager::registerTheme(array(
			'name' => 'friendly-giant',
			'title' => 'Friendly Giant',
			'path' => BZDA_POPUPS_ADN_PLUGIN_DIR . '/plugin/themes/friendly-giant',
			'items' => array('step-to-step', 'signin-locker', 'email-locker')
		));
		/*OPanda_ThemeManager::registerTheme(array(
			'name' => 'flat',
			'title' => 'Input Popup [Premium]',
			'preview' => 'https://cconp.s3.amazonaws.com/bizpanda/social-locker/preview/input-popup.jpg',
			'hint' => sprintf(__('This theme is available only in the <a href="%s" target="_blank">premium version</a> of the plugin', 'plugin-sociallocker'), opanda_get_premium_url(null, 'themes')),
			'items' => array('social-locker')
		));*/
	}

	add_action('bizpanda_register_themes', 'onp_bzda_popups_adn_register_social_locker_themes');

	/**
	 * Подключаем скрипты для фронтенда
	 */
	function onp_bzda_popups_adn_connect_locker_assets()
	{
		global $bizpanda_popups_addon;

		if( !$bizpanda_popups_addon->isPluginLoaded() ) {
			return;
		}

		wp_enqueue_style('onp-bizpanda-popup-mode', BZDA_POPUPS_ADN_PLUGIN_URL . '/plugin/assets/css/popup-mode.min.css');
		wp_enqueue_script('onp-bizpanda-popup-mode', BZDA_POPUPS_ADN_PLUGIN_URL . '/plugin/assets/js/popup-mode.min.js', array(
			'opanda-lockers'
		), false, true);

		// Определение adblock
		wp_enqueue_script('onp-bizpanda-detect-adblock', BZDA_POPUPS_ADN_PLUGIN_URL . '/plugin/assets/js/ads.js', array(
			'onp-bizpanda-popup-mode'
		), false, true);
	}

	add_action('bizpanda_connect_locker_assets', 'onp_bzda_popups_adn_connect_locker_assets');

	/**
	 * Печатаем дополнительные настройки на фронтенд
	 */
	function onp_bzda_popups_adn_frontend_item_options($options, $lockerId)
	{
		$options['lock_mode'] = opanda_get_item_option($lockerId, 'lock_mode');
		$options['open_locker_trigger'] = opanda_get_item_option($lockerId, 'open_locker_trigger');
		$options['open_locker_way'] = opanda_get_item_option($lockerId, 'open_locker_way');
		$options['open_locker_selector'] = opanda_get_item_option($lockerId, 'open_locker_selector');

		if( isset($options['theme']) ) {
			if( is_string($options['theme']) ) {
				$themeName = $options['theme'];

				$options['theme'] = array();
				$options['theme']['name'] = $themeName;
			}
		} else {
			$options['theme'] = array();
		}

		if( is_array($options['theme']) ) {
			$options['theme']['animation']['type'] = opanda_get_item_option($lockerId, 'style_animation');
			$options['theme']['overlay']['style'] = opanda_get_item_option($lockerId, 'overlay_style__dropdown');
			$options['theme']['overlay']['color'] = opanda_get_item_option($lockerId, 'overlay_style__colors');
		}

		return $options;
	}

	add_filter('bizpanda_item_options', 'onp_bzda_popups_adn_frontend_item_options', 10, 2);

	function onp_bzda_popups_adn_register_shortcodes($atts, $content = "")
	{
		$atts = shortcode_atts(array(
			'locker_id' => ''
		), $atts, 'bizpanda_open_locker');

		return '<div class="onp-open-locker-selector" style="cursor:pointer;" data-locker-id="' . sanitize_text_field($atts['locker_id']) . '">' . $content . '</div>';
	}

	add_shortcode('bizpanda_open_locker', 'onp_bzda_popups_adn_register_shortcodes');

