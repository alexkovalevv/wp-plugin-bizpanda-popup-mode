(function($) {
	tinymce.PluginManager.add('bizpanda_evolution_addon', function(editor, url) {
		var menuCreated = false;

		var menu = [];

		editor.addButton('bizpanda_evolution_addon', {
			title: bizpanda_evolution_shortcode_title,
			type: 'menubutton',
			icon: 'icon onp-bzda-adn-events-shortcode-icon',
			menu: menu,

			/*
			 * After rendeing contol, starts to load manu items (locker shortcodes).
			 */
			onpostrender: function(e) {

				if( menuCreated ) {
					return;
				}
				menuCreated = true;

				var self = this;

				var req = $.ajax(ajaxurl, {
					type: 'post',
					dataType: 'json',
					data: {
						action: 'get_opanda_lockers'
					},
					success: function(data, textStatus, jqXHR) {

						$.each(data, function(index, item) {
							if( item.userTrigger ) {
								menu.push({
									text: item.title,
									value: item.id,
									onclick: function() {
										editor.selection.setContent('[bizpanda_open_locker locker_id=' + item.id + ']' + editor.selection.getContent() + '[/bizpanda_open_locker]');
									}
								});
							}
						});

						if( !menu.length ) {
							menu.push({
								value: 0,
								text: bizpanda_evolution_not_found_text
							});
						}

						self.settings.menu = menu;
					}
				});
			}
		});

	});
})(jQuery);