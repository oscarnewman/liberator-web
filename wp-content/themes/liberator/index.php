<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists
 *
 * Methods for TimberHelper can be found in the /lib sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since   Timber 0.1
 */

if ( ! class_exists( 'Timber' ) ) {
	echo 'Timber not activated. Make sure you activate the plugin in <a href="/wp-admin/plugins.php#timber">/wp-admin/plugins.php</a>';
	return;
}
$context = Timber::get_context();

$context['featured'] = Timber::get_post('category_name=featured');
$context['subfeatures'] = Timber::get_posts('category_name=sub-feature&numberposts=3');

$context['image_posts'] = Timber::get_posts('numberposts=6&meta_key=_thumbnail_id&cat=-2,-3,-4');

$context['plain_posts'] = Timber::get_posts(array(
    'numberposts' => 8,
    'category__not_in' => [2, 3, 4],
    'meta_query' => array(
        array(
            'key' => '_thumbnail_id',
            'value' => '?',
            'compare' => 'NOT EXISTS'
        )
    ),
));

$context['posts'] = Timber::get_posts('numberposts=8&cat=-2,-3,-4,-10,-8');

$context['games'] = Timber::get_posts('numberposts=4&cat=8');

$context['sports'] = Timber::get_posts('numberposts=4&cat=9');
$context['entertainment'] = Timber::get_posts('numberposts=5&cat=10');

$context['photo'] = Timber::get_post([
    'cat' => 4
]);

$context['old_photos'] = Timber::get_posts([
    'numberposts' => 5,
    'cat' => 4
]);


$context['message'] = Timber::get_posts([
    'numberposts' => 1,
    'category' => 'message'
]);


$templates = array( 'index.twig' );
if ( is_home() ) {
	array_unshift( $templates, 'home.twig' );
}
Timber::render( $templates, $context );
