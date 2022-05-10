<?php

/**
 * Enqueau all css and js files.
 */

add_action( 'wp_enqueue_scripts', 'enqueau_style_public');

function enqueau_style_public() {
    // Css
    wp_enqueue_style(
        'admin-style',
        plugin_dir_url(__DIR__) . 'public/css/app.css',
        [],
        '1.0.0',
        'all'
    );
}

add_action( 'wp_enqueue_scripts', 'enqueau_script_public');

function enqueau_script_public() {
    // Css
    wp_enqueue_script(
        'admin-script',
        plugin_dir_url(__DIR__) . 'public/js/app.js',
        ['jquery, bootstrap-min'],
        '1.0.0',
        true
    );
}