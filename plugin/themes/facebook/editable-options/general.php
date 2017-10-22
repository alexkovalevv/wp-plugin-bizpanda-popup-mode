<?php
	/**
	 * Настройки форм для редактор тем
	 * @author Alex Kovalev <alex.kovalevv@gmail.com>
	 * @copyright Alex Kovalev 10.05.2017
	 * @version 1.0
	 */

	return array(
		__('General Options', 'bizpanda-popups-addon'),
		'top-box',
		array(

			// accordion
			array(
				'type' => 'accordion',
				'items' => array(
					// overlap
					array(
						'type' => 'accordion-item',
						'title' => __('Overlap', 'bizpanda-popups-addon'),
						'items' => array(
							array(
								'type' => 'color-and-opacity',
								'name' => 'overlap_background_color',
								'title' => __('Set up color and opacity:', 'bizpanda-popups-addon'),
								'default' => array('color' => '#1F2633', 'opacity' => 96)
							),
							array(
								'type' => 'checkbox',
								'way' => 'buttons',
								'name' => 'disabled_pattern',
								'title' => __('Disabled pattern?', 'bizpanda-popups-addon'),
								'default' => 0,
								'eventsOn' => array(
									'setValue' => array(
										'input[name="overlap_background_image_is_active"]' => 0,
										'input[name="disabled_pattern_is_active"]' => 1
									),
									'hide' => '.factory-control-overlap_background_image'
								),
								'eventsOff' => array(
									'setValue' => array(
										'input[name="overlap_background_image_is_active"]' => 1,
										'input[name="disabled_pattern_is_active"]' => 0
									),
									'show' => '.factory-control-overlap_background_image'
								)
							),
							array(
								'type' => 'pattern',
								'name' => 'overlap_background_image',
								'title' => __('Set up pattern', 'bizpanda-popups-addon'),
								'default' => array(
									'url' => BZDA_POPUPS_ADN_PLUGIN_URL . '/plugin/assets/img/lock-content-img.png',
									'color' => null
								),
								'patterns' => array(
									array(
										'preview' => BZDA_POPUPS_ADN_PLUGIN_URL . '/plugin/assets/img/patterns-preview/lock-content-pattern-preview.jpg',
										'pattern' => BZDA_POPUPS_ADN_PLUGIN_URL . '/plugin/assets/img/lock-content-img.png',
									)
								)
							)
						)
					),
					// background
					array(
						'type' => 'accordion-item',
						'title' => __('Background', 'bizpanda-popups-addon'),
						'items' => array(
							array(
								'type' => 'control-group',
								'name' => 'background_type',
								'default' => 'color',
								'items' => array(
									array(
										'type' => 'control-group-item',
										'title' => __('Color', 'bizpanda-popups-addon'),
										'name' => 'color',
										'items' => array(
											array(
												'type' => 'color-and-opacity',
												'name' => 'background_color',
												'title' => __('Set up color and opacity:', 'bizpanda-popups-addon'),
												'default' => array('color' => '#fff', 'opacity' => 100)
											)
										)
									),
									array(
										'type' => 'control-group-item',
										'title' => __('Gradient', 'bizpanda-popups-addon'),
										'name' => 'gradient',
										'items' => array(
											array(
												'type' => 'gradient',
												'name' => 'background_gradient',
												'title' => __('Set up gradient:', 'bizpanda-popups-addon')
											)
										)
									),
									array(
										'type' => 'control-group-item',
										'title' => __('Pattern', 'bizpanda-popups-addon'),
										'name' => 'image',
										'items' => array(
											array(
												'type' => 'pattern',
												'name' => 'background_image',
												'title' => __('Set up pattern', 'bizpanda-popups-addon')
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
						'title' => __('Text', 'bizpanda-popups-addon'),
						'items' => array(
							array(
								'type' => 'font',
								'name' => 'header_text',
								'title' => __('Header text', 'bizpanda-popups-addon'),
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
								'title' => __('Message text', 'bizpanda-popups-addon'),
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
						'title' => __('Paddings', 'bizpanda-popups-addon'),
						'items' => array(
							array(
								'type' => 'integer',
								'name' => 'after_header_margin',
								'way' => 'slider',
								'title' => __('Margin after header', 'bizpanda-popups-addon'),
								'units' => 'px',
								'default' => '0'
							),
							array(
								'type' => 'integer',
								'name' => 'after_message_margin',
								'way' => 'slider',
								'title' => __('Margin after message', 'bizpanda-popups-addon'),
								'units' => 'px',
								'default' => '3'
							),
							array(
								'type' => 'integer',
								'name' => 'after_controls_margin',
								'way' => 'slider',
								'title' => __('Margin after controls', 'bizpanda-popups-addon'),
								'units' => 'px',
								'default' => '0'
							),
						)
					)
				)
			)
		)
	);