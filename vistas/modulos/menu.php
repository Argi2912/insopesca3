    <div id="sidebar" class="active">
        <div class="sidebar-wrapper active">
            <div class="sidebar-header">
                <h3><b>INSOPESCA</b></h3>
            </div>
            <div class="sidebar-menu">
                <ul class="menu">

                    <li class='sidebar-title'>Menu Principal</li>

                    <li class="sidebar-item  ">
                        <a href="inicio" class='sidebar-link'>
                            <i data-feather="home" width="20"></i>
                            <span>Inicio</span>
                        </a>

                    </li>
                    
                    <?php
                    if ($_SESSION["perfil"] == "Administrador") {
                        echo '<li class="sidebar-item  ">
                                <a href="usuarios" class="sidebar-link">
                                    <i data-feather="user" width="20"></i> 
                                    <span>Usuarios</span>
                                </a>';
                    }
                    ?>

                    </li>
                    <li class="sidebar-item  ">
                        <a href="personas" class="sidebar-link">
                            <i data-feather="users" width="20"></i>
                            <span>Personas</span>
                        </a>

                    </li>
                    <li class="sidebar-item  ">
                        <a href="barcos" class="sidebar-link">
                            <i data-feather="anchor" width="20"></i>
                            <span>Barcos</span>
                        </a>

                    </li>
                    <li class="sidebar-item  ">
                        <a href="crear-permisos" class="sidebar-link">
                            <i data-feather="file-text" width="20"></i>
                            <span>Solicitar Permisos</span>
                        </a>

                    </li>
                    <li class="sidebar-item  ">
                        <a href="permiso" class="sidebar-link">
                            <i data-feather="file-text" width="20"></i>
                            <span>Permisos</span>
                        </a>

                    </li>
                    <li class="sidebar-item  ">
                        <a href="ver-permisos" class="sidebar-link">
                            <i data-feather="file-text" width="20"></i>
                            <span>Ver Permisos</span>
                        </a>

                    </li>

                </ul>
            </div>
            <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
        </div>