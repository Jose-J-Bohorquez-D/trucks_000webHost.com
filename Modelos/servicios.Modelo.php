<?php 

require_once "usuarios.Modelo.php";

class ModeloServicios extends ConexionBD{

/*==============================
Registro de nuevo Servicio
==============================*/
	static public function mdlCrearServicio($datosMdl,$tabla){

		$stmt=ConexionBD::conectarbd()->prepare(
			"INSERT INTO $tabla(nombre_servicio/*,valor_servicio,tiempo_servicio*/)
			VALUES(:nombre_servicio/*, :valor_servicio, :tiempo_servicio*/)");

		$stmt->bindParam(":nombre_servicio",$datosMdl["name"]);/*
		$stmt->bindParam(":valor_servicio",$datosMdl["val"]);
		$stmt->bindParam(":tiempo_servicio",$datosMdl["time"]);*/

		if ($stmt->execute()) {

			return "cpz";
			
		}else{

			return "error";

		}

	}

/*==============================
Registro de nuevo Servicio
==============================*/
	static public function mdlMostrarServicios($tabla){

		$stmt=ConexionBD::conectarbd()->prepare("SELECT * FROM $tabla");

		$stmt->execute();

		return $stmt->fetchAll();

	}

/*==============================
Editar Servicio
==============================*/
	static public function mdlEditarServicio($datoMdl,$tabla){

		$stmt=ConexionBD::conectarbd()->prepare("SELECT * FROM $tabla WHERE id_servicio= :id_serv");

		$stmt->bindParam("id_serv",$datoMdl);

		$stmt->execute();

		return $stmt->fetch();

	}	

/*==============================
Actualizar Servicio
==============================*/
	static public function mdlActualizarServicio($datosMdl,$tabla){

		#$stmt=ConexionBD::conectarbd()->prepare("UPDATE $tabla SET nombre_servicio= :ns, valor_servicio= :vs, tiempo_servicio=:ts WHERE id_servicio= :idS");

		$stmt=ConexionBD::conectarbd()->prepare(
			"UPDATE $tabla 
			SET nombre_servicio= :ns 
			WHERE id_servicio= :idS");

		$stmt->bindParam(":ns",$datosMdl["ens"]);/*
		$stmt->bindParam(":vs",$datosMdl["evs"]);
		$stmt->bindParam(":ts",$datosMdl["ets"]);*/
		$stmt->bindParam(":idS",$datosMdl["ide"]);

		if ($stmt->execute()) {

			return "cpz";
			
		}else{

			return "error";

		}

	}

/*==============================
eliminar Servicio
==============================*/
	static public function mdlEliminarServicio($datosMdl,$tabla){

		$stmt=ConexionBD::conectarbd()->prepare(
			"DELETE FROM $tabla WHERE id_servicio= :idS");

		$stmt->bindParam(":idS",$datosMdl);

		if ($stmt->execute()) {

			return "cpz";
			
		}else{

			return "error";

		}

	}

}

 ?>