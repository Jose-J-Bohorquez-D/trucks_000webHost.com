<?php 

require_once "servicios.Modelo.php";

class Modelo_Alcohol_Y_Drogas extends ConexionBD{

	public static function mdlMostrarServiciosFiltradosAD($tabla){

		$filtroBD="38";

		$stmt=ConexionBD::conectarbd()->prepare("
SELECT SAV.id_asignacion,C.nombre_empresa,C.nombre_cliente,C.email1,V.placa,S.nombre_servicio,SAV.fecha_inicio_serv,SAV.fecha_fin_serv,SAV.valor_servicio_asignado
FROM	clientes C
JOIN	vehiculos V ON C.nombre_empresa=V.asignado_empresa
JOIN	servicios_asignados_vehiculos SAV ON	V.id_vehiculo=SAV.id_vehiculo
JOIN	servicios S ON	SAV.id_servicio=S.id_servicio
WHERE	SAV.id_servicio=:filtro");

		$stmt->bindParam(":filtro",$filtroBD);

		$stmt->execute();
		
		return $stmt->fetchAll();

	}





}

 ?>