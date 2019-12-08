<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Permisos</h3>
                <p class="text-subtitle text-muted">Listado de Permisos</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="permisos">INSOPESCA</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Permisos</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="tasks">
        <div class="row">
            <div class="col-12">
                <div class="card widget-todo">
                    <div class="card-header border-bottom d-flex justify-content-between align-items-center">
                        <div class="row">
                            <h4 class="card-title d-flex">
                                <i class='bx bx-check font-medium-5 pl-25 pr-75'></i>Solicitudes
                            </h4>
                            <div class="col-md">
                                <button type="button" class="btn btn-outline-primary block" data-toggle="modal" data-target="#ModalValidarPermiso">Validar permiso</button>
                            </div>
                        </div>
                        <div class="row">
                            
                        </div>
                    </div>
                    <div class="card-body px-0 py-1">
                        <table class='permisos-tabla table table-striped' id="table1">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Solicitante</th>
                                    <th>Barco</th>
                                    <th>Cedula</th>
                                    <th>Estado</th>
                                    <th>Inspectoria</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $item = null;
                                $valor = null;

                                $permisos = ControladorPermisos::ctrMostrarPermisos($item, $valor);

                                foreach ($permisos as $key => $value) {

                                    $item = "id";
                                    $valor = $value["id_barco"];

                                    $barcos = ControladorBarco::ctrMostrarBarco($item, $valor);
                                    echo ' <tr>
                                       <td>' . ($key + 1) . '</td>
                                       <td>' . $value["solicitante"] . '</td>
                                       <td>' .  $barcos["nombre_barco"] . '</td>
                                       <td>' . $value["ci"] . '</td>
                                       <td>' . $value["estado"] . '</td>
                                       <td>' . $value["inspectoria"] . '</td>';


                                    echo '<td>
        
                                                <div class="btn-group">
                                       
                                                <button type="button" class="btn btn-success btnReporte" permiso="' . $value["id"] . '">Imprimir</button>
                                       
                                                <button class="btn btn-danger btnEliminarPermiso"  permiso="' . $value["id"] . '" ><i data-feather="x"></i></i></button>
                                       
                                                </div>  
        
                                              </td>
        
                                        </tr>';
                                }

                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?php

$crearUsuario = new ControladorPermisos();
$crearUsuario->ctrBorrar();

?>


<div class="modal fade" id="ModalValidarPermiso" tabindex="-1" aria-labelledby="ModalValidarPermiso" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ModalCrearUsuario">Validar Permiso</h4>
            </div>
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="Ruta">Subir PDF</label>
                                <hr>
                                <div class="position-relative form-file">
                                    <input type="file" name="nuevaRuta" id="Ruta" class="nuevaRuta form-file-input">
                                    <label for="Ruta" class="form-file-label">
                                        <span class="form-file-text">Elige el PDF</span>
                                        <span class="form-file-button btn-primary">
                                            <i data-feather="upload"></i>
                                        </span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Cerrar</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Guardar</span>
                    </button>
                </div>

                <?php
                    
                    $pdf = new ControladorPermisos();
                    $pdf->ctrGuardarPdf();

                ?>

            </form>
        </div>
    </div>
</div>