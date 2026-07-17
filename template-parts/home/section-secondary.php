<?php
/**
 * Section 5: Secondary info
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

$d = sb_get_section( 'secondary' );
?>
<section class="bg-white py-16 lg:py-20">
	<div class="mx-auto grid max-w-7xl items-center gap-10 px-4 lg:grid-cols-2 lg:px-8">
		<div class="sb-section" data-skeleton>
			<h2 class="text-3xl font-extrabold text-navy sm:text-4xl"><?php echo esc_html( (string) $d['title'] ); ?></h2>
			<div class="prose prose-slate mt-4 max-w-none text-gray-600">
				<?php echo wp_kses_post( wpautop( (string) $d['content'] ) ); ?>
			</div>
			<ul class="mt-6 space-y-3">
				<?php for ( $i = 1; $i <= 4; $i++ ) : ?>
					<?php if ( ! empty( $d[ "item_{$i}" ] ) ) : ?>
						<li class="flex items-center gap-3 text-sm text-gray-700">
							<span class="flex h-6 w-6 shrink-0 items-center justify-center rounded-full bg-royal-blue text-white">✓</span>
							<?php echo esc_html( (string) $d[ "item_{$i}" ] ); ?>
						</li>
					<?php endif; ?>
				<?php endfor; ?>
			</ul>
		</div>
		<div class="sb-section" data-skeleton>
			<?php sb_render_image( (int) $d['image_id'], (string) $d['title'], 'w-full rounded-2xl object-cover shadow-lg' ); ?>
		</div>
	</div>
</section>
