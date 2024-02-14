<?php 
require_once "../../../controladores/kardex.controlador.php";
require_once "../../../modelos/kardex.modelo.php";


class imprimirReporte {

    public $codigo;

    public function traerReporte(){

        $id = $this->codigo;
        
        $respuesta = ControladorKardex::ctrKardexReporte($id);
        
        // var_dump($respuesta).die;
        
        $detalle = $respuesta["detalle"];
        $detalle = explode(" ", $detalle);
        $detalle = array_splice($detalle,1);
        $detalle = implode(" ",$detalle);
        $fecha = substr($respuesta["fecha_creacion"],0,-8);
        $producto = $respuesta["codigo"]." - ".$respuesta["descripcion"];
        $cantidad = $respuesta["stock"];
        $almacen = $respuesta["almacen"];
        $usuario = $respuesta["usuario"];

        //var_dump($respuesta).die;
        
        


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

		</tr>

	    </table>
        <br>
        <br>


EOF;

$pdf->writeHTML($bloque1, false, false, false, false, '');




// ---------------------------------------------------------

$bloque2 = <<<EOF

	<table> 
		
		<tr>
			
			<td style="width:540px"><img src="images/back.jpg"></td>
		
		</tr>

	</table>

	<table style="font-size:10px; padding:5px 10px;">
	
		<tr>
            <td style="border: 1px solid #666; background-color:white; width:390px; ">
			
                Movimiento: $detalle

			</td>

			<td style="border: 1px solid #666; background-color:white; width:150px">
                
                Fecha: $fecha

			</td>


		</tr>

		<tr>
		
			<td style="border: 1px solid #666; background-color:white; width:390px; ">
			
                Producto: $producto

			</td>

			<td style="border: 1px solid #666; background-color:white; width:150px">
                
                Cantidad: $cantidad

			</td>
		</tr>

        <tr>
		
			<td style="border: 1px solid #666; background-color:white; width:540px">Almacen: $almacen</td>

		</tr>

        <tr>
		
			<td style="border: 1px solid #666; background-color:white; width:540px">Usuario: $usuario</td>

		</tr>


		<tr>
		
		<td style="border-bottom: 1px solid #666; background-color:white; width:540px"></td>

		</tr>

	</table>

EOF;

$pdf->writeHTML($bloque2, false, false, false, false, '');


        ob_end_clean();
        $pdf->Output('reporte.pdf');
    }

}

$reporte = new imprimirReporte();
$reporte -> codigo = $_GET["codigo"];
$reporte -> traerReporte();

?>