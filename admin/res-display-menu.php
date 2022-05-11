<?php
/**
 * HTML of firts page.
 */

$dato = get_option('res_popup');

?>

<div class="container-fluid page-menu" style="background-color: #f1f1f1">
    <h3>Dashboard</h3>
    <div class="row">

        <!-- Block 1 -->
        <div class="col-sm-12">
            <div class="card mb-3" style="max-width: 100%;">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img class="img-fluid" src="<?= plugin_dir_url(__FILE__) . 'imgs/img-pop-up.png'; ?>" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Title</h5>
                            <p class="card-text">
                                Gana dinero promocionando algún tipo de producto o servicio
                            </p>
                            <p class="card-text"><small class="text-muted">Convierte tus visitas en ganacias</small></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Block 2 -->
        <div class="col-sm-12">
            <div class="card text-dark mb-3">
                <div class="card-header">
                    <h6 class="res-box-title">
                        Pop-ups
                    </h6>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        En esta parte podrás editar o eliminar tu pop-up, cada vez que crees uno 
                        aparecerá justo debajo con su respectivo shortcode para que lo pegues en las páginas 
                        donde quieras que aparezca.
                    </p>
                    <table class="table" id="tableId">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                                <th scope="col">Shortcode</th>
                                <th scope="col">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ( $dato != '' ): ?>
                                <?php foreach ( $dato as $key => $datos ): ?>
                                    <tr id="<?= $datos['id'] ?>"  data-nombre="<?= $datos['nombre'] ?>">
                                        <th scope='row'><?= $datos['nombre'] ?></th>
                                        <td>[popup nombre="<?= $datos['nombre'] ?>" id="<?= $datos['id'] ?>"]</td>
                                        <td>
                                            <a href='#' type='button' class='btn btn-outline-info' id='btn_editar'>
                                                <span class='dashicons dashicons-welcome-write-blog'></span>
                                            </a>
                                            <a type='button' class='btn btn-outline-danger' id='btn_eliminar' data-objeto='<?= $key ?>'>
                                                <span class='dashicons dashicons-trash'></span>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <?= "No entramos" . var_dump($dato) ?>
                            <?php endif; ?>
                        </tbody>

                        <!--Boton crear-->
                        <a href="#" type="button" class="btn btn-primary text-uppercase btn-crear" id="btn_crear">
                            <span class="dashicons dashicons-plus"></span> Crear
                        </a>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include 'res-modal.php'; ?>