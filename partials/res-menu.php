<?php

/**
 * Create the menu pop up.
 */

if ( !function_exists( 'res_menu_popup' ) ) {

    add_action( 'admin_menu', 'res_menu_popup' );

    function res_menu_popup() {
        
        add_menu_page(
            'Menú Pop-Up',
            'Menú Pop-Up',
            'manage-options',
            'res_popup',
            'res_options_menu_popup',
            'dashicons-megaphone',
            12
        );

    }

}