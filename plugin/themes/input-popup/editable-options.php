<?php
	/**
	 * Returns editable options for the Starter theme.
	 *
	 * @see OnpSL_ThemeManager::getEditableOptions
	 *
	 * @since 3.3.3
	 * @return mixed[]
	 */
	function onp_sl_get_input_popup_theme_editable_options()
	{

		return array(
			array(
				__('Верхняя часть окна', 'bizpanda'),
				'top-box',
				array(

					// accordion
					array(
						'type' => 'accordion',
						'items' => array(

							// background
							array(
								'type' => 'accordion-item',
								'title' => __('Background', 'bizpanda'),
								'items' => array(
									array(
										'type' => 'control-group',
										'name' => 'background_type',
										'default' => 'color',
										'items' => array(
											array(
												'type' => 'control-group-item',
												'title' => __('Color', 'bizpanda'),
												'name' => 'color',
												'items' => array(
													array(
														'type' => 'color-and-opacity',
														'name' => 'background_color',
														'title' => __('Set up color and opacity:', 'bizpanda'),
														'default' => array('color' => '#365899', 'opacity' => 100)
													)
												)
											),
											array(
												'type' => 'control-group-item',
												'title' => __('Gradient', 'bizpanda'),
												'name' => 'gradient',
												'items' => array(
													array(
														'type' => 'gradient',
														'name' => 'background_gradient',
														'title' => __('Set up gradient:', 'bizpanda')
													)
												)
											),
											array(
												'type' => 'control-group-item',
												'title' => __('Pattern', 'bizpanda'),
												'name' => 'image',
												'items' => array(
													array(
														'type' => 'pattern',
														'name' => 'background_image',
														'title' => __('Set up pattern', 'bizpanda')
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
								'title' => __('Text', 'bizpanda'),
								'items' => array(
									array(
										'type' => 'font',
										'name' => 'header_text',
										'title' => __('Header text', 'bizpanda'),
										'default' => array(
											'size' => 25,
											'family' => 'Arial, "Helvetica Neue", Helvetica, sans-serif',
											'color' => '#fff'
										),
										'units' => 'px'
									),
									array(
										'type' => 'font',
										'name' => 'message_text',
										'title' => __('Message text', 'bizpanda'),
										'default' => array(
											'size' => 15,
											'family' => 'Arial, "Helvetica Neue", Helvetica, sans-serif',
											'color' => '#fff'
										),
										'units' => 'px'
									)
								)
							),
							//  paddings options
							array(
								'type' => 'accordion-item',
								'title' => __('Paddings', 'bizpanda'),
								'items' => array(
									array(
										'type' => 'paddings-editor',
										'name' => 'container_paddings',
										'title' => __('Box paddings', 'bizpanda'),
										'units' => 'px',
										'default' => '20px 0px 40px 40px'
									),
									array(
										'type' => 'integer',
										'name' => 'after_header_margin',
										'way' => 'slider',
										'title' => __('Margin after header', 'bizpanda'),
										'units' => 'px',
										'default' => '0'
									),
									array(
										'type' => 'integer',
										'name' => 'after_message_margin',
										'way' => 'slider',
										'title' => __('Margin after message', 'bizpanda'),
										'units' => 'px',
										'default' => '5'
									),
								)
							)
						)
					)
				)
			),
			array(
				__('Кнопки', 'bizpanda'),
				'middle-box',
				array(
					// accordion
					array(
						'type' => 'accordion',
						'items' => array(

							// background
							array(
								'type' => 'accordion-item',
								'title' => __('Background', 'bizpanda'),
								'items' => array(
									array(
										'type' => 'control-group',
										'name' => 'button_background_type',
										'default' => 'button_layer_color',
										'items' => array(
											array(
												'type' => 'control-group-item',
												'title' => __('Color', 'bizpanda'),
												'name' => 'button_layer_color',
												'items' => array(
													array(
														'type' => 'color-and-opacity',
														'name' => 'button_layer_background_color',
														'title' => __('Set up color and opacity:', 'bizpanda'),
														'default' => array('color' => '#fff', 'opacity' => 1)
													)
												)
											),
											array(
												'type' => 'control-group-item',
												'title' => __('Gradient', 'bizpanda'),
												'name' => 'button_layer_gradient',
												'items' => array(
													array(
														'type' => 'gradient',
														'name' => 'button_layer_background_gradient',
														'title' => __('Set up gradient:', 'bizpanda')
													)
												)
											)
										)
									)
								)
							),
							//  paddings options
							array(
								'type' => 'accordion-item',
								'title' => __('Paddings', 'bizpanda'),
								'items' => array(
									array(
										'type' => 'paddings-editor',
										'name' => 'button_layer_paddings',
										'title' => __('Box paddings', 'bizpanda'),
										'units' => 'px',
										'default' => '10px 10px 10px 10px'
									)
								)
							)
						)
					)
				)
			),
			array(
				__('Нижняя часть окна', 'bizpanda'),
				'bottom-box',
				array(
					// accordion
					array(
						'type' => 'accordion',
						'items' => array(

							// background
							array(
								'type' => 'accordion-item',
								'title' => __('Background', 'bizpanda'),
								'items' => array(
									array(
										'type' => 'control-group',
										'name' => 'bottom_background_type',
										'default' => 'bottom_color',
										'items' => array(
											array(
												'type' => 'control-group-item',
												'title' => __('Color', 'bizpanda'),
												'name' => 'bottom_color',
												'items' => array(
													array(
														'type' => 'color-and-opacity',
														'name' => 'bottom_background_color',
														'title' => __('Set up color and opacity:', 'bizpanda'),
														'default' => array('color' => '#f9f9f9', 'opacity' => 100)
													)
												)
											),
											array(
												'type' => 'control-group-item',
												'title' => __('Gradient', 'bizpanda'),
												'name' => 'bottom_gradient',
												'items' => array(
													array(
														'type' => 'gradient',
														'name' => 'bottom_background_gradient',
														'title' => __('Set up gradient:', 'bizpanda')
													)
												)
											),
											array(
												'type' => 'control-group-item',
												'title' => __('Pattern', 'bizpanda'),
												'name' => 'bottom_image',
												'items' => array(
													array(
														'type' => 'pattern',
														'name' => 'bottom_background_image',
														'title' => __('Set up pattern', 'bizpanda')
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
								'title' => __('Text', 'bizpanda'),
								'items' => array(
									array(
										'type' => 'font',
										'name' => 'bottom_link_text',
										'title' => __('Текст ссылки (Я с Вами)', 'bizpanda'),
										'default' => array(
											'size' => 15,
											'family' => 'Arial, "Helvetica Neue", Helvetica, sans-serif',
											'color' => '#a2a0a0'
										),
										'units' => 'px'
									),
									array(
										'type' => 'checkbox',
										'way' => 'buttons',
										'name' => 'bottom_link_underline',
										'title' => __('Убрать подчеркивание', 'bizpanda'),
										'default' => 0
									),
									array(
										'type' => 'font',
										'name' => 'bottom_timer_text',
										'title' => __('Текст таймера', 'bizpanda'),
										'default' => array(
											'size' => 15,
											'family' => 'Arial, "Helvetica Neue", Helvetica, sans-serif',
											'color' => '#a2a0a0'
										),
										'units' => 'px'
									)
								)
							),
							//  paddings options
							array(
								'type' => 'accordion-item',
								'title' => __('Paddings', 'bizpanda'),
								'items' => array(
									array(
										'type' => 'paddings-editor',
										'name' => 'bottom_container_paddings',
										'title' => __('Box paddings', 'bizpanda'),
										'units' => 'px',
										'default' => '10px 20px 10px 20px'
									)
								)
							)
						)
					)
				)
			)
		);
	}