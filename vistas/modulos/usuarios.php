<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Usuarios</h3>
            <p class="text-subtitle text-muted">Administrar Usuarios</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="Usuarios">INSOPESCA</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Usuarios</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
    <div class="card">
            <div class="card-header">
                <div class="row">
                    <p>Listado de Usuarios</p>
                </div>
                <div class="row">
                    <div class="col-md">
                        <button type="button" class="btn btn-outline-primary block" data-toggle="modal" data-target="#ModalCrearUsuarios">Crear Usuario</button>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class='usuario-table table table-striped' id="table1">
                    <thead>
                        <tr>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Usuario</th>
                            <th>Foto</th>
                            <th>Perfil</th>
                            <th>Estado</th>
                            <th>Último login</th>
                            <th>Acciones</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody>

                    <?php

                        $item = null;
                        $valor = null;

                        $usuarios = ControladorUsuario::ctrMostrarUsuarios($item, $valor);

                        foreach ($usuarios as $key => $value){

 
                         echo ' <tr>
                                <td>'.($key+1).'</td>
                                <td>'.$value["nombre"].'</td>
                                <td>'.$value["usuario"].'</td>';

                                if($value["foto"] != ""){

                                    echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';

                                }else{

                                    echo '<td><img src="assets/images/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';

                                }

                                echo '<td>'.$value["perfil"].'</td>';

                                if($value["estado"] != 0){

                                    echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';

                                }else{

                                    echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';

                                }             

                                echo '<td>'.$value["ultimo_login"].'</td>
                                <td>

                                    <div class="btn-group">

                                    <button type="button" class="btn btn-outline-primary block btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#btnEditarUsuario"><i data-feather="user"></i></button>
                
                                    <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'"><i data-feather="x"></i></i></button>

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
MODAL AGREGAR USUARIO
======================================-->

<div class="modal fade" id="ModalCrearUsuarios" tabindex="-1" aria-labelledby="ModalCrearUsuario" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="ModalCrearUsuario">Crear Usuario</h4>
            </div>
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="nombre">Ingresar Nombre</label>
                                <div class="position-relative">
                                    <input type="text" name="nuevoNombre" pattern="[A-Za-z]{1,25}" id="nombre" required class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="user"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="Usuario">Ingresar Usuario</label>
                                <div class="position-relative">
                                    <input type="text" name="nuevoUsuario" pattern="[A-Za-z0-9]{5,20}" id="Usuario" required class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="key"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="Password">Ingresar Contraseña</label>
                                <div class="position-relative">
                                    <input type="password" name="nuevoPassword" id="Pasword" required class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="lock"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="Perfil">Seleccionar Perfil</label>
                                <div class="position-relative">
                                    <select name="nuevoPerfil" id="Perfil" class="form-select">
                                        <option value="Administrador">Administrador</option>
                                        <option value="Analista">Analista</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="Foto">Subir Foto</label>
                                <hr>
                                <div class="position-relative form-file">
                                    <input type="file" name="nuevaFoto" id="Foto" class="nuevaFoto form-file-input">
                                    <label for="Foto" class="form-file-label">
                                        <span class="form-file-text">Elige una Foto</span>
                                        <span class="form-file-button btn-primary">
                                            <i data-feather="upload"></i>
                                        </span>
                                    </label>
                                        <p>Peso maximo de la foto 2MB</p>
                                        <img src="assets/images/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px">
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

<!--=====================================
MODAL EDITAR USUARIO
======================================-->

<div class="modal fade" id="btnEditarUsuario" tabindex="-1" aria-labelledby="btnEditarUsuario" style="display: none;" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="btnEditarUsuario">Crear Usuario</h4>
            </div>
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="nombre">Ingresar Nombre</label>
                                <div class="position-relative">
                                    <input type="hidden"  name="idUsuario" id="idUsuario" required>
                                    <input type="text" name="editarNombre" pattern="[A-Za-z]{1,25}" id="editarNombre" required class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="user"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="Usuario">Ingresar Usuario</label>
                                <div class="position-relative">
                                    <input type="text" name="editarUsuario" pattern="[A-Za-z0-9]{5,20}" id="editarUsuario" required class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="key"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="Password">Ingresar Contraseña</label>
                                <div class="position-relative">
                                    <input type="password" name="editarPassword" id="editarPassword" required class="form-control">
                                    <div class="form-control-icon">
                                        <i data-feather="lock"></i>
                                    </div>
                                   <input type="hidden" id="passwordActual" name="passwordActual">
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group has-icon-left">
                                <label for="Perfil">Seleccionar Perfil</label>
                                <div class="position-relative">
                                    <select name="editarPerfil" class="form-select">
                                        <option value="" id="editarPerfil"></option>
                                        <option value="Administrador">Administrador</option>
                                        <option value="Analista">Analista</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group has-icon-left">
                                <label for="Foto">Subir Foto</label>
                                <hr>
                                <div class="position-relative form-file">
                                    <input type="file" name="editarFoto" id="editarFoto" class="form-file-input">
                                    <label for="Foto" class="form-file-label">
                                        <span class="form-file-text">Elige una Foto</span>
                                        <span class="form-file-button btn-primary">
                                            <i data-feather="upload"></i>
                                        </span>
                                    </label>
                                    <p>Peso maximo de la foto 2MB</p>
                                    <img src="assets/images/usuarios/default/anonymous.png" class="img-thumbnail previsualizarEditar" id="previsualizarEditar" width="100px">
                                    <input type="hidden" name="fotoActual" id="fotoActual">              
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
                        $crearUsuario -> ctrEditarUsuario();

                    ?>
                   
            </form>
        </div>
    </div>
</div>
<?php

  $borrarUsuario = new ControladorUsuario();
  $borrarUsuario -> ctrBorrarUsuario();

?> 