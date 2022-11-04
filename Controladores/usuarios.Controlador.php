<?php 

class ControladorUsuarios{

/*========================================
mostrar los usuarios
========================================*/
	public function ctrMostrarUsuarios(){

		$respuesta=ModeloUsuarios::mdlMostrarUsuarios("usuarios_trucks");

		#var_dump($respuesta);

		foreach ($respuesta as $key => $value) {
			echo '
    		<tr>
    		<td>
        		<a href="index.php?action=editarUsuario&idEdit='.$value["id_usuario"].'" class="btn btn-warning btn-sm">Edit</a>
        		<a href="index.php?action=usuarios&idDel='.$value["id_usuario"].'" class="btn btn-danger btn-sm">del</a>
      		</td>
      		<td>'.$value["identificacion"].'</td>
      		<td>'.$value["nombres"].'</td>
      		<td>'.$value["email"].'</td>
      		<td>'.$value["telefono"].'</td>
      		<td>'.$value["direccion"].'</td>
      		<td>'.$value["rol_asignado"].'</td>
      		<td>'.$value["estado"].'</td>
      		<td>'.$value["crea"].'</td>
      		<td>'.$value["actualiza"].'</td>
    		</tr>
		';

		}

	}


/*========================================
Registro de usuarios
========================================*/
	public function registroUsuarioControlador(){

		if (isset($_POST['identificacion'])) {

			$datosControlador=array(
				"iden"=>$_POST['identificacion'],
				"nom"=>$_POST['nombres'],
				"mail"=>$_POST['email'],
				"newpass"=>$_POST['newPass'],
				"tel"=>$_POST['telefono'],
				"dir"=>$_POST['direccion'],
				"perfil"=>$_POST['perfilUsuario']);

			$respuesta=ModeloUsuarios::mdlRegistroUsuario($datosControlador,"usuarios_trucks");

			#var_dump($respuesta);

			if ($respuesta == "cpz") {
				echo '
				<script type="text/javascript">
					window.location.href = "index.php?action=ok";
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

/*========================================
editar usuario
========================================*/
public function editarUsuario(){

	$datos=$_GET['idEdit'];

	#echo '<h1 class="text-center">'.$datos.'</h1>';

	$respuesta=ModeloUsuarios::mdlEditarUsuario($datos,"usuarios_trucks");

	#var_dump($respuesta);

	echo '
		  <input type="hidden" name="idEditar" value="'.$respuesta["id_usuario"].'"

          <label for="identificacion">Id:</label>
          <input type="number" name="editIden" value="'.$respuesta["identificacion"].'" placeholder="Write an ID" class="form-control">
          <br>

          <label for="nombres">Names and surnames:</label>
          <input type="text" name="editNom" value="'.$respuesta["nombres"].'" placeholder="Write Names and Surnames" class="form-control">
          <br>

          <label for="email">Email:</label>
          <input type="email" name="editMail" value="'.$respuesta["email"].'" placeholder="Write Valid Email" class="form-control">
          <br>

          <label for="newPass">Password:</label>
          <input type="text" name="editPass" value="'.$respuesta["pass_usu"].'" placeholder="Type a new password" class="form-control">
          <br>

          <label for="telefono">Phone:</label>
          <input type="number" name="editTel" value="'.$respuesta["telefono"].'" placeholder="Write a phone" class="form-control">
          <br>

          <label for="direccion">Address:</label>
          <input type="text" name="editDir" value="'.$respuesta["direccion"].'" placeholder="Write Address/Neighborhood/Loc/City" class="form-control">
          <br>
          <label for="direccion">Select A Profile:</label>
          <select class="form-select" aria-label="Default select example" name="editPerfilUsu">
<option selected value="'.$respuesta["rol_asignado"].'">Current Profile Is: '.$respuesta["rol_asignado"].'</option>
	';

}

/*========================================
editar usuario
========================================*/
public function actualizarUsuario(){

	if (isset($_POST['editIden'])) {

		$datos=array(
			"idEdit"=>$_POST['idEditar'],
			"iden"=>$_POST['editIden'],
			"nom"=>$_POST['editNom'],
			"mailEdit"=>$_POST['editMail'],
			"pass"=>$_POST['editPass'],
			"tel"=>$_POST['editTel'],
			"dir"=>$_POST['editDir'],
			"perfUsu"=>$_POST['editPerfilUsu']);

		$respuesta=ModeloUsuarios::mdlActualizarUsuario($datos,"usuarios_trucks");

		#echo $respuesta;

		if ($respuesta == "cpz") {
			echo '
			<script type="text/javascript">
				window.location.href = "index.php?action=cambioUsuario";
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

/*========================================
borrar usuario
========================================*/
public function ctrBorarUsuario(){

	if (isset($_GET['idDel'])) {
		
		$datosControlador=$_GET['idDel'];

		$respuesta=ModeloUsuarios::mdlBorrarUsuario($datosControlador,"usuarios_trucks");

		if ($respuesta == "cpz") {
			echo '
			<script type="text/javascript">
				window.location.href = "index.php?action=okdelUsu";
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


/*========================================
inicio de sesion
========================================*/
	public function ctrLogin(){
		if (isset($_POST['usu'])) {

			$dato=$_POST['usu'];

			$respuesta=ModeloUsuarios::mdlLogin($dato,"usuarios_trucks");

			#var_dump($respuesta); //testing		

			if ($respuesta != false) {


				if (isset($respuesta["email"])) {
					
					if ($respuesta["email"] == $_POST['usu'] && $respuesta["pass_usu"] == $_POST['pwd'] ) {

						$_SESSION['iniciarSesion'] = "ok";
						$_SESSION['id'] = $respuesta["id_usuario"];
						$_SESSION['ident'] = $respuesta["identificacion"];
						$_SESSION['nombres'] = $respuesta["nombres"];
						$_SESSION['email'] = $respuesta["email"];
						$_SESSION['tel'] = $respuesta["telefono"];
						$_SESSION['dir'] = $respuesta["direccion"];
						$_SESSION['rol'] = $respuesta["rol_asignado"];

						echo '
						<script type="text/javascript">
							window.location.href = "index.php";
						</script>
						';
					}

					if ($respuesta["email"] == $_POST['usu'] && $respuesta["pass_usu"] != $_POST['pwd'] ) {

						echo '<script>
						Swal.fire({
							  icon: "error",
							  title: "Oops...",
							  text: "Wrong password, contact support!"
							  })
						</script>';
					}

				}else{
					echo '<script>
						Swal.fire({
							  icon: "error",
							  title: "Oops...",
							  text: "Check the entered data or contact support!"
							  })
						</script>';
				}

			}else{
				echo '<script>
					Swal.fire({
						  icon: "error",
						  title: "Oops...",
						  text: "the user entered does not exist, contact support!"
						  })
					</script>';	
			}
			
		}
	}

}


 ?>