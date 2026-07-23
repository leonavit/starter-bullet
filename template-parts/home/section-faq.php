<?php
/**
 * Section 7: FAQ accordion (CPT)
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

$d     = sb_get_section( 'faq' );
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

$form_shortcode = trim( (string) ( $d['form_shortcode'] ?? '' ) );
$has_form       = '' !== $form_shortcode;
?>
<section id="faq" class="bg-white py-16 lg:py-20 <?php echo esc_attr( sb_section_hide_mobile_class( 'faq' ) ); ?>"<?php echo sb_section_bg_style( 'faq' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<div class="mx-auto grid max-w-7xl items-start gap-10 px-4 <?php echo $has_form ? 'lg:grid-cols-2' : ''; ?> lg:px-8">
		<?php if ( $has_form ) : ?>
			<?php
			$hero_form  = sb_get_section( 'hero' );
			$form_title = sb_get_form_title();
			?>
			<div class="faq-form-col order-2 sb-section lg:order-1" data-skeleton>
				<div class="faq-form hero-form-card" dir="rtl"<?php echo sb_hero_form_style( is_array( $hero_form ) ? $hero_form : array() ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
					<?php if ( $form_title !== '' ) : ?>
						<p class="hero-form-title"><?php echo esc_html( $form_title ); ?></p>
					<?php endif; ?>
					<?php echo do_shortcode( $form_shortcode ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
				</div>
			</div>
		<?php endif; ?>

		<div class="order-1 sb-section text-center md:text-start <?php echo $has_form ? 'lg:order-2' : ''; ?>" data-skeleton>
			<h2 class="text-3xl font-extrabold text-navy sm:text-4xl"><?php echo esc_html( (string) $d['title'] ); ?></h2>
			<?php if ( trim( (string) ( $d['content'] ?? '' ) ) !== '' ) : ?>
				<p class="mt-4 text-gray-600"><?php echo esc_html( (string) $d['content'] ); ?></p>
			<?php endif; ?>

			<div class="mt-8">
				<?php if ( $query->have_posts() ) : ?>
					<?php
					get_template_part(
						'template-parts/content/faq',
						'accordion',
						array(
							'query'        => $query,
							'accordion_id' => 'faq-accordion',
						)
					);
					?>
				<?php else : ?>
					<div class="space-y-4">
						<?php for ( $i = 0; $i < 4; $i++ ) : ?>
							<div class="skeleton h-16 rounded-xl"></div>
						<?php endfor; ?>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</section>
