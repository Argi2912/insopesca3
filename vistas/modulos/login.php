<div id="auth">
    <div class="container">
    <div class="row">
        <div class="col-md-5 col-sm-12 mx-auto">
            <div class="card pt-4">
                <div class="card-body">
                    <div class="text-center mb-5">
                        <img src="assets/images/insopesca.png" height="200" class='mb-4'>
                        <h3>Iniciar Sesion</h3>
                        <p>Por favor inicia sesion para continuar.</p>
                    </div>
                    <form method="post">
                        <div class="form-group position-relative has-icon-left">
                            <label for="username">Usuario</label>
                            <div class="position-relative">
                                <input type="text" class="form-control" name="ingUsuario" id="ingUsuario">
                                <div class="form-control-icon">
                                    <i data-feather="user"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left">
                                <label for="password">Contraseña</label>
                            <div class="position-relative">
                                <input type="password" class="form-control" name="ingPassword" id="ingPassword">
                                <div class="form-control-icon">
                                    <i data-feather="lock"></i>
                                </div>
                            </div>
                        </div>

                            <button type="submit" class="btn btn-primary float-right">Ingresar</button>

                        <?php
                            $inicio = new ControladorUsuario();
                            $inicio->ctrIniciarSession();
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>