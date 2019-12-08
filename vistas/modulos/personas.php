<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Personas</h3>
                <p class="text-subtitle text-muted">Listado de Personas</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="personas">INSOPESCA</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Personas</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <p>Listado de Personas Registradas</p>
                </div>
                <div class="row">
                    <div class="col-md">
                        <button type="button" class="btn btn-outline-primary block" data-toggle="modal" data-target="#ModalCrearRegistro">Ingresar Cliente</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class='persona-tabla table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Nacionalidad</th>
                            <th>Cedula</th>
                            <th>Sexo</th>
                            <th>Estado</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $item = null;
                        $valor = null;

                        $personas = ControladorPersona::ctrMostrarPersona($item, $valor);

                        foreach ($personas as $key => $value) {
                            echo ' <tr>
                                       <td>' . $value["primer_nombre"] . " " . $value["segundo_nombre"] . '</td>
                                       <td>' . $value["primer_apellido"] . " " . $value["segundo_apellido"] . '</td>
                                       <td>' . $value["nacionalidad"] . '</td>
                                       <td>' . $value["ci"] . '</td>';
                            if ($value["sexo"] == 1) {
                                echo '<td>Masculino</td>';
                            } else {
                                echo '<td>Femenino</td>';
                            }
                            echo '<td>' . $value["estado"] . '</td>
                                             <td>' . $value["telefono"] . '</td>
                                             <td>' . $value["correo"] . '</td>';
                            echo '<td>
        
                                                <div class="btn-group">
                                       
                                                <button type="button" class="btn btn-outline-primary block btn btn-warning btnEditarPersona" idPersona="' . $value["id"] . '" data-toggle="modal" data-target="#ModalEditarRegistro"><i data-feather="user"></i></button>
                                       
                                                <button class="btn btn-danger btnEliminarPersona" idPersona="' . $value["id"] . '" ><i data-feather="x"></i></i></button>
                                       
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

<div class="modal fade" id="ModalCrearRegistro" tabindex="-1" aria-labelledby="ModalCrearRegistro" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ModalCrearRegistro">Crear Registro</h4>
            </div>
            <form role="form" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="Perfil">Nacionalidad</label>
                                <div class="position-relative">
                                    <select name="nuevaNacionalidad" id="Nacionalidad" class="form-select">
                                        <option value="Venezolano">V</option>
                                        <option value="Extranjero">E</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="Cedula">Ingresar Cedula</label>
                                <div class="position-relative">
                                    <input type="text" pattern="[0-9]{6,8}" name="nuevoCedula" required id="Cedula" class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="user"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="PrimerNombre">Ingresar Primer Nombre</label>
                                <div class="position-relative">
                                    <input type="text" name="nuevoPrimerNombre" pattern="[A-Za-z]{1,20}" required id="PrimerNombre" class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="key"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="SegundoNombre">Ingresar Segundo Nombre</label>
                                <div class="position-relative">
                                    <input type="text" name="nuevoSegundoNombre" pattern="[A-Za-z]{1,20}" required id="SegundoNombre" class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="key"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="PrimerApellido">Ingresar Primer Apellido</label>
                                <div class="position-relative">
                                    <input type="text" name="nuevoPrimerApellido" pattern="[A-Za-z]{1,20}" required id="PrimerApellido" class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="key"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="SegundoApellido">Ingresar Segundo Apellido</label>
                                <div class="position-relative">
                                    <input type="text" name="nuevoSegundoApellido" pattern="[A-Za-z]{1,20}" required id="SegundoApellido" class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="key"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="FechaNacimiento">Ingresar fecha de nacimiento</label>
                                <div class="position-relative">
                                    <input type="date" class="form-control" name="nuevaFechaNacimiento" required id="FechaNacimiento">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="Sexo">Sexo</label>
                                <div class="position-relative">
                                    <select name="nuevaSexo" required id="Sexo" class="form-select">
                                        <option value="1">M</option>
                                        <option value="2">F</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="EstadoCivil">Estado Civil</label>
                                <div class="position-relative">
                                    <select name="nuevaEstadoCivil" required id="EstadoCivil" class="form-select">
                                        <option value="1">Solter@</option>
                                        <option value="2">Casad@</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="Telefono">Ingresar Telefono</label>
                                <div class="position-relative">
                                    <input type="text" pattern="[0-9]{11,13}" name="nuevoTelefono" required id="Telefono" class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="user"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="Estado">Ingresar Estado</label>
                                <div class="position-relative">
                                    <input type="text" name="nuevoEstado" pattern="[A-Za-z\s]{1,20}" required id="Estado" class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="key"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="Municipio">Ingresar Municipio</label>
                                <div class="position-relative">
                                    <input type="text" name="nuevoMunicipio" pattern="[A-Za-z\s]{1,20}" required id="Municipio" class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="key"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="Parroquia">Ingresar Parroquia</label>
                                <div class="position-relative">
                                    <input type="text" name="nuevoParroquia" pattern="[A-Za-z\s]{1,20}" required id="Parroquia" class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="key"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="Correo">Ingresar Correo</label>
                                <div class="position-relative">
                                    <input type="email" name="nuevoCorreo" required id="Correo" class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="key"></i>
                                    </div>
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

                $crearUsuario = new ControladorPersona();
                $crearUsuario->ctrCrearPersona();

                ?>

            </form>
        </div>
    </div>
</div>

<!--=====================================
MODAL EDITAR REGISTRO
======================================-->

<div class="modal fade" id="ModalEditarRegistro" tabindex="-1" aria-labelledby="ModalEditarRegistro" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ModalEditarRegistro">Crear Registro</h4>
            </div>
            <form role="form" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="Perfil">Nacionalidad</label>
                                <div class="position-relative">
                                    <input type="hidden" name="idPersona" id="idPersona" required>
                                    <select name="editarNacionalidad" id="eNacionalidad" required class="form-select">
                                        <option>Elegir...</option>
                                        <option value="Venezolano">V</option>
                                        <option value="Extranjero">E</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="Cedula">Ingresar Cedula</label>
                                <div class="position-relative">
                                    <input type="text" pattern="[0-9]{6,8}" name="editarCedula" required id="eCedula" class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="user"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="PrimerNombre">Ingresar Primer Nombre</label>
                                <div class="position-relative">
                                    <input type="text" name="editarPrimerNombre" pattern="[A-Za-z]{1,20}" required id="ePrimerNombre" class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="key"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="SegundoNombre">Ingresar Segundo Nombre</label>
                                <div class="position-relative">
                                    <input type="text" name="editarSegundoNombre" pattern="[A-Za-z]{1,20}" required id="eSegundoNombre" class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="key"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="PrimerApellido">Ingresar Primer Apellido</label>
                                <div class="position-relative">
                                    <input type="text" name="editarPrimerApellido" pattern="[A-Za-z]{1,20}" required id="ePrimerApellido" class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="key"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="SegundoApellido">Ingresar Segundo Apellido</label>
                                <div class="position-relative">
                                    <input type="text" name="editarSegundoApellido" pattern="[A-Za-z]{1,20}" required id="eSegundoApellido" class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="key"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="FechaNacimiento">Ingresar fecha de nacimiento</label>
                                <div class="position-relative">
                                    <input type="date" class="form-control" name="editarFechaNacimiento" required id="eFechaNacimiento">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="Sexo">Sexo</label>
                                <div class="position-relative">
                                    <select name="editarSexo" required id="eSexo" class="form-select">
                                        <option value="1">M</option>
                                        <option value="2">F</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="EstadoCivil">Estado Civil</label>
                                <div class="position-relative">
                                    <select name="editarEstadoCivil" required id="eEstadoCivil" class="form-select">
                                        <option value="1">Solter@</option>
                                        <option value="2">Casad@</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="Telefono">Ingresar Telefono</label>
                                <div class="position-relative">
                                    <input type="text" pattern="[0-9]{11,13}" name="editarTelefono" required id="eTelefono" class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="user"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="Estado">Ingresar Estado</label>
                                <div class="position-relative">
                                    <input type="text" name="editarEstado" pattern="[A-Za-z\s]{1,20}" required id="eEstado" class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="key"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="Municipio">Ingresar Municipio</label>
                                <div class="position-relative">
                                    <input type="text" name="editarMunicipio" pattern="[A-Za-z\s]{1,20}" required id="eMunicipio" class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="key"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="Parroquia">Ingresar Parroquia</label>
                                <div class="position-relative">
                                    <input type="text" name="editarParroquia" pattern="[A-Za-z\s]{1,20}" required id="eParroquia" class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="key"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="Correo">Ingresar Correo</label>
                                <div class="position-relative">
                                    <input type="email" name="editarCorreo" required id="eCorreo" class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="key"></i>
                                    </div>
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

                $editarPersona = new ControladorPersona();
                $editarPersona->ctrEditarPersona();

                ?>

            </form>
        </div>
    </div>
</div>

<?php

$borrarPersona = new ControladorPersona();
$borrarPersona->ctrBorrarPersona();

?>