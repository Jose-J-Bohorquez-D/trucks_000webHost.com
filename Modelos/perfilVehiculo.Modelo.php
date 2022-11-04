<?php 

require_once "ConexionBD.php";

class ModeloPerfilVehiculo extends ConexionBD{

    public static function mdlMostrarServiciosFiltradosPorVehiculo($datoMdl,$tabla){

        $stmt=ConexionBD::conectarbd()->prepare("

SELECT S.id_servicio, S.nombre_servicio,S.valor_servicio,id_asignacion,id_vehiculo,fecha_inicio_serv,fecha_fin_serv,valor_servicio_asignado 
from servicios S 
JOIN servicios_asignados_vehiculos SAV 
ON S.id_servicio = SAV.id_servicio
WHERE   SAV.id_vehiculo = :idVehi");
        
        $stmt->bindParam(":idVehi",$datoMdl);
        
        $stmt->execute();

        return $stmt->fetchAll();

    }

    public static function mdlAsignarServicio($tabla,$datos){
    
    $stmt=ConexionBD::conectarbd()->prepare("
        INSERT INTO $tabla(id_vehiculo,id_servicio,fecha_inicio_serv,fecha_fin_serv,valor_servicio_asignado)
        VALUES(:id_vehiculo,:id_servicio,:fecha_inicio_serv,:fecha_fin_serv,:valor_servicio_asignado)");

    $stmt->bindParam(":id_vehiculo",$datos["idV"]);
    $stmt->bindParam(":id_servicio",$datos["serv"]);
    $stmt->bindParam(":fecha_inicio_serv",$datos["fechaIni"]);
    $stmt->bindParam(":fecha_fin_serv",$datos["fechaFin"]);
    $stmt->bindParam(":valor_servicio_asignado",$datos["valServ"]);
    
    if ($stmt->execute()) {
        return 'cpz';
    }else{
        return "Error Revisa Con Calma";
    }

    $stmt->close();

    $stmt=null;
    }



    public static function mdlMostrarServiciosEditar($tabla,$dato){
        $stmt=ConexionBD::conectarbd()->prepare("
SELECT S.id_servicio, S.nombre_servicio,S.valor_servicio,id_asignacion,id_vehiculo,fecha_inicio_serv,fecha_fin_serv,valor_servicio_asignado 
from servicios S 
JOIN servicios_asignados_vehiculos SAV 
ON S.id_servicio = SAV.id_servicio
WHERE   SAV.id_asignacion = :idA");
        $stmt->bindParam(":idA",$dato);
        $stmt->execute();
        return $stmt->fetch();
    }

public static function mdlActualizarServicioAsignado($tabla,$datos){
$stmt=ConexionBD::conectarbd()->prepare("
    UPDATE $tabla 
    SET id_servicio = :idS, fecha_inicio_serv = :fIs, fecha_fin_serv = :fFs, valor_servicio_asignado=:vSa 
    WHERE id_asignacion = :idA");

        $stmt->bindParam(":idS",$datos["eSa"]);
        $stmt->bindParam(":fIs",$datos["eFi"]);
        $stmt->bindParam(":fFs",$datos["eFf"]);
        $stmt->bindParam(":vSa",$datos["editValServAsig"]);
        $stmt->bindParam(":idA",$datos["idServAsigVehiParaEditar"]);

        if ($stmt->execute()) {
        
            return "cpz";

        }else{

            return "Error Revisa Con Calma";

        }

        $stmt->close();

        $stmt=null;


             }

public static function mdlEliminarServicioAsignadoVehiculo($tabla,$datos){
 $stmt=ConexionBD::conectarbd()->prepare("DELETE FROM $tabla WHERE id_asignacion= :idAsig");

        $stmt->bindParam("idAsig",$datos);

        if ($stmt->execute()) {

            return "cpz";

        }else{

            return "error";

        }
    
    }

}?>