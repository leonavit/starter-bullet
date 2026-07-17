<?php
/**
 * Archive pages (category, tag, author, date).
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

get_header();

$description = get_the_archive_description();
if ( is_string( $description ) ) {
	$description = wp_strip_all_tags( $description );
} else {
	$description = '';
}

get_template_part(
	'template-parts/content/posts',
	'archive',
	array(
		'heading'     => get_the_archive_title(),
		'description' => $description,
	)
);

get_footer();
