<?php
/**
 * Contact Form 7 customizations.
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Add btn-send class to CF7 submit buttons.
 *
 * @param string $content Form HTML.
 */
function starter_bullet_cf7_submit_class( string $content ): string {
	return str_replace(
		'class="wpcf7-form-control wpcf7-submit',
		'class="wpcf7-form-control wpcf7-submit btn-send',
		$content
	);
}
add_filter( 'wpcf7_form_elements', 'starter_bullet_cf7_submit_class' );

/**
 * Use CF7 validation only (consistent Hebrew messages, no browser tooltips).
 *
 * @param bool $supports Whether the form supports HTML5 validation.
 */
function starter_bullet_cf7_disable_html5_validation( bool $supports ): bool {
	return true;
}
add_filter( 'wpcf7_support_html5_fallback', 'starter_bullet_cf7_disable_html5_validation' );

/**
 * Inject CF7 form styles (bypasses Tailwind purge).
 */
function starter_bullet_cf7_inline_styles(): void {
	$css = '
		#contact .wpcf7-form .wpcf7-form-control-wrap,
		#contact .wpcf7-form-control-wrap,
		.lead-form-wrapper .wpcf7-form-control-wrap,
		.wpcf7-form .wpcf7-form-control-wrap {
			display: block !important;
			width: 100% !important;
			max-width: 100% !important;
			margin: 0 0 15px 0 !important;
			padding: 0 !important;
		}
		#contact .wpcf7-form select,
		#contact .wpcf7-form select.wpcf7-form-control,
		#contact .wpcf7-form select.wpcf7-select,
		.lead-form-wrapper .wpcf7-form select {
			appearance: none !important;
			-webkit-appearance: none !important;
			padding: 15px 16px 15px 42px !important;
			background: #ffffff url("data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' viewBox=\'0 0 20 20\' fill=\'%236b7280\'%3E%3Cpath fill-rule=\'evenodd\' d=\'M5.23 7.21a.75.75 0 011.06.02L10 10.94l3.71-3.71a.75.75 0 111.06 1.06l-4.24 4.24a.75.75 0 01-1.06 0L5.21 8.29a.75.75 0 01.02-1.08z\' clip-rule=\'evenodd\'/%3E%3C/svg%3E") no-repeat left 14px center / 16px !important;
			cursor: pointer;
		}
		#contact h3.form-title,
		.lead-form-wrapper h3.form-title {
			color: #000 !important;
			font-size: 17px !important;
			text-align: center !important;
			margin: 0 0 10px !important;
			font-weight: 700;
		}
		#contact .wpcf7-form,
		.lead-form-wrapper .wpcf7-form {
			display: flex;
			flex-direction: column;
		}
		#contact .wpcf7-response-output,
		.lead-form-wrapper .wpcf7-response-output {
			order: -1;
			display: none;
			margin: 0 0 14px !important;
			padding: 12px 14px !important;
			border: 1px solid #fca5a5 !important;
			border-radius: 10px !important;
			background: #fef2f2 !important;
			color: #b91c1c !important;
			font-size: 0.875rem !important;
			font-weight: 600 !important;
			line-height: 1.45 !important;
			text-align: right !important;
		}
		#contact .wpcf7-response-output.wpcf7-validation-errors,
		#contact .wpcf7-response-output.wpcf7-acceptance-missing,
		#contact .wpcf7-response-output.wpcf7-spam-blocked,
		#contact .wpcf7-response-output.wpcf7-aborted,
		.lead-form-wrapper .wpcf7-response-output.wpcf7-validation-errors,
		.lead-form-wrapper .wpcf7-response-output.wpcf7-acceptance-missing {
			display: block !important;
		}
		#contact .wpcf7-response-output.wpcf7-mail-sent-ok,
		.lead-form-wrapper .wpcf7-response-output.wpcf7-mail-sent-ok {
			display: block !important;
			border-color: #86efac !important;
			background: #f0fdf4 !important;
			color: #166534 !important;
		}
		#contact .wpcf7-response-output.wpcf7-mail-sent-ng,
		.lead-form-wrapper .wpcf7-response-output.wpcf7-mail-sent-ng {
			display: block !important;
		}
		#contact .wpcf7-response-output[aria-hidden="true"],
		.lead-form-wrapper .wpcf7-response-output[aria-hidden="true"] {
			display: none !important;
		}
		#contact .wpcf7-not-valid-tip,
		.lead-form-wrapper .wpcf7-not-valid-tip {
			display: block !important;
			margin: 6px 0 0 !important;
			padding: 0 !important;
			color: #dc2626 !important;
			font-size: 0.8125rem !important;
			font-weight: 500 !important;
			line-height: 1.35 !important;
			text-align: right !important;
		}
		#contact .wpcf7-form-control-wrap:has(.wpcf7-not-valid),
		.lead-form-wrapper .wpcf7-form-control-wrap:has(.wpcf7-not-valid) {
			margin-bottom: 10px !important;
		}
		#contact .wpcf7-not-valid,
		.lead-form-wrapper .wpcf7-not-valid {
			border-color: #dc2626 !important;
			background: #fff5f5 !important;
		}
		#contact .wpcf7-not-valid:focus,
		.lead-form-wrapper .wpcf7-not-valid:focus {
			border-color: #b91c1c !important;
			box-shadow: 0 0 0 3px rgba(220, 38, 38, 0.15) !important;
		}
	';

	wp_add_inline_style( 'starter-bullet-main', $css );
}
add_action( 'wp_enqueue_scripts', 'starter_bullet_cf7_inline_styles', 25 );
