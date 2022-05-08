<?php

/**
 * Enqueue css and js.
 */

add_action( 'admin_enqueue_scrips', 'enqueue_styles' );

function enqueue_styles( $hook ) {
    if ( $hook != 'toplevel_page_res_popup') {
        return;
    }
    
    // Enqueue styles.
    wp_enqueue_style(
        'admin-style',
        plugin_dir_url( __DIR__ ) . 'admin/css/app.css',
        [],
        '1.0.0',
        'all'
    );

    //Encolando la libreria de bootstrap 5.1
    wp_enqueue_style(
        'bootstrap-css',
        plugin_dir_url( __DIR__ ) . 'helpers/bootstrap-5.1/css/bootstrap.min.css',
        [],
        '5.1.0',
        'all'
    );
    wp_enqueue_style(
        'bootstrap.rtl-css',
        plugin_dir_url( __DIR__ ) . 'helpers/bootstrap-5.1/css/bootstrap.rtl.min.css',
        [],
        '5.1.0',
        'all'
    );
    wp_enqueue_style(
        'bootstrap-grid-css',
        plugin_dir_url( __DIR__ ) . 'helpers/bootstrap-5.1/css/bootstrap-grid.min.css',
        [],
        '5.1.0',
        'all'
    );
    wp_enqueue_style(
        'bootstrap-grid-rtl-css',
        plugin_dir_url( __DIR__ ) . 'helpers/bootstrap-5.1/css/bootstrap-grid.rtl.min.css',
        [],
        '5.1.0',
        'all'
    );
    wp_enqueue_style(
        'bootstrap-reboot-css',
        plugin_dir_url( __DIR__ ) . 'helpers/bootstrap-5.1/css/bootstrap-reboot.min.css',
        [],
        '5.1.0',
        'all'
    );
    wp_enqueue_style(
        'bootstrap-reboot-rtl-css',
        plugin_dir_url( __DIR__ ) . 'helpers/bootstrap-5.1/css/bootstrap-reboot.rtl.min.css',
        [],
        '5.1.0',
        'all'
    );
    wp_enqueue_style(
        'bootstrap-utilities-css',
        plugin_dir_url( __DIR__ ) . 'helpers/bootstrap-5.1/css/bootstrap-utilities.min.css',
        [],
        '5.1.0',
        'all'
    );
    wp_enqueue_style(
        'bootstrap-utilities-rtl-css',
        plugin_dir_url( __DIR__ ) . 'helpers/bootstrap-5.1/css/bootstrap-utilities.rtl.min.css',
        [],
        '5.1.0',
        'all'
    );

}

function enqueue_scripts( $hook ) {
    if ( $hook != 'toplevel_page_res_popup') {
        return;
    }

}