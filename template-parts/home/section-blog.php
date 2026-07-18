<?php
/**
 * Section 9: Blog posts
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

$d     = sb_get_section( 'blog' );
$count = max( 1, min( 12, (int) ( $d['count'] ?? 3 ) ) );

$query = new WP_Query(
	array(
		'post_type'      => 'post',
		'posts_per_page' => $count,
		'post_status'    => 'publish',
	)
);

$shown = $query->have_posts() ? min( $count, (int) $query->post_count ) : 3;

// Mobile: snap carousel. From md up: grid adapts to post count.
$grid_classes = 'sb-snap-carousel -mx-4 px-4 md:mx-0 md:px-0';
if ( 1 === $shown ) {
	$grid_classes .= ' md:mx-auto md:max-w-xl';
} elseif ( 2 === $shown ) {
	$grid_classes .= ' md:grid-cols-2';
} else {
	$grid_classes .= ' md:grid-cols-2 lg:grid-cols-3';
}
?>
<section class="bg-white py-16 lg:py-20"<?php echo sb_section_bg_style( 'blog' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<div class="mx-auto max-w-7xl px-4 lg:px-8">
		<div class="sb-section mb-12 text-center" data-skeleton>
			<h2 class="text-3xl font-extrabold text-navy sm:text-4xl"><?php echo esc_html( (string) $d['title'] ); ?></h2>
			<p class="mt-3 text-gray-600"><?php echo esc_html( (string) $d['subtitle'] ); ?></p>
		</div>

		<div class="sb-section <?php echo esc_attr( $grid_classes ); ?>" data-skeleton>
			<?php if ( $query->have_posts() ) : ?>
				<?php
				while ( $query->have_posts() ) :
					$query->the_post();
					get_template_part( 'template-parts/content/post', 'card' );
				endwhile;
				wp_reset_postdata();
				?>
			<?php else : ?>
				<?php for ( $i = 0; $i < 3; $i++ ) : ?>
					<div class="skeleton h-80 rounded-2xl"></div>
				<?php endfor; ?>
			<?php endif; ?>
		</div>
	</div>
</section>
