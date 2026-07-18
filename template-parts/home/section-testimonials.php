<?php
/**
 * Section 8: Testimonials (CPT)
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

$d = sb_get_section( 'testimonials' );

$query = new WP_Query(
	array(
		'post_type'      => 'bullet_review',
		'posts_per_page' => -1,
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
		'post_status'    => 'publish',
	)
);
?>
<section id="testimonials" class="bg-blue-50 py-16 lg:py-20"<?php echo sb_section_bg_style( 'testimonials' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<div class="mx-auto max-w-7xl px-4 lg:px-8">
		<div class="sb-section mb-12 text-center" data-skeleton>
			<h2 class="text-3xl font-extrabold text-navy sm:text-4xl"><?php echo esc_html( (string) $d['title'] ); ?></h2>
			<p class="mt-3 text-gray-600"><?php echo esc_html( (string) $d['subtitle'] ); ?></p>
			<?php sb_render_midrag_badge( $d ); ?>
		</div>

		<div class="sb-section" data-skeleton>
			<?php if ( $query->have_posts() ) : ?>
				<div class="testimonials-slider" dir="ltr">
					<div class="testimonials-slider__mask">
						<div class="testimonials-slider__track">
							<?php for ( $group = 0; $group < 2; $group++ ) : ?>
								<div class="testimonials-slider__group"<?php echo 1 === $group ? ' aria-hidden="true"' : ''; ?>>
									<?php
									while ( $query->have_posts() ) :
										$query->the_post();
										sb_render_testimonial_card( get_post() );
									endwhile;
									$query->rewind_posts();
									?>
								</div>
							<?php endfor; ?>
						</div>
					</div>
				</div>
				<?php wp_reset_postdata(); ?>
			<?php else : ?>
				<div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
					<?php for ( $i = 0; $i < 4; $i++ ) : ?>
						<div class="skeleton h-48 rounded-2xl"></div>
					<?php endfor; ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
</section>
