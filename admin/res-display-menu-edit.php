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
                            Aqui van los campos.
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

</div>














