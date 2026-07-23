<?php
/**
 * Service card (linked tile).
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

$card_title_color = sanitize_hex_color( (string) sb_get_section( 'services', 'card_title_color', '' ) );
if ( ! $card_title_color ) {
	$card_title_color = '#000000';
}
?>
<a href="<?php the_permalink(); ?>" class="service-card group relative block aspect-[4/5] overflow-hidden rounded-2xl text-inherit no-underline">
	<?php if ( has_post_thumbnail() ) : ?>
		<?php
		the_post_thumbnail(
			'large',
			array(
				'class'   => 'absolute inset-0 h-full w-full object-cover transition duration-300 group-hover:scale-105 sb-lazy-img',
				'loading' => 'lazy',
			)
		);
		?>
	<?php else : ?>
		<div class="absolute inset-0 skeleton"></div>
	<?php endif; ?>
	<div class="service-card-title absolute inset-x-0 bottom-0 text-center">
		<h3 class="text-base font-bold leading-snug sm:text-lg" style="color:<?php echo esc_attr( $card_title_color ); ?>"><?php the_title(); ?></h3>
	</div>
</a>
