<?php 

class ControladorTablaGeneralServicios{

	public function ctrMostrarServiciosEnTablaGeneral(){

		$respuesta=ModeloTablaGeneralServicios::mdlMostrarServiciosEnTablaGeneral("servicios_asignados_vehiculos");

		#var_dump($respuesta);

		foreach ($respuesta as $key => $value) {
		echo '
		<tr>
			<td>'.$value["nombre_cliente"].'</td>
			<td>'.$value["nombre_empresa"].'</td>
			<td>'.$value["tel1"].'</td>
			<td>'.$value["email1"].'</td>
			<td>'.$value["nombre_servicio"].'</td>
			<td>'.$value["fecha_inicio_serv"].'</td>
			<td>'.$value["fecha_fin_serv"].'</td>
    	</tr>
		';
		}

	}

}


 ?>