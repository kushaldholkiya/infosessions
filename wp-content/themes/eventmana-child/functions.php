<?php
/**
 * Setup eventmana Child Theme's textdomain.
 *
 * Declare textdomain for this child theme.
 * Translations can be filed in the /languages/ directory.
 */
function eventmana_child_theme_setup() {
	load_child_theme_textdomain( 'eventmana-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'eventmana_child_theme_setup' );


add_action( 'wp_enqueue_scripts', 'eventmana_child_scripts' );
function eventmana_child_scripts() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri(). '/style.css' );
}
