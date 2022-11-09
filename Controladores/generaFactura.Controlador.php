<?php 

class GeneradorDeFacturasControlador{

	public function mostrar_datos_en_la_factura_ctlr(){
		if (isset($_GET["idFactura"])) {
			$idAsigServ=$_GET["idFactura"];
			$respuesta=GeneradorDeFacturasModelo::mostrar_datos_en_la_factura_mdl($idAsigServ);
			#var_dump($respuesta);
			$fecha=date('d-m-Y');
			$fechaComoEntero = strtotime($fecha);
			$anio = date("Y", $fechaComoEntero);
			$mes = date("m", $fechaComoEntero);
			$dia = date("d", $fechaComoEntero);
			$mesPlazo=$mes+1;
			require_once("Vistas/Paginas/mostrarFactura.php");

		}
	}

}

?>