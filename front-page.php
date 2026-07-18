<?php
/**
 * Front page — loads configurable home sections.
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

get_header();

$sections = array(
	'hero',
	'benefits',
	'about',
	'stats',
	'features',
	'secondary',
	'services',
	'faq',
	'testimonials',
	'blog',
);

foreach ( $sections as $section ) {
	if ( sb_section_enabled( $section ) ) {
		get_template_part( 'template-parts/home/section', $section );
	}
}

get_footer();
