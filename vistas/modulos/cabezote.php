<nav class="navbar navbar-header navbar-expand navbar-light">
                <a class="sidebar-toggler" href="#"><span class="navbar-toggler-icon"></span></a>
                <button class="btn navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav d-flex align-items-center navbar-light ml-auto">
                        <li class="dropdown">
                            <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                                <div class="avatar mr-1">
                                    <?php 
                                        if ($_SESSION["foto"] != " ") {

                                            echo '<img src="'.$_SESSION["foto"].'" alt="" srcset="">';
                                            
                                        }else {

                                            echo '<img src="assets/images/avatar/avatar-s-1.png" alt="" srcset="">';
                                            
                                        }
                                    ?>
                                </div>
                                <div class="d-none d-md-block d-lg-inline-block"><b>HOLA,</b> <?php echo $_SESSION["nombre"]; ?></div>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="salir"><i data-feather="log-out"></i> Salir</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>