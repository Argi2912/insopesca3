<?php

require_once "../controladores/barcos.php";
require_once "../modelos/barcos.php";

class AjaxBarco{

	/*=============================================
	EDITAR PERSONA
	=============================================*/	

	public $idBarco;

	public function ajaxEditarBarco(){

		$valor = $this->idBarco;

		$respuesta = ControladorBarco::ctrMostrarBarcoyPersona($valor);

		echo json_encode($respuesta);

	}

	
}

/*=============================================
EDITAR USUARIO
=============================================*/
if(isset($_POST["idBarco"])){

	$editar = new AjaxBarco();
	$editar -> idBarco = $_POST["idBarco"];
	$editar -> ajaxEditarBarco();

}


