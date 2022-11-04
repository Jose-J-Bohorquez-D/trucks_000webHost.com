<?php 
require_once "servicios.Modelo.php";
class ModeloClientes extends ConexionBD{
/*==================== Crear Nuevo Cliente ====================*/
	static public function mdlCrearNuevoCliente($datosMdl,$tabla){
		$stmt=ConexionBD::conectarbd()->prepare(
			"INSERT INTO 
			$tabla(nombre_empresa,
					nombre_cliente,
					direccion,
					numero_lic_emp,
					tel1,
					tel2,
					email1,
					email2,
					id_cgpe,
					ifta_number,
					tax_id_number_ein,
					ny_permit,
					nm_permit,
					ky_permit)
			VALUES(:nombre_empresa,
					:nombre_cliente,
					:direccion,
					:numero_lic_emp,
					:tel1,
					:tel2,
					:email1,
					:email2,
					:id_cgpe,
					:ifta_number,
					:tax_id_number_ein,
					:ny_permit,
					:nm_permit,
					:ky_permit)");
		$stmt->bindParam(":nombre_empresa",$datosMdl["nE"]);
		$stmt->bindParam(":nombre_cliente",$datosMdl["nC"]);
		$stmt->bindParam(":direccion",$datosMdl["dir"]);
		$stmt->bindParam(":numero_lic_emp",$datosMdl["nL_Emp"]);
		$stmt->bindParam(":tel1",$datosMdl["tel1"]);
		$stmt->bindParam(":tel2",$datosMdl["tel2"]);
		$stmt->bindParam(":email1",$datosMdl["mail1"]);
		$stmt->bindParam(":email2",$datosMdl["mail2"]);
		$stmt->bindParam(":id_cgpe",$datosMdl["idCgpe"]);
		$stmt->bindParam(":ifta_number",$datosMdl["nIfta"]);
		$stmt->bindParam(":tax_id_number_ein",$datosMdl["taxId"]);
		$stmt->bindParam(":ny_permit",$datosMdl["nypi"]);
		$stmt->bindParam(":nm_permit",$datosMdl["nmpi"]);
		$stmt->bindParam(":ky_permit",$datosMdl["kypi"]);
		if ($stmt->execute()) {
			return "cpz";
		}else{
			return "error";
		}
	}
/*==================== Mostrar Clientes ====================*/
	static public function mdlMostrarClientes($tabla){
		$stmt=ConexionBD::conectarbd()->prepare("SELECT * FROM $tabla");
		$stmt->execute();
		return $stmt->fetchAll();
	}
/*==================== Editar Cliente ====================*/
	static public function mdlEditarCliente($datoMdl,$tabla){
		$stmt=ConexionBD::conectarbd()->prepare(
			"SELECT * 
			FROM $tabla
			WHERE id_cliente= :idCli");
		$stmt->bindParam("idCli",$datoMdl);
		$stmt->execute();
		return $stmt->fetch();
	}
/*==================== Actualizar Cliente ====================*/
	static public function mdlActualizarCliente($datosMdl,$tabla){
		$stmt=ConexionBD::conectarbd()->prepare(
			"UPDATE $tabla
			SET nombre_empresa= :nombre_empresa,
				nombre_cliente= :nombre_cliente,
				direccion= :direccion,
				numero_lic_emp= :numero_lic_emp,
				tel1= :tel1,
				tel2= :tel2,
				email1= :email1,
				email2= :email2,
				id_cgpe= :id_cgpe,
				ifta_number= :ifta_number,
				tax_id_number_ein= :tax_id_number_ein,
				ny_permit= :ny_permit,
				nm_permit= :nm_permit,
				ky_permit= :ky_permit
			WHERE id_cliente= :idCli");
		$stmt->bindParam(":nombre_empresa",$datosMdl["eNe"]);
		$stmt->bindParam(":nombre_cliente",$datosMdl["eNc"]);
		$stmt->bindParam(":direccion",$datosMdl["eD"]);
		$stmt->bindParam(":numero_lic_emp",$datosMdl["eNl"]);
		$stmt->bindParam(":tel1",$datosMdl["eT1"]);
		$stmt->bindParam(":tel2",$datosMdl["eT2"]);
		$stmt->bindParam(":email1",$datosMdl["eC1"]);
		$stmt->bindParam(":email2",$datosMdl["eC2"]);
		$stmt->bindParam(":id_cgpe",$datosMdl["eIcgpe"]);
		$stmt->bindParam(":ifta_number",$datosMdl["eIdnifta"]);
		$stmt->bindParam(":tax_id_number_ein",$datosMdl["eTaxId"]);
		$stmt->bindParam(":idCli",$datosMdl["idClienteAEditar"]);
		$stmt->bindParam(":ny_permit",$datosMdl["enyp"]);
		$stmt->bindParam(":nm_permit",$datosMdl["enmp"]);
		$stmt->bindParam(":ky_permit",$datosMdl["ekyp"]);
		if ($stmt->execute()) {
			return "cpz";
		}else{
			return "error";
		}
	}
/*====================eliminar Cliente====================*/
	static public function mdlEliminarCliente($datoMdl,$tabla){

		$stmt=ConexionBD::conectarbd()->prepare("DELETE FROM $tabla WHERE id_cliente= :idCli");

		$stmt->bindParam("idCli",$datoMdl);

		if ($stmt->execute()) {
			return "cpz";
		}else{
			return "error";
		}

	}

}


 ?>