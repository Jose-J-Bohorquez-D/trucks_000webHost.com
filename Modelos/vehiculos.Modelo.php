<?php 

require_once "clientes.Modelo.php";
 
class ModeloVehiculos extends ConexionBD{

	static public function mdlMostrarClientes($tabla){
		$stmt=ConexionBD::conectarbd()->prepare("SELECT * FROM $tabla");
		$stmt->execute();
		return $stmt->fetchAll(); 
	}


	static public function mdlCrearVehiculo($datosMdl,$tabla){
		$stmt=ConexionBD::conectarbd()->prepare("INSERT INTO $tabla(placa,modelo,year,vin_numer,costo_vehiculo,dote_number,pendiente1,pendiente2,pendiente3,asignado_empresa)VALUES(:placa,:modelo,:year,:vin_numer,:costo_vehiculo,:dote_number,:pendiente1,:pendiente2,:pendiente3,:asignado_empresa)");
		$stmt->bindParam(":placa",			$datosMdl["placa"]);
		$stmt->bindParam(":modelo",			$datosMdl["mod"]);
		$stmt->bindParam(":year",			$datosMdl["year"]);
		$stmt->bindParam(":vin_numer",		$datosMdl["vin"]);
		$stmt->bindParam(":costo_vehiculo", $datosMdl["valor"]);
		$stmt->bindParam(":dote_number",	$datosMdl["dot"]);
		$stmt->bindParam(":pendiente1",		$datosMdl["pend1"]);
		$stmt->bindParam(":pendiente2",		$datosMdl["pend2"]);
		$stmt->bindParam(":pendiente3",		$datosMdl["pend3"]);
		$stmt->bindParam(":asignado_empresa",$datosMdl["asig"]);
		if ($stmt->execute()) {
			return "cpz";
		}else{
			return "error";
		}
	}


	static public function mdlMostrarVehiculos($tabla){
		$stmt=ConexionBD::conectarbd()->prepare("SELECT * FROM $tabla");
		$stmt->execute();
		return $stmt->fetchAll();
	}


	static public function mdlEditarVehiculo($datoMdl,$tabla){
		$stmt=ConexionBD::conectarbd()->prepare("SELECT * FROM $tabla WHERE id_vehiculo= :idV");
		$stmt->bindParam(":idV",$datoMdl);
		$stmt->execute();
		return $stmt->fetch();

	}

	static public function mdlActualizarVehiculo($datosMdl,$tabla){
		$stmt=ConexionBD::conectarbd()->prepare("UPDATE $tabla SET placa=:placa, modelo=:modelo, year=:year, vin_numer=:vin_numer, costo_vehiculo=:costo_vehiculo, dote_number=:dote_number, pendiente1=:pendiente1, pendiente2=:pendiente2, pendiente3=:pendiente3, asignado_empresa=:asignado_empresa WHERE id_vehiculo=:idEdit");
		$stmt->bindParam(":placa",			$datosMdl["eP"]);
		$stmt->bindParam(":modelo",			$datosMdl["eM"]);
		$stmt->bindParam("year",			$datosMdl["eY"]);
		$stmt->bindParam(":vin_numer",		$datosMdl["eVi"]);
		$stmt->bindParam(":costo_vehiculo",	$datosMdl["eVa"]);
		$stmt->bindParam(":dote_number",	$datosMdl["eD"]);
		$stmt->bindParam(":pendiente1",		$datosMdl["ePe1"]);
		$stmt->bindParam(":pendiente2",		$datosMdl["ePe2"]);
		$stmt->bindParam(":pendiente3",		$datosMdl["ePe3"]);
		$stmt->bindParam(":asignado_empresa",$datosMdl["eA"]);
		$stmt->bindParam(":idEdit",$datosMdl["idEdit"]);
		if ($stmt->execute()) {
			return "cpz";
		}else{
			return "error";
		}
	}

	static public function mdlEliminarVehiculo($datosMdl,$tabla){
		$stmt=ConexionBD::conectarbd()->prepare("DELETE FROM $tabla WHERE id_vehiculo=:idElimV");
		$stmt->bindParam(":idElimV",$datosMdl);
		if ($stmt->execute()) {
			return "cpz";
		}else{
			return "error";
		}
	}

}

 ?>