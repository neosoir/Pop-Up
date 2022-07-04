<?php

/**
 * Create the menu pop-up.
 */

if ( !function_exists( 'res_menu_popup' ) ) {

    add_action( 'admin_menu', 'res_menu_popup' );

    function res_menu_popup() {

        add_menu_page(
            'Promo Pop-Up',
            'Promo Pop-Up',
            'manage_options',
            'res_popup',
            'res_options_menu_popup',
            'dashicons-megaphone',
            12
        );

    }

}

// Callback.

if ( !function_exists('res_options_menu_popup') ) {

    function res_options_menu_popup() {

        if ( $_GET['edit'] && $_GET['id'] ) {
            include plugin_dir_path( __DIR__ ) . 'admin/res-display-menu-edit.php';
        }  
        else {
            include plugin_dir_path( __DIR__ ) . 'admin/res-display-menu.php';
        }  
        
    }

}