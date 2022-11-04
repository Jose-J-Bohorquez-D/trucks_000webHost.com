<?php 

class ControladorClientes{

/*====================
crear nuevo cliente
====================*/
	public function crearNuevoCliente(){

		if (isset($_POST['nombre_empresa'])) {

			$datosCtr=array(
				"nE"=>$_POST['nombre_empresa'],
				"nC"=>$_POST['nombre_cliente'],
				"dir"=>$_POST['direccion'],
				"nL_Emp"=>$_POST['nLicEmp'],
				"tel1"=>$_POST['telefono1'],
				"tel2"=>$_POST['telefono2'],
				"mail1"=>$_POST['correo1'],
				"mail2"=>$_POST['correo2'],
				"idCgpe"=>$_POST['idCgpe'],
				"nIfta"=>$_POST['nIfta'],
				"taxId"=>$_POST['taxId'],
				"nypi"=>$_POST['nyp'],
				"nmpi"=>$_POST['nmp'],
				"kypi"=>$_POST['kyp']);

			$respuesta=ModeloClientes::mdlCrearNuevoCliente($datosCtr,"clientes");

			#echo $respuesta;

			if ($respuesta == "cpz") {
			echo '
				<script type="text/javascript">
					window.location.href = "index.php?action=okCliente";
				</script>
				';
			}else{
				echo '
	        <script>
					Swal.fire({
						  icon: "error",
						  title: "Oops...",
						  text: "Something went wrong!"
						  })
					</script>
			';
			}
			
		}

	}

/*====================
Mostrar Clientes
====================*/
	public function ctrMostrarClientes(){

		$respuesta=ModeloClientes::mdlMostrarClientes("clientes");

		#var_dump($respuesta);

		foreach ($respuesta as $key => $value) {
  		echo '
    	<tr>
<td>
<a href="index.php?action=clienteDetalles&idMstrPrl='.$value["id_cliente"].'" class="btn btn-info btn-xs"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
  <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/>
</svg></a>

<a href="index.php?action=editarCliente&idEditCli='.$value["id_cliente"].'" class="btn btn-warning btn-xs">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
</a>
<a href="index.php?action=clientes&idDeletCli='.$value["id_cliente"].'" class="btn btn-danger btn-xs">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg>
</a>
</td>
      		
      		<td>'.$value["nombre_empresa"].'</td>
      		<td>'.$value["nombre_cliente"].'</td>
      		<td>'.$value["direccion"].'</td>
      		<td>'.$value["numero_lic_emp"].'</td>
      		<td>'.$value["tel1"].'</td>
      		<td>'.$value["tel2"].'</td>
      		<td>'.$value["email1"].'</td>
      		<td>'.$value["email2"].'</td>
      		<td>'.$value["id_cgpe"].'</td>
      		<td>'.$value["ifta_number"].'</td>
      		<td>'.$value["tax_id_number_ein"].'</td>
      		<td>'.$value["ny_permit"].'</td>
      		<td>'.$value["nm_permit"].'</td>
      		<td>'.$value["ky_permit"].'</td>
    	</tr>
  		';
		}

	}

/*====================
Editar Clientes
====================*/
	public function ctrEditarCliente(){

		if (isset($_GET['idEditCli'])) {

			$dato=$_GET['idEditCli'];

			$respuesta=ModeloClientes::mdlEditarCliente($dato,"clientes");

			#var_dump($respuesta);

			echo '
<input type="hidden" name="idClienteAEditar" value="'.$respuesta['id_cliente'].'">

<label>Company Name :</label>
<input type="text" name="ediNombre_empresa" value="'.$respuesta['nombre_empresa'].'" placeholder="write company name" class="form-control" required>
<br>

<label>Customer Name:</label>
<input type="text" name="ediNombre_cliente" value="'.$respuesta['nombre_cliente'].'" placeholder="write customer name" class="form-control" required>
<br>

<label>Address:</label>
<input type="text" name="ediDireccion" value="'.$respuesta['direccion'].'" placeholder="write the address" class="form-control" >
<br>

<label>LIC EMP # :</label>
<input type="text" name="ediNLicEmp" value="'.$respuesta['numero_lic_emp'].'" placeholder="write LIC EMP #" class="form-control" >
<br>

<label>Phone 1:</label>
<input type="number" name="ediTelefono1" value="'.$respuesta['tel1'].'" placeholder="write phone 1" class="form-control" >
<br>

<label>Phone 2:</label>
<input type="number" name="ediTelefono2" value="'.$respuesta['tel2'].'" placeholder="write phone 2" class="form-control" >
<br>

<label>E-mail 1:</label>
<input type="email" name="ediCorreo1" value="'.$respuesta['email1'].'" placeholder="write E-mail 1" class="form-control" required>
<br>

<label>E-mail 2:</label>
<input type="email" name="ediCorreo2" value="'.$respuesta['email2'].'" placeholder="write E-mail 2" class="form-control" >
<br>

<label>ID CGPE:</label>
<input type="number" name="ediIdCgpe" value="'.$respuesta['id_cgpe'].'" placeholder="write ID CGPE" class="form-control" >
<br>

<label># IFTA:</label>
<input type="text" name="ediNIfta" value="'.$respuesta['ifta_number'].'" placeholder="write IFTA #" class="form-control" >
<br>

<label>TAX ID / # EIN:</label>
<input type="text" name="ediTaxId" value="'.$respuesta['tax_id_number_ein'].'" placeholder="write TAX ID/EIN #" class="form-control" >
<br>

<label>NY PERMIT #:</label>
<input type="number" name="editnyp" value="'.$respuesta['ny_permit'].'" placeholder="write NY PERMIT #" class="form-control" >
<br>

<label>NM PERMIT #:</label>
<input type="number" name="editnmp" value="'.$respuesta['nm_permit'].'" placeholder="write NM PERMIT #" class="form-control" >
<br>

<label>KY PERMIT #:</label>
<input type="number" name="editkyp" value="'.$respuesta['ky_permit'].'" placeholder="write KY PERMIT #" class="form-control" >
<br>

			';
			
		}

	}

/*====================
actualizar Cliente
====================*/
	public function ctrActualizarCliente(){

		if (isset($_POST['idClienteAEditar'])) {

			$datosCtr=array(
				"idClienteAEditar"=>$_POST['idClienteAEditar'],
				"eNe"=>$_POST['ediNombre_empresa'],
				"eNc"=>$_POST['ediNombre_cliente'],
				"eD"=>$_POST['ediDireccion'],
				"eNl"=>$_POST['ediNLicEmp'],
				"eT1"=>$_POST['ediTelefono1'],
				"eT2"=>$_POST['ediTelefono2'],
				"eC1"=>$_POST['ediCorreo1'],
				"eC2"=>$_POST['ediCorreo2'],
				"eIcgpe"=>$_POST['ediIdCgpe'],
				"eIdnifta"=>$_POST['ediNIfta'],
				"eTaxId"=>$_POST['ediTaxId'],
				"enyp"=>$_POST['editnyp'],
				"enmp"=>$_POST['editnmp'],
				"ekyp"=>$_POST['editkyp']);

			$respuesta=ModeloClientes::mdlActualizarCliente($datosCtr,"clientes");

			#echo $respuesta;

			if ($respuesta == "cpz") {
			echo '
				<script type="text/javascript">
					window.location.href = "index.php?action=cambioCliente";
				</script>
				';
			}else{
				echo '
	        <script>
					Swal.fire({
						  icon: "error",
						  title: "Oops...",
						  text: "Contacta A Soporte!"
						  })
					</script>
			';
			}

		}

	}

/*====================
eliminar Cliente
====================*/
	public function ctrEliminarCliente(){

		if (isset($_GET['idDeletCli'])) {
			
			$datoCtr=$_GET['idDeletCli'];

			$respuesta=ModeloClientes::mdlEliminarCliente($datoCtr,"clientes");

			if ($respuesta == "cpz") {
			echo '
				<script type="text/javascript">
					window.location.href = "index.php?action=elimCli";
				</script>
				';
			}else{
				echo '
	        <script>
					Swal.fire({
						  icon: "error",
						  title: "Oops...",
						  text: "Contacta A Soporte!"
						  })
					</script>
			';
			}

		}

	}


}

 ?>