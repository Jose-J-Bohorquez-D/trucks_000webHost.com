<?php 

class GeneradorFacturasModelo extends ConexionBD{

	public static function mdlRecibe_Servicio_A_facturar($tabla){

		$stmt=ConexionBD::conectarbd()->prepare("
		SELECT sav.id_asignacion,sav.id_vehiculo,sav.id_servicio,sav.fecha_inicio_serv,sav.fecha_fin_serv,
		sav.valor_servicio_asignado,v.id_vehiculo,v.placa,v.asignado_empresa,s.nombre_servicio,
		c.id_cliente,c.nombre_empresa,c.nombre_cliente,c.direccion,c.tel1,c.email1 
		FROM $tabla sav
		JOIN vehiculos v ON sav.id_asignacion = v.id_vehiculo
		JOIN servicios s ON sav.id_servicio = s.id_servicio
		JOIN clientes c ON v.asignado_empresa = c.nombre_empresa");

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

		$stmt=null;

	}

}


 ?>