<?php

//CONTROLADORES//
require_once 'controladores/usuarios.php';
require_once 'controladores/personas.php';
require_once 'controladores/barcos.php';
require_once 'controladores/permisos.php';

//MODELOS//
require_once 'modelos/Usuarios.php';
require_once 'modelos/personas.php';
require_once 'modelos/barcos.php';
require_once 'modelos/permisos.php';

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insopesca</title>

    <link rel="stylesheet" href="assets/css/bootstrap.css">

    <link rel="stylesheet" href="assets/vendors/chartjs/Chart.min.css">

    <link rel="stylesheet" href="assets/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="assets/css/app.css">
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
    <script src="assets/jquery/dist/jquery.min.js"></script>
    <script src="assets/plugins/sweetalert2/sweetalert2.all.js"></script>
    <!-- InputMask -->
    <script src="assets/plugins/input-mask/jquery.inputmask.js"></script>
    <script src="assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>

    <!-- jQuery Number -->
    <script src="assets/plugins/jqueryNumber/jquerynumber.min.js"></script>

<link rel="stylesheet" href="assets/vendors/choices.js/choices.min.css" />

</head>

<body>



    <?php

    if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {

        echo '<div id="app">';

        ///MENU///
        include 'vistas/modulos/menu.php';

        echo '</div>';


        echo '<div id="main">';

        ///CABEZOTE///
        include 'vistas/modulos/cabezote.php';



        ///RUTAS//
        if (isset($_GET["ruta"])) {

            if (
                $_GET["ruta"] == "inicio" ||
                $_GET["ruta"] == "usuarios" ||
                $_GET["ruta"] == "personas" ||
                $_GET["ruta"] == "barcos" ||
                $_GET["ruta"] == "permiso" ||
                $_GET["ruta"] == "crear-permisos" ||
                $_GET["ruta"] == "ver-permisos" ||
                $_GET["ruta"] == "salir"
            ) {

                include "vistas/modulos/" . $_GET["ruta"] . ".php";
            } else {

                include "vistas/modulos/404.php";
            }
        } else {

            include 'vistas/modulos/inicio.php';
        }

        /*=============================================
            FOOTER
            =============================================*/




        echo '</div>';
        include "vistas/modulos/footer.php";
    } else {

        include 'vistas/modulos/login.php';
    }

    ?>

    <script src="vistas/js/usuarios.js"></script>
    <script src="vistas/js/personas.js"></script>
    <script src="vistas/js/barcos.js"></script>
    <script src="vistas/js/permisos.js"></script>


    <script src="assets/js/feather-icons/feather.min.js"></script>
    <script src="assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="assets/js/app.js"></script>

    <script src="assets/vendors/chartjs/Chart.min.js"></script>
    <script src="assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="assets/js/pages/dashboard.js"></script>

    <script src="assets/js/main.js"></script>

    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script src="assets/js/vendors.js"></script>

    <link rel="stylesheet" href="assets/vendors/dragula/dragula.min.css">
    <script src="assets/vendors/dragula/dragula.min.js"></script>
    <script src="assets/js/pages/widgets.js"></script>

    <script src="assets/vendors/choices.js/choices.min.js"></script>


</body>

</html>