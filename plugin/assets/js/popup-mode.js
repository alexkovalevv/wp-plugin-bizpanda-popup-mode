/*!
 * Popup mode addon - v1.0.4, 2017-10-25 
 * for Social Locker platform: Russian site: https://sociallocker.ru,
 * English sites: https://sociallocker.org, http://byonepress.com 
 * 
 * Copyright 2017, Alex Kovalev <alex.kovalevv@gmail.com> 
 * Webcraftic (c) 2017 
 * Support: Russian support: https://sociallocker.ru/create-ticket/,
 * English support: http://support.byonepress.com/ 
 * 
 * This modification allows the use of conventional locks in the pop-up window mode.
*/
/**
 * Расширенные настройки темы darkness
 * @author Alex Kovalev <alex.kovalevv@gmail.com>
 * @copyright Alex Kovalev 15.05.2017
 * @version 1.0
 *
 * @!jsObfuscate:false
 * @!preprocess:false
 * @!priority:10
 * @!uglify:true
 * @!lang:[]
 * @!build:['popup-mode']
 */


(function($) {
	'use strict';

	if( !$.pandalocker.themes ) {
		$.pandalocker.themes = {};
	}

	// Theme: darkness

	$.pandalocker.themes['darkness'] = {
		socialButtons: {
			style: 'flip',
			layout: 'horizontal',
			counter: true,
			flip: true
		},
		connectButtons: {
			style: 'dark-force',
			hoverAnimation: 'none'
		}
	};

})(jQuery);

/**
 * Расширенные настройки темы download
 * @author Alex Kovalev <alex.kovalevv@gmail.com>
 * @copyright Alex Kovalev 15.05.2017
 * @version 1.0
 *
 * @!jsObfuscate:false
 * @!preprocess:false
 * @!priority:10
 * @!uglify:true
 * @!lang:[]
 * @!build:['popup-mode']
 */


(function($) {
	'use strict';

	if( !$.pandalocker.themes ) {
		$.pandalocker.themes = {};
	}

	// Theme: download

	$.pandalocker.themes['download'] = {
		socialButtons: {
			style: 'flip',
			layout: 'horizontal',
			counter: true,
			flip: true
		},
		connectButtons: {
			style: 'dark-force',
			hoverAnimation: 'none'
		}
	};

})(jQuery);

/**
 * Расширенные настройки темы facebook
 * @author Alex Kovalev <alex.kovalevv@gmail.com>
 * @copyright Alex Kovalev 15.05.2017
 * @version 1.0
 *
 * @!jsObfuscate:false
 * @!preprocess:false
 * @!priority:10
 * @!uglify:true
 * @!lang:[]
 * @!build:['popup-mode']
 */


(function($) {
	'use strict';

	if( !$.pandalocker.themes ) {
		$.pandalocker.themes = {};
	}

	// Theme: facebook

	$.pandalocker.themes['facebook'] = {
		socialButtons: {
			style: 'flip',
			animation: {
				type: 'none',
				infinite: false
			},
			layout: 'horizontal',
			counter: true,
			flip: false
		},
		connectButtons: {
			style: 'dark-force',
			hoverAnimation: 'none'
		}
	};

})(jQuery);

/**
 * Расширенные настройки темы gifts
 * @author Alex Kovalev <alex.kovalevv@gmail.com>
 * @copyright Alex Kovalev 15.05.2017
 * @version 1.0
 *
 * @!jsObfuscate:false
 * @!preprocess:false
 * @!priority:10
 * @!uglify:true
 * @!lang:[]
 * @!build:['popup-mode']
 */


