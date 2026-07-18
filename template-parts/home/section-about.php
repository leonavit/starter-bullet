<?php
/**
 * Section 2: About
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

$d = sb_get_section( 'about' );
?>
<section id="about" class="bg-white py-16 lg:py-20"<?php echo sb_section_bg_style( 'about' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<div class="mx-auto grid max-w-7xl items-center gap-10 px-4 lg:grid-cols-2 lg:px-8">
		<div class="sb-section order-2 lg:order-1" data-skeleton>
			<?php sb_render_image( (int) $d['image_id'], (string) $d['title'], 'w-full rounded-2xl object-cover shadow-lg' ); ?>
		</div>
		<div class="sb-section order-1 lg:order-2" data-skeleton>
			<h2 class="text-3xl font-extrabold text-navy sm:text-4xl"><?php echo esc_html( (string) $d['title'] ); ?></h2>
			<div class="prose prose-slate mt-4 max-w-none text-gray-600">
				<?php echo wp_kses_post( wpautop( (string) $d['content'] ) ); ?>
			</div>
			<a href="<?php echo esc_url( (string) $d['btn_url'] ); ?>" class="mt-6 inline-flex rounded-full bg-accent-yellow px-6 py-3 text-sm font-bold text-navy transition hover:bg-yellow-300">
				<?php echo esc_html( (string) $d['btn_text'] ); ?>
			</a>
		</div>
	</div>
</section>
