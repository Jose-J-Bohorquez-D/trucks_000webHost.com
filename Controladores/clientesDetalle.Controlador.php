<?php 

class ControladorDetallesCliente{

	public function ctrMostrarDatos1NameEmpNameCli(){
		
		if (isset($_GET['idMstrPrl'])) {
		$dato=$_GET['idMstrPrl'];		
		$respuesta=ModeloDetallesCliente::mdlMostrarDtsCliente($dato,"clientes");
		#var_dump($respuesta);
    echo '
<h3 class="profile-username text-center">'.$respuesta['nombre_empresa'].'</h3>
<p class="text-muted text-center">'.$respuesta['nombre_cliente'].'</p>
<a href="index.php?action=editarCliente&idEditCli='.$respuesta["id_cliente"].'" class="btn btn-primary btn-block">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16"> <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/> <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/> </svg>
<b>Edit Profile</b>
</a>
    ';		

		}
	}

  public function ctrMostrarDatos2DemasDts(){
    
    if (isset($_GET['idMstrPrl'])) {
    
    $dato=$_GET['idMstrPrl'];
    
    $respuesta=ModeloDetallesCliente::mdlMostrarDtsCliente($dato,"clientes");

    #var_dump($respuesta);

    echo '
<div class="container-fluid">
  <div class="row">
    
<div class="col">
<label>Address:</label>
<input type="text" name="direccion" value="'.$respuesta['direccion'].'" class="form-control" disabled>
<br>

<label>LIC EMP #:</label>
<input type="number" name="nLicEmp" value="'.$respuesta['numero_lic_emp'].'" class="form-control" disabled>
<br>

<label>Phone 1:</label>
<input type="number" name="telefono1" value="'.$respuesta['tel1'].'" class="form-control" disabled>
<br>
</div>

<div class="col">
<label>Phone 2:</label>
<input type="number" name="telefono2" value="'.$respuesta['tel2'].'" class="form-control" disabled>
<br>

<label>E-mail 1:</label>
<input type="email" name="correo1" value="'.$respuesta['email1'].'" class="form-control" disabled>
<br>

<label>E-mail 2:</label>
<input type="email" name="correo2" value="'.$respuesta['email2'].'" class="form-control" disabled>
<br>
</div>

<div class="col">
<label>ID CGPE:</label>
<input type="number" name="idCgpe" value="'.$respuesta['id_cgpe'].'" class="form-control" disabled>
<br>

<label># IFTA:</label>
<input type="number" name="nIfta" value="'.$respuesta['ifta_number'].'" class="form-control" disabled>
<br>

<label>TAX ID / # EIN:</label>
<input type="number" name="taxId" value="'.$respuesta['tax_id_number_ein'].'" class="form-control" disabled>
<br> 
</div>

  </div>
</div>
    ';    

    }
  }


