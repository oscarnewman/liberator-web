<?php

show_admin_bar(false);


if ( ! class_exists( 'Timber' ) ) {
	add_action( 'admin_notices', function() {
			echo '<div class="error"><p>Timber not activated. Make sure you activate the plugin in <a href="' . esc_url( admin_url( 'plugins.php#timber' ) ) . '">' . esc_url( admin_url( 'plugins.php' ) ) . '</a></p></div>';
		} );
	return;
}

class Liberator extends TimberSite {

	function __construct() {
		add_theme_support( 'post-formats' );
		add_theme_support( 'post-thumbnails' );
		add_theme_support( 'menus' );

		add_filter( 'timber_context', array( $this, 'add_to_context' ) );
		add_filter( 'get_twig', array( $this, 'add_to_twig' ) );
		add_action( 'init', array( $this, 'register_post_types' ) );
		add_action( 'init', array( $this, 'register_taxonomies' ) );

		parent::__construct();
	}

	function register_post_types() {
		//this is where you can register custom post types
	}

	function register_taxonomies() {
		//this is where you can register custom taxonomies
	}


	function add_to_context( $context ) {
		$context['foo'] = 'bar';
		$context['stuff'] = 'I am a value set in your functions.php file';
		$context['notes'] = 'These values are available everytime you call Timber::get_context();';
		$context['menu'] = new TimberMenu();
		$context['site'] = $this;
		return $context;
	}

	function add_to_twig( $twig ) {
		/* this is where you can add your own fuctions to twig */
		$twig->addExtension( new Twig_Extension_StringLoader() );
		$twig->addFilter( 'myfoo', new Twig_Filter_Function( 'myfoo' ) );
		return $twig;
	}



}

new Liberator();

function myfoo( $text ) {
	$text .= ' bar!';
	return $text;
}

function liberator_scripts()
{
    // Deregister the included library
    wp_deregister_script( 'jquery' );

    // Register the library again from Google's CDN
    wp_register_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js', array(), null, false );

    // Register the script like this for a theme:
    wp_register_script( 'reading-time', get_template_directory_uri() . '/assets/js/reading-time.js', array( 'jquery' ) );
    wp_register_script( 'functions', get_template_directory_uri() . '/assets/js/functions.js', array( 'jquery' ) );

    // For either a plugin or a theme, you can then enqueue the script:
    wp_enqueue_script( 'reading-time' );
    wp_enqueue_script( 'functions' );
}
add_action( 'wp_enqueue_scripts', 'liberator_scripts' );

function image_tag($html, $id, $alt, $title) {
    $context = [];
    $context['image'] = new TimberImage($id);
    $context['alt'] = $alt;
    $html = Timber::compile('image_embed.twig', $context);
    return $html;
    // return preg_replace('/\s+/S', " ", $html);;
}
add_filter('get_image_tag', 'image_tag', 0, 4);