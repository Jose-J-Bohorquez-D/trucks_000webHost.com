<?php ob_start();

require_once("FPDF/fpdf.php");
require_once("Modelos/cn.php");

require_once("Controladores/plantilla.Controlador.php");
require_once("Controladores/perfiles.Controlador.php");
require_once("Controladores/usuarios.Controlador.php");
require_once("Controladores/servicios.Controlador.php");
require_once("Controladores/clientes.Controlador.php");
require_once("Controladores/vehiculos.Controlador.php");
require_once("Controladores/clientesDetalle.Controlador.php");
require_once("Controladores/perfilVehiculo.Controlador.php");
require_once("Controladores/alcoholydrogas.Controlador.php");
require_once("Controladores/tablaGeneralServicios.Controlador.php");
require_once("Controladores/generaFactura.Controlador.php");

require_once("Modelos/plantilla.Modelo.php");
require_once("Modelos/perfiles.Modelo.php");
require_once("Modelos/usuarios.Modelo.php");
require_once("Modelos/servicios.Modelo.php");
require_once("Modelos/clientes.Modelo.php");
require_once("Modelos/vehiculos.Modelo.php");
require_once("Modelos/clientesDetalle.Modelo.php");
require_once("Modelos/perfilVehiculo.Modelo.php");
require_once("Modelos/alcoholydrogas.Modelo.php");
require_once("Modelos/tablaGeneralServicios.Modelo.php");
require_once("Modelos/generaFactura.Modelo.php");


$plantilla=new MvcControlador;
$plantilla->pagina();
ob_end_flush();
?>




