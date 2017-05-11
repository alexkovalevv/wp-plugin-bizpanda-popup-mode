<?php
	/**
	 * Общие настройки темы для редактор тем
	 * @author Alex Kovalev <alex.kovalevv@gmail.com>
	 * @copyright Alex Kovalev 10.05.2017
	 * @version 1.0
	 */

	return array(
		// overlap
		'overlap_background_color' => array(
			'css' => 'background-color: {value|onp_to_rgba} !important;',
			'selector' => '.onp-sl-overlap-box.onp-sl-glasscase-theme .onp-sl-overlap-background'
		),
		'overlap_background_image' => array(
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
			'selector' => '.onp-sl-overlap-box.onp-sl-glasscase-theme .onp-sl-overlap-background'
		),
		'disabled_pattern' => array(
			'css' => array(
				'background-image: none !important;',
				'background-repeat: none !important;'
			),
			'selector' => '.onp-sl-overlap-box.onp-sl-glasscase-theme .onp-sl-overlap-background'
		),
		// end overlap

		// background
		'background_color' => array(
			'css' => 'background-color: {value|onp_to_rgba} !important;',
			'selector' => '.onp-sl-glasscase'
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
			'selector' => '.onp-sl-glasscase'
		),
		'background_gradient' => array(
			'css' => array(
				'background: {value|onp_to_gradient} !important;',
				'background: -webkit-{value|onp_to_gradient} !important;',
				'background: -moz-{value|onp_to_gradient} !important;',
				'background: -o-{value|onp_to_gradient} !important;',
			),
			'selector' => '.onp-sl-glasscase'
		),
		// end background

		// outer border
		'outer_border_color' => array(
			'css' => 'border-color: {value|onp_to_rgba};',
			'selector' => '.onp-sl-glasscase'
		),
		'outer_border_size' => array(
			'css' => 'border-width: {value}px;',
			'selector' => '.onp-sl-glasscase'
		),
		'outer_border_style' => array(
			'css' => 'border-style: {value};',
			'selector' => '.onp-sl-glasscase'
		),
		'outer_border_radius' => array(
			'css' => array(
				'border-radius: {value}px;',
				'-moz-border-radius:{value}px;',
				'-webkit-border-radius:{value}px;'
			),
			'selector' => '.onp-sl-glasscase'
		),
		// end outer border

		// text
		'header_text' => array(
			array(
				'css' => array(
					'font-family: {family|stripcslashes} !important;',
					'font-size: {size}px !important;',
					'color: {color} !important;',
					'text-shadow:none !important;'
				),
				'selector' => '.onp-sl-glasscase .onp-sl-strong'
			),
			array(
				'css' => 'background-image: url("{image}") !important;',
				'selector' => '.onp-sl-glasscase .onp-sl-text .onp-sl-strong:before, .onp-sl-glasscase .onp-sl-text .onp-sl-strong:after'
			)
		),
		'message_text' => array(
			'css' => array(
				'font-family: {family|stripcslashes} !important;',
				'font-size: {size}px !important;',
				'color: {color} !important;',
				'text-shadow:none !important;'
			),
			'selector' => '.onp-sl-glasscase .onp-sl-text .onp-sl-message, .onp-sl-glasscase .onp-sl-text p'
		),
		// end text

		// paddings
		'container_paddings' => array(
			'css' => 'padding: {value} !important;',
			'selector' => '.onp-sl-glasscase .onp-sl-screen'
		),
		'after_header_margin' => array(
			'css' => 'margin-bottom: {value}px !important;',
			'selector' => '.onp-sl-glasscase .onp-sl-text .onp-sl-strong'
		),
		'after_message_margin' => array(
			'css' => 'margin-bottom: {value}px !important;',
			'selector' => '.onp-sl-glasscase .onp-sl-text'
		),
		'after_controls_margin' => array(
			'css' => 'margin-bottom: {value}px !important;',
			'selector' => '.onp-sl-glasscase .onp-sl-group-inner-wrap'
		),
		// end paddings
	);