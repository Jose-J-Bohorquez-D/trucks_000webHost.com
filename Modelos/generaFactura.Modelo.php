<?php 

class GeneradorDeFacturasModelo {

	public static function mostrar_datos_en_la_factura_mdl($id_asig_mdl){

		$stmt=ConexionBD::conectarbd()->prepare("
		SELECT * FROM servicios_asignados_vehiculos sav
		JOIN vehiculos v ON sav.id_vehiculo = v.id_vehiculo
		JOIN clientes c ON v.asignado_empresa = c.nombre_empresa
		JOIN servicios s ON sav.id_asignacion = s.id_servicio
		WHERE sav.id_asignacion = $id_asig_mdl");

		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

		$stmt=null;

	}

}


 ?>