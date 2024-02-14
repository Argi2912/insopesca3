<?php


    class ControladorPermisos {

        static public function ctrMostrarPermisos($item, $valor){

            $tabla = "permiso";

            
            $respuesta = ModeloPermisos::mdlMostrarPermiso($tabla, $item, $valor);
    
            return $respuesta;
        }

        static public function ctrMostrarPersonaSolicitante($item, $valor){

            $tabla = "persona";

            
            $respuesta = ModeloPersona::mdlMostrarPersona($tabla, $item, $valor);
    
            return $respuesta;
        }

        /*=============================================
	    CREAR PERSONA
	    =============================================*/

	    static public function ctrCrearPermiso(){

            var_dump($_POST).die;

            if(isset($_POST["nuevoCedula"])){

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ .]+$/', $_POST["nuevoPrimerNombre"]) && 
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ .]+$/', $_POST["nuevoSegundoNombre"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ .]+$/', $_POST["nuevoPrimerApellido"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ .]+$/', $_POST["nuevoSegundoApellido"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ .]+$/', $_POST["nuevoEstado"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ .]+$/', $_POST["nuevoMunicipio"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ .]+$/', $_POST["nuevoParroquia"])) {

                    $tabla = "permiso";

                    $datos = array("id_persona" =>$_POST["nuevoSolicitante"],
                                   "solicitante" => $_POST["soli"],
                                   "ci" =>$_POST["Cedula"],
                                   "nombre_barco" =>$_POST["nuevoNombreBarco"],
                                   "estado" =>$_POST["nuevoEstado"],
                                   "inspectoria" =>$_POST["nuevoInspectoria"],
                                   "eslora" =>$_POST["nuevoEslora"],
                                   "arte_pesca" =>$_POST["nuevoArtePesca"] ,
                                   "manga" =>$_POST["nuevoManga"],
                                   "matricula" =>$_POST["nuevoMatricula"],
                                   "conppa" =>$_POST["nuevoCONNPA"],
                                   "especies" =>$_POST["nuevoEspecies"],
                                   "puntal" =>$_POST["nuevoPuntal"],
                                   "uab" =>$_POST["nuevoUAB"],
                                   "usuario_creador"=>$_SESSION["usuario"],
                                   "state" =>$_POST["nuevoStatus"]);


                    $respuesta = ModeloPermisos::mdlIngresarPermiso($tabla, $datos);

                    if ($respuesta == "ok") {
                        echo'<script>
                        
                            swal({
                                    type: "success",
                                    title: "La persona fue registrada correctamente",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"
                                    }).then(function(result){
                                            if (result.value) {
                        
                                            window.location = "personas";
                        
                                            }
                                        })
                        
                            </script>';
                    }else {
                        echo'<script>
                    
                        swal({
                                type: "error",
                                title: "¡No se pudo completar su solicitud!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"
                                }).then(function(result){
                                if (result.value) {
                    
                                window.location = "personas";
                    
                                }
                            })
                    
                        </script>';	
                    }

                
            }else{

				echo'<script>

					swal({
						  type: "error",
						  title: "¡No puede dejar campos vacíos o escribir llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "personas";

							}
						})

			  	</script>';
			}
            

				
		    }
		

	    }


    }

?>