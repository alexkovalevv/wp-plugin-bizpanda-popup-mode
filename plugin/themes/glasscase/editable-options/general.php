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
								'default' => array('color' => '#616161', 'opacity' => 78)
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
												'default' => array('color' => '#fff', 'opacity' => 78)
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
					// outer borders
					array(
						'type' => 'accordion-item',
						'title' => __('Outer Border', 'plugin-addon-popup-locker'),
						'items' => array(
							array(
								'type' => 'color-and-opacity',
								'name' => 'outer_border_color',
								'title' => __('Set up color for outer border:', 'plugin-addon-popup-locker'),
								'default' => array('color' => '#fff', 'opacity' => 100)
							),
							array(
								'type' => 'dropdown',
								'name' => 'outer_border_style',
								'title' => __('Border style:', 'plugin-addon-popup-locker'),
								'data' => array(
									array('dashed', __('Dashed', 'plugin-addon-popup-locker')),
									array('solid', __('Solid', 'plugin-addon-popup-locker')),
									array('dotted', __('Dotted', 'plugin-addon-popup-locker'))
								),
								'default' => 'solid'
							),
							array(
								'type' => 'integer',
								'way' => 'slider',
								'name' => 'outer_border_size',
								'title' => __('Outer border width', 'plugin-addon-popup-locker'),
								'range' => array(0, 99),
								'default' => 10,
								'units' => 'px'
							),
							array(
								'type' => 'integer',
								'way' => 'slider',
								'name' => 'outer_border_radius',
								'title' => __('Outer border radius', 'plugin-addon-popup-locker'),
								'range' => array(0, 99),
								'default' => 0,
								'units' => 'px'
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
									'size' => 30,
									'family' => '"Segoe UI", Frutiger, "Frutiger Linotype", "Dejavu Sans", "Helvetica Neue", Arial, sans-serif',
									'color' => '#504e4e'
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
									'color' => '#504e4e'
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
								'type' => 'paddings-editor',
								'name' => 'container_paddings',
								'title' => __('Box paddings', 'plugin-addon-popup-locker'),
								'units' => 'px',
								'default' => '15px 15px 15px 15px'
							),
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