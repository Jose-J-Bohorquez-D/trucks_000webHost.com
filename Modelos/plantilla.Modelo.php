<?php
class Paginas{

  public static function enlacesPaginasModelo($enlacesModelo){

    if ($enlacesModelo== "inicio" ||
        $enlacesModelo== "salir" ||
        $enlacesModelo== "perfiles" ||
        $enlacesModelo== "factura" ||
        $enlacesModelo== "facturas" ||
        $enlacesModelo== "servicios" ||
        $enlacesModelo== "usuarios" ||
        $enlacesModelo== "clientes" ||
        $enlacesModelo== "editarPerfil" ||
        $enlacesModelo== "editarUsuario" ||
        $enlacesModelo== "editarServicio"||
        $enlacesModelo== "editarCliente"|| 
        $enlacesModelo== "editarVehiculo"|| 
        $enlacesModelo== "clienteDetalles"|| 
        $enlacesModelo== "imprimirFactura"||
        $enlacesModelo== "perfilVehiculo"|| 
        $enlacesModelo== "alcoholydrogas"|| 
        $enlacesModelo== "editarServicioAsignado"||
        $enlacesModelo== "tablaGeneralDeServicios"||
        $enlacesModelo== "eliminarServicioAsignadoVehiculo"||
        $enlacesModelo== "vehiculos") {

          $newModulo="Vistas/Paginas/".$enlacesModelo.".php";

    }
    elseif ($enlacesModelo=="index") {

      $newModulo="Vistas/Paginas/inicio.php";

    }

    elseif ($enlacesModelo=="okPerfil") {

      $newModulo="Vistas/Paginas/perfiles.php";

    }

    elseif ($enlacesModelo=="okDelPerf") {

      $newModulo="Vistas/Paginas/perfiles.php";

    }

    elseif ($enlacesModelo=="ok") {

      $newModulo="Vistas/Paginas/usuarios.php";

    }

    elseif ($enlacesModelo=="okDelUsu") {

      $newModulo="Vistas/Paginas/usuarios.php";

    } 

    elseif ($enlacesModelo=="sAoK") {

      $newModulo="Vistas/Paginas/clientes.php";

    }    

    elseif ($enlacesModelo=="cambioPerfil") {

      $newModulo="Vistas/Paginas/perfiles.php";

    }

    elseif ($enlacesModelo=="cambioServicio") {

      $newModulo="Vistas/Paginas/servicios.php";

    }

    elseif ($enlacesModelo=="cambioCliente") {

      $newModulo="Vistas/Paginas/clientes.php";

    }
 
    elseif ($enlacesModelo=="elimServ") {

      $newModulo="Vistas/Paginas/servicios.php";

    }

    elseif ($enlacesModelo=="elimV") {

      $newModulo="Vistas/Paginas/vehiculos.php";

    }

    elseif ($enlacesModelo=="elimCli") {

      $newModulo="Vistas/Paginas/clientes.php";

    }

    elseif ($enlacesModelo=="cambioUsuario") {

      $newModulo="Vistas/Paginas/usuarios.php";

    }

    elseif ($enlacesModelo=="okServicio") {

      $newModulo="Vistas/Paginas/servicios.php";

    }

    elseif ($enlacesModelo=="okCliente") {

      $newModulo="Vistas/Paginas/clientes.php";

    }

    elseif ($enlacesModelo=="okVehiculo") {

      $newModulo="Vistas/Paginas/vehiculos.php";

    }

    elseif ($enlacesModelo=="cambioVehiculo") {

      $newModulo="Vistas/Paginas/vehiculos.php";

    }

    elseif ($enlacesModelo=="updateDtsCambioServicio") {

      $newModulo="Vistas/Paginas/clientes.php";

    }

    elseif ($enlacesModelo=="servAsigActuOk") {

      $newModulo="Vistas/Paginas/inicio.php";

    }

    elseif ($enlacesModelo=="delServAsigVehiOk") {

      $newModulo="Vistas/Paginas/inicio.php";

    }

    elseif ($enlacesModelo=="okSubioArchivo") {

      $newModulo="Vistas/Paginas/clientes.php";

    }

    elseif ($enlacesModelo=="envioMailsOk") {

      $newModulo="Vistas/Paginas/inicio.php";

    }

    else {

      $newModulo="Vistas/Paginas/404.php";

    }

    return $newModulo;

  }

}
