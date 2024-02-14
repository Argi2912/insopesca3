<?php

require_once "../controladores/personas.php";
require_once "../modelos/personas.php";

class AjaxPersona{

	/*=============================================
	EDITAR PERSONA
	=============================================*/	

	public $idPersona;

	public function ajaxEditarPersona(){

		$item = "id";
		$valor = $this->idPersona;

		$respuesta = ControladorPersona::ctrMostrarPersona($item, $valor);

		echo json_encode($respuesta);

	}

	
}

/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idPersona"])){

	$editar = new AjaxPersona();
	$editar -> idPersona = $_POST["idPersona"];
	$editar -> ajaxEditarPersona();

}


