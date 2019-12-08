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
                                    <label for="VBarco">Barco</label>
                                    <div class="position-relative">
                                        <select name="nuevoBarco" id="VBarco" required class="form-select">
                                            <option>Elegir...</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group has-icon-left">
                                    <label for="VOrdinal">Ordinal</label>
                                    <div class="position-relative">
                                        <select name="nuevoOrdinal" id="VOrdinal" required class="form-select">
                                            <option>Elegir...</option>
                                            <option value="01">01</option>
                                            <option value="11">11</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group has-icon-left">
                                    <label for="VInspectoria">Inspectoria</label>
                                    <div class="position-relative">
                                        <input type="text" name="nuevoInspectoria" pattern="[A-Za-z\s]{1,30}" id="VInspectoria" required class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-1 mb-1">Guardar</button>
                        </div>

                        <?php
                        $crearPermiso = new ControladorPermisos();
                        $crearPermiso->ctrCrearPermiso();
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>