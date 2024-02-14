<?php

require_once "../controladores/personas.php";
require_once "../controladores/permisos.php";

require_once "../modelos/personas.php";
require_once "../modelos/permisos.php";

class ajaxPermisos{

	/*=============================================
	EDITAR PERSONA
	=============================================*/	

	public $idPersona;

	public function ajaxTraerPersona(){

		$item = "id";
		$valor = $this->idPersona;

		$respuesta = ControladorPermisos::ctrMostrarPersonaSolicitante($item, $valor);


		echo json_encode($respuesta);

	}

	
}

/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idPersona"])){

	$traer = new ajaxPermisos();
	$traer -> idPersona = $_POST["idPersona"];
	$traer -> ajaxTraerPersona();

}


