<?php
/**
 * Section 10: Bottom CTA
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

$d     = sb_get_section( 'cta' );
$phone = (string) ( $d['phone'] ?: get_theme_mod( 'starter_bullet_phone', '' ) );
?>
<section class="sb-blue-gradient text-white">
	<div class="sb-section mx-auto flex max-w-7xl flex-col items-center justify-between gap-6 px-4 sm:flex-row lg:px-8" data-skeleton>
		<h2 class="text-2xl font-extrabold sm:text-3xl"><?php echo esc_html( (string) $d['title'] ); ?></h2>
		<?php if ( $phone ) : ?>
			<a href="tel:<?php echo esc_attr( sb_sanitize_phone_link( $phone ) ); ?>" class="rounded-full bg-accent-yellow px-8 py-3.5 text-sm font-bold text-navy transition hover:bg-yellow-300">
				<?php echo esc_html( (string) $d['btn_text'] ); ?> — <?php echo esc_html( $phone ); ?>
			</a>
		<?php endif; ?>
	</div>
</section>
