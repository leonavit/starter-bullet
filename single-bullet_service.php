<?php
/**
 * Single service template.
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

get_header();

while ( have_posts() ) :
	the_post();
	$service_id = get_the_ID();
	?>
	<section class="page-hero <?php echo sb_get_page_hero_image_url() !== '' ? '' : 'page-hero--no-image'; ?>">
		<?php $hero_image = sb_get_page_hero_image_url(); ?>
		<?php if ( $hero_image !== '' ) : ?>
			<div class="page-hero__bg" style="background-image:url('<?php echo esc_url( $hero_image ); ?>')"></div>
		<?php endif; ?>
		<div class="page-hero__overlay"></div>
		<div class="page-hero__inner">
			<h1 class="page-hero__title"><?php the_title(); ?></h1>
		</div>
	</section>

	<div class="page-content-wrap">
		<div class="page-content prose prose-slate max-w-none">
			<?php the_content(); ?>
		</div>

		<?php
		$faq_query = new WP_Query(
			array(
				'post_type'      => 'bullet_faq',
				'posts_per_page' => -1,
				'orderby'        => 'menu_order',
				'order'          => 'ASC',
				'post_status'    => 'publish',
				'meta_query'     => array( // phpcs:ignore WordPress.DB.SlowDBQuery.slow_db_query_meta_query
					array(
						'key'     => '_bullet_faq_service_id',
						'value'   => $service_id,
						'compare' => '=',
						'type'    => 'NUMERIC',
					),
				),
			)
		);
		?>

		<?php if ( $faq_query->have_posts() ) : ?>
			<section class="service-faq mt-12" aria-labelledby="service-faq-title">
				<h2 id="service-faq-title" class="mb-6 text-2xl font-extrabold text-navy sm:text-3xl">
					<?php esc_html_e( 'שאלות נפוצות', 'starter-bullet' ); ?>
				</h2>
				<?php
				get_template_part(
					'template-parts/content/faq',
					'accordion',
					array(
						'query'        => $faq_query,
						'accordion_id' => 'service-faq-accordion',
					)
				);
				?>
			</section>
		<?php else : ?>
			<?php wp_reset_postdata(); ?>
		<?php endif; ?>

		<nav class="post-nav" aria-label="<?php esc_attr_e( 'ניווט בין שירותים', 'starter-bullet' ); ?>">
			<div class="post-nav__item post-nav__item--prev">
				<?php previous_post_link( '%link', esc_html__( '→ לשירות הקודם', 'starter-bullet' ) ); ?>
			</div>
			<div class="post-nav__item post-nav__item--next">
				<?php next_post_link( '%link', esc_html__( 'לשירות הבא ←', 'starter-bullet' ) ); ?>
			</div>
		</nav>
	</div>
	<?php
endwhile;

get_footer();
