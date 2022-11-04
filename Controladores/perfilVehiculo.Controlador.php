<?php 
class ControladorPerfilVehiculo{

    public function ctrMostrarDatosPerfilVehiculoMod1(){

        if (isset($_GET['idEditVs'])) {
            $dato=$_GET['idEditVs'];
            #echo $dato; //testeo de llegada de datos
            $respuesta=ModeloVehiculos::mdlEditarVehiculo($dato,"vehiculos");
            #var_dump($respuesta);//testeo
            echo '
<div class="row">
    <div class="col d-flex align-items-center justify-content-evenly">
      <p class="text-center">icono</p>
    </div>
    <div class="col d-flex justify-content-evenly">
      <div class="row">
        <p class="text-nowrap">Model : '.$respuesta['modelo'].'</p>
        <p class="text-nowrap">Year : '.$respuesta['year'].'</p>
      </div>
      <div class="row">
        <p class="text-nowrap">Vin : '.$respuesta['vin_numer'].'</p>
        <p class="text-nowrap">Value : '.$respuesta['costo_vehiculo'].'</p>
      </div>
      <div class="row">
        <p class="text-nowrap">Plate : '.$respuesta['placa'].'</p>
      </div>
    </div>
    <div class="col d-flex align-items-center justify-content-evenly">
      <a href="index.php?action=editarVehiculo&idEditV='.$respuesta['id_vehiculo'].'" class="btn btn-warning">Edit Truck</a>
    </div>
</div>';

        }

    }



    public function ctrMostrarDatosPerfilVehiculoMod2(){

        if (isset($_GET['idEditVs'])) {
            $dato=$_GET['idEditVs'];
            #echo $dato; //testeo de llegada de datos
            $respuesta=ModeloVehiculos::mdlEditarVehiculo($dato,"vehiculos");
            #var_dump($respuesta);//testeo
            echo '
<div class="col-sm-4 d-flex justify-content-evenly">
      <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal">Add Service</button>
</div>
<div class="col-sm-8 d-flex align-items-center justify-content-evenly">
  <span class="text-nowrap">vehicle assigned to: &nbsp </span>
  <input type="text" value="'.$respuesta['asignado_empresa'].'" disabled class="form-control">
</div>
            ';

        }

    }


    public function ctrMostrarDatosPerfilVehiculoMod3(){

        if (isset($_GET['idEditVs'])) {
            $dato=$_GET['idEditVs'];
            #echo $dato; //testeo de llegada de datos
            $respuesta=ModeloPerfilVehiculo::mdlMostrarServiciosFiltradosPorVehiculo($dato,"servicios_asignados_vehiculos");
            #var_dump($respuesta);//testeo

            foreach ($respuesta as $key => $value) {

      echo '
    <tr>
          <td>'.$value["nombre_servicio"].'</td>
          <td>'.$value["fecha_inicio_serv"].'</td>
          <td>'.$value["fecha_fin_serv"].'</td>
          <td>'.$value["valor_servicio_asignado"].'</td>
          <td>
<a href="index.php?action=editarServicioAsignado&idEditSer='.$value["id_asignacion"].'" class="btn btn-warning btn-xs">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
</svg>
</a>
<a href="index.php?action=eliminarServicioAsignadoVehiculo&idElimServAsigVehi='.$value["id_asignacion"].'" class="btn btn-danger btn-xs">
<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
</svg>
</a>

<a class="btn btn-info btn-xs" target="_bank" href="index.php?action=factura&idFactura='.$value["id_asignacion"].'">
<i class="fa-solid fa-file-invoice-dollar"></i></a>
</td>
      </tr>
      ';

            }

        }

    }

    public function ctrMostrarDatosPerfilVehiculoMod4(){

        if (isset($_GET['idEditVs'])) {
            $dato=$_GET['idEditVs'];
            #echo $dato; //testeo de llegada de datos
            $respuesta=ModeloVehiculos::mdlEditarVehiculo($dato,"vehiculos");
            #var_dump($respuesta);//testeo
            echo '
<div class="row">
    <p class="text-nowrap">Dot : &nbsp '.$respuesta['dote_number'].'</p>
    <p class="text-nowrap">Slope 2 : &nbsp '.$respuesta['pendiente2'].'</p>
</div>
<div class="row">
    <p class="text-nowrap">Slope 1 : &nbsp '.$respuesta['pendiente1'].'</p>
    <p class="text-nowrap">Slope 3 : &nbsp '.$respuesta['pendiente3'].'</p>
</div>';

        }

    }


    public function ctrPasarIdHidden(){
        if (isset($_GET['idEditVs'])) {
            $datoIdV=$_GET['idEditVs'];
            echo '<input type="hidden" name="idVehiAsigServ" value="'.$datoIdV.'">';
        }
    }


    public function ctrMostrarServiciosEnAddServices(){
        if (isset($_GET['idEditVs'])) {
            $dato=$_GET['idEditVs'];
            #echo $dato; //testeo de llegada de datos
            $respuesta=ModeloServicios::mdlMostrarServicios("servicios");
            #var_dump($respuesta);//testeo
            foreach ($respuesta as $value) {
                echo '
  <option value="'.$value['id_servicio'].'">'.$value['nombre_servicio'].'</option>
                ';
            }
        }
    }

