<?php

// Get data by get.
$nombre         = $_GET['edit'];
$id             = $_GET['id'];
$nombrePopup    = $nombre . '-ID-' . $id;

?>

<div class="container-fluid page-edit-popup">
    <div class="row block-01">
        <div class="card text-dark bg-light mb-3 mt-3" style="max-width: 90%">
            <h5><?= $nombre ?></h5>
        </div>
        <div class="btn-volver-atras px-0">
            <button type="button" class="btn btn-warning" id="volverAtras">
                <span class="dashicons dashicons-undo"></span>VOLVER ATRAS
            </button>
        </div>
    </div>

    <div class="row block-02">
        <form action="" method="post">
            <!--bloque 1-->
            <div class="col-sm-12">
                <div class="card text-dark bg-light mb-3" style="max-width: 100%">
                    <div class="card-body">
                        <div class="buttonsActions">
                            <button type="button" class="btn btn-secondary" id="btnPreview">
                                <span class="dashicons dashicons-visibility"></span>Previsualizar
                            </button>
                            <button type="button" class="btn btn-info" id="btnSave" data-nombre="<?= $nombrePopup ?>">
                                <span class="dashicons dashicons-cloud-upload"></span>Guardar
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!--bloque 2-->
            <div class="col-sm-12">
                <div class="card border-light mb-3" style="max-width: 100%">
                    <div class="card-header"><h5>Contenido</h5></div>
                    <div class="card-body">
                        <!--titulo-->
                        <div class="row campo-tiulo">
                            <div class="col-sm-12 col-md-4">
                                <h6>Titulo</h6>
                                <p>
                                    Añade un  título y un subtítulo para tu pop-up
                                </p>
                            </div>
                            <div class="col-sm-12 col-md-8">
                                <div class="mb-3">
                                    <label for="titulo" class="form-label">Título (opcional)</label>
                                    <input type="text" class="form-control" id="titulo" placeholder="Título" value="<?= $titulo ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="titulo" class="form-label">Subtítulo (opcional)</label>
                                    <input type="text" class="form-control" id="subTitulo" placeholder="Subtítulo" value="<?= $subtitulo ?>">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="divider"></div>
                            </div>
                        </div>
                        <!--imagen-->
                        <div class="row campo-imagen">
                            <div class="col-sm-12 col-md-4">
                                <h6>Imagen</h6>
                                <p>
                                    Añade aquí una imagen de fondo para tu pop-up
                                </p>
                            </div>
                            <div class="col-sm-12 col-md-8">
                                <h5>Imagen de fondo</h5>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" id="imgFondo" placeholder="#" aria-label="#" aria-describedby="basic-addon2" value="<?= $imagen ?>">
                                    <span class="input-group-text" id="basic-addon2">@</span>
                                </div>
                                <div class="imagen mt-3" id="imagen">
                                    <img class="img-fluid" src="" alt="">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="divider"></div>
                            </div>
                        </div>
                        <!--My contenido-->
                        <div class="row campo-imagen">
                            <div class="col-sm-12 col-md-4">
                                <h6>My contenido</h6>
                                <p>
                                    Añade aquí el texto para tu pop-up
                                </p>
                            </div>
                            <div class="col-sm-12 col-md-8">
                                <div class="mb-3" id="myContent">
                                    <?php 
                                    
                                    // open the editor of wordpress (tiny mce).
                                    $content = $texto;
                                    $editor_id = $id;
                                    $args = [
                                        'tinymce' => true,
                                        'content_css'   => '/wp-content/themes/mytheme/css/tinymce-editor.css',
                                        'media_buttons' => true,
                                        'textarea_rows' => 8
                                      
                                    ];
                                    $texto = wp_editor( $content, $editor_id, $args );
                                    ?>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="divider"></div>
                            </div>
                        </div>
                        <!--call to action-->
                        <div class="row campo-callToAction">
                            <div class="col-sm-12 col-md-4">
                                <h6>Llamada a la acción</h6>
                                <p>
                                    Añade aquí el nombre para tu botón de la llamada a la acción, 
                                    por ejemplo ver más o ver el siguiente enlace y luego añade la url
                                    hacia donde quieres redirigir.

                                </p>
                            </div>
                            <div class="col-sm-12 col-md-8">
                                <label class="switch" id="switch">
                                    <input type="checkbox" data-check="<?= $buttonCheck ?>">
                                    <div class="slider round"></div>
                                </label>
                                <div id="camposSwitch" class="camposSwitch">
                                    <div class="card text-dark bg-light mb-3" style="max-width: 100%">
                                        <div class="card-body row">
                                            <div class="col-12 col-sm-6">
                                                <div class="mb-3">
                                                    <label for="btnText1" class="btnText1">Título para el botón</label>
                                                    <input type="text" class="form-control" id="btnText1" placeholder="Título para el botón" value="<?= $buttonTitle ?>">
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-6">
                                                <div class="mb-3">
                                                    <h6>Abrir el link</h6>
                                                    <input type="radio" class="btn-check" name="tabsOptions" id="newTab" autocomplete="off" data-check="<?= $buttonCheck1 ?>">
                                                    <label class="btn btn-outline-secondary" for="newTab">Nueva ventana</label>

                                                    <input type="radio" class="btn-check" name="tabsOptions" id="sameTab" autocomplete="off" data-check="<?= $buttonCheck2 ?>">
                                                    <label class="btn btn-outline-secondary" for="sameTab">Misma ventana</label>
                                                </div>
                                            </div>
                                            <div class="col-12 col-sm-12">
                                                <div class="mb-3">
                                                    <label for="btnUrl" class="btnUrl">URL del botón</label>
                                                    <input type="text" class="form-control" id="btnUrl" placeholder="Escriba aquí la url para el botón" value="<?= $buttonUrl ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="divider"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>