  public function ctrMostrarVehiculosFiltrados(){
    
    if (isset($_GET['idMstrPrl'])) {
    
    $dato=$_GET['idMstrPrl'];
    
    $respuesta=ModeloDetallesCliente::mdlMostrarDtsCliente($dato,"clientes");

    #var_dump($respuesta["nombre_empresa"]);

    $nameEmp=$respuesta["nombre_empresa"];

    $respuesta2=ModeloDetallesCliente::mdlMostrarVehiculosFiltrados($nameEmp,"vehiculos");

    #var_dump($respuesta2);

    foreach ($respuesta2 as $key => $value) {
      echo '
    <tr>
          <td>
<a href="index.php?action=perfilVehiculo&idEditVs='.$value["id_vehiculo"].'" class="btn btn-warning btn-xs">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
  <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-node-plus" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M11 4a4 4 0 1 0 0 8 4 4 0 0 0 0-8zM6.025 7.5a5 5 0 1 1 0 1H4A1.5 1.5 0 0 1 2.5 10h-1A1.5 1.5 0 0 1 0 8.5v-1A1.5 1.5 0 0 1 1.5 6h1A1.5 1.5 0 0 1 4 7.5h2.025zM11 5a.5.5 0 0 1 .5.5v2h2a.5.5 0 0 1 0 1h-2v2a.5.5 0 0 1-1 0v-2h-2a.5.5 0 0 1 0-1h2v-2A.5.5 0 0 1 11 5zM1.5 7a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1z"/>
</svg>
</a>

<a href="index.php?action=vehiculos&idDeletV='.$value["id_vehiculo"].'" class="btn btn-danger btn-xs">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3-fill" viewBox="0 0 16 16">
  <path d="M11 1.5v1h3.5a.5.5 0 0 1 0 1h-.538l-.853 10.66A2 2 0 0 1 11.115 16h-6.23a2 2 0 0 1-1.994-1.84L2.038 3.5H1.5a.5.5 0 0 1 0-1H5v-1A1.5 1.5 0 0 1 6.5 0h3A1.5 1.5 0 0 1 11 1.5Zm-5 0v1h4v-1a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5ZM4.5 5.029l.5 8.5a.5.5 0 1 0 .998-.06l-.5-8.5a.5.5 0 1 0-.998.06Zm6.53-.528a.5.5 0 0 0-.528.47l-.5 8.5a.5.5 0 0 0 .998.058l.5-8.5a.5.5 0 0 0-.47-.528ZM8 4.5a.5.5 0 0 0-.5.5v8.5a.5.5 0 0 0 1 0V5a.5.5 0 0 0-.5-.5Z"/>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
  <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
</svg>
</a>

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
}

public function ctrEditarDetalleClientesVehiculoServicioDtsV(){

if (isset($_GET['idEditVs'])) {
  $dato=$_GET['idEditVs'];
  #echo $dato; //testeo de llegada de datos
  $respuesta=ModeloVehiculos::mdlEditarVehiculo($dato,"vehiculos");
  #var_dump($respuesta);//testeo
  echo '
<input type="hidden" name="idUpDS" value="'.$respuesta['id_vehiculo'].'">

<div class="col col-sm-4">
<label>Placa: </label>
<input type="text" name="editPlaca" value="'.$respuesta['placa'].'" placeholder="Escriba Una Placa" class="form-control" required><br>
<label>Modelo: </label>
<input type="text" name="editModelo" value="'.$respuesta['modelo'].'" placeholder="Escriba El Modelo" class="form-control" required><br>
<label>Año: </label>
<input type="text" name="editYear" value="'.$respuesta['year'].'" placeholder="Escriba El Año" class="form-control" required><br>
<label>VIN #: </label>
<input type="text" name="editVin" value="'.$respuesta['vin_numer'].'" placeholder="Escriba El VIN#" class="form-control" required><br>
<label>Valor-Costo: </label>
<input type="text" name="editValor" value="'.$respuesta['costo_vehiculo'].'" placeholder="Escriba El Valor" class="form-control" required><br>
<label>DOT #: </label>
<input type="text" name="editDot" value="'.$respuesta['dote_number'].'" placeholder="Escriba El DOT#" class="form-control" required><br>
<label>Pendiente 1: </label>
<input type="text" name="editPend1" value="'.$respuesta['pendiente1'].'" placeholder="Escriba info 1" class="form-control" required>
</div>

<div class="col col-sm-4">
<label>Pendiente 2: </label>
<input type="text" name="editPend2" value="'.$respuesta['pendiente2'].'" placeholder="Escriba info 2" class="form-control" required><br>
<label>Pendiente 3: </label>
<input type="text" name="editPend3" value="'.$respuesta['pendiente3'].'" placeholder="Escriba info 3" class="form-control" required><br>
<label>Vehiculo Asignado A: </label>
<select name="editAsignado" class="form-select" aria-label="Default select example" required>
<option selected value="'.$respuesta['asignado_empresa'].'">Vehiculo actualmente Asignado A: '.$respuesta['asignado_empresa'].'</option>
</select><br>
  ';

}


}

public function ctrEditarDetalleClientesVehiculoServicioDtsServicioAsig(){
  if (isset($_GET['idEditVs'])) {
  $dato=$_GET['idEditVs'];
  #echo $dato; //testeo de llegada de datos
  $respuesta=ModeloVehiculos::mdlEditarVehiculo($dato,"vehiculos");
  #var_dump($respuesta);//testeo
  echo '
<label>Asignar Servicio: </label>
<select name="AsigServ" class="form-select" aria-label="Default select example" required>
  <option>actualmente Tiene Asignado el servicio:  ( '.$respuesta['servicio_asig'].' )</option>

  ';

  }
}

public function ctrEditarDetalleClientesVehiculoServicioDtsSelectServicios(){
  if (isset($_GET['idEditVs'])) {
  $respuesta=ModeloServicios::mdlMostrarServicios("servicios");
  #var_dump($respuesta);//testeo
  foreach ($respuesta as $key => $value) {
      echo ' <option value="'.$value['nombre_servicio'].'">'.$value['nombre_servicio'].'</option>   ';
  }

  }
}

public function ctrActualizarDatosVehiculoConServicios(){
  if (isset($_POST['idUpDS'])) {
    $datosUpdate=array("idUpDS"=>$_POST['idUpDS'],
                       "eP"=>$_POST['editPlaca'],
                       "eM"=>$_POST['editModelo'],
                       "eY"=>$_POST['editYear'],
                       "eVi"=>$_POST['editVin'],
                       "eVa"=>$_POST['editValor'],
                       "eD"=>$_POST['editDot'],
                       "eP1"=>$_POST['editPend1'],
                       "eP2"=>$_POST['editPend2'],
                       "eP3"=>$_POST['editPend3'],
                       "eA"=>$_POST['editAsignado'],
                       "aS"=>$_POST['AsigServ'],
                       "fI"=>$_POST['fechaIni'],
                       "fF"=>$_POST['fechaFin']);
    #var_dump($datosUpdate);
    $respuesta=ModeloDetallesCliente::mdlActualizarDatosVehiculoConServicios($datosUpdate,"vehiculos");
          if ($respuesta == "cpz") {
        echo '<script type="text/javascript">
                window.location.href = "index.php?action=updateDtsCambioServicio";
              </script>';
      }else{
        echo '<script>
                Swal.fire({
                  icon: "error",
                  title: "Oops...",
                  text: "Something went wrong!"
                  })
              </script>';
      }
  }
}

#------------------------------------------------------------
/*  gestor de archivos  */
#------------------------------------------------------------
public function subirArchivos(){
  if (isset($_GET['idMstrPrl'])) {
    $dato=$_GET['idMstrPrl'];   
    $respuesta=ModeloDetallesCliente::mdlMostrarDtsCliente($dato,"clientes");
    $nombreEmpresa=$respuesta["nombre_empresa"];
  }
  
  if (isset($_POST["renombre"])) {
  $newName=$_POST["renombre"];
  }

  if (isset($_FILES["arch"])) {
  $detalles=$_FILES["arch"];
  }

  if (isset($_FILES["arch"])) {
    $directorio="Vistas/Archivos/";
    $archivo=$directorio . basename($_FILES["arch"]["name"]);
    $tipoArchivo=strtolower(pathinfo($archivo,PATHINFO_EXTENSION));
    $size=filesize($_FILES["arch"]["tmp_name"]);
    if ($tipoArchivo=="pdf") {
      if (move_uploaded_file($_FILES["arch"]["tmp_name"], $archivo)) {  
        #renombrar archivo despues de subido
        if (file_exists($archivo)) {
          if (isset($_POST["renombre"])) {
            $newName=$_POST["renombre"];
            $nombreFinal=$directorio . $newName . ".pdf";
          }
            if (rename($archivo, $nombreFinal)) {
            #echo "archivo renombrado con exito";
            }else{
              echo "archivo yape";
            }
        }else{
          echo "archivo no existente";
        }
        #subir datos a la BD
        if (file_exists($nombreFinal)) {
          $datosFile=array("nombreArchivo"=>basename($nombreFinal),
                           "rutaArchivo"=>$nombreFinal,
                           "nombreEmpresa"=>$respuesta["nombre_empresa"]);
          $respuestaSubirArchivo=ModeloDetallesCliente::subirArchivoModelo("archivos",$datosFile);
          if ($respuestaSubirArchivo == "cpz") {
          echo '<script type="text/javascript">
                  window.location.href = "index.php?action=okSubioArchivo";
                </script>';
          }else{
            echo '<script>
                    Swal.fire({
                      icon: "error",
                      title: "Oops...",
                      text: "Something went wrong!"
                      })
                  </script>';
          }
        }
        /*echo '<script>
                Swal.fire({
                icon: "success",
                title: "good",
                text: "Archivo subido con exito!"
                })
              </script>';*/
      }else{
          echo '<script>
                  Swal.fire({
                  icon: "error",
                  title: "Oops...",
                  text: "error al subir archivo!"
                  })
                </script>';
      }
    }else{
      echo '<script>
              Swal.fire({
              icon: "error",
              title: "Oops...",
              text: "Only files in (PDF) format are allowed!"
              })
            </script>';
    }
  }else{
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>A file must be selected!</strong> before pressing upload
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>';
  }
}#cierre de la funcion subirArchivos



#mostrar archivos en la tabla de archivos
public function mostrarDatosTablaArchivos(){
  if (isset($_GET['idMstrPrl'])) {
    $dato=$_GET['idMstrPrl'];   
    $respuesta=ModeloDetallesCliente::mdlMostrarDtsCliente($dato,"clientes");
    #var_dump($respuesta["nombre_empresa"]);
    $nombreEmpresa=$respuesta["nombre_empresa"];
  }
  $respuesta=ModeloDetallesCliente::mdlMostrarDatosTablaArchivos("archivos",$nombreEmpresa);
  #var_dump($respuesta);
      foreach ($respuesta as $key => $value) {
      echo '
    <tr>
          <td>
<a href="'.$value["ruta_archivo"].'" target="_blank">
<span class="fa-solid fa-eye"></span>
</a>
          </td>
          <td>'.$value["nombre_archivo"].'</td>
          <td>'.$value["fecha_crea"].'</td>
      </tr>
      ';
    }
}



}

 ?>


