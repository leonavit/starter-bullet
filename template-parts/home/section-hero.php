<?php
/**
 * Section 1: Hero
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

$d                  = sb_get_section( 'hero' );
$bg                 = sb_get_image_url( (int) ( $d['image_id'] ?? 0 ), 'full' );
$bg_mobile          = sb_get_image_url( (int) ( $d['image_mobile_id'] ?? 0 ), 'large' );
$transparent_header = sb_is_transparent_header();

// Video background: uploaded file wins over YouTube; default clip when video
// is chosen but nothing was provided.
$bg_type    = ( ( $d['bg_type'] ?? 'image' ) === 'video' ) ? 'video' : 'image';
$video_url  = '';
$youtube_id = '';

if ( 'video' === $bg_type ) {
	$video_file_id = (int) ( $d['video_file_id'] ?? 0 );
	$video_url     = $video_file_id ? (string) wp_get_attachment_url( $video_file_id ) : '';

	if ( '' === $video_url ) {
		$youtube_id = sb_youtube_id( (string) ( $d['video_youtube'] ?? '' ) );
		if ( '' === $youtube_id ) {
			$youtube_id = '2XX5zDThC3U';
		}
	}
}
?>
<section id="hero" class="relative overflow-hidden text-white <?php echo $transparent_header ? 'hero--transparent-header' : 'bg-navy'; ?>"<?php echo sb_section_bg_style( 'hero' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<?php if ( 'video' === $bg_type ) : ?>
		<?php if ( $bg_mobile ) : ?>
			<div class="hero-bg absolute inset-0 bg-cover bg-center md:hidden" style="background-image:url('<?php echo esc_url( $bg_mobile ); ?>')"></div>
		<?php endif; ?>
		<div class="hero-bg-video-wrap absolute inset-0 <?php echo $bg_mobile ? 'hidden md:block' : ''; ?>" aria-hidden="true">
			<?php if ( $video_url ) : ?>
				<video autoplay muted loop playsinline preload="auto" src="<?php echo esc_url( $video_url ); ?>"></video>
			<?php else : ?>
				<?php
				$embed_url = add_query_arg(
					array(
						'autoplay'       => 1,
						'mute'           => 1,
						'loop'           => 1,
						'playlist'       => $youtube_id,
						'controls'       => 0,
						'rel'            => 0,
						'modestbranding' => 1,
						'playsinline'    => 1,
						'disablekb'      => 1,
						'iv_load_policy' => 3,
					),
					'https://www.youtube.com/embed/' . $youtube_id
				);
				?>
				<iframe src="<?php echo esc_url( $embed_url ); ?>" title="" allow="autoplay; encrypted-media" tabindex="-1" frameborder="0"></iframe>
			<?php endif; ?>
		</div>
		<div class="hero-overlay absolute inset-0 <?php echo $transparent_header ? 'hero-overlay--full' : 'bg-navy/80'; ?>"></div>
	<?php elseif ( $bg ) : ?>
		<?php if ( $bg_mobile ) : ?>
			<div class="hero-bg absolute inset-0 bg-cover bg-center md:hidden" style="background-image:url('<?php echo esc_url( $bg_mobile ); ?>')"></div>
			<div class="hero-bg absolute inset-0 hidden bg-cover bg-center md:block" style="background-image:url('<?php echo esc_url( $bg ); ?>')"></div>
		<?php else : ?>
			<div class="hero-bg absolute inset-0 bg-cover bg-center" style="background-image:url('<?php echo esc_url( $bg ); ?>')"></div>
		<?php endif; ?>
		<div class="hero-overlay absolute inset-0 <?php echo $transparent_header ? 'hero-overlay--full' : 'bg-navy/80'; ?>"></div>
	<?php elseif ( ! $transparent_header && '' === sb_section_bg_style( 'hero' ) ) : ?>
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
			<?php
			$btn_primary_text   = trim( (string) ( $d['btn_primary_text'] ?? '' ) );
			$btn_secondary_text = trim( (string) ( $d['btn_secondary_text'] ?? '' ) );
			?>
			<?php if ( $btn_primary_text !== '' || $btn_secondary_text !== '' ) : ?>
				<div class="mt-8 flex flex-wrap gap-4">
					<?php if ( $btn_primary_text !== '' ) : ?>
						<a href="<?php echo esc_url( (string) $d['btn_primary_url'] ); ?>" class="rounded-full bg-accent-yellow px-6 py-3 text-sm font-bold text-navy transition hover:bg-yellow-300">
							<?php echo esc_html( $btn_primary_text ); ?>
						</a>
					<?php endif; ?>
					<?php if ( $btn_secondary_text !== '' ) : ?>
						<a href="<?php echo esc_url( (string) $d['btn_secondary_url'] ); ?>" class="rounded-full border-2 border-white/40 px-6 py-3 text-sm font-bold transition hover:bg-white/10">
							<?php echo esc_html( $btn_secondary_text ); ?>
						</a>
					<?php endif; ?>
				</div>
			<?php endif; ?>
		</div>

		<div id="contact" class="hero-form-card sb-section" data-skeleton dir="rtl"<?php echo sb_hero_form_style( $d ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
			<?php $form_title = sb_get_form_title(); ?>
			<?php if ( $form_title !== '' ) : ?>
				<p class="hero-form-title"><?php echo esc_html( $form_title ); ?></p>
			<?php endif; ?>
			<?php echo do_shortcode( (string) $d['cf7_shortcode'] ); ?>
		</div>
	</div>
</section>
