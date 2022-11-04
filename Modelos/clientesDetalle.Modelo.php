<?php 

require_once("ConexionBD.php"); 

class ModeloDetallesCliente extends ConexionBD{
	
	static public function mdlMostrarDtsCliente($datoMdl,$tabla){
		
		$stmt=ConexionBD::conectarbd()->prepare("SELECT * FROM $tabla WHERE id_cliente=:idCli");
		
		$stmt->bindParam(":idCli",$datoMdl);
		
		$stmt->execute();

		return $stmt->fetch();

	}

	static public function mdlMostrarVehiculosFiltrados($datoMdl,$tabla){

		$stmt=ConexionBD::conectarbd()->prepare("SELECT * FROM $tabla WHERE asignado_empresa=:datomdl");

		$stmt->bindParam(":datomdl",$datoMdl);

		$stmt->execute();

		return $stmt->fetchAll();

	}

	static public function mdlActualizarDatosVehiculoConServicios($datosMdl,$tabla){

	$stmt=ConexionBD::conectarbd()->prepare(
		"UPDATE $tabla 
		SET placa=:placa, modelo=:modelo, year=:year, vin_numer=:vin_numer, costo_vehiculo=:costo_vehiculo, 
		dote_number=:dote_number, pendiente1=:pendiente1, pendiente2=:pendiente2, pendiente3=:pendiente3, 
		asignado_empresa=:asignado_empresa, servicio_asig=:servicio_asig, serv_desde=:serv_desde, serv_hasta=:serv_hasta  
		WHERE id_vehiculo=:idEdit");

		$stmt->bindParam(":placa",			$datosMdl["eP"]);
		$stmt->bindParam(":modelo",			$datosMdl["eM"]);
		$stmt->bindParam("year",			$datosMdl["eY"]);
		$stmt->bindParam(":vin_numer",		$datosMdl["eVi"]);
		$stmt->bindParam(":costo_vehiculo",	$datosMdl["eVa"]);
		$stmt->bindParam(":dote_number",	$datosMdl["eD"]);
		$stmt->bindParam(":pendiente1",		$datosMdl["eP1"]);
		$stmt->bindParam(":pendiente2",		$datosMdl["eP2"]);
		$stmt->bindParam(":pendiente3",		$datosMdl["eP3"]);
		$stmt->bindParam(":asignado_empresa",$datosMdl["eA"]);
		$stmt->bindParam(":servicio_asig",$datosMdl["aS"]);
		$stmt->bindParam(":serv_desde",$datosMdl["fI"]);
		$stmt->bindParam(":serv_hasta",$datosMdl["fF"]);
		$stmt->bindParam(":idEdit",$datosMdl["idUpDS"]);
		if ($stmt->execute()) {
			return "cpz";
		}else{
			return "error";
		}

	}

	#aca subimos archivos al servidor y a la base de datos 
	static public function subirArchivoModelo($tabla,$datosArchivoMdl){
	$horaLoc=date_default_timezone_set("America/Bogota");
	$horaLoc=date("Y-m-d H:i:s");

		$stmt=ConexionBD::conectarbd()->prepare("INSERT INTO $tabla(nombre_archivo,ruta_archivo,nombre_empresa,fecha_crea)
			VALUES(:na,:ra,:ne,:fc)");
		$stmt->bindParam(":na",$datosArchivoMdl["nombreArchivo"]);
		$stmt->bindParam(":ra",$datosArchivoMdl["rutaArchivo"]);
		$stmt->bindParam(":ne",$datosArchivoMdl["nombreEmpresa"]);
		$stmt->bindParam(":fc",$horaLoc);
		if ($stmt->execute()) {
			return "cpz";
		}else{
			return "error";
		}
	}

	#mostrar datos de la tabla de archivos
	static public function mdlEditarPerfil($datosModelo,$tabla){

		$stmt=ConexionBD::conectarbd()->prepare("SELECT * FROM $tabla WHERE nombre_empresa= :ne");

		$stmt->bindParam(":ne",$datosModelo);

		$stmt->execute();

		return $stmt->fetch();

		$stmt->close();

		$stmt=null;

	}

	#mostrar datos de la tabla de archivos
	static public function mdlMostrarDatosTablaArchivos($tabla,$nombreEmpresaModelo){

		$stmt=ConexionBD::conectarbd()->prepare("SELECT * FROM $tabla WHERE nombre_empresa= :ne");

		$stmt->bindParam(":ne",$nombreEmpresaModelo);

		$stmt->execute();

		return $stmt->fetchAll();

		$stmt->close();

		$stmt=null;

	}



}





?>
