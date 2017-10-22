<?php
	/**
	 * Настройки форм для редактор тем
	 * @author Alex Kovalev <alex.kovalevv@gmail.com>
	 * @copyright Alex Kovalev 10.05.2017
	 * @version 1.0
	 */

	return /**
	 * Action buttons accordion
	 */

		array(
			__('Actions Buttons', 'bizpanda-popups-addon'),
			'action-buttons',
			array(
				// accordion
				array(
					'type' => 'accordion',
					'items' => array(

						// background options
						array(
							'type' => 'accordion-item',
							'title' => __('Close window button', 'bizpanda-popups-addon'),
							'items' => array(
								array(
									'type' => 'color-and-opacity',
									'name' => 'action_close_button_bg_color',
									'title' => __('Set up background color:', 'bizpanda-popups-addon'),
									'default' => array('color' => '#ffeb31', 'opacity' => 100)
								),
								array(
									'type' => 'color-and-opacity',
									'name' => 'action_close_button_text_color',
									'title' => __('Set up text color:', 'bizpanda-popups-addon'),
									'default' => array('color' => '#846b0f', 'opacity' => 100)
								),
							)
						),
						// font options
						array(
							'type' => 'accordion-item',
							'title' => __('Next screen button', 'bizpanda-popups-addon'),
							'items' => array(
								array(
									'type' => 'color-and-opacity',
									'name' => 'action_next_button_bg_color',
									'title' => __('Set up background color:', 'bizpanda-popups-addon'),
									'default' => array('color' => '#CDDC39', 'opacity' => 100)
								),
								array(
									'type' => 'color-and-opacity',
									'name' => 'action_next_button_text_color',
									'title' => __('Set up text color:', 'bizpanda-popups-addon'),
									'default' => array('color' => '#687111', 'opacity' => 100)
								),
							)
						)
					)
				)
			)
		);