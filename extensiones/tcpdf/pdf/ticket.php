<?php

require_once "../../../controladores/ventas.controlador.php";
require_once "../../../modelos/ventas.modelo.php";

require_once "../../../controladores/clientes.controlador.php";
require_once "../../../modelos/clientes.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

require_once "../../../controladores/productos.controlador.php";
require_once "../../../modelos/productos.modelo.php";

class imprimirPermiso
{

	public $codigo;

	public function traerImpresionFactura()
	{

		//TRAEMOS LA INFORMACIÓN DE LA VENTA

		$itemVenta = "codigo";
		$valorVenta = $this->codigo;

		$respuestaVenta = ControladorVentas::ctrMostrarVentas($itemVenta, $valorVenta);

		$fecha = substr($respuestaVenta["fecha"], 0, -8);
		$productos = json_decode($respuestaVenta["productos"], true);
		$neto = number_format($respuestaVenta["neto"], 2);
		$impuesto = number_format($respuestaVenta["impuesto"], 2);
		$total = number_format($respuestaVenta["total"], 2);

		//TRAEMOS LA INFORMACIÓN DEL CLIENTE

		$itemCliente = "id";
		$valorCliente = $respuestaVenta["id_cliente"];

		$respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

		//TRAEMOS LA INFORMACIÓN DEL VENDEDOR

		$itemVendedor = "id";
		$valorVendedor = $respuestaVenta["id_vendedor"];

		$respuestaVendedor = ControladorUsuarios::ctrMostrarUsuarios($itemVendedor, $valorVendedor);

		//REQUERIMOS LA CLASE TCPDF

		require_once('tcpdf_include.php');

		$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		$pdf->setPrintHeader(false);
		$pdf->setPrintFooter(false);

		$pdf->AddPage('P', 'A7');

		//---------------------------------------------------------

		$bloque1 = <<<EOF

<table style="font-size:7px; text-align:left">

	<tr>
		
		<td style="width:160px;">
	
			<div>
	
				Panaderia y Exquisiteces Don Miguel, C.A.
				Dirección:  AV. Nicolas Rolando
				<br>
				RIF: J501696233
				<br><br>
				Orden Despacho N.$valorVenta
				<br>
				Vendedor: $respuestaVendedor[nombre]
				<br>
				Fecha: $fecha
				<br>

			</div>
			<br>
		</td>

	</tr>


</table>

EOF;

		$pdf->writeHTML($bloque1, false, false, false, false, '');

		// ---------------------------------------------------------


		foreach ($productos as $key => $item) {

			$valorUnitario = number_format($item["precio"], 2);

			$precioTotal = number_format($item["total"], 2);

			$bloque2 = <<<EOF

<table style="font-size:7px;">

	<tr>
	
		<td style="width:100px; text-align:left">
			$item[cantidad] X $item[descripcion]
		</td>
		<td style="width:60px; text-align:right">
			Bss $precioTotal
			<br>	
		</td>
	</tr>

</table>

EOF;

			$pdf->writeHTML($bloque2, false, false, false, false, '');
		}

		// ---------------------------------------------------------

		$bloque3 = <<<EOF

<table style="font-size:7px; text-align:left">

	<tr>
	
		<td style="width:120px;">
			 SUB-TOTAL: 
		</td>

		<td style="width:60px;">
			Bss $neto
		</td>

	</tr>

	<tr>
	
		<td style="width:80px;">
			 IVA: 
		</td>


	</tr>

	<tr>
	
		<td style="width:160px;">
			 -----------------------------------------------------------------
		</td>

	</tr>

	<tr>
	
		<td style="width:120px;">
			 TOTAL: 
		</td>

		<td style="width:60px;">
			Bss $total
		</td>

	</tr>

</table>



EOF;

		$pdf->writeHTML($bloque3, false, false, false, false, '');

		// ---------------------------------------------------------


		$bloque4 = <<<EOF
<br><br>

<table style="font-size:7px; text-align:left">

	<tr>
	
		<td style="width:120px;">
			 FORMAS DE PAGO: 
		</td>

	</tr>

	<br>

	<tr>
	
		<td style="width:120px;">
			 CANTIDAD: 
		</td>

	</tr>

</table>



EOF;

		$pdf->writeHTML($bloque4, false, false, false, false, '');

		// ---------------------------------------------------------
		//SALIDA DEL ARCHIVO 

		//$pdf->Output('factura.pdf', 'D');
		ob_end_clean();
		$pdf->Output('factura.pdf');
	}
}

$factura = new imprimirFactura();
$factura->codigo = $_GET["codigo"];
$factura->traerImpresionFactura();
