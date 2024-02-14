<?php

require_once "../controladores/personas.php";
require_once "../controladores/permisos.php";
require_once "../controladores/barcos.php";

require_once "../modelos/barcos.php";
require_once "../modelos/personas.php";
require_once "../modelos/permisos.php";

class ajaxPermisos{

	/*=============================================
	EDITAR PERSONA
	=============================================*/	

	public $idPersona;

	public function ajaxTraerBarco(){

		$valor = $this->idPersona;

		$respuesta = ControladorBarco::ctrMostrarBarcos($valor);


		echo json_encode($respuesta);


	}

	
}

/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idPersona"])){

	$traer = new ajaxPermisos();
	$traer -> idPersona = $_POST["idPersona"];
	$traer -> ajaxTraerBarco();

}


