<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Barcos</h3>
                <p class="text-subtitle text-muted">Listado de Barcos</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="personas">INSOPESCA</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Barcos</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <p>Listado de Barcos Registradas</p>
                </div>
                <div class="row">
                    <div class="col-md">
                        <button type="button" class="btn btn-outline-primary block" data-toggle="modal" data-target="#ModalCrearRegistroBarco">Ingresar Barco</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class='barcos-tabla table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre del Barco</th>
                            <th>Eslora</th>
                            <th>Manga</th>
                            <th>Puntal</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $item = null;
                        $valor = null;

                        $barcos = ControladorBarco::ctrMostrarBarco($item, $valor);

                        foreach ($barcos as $key => $value) {
                            echo ' <tr>
                                       <td>' . ($key + 1) . '</td>
                                       <td>' . $value["nombre_barco"] . '</td>
                                       <td>' . $value["eslora"] . 'm</td>
                                       <td>' . $value["manga"] . 'm</td>
                                       <td>' . $value["puntal"] . 'm</td>';


                            echo '<td>
        
                                                <div class="btn-group">
                                       
                                                <button type="button" class="btn btn-outline-primary block btn btn-warning btnEditarBarco" idBarco="' . $value["id"] . '" data-toggle="modal" data-target="#ModalEditarRegistroBarco"><i data-feather="user"></i></button>
                                       
                                                <button class="btn btn-danger btnEliminarBarco" idBarco="' . $value["id"] . '" ><i data-feather="x"></i></i></button>
                                       
                                                </div>  
        
                                              </td>
        
                                        </tr>';
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>

<!--=====================================
MODAL CREAR REGISTRO
======================================-->

<div class="modal fade" id="ModalCrearRegistroBarco" tabindex="-1" aria-labelledby="ModalCrearRegistroBarco" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ModalCrearRegistroBarco">Crear Registro</h4>
                <button type="button" class="close" data-dimiss="modal" aria-label="Close">x</button>
            </div>
            <form role="form" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="Dueño">Dueño del Barco</label>
                                <div class="position-relative">
                                    <select name="nuevoDueño" id="Dueño" required class="form-select">
                                        <option>Elegir...</option>
                                        <?php

                                        $item = null;
                                        $valor = null;

                                        $personas = ControladorPersona::ctrMostrarPersona($item, $valor);

                                        foreach ($personas as $key => $value) {

                                            echo '<option value="' . $value["id"] . '">' . $value["primer_nombre"] . '</option>';
                                        }

                                        ?>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="NombreBarco">Ingresar Nombre del Barco</label>
                                <div class="position-relative">
                                    <input type="text" name="nuevoNombreBarco" required id="NombreBarco" class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="key"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="Matricula">Ingresar Matricula del Barco</label>
                                <div class="position-relative">
                                    <input type="text" name="nuevoMatricula" required id="Matricula" class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="key"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="Eslora">Ingresar Eslora</label>
                                <div class="position-relative">
                                    <input type="number" maxlength="8" step="any" name="nuevoEslora" required id="Eslora" class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="user"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="Manga">Ingresar Manga</label>
                                <div class="position-relative">
                                    <input type="number" name="nuevoManga" step="any" required id="Manga" class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="key"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="Puntal">Ingresar Puntal</label>
                                <div class="position-relative">
                                    <input type="number" name="nuevoPuntal" step="any" required id="Puntal" class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="key"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="COMPA">Ingresar COMPPA</label>
                                <div class="position-relative">
                                    <input type="text" name="nuevoCOMPA" step="any" required id="COMPA" class="form-control">
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
                                    <select name="nuevoUAB" id="UAB" required class="form-select">
                                        <option>Elegir...</option>
                                        <option value="-10">-10m</option>
                                        <option value="-5">-5m</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <label for="Especies">Especies</label>
                            <input type="text" name="nuevoEspecies" required id="Especies" class="form-control">
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group has-icon-left">
                                <label for="Pesca">Arte de Pesca</label>
                                <div class="position-relative">
                                    <select name="nuevoPesca" id="Pesca" required class="form-select">
                                        <option>Elegir...</option>
                                        <option value="Redes">Redes</option>
                                        <option value="Nasa">Nasa</option>
                                        <option value="Cordeles">Cordeles</option>
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
                        <span class="d-none d-sm-block">Guardar</span>
                    </button>
                </div>

                <?php

                $crearBarco = new ControladorBarco();
                $crearBarco->ctrCrearBarco();

                ?>

            </form>
        </div>
    </div>
</div>

<!--=====================================
MODAL EDITAR REGISTRO
======================================-->

<div class="modal fade" id="ModalEditarRegistroBarco" tabindex="-1" aria-labelledby="ModalEditarRegistroBarco" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ModalEditarRegistroBarco">Editar Registro</h4>
                <button type="button" class="close" data-dimiss="modal" aria-label="Close">x</button>
            </div>
            <form role="form" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="eDueño">Dueño Barco</label>
                                <div class="position-relative">
                                    <input type="hidden" name="idBarco" id="idBarco" class="form-control">
                                    <input type="text" name="eDueño" readonly id="eDueño" class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="user"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="eNombreBarco">Ingresar Nombre del Barco</label>
                                <div class="position-relative">
                                    <input type="text" name="editarNombreBarco" required id="eNombreBarco" class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="key"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="eMatricula">Ingresar Matricula del Barco</label>
                                <div class="position-relative">
                                    <input type="text" name="editarMatricula" required id="eMatricula" class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="key"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="eEslora">Ingresar Eslora</label>
                                <div class="position-relative">
                                    <input type="number" maxlength="8" step="any" name="editarEslora" required id="eEslora" class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="user"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="eManga">Ingresar Manga</label>
                                <div class="position-relative">
                                    <input type="number" name="editarManga" step="any" required id="eManga" class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="key"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="ePuntal">Ingresar Puntal</label>
                                <div class="position-relative">
                                    <input type="number" name="editarPuntal" step="any" required id="ePuntal" class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="key"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="eCOMPA">Ingresar COMPPA</label>
                                <div class="position-relative">
                                    <input type="text" name="editarCOMPA" required id="eCOMPA" class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="key"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group has-icon-left">
                                <label for="eUAB">UAB</label>
                                <div class="position-relative">
                                    <select name="editarUAB" id="eUAB" required class="form-select">
                                        <option>Elegir...</option>
                                        <option value="-10">-10m</option>
                                        <option value="-5">-5m</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <label for="eEspecies">Especies</label>
                            <input type="text" name="editarEspecies" required id="eEspecies" class="form-control">
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group has-icon-left">
                                <label for="ePesca">Arte de Pesca</label>
                                <div class="position-relative">
                                    <select name="editarPesca" id="ePesca" required class="form-select">
                                        <option>Elegir...</option>
                                        <option value="Redes">Redes</option>
                                        <option value="Nasa">Nasa</option>
                                        <option value="Cordeles">Cordeles</option>
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
                        <span class="d-none d-sm-block">Guardar</span>
                    </button>
                </div>

                <?php

                $editarBarco = new ControladorBarco();
                $editarBarco->ctrEditarBarco();

                ?>

            </form>
        </div>
    </div>
</div>


<?php

$borrarBarco = new ControladorBarco();
$borrarBarco->ctrBorrarBarco();

?>