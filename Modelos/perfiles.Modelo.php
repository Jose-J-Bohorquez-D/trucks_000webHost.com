<?php 

require_once "ConexionBD.php";


class ModeloPerfiles extends ConexionBD{

/*==================================================
mostrar perfiles
==================================================*/
	static public function mdlMostrarPerfiles($tabla){

		$stmt=ConexionBD::conectarbd()->prepare("SELECT * FROM $tabla");

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

		$stmt=null;

	}

/*==================================================
Crear perfiles
==================================================*/
static public function mdlCrearPerfil($dtsMdl,$tabla){

	$horaLoc=date_default_timezone_set("America/Bogota");

	$horaLoc=date("Y-m-d H:i:s");
	
	$stmt=ConexionBD::conectarbd()->prepare("
		INSERT INTO $tabla(nombre_perfil,estado_perfil,creacion_perfil)
		VALUES(:nombre_perfil,:estado_perfil,:creacion_perfil)");

	$stmt->bindParam(":nombre_perfil",$dtsMdl["nombrePerfil"]);
	$stmt->bindParam(":estado_perfil",$dtsMdl["estadoPerfil"]);
	$stmt->bindParam(":creacion_perfil",$horaLoc);

	if ($stmt->execute()) {
		return "cpz";
	}else{
		return "Error Revisa Con Calma";
	}

	$stmt->close();

	$stmt=null;

}

/*==================================================
editar perfil
==================================================*/
	static public function mdlEditarPerfil($datosModelo,$tabla){

		$stmt=ConexionBD::conectarbd()->prepare("SELECT * FROM $tabla WHERE id_perfil= :id_perfil");

		$stmt->bindParam(":id_perfil",$datosModelo);

		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

		$stmt=null;

	}

/*==================================================
Actualizar perfil
==================================================*/
	static public function mdlActualizarPerfil($datosModelo,$tabla){

		$horaLoc=date_default_timezone_set("America/Bogota");

		$horaLoc=date("Y-m-d H:i:s");

		$stmt=ConexionBD::conectarbd()->prepare("
			UPDATE $tabla 
			SET nombre_perfil = :nameperfil, estado_perfil = :estPerfil,actualizacion_perfil = :fechActualiza 
			WHERE id_perfil = :idPerf");

		$stmt->bindParam(":nameperfil",$datosModelo["namEdit"]);
		$stmt->bindParam(":estPerfil",$datosModelo["editEst"]);
		$stmt->bindParam(":fechActualiza",$horaLoc);
		$stmt->bindParam(":idPerf",$datosModelo["idEditar"]);

		if ($stmt->execute()) {
		
			return "cpz";

		}else{

			return "Error Revisa Con Calma";

		}

		$stmt->close();

		$stmt=null;

	}

/*==================================================
Eliminar perfil
==================================================*/
	static public function mdlEliminarPerfil($datosModelo,$tabla){

		$stmt=ConexionBD::conectarbd()->prepare("DELETE FROM $tabla WHERE id_perfil= :idPerf");

		$stmt->bindParam(":idPerf",$datosModelo);
		
		if ($stmt->execute()) {
		
			return "cpz";

		}else{

			return "Error Revisa Con Calma";

		}

		$stmt->close();

		$stmt=null;

	}


}
