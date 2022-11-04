<?php 

class ControladorVehiculos{


	public function ctrMostrarClientes(){
		$respuesta=ModeloVehiculos::mdlMostrarClientes("clientes");
		#var_dump($respuesta);
		foreach ($respuesta as $key => $value) {
			echo '<option value="'.$value["nombre_empresa"].'">'.$value["nombre_empresa"].'</option>';
		}
	}


	public function ctrCrearVehiculo(){
		if (isset($_POST['placa'])) {
			$filtro1=str_replace(',', '', $_POST['valor']);
			$filtro2=str_replace('.', '', $filtro1);
			$datosCv=array(
				"placa"	=>$_POST["placa"],
				"mod"	=>$_POST["modelo"],
				"year"	=>$_POST["year"],
				"vin"	=>$_POST["vin"],
				"valor"	=>number_format($filtro2,2),
				"dot"	=>$_POST["dot"],
				"pend1"	=>$_POST["pend1"],
				"pend2"	=>$_POST["pend2"],
				"pend3"	=>$_POST["pend3"],
				"asig"	=>$_POST["asignado"]);
			#var_dump($datoCtr);
			$respuesta=ModeloVehiculos::mdlCrearVehiculo($datosCv,"vehiculos");
			#echo $respuesta;
			if ($respuesta == "cpz") {
				echo '
				<script type="text/javascript">
					window.location.href = "index.php?action=okVehiculo";
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


	public function ctrMostrarVehiculos(){
		$respuesta=ModeloVehiculos::mdlMostrarVehiculos("vehiculos");
		#var_dump($respuesta);
		setlocale(LC_MONETARY, 'en_US');
		foreach ($respuesta as $key => $value) {
			echo '
		<tr>
			<td>
        		<a href="index.php?action=editarVehiculo&idEditV='.$value["id_vehiculo"].'" class="btn btn-warning btn-xs">Edit</a>
        		<a href="index.php?action=vehiculos&idDeletV='.$value["id_vehiculo"].'" class="btn btn-danger btn-xs">del</a>
      		</td>
      		<td>'.$value["placa"].'</td>
      		<td>'.$value["modelo"].'</td>
      		<td>'.$value["year"].'</td>
      		<td>'.$value["vin_numer"].'</td>
      		<td>'.$value["costo_vehiculo"].'</td>
      		<td>'.$value["dote_number"].'</td>
      		<td>'.$value["pendiente1"].'</td>
      		<td>'.$value["pendiente2"].'</td>
      		<td>'.$value["pendiente3"].'</td>
      		<td>'.$value["asignado_empresa"].'</td>
      		
    	</tr>
			';
		}
	}


	public function ctrEditarVehiculo(){
		if (isset($_GET['idEditV'])) {
			$dato=$_GET['idEditV'];
			$respuesta=ModeloVehiculos::mdlEditarVehiculo($dato,"vehiculos");
			#var_dump($respuesta);
			echo ' <input type="hidden" name="idEditVehiFormEdit" value="'.$respuesta['id_vehiculo'].'">
<label>Plate: </label>
<input type="text" name="editPlaca" value="'.$respuesta['placa'].'" placeholder="write a plate" class="form-control" required><br>
<label>Model: </label>
<input type="text" name="editModelo" value="'.$respuesta['modelo'].'" placeholder="Write The Model" class="form-control" required><br>
<label>Year: </label>
<input type="text" name="editYear" value="'.$respuesta['year'].'" placeholder="Write The Year" class="form-control" required><br>
<label>VIN #: </label>
<input type="text" name="editVin" value="'.$respuesta['vin_numer'].'" placeholder="Write the VIN#" class="form-control" required><br>
<label>Value-Cost: </label>
<input type="text" name="editValor" value="'.$respuesta['costo_vehiculo'].'" placeholder="Write The Value" class="form-control" required><br>
<label>DOT #: </label>
<input type="text" name="editDot" value="'.$respuesta['dote_number'].'" placeholder="Write the DOT#" class="form-control" required><br>
<label>Slope 1: </label>
<input type="text" name="editPend1" value="'.$respuesta['pendiente1'].'" placeholder="write information 1" class="form-control" required><br>
<label>Slope 2: </label>
<input type="text" name="editPend2" value="'.$respuesta['pendiente2'].'" placeholder="write information 2" class="form-control" required><br> 
<label>Slope 3: </label>
<input type="text" name="editPend3" value="'.$respuesta['pendiente3'].'" placeholder="write information 3" class="form-control" required><br>
<label>assign to: </label>
<select name="editAsignado" class="form-select" aria-label="Default select example" required>
<option value="">(Click) To See Companies</option>
<option selected value="'.$respuesta['asignado_empresa'].'">Vehicle Currently Assigned To: '.$respuesta['asignado_empresa'].'</option>';
		}
		return $respuesta;
	}


	public function ctrMostrarEmpresasFormEditarVehiculo(){
		$respuesta=ModeloClientes::mdlMostrarClientes("clientes");
		foreach ($respuesta as $key => $value) {
		echo '
<option value="'.$value['nombre_empresa'].'">'.$value['nombre_empresa'].'</option>';
		}
	}

	public function ctrActualizarVehiculo(){
		if (isset($_POST['idEditVehiFormEdit'])) {
			$datosFormEditVehiculoCtr=array("idEdit"=>$_POST['idEditVehiFormEdit'],
				  "eP"=>$_POST['editPlaca'],
				  "eM"=>$_POST['editModelo'],
				  "eY"=>$_POST['editYear'],
				  "eVi"=>$_POST['editVin'],
				  "eVa"=>$_POST['editValor'],
				  "eD"=>$_POST['editDot'],
				  "ePe1"=>$_POST['editPend1'],
				  "ePe2"=>$_POST['editPend2'],
				  "ePe3"=>$_POST['editPend3'],
				  "eA"=>$_POST['editAsignado']);
			$respuesta=ModeloVehiculos::mdlActualizarVehiculo($datosFormEditVehiculoCtr,"vehiculos");
			if ($respuesta == "cpz") {
				echo '
				<script type="text/javascript">
					window.location.href = "index.php?action=cambioVehiculo";
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


	public function ctrEliminarVehiculo(){
		if (isset($_GET['idDeletV'])) {
			$datoIdElimV=$_GET['idDeletV'];
			$respuesta=ModeloVehiculos::mdlEliminarVehiculo($datoIdElimV,"vehiculos");
			if ($respuesta == "cpz") {
				echo '
				<script type="text/javascript">
					window.location.href = "index.php?action=elimV";
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



}

 ?>