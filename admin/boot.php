<?php
	/**
	 * Общие функции и вызовы для админ панели
	 * @author Alex Kovalev <alex.kovalevv@gmail.com>
	 * @copyright Alex Kovalev 23.04.2017
	 * @version 1.0
	 */

	require_once BZDA_ADN_PLUGIN_DIR . '/admin/metaboxes/bulk-locking.php';

	/**
	 * Покдлючаем скрипты на страницу редактирования замков
	 * @param object $scripts
	 * @param object $styles
	 */
	function onp_bzda_adn_items_edit_assets($scripts, $styles)
	{
		$styles->add(BZDA_ADN_PLUGIN_URL . '/admin/assets/css/addon.item-edit.010001.css');

		// Ddslick dropdown
		$scripts->request(array(
			'control.dropdown',
			'plugin.ddslick',
		), 'bootstrap');
	}

	add_action('bizpanda_panda-item_edit_assets', 'onp_bzda_adn_items_edit_assets', 10, 2);

	/**
	 * Добавляем иконку для шорткода событий
	 *
	 * @see before_wp_tiny_mce
	 * @since 1.1.0
	 */
	function onp_bzda_adn_tinymce_data()
	{
		?>
		<style>
			i.onp-bzda-adn-events-shortcode-icon {
				background: url("<?php echo BZDA_ADN_PLUGIN_URL . '/admin/assets/img/bizpanda-evolution-events-shortcode-icon.png' ?>");
			}
		</style>
		<script>
			var bizpanda_evolution_shortcode_title = '<?php echo __('Выделите ссылку, кнопку или картинку, чтобы присвоить им действие, которое вызовет замок.', 'plugin-addon-popup-locker') ?>';
			var bizpanda_evolution_not_found_text = '<?php echo __('-- Еще нет замков с выбранным режимом --', 'plugin-addon-popup-locker'); ?>';
		</script>
	<?php
	}

	add_action('before_wp_tiny_mce', 'onp_bzda_adn_tinymce_data');

	/**
	 * Регистрируем кнопки для текстового редактора
	 */
	function onp_bzda_adn_mce_buttons($buttons)
	{
		if( !current_user_can('edit_' . OPANDA_POST_TYPE) ) {
			return $buttons;
		}
		array_push($buttons, "bizpanda_evolution_addon");

		return $buttons;
	}

	add_filter('mce_buttons', 'onp_bzda_adn_mce_buttons');

	/**
	 * Регистрируем скрипты для текстового редактора
	 */
	function onp_bzda_adn_mce_external_plugins($plugin_array)
	{
		if( !current_user_can('edit_' . OPANDA_POST_TYPE) ) {
			return $plugin_array;
		}

		$plugin_array['bizpanda_evolution_addon'] = BZDA_ADN_PLUGIN_URL . '/admin/assets/js/addon.tinymce4.4.js';

		return $plugin_array;
	}

	add_action('mce_external_plugins', 'onp_bzda_adn_mce_external_plugins');

	/**
	 * Покдлючаем скрипты на страницу списка замков
	 * @param object $scripts
	 * @param object $styles
	 */
	function onp_bzda_adn_view_table_register_scripts($scripts, $styles)
	{
		$styles->add(BZDA_ADN_PLUGIN_URL . '/admin/assets/css/addon.item-view.010000.css');
	}

	add_action('bizpanda_view_table_register_scripts', 'onp_bzda_adn_view_table_register_scripts', 10, 2);

	/**
	 * Registers metaboxes for Social Locker.
	 *
	 * @see opanda_item_type_metaboxes
	 * @since 1.0.0
	 */

	function onp_bzda_adn_metaboxes($metaboxes)
	{
		array_unshift($metaboxes, array(
			'class' => 'BZDA_EVO_SettingModsMetabox',
			'path' => BZDA_ADN_PLUGIN_DIR . '/admin/metaboxes/setting-mods.php'
		));

		return $metaboxes;
	}

	add_filter('bizpanda_item_type_metaboxes', 'onp_bzda_adn_metaboxes', 10, 1);

	/**
	 * Подключаем скрипты аддона к превью
	 */
	function onp_bzda_adn_print_scripts_to_preview_head()
	{
		?>
		<script type="text/javascript" src="<?php echo BZDA_ADN_PLUGIN_URL ?>/plugin/assets/js/popup-mode.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo BZDA_ADN_PLUGIN_URL ?>/plugin/assets/css/popup-mode.min.css">
	<?php
	}

	add_filter('bizpanda_print_scripts_to_preview_head', 'onp_bzda_adn_print_scripts_to_preview_head', 10, 1);


