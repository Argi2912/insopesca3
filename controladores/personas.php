<?php


    class ControladorPersona {

        static public function ctrMostrarPersona($item, $valor){

            $tabla = "persona";
    
            $respuesta = ModeloPersona::MdlMostrarPersona($tabla, $item, $valor);
    
            return $respuesta;
        }

        /*=============================================
	    CREAR PERSONA
	    =============================================*/

	    static public function ctrCrearPersona(){

        if(isset($_POST["nuevoCedula"])){

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ .]+$/', $_POST["nuevoPrimerNombre"]) && 
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ .]+$/', $_POST["nuevoSegundoNombre"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ .]+$/', $_POST["nuevoPrimerApellido"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ .]+$/', $_POST["nuevoSegundoApellido"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ .]+$/', $_POST["nuevoEstado"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ .]+$/', $_POST["nuevoMunicipio"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ .]+$/', $_POST["nuevoParroquia"])) {

                    $tabla = "persona";


                    $datos = array( "nacionalidad" => $_POST["nuevaNacionalidad"],
                                    "ci" => $_POST["nuevoCedula"],
                                    "primer_nombre" => $_POST["nuevoPrimerNombre"],
                                    "segundo_nombre" => $_POST["nuevoSegundoNombre"],
                                    "primer_apellido" => $_POST["nuevoPrimerApellido"],
                                    "segundo_apellido" => $_POST["nuevoSegundoApellido"],
                                    "fecha_nacimiento" => $_POST["nuevaFechaNacimiento"],
                                    "sexo" => $_POST["nuevaSexo"],
                                    "estado_civil" => $_POST["nuevaEstadoCivil"],
                                    "telefono" => $_POST["nuevoTelefono"],
                                    "estado" => $_POST["nuevoEstado"],
                                    "municipio" => $_POST["nuevoMunicipio"], 
                                    "parroquia" => $_POST["nuevoParroquia"], 
                                    "correo" => $_POST["nuevoCorreo"]);

                    $respuesta = ModeloPersona::mdlIngresarPersona($tabla, $datos);

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

        /*=============================================
	    EDITAR PERSONA
	    =============================================*/

	    static public function ctrEditarPersona(){

            if(isset($_POST["editarCedula"])){

    
                if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ .]+$/', $_POST["editarPrimerNombre"]) && 
                    preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ .]+$/', $_POST["editarSegundoNombre"]) &&
                    preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ .]+$/', $_POST["editarPrimerApellido"]) &&
                    preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ .]+$/', $_POST["editarSegundoApellido"]) &&
                    preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ .]+$/', $_POST["editarEstado"]) &&
                    preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ .]+$/', $_POST["editarMunicipio"]) &&
                    preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ .]+$/', $_POST["editarParroquia"])) {
    

                        $tabla = "persona";
    
    
                        $datos = array( "nacionalidad" => $_POST["editarNacionalidad"],
                                        "ci" => $_POST["editarCedula"],
                                        "primer_nombre" => $_POST["editarPrimerNombre"],
                                        "segundo_nombre" => $_POST["editarSegundoNombre"],
                                        "primer_apellido" => $_POST["editarPrimerApellido"],
                                        "segundo_apellido" => $_POST["editarSegundoApellido"],
                                        "fecha_nacimiento" => $_POST["editarFechaNacimiento"],
                                        "sexo" => $_POST["editarSexo"],
                                        "estado_civil" => $_POST["editarEstadoCivil"],
                                        "telefono" => $_POST["editarTelefono"],
                                        "estado" => $_POST["editarEstado"],
                                        "municipio" => $_POST["editarMunicipio"], 
                                        "parroquia" => $_POST["editarParroquia"], 
                                        "correo" => $_POST["editarCorreo"],
                                        "id" => $_POST["idPersona"]);                        
    
                        $respuesta = ModeloPersona::mdlEditarPersona($tabla, $datos);
    
                        if ($respuesta == "ok") {
                            echo'<script>
                            
                                swal({
                                        type: "success",
                                        title: "La persona fue actualizada correctamente",
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

        

        /*=============================================
	BORRAR USUARIO
	=============================================*/

	static public function ctrBorrarPersona(){

		if(isset($_GET["idPersona"])){

			$tabla ="persona";
			$datos = $_GET["idPersona"];

			$respuesta = ModeloPersona::mdlBorrarPersona($tabla, $datos);

			if($respuesta == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "La persona ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
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