<?php
/**
 * Section 6: Services grid (CPT)
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

$d     = sb_get_section( 'services' );
$count = max( 1, min( 12, (int) ( $d['count'] ?? 3 ) ) );

$query = new WP_Query(
	array(
		'post_type'      => 'bullet_service',
		'posts_per_page' => $count,
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
		'post_status'    => 'publish',
	)
);
?>
<section id="services" class="sb-blue-gradient text-white"<?php echo sb_section_bg_style( 'services' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<div class="mx-auto max-w-7xl px-4 lg:px-8">
		<div class="mb-10 flex flex-col items-start justify-between gap-4 sm:flex-row sm:items-center">
			<h2 class="text-3xl font-extrabold sm:text-4xl"><?php echo esc_html( (string) $d['title'] ); ?></h2>
			<?php if ( trim( (string) ( $d['btn_text'] ?? '' ) ) !== '' ) : ?>
				<a href="<?php echo esc_url( (string) $d['btn_url'] ); ?>" class="rounded-full bg-accent-yellow px-6 py-3 text-sm font-bold text-navy transition hover:bg-yellow-300">
					<?php echo esc_html( (string) $d['btn_text'] ); ?>
				</a>
			<?php endif; ?>
		</div>

		<div class="sb-section sb-snap-carousel -mx-4 px-4 md:mx-0 md:grid-cols-2 md:px-0 lg:grid-cols-3" data-skeleton>
			<?php if ( $query->have_posts() ) : ?>
				<?php
				while ( $query->have_posts() ) :
					$query->the_post();
					get_template_part( 'template-parts/content/service', 'card' );
				endwhile;
				wp_reset_postdata();
				?>
			<?php else : ?>
				<?php for ( $i = 0; $i < 3; $i++ ) : ?>
					<div class="service-card relative aspect-[4/5] overflow-hidden rounded-2xl">
						<div class="absolute inset-0 skeleton"></div>
					</div>
				<?php endfor; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
