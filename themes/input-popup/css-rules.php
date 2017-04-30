<?php
	/**
	 * Returns CSS generating rules for the Starter theme.
	 *
	 * @see OnpSL_ThemeManager::getRulesToGenerateCSS
	 *
	 * @since 3.3.3
	 * @return mixed[]
	 */
	function onp_sl_get_input_popup_theme_css_rules()
	{

		return array(

			// background
			'background_color' => array(
				'css' => 'background-color: {value|onp_to_rgba} !important;',
				'selector' => '.onp-sl-input-popup .onp-sl-text'
			),
			'background_image' => array(
				'image' => array(
					'function' => 'opanda_sr_rehue',
					'args' => array(
						'{url}',
						'{color}',
						array(
							'output' => OPANDA_SR_PLUGIN_DIR . '/assets/img/sr/',
							'url' => OPANDA_SR_PLUGIN_DIR . '/assets/img/sr/',
						)
					)
				),
				'css' => array(
					'background-image: url("{image}") !important;',
					'background-repeat: repeat;'
				),
				'selector' => '.onp-sl-input-popup .onp-sl-text'
			),
			'background_gradient' => array(
				'css' => array(
					'background: {value|onp_to_gradient} !important;',
					'background: -webkit-{value|onp_to_gradient} !important;',
					'background: -moz-{value|onp_to_gradient} !important;',
					'background: -o-{value|onp_to_gradient} !important;',
				),
				'selector' => '.onp-sl-input-popup .onp-sl-text'
			),
			// end background

			// text
			'header_text' => array(
				array(
					'css' => array(
						'font-family: {family|stripcslashes} !important;',
						'font-size: {size}px !important;',
						'color: {color} !important;',
					    'text-shadow:none !important;'
					),
					'selector' => '.onp-sl-input-popup .onp-sl-strong'
				),
				array(
					'css' => 'background-image: url("{image}") !important;',
					'selector' => '.onp-sl-input-popup .onp-sl-text .onp-sl-strong:before, .onp-sl-input-popup .onp-sl-text .onp-sl-strong:after'
				)
			),
			'message_text' => array(
				'css' => array(
					'font-family: {family|stripcslashes} !important;',
					'font-size: {size}px !important;',
					'color: {color} !important;',
				    'text-shadow:none !important;'
				),
				'selector' => '.onp-sl-input-popup .onp-sl-text .onp-sl-message, .onp-sl-input-popup .onp-sl-text p'
			),
			// end text

			// paddings
			'container_paddings' => array(
				'css' => 'padding: {value} !important;',
				'selector' => '.onp-sl-input-popup .onp-sl-text'
			),
			'after_header_margin' => array(
				'css' => 'margin-bottom: {value}px !important;',
				'selector' => '.onp-sl-input-popup .onp-sl-text .onp-sl-strong'
			),
			'after_message_margin' => array(
				'css' => 'margin-bottom: {value}px !important;',
				'selector' => '.onp-sl-input-popup .onp-sl-text'
			),
			// end paddings
			/**
			 * Для кнопок
			 */

			// background
			'button_layer_background_color' => array(
				'css' => 'background-color: {value|onp_to_rgba} !important;',
				'selector' => '.onp-sl.onp-sl-input-popup .onp-sl-social-buttons .onp-sl-control'
			),
			'button_layer_background_gradient' => array(
				'css' => array(
					'background: {value|onp_to_gradient} !important;',
					'background: -webkit-{value|onp_to_gradient} !important;',
					'background: -moz-{value|onp_to_gradient} !important;',
					'background: -o-{value|onp_to_gradient} !important;',
				),
				'selector' => '.onp-sl.onp-sl-input-popup .onp-sl-social-buttons .onp-sl-control'
			),
			// end background

			// paddings
			'button_layer_paddings' => array(
				'css' => 'padding: {value} !important;',
				'selector' => '.onp-sl.onp-sl-input-popup .onp-sl-social-buttons .onp-sl-control'
			),
			// end paddings

			/**
			 * Для нижней части окна
			 */
			// background
			'bottom_background_color' => array(
				'css' => 'background-color: {value|onp_to_rgba} !important;',
				'selector' => '.onp-sl-input-popup .onp-sl-wrap-thanks-link'
			),
			'bottom_background_image' => array(
				'image' => array(
					'function' => 'opanda_sr_rehue',
					'args' => array(
						'{url}',
						'{color}',
						array(
							'output' => OPANDA_SR_PLUGIN_DIR . '/assets/img/sr/',
							'url' => OPANDA_SR_PLUGIN_DIR . '/assets/img/sr/',
						)
					)
				),
				'css' => array(
					'background-image: url("{image}") !important;',
					'background-repeat: repeat !important;'
				),
				'selector' => '.onp-sl-input-popup .onp-sl-wrap-thanks-link'
			),
			'bottom_background_gradient' => array(
				'css' => array(
					'background: {value|onp_to_gradient} !important;',
					'background: -webkit-{value|onp_to_gradient} !important;',
					'background: -moz-{value|onp_to_gradient} !important;',
					'background: -o-{value|onp_to_gradient} !important;',
				),
				'selector' => '.onp-sl-input-popup .onp-sl-wrap-thanks-link'
			),
			// end background
			// text
			'bottom_link_text' => array(
				array(
					'css' => array(
						'font-family: {family|stripcslashes} !important;',
						'font-size: {size}px !important;',
						'color: {color}; text-shadow:none !important;'
					),
					'selector' => '.onp-sl-input-popup .onp-sl-thanks-link'
				)
			),
			'bottom_link_underline' => array(
				'css' => array(
					'border: none !important;',
					'background: none !important;'
				),
				'selector' => '.onp-sl-input-popup .onp-sl-thanks-link'
			),
			'bottom_timer_text' => array(
				'css' => array(
					'font-family: {family|stripcslashes} !important;',
					'font-size: {size}px !important;',
					'color: {color}; text-shadow:none !important;'
				),
				'selector' => '.onp-sl-input-popup .onp-sl-timer'
			),
			// end text

			// paddings
			'bottom_container_paddings' => array(
				'css' => 'padding: {value} !important;',
				'selector' => '.onp-sl-input-popup .onp-sl-wrap-thanks-link'
			)
			// end paddings
		);
	}
