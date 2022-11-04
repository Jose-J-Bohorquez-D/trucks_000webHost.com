<?php 

require_once("FPDF/fpdf.php");

class GeneradorDeFacturasControlador extends FPDF{

	public function ctlrRecibe_Servicio_A_facturar(){
		if (isset($_GET["idFactura"])) {
			$id_asignacion_servicio=$_GET["idFactura"];
			$respuesta=GeneradorFacturasModelo::mdlRecibe_Servicio_A_facturar("servicios_asignados_vehiculos");
			var_dump($respuesta);

			




		}
	}

}

 ?>