<?php
/**
 * The Template for displaying all single posts
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::get_context();
$post = Timber::query_post();
$context['post'] = $post;
$context['comment_form'] = TimberHelper::get_comment_form();

$context['share']['facebook'] = "https://www.facebook.com/sharer/sharer.php?u=" . urlencode($post->link);
$context['share']['twitter'] = "https://twitter.com/home?status=" . urlencode($post->link);
$context['share']['tumblr'] = "http://www.tumblr.com/share/link?url=" . urlencode($post->link);

if ( post_password_required( $post->ID ) ) {
	Timber::render( 'single-password.twig', $context );
} else {
	Timber::render( array( 'single-' . $post->ID . '.twig', 'single-' . $post->post_type . '.twig', 'single.twig' ), $context );
}
