<?php
/**
 * Blog posts index (Posts page).
 *
 * @package Starter_Bullet
 */

declare(strict_types=1);

get_header();

$posts_page_id = (int) get_option( 'page_for_posts' );
$blog_settings = sb_get_section( 'blog' );

$heading = $posts_page_id ? get_the_title( $posts_page_id ) : (string) ( $blog_settings['title'] ?? __( 'מאמרים', 'starter-bullet' ) );

$description = '';
if ( $posts_page_id ) {
	$description = trim( get_post_field( 'post_excerpt', $posts_page_id ) );
}
if ( $description === '' ) {
	$description = (string) ( $blog_settings['subtitle'] ?? '' );
}

get_template_part(
	'template-parts/content/posts',
	'archive',
	array(
		'heading'     => $heading,
		'description' => $description,
	)
);

get_footer();
