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
		'button_cover_twitter_color' => array(
			array(
				'css' => 'background: {value} !important;',
				'selector' => '.onp-sl-download .onp-sl-twitter .onp-sl-overlay-front, .onp-sl-download .onp-sl-twitter .onp-sl-overlay-back'
			),
			array(
				'css' => 'border-bottom-color: {value|onp_smart_whiteout_color_15} !important;',
				'selector' => '.onp-sl-download .onp-sl-twitter .onp-sl-overlay-front'
			),
			'button_twitter_substrate_color' => array(
				'css' => 'background: {value|onp_smart_blackout_color} !important;',
				'selector' => '.onp-sl-download .onp-sl-twitter .onp-sl-overlay-header'
			)
		),
		// - facebook
		'button_cover_facebook_color' => array(
			array(
				'css' => 'background: {value} !important;',
				'selector' => '.onp-sl-download .onp-sl-facebook .onp-sl-overlay-front, .onp-sl-download .onp-sl-facebook .onp-sl-overlay-back'
			),
			array(
				'css' => 'border-bottom-color: {value|onp_smart_whiteout_color_15} !important;',
				'selector' => '.onp-sl-download .onp-sl-facebook .onp-sl-overlay-front'
			),
			array(
				'css' => 'background: {value|onp_smart_blackout_color} !important;',
				'selector' => '.onp-sl-download .onp-sl-facebook .onp-sl-overlay-header'
			)
		),
		// - google
		'button_cover_google_color' => array(
			array(
				'css' => 'background: {value} !important;',
				'selector' => '.onp-sl-download .onp-sl-google .onp-sl-overlay-front, .onp-sl-download .onp-sl-google .onp-sl-overlay-back'
			),
			array(
				'css' => 'border-bottom-color: {value|onp_smart_whiteout_color_15} !important;',
				'selector' => '.onp-sl-download .onp-sl-google .onp-sl-overlay-front'
			),
			array(
				'css' => 'background: {value|onp_smart_blackout_color} !important;',
				'selector' => '.onp-sl-download .onp-sl-google .onp-sl-overlay-header'
			)
		),
		// - linkedin
		'button_cover_linkedin_color' => array(
			array(
				'css' => 'background: {value} !important;',
				'selector' => '.onp-sl-download .onp-sl-linkedin .onp-sl-overlay-front, .onp-sl-download .onp-sl-linkedin .onp-sl-overlay-back'
			),
			array(
				'css' => 'border-bottom-color: {value|onp_smart_whiteout_color_15} !important;',
				'selector' => '.onp-sl-download .onp-sl-linkedin .onp-sl-overlay-front'
			),
			array(
				'css' => 'background: {value|onp_smart_blackout_color} !important;',
				'selector' => '.onp-sl-download .onp-sl-linkedin .onp-sl-overlay-header'
			)
		),
		// end button backgrounds

		// button text
		'button_cover_text_font' => array(
			array(
				'css' => array(
					'font-family: {family|stripcslashes} !important;',
					'font-size: {size}px !important;',
					'color: {color} !important; text-shadow:none !important;'
				),
				'selector' => '.onp-sl-download .onp-sl-overlay-text'
			),
			array(
				'image' => array(
					'function' => 'onp_sl_recolor',
					'args' => array(
						OPANDA_SR_PLUGIN_URL . '/assets/img/social-icons.png',// an original image to recolor
						'{color}', // a color to use
						array( // a set of options
						       'output' => OPANDA_SR_PLUGIN_DIR . '/assets/img/sr/',
						       'url' => OPANDA_SR_PLUGIN_URL . '/assets/img/sr/',
						)
					)
				),
				'css' => 'background-image: url("{image}") !important;',
				'selector' => '.onp-sl-download .onp-sl-control .onp-sl-overlay-icon'
			)
		),
		// end button text
	);