<?php
	/**
	 * Настройки функциональных кнопок темы для редактора тем
	 * @author Alex Kovalev <alex.kovalevv@gmail.com>
	 * @copyright Alex Kovalev 10.05.2017
	 * @version 1.0
	 */

	return array(
		/**
		 * Для кнопок выполняющих какие-то действия
		 */

		'action_close_button_bg_color' => array(
			'css' => 'background-color: {value|onp_to_rgba} !important;',
			'selector' => '.onp-sl-dark-force .onp-slp-close-button'
		),
		'action_close_button_text_color' => array(
			'css' => 'color: {value|onp_to_rgba} !important;',
			'selector' => '.onp-sl-dark-force .onp-slp-close-button'
		),
		'action_next_button_bg_color' => array(
			'css' => 'background-color: {value|onp_to_rgba} !important;',
			'selector' => '.onp-sl-dark-force .onp-slp-next-button'
		),
		'action_next_button_text_color' => array(
			'css' => 'color: {value|onp_to_rgba} !important;',
			'selector' => '.onp-sl-dark-force .onp-slp-next-button'
		),
	);