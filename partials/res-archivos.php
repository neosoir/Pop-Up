<?php

/**
 * Enqueue css and js.
 */

add_action( 'admin_enqueue_scripts', 'enqueue_styles' );

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

add_action( 'admin_enqueue_scripts', 'enqueue_scripts');

function enqueue_scripts( $hook ) {
    if ( $hook != 'toplevel_page_res_popup') {
        return;
    }

    // Principal archive.
    wp_enqueue_script(
        'admin-script',
        plugin_dir_url( __DIR__ ) . 'admin/js/app.js',
        ['jquery', 'bootstrap-min'],
        '1.0.0',
        true
    );

    // Bootstrap library
    wp_enqueue_script(
        'bootstrap-min',
        plugin_dir_url( __DIR__ ) . 'admin/js/app.js',
        ['jquery'],
        '5.1.0',
        true
    );

    wp_enqueue_script(
        'bootstrap-bundle',
        plugin_dir_url( __DIR__ ) . 'helpers/bootstrap-5.1/js/bootstrap.bundle.min.js',
        ['jquery'],
        '5.1.0',
        true
    );

    // Localize script
    wp_localize_script(
        'admin-script',
        'dataPopup',
        [
            'url'       =>  admin_url('admin-ajax.php'),
            'seguridad' =>  wp_create_nonce('resdata_seg'),
            'objeto'    =>  get_option('res_popup')
        ]
    );
}

// Resive data by ajax.
add_action('wp_ajax_res_data_popup', 'res_data_popup');

function res_data_popup() {
    check_ajax_referer('resdata_seg', 'nonce');

    if ( current_user_can( 'manage_options' ) ) {
        
        // convert arrar to variable.
        extract( $_POST, EXTR_OVERWRITE );

        if ( $tipo == 'add' ) {
            if ( get_option( 'res_popup' ) == null ) {

                $args[] = [
                    'nombre' => $nombre,
                    'id'     => $id
                ];

                $data = add_option( 'res_popup', $args, true );

                $json = json_encode([
                    'data' => $data,
                    'objeto' => $args
                ]);
            }
            else if ( get_option( 'res_popup' ) !== null ) {
                
                $args = [
                    'nombre' => $nombre,
                    'id'     => $id
                ];

                $objeto = get_option('res_popup');
                array_push( $datos_u, $args );
                $data = update_option( 'res_popup', $datos_u, true );

                $json = json_encode([
                    'objeto' => $objeto,
                    'datos_u' => $datos_u,
                    'id' => $id
                ]);
            }
        }

        echo $json;
        wp_die();
    }
}