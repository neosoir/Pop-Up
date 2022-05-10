<?php

/**
 * Enqueue css.
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

/**
 * Enqueue js.
 */

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
        plugin_dir_url( __DIR__ ) . 'helpers/bootstrap-5.1/js/bootstrap.min.js',
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

    // Localize script edit pop up
    wp_localize_script(
        'admin-script',
        'dataPopup',
        [
            'url'       =>  admin_url('admin-ajax.php'),
            'seguridad' =>  wp_create_nonce('resdata_seg'),
            'objeto'    =>  get_option('res_popup')
        ]
    );

    /**
    * Funcion para utilizar el marco multimedia de wordpress
    */
    wp_enqueue_media();

    //función para crear popup con los datos
    wp_localize_script(
        'admin-script',
        'dataCreatePopup',
        array(
            'url' => admin_url('admin-ajax.php'),
            'seguridad' => wp_create_nonce('resdata_seg')
        )
    );

}

// Create basic data of pop up using ajax.
add_action('wp_ajax_res_data_popup', 'res_data_popup');

function res_data_popup() {

    // Check nonce security
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
            else if ( get_option( 'res_popup' ) != null ) {
                
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
        elseif ( $tipo == 'delete' ) {

            $data = get_option( 'res_popup' );

            $objeto = (int) $objeto;

            if ( is_int( $objeto ) ) {
                unset( $data[$objeto] );
                $update_data = update_option('res_popup', $data, true);
            }
            if ( get_option( $nombre ) != null ) 
                $deleteObjet = delete_option( $nombre );
            
            $json = json_encode([
                'objeto'    =>  $objeto,
                'datos_u'   =>  $data,
                'nombre'    =>  $nombre
            ]);
        }

        // Print data and close the ajax query.
        echo $json;
        wp_die();
    }
}

// Function to create the pop up using ajax.
add_action('wp_ajax_res_create_popup', 'res_create_popup');

function res_create_popup() {

    // Check nonce security
    check_ajax_referer('resdata_seg', 'nonce');

    if ( current_user_can( 'manage_options' ) ) {
        
        // convert arrar to variable.
        extract( $_POST, EXTR_OVERWRITE );

        if ( $tipo == 'create' ) {
            
            if( get_option($nombre) == null ){

                $args[] = array(
                    'nombre'        => $nombre,
                    'titulo'        => $titulo,
                    'subtitulo'     => $subtitulo,
                    'imagen'        => $imagen,
                    'texto'         => $texto,
                    'buttonCheck'   => $buttonCheck,
                    'buttonTitle'   => $buttonTitle,
                    'buttonCheck1'  => $buttonCheck1,
                    'buttonCheck2'  => $buttonCheck2,
                    'buttonUrl'     => $buttonUrl
                ); 
    
                $data = add_option( $nombre, $args, true );
                $objeto = get_option( $nombre );
                $json = json_encode([
                   'data' => $data,
                   'objeto' => $objeto,
                ]);

            }
            else if( get_option($nombre) != null ){

                $args[] = array(
                    'nombre'        => $nombre,
                    'titulo'        => $titulo,
                    'subtitulo'     => $subtitulo,
                    'imagen'        => $imagen,
                    'texto'         => $texto,
                    'buttonCheck'   => $buttonCheck,
                    'buttonTitle'   => $buttonTitle,
                    'buttonCheck1'  => $buttonCheck1,
                    'buttonCheck2'  => $buttonCheck2,
                    'buttonUrl'     => $buttonUrl
                ); 
                
                $data = update_option( $nombre, $args, true );
                $objeto = get_option( $nombre );
                
               
                $json = json_encode([
                    'data' => $data,
                    'objeto' => $objeto
                ]);

            }
        }

        // Print data and close the ajax query.
        echo $json;
        wp_die();
    }
}
