<?php
/**
 * Template Name: Services
 * Template Post Type: page
 *
 * Page template that lists all services.
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
			<h1 class="page-hero__title"><?php the_title(); ?></h1>
			<?php if ( has_excerpt() ) : ?>
				<p class="page-hero__meta"><?php echo esc_html( get_the_excerpt() ); ?></p>
			<?php endif; ?>
		</div>
	</section>

	<?php if ( get_the_content() ) : ?>
		<div class="page-content-wrap">
			<div class="page-content prose prose-slate max-w-none">
				<?php the_content(); ?>
			</div>
		</div>
	<?php endif; ?>
	<?php
endwhile;

$services = new WP_Query(
	array(
		'post_type'      => 'bullet_service',
		'posts_per_page' => -1,
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
		'post_status'    => 'publish',
	)
);
?>

<section class="sb-blue-gradient py-16 text-white lg:py-20">
	<div class="mx-auto max-w-7xl px-4 lg:px-8">
		<?php if ( $services->have_posts() ) : ?>
			<div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
				<?php
				while ( $services->have_posts() ) :
					$services->the_post();
					get_template_part( 'template-parts/content/service', 'card' );
				endwhile;
				wp_reset_postdata();
				?>
			</div>
		<?php else : ?>
			<p class="text-center text-white/80"><?php esc_html_e( 'עדיין לא נוספו שירותים.', 'starter-bullet' ); ?></p>
		<?php endif; ?>
	</div>
</section>

<?php
get_footer();
