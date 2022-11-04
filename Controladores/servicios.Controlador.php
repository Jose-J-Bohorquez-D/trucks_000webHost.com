<?php 

class ControladorServicios{


/*==============================
Registro de nuevo Servicio
==============================*/
	public function ctrCrearServicio(){

		if (isset($_POST['nameServ'])) {

			$datosCtr=array(
				"name"=>$_POST['nameServ']);
				#"val"=>number_format($_POST['valServ'],2),
				#"time"=>$_POST['tiempoServ']);

			$respuesta=ModeloServicios::mdlCrearServicio($datosCtr,"servicios");

			#echo $respuesta;

			if ($respuesta == "cpz") {
			echo '
				<script type="text/javascript">
					window.location.href = "index.php?action=okServicio";
				</script>
				';
			}else{
			echo '
        		<script>
					Swal.fire({
					  icon: "error",
					  title: "Oops...",
					  text: "Contact Support"
					  })
				</script>
			';
			}
			
		}

	}

/*==============================
Vista De Servicios
==============================*/
	public function ctrMostrarServicios(){

		$respuesta=ModeloServicios::mdlMostrarServicios("servicios");

		#var_dump($respuesta);

		foreach ($respuesta as $key => $value) {
		echo '
		<tr>
					<td>
        		<a href="index.php?action=editarServicio&idEdit='.$value["id_servicio"].'" class="btn btn-outline-warning btn-sm">Edit</a>
      		</td>
					<td>
        		<a href="index.php?action=servicios&idDeletS='.$value["id_servicio"].'" class="btn btn-outline-danger btn-sm">del</a>
      		</td>
      		<td>'.$value["nombre_servicio"].'</td>
      		<!--<td>'.$value["valor_servicio"].'</td>
      		<td>'.$value["tiempo_servicio"].'</td>-->
    	</tr>
		';
		}

	}

/*==============================
Vista De Servicios
==============================*/
	public function ctrEditarServicio(){

		if (isset($_GET['idEdit'])) {

			#echo '<h1 class="text-center" >'.$_GET['idEdit'].'</h1>';

			$datoCtr=$_GET['idEdit'];

			$respuesta=ModeloServicios::mdlEditarServicio($datoCtr,"servicios");

			#var_dump($respuesta);

			echo '
		  <input type="hidden" name="idEditServ" value="'.$respuesta['id_servicio'].'"><br>

          <label>Name for the Service: </label>
          <input type="text" name="editNameServ" value="'.$respuesta['nombre_servicio'].'" placeholder="Escriba Un Nombre Para El Servicio" class="form-control"><br>
			';
			
		}

	}	

/*==============================
Actualizar Servicio
==============================*/
	public function ctrActualizarServicio(){

		if (isset($_POST['editNameServ'])) {/*
			$filtro1=str_replace(',', '', $_POST['editValServ']);
			$filtro2=str_replace('.', '', $filtro1);*/

			$datosCtr=array(
				"ide"=>$_POST['idEditServ'],
				"ens"=>$_POST['editNameServ']/*,
				"evs"=>number_format($filtro2,2),
				"ets"=>$_POST['editTiempoServ']*/);

			$respuesta=ModeloServicios::mdlActualizarServicio($datosCtr,"servicios");

			if ($respuesta == "cpz") {
			echo '
				<script type="text/javascript">
					window.location.href = "index.php?action=cambioServicio";
				</script>
				';
			}else{
			echo '
        		<script>
					Swal.fire({
					  icon: "error",
					  title: "Oops...",
					  text: "Contacta A Soporte"
					  })
				</script>
			';
			}
			
		}

	}

	public function ctrEliminarServicio(){

		if (isset($_GET['idDeletS'])) {

			$datoId=$_GET['idDeletS'];

			$respuesta=ModeloServicios::mdlEliminarServicio($datoId,"servicios");

			if ($respuesta== "cpz") {

				echo '
				<script type="text/javascript">
					window.location.href = "index.php?action=elimServ";
				</script>
				';
				
			}
			
		}

	}

}

 ?>