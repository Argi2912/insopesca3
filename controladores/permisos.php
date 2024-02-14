<?php


class ControladorPermisos
{

    static public function ctrMostrarPermisos($item, $valor)
    {

        $tabla = "permiso";


        $respuesta = ModeloPermisos::mdlMostrarPermiso($tabla, $item, $valor);

        return $respuesta;
    }

    static public function ctrMostrarPersonaSolicitante($item, $valor)
    {

        $tabla = "persona";


        $respuesta = ModeloPersona::mdlMostrarPersona($tabla, $item, $valor);

        return $respuesta;
    }

    /*=============================================
	    CREAR PERSONA
	    =============================================*/

    static public function ctrCrearPermiso()
    {


        if (isset($_POST["nuevoSolicitante"])) {

            $tabla = "permiso";
            $tblp = "persona";
            $item = "id";

            $persona = ModeloPersona::mdlMostrarPersona($tblp, $item, $_POST["nuevoSolicitante"]);

            $datos = array(
                "id_persona" => $_POST["nuevoSolicitante"],
                "id_barco" => $_POST["nuevoBarco"],
                "ordinal" => $_POST["nuevoOrdinal"],
                "solicitante" => $persona["primer_nombre"] . " " . $persona["primer_apellido"],
                "ci"  => $persona["ci"],
                "estado" => $persona["estado"],
                "inspectoria" => $_POST["nuevoInspectoria"]
            );


            $respuesta = ModeloPermisos::mdlIngresarPermiso($tabla, $datos);

            if ($respuesta == "ok") {
                echo '<script>
                        
                            swal({
                                    type: "success",
                                    title: "El permiso fue solicitado correctamente",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"
                                    }).then(function(result){
                                            if (result.value) {
                        
                                            window.location = "permiso";
                        
                                            }
                                        })
                        
                            </script>';
            } else {
                echo '<script>
                    
                        swal({
                                type: "error",
                                title: "¡No se pudo completar su solicitud!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"
                                }).then(function(result){
                                if (result.value) {
                    
                                window.location = "permiso";
                    
                                }
                            })
                    
                        </script>';
            }
        }
    }

    static public function ctrGuardarPdf()
    {
        if (isset($_FILES["nuevaRuta"]["tmp_name"])) {

            $directorio = "permisos/";

            if (!file_exists($directorio)) {
                mkdir($directorio, 0755, true);
            }
    

            $archivo = $_FILES["nuevaRuta"]["tmp_name"];

            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $tipo_mime = finfo_file($finfo, $archivo);

            if ($tipo_mime == 'application/pdf') {

                $nombre_archivo = $_FILES["nuevaRuta"]["name"];
                $ruta_archivo = $directorio . $nombre_archivo;
        

                if (move_uploaded_file($archivo, $ruta_archivo)) {
                    echo '<script>

					swal({

						type: "success",
						title: "¡El archivo ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "permiso";

						}

					});
				

					</script>';
                } else {
                    echo '<script>

					swal({

						type: "error",
						title: "¡El archivo no ha sido guardado!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "permiso";

						}

					});
				

				</script>';
                }
            } else {
                echo '<script>

					swal({

						type: "error",
						title: "¡El archivo debe ser un pdf!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"

					}).then(function(result){

						if(result.value){
						
							window.location = "permiso";

						}

					});
				

				</script>';
            }
        }
    }

    static public function ctrBorrar()
    {

        if (isset($_GET["permiso"])) {

            $tabla = "permiso";
            $datos = $_GET["permiso"];

            $respuesta = ModeloPermisos::mdlBorrar($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

				swal({
					  type: "success",
					  title: "ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "permiso";

								}
							})

				</script>';
            }
        }
    }
}

