<?php

require_once "../../../controladores/personas.php";
require_once "../../../controladores/barcos.php";
require_once "../../../controladores/permisos.php";

require_once "../../../modelos/personas.php";
require_once "../../../modelos/barcos.php";
require_once "../../../modelos/permisos.php";



class imprimirPermiso
{

	public $permiso;

	public function traerImpresionPermiso()
	{

		//TRAEMOS LA INFORMACIÓN DE LA VENTA

		$item = "id";
		
		$idPermiso = $this->permiso;

		$infoPermiso = ControladorPermisos::ctrMostrarPermisos($item, $idPermiso);

		$infoPersona = ControladorPersona::ctrMostrarPersona($item, $infoPermiso["id_persona"]);

		$infoBarco = ControladorBarco::ctrMostrarBarco($item,$infoPermiso["id_barco"]);

		$fechaActual = date('d-m-Y');

		$nac = $infoPersona["nacionalidad"][0];

		
		//REQUERIMOS LA CLASE TCPDF

		require_once('tcpdf_include.php');

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		$pdf->startPageGroup();

		$pdf->AddPage();

		// ---------------------------------------------------------

		$bloque1 = <<<EOF

		
	<table>
		
		<tr>
			<td style="width:550px"><img src="images/cintillo.jpeg"></td>
		</tr>

	</table>
	<table class="mt-5" style="border: 1px solid #666;">
		
		<tr>
			<td colspan="1" style="background-color:white;"></td>
			<td colspan="1" style="background-color:white;"></td>
			<td colspan="2.5" style="background-color:white; font-size:12px;"><h4>PERMISO DE PESCA</h4></td>
			<td colspan="1" style="background-color:white;"></td>
		</tr>

	</table>
	<table style="border: 1px solid #666;">
		
		<tr>
			<td style="background-color:white;">Vigencia:  $fechaActual</td>
			<td style="background-color:white;">N°: </td>
		</tr>

	</table>
	<table style="border: 1px solid #666;">
		
		<tr style="border: 1px solid #666;">
			<td style="border: 1px solid #666;background-color:white;">PESCA PARA BUQUES </td>
			<td style="border: 1px solid #666;background-color:white;">BASE LEGAL</td>
		</tr>

	</table>
	<table style="border: 1px solid #666;">
		
		<tr>
			<td colspan="4" style="border: 1px solid #666;  background-color:white;"><p>Solicitante:</p> <p>$infoPermiso[solicitante]</p> </td>
			<td colspan="2" style="border: 1px solid #666;  background-color:white;"><p>Articlo:</p> <p>29</p> </td>
			<td colspan="2" style="border: 1px solid #666;  background-color:white;"><p>Ordinal:</p> <p>$infoPermiso[ordinal]</p> </td>
		</tr>
		<tr>
			<td colspan="4" style="border: 1px solid #666;  background-color:white;"><p>RIF / C:I:</p> <p>$nac - $infoPermiso[ci]</p> </td>			
			<td colspan="4" style="background-color:white;"></td>			
		</tr>

	</table>
	<table style="border: 1px solid #666;">
		
		<tr>
			<td colspan="4" style="border: 1px solid #666;  background-color:white;"><p>Nombre Peñero:</p> <p>$infoBarco[nombre_barco]</p> </td>
			<td colspan="4" style="border: 1px solid #666;  background-color:white;"><p>Matricula:</p> <p style="text-transform: uppercase;">$infoBarco[matricula]</p> </td>			
		</tr>
		<tr>
			<td colspan="4" style="border: 1px solid #666;  background-color:white;"><p>Estado:</p> <p>$infoPersona[estado]</p> </td>
			<td colspan="4" style="border: 1px solid #666;  background-color:white;"><p>COMPPA:</p> <p>$infoBarco[comppa]</p> </td>		
		</tr>
		
	</table>
	<table style="border: 1px solid #666;">
		
		<tr>
			<td colspan="2.5" style="border: 1px solid #666;  background-color:white;"><p>Inspectoria:</p> <p>$infoPermiso[inspectoria]</p> </td>
			<td colspan="2.5" style="border: 1px solid #666;  background-color:white;"><p>Arte de Pesca:</p> <p>$infoBarco[arte_pesca]</p> </td>			
			<td colspan="4" style="border: 1px solid #666;  background-color:white;"><p>Especies:</p> <p>$infoBarco[especies]</p> </td>
		</tr>
		
	</table>
	<table style="border: 1px solid #666;">
		
		<tr>
			<td colspan="2.5" style="border: 1px solid #666;  background-color:white;"><p>Eslora:</p> <p>$infoBarco[eslora]</p> </td>
			<td colspan="2.5" style="border: 1px solid #666;  background-color:white;"><p>Manga:</p> <p>$infoBarco[manga]</p> </td>			
			<td colspan="2.5" style="border: 1px solid #666;  background-color:white;"><p>Puntal:</p> <p>$infoBarco[puntal]</p> </td>
			<td colspan="2.5" style="border: 1px solid #666;  background-color:white;"><p>UAB:</p> <p>$infoBarco[uab]</p> </td>
		</tr>
		
	</table>
	<table style="border: 1px solid #666;">
		
		<p style="text-align: center"><b>Pesca para buques</b></p>
		
	</table>
	<table  style=" border: 1px solid #666; font-size:9px">
		
		<p> 1. El presente permiso es intransferible y unicamente para el señalado </p>
		<p> 2. Para el embarque de peses de pico(Pez Vela, Pez Espada, etc) requiere de una autorizacion especial emitida por el presidente de INSOPESCA </p>
		<p> 3. Para la pesca de arpon, debe portar un permiso de arma, expedido por el Ministerio del Poder Popular para la Defensa Direccion de Armamento de la Fuerza Armada Nacional (DARFA) </p>
		<p> 4. Para la pesca dentro de areas bajo Regimen de Administracion Especial (ABRAE), debe estar autorizado por la institucion administrativa competente</p>
		<p> 5. El pescador debe cumplir con las leyes, reglamentos, resoluciones y decretos que regulen la actividad Pesquera</p>
		<p> 6. Este permiso no autoriza la captura o extraccion en periodo de veda de ninguna especie</p>
		<p> 7. Para la captura o extraccion de especies bajo norma especial, el pescador debe hacer consulta a las instituciones administrativas competentes</p>

	</table>
	<table style="border: 1px solid #666; font-size:10px">
		<p>  SUBGERENTE ANZOATEGUI SOCRATES TINACOS V-6.968.590 SEGUN PROVIDENCIA Nº 102.2022 DE FECHA 25/08/2022 PUBLICADA EN GACETA OFICIAL DE LA REPUBLICA BOLIVARIANA DE VENEZUELA N° 42.455 DE FECHA 05 DE SEPTIEMBRE DE 2022 </p>
	</table>
EOF;

	$pdf->writeHTML($bloque1, false, false, false, false, '');



		// ---------------------------------------------------------
		//SALIDA DEL ARCHIVO 

		//$pdf->Output('factura.pdf', 'D');
		ob_end_clean();
		$pdf->Output($infoPermiso["solicitante"]."-".$idPermiso.'.pdf');
	}
}

$permisos = new imprimirPermiso();
$permisos->permiso = $_GET["codigo"];
$permisos->traerImpresionPermiso();
