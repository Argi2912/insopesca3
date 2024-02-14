<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Permisos</h3>
                <p class="text-subtitle text-muted">Solicitar Permiso</p>
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
    <section id="multiple-column-form">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Registrar Solicitud</h4>
            </div>
            <div class="card-content">
                <div class="card-body">
                    <form class="form" method="post">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group has-icon-left">
                                    <label for="VSolicitante">Solicitante</label>
                                    <div class="position-relative">
                                        <input type="hidden" name="soli" required id="soli" class="form-control">
                                        <select name="nuevoSolicitante" id="VSolicitante" required class="form-select">
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
                            <div class="col-md-6 col-12">
                                <div class="form-group has-icon-left">
                                    <label for="Cedula">Cedula</label>
                                    <div class="position-relative">
                                        <input type="number" maxlength="8" name="Cedula" readonly required id="Cedula" class="form-control">
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
                                        <input type="text" name="nuevoEstado" readonly required id="Estado" class="form-control">
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
                                        <input type="text" name="nuevoCONNPA" id="CONNPA" class="form-control">
                                        <div class="form-control-icon">
                                            <i data-feather="key"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <label for="Especies">Especies</label>
                                <select class="choices form-select multiple-remove" name="nuevoPuntal" id="Puntal" multiple="multiple">
                                    <optgroup>
                                        <option value="romboid">Romboid</option>
                                        <option value="trapeze">Trapeze</option>
                                        <option value="triangle">Triangle</option>
                                        <option value="polygon">Polygon</option>
                                    </optgroup>
                                </select>
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
                                        <select name="nuevoUAB" id="UAB" required class="form-select">
                                            <option>Elegir...</option>
                                            <option value="-10">-10m</option>
                                            <option value="-5">-5m</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group has-icon-left">
                                    <label for="Status">Status</label>
                                    <div class="position-relative">
                                        <select name="nuevoStatus" id="Status" required class="form-select">
                                            <option>Elegir...</option>
                                            <option value="1">Activo</option>
                                            <option value="2">Inactivo</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary mr-1 mb-1">Guardar</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>
</div>