<?php
/**
 * Single post template.
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

get_header();

while ( have_posts() ) :
	the_post();
	?>
	<section class="page-hero <?php echo sb_get_page_hero_image_url() !== '' ? '' : 'page-hero--no-image'; ?>">
		<?php $hero_image = sb_get_page_hero_image_url(); ?>
		<?php if ( $hero_image !== '' ) : ?>
			<div class="page-hero__bg" style="background-image:url('<?php echo esc_url( $hero_image ); ?>')"></div>
		<?php endif; ?>
		<div class="page-hero__overlay"></div>
		<div class="page-hero__inner">
			<?php if ( 'show' === sb_get_site_option( 'post_date_visible', 'hide' ) ) : ?>
				<p class="page-hero__meta"><?php echo esc_html( get_the_date() ); ?></p>
			<?php endif; ?>
			<h1 class="page-hero__title"><?php the_title(); ?></h1>
		</div>
	</section>

	<div class="page-content-wrap">
		<div class="page-content prose prose-slate max-w-none">
			<?php the_content(); ?>
		</div>

		<nav class="post-nav" aria-label="<?php esc_attr_e( 'ניווט בין כתבות', 'starter-bullet' ); ?>">
			<div class="post-nav__item post-nav__item--prev">
				<?php previous_post_link( '%link', esc_html__( '→ הכתבה הקודמת', 'starter-bullet' ) ); ?>
			</div>
			<div class="post-nav__item post-nav__item--next">
				<?php next_post_link( '%link', esc_html__( 'הכתבה הבאה ←', 'starter-bullet' ) ); ?>
			</div>
		</nav>
	</div>
	<?php
endwhile;

get_footer();
