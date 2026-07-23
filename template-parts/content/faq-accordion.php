<?php
/**
 * FAQ accordion list (reusable).
 *
 * Expects $args['query'] as WP_Query, optional $args['accordion_id'].
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

$query         = $args['query'] ?? null;
$accordion_id  = (string) ( $args['accordion_id'] ?? 'faq-accordion' );
$empty_message = (string) ( $args['empty_message'] ?? '' );

if ( ! $query instanceof WP_Query ) {
	return;
}
?>
<div class="faq-accordion space-y-4" id="<?php echo esc_attr( $accordion_id ); ?>" data-faq-accordion>
	<?php if ( $query->have_posts() ) : ?>
		<?php
		$idx = 0;
		while ( $query->have_posts() ) :
			$query->the_post();
			++$idx;
			?>
			<div class="faq-item<?php echo 1 === $idx ? ' is-open' : ''; ?>">
				<button type="button" class="faq-trigger" aria-expanded="<?php echo 1 === $idx ? 'true' : 'false'; ?>">
					<span class="faq-question"><?php the_title(); ?></span>
					<span class="faq-arrow" aria-hidden="true">
						<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
							<path d="M7.5 5L12.5 10L7.5 15" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
						</svg>
					</span>
				</button>
				<div class="faq-panel">
					<div class="faq-answer prose prose-sm max-w-none text-gray-600">
						<?php the_content(); ?>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	<?php elseif ( '' !== $empty_message ) : ?>
		<p class="text-gray-600"><?php echo esc_html( $empty_message ); ?></p>
	<?php endif; ?>
</div>
