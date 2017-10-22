<?php
	/**
	 * Добавляет метабокс с настройками режимов
	 * @author Alex Kovalev <alex.kovalevv@gmail.com>
	 * @copyright Alex Kovalev 27.04.2017
	 * @version 1.0
	 */

	/**
	 * The class configure the metabox Social Options.
	 *
	 * @since 1.0.0
	 */
	class BZDA_POPUPS_ADN_SettingModsMetabox extends FactoryMetaboxes000_FormMetabox {

		/**
		 * A visible title of the metabox.
		 *
		 * Inherited from the class FactoryMetabox.
		 * @link http://codex.wordpress.org/Function_Reference/add_meta_box
		 *
		 * @since 1.0.0
		 * @var string
		 */
		public $title;

		/**
		 * A prefix that will be used for names of input fields in the form.
		 *
		 * Inherited from the class FactoryFormMetabox.
		 *
		 * @since 1.0.0
		 * @var string
		 */
		public $scope = 'opanda';

		/**
		 * The priority within the context where the boxes should show ('high', 'core', 'default' or 'low').
		 *
		 * @link http://codex.wordpress.org/Function_Reference/add_meta_box
		 * Inherited from the class FactoryMetabox.
		 *
		 * @since 1.0.0
		 * @var string
		 */
		public $priority = 'core';

		public $cssClass = 'factory-bootstrap-000 factory-fontawesome-000';

		public function __construct($plugin)
		{
			parent::__construct($plugin);

			$this->title = __('Настройка режимов', 'bizpanda-popups-addon');
		}

		/**
		 * Configures a metabox.
		 */
		public function configure($scripts, $styles)
		{
			$scripts->add(BZDA_POPUPS_ADN_PLUGIN_URL . '/admin/assets/js/addon.bulk-lock.js');
		}

		/**
		 * Configures a form that will be inside the metabox.
		 *
		 * @see FactoryMetaboxes000_FormMetabox
		 * @since 1.0.0
		 *
		 * @param FactoryForms000_Form $form A form object to configure.
		 * @return void
		 */
		public function form($form)
		{
			global $post, $bizpanda_popups_addon;

			$items[] = array(
				'type' => 'dropdown',
				'way' => 'buttons',
				'name' => 'lock_mode',
				'data' => array(
					array(
						'inline',
						'<i class="fa fa-indent" aria-hidden="true"></i>' . __('Внутри страницы (стандартно)', 'bizpanda-popups-addon')
					),
					array(
						'fullscreen',
						'<i class="fa fa-window-maximize" aria-hidden="true"></i>' . __('Страницу целиком (попап)', 'bizpanda-popups-addon'),
						sprintf(__('Чтобы настроить этот режим, откройте <a href="#onp-sl-bulk-lock-modal" class="onp-sl-activate-fullscreen-tab" role="button" data-toggle="factory-modal">настройки массовой блокировки</a>.', 'bizpanda-popups-addon'))
					)
				),
				'title' => __('Как скрывать контент?', 'bizpanda-popups-addon'),
				'hint' => __('Выберите режим, каким образом вам нужно заблокировать контент. Выбрав режим "внутренний контент", замок будет блокировать контент только внутри ваших статей или частей сайта. Режим "скрыть всю страницу", позволяет заблокировать всю страницу целиком.', 'bizpanda-popups-addon'),
				'default' => 'inline',
				'events' => $bizpanda_popups_addon->isPluginLoaded()
					? array(
						'inline' => array(
							'show' => '#OPanda_ManualLockingMetaBox, .factory-control-ajax',
							'hide' => '#onp-sl-fullscreen-lock-options',
							'detach' => '#onp-sl-bulk-locking-way-selector .fullscreen-lock',
							'addClasses' => array(
								'#onp-sl-bulk-locking-way-selector .skip-lock' => 'active',
								'.onp-sl-bulk-locking-options' => 'hide'
							),
							'removeClasses' => array(
								'#onp-sl-bulk-locking-way-selector .skip-lock' => 'disabled',
								'#onp-sl-bulk-locking-way-selector .css-selector' => 'disabled active',
								'#onp-sl-bulk-locking-way-selector .more-tag' => 'disabled active',
								'#onp-sl-bulk-locking-way-selector .fullscreen-lock' => 'active',
								'#onp-sl-skip-lock-options' => 'hide'
							),
						),
						'fullscreen' => array(
							'show' => '#onp-sl-fullscreen-lock-options',
							'hide' => '#OPanda_ManualLockingMetaBox, .factory-control-ajax',
							'recovery' => '#onp-sl-bulk-locking-way-selector .fullscreen-lock',
							'addClasses' => array(
								'#onp-sl-bulk-locking-way-selector .fullscreen-lock' => 'active',
								'.onp-sl-bulk-locking-options' => 'hide',
								'#onp-sl-bulk-locking-way-selector .skip-lock' => 'disabled',
								'#onp-sl-bulk-locking-way-selector .css-selector' => 'disabled',
								'#onp-sl-bulk-locking-way-selector .more-tag' => 'disabled'
							),
							'removeClasses' => array(
								'#onp-sl-bulk-locking-way-selector .skip-lock' => 'active',
								'#onp-sl-bulk-locking-way-selector .css-selector' => 'active',
								'#onp-sl-bulk-locking-way-selector .more-tag' => 'active',
								'#onp-sl-fullscreen-lock-options' => 'hide'
							),

						)
					)
					: array(
						'inline' => array(
							'addClasses' => array(
								'#onp-sl-bulk-locking-way-selector .fullscreen-lock, .factory-control-lock_mode button, .factory-control-open_locker_trigger button, .factory-control-open_locker_way button' => 'disabled',
							)
						),
						'fullscreen' => array(
							'addClasses' => array(
								'#onp-sl-bulk-locking-way-selector .fullscreen-lock, .factory-control-lock_mode button, .factory-control-open_locker_trigger button, .factory-control-open_locker_way button' => 'disabled',
							)
						)
					)
			);

			$items[] = array(
				'type' => 'dropdown',
				'way' => 'buttons',
				'name' => 'open_locker_trigger',
				'data' => array(
					array(
						'visible',
						'<i class="fa fa-eye" aria-hidden="true"></i>' . __('Просмотр', 'bizpanda-popups-addon')
					),
					array(
						'adblock',
						'<i class="fa fa-ban" aria-hidden="true"></i>' . __("Блокировщик рекламы", 'bizpanda-popups-addon')
					),
					array(
						'click',
						'<i class="fa fa-bullseye"></i>' . __('Нажатие', 'bizpanda-popups-addon')
					),
					array(
						'hover',
						'<i class="fa fa-mouse-pointer" aria-hidden="true"></i>' . __('Наведение', 'bizpanda-popups-addon')
					)
				),
				'title' => __('Выберите событие, когда должен появится замок', 'bizpanda-popups-addon'),
				'hint' => __('Выбрав событие, например "нажатие", замок появится на странице, только после нажатие на установленный вами объект (кнопку, ссылку и прочее). Также замок может быть вызван, если у пользователя включен блокировщик рекламы.', 'bizpanda-popups-addon'),
				'default' => 'visible',
				'events' => array(
					'visible' => array(
						'hide' => '#onp-bzda-adn-user-trigger-options'
					),
					'click' => array(
						'show' => '#onp-bzda-adn-user-trigger-options',
					),
					'hover' => array(
						'show' => '#onp-bzda-adn-user-trigger-options'
					),
					'adblock' => array(
						'hide' => '#onp-bzda-adn-user-trigger-options'
					)
				)
			);
			$items[] = array(
				'type' => 'div',
				'id' => 'onp-bzda-adn-user-trigger-options',
				'items' => array(
					array(
						'type' => 'dropdown',
						'way' => 'buttons',
						'name' => 'open_locker_way',
						'data' => array(
							array(
								'shortcode',
								'<i class="fa fa-code" aria-hidden="true"></i>' . __('Через шорткод', 'bizpanda-popups-addon'),
								sprintf(__('Чтобы установить событие для объекта, нужно обернуть его шорткодом.', 'bizpanda-popups-addon'))
							),
							array(
								'css_selector',
								'<i class="fa fa-css3" aria-hidden="true"></i>' . __('Через css селектор', 'bizpanda-popups-addon'),
								sprintf(__('При нажатии или наведении на выбранный с помощью css селектора объект, содержание страницы будет заблокировано.', 'bizpanda-popups-addon'))
							)
						),
						'title' => __('Как установить событие?', 'bizpanda-popups-addon'),
						'hint' => __('Вы можете разместить ссылку с событием всплывающего окна двумя способами. Первый это простой шорткод, который вы сможете вставть в любом месте статьи или виджета. Второй способ более сложный, но и более удобный. Вы можете присвоить событие всплывающего окна для всех ссылок размещенных на странице без вставки шорткодов.', 'bizpanda-popups-addon'),
						'default' => 'shortcode',
						'events' => array(
							'shortcode' => array(
								'show' => '#onp-bzda-adn-way-lock-simple-shortcode',
								'hide' => '#onp-bzda-adn-way-lock-css-selector'
							),
							'css_selector' => array(
								'hide' => '#onp-bzda-adn-way-lock-simple-shortcode',
								'show' => '#onp-bzda-adn-way-lock-css-selector'
							)
						)
					),
					array(
						'type' => 'div',
						'id' => 'onp-bzda-adn-way-lock-simple-shortcode',
						'items' => array(
							array(
								'type' => 'textbox',
								'name' => 'generated_shortcode',
								'title' => __('Пример шорткода', 'bizpanda-popups-addon'),
								'hint' => __('Этот пример шорткода, который вы можете включить в контент вашей страницы. Оберните ссылку, кнопку или картинку, как в примере выше, чтобы установить для нее событие вызова окна с замком.', 'bizpanda-popups-addon'),
								'value' => '[bizpanda_open_locker locker_id="' . $post->ID . '"]<a href="#">' . __('Текст ссылки', 'bizpanda-popups-addon') . '</a>[/bizpanda_open_locker]',
								'htmlAttrs' => array('disabled' => 'disabled')
							)
						)
					),
					array(
						'type' => 'div',
						'id' => 'onp-bzda-adn-way-lock-css-selector',
						'items' => array(
							array(
								'type' => 'textbox',
								'name' => 'open_locker_selector',
								'title' => __('Css селектор', 'bizpanda-popups-addon'),
								'hint' => __('Введите css селектор ссылки или кнопки. Например: "#somecontent .my-class, .my-another-class"', 'bizpanda-popups-addon')
							)
						)
					)
				)
			);

			$form->add($items);
		}
	}

	global $bizpanda;

	FactoryMetaboxes000::register('BZDA_POPUPS_ADN_SettingModsMetabox', $bizpanda);
	/*@mix:place*/
