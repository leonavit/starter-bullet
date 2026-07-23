<?php
/**
 * Template Name: מאגר ידע שאלות ותשובות
 * Template Post Type: page
 *
 * Page template that lists all FAQ items.
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

$faqs = new WP_Query(
	array(
		'post_type'      => 'bullet_faq',
		'posts_per_page' => -1,
		'orderby'        => 'menu_order',
		'order'          => 'ASC',
		'post_status'    => 'publish',
	)
);
?>

<section class="bg-white py-16 lg:py-20">
	<div class="faq-knowledge-wrap mx-auto px-4 lg:px-8">
		<?php
		get_template_part(
			'template-parts/content/faq',
			'accordion',
			array(
				'query'         => $faqs,
				'accordion_id'  => 'knowledge-faq-accordion',
				'empty_message' => __( 'עדיין לא נוספו שאלות ותשובות.', 'starter-bullet' ),
			)
		);
		?>
	</div>
</section>

<?php
get_footer();
