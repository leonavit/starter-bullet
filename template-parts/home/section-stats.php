<?php
/**
 * Section 3: Statistics
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

$d = sb_get_section( 'stats' );
?>
<section class="bg-slate-50 py-12">
	<div class="sb-section mx-auto grid max-w-7xl grid-cols-2 gap-8 px-4 lg:grid-cols-4 lg:px-8" data-skeleton>
		<?php for ( $i = 1; $i <= 4; $i++ ) : ?>
			<div class="text-center">
				<p class="text-4xl font-extrabold text-royal-blue"><?php echo esc_html( (string) $d[ "stat_{$i}_number" ] ); ?></p>
				<p class="mt-2 text-sm text-gray-600"><?php echo esc_html( (string) $d[ "stat_{$i}_label" ] ); ?></p>
			</div>
		<?php endfor; ?>
	</div>
</section>
