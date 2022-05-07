<?php

/**
 * Create the menu pop-up.
 */

if ( !function_exists( 'res_menu_popup' ) ) {

    add_action( 'admin_menu', 'res_menu_popup' );

    function res_menu_popup() {

        add_menu_page(
            'Menú Pop-Up',
            'Menú Pop-Up',
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
        echo "Menú  de optiones";
    }
}