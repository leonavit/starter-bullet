<?php
/**
 * Section 1: Hero
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

$d                  = sb_get_section( 'hero' );
$bg                 = sb_get_image_url( (int) ( $d['image_id'] ?? 0 ), 'full' );
$transparent_header = sb_is_transparent_header();
?>
<section id="hero" class="relative overflow-hidden text-white <?php echo $transparent_header ? 'hero--transparent-header' : 'bg-navy'; ?>">
	<?php if ( $bg ) : ?>
		<div class="hero-bg absolute inset-0 bg-cover bg-center" style="background-image:url('<?php echo esc_url( $bg ); ?>')"></div>
		<div class="hero-overlay absolute inset-0 <?php echo $transparent_header ? 'hero-overlay--full' : 'bg-navy/80'; ?>"></div>
	<?php elseif ( ! $transparent_header ) : ?>
		<div class="hero-overlay absolute inset-0 bg-navy"></div>
	<?php endif; ?>

	<div class="hero-content relative z-10 mx-auto grid max-w-7xl items-center gap-10 px-4 pb-14 lg:grid-cols-2 lg:gap-12 lg:px-8 lg:pb-20 <?php echo $transparent_header ? '' : 'pt-14 lg:pt-20'; ?>">
		<div class="sb-section" data-skeleton>
			<h1 class="text-3xl font-extrabold leading-tight sm:text-4xl lg:text-5xl">
				<?php echo esc_html( (string) $d['title'] ); ?>
			</h1>
			<p class="mt-4 text-base text-white/80 sm:text-lg">
				<?php echo esc_html( (string) $d['subtitle'] ); ?>
			</p>
			<div class="mt-8 flex flex-wrap gap-4">
				<a href="<?php echo esc_url( (string) $d['btn_primary_url'] ); ?>" class="rounded-full bg-accent-yellow px-6 py-3 text-sm font-bold text-navy transition hover:bg-yellow-300">
					<?php echo esc_html( (string) $d['btn_primary_text'] ); ?>
				</a>
				<a href="<?php echo esc_url( (string) $d['btn_secondary_url'] ); ?>" class="rounded-full border-2 border-white/40 px-6 py-3 text-sm font-bold transition hover:bg-white/10">
					<?php echo esc_html( (string) $d['btn_secondary_text'] ); ?>
				</a>
			</div>
		</div>

		<div id="contact" class="hero-form-card sb-section" data-skeleton dir="rtl">
			<?php $form_title = sb_get_form_title(); ?>
			<?php if ( $form_title !== '' ) : ?>
				<p class="hero-form-title"><?php echo esc_html( $form_title ); ?></p>
			<?php endif; ?>
			<?php echo do_shortcode( (string) $d['cf7_shortcode'] ); ?>
		</div>
	</div>

	<div class="hero-benefits-bar relative z-10">
		<div class="mx-auto grid max-w-7xl grid-cols-1 divide-y divide-white/20 px-4 md:grid-cols-3 md:divide-x md:divide-y-0 md:divide-x-reverse lg:px-8">
			<?php for ( $i = 1; $i <= 3; $i++ ) : ?>
				<div class="flex items-start gap-4 px-4 py-4 md:py-0 md:first:pr-0 md:last:pl-0">
					<div class="text-white/90">
						<?php sb_render_benefit_icon( $d, $i ); ?>
					</div>
					<div class="text-white">
						<h3 class="text-base font-bold leading-snug">
							<?php echo esc_html( (string) ( $d[ "benefit_{$i}_title" ] ?? '' ) ); ?>
						</h3>
						<p class="mt-1 text-sm leading-relaxed text-white/85">
							<?php echo esc_html( (string) ( $d[ "benefit_{$i}_desc" ] ?? '' ) ); ?>
						</p>
					</div>
				</div>
			<?php endfor; ?>
		</div>
	</div>
</section>
