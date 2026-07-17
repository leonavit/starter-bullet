(function ($) {
	'use strict';

	$(document).on('click', '.sb-upload-image', function (e) {
		e.preventDefault();

		const targetId = $(this).data('target');
		const input = $('#' + targetId);
		const preview = $(this).closest('.sb-media-field').find('.sb-media-preview');

		const frame = wp.media({
			title: 'בחר תמונה',
			button: { text: 'השתמש בתמונה' },
			multiple: false,
		});

		frame.on('select', function () {
			const attachment = frame.state().get('selection').first().toJSON();
			input.val(attachment.id);
			preview.html('<img src="' + attachment.url + '" style="max-width:120px;height:auto;border-radius:4px;">');
		});

		frame.open();
	});

	$(document).on('click', '.sb-remove-image', function (e) {
		e.preventDefault();
		const targetId = $(this).data('target');
		$('#' + targetId).val('');
		$(this).closest('.sb-media-field').find('.sb-media-preview').empty();
	});

	$(document).on('click', '.sb-icon-picker__option', function (e) {
		e.preventDefault();

		const $btn = $(this);
		const targetId = $btn.data('target');
		const selectedStyle =
			'border:2px solid #2271b1;background:#f0f6fc;box-shadow:0 0 0 1px #2271b1;';
		const baseStyle =
			'display:inline-flex;align-items:center;justify-content:center;width:44px;height:44px;padding:0;';

		$('#' + targetId).val($btn.data('value'));

		$btn
			.closest('.sb-icon-picker')
			.find('.sb-icon-picker__option')
			.removeClass('sb-icon-picker__option--selected')
			.attr('aria-pressed', 'false')
			.attr('style', baseStyle);

		$btn
			.addClass('sb-icon-picker__option--selected')
			.attr('aria-pressed', 'true')
			.attr('style', baseStyle + selectedStyle);
	});
})(jQuery);
