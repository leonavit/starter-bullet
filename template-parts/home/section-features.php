<?php
/**
 * Section 4: Features
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

$d = sb_get_section( 'features' );
?>
<section class="bg-blue-50 py-16 lg:py-20">
	<div class="mx-auto max-w-7xl px-4 lg:px-8">
		<h2 class="sb-section mb-12 text-center text-3xl font-extrabold text-navy sm:text-4xl" data-skeleton>
			<?php echo esc_html( (string) $d['title'] ); ?>
		</h2>
		<div class="grid gap-8 md:grid-cols-3">
			<?php for ( $i = 1; $i <= 3; $i++ ) : ?>
				<div class="sb-section rounded-2xl bg-white p-8 text-center shadow-sm" data-skeleton>
					<div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-royal-blue/10 text-royal-blue">
						<svg class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
					</div>
					<h3 class="text-lg font-bold text-navy"><?php echo esc_html( (string) $d[ "item_{$i}_title" ] ); ?></h3>
					<p class="mt-2 text-sm text-gray-600"><?php echo esc_html( (string) $d[ "item_{$i}_desc" ] ); ?></p>
				</div>
			<?php endfor; ?>
		</div>
	</div>
</section>
