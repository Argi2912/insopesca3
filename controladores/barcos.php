<?php


class ControladorBarco
{

    static public function ctrMostrarBarco($item, $valor)
    {

        $tabla = "barco";

        $respuesta = ModeloBarco::mdlMostrarBarco($tabla, $item, $valor);

        return $respuesta;
    }

    static public function ctrMostrarBarcoyPersona($valor)
    {

        $respuesta = ModeloBarco::mdlMostrarBarcoyPersona($valor);

        return $respuesta;
    }

    /*=============================================
	    CREAR PERSONA
	    =============================================*/

    static public function ctrCrearBarco()
    {

        if (isset($_POST["nuevoDueño"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ .]+$/', $_POST["nuevoNombreBarco"])) {

                $tabla = "barco";

                $datos = array(
                    "id_persona" => $_POST["nuevoDueño"],
                    "nombre_barco" => $_POST["nuevoNombreBarco"],
                    "eslora" => $_POST["nuevoEslora"],
                    "manga" => $_POST["nuevoManga"],
                    "puntal" => $_POST["nuevoPuntal"],
                    "comppa" => $_POST["nuevoCOMPA"],
                    "especies" => $_POST["nuevoEspecies"],
                    "uab" => $_POST["nuevoUAB"],
                    "arte_pesca" => $_POST["nuevoPesca"]
                );




                $respuesta = ModeloBarco::mdlIngresarBarco($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                        
                            swal({
                                    type: "success",
                                    title: "El barco fue registrada correctamente",
                                    showConfirmButton: true,
                                    confirmButtonText: "Cerrar"
                                    }).then(function(result){
                                            if (result.value) {
                        
                                            window.location = "barcos";
                        
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
                    
                                window.location = "barcos";
                    
                                }
                            })
                    
                        </script>';
                }
            } else {

                echo '<script>

					swal({
						  type: "error",
						  title: "¡No puede dejar campos vacíos o escribir llevar caracteres especiales!",
						  showConfirmButton: true,
						  confirmButtonText: "Cerrar"
						  }).then(function(result){
							if (result.value) {

							window.location = "barcos";

							}
						})

			  	</script>';
            }
        }
    }

    /*=============================================
	    EDITAR PERSONA
	    =============================================*/

    static public function ctrEditarBarco()
    {

        if (isset($_POST["eDueño"])) {

            if (preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ .]+$/', $_POST["editarNombreBarco"])) {

                $tabla = "barco";

                $datos = array(
                    "id_persona" => $_POST["nuevoDueño"],
                    "nombre_barco" => $_POST["nuevoNombreBarco"],
                    "eslora" => $_POST["nuevoEslora"],
                    "manga" => $_POST["nuevoManga"],
                    "puntal" => $_POST["nuevoPuntal"],
                    "comppa" => $_POST["nuevoCOMPA"],
                    "especies" => $_POST["nuevoEspecies"],
                    "uab" => $_POST["nuevoUAB"],
                    "arte_pesca" => $_POST["nuevoPesca"],
                    "id" => $_POST["idBarco"]
                );


                $respuesta = ModeloBarco::mdlEditarBarco($tabla, $datos);

                if ($respuesta == "ok") {
                    echo '<script>
                            
                                swal({
                                        type: "success",
                                        title: "El barco fue actualizado correctamente",
                                        showConfirmButton: true,
                                        confirmButtonText: "Cerrar"
                                        }).then(function(result){
                                                if (result.value) {
                            
                                                window.location = "barcos";
                            
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
                        
                                    window.location = "barcos";
                        
                                    }
                                })
                        
                            </script>';
                }
            } else {

                echo '<script>
    
                        swal({
                              type: "error",
                              title: "¡No puede dejar campos vacíos o escribir llevar caracteres especiales!",
                              showConfirmButton: true,
                              confirmButtonText: "Cerrar"
                              }).then(function(result){
                                if (result.value) {
    
                                window.location = "barcos";
    
                                }
                            })
    
                      </script>';
            }
        }
    }



    /*=============================================
	BORRAR USUARIO
	=============================================*/

    static public function ctrBorrarBarco()
    {

        if (isset($_GET["idBarco"])) {

            $tabla = "barco";
            $datos = $_GET["idBarco"];

            $respuesta = ModeloBarco::mdlBorrarBarco($tabla, $datos);

            if ($respuesta == "ok") {

                echo '<script>

				swal({
					  type: "success",
					  title: "El barco ha sido borrado correctamente",
					  showConfirmButton: true,
					  confirmButtonText: "Cerrar",
					  closeOnConfirm: false
					  }).then(function(result) {
								if (result.value) {

								window.location = "barcos";

								}
							})

				</script>';
            }
        }
    }
}
