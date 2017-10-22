(function($) {

	$(document).on('onp-bizpanda-cancel-bulk-lock onp-bizpanda-save-bulk-lock', function() {
		checkBulkLockMode();
	});

	function checkBulkLockMode() {
		var setupSection = $('#OPanda_BulkLockingMetaBox').find('.onp-sl-setup-section');

		if( setupSection.hasClass('onp-sl-has-options-state') ) {
			$('.factory-control-lock_mode').find('button').addClass('disabled');
		} else {
			$('.factory-control-lock_mode').find('button').removeClass('disabled');
		}
	}

	checkBulkLockMode();

	$('#opanda_style').change(function() {
		var themes = [
			'facebook',
			'download',
			'darkness',
			'glasscase'
		];
		var currentStyle = $(this).val();
		var currentOverlapMode = $('#opanda_overlap').val();

		if( themes.indexOf(currentStyle) > -1 && currentOverlapMode != 'transparence' ) {
			var overlapControl = $('.factory-buttons-way');
			overlapControl.find('.btn-default').removeClass('active');
			overlapControl.find('.factory-transparence').addClass('active');
			$('#opanda_overlap').val('transparence').change();
		}
	});

})(jQuery);