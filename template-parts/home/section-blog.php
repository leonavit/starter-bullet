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

// Grid adapts to the number of displayed posts so cards fill the full width.
if ( 1 === $shown ) {
	$grid_classes = 'mx-auto grid max-w-xl gap-8';
} elseif ( 2 === $shown ) {
	$grid_classes = 'grid gap-8 md:grid-cols-2';
} else {
	$grid_classes = 'grid gap-8 md:grid-cols-2 lg:grid-cols-3';
}
?>
<section class="bg-white py-16 lg:py-20">
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
