<?php 

require_once("ConexionBD.php"); 

class ModeloTablaGeneralServicios extends ConexionBD{

	public static function mdlMostrarServiciosEnTablaGeneral(){

				$stmt=ConexionBD::conectarbd()->prepare("
SELECT	C.nombre_cliente,C.nombre_empresa,C.tel1,C.email1,S.nombre_servicio,SAV.fecha_inicio_serv,SAV.fecha_fin_serv
FROM	clientes C
JOIN	vehiculos V ON C.nombre_empresa=V.asignado_empresa
JOIN	servicios_asignados_vehiculos SAV ON	V.id_vehiculo=SAV.id_vehiculo
JOIN	servicios S ON	SAV.id_servicio=S.id_servicio");

		$stmt->execute();
		
		return $stmt->fetchAll();

	}


}

 ?>