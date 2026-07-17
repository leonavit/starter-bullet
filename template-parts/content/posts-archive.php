<?php
/**
 * Posts archive grid layout.
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

$heading     = $args['heading'] ?? '';
$description = $args['description'] ?? '';
?>
<section class="bg-white py-16 lg:py-20">
	<div class="mx-auto max-w-7xl px-4 lg:px-8">
		<?php if ( $heading !== '' ) : ?>
			<div class="sb-section mb-12 text-center">
				<h1 class="text-3xl font-extrabold text-navy sm:text-4xl"><?php echo esc_html( $heading ); ?></h1>
				<?php if ( $description !== '' ) : ?>
					<p class="mt-3 text-gray-600"><?php echo esc_html( $description ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if ( have_posts() ) : ?>
			<div class="sb-section grid gap-8 md:grid-cols-2 lg:grid-cols-3">
				<?php
				while ( have_posts() ) :
					the_post();
					get_template_part( 'template-parts/content/post', 'card' );
				endwhile;
				?>
			</div>

			<div class="mt-12 flex justify-center">
				<?php
				the_posts_pagination(
					array(
						'mid_size'  => 2,
						'prev_text' => esc_html__( '← הקודם', 'starter-bullet' ),
						'next_text' => esc_html__( 'הבא →', 'starter-bullet' ),
					)
				);
				?>
			</div>
		<?php else : ?>
			<p class="text-center text-gray-600"><?php esc_html_e( 'לא נמצאו מאמרים.', 'starter-bullet' ); ?></p>
		<?php endif; ?>
	</div>
</section>
