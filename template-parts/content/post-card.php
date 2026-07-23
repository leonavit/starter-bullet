<?php
/**
 * Blog post card.
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

$show_date = 'show' === sb_get_site_option( 'post_date_visible', 'hide' );
?>
<article <?php post_class( 'overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm transition hover:shadow-md' ); ?>>
	<?php if ( has_post_thumbnail() ) : ?>
		<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'medium_large', array( 'class' => 'h-48 w-full object-cover sb-lazy-img', 'loading' => 'lazy' ) ); ?></a>
	<?php else : ?>
		<div class="skeleton h-48 w-full"></div>
	<?php endif; ?>
	<div class="p-6">
		<?php if ( $show_date ) : ?>
			<p class="text-xs text-royal-blue"><?php echo esc_html( get_the_date() ); ?></p>
		<?php endif; ?>
		<h3 class="<?php echo $show_date ? 'mt-2 ' : ''; ?>text-lg font-bold text-navy">
			<a href="<?php the_permalink(); ?>" class="hover:text-royal-blue"><?php the_title(); ?></a>
		</h3>
		<p class="mt-2 text-sm text-gray-600"><?php echo esc_html( get_the_excerpt() ); ?></p>
		<a href="<?php the_permalink(); ?>" class="mt-4 inline-flex text-sm font-bold text-royal-blue hover:underline">
			<?php esc_html_e( 'קרא עוד', 'starter-bullet' ); ?> →
		</a>
	</div>
</article>
