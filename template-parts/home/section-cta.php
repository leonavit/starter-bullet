<?php
/**
 * Section 10: Bottom CTA
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

$d     = sb_get_section( 'cta' );
$phone = (string) ( $d['phone'] ?: get_theme_mod( 'starter_bullet_phone', '' ) );

$btn_bg   = sanitize_hex_color( (string) ( $d['btn_bg_color'] ?? '' ) );
$btn_text = sanitize_hex_color( (string) ( $d['btn_text_color'] ?? '' ) );

$btn_classes = 'sb-cta-bar-btn inline-flex items-center gap-2 rounded-full px-8 py-3.5 text-sm font-bold transition';
$btn_style   = '';

if ( $btn_bg ) {
	$btn_style .= 'background-color:' . $btn_bg . ';';
	$btn_style .= '--sb-cta-btn-hover:' . sb_darken_hex( $btn_bg, 0.12 ) . ';';
} else {
	$btn_classes .= ' bg-accent-yellow hover:bg-yellow-300';
}

if ( $btn_text ) {
	$btn_style .= 'color:' . $btn_text . ';';
} else {
	$btn_classes .= ' text-navy';
}

$phone_lordicon = trim( (string) ( $d['phone_lordicon'] ?? '' ) );
$icon_primary   = $btn_text ? $btn_text : '#1A1D2E';
?>
<section class="sb-blue-gradient text-white <?php echo esc_attr( sb_section_hide_mobile_class( 'cta' ) ); ?>"<?php echo sb_section_bg_style( 'cta' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<div class="sb-section mx-auto flex max-w-7xl flex-col items-center justify-between gap-6 px-4 sm:flex-row lg:px-8" data-skeleton>
		<h2 class="text-2xl font-extrabold sm:text-3xl"><?php echo esc_html( (string) $d['title'] ); ?></h2>
		<?php if ( $phone ) : ?>
			<a
				href="tel:<?php echo esc_attr( sb_sanitize_phone_link( $phone ) ); ?>"
				class="<?php echo esc_attr( $btn_classes ); ?>"
				<?php if ( $btn_style ) : ?>
					style="<?php echo esc_attr( $btn_style ); ?>"
				<?php endif; ?>
			>
				<span><?php echo esc_html( (string) $d['btn_text'] ); ?> — <?php echo esc_html( $phone ); ?></span>
				<?php
				if ( '' !== $phone_lordicon ) {
					sb_render_icon(
						'',
						$phone_lordicon,
						array(
							'lordicon_colors' => 'primary:' . $icon_primary . ',secondary:' . $icon_primary,
							'lordicon_size'   => '22px',
							'width'           => 22,
							'height'          => 22,
						)
					);
				}
				?>
			</a>
		<?php endif; ?>
	</div>
</section>
