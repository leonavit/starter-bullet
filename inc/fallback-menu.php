<?php
/**
 * Fallback menu.
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Simple fallback navigation.
 */
function starter_bullet_fallback_menu(): void {
	$links = array(
		array( 'label' => 'בית', 'url' => home_url( '/' ) ),
		array( 'label' => 'אודות', 'url' => '#about' ),
		array( 'label' => 'שירותים', 'url' => '#services' ),
		array( 'label' => 'צור קשר', 'url' => '#contact' ),
	);

	echo '<ul class="sb-nav-primary m-0 list-none p-0">';

	foreach ( $links as $link ) {
		printf(
			'<li><a href="%s" class="hover:text-accent-yellow transition-colors">%s</a></li>',
			esc_url( $link['url'] ),
			esc_html( $link['label'] )
		);
	}

	echo '</ul>';
}
