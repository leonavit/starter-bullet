<?php
/**
 * Section 7: FAQ accordion (CPT)
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

$d = sb_get_section( 'faq' );
$count = max( 1, min( 20, (int) ( $d['count'] ?? 6 ) ) );

$query = new WP_Query(
	array(
		'post_type'      => 'bullet_faq',
		'posts_per_page' => $count,
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
		'post_status'    => 'publish',
	)
);
?>
<section id="faq" class="bg-white py-16 lg:py-20"<?php echo sb_section_bg_style( 'faq' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<div class="mx-auto grid max-w-7xl gap-10 px-4 lg:grid-cols-2 lg:px-8">
		<div class="sb-section" data-skeleton>
			<h2 class="text-3xl font-extrabold text-navy sm:text-4xl"><?php echo esc_html( (string) $d['title'] ); ?></h2>
			<p class="mt-4 text-gray-600"><?php echo esc_html( (string) $d['content'] ); ?></p>
			<a href="<?php echo esc_url( (string) $d['btn_url'] ); ?>" class="mt-6 inline-flex rounded-full bg-accent-yellow px-6 py-3 text-sm font-bold text-navy transition hover:bg-yellow-300">
				<?php echo esc_html( (string) $d['btn_text'] ); ?>
			</a>
		</div>

		<div class="sb-section faq-accordion space-y-4" data-skeleton id="faq-accordion">
			<?php if ( $query->have_posts() ) : $idx = 0; ?>
				<?php while ( $query->have_posts() ) : $query->the_post(); $idx++; ?>
					<div class="faq-item<?php echo 1 === $idx ? ' is-open' : ''; ?>">
						<button type="button" class="faq-trigger" aria-expanded="<?php echo 1 === $idx ? 'true' : 'false'; ?>">
							<span class="faq-question"><?php the_title(); ?></span>
							<span class="faq-arrow" aria-hidden="true">
								<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
									<path d="M7.5 5L12.5 10L7.5 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
								</svg>
							</span>
						</button>
						<div class="faq-panel">
							<div class="faq-answer prose prose-sm max-w-none text-gray-600">
								<?php the_content(); ?>
							</div>
						</div>
					</div>
				<?php endwhile; wp_reset_postdata(); ?>
			<?php else : ?>
				<?php for ( $i = 0; $i < 4; $i++ ) : ?>
					<div class="skeleton h-16 rounded-xl"></div>
				<?php endfor; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
