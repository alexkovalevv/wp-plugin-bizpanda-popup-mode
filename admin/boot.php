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
	}

	add_action('bizpanda_panda-item_edit_assets', 'onp_bzda_adn_items_edit_assets', 10, 2);

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
