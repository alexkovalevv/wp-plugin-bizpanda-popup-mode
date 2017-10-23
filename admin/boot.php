<?php
	/**
	 * Общие функции и вызовы для админ панели
	 * @author Alex Kovalev <alex.kovalevv@gmail.com>
	 * @copyright Alex Kovalev 23.04.2017
	 * @version 1.0
	 */

	require(BZDA_POPUPS_ADN_PLUGIN_DIR . '/admin/activation.php');
	require(BZDA_POPUPS_ADN_PLUGIN_DIR . '/admin/pages/license-manager.php');

	require_once BZDA_POPUPS_ADN_PLUGIN_DIR . '/admin/metaboxes/bulk-locking.php';

	/**
	 * Покдлючаем скрипты на страницу редактирования замков
	 * @param object $scripts
	 * @param object $styles
	 */
	function onp_bzda_popups_adn_items_edit_assets($scripts, $styles)
	{
		$styles->add(BZDA_POPUPS_ADN_PLUGIN_URL . '/admin/assets/css/addon.item-edit.010001.css');

		// Ddslick dropdown
		$scripts->request(array(
			'control.dropdown',
			'plugin.ddslick',
		), 'bootstrap');
	}

	add_action('bizpanda_panda-item_edit_assets', 'onp_bzda_popups_adn_items_edit_assets', 10, 2);

	/**
	 * Добавляем иконку для шорткода событий
	 *
	 * @see before_wp_tiny_mce
	 * @since 1.1.0
	 */
	function onp_bzda_popups_adn_tinymce_data()
	{
		?>
		<style>
			i.onp-bzda-adn-events-shortcode-icon {
				background: url("<?php echo BZDA_POPUPS_ADN_PLUGIN_URL . '/admin/assets/img/bizpanda-target-events-icon.png' ?>");
			}
		</style>
		<script>
			var bizpanda_popups_addon_shortcode_title = '<?php echo __('Выделите ссылку, кнопку или картинку, чтобы присвоить им действие, которое вызовет замок.', 'bizpanda-popups-addon') ?>';
			var bizpanda_popups_addon_not_found_text = '<?php echo __('-- Еще нет замков с выбранным режимом --', 'bizpanda-popups-addon'); ?>';
		</script>
	<?php
	}

	add_action('before_wp_tiny_mce', 'onp_bzda_popups_adn_tinymce_data');

	/**
	 * Регистрируем кнопки для текстового редактора
	 */
	function onp_bzda_popups_adn_mce_buttons($buttons)
	{
		if( !current_user_can('edit_' . OPANDA_POST_TYPE) ) {
			return $buttons;
		}
		array_push($buttons, "bizpanda_popups_addon");

		return $buttons;
	}

	add_filter('mce_buttons', 'onp_bzda_popups_adn_mce_buttons');

	/**
	 * Регистрируем скрипты для текстового редактора
	 */
	function onp_bzda_popups_adn_mce_external_plugins($plugin_array)
	{
		if( !current_user_can('edit_' . OPANDA_POST_TYPE) ) {
			return $plugin_array;
		}

		$plugin_array['bizpanda_popups_addon'] = BZDA_POPUPS_ADN_PLUGIN_URL . '/admin/assets/js/addon.tinymce4.4.js';

		return $plugin_array;
	}

	add_action('mce_external_plugins', 'onp_bzda_popups_adn_mce_external_plugins');

	/**
	 * Покдлючаем скрипты на страницу списка замков
	 * @param object $scripts
	 * @param object $styles
	 */
	function onp_bzda_popups_adn_view_table_register_scripts($scripts, $styles)
	{
		$styles->add(BZDA_POPUPS_ADN_PLUGIN_URL . '/admin/assets/css/addon.item-view.010000.css');
	}

	add_action('bizpanda_view_table_register_scripts', 'onp_bzda_popups_adn_view_table_register_scripts', 10, 2);

	/**
	 * Registers metaboxes for Social Locker.
	 *
	 * @see opanda_item_type_metaboxes
	 * @since 1.0.0
	 */

	function onp_bzda_popups_adn_metaboxes($metaboxes)
	{
		array_unshift($metaboxes, array(
			'class' => 'BZDA_POPUPS_ADN_SettingModsMetabox',
			'path' => BZDA_POPUPS_ADN_PLUGIN_DIR . '/admin/metaboxes/setting-mods.php'
		));

		return $metaboxes;
	}

	add_filter('bizpanda_item_type_metaboxes', 'onp_bzda_popups_adn_metaboxes', 10, 1);

	/**
	 * Assets scripts of the addon for preview
	 */
	function onp_bzda_popups_adn_print_scripts_to_preview_head()
	{
		?>
		<script type="text/javascript" src="<?php echo BZDA_POPUPS_ADN_PLUGIN_URL ?>/plugin/assets/js/popup-mode.js"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo BZDA_POPUPS_ADN_PLUGIN_URL ?>/plugin/assets/css/popup-mode.min.css">
	<?php
	}

	add_filter('bizpanda_print_scripts_to_preview_head', 'onp_bzda_popups_adn_print_scripts_to_preview_head', 10, 1);

	// ---
	// Help
	//

	/**
	 * Registers a help section for the popup addon
	 *
	 * @since 1.0.0
	 */
	function bizpanda_popups_addon_register_help($pages)
	{
		global $opanda_help_cats;
		if( !$opanda_help_cats ) {
			$opanda_help_cats = array();
		}

		$items = array(
			array(
				'name' => 'bizpanda-popups-addon-quick-start',
				'title' => __('Quick start', 'plugin-sociallocker'),
				'hollow' => true,
			)
		);

		$items = apply_filters('bizpanda_popups_addon_register_help_pages', $items);

		array_unshift($pages, array(
			'name' => 'bizpanda-popups-addon',
			'title' => __('Popups Addon', 'plugin-sociallocker'),
			'items' => $items
		));

		return $pages;
	}

	add_filter('bizpanda_help_pages', 'bizpanda_popups_addon_register_help');

	/**
	 * Shows the intro page for the plugin Social Locker.
	 *
	 * @since 1.0.0
	 * @param FactoryPages000_AdminPage $manager
	 * @return void
	 */
	function bizpanda_popups_addon_help_page($manager)
	{
		require BZDA_POPUPS_ADN_PLUGIN_DIR . '/admin/pages/howtouse/quick-start.php';
	}

	add_action('bizpanda_help_page_bizpanda-popups-addon', 'bizpanda_popups_addon_help_page');
	add_action('bizpanda_help_page_bizpanda-popups-addon-quick-start', 'bizpanda_popups_addon_help_page');

	/**
	 * Add links to plugin meta
	 * @param $links
	 * @param $file
	 * @return array
	 */
	function bizpanda_popups_addon_set_plugin_meta($links, $file)
	{
		global $bizpanda_popups_addon;

		if( $file == $bizpanda_popups_addon->relativePath ) {
			$links[] = '<a href="' . opanda_get_admin_url('how-to-use', array('opanda_page' => 'bizpanda-popups-addon')) . '" target="_blank">' . __('How to use?', 'bizpanda') . '</a>';
		}

		return $links;
	}

	add_filter('plugin_row_meta', 'bizpanda_popups_addon_set_plugin_meta', 10, 2);


