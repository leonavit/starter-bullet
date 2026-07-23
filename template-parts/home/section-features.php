<?php
/**
 * Section 4: Features
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

$d     = sb_get_section( 'features' );
$items = is_array( $d['items'] ?? null ) ? $d['items'] : array();

$columns = max( 1, min( 4, (int) ( $d['columns'] ?? 3 ) ) );

[ $iw, $ih ] = sb_resolve_icon_size( $d );
$icon_box    = max( $iw, $ih ) + 28;

$card_title_size = absint( $d['card_title_size'] ?? 0 );
$card_text_size  = absint( $d['card_text_size'] ?? 0 );
$card_title_style = $card_title_size ? 'font-size:' . $card_title_size . 'px;' : '';
$card_text_style  = $card_text_size ? 'font-size:' . $card_text_size . 'px;' : '';

if ( 1 === $columns ) {
	$grid_classes = 'mx-auto grid max-w-xl gap-8';
} elseif ( 2 === $columns ) {
	$grid_classes = 'grid gap-8 md:grid-cols-2';
} elseif ( 4 === $columns ) {
	$grid_classes = 'grid gap-8 md:grid-cols-2 lg:grid-cols-4';
} else {
	$grid_classes = 'grid gap-8 md:grid-cols-3';
}

if ( ! $items ) {
	return;
}
?>
<section class="bg-blue-50 py-16 lg:py-20 <?php echo esc_attr( sb_section_hide_mobile_class( 'features' ) ); ?>"<?php echo sb_section_bg_style( 'features' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<div class="mx-auto max-w-7xl px-4 lg:px-8">
		<h2 class="mb-12 text-center text-3xl font-extrabold text-navy sm:text-4xl">
			<?php echo esc_html( (string) $d['title'] ); ?>
		</h2>
		<div class="sb-section <?php echo esc_attr( $grid_classes ); ?>" data-skeleton>
			<?php foreach ( $items as $item ) : ?>
				<div class="rounded-2xl bg-white p-8 text-center shadow-sm">
					<div class="mx-auto mb-4 flex items-center justify-center rounded-full text-royal-blue" style="<?php echo esc_attr( sb_icon_circle_style( $d, $icon_box, 'rgba(37,99,235,0.1)' ) ); ?>">
						<?php
						sb_render_icon(
							(string) ( $item['icon'] ?? 'badge' ),
							(string) ( $item['lordicon'] ?? '' ),
							array(
								'svg_class'       => 'shrink-0',
								'lordicon_colors' => 'primary:#2563eb,secondary:#f9bc2f',
								'lordicon_size'   => '28px',
								'fallback_key'    => 'badge',
								'width'           => $iw,
								'height'          => $ih,
							)
						);
						?>
					</div>
					<h3 class="text-lg font-bold text-navy"<?php echo $card_title_style ? ' style="' . esc_attr( $card_title_style ) . '"' : ''; ?>><?php echo esc_html( (string) ( $item['title'] ?? '' ) ); ?></h3>
					<p class="mt-2 text-sm text-gray-600"<?php echo $card_text_style ? ' style="' . esc_attr( $card_text_style ) . '"' : ''; ?>><?php echo esc_html( (string) ( $item['desc'] ?? '' ) ); ?></p>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</section>