    public function ctrAsignarServicio(){
        if (isset($_POST['idVehiAsigServ'])) {

            $filtro1=str_replace(',', '', $_POST['valServ']);
            $filtro2=str_replace('.', '', $filtro1);

            $datosCtr=array("idV"=>$_POST['idVehiAsigServ'],
                       "serv"=>$_POST['serv'],
                       "fechaIni"=>$_POST['fechaIni'],
                       "fechaFin"=>$_POST['fechaFin'],
                       "valServ"=>number_format($filtro2,2));
            $respuesta=ModeloPerfilVehiculo::mdlAsignarServicio("servicios_asignados_vehiculos",$datosCtr);
            #var_dump($respuesta);//testeo
                    if ($respuesta == "cpz") {
            echo '
                <script type="text/javascript">
                    window.location.href = "index.php?action=sAoK";
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

    public function ctrMostrarServiciosEditar(){
        if (isset($_GET['idEditSer'])) {
            $dato=$_GET['idEditSer'];
            $respuesta=ModeloPerfilVehiculo::mdlMostrarServiciosEditar("servicios_asignados_vehiculos",$dato);
            #var_dump($respuesta);//testeo
            echo '
<option value="'.$respuesta['id_servicio'].'" select>Servicio Asignado:'.$respuesta['nombre_servicio'].'</option>
            ';
        }
    }

        public function ctrMostrarServiciosEnEditarServicio(){
        if (isset($_GET['idEditSer'])) {
            $dato=$_GET['idEditSer'];
            #echo $dato; //testeo de llegada de datos
            $respuesta=ModeloServicios::mdlMostrarServicios("servicios");
            #var_dump($respuesta);//testeo
            foreach ($respuesta as $value) {
                echo '
  <option value="'.$value['id_servicio'].'">'.$value['nombre_servicio'].'</option>
                ';
            }
        }
    }


    public function ctrMostrarFechasEditarServicio(){
            if (isset($_GET['idEditSer'])) {
            $dato=$_GET['idEditSer'];
            #echo $dato; //testeo de llegada de datos
            $respuesta=ModeloPerfilVehiculo::mdlMostrarServiciosEditar("servicios_asignados_vehiculos",$dato);
            #var_dump($respuesta);//testeo
            echo '
<input type="date" name="editFechaIni" value="'.$respuesta["fecha_inicio_serv"].'" class="form-control"><br>
<input type="date" name="editFechaFin" value="'.$respuesta["fecha_fin_serv"].'" class="form-control"><br>
<input type="text" name="editValServ" value="'.$respuesta["valor_servicio_asignado"].'" class="form-control" placeholder="Assign a value to the service USD" required>
            ';

        }
    }

    /**public function ctrRegresarAtras(){ #pensar bien esta logica y servira bastante 
        if (isset($_GET['idMstrPrl'])) {
            $atrasPerfilEmpresa=$_GET['idMstrPrl'];
        }elseif (isset($_GET['idEditVs'])) {
            $atrasPerfilVehiculo=$_GET['idEditVs'];
        }
    }**/

        public function ctrPasarIdHiddenEdit(){
        if (isset($_GET['idEditSer'])) {
            $datoIdS=$_GET['idEditSer'];
            $respuesta=ModeloPerfilVehiculo::mdlMostrarServiciosEditar("servicios_asignados_vehiculos",$datoIdS);
            echo '<input type="hidden" name="idServAsigVehi" value="'.$datoIdS.'">';
        }
    }

    public function ctrActualizarServicioAsignado(){
        if (isset($_POST['edtServAsig'])) {
            $filtro1=str_replace(',', '', $_POST['editValServ']);
            $filtro2=str_replace('.', '', $filtro1);
            $datosCtr=array("idServAsigVehiParaEditar"=>$_POST['idServAsigVehi'],
                            "eSa"=>$_POST['edtServAsig'],
                            "eFi"=>$_POST['editFechaIni'],
                            "eFf"=>$_POST['editFechaFin'],
                            "editValServAsig"=>number_format($filtro2,2));
            #var_dump($datosCtr);
            $respuesta=ModeloPerfilVehiculo::mdlActualizarServicioAsignado("servicios_asignados_vehiculos",$datosCtr);
            #echo $respuesta;
            if ($respuesta == "cpz") {
            echo '
            <script type="text/javascript">
                window.location.href = "index.php?action=servAsigActuOk";
            </script>
            ';
            }else{
                echo '
                  <script>
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "something went wrong, contact support!"
                        })
                </script>
                ';
                    
            }
        }
    }

public function ctrEliminarServicioAsignadoVehiculo(){
if (isset($_GET["idElimServAsigVehi"])) {
$datoCtr=$_GET["idElimServAsigVehi"];
#echo '<h1>'.$datoCtr.'</h1>';
$respuesta=ModeloPerfilVehiculo::mdlEliminarServicioAsignadoVehiculo("servicios_asignados_vehiculos",$datoCtr);
echo $respuesta;
    if ($respuesta == "cpz") {
        echo '
        <script type="text/javascript">
        window.location.href = "index.php?action=delServAsigVehiOk";
        </script>
        ';
        }else{
        echo '
        <script>
        Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "something went wrong, contact support!"
        })
        </script>
        ';
        }
    }
}

}?>