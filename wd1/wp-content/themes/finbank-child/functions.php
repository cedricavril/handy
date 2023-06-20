<?php
/**
 * Theme functions and definitions.
 */
function finbank_child_enqueue_styles() {

    if ( SCRIPT_DEBUG ) {
        wp_enqueue_style( 'finbank-style' , get_template_directory_uri() . '/style.css' );
    } else {
        wp_enqueue_style( 'finbank-minified-style' , get_template_directory_uri() . '/style.min.css' );
    }

    wp_enqueue_style( 'finbank-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( 'finbank-style' ),
        wp_get_theme()->get('Version')
    );
}

add_action(  'wp_enqueue_scripts', 'finbank_child_enqueue_styles' );