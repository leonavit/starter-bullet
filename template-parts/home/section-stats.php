<?php
/**
 * Section 3: Statistics
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

$d = sb_get_section( 'stats' );

$number_color  = sanitize_hex_color( (string) ( $d['number_color'] ?? '' ) );
$label_color   = sanitize_hex_color( (string) ( $d['label_color'] ?? '' ) );
$number_size   = absint( $d['number_size'] ?? 0 );
$label_size    = absint( $d['label_size'] ?? 0 );
$number_weight = absint( $d['number_weight'] ?? 0 );
$label_weight  = absint( $d['label_weight'] ?? 0 );

$number_style_parts = array();
$label_style_parts  = array();

if ( $number_color ) {
	$number_style_parts[] = 'color:' . $number_color;
}
if ( $number_size >= 10 ) {
	$number_style_parts[] = 'font-size:' . $number_size . 'px';
}
if ( $number_weight >= 100 && $number_weight <= 800 ) {
	$number_style_parts[] = 'font-weight:' . $number_weight;
}
if ( $label_color ) {
	$label_style_parts[] = 'color:' . $label_color;
}
if ( $label_size >= 10 ) {
	$label_style_parts[] = 'font-size:' . $label_size . 'px';
}
if ( $label_weight >= 100 && $label_weight <= 800 ) {
	$label_style_parts[] = 'font-weight:' . $label_weight;
}

$number_style = $number_style_parts ? ' style="' . esc_attr( implode( ';', $number_style_parts ) ) . '"' : '';
$label_style  = $label_style_parts ? ' style="' . esc_attr( implode( ';', $label_style_parts ) ) . '"' : '';
?>
<section class="bg-slate-50 py-12 <?php echo esc_attr( sb_section_hide_mobile_class( 'stats' ) ); ?>"<?php echo sb_section_bg_style( 'stats' ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>>
	<div class="sb-section mx-auto grid max-w-7xl grid-cols-2 gap-8 px-4 lg:grid-cols-4 lg:px-8" data-skeleton>
		<?php for ( $i = 1; $i <= 4; $i++ ) : ?>
			<div class="text-center">
				<p class="sb-stat-number text-4xl font-extrabold text-royal-blue"<?php echo $number_style; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php echo esc_html( (string) $d[ "stat_{$i}_number" ] ); ?></p>
				<p class="mt-2 text-sm text-gray-600"<?php echo $label_style; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>><?php echo esc_html( (string) $d[ "stat_{$i}_label" ] ); ?></p>
			</div>
		<?php endfor; ?>
	</div>
</section>
