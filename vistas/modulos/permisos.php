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
                        <h4 class="card-title d-flex">
                            <i class='bx bx-check font-medium-5 pl-25 pr-75'></i>Solicitudes
                        </h4>
                    </div>
                    <div class="card-body px-0 py-1">
                        <ul class="widget-todo-list-wrapper" id="widget-todo-list">
                            <li class="widget-todo-item">
                                <div class="widget-todo-title-wrapper d-flex justify-content-between align-items-center mb-50">
                                    <div class="widget-todo-title-area d-flex align-items-center">
                                        <i data-feather="list" class='cursor-move'></i>
                                        <span class="widget-todo-title ml-50">Add SCSS and JS files if required</span>
                                    </div>
                                    <div class="widget-todo-item-action d-flex align-items-center">
                                        <div class="avatar">
                                            <button type="button" class="btn btn-outline-primary block" data-toggle="modal" data-target="#ModalVerSolicitud"><img src="assets/images/avatar/avatar-s-1.png" alt="" srcset=""></button>
                                        </div>
                                        <i class="bx bx-dots-vertical-rounded font-medium-3 cursor-pointer"></i>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!--=====================================
MODAL CREAR REGISTRO
======================================-->

<div class="modal fade" id="ModalVerSolicitud" tabindex="-1" aria-labelledby="ModalVerSolicitud" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ModalVerSolicitud">Solicitud de Permiso</h4>
                <button type="button" class="close" data-dimiss="modal" aria-label="Close">x</button>
            </div>
            <form role="form" method="post">
                <div class="modal-body">
                <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group has-icon-left">
                                    <label for="Solicitante">Solicitante</label>
                                    <div class="position-relative">
                                        <select name="nuevoSolicitante" id="Solicitante" required class="form-select">
                                            <option >Elegir...</option>
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group has-icon-left">
                                    <label for="Cedula">Cedula</label>
                                    <div class="position-relative">
                                        <input type="number" maxlength="8" name="Cedula" required id="Cedula" class="form-control">
                                        <div class="form-control-icon">
                                            <i data-feather="user"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group has-icon-left">
                                    <label for="NombreBarco">Nombre del Barco</label>
                                    <div class="position-relative">
                                        <input type="text" name="nuevoNombreBarco" required id="NombreBarco" class="form-control">
                                        <div class="form-control-icon">
                                            <i data-feather="key"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group has-icon-left">
                                    <label for="Estado">Estado</label>
                                    <div class="position-relative">
                                        <input type="text" name="nuevoEstado" required id="Estado" class="form-control">
                                        <div class="form-control-icon">
                                            <i data-feather="key"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group has-icon-left">
                                    <label for="Inspectoria">Inspectoria</label>
                                    <div class="position-relative">
                                        <input type="text" name="nuevoInspectoria" required id="Inspectoria" class="form-control">
                                        <div class="form-control-icon">
                                            <i data-feather="key"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group has-icon-left">
                                    <label for="Eslora">Eslora</label>
                                    <div class="position-relative">
                                        <input type="number" name="nuevoEslora" required id="Eslora" class="form-control">
                                        <div class="form-control-icon">
                                            <i data-feather="key"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group has-icon-left">
                                    <label for="ArtePesca">Arte de Pesca</label>
                                    <div class="position-relative">
                                        <input type="text" name="nuevoArtePesca" required id="ArtePesca" class="form-control">
                                        <div class="form-control-icon">
                                            <i data-feather="key"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group has-icon-left">
                                    <label for="Manga">Manga</label>
                                    <div class="position-relative">
                                        <input type="number" name="nuevoManga" required id="Manga" class="form-control">
                                        <div class="form-control-icon">
                                            <i data-feather="key"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group has-icon-left">
                                    <label for="Matricula">Matricula</label>
                                    <div class="position-relative">
                                        <input type="text" name="nuevoMatricula" required id="Matricula" class="form-control">
                                        <div class="form-control-icon">
                                            <i data-feather="key"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group has-icon-left">
                                    <label for="CONNPA">CONNPA</label>
                                    <div class="position-relative">
                                        <select name="nuevoCONNPA" id="CONNPA" required class="form-select">
                                            <option >Elegir...</option>
                                            
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group has-icon-left">
                                    <label for="Especies">Especies</label>
                                    <div class="position-relative">
                                        <input type="text" name="nuevoEspecies" required id="Especies" class="form-control">
                                        <div class="form-control-icon">
                                            <i data-feather="key"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group has-icon-left">
                                    <label for="Puntal">Puntal</label>
                                    <div class="position-relative">
                                        <input type="number" name="nuevoPuntal" required id="Puntal" class="form-control">
                                        <div class="form-control-icon">
                                            <i data-feather="key"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group has-icon-left">
                                    <label for="UAB">UAB</label>
                                    <div class="position-relative">
                                        <input type="number" name="nuevoUAB" required id="UAB" class="form-control">
                                        <div class="form-control-icon">
                                            <i data-feather="key"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group has-icon-left">
                                    <label for="Status">Status</label>
                                    <div class="position-relative">
                                        <select name="nuevoStatus" id="Status" required class="form-select">
                                            <option >Elegir...</option>
                                            <option value="1">Activo</option>
                                            <option value="2">Inactivo</option>
                                        </select>
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
                        <span class="d-none d-sm-block">Guardar Usuario</span>
                    </button>
                </div>

                 <?php

                        $crearUsuario = new ControladorUsuario();
                        $crearUsuario -> ctrCrearUsuario();

                    ?>
                   
            </form>
        </div>
    </div>
</div>