(function($) {
	'use strict';

	if( !$.pandalocker.themes ) {
		$.pandalocker.themes = {};
	}

	// Theme: gifts

	$.pandalocker.themes['gifts'] = {
		socialButtons: {
			style: 'flip',
			layout: 'horizontal',
			counter: true,
			flip: true
		},
		connectButtons: {
			style: 'dark-force',
			hoverAnimation: 'none'
		}
	};

	/**
	 * Устанавливаем настройки по умолчанию
	 */
	$.pandalocker.hooks.add('opanda-filter-options', function(options, locker) {
		if( typeof options.theme === 'object' && options.theme.name == 'gifts' ) {
			if( options.stepToStep ) {
				if( options.groups && options.groups.order && options.groups.order.length > 2 ) {
					var fistGroup = options.groups.order[0];
					options.groups.order.length = 0;
					options.groups.order.push(fistGroup);

					console.log('Gifts theme is not supported step to step mode.');
				}
				delete options.stepToStep;
			}
		}
		return options;
	});

})(jQuery);

/**
 * Расширенные настройки темы glasscase
 * @author Alex Kovalev <alex.kovalevv@gmail.com>
 * @copyright Alex Kovalev 15.05.2017
 * @version 1.0
 *
 * @!jsObfuscate:false
 * @!preprocess:false
 * @!priority:10
 * @!uglify:true
 * @!lang:[]
 * @!build:['popup-mode']
 */


(function($) {
	'use strict';

	if( !$.pandalocker.themes ) {
		$.pandalocker.themes = {};
	}

	// Theme: glasscase

	$.pandalocker.themes['glasscase'] = {
		socialButtons: {
			style: 'flip',
			layout: 'horizontal',
			counter: true,
			flip: true
		},
		connectButtons: {
			style: 'dark-force',
			hoverAnimation: 'none'
		}
	};

})(jQuery);

/**
 * Регистрация новых и оптимизации старых тем
 * @author Alex Kovalev <alex.kovalevv@gmail.com>
 * @copyright Alex Kovalev 13.05.2017
 * @version 1.0
 *
 * @!jsObfuscate:false
 * @!preprocess:false
 * @!priority:10
 * @!uglify:true
 * @!lang:[]
 * @!build:['popup-mode']
 */

(function($) {
	'use strict';

	if( !$.pandalocker.themes ) {
		$.pandalocker.themes = {};
	}

	$.pandalocker.hooks.add('opanda-filter-default-options', function(options, locker) {
		// Обновление старых тем.
		var currentThemeName = typeof locker.options.theme === 'object' && locker.options.theme.name ?
		                       locker.options.theme.name : null;
		if( !currentThemeName ) {
			currentThemeName = typeof locker.options.theme === 'string' && locker.options.theme
				? locker.options.theme
				: null;
		}

		var updatedThems = ['dark-force', 'great-attractor', 'friendly-giant', 'facebook'];

		if( updatedThems.indexOf(currentThemeName) > -1 ) {

			if( currentThemeName == 'dark-force' ) {
				// Theme: Dark Force
				$.pandalocker.themes['dark-force'] = {
					socialButtons: {
						layout: 'horizontal',
						counter: true,
						flip: true
					},
					theme: {
						fonts: [
							{
								name: 'Montserrat',
								styles: ['400', '700']
							}
						]
					}
				};
			} else if( currentThemeName == 'friendly-giant' ) {
				// Theme: Friendly Giant

				$.pandalocker.themes['friendly-giant'] = {
					socialButtons: {
						layout: 'horizontal',
						counter: true,
						flip: true
					},
					theme: {
						fonts: [
							{
								name: 'Open Sans',
								styles: ['400', '700']
							}
						]
					}
				};
			} else {
				$.pandalocker.themes[currentThemeName] = {
					socialButtons: {
						layout: 'horizontal',
						counter: true,
						flip: true
					}
				};
			}
		}

		return options;
	});

})(jQuery);

/**
 * Набор модификаций для расширения возможностей основного плагина.
 * В данном наборе присутсвует возможность использования popup окнон и анимации для кнопок
 * и диалоговых окон.
 *
 * @!jsObfuscate:false
 * @!preprocess:false
 * @!uglify:true
 * @!priority:0
 * @!lang:[]
 * @!build:['popup-mode']
 */

