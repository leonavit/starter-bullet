(function ($) {
	'use strict';

	$(function () {
		if ($.fn.wpColorPicker) {
			$('.sb-color-picker').wpColorPicker();
		}
	});

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

	$(document).on('click', '.sb-upload-video', function (e) {
		e.preventDefault();

		const targetId = $(this).data('target');
		const input = $('#' + targetId);
		const preview = $(this).closest('.sb-media-field').find('.sb-media-preview');

		const frame = wp.media({
			title: 'בחר וידאו',
			button: { text: 'השתמש בוידאו' },
			library: { type: 'video' },
			multiple: false,
		});

		frame.on('select', function () {
			const attachment = frame.state().get('selection').first().toJSON();
			input.val(attachment.id);
			preview.html('<code>' + attachment.filename + '</code>');
		});

		frame.open();
	});

	$(document).on('click', '.sb-remove-image', function (e) {
		e.preventDefault();
		const targetId = $(this).data('target');
		$('#' + targetId).val('');
		$(this).closest('.sb-media-field').find('.sb-media-preview').empty();
	});

	$(document).on('click', '.sb-section-toggle', function (e) {
		e.preventDefault();

		const $btn = $(this);
		const $body = $btn.closest('.postbox').find('.form-table').first();
		const isOpen = $btn.attr('aria-expanded') !== 'false';

		$body.toggle(!isOpen);
		$btn.attr('aria-expanded', String(!isOpen)).html(isOpen ? '+' : '&minus;');
	});

	function sbSetSectionState($btn, open) {
		const $body = $btn.closest('.postbox').find('.form-table').first();
		$body.toggle(open);
		$btn.attr('aria-expanded', String(open)).html(open ? '&minus;' : '+');
	}

	$(document).on('click', '.sb-sections-collapse-all', function (e) {
		e.preventDefault();
		$('.sb-section-toggle').each(function () {
			sbSetSectionState($(this), false);
		});
	});

	$(document).on('click', '.sb-sections-expand-all', function (e) {
		e.preventDefault();
		$('.sb-section-toggle').each(function () {
			sbSetSectionState($(this), true);
		});
	});

	$(document).on('click', '.sb-repeater__add', function (e) {
		e.preventDefault();

		const $repeater = $(this).closest('.sb-repeater');
		const baseName = $repeater.data('name');
		const $rows = $repeater.find('.sb-repeater__rows');
		const type = $repeater.data('type');

		// Next free numeric index, so existing rows keep their values.
		let nextIndex = 0;
		$rows.find('.sb-repeater__row').each(function () {
			$(this)
				.find('[name]')
				.each(function () {
					const match = ($(this).attr('name') || '').match(/\[(\d+)\]/);
					if (match) {
						nextIndex = Math.max(nextIndex, parseInt(match[1], 10) + 1);
					}
				});
		});

		if (type === 'icon-items' || type === 'features') {
			const tpl = document.getElementById('sb-icon-items-template') || document.getElementById('sb-feature-card-template');
			if (!tpl) return;

			const section = $repeater.data('section') || 'features';
			const withLink = String($repeater.data('with-link') || '0') === '1';
			const iconId = section + '_item_' + nextIndex + '_icon';
			const iconName = baseName + '[' + nextIndex + '][icon]';
			const urlId = section + '_item_' + nextIndex + '_url';
			const urlName = baseName + '[' + nextIndex + '][url]';
			let html = tpl.innerHTML
				.split('__ICON_NAME__')
				.join(iconName)
				.split('__ICON_ID__')
				.join(iconId)
				.split('__URL_NAME__')
				.join(urlName)
				.split('__URL_ID__')
				.join(urlId);

			const $row = $(html);
			$row.find('[data-field="title"]').attr('name', baseName + '[' + nextIndex + '][title]');
			$row.find('[data-field="desc"]').attr('name', baseName + '[' + nextIndex + '][desc]');
			$row.find('[data-field="lordicon"]').attr('name', baseName + '[' + nextIndex + '][lordicon]');

			if (withLink) {
				$row.find('[data-link-block]').show();
				$row.find('.sb-link-url').attr({ name: urlName, id: urlId }).val('');
				$row.find('.sb-link-source').val('manual').trigger('change');
			} else {
				$row.find('[data-link-block]').remove();
			}

			// Reset icon picker selection to first option (badge default in template).
			const baseStyle =
				'display:inline-flex;align-items:center;justify-content:center;width:44px;height:44px;padding:0;';
			const selectedStyle =
				'border:2px solid #2271b1;background:#f0f6fc;box-shadow:0 0 0 1px #2271b1;';
			$row.find('.sb-icon-picker__option').each(function () {
				const $btn = $(this);
				$btn.attr('data-target', iconId);
				const isBadge = $btn.data('value') === 'badge';
				$btn
					.toggleClass('sb-icon-picker__option--selected', isBadge)
					.attr('aria-pressed', String(isBadge))
					.attr('style', baseStyle + (isBadge ? selectedStyle : ''));
			});
			$row.find('.sb-icon-picker input[type="hidden"]').val('badge');

			$rows.append($row);
			$row.find('[data-field="title"]').trigger('focus');
			return;
		}

		const rowStyle =
			'display:flex;gap:8px;align-items:flex-start;margin-bottom:10px;padding:10px;background:#f6f7f7;border:1px solid #dcdcde;border-radius:4px;';

		const $row = $(
			'<div class="sb-repeater__row" style="' + rowStyle + '">' +
				'<div style="flex:1;">' +
				'<input type="text" class="regular-text" style="width:100%;margin-bottom:6px;" placeholder="כותרת">' +
				'<textarea rows="2" class="large-text" placeholder="תיאור"></textarea>' +
				'</div>' +
				'<button type="button" class="button sb-repeater__remove" aria-label="הסר">&times;</button>' +
				'</div>'
		);

		$row.find('input').attr('name', baseName + '[' + nextIndex + '][title]');
		$row.find('textarea').attr('name', baseName + '[' + nextIndex + '][desc]');

		$rows.append($row);
		$row.find('input').trigger('focus');
	});

	$(document).on('click', '.sb-repeater__remove', function (e) {
		e.preventDefault();
		$(this).closest('.sb-repeater__row').remove();
	});

	$(document).on('change', '.sb-link-source', function () {
		const $wrap = $(this).closest('.sb-link-field');
		const source = $(this).val();
		const $url = $wrap.find('.sb-link-url');

		$wrap.find('.sb-link-items').hide();

		if (source === 'manual') {
			$url.prop('readonly', false).focus();
			return;
		}

		const $items = $wrap.find('.sb-link-items--' + source).show();
		$url.prop('readonly', true);

		const selectedUrl = $items.find('option:selected').attr('data-url') || '';
		if (selectedUrl) {
			$url.val(selectedUrl);
		}
	});

	$(document).on('change', '.sb-link-items', function () {
		const $wrap = $(this).closest('.sb-link-field');
		const selectedUrl = $(this).find('option:selected').attr('data-url') || '';
		if (selectedUrl) {
			$wrap.find('.sb-link-url').val(selectedUrl);
		}
	});

	// Keep URL inputs in sync with the chosen page/post right before save.
	$(document).on('submit', 'form', function () {
		$(this).find('.sb-link-field').each(function () {
			const $wrap = $(this);
			const source = $wrap.find('.sb-link-source').val();
			if (source !== 'page' && source !== 'post') {
				return;
			}

			const selectedUrl = $wrap.find('.sb-link-items--' + source + ' option:selected').attr('data-url') || '';
			if (selectedUrl) {
				$wrap.find('.sb-link-url').val(selectedUrl);
			}
		});
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
