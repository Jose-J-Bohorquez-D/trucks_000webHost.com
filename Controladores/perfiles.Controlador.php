<?php 

class ControladorPerfiles{

/*==================================================
mostrar perfiles
==================================================*/
	static public function ctrMostrarPerfiles(){

		$respuesta=ModeloPerfiles::mdlMostrarPerfiles("perfiles_trucks");

		#var_dump($respuesta);

		foreach ($respuesta as $key => $value) {
  		echo '
    		<tr>
      		<td>
        		<a href="index.php?action=editarPerfil&id='.$value["id_perfil"].'" class="btn btn-warning btn-xs">Edit</a>
        		<a href="index.php?action=perfiles&idDelet='.$value["id_perfil"].'" class="btn btn-danger btn-xs">del</a>
      		</td>
      		<td>'.$value["nombre_perfil"].'</td>
      		<td>'.$value["estado_perfil"].'</td>
      		<td>'.$value["creacion_perfil"].'</td>
      		<td>'.$value["actualizacion_perfil"].'</td>      		
    		</tr>
  		';
		}

		return $respuesta;

	}

/*==================================================
Crear perfiles
==================================================*/
public function ctrCrearPerfil(){

	if (isset($_POST["nombrePerfil"])) {
		
		$datosFormCrearPerfil=array(
			"nombrePerfil"=>$_POST["nombrePerfil"],
			"estadoPerfil"=>$_POST["estadoPerfil"]);

		$respuesta=ModeloPerfiles::mdlCrearPerfil($datosFormCrearPerfil,"perfiles_trucks");

		if ($respuesta == "cpz") {
			echo '
				<script type="text/javascript">
					window.location.href = "index.php?action=okPerfil";
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

/*==================================================
Editar perfiles
==================================================*/
    public function editarPerfil(){

      $datos=$_GET['id'];
      #testeo echo $datos;

      $respuesta=ModeloPerfiles::mdlEditarPerfil($datos,"perfiles_trucks");

      #test var_dump($respuesta);

      echo '

<input type="hidden" name="idEdit" value="'.$respuesta["id_perfil"].'" class="form-control">

<label for="nombre perfil">Nombre Perfil:</label>
<input type="text" name="editNomPerf" value="'.$respuesta["nombre_perfil"].'" placeholder="Escriba Un Nombre Para El Nuevo Perfil" class="form-control" required>
<br>

<label for="direccion">Seleccione Un Estado:</label>
<select class="form-select" aria-label="Default select example" name="editEstPerf" required>
  <option selected value="'.$respuesta["estado_perfil"].'">Dejar : '.$respuesta["estado_perfil"].'</option>
  <option value="Activo">Activo</option>
  <option value="Inactivo">Inactivo</option>
</select>
<br>
      ';

    }

/*==================================================
Actualizar perfil
==================================================*/
    public function actualizarPerfil(){

    	if (isset($_POST["editNomPerf"])) {

    		$datos=array("idEditar"=>$_POST["idEdit"],
		    			"namEdit"=>$_POST["editNomPerf"],
		    			"editEst"=>$_POST["editEstPerf"]
    					);	

    		$respuesta=ModeloPerfiles::mdlActualizarPerfil($datos,"perfiles_trucks");

    		if ($respuesta == "cpz") {
				
				echo '
				<script type="text/javascript">
					window.location.href = "index.php?action=cambioPerfil";
				</script>
				';

			}else{
				echo '
        		<script>
				Swal.fire({
					  icon: "error",
					  title: "Oops... Algo Fallo!!",
					  text: "Contacta a Soporte!!!!"
					  })
				</script>
				';
			}

    	}

    }

/*==================================================
eliminar perfil
==================================================*/
    public function ctrEliminarPerfiles(){

    	if (isset($_GET['idDelet'])) {

    		$datosControlador=$_GET['idDelet'];

    		$respuesta=ModeloPerfiles::mdlEliminarPerfil($datosControlador,"perfiles_trucks");

    		if ($respuesta == "cpz") {
				
				echo '
				<script type="text/javascript">
					window.location.href = "index.php?action=okDelPerf";
				</script>
				';

			}else{
				echo '
        		<script>
				Swal.fire({
					  icon: "error",
					  title: "Oops... Algo Fallo!!",
					  text: "Contacta a Soporte!!!!"
					  })
				</script>
				';
			}

    		
    	}

    }

/*==================================================
mostrar perfiles en el formulario de registro usuario
==================================================*/
    public function ctrMostrarPerfilesEnRegUsu(){

    	$respuesta=ModeloPerfiles::mdlMostrarPerfiles("perfiles_trucks");

		#var_dump($respuesta);

		foreach ($respuesta as $key => $value) {
  		echo '
  			<option value="'.$value["nombre_perfil"].'">'.$value["nombre_perfil"].'</option>
  		';
		}

		return $respuesta;

    }



}

 ?>