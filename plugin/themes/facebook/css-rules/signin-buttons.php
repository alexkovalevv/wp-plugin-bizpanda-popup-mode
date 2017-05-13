<?php
	/**
	 * Настройки социальных кнопок темы для редактора тем
	 * @author Alex Kovalev <alex.kovalevv@gmail.com>
	 * @copyright Alex Kovalev 10.05.2017
	 * @version 1.0
	 */

	return array(
		/**
		 * Для кнопок
		 */

		// button backgrounds
		// - twitter
		'signin_button_cover_twitter_color' => array(
			'css' => 'background: {value} !important;',
			'selector' => '.onp-sl-facebook .onp-sl-connect-buttons .onp-sl-twitter'
		),
		// - facebook
		'signin_button_cover_facebook_color' => array(

			'css' => 'background: {value} !important;',
			'selector' => '.onp-sl-facebook .onp-sl-connect-buttons .onp-sl-facebook'

		),
		// - google
		'signin_button_cover_google_color' => array(

			'css' => 'background: {value} !important;',
			'selector' => '.onp-sl-facebook .onp-sl-connect-buttons .onp-sl-google'

		),
		// - linkedin
		'signin_button_cover_linkedin_color' => array(

			'css' => 'background: {value} !important;',
			'selector' => '.onp-sl-facebook .onp-sl-connect-buttons .onp-sl-linkedin'

		),
		// end button backgrounds

		// button text
		'signin_button_cover_text_font' => array(
			'css' => array(
				'font-family: {family|stripcslashes} !important;',
				'font-size: {size}px !important;',
				'color: {color} !important; text-shadow:none !important;'
			),
			'selector' => '.onp-sl-facebook .onp-sl-connect-buttons .onp-sl-control'
		),
		// end button text

	);