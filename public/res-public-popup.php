<?php

/**
 * Enqueau all css and js files.
 */

add_action( 'wp_enqueue_scripts', 'enqueue_style_public');

function enqueue_style_public() {

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

    // Css
    wp_enqueue_style(
        'admin-style',
        plugin_dir_url(__DIR__) . 'public/css/app.min.css',
        [],
        '1.0.0',
        'all'
    );

}

add_action( 'wp_enqueue_scripts', 'enqueue_scripts_public');

function enqueue_scripts_public() {

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

    // Js
    wp_enqueue_script(
        'admin-script',
        plugin_dir_url(__DIR__) . 'public/js/app.min.js',
        ['jquery'],
        '1.0.0',
        true
    );

}

// Shorcode function

add_shortcode( 'popup', 'res_public_popup' );

function res_public_popup( $atts, $content = '' ){

    $args = shortcode_atts(
        array(
            'nombre' => '',
            'id' => ''
        ),
        $atts
    );

    extract( $args, EXTR_OVERWRITE );

    //Establecemos el nombre que tendra el popup edit
    $popupEdit = $nombre.'-ID-'.$id;

    if($id != ''){

        $data = get_option($popupEdit);

        if( $data != null ){

            //Convertimos el arreglo en un objeto std class
            $objeto = (object) $data[0];

            //validamos un boton check para definir el target
            $check = $objeto->buttonCheck1;
            $target = ($check == 'false' ? '_self' : '_blank');

            $output = "
                <div class='modal modalPreviewPublic' tabindex='-1' id='modalPreviewPublic'>
                    <div class='modal-dialog modal-dialog-centered'>
                    <div class='modal-content'>
                        <div class='row'>
                            <div class='col-4 col-sm-4'>
                                <div class='class-imgFondo' style='background-image: url($objeto->imagen)'></div>
                            </div>
                            <div class='col-8 col-sm-8'>
                                <div class='mb-3 mt-2 row'>
                                    <div class='col-12 col-sm- d-flex justify-content-end pd-btnclose'>
                                        <div class='col-1'>
                                            <button type='button' class='close btn-close' data-dismiss='modal' data-bs-dismiss='modal' aria-label='Close'>      
                                                <div class='boton-close'><span aria-hidden='true'>×</span></div>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                    
                                <div class='mb-4 row'>
                                    <div class='col-12 pd-textmodal'>
                                        <div class='content-popup text-center'>
                                            <h4>$objeto->titulo</h4>
                                            <h6>$objeto->subtitulo</h6>
                                            $objeto->texto
                                        </div>
                                    </div>
                                </div>
                                <div class='mb-5 row'>
                                    <div class='col-12 pd-textmodal btn-callAction text-center'>
                                        <a class='btn btn-success' href='$objeto->buttonUrl' target='$target'>
                                            <span>$objeto->buttonTitle</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            ";

        }else{
            $output = "<h5>No hay datos del pop up</h5>";
        }

        return $output;

    }

}





