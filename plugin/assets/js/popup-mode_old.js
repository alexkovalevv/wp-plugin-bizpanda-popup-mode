/**
 * @!jsObfuscate:false
 * @!preprocess:false
 * @!uglify:true
 * @!priority:0
 * @!lang:[]
 * @!build:['popup_mode']
 */

(function($) {
	'use strict';

	if( !$.pandalocker.themes ) {
		$.pandalocker.themes = {};
	}

	// Theme: facebook

	$.pandalocker.themes['facebook'] = {
		socialButtons: {
			layout: 'horizontal',
			counter: true,
			flip: false
		}
	};

	// Theme: glasscase

	$.pandalocker.themes['glasscase'] = {
		socialButtons: {
			layout: 'horizontal',
			counter: true,
			flip: true
		}
	};

	// Theme: download

	$.pandalocker.themes['download'] = {
		socialButtons: {
			layout: 'horizontal',
			counter: true,
			flip: true
		}
	};

	// Theme: darkness

	$.pandalocker.themes['darkness'] = {
		socialButtons: {
			layout: 'horizontal',
			counter: true,
			flip: true
		}
	};

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
	});

	$.pandalocker.hooks.add('opanda-filter-options', function(options, locker) {

		// Обновление старых тем.
		var currentThemeName = typeof options.theme === 'object' && options.theme.name ?
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
		}
		return options;
	});

	$.pandalocker.hooks.add('opanda-functions-requesting-state', function(checkFunctions, locker) {
		checkFunctions.push(function(callback) {
			var storage = locker._getStateStorage();
			callback(storage.isUnlocked('onp-sl-popup-locker') ? "unlocked" : "locked");
		});
		return checkFunctions;
	});

	$.pandalocker.hooks.add('opanda-before-lock', function(e, locker, sender) {
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
	});

	/*$.pandalocker.hooks.add('opanda-lock', function(e, locker, sender) {
	 console.log('dsf');
	 locker._showScreen('data-processing');
	 $('.onp-sl-timer', locker.locker).hide();
	 });*/
})(jQuery);
