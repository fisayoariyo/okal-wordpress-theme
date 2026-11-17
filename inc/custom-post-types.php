<?php
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Music releases — appear on the Music page and Home's "Latest Release".
 * Client fills in: Title, Description (content editor), Cover Art (featured image),
 * Year, Type, Streaming URL (custom fields added via meta box).
 */
function okal_register_release_cpt() {
	register_post_type( 'okal_release', array(
		'labels' => array(
			'name'               => __( 'Releases', 'okal' ),
			'singular_name'      => __( 'Release', 'okal' ),
			'add_new_item'       => __( 'Add New Release', 'okal' ),
			'edit_item'          => __( 'Edit Release', 'okal' ),
			'menu_name'          => __( 'Music Releases', 'okal' ),
		),
		'public'       => true,
		'has_archive'  => true,
		'show_in_rest' => true,
		'menu_icon'    => 'dashicons-album',
		'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'rewrite'      => array( 'slug' => 'music' ),
	) );
}
add_action( 'init', 'okal_register_release_cpt' );

/**
 * Journal entries — power the "Million Dollar Journey" page.
 */
function okal_register_journal_cpt() {
	register_post_type( 'okal_journal', array(
		'labels' => array(
			'name'          => __( 'Journal Entries', 'okal' ),
			'singular_name' => __( 'Journal Entry', 'okal' ),
			'add_new_item'  => __( 'Add New Journal Entry', 'okal' ),
			'edit_item'     => __( 'Edit Journal Entry', 'okal' ),
			'menu_name'     => __( 'The Journey', 'okal' ),
		),
		'public'       => true,
		'has_archive'  => true,
		'show_in_rest' => true,
		'menu_icon'    => 'dashicons-book-alt',
		'supports'     => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'rewrite'      => array( 'slug' => 'journey' ),
		'taxonomies'   => array( 'okal_journal_category' ),
	) );

	register_taxonomy( 'okal_journal_category', 'okal_journal', array(
		'labels'       => array( 'name' => __( 'Journal Categories', 'okal' ) ),
		'hierarchical' => true,
		'show_in_rest' => true,
		'rewrite'      => array( 'slug' => 'journey-category' ),
	) );
}
add_action( 'init', 'okal_register_journal_cpt' );

/**
 * Press / media items — power the Media page grid.
 */
function okal_register_press_cpt() {
	register_post_type( 'okal_press', array(
		'labels' => array(
			'name'          => __( 'Press Features', 'okal' ),
			'singular_name' => __( 'Press Feature', 'okal' ),
			'add_new_item'  => __( 'Add New Press Feature', 'okal' ),
			'edit_item'     => __( 'Edit Press Feature', 'okal' ),
			'menu_name'     => __( 'Press & Media', 'okal' ),
		),
		'public'       => true,
		'has_archive'  => true,
		'show_in_rest' => true,
		'menu_icon'    => 'dashicons-megaphone',
		'supports'     => array( 'title', 'editor', 'thumbnail' ),
		'rewrite'      => array( 'slug' => 'press' ),
	) );
}
add_action( 'init', 'okal_register_press_cpt' );

/**
 * Top Songs — the ranked track list on the Music page's YouTube-Music-style
 * artist header (thumbnail, title, play count, album). Order with the
 * "Order" field under Page Attributes to control ranking, same as the
 * Milestones timeline.
 */
function okal_register_track_cpt() {
	register_post_type( 'okal_track', array(
		'labels' => array(
			'name'          => __( 'Top Songs', 'okal' ),
			'singular_name' => __( 'Song', 'okal' ),
			'add_new_item'  => __( 'Add New Song', 'okal' ),
			'edit_item'     => __( 'Edit Song', 'okal' ),
			'menu_name'     => __( 'Top Songs', 'okal' ),
		),
		'public'       => true,
		'has_archive'  => true,
		'show_in_rest' => true,
		'menu_icon'    => 'dashicons-format-audio',
		'supports'     => array( 'title', 'thumbnail', 'page-attributes' ),
		'rewrite'      => array( 'slug' => 'song' ),
	) );
}
add_action( 'init', 'okal_register_track_cpt' );

/**
 * Milestones — the vertical timeline used on the About and Journey pages.
 */
function okal_register_milestone_cpt() {
	register_post_type( 'okal_milestone', array(
		'labels' => array(
			'name'          => __( 'Milestones', 'okal' ),
			'singular_name' => __( 'Milestone', 'okal' ),
			'add_new_item'  => __( 'Add New Milestone', 'okal' ),
			'edit_item'     => __( 'Edit Milestone', 'okal' ),
			'menu_name'     => __( 'Milestones', 'okal' ),
		),
		'public'       => false,
		'show_ui'      => true,
		'show_in_rest' => true,
		'menu_icon'    => 'dashicons-clock',
		'supports'     => array( 'title', 'editor', 'page-attributes' ),
	) );
}
add_action( 'init', 'okal_register_milestone_cpt' );
