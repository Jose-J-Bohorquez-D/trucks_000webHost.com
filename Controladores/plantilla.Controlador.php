<?php
class MvcControlador{

#llamado a la plantilla
    public function pagina(){

        include("Vistas/plantilla.php");

    }


#llamado a la plantilla
    public function enlacesPaginasControlador(){

      if (isset($_GET["action"])) {

        $enlacesControlador=$_GET["action"];

        #echo '<h1 class="text-center">'.$enlaces.'</h1>';

      }else {

        $enlacesControlador="inicio";

      }

      $respuesta=Paginas::enlacesPaginasModelo($enlacesControlador);

      include $respuesta;

    }


}
?>
