<?php 
require_once "../../../controladores/ventas.controlador.php";
require_once "../../../modelos/ventas.modelo.php";


class imprimirReporte {

    public $codigo;

    public function traerReporte(){

        $codigo = $this->codigo;
        
		$respuesta = ControladorVentas::ctrVentasReporte($codigo);
        //var_dump($respuesta).die;

        /*
        
        
        $detalle = $respuesta["detalle"];
        $detalle = explode(" ", $detalle);
        $detalle = array_splice($detalle,1);
        $detalle = implode(" ",$detalle);
        $fecha = substr($respuesta["fecha_creacion"],0,-8);
        $producto = $respuesta["codigo"]." - ".$respuesta["descripcion"];
        $cantidad = $respuesta["stock"];
        $almacen = $respuesta["almacen"];
        $usuario = $respuesta["usuario"];

        
         */


       /*  $codigo = $data["codigo"];
        $tipo = $data["tipoInforme"];
        $nforme = $data["informe"];
        $producto = json_decode($data["producto"], true);
         */

        //REQUERIMOS LA CLASE TCPDF

        require_once('tcpdf_include.php');

        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->AddPage();
		
		

        $bloque1 = <<<EOF

	    <table>
		
		<tr>
			
			<td style="width:150px"><img src="images/logo_panaderia.jpeg"></td>

			<td style="background-color:white; width:140px">
				
				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
					<br>
					RIF: J501696233

					<br>
					Dirección: AV. Nicolas Rolando

				</div>

			</td>

			<td style="background-color:white; width:140px">

				<div style="font-size:8.5px; text-align:right; line-height:15px;">
					
					<br>
					Teléfono: 04120887087
					
					<br>
					sunilichguatarama@gmail.com

				</div>
				
			</td>

            <td style="background-color:white; width:90px; text-align:center; color:red"><br><br>INFORME DE VENTA N.<br>$codigo</td>
		</tr>

	    </table>
        <br>
        <br>
        <br>



EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');




// ---------------------------------------------------------

$bloque2 = <<<EOF

	<table border='0'>

		<tr> 

			<td align="center" style='font-weight:bold; border:1px solid #eee;'>CANTIDAD</td>

			<td align="center" style='font-weight:bold; border:1px solid #eee;'>PRODUCTOS</td>

			<td align="center" style='font-weight:bold; border:1px solid #eee;'>TOTAL</td>	
				

		</tr>
       


	</table>

    <br>
    <br>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');

$producto = json_decode($respuesta["productos"], true);

//var_dump($producto).die;

foreach ($producto as $row => $item){

    $bloque3 = <<<EOF

	<table border='0'>

		<tr> 

			<td align="center" style='font-weight:bold; border:1px solid #eee;'>$item[cantidad]</td>	
			<td align="center" style='font-weight:bold; border:1px solid #eee;'>$item[descripcion]</td>		
			<td align="center" style='font-weight:bold; border:1px solid #eee;'>$item[total]</td>		


		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque3, false, false, false, false, '');


}


        ob_end_clean();
        $pdf->Output('INFORMEVENTA-'.$codigo.'.pdf');
    }

}

$reporte = new imprimirReporte();
$reporte -> codigo = $_GET["codigo"];
$reporte -> traerReporte();

?>