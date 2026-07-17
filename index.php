<?php
/**
 * Fallback index template.
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

get_header();

$blog_settings = sb_get_section( 'blog' );

get_template_part(
	'template-parts/content/posts',
	'archive',
	array(
		'heading'     => (string) ( $blog_settings['title'] ?? __( 'מאמרים', 'starter-bullet' ) ),
		'description' => (string) ( $blog_settings['subtitle'] ?? '' ),
	)
);

get_footer();
