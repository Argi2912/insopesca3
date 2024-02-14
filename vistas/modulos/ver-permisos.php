<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Permisos</h3>
                <p class="text-subtitle text-muted">Listado de Permisos Cargados</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="permisos">INSOPESCA</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Permisos cargados</li>
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
                            <i class='bx bx-check font-medium-5 pl-25 pr-75'></i>Ver Permisos
                        </h4>
                    </div>
                    <div class="card-body px-0 py-1">
                        <?php


                        $directorio = "permisos/";

                        if (file_exists($directorio)) {
                            $archivos = scandir($directorio);

                            // Mostrar la lista de archivos con enlaces de descarga
                            echo "<div class='container'>";
                            echo "<h2>Permisos en cargados:</h2>";
                            echo "<ul class='list-group'>";
                            foreach ($archivos as $archivo) {
                                if ($archivo != "." && $archivo != "..") {
                                    echo "<li class='list-group-item'><a href='$directorio$archivo' download>$archivo</a></li>";
                                }
                            }
                            echo "</ul>";
                            echo "</div>";
                        }

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>