<?php
/**
 * Okal — Million Dollar Journey theme functions.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

define( 'OKAL_THEME_VERSION', '1.0.0' );

/**
 * Theme setup.
 */
function okal_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script' ) );
	add_theme_support( 'custom-logo', array(
		'height'      => 80,
		'width'       => 240,
		'flex-height' => true,
		'flex-width'  => true,
	) );
	add_theme_support( 'automatic-feed-links' );

	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'okal' ),
		'footer'  => __( 'Footer Navigation', 'okal' ),
	) );
}
add_action( 'after_setup_theme', 'okal_setup' );

/**
 * Enqueue styles and scripts.
 */
function okal_scripts() {
	wp_enqueue_style( 'okal-google-fonts', 'https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,300;0,9..144,500;0,9..144,600;1,9..144,500&family=Sora:wght@300;400;500;600;700&family=Space+Mono:wght@400;700&family=Roboto:wght@400;500;700&display=swap', array(), null );
	wp_enqueue_style( 'okal-style', get_stylesheet_uri(), array(), OKAL_THEME_VERSION );
	wp_enqueue_script( 'okal-main', get_template_directory_uri() . '/assets/js/main.js', array(), OKAL_THEME_VERSION, true );
}
add_action( 'wp_enqueue_scripts', 'okal_scripts' );

/**
 * Sensible image sizes for cover art / journal thumbnails / portraits.
 */
function okal_image_sizes() {
	add_image_size( 'okal-cover', 800, 800, true );     // release cover art (square)
	add_image_size( 'okal-portrait', 900, 1125, true );  // hero / about portraits (4:5)
	add_image_size( 'okal-wide', 1200, 750, true );      // journal thumbnails (16:10)
}
add_action( 'after_setup_theme', 'okal_image_sizes' );

/**
 * Includes.
 */
require get_template_directory() . '/inc/custom-post-types.php';
require get_template_directory() . '/inc/meta-boxes.php';
require get_template_directory() . '/inc/customizer.php';
require get_template_directory() . '/inc/template-helpers.php';
