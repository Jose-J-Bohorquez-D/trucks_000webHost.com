<?php 

require_once "perfiles.Modelo.php";

class ModeloUsuarios extends ConexionBD{

	static public function mdlMostrarUsuarios($tabla){

		$stmt=ConexionBD::conectarbd()->prepare("SELECT * FROM $tabla");

		$stmt->execute();

		return $stmt->fetchAll();

	}


	static public function mdlRegistroUsuario($datosMdl,$tabla){

		$horaLoc=date_default_timezone_set("America/Bogota");

		$horaLoc=date("Y-m-d H:i:s");

		$stmt=ConexionBD::conectarbd()->prepare(
			"INSERT INTO 
			$tabla(identificacion,nombres,email,pass_usu,telefono,direccion,rol_asignado,crea)
			VALUES
			(:ident,:nom,:mail,:pass,:tel,:dir,:rol,:crea)");

		$stmt->bindParam(":ident",$datosMdl["iden"]);
		$stmt->bindParam(":nom",$datosMdl["nom"]);
		$stmt->bindParam(":mail",$datosMdl["mail"]);
		$stmt->bindParam(":pass",$datosMdl["newpass"]);
		$stmt->bindParam(":tel",$datosMdl["tel"]);
		$stmt->bindParam(":dir",$datosMdl["dir"]);
		$stmt->bindParam(":rol",$datosMdl["perfil"]);
		$stmt->bindParam(":crea",$horaLoc);

		if ($stmt->execute()) {

			return "cpz";
			
		}else{

			return "error";

		}

	}

	static public function mdlEditarUsuario($datosMdl,$tabla){

		$stmt=ConexionBD::conectarbd()->prepare("SELECT * FROM $tabla WHERE id_usuario = :idUser");

		$stmt->bindParam(":idUser",$datosMdl);

		$stmt->execute();

		return $stmt->fetch();

	}

	static public function mdlActualizarUsuario($datosMdl,$tabla){

		$horaLoc=date_default_timezone_set("America/Bogota");

		$horaLoc=date("Y-m-d H:i:s");

		$stmt=ConexionBD::conectarbd()->prepare(
			"UPDATE $tabla SET identificacion= :iden,
				nombres= :name,
				email= :mail,
				pass_usu= :pass,
				telefono= :tel,
				direccion= :dir,
				rol_asignado= :rol,
				actualiza= :actu WHERE id_usuario= :idActu");

		$stmt->bindParam(":iden",$datosMdl["iden"]);
		$stmt->bindParam(":name",$datosMdl["nom"]);
		$stmt->bindParam(":mail",$datosMdl["mailEdit"]);
		$stmt->bindParam(":pass",$datosMdl["pass"]);
		$stmt->bindParam(":tel",$datosMdl["tel"]);
		$stmt->bindParam(":dir",$datosMdl["dir"]);
		$stmt->bindParam(":rol",$datosMdl["perfUsu"]);
		$stmt->bindParam(":actu",$horaLoc);
		$stmt->bindParam(":idActu",$datosMdl["idEdit"]);

		if ($stmt->execute()) {

			return "cpz";
			
		}else{

			return "error";

		}

	}

	static public function mdlBorrarUsuario($datosMdl,$tabla){

		$stmt=ConexionBD::conectarbd()->prepare("DELETE FROM $tabla WHERE id_usuario = :idUser");

		$stmt->bindParam(":idUser",$datosMdl);

		if ($stmt->execute()) {

			return "cpz";
			
		}else{

			return "error";

		}

	}

	static public function mdlLogin($dato,$tabla){

		$stmt=ConexionBD::conectarbd()->prepare("SELECT * FROM $tabla WHERE email = :ingUsu");

		$stmt->bindParam(":ingUsu",$dato);

		$stmt->execute();

		return $stmt->fetch();

	}

}