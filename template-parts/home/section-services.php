<?php
/**
 * Section 6: Services grid (CPT)
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

$d = sb_get_section( 'services' );
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
<section id="services" class="sb-blue-gradient text-white">
	<div class="mx-auto max-w-7xl px-4 lg:px-8">
		<div class="mb-10 flex flex-col items-start justify-between gap-4 sm:flex-row sm:items-center">
			<h2 class="text-3xl font-extrabold sm:text-4xl"><?php echo esc_html( (string) $d['title'] ); ?></h2>
			<a href="<?php echo esc_url( (string) $d['btn_url'] ); ?>" class="rounded-full bg-accent-yellow px-6 py-3 text-sm font-bold text-navy transition hover:bg-yellow-300">
				<?php echo esc_html( (string) $d['btn_text'] ); ?>
			</a>
		</div>

		<div class="sb-section grid gap-6 md:grid-cols-2 lg:grid-cols-3" data-skeleton>
			<?php if ( $query->have_posts() ) : ?>
				<?php while ( $query->have_posts() ) : $query->the_post(); ?>
					<article class="service-card group relative aspect-[4/5] overflow-hidden rounded-2xl">
						<?php if ( has_post_thumbnail() ) : ?>
							<?php the_post_thumbnail( 'large', array( 'class' => 'absolute inset-0 h-full w-full object-cover transition duration-300 group-hover:scale-105 sb-lazy-img', 'loading' => 'lazy' ) ); ?>
						<?php else : ?>
							<div class="absolute inset-0 skeleton"></div>
						<?php endif; ?>
						<div class="service-card-title absolute inset-x-0 bottom-0">
							<h3 class="text-base font-bold leading-snug text-white sm:text-lg"><?php the_title(); ?></h3>
						</div>
					</article>
				<?php endwhile; wp_reset_postdata(); ?>
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