(function($) {
	'use strict';

	/**
	 * Функция проверяет поддерживает ли браузера css3 анимацию или нет
	 * @returns {boolean}
	 */
	$.pandalocker.tools.isAnimationSupport = function() {
		var animation = false,
			animationstring = 'animation',
			keyframeprefix = '',
			domPrefixes = 'Webkit Moz O ms Khtml'.split(' '),
			pfx = '',
			elm = document.createElement('div');

		if( elm.style.animationName !== undefined ) {
			animation = true;
		}

		if( animation === false ) {
			for( var i = 0; i < domPrefixes.length; i++ ) {
				if( elm.style[domPrefixes[i] + 'AnimationName'] !== undefined ) {
					pfx = domPrefixes[i];
					animationstring = pfx + 'Animation';
					keyframeprefix = '-' + pfx.toLowerCase() + '-';
					animation = true;
					break;
				}
			}
		}

		return animation;
	};

	/**
	 * Базовы предустановки, перед инициализацией ядра
	 */
	$.pandalocker.hooks.add('opanda-init', function(e, locker) {

		// --------------------------------------------------------------------------------------
		// Lock/Unlock content.
		// --------------------------------------------------------------------------------------

		locker._lock = function(sender) {
			var self = locker;

			if( locker._isLocked ) {
				return;
			}

			var lockerShowDelay = self.options.locker.showDelay || 0;

			setTimeout(function() {
				if( !self._markupIsCreated ) {
					self._createMarkup();
				}

				self.runHook('before-lock');

				if( !self.overlap ) {
					self.element.hide();
					if( $.pandalocker.tools.isAnimationSupport() ) {
						self.locker.show();
					} else {
						self.locker.fadeIn(1000);
					}

				} else {
					// Если анимация поддерживается браузером, показываем с анимацией,
					// если нет, то просто показываем без анимации
					if( $.pandalocker.tools.isAnimationSupport() ) {
						// Мы изменили способ анимации для выхода замка
						self.overlapLockerBox.show();
						self._updateLockerPosition();
					} else {
						self.overlapLockerBox.fadeIn(1000, function() {
							self._updateLockerPosition();
						});
						self._updateLockerPosition();
					}
				}

				self._isLocked = true;

				self.runHook('lock');
				self.runHook('locked');

				setTimeout(function() {
					self._startTrackVisability();
				}, 1500);
			}, lockerShowDelay);
		};

	});

	/**
	 * Промежуточная анимация
	 */
	$.pandalocker.hooks.add('opanda-before-lock', function(e, locker) {

		if( typeof locker.options.theme === 'object' ) {
			var theme = locker.options.theme;

			// Добавляем эффекты анимации для всплпывающих окон
			if( theme.animation && theme.animation.type != '' ) {
				if( theme.animation != 'none' ) {
					if( locker.overlap ) {
						if( locker.fullscreenMode ) {
							locker.overlapBox.addClass('onp-sl-popup-mode');
						}

						locker.overlapLockerBox.addClass('animated ' + theme.animation.type);
					} else {

						locker.locker.addClass('animated ' + theme.animation.type);
					}
				}
			}

			if( !theme.connectButtons ) {
				theme.connectButtons = {};
			}

			var connectButtonsStyle = theme.connectButtons.style || 'dark-force';
			var connectButtonsSize = theme.connectButtons.size || 'big';

			if( ['big', 'medium', 'small'].indexOf(connectButtonsSize) < 0 ) {
				connectButtonsSize = 'big';
			}

			// Добавляем стиль кнопок авторизации
			locker.locker.find('.onp-sl-connect-buttons')
				.addClass('onp-sl-connect-buttons-style-' + connectButtonsStyle)
				.addClass('onp-sl-buttons-size-' + connectButtonsSize);

			// Добавляем эффекты анимации для кнопок авторизации
			if( theme.connectButtons.hoverAnimation && theme.connectButtons.hoverAnimation != 'none' ) {
				var connectControl = locker.locker.find('.onp-sl-connect-buttons').find('.onp-sl-control');

				connectControl.addClass('hvr-' + theme.connectButtons.hoverAnimation);
			}

		}

		var animationDelay = 50;

		/*locker.locker.find('.onp-sts-progress-line').each(function() {
		 animationDelay = animationDelay + 200;
		 $(this).find('.onp-sts-step-mark').css('animation-delay', animationDelay + 'ms');
		 $(this).find('.onp-sts-step-mark').addClass('animated flipInY');
		 });*/
	});

	/**
	 * Анимация кнопок после их загрузки
	 */
	/*$.pandalocker.hooks.add('opanda-remove-loading-state', function(e, locker, sender) {

	 });*/

	//$.pandalocker.hooks.add('opanda-filter-options', function(options, locker) {

	// Обновление старых тем.
	/*var currentThemeName = typeof options.theme === 'object' && options.theme.name ?
	 options.theme.name : null;
	 if( !currentThemeName ) {
	 currentThemeName = typeof options.theme === 'string' && options.theme ? options.theme : null;
	 }
	 if( currentThemeName === 'facebook' ) {
	 if( !options.socialButtons ) {
	 options.socialButtons = {};
	 }

	 if( typeof options.theme !== 'object' ) {
	 var themeName = options.theme;
	 options.theme = {};
	 options.theme['name'] = themeName;
	 }

	 if( options.theme.thanksLink === null || options.theme.thanksLink === undefined ) {
	 options.theme['thanksLink'] = true;
	 }

	 if( !options.theme.thanksText ) {
	 options.theme['thanksText'] = "Спасибо, я уже с Вами!";
	 }
	 }*/

	//return options;
	//});

	/*$.pandalocker.hooks.add('opanda-functions-requesting-state', function(checkFunctions, locker) {
	 checkFunctions.push(function(callback) {
	 var storage = locker._getStateStorage();
	 callback(storage.isUnlocked('onp-sl-popup-locker') ? "unlocked" : "locked");
	 });
	 return checkFunctions;
	 });*/

	/*$.pandalocker.hooks.add('opanda-before-lock', function(e, locker, sender) {
	 if( locker.options.stepToStep ) {
	 return;
	 }
	 if( typeof locker.options.theme === 'object' && locker.options.theme.name === 'facebook' ) {
	 var wrapThanksLink = $('<div class="onp-sl-wrap-thanks-link">');

	 if( typeof locker.options.theme === 'object' && locker.options.theme.thanksLink ) {

	 var isWrapThanksLink = locker.locker.find('.onp-sl-wrap-thanks-link').length;

	 if( !isWrapThanksLink ) {
	 locker.locker.find('.onp-sl-group-inner-wrap').after(wrapThanksLink);
	 }

	 var thanksText = locker.options.theme.thanksText || null;
	 var thanksLink = $('<a href="#" class="onp-sl-thanks-link">' + thanksText + '</a>');

	 var isThanksLink = locker.locker.find('.onp-sl-thanks-link').length;
	 if( !isThanksLink ) {
	 wrapThanksLink.append(thanksLink);
	 }

	 locker.locker.find(thanksLink).click(function() {
	 var storage = locker._getStateStorage();
	 storage.setState('onp-sl-popup-locker', 'unlocked');
	 locker._unlock("popup");
	 return false;
	 });
	 } else {
	 locker.locker.find('.onp-sl-group-inner-wrap').css({
	 paddingBottom: "50px"
	 });
	 }

	 locker.addHook('open-control-error-message', function() {
	 $('.onp-sl-timer', locker.locker).toggle();
	 });
	 }
	 });*/

	/*$.pandalocker.hooks.add('opanda-lock', function(e, locker, sender) {
	 console.log('dsf');
	 locker._showScreen('data-processing');
	 $('.onp-sl-timer', locker.locker).hide();
	 });*/
})(jQuery);
