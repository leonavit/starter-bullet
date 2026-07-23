<?php
/**
 * Benefits bar section (below hero).
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

$d     = sb_get_section( 'benefits' );
$items = is_array( $d['items'] ?? null ) ? $d['items'] : array();

if ( ! $items ) {
	return;
}

[ $iw, $ih ] = sb_resolve_icon_size( $d );
$icon_box    = max( $iw, $ih ) + 28;
$cols        = min( 4, max( 1, count( $items ) ) );
$grid_class  = 1 === $cols ? 'grid-cols-1' : ( 2 === $cols ? 'md:grid-cols-2' : ( 4 === $cols ? 'md:grid-cols-2 lg:grid-cols-4' : 'md:grid-cols-3' ) );
?>
<section class="sb-benefits-bar text-white <?php echo esc_attr( sb_section_hide_mobile_class( 'benefits' ) ); ?>"<?php echo sb_section_bg_style( 'benefits' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<div class="mx-auto grid max-w-7xl grid-cols-1 divide-y divide-white/20 px-4 <?php echo esc_attr( $grid_class ); ?> md:divide-x md:divide-y-0 md:divide-x-reverse lg:px-8">
		<?php foreach ( $items as $item ) : ?>
			<?php
			$url       = (string) ( $item['url'] ?? '' );
			$is_link   = '' !== $url;
			$item_tag  = $is_link ? 'a' : 'div';
			$item_class = 'flex items-center gap-4 px-4 py-4 md:py-0 md:first:pr-0 md:last:pl-0';
			if ( $is_link ) {
				$item_class .= ' text-inherit no-underline transition-opacity hover:opacity-90 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white';
			}
			?>
			<<?php echo tag_escape( $item_tag ); ?>
				class="<?php echo esc_attr( $item_class ); ?>"
				<?php if ( $is_link ) : ?>
					href="<?php echo esc_url( $url ); ?>"
				<?php endif; ?>
			>
				<div class="flex shrink-0 items-center justify-center rounded-full text-white" style="<?php echo esc_attr( sb_icon_circle_style( $d, $icon_box, 'rgba(255,255,255,0.12)' ) ); ?>">
					<?php
					sb_render_icon(
						(string) ( $item['icon'] ?? 'home' ),
						(string) ( $item['lordicon'] ?? '' ),
						array(
							'svg_class'       => 'shrink-0',
							'lordicon_colors' => 'primary:#ffffff,secondary:#f9bc2f',
							'lordicon_size'   => '28px',
							'fallback_key'    => 'home',
							'width'           => $iw,
							'height'          => $ih,
						)
					);
					?>
				</div>
				<div>
					<h3 class="text-base font-bold leading-snug">
						<?php echo esc_html( (string) ( $item['title'] ?? '' ) ); ?>
					</h3>
					<p class="mt-1 text-sm leading-relaxed text-white/85">
						<?php echo esc_html( (string) ( $item['desc'] ?? '' ) ); ?>
					</p>
				</div>
			</<?php echo tag_escape( $item_tag ); ?>>
		<?php endforeach; ?>
	</div>
</section>
