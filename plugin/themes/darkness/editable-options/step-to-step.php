<?php
	/**
	 * Настройки форм для редактор тем
	 * @author Alex Kovalev <alex.kovalevv@gmail.com>
	 * @copyright Alex Kovalev 10.05.2017
	 * @version 1.0
	 */

	return array(
		__('Step to step', 'plugin-addon-popup-locker'),
		'step-to-step',
		array(
			// accordion
			array(
				'type' => 'accordion',
				'items' => array(
					// background
					array(
						'type' => 'accordion-item',
						'title' => __('Current screen', 'plugin-addon-popup-locker'),
						'items' => array(
							array(
								'type' => 'color-and-opacity',
								'name' => 'sts_active_tab_mark_bg_color',
								'title' => __('Mark background color', 'plugin-addon-popup-locker'),
								'default' => array('color' => '#ffeb31', 'opacity' => 100)
							),
							array(
								'type' => 'color-and-opacity',
								'name' => 'sts_active_tab_mark_text_color',
								'title' => __('Mark text color', 'plugin-addon-popup-locker'),
								'default' => array('color' => '#404040', 'opacity' => 100)
							),
							array(
								'type' => 'color-and-opacity',
								'name' => 'sts_active_tab_line_bg_color',
								'title' => __('Step line background color', 'plugin-addon-popup-locker'),
								'default' => array('color' => '#222222', 'opacity' => 55)
							),
							array(
								'type' => 'color-and-opacity',
								'name' => 'sts_active_tab_line_text_color',
								'title' => __('Step line text color', 'plugin-addon-popup-locker'),
								'default' => array('color' => '#fff', 'opacity' => 100)
							),
						)
					),
					// background
					array(
						'type' => 'accordion-item',
						'title' => __('Default screen', 'plugin-addon-popup-locker'),
						'items' => array(
							array(
								'type' => 'color-and-opacity',
								'name' => 'sts_default_tab_mark_bg_color',
								'title' => __('Mark background color', 'plugin-addon-popup-locker'),
								'default' => array('color' => '#ffeb31', 'opacity' => 100)
							),
							array(
								'type' => 'color-and-opacity',
								'name' => 'sts_default_tab_mark_text_color',
								'title' => __('Mark text color', 'plugin-addon-popup-locker'),
								'default' => array('color' => '#404040', 'opacity' => 100)
							),
							array(
								'type' => 'color-and-opacity',
								'name' => 'sts_default_tab_line_bg_color',
								'title' => __('Step line background color', 'plugin-addon-popup-locker'),
								'default' => array('color' => '#222222', 'opacity' => 55)
							),
							array(
								'type' => 'color-and-opacity',
								'name' => 'sts_default_tab_line_text_color',
								'title' => __('Step line text color', 'plugin-addon-popup-locker'),
								'default' => array('color' => '#fff', 'opacity' => 100)
							),
						)
					)
				)
			)
		)
	);