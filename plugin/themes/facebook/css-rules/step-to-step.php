<?php
	/**
	 * Настройки функциональных кнопок темы для редактора тем
	 * @author Alex Kovalev <alex.kovalevv@gmail.com>
	 * @copyright Alex Kovalev 10.05.2017
	 * @version 1.0
	 */

	return array(
		/**
		 * Для мультизамков
		 */

		// active screen
		'sts_active_tab_mark_bg_color' => array(
			'css' => 'background-color: {value|onp_to_rgba} !important;',
			'selector' => '.onp-sl-facebook .onp-sts-progress-line .onp-sts-top-line span'
		),
		'sts_active_tab_mark_text_color' => array(
			'css' => 'color: {value|onp_to_rgba} !important;',
			'selector' => '.onp-sl-facebook .onp-sts-progress-line .onp-sts-top-line span'
		),
		'sts_active_tab_line_bg_color' => array(
			'css' => 'background-color: {value|onp_to_rgba} !important;',
			'selector' => '.onp-sl-facebook .onp-sts-progress-line .onp-sts-top-line'
		),
		'sts_active_tab_line_text_color' => array(
			'css' => 'color: {value|onp_to_rgba} !important;',
			'selector' => '.onp-sl-facebook .onp-sts-progress-line .onp-sts-top-line'
		),
		// end active screen

		// default screen
		'sts_default_tab_mark_bg_color' => array(
			'css' => 'background-color: {value|onp_to_rgba} !important;',
			'selector' => '.onp-sl-facebook .onp-sts-progress-line span'
		),
		'sts_default_tab_mark_text_color' => array(
			'css' => 'color: {value|onp_to_rgba} !important;',
			'selector' => '.onp-sl-facebook .onp-sts-progress-line span'
		),
		'sts_default_tab_line_bg_color' => array(
			'css' => 'background-color: {value|onp_to_rgba} !important;',
			'selector' => '.onp-sl-facebook .onp-sts-progress-line .onp-sts-step-mark'
		),
		'sts_default_tab_line_text_color' => array(
			'css' => 'color: {value|onp_to_rgba} !important;',
			'selector' => '.onp-sl-facebook .onp-sts-progress-line'
		)
		// end active screen
	);