<?php
	/**
	 * Настройки форм для редактор тем
	 * @author Alex Kovalev <alex.kovalevv@gmail.com>
	 * @copyright Alex Kovalev 10.05.2017
	 * @version 1.0
	 */

	return array(
		__('General Options', 'plugin-addon-popup-locker'),
		'top-box',
		array(

			// accordion
			array(
				'type' => 'accordion',
				'items' => array(
					// overlap
					array(
						'type' => 'accordion-item',
						'title' => __('Overlap', 'plugin-addon-popup-locker'),
						'items' => array(
							array(
								'type' => 'color-and-opacity',
								'name' => 'overlap_background_color',
								'title' => __('Set up color and opacity:', 'plugin-addon-popup-locker'),
								'default' => array('color' => '#1F2633', 'opacity' => 96)
							),
							array(
								'type' => 'checkbox',
								'way' => 'buttons',
								'name' => 'disabled_pattern',
								'title' => __('Disabled pattern?', 'plugin-addon-popup-locker'),
								'default' => 0,
								'eventsOn' => array(
									'setValue' => array(
										'input[name="overlap_background_image_is_active"]' => 0
									),
									'hide' => '.factory-control-overlap_background_image'
								),
								'eventsOff' => array(
									'setValue' => array('input[name="overlap_background_image_is_active"]', 1),
									'show' => '.factory-control-overlap_background_image'
								)
							),
							array(
								'type' => 'pattern',
								'name' => 'overlap_background_image',
								'title' => __('Set up pattern', 'plugin-addon-popup-locker'),
								'default' => array(
									'url' => BZDA_ADN_PLUGIN_URL . '/plugin/assets/img/lock-content-img.png',
									'color' => null
								),
								'patterns' => array(
									array(
										'preview' => BZDA_ADN_PLUGIN_URL . '/plugin/assets/img/patterns-preview/lock-content-pattern-preview.jpg',
										'pattern' => BZDA_ADN_PLUGIN_URL . '/plugin/assets/img/lock-content-img.png',
									)
								)
							)
						)
					),
					// background
					array(
						'type' => 'accordion-item',
						'title' => __('Background', 'plugin-addon-popup-locker'),
						'items' => array(
							array(
								'type' => 'control-group',
								'name' => 'background_type',
								'default' => 'color',
								'items' => array(
									array(
										'type' => 'control-group-item',
										'title' => __('Color', 'plugin-addon-popup-locker'),
										'name' => 'color',
										'items' => array(
											array(
												'type' => 'color-and-opacity',
												'name' => 'background_color',
												'title' => __('Set up color and opacity:', 'plugin-addon-popup-locker'),
												'default' => array('color' => '#fff', 'opacity' => 100)
											)
										)
									),
									array(
										'type' => 'control-group-item',
										'title' => __('Gradient', 'plugin-addon-popup-locker'),
										'name' => 'gradient',
										'items' => array(
											array(
												'type' => 'gradient',
												'name' => 'background_gradient',
												'title' => __('Set up gradient:', 'plugin-addon-popup-locker')
											)
										)
									),
									array(
										'type' => 'control-group-item',
										'title' => __('Pattern', 'plugin-addon-popup-locker'),
										'name' => 'image',
										'items' => array(
											array(
												'type' => 'pattern',
												'name' => 'background_image',
												'title' => __('Set up pattern', 'plugin-addon-popup-locker')
											)
										)
									),
								)
							)
						)
					),
					// font options
					array(
						'type' => 'accordion-item',
						'title' => __('Text', 'plugin-addon-popup-locker'),
						'items' => array(
							array(
								'type' => 'font',
								'name' => 'header_text',
								'title' => __('Header text', 'plugin-addon-popup-locker'),
								'default' => array(
									'size' => 25,
									'family' => '"Segoe UI", Frutiger, "Frutiger Linotype", "Dejavu Sans", "Helvetica Neue", Arial, sans-serif',
									'color' => '#fff'
								),
								'units' => 'px'
							),
							array(
								'type' => 'font',
								'name' => 'message_text',
								'title' => __('Message text', 'plugin-addon-popup-locker'),
								'default' => array(
									'size' => 15,
									'family' => '"Segoe UI", Frutiger, "Frutiger Linotype", "Dejavu Sans", "Helvetica Neue", Arial, sans-serif',
									'color' => '#222'
								),
								'units' => 'px'
							)
						)
					),
					//  paddings options
					array(
						'type' => 'accordion-item',
						'title' => __('Paddings', 'plugin-addon-popup-locker'),
						'items' => array(
							array(
								'type' => 'integer',
								'name' => 'after_header_margin',
								'way' => 'slider',
								'title' => __('Margin after header', 'plugin-addon-popup-locker'),
								'units' => 'px',
								'default' => '0'
							),
							array(
								'type' => 'integer',
								'name' => 'after_message_margin',
								'way' => 'slider',
								'title' => __('Margin after message', 'plugin-addon-popup-locker'),
								'units' => 'px',
								'default' => '3'
							),
							array(
								'type' => 'integer',
								'name' => 'after_controls_margin',
								'way' => 'slider',
								'title' => __('Margin after controls', 'plugin-addon-popup-locker'),
								'units' => 'px',
								'default' => '0'
							),
						)
					)
				)
			)
		)
	);