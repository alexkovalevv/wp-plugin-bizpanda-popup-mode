<?php
	/**
	 * Настройки форм для редактор тем
	 * @author Alex Kovalev <alex.kovalevv@gmail.com>
	 * @copyright Alex Kovalev 10.05.2017
	 * @version 1.0
	 */

	return array(
		__('SignIn Buttons', 'bizpanda-popups-addon'),
		'signin-buttons',
		array(
			// accordion
			array(
				'type' => 'accordion',
				'items' => array(

					// background options
					array(
						'type' => 'accordion-item',
						'title' => __('Cover Backgrounds', 'bizpanda-popups-addon'),
						'items' => array(
							array(
								'type' => 'color',
								'name' => 'signin_button_cover_twitter_color',
								'title' => __('Twitter cover color', 'bizpanda-popups-addon'),
								'default' => '#4086cc'
							),
							array(
								'type' => 'color',
								'name' => 'signin_button_cover_facebook_color',
								'title' => __('Facebook cover color', 'bizpanda-popups-addon'),
								'default' => '#3c5a9a'
							),
							array(
								'type' => 'color',
								'name' => 'signin_button_cover_google_color',
								'title' => __('Google cover color', 'bizpanda-popups-addon'),
								'default' => '#ca4639'
							),
							array(
								'type' => 'color',
								'name' => 'signin_button_cover_linkedin_color',
								'title' => __('LinkedIn cover color', 'bizpanda-popups-addon'),
								'default' => '#286b8d'
							)
						)
					),
					// font options
					array(
						'type' => 'accordion-item',
						'title' => __('Cover Text', 'bizpanda-popups-addon'),
						'items' => array(
							array(
								'type' => 'font',
								'name' => 'signin_button_cover_text_font',
								'title' => __('Font', 'bizpanda-popups-addon'),
								'default' => array(
									'size' => 15,
									'family' => 'Montserrat, "Segoe UI", "Helvetica Neue", Arial, sans-serif',
									'color' => '#ffffff'
								),
								'units' => 'px'
							)
						)
					)
				)
			)
		)
	